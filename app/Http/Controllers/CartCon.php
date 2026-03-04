<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartCon extends Controller
{
    public function addToCart(Request $request)
    {
        $produkId = $request->produk_id;
        $produk = DB::table('produks')->where('id', $produkId)->first();

        if (!$produk || $produk->stok <= 0) {
            return response()->json(['success' => false, 'message' => 'Produk tidak tersedia'], 400);
        }

        $cart = session()->get('cart', []);

        $qty = $request->input('qty', 1);

        if (isset($cart[$produkId])) {
            $newQty = $cart[$produkId]['qty'] + $qty;
            if ($newQty > $produk->stok) {
                $newQty = $produk->stok;
            }
            $cart[$produkId]['qty'] = $newQty;
        } else {
            $cart[$produkId] = [
                'produk_id'  => $produk->id,
                'nama'       => $produk->nama,
                'harga'      => $produk->harga,
                'stok'       => $produk->stok,
                'image'      => $produk->image,
                'jenis'      => $produk->jenis,
                'qty'        => $qty,
            ];
        }

        session()->put('cart', $cart);

        $totalItems = array_sum(array_column($cart, 'qty'));

        return response()->json([
            'success'     => true,
            'message'     => 'Produk ditambahkan ke keranjang',
            'cart_count'  => $totalItems,
            'cart'        => $cart,
        ]);
    }

    public function updateCart(Request $request)
    {
        $produkId = $request->produk_id;
        $qty      = (int) $request->qty;
        $cart     = session()->get('cart', []);

        if (!isset($cart[$produkId])) {
            return response()->json(['success' => false, 'message' => 'Item tidak ada di keranjang'], 400);
        }

        $produk = DB::table('produks')->where('id', $produkId)->first();
        if ($qty <= 0) {
            unset($cart[$produkId]);
        } elseif ($qty > $produk->stok) {
            $cart[$produkId]['qty'] = $produk->stok;
        } else {
            $cart[$produkId]['qty'] = $qty;
        }

        session()->put('cart', $cart);

        $totalItems = array_sum(array_column($cart, 'qty'));
        $subtotal   = 0;
        foreach ($cart as $item) {
            $subtotal += $item['harga'] * $item['qty'];
        }

        return response()->json([
            'success'    => true,
            'cart_count' => $totalItems,
            'subtotal'   => $subtotal,
            'cart'       => $cart,
        ]);
    }

    public function removeFromCart(Request $request)
    {
        $produkId = $request->produk_id;
        $cart     = session()->get('cart', []);

        if (isset($cart[$produkId])) {
            unset($cart[$produkId]);
            session()->put('cart', $cart);
        }

        $totalItems = array_sum(array_column($cart, 'qty'));
        $subtotal   = 0;
        foreach ($cart as $item) {
            $subtotal += $item['harga'] * $item['qty'];
        }

        return response()->json([
            'success'    => true,
            'cart_count' => $totalItems,
            'subtotal'   => $subtotal,
            'cart'       => $cart,
        ]);
    }

    public function getCart()
    {
        $cart = session()->get('cart', []);
        $totalItems = array_sum(array_column($cart, 'qty'));
        $subtotal   = 0;
        foreach ($cart as $item) {
            $subtotal += $item['harga'] * $item['qty'];
        }

        return response()->json([
            'cart'       => $cart,
            'cart_count' => $totalItems,
            'subtotal'   => $subtotal,
        ]);
    }

    public function checkoutCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $selectedIds = $request->input('product_ids', []);

        if (empty($cart)) {
            return response()->json(['success' => false, 'message' => 'Keranjang kosong'], 400);
        }

        // Filter cart if selectedIds is provided
        $itemsToCheckout = [];
        if (!empty($selectedIds)) {
            foreach ($selectedIds as $pid) {
                if (isset($cart[$pid])) {
                    $itemsToCheckout[$pid] = $cart[$pid];
                }
            }
        } else {
            $itemsToCheckout = $cart;
        }

        if (empty($itemsToCheckout)) {
            return response()->json(['success' => false, 'message' => 'Tidak ada produk terpilih untuk checkout'], 400);
        }

        $count = DB::table('pembelians')->count();

        foreach ($itemsToCheckout as $produkId => $item) {
            // Verify stock
            $produk = DB::table('produks')->where('id', $produkId)->first();
            if (!$produk || $produk->stok < $item['qty']) {
                return response()->json([
                    'success' => false,
                    'message' => "Stok {$item['nama']} tidak cukup"
                ], 400);
            }

            $count++;
            DB::table('pembelians')->insert([
                'kode_pembelian' => 'P-' . $produkId . '-' . Auth::user()->id . $count,
                'produk_id'      => $produkId,
                'banyak'         => $item['qty'],
                'bayar'          => $item['harga'] * $item['qty'],
                'user_id'        => Auth::user()->id,
                'status'         => 'Verifikasi',
            ]);

            // Decrement stock
            DB::table('produks')->where('id', $produkId)->decrement('stok', $item['qty']);
            
            // Remove from original cart
            unset($cart[$produkId]);
        }

        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'message' => 'Pesanan terpilih berhasil dikirim! Menunggu verifikasi.',
            'redirect' => '/admin/pembelians'
        ]);
    }
}
