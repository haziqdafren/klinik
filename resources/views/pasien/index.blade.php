@extends('layouts.app_modern', ['title' => 'Data Pasien'])
@section('content')
    <div class="card">
        <center>
            <h3 class="card-header">Data pasien</h3>
        </center>
        <div class="card-body">
            <div class="row mb-3 mt-3">
                <div class="col-md-6">
                    <a href="/pasien/create" class="btn btn-primary btn-sm">Tambah Pasien</a>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>No Pasien</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Jenis Kelamin</th>
                        <th>Tgl Buat</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pasien as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->no_pasiens }}</td>
                            <td>
                                @if ($item->foto)
                                    <a href="{{ \Storage::url($item->foto) }}" target="blank">
                                        <img src="{{ \Storage::url($item->foto) }}" width="50" />
                                    </a>
                                @endif
                                <br>
                                {{ $item->nama }}
                            </td>
                            <td>{{ $item->umur }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <a href="/pasien/{{ $item->id }}/edit" class="btn btn-warning btn-sm ml-2">Edit</a>
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
            {{ $pasien->links() }}
        </div>
    </div>
@endsection
