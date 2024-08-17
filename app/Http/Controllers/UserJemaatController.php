<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserJemaatController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::whereHas('roles', function ($query) {
                $query->where('name', '!=', 'super_admin')
                    ->where('name', '!=', 'user')
                    ->where('name', '!=', 'klasis')
                    ->where('name', '!=', 'sinode');
            })->latest('created_at')->get();

            // $data = User::latest('created_at')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('role', function ($user) {
                    return $user->roles->pluck('name')->implode(', ');
                })
                ->addColumn('status', function ($row) {
                    if ($row->last_session_id !== null) {
                        $data = '<span class="badge bg-success">Online</span>';
                    } else {
                        $data = '<span class="badge bg-danger">Offline</span>';
                    }
                    return $data;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex justify-content-start align-items-center">';
                    $btn .= '<a class="btn btn-outline-secondary btn-sm text-warning" title="Delete Session" onclick="deleteSession(' . $row->id . ')">  <i class="mdi mdi-logout"></i> </a>';
                    $btn .= '<a class="btn btn-outline-secondary btn-sm text-danger mx-1" title="Hapus" onclick="hapus(' . $row->id . ')"> <i class="fas fa-trash-alt"></i> </a>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
        return view('pages.users-jemaat.index');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_jemaat' => 'required',
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,name',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'messages' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'id_jemaat' => $request->id_jemaat,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // $roles = ['jemaat'];
        // $user->roles()->attach(Role::whereIn('name', $roles)->get());
        $user->roles()->attach(Role::whereIn('name', $request->roles)->get());

        return response()->json([
            'success' => true,
            'message' => 'Registrasi Berhasil'
        ], 200);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
