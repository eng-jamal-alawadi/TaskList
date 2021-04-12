

<?php


//use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
  $name ="Jamal Alawadi";
    return view('about' , compact('name'));
});


Route::post('store', function(Request $request){
    $name = $request ->myname;
    return view('about', compact('name'));
});

Route::get('tasks', function(){
    $tasks =[
        'first-task' => 'task1',
        'second-task' =>'task2',
        'third-task' => 'task3'];

    return view('tasks',compact('tasks'));
});

Route::get('show/{id}',function($id){
    $tasks =[
        'first-task' => 'task1',
        'second-task' =>'task2',
        'third-task' => 'task3'];
    $task = $tasks[$id];

    return view('show', compact('task'));
});
