<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\Users;
use Session;

class Register_Login_Controller extends Controller
{
    function registerUser(Request $req)
    {
        $validateData = $req->validate([
            'name' => 'required|regex:/^[a-z A-Z]+$/u',
            'username' => 'required|unique:user|regex:/^[a-z A-Z 0-9 _]+$/',
            'email' => 'required|unique:user|email',
            'password' => 'required|min:6|max:12',
            'confirm_password' => 'required|same:password',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4098',
            'balance' => 'required|integer|min:1000|max:99999999'
        ]);

        $result = DB::table('user')
            ->where('email', $req->input('email'))
            ->ORwhere('username', $req->input('username'))
            ->get();



        $res = json_decode($result, true);
        print_r($res);

        if (sizeof($res) == 0) {
            $data = $req->input();
            $users = new Users;
            $users->fullname = $data['name'];
            $users->username = $data['username'];
            $users->email = $data['email'];
            $encrypted_password = crypt::encrypt($data['password']);
            $users->wallet = $data['balance'];
            $users->password = $encrypted_password;
            $users->status = "student";

            if ($req->image != null) {
                $imageName = ($data['username']) . '.' . $req->image->extension();
                $req->image->move(public_path('Images\users'), $imageName);

                $users->userImage = $imageName;
            } else {
                $users->userImage = "Default.png";
            }
            $users->save();
            $req->session()->flash('register_status', 'Student has been registered successfully');
            return redirect('/register');
        }
    }

    // Login
    function login(Request $req)
    {

        // $userData=Users::all();
        // $dashboardData = compact('userData');


        $validatedData = $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $result = DB::table('user')
            ->where('email', $req->input('email'))
            ->get();

        $dashboardData = compact('result');


        $res = json_decode($result, true);
        //print_r($res);

        if (sizeof($res) == 0) {
            $req->session()->flash('error', 'Email does not exist. Please register yourself first');
            echo "Email Does not Exist.";
            return redirect('login');
        } else {
            //echo "Hello";
            $encrypted_password = $result[0]->password;
            $decrypted_password = crypt::decrypt($encrypted_password);
            if ($decrypted_password == $req->input('password')) {
                //echo "You are logged in Successfully";

                //storing data in session
                $req->session()->put('user', ['username' => $result[0]->username, 'status' => $result[0]->status]);

                $path = $req->path();
                //echo $path;
                //checking user status
                if ($result[0]->status == "student") {

                    return redirect('/StudentDashboard');
                } else if ($result[0]->status == "tutor") {

                    return redirect('/TutorDashboard');
                } else if ($result[0]->status == "admin") {
                    return redirect('/AdminDashboard');
                }
            } else {
                $req->session()->flash('error', 'Password Incorrect!!!');
                return redirect('login');
            }
        }
    }
}
