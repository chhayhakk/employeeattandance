<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //
    public static function index(Request $request){
        $data = User::all();
        return view('user.user', ['data'=>$data]);
    }

    public static function index_create(Request $request){
        return view('user.create');
    }

    public function create(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = time().'@mail.com';
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->gender = $request->gender;
        $user->password = Hash::make($request->input('password'));
        $user->save();

//        if ($user->save()){
//            if (isset($request->profile)){
//                $imageName = time().'.'.$request->profile->extension();
//                $request->profile->move(public_path('images'), $imageName);
//                $user->profile = $imageName;
//                $user->save();
//            }
//        }

        return redirect(route('index_user'));
    }

    public static function confirm_delete(Request $request){
        $user_id = $request->query('id');
        $data = User::find($user_id);
        return view('user.confirm_delete', ['data'=>$data]);
    }

    public static function delete(Request $request){
        $user_id = $request->id;
        $data = User::find($user_id);
        if ($data){
            $data->delete();
            //$data->forceDelete();
        }
        return redirect(route('index_user'));
    }

    public static function index_update_user(Request $request){
        $user_id = $request->query('id');
        $data = User::find($user_id);
        return view('user.edit_user', ['data'=>$data]);
    }

    public function update(Request $request){
        $user = User::find($request->id);
        if ($user){
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->role = $request->role;
            $user->gender = $request->gender;
            $user->save();

            if($request->password != ''){
                $user->password = Hash::make($request->input('password'));
            }
        }

        return redirect(route('index_user'));
    }
    public function updateStatus(Request $request) {
        $user = User::find($request->input('id'));
        if ($user) {
            // Update user's status
            $user->status = $request->input('status');
            $user->save();
    
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 404);
    }
    public function searchUsers(Request $request)
    {
        $search = $request->query('search');

        // Perform the search query
        $data = User::where('name', 'like', '%' . $search . '%')
                    ->orWhere('phone', 'like', '%' . $search . '%')
                    ->orWhere('role', 'like', '%' . $search . '%')
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('user.user', ['data' => $data]);
    }    
    
    

}
