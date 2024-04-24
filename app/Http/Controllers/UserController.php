<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function create(Request $request){

     $res =   User::create($request->all());

     if($res){
        return "well deone ! user create success full";
     }else{
        return "something happen" ;
     }
    }
}
