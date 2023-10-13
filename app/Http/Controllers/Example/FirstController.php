<?php

namespace App\Http\Controllers\Example;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Http\Controllers\Example\FirstController;
use App\Http\Controllers\Example\SecondController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;

class FirstController extends Controller
{
    //__Index Method__//

    public function About_index() {
        //dd(app());
       return view ('about');
       //return response("Hello world");
    //    return response('Hello World', 200)
    //               ->header('Content-Type', 'text/plain');
    }


    public function contact_index() {

        //abort(404);
        //abort(401);
       Auth::id();
        return view ('contact');
        
        
    }

    public function country() {
        
        return view ('Country');
        
    }

    // __Student store__//

    public function Studentstore(Request $request)
    {

        $data=  array();
        $data['name']= $request->name;
        $data['email']= $request->email;
        $data['phone']= $request->phone;


        //database store
        //return redirect()->route('about.us');
        //return redirect()->action([SecondController::class, 'test']);
        //return redirect()->away('https://www.google.com');
        return redirect()->back()->with('success', 'Student inserted');



        //dd($request->all());
       // dd($request->name());   // if we find single varity
       //dd($request->path()); //check path
       //dd($request->url());   //check url 
       //dd($request->ip()); //show ip
       //
       //dd($request->collect()); // show array collection
    }
    // public function Aboutstore(Request $request)
    // {
    //     dd($request->all());
    // }



    public function store(Request $request){
      
     //dd($request->all());
        //return View('page.laravel', ['name' => 'Learn Hunter']);
        $validated = $request->validate([
            'name' => 'required|max:55',
            'email' => 'required|max:80|email',
            'Password' => 'required|min:6|max:12',
        ]);

        //database data insert
        //using query to insert data
        //store the data log file

        //dd($request->all());

        \Log::channel('contactstore')->info('The contact from submitted by '.rand(1,20));
        return redirect()->back();
        
    }


    public function resend() {
        
    }



    public function details($id) {

        //bring user data
        
        //return view ('details');
       $id= Crypt::decryptString($id);
       echo $id;
       return view('details');
       
        
    }


    //Laravel method_exists
    public function laravel(){
        //return view ('laravel');
        // if(view()->exists('page.laravel')){
        //     return View::make('page.laravel', ['name' => 'Learn Hunter']);

        // }else{
        //     echo"Not avilable";
        // }

        return View('page.laravel', ['name' => 'Learn Hunter']);
        
    }

    
}
