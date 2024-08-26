<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengurusSinode;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class PengurusSinodeController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $dataFilter = $request->input('filter');
            $tanggalFilter = $request->input('tanggal');

            $query = PengurusSinode::query();
            if ($dataFilter) {
                $data = $query->where('bidang', $dataFilter);
            }

            if ($tanggalFilter) {
                $data =  $query->whereDate('tanggal', $tanggalFilter);
            }

            $data = $query->latest('created_at')->get();
            return DataTables::of($data)
                ->addIndexColumn()
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
        return view('pages.pengurus-sinode.index');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'bidang' => 'required',
            // 'jabatan' => 'required',
            'tahun_mulai' => 'required',
            'tahun_selesai' => 'required',
            'tanggal' => 'required',
        ], [
            'required' => ':attribute harus diisi',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'messages' => $validator->errors(),
            ], 422);
        }
        $save = PengurusSinode::create($request->all());
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

    public function findById($id)
    {
        $data = PengurusSinode::find($id);
        return response()->json($data);
    }

    public function update(Request $request, PengurusSinode $pengurusSinode)
    {
        $validator = Validator::make($request->all(), [
            'edit_nama' => 'required',
            'edit_bidang' => 'required',
            // 'edit_jabatan' => 'required',
            'edit_tahun_mulai' => 'required',
            'edit_tahun_selesai' => 'required',
            'edit_tanggal' => 'required',
        ], [
            'required' => ':attribute harus diisi',
        ],);


        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'messages' => $validator->errors(),
            ], 422);
        }

        $update = $pengurusSinode->where('id', $request->input('id'))->update([
            'nama' => $request->input('edit_nama'),
            'bidang' => $request->input('edit_bidang'),
            'jabatan' => $request->input('edit_jabatan'),
            'tahun_mulai' => $request->input('edit_tahun_mulai'),
            'tahun_selesai' => $request->input('edit_tahun_selesai'),
            'tanggal' => $request->input('edit_tanggal'),
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
    public function destroy(PengurusSinode $pengurusSinode, $id)
    {
        try {
            $deleted = $pengurusSinode::findOrFail($id);
            $deleted->delete();

            return response()->json(['status' => true, 'message' => 'Data berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Gagal menghapus data'], 500);
        }
    }
}
