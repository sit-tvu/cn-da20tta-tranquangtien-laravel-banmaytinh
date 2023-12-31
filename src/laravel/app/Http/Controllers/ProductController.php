<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
public function showAllProducts()
{
    $laptops = Product::where('category_id', 1)
                   ->where('status', 0)
                   ->get();
    $macbooks = Product::where('category_id', 2)
                    ->where('status', 0)
                    ->get();
    $pcs = Product::where('category_id', 3)
                    ->where('status', 0)
                    ->get();
    $phukien = Product::where('category_id', 4)
                    ->where('status', 0)
                    ->get();
    

    return view("index", compact('laptops', 'macbooks','pcs','phukien'));
}

// public function showProductDetail($id)
// {
//     $product = Product::findOrFail($id);
//     $productImages = Product::with('productImages')->find($id);
//      $brand = $product->brand;
//      $relatedProducts = Product::where('brand_id', $brand->id)
//          ->where('id', '!=', $id)
//          ->orderBy('created_at', 'desc')
//          ->take(3)
//          ->get();
//     return view('productdetail', compact('product', 'productImages','brand','relatedProducts'));

// }
public function showProductDetail($categorySlug, $brandSlug, $slug)
{
    $category = Category::where('slug', $categorySlug)->firstOrFail();
    $brand = Brand::where('slug', $brandSlug)->firstOrFail();

    $product = Product::where('category_id', $category->id)
        ->where('brand_id', $brand->id)
        ->where('slug', $slug)
        ->firstOrFail();

    $productImages = Product::with('productImages')->where('slug', $slug)->firstOrFail();
    $relatedProducts = Product::where('brand_id', $brand->id)
        ->where('slug', '!=', $product->slug)
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();

    return view('productdetail', compact('product', 'productImages', 'brand', 'relatedProducts', 'category'));
}

public function addToCart(Request $request, $slug)
{
    $product = Product::where('slug', $slug)->firstOrFail();

    $quantity = $request->input('quantity', 1);

    $cart = session()->get('cart', []);

    if (isset($cart[$product->id])) {
        $cart[$product->id]['quantity'] += $quantity;
    } else {
        $cart[$product->id] = [
            'product_id' => $product->id,
            'name' => $product->name,
            'quantity' => $quantity,
            'price' => $product->sale_cost,
            'image' => $product->productImages->first()->image ?? null,
        ];
    }

    session(['cart' => $cart]);

    return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
}


public function showCart()
{
    $cart = session('cart', []);
    $grandTotal = 0;

    foreach ($cart as $item) {
        if (isset($item['price'])) {
            $grandTotal += $item['quantity'] * $item['price'];
        }
    }

    return view('cart', compact('cart', 'grandTotal'));
}

public function clearCart()
{
    session()->forget('cart');
    return redirect()->back()->with('success', 'Giỏ hàng đã được xóa.');
}

public function removeFromCart($productId)
{
    $cart = session('cart', []);

    if (isset($cart[$productId])) {
        unset($cart[$productId]);
        session(['cart' => $cart]);
    }

    return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
}

public function updateCart(Request $request)
    {
        $productId = $request->input('productId');
        $quantity = $request->input('quantity');

        // Lấy giỏ hàng từ session
        $cart = session()->get('cart', []);

        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
        if (isset($cart[$productId])) {
            // Cập nhật số lượng sản phẩm
            $cart[$productId]['quantity'] = $quantity;

            // Lưu giỏ hàng mới vào session
            session(['cart' => $cart]);

            // Tính toán lại tổng cộng và tổng tiền
            $newTotal = $cart[$productId]['quantity'] * $cart[$productId]['price'];
            $newGrandTotal = $this->calculateGrandTotal($cart);

            // Trả về thông tin cần thiết
            return response()->json([
                'total' => number_format($newTotal),
                'grandTotal' => number_format($newGrandTotal),
            ]);
        }

        // Trường hợp sản phẩm không tồn tại trong giỏ hàng
        return response()->json([
            'error' => 'Sản phẩm không tồn tại trong giỏ hàng.',
        ], 400);
    }

    private function calculateGrandTotal($cart)
    {
        $grandTotal = 0;

        foreach ($cart as $item) {
            if (isset($item['price'])) {
                $grandTotal += $item['quantity'] * $item['price'];
            }
        }

        return $grandTotal;
    }


}