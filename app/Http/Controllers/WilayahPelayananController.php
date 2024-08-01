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
            // $filterData = $request->input('filter');

            // $query = WilayahPelayanan::query();
            // if ($filterData) {
            //     $query->where('wilayah', $filterData);
            // }

            // $data = $query->latest('created_at')->get();
            $data = WilayahPelayanan::latest('created_at')->get();

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
                    // $btn = '<a class="btn btn-outline-secondary btn-sm" title="Edit" onclick="edit(' . $row->id . ')"> <i class="fas fa-pencil-alt"></i> </a>';
                    $btn = '<a class="btn btn-outline-secondary btn-sm  text-danger mx-2" title="Hapus" onclick="hapus(' . $row->id . ')"> <i class="fas fa-trash-alt"></i> </a>';
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

    /**
     * Display the specified resource.
     */
    public function show(WilayahPelayanan $wilayahPelayanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WilayahPelayanan $wilayahPelayanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WilayahPelayanan $wilayahPelayanan)
    {
        //
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
