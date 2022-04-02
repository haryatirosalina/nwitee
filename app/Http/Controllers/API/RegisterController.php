<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\API\APIController as APIController;
use Laravel\Passport\TokenRepository;
use Laravel\Passport\RefreshTokenRepository;
use App\Models\User;
use Carbon\Carbon;
use Validator;
use DB;

class RegisterController extends Controller
{
  public function register(Request $request)
  {
      $user = User::create([
        'username'=>$request->username,
        'password' => $request->password,
        'name' => $request->name,
        'email' => $request->email,
        'role' => 'student',
      ]);

      $data = $user;

      return $this->sendResponse($data, 'User successfully Register.');
  }
} 
