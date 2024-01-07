@extends('app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
            @endif
            <form action="{{ route('prodi.update', $row) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Program Studi <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="nama_prodi"
                        value="{{ old('nama_prodi', $row->nama_prodi) }}" />
                </div>
                <div class="form-group">
                    <label>Jenjang <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="jenjang" value="{{ old('jenjang', $row->jenjang) }}" />
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Save</button>
                    <a class="btn btn-danger" href="{{ route('prodi.index') }}">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
