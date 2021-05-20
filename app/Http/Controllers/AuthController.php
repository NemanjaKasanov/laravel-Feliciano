<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeAccountInfoRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;

class AuthController extends FirstController
{
    public function register_form(){
        return view('pages.register', $this->data);
    }

    public function login_form(){
        return view('pages.login', $this->data);
    }

    public function myAccount(Request $request){
        $this->data['user'] = Account::where('id', $request->session()->get('user')->id)->first();
        return view('pages.my_account', $this->data);
    }

    public function register(RegisterRequest $request){
        $validated = $request->validated();

        try{
            Account::insert([
                'name' => $validated['name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'municipality' => $validated['municipality'],
                'password' => md5($validated['password'])
            ]);
            return redirect()->route('login.form');
        }
        catch (\Exception $e){
            return redirect()->route('error');
        }
    }

    public function login(LoginRequest $request){
        $email = $request->input('email');
        $password = md5($request->input('password'));

        try{
            $errors = [];
            $email_exists = Account::where('email', $email)->exists();
            $pass_right = Account::where('email', $email)->where('password', $password)->exists();

            if(!$email_exists) array_push($errors, "This email doesn't exist in the database");
            if($email_exists AND !$pass_right) array_push($errors, "Wrong password.");

            $user = DB::table('accounts')
                    ->where('email', '=', $email)
                    ->where('password', '=', $password)
                    ->first();
            if($user){
                $request->session()->put('user', $user);
                return redirect()->route('home');
            }
            else{
                return redirect()->route('login.form')->withErrors($errors);
            }
        }
        catch(\Exception $e){
            return redirect()->route('error');
        }
    }

    public function logout(Request $request){
        $request->session()->remove('user');
        return redirect()->route('home');
    }

    public function changeAccountInfo(ChangeAccountInfoRequest $request){
        $validated = $request->validated();
        $id = $request->session()->get('user')->id;

        try{
            DB::table('accounts')
                ->where('id', $id)
                ->update([
                    'phone' => $validated['phone'],
                    'address' => $validated['address'],
                    'municipality' => $validated['municipality']
                ]);
            $user = Account::where('id', $id)->first();
            $request->session()->put('user', $user);
            return redirect()->route('myAccount');
        }
        catch(\Exception $e){
            return redirect()->route('error');
        }
    }
}
