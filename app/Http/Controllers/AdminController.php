<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class AdminController extends Controller
{
    public function add_user()
    {
        return view('admin/add_user');
    }

    public function editTugas(Request $request, $id)
    {
        $user_id = $request->user_id;
        $nama_siswa = $request->nama_siswa;
        $kelas = $request->kelas;
        $namatugas = $request->namatugas;
        $file = $request->file;
        $tanggalmasuk = $request->tanggalmasuk;

        try {
            $client = new Client();
            $response = $client->put("http://localhost:3000/tugas/{$id}", [  // Add the resource identifier in the URL
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
        } catch (ClientException $e) {
            return redirect('/tasks');
        }
    }
}
