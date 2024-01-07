<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index(Request $request)
    {
        $data['title'] = 'Data matakuliah';
        $data['q'] = $request->q;
        $data['rows'] = MataKuliah::where('nama_mk', 'like', '%' . $request->q . '%')->get();
        return view('matakuliah.index', $data);
    }

    public function read()
    {
        $data = MataKuliah::all();
        return response()->json([
            'matakuliah' => $data
        ]);
    }

    public function create(Request $request)
    {
        $data['title'] = 'Tambah Data Mata Kuliah';
        return view('matakuliah.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mk' => 'required',
            'kode' => 'required',
            'prodi' => 'required',
        ]);

        $matakuliah = new MataKuliah();
        $matakuliah->nama_mk = $request->nama_mk;
        $matakuliah->kode = $request->kode;
        $matakuliah->prodi = $request->prodi;
        $matakuliah->save();
        $matakuliah = Matakuliah::where('id','=', $matakuliah->id)->get();
        return redirect('matakuliah')->with('success', 'Tambah Data Mata Kuliah Berhasil');
    }

    public function show($id)
    {
        $matakuliah = Matakuliah::find($id);
            if (!$matakuliah) {
                return response()->json([
                    'message' => 'Data Mata Kuliah Tidak Ditemukan'
        ], 404);
    }
        return response()->json([
            'matakuliah' => $matakuliah
        ]);
    }
    public function edit(MataKuliah $matakuliah)
    {
        $data['title'] = 'Ubah Data Mata Kuliah';
        $data['row'] = $matakuliah;
        return view('matakuliah.edit', $data);
    }

    public function update(Request $request, MataKuliah $matakuliah)
    {

        $request->validate([
            'nama_mk' => 'required',
            'kode' => 'required',
            'prodi' => 'required',
        ]);

        $matakuliah->nama_mk = $request->nama_mk;
        $matakuliah->kode = $request->kode;
        $matakuliah->prodi = $request->prodi;
        $matakuliah->save();
        return redirect('matakuliah')->with('success', 'Ubah Data Mata Kuliah Berhasil');
    }

    public function destroy(MataKuliah $matakuliah)
    {
        $matakuliah->delete();
        return redirect('matakuliah')->with('success', 'Hapus Data Mata Kuliah Berhasil');
    }
}
