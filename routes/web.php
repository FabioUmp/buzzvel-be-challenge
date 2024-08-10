<?php

use Illuminate\Support\Facades\Route;

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
