<?php

namespace App\Http\Controllers;
use Auth;
use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $id = Auth::id();
       // return dd($id);
          if ($user->profile == null) {
             $profile =  Profile::create([
            'user_id' => $id,
            'avatar' => 'uploads/avatar/1'
             ]);
             }

    return view('profile.indexprofile')->with('user',Auth::user());

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
        $user = auth::user();
        if($request->hasfile('avatar')){
            $avatar=$request->avatar;
            $new_avatar=time().$avatar->getClientOringialName();
            $avater='uploads/avatar/'.$new_avatar;
            $user->profile->avatar = 'uploads/avatar/'.$new_avatar;
            $user->profile->save();
        }
       
$user->name = $request->name;
$user->email = $request->email;
$user->profile->facebook = $request->facebook;
$user->profile->twiter = $request->twiter;
$user->profile->about = $request->about;
$user->profile->save();
if($request->hasfile('password'))
{
    $user->password = bcrypt($request->password);
    $user->password->save();

}
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
        //
    }
}
