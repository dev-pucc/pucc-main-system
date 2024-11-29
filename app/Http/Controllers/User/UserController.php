<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //users list method START

    public function users(Request $request){

        $query = $request->input('search');

        if(!empty($query)){
            $users = DB::table('users')
                    ->when($query, function ($q) use ($query) {
                        $q->where('club_id', 'LIKE', "%$query%");
                    })
                    ->get();
        } else {
            $users = DB::table('users')
                    ->where('user_approved','1')
                    ->get();
        }

        return view('users.users', compact('users'));
    }

    //users list method END




    //users Edit method START

    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        if (!$user) {
            abort(404, 'User not found');
        }
        return view('users.edit', compact('user'));
    }

    //users EDIT method END




    //users update method START

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'mobile' => 'required|digits:11',
            'club_id' => 'required',
        ]);

        $updated = DB::table('users')
            ->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'club_id' => $request->input('club_id'),
                'updated_at' => now(),
            ]);

        if ($updated) {
            return redirect()->route('users')->with('success', 'User updated successfully!');
        } else {
            return back()->with('error', 'Failed to update the user. Please try again.');
        }
    }

    //users update method END




    //users DELETE method START

    public function destroy($id)
    {
        $deleted = DB::table('users')->where('id', $id)->delete();

        if ($deleted) {
            return redirect()->route('users')->with('success', 'User deleted successfully!');
        } else {
            return back()->with('error', 'Failed to delete the user. Please try again.');
        }
    }

    //users DELETE method END





    //user Pending method START

    public function pendingUsers(){

        $pending_users = DB::table('users')
                ->where('user_approved','0')
                ->get();

        return view('users.pending',compact('pending_users'));
    }

    //user Pending method END



    
    //users profile method START

    public function profile($id){

        $user=DB::table('users')->where('id',$id)->first();

        if(!$user){
            abort(404,'User not found');
        }

        return view('users.profile',compact('user'));
    }

    //users profile method END

}
