@extends('app')
@section('content')
<div class="row">
    <div class="col-md-6">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('mahasiswa.update', $row) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nama mahasiswa <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_mahasiswa" value="{{ old('nama_mahasiswa', $row->nama_mahasiswa) }}" />
            </div>
            <div class="form-group">
                <label>NIM <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nim" value="{{ old('nim',$row->nim) }}" />
            </div>
            <div class="form-group">
                <label>Program Studi <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="prodi" value="{{ old('prodi',$row->prodi) }}" />
            </div>
            <div class="form-group">
                <label>Jenis Kelamin <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="jenis_kelamin" value="{{ old('jenis_kelamin',$row->jenis_kelamin) }}" />
            </div>
            <div class="form-group">
                <label>Tanggal Lahir <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="tgl_lahir" value="{{ old('tgl_lahir',$row->tgl_lahir) }}" />
            </div>
            <div class="form-group">
                <label>Alamat <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="alamat" value="{{ old('alamat',$row->alamat) }}" />
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Save</button>
                <a class="btn btn-danger" href="{{ route('mahasiswa.index') }}">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection
