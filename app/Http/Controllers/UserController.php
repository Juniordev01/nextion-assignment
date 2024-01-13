<?php

namespace App\Http\Controllers;

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
        return $id;
    }
}
