<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dokterController extends Controller
{
    public function index(): void
    {
        echo "Hallo, saya berada dihalaman dokter index";
    }
    public function create(): string
    {
        return "Hallo, saya berada dihalaman tambah data dokter";

    }
    public function edit($angka): string
    {
        return "Hallo, saya berada dihalaman edit dengan nilai $angka";

    }
    public function show($angka): string
    {
        return "Hallo, saya berada dihalaman show dengan nilai $angka";

    }
}
