<?php

namespace App\Http\Controllers\Example;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FirstController extends Controller
{
    //__Index Method__//

    public function About_index() {
        //dd(app());
        return view ('about');
    }


    public function contact_index() {
       
        return view ('contact');
        
    }

    public function country() {
        
        return view ('Country');
        
    }

    // __Student store__//

    public function Studentstore(Request $request)
    {
        dd($request->all());
    }
    public function Aboutstore(Request $request)
    {
        dd($request->all());
    }

    
}
