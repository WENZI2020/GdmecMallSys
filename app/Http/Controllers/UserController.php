<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public static function shopcart(){
        return view('shopcart');
    }
    public static function account(){
        return view('account');
    }
}
