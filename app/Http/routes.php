<?php

use App\Tag;
use App\Post;
use App\User;
use App\Photo;
use App\Country;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});


Route::get('/', function () {
    return view('welcome');
    // return "Hi You";
});

// Route::get('/about', function () {
//     // return view('welcome');
//     return "Hi I am about";
// });

// Route::get('/contact', function () {
//     // return view('welcome');
//     return "Hi I am contact";
// });


// // Route::get('/post/{id}/{name}', function ($id, $name) {
// //     // return view('welcome');
// //     return "This is post number ".$id. " and name is ".$name;
// // });


// Route::get('admin/posts/example', array('as'=>'admin.home', function () {
//     $url = route('admin.home');
//     return "This url is ". $url;
// }));



// Route::get('post', 'PostsController@index');

// Route::get('post/{id}', 'PostsController@index');


/*
|--------------------------------------------------------------------------
| DATABASE Raw SQL Queries
|--------------------------------------------------------------------------
|
*/
// Route::get('/insert', function(){
//     DB::insert('insert into posts(title, content) values (?,?)', ['PHP with laravel', 'Laravel is best thing that happened to PHP']);
// });

// Route::get('/read', function(){
//     $results = DB::select('select * from posts where id = ?', [1]);
//     // dd($results);
//     // return $results;
//     foreach ($results as $post) {
//         return $post->title;
//     }
//     });

// Route::get('/update', function(){
//     $updated = DB::update('update posts set title = "Updated title" where id = ?', [1]);
//     // dd($results);
//     return $updated;
//     });

    // Route::get('/delete', function(){
    //     $deleted = DB::delete('delete from posts where id = ?', [1]);
    //     // dd($results);
    //     return $deleted;
    //     });

/*
|--------------------------------------------------------------------------
| ELOQUENT
|--------------------------------------------------------------------------
|
*/
// // Route::get('/find', function(){
// //     // $posts = Post::all();
// //     // foreach ($posts as $post) {
// //     //     return $post->title;
// //     // }
// //     $post = Post::find(2);
// //     return $post->title;
// // });

// Route::get('/findwhere', function(){
//     $posts = Post::where('id', 3)->orderBy('id', 'desc')->take(1)->get();
//     // foreach ($posts as $post) {
//     //     return $post->title;
//     // }
//     return $posts;
// });

// // Route::get('/findmore', function(){
// //     // $posts = Post::findOrFail(1);
// //     // return $posts;

// //     $posts = Post::where('users_count', '<', 50)->findOrFail();
// // });

// Route::get('/basicinsert', function(){
//     $post =new  Post;
//     $post->title = "new Eloquent title insert";
//     $post->content = "Wow Eloquent is very cool, look at this content";
//     $post->save();
// });
// // Route::get('/basicinsert2', function(){
// //     $post = Post::find(2);
// //     $post->title = "new Eloquent title insert 2";
// //     $post->content = "Wow Eloquent is very cool, look at this content 2";
// //     $post->save();
// // });


// Route::get('/create', function(){
//     $post = Post::create([
//         'title' => 'the create method',
//         'content' => 'Wow i\'m learning alot with Edwin Diaz'
//     ]);
// });

// Route::get('/update', function(){
//     Post::where('id',2)->where('is_admin', 0)->update([
//         'title' => 'NEW PHP TITLE',
//         'content' => 'I love my instructor Edwin',
//         ]);
// });

// Route::get('/delete', function(){
//     $post = Post::find(2);
//     $post->delete();
// });

// Route::get('/delete2', function(){
//     // Post::destroy(3); // single delete
//     Post::destroy([4,5]); // Multiple delete
//     // Post::where('id',2)->where('is_admin', 0)->delete(); //delete by query
// });

// Route::get('/readsoftdelete', function(){
//     // $post = Post::find(1); // read soft delete
//     // return $post; //not found as it is deleted
    
//     // $post = Post::withTrashed()->where('id', 1)->get(); // read soft delete
//     // return $post; 

//     $post = Post::onlyTrashed()->where('is_admin', 0)->get();
//     return $post; 
// });

// Route::get('/restore', function(){

//     Post::withTrashed()->where('is_admin', 0)->restore(); // restore soft delete
// });
// // Route::get('/forcedelete', function(){

// //     Post::withTrashed()->where('is_admin', 0)->forceDelete(); // force delete
// // });

// Route::get('/forcedelete', function(){

//     Post::onlyTrashed()->where('is_admin', 0)->forceDelete(); // force delete
// });

/*
|--------------------------------------------------------------------------
| ELOQUENT Relationships
|--------------------------------------------------------------------------
|
*/

// // One to One relationship
// Route::get('/user/{id}/post', function($id){
//     // return User::find($id)->post;
//     // return User::find($id)->post->title;
//     return User::find($id)->post->content;
// });


// Route::get('/post/{id}/user', function($id){
//     return Post::find($id)->user;
// });

// //  One to Many relationships
// Route::get('/posts', function(){
//     $user =  User::find(1);

//     foreach ($user->posts as $post) {
//         echo $post->title."<br>";
//     }

// });

// //  Many to Many relationships
// Route::get('/user/{id}/role', function($id){

//     $user =  User::find($id)->roles()->orderBy('id', 'desc')->get();
//     return $user;
//     // $user =  User::find($id);

//     // foreach ($user->roles as $role) {
//     //     echo $role->name."<br>";
//     // }

// });


// // Access the intermediate table / pivot

// Route::get('/user/pivot', function(){

//     $user =  User::find(1);

//     foreach ($user->roles as $role) {
//         echo $role->pivot->created_at;
//     }

// });

// // HasManyThrough relationships
// Route::get('/user/country', function(){

//     $country =  Country::find(2);

//     foreach ($country->posts as $post) {
//         echo $post->title;
//     }

// });

// // Polymorphic relationships
// Route::get('user/photos', function(){

//     $user =  User::find(1);

//     foreach ($user->photos as $photo) {
//         return $photo->path;
//     }

// });
// Route::get('post2/{id}/photos', function($id){

//     $post =  Post::find($id);
// // dd($post->photos);
//     foreach ($post->photos as $photo) {
//         echo $photo->path. "<br>";
//     }

// });
// // Inverse Polymorphic relationships
// Route::get('photo/{id}/post', function($id){

//     $photo =  Photo::findOrFail($id);
//     // dd($photo->imageable);
//     return $photo->imageable;

// });
// // Many To Many Polymorphic relationships
// Route::get('/post3/tag', function(){

//     $post =  Post::findOrFail(1);
//     foreach ($post->tags as  $tag) {
//         echo $tag->name;
//     }

// });

// Route::get('/tag/post', function(){

//     $tag =  Tag::findOrFail(2);
//     foreach ($tag->posts as  $post) {
//         echo $post->title;
//     }

// });

// Route::get('/tag/post1', function(){

//     $tag =  Tag::findOrFail(1);
//     foreach ($tag->videos as  $post) {
//         echo $post->name;
//     }

// });
/*
|--------------------------------------------------------------------------
| Crud Application
|--------------------------------------------------------------------------
|
*/

// Route::group(['middleware' => ['web']], function(){ 
    //Commenting (Route::group(['middleware'=>) because it is not supported laravel version above 5.2.28 And this laravel App version 5.2.45
    Route::resource('/posts', 'PostsController');
// });
Route::get('/dates', function(){
    $date = new DateTime('+1 week');
    echo $date->format('m-d-Y');
    echo '<br>';
    echo Carbon::now()->addDays(10)->diffForHumans();

    echo '<br>';
    echo Carbon::now()->subMonths(5)->diffForHumans();

    echo '<br>';
    echo Carbon::now()->yesterday()->diffForHumans();

    echo '<br>';
    echo Carbon::now()->yesterday();
});

Route::get('/getname', function(){ //Accessors
    $user = User::find(1);
    return $user->name;
});

Route::get('/setname', function(){ //Mutators
    $user = User::find(1);
    $user->name = "william";
    $user->save();
});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
*/
// Route::group(['middleware' => ['web']], function(){
    //This Route::group works till laravel version 5.2.28
// });