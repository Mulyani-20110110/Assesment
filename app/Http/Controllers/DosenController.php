<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index(Request $request)
    {
        $data['title'] = 'Data Dosen';
        $data['q'] = $request->q;
        $data['rows'] = Dosen::where('nama_dosen', 'like', '%' . $request->q . '%')->get();
        return view('dosen.index', $data);
    }

    public function read()
    {
        $data = dosen::all();
        return response()->json([
            'dosen' => $data
        ]);
    }

    public function create(Request $request)
    {
        $data['title'] = 'Tambah Data dosen';
        return view('dosen.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_dosen' => 'required',
            'nip' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
        ]);

        $dosen = new dosen();
        $dosen->nama_dosen = $request->nama_dosen;
        $dosen->nip = $request->nip;
        $dosen->jenis_kelamin = $request->jenis_kelamin;
        $dosen->tgl_lahir = $request->tgl_lahir;
        $dosen->alamat = $request->alamat;
        $dosen->save();
        $dosen = Dosen::where('id','=', $dosen->id)->get();
        return redirect('dosen')->with('success', 'Tambah Data Dosen Berhasil');
    }

    public function show($id)
    {
        $dosen = Dosen::find($id);
            if (!$dosen) {
                return response()->json([
                    'message' => 'Dosen tidak ditemukan'
        ], 404);
    }
        return response()->json([
            'dosen' => $dosen
        ]);
    }
    public function edit(Dosen $dosen)
    {
        $data['title'] = 'Ubah Data Dosen';
        $data['row'] = $dosen;
        return view('dosen.edit', $data);
    }

    public function update(Request $request, Dosen $dosen)
    {

        $request->validate([
            'nama_dosen' => 'required',
            'nip' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
        ]);

        $dosen->nama_dosen = $request->nama_dosen;
        $dosen->nip = $request->nip;
        $dosen->jenis_kelamin = $request->jenis_kelamin;
        $dosen->tgl_lahir = $request->tgl_lahir;
        $dosen->alamat = $request->alamat;
        $dosen->save();
        return redirect('dosen')->with('success', 'Ubah Data Dosen Berhasil');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect('dosen')->with('success', 'Hapus Data Dosen Berhasil');
    }
}
