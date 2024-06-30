<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <!-- Required meta tags -->
   @include('admin.css')
   <style type="text/css">
   label{
    display: inline-block ;
    width: 200px;
    font-size: 15px;
    font-weight: bold;
   }
   </style>
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.sidebar')

      <!-- partial:partials/_sidebar.html -->
      @include('admin.header')

      <div class="main-panel">
        <div class="content-wrapper">
            
      <h1 style="text-align: center; font-size:25px; color:white"> send email to {{$order->email}}</h1>
      
      <form action="{{url('send_user_email',$order->id)}}" method="POST">
        @csrf
      <div style="padding-left:35%; padding-top:30px; ">
        <label style="color: aliceblue">email greeting</label>
        <input  style="color: black" type="text" name="greeting">
      </div>


      <div style="padding-left:35%; padding-top:30px; ">
        <label style="color: aliceblue">email firstling</label>
        <input style="color: black" type="text" name="firstline">
      </div>


      <div style="padding-left:35%; padding-top:30px; ">
        <label style="color: aliceblue">email body</label>
        <input style="color: black" type="text" name="body">
      </div> 

      
      <div style="padding-left:35%; padding-top:30px; ">
        <label style="color: aliceblue">email url</label>
        <input style="color: black" type="text" name="url">
      </div>
      
      <div style="padding-left:35%; padding-top:30px; ">
        <label style="color: aliceblue">email button</label>
        <input style="color: black" type="text" name="button">
      </div>

      <div style="padding-left:35%; padding-top:30px; ">
        <label style="color: aliceblue">email lastline</label>
        <input style="color: black" type="text" name="last">
      </div>

      <div style="padding-left:35%; padding-top:30px; ">
        <input type="submit" value="send email" class="btn btn-primary">

      </div>

     
      </form>
        
    </div>

      </div>






    
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>