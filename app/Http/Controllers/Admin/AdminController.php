<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Order;
use App\Models\Product;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class AdminController extends Controller
{
    public function index()
    {
        $countries = QueryBuilder::for(Country::class)->get();
        $categories = QueryBuilder::for(Category::class)->get();
        return view('admin.index', ['categories' => $categories, 'countries' => $countries]);
    }

    public function index_product()
    {
        $countries = QueryBuilder::for(Country::class)->get();
        $categories = QueryBuilder::for(Category::class)->get();
        return view('admin.index_product', ['categories' => $categories, 'countries' => $countries]);
    }

    public function store_product(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:10000'],
            'image' => ['required', 'image'],
            'price' => ['required', 'numeric', 'min:0'],
            'quantity' => ['required', 'numeric', 'min:0'],
            'country_id' => ['required', 'numeric', 'min:1'],
            'category_id' => ['required', 'numeric', 'min:1'],
            'status_id' => ['nullable', 'numeric', 'min:1'],
        ]);

        $validated['status_id'] = 1;

        $image = $validated['image'];
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $image_name);
        $validated['image'] = $image_name;

        Product::query()->firstOrCreate([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'image' => $image_name,
            'price' => $validated['price'],
            'quantity' => $validated['quantity'],
            'country_id' => $validated['country_id'],
            'category_id' => $validated['category_id'],
            'status_id' => $validated['status_id'],
        ]);

        return redirect()->route('dashboard.index_product')->with(alert(__('Вы успешно добавили товар'), 'success'));
    }

    public function index_all_products()
    {
        $products = QueryBuilder::for(Product::class)
            ->latest('created_at')
            ->allowedFilters(['name', 'description', 'price', 'quantity', 'country_id', 'category_id', 'status_id'])
            ->allowedSorts(['name', 'description', 'price', 'quantity', 'country_id', 'category_id', 'status_id'])
            ->paginate(10)
            ->appends(request()->query());

        return view('admin.index_all_products', ['products' => $products]);
    }

    public function edit_product(Product $id)
    {
        $statuses = QueryBuilder::for(Status::class)->get();
        $countries = QueryBuilder::for(Country::class)->get();
        $categories = QueryBuilder::for(Category::class)->get();
        return view('admin.edit_product', ['product' => $id, 'categories' => $categories, 'countries' => $countries, 'statuses' => $statuses]);
    }

    public function update_product(Request $request, Product $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:10000'],
            'price' => ['required', 'numeric', 'min:0'],
            'image' => ['nullable', 'image'],
            'quantity' => ['required', 'numeric', 'min:0'],
            'country_id' => ['required', 'numeric', 'min:1'],
            'category_id' => ['required', 'numeric', 'min:1'],
        ]);

        if ($request->hasFile('image')) {
            $image = $validated['image'];
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
            $validated['image'] = $image_name;
        } else {
            $validated['image'] = $id->image;
        }

        $id->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'image' => $validated['image'],
            'quantity' => $validated['quantity'],
            'country_id' => $validated['country_id'],
            'category_id' => $validated['category_id'],
        ]);

        return redirect()->route('dashboard.index_all_products')->with(alert(__('Вы успешно обновили товар'), 'success'));
    }

    public function delete_product(Product $id){
        $id->delete();
        return redirect()->route('dashboard.index_all_products')->with(alert(__('Вы успешно удалили товар'), 'success'));
    }

    // index category
    public function index_category()
    {
        return view('admin.category.index');
    }
    // add category index
    public function add_category()
    {
        $categories = QueryBuilder::for(Category::class)->get();
        return view('admin.category.add', ['categories' => $categories]);
    }
    // add category store
    public function store_category(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
        ]);

        Category::query()->firstOrCreate([
            'name' => $validated['name'],
        ]);

        return redirect()->route('category.index')->with(alert(__('Вы успешно добавили категорию'), 'success'));
    }
    // index all category
    public function all_category()
    {
        $categories = QueryBuilder::for(Category::class)
            ->latest('created_at')
            ->allowedFilters(['name'])
            ->allowedSorts(['name'])
            ->paginate(10)
            ->appends(request()->query());

        return view('admin.category.all', ['categories' => $categories]);
    }

    public function delete_category(Category $id){
        // delete all products in category and delete category
        $products = Product::query()->where('category_id', $id->id)->get();
        foreach ($products as $product){
            $product->delete();
        }
        $id->delete();
        return redirect()->route('category.index')->with(alert(__('Вы успешно удалили категорию'), 'success'));
    }
    public function index_orders()
    {
        return view('admin.orders.index');
    }

    // all orders

    public function all_orders()
    {
        $orders = QueryBuilder::for(Order::class)
            ->latest('id')
            ->allowedFilters(['user_id', 'status_id'])
            ->allowedSorts(['user_id', 'status_id'])
            ->paginate(10)
            ->appends(request()->query());

        return view('admin.orders.all', ['orders' => $orders]);
    }

    // delete order

    public function delete_order(Order $id){
        $id->delete();
        return redirect()->route('admin.show_orders')->with(alert(__('Вы успешно удалили заказ'), 'success'));
    }

    // show order

    public function show_order(Order $id){
        $statuses = QueryBuilder::for(Status::class)->get();
        $order = $id;
        $products = $order->products;
        return view('admin.orders.show', ['order' => $order, 'products' => $products, 'statuses' => $statuses]);
    }

    // update order

    public function update_order(Request $request, Order $id)
    {
        $validated = $request->validate([
            'status_id' => ['required', 'numeric', 'min:1'],
        ]);

        $id->update([
            'status_id' => $validated['status_id'],
        ]);

        return redirect()->route('admin.show_orders')->with(alert(__('Вы успешно обновили заказ'), 'success'));
    }
}
