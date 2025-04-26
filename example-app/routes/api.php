<?php

use App\Http\Controllers\PersonaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(PersonaController::class)->group(function(){
    route::get('personas', 'index'); //obtiene los datos de la tabla personas
    route::get('persona', 'store'); //configurando la url 
    route::get('persona/{id}', 'show'); // obtener el los datos de la persona a parrtir del id
    route::put('persona/{id}', 'update'); // buscar la parsona para modificar a partir del id
    route::delete('persona/{id}', 'destroy'); // borra datos, buscandolo con el id
});