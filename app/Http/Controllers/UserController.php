<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // menambahkan data baru
        if ($request->password != $request->konfirmasi) {
            return redirect()->to('user/create')->with('error', 'Passwordnya salah blokk')->withInput();
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Alert::toast('Berhasil Menambahkan User Baru!', 'Toast Type');
        return redirect()->to('user')->with('message', 'Data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $edit = User::find($id);
        $edit = User::findOrFail($id);
        return view('user.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => ($request->password ? Hash::make($request->password) : $user->password)
        ]);
        return redirect()->to('user')->with('message', 'Data berhasil di perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        return redirect()->to('user')->with('message', 'Data berhasil di hapus');
    }
}
