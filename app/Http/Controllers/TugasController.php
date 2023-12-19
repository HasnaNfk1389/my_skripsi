<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Carbon\Carbon;

class TugasController extends Controller
{
    public function tasks()
    {
        return view('student/tasks');
    }
    

    public function postTugas(Request $request) 
    {
        $user_id = session('loggedUserId');
        $nama_siswa = $request->tname;
        $kelas = $request->kelas;
        $desk_tugas = $request->namatugas;
        // $status = $request->status;
        $input_tenggat = $request->tanggalmasuk;
        $tenggat_format = Carbon::parse($input_tenggat);
        $tenggat = $tenggat_format-> format('Y-m-d\TH:i:sP'); 
        $tanggalmasuk = date('Y-m-d\TH:i:s');
        $task_id = $request->task_id;
        if($task_id!=NULL){
            $client = new Client();
            $cekfile = $client->get(sprintf("http://localhost:3000/cekTugasGuru/%s/%s",$task_id,$user_id));
            $rescek = json_decode($cekfile->getBody(), true);
        
        }else{
            $client = new Client();
            $cekfile = $client->get(sprintf("http://localhost:3000/cekTugasGuru/0/%s",$user_id));
            $rescek = json_decode($cekfile->getBody(), true);
        }

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

        try {
            $client = new Client();
            

            if($file){
                if($rescek[0]['payload']!=NULL){
                    $response = $client->post('http://localhost:3000/tugasUpdate', [
                        'headers' => [
                            'Content-Type' => 'application/json',
                        ],
                        'json' => [
                            'user_id' => $user_id,
                            'namatugas' => $nama_siswa,
                            'kelas' => $kelas,
                            'tenggat' => $tenggat,
                            'tanggalmasuk' => $tanggalmasuk,
                            'desk_tugas' => $desk_tugas,
                            'file_content' => $fileContent,
                            'file_desc' => $file_desc,
                            'task_id' => $task_id,
        
        
                            // 'task_id' => $task_id,
                        ],
                    ]);
                }
                else{
                    $response = $client->post('http://localhost:3000/tugas', [
                        'headers' => [
                            'Content-Type' => 'application/json',
                        ],
                        'json' => [
                            'user_id' => $user_id,
                            'namatugas' => $nama_siswa,
                            'kelas' => $kelas,
                            'tenggat' => $tenggat,
                            'tanggalmasuk' => $tanggalmasuk,
                            'desk_tugas' => $desk_tugas,
                            'file_content' => $fileContent,
                            'file_desc' => $file_desc,
                            'task_id' => $task_id,
        
        
                            // 'task_id' => $task_id,
                        ],
                    ]);
                }
               
            }

            if($file=NULL){
                if($rescek[0]['payload']!=NULL){
                    $response = $client->post('http://localhost:3000/tugasUpdateWoFile', [
                        'headers' => [
                            'Content-Type' => 'application/json',
                        ],
                        'json' => [
                            'user_id' => $user_id,
                            'namatugas' => $nama_siswa,
                            'kelas' => $kelas,
                            'tenggat' => $tenggat,
                            'tanggalmasuk' => $tanggalmasuk,
                            'desk_tugas' => $desk_tugas,
                            'file_desc' => $file_desc,
                            'task_id' => $task_id,
        
        
                            // 'task_id' => $task_id,
                        ],
                    ]);
                }
                else{
                    $response = $client->post('http://localhost:3000/tugasWoFile', [
                        'headers' => [
                            'Content-Type' => 'application/json',
                        ],
                        'json' => [
                            'user_id' => $user_id,
                            'namatugas' => $nama_siswa,
                            'kelas' => $kelas,
                            'tenggat' => $tenggat,
                            'tanggalmasuk' => $tanggalmasuk,
                            'desk_tugas' => $desk_tugas,
                            'file_content' => $fileContent,
                            'file_desc' => $file_desc,
                            'task_id' => $task_id,
        
        
                            // 'task_id' => $task_id,
                        ],
                    ]);
                }

            }
            
            return redirect('/tasks');
        } catch (ClientException $e) {
            return redirect('/tasks');
        }
    }
}




public function hapusTugas(Request $request)
    {
        $task_id = $request->query('task_id');
        $id = session('loggedUserId');
        $role = session('loggedUserRole');
        


        try {
            $client = new Client();
            if($role === 'user'){ 
                $client->post('http://localhost:3000/deleteTugas', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'user_id' => $id,
                    'task_id' => $task_id,

                ],
            ]);
        }else if($role === 'teacher'){
            $client->post('http://localhost:3000/deleteTask', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'user_id' => $id,
                    'task_id' => $task_id,

                ],
            ]);
        }
           
            // return response()->json(['message' => $id]);
            return redirect('/tasks');
        } catch (ClientException $e) {
            return redirect('/tasks');
    

    }
    }





public function studentPostTugas(Request $request) 
    {
        $user_id = session('loggedUserId');
        $nama_siswa = $request->tname;
        $kelas = $request->kelas;
        $task = $request->task_id;
        $tanggalmasuk = date('Y-m-d\TH:i:s');
        $client = new Client();
        $cekfile = $client->get(sprintf("http://localhost:3000/cekfile/%s/%s",$task,$user_id));
        $rescek = json_decode($cekfile->getBody(), true);

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

        try {
            $client = new Client();
            
            if($rescek[0]['payload']!=NULL){
            $response = $client->post('http://localhost:3000/studentTugasUpdate', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'user_id' => $user_id,
                    'nama_siswa' => $nama_siswa,
                    'kelas' => $kelas,
                    'tanggalmasuk' => $tanggalmasuk,
                    'task_id' => $task,
                    'file_content' => $fileContent,
                    'file_desc' => $file_desc,


                    // 'task_id' => $task_id,
                ],
            ]);
        }
        else{
            $response = $client->post('http://localhost:3000/studentTugas', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'user_id' => $user_id,
                    'nama_siswa' => $nama_siswa,
                    'kelas' => $kelas,
                    'tanggalmasuk' => $tanggalmasuk,
                    'task_id' => $task,
                    'file_content' => $fileContent,
                    'file_desc' => $file_desc,


                    // 'task_id' => $task_id,
                ],
            ]);
        }
    
            // return sprintf(('%s %s'),$rescek[0]['payload'][0]['task_id'],$task);
            return redirect('/tasks');

        } catch (ClientException $e) {
            return redirect('/tasks');
        }
    }
}


public function addScore(Request $request){
    $task_id = $request->task_id;
    $user_id = $request->user_id;
    $score = $request->score;
    
    try {
        $client = new Client();
        $response = $client->post('http://localhost:3000/addScore', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'score' => $score,
                'user_id' => $user_id,
                'task_id' => $task_id,
            ],
        ]);
    return redirect('/tasks');
    } catch (ClientException $e) {
    return redirect('/tasks');

    }
}




    public function all_task()
    {
        $client = new Client();
        $response = $client->get(sprintf('http://localhost:3000/allSubmittedTask/%s',session('loggedUserClass')));
        $submittedTask = json_decode($response->getBody(), true);
        
        $client = new Client();
        $response = $client->get('http://localhost:3000/all_task');
        $data = json_decode($response->getBody(), true);

        $status_client = new Client();
        $logged_id = session('loggedUserId');
        $response = $status_client->get(sprintf('http://localhost:3000/semua_tugas/%s',$logged_id));
        $check_status = json_decode($response->getBody(), true);
        
        $result = [];
        $filteredtaskStudent = [];

        $filteredtask = [];
        foreach ($data[0]['payload'] as $teacher) {
            if ($teacher['kelas'] == session('loggedUserClass')) {
                $teacherTaskId = $teacher['id'];
                $task = ['task' => $teacher];
                $filteredtask[] = json_encode($task);
            }
        }
        foreach ($check_status[0]['payload'] as $student) {
            $task = ['student' => $student];
            $filteredtask[] = json_encode($task);
            // $filteredtaskStudent[] = $student;

        }



        return view('student/all_task', ['taskData' => $filteredtask, 'result_status' => $filteredtaskStudent, 'submittedTask' => $submittedTask]);
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
    public function newTask(Request $request) {
        $data = $request->query();
        return view('lecturer/newTask', ['editTugas' => $data,'kode'=>'Edit Tugas']);
    }
    public function all_task_teacher()
    {
        return view('lecturer/newTask');
    }

}
