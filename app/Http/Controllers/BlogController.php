<?php

namespace App\Http\Controllers;

use Wink\WinkTag;
use Wink\WinkPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function home()
    {
        $tags = WinkTag::with('posts')->orderBy('created_at', 'DESC')->get();
        $posts = WinkPost::with('tags')->live()->orderBy('publish_date', 'DESC')->simplePaginate(10);
        return view('welcome', compact('posts', 'tags'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = WinkTag::with('posts')->orderBy('created_at', 'DESC')->get();
        $posts = WinkPost::with('tags')->live()->orderBy('publish_date', 'DESC')->simplePaginate(10);
        return view('pages.index', compact('posts', 'tags'));
    }

    public function search(Request $request)
    {
        if($request->has('search')){
    		$posts = WinkPost::search($request->get('search'))->get();	
    	}else{
            $posts = WinkPost::with('tags')->live()->orderBy('publish_date', 'DESC')->simplePaginate(10);
    	}

        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $tags = WinkTag::with('posts')->orderBy('created_at', 'DESC')->get();
        $post = WinkPost::where('slug', $slug)->first();
        $posts = WinkPost::with('tags')->live()->orderBy('publish_date', 'DESC')->simplePaginate(10);
        return view('pages.show', compact('post', 'posts', 'tags'));
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
        //
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
    }
}
