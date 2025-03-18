<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return view('auth.login'); 
})->name('login.form');

Route::get('/home', function () {
    return view('home');
})/*->middleware('auth')*/;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

/*Route::get('/test', function () {
    try {
        
        $result = DB::select('SELECT 
        u.cncomusua
        , u.cnomeusua
        , u.csenhusua
        , u.cstatusua
        , u.nnumeperf
        , u.dvensusua 
        FROM solus.segusua u 
        ');

        if ($result) {
            return response()->json(['status' => 'sucesso', 'message' => 'Banco de dados conectado com sucesso!']);
        } else {
            return response()->json(['status' => 'erro', 'message' => 'Falha na conexão com o banco de dados.']);
        }
    } catch (\Exception $e) {
        return response()->json(['status' => 'erro', 'message' => 'Erro na conexão: ' . $e->getMessage()]);
    }
}); */


/*Route::get('/test', function () {
    try {
        // Realiza a consulta SQL e retorna os dados das colunas
        $result = DB::select('SELECT 
            u.cncomusua,
            u.cnomeusua,
            u.csenhusua,
            u.cstatusua,
            u.nnumeperf,
            u.dvensusua
        FROM solus.segusua u');

        // Verifica se há dados e retorna os dados das colunas
        if ($result) {
            return response()->json(['status' => 'sucesso', 'data' => $result]);
        } else {
            return response()->json(['status' => 'erro', 'message' => 'Nenhum dado encontrado.']);
        }
    } catch (\Exception $e) {
        return response()->json(['status' => 'erro', 'message' => 'Erro na conexão: ' . $e->getMessage()]);
    }
}); */
