<head>
   

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      
</head>


<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{url('/')}}"><img width="250" src="images/logo1.png" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item active">
                   <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                </li>
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">products <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                      <li><a href="show_produit_home">homme</a></li>
                      <li><a href="testimonial.html">famme</a></li>
                      <li><a href="testimonial.html">enfant</a></li>


                   </ul>
                </li>
                 
                
                <li class="nav-item">
                   <a class="nav-link" href="{{url('contact')}}">Contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about">about</a>
               </li>
                <li class="nav-item">
                  
                  <a class="nav-link" href="{{url('show_card')}}"><i class="fa-solid fa-cart-shopping"></i></a>
               </li> 
                
               <li class="nav-item">
                  <a class="nav-link" href="{{url('show_order')}}"><i class="fa-solid fa-truck-fast"></i></a>
               </li>
              

                <form class="form-inline">
                    <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                 </form>
                 @if (Route::has('login'))
                 @auth
                 <li class="nav-item">
                    <x-app-layout>

                    </x-app-layout>
                 </li>
                 @else

                <li class="nav-item">
                    <a class="btn btn-primary" id="logincss"  href="{{ route('login') }}">login</a>
                 </li>
                 <li class="nav-item">
                    <a class="btn btn-success" href="{{ route('register') }}">register</a>
                 </li>
                 @endauth
                @endif
                
             </ul>
          </div>
       </nav>
    </div>
 </header>