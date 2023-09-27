<!DOCTYPE html>
<html lang="en">
<base href="/public">
<head>
    <style>
        .img_product{
            width: 100px;
        }
     </style>
    <!-- Required meta tags -->
    @include('admin.css')
</head>
<style>
    #title_color {
        color: white;
    }
 
</style>

<body>
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
                <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                    <div class="ps-lg-1">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and
                                more with this template!</p>
                            <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo"
                                target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="https://www.bootstrapdash.com/product/corona-free/"><i
                                class="mdi mdi-home me-3 text-white"></i></a>
                        <button id="bannerClose" class="btn border-0 p-0">
                            <i class="mdi mdi-close text-white me-0"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <!-- start product  -->
                
                <div >

                    <h2 class="h2">Add Product</h2>
                    <form action="{{url('update_product',$product->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="">
                        <label for=""  class="form-label">Product Title</label> 
                        <input type="text" class="form-control" id="title_color" name="title" value="{{$product->title}}" Required>
                    </div>

                    <div>
                        <label for=""  class="form-label">Product description</label>
                        <input type="text" class="form-control"  id="title_color" name="description" value="{{$product->description}}">
                    </div>

                    <div>
                        <label for=""  class="form-label">Product price</label>
                        <input type="number" class="form-control"   id="title_color" name="price" value="{{$product->price}}">
                    </div>

                    <div>
                        <label for=""  class="form-label">Discount price</label>
                        <input type="number"  class="form-control" id="title_color" name="discount_price" value="{{$product->discount_price}}">
                    </div>


                    <div>
                        <label for=""  class="form-label">Product quantity</label>
                        <input type="number" class="form-control"  id="title_color" min="0" name="quantity" value="{{$product->quantity}}">
                    </div>

                    <div>
                        <label for=""  class="form-label">Product Category</label>
                       
                        <select name="category" required="">
                            <option value="{{$product->category}}" selected="">{{$product->category}}</option>
                            @foreach($category as $category)
                            <option value="{{$category->category_name}}" selected="">{{$category->category_name}}</option>
                             
                         @endforeach
                        </select>
                    </div>

                    <div>
                        <label for=""  class="form-label">Current Image</label>
                        <img class="img_product" src="product/{{$product->image}}" alt="" srcset="">
                    </div>

                    <div>
                        <label for=""  class="form-label"> Change Product Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>

                    <div>
                        
                        <input type="submit" class="btn btn-primary"  value="Add product">
                    </div>
                </form>
                </div>
                <!-- end product title -->




            </div>
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
</body>

</html>
