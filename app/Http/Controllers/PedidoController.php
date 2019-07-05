<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PedidosRequest;
use App\Pedidos;
use App\Produtos;

class PedidoController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function listarPedido() {
        $pedidos = new Pedidos();
        $pedidos = $pedidos->pedidos();
        if (View()->exists('pedidos.lista')) {
            return view('pedidos.lista')->withPedidos($pedidos);
        }
    }

    public function formCadastrarPedido() {
        $produtos = Produtos::all(['id', 'nome']);
        return View('pedidos.form-cadastro', compact('produtos', $produtos));
    }

    public function cadastrarPedido(PedidosRequest $request) {
        $pedido = $request->all();
        Pedidos::create($pedido);
        
        $request->session()->flash('alert-success', 'Pedido cadastrado com sucesso!');

        return redirect()->action('PedidoController@listarPedido');
    }

    public function formEditarPedido($id) {
        
        $produtos = Produtos::all(['id', 'nome']);
        
        $pedido = new Pedidos();
        $pedido = $pedido->pedidoPorId($id);
        if($pedido->isEmpty()){
			return "<script>
                                    alert('Pedido não encontrado!');
                                    window.location.href = '/pedido/listar';
                                </script>";
		}
        return view('pedidos.form-edita')
                        ->with('pedido', $pedido)
                        ->with('produtos', $produtos);
    }

    public function editarPedido(PedidosRequest $request) {

        $pedido = Pedidos::find($request['id']);
        $pedidoArr = $request->all();
        $pedido->update($pedidoArr);

        $request->session()->flash('alert-success', 'Pedido cadastrado com sucesso!');

        return redirect()->action('PedidoController@listarPedido');
    }

    public function excluirPedido($id) {

        $pedido = Pedidos::find($id);
        $pedido->delete();

        return redirect()->action('PedidoController@listarPedido')
                        ->with('success', 'Pedido excluído com sucesso!');
    }

}
