@extends('layouts.app')
@section('title', 'Edit User')

@section('content')
<form action="{{ route('user.update', $edit->id) }}" method="post">
    @if (session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>

    @endif
    @csrf
    @method('PUT')
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="" class="form-label">Nama Lengkap</label>
        </div>
        <div class="col-sm-5">
            <input required type="text" class="form-control" name="name" placeholder="Nama Lengkap" value="{{ $edit->name }}">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="" class="form-label">Email</label>
        </div>
        <div class="col-sm-5">
            <input required type="email" class="form-control" name="email" placeholder="Email" value="{{ $edit->email }}">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="" class="form-label">Password</label>
        </div>
        <div class="col-sm-5">
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="" class="form-label">Konfirmasi Password</label>
        </div>
        <div class="col-sm-5">
            <input type="password" class="form-control" name="konfirmasi_password" placeholder="Password">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-10">
           <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
    </div>
</form>
@endsection
