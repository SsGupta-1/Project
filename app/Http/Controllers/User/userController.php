<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Userinfo;
use Toastr;

class userController extends Controller
{
    public function Dashboard(){
        if(Auth::user()->role_id==2){
            return view('User.Dashboard');
        }else{
            return back();
        }
        
    }

    public function usermanagement(){

        $data = Userinfo::all();

        return view('Admin.usermanagement',compact('data'));
    }

    public function adduser(Request $request){
        if($request->isMethod('post')){
            $validator=Validator::make($request->all(),[
                'name'=>'required',
                'email'=>'required|unique:userinfos',
                'address'=>'required',
            ]);
            if($validator->fails()){
                $messages = $validator->messages();
                foreach($messages->all() as $message){
                    Toastr::error($message, 'Failed', ['timeout' => 5000]);
                }
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();

            }else{
                $user = New Userinfo;
                $user->name = $request->name;
                $user->email = $request->email;
                if($request->hasfile('image'))
                    {
                        $file = $request->file('image');
                        $extenstion = $file->getClientOriginalExtension();
                        $filename = time().'.'.$extenstion;
                        $file->move('uploads/user/', $filename);
                        $user->image = $filename;
                    }
                $user->address = $request->address;
                $user->save();
                Toastr::success('User Added Successfully', 'Success');
                return redirect('usermanagement');
            }
        }

        return view('Admin.usermanagement');
    }

    public function deleteuser($id){
        Userinfo::where('id',$id)->delete();
        Toastr::success('User Successfully move to trash', 'Success');
        return redirect('usermanagement');
    }

    public function edituser(Request $request , $id){
        if($request->isMethod('post')){
            $validator=Validator::make($request->all(),[
                'name'=>'required',
                'email'=>'required',
                'address'=>'required',
            ]);
            if($validator->fails()){
                $messages = $validator->messages();
                foreach($messages->all() as $message){
                    Toastr::error($message, 'Failed', ['timeout' => 5000]);
                }
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();

            }else{
                $user=Userinfo::find($id);
                // $data=$request->all();
                $user->name = $request->name;
                $user->email= $request->email;

                if($request->hasfile('image'))
                {
                    $file = $request->file('image');
                    $extenstion = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extenstion;
                    $file->move('uploads/user/', $filename);
                    $user->image = $filename;
                }
                $user->address = $request->address;
                $user->save();
                Toastr::success('User Updated Successfully ','Success');
                return redirect('usermanagement');
            }
        }
            $user=Userinfo::find($id);
            return view('Admin.usermanagement',compact('user'));
    }
    
    public function trashuser()
    {
        $data=Userinfo::onlyTrashed()->get();
        return view('Admin.Trash-user',["data"=>$data]);
    }
    public function restoreuser($id){
        $user= Userinfo::withTrashed()->find($id);
        if(!is_null($user)){
            $user->restore();
        }
        Toastr::success('User restore Successfully ','Success');
        return back();
        //return redirect('usermanagement');
    }

    public function forceDelete($id){
        $user = Userinfo::withTrashed()->find($id);
        if(!is_null($user)){
            $user->forceDelete();
        }
        Toastr::success('User deleted Successfully ','Success');
        return redirect('usermanagement');
    }



}
