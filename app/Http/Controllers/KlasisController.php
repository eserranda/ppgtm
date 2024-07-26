<?php

namespace App\Http\Controllers;

use App\Models\Klasis;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class KlasisController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Klasis::latest('created_at')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a class="btn btn-outline-secondary btn-sm" title="Edit" onclick="edit(' . $row->id . ')"> <i class="fas fa-pencil-alt"></i> </a>';
                    $btn .= '<a class="btn btn-outline-secondary btn-sm  text-danger mx-2" title="Hapus" onclick="hapus(' . $row->id . ')"> <i class="fas fa-trash-alt"></i> </a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.klasis.index');
    }

    public function findById($id)
    {
        $klasis = Klasis::find($id);
        return response()->json($klasis);
    }

    public function getAllKlasis(Request $request)
    {
        $search = $request->input('term'); // Dapatkan parameter pencarian dari Select2

        // Ambil data dari database berdasarkan parameter pencarian
        $klasis = Klasis::where('nama_klasis', 'LIKE', '%' . $search . '%')
            ->select('id', 'nama_klasis as text')
            ->get();

        return response()->json($klasis);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_klasis' => 'required',
            'alamat' => 'required',
        ], [
            'required' => ':attribute harus diisi',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'messages' => $validator->errors()
            ], 422);
        }

        $save = Klasis::create([
            'nama_klasis' => $request->nama_klasis,
            'alamat' => $request->alamat,
        ]);

        if ($save) {
            return response()->json([
                'success' => true,
                'messages' => 'Data Klasis Berhasil'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'messages' => 'Data Klasis Gagal Disimpan'
            ]);
        }
    }


    public function update(Request $request, Klasis $klasis)
    {
        $validator = Validator::make($request->all(), [
            'edit_nama_klasis' => 'required',
            'edit_alamat' => 'required',
        ], [
            'required' => ':attribute harus diisi',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'messages' => $validator->errors()
            ], 422);
        }

        $update = $klasis::findOrFail($request->id)->update([
            'nama_klasis' => $request->edit_nama_klasis,
            'alamat' => $request->edit_alamat,
        ]);

        if ($update) {
            return response()->json([
                'success' => true,
                'messages' => 'Data Klasis Berhasil'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'messages' => 'Data Klasis Gagal Disimpan'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Klasis $klasis, $id)
    {
        try {
            $deleted = $klasis::findOrFail($id);
            $deleted->delete();

            return response()->json(['status' => true, 'message' => 'Data berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Gagal menghapus data'], 500);
        }
    }
}
