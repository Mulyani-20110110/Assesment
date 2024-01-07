@extends('app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
            @endif
            <form action="{{ route('matakuliah.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Mata Kuliah <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="nama_mk" value="{{ old('nama_mk') }}" />
                </div>
                <div class="form-group">
                    <label>Kode<span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="kode" value="{{ old('kode') }}" />
                </div>
                <div class="form-group">
                    <label>Program Studi <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="prodi" value="{{ old('prodi') }}" />
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Save</button>
                    <a class="btn btn-danger" href="{{ route('matakuliah.index') }}">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
