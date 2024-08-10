<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HolidayPlanController;

// Rota para a página inicial
Route::get('/', function () {
    return '<h1>Bem-vindo ao Holiday Schedule!</h1><p><a href="/test">Teste a rota /test</a></p>';
});

// Rota para a página de teste
Route::get('/test', function () {
    return '<h1>Rota /test acessada com sucesso!</h1>';
});

// Rota para qualquer outra URL
Route::fallback(function () {
    return '<h1>404 - Página não encontrada</h1>';
});

Route::middleware('auth:api')->prefix('holiday-plans')->group(function () {
    Route::get('/', [HolidayPlanController::class, 'index']);
    Route::get('{id}', [HolidayPlanController::class, 'show']);
    Route::post('/', [HolidayPlanController::class, 'store']);
    Route::put('{id}', [HolidayPlanController::class, 'update']);
    Route::delete('{id}', [HolidayPlanController::class, 'destroy']);
    Route::get('{id}/pdf', [HolidayPlanController::class, 'generatePdf']);
});

