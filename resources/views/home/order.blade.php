<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <style type="text/css">
        .center{
          margin: auto;
          width: 50%;
          text-align: center;
          padding: 30px;
        } 
        table,th,td{
        border:1px solid green;

      }
        .th_deg{
        font-size: 30px;
        padding: 5px;
        background:skyblue;
      }
      .th_degs{
        font-size: 35px;
        padding: 5px;
        margin: auto;
        width: 50%;
        text-align: center;
        
         
      }
    </style>
    </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
         @if(session()->has('message'))
         <div class=" alert alert-success">
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" >x</button>
             {{session()->get('message')}} 
         </div>
             @endif
       
         <div class="center">

            <table>

                <tr >
                  <th class="th_deg">product name</th>  
                  <th class="th_deg">quantity</th>  
                  <th class="th_deg">price</th>  
                  <th class="th_deg">payement status</th>  
                  <th class="th_deg">delevery status</th>  
                  <th class="th_deg">image</th>  
                  <th class="th_deg">cancel order</th> 
                </tr>
                
                @foreach( $order as $order)
                
                <tr>
                    <td>{{$order ->product_title}}</td>
                    <td>{{$order ->quantity}}</td>
                    <td>{{$order ->price}}</td>
                    <td>{{$order ->payement_status}}</td>
                    <td>{{$order ->delevery_status}}</td>
                    <td>
                        <img class="img_size" src="/product/{{$order ->image}}">    
                    </td>
                    <td>
                        @if($order ->delevery_status == 'processing' )

                    
                        <a class="btn btn-danger" onclick="return confirm('are you sure to delete this product')" href="{{url('cancel_order',$order ->id)}}"> cancel </a>  
                       @else
                       <p style="color: blue"> not allowed </p>
                       @endif
                    </td>

                </tr>

                @endforeach

            </table>






         </div>















      </div>
    
      
     
      
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>