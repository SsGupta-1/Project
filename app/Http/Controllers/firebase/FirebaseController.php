<?php

namespace App\Http\Controllers\firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;
use Toastr;

class FirebaseController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'students';
    }

    public function firebasemanagement(){

        $data = $this->database->getReference($this->tablename)->getValue();

        return view('firebase.firebasemanagement',compact('data'));
    }

    public function store(Request $request){
        $postData = [
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
        ];
        $postRef = $this->database->getReference($this->tablename)->push($postData);
        if($postRef)
        {
            Toastr::success('Student Added Successfully', 'Success');
            return redirect('firebasemanagement');
        }else{
            Toastr::error('Student Not Added ', 'Failed');
            return redirect('firebasemanagement');

        }

    }

    
}
