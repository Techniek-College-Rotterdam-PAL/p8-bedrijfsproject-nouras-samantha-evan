<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        
        'email' => [
            'required','string','max:255','unique:users',
            'email:rfc,dns', // Uses DNS check to verify the domain exists
            function ($attribute, $value, $fail) {
                // Custom rule: checks for disposable or temporary email domains
                $disposableDomains = ['tempmail.com', '10minutemail.com', 'mailinator.com'];
                $emailDomain = substr(strrchr($value, "@"), 1);

                if (in_array($emailDomain, $disposableDomains)) {
                    $fail('The ' . $attribute . ' domain is not allowed.');
                }
            }
        ],
        
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        
        // Optional phone number with custom regex pattern for phone validation
        'phone_number' => ['nullable', 'string', 'max:15', 'regex:/^\+?[0-9\s\-\(\)]*$/'],
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone_number' => $data['phone_number'] ?? null,
        ]);
    }
}
