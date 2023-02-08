<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class SwitchController extends Controller
{
    //
    public function index(){
        $lang = 'en';
        App::setlocale('en');
        return view('index',compact('lang'));
    }
    public function change(Request $request){
        $lang = $request->submit;
        if($lang == 'id'){
            App::setlocale('id');
        }else{
            App::setlocale('en');
        }
        return view('index',compact('lang'));

    }
}
