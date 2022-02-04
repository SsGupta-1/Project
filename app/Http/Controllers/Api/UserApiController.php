<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;
use App\Userinfo;
use App\File;
use Carbon\Carbon;
use Hash;

class UserApiController extends Controller
{
    public function store(Request $request){

        $rules = [
            'name'    => 'required|regex:/(^([a-zA-z]+)(\d+)?$)/u',
            'address' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'image'   => 'required|image:jpeg,png,jpg,gif,svg|max:2048',
            'email'   => 'required|email:rfc,dns|max:32|email|unique:userinfos,email', 
            
        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return response()->json($validator->errors()->first(),401); // 400 = Bad Request
        }
        $user = new Userinfo;

        $user-> name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        if($request->hasfile('image'))
            {
                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move('uploads/user/', $filename);
                $user->image = $filename;
            }
        $user->save();
        return response()->json(['message'=> 'user added successfully'], 200);

    }

    public function getuser(){
        $user = Userinfo::paginate(7);
        return response()->json($user,200); //200 = status ok
    }

    public function getuserbyId($id){
        $data = Userinfo::find($id);
        if(is_null($data)){
            return response()->json(["Massage" => "User Records Not Found!"], 404); // 404 = Not Found
        }
        return response()->json($data, 200); //ok
    }

    public function updateuser(Request $request ,$id){

        $rules = [
            'name'    => 'required|regex:/(^([a-zA-z]+)(\d+)?$)/u',
            'address' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'image'   => 'required|image:jpeg,png,jpg,gif,svg|max:2048',
            'email'   => 'required|email:rfc,dns|max:32|email|unique:userinfos,email', 
            
        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return response()->json($validator->errors()->all(),400); // 400 = Bad Request
        }

        $user = Userinfo::find($id);
        if(is_null($user)){
            return response()->json(["Massage" => " User Records Not Found!"], 404); // 404 = Not Found
        }
        $user-> name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        if($request->hasfile('image'))
            {
                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move('uploads/user/', $filename);
                $user->image = $filename;
            }
            $user->update();
        //$user->update($request->all());
        return response()->json($user , 200);
    }


    public function deleteuser(Request $request, $id){
        $data = Userinfo::find($id);
        if(is_null($data)){
            return response()->json(["Massage" => " User Records Not Found!"], 404); // 404 = Not Found
        }else{
            $data->delete();
            return response()->json(["Massage" => "User Records Deleted!"], 200);  // 204 = status No Content
        }
       
    }


    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [ 
       
        'file' => 'required|mimes:doc,docx,pdf,txt|max:2048',
       ]);   

        if ($validator->fails()) {          
            return response()->json(['error'=>$validator->errors()], 401);                        
        }  
       $files = $request->file->store('public/files/');

       $data = new File;
       $data->name = $request->file->hashName();
       $data->path = $files;
       $result = $data->save();

       if($result){
        return response()->json(["Massage" => "file added sucessfuly!"], 200);
       }else{
        return response()->json(["Massage" => " file not added sucessfuly!"], 404);
       }
       
  
    }


    public function register(Request $request){

        $rules = [
            'name'    => 'required|regex:/(^([a-zA-z]+)(\d+)?$)/u',
            'email'   => 'required|email:rfc,dns|max:32|email|unique:users,email', 
            'password' => 'required|string|min:4|confirmed'
        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return response()->json($validator->errors()->all(),400); // 400 = Bad Request
        }
        $user = new User;
           $user->name = $request->name;
           $user->email = $request->email;
           $user->password =  Hash::make($request->password);
           $user->save();

        $tokenResult = $user->createToken('my token');
        $token = $tokenResult->token;
        $token->save();
        return response()->json([ 
            'message' => 'Successfully created user!' ,
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer'
        ], 201);  
        
    }


    public function login(Request $request){

        if(Auth('api')->check()){
            return response()->json([ 'message' => 'you are already login' ], 401);
        }
        else{

        $rules = [
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return response()->json($validator->errors(),400); // 400 = Bad Request
        }
        
            $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([ 'message' => 'Unauthorized! Your Credentials not match' ], 401);

        $user = $request->user();
       
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->AddDays(2);
        $token->save();

        return response()->json([
            'message' => 'Successfully Login!',
          
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
            ]);

        }
        
    }

    public function logout(Request $request){

        $token = $request->user()->token();

        if(Auth::user()->token()){
            $token->revoke();
        
        return response()->json([
            'message' => 'Successfully logged out',  
        ]);

        }else{
            return response()->json([
                'message' => 'you are not login',
             
            ]);

        }
        
        
       
    }


    
}
