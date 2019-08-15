<?php

namespace App\Http\Controllers;
use App\user;
use App\tag;
use App\category;
use App\post;
use Illuminate\Http\Request;

class searchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $post = post::where('title','like','%'.request('search').'%')->get();
        return view('resultes')
        ->with('tags' , tag::all() ) 
                             
                             
                              
                             ->with('posts' , $post)

                             ->with('title' , 'Result : '. request('search'))
                                
                            ->with('categories' , Category::take(5)->get() )  
                            ->with('query' , request('search') )   ;
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
    public function counter()
    {
       
        
        return view('counter') 
                             
        ->with('tags_count' , Tag::all()->count() ) 
        ->with('post_count' , Post::all()->count() )
        ->with('users_count' , User::all()->count())
        ->with('categories_count' , Category::all()->count())
       ->with('trashed_count' , Post::onlyTrashed()->get()->count())  ;
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
