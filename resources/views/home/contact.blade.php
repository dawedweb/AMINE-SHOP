<!DOCTYPE html>
<html>
   <head>

    <style type="text/css">
  p{
    text-align: center;
    font-size: 20px;
    color: black;
  }
  .message{
    align-items: center;
    text-align: center;
    padding-bottom:30px;
  }
  .facebook{
    font-size:40px;
    padding-bottom:20px
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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
        
 
 
 <p> 
    <i class="fa-regular fa-comment"></i>
    hi every users of ower web site, we wish you contact us to describe your opinion  to  become closer to each other.
   
<i class="fa-regular fa-face-smile-wink"></i>
 </p>
 
 <div style="text-align: center; padding-bottom:30px">
    <h1 style="font-size: 30px; text-align=center; padding-top:20px; padding-bottom:20px ; color:#FF6347"> contact us here </h1>


       <form action="{{url('make_comment')}}" method="POST">
        @csrf
        <textarea style="height: 150px; width:600px" placeholder="write something here" name="comment"></textarea>
        <br>
       <input type="submit" class="btn btn-primary" value="envoyer">
<br>
<p> 
    or contact us on our other social media web sites.
</p>
<br>
<div class="facebook">
<a href="https://www.facebook.com/amine.dawed/"><i class="fa-brands fa-facebook"> </i></a>

 
<a href="https://www.instagram.com/aminedawed/"><i class="fa-brands fa-instagram"></i></a>
<br>
<i class="fa-solid fa-phone">+21620931373</i>
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