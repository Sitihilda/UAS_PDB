<?php

namespace App\Http\Controllers;
use App\Models\kartu_keluarga;
use App\Models\jorong;
use App\Models\penduduk;
use App\Models\level_pendidikan;
use App\Models\pekerjaan;
use App\Models\kewarganegaraan;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class KartuKeluargaController extends Controller
{
     @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kartu_keluargas = kartu_keluarga::with('jorong')->get();

        return view('kartu_keluarga.index', ['kartu_keluargas' => $kartu_keluargas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jorongs = jorong::orderBy('nama')->get();

        return view('kartu_keluarga.create', compact('jorongs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'no' => 'required|size:16|unique:kartu_keluarga,no',
            'jorong_id' => 'required',
            'tanggal_pencatatan' => 'required',
        ]);

        kartu_keluarga::create($validateData);
        Alert::success('Berhasil', "Data Kartu Keluarga $request->no telah berhasil di simpan");
        return redirect()->route('kartuKeluarga.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penduduks = penduduk::where('kartu_keluarga_id', $id)->get();
        $kartu_keluarga = kartu_keluarga::findOrFail($id);
        return view('kartu_keluarga.show', compact('penduduks'), compact('kartu_keluarga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jorongs = jorong::orderBy('nama')->get();
        $kartu_keluarga = kartu_keluarga::findOrFail($id);

        return view('kartu_keluarga.edit', [
            'kartu_keluarga' => $kartu_keluarga,
            'jorongs' => $jorongs
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'no' => 'required',
            'jorong_id' => 'required',
            'tanggal_pencatatan' => 'required',
        ]);
        
        $kartu_keluarga = kartu_keluarga::findOrFail($id);
        $kartu_keluarga->update($validateData);
        Alert::success('Berhasil', "Kartu Keluarga $request->no telah berhasil di perbaharui");
        return redirect()->route('kartuKeluarga.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kartu_keluarga = kartu_keluarga::findOrFail($id);
        $kartu_keluarga->delete();
        Alert::success('Berhasil', "Kartu Keluarga $kartu_keluarga->no telah berhasil di hapus");
        return redirect()->route('kartu_keluarga.index');
        
    }

    public function createAnggota_keluarga($id)
    {
        $kartu_keluargas = kartu_keluarga::orderBy('no')->get();
        $level_pendidikans = level_pendidikan::orderBy('nama')->get();
        $pekerjaans = pekerjaan::orderBy('nama')->get();
        $kewarganegaraans = kewarganegaraan::orderBy('nama')->get();
        $kartu_keluarga_id = kartu_keluarga::findOrFail($id);
        // var_dump($kartu_keluarga_id->id);
        
        return view('kartu_keluarga.create-anggota', [
            'kartu_keluargas' => $kartu_keluargas,
            'level_pendidikans' => $level_pendidikans,
            'pekerjaans' => $pekerjaans,
            'kewarganegaraans' => $kewarganegaraans,
            'kartu_keluarga_id' => $kartu_keluarga_id,
        ]);
    }

    public function storeAnggota__keluarga(Request $request)
    {
        $validateData = $request->validate([
            'kartu_keluarga_id' => 'required',
            'nama' => 'required',
            'nik' => 'required|size:16|unique:penduduk,nik',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'level_pendidikan_id' => 'required',
            'pekerjaan_id' => 'required',
            'status_pernikahan' => 'required',
            'status_keluarga' => 'required',
            'kewarganegaraan_id' => 'required',
            'ayah' => 'required',
            'ibu' => 'required',
        ]);

        // var_dump($request);

        penduduk::create($validateData);
        Alert::success('Berhasil', "Data penduduk bernama $request->nama telah berhasil di simpan");
        return redirect()->route('kartuKeluarga.show', ['id' => $request->kartu_keluarga_id]);
    }

    public function destroyAnggota_keluarga($id)
    {
        $penduduk = Penduduk::findOrFail($id);
        $penduduk->delete();
        Alert::success('Berhasil', "Penduduk bernama $penduduk->nama telah berhasil di hapus");
        return redirect()->route('kartu_keluarga.show', ['id' => $penduduk->kartu_keluarga_id]);
}
}