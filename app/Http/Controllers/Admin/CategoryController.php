<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\str;

class CategoryController extends Controller
{
    //__Index method__//
    public function index() {
        //__Query bilder__//
        // $category=DB::table('categories')->get();

        //__Eloquent__//
        $category=Category::all();
        return view('admin.category.index',compact('category'));
    
    }

    //__Create Method___//

    public function create() {
        return view('admin.category.create');
    
    }

    //__Store Method___//

    /**
     * Summary of store
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function store(Request $request) {
        //return view('admin.category.store');
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
            
        ]);

        $category=new Category;
        $category->category_name= $request->category_name;
        $category->category_slug= Str::of($request->category_name)->slug('-');
        $category->save();

        return redirect()->back();
    
    }



}
