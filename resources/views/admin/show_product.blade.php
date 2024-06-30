<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')
   <style type="text/css">
   .center{
    margin:auto;
    width:50%;
    color: aliceblue;
    border:5px solid white;
    text-align: center;
    margin-top: 40px;
}
    .font_size{
        text-align: center;
        font-size: 40px;
        padding-top: 20px;
        color: white;
    }
    .img_size{
        width: 150px;
        height: 150px;

    }
    .th_color{
        background: skyblue;
    }
    .th_des{
        padding: 30px;
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
                <h2 class="font_size">All Products</h2>
                <table class="center">
                    <tr class="th_color">
                        <th class="th_des"> title</th>
                        <th class="th_des">description</th>
                        <th class="th_des">quantity</th>
                        <th class="th_des">category</th>
                        <th class="th_des">price</th>
                        <th class="th_des">discount_price </th>
                        <th class="th_des">image</th>
                        <th class="th_des">delete</th>
                        <th class="th_des">edit</th>
                    </tr>
                    @foreach( $product as $product)
                    <tr>
                        <td>{{$product ->title}}</td>
                        <td>{{$product ->description}}</td>
                        <td>{{$product ->quantity}}</td>
                        <td>{{$product ->category}}</td>
                        <td>{{$product ->price}}</td>
                        <td>{{$product ->total_price}}</td>
                        <td>
                            <img class="img_size" src="/product/{{$product ->image}}">
                        </td>
                        <td> <a class="btn btn-danger" onclick="return confirm('are you sure to delete this product')" href="{{url('delete_product',$product ->id )}}"> delete</a>  </td>
                        <td> <a class="btn btn-success" href="{{url('edit_product',$product ->id )}}"> edit</a>  </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>