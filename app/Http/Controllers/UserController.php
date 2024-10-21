<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; // Pastikan model User menggunakan namespace yang benar

class UserController extends Controller
{
    public function index()
    {
        // Pastikan pengguna diurutkan berdasarkan ID
        $users = User::orderBy('id', 'asc')->get();
        
        return view('user.index', compact('users'));
    }
    
    
    
    
    

    // Menampilkan form untuk membuat pengguna baru
    public function create()
    {
        return view('user.create');
    }

    // Menyimpan pengguna baru
    public function store(Request $request)
    {
        \Log::info($request->all()); // Melihat input yang dikirimkan
    
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:Admin,Karyawan',
        ]);
    
        // Membuat pengguna baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Mengenkripsi password
            'role' => $request->role,
        ]);
    
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
    
    // Menampilkan form untuk mengedit pengguna yang sudah ada
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    // Memperbarui data pengguna yang ada
    public function update(Request $request, User $user)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|string|in:Admin,Karyawan',
        ]);

        // Mengatur data yang akan diperbarui
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ];

        // Jika password diisi, tambahkan ke data yang akan diperbarui
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // Menghapus pengguna yang ada
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
