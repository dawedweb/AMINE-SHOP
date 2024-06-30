<!DOCTYPE html>
<html lang="en">
  <head>


</style>
  </head>
  <body>

                
                    
                <h1> liste d'ordre de produit </h1>
                 
                le nom de client :   <h3> {{$order->name}}</h3>
                email de client   <h3  > {{$order->email}}</h3>
                telephone de client   <h3 >{{$order->phone}}</h3>
                adresse de client  <h3>{{$order->adress}}</h3>
                nom de produit:  <h3> {{$order->product_title}}</h3>
                quantity de produit: <h3> {{$order->quantity}}</h3>
                prix de produit:   <h3> {{$order->price}}</h3>
                payement_status de produit:  <h3> {{$order->payement_status}}</h3>
                delevery_status de produit:    <h3> {{$order->delevery_status}}</h3>
                image de produit:   <h3> <br>
                      <img height="350" width="350"   src="product/{{$order ->image}}">
                    </h3>
                    
                     
            
            
            
            
            
            
           
            
            
            
            
            
            
            
            
            
            
    




   
  </body>
</html>