<?php

namespace App\Http\Controllers;

use App\Models\AnggotaPemudaJemaat;
use App\Models\Jemaat;
use App\Models\Klasis;
use App\Models\Dashboard;
use App\Models\ProgramKerja;
use Illuminate\Http\Request;
use App\Models\ProgramKerjaJemaat;

class DashboardController extends Controller
{

    public function index()
    {
        $proker_sinode = ProgramKerja::count();
        $klasis = Klasis::count();
        $jemaat = Jemaat::count();
        $proker_jemaat = ProgramKerjaJemaat::count();
        $anggota_ppgtm = AnggotaPemudaJemaat::count();
        return view('pages.dashboard.index', compact('proker_sinode', 'klasis', 'jemaat', 'proker_jemaat', 'anggota_ppgtm'));
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
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}