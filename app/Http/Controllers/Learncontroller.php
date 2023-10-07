<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Learncontroller extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //__Data collect from database__//
    public function __invoke(Request $request)
    {
        return "This is your invoke method!" ;
    }
    // public function hello(){
    //     return "Hello";
    // }


}
