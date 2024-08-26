<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramKerjaJemaat;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ProgramKerjaJemaatController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $filterData = $request->input('filter');
            $filterTanggal = $request->input('tanggal');

            $query = ProgramKerjaJemaat::query();
            if ($filterData) {
                $query->where('bidang', $filterData);
            }

            if ($filterTanggal) {
                $query->where('tanggal', $filterTanggal);
            }

            if (auth()->user()->roles->first()->name === 'jemaat') {
                $id_jemaat = Auth::user()->id_jemaat;
                $data = $query->where('id_jemaat', $id_jemaat)->latest('created_at')->get();
            } else {
                $data = $query->latest('created_at')->get();
            }
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
            'tanggal' => 'required|string',
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

    public function findById($id)
    {
        $data = ProgramKerjaJemaat::find($id);
        return response()->json($data);
    }

    public function update(Request $request, ProgramKerjaJemaat $programKerjaJemaat)
    {
        $validator = Validator::make($request->all(), [
            'edit_id_jemaat' => 'required',
            'edit_bidang' => 'required|string|in:Kerohanian,Komunikasi dan Organisasi,Dana,Kaderisasi,Minat Dan Bakat,Kesekretariatan',
            'edit_ketua_bidang' => 'required|string|max:255',
            'edit_anggota' => 'required|string',
            'edit_program' => 'required|string',
            'edit_tujuan' => 'required|string',
            'edit_sasaran' => 'required|string',
            'edit_bentuk_kegiatan' => 'required|string',
            'edit_waktu' => 'required|string',
            'edit_pelaksana' => 'required|string',
            'edit_sumber_dana' => 'required|string',
            'edit_tanggal' => 'required|string',
        ], [
            'required' => ':attribute harus diisi',
        ]);

        $update = $programKerjaJemaat::where('id', $request->id)->update([
            'id_jemaat' => $request->edit_id_jemaat,
            'bidang' => $request->edit_bidang,
            'ketua_bidang' => $request->edit_ketua_bidang,
            'anggota' => $request->edit_anggota,
            'program' => $request->edit_program,
            'tujuan' => $request->edit_tujuan,
            'sasaran' => $request->edit_sasaran,
            'bentuk_kegiatan' => $request->edit_bentuk_kegiatan,
            'waktu' => $request->edit_waktu,
            'pelaksana' => $request->edit_pelaksana,
            'sumber_dana' => $request->edit_sumber_dana,
            'implementasi' => $request->edit_implementasi,
            'tanggal' => $request->edit_tanggal,
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
