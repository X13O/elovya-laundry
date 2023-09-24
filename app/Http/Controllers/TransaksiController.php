<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.laporan.index', [
            'title' => 'Laporan',
            'transaksi' => Transaksi::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'tgl_transaksi' => 'required',
            'nama_konsumen' => 'required',
            'nomor_konsumen' => 'required',
            'kategori_jasa' => 'required',
            'tipe_cucian' => 'required',
            'berat_cucian' => 'required',
            'total_harga' => 'required',
            'bayar' => 'required',
            'kembalian' => 'required',
        ]);

        $validasi['user_id'] = auth()->user()->id;

        Transaksi::create($validasi);

        return redirect('/dashboard/laporan')->with('success', 'Transaksi Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('dashboard.laporan.show', [
            'title' => 'Laporan Transaksi',
            'post' => Transaksi::find($id),
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Transaksi::destroy($id);

        return redirect('/dashboard/laporan')->with('success', 'Transaksi Berhasil di Hapus');
    }
}
