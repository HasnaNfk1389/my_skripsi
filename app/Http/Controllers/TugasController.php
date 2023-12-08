<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

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
        $user_id = session('loggedUserId');
        $nama_siswa = $request->nama_siswa;
        $kelas = $request->kelas;
        $status = $request->status;
        $tanggalmasuk = date('Y-m-d H:i:s');
        $task_id = $request->task_id;

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
                    'status' => $status,
                    'tanggalmasuk' => $tanggalmasuk,
                    'task_id' => $task_id,
                ],
            ]);
            $data = json_decode($response->getBody(), true);
            return redirect('/tasks');
        } catch (ClientException $e) {
            return redirect('/tasks');
        }
    }

    public function all_task()
    {
        $client = new Client();
        $response = $client->get('http://localhost:3000/all_task');
        $data = json_decode($response->getBody(), true);

        $status_client = new Client();
        $response = $status_client->get('http://localhost:3000/semua_tugas');
        $check_status = json_decode($response->getBody(), true);
        
        $logged_id = session('loggedUserId');
        $result = [];

        $filteredtask = [];
        
        foreach ($data[0]['payload'] as $task) {
            if ($task['kelas'] == session('loggedUserClass')) {
                $taskId = $task['id'];
                
                foreach ($check_status as $statusData) {
                    foreach ($statusData['payload'] as $status) {
                        // dd($status['user_id'], $logged_id, $status['task_id'], $taskId);
                        if ($status['user_id'] === $logged_id && $status['task_id'] === $taskId) {
                            $result[] = "Sudah Mengumpulkan";
                        }
                    }
                }
                $filteredtask[] = $task;
            }
        }

        return view('student/all_task', ['taskData' => $filteredtask, 'result_status' => $result]);
    }

    public function submit_task($id) {
        return view('student/submit_task', ['task_id' => $id]);
        // return view('student/submit_task');
    }

    public function store_tugas(Request $request)
    {
        $nama_siswa = $request->nama_siswa;
        $kelas = $request->kelas;
        $tgl = $request->tgl;
        // dd($judul, $deskripsi);
        try {
            $client = new Client();
            $response = $client->post('http://localhost:3000/materi', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'nama_siswa' => $nama_siswa,
                    'kelas' => $kelas,
                    'tgl' => $tgl,
                ],
            ]);
            return redirect('/all_task');
        } catch (ClientException $e) {
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
    public function all_task_teacher()
    {
        return view('lecturer/newTask');
    }

}
