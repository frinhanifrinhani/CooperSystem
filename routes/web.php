<?php

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


Route::get('/', function () {
    return view('auth/login');
});

Route::post('/auth', 'LoginController@authenticate')->name('login');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


//Route::get('/produtos','ProdutoController@lista');

Route::get('/pedidos','PedidoController@lista');


//rotas para produto
Route::group(['middleware' => 'auth','prefix'=>'produto'], function(){
    Route::get('listar','ProdutoController@listarProduto');
    Route::get('cadastrar','ProdutoController@formCadastrarProduto');
    Route::post('salvar','ProdutoController@cadastrarProduto');
    Route::get('editar/{id}','ProdutoController@formEditarProduto'); 
    Route::post('atualizar','ProdutoController@editarProduto'); 
    Route::get('excluir/{id}','ProdutoController@deletarProduto'); 
});


//rotas para pedido
Route::group(['middleware' => 'auth','prefix'=>'pedido'], function(){
    Route::get('listar','PedidoController@listarPedido');
    Route::get('cadastrar','PedidoController@formCadastrarPedido');
    Route::post('salvar','PedidoController@cadastrarPedido');
    Route::get('editar/{id}','PedidoController@formEditarPedido'); 
    Route::post('atualizar','PedidoController@editarPedido');
    Route::get('excluir/{id}','PedidoController@excluirPedido');  
});


