
<base href="/home"><!DOCTYPE html>
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
          <center><div class="container" style="margin-top: 50px ; margin-bottom:50px" >
         <div class="card" style="width: 18rem;">
            <img src="/product/{{$product->image}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{$product->title}}</h5>
              <p class="card-text">{{$product->description}}</p>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                
            </ul>
                <a href="#" class="card-link" style="color: red"> price &nbsp{{$product->price}}</a>
                <a href="#" class="card-link" style="color: red ;font-size: 12px;">Discout price &nbsp{{$product->discount_price}}</a>
              </div>
            <ul class="list-group list-group-flush">
    
                <form action="{{url('add_cart', $product->id)}}" method="post">
                    @csrf
                    <div class="row">
                       <div class="col-md-4">
                    <input type="number" value="1" min="1" name="quantity">
                 </div>
                 <div class="col-md-4"><input type="submit" value="Add to cart" id=""></div>
                    
                 </div>
                 </form>
            </ul>
           
          </div>
        </div>
    </center>
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