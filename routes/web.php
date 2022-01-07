<?php

use Illuminate\Support\Facades\Route;

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


// Route::get('/about', function () {
//     return 'welcome This is me';
// });

// Route::get("/post/{id}/{name}", function($id , $name){
//     return "This is post number " .$id. " " .$name;         //In future we will be passing these parameters to the views.

// });



//-----------------------------------------------------------------------------------------------------------//

// Methods to pass data from URL to controller
// always remember that use backward slash in route name(1st param)
// and forwward slash in route(2nd param)

//  1-  Route::get("/post/(:any)/(:any)", '\App\Http\Controllers\PostsController@index\$1\$2');  
//  2-  Route::get("/post/{id}/{name}", '\App\Http\Controllers\PostsController@index');


//route::get("content/{id}/{name}","\App\Http\Controllers\PostsController@content"); 
//route::get("content","\App\Http\Controllers\PostsController@content");

// This is how you give name to the routes

// Route::get("/admin/post/new",array('as'=>'admin.new', function(){
//     $url = route('admin.new');
//     return "This url consist of : " .$url;
// }));

//route::get('/content/{id}/{name}',"\App\Http\Controllers\PostsController@content");

//-----------------------------------------------------------------------------------------------------------//

//Thhis isto access the resource methods
route::resource("/posts","\App\Http\Controllers\PostsController"); 


//--------------------------------------------------------------------------------------------------------------//

/*
|--------------------------------------------------------------------------
| SQL Raw Queries
|--------------------------------------------------------------------------
|*/


// route::get('/insert', function(){
//   DB::insert("insert into posts(Title,Body) values(?,?)", ['php',' is fun']); 
 
// });

// route::get('/read', function(){
//     $posts = DB::select('select * from posts where Title = ?',['php']);

//     foreach($posts as $post){
//         return $post->Title;
//     }
//     //return view('content', $posts);
// });

// route::get('/update', function(){
//     $posts = DB::update('update posts set Title = "PHP" where id = ?',[1]);

//     foreach($posts as $post){
//         return $post->Title;
//     }
//     //return view('content', $posts);
// });

// route::get('/delete',function(){
//     $delete = DB::delete('delete from posts where id=?',[1]);
//     return $delete;
// });



/*
|--------------------------------------------------------------------------
| Eloquent ORM
|--------------------------------------------------------------------------
|*/

// Reading / Finding and retrieving data

use App\Models\posts;

// route::get('/find',function(){
//     $results = posts::find(1);
//     return $results->Title;
// });

// route::get('/find_all',function(){
//     $result = posts::all();

//     foreach($result as $post){
//         return $post->Title;
//     }
    
// });

// route::get('/findwhere',function(){
//     $posts = posts::where ('id',2)->orderBy('id','desc')->take(1)->get();
//     return $posts->Title;
// });

// route::get('/findmore',function(){
//     $posts = posts::where ('user_id','<',50)->firstOrFail();
//     return $posts->Title;
// });


// // Inserting data from database using eloquent

// route::get('/basicinsert',function(){
//     $post = new posts();

//     $post->Title = "WOOW";
//     $post->Body = "This is a cool stuff";

//     $post->save();
    
// });

// route::get('/basicupdate',function(){
//     $post = posts::find(2);

//     $post->Title = "WOOW";
//     $post->Body = "This is a cool stuff";

//     $post->save();
    
// });

// Creating , Updating data and configuring mass assignment (IN MODEL)

route::get('/create',function(){
  posts::create(['Title'=>'This', 'Body'=>'is Haris']);
});

route::get('/newUpdate',function(){
    posts::where('id',2)->where('is_admin',0)->update(['Title'=>'this is an', 'Body'=>"updated Content"]);
});


//Deleting the posts using new methods
route::get('/delete',function(){
    $post = posts::find(5);
    $post->delete();
});


//Deleting multiple posts data.

route::get('/destroy',function(){
    
    posts::destroy([4,5]);  //Deleting multiple posts data.
});

//Soft Deleting

route::get('/softdelete',function(){
    $posts = posts::find(3);
    $posts->delete();
});


//Read SoftDeleted Items
route::get('/readsoftdelete',function(){
    $posts = posts::withTrashed()->where('id',3)->get();
    $posts = posts::onlyTrashed()->where('id',3)->get();
    return $posts;
});

//Restore SoftDeleted Item
route::get('/restore',function(){
    posts::withTrashed()->where('id',3)->restore();
});

//permanently Delete SoftDelete Item
route::get('/forceDelete',function(){
    posts::onlyTrashed()->where('id',3)->forceDelete();
});
