@include('user.userHeader')
<!DOCTYPE html>
<html lang="en">
    <head>


        <script>

            $(document).ready(function(){
                $('.productCart').click(function(){
                    var pIdName = $(this).closest('td').find('#productId');
                    var pId = pIdName.val();
                    addToCart(pId);
                });
            })
        </script>
    </head>
<body>
    <table class="table table-borderd">

        <tbody>

            @foreach ( $data as $product)
               <tr>

                <td><img src="{{asset('storage/documents/product/'.$product->image) }}" alt="image" height="100px" width="100px"></td>
                <td>{{$product->productName}}</td>
                <td>{{$product->description}}</td>
                <td>&#x20B9; {{$product->price}} <br>
                     @if($product->quantity > 0)
                     <span class="text-success">Available</span> <br> <button class="btn btn-sm productCart text-light bg-success" id="product_{{$product->id}}">Add to cart</button>
                     @else
                     <span class="text-danger">Out of stock</span>
                      @endif
                      <input type="hidden" id="productId" name="productId" value="{{$product->id}}">
                </td>

            </tr>
            @endforeach


        </tbody>
      </table>

</body>
</html>
