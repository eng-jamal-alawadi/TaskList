

<?php


//use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    $name = "Jamal Alawadi";
    return view('about', compact('name'));
});


Route::post('store', function (Request $request) {
    $name = $request->myname;
    return view('about', compact('name'));
});

Route::get('tasks',function(){

    $tasks= DB::table('tasks')->get();

    return view('tasks',compact('tasks'));
});

Route::get('tasks/show/{id}' , function($id){

    $task= DB::table('tasks')->find($id);
    //dd($task);
    return view('show',compact('task'));

});


Route::get('app', function () {
    $tasks =DB::table('tasks')->get();
    $tasks= DB::table('tasks')-> orderBy('title', 'asc')-> get();
    return view('todo', compact('tasks'));
});


Route::post('store',function(Request $request){
    DB::table('tasks')->insert([
        'title'=> $request-> title
    ]);
    return redirect()-> back();
});
