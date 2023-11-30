<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TugasController extends Controller
{
    public function tasks()
    {
        return view('student/tasks');
    }
    // public function postTugas()
    // {
    //     $user_id = $request->user_id;
    //     $nama_siswa = $request->nama_siswa;
    //     $kelas = $request->kelas;
    //     $namatugas = $request->namatugas;
    //     $tanggalmasuk = $request->tanggalmasuk;
    //     try {
    //         $client = new Client();
    //         $response = $client->post('http://localhost:3000/tugas', [
    //             'headers' => [
    //                 'Content-Type' => 'application/json',
    //             ],
    //             'json' => [
    //                 'user_id' => $user_id,
    //                 'nama_siswa' => $nama_siswa,
    //                 'kelas' => $kelas,
    //                 'namatugas' => $namatugas,
    //                 'tanggalmasuk' => $tanggalmasuk,
    //             ],
    //         ]);
    //         return redirect('/');
    //     } catch (RequestException $e) {
    //         return redirect('/tasks');
    //     }
    // }

    public function postTugas(Request $request) 
    {
        $user_id = $request->user_id;
        $nama_siswa = $request->nama_siswa;
        $kelas = $request->kelas;
        $namatugas = $request->namatugas;
        $file = $request->file;
        $tanggalmasuk = $request->tanggalmasuk;


        try {
            $client = new Client();
            $response = $client->post('http://localhost:3000/tugas', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'user_id' => $user_id,
                    'nama_siswa' => $nama_siswa,
                    'kelas' => $kelas,
                    'namatugas' => $namatugas,
                    'file' => $file,
                    'tanggalmasuk' => $tanggalmasuk,
                ],
            ]);
            $data = json_decode($response->getBody(), true);
            return redirect('/tasks');
        } catch (RequestException $e) {
            return redirect('/tasks');
        }
    }

    // public function postTask()
    // {
    //     $user_id = $request->user_id;
    //     $nama_siswa = $request->nama_siswa;
    //     $kelas = $request->kelas;
    //     $namatugas = $request->namatugas;
    //     $file = $request->file;
    //     $tanggalmasuk = $request->tanggalmasuk;


    //     try {
    //         $client = new Client();
    //         $response = $client->post('http://localhost:3000/tugas', [
    //             'headers' => [
    //                 'Content-Type' => 'application/json',
    //             ],
    //             'json' => [
    //                 'user_id' => $user_id,
    //                 'nama_siswa' => $nama_siswa,
    //                 'kelas' => $kelas,
    //                 'namatugas' => $namatugas,
    //                 'file' => $file,
    //                 'tanggalmasuk' => $tanggalmasuk,
    //             ],
    //         ]);
    //         $data = json_decode($response->getBody(), true);
    //         return redirect('/tasks');
    //     } catch (RequestException $e) {
    //         return redirect('/tasks');
    //     }
    // }

    public function add_task()
    {
        return view('admin/add_task');
    }
    public function newTask()
    {
        return view('lecturer/newTask');
    }
}
