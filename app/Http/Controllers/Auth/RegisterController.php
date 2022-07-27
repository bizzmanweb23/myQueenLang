<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Referal;
use App\Models\PvPoint;
use App\Models\MlmUser;
use Auth;
use QrCode;
use Session;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/mlm-user/user-details';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => ['required', 'string', 'max:255'],
            'referal_code' => ['exists:referals'],
            'email' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
            $referal_code_value = Session::get('referal_code');
            $referal_data = Referal::where('id','1')->first();
            $referal_data_code =  $referal_data->referal_code;
            // $referal_data_code =  'MQRF0000001';
            $unique_id = User::orderBy('id', 'desc')->first();
            $number = str_replace('MQU', '', $unique_id ? $unique_id->user_id  : 0);
            if ($number == 0) {
                $number = 'MQU0000001';
            } else {
                $number = "MQU" . sprintf("%07d", (int)$number + 1);
            }
            $user =  User::create([
                'name' => $data['name'],
                'referal_code' => $referal_code_value ?? $data['referal_code'] ?? $referal_data_code,
                'email' => $data['email'],
                'user_id' => $number,
                'password' => Hash::make($data['password']),
            ]);
            $unique_id1 = Referal::orderBy('id', 'desc')->first();
            $number1 = str_replace('MQRF', '', $unique_id1 ? $unique_id1->referal_code  : 0);
            if ($number1 == 0) {
                $number1 = 'MQRF0000001';
            } else {
                $number1 = "MQRF" . sprintf("%07d", (int)$number1 + 1);
            }
            Referal::create([
                'user_id' => $number,
                'referal_code' => $number1,
            ]);
            return $user;
    }
}
