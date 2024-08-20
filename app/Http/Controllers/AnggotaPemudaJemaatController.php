<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnggotaPemudaJemaat;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class AnggotaPemudaJemaatController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $dataFilter = $request->input('filter');

            $query = AnggotaPemudaJemaat::query();
            if ($dataFilter) {
                $query->where('dapel', $dataFilter);
            }

            if (auth()->user()->roles->first()->name == 'jemaat') {
                $id_jemaat = Auth::user()->id_jemaat;
                $data = $query->where('id_jemaat', $id_jemaat)->latest('created_at')->get();
            } else {
                $data = $query->latest('created_at')->get();
            }
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('tgl_lahir', function ($row) {
                    return date('d-m-Y', strtotime($row->tgl_lahir));
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
        return view('pages.anggota-pemuda-jemaat.index');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_jemaat' => 'required|integer',
            'dapel' => 'required|string|max:255',
            'nama_anggota' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|numeric',
            'data_time' => 'required ',
        ], [
            'required' => ':attribute harus diisi',
            'string' => ':attribute harus berupa string',
            'numeric' => ':attribute harus berupa angka',
            'date' => ':attribute harus berupa tanggal',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'messages' => $validator->errors(),
            ], 422);
        }

        $save = AnggotaPemudaJemaat::create($request->all());
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
        $data = AnggotaPemudaJemaat::find($id);
        return response()->json($data);
    }

    public function update(Request $request, AnggotaPemudaJemaat $anggotaPemudaJemaat)
    {
        $validator = Validator::make($request->all(), [
            'edit_id_jemaat' => 'required|integer',
            'edit_dapel' => 'required|string|max:255',
            'edit_nama_anggota' => 'required|string|max:255',
            'edit_tgl_lahir' => 'required|date',
            'edit_alamat' => 'required|string|max:255',
            'edit_no_telp' => 'required|numeric',
            'edit_data_time' => 'required ',
        ], [
            'required' => ':attribute harus diisi',
            'string' => ':attribute harus berupa string',
            'numeric' => ':attribute harus berupa angka',
            'date' => ':attribute harus berupa tanggal',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'messages' => $validator->errors(),
            ], 422);
        }

        $updated = $anggotaPemudaJemaat::where('id', $request->id)->update([
            'id_jemaat' => $request->edit_id_jemaat,
            'dapel' => $request->edit_dapel,
            'nama_anggota' => $request->edit_nama_anggota,
            'tgl_lahir' => $request->edit_tgl_lahir,
            'alamat' => $request->edit_alamat,
            'no_telp' => $request->edit_no_telp,
            'data_time' => $request->edit_data_time,
        ]);

        if ($updated) {
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
    public function destroy(AnggotaPemudaJemaat $anggotaPemudaJemaat, $id)
    {
        try {
            $deleted = $anggotaPemudaJemaat::findOrFail($id);
            $deleted->delete();

            return response()->json(['status' => true, 'message' => 'Data berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Gagal menghapus data'], 500);
        }
    }
}
