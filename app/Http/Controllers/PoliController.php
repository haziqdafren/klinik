<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use App\Http\Requests\StorePoliRequest;
use App\Http\Requests\UpdatePoliRequest;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $polis = Poli::latest()->paginate(10);
        return view('file.index',compact('polis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('file.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePoliRequest $request)
    {
        $requestData = $request->validate([
            'nama' => 'required',
            'biaya' => 'required',
            'keterangan' => 'required',
        ]);

        $poli = new poli();
        $poli->fill($requestData);
        $poli->save();

        flash('Data berhasil disimpan')->success();

        return redirect()->route('poli.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Poli $poli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Poli $poli)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePoliRequest $request, Poli $poli)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

            $poli = poli::findOrfail($id);
            if($poli->daftar->count() >= 1){
                flash('Data tidak bisa dihapus karena sudah terkait dengan data pendaftaran')->error();
                return back();
            }

            $poli->delete();
            flash('Data sudah dihapus')->success();
            return back();

    }
}
