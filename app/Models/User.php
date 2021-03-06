<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Response;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Get Auth Token
    public function getAuthToken($request)
    {
        $response = [];
        try {
            dd(slug());
            $tokenName = config('constants.TOKEN_NAME');
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $token = $request->user()->createToken($tokenName);
                $response = apiResponse(Response::HTTP_OK, Lang::get('messages.success'), [
                    'token' => $tokenName . ' ' . $token->plainTextToken,
                ]);
            } else {
                $response = apiResponse(Response::HTTP_UNAUTHORIZED, Lang::get('messages.unauthorized'));
            }
        } catch (\Exception $ex) {
            $response = apiResponse(Response::HTTP_INTERNAL_SERVER_ERROR, $ex->getMessage());
        }
        return $response;
    }
}
