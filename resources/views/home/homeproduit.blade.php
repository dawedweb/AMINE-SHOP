<!DOCTYPE html>
<html>
   <head>

    <style type="text/css">
    p{
        color: black;
         
        font-size: 30px;
    }
    </style>    
   
      <!-- Basic -->
      <base href="/public">
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
      
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
        
 
 
<section class="product_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center">
         <h2>
            Our <span>products</span>
         </h2>
      </div>
      <p>t-shirt : <p>
      <div class="row">
        @foreach ($product as $products)
       
        @if($products->category == 'men t-shirt')
         <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="{{url('product_detail',$products->id)}}" class="option1">
                     product details
                     </a>
                    <form action="{{url('add_card',$products->id)}}" method="get">
                       @csrf
                      
                    <div class="row">
                          <div class="col-md-4">
                             <input type="number" name="quantity" value="1" min="1" style="width: 100px" >
                          </div>

                          <div class="col-md-4" >
                             <input type="submit" value="add to card" >
                          </div>
                       
                       
                    </div>
                    
                 </form>
                  </div>
               </div>
               <div class="img-box">
                  <img src="/product/{{$products->image}}" alt="">
               </div>
               <div class="detail-box">
                  <h5>
                    {{$products->title}}
                  </h5>
                  @if($products->total_price!=null)
                    <h6 style="color: red">
                       discount price <br>
                       ${{$products->total_price}}
                     </h6>

                     <h6 style="text-decoration: line-through; color:blue">
                       <label>price</label> <br>
                       ${{$products->price}}
                     </h6>
                     @else 
                     <h6 style="  color:blue">
                       <label>price</label> <br>
                       ${{$products->price}}
                     </h6>
                     @endif

                  
                 
                  
               </div>
            </div>
         </div>
      @endif 
      @endforeach

      </div>
       
<br>
      <p>shoes : <p>
         <div class="row">
           @foreach ($product as $products)
          
           @if($products->category == 'shoes-men')
            <div class="col-sm-6 col-md-4 col-lg-4">
               <div class="box">
                  <div class="option_container">
                     <div class="options">
                        <a href="{{url('product_detail',$products->id)}}" class="option1">
                        product details
                        </a>
                       <form action="{{url('add_card',$products->id)}}" method="get">
                          @csrf
                         
                       <div class="row">
                             <div class="col-md-4">
                                <input type="number" name="quantity" value="1" min="1" style="width: 100px" >
                             </div>
   
                             <div class="col-md-4" >
                                <input type="submit" value="add to card" >
                             </div>
                          
                          
                       </div>
                       
                    </form>
                     </div>
                  </div>
                  <div class="img-box">
                     <img src="/product/{{$products->image}}" alt="">
                  </div>
                  <div class="detail-box">
                     <h5>
                       {{$products->title}}
                     </h5>
                     @if($products->total_price!=null)
                       <h6 style="color: red">
                          discount price <br>
                          ${{$products->total_price}}
                        </h6>
   
                        <h6 style="text-decoration: line-through; color:blue">
                          <label>price</label> <br>
                          ${{$products->price}}
                        </h6>
                        @else 
                        <h6 style="  color:blue">
                          <label>price</label> <br>
                          ${{$products->price}}
                        </h6>
                        @endif
   
                     
                    
                     
                  </div>
               </div>
            </div>
         @endif 
         @endforeach


         
      <span style="padding-top: 20px;">
       
      </span>
     </div>
</section>





    
     
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