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

    public function transaksi(Request $request)
    {
       try {
        Transaksi::create([
            'jenistransaksis_id' => $request->jenistransaksis_id,
            'total' => $request->total,
            'tanggal' => $request->tanggal,
            'nomor' => $request->nomor,
            'jenis' =>$request->jenis,
        ]);
        return response()->json([
            'status' => '200',
            'message' => 'Transaksi berhasil dibuat',
        ]);
       } catch (\Exception $e) {
        return response()->json([
            'status'=> '500',
            'message'=> 'Something went really wrong'
        ]);
       }
    }

    public function showKategori($id)
    {
      
        $transaksi = Transaksi::where('jenistransaksis_id', $id)->get();
        if (!$transaksi){
            return response()->json([
                'status' => '404',
                'message' => 'Transaksi Tidak ditemukan'
            ],);
        }return response() ->json([
            'status' => '200',
            'Transaksi' => $transaksi
        ]);
    }


    public function show($id)
    {
        $transaksi = Transaksi::find($id);
        if (!$transaksi){
            return response()->json([
                'status' => '404',
                'message' => 'Transaksi Tidak ditemukan'
            ],);
        }return response() ->json([
            'status' => '200',
            'Transaksi' => $transaksi
        ]);
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        if(!$transaksi) {
            return response()->json([
                'message' => "transaksi tidak Ditemukan"
            ],404);
        }

        //delete barang
        $transaksi->delete();

        return response()->json([
            'message' => "transaksi berhasil di hapus"
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $transaksi = Transaksi::find($id);
            if(!$transaksi){
                return response()->json([
                    'status' => '404',
                    'message' => 'transaksi tidak ditemukan'
                ]);
            }

            
            $transaksi->jenistransaksis_id = $request->jenistransaksis_id;
            $transaksi->total = $request->total;
            $transaksi-> tanggal = $request->tanggal;
            $transaksi-> nomor = $request->nomor;
            $transaksi->jenis = $request->jenis;
            $transaksi-> save();


            return response()->json([
                'status' => '200',
                'message' => 'transaksi berhasil di edit'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => '500',
                'message' => 'Something went really wrong'
            ]);
        }
    }
}
