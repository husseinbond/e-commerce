<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\tag;
use App\category;
use App\post;
use App\detail;
use App\Branche;
use DB;
use Auth;
use Session;
class ulController extends Controller

{
  

    public function __construct(){
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        

      
$post = post::all();
$details = detail::all();

$postDetails = detail::all();


       return view('enterface')
      
    
    ->with('categories',category::all())
    ->with('Branchs',Branche::all())
    
    ->with(compact('postDetails','productAz'))
    ->with('first_post',post::orderBy('created_at','desc')->take(1)->get()->first())
    ->with('second_post',post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
    ->with('third_post',post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
    ->with('fourth_post',post::orderBy('created_at','desc')->skip(3)->take(1)->get()->first())
    ->with('fourth_post',post::orderBy('created_at','desc')->skip(3)->take(1)->get()->first());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shop($name)
    {
       

        $category      = category::where('name' , $name)->first();
        
        

        return view('categories')->with(compact('category','Branch','Branch2'))->with('categories',category::all())->with('Branchs',Branche::all())->with('name' , $category->name)->with('id',$category->id)->with('posts',post::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Branch($name,$id)
    {
        if(Auth::check()){
            $user_email = Auth::user()->email;
           
            $user = DB::table('cart')->where(['user_email' => $user_email])->get()->count();     
            
            }else{
              $session_id = Session::get('session_id');
              $user = DB::table('cart')->where(['session_id' => $session_id])->get()->count();   
            }

        $category     = category::where('name', $name)->first();
        $Branch  = Branche::where('id',$id)->first();
$id = $category->id;
       $name = $category->name;
       $Branchname= $Branch->Branch;
     $ids=    $Branch->id;
       $posts = post::all();
        return view('small')->with(compact('Branchname','name','id','posts','ids','user'))->with('categories',category::all())->with('Branchs',Branche::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPost($name,$id ,$slug)
    {
        

        $category     = category::where('name', $name)->first();
        $Branch  = Branche::where('id',$id)->first();

        $post      = Post::with('details')->where('slug' , $slug)->first();
        $total_stock = detail::where('post_id',$id)->count('quantity');

   

        $id = $category->id;
        $name = $category->name;
        $Branchname= $Branch->Branch;
      $ids=    $Branch->id;
     
        $next_page = Post::where('id' , '>' ,$post->id)->min('id');
        $prev_page = Post::where('id' , '<' ,$post->id)->max('id');
        return view('showpost') 
                             
        
                             ->with('tags' , Tag::all() ) 
                             
                             ->with('spost' , post::where('id', '!=', $id)->take(5)->get() )
                              ->with('prv',post::find($prev_page))
                              ->with('next',post::find($next_page))
                             ->with('post' , $post)

                             ->with('title' , $post->title)
                             ->with('img1' , $post->img1)
                                
                            ->with('categories' , Category::all() )->with(compact('post', 'total_stock','Branchname','ids','name'))->with('Branchs',Branche::all()) ;

                            
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
