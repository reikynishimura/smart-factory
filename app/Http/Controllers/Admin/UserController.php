<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\UserExport;

class UserController extends Controller
{
    public function index() {
        $users = User::with(['plant', 'role'])->get();
        $plants = Plant::all();
        $roles = Role::all();

    return view('pages.user.index', compact('users', 'plants', 'roles'));
    }

    public function create() {
        $plants = Plant::all();
        $roles = Role::all();

        return view('pages.user.index.create', compact('plants', 'roles'));
    }

    public function masteru(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|unique:users,nip',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'id_cards' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
            'plant' => 'required|exists:plants,id',
            'role' => 'required|exists:roles,id',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $validated['plant_id'] = $validated['plant'];
        $validated['role_id'] = $validated['role'];
        unset($validated['plant'], $validated['role']); 

        User::create($validated);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $plants = Plant::all();
        $roles = Role::all();

        return view('pages.user.edit', compact('user', 'plants', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'nip' => 'required|unique:users,nip,' . $id,  
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, 
            'id_cards' => 'required|string',
            'password' => 'nullable|string|min:6|confirmed',  
            'plant' => 'required|exists:plants,id',
            'role' => 'required|exists:roles,id',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        } else {
            unset($validated['password']);
        }

        $validated['plant_id'] = $validated['plant'];
        $validated['role_id'] = $validated['role'];
        unset($validated['plant'], $validated['role']);

        $user->update($validated);

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }

    public function exportExcel()
    {
        return Excel::download(new UserExport, 'user.xlsx');
    }

    public function exportPdf()
    {
        $users = User::all();
        $pdf = PDF::loadView('pages.user.pdf', compact('users'));
        return $pdf->download('pages.user.pdf');
    }
}
