<?php

use App\Http\Controllers\Learncontroller;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Example\FirstController;
use App\Http\Controllers\Example\SecondController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;

// Auth::routes(['register'=>false]);
// Route::get('/', function () {
    
//     return view('layouts.app');
// });

Route::get('/', function () {
    
    return view('welcome');
});


// //_CSRF Token__//
// Route::get('/about',function( Request $request){
//     //$token = $request->session()->token();
    
 
//     $token = csrf_token();
//     dd($token);
//     //return view('about');
    
// })->name('about.us');

//Route::view('/about','about');

// Route::get(md5('/contact'),function(){
//     return view('contact');
//     //return "My roll is  $roll";
// })->name('contact.us');

// Route::get('/contact',function(){
//     return view('contact');
    
// })->name('contact.us');

//Laravel 7
//Route::get('/contact','Example/FirstController@index')->name('contact.us'); 

//__Laravel 8__//
Route::get('about/us', [FirstController::class, 'About_index'])->name('about.us');
Route::get('contact-us', [FirstController::class, 'contact_index'])->name('contact.us');

Route::get('/user/details/{}', [FirstController::class, 'details'])->name('user.details');

Route::get('/laravel', [FirstController::class, 'laravel'])->name('laravel');




//__Class crud route__?//
Route::get('class', [App\Http\Controllers\Admin\ClassController::class, 'index'])->name('class.index');
Route::get('create/class', [App\Http\Controllers\Admin\ClassController::class, 'create'])->name('class.create');

//Route::get('class/delete/{id}', [App\Http\Controllers\Admin\ClassController::class, 'delete'])->name('class.delete');






//__Students crud route__?//
Route::resource('students', StudentController::class);





//__Category crud route__//
Route::get('category/index', [CategoryController::class, 'index'])->name('category.index');
Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

//__SubCategory crud route__//
Route::get('subcategory/index',  [SubcategoryController::class, 'index'])->name('subcategory.index');
Route::get('subcategory/create', [SubcategoryController::class, 'create'])->name('subcategory.create');
Route::post('subcategory/store', [SubcategoryController::class, 'store'])->name('subcategory.store');





Route::get('/try',function( Request $request ){
    //$request->session()->put('age','24');
    //session(['name' => 'Learn Hunter']);
    // Log::info('this is your age'.rand(1,30));
    // return redirect()->to('/');
    $logfile=file(storage_path().'/logs/contact.log');
    $collection =[];
    foreach($logfile as $line_number => $line){
        $collection[]=array('line'=>$line_number, 'contact' =>htmlspecialchars($line));
    }
    dd($collection);
});

//- See all session
Route::get('/all',function( Request $request ){
   return  $request->session()->all();
   //$request->session()->flush();


});

Route::get('testone', [SecondController::class, 'test']);



Route::post('/student/store', [FirstController::class, 'Studentstore'])->name('student.store');
Route::post('/about/store', [FirstController::class, 'Aboutstore'])->name('about.store');
Route::post('/store/contact', [FirstController::class, 'store'])->name('store.contact');



//__Invoke Route__//
Route::get('/test', Learncontroller::class);
//Route::get('/hello', Learncontroller::class, 'hello');

Route::get('country', [FirstController::class, 'country'])->name('country')->middleware('country');

// Route::get('/country',function(){
//     return view('country');
    
// })->middleware('country');


Route::get('/laravel1',function(){
    return view('laravel1');
    
})->middleware('auth');


Route::get('/home',function(){
    return view('home');
    
})->middleware('auth');




 
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');



//Auth::routes(['register']->false);

//__ignore it__ //

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
