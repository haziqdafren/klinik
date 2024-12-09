@extends('layouts.app_modern', ['title' => 'Data Pendaftaran'])
@section('content')
    <div class="card">
        <center>
            <h5 class="card-header">DATA PENDAFTARAN PASIEN</h5>
        </center>
        <div class="card-body">
            <form action="">
                <div class="row g-3 mb-2">
                    <div class="col">
                        <input type="text" name="q" class="form-control" placeholder="Nama atau Nomor Pasien"
                        value="{{ request('q') }}">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn">Cari</button>
                    </div>
                </div>
            </form>
            <div class="row mb-3 mt-3">
                <div class="col-md-6">
                    <a href="/daftar/create" class="btn btn-primary btn-sm">Tambah Data</a>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Daftar</th>
                        <th>Poli</th>
                        <th>Keluhan</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daftar as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->pasien->nama }}</td>
                            <td>{{ $item->pasien->jenis_kelamin }}</td>
                            <td>{{ $item->tanggal_daftar }}</td>
                            <td>{{ $item->poli->id}}</td>
                            <td>{{ $item->keluhan}}</td>
                            <td>
                                <a href="/daftar/{{ $item->id }}" class="btn btn-info btn-sm">Detail</a>
                                <form action="/pasien/{{ $item->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm ml-2"
                                        onclick="return confirm('Yakin ingin mengapus data?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
