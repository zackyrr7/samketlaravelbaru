<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        return Transaksi::all();
    }

    public function store(Request $request)
    {
       
    }
}
