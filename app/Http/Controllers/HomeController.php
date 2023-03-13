<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\Country;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jackiedo\Cart\Facades\Cart;
use Spatie\QueryBuilder\QueryBuilder;

class HomeController extends Controller
{
public function index(Request $request)
    {
        $products = QueryBuilder::for(Product::class)
        ->where('quantity', '>', 0)
            ->allowedFilters([
                'name',
                'country_id',
                'category_id',
            ])
            ->allowedSorts([
                'name',
                'price',
                'created_at',
            ])
            ->defaultSort('-created_at')->paginate(4);

        $countries = QueryBuilder::for(Country::class)->get();
        $categories = QueryBuilder::for(Category::class)->get();

        return view('home.index', ['products' => $products, 'categories' => $categories, 'countries' => $countries]);
    }

public function loadMore(Request $request)
{
    $skip = $request->skip;
    $limit = $request->limit;
    $products = Product::with('category', 'country')->skip($skip)->take($limit)->get();
    $totalProducts = Product::count();
    $hasMore = $totalProducts - ($skip + $limit) > 0;
    return response()->json([
        'products' => $products,
        'hasMore' => $hasMore,
    ]);
}

public function show($id)
{
    return view('home.show', ['product' => Product::findOrFail($id)]);
}

    // add to cart function
    public function addToCart(Request $request)
    {
        $shoppingCart = Cart::name('shopping');

        $product = Product::findOrFail($request->id);

        $shoppingCart->addItem([
            'id' => $product->id,
            'title' => $product->name,
            'price' => $product->price,
            'quantity' => $request->quantity,
            'options' => [
                'image' => $product->image,
                'amount_quantity' => $product->quantity,
            ],
        ]);

        return back()->with(alert('Вы успешно добавили товар в корзину', 'success'));
    }

    public function cart()
    {
        $items = Cart::name('shopping')->getItems();
        return view('home.cart', ['items' => $items]);
    }

    public function removeFromCart(Request $request, $id)
    {
        $shoppingCart = Cart::name('shopping');

        $shoppingCart->removeItem($id);

        return redirect('cart');
    }

    public function updateCart(Request $request, $id)
    {
        $shoppingCart = Cart::name('shopping');

        if ($request->quantity <= $shoppingCart->getItem($id)->getOptions('amount_quantity')) {
            $shoppingCart->updateItem($id, [
                'quantity' => $request->quantity,
            ]);
        } else {
            return back()->with(alert('Такого количества товара нет в наличии', 'danger'));
        }

        return redirect('cart');
    }

    public function clearCart()
    {
        Cart::name('shopping')->clearItems();

        return redirect('cart');
    }

    public function checkout()
    {
        $items = Cart::name('shopping')->getItems();
        return view('home.checkout', ['items' => $items]);
    }

    public function checkoutStepOne() {
        if (!auth()->check()) {
            return redirect()->route('login')
            ->with(alert('Для оформления заказа необходимо авторизоваться', 'danger'));
        }
        if (Cart::name('shopping')->isEmpty()) {
            return back()->with(alert('Ваша корзина пуста', 'danger'));
        }
        return view('home.checkout-step-one');
    }

    public function checkoutStepOneStore(Request $request) {
        $validation = request()->validate([
            'password' => ['required', 'string', 'min:8'],
        ]);

        if (Hash::check($validation['password'], Auth::user()->password)) {

            $items = Cart::name('shopping')->getItems();

            foreach ($items as $item) {
                Order::create([
                    'user_id' => Auth::user()->id,
                    'product_id' => $item->getId(),
                    'quantity' => $item->getQuantity(),
                    'price' => $item->getPrice(),
                    'total' => $item->getPrice() * $item->getQuantity(),
                    'status_id' => 1,
                ]);

                $product = Product::findOrFail($item->getId());
                $product->quantity = $product->quantity - $item->getQuantity();
                $product->save();
            }
    
            Cart::name('shopping')->clearItems();
    
            return redirect()->route('profile')
            ->with(
                alert('Ваш заказ успешно оформлен', 'success'
            ));
        } else {
            return back()->with(alert('Неверный пароль', 'danger'));
        }
    }
}
