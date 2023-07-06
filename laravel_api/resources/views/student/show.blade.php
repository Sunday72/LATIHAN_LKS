@extends('layouts.app')
@section('title', 'Show')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="bg-white rounded shadow p-3">
                <a href="javascript:history.back()" class="my-3 btn btn-primary"><< Back</a>
                <table class="table table-borderless">
                    <tr>
                        <th>Nama</th>
                        <th>:</th>
                        <td>{{ $data['nama'] }}</td>
                    </tr>
                    <tr>
                        <th>Jurusan</th>
                        <th>:</th>
                        <td>{{ $data['jurusan'] }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <th>:</th>
                        <td>{{ $data['tgl_lahir'] }}</td>
                    </tr>
                </table>
                <div class="d-flex">
                    <a href="{{ route('student.edit', $data['id']) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                    <form action="{{ route('student.destroy', $data['id']) }}" method="post"
                        onsubmit="confirm('Apakah yakin?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
