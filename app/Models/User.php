<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'SOLUS.SEGUSUA';  
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

    public static function findByUsernameAndPassword($username, $password)
    {
        return DB::table('SOLUS.SEGUSUA')
            ->whereRaw('upper(cnomeusua) = ?' , [strtoupper($username)])  
            ->where('csenhusua', $password)  
            ->where('cstatusua', 'A')  
            ->where('nnumeperf', '!=', 25236865) 
            ->where('dvensusua', '>=', now())  
            ->first();  
    }
}