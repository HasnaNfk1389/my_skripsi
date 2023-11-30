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
    public function login ()
    {
        return view ('auth/login');
    }

    public function welcome ()
    {
        dd(Auth::login);
        return view ('welcome');
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
                ],
            ]);

            $data = json_decode($response->getBody(), true);
            // dd($data);
            if (isset($data[0]['payload']['isSuccess']) && $data[0]['payload']['isSuccess'] === 'success') {
                $userId = $data[0]['payload']['id'];
                // $userName = $data[0]['payload']['name'];
                $userDetailsResponse = $client->get("http://localhost:3000/getIDUser/{$userId}");
                $userDetails = json_decode($userDetailsResponse->getBody(), true);
                // dd($userDetails);
                $userName = $userDetails[0]['payload'][0]['name'];
                $userEmail = $userDetails[0]['payload'][0]['email'];
                session(['loggedUserId' => $userId]);
                session(['loggedUserName' => $userName]);
                session(['loggedUserEmail' => $userEmail]);
                
                return redirect('/');
            } else {
                return redirect('/regis');
            }
        } catch (RequestException $e) {
            return redirect('/regis');
        }
    }
    
    public function postLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

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
        dd($response->getStatusCode());

    // if ($response->getStatusCode() == 200) {
    //     return redirect('/');
    // } else {
    //     return redirect('/login');
    // }
    }
    
    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }

    public function download()
    {
        return view('student/download');
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
