<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="row">
         @foreach ($product as $products)
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
                      <h6 style="text-decoration: line-through; color:blue">
                        <label>price</label> <br>
                        ${{$products->price}}
                      </h6>
                      @endif

                   
                  
                   
                </div>
             </div>
          </div>

       @endforeach
       <span style="padding-top: 20px;">
       {!!$product->appends(Request::all())->links()!!}
       </span>
      </div>
 </section>