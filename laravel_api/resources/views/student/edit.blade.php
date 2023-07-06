@extends('layouts.app')
@section('title', 'Edit')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="bg-white rounded shadow p-3">
                <a href="javascript:history.back()" class="my-3 btn btn-primary"><< Back</a>

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

                <form action="{{ route('student.update', $data['id']) }}" method="post">
                    @csrf
                    @method('PUT')

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
    </div>
@endsection
