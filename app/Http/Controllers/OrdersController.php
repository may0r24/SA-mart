<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\Posts;

class OrdersController extends Controller
{
    public function store(){

        $errors = [];

        $orders = new Orders();
        $orders->full_name = request('full_name');
        $orders->delivery_address = request('delivery_address');
        $orders->state = request('state');
        $orders->phone_number = request('phone_number');
        $orders->alt_phone_number = request('alt_phone_number');
        $orders->qty = request('qty');

        if($orders->full_name == null || $orders->full_name == ''){
            $errors['full_name'] = 'Full Name is required';
        }
        if($orders->delivery_address == null || $orders->delivery_address == ''){
            $errors['delivery_address'] = 'Delivery address is required';
        }
        if($orders->state == null || $orders->state == ''){
            $errors['state'] = 'State is required';
        }
        if($orders->phone_number == null || $orders->phone_number == ''){
            $errors['phone_number'] = 'Phone Number is required';
        }
        if($orders->qty == null || $orders->qty == ''){
            $errors['qty'] = 'Quantity is required';
        }

        if(!empty($errors)){
            return redirect('/')->with('errors', $errors)->with('orders', $orders);
        }
        $orders->status = 'PENDING';
        $orders->save();

        return redirect('/')->with('message', "Thanks for your order, you'll be contacted within 24hours to confirm your order.");
    }

    public function update($id){

        $order = Orders::findOrFail($id);
        $order->qty = request('qty');
        $order->status = request('status');
        $order->save();

        return redirect('home')->with('update-order', 'Order Updated!');
    }

    public function search(){
        $search = request('search');
        $orders = Orders::query()
                    ->where('full_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('delivery_address', 'LIKE', '%' . $search . '%')
                    ->orWhere('state', 'LIKE', '%' . $search . '%')
                    ->orWhere('phone_number', 'LIKE', '%' . $search . '%')
                    ->orWhere('status', 'LIKE', '%' . $search . '%')
                    ->orWhere('qty', 'LIKE', '%' . $search . '%')->get();

        $posts = Posts::orderBy('id', 'desc')->get();

        return view('home', ['posts' => $posts],
                            ['orders' => $orders]);
    }
}
