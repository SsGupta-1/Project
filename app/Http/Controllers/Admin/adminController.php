<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use App\Userinfo;
use Auth; 
use Validator;
use Toastr;
use Hash;

class adminController extends Controller
{
    public function login()
    {
        return view('index');
    }

    public function loginpost(Request $request){
         $validator= Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required'
         ]);
         if($validator->fails()){
             $messages = $validator->messages();
            foreach($messages->all() as $message){
                Toastr::error($message, 'Failed', ['timeOut' => 5000]);
            }
            return redirect()->back()
              ->withErrors($validator)
              ->withInput();
        }else{
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                if((Auth::user()->role_id==1)){
                    $user = Auth::user();
                    //  $success['token'] = $user->createToken('MyApp')->accessToken;
                    Toastr::success('Login Successfully ','Success');
                    return redirect('dashboard');

                }elseif((Auth::user()->role_id==2)){
                    // $user = Auth::user();
                    Toastr::success('Login Successfully ','Success');
                    return redirect('Dashboard');
                }else{
                    Toastr::error('Unauthorised.','Failed');
                    return redirect('login');
                }
         
        }
            else{
                Toastr::error('Please enter valid credentials.','Failed');
                return redirect('login');
            }
        }
        
    }

  public function register(Request $req)
    {

        if($req->isMethod('post')){
            $user = new User;
            $user->name=$req->input('name');
            $user->email=$req->input('email');
            $user->password=Hash::make($req->input('password'));
            $user->save();

        }else{
          
         return view('register');
        }
      
}
 

    public function dashboard(){

        if(Auth::user()->role_id==1){
            $usercount = Userinfo::count();
            return view('Admin.dashboard',compact('usercount'));
        }else{
            return back();
        }
        
    }

    public function change_password(Request $request){
        $id = Auth::user()->id;
        //echo $id;die;
        $user = User::findOrFail($id);
        if($request->isMethod('post')){
         
           // echo $user->password;die;
              if (Hash::check($request->current_password, $user->password)) { 
                $user->fill([
                'password' => Hash::make($request->password)
                ])->save();
               // echo "Hello";die;
            
                Toastr::success('Password Changed', 'Success', ['options']);
                return redirect('change_password');
            
            } else {
             // echo "fail";die;
              Toastr::error('failed', 'Failed', ['timeOut' => 10000]);
                return redirect()->route('change_password');
            }
          
        
         }else{
          
          return view('Admin.change-password');
         }
  
          
          
      }

    
    public function logout(){
        
        Auth::logout();
        // Session::flush();
        // Cache::flush();
        return redirect('/login');
    
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function Callback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();

        //$user = Socialite::driver($provider)->user();
          // dd($user);
      // return $user->token;
     // }

        $getuser = User::where('email',$user->email)->first();
        if($getuser){
            Auth::login($getuser);
           return redirect('dashboard');
        }else{
            $newuser = New User;

            $newuser->name =$user->name;
            $newuser->email =$user->email;
            $newuser->password =uniqid();
            $newuser->save();

            Auth::login($newuser);
            return redirect('dashboard');
        }

    }
}
