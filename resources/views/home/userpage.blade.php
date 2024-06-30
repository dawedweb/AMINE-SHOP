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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         @include('home.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
      
      <!-- end why section -->
      @include('home.whysection')
      <!-- arrival section -->
      @include('home.arivalsection')
      <!-- end arrival section -->
      
      <!-- product section -->
      @include('home.productsection')
      <!-- end product section -->

      <!-- subscribe section -->
      @include('home.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
      @include('home.clientsection')
      <!-- end client section -->

       <!-- commentaire start -->

<div style="text-align: center; padding-bottom:30px">
      <h1 style="font-size: 30px; text-align=center; padding-top:20px; padding-bottom:20px"> comments</h1>


         <form action="{{url('make_comment')}}" method="POST">
          @csrf
          <textarea style="height: 150px; width:600px" placeholder="comment something here" name="comment"></textarea>
          <br>
         <input type="submit" class="btn btn-primary" value="envoyer">

</div>
      

<div style=" padding-left:20px">
            <h1 style="font-size: 20px;  padding-bottom:20px; padding-bottom:20px"> all comments</h1>
         
            
                
            @foreach ($comments as $comments)
                  <div>
                         <b>{{$comments->name}} </b>
                         <p> {{$comments->commment}} </p>
                         <a href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{$comments->id}}" >reply</a>
   
                  </div>  
            @endforeach
          
 
         
         <div style="display: none;" class="replydiv">
            <form action="{{url('reponse_comment')}}" method="POST">
                 
               @csrf
                 
               <input type="text" id="commentId" name="commentId" hidden="">

                <textarea style="height: 100px; width:500px" name="reponse" placeholder="write something here" ></textarea>
                <br>
                <button type="submit" class="btn btn-warning" > reply</button>
                <a href="javascript::void(0);" class="btn btn-danger" onclick="reply_close(this)" >close</a>
            </form>    
         </div>

</form>             
      
</div>

    
      
      
      
      
      
      
      















        <!-- commentaire  end  -->
      <!-- footer start -->
      @include('home.footer')

      
      <!-- footer end -->

      
      <div class="cpy_">
         <p class="mx-auto">© 2024 All Rights Reserved By <a href="https://html.design/">Dawed Amine</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">Dawed Amine</a>
         
         </p>
      </div>

      <script type="text/javascript">
      function reply(coller){
         document.getElementById('commentId').value=$(coller).attr('data-Commentid');
         $('.replydiv').insertAfter($(coller));
         $('.replydiv').show();

         
      }
      function reply_close(coller){
          
         $('.replydiv').hide();

         
      }

      </script>
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