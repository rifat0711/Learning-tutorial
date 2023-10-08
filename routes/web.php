<?php

use App\Http\Controllers\Learncontroller;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Example\FirstController;
use App\Http\Controllers\Example\SecondController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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

Route::get('/laravel', [FirstController::class, 'laravel'])->name('laravel');

Route::get('/try',function( Request $request ){
    $request->session()->put('age','24');
    //session(['name' => 'Learn Hunter']);

});

//- See all session
Route::get('/all',function( Request $request ){
   return  $request->session()->all();
   //$request->session()->flush();


});

Route::get('testone', [SecondController::class, 'test']);



Route::post('/student/store', [FirstController::class, 'Studentstore'])->name('student.store');
Route::post('/about/store', [FirstController::class, 'Aboutstore'])->name('about.store');




//__Invoke Route__//
Route::get('/test', Learncontroller::class);
//Route::get('/hello', Learncontroller::class, 'hello');

Route::get('country', [FirstController::class, 'country'])->name('country')->middleware('country');

// Route::get('/country',function(){
//     return view('country');
    
// })->middleware('country');

//__ignore it__ //

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
