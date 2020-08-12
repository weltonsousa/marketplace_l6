<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->has('cart') ? session()->get('cart') : [];

        return view('cart', compact('cart'));
    }
    public function add(Request $resquest)
    {
        $product = $resquest->get('product');

        if (session()->has('cart')) {

            $products = session()->get('cart');
            $productsSlugs = array_column($products, 'slug');

            if (in_array($product['slug'], $productsSlugs)) {
                $products = $this->productIncrement($product['slug'], $product['amount'], $products);

                //existindo a sessao eu adiciona o produto
                session()->put('cart', $products);
            } else {
                session()->push('cart', $product);
            }

        } else {

            $products[] = $product;
            //nao existe eu crio a sessao com o primeiro produto
            session()->put('cart', $products);
        }
        flash('Produto adicionado no carrinho!')->success();
        return redirect()->route('product.single', ['slug' => $product['slug']]);
    }

    public function remove($slug)
    {
        if (!session()->has('cart')) {
            return redirect()->route('cart.index');
        }
        $products = session()->get('cart');

        $products = array_filter($products, function ($line) use ($slug) {
            return $line['slug'] != $slug;
        });

        session()->put('cart', $products);
        return redirect()->route('cart.index');

    }

    public function cancel()
    {
        session()->forget('cart');

        flash('Desistência realizada com sucesso!')->success();
        return redirect()->route('cart.index');
    }

    //funcao para adicionar quantidade do produto no carrinho
    private function productIncrement($slug, $amount, $products)
    {
        $products = array_map(function ($line) use ($slug, $amount) {
            if ($slug == $line['slug']) {
                $line['amount'] += $amount;
            }
            return $line;
        }, $products);

        return $products;
    }
}
