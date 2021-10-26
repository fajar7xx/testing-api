<?php

namespace App\Http\Controllers;

use App\Http\Resources\PegawaiResource;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $query = Pegawai::with('departemen');

        $data = $query->latest()->paginate();
        return PegawaiResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return PegawaiResource
     */
    public function store(Request $request)
    {
        $data = Pegawai::create([
            'nik'            => $request->nik,
            'nama_lengkap'   => $request->nama,
            'jenis_kelamin'  => $request->sex,
            'tgl_lahir'      => $request->tgl_lahir,
            'alamat_lengkap' => $request->alamat_lengkap,
            'departemen_id'  => $request->departemen
        ]);

        return new PegawaiResource($data->load('departemen'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pegawai  $pegawai
     * @return PegawaiResource
     */
    public function show(pegawai $pegawai)
    {
        return new PegawaiResource($pegawai->load('departemen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pegawai  $pegawai
     * @return PegawaiResource
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $pegawai->nik            = $request->nik;
        $pegawai->nama_lengkap   = $request->nama;
        $pegawai->jenis_kelamin  = $request->sex;
        $pegawai->tgl_lahir      = $request->tgl_lahir;
        $pegawai->alamat_lengkap = $request->alamat_lengkap;
        $pegawai->departemen_id  = $request->departemen;
        $pegawai->save();

        return new PegawaiResource($pegawai->load('departemen'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pegawai  $pegawai
     * @return PegawaiResource
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return new PegawaiResource($pegawai);
    }
}
