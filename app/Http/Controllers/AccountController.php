<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Account;
use App\Models\User;
use App\Notifications\NewAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    function list(){
        $list = Account::with('image')->get();
        return $list;
    }
    function create(Request $request){
     $user =   User::where("email","messanfollyh@gmail.com")->first();
        $imagePath =    Storage::disk('public')->putFileAs('accountphoto', $request->photo, time() . '.' . $request->photo->extension());
        $image = new Image([
            'url' => $imagePath,
        ]);
        $account =  Account::create($request->all());
        $account->image()->save($image );

      if($account){
        $user->notify(new NewAccount($account));
        return "well done";
      }else{
        return "something happen";
      }
    }
}
