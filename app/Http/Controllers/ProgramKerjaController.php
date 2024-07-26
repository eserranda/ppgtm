<?php

namespace App\Http\Controllers;

use App\Models\ProgramKerja;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ProgramKerjaController extends Controller
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
            $data = ProgramKerja::latest('created_at')->get();

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
        return view('pages.program-kerja.index');
    }

    public function findById($id)
    {
        $data = ProgramKerja::find($id);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'program_kerja' => 'required',
            'sasaran' => 'required',
            'waktu_dan_tempat' => 'required',
            'tujuan' => 'required',
        ], [
            'required' => ':attribute harus diisi',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'messages' => $validator->errors()
            ], 422);
        }

        $save = ProgramKerja::create([
            'program_kerja' => $request->program_kerja,
            'sasaran' => $request->sasaran,
            'waktu_dan_tempat' => $request->waktu_dan_tempat,
            'tujuan' => $request->tujuan,
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


    public function update(Request $request, ProgramKerja $programKerja)
    {
        $validator = Validator::make($request->all(), [
            'edit_program_kerja' => 'required',
            'edit_sasaran' => 'required',
            'edit_tujuan' => 'required',
            'edit_waktu_dan_tempat' => 'required',
        ], [
            'required' => ':attribute harus diisi',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'messages' => $validator->errors()
            ], 422);
        }

        $update = $programKerja::findOrFail($request->id)->update([
            'program_kerja' => $request->edit_program_kerja,
            'sasaran' => $request->edit_sasaran,
            'tujuan' => $request->edit_tujuan,
            'waktu_dan_tempat' => $request->edit_waktu_dan_tempat,
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
    public function destroy(ProgramKerja $programKerja, $id)
    {
        try {
            $deleted = $programKerja::findOrFail($id);
            $deleted->delete();

            return response()->json(['status' => true, 'message' => 'Data berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Gagal menghapus data'], 500);
        }
    }
}
