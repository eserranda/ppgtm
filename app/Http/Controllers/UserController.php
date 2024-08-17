<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::whereHas('roles', function ($query) {
                $query->where('name',  'super_admin')
                    ->orWhere('name', 'user')
                    ->orWhere('name', 'sinode');
            })->latest('created_at')->get();

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
                    $btn .= '<a class="btn btn-outline-secondary btn-sm mx-1" title="Edit" onclick="edit(' . $row->id . ')"> <i class="fas fa-pencil-alt"></i> </a>';
                    $btn .= '<a class="btn btn-outline-secondary btn-sm text-danger" title="Hapus" onclick="hapus(' . $row->id . ')"> <i class="fas fa-trash-alt"></i> </a>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['status', 'action']) // Gabungkan kedua kolom yang memerlukan raw HTML
                ->make(true);
        }

        return view('pages.users.index');
    }

    public function deleteSession($id)
    {
        $user = User::find($id);
        $user->last_session_id = null;
        $user->save();

        return response()->json(['success' => true], 200);
    }


    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function findById($id)
    {
        $data = User::find($id);
        return response()->json($data);
    }


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
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
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->roles()->attach(Role::whereIn('name', $request->roles)->get());

        return response()->json([
            'success' => true,
            'message' => 'Registrasi Berhasil'
        ], 200);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $credentials = [$loginType => $request->login, 'password' => $request->password];
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // Cek jika user sudah memiliki sesi aktif
            if ($user->last_session_id && $user->last_session_id !== session()->getId()) {
                // Melakukan logout jika pengguna sudah login di perangkat lain.
                Auth::logout();
                return redirect()->back()->withErrors(['login' => 'Anda sudah login di perangkat lain.'])->withInput();
            }

            // simpan sesi aktif ke database berdasarkan id user yang sedang login
            User::where('id', $user->id)->update(['last_session_id' => session()->getId()]);

            return redirect()->intended('/dashboard');
        }

        return redirect()->back()->withErrors(['login' => 'Username atau Password salah'])->withInput();
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            User::where('id', $user->id)->update(['last_session_id' => null]);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $validator = Validator::make($request->all(), [
            'edit_name' => 'required|string|max:255',
            'edit_username' => 'required|string|max:255|unique:users,username,' . $id,
            'edit_email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'edit_roles' => 'required|array',
            'edit_roles.*' => 'exists:roles,name',
        ], [
            'edit_name.required' => 'Nama Tidak Boleh Kosong',
            'edit_username.required' => 'Username Tidak Boleh Kosong',
            'edit_email.required' => 'Email Tidak Boleh Kosong',
            'edit_roles.required' => 'Role Tidak Boleh Kosong',
            'edit_roles.*.exists' => 'Role Tidak Valid',
            'edit_username.unique' => 'Username Sudah Digunakan',
            'edit_email.unique' => 'Email Sudah Digunakan',
            'edit_email.email' => 'Email Tidak Valid',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'messages' => $validator->errors()
            ], 422);
        }

        $update = User::where('id', $id)->update([
            'name' => $request->edit_name,
            'username' => $request->edit_username,
            'email' => $request->edit_email,
        ]);

        $user = User::find($id);
        $user->roles()->sync(Role::whereIn('name', $request->edit_roles)->get());


        if ($update) {
            return response()->json([
                'success' => true,
                'messages' => 'Program berhasil diubah'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'messages' => 'Program gagal diubah'
            ], 409);
        }
    }

    public function destroy(User $users, $id)
    {
        try {
            $deleted = $users::findOrFail($id);
            $deleted->delete();

            return response()->json(['status' => true, 'message' => 'Data berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Gagal menghapus data'], 500);
        }
    }
}
