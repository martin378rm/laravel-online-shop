<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Faker\Provider\id_ID\PhoneNumber;
use Faker\Factory as Faker;
use Faker\Provider\ar_EG\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
        $orders = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->select('orders.*', 'products.name', 'products.price')
            ->where('user_id', $user->id)
            ->get();


        return view('latihan.order_dashboard', ["active" => "manajemen_order"], compact('orders', 'user'));
    }

    public function show($id)
    {


        $faker = Faker::create('id_ID');
        $faker->addProvider(new PhoneNumber($faker));
        $phone = $faker->phoneNumber();


        $order = Order::find($id);

        $product = Product::find($order->product_id);
        $user = Auth::user();

        return view('latihan.detail_view_order', ["active" => "manajemen_order"], compact('order', 'user', 'product', 'phone'));
    }

    public function navbar()
    {
        $user = Auth::user();

        return view('partial.navbar', compact('user'));
    }
}