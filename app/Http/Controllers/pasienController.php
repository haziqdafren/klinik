<?php

namespace App\Http\Controllers;

use DragonCode\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class pasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //menampilkan semua data
    {
        $pasien = \App\Models\Pasien::latest()->paginate(10);
        if(request()->wantsJson()){
            return response()->json($pasien);
        }
        $data['pasien'] = $pasien;
        return view('pasien.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() //menambah
    {
        return view('pasien.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'no_pasiens' => 'required|unique:pasiens,no_pasiens',
            'nama' => 'required|min:3',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'nullable', //alamat boleh kosong
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:5000'
        ]);
        $pasien = new \App\Models\Pasien(); //membuat objek kosong di variabel model
        $pasien->fill($requestData); //mengisi var model dengan data yang sudah divalidasi requestData
        $pasien->foto = $request->file('foto')->store('public');//Mengisi object foto
        $pasien->save();
        if($request->wantsJson()){
            return response()->json($pasien);
        }
        flash("Horee.. Data sudah disimpan")->success();
        return back();
        //mengarahkan user ke url sebelumnya yaitu /pasien/create dengan membawa variabel pesan
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['pasien'] = \App\Models\pasien::findOrFail($id);
        return view('pasien.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'no_pasiens' => 'required|unique:pasiens,no_pasiens,'.$id, //tambahkan $id untuk mnyesuaikan dengan id
            'nama' => 'required|min:3',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'nullable', //alamat boleh kosong
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:5000'
        ]);
        $pasien = \App\Models\Pasien::findOrFail($id);
        $pasien->fill($requestData);
        //karena divalidasi foto boleh null, maka perlu pengecekan apakah ada file foto yang di update
        //jika ada maka file foto lama di hapus dan diganti dengan file foto baru
        if ($request->hasFile('foto')){
            Storage::delete($pasien->foto);
            $pasien->foto = $request->file('foto')->store('public');//Mengisi object foto
        }
        $pasien->save(); //menyimpan data ke database
        flash("Horee.. Data sudah disimpan")->success();
        return redirect('/pasien');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) //menghapus
    {
        $pasien = \App\Models\Pasien::findOrfail($id);
        // if ($pasien->daftar->count() >= 1) {
        //     flash('Data tidak bisa dihapus karena sudah terkait dengan data pendaftaran')->error();
        //     return back();
        //     }
        if ($pasien->foto != null && Storage::exists($pasien->foto)) {
            Storage::delete($pasien->foto);
        }
        $pasien->delete();
        flash('Horee...., Data sudah dihapus')->success();
        return back();
    }
}
