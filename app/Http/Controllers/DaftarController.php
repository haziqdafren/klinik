<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Models\pasien;
use App\Models\Poli;
use App\Http\Requests\StoreDaftarRequest;
use App\Http\Requests\UpdateDaftarRequest;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       if(request()->filled('q')){
        $data['daftar'] = Daftar::search(request('q'))->paginate(10);
       }else{
        $data['daftar'] = Daftar::latest()->paginate(10);
       }
        return view('daftar_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['listPasien'] = pasien::orderBy('nama','asc')->get();
        $data['listPoli'] = poli::orderBy('nama','asc')->get();
        return view('daftar_create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDaftarRequest $request)
    {
        $requestData = $request->validate([
            'tanggal_daftar' =>'required',
            'pasien_id' =>'required',
            'poli_id' =>'required',
            'keluhan' =>'required',
        ]);

        $daftar = new Daftar();
        $daftar->fill($requestData);
        $daftar->save();

        flash('Data berhasil disimpan')->success();

        return redirect()->route('daftar.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $daftar = Daftar::findOrFail($id);
        return view('daftar_show', ['daftar'=> $daftar]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Daftar $daftar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
            'tindakan' => 'required',
            'diagnosis' => 'required',
        ]);

        $daftar = Daftar::findOrFail($id);
        $daftar->fill($requestData);
        $daftar->save();
        flash('Data Berhasil Disimpan')->success();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $daftar = Daftar::findOrFail($id);
        $daftar->delete();
        flash('Data sudah dihapus')->success();
        return back();
    }
}
