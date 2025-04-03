<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'SOLUS.SEGUSUA';  
   // public $timestamps = false;  

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

    /*public static function findByUsernameAndPassword($username, $password)
    {
        return DB::table('SOLUS.SEGUSUA')
            ->select('cnomeusua', 'csenhusua', 'dvensusua', 'cncomusua')
            ->whereRaw('upper(cnomeusua) = ?', [strtoupper($username)])  
            ->where('csenhusua', md5($password))  
            ->where('cstatusua', 'A')  
            ->where('nnumeperf', '!=', 25236865) 
            ->where('dvensusua', '>=', now())  
            ->first();  
    } */

    /*public static function findByUsernameAndPassword($username, $password)
    {
        Log::info('Consultando usuário:', ['username' => $username, 'password' => $password]); // Log de entrada da consulta
        
        return DB::table('SOLUS.SEGUSUA')
            ->whereRaw('upper(cnomeusua) = ?', [strtoupper($username)])  
            ->where('csenhusua', $password)
            ->where('cstatusua', 'A')  
            ->where('nnumeperf', '!=', 25236865)
            ->where('dvensusua', '>=', now())  // Verifique se a data de vencimento precisa ser considerada
            ->first();
    }
     */
    public static function findByUsernameAndPassword($username, $password)
    {
        Log::info('Consultando usuário:', ['username' => $username, 'password' => $password]);

        return DB::table('SOLUS.SEGUSUA')
            ->whereRaw('upper(cnomeusua) = ?', [strtoupper($username)])  
            ->where('csenhusua', $password)  
            ->where('cstatusua', 'A')  
            ->where('nnumeperf', '!=', 25236865)  
            ->where('dvensusua', '>=', now())  
            ->first();  
    }


     /*public static function findByUsernameAndPassword($username, $password)
    {
        return DB::table('SOLUS.SEGUSUA')
            ->whereRaw('upper(cnomeusua) = ?' , [strtoupper($username)])  
            ->where('csenhusua', $password)  
            ->where('cstatusua', 'A')  
            ->where('nnumeperf', '!=', 25236865) 
            ->where('dvensusua', '>=', now())  
            ->first();  
    }
    
    public static function findByUsername($username)
    {
        return DB::table('SOLUS.SEGUSUA')
            ->whereRaw('upper(cnomeusua) = ?', [strtoupper($username)])  
            ->where('cstatusua', 'A')  
            ->where('nnumeperf', '!=', 25236865) 
            ->where('dvensusua', '>=', now())  
            ->first();  
    }   */
}
