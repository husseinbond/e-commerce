<?php

namespace App\Http\Controllers;
use App\user;
use App\profile;
use App\permission;
use App\Role;
use Illuminate\Http\Request;

class userscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('users')->with('users',user::all())->with('profiles',profile::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createusers');
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
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            
        ]);
        


$data_request = $request->except([
    
    'Confirm Password',
    'password',
    'permission']);
    $data_request['password'] =  bcrypt($request->password);

        $user = User::create(

            $data_request);


            $user->Role()->attachRole('admin');
           
            $Permission = Permission::create(
                
                ['permission'=>$request->permission]);
            


    //     $admin =  Role::where('name', 'admin')->first();
    //     $owner =  Role::where('name', 'owner')->first();
    //     $editUser =  Permission::where('name', 'edit-user')->first();
    //     $createPost =  Permission::where('name', 'create-post')->first();
        
        
        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatar/1.png'
        ]);
      
   
    return redirect()->route('users');
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
        $tag = Tag::find($id);
        return view('useredit'->with('users',$tag));
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
        $user->permisson->syncPermissions($request->permission);
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
        $user=user::find($id);
        $user->profile->delete();
        $user->delete();
        $user->save();
        return redirect()->route('users');
    }


public function notadmin($id)
{
    $user=user::find($id);
    $user->admin=0;
   
    $user->save();
    return redirect()->route('users');
}

public function makeadmin($id)
{
    $user=user::find($id);
    $user->admin=1;
   
    $user->save();
    return redirect()->route('users');
}
}
