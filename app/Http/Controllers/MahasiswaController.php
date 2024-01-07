<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $data['title'] = 'Data Mahasiswa';
        $data['q'] = $request->q;
        $data['rows'] = Mahasiswa::where('nama_mahasiswa', 'like', '%' . $request->q . '%')->get();
        return view('mahasiswa.index', $data);
    }

    public function read()
    {
        $data = Mahasiswa::all();
        return response()->json([
            'mahasiswa' => $data
        ]);
    }

    public function create(Request $request)
    {
        $data['title'] = 'Tambah Data Mahasiswa';
        return view('mahasiswa.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mahasiswa' => 'required',
            'nim' => 'required',
            'prodi' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
        ]);

        $mahasiswa = new Mahasiswa();
        $mahasiswa->nama_mahasiswa = $request->nama_mahasiswa;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->prodi = $request->prodi;
        $mahasiswa->jenis_kelamin = $request->jenis_kelamin;
        $mahasiswa->tgl_lahir = $request->tgl_lahir;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->save();
        $mahasiswa = Mahasiswa::where('id','=', $mahasiswa->id)->get();
        return redirect('mahasiswa')->with('success', 'Tambah Data Mahasiswa Berhasil');
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);
            if (!$mahasiswa) {
                return response()->json([
                    'message' => 'Mahasiswa tidak ditemukan'
        ], 404);
    }
        return response()->json([
            'mahasiswa' => $mahasiswa
        ]);
    }
    public function edit(Mahasiswa $mahasiswa)
    {
        $data['title'] = 'Ubah Data Mahasiswa';
        $data['row'] = $mahasiswa;
        return view('mahasiswa.edit', $data);
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {

        $request->validate([
            'nama_mahasiswa' => 'required',
            'nim' => 'required',
            'prodi' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
        ]);

        $mahasiswa->nama_mahasiswa = $request->nama_mahasiswa;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->prodi = $request->prodi;
        $mahasiswa->jenis_kelamin = $request->jenis_kelamin;
        $mahasiswa->tgl_lahir = $request->tgl_lahir;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->save();
        return redirect('mahasiswa')->with('success', 'Ubah Data Mahasiswa Berhasil');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect('mahasiswa')->with('success', 'Hapus Data Mahasiswa Berhasil');
    }
}
