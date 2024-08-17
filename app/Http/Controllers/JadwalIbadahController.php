<?php

namespace App\Http\Controllers;

use App\Models\JadwalIbadah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class JadwalIbadahController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $dataFilter = $request->input('filter');

            $query = JadwalIbadah::query();
            if ($dataFilter) {
                $query->where('tanggal', $dataFilter);
            }

            if (auth()->user()->role == 'jemaat') {
                $id_jemaat = Auth::user()->id_jemaat;
                $data = $query->where('id_jemaat', $id_jemaat)->latest('created_at')->get();
            } else {
                $data = $query->latest('created_at')->get();
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('tanggal', function ($row) {
                    return date('d-m-Y', strtotime($row->tanggal));
                })
                ->addColumn('periode', function ($row) {
                    return $row->tahun_mulai . ' - ' . $row->tahun_selesai;
                })
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
        return view('pages.jadwal-ibadah.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_jemaat' => 'required',
            'tanggal' => 'required',
            'nama' => 'required',
            'tempat' => 'required',
            'liturgis' => 'required',
            'pelayan_firman' => 'required',
            'tahun' => 'required',
        ], [
            'required' => ':attribute harus diisi',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'messages' => $validator->errors(),
            ], 422);
        }

        $save = JadwalIbadah::create($request->all());
        if ($save) {
            return response()->json([
                'success' => true,
                'messages' => 'Data berhasil ditambahkan',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'messages' => 'Data gagal ditambahkan',
            ], 500);
        }
    }


    public function findById($id)
    {
        $data = JadwalIbadah::find($id);
        return response()->json($data);
    }

    public function update(Request $request, JadwalIbadah $jadwalIbadah)
    {
        $validator = Validator::make($request->all(), [
            'edit_id_jemaat' => 'required',
            'edit_tanggal' => 'required',
            'edit_nama' => 'required',
            'edit_tempat' => 'required',
            'edit_liturgis' => 'required',
            'edit_pelayan_firman' => 'required',
            'edit_tahun' => 'required',
        ], [
            'required' => ':attribute harus diisi',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'messages' => $validator->errors(),
            ], 422);
        }

        $update = $jadwalIbadah->where('id', $request->input('id'))->update([
            'id_jemaat' => $request->input('edit_id_jemaat'),
            'tanggal' => $request->input('edit_tanggal'),
            'nama' => $request->input('edit_nama'),
            'tempat' => $request->input('edit_tempat'),
            'liturgis' => $request->input('edit_liturgis'),
            'pelayan_firman' => $request->input('edit_pelayan_firman'),
            'tahun' => $request->input('edit_tahun'),
        ]);

        if ($update) {
            return response()->json([
                'success' => true
            ], 201);
        } else {
            return response()->json([
                'success' => false
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalIbadah $jadwalIbadah, $id)
    {
        try {
            $deleted = $jadwalIbadah::findOrFail($id);
            $deleted->delete();

            return response()->json(['status' => true, 'message' => 'Data berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Gagal menghapus data'], 500);
        }
    }
}
