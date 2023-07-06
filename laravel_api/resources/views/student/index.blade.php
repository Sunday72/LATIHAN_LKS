@extends('layouts.app')
@section('title', 'index')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="bg-white rounded shadow p-3">
                {{-- ERRORS BOX --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- END ERRORS BOX --}}

                <form action="" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama"
                            value="{{ isset($data['nama']) ? $data['nama'] : old('nama') }}">
                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <input type="text" name="jurusan" class="form-control" placeholder="Masukkan jurusan"
                            value="{{ isset($data['jurusan']) ? $data['jurusan'] : old('jurusan') }}">
                    </div>
                    <div class="mb-3">
                        <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control"
                            value="{{ isset($data['tgl_lahir']) ? $data['tgl_lahir'] : old('tgl_lahir') }}">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="bg-white rounded shadow py-2 px-3">
                {{-- SUCCESS BOX --}}
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                {{-- END SUCCESS BOX --}}

                <table class="table table-sm table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jurusan</th>
                            <th>Tanggal Lahir</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student['nama'] }}</td>
                                <td>{{ $student['jurusan'] }}</td>
                                <td>{{ date('d/m/Y', strtotime($student['tgl_lahir'])) }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('student.show', $student['id']) }}"
                                            class="btn btn-primary btn-sm me-1">Show</a>
                                        <a href="{{ route('student.edit', $student['id']) }}"
                                            class="btn btn-warning btn-sm me-1">Edit</a>
                                        <form action="{{ route('student.destroy', $student['id']) }}" method="post"
                                            onsubmit="confirm('Apakah yakin?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
