<?php

namespace App\Http\Controllers;

use Stripe;
use Session;
use App\Models\card;
use app\Models\User;

use App\Models\order;
use App\Models\reply;
use App\Models\product;



use App\Models\comments;
use Illuminate\Http\Request;
use function Laravel\Prompts\alert;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $product=product::paginate(3);
        $comments=comments::all();
        return view('home.userpage',compact('product','comments'));
    }


    public function productdetail($id){
        $product=product::find($id);
        return view('home.product_detail',compact('product'));
    }



    public function redirect()
    {
      
        $usertype = Auth::user()->usertype;
        if($usertype == '1')
        {
            $totalproduct=product::all()->count();
            $totalorder=order::all()->count();
            $totaluser=user::all()->count();

            $order=order::all();
            $total_revue=0;
            foreach($order as $order){
                $total_revue= $total_revue + ($order->price * $order->quantity); 
            }
            $order=order::all();
            $statu_delevery=0;
            foreach($order as $order){
                if($order->delevery_status == 'delivried'){
                    $statu_delevery =   $statu_delevery + 1 ;
                }
            } 
            $order=order::all();
            $statu_prossesing=0;
            foreach($order as $order){
                if($order->delevery_status == 'processing'){
                    $statu_prossesing =   $statu_prossesing + 1 ;
                }
            }



            return view('admin.home',compact('totalproduct','totalorder','totaluser','total_revue','statu_delevery','statu_prossesing'));
            
        }
        else  if($usertype == '0' )
        {
            $product=product::paginate(3);
            $comments=comments::all();
            return view('home.userpage',compact('product','comments'));
        }
        
      

    }

    public function addcard(Request $request ,$id) {
        if (auth::id()){
            $user=auth::user();
            $product=product::find($id);
            $card=new card;
            $card->name=$user->name;
            $card->email=$user->email;
            $card->phone=$user->phone;
            $card->adress=$user->adress;
            $card->user_id=$user->id;
            $card->product_title=$product->title;
            
            if($product->total_price !=null){
                $card->price=$product->total_price;
            }
            else{
                $card->price=$product->price;
            }
            
            $card->image=$product->image;
            $card->product_id=$product->id;
            
            if(($product->quantity !=null) && ($product->quantity > $request->quantity )    ){
                $card->quantity=$request->quantity;
            }
            else{
                return redirect()->back();
            }
            

            $card->save();
            return redirect()->back();
        
        }
        else{
            return redirect('login');
        }
   
    }


    public function showcard(){
        
        if (auth::id()){
        $id=auth::user()->id;
        $product=product::find($id);
        
        $card=card::where('User_id','=',$id)->get();
        
            
           
         

        return view('home.showcard',compact('card'));
        }
        else{
            return redirect('login');
        }
    }
    public function delete_product_card($id){
        $card=card::find($id);
        $card->delete();
        return redirect()->back()->with('message', 'product delete sucssecfuly from card');


    }

    public function cashorder () {
        $user=auth::user();
        $userid=$user->id;
        
        $data=card::where('user_id', '=', $userid)->get();
        foreach($data as $data){
            $order=new order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->adress=$data->adress;
            $order->user_id=$data->user_id;
            
            $order->product_title=$data->product_title;
            $order->quantity=$data->quantity;
            $order->price=$data->price;
            $order->image=$data->image;
            $order->product_id=$data->product_id;
            
            $order->payement_status='cash  on delevery';
            $order->delevery_status='processing';
            $order->save();

            $card_id=$data->id;
            $card=card::find($card_id);
            $card->delete();
            

        }
        return redirect()->back()->with('message', 'we recived your order. we will connect with you soon');


    }

    public function stripe($totalprice){
        return view('home.stripe',compact('totalprice'));

    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "thnx for payement." 
        ]);
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }

    public function show_order(){
        if(auth::id()){
            
            $id=auth::user()->id;
            
            $order=order::where('user_id','=',$id    )->get();
         
            
            return view('home.order',compact('order' ));

        }

        else{
            return redirect('login');
        }
    }



    public function cancel_order($id){
    
    $order=order::find($id);
    $order->delevery_status= 'order canceled ';
    $order->save();       
    return redirect()->back()->with('message', 'order has canceled successfuly')  ;
   
    }


    public function make_comment(Request $request){
        if(auth::id()){
            
        $comment=new comments;
        $comment->name=auth::User()->name;
        $comment->commment=$request->comment;
        $comment->user_id-=auth::User()->id;
        $comment->save();
        return redirect()->back();
        }
        else
        {
            return redirect('login');
        }

    
    }

    public function reponse_comment(Request $request){
        if(auth::id()){
            $repose=new reply;
            $repose->name=auth::User()->name;
            $repose->user_id=auth::User()->id;
            $repose->coomment_id=$request->commentId;
            $repose->reply=$request->reponse;

            $repose->save();
            return redirect()->back();


        }
        else{
         return redirect('login');
        }
    }

    public function show_produit_home(){
        $product=product::all();

       
         
        return view('home.homeproduit',compact('product'));
    }
   
    public function contact(){
        return view('home.contact');
    }
    public function about(){
        return view('home.about');
    }

    }

        
    





