<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WilayahPelayanan;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class WilayahPelayananController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $filterTanggal = $request->input('tanggal');

            $query = WilayahPelayanan::query();
            if ($filterTanggal) {
                $query->where('tanggal', $filterTanggal);
            }

            $data = $query->latest('created_at')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('id_klasis', function ($row) {
                    if ($row->id_klasis) {
                        return $row->klasis->nama_klasis;
                    } else {
                        return '-';
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a class="btn btn-outline-secondary btn-sm" title="Edit" onclick="edit(' . $row->id . ')"> <i class="fas fa-pencil-alt"></i> </a>';
                    $btn .= '<a class="btn btn-outline-secondary btn-sm  text-danger mx-2" title="Hapus" onclick="hapus(' . $row->id . ')"> <i class="fas fa-trash-alt"></i> </a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.wilayah-pelayanan.index');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_klasis' => 'required',
            'wilayah' => 'required',
            'koordinator' => 'required',
            'no_telp' => 'required|numeric',
            'tanggal' => 'required',
        ], [
            'required' => ':attribute harus diisi',
            'numeric' => ':attribute harus angka',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'messages' => $validator->errors()
            ], 422);
        }

        $save = WilayahPelayanan::create([
            'id_klasis' => $request->id_klasis,
            'wilayah' => $request->wilayah,
            'koordinator' => $request->koordinator,
            'no_telp' => $request->no_telp,
            'tanggal' => $request->tanggal
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

    public function findById($id)
    {
        $wilayahPelayanan = WilayahPelayanan::find($id);
        return response()->json($wilayahPelayanan);
    }


    public function update(Request $request, WilayahPelayanan $wilayahPelayanan)
    {
        $validator = Validator::make($request->all(), [
            'edit_id_klasis' => 'required',
            'edit_wilayah' => 'required',
            'edit_koordinator' => 'required',
            'edit_no_telp' => 'required|numeric',
            'edit_tanggal' => 'required',
        ], [
            'required' => ':attribute harus diisi',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'messages' => $validator->errors()
            ], 422);
        }

        $update = WilayahPelayanan::where('id', $request->id)->update([
            'id_klasis' => $request->edit_id_klasis,
            'wilayah' => $request->edit_wilayah,
            'koordinator' => $request->edit_koordinator,
            'no_telp' => $request->edit_no_telp,
            'tanggal' => $request->edit_tanggal
        ]);

        if ($update) {
            return response()->json([
                'success' => true
            ], 200);
        } else {
            return response()->json([
                'success' => false
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WilayahPelayanan $wilayahPelayanan, $id)
    {
        try {
            $deleted = $wilayahPelayanan::findOrFail($id);
            $deleted->delete();

            return response()->json(['status' => true, 'message' => 'Data berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Gagal menghapus data'], 500);
        }
    }
}
