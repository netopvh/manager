<?php

namespace App\Domains\Access\Controllers;

use App\Core\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Access\Models\User;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::query()->select('id','name','email')->get()->toJson();

        return view('users.index', compact('users'));
    }

    public function store(Request $request)
    {
        User::create($request->all());

        return redirect()->back();
    }

    public function show($id)
    {
        return User::find($id);

    }

}
