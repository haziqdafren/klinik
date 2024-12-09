<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ProfilController extends Controller
{
    public function index(): void
    {
        echo"Nama Saya ", request(key: 'nama');
        echo "<br>";
        echo "Umur Saya ", request(key: 'umur'), "Tahun";
    }
    public function create(): string
    {
        return "Hallo saya adalah fungsi index dalam ProfilController.";

    }
    public function edit($nama,$nim): string
    {
        return "Hallo, nama saya $nama dengan NIM : $nim";

    }


    }
