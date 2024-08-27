<?php

namespace App\Http\Controllers;

use App\Models\Jemaat;
use App\Models\Klasis;
use App\Models\Dashboard;
use App\Models\JadwalIbadah;
use App\Models\ProgramKerja;
use Illuminate\Http\Request;
use App\Models\PengurusJemaat;
use App\Models\PengurusKlasis;
use App\Models\WilayahPelayanan;
use App\Models\ProgramKerjaJemaat;
use App\Models\ProgramKerjaKlasis;
use App\Models\AnggotaPemudaJemaat;

class DashboardController extends Controller
{

    public function visiMisi()
    {
        return view('pages.home.visi-misi');
    }

    public function sejarah()
    {
        return view('pages.home.sejarah');
    }

    public function pengurus()
    {
        return view('pages.home.pengurus');
    }

    public function listGereja()
    {
        $data = Jemaat::all();
        return view('pages.home.list-gereja', compact('data'));
    }

    public function gereja($id)
    {
        $data = Jemaat::find($id);
        $pengurus = PengurusJemaat::where('id_jemaat', $id)->get();
        $jadwal_ibadah = JadwalIbadah::where('id_jemaat', $id)->get();
        return view('pages.home.gereja', compact('data', 'pengurus', 'jadwal_ibadah'));
    }

    public function klasis()
    {
        $pengurus_klasis = PengurusKlasis::all();
        $klasis = Klasis::all();
        return view('pages.home.klasis', compact('klasis', 'pengurus_klasis'));
    }

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
        $program_kerja = ProgramKerja::all();

        return view('pages.home.index', compact('data', 'program_kerja'));
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
