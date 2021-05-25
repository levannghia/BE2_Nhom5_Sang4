<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Cart;
use App\Product;
use App\Transaction;
use App\Carts;

class CartController extends Controller
{
    const CART = "CART";

    public function addSingleProduct(Request $req, $idProduct)
    {
        $product = Product::where('product_id', $idProduct)->first();

        $oldCart = session(CartController::CART) ?? null;
        $newCart = new Cart($oldCart);
        $newCart->add($product, $idProduct);

        $req->session()->put(CartController::CART, $newCart);
        return redirect()->back();
    }

    public function addByQuantityProduct(Request $req)
    {
        $product = Product::where('product_id', $req->product_id)->first();
        $oldCart = session(CartController::CART) ?? null;
        $newCart = new Cart($oldCart);
        $newCart->addByQuantity($product, $req->product_id, $req->quantity);

        $req->session()->put(CartController::CART, $newCart);
        return redirect()->back();
    }

    public function removeProductCart(Request $req, $id)
    {
        $oldCart = session(CartController::CART) ?? null;
        $newCart = new Cart($oldCart);

        $newCart->removeCart($id);

        if ($newCart->totalPrice == 0) {
            // Remove current shopping cart
            $req->session()->forget(CartController::CART);
            return redirect()->back();
        }

        $req->session()->put(CartController::CART, $newCart);
        return redirect()->back();
    }

    public function checkout()
    {
        return view('users.checkout');
    }

    public function postCheckout(Request $req)
    {
        $dataSave = $req->validate([
            'customer_name' => 'required|max:191',
            'telephone' => 'required|min:10|numeric',
            'address' => 'required|max:191'
        ]);

        $cart = session(CartController::CART);
        
        $dataSave['total'] = $cart->totalPrice;
        $dataSave['quantity'] = $cart->totalQty;
        // Save bill
        $transId = Transaction::create($dataSave)->id;
        // Save detail bill
        DB::beginTransaction();
        try {
            foreach ($cart->items as $cartItem) {
                Carts::create([
                    'transaction_id' => $transId,
                    'product_id' => $cartItem['item']->product_id,
                    'quantity' => $cartItem['quantity'],
                    'total' => $cartItem['price'],
                    'user_id' => 1
                ]);
            }
            DB::commit();
            // Remove current shopping cart
            $req->session()->forget(CartController::CART);
        } catch (\Exception $ex) {
            DB::rollback();
        }
        return redirect('');
    }
}
