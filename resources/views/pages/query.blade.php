@extends('layout.app')

@section('content')
    <div class="card mt-3">
        <div class="card-header">
            <h3>Hasil Query</h3>
        </div>
        <div class="card-body">
            <h3>Semua anak dari Budi</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data->child as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ jenis($item->jenis_kelamin) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h3>Semua cucu dari Budi</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data->child as $item)
                        @foreach ($item->child as $item2)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item2->name }}</td>
                                <td>{{ jenis($item2->jenis_kelamin) }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>

            <h3>Semua cucu perempuan dari Budi</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data->child as $item)
                        @foreach ($item->child->where('jenis_kelamin', 'P') as $item2)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item2->name }}</td>
                                <td>{{ jenis($item2->jenis_kelamin) }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>

            <h3>Bibi dari Farah</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data->child->where('jenis_kelamin', 'P') as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ jenis($item->jenis_kelamin) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h3>Sepupu Laki-Laki Hani</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data->child as $item)
                        @foreach ($item->child->where('jenis_kelamin', 'L') as $item2)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item2->name }}</td>
                                <td>{{ jenis($item2->jenis_kelamin) }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
