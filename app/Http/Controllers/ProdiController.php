<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index(Request $request)
    {
        $data['title'] = 'Data Program Studi';
        $data['q'] = $request->q;
        $data['rows'] = Prodi::where('nama_prodi', 'like', '%' . $request->q . '%')->get();
        return view('prodi.index', $data);
    }

    public function read()
    {
        $data = Prodi::all();
        return response()->json([
            'prodi' => $data
        ]);
    }

    public function create(Request $request)
    {
        $data['title'] = 'Tambah Data prodi';
        return view('prodi.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_prodi' => 'required',
            'jenjang' => 'required',
        ]);

        $prodi = new prodi();
        $prodi->nama_prodi = $request->nama_prodi;
        $prodi->jenjang = $request->jenjang;
        $prodi->save();
        $prodi = prodi::where('id','=', $prodi->id)->get();
        return redirect('prodi')->with('success', 'Tambah Data Program Studi Berhasil');
    }

    public function show($id)
    {
        $prodi = prodi::find($id);
            if (!$prodi) {
                return response()->json([
                    'message' => 'Program Studi Tidak Ditemukan'
        ], 404);
    }
        return response()->json([
            'prodi' => $prodi
        ]);
    }
    public function edit(Prodi $prodi)
    {
        $data['title'] = 'Ubah Data Program Studi';
        $data['row'] = $prodi;
        return view('prodi.edit', $data);
    }

    public function update(Request $request, Prodi $prodi)
    {

        $request->validate([
            'nama_prodi' => 'required',
            'jenjang' => 'required',
        ]);

        $prodi->nama_prodi = $request->nama_prodi;
        $prodi->jenjang = $request->jenjang;
        $prodi->save();
        return redirect('prodi')->with('success', 'Ubah Data Program Studi Berhasil');
    }

    public function destroy(Prodi $prodi)
    {
        $prodi->delete();
        return redirect('prodi')->with('success', 'Hapus Data Program Studi Berhasil');
    }
}
