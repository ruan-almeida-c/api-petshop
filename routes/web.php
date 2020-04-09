<?php
$router->get('', function()
{
    return json_encode(["message" => "Welcome to PetShop System"]);
});


$router->get("/employee", "employeeController@showAll");

$router->group(["prefix" => "/employee", 'middleware' => 'auth'], function() use ($router){
    $router->get("/{id}", "employeeController@index");
    $router->post("/", "employeeController@insert");
    $router->put("/{id}", "employeeController@update");
    $router->delete("/{id}", "employeeController@destroy");
});

$router->get("/vandas", "VendaController@showAll");

$router->group(["prefix" => "/venda", 'middleware' => 'auth'], function() use ($router){
    $router->get("/{id}", "VendaController@index");
    $router->post("/", "VendaController@insert");
    $router->delete("/{id}", "VendaController@destroy");
});

$router->get("/produtos", "produtoController@showAll");

$router->group(["prefix" => "/produto"], function() use ($router){
    $router->get("/{id}", "ProdutoController@index");
    $router->post("/", "ProdutoController@insert");
    $router->put("/{id}", "ProdutoController@update");
    $router->delete("/{id}", "ProdutoController@destroy");
});


$router->get("/clientes", "ClienteController@showAll");

$router->group(["prefix" => "/cliente"], function() use ($router){
    $router->get("/{id}", "ClienteController@index");
    $router->post("/", "ClienteController@insert");
    $router->put("/{id}", "ClienteController@update");
    $router->delete("/{id}", "ClienteController@destroy");
});
