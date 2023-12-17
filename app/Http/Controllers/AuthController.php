<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('auth/login');
    }

    public function welcome()
    {
        $client = new Client();
        $response = $client->get(sprintf('http://localhost:3000/allSubmittedTask/%s/%s',session('loggedUserClass'),session('loggedUserId')));
        $submittedTask = json_decode($response->getBody(), true);

        $client = new Client();
        $response = $client->get(sprintf('http://localhost:3000/allTask/%s',session('loggedUserClass')));
        $allTask = json_decode($response->getBody(), true);
        
        return view('welcome',['submittedTask'=>$submittedTask,'allTask'=>$allTask]);
    }

    public function regis()
    {
        return view('auth/regis');
    }

    public function postRegister(Request $request)
    {

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $phone = $request->phone;
        $role = 'user';
        $confirm_password = $request->confirm_password;
        $kelas = $request->kelas;
        if ($password != $confirm_password) {
            return redirect('/regis');
        }
        try {
            $client = new Client();
            $response = $client->post('http://localhost:3000/register', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'phone' => $phone,
                    'role' => $role,
                    'kelas' => $kelas,
                ],
            ]);

            $data = json_decode($response->getBody(), true);
            if (isset($data[0]['payload']['isSuccess']) && $data[0]['payload']['isSuccess'] === 'success') {
                $userId = $data[0]['payload']['id'];
                $userDetailsResponse = $client->get("http://localhost:3000/getIDUser/{$userId}");
                $userDetails = json_decode($userDetailsResponse->getBody(), true);
                $userName = $userDetails[0]['payload'][0]['name'];
                $userEmail = $userDetails[0]['payload'][0]['email'];
                $userRole = $userDetails[0]['payload'][0]['role'];
                $userKelas = $userDetails[0]['payload'][0]['kelas'];
                session(['loggedUserId' => $userId]);
                session(['loggedUserName' => $userName]);
                session(['loggedUserEmail' => $userEmail]);
                session(['loggedUserRole' => $userRole]);
                session(['loggedUserClass' => $userKelas]);
                if (session('loggedUserRole') == 'admin') {
                    return redirect('/welcome_admin');
                } else if (session('loggedUserRole') == 'teacher') {
                    return redirect('/welcome_lecturer');
                } else {
                    return redirect('/welcome');
                }
            } else {
                return redirect('/regis');
            }
        } catch (\Exception $e) {
            return redirect('/regis');
        }
    }
    public function postLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        try {
            $client = new Client();
            $response = $client->post('http://localhost:3000/login', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'email' => $email,
                    'password' => $password,
                ],
            ]);
            $data = json_decode($response->getBody(), true);
            if (isset($data[0]['payload']['isSuccess']) && $data[0]['payload']['isSuccess'] === 'success') {
                $userId = $data[0]['payload']['id'];
                $userDetailsResponse = $client->get("http://localhost:3000/getIDUser/{$userId}");
                $userDetails = json_decode($userDetailsResponse->getBody(), true);
                $id = $userDetails[0]['payload'][0]['id'];
                $userName = $userDetails[0]['payload'][0]['name'];
                $userEmail = $userDetails[0]['payload'][0]['email'];
                $userRole = $userDetails[0]['payload'][0]['role'];
                $userKelas = $userDetails[0]['payload'][0]['kelas'];
                session(['loggedUserId' => $userId]);
                session(['ID' => $id]);
                session(['loggedUserName' => $userName]);
                session(['loggedUserEmail' => $userEmail]);
                session(['loggedUserRole' => $userRole]);
                session(['loggedUserClass' => $userKelas]);
                if (session('loggedUserRole') == 'admin') {
                    return redirect('/welcome_admin');
                } else if (session('loggedUserRole') == 'teacher') {
                    return redirect('/welcome_lecturer');
                } else {
                    return redirect('/welcome');
                }
            } else {
                return redirect('/login');
            }
        } catch (\Exception $e) {
            return redirect('/login');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }

    public function download()
    {

        $client = new Client();
        $response = $client->get(sprintf('http://localhost:3000/allSubmittedTask/%s/%s',session('loggedUserClass'),session('loggedUserId')));
        $submittedTask = json_decode($response->getBody(), true);

        $client = new Client();
        $response = $client->get(sprintf('http://localhost:3000/allTask/%s',session('loggedUserClass')));
        $allTask = json_decode($response->getBody(), true);



        return view('student/download', ['submittedTask'=>$submittedTask,'allTask'=>$allTask]);
    }

    public function profile()
    {
        return view('student/profile');
    }

    public function welcome_lecturer()
    {
        return view('lecturer/welcome_lecturer');
    }

    public function welcome_admin()
    {
        return view('admin/welcome_admin');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
