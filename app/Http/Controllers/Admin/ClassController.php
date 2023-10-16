<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ClassController extends Controller
{
    //__Constract
   public function __construct() {
        $this->middleware('auth');
        
    }
    //__Index method all database
    public function index() 
    {
        // $class= DB::table('classes')->get();
        // return view('admin.class.index', compact('class'));
        $class= DB::table('classes')->paginate(4);
        return view('admin.class.index', compact('class'));
        
    }

    //__Create from page__//
    public function create() 
     {
        return view('admin.class.create');
        
    }

    //___Delete Method___//

    public function delete($id) 
    {
        DB::table('classes')->where('id',$id)->delete();
        return redirect()->back()->with('Success','Successfully deleted');
       //return view('admin.class.delete');
       
   }



}
