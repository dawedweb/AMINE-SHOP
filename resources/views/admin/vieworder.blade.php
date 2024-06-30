<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')
   <style type="text/css">
   .title_deg{
    text-align: center;
    font-size: 30px;
    font-weight: bold;
    color: aliceblue;
    padding-bottom: 40px;
   }
   .table_stat{
    border: 2px solid white;
    width: 100%;
    margin: auto;
    
    text-align: center;

   }
   .th_deg{
    color: aliceblue;
    background-color:skyblue  ;
    padding: 10px;

   }
   .th_degs{
    color: aliceblue;
   

   }
   .img_size{
    width: 150px;
    height: 150px;
    
   }

</style>
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.sidebar')

      <!-- partial:partials/_sidebar.html -->
      @include('admin.header')
        <!-- partial -->
     
        <div class="main-panel">
            <div class="content-wrapper">
              @if(session()->has('message'))
                <div class=" alert alert-success">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" ></button>
                    {{session()->get('message')}} 
                </div>
                    @endif
                     
                    

               <h1 class="title_deg"> all order </h1>

               <div style="padding-left:400px; padding-bottom:30px;">

                <form action="{{url('search_order')}}" method="GET">
                  @csrf
                    <input type="text" name="search" placeholder="search for something">
                    <input type="submit" value="search" class="btn btn-outline-primary">
                  
                </form>
              </div>
            
            <table class="table_stat">
                <tr >
                    <th class="th_deg"> nom utlisateur</th>
                    <th class="th_deg">email</th>
                    <th class="th_deg">phone </th>
                    <th class="th_deg">adress</th>
                    <th class="th_deg">product name</th>
                    <th class="th_deg">quantity</th>
                    <th class="th_deg">price</th>
                    <th class="th_deg">payement status</th>
                    <th class="th_deg">delevery status</th>
                    <th class="th_deg">image</th>
                    <th class="th_deg">delivried</th>
                    <th class="th_deg">print PDF</th>
                    <th class="th_deg">send email</th>
                </tr>
                @forelse ($order as $order)
                    
                
                <tr>
                    <td class="th_degs">{{$order->name}}</td>
                    <td class="th_degs">{{$order->email}}</td>
                    <td class="th_degs">{{$order->phone}}</td>
                    <td class="th_degs">{{$order->adress}}</td>
                    <td class="th_degs">{{$order->product_title}}</td>
                    <td class="th_degs">{{$order->quantity}}</td>
                    <td class="th_degs">{{$order->price}}</td>
                    <td class="th_degs">{{$order->payement_status}}</td>
                    <td class="th_degs">{{$order->delevery_status}}</td>
                    <td>
                      <img  class="img_size" src="/product/{{$order ->image}}">
                    </td>
                    <td>
                      @if ($order->delevery_status=='processing' || $order->payement_status=='cash on delevery	' )
                      <a href="{{url('delivried',$order->id)}}" onclick="return confirm('are you sure this product is delivried ?')" class="btn btn-primary">delivried</a>
                      @else 
                      <p style="color: green">delivried</p>
                     @endif
                     <a href="{{url('deleted_order_admin',$order->id)}}" onclick="return confirm('are you sure you want delete this product ?')" class="btn btn-danger">deleted</a>
                    </td>
                    <td> 
                      <a href="{{url('download_pdf',$order->id)}}" class="btn btn-secondary" >downeld</a>
                    </td>
                    <td> 
                      <a href="{{url('send_email',$order->id)}}" class="btn btn-info" >send email</a>
                    </td>
                </tr>
                @empty
                 <tr>   
                <td colspan="10" style="color:aliceblue">
                   no data found, sorry 
                </td>
              </tr>
                @endforelse
            
            
            
            
            
            
            </table>
            
            
            
            
            
            
            
            
            
            
            </div>
        </div>   





    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>