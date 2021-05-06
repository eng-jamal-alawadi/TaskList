

<?php


//use GuzzleHttp\Psr7\Request;
use App\Models\Task;
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

//  this part of code to Retrieving All Rows From A Table

Route::get('todo', function () {

    // $tasks =DB::table('tasks')->get();
    $tasks= Task::all();

    $tasks= DB::table('tasks')-> orderBy('title', 'asc')-> get();

    return view('todo', compact('tasks'));
});

// this part of code to insert the data'tasks' to database
Route::post('store',function(Request $request){

    // DB::table('tasks')->insert([
    //     'title'=> $request-> title
    // ]);

    $task = new Task;
    $task-> title = $request-> title;
    $task -> save();

    return redirect()-> back();
});

// this part of code to delete the data from the database

Route::post('delete/{id}',function($id){

    $task = Task::find($id);
    $task->delete();

    return redirect()-> back();

});



