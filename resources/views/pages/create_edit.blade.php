@extends('layout.app')

@section('content')
    <div class="card mt-3">
        <div class="card-header">
            <h3>Tambah Anggota</h3>
        </div>
        <div class="card-body">
            @if (Route::is('family.create'))
                <form action="{{ route('family.store') }}" method="post">
            @else
                <form action="{{ route('family.update', $data['data']->id) }}" method="post">
                @method('PUT')
            @endif
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="name" value="{{ old('name', $data['data']->name) }}" placeholder="Budi">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                    <option value="" selected disabled>Pilih jenis Kelamin</option>
                    @foreach ($data['jenis_kelamin'] as $item)
                        <option {{ old('jenis_kelamin', $data['data']->jenis_kelamin) == $item ? 'selected' : '' }}
                            value="{{ $item }}">{{ jenis($item) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Parent</label>
                <select name="id_parent" class="form-control">
                    <option value="" selected disabled>Pilih Parent</option>
                    @foreach ($data['parent'] as $item)
                        <option {{ old('id_parent', $data['data']->id_parent ) == $item->id ? 'selected' : '' }}
                            value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                @if (Route::is('family.create'))
                    <button class="btn btn-primary" type="submit">Tambah</button>
                @else
                    <button class="btn btn-primary" type="submit">Upload</button>
                @endif
                <a href="{{ route('family.index') }}" class="btn btn-light">Kembali</a>
            </div>
            </form>
        </div>
    </div>
@endsection
