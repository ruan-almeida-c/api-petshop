<?php
$router->get('', function()
{
    return json_encode(["message" => "Welcome to PetShop System"]);
});


$router->get("/employee", "employeeController@getAll");

$router->group(["prefix" => "/employee"], function() use ($router){
    $router->get("/{id}", "employeeController@get");
    $router->post("/", "employeeController@insert");
    $router->put("/{id}", "employeeController@update");
    $router->delete("/{id}", "employeeController@destroy");
});

$router->get("/vandas", "VendaController@getAll");

$router->group(["prefix" => "/venda"], function() use ($router){
    $router->get("/{id}", "VendaController@get");
    $router->post("/", "VendaController@insert");
    $router->delete("/{id}", "VendaController@destroy");
});

$router->get("/produtos", "produtoController@getAll");

$router->group(["prefix" => "/produto"], function() use ($router){
    $router->get("/{id}", "ProdutoController@get");
    $router->post("/", "ProdutoController@insert");
    $router->put("/{id}", "ProdutoController@update");
    $router->delete("/{id}", "ProdutoController@destroy");
});


$router->get("/clientes", "ClienteController@getAll");

$router->group(["prefix" => "/cliente"], function() use ($router){
    $router->get("/{id}", "ClienteController@get");
    $router->post("/", "ClienteController@insert");
    $router->put("/{id}", "ClienteController@update");
    $router->delete("/{id}", "ClienteController@destroy");
});
