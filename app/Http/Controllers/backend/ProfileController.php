<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\User;
use Auth;
use File;
use Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $id=Auth::user()->id;
       return view('backend.profile.index',[
            'user_info' => User::findOrFail($id)
       ]);
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
       $user_id = Auth::user()->id;
       return view('backend.profile.edit',[
            'user_id' => User::findOrFail($user_id)
       ]);
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
        $user_info = User::findOrFail($id);
        $user_info->fill($request->all());
        if($request->hasFile('image')){
            if ($user_info->image != null){
                 $this->deleteFile($user_info->image);
            }
             $user_info->image = $request->file('image')
                ->move('public/upload/user_image/', str_random(40) . '.' . $request->image->extension());
        }

        if($user_info->save()){
            return redirect()->route('profile.index');
        }  
        
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

    public function viewPass(){
        return view('backend.profile.edit-password');
    }

    public function changePass(Request $request){

        if(Auth::attempt(['id' => Auth::user()->id , 'password' => $request->current_password])){
            $user_info = User::findOrFail(Auth::user()->id);
            $user_info->password = Hash::make($request->new_password);
            if($user_info->save()){
                return redirect()->route('profile.index');
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back(); 
        }

    }

    private function deleteFile($path)
    {
        File::delete($path);
    }
}
