<?php

namespace App\Http\Controllers;

use App\Models\Student;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $client = new Client(); // inisialisasi GuzzlHttp Client
        $url = "http://127.0.0.1:8000/api/student"; // URL Api
        $response = $client->request('GET', $url); // GET response dari URL
        $content = $response->getBody()->getContents(); // Mendapatkan json dari response nya
        $contentArray = json_decode($content, true); // Mengubah json menjadi format array

        if($contentArray["status"] == true) {
            $data = $contentArray["data"];
            return view("student.index", ["data" => $data]);
        } else {
            $error = $contentArray["message"];
            return view("student.index", ["errors" => $error]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $parameters = [
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
            'tgl_lahir' => $request->tgl_lahir,
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/student";
        $response = $client->request('POST', $url, [ // Method POST karena ingin menambah data
            "headers" => ["Content-type" => "application/json"],
            "body" => json_encode($parameters)
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);

        if ($contentArray['status'] == true) {
            return redirect(route("student.index"))->with('success', 'Berhail menambahkan data!');
        } else {
            $errors = $contentArray["data"];
            return redirect(route("student.index"))->withErrors($errors)->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = new Client(); // inisialisasi GuzzlHttp Client
        $url = "http://127.0.0.1:8000/api/student/$id"; // URL Api
        $response = $client->request('GET', $url); // GET response dari URL
        $content = $response->getBody()->getContents(); // Mendapatkan json dari response nya
        $contentArray = json_decode($content, true); // Mengubah json menjadi format array

        if($contentArray["status"] == true) {
            $data = $contentArray["data"];
            return view("student.show", ["data" => $data]);
        } else {
            $error = $contentArray["message"];
            return redirect(route('student.index'))->withErrors($error);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = new Client(); // inisialisasi GuzzlHttp Client
        $url = "http://127.0.0.1:8000/api/student/$id"; // URL Api
        $response = $client->request('GET', $url); // GET response dari URL
        $content = $response->getBody()->getContents(); // Mendapatkan json dari response nya
        $contentArray = json_decode($content, true); // Mengubah json menjadi format array

        if($contentArray["status"] == true) {
            $data = $contentArray["data"];
            return view("student.edit", ["data" => $data]);
        } else {
            $error = $contentArray["message"];
            return redirect(route('student.index'))->withErrors($error);
        }
    }

    public function update(Request $request, string $id)
    {
        $parameters = [
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
            'tgl_lahir' => $request->tgl_lahir,
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/student/$id";
        $response = $client->request('PUT', $url, [ // Method POST karena ingin menambah data
            "headers" => ["Content-type" => "application/json"],
            "body" => json_encode($parameters)
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);

        if ($contentArray['status'] == true) {
            return redirect(route("student.index"))->with('success', 'Berhasil mengupdate data!');
        } else {
            $errors = $contentArray["data"];
            return redirect(route("student.index"))->withErrors($errors)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = new Client(); // inisialisasi GuzzlHttp Client
        $url = "http://127.0.0.1:8000/api/student/$id"; // URL Api
        $response = $client->request('DELETE', $url); // DELETE response dari URL
        $content = $response->getBody()->getContents(); // Mendapatkan json dari response nya
        $contentArray = json_decode($content, true); // Mengubah json menjadi format array
        
        if ($contentArray['status'] == true) {
            return redirect(route("student.index"))->with('success', 'Berhasil menghapus data!');
        } else {
            $errors = $contentArray["data"];
            return redirect(route("student.index"))->withErrors($errors);
        }
    }
}
