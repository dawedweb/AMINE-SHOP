<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')
   <style type="text/css">
   .div_center{
    text-align: center;
    color: aliceblue;
    scroll-padding-top: 40px;
    }
    .font-size{
        font-size: 40px;
        padding-bottom: 40px;
    }
    .text-color{
        color: black;
        padding-bottom: 20px;
    }

    label{
        display :inline-block;
        width: 200 px;
    }
    .div_design{
        padding-bottom: 15px;
        align-items: center;

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
                <div class="div_center">
                    <h1 class="font-size">add product</h1>

                    <form action="{{url('/add_product')}}" method="post" enctype="multipart/form-data">
                        @csrf  



                    <div  class="div_design">
                        
                        <label>poduct title : </label>
                        <input class="text-color" type="text" name="title" placeholder="write a title" required="">
                    </div>
                    
                    <div class="div_design">
                        
                        <label>poduct description : </label>
                        <input class="text-color" type="text" name="description" placeholder="write a description" required="">
                    </div>
                
                    <div class="div_design">
                    <label>product price : </label>
                    <input class="text-color" type="number"  name="price" placeholder=" price produit " required="">
                    </div>
                    <div class="div_design">
                        <label>discount_price : </label>
                        <input class="text-color" type="number"  name="discount_price" placeholder="discount_price produit " >
                        </div>
                
                    <div class="div_design" >
                    <label>poduct quantity : </label>
                    <input class="text-color" type="number" min="0" name="quantity" placeholder="quantity de produit" required="">
                    </div>
                
                    <div class="div_design">
                    <label>poduct category : </label>
                    <select class="text-color" name="category" required="">
                        <option value="" selected="">add new category</option>
                        @foreach ($catagory as $catagory)
                        <option value="{{$catagory->category_name}}">{{$catagory->category_name}}</option>
                        @endforeach
                    </select>           
                    </div>
                    
                    <div class="div_design">
                    <label>poduct image : </label>
                    <input type="file" name="image" required="">
                    </div>
                    
                    <div class="div_design">
        
                    <input type="submit" value="add product" class="btn btn-primary">
                    </div>

                    </form>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>