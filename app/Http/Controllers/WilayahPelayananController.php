<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WilayahPelayanan;
use Yajra\DataTables\Facades\DataTables;

class WilayahPelayananController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $filterData = $request->input('filter');

            $query = WilayahPelayanan::query();
            if ($filterData) {
                $query->where('bidang', $filterData);
            }

            $data = $query->latest('created_at')->get();

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
        return view('pages.wilayah-pelayanan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(WilayahPelayanan $wilayahPelayanan)
    {
        //
    }
}
