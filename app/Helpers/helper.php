<?php
function getAdminName(){
        $adminName=Auth::user();
        // $adminName = \DB::table('users')
        //                 ->select('name')  
        //                 ->where('role_id',1)
        //                 ->first();
        return $adminName;
      }

?>