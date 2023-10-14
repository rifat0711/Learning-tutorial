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
        $class= DB::table('classes')->get();
        return view('admin.class.index', compact('class'));
        
    }
}
