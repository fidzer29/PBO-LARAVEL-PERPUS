<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $member = Member::all();
        return view('member.index', [
            'member' => $member
        ]);
    }
    public function create()
    {
        return view('member.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
        ]);
        $array = $request->only([
            'nama_lengkap'
        ]);
        $buku = member::create($array);
        return redirect()->route('member.index')
            ->with('success_message', 'Berhasil menambah member baru');
    }
    public function edit($id)
    {
        $buku = member::findOrFail($id);
        return view('member.edit', [
            'member' => $member
        ]);
    }

    public function destroy($id)
    {
        $member = member::findOrFail($id);
        $member->delete();
        return redirect()->route('member.index')
            ->with('success_message', 'Berhasil menghapus member');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required',
        ]);
        $array = $request->only([
            'nama_lengkap'
        ]);
        $member = member::findOrFail($id);
        $member->update($array);
        return redirect()->route('member.index')
            ->with('success_message', 'Berhasil mengubah data member');
    }
}