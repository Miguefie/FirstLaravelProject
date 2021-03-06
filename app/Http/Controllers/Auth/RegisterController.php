<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
    {
        $name = $request->post('name');
        $username = $request->post('username');
        $password = $request->post('password');
        $email = $request->post('email');
        $query = User::query();
        $validator = $this->validator($request->all());
        if($validator->fails())
        {
            return response($validator->messages());
        }
        else
        {
            return response('DID It');
        }
       try{
           $query->insert([
               'email' => $email,
               'name' => $name,
               'password' => $password,
               'username' => $username,
           ]);
           return view('login');
       }
       catch (QueryException $e){

            if($e->errorInfo[1] == '1062')
            {
                return redirect()->back()->withErrors(['error1' => 'Utilizador Já Existe']);
            }

       }



    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'username' => 'required|string|max:60|unique',
            'nivelAcesso' => 'integer'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'email' => $data['email'],
            'nivelAcesso' => $data['nivelAcesso']
        ]);
    }
}
