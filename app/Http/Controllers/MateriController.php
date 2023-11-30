<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;


class MateriController extends Controller
{
    public function materi()
    {
        return view('student/materi');
    }

    public function add_materi()
    {
        return view('admin/add_materi');
    }

    public function newMateri()
    {
        return view('lecturer/newMateri');
    }
    
    public function postNewMateri(Request $request)
    {
        $nama_materi = $request->nama_materi;
        $user_id = $request->user_id;
        $deskripsi_materi = $request->deskripsi_materi;
        $file = $request->file;
        // dd($nama_materi, $user_id, $deskripsi_materi, $file);
        try {
            $client = new Client();
            $response = $client->post('http://localhost:3000/materi', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'nama_materi' => $nama_materi,
                    'user_id' => $user_id,
                    'deskripsi_materi' => $deskripsi_materi,
                    'file' => $file,
                ],
            ]);
            $data = json_decode($response->getBody(), true);
            //dd($data);
            return redirect('/newMateri');
        } catch (RequestException $e) {
            return redirect('/newMateri');
        }
    }

//     public function postNewMateri(Request $request)
//     {
//         $nama_materi = $request->nama_materi;
//         $user_id = $request->user_id;
//         $deskripsi_materi = $request->deskripsi_materi;
//         $file = $request->file('file'); // Use file() instead of file
        
//         try {
//             $client = new Client();
//             $response = $client->post('http://localhost:3000/materi', [
//                 'headers' => [
//                     'Content-Type' => 'multipart/form-data', // Change to multipart/form-data
//                 ],
//                 'multipart' => [
//                     [
//                         'name'     => 'nama_materi',
//                         'contents' => $nama_materi,
//                     ],
//                     [
//                         'name'     => 'user_id',
//                         'contents' => $user_id,
//                     ],
//                     [
//                         'name'     => 'deskripsi_materi',
//                         'contents' => $deskripsi_materi,
//                     ],
//                     [
//                         'name'     => 'file',
//                         'contents' => fopen($file->getRealPath(), 'r'), // Use fopen to read the file
//                         'file' => $file->getClientOriginalName(),
//                     ],
//                 ]
                
//             ]);

//             $data = json_decode($response->getBody(), true);
//             dd($data);
//             // return redirect('/lecturer/newMateri');
//         } catch (RequestException $e) {
//             return redirect('/lecturer/newMateri');
//         }
//     }

}
