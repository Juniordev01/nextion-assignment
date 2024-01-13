<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class UserController extends Controller
{
    //

    public function index()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/users');
        $users = $response->json();
        $perPage = 5;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($users, ($currentPage - 1) * $perPage, $perPage);

        $users = new LengthAwarePaginator($currentItems, count($users), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        return view('page.user',compact('users'));
    }

    public function profile($id)
    {
        $user = User::findorfail($id);
        if($user)
        {
            return view('page.profile',compact('user'));
        }
    }

    public function updateProfile(Request $request,$id)
    {
        $user = User::findorfail($id);
        if($user)
        {
            $user->name = $request->name != null ? $request->name : $user->name;
            $user->number = $request->number !=null ? $request->number:$user->number;
            $user->city = $request->city !=null ? $request->city : $user->city;
            $user->address = $request->address !=null ? $request->address:$user->address;
            $user->zip = $request->zip !=null ? $request->zip:$user->zip;
            $user->update();
            return redirect()->route("view_profile",$id)->with('success','Update Successfully!');
        }
    }
}
