@extends('layouts.app')
@section('title', 'Add Category')

@section('content')
    <form action="{{ route('category.store') }}" method="post">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @csrf
        <div class="mb-3 row">
            <div class="col-sm-2">
                <label for="" class="form-label">Nama Kategori</label>
            </div>
            <div class="col-sm-5">
                <input required type="text" class="form-control" name="category_name">
                {{-- <select required class="form-control" name="category_name" value="{{ $edit->category_name }}">
                    <option value="">Pilih Kategori</option>
                    <option value=""></option>
                </select> --}}
            </div>
        </div>
        {{-- <div class="mb-3 row">
            <div class="col-sm-2">
                <label for="" class="form-label">Nama Produk</label>
            </div>
            <div class="col-sm-5">
                <input required type="text" class="form-control" name="product_name" placeholder="Produk" value="{{ $edit->product_name }}">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-2">
                <label for="" class="form-label">Stok Barang</label>
            </div>
            <div class="col-sm-5">
                <input required type="number" class="form-control" name="product_qty" placeholder="Stok Barang" value="{{ $edit->product_qty }}">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-2">
                <label for="" class="form-label">Harga Produk</label>
            </div>
            <div class="col-sm-5">
                <input required type="number" class="form-control" name="product_price" placeholder="Harga" value="{{ $edit->product_price }}">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-2">
                <label for="" class="form-label">Deskripsi</label>
            </div>
            <div class="col-sm-5">
                <input required type="text" class="form-control" name="description" placeholder="Deskripsi" value="{{ $edit->description }}">
            </div>
        </div> --}}
        <div class="mb-3 row">
            <div class="col-sm-10">
                <button class="btn btn-primary" type="submit">Simpan</button>
                <a href="{{ route('category.index') }}" class="btn btn-warning">Back</a>
            </div>
        </div>
    </form>
@endsection
