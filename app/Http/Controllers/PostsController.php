<?php

namespace App\Http\Controllers;


use App\Post;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $posts = Post::all();
        // $posts = Post::latest()->get();
        // $posts = Post::orderBy('id','desc')->get();
        // $posts = Post::orderBy('id','asc')->get();
        $posts = Post::latest();
        // dd($posts);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        //
        // return $request->all();
        // $title = $request->get('title');
        // $title = $request->title;
        // return $title;
        // $this->validate($request, [ //this is used when store(Request $request)
        //     'title'=>'required',
        // ]);
        // Post::create($request->all());
        // return redirect('/posts');

        // $input = $request->all();
        // $input['title'] = $request->title;
        // Post::create($input);

        // $post = new Post;
        // $post->title = $request->title;
        // $post->save();

        // File Upload
        // $file = $request->file('fileToUpload');
        // echo "<br>";
        // echo $file->getClientOriginalName();
        // echo "<br>";
        // echo $file->getClientSize();
        $input = $request->all();
        if($file = $request->file('fileToUpload')){
            $name = $file->getClientOriginalName();
            $file->move('images', $name);
            $input['path'] = $name;
        }
        Post::create($input);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // $post = Post::whereId($id)->delete();
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/posts');
    }

    public function contact()
    {
        return view('contact');
    }
}
