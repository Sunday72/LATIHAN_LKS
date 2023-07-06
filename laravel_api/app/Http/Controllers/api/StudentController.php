<?php

namespace App\Http\Controllers\api;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('nama')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil temukan!',
            'data' => $students
        ], 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'jurusan' => 'required',
            'tgl_lahir' => 'required|date'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menambahkan data!',
                'data' => $validator->errors()
            ]);
        }

        $student = new Student;
        $student->nama = $request->nama;
        $student->jurusan = $request->jurusan;
        $student->tgl_lahir = $request->tgl_lahir;
        $student->save();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil menambahkan data!'
        ]);
    }

    public function show(string $id)
    {
        $student = Student::find($id);

        if ($student) {
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil temukan!',
                'data' => $student
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak temukan!',
            ], 404);
        }
    }

    public function update(Request $request, string $id)
    {
        $student = Student::find($id);

        if(empty($student)){
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan!'
            ]);
        }

        $rules = [
            'nama' => 'required',
            'jurusan' => 'required',
            'tgl_lahir' => 'required|date'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengupdate data!',
                'data' => $validator->errors()
            ]);
        }

        $student->nama = $request->nama;
        $student->jurusan = $request->jurusan;
        $student->tgl_lahir = $request->tgl_lahir;
        $student->save();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil mengupdate data!'
        ]);
    }

    public function destroy(string $id)
    {
        $student = Student::find($id);

        if(empty($student)){
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan!'
            ]);
        }
        
        $student->delete();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil menghapus data!'
        ]);
    }
}
