<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Tag;

class PostsController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth')->except(['index','show']);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::latest()
        ->filter(request(['month','year']))
        ->get();

        return view('posts.index',compact('posts'));
    }

    
    public function show(Posts $post)
    {
        //dd($post);
        $mode = \Request::route()->getName();
        if($mode == 'updatePost'){
            $post->setAttribute('update', true);
        }
        
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Posts $post)
    {

        $tags = Tag::all();
        return view('posts.create',compact('post','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'txtTitle'=>'required',
            'txtDescription'=>'required',
            'selTags'=>'required'
        ]);

        $post = Posts::create([
            'title'=>request('txtTitle'),
            'body'=>request('txtDescription'),
            'user_id'=>auth()->id()
        ]);

        foreach($request->selTags as $tag){
            \DB::table('posts_tag')->insert([
                'posts_id' => $post->id,
                'tag_id' => $tag
            ]);
        }

        session()->flash('message','Your post has been published!');

        return redirect('/');
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
        $this->validate(request(),[
            'txtTitle'=>'required',
            'txtDescription'=>'required'
        ]);

        $post = Posts::find($id);

        $post->title = $request->txtTitle;

        $post->body = $request->txtDescription;

        $post->save();

        return redirect('/');
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

        $post = Posts::find($id);

        $post->delete();

        return redirect('/');
        
    }
}
