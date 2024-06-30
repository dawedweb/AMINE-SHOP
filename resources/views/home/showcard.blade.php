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
      .img_size{
        width: 200px;
        height: 200px;
      }
      .total_deg{
        font-size: 20px;
        padding: 40px;
      }
      </style>
   
   
    </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')


        @if(session()->has('message'))
                <div class=" alert alert-success">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" ></button>
                    {{session()->get('message')}} 
                </div>
                    @endif
      


      <div class="center"> 
        <table >
            <tr class="th_color">
                <th class="th_deg"> title</th>
                <th class="th_deg">quantity</th>
                <th class="th_deg">price </th>
                
                <th class="th_deg">image</th>
                <th class="th_deg">action</th>
                
            </tr>
            <?php $totalprice = 0 ;?>
            
            @foreach( $card as $card)
            <?php $priceall = 0 ;?>
            <tr>
                <td>{{$card ->product_title}}</td>
                <td>  {{$card ->quantity}}  </td>
                <td>${{$card ->price}}</td>
               
                <td>
                    <img class="img_size" src="/product/{{$card ->image}}">
                </td>
                <td>
                    
                    <a class="btn btn-danger" onclick="return confirm('are you sure to delete this product')" href="{{url('delete_product_card',$card ->id )}}"> remove product</a>  
                </td>
                
            </tr>
            
            <?php $totalprice= $totalprice +  $card ->price * $card ->quantity ?>
            
            @endforeach
            
            
            
            
            
        </table>
        <table >
          <tr>
            <th class="th_deg"> total price :</th>
            <th class="th_degs">  {{$totalprice}} </th>
           </tr> 
        </table>
        <div>
          <h1 style="font-size:25px ; padding-bottom :15px; "> proceed to pay</h1>
          <a href="{{url('cash_order')}}" class="btn btn-danger" > cash on delivery</a>
          <a href="{{url('stripe',$totalprice)}}" class="btn btn-danger" > pay using card</a>





        </div>

        
        
      
      </div>













      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
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