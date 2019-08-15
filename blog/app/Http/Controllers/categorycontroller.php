<?php

namespace App\Http\Controllers;
use App\category;
use App\Branche;

use Illuminate\Http\Request;

class categorycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index')->with('categoreis',category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);
        $category = new Category; 
       $category->name = $request->name;
        $category->save();
         
        return redirect()->back();
        
        
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category =  Category::find($id);
        return view('layouts.edit')->with('category',$category);

        $categories = Category::all();
        if ($categories->count() ==0   ) {
             
            return redirect()->route('category.create') ;
            
        }

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
        $category= category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category= category::find($id);
        $category->delete();
        return redirect()->route('category')->with('success_message', 'its done');
    }



    public function Branche(){

        return view('Branchindex')->with('categories',category::all())->with('Branchs',Branche::all());
        
            }
        


    public function branchcreate(){
        $category = category::all();
if($category->count()==0){
return redirect()->route('category.add');
}

return view('Branchecreate')->with('categories',category::all());

    }

    public function Branchestore(request $request){
    $this->validate($request,[
        'Branch' => 'required',
        'category_id' => 'required'
    ]);


    
    Branche::create([
        "Branch"    => $request->Branch,
      
    "category_id"  => $request->category_id,

  

    
    ]) ;
    


    return redirect()->route('branch')->with('success_message', 'its done');
    }


    public function dele($id)
    {
        $cb= Branche::find($id);
        $cb->delete();
        return redirect()->route('branch')->with('success_message', 'its done');
    }


    public function branchedit($id)
    {
        $Branche =  Branche::find($id);
        return view('Brancheedit')->with('Branches',$Branche)->with('categories',category::all());

        $Branche = Branche::all();
        if ($Branche->count() ==0   ) {
             
            return redirect()->route('Branch.create') ;
            
        }

    }
    public function Branchupdate(Request $request, $id)
    {
        $category= Branche::find($id);
        $category->Branche = $request->Branche;
        $category->save();
        return redirect()->route('Branch');
    }


}
