<?php

namespace App\Http\Controllers;

use App\Models\Jemaat;
use App\Models\Klasis;
use App\Models\Dashboard;
use App\Models\ProgramKerja;
use Illuminate\Http\Request;
use App\Models\WilayahPelayanan;
use App\Models\ProgramKerjaJemaat;
use App\Models\ProgramKerjaKlasis;
use App\Models\AnggotaPemudaJemaat;
use App\Models\JadwalIbadah;

class DashboardController extends Controller
{

    public function index()
    {
        $proker_sinode = ProgramKerja::count();
        $klasis = Klasis::count();
        $jemaat = Jemaat::count();
        $proker_klasis = ProgramKerjaKlasis::count();
        $proker_jemaat = ProgramKerjaJemaat::count();
        $anggota_ppgtm = AnggotaPemudaJemaat::count();
        $wilayah_pelayanan = WilayahPelayanan::count();
        $jadwal_ibadah = JadwalIbadah::count();
        return view('pages.dashboard.index', compact('proker_sinode', 'klasis', 'jemaat', 'proker_jemaat', 'proker_klasis',  'wilayah_pelayanan', 'anggota_ppgtm', 'jadwal_ibadah'));
    }


    public function home()
    {
        $data = Jemaat::all();
        return view('pages.home.index', compact('data'));
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
