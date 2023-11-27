@extends('layouts.admin')
@section('content')
<div class="card-body">
    <h1 style="text-align: center">Quản lý người dùng</h1>
    <hr>

    <h2>Danh sách người dùng</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$users ->links()}}
</div>
@endsection