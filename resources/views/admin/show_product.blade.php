<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">

        .center
        {
            margin: auto;
            width: 60%;
            border:2px solid white;
            margin-top: 40px;  
        }

        .font_size
        {
            text-align: center;
            font-size: 40px;
            padding-top: 20px
        }

        .img_size
        {
            width:300%;
            height: 130px;
        }

        .th_color
        {
            background: skyblue;
        }

        .th_deg
        {
            padding: 20px;
        }
        table,th,td
        {
            border: solid grey;
        }

    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
      <!-- partial -->
    @include('admin.header') 
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

               
                @if(session()->has('message'))

                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden ="true">x</button>
                    {{ session()->get('message') }}

                </div>
                    
                @endif



                <h2 class="font_size">All Products</h2>

                <table class="center">

                    <tr class="th_color">
                        <th class="th_deg">Product title</th>
                        <th class="th_deg">Description</th>
                        <th class="th_deg">Quantity</th>
                        <th class="th_deg">Category</th>
                        <th class="th_deg">Price</th>
                        <th class="th_deg">Discount Price</th>
                        <th class="th_deg">Product Image</th>
                        <th class="th_deg">Delete</th>
                        <th class="th_deg">Edit</th>
                    </tr>

                    @foreach($product as $product)

                    <tr>
                        <th class="th_deg">{{ $product->title }}</th>
                        <th class="th_deg">{{ $product->description }}</th>
                        <th class="th_deg">{{ $product->quantity }}</th>
                        <th class="th_deg">{{ $product->category }}</th>
                        <th class="th_deg">{{ $product->price }}</th>
                        <th class="th_deg">{{ $product->discount_price }}</th>

                        <td>

                            <img class="img_size" src="/product/{{$product->image}}">

                        </td>
                        
                        <td>
                            <a class="btn btn-danger" onclick="return confirm('Are You Sure Delete This?')" href="{{ url('delete_product',$product->id ) }}">Delete</a>
                        </td>

                        <td>
                            <a href="{{ url('edit_product',$product->id) }}" class="btn btn-success"  href="">Edit</a>
                        </td>
                    </tr>

                    @endforeach()

                </table>

            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script') 
    <!-- End custom js for this page -->
  </body>
</html>