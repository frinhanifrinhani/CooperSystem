<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProdutosRequest;
use App\Produtos;

class ProdutoController extends Controller
{
    public function __construct()
    {
            $this->middleware('auth');
    }
    
    public function listarProduto(){
        
            $produtos = Produtos::all();
            if(View()->exists('produtos.lista')){
                return view('produtos.lista')->withProdutos($produtos);
            }
    }

    public function formCadastrarProduto(){
        if(View()->exists('produtos.form-cadastro')){
            return view('produtos.form-cadastro');
        }
    }
    
    public function cadastrarProduto(ProdutosRequest $request){
        
        $produto = $request->all();
     
        if($produto['quantidade_estoque'] == 0){
            $produto['situacao'] = false;
        }else{
            $produto['situacao'] = true;
        }
        
        Produtos::create($produto);

        $request->session()->flash('alert-success', 'Produto cadastrado com sucesso!');

        return redirect()->action('ProdutoController@listarProduto');
    }
    
    public function formEditarProduto($id){
		$produto = Produtos::find($id);
		if(empty($produto)){
			return "<script>
                                    alert('Produto não encontrado!');
                                    window.location.href = '/produto/listar';
                                </script>";
		}

		return view('produtos.form-edita')->with('produto',$produto);
    }
       
    public function editarProduto(ProdutosRequest $request){
        
        $produto = Produtos::find($request['id']);
        
        $produtoArr = $request->all();
        if($produtoArr['quantidade_estoque'] == 0){
            $produtoArr['situacao'] = false;
        }else{
            $produtoArr['situacao'] = true;
        }
        
        $produto->update($produtoArr);
        
        $request->session()->flash('alert-success', 'Produto alterado com sucesso!');

        return redirect()->action('ProdutoController@listarProduto');
    }

    public function deletarProduto($id){
        
        $produto = Produtos::find($id);
        $produto->delete();
        
        return redirect()->action('ProdutoController@listarProduto');
    }
}

