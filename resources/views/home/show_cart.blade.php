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
      <title>Healthy farm shop</title>
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
       
      
     <div class="container">
        <table class="table">
            <tr>
                <th> product image</th>
                <th> Product Title</th>
                <th>product quantity</th>
                <th>product price</th>
                <th>Action</th>
                
            </tr>
            <?php $totalprice=0; ?>
@foreach($cart as $cart)
            <tr>
                <td> <img style="width:50px" src="/product/{{$cart->image}}" alt="" srcset=""></td>
                <td>{{$cart->product_title}}</td>
                <td>{{$cart->quantity}}</td>
                <td>{{$cart->price}}</td>
                <td> <a class="btn btn-danger" href="{{url('remove_cart',$cart->id)}}">Delete</a></td>
            </tr>
            <?php $totalprice=$totalprice + $cart->price ?>

            @endforeach
            
        </table>
       <center> <div> <h2> Total Price ${{$totalprice}}</h2></div></center>
     </div>
     <div>
      <h1>proceed to oreder</h1>
      <a class="btn btn-primary" href="{{url('cash_order')}}">Cash on Delevery</a>
      <a class="btn btn-primary"  href="{{url('stripe',$totalprice)}}"> Pay using card</a>
     </div>
    </div>
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
   
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