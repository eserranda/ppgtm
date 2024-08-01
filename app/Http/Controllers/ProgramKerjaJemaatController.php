<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramKerjaJemaat;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ProgramKerjaJemaatController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $filterData = $request->input('filter');

            $query = ProgramKerjaJemaat::query();
            if ($filterData) {
                $query->where('bidang', $filterData);
            }

            $data = $query->latest('created_at')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex justify-content-start align-items-center">';
                    $btn .= '<a class="btn btn-outline-secondary btn-sm mx-1" title="Edit" onclick="edit(' . $row->id . ')"> <i class="fas fa-pencil-alt"></i> </a>';
                    $btn .= '<a class="btn btn-outline-secondary btn-sm text-danger" title="Hapus" onclick="hapus(' . $row->id . ')"> <i class="fas fa-trash-alt"></i> </a>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.program-kerja-jemaat.index');
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_jemaat' => 'required',
            'bidang' => 'required|string|in:Kerohanian,Komunikasi dan Organisasi,Dana,Kaderisasi,Minat Dan Bakat,Kesekretariatan',
            'ketua_bidang' => 'required|string|max:255',
            'anggota' => 'required|string',
            'program' => 'required|string',
            'tujuan' => 'required|string',
            'sasaran' => 'required|string',
            'bentuk_kegiatan' => 'required|string',
            'waktu' => 'required|string',
            'pelaksana' => 'required|string',
            'sumber_dana' => 'required|string',
            'implementasi' => 'required|string',
        ], [
            'required' => ':attribute harus diisi',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'messages' => $validator->errors()
            ], 422);
        }

        $save = ProgramKerjaJemaat::create(request()->all());

        if ($save) {
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
     * Display the specified resource.
     */
    public function show(ProgramKerjaJemaat $programKerjaJemaat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProgramKerjaJemaat $programKerjaJemaat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProgramKerjaJemaat $programKerjaJemaat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgramKerjaJemaat $programKerjaJemaat, $id)
    {
        try {
            $deleted = $programKerjaJemaat::findOrFail($id);
            $deleted->delete();

            return response()->json(['status' => true, 'message' => 'Data berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Gagal menghapus data'], 500);
        }
    }
}
