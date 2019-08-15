<?php

namespace App\Http\Controllers;
 use App\post;
 use App\tag;
use App\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\coupon;
use App\store;
use App\color;
use App\size;
use App\detail;
use App\branche;
use DB;
use Auth;


use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
class postcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



        
   

  
    public function index()
    {
        return view('indexpost')->with('posts',post::all())->with('details',detail::all())->with('Branchs',Branche::all());
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
$branche = branche::all();
if($branche->count()==0){
return redirect()->route('branch.create');
}


        $categoreis = category::all();
        if($categoreis->count()==0){
return redirect()->route('category.add');
        }

        return view('post')->with('categoreis',category::all())->with('tags',tag::all())->with('Branchs',Branche::all());
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(request $request)
    {

        $this->validate($request,[
            "title"    => "required",
            "content"  => "required",
            "branchs_id"  => "required",
            
            "img1"  => "required|image",
         
        ]);
     
        if($request->hasFile('img1')){
            $image_tmp = Input::file('img1');
            if ($image_tmp->isValid()) {
                // Upload Images after Resize
                $extension = $image_tmp->getClientOriginalExtension();
                $fileName = rand(111,99999).'.'.$extension;
                $image_tmp->move('uploads/posts', $fileName);
             
                 
            }
        }
        $post = Post::create([
            "title"    => $request->title,
            "price"  => $request->price,
        "content"  => $request->content,
        "branchs_id"  => $request->branchs_id,
      "img1" => $fileName,
        'slug'=> str_slug($request->title),
      
       
       
        
        ]) ;
        

      
    
         
     
 

        return redirect()->back()->with('success_message', 'its done');


        }





public function findid($id){



}





public function addAttributes($id){
            
   
 $post= post::find($id);


      
    
   













//}

$title = "Add Attributes";




return view('details')->with(compact('title','post'));
}



public function ATTupdate(Request $request, $id)
    {
        $post = Post::find($id);
        $this->validate($request,[
           
            "sizes"  => "required",
            "quantity"  => "required" 
            
        ]);


$s = $request->sizes;


      $dl = new detail;
          $dl->post_id =  $id;
            $dl->sizes  = $s;
        $dl->quantity  = $request->quantity;
       
        $dl->save();
     

        return redirect()->back();
    }


    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */








    

    public function cart()
    {
      
        $Tax = config('cart.tax') / 100;

        if(Auth::check()){
            $user_email = Auth::user()->email;
           
            $user = DB::table('cart')->where(['user_email' => $user_email])->get()->count();     
            
            }else{
              $session_id = Session::get('session_id');
              $user = DB::table('cart')->where(['session_id' => $session_id])->get()->count();   
            }
    



        if(Auth::check()){
            $user_email = Auth::user()->email;
            $userCart = DB::table('cart')->where(['user_email' => $user_email])->get();     
        }else{
            $session_id = Session::get('session_id');
            $userCart = DB::table('cart')->where(['session_id' => $session_id])->get();    
        }
        
        foreach($userCart as $key => $product){
            $productDetails = post::where('id',$product->post_id)->first();
            $userCart[$key]->img1 = $productDetails->img1;
        }
       

        $total_amount = 0;
        foreach($userCart as $item){
           $total_amount = $total_amount + ($item->price * $item->quantity);
        }
        
        
                return view('cart')->with([
             
                    
                    'discount' => getNumbers()->get('discount'),
                    
                 
                   
                    
                    'code' => getNumbers()->get('code'),
                    'newtotal'=>getNumbers()->get('newtotal'),
                    'newSubtotal'=>getNumbers()->get('newSubtotal'),
                    'newTax'=>getNumbers()->get('newTax'),
                    'total'=>getNumbers()->get('total'),
                    ])->with('categories',category::all())->with(compact('userCart','user','$total_amount','Tax'))->with('Branchs',Branche::all());
                   
                
              

                  
            

}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $category= category::find($id);
        $post= post::find($id);
        return view('editpost')->with('posts',$post)->with('categoreis',category::all())->with('categoreis',category::all())->with('tags',tag::all())->with('Branchs',branche::all());
      
        
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
        $post = Post::find($id);
        $this->validate($request,[
            "title"    => "required",
            "content"  => "required",
            "branchs_id"  => "required" 
            
        ]);
        if (  $request->hasFile('featrued')  ) {
            $featured = $request->featrued;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts/',$featured_new_name);
        $post->featrued = 'uploads/posts/'.$featured_new_name;
        
        }
$post->title =  $request->title;
$post->content =  $request->content;
$post->branchs_id = $request->Branch_id;
$post->tags()->sync($request->tags);
$post->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= post::find($id);
        $post->delete();
        return redirect()->back()->with('success_message', 'its done');
    }


    public function trashed(){
        $post= post::onlyTrashed()->get();
        return view('softdelete')->with('post',$post);
       
        
    }

    public function hdelete($id){
        $post= post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        return redirect()->back()->with('success_message', 'its done');
       
        
    }

    public function restore($id){
        $post= post::withTrashed()->where('id',$id)->first();
        $post->restore();
        return redirect()->back()->with('success_message', 'its done');
       
        
    }
    

 
}
