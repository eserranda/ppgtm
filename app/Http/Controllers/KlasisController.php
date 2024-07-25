<?php

namespace App\Http\Controllers;

use App\Models\Klasis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KlasisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.klasis.index');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_klasis' => 'required',
            'alamat' => 'required',
        ], [
            'required' => ':attribute harus diisi',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'messages' => $validator->errors()
            ], 422);
        }

        $save = Klasis::create([
            'nama_klasis' => $request->nama_klasis,
            'alamat' => $request->alamat,
        ]);

        if ($save) {
            return response()->json([
                'success' => true,
                'messages' => 'Data Klasis Berhasil'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'messages' => 'Data Klasis Gagal Disimpan'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Klasis $klasis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Klasis $klasis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Klasis $klasis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Klasis $klasis)
    {
        //
    }
}
