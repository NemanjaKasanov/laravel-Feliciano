<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends FirstController
{
    public function admin(Request $request){
        $this->data['user'] = $request->session()->get('user');
        return view('layouts.admin', $this->data);
    }
}
