<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'segusua';  
    public $timestamps = false;  

    protected $fillable = [
        'cnomeusua',
        'csenhusua', 
    ];

    protected $hidden = [
        'csenhusua',
    ];

    public function getAuthPassword()
    {
        return $this->csenhusua; 
    }

    public static function findByName($name)
    {
        return DB::table('segusua')
            ->where(DB::raw('upper(cnomeusua)'), '=', strtoupper($name)) 
            ->first();
    }
}