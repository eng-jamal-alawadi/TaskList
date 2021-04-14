

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

//------------------------------------------
/* محاضرة التعامل مع المصفوفات في لارافيل
Route::get('tasks', function () {
    $tasks = [
        'first-task' => 'task1',
        'second-task' => 'task2',
        'third-task' => 'task3'
    ];

    return view('tasks', compact('tasks'));
});


Route::get('show/{id}', function ($id) {
    $tasks = [
        'first-task' => 'task1',
        'second-task' => 'task2',
        'third-task' => 'task3'
    ];
    $task = $tasks[$id];

    return view('show', compact('task'));
});

----------------------------------------*/

//محاضرة استرجاع البيانات من قاعدة البيانات

Route::get('tasks',function(){

    $tasks= DB::table('tasks')->get();

    return view('tasks',compact('tasks'));
});

Route::get('tasks/show/{id}' , function($id){

    $task= DB::table('tasks')->find($id);
    dd($task);
    return view('show',compact('task'));

});
