<?php

namespace App\Http\Controllers;

use Stripe;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    // Constants for common values
    private const TOAST_TIMEOUT = 10000;
    private const STRIPE_CURRENCY = 'usd';

    // Add protected property for cart count
    protected function getCartCount()
    {
        return Auth::id() ? Cart::where('user_id', Auth::id())->count() : '';
    }

    protected function getViewData(array $additionalData = [])
    {
        return array_merge(['count' => $this->getCartCount()], $additionalData);
    }

    public function index()
    {
        $data = [
            'user' => User::where('usertype', 'user')->count(),
            'product' => Product::count(),
            'order' => Order::count(),
            'delivered' => Order::where('status', 'Delivered')->count()
        ];

        return view("admin.index", $data);
    }

    public function home()
    {
        return $this->showProductPage('home.index');
    }

    public function login_home()
    {
        return $this->showProductPage('home.index', true);
    }

    protected function showProductPage($view, $includeReviews = false)
    {
        $data = ['product' => Product::all()];

        if ($includeReviews) {
            $data['reviews'] = Review::latest()->get();
        }

        return view($view, $this->getViewData($data));
    }

    public function product_details($id)
    {
        return view('home.product_details', $this->getViewData([
            'data' => Product::findOrFail($id)
        ]));
    }

    public function add_cart($id)
    {
        if (!Auth::id()) {
            return redirect()->route('login');
        }

        Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $id
        ]);

        return redirect()->back()->with('success', 'Product added to cart successfully');
    }

    public function mycart()
    {
        if (!Auth::id()) {
            return view('home.mycart', ['count' => '']);
        }

        return view('home.mycart', $this->getViewData([
            'cart' => Cart::where('user_id', Auth::id())->get()
        ]));
    }

    public function delete_cart($id)
    {
        Cart::findOrFail($id)->delete();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Removed from the Cart Successfully');
        return redirect()->back();
    }

    public function confirm_order(Request $request){
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $userid = Auth::user()->id;
        $cart = Cart::where('user_id', $userid)->get();

        foreach($cart as $carts){

            $order = new Order;
            $order->product_id = $carts->product_id;
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->save();
        }

        $cart_remove = Cart::where('user_id', $userid)->get();

        foreach($cart_remove as $remove){
            $data = Cart::find($remove->id);
            $data->delete();
        }
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Ordered Successfully');

        return redirect()->back();

    }
    public function myorders(){
        $user = Auth::user()->id;
        $count = Cart::where('user_id', $user)->get()->count();

        $order = Order::where('user_id', $user)->get();
        return view('home.order', compact('count','order'));
    }

    public function stripe($value)
    {
        return view('home.stripe', [
            'value' => $value,
            'count' => $this->getCartCount()
        ]);
    }

    public function stripePost(Request $request, $value)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => intval($value) * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com."
        ]);

        $user = Auth::user();
        $this->processOrder($user->name, $user->phone, $user->address);

        return redirect('mycart');
    }

    protected function processOrder($name, $phone, $address)
    {
        $userid = Auth::id();
        $cart_items = Cart::where('user_id', $userid)->get();

        foreach($cart_items as $item) {
            Order::create([
                'product_id' => $item->product_id,
                'name' => $name,
                'rec_address' => $address,
                'phone' => $phone,
                'user_id' => $userid,
                'payment_status' => 'Paid'
            ]);
        }

        Cart::where('user_id', $userid)->delete();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Ordered Successfully');
    }

    public function shop()
    {
        return $this->showProductPage('home.shop');
    }

    public function why()
    {
        return view('home.why', [
            'count' => $this->getCartCount()
        ]);
    }

    public function testimonial()
    {
        return view('home.testimonial', [
            'count' => $this->getCartCount(),
            'reviews' => Review::latest()->get()
        ]);
    }

    public function contact()
    {
        return view('home.contact', [
            'count' => $this->getCartCount()
        ]);
    }

    public function terms()
    {
        return view('home.terms', [
            'count' => $this->getCartCount()
        ]);
    }

    public function privacy()
    {
        return view('home.privacy', [
            'count' => $this->getCartCount()
        ]);
    }

    public function return()
    {
        return view('home.return', [
            'count' => $this->getCartCount()
        ]);
    }

    public function writeReview()
    {
        return view('home.write-review', [
            'count' => $this->getCartCount()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string'
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);

        return redirect()->route('index', [
            'reviews' => Review::latest()->get()
        ])->with('success', 'Review submitted successfully!');
    }

    protected function showToast($message)
    {
        return toastr()->timeOut(self::TOAST_TIMEOUT)
                      ->closeButton()
                      ->addSuccess($message);
    }
}


