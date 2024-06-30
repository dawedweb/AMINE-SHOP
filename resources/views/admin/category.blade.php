<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')
   <style type="text/css"> 
   .div_center{
    text-align: center;
    padding-top: 40px;
   }
   .h2_font{
    color: aliceblue;
    font-size: 40px;
    scroll-padding-bottom: 40px;
   }
   .input_color{
    color: black ;
   }
   .center{
    margin: auto;
    width: 50%;
    text-align: center;
    color: aliceblue;
    margin-top: 30px;
    border: 3px solid white; 
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
                    <h2 class="h2_font">add category</h2>
                    <form action="{{url('/add_category')}}" method="POST">
                        @csrf
                        <input class="input_color" type="text" name="category" placeholder="write category name">
                        <input type="submit" name="submit" class="btn btn-primary" value="add category  ">

                    </form>

                </div>
                <table class="center">
                    <tr>
                        <td>category name</td>
                        <td>action</td>
                    </tr>
                    @foreach ($data as $data)
                        
                    
                    <tr>
                        <td>{{$data->category_name}}</td>
                        <td>
                            <a onclick="return confirm('are you sure to delete category')" class="btn btn-danger" href="{{url('delete_category',$data->id)}}">delete</a>
                        </td>
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