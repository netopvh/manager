<?php

namespace App\Domains\Access\Controllers;

use App\Core\Http\Controllers\Controller;
use App\Domains\Access\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
    }

}
