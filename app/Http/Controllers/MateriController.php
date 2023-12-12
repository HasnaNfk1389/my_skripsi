<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use GuzzleHttp\Exception\ClientException;
use Supabase\SupabaseClient;
use Illuminate\Support\Facades\Http;

class MateriController extends Controller
{
    public function materi()
    {
        try {
            $client = new Client();
            $response = $client->get('http://localhost:3000/all_materi/All');
            $data = json_decode($response->getBody(), true);
            $nama = sprintf('http://localhost:3000/all_materi/%s',session('loggedUserClass'));
            $response_class = $client->get($nama);
            $class = json_decode($response_class->getBody(), true);
            return view('student/materi', ['materiData' => $data,'materiKelas' => $class]);
        } catch (\Exception $e) {
            return redirect('student/materi');
        }
    }

    public function all_materi()
    {
        try {
            $client = new Client();
            $response = $client->get('http://localhost:3000/all_materi/All');
            $data = json_decode($response->getBody(), true);
            $nama = sprintf('http://localhost:3000/all_materi/%s',session('loggedUserClass'));
            $response_class = $client->get($nama);
            $class = json_decode($response_class->getBody(), true);

            return view('admin/all_materi', ['materiData' => $data, 'materiKelas' => $class]);
        } catch (\Exception $e) {
            return redirect('admin/all_materi');
        }
    }
    public function editMateri(Request $request)
    {
        $data = $request->query();
        return view('admin/add_materi',['editMateri' => $data,'kode'=>'Edit Materi']);
    }
    public function add_materi()
    {
        return view('admin/add_materi', ['kode' => 'Tambah Materi']);
    }
    
    public function delete_materi(Request $request)
    {
        $user = $request->query('user_id');
        $judul = $request->query('nama_materi');
        $deskripsi = $request->query('deskripsi_materi');
        $id = $request->query('id');



        try {
            $client = new Client();
            $client->post('http://localhost:3000/deleteMateri', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'user_id' => $user,
                    'nama_materi' => $judul,
                    'deskripsi_materi' => $deskripsi,
                    'id' => $id,

                ],
            ]);
            // return response()->json(['file' => $file_desc, 'message' => 'File uploaded successfully']);
            return redirect('/all_materi');
        } catch (ClientException $e) {
            return redirect('/all_materi');
    

    }
    }
   
    public function store_materi(Request $request)
    {
        
        $judul = $request->judul;
        $deskripsi = $request->deskripsi;
        $kelas = $request->kelas;
        $user_id = session('ID');
        $request->validate([
            'file' => 'required|mimes:jpeg,png,jpg,pdf,txt|max:2048',
        ]);
        $file = $request->file('file');
        $name = $file->hashName();
        // $fileContent = file_get_contents($file->getRealPath()); //biasa
        $fileContent = base64_encode(file_get_contents($file)); //jsonb

        $file_desc = [
            'name' => $name,
            'file_name' => $file->getClientOriginalName(),
            'mime_type' => $file->getClientMimeType(),
            'path' => "materi/{$name}",
            'disk' => config('filesystems.default'),
            'size' => $file->getSize(),
            // 'content' => $fileContent, //jsonb
        ];

        $upload = $file->storeAs('public/materi', $name);

        // dd($judul, $deskripsi);
        try {
            $client = new Client();
            $client->post('http://localhost:3000/materi', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'user_id' => $user_id,
                    'nama_materi' => $judul,
                    'deskripsi_materi' => $deskripsi,
                    'file_desc' => $file_desc,
                    //debug purpose
                    // 'name' => $name,
                    // 'file_name' => $file->getClientOriginalName(),
                    // 'mime_type' => $file->getClientMimeType(),
                    'path' => "materi/{$name}",
                    // 'disk' => config('filesystems.default'),
                    // 'size' => $file->getSize(),
                    'file_content' => $fileContent,
                    'kelas' => $kelas,
                ],
            ]);
            // return response()->json(['file' => $file_desc, 'message' => 'File uploaded successfully', 'payload' => $fileContent]);
            // return redirect('/all_materi');
            $sessionRole = session('loggedUserRole');
                
            if($sessionRole =='teacher'){
                return redirect('/show_materi');
            }else if($sessionRole == 'admin'){
                return redirect('/all_materi');}
                
        } catch (ClientException $e) {
            return redirect('/add_materi');
    

    }
    

    }
    

    public function edit_materi(Request $request)
    {
        $judulcurrent = $request->judulcurrent;
        $deskripsicurrent = $request->deskripsicurrent;
        $idcurrent = $request->idcurrent;
        $useridcurrent = $request->useridcurrent;
        $kelas = $request->kelas;
        $judul = $request->judul;
        $deskripsi = $request->deskripsi;
        $user_id = session('ID');
        $request->validate([
            'file' => 'sometimes|mimes:jpeg,png,jpg,pdf,txt|max:2048',
        ]);
        $file = $request->file('file');
        if($file){
        $name = $file->hashName();
        // $fileContent = file_get_contents($file->getRealPath()); //biasa
        $fileContent = base64_encode(file_get_contents($file)); //jsonb
        $file_desc = [
            'name' => $name,
            'file_name' => $file->getClientOriginalName(),
            'mime_type' => $file->getClientMimeType(),
            'path' => "materi/{$name}",
            'disk' => config('filesystems.default'),
            'size' => $file->getSize(),
            // 'content' => $fileContent, //jsonb
            
        ];
        $upload = $file->storeAs('public/materi', $name);
        }
        

        

        

        // dd($judul, $deskripsi);
        try {
            $client = new Client();
            if($file){
                $client->post('http://localhost:3000/editMateriWithFile', [
                    'headers' => [
                        'Content-Type' => 'application/json',
                    ],
                    'json' => [
                        'user_id' => $user_id,
                        'nama_materi' => $judul,
                        'deskripsi_materi' => $deskripsi,
                        'file_desc' => $file_desc,
                        'path' => "materi/{$name}",
                        'file_content' => $fileContent,
                        'useridcurrent' => $useridcurrent,
                        'idcurrent' => $idcurrent,
                        'deskripsicurrent' => $deskripsicurrent,
                        'judulcurrent' => $judulcurrent,
                        'kelas' => $kelas,

                    ],
                ]);
                }else{
                        $client->post('http://localhost:3000/editMateri', [
                            'headers' => [
                                'Content-Type' => 'application/json',
                            ],
                            'json' => [
                                'user_id' => $user_id,
                                'nama_materi' => $judul,
                                'deskripsi_materi' => $deskripsi,
                                'useridcurrent' => $useridcurrent,
                                'idcurrent' => $idcurrent,
                                'deskripsicurrent' => $deskripsicurrent,
                                'judulcurrent' => $judulcurrent,
                                'kelas' => $kelas,
                            ],
                        ]);
                }
                // return redirect('/show_materi');
                $sessionRole = session('loggedUserRole');
                
                if($sessionRole =='teacher'){
                    return redirect('/show_materi');
                }else if($sessionRole == 'admin'){
                    return redirect('/all_materi');}
            
        } catch (ClientException $e) {
            return redirect('/add_materi');
            // ['error' => $e]

    }
    

    }

    public function newMateri()
    {
        return view('lecturer/newMateri');
    }

    public function postNewMateri(Request $request)
    {
        $supabaseUrl = "https://dvhbkrmcoralcuvkpoyh.supabase.co";
        $supabaseAnonKey =
            "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImR2aGJrcm1jb3JhbGN1dmtwb3loIiwicm9sZSI6ImFub24iLCJpYXQiOjE2OTg4MTY0OTEsImV4cCI6MjAxNDM5MjQ5MX0.EVm69J6eHvVXksf0MpuYk_RtL8EWgsYRVtBage2fAjY";
        $supabase = new SupabaseClient($supabaseUrl, $supabaseAnonKey);
        $bucketName = 'file_materi';
        $filePath = 'C:\Users\Hasna Nadaafk\Downloads\notul hasna.txt';
        $fileContents = file_get_contents($filePath);

        $nama_materi = $request->nama_materi;
        $user_id = $request->user_id;
        $deskripsi_materi = $request->deskripsi_materi;
        //$file = $request->file;
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
                    //'file' => $file,
                ],
            ]);
            $response = $supabase
            ->storage()
            ->from($bucketName)
            ->upload('C:\Users\Hasna Nadaafk\Downloads\notul hasna.txt', $fileContents); //ini masih percobaan
            
            if ($response->status() === 200) {
                // File uploaded successfully
                $url = $response->json()['data']['url'];
                // Do something with the file URL
            } else {
                // Handle the error
            }
            $data = json_decode($response->getBody(), true);
            //dd($data);
            return redirect('/newMateri');
        } catch (ClientException $e) {
            return redirect('/newMateri');
        }
    }
}
        //    $error = $response->json()['error'];
        //         // Handle the error accordingly
        //     }
            
    // public function postNewMateri($file) {
    //     $supabaseUrl = "https://dvhbkrmcoralcuvkpoyh.supabase.co";
    //     $supabaseAnonKey =
    //         "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImR2aGJrcm1jb3JhbGN1dmtwb3loIiwicm9sZSI6ImFub24iLCJpYXQiOjE2OTg4MTY0OTEsImV4cCI6MjAxNDM5MjQ5MX0.EVm69J6eHvVXksf0MpuYk_RtL8EWgsYRVtBage2fAjY";
    //     $supabase = new SupabaseClient($supabaseUrl, $supabaseKey);
    //     $bucketName = 'file_materi';
    //     $filePath = 'C:\Users\Hasna Nadaafk\Downloads\notul hasna.txt';
    //     $fileContents = file_get_contents($filePath);

    //     $response = $supabase
    //         ->storage()
    //         ->from($bucketName)
    //         ->upload('C:\Users\Hasna Nadaafk\Downloads\notul hasna.txt', $fileContents);
            
    //         if ($response->status() === 200) {
    //             // File uploaded successfully
    //             $url = $response->json()['data']['url'];
    //             // Do something with the file URL
    //         } else {
    //             // Handle the error
    //         }
    // } 
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

