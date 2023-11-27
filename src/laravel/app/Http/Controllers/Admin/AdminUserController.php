<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Pagination\Paginator;

class AdminUserController extends Controller
{
    public function index()
    {
        Paginator::useBootstrap();
        $users = User::where('role_as', '0')->paginate(5);
        return view('admin.users.index', ['users'=> $users])
        ->extends('layouts.admin')
        ->section('content');
    }
}