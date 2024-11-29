<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->where('user_approved','0')->get();
        return view('admin.pendingUser',['users'=>$users]);
    }


    public function approvedUser(string $id){
        $user_approve = DB::table('users')->where('id',$id)->update([
            'user_approved' => true,
            ]);
            if($user_approve){
                return redirect()->back()->with('success','User Approved Successful');
            }
            else{
                return redirect()->back()->with('error','User not approved');
            }
    }


    public function deleteUser(string $id){
        $user_delete = DB::table('users')->where('id',$id)->delete();
            if($user_delete){
                return redirect()->back()->with('success','User Delete Successful');
            }
            else{
                return redirect()->back()->with('error','User not delete');
            }
    }


    public function updateUser(string $id)
    {
        $user = DB::table('users')->where('id',$id)->first();
        return view('admin.updateUser',['user'=>$user]);
    }


    public function updateUserPost(Request $req, string $id)
    {
        $user = DB::table('users')->where('id',$id)->update([
            'name'=> $req->name,
            'mobile'=> $req->mobile,
            'division'=> $req->division,
            'email'=> $req->email,
        ]);
        if($user){
            return redirect()->back()->with('success','User Update Successful');
        }
        else{
            return redirect()->back()->with('error','User information not update');
        }
    }

    
    public function searchUser(Request $request)
    {
        $search = $request->input('search');
        
        $users = DB::table('users')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })->get();

        return view('admin.pendingUser', compact('users', 'search'));
    }
}
