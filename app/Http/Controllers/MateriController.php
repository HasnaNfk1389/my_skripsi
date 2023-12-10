<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use GuzzleHttp\Exception\ClientException;
use Supabase\SupabaseClient;


class MateriController extends Controller
{
    public function materi()
    {
        try {
            $client = new Client();
            $response = $client->get('http://localhost:3000/all_materi');
            $data = json_decode($response->getBody(), true);

            return view('student/materi', ['materiData' => $data]);
        } catch (\Exception $e) {
            return redirect('student/all_materi');
        }
    }

    public function all_materi()
    {
        try {
            $client = new Client();
            $response = $client->get('http://localhost:3000/all_materi');
            $data = json_decode($response->getBody(), true);

            return view('admin/all_materi', ['materiData' => $data]);
        } catch (\Exception $e) {
            return redirect('admin/all_materi');
        }
    }

    public function add_materi()
    {
        return view('admin/add_materi');
    }

    public function store_materi(Request $request)
    {
        $judul = $request->judul;
        $deskripsi = $request->deskripsi;
        // dd($judul, $deskripsi);
        try {
            $client = new Client();
            $response = $client->post('http://localhost:3000/materi', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'judul' => $judul,
                    'deskripsi' => $deskripsi,
                ],
            ]);
            return redirect('/all_materi');
        } catch (ClientException $e) {
            return redirect('/add_materi');
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
        $supabase = new SupabaseClient($supabaseUrl, $supabaseKey);
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
                    'file' => $file,
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

