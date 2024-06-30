<?php

namespace App\Http\Controllers;

use PDF ;
use App\Models\order;
use App\Models\product;
use App\Models\Category;
use App\Notifications\sendemailnotification;
use Illuminate\Http\Request;
use  Notification;

class AdminController extends Controller
{
    public function viewcategory(){
        $data=Category::all();
        return view('admin.category',compact('data'));
    }

    public function addcategory(Request $request){
        $data=new Category;
        $data->category_name=$request->category;
        $data->save();
        return redirect()->back()->with('message', 'category saved success');
    }
    public function deletecategory( $id){
        $data=Category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'category deleted success');

    }

    public function viewproduct(){
        $catagory=Category::all();
        return view('admin.product',compact('catagory'));

    }

    public function addproduct(Request $request){
        $product=new product;
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product-> total_price=$request->discount_price;
        $product->category=$request->category;
        
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        
        $product->image=$imagename;
    
    
    
    $product->save();
    return redirect()->back()->with('message', 'product added sucssecfuly');

       
    }

    public function showproduct(){
        $product=product::all();
        return view('admin.show_product',compact('product'));

    }
    public function deleteproduct($id){
        $product=product::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'product delete sucssecfuly');

    }
    public function editproduct($id){
        $product=product::find($id);
        $catagory=Category::all();
        return view('admin.update_product',compact('product','catagory'));


    }
    public function updateproductconfirm(Request $request, $id){
        $product=product::find($id);
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->total_price=$request->discount_price;
        $product->quantity=$request->quantity;
        $product->category=$request->category;
       
        $image=$request->image;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        
        $product->image=$imagename;

        }
        

        $product->save();
        return redirect()->back()->with('message', 'product update sucssecfuly');






    }


    public function vieworder(){

        $order=order::all();
        return view('admin.vieworder',compact('order'));
    }

    public function delivried($id){
        $order=order::find($id);
        $order->delevery_status='delivried';
        $order->payement_status='payed';
        $order->save();
        return redirect()->back();

    }
    public function deleted_order_admin($id){
        $order=order::find($id);
        $order->delete();
        return redirect()->back()->with('message', 'order delete sucssesfuly');

    }
    public function download_pdf($id){
        $order=order::find($id);
        $pdf=PDF::loadview('admin.pdf',compact('order'));
       return $pdf->download('order_details.pdf');
        

    }
    public function send_email($id){
        $order=order::find($id);
        return view ('admin.emailinfo',compact('order'));
    }

    public function send_user_email(Request $request, $id){
        $order=order::find($id);
        $details =[
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'last' => $request->last,


        ];
        Notification::send($order,new sendemailnotification($details));
        return redirect()->back();
    }

    public function search_order(Request $request){
        
        $order=order::where('name','like','%'. request('search').'%')
        ->orWhere('email','like','%'. request('search').'%')
        ->orWhere('product_title','like','%'. request('search').'%')
        ->get();
        return view ('admin.vieworder',compact('order'));
    }
    
}
