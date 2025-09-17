<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewProductMail;
use App\Mail\BroadcastMail;
use Barryvdh\DomPDF\Facade\Pdf;
class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();
        return view("admin.category", compact("data"));
    }

    public function add_category(Request $request)
    {
        $category = new Category;

        $category->category_name = $request->category;

        $category->save();

        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['message' => 'Category Added Successfully']);
        }

        toastr()->success('Category Added Successfully');
        return redirect()->back();
    }

    public function delete_category($id){
        $data = Category::find($id);
        $data->delete();
        toastr()->success('Category Deleted Successfully');
        return redirect()->back();
    }

    public function edit_category($id){
        $data = Category::find($id);
        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id){
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();
        toastr()->success('Category Edited Successfully');
        return redirect('/view_category');
    }

    public function add_product(){
        $category = Category::all();
        return view('admin.add_product', compact('category'));
    }

    public function upload_product(Request $request){
        $data = new Product;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->qty;
        $data->category = $request->category;

        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $destination = public_path('products');
            if (!is_dir($destination)) {
                mkdir($destination, 0775, true);
            }
            $request->image->move($destination, $imagename);
            $data->image = $imagename;
        }
        $data->save();

        // Notify subscribers (best effort)
        try {
            $subscribers = Subscriber::pluck('email');
            foreach ($subscribers as $email) {
                Mail::to($email)->queue(new NewProductMail([
                    'id' => $data->id,
                    'title' => $data->title,
                    'price' => $data->price,
                    'category' => $data->category,
                    'description' => $data->description,
                ]));
            }
        } catch (\Throwable $e) {
            // ignore failures to avoid blocking product creation
        }

        toastr()->success('Products Added Successfully');
        return redirect()->back();
    }

    public function view_product(){
        $product = Product::all(); // Use all() instead of pagination
        return view('admin.view_product', compact('product'));
    }

    public function delete_product($id){
        $data = Product::find($id);

        $image_path = public_path('products/'.$data->image);

        if(file_exists($image_path)){
            unlink($image_path);
        }

        $data->delete();
        toastr()->success('Product Deleted Successfully');
        return redirect()->back();
    }

    public function update_product($slug){
        $data = Product::where('slug', $slug)->get()->first();
        $category = Category::all();
        return view('admin.update_page', compact('data', 'category'));
    }

    public function edit_product(Request $request, $id){

        $data = Product::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;

        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $destination = public_path('products');
            if (!is_dir($destination)) {
                mkdir($destination, 0775, true);
            }
            $request->image->move($destination, $imagename);

            $data->image = $imagename;

        }
        $data->save();
        toastr()->success('Product Updated Successfully');
        return redirect('/view_product');
    }

    public function product_search(Request $request){
        $search = $request->search;
        $product = Product::where('title','LIKE','%'.$search.'%')->orWhere('category','LIKE','%'.$search.'%')->get();
        return view('admin.view_product', compact('product'));
    }

    public function view_orders(){
        $data = Order::all();
        return view('admin.order', compact('data'));
    }

    public function in_progress($id){

        $data = Order::find($id);
        $data->status = 'in progress';
        $data->save();
        return redirect('/view_orders');

    }
    public function on_the_way($id){

        $data = Order::find($id);
        $data->status = 'On the way';
        $data->save();
        return redirect('/view_orders');

    }
    public function delivered($id){

        $data = Order::find($id);
        $data->status = 'delivered';
        $data->save();
        return redirect('/view_orders');

    }

    public function print_pdf($id){

        $data = Order::find($id);

        $pdf = Pdf::loadView('admin.invoice', compact('data'));

        return $pdf->download('invoice.pdf');

    }

    public function broadcastForm()
    {
        return view('admin.broadcast');
    }

    public function broadcastSend(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:5',
        ]);

        $subject = $request->subject;
        $message = $request->message;

        try {
            Subscriber::chunk(200, function ($subs) use ($subject, $message) {
                foreach ($subs as $s) {
                    Mail::to($s->email)->queue(new BroadcastMail($subject, $message));
                }
            });
            toastr()->success('Broadcast queued to subscribers');
        } catch (\Throwable $e) {
            toastr()->error('Failed to queue broadcast');
        }

        return redirect()->back();
    }
}
