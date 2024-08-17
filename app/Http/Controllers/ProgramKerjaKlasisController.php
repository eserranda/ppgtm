<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramKerjaKlasis;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ProgramKerjaKlasisController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $filterData = $request->input('filter');

            $query = ProgramKerjaKlasis::query();
            if ($filterData) {
                $query->where('bidang', $filterData);
            }

            if (auth()->user()->role == 'klasis') {
                $id_klasis = Auth::user()->id_klasis;
                $data = $query->where('id_klasis', $id_klasis)->latest('created_at')->get();
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
        return view('pages.program-kerja-klasis.index');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_klasis' => 'required',
            'bidang' => 'required',
            'ketua_bidang' => 'required|string|max:255',
            'anggota' => 'required|string',
            'program' => 'required|string',
            'dasar_pemikiran' => 'required|string',
            'kegiatan' => 'required|string',
            'tujuan' => 'required|string',
            'sasaran' => 'required|string',
            'penanggung_jawab' => 'required|string',
            'waktu_pelaksana' => 'required|string',
            'pelaksana' => 'required|string',
            'biaya' => 'required|string',
            'data_time' => 'required|string',
        ], [
            'required' => ':attribute harus diisi',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'messages' => $validator->errors()
            ], 422);
        }

        $save = ProgramKerjaKlasis::create($request->all());
        if ($save) {
            return response()->json([
                'success' => true,
                'messages' => 'Data berhasil disimpan'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'messages' => 'Data gagal disimpan'
            ], 500);
        }
    }


    public function findById(ProgramKerjaKlasis $programKerjaKlasis, $id)
    {
        $data = $programKerjaKlasis::find($id);
        return response()->json($data);
    }

    public function update(Request $request, ProgramKerjaKlasis $programKerjaKlasis)
    {
        $validator = Validator::make($request->all(), [
            'edit_id_klasis' => 'required',
            'edit_bidang' => 'required',
            'edit_ketua_bidang' => 'required|string|max:255',
            'edit_anggota' => 'required|string',
            'edit_program' => 'required|string',
            'edit_dasar_pemikiran' => 'required|string',
            'edit_kegiatan' => 'required|string',
            'edit_tujuan' => 'required|string',
            'edit_sasaran' => 'required|string',
            'edit_penanggung_jawab' => 'required|string',
            'edit_waktu_pelaksana' => 'required|string',
            'edit_pelaksana' => 'required|string',
            'edit_biaya' => 'required|string',
            'edit_data_time' => 'required|string',
        ], [
            'required' => ':attribute harus diisi',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'messages' => $validator->errors()
            ], 422);
        }

        $update = ProgramKerjaKlasis::find($request->id)->update([
            'id_klasis' => $request->edit_id_klasis,
            'bidang' => $request->edit_bidang,
            'ketua_bidang' => $request->edit_ketua_bidang,
            'anggota' => $request->edit_anggota,
            'program' => $request->edit_program,
            'dasar_pemikiran' => $request->edit_dasar_pemikiran,
            'kegiatan' => $request->edit_kegiatan,
            'tujuan' => $request->edit_tujuan,
            'sasaran' => $request->edit_sasaran,
            'penanggung_jawab' => $request->edit_penanggung_jawab,
            'waktu_pelaksana' => $request->edit_waktu_pelaksana,
            'pelaksana' => $request->edit_pelaksana,
            'biaya' => $request->edit_biaya,
            'data_time' => $request->edit_data_time,
        ]);

        if ($update) {
            return response()->json([
                'success' => true,
                'messages' => 'Data berhasil diupdate'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'messages' => 'Data gagal diupdate'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgramKerjaKlasis $programKerjaKlasis, $id)
    {
        try {
            $deleted = $programKerjaKlasis::findOrFail($id);
            $deleted->delete();

            return response()->json(['status' => true, 'message' => 'Data berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Gagal menghapus data'], 500);
        }
    }
}
