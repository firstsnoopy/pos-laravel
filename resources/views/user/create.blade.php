@extends('layouts.app')
@section('title', 'Tambah User')

@section('content')
    <form action="{{ route('user.store') }}" method="post">
        @csrf
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="mb-3 row">
            <div class="col-sm-2">
                <label for="" class="form-label">Nama Lengkap</label>
            </div>
            <div class="col-sm-5">
                <input required type="text" class="form-control" name="name" placeholder="Nama Lengkap"
                    value="{{ old('name') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-2">
                <label for="" class="form-label">Email</label>
            </div>
            <div class="col-sm-5">
                <input required type="email" class="form-control" name="email" placeholder="Email"
                    value="{{ old('email') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-2">
                <label for="" class="form-label">Password</label>
            </div>
            <div class="col-sm-5">
                <input required type="password" class="form-control" name="password" placeholder="Password">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-2">
                <label for="" class="form-label">Konfirmasi Password</label>
            </div>
            <div class="col-sm-5">
                <input required type="password" class="form-control" name="konfirmasi" placeholder="Password">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-10">
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </div>
    </form>
@endsection
