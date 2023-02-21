@extends('layout.app')

@section('content')
    <div class="card mt-3">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3>List Anggota Keluarga</h3>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('family.create') }}" class="btn btn-primary">Tambah</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Parent</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->parent->name ?? '' }}</td>
                            <td>
                                <div class="col-auto row m-0">
                                    <div class="col-auto g-1">
                                        <a href="{{ route('family.edit', $item->id) }}" class="btn btn-info" type="button">
                                            Edit
                                        </a>
                                    </div>
                                    <div class="col-auto g-1">
                                        <form action="{{ route('family.destroy', $item->id) }}" id="delete-{{ $item->id }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="button"
                                                onclick="delete_({{ $item->id }})">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function delete_(id) {
            Swal.fire({
                title: 'Anda Yakin Ingin Menghapus?',
                text: "Data Akan Hilang!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#delete-' + id).submit();
                }
            })
        }
    </script>
@endpush
