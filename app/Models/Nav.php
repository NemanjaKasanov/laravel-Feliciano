<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Nav extends Model
{
    use HasFactory;

    public static function getNavs($request){
        if($request->session()->has('user')){
            switch($request->session()->get('user')->role){
                case 0: // User
                    return self::getNavLoggedIn(2);
                case 1: // Employee
                    return self::getNavLoggedIn(3);
                case 2: // Admin
                    return self::getNavLoggedIn(4);
            }
        }
        else{
            return Nav::getNavLoggedOut();
        }
    }

    public static function getNavLoggedOut(){
        return DB::table('navs')
            ->where('login_status', '0')
            ->orWhere('login_status', '1')
            ->orderBy('position')
            ->get();
    }

    public static function getNavLoggedIn($role){
        return DB::table('navs')
            ->where('login_status', $role)
            ->orWhere('login_status', '0')
            ->orWhere('login_status', '2')
            ->orderBy('position')
            ->get();
    }
}
