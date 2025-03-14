<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticate
{
    use Notifiable;

    protected $table = 'usuarios';

    public $timestamps = 'true';

    protected $fillable = [
        'Test',
        'senha',
    ];

    protected $hidden = [
        'senha',
    ];
        
    public function getAuthPassword()
    {
        return $this->senha;
    }
}