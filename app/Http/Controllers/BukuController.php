<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BukuController extends Controller
{
    public function index()
    {
        // $buku = DB::table('buku')->select("nama_buku")->get();
        $buku = buku::all();
        Log::info('Showing user',$buku);
        return view('buku.index', [
            'buku' => $buku
        ]);
    }

    public function create()
    {
        return view('buku.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_buku' => 'required',
        ]);
        $array = $request->only([
            'nama_buku'
        ]);
        $buku = buku::create($array);
        return redirect()->route('buku.index')
            ->with('success_message', 'Berhasil menambah buku baru');
    }

    public function edit($id)
    {
        $buku = buku::findOrFail($id);
        return view('buku.edit', [
            'buku' => $buku
        ]);
    }

    public function destroy($id)
    {
        $buku = buku::findOrFail($id);
        $buku->delete();
        return redirect()->route('buku.index')
            ->with('success_message', 'Berhasil menghapus buku');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_buku' => 'required',
        ]);
        $array = $request->only([
            'nama_buku'
        ]);
        $buku = buku::findOrFail($id);
        $buku->update($array);
        return redirect()->route('buku.index')
            ->with('success_message', 'Berhasil mengubah buku');
    }
}
