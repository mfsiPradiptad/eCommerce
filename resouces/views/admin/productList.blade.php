@include('admin.header')
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Products</title>


</head>
<body>

    <h1>Product List</h1>

<table class="table table-borderd">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Sl#</th>
        <th scope="col">Image</th>
        <th scope="col">Brand Name</th>
        <th scope="col">Description</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Edit</th>
      </tr>
    </thead>
    <tbody>
        @php

            $count=1;
        @endphp
        @foreach ( $data as $product)
           <tr>
            <td>{{$count++}} </td>
            <td><img src="{{asset('storage/documents/product/'.$product->image) }}" alt="image" height="100px" width="100px"></td>
            <td>{{$product->productName}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->quantity}}</td>
            <td><a href="/addProduct/{{$product->id}}">Edit</a> </td>
        </tr>
        @endforeach


    </tbody>
  </table>



</body>
</html>
