@include('admin.header')
<!DOCTYPE html>
<html>
<head>

    <script>
        @php
                if($msg){
                    @endphp
                    alert('@php echo $msg; @endphp');
                    @php
                }
            @endphp
            function validator(){
                if(!$('#pImage').val()!=''){
                    alert('Please upload image');
                    return false;
                }
                $('#form').submit();
            }
    </script>

</head>

<body>
<div class="container">
<h1>Add New Product</h1>
<form action="/uploadProduct" method="post" enctype="multipart/form-data" id="form">
    @csrf
  <div class="form-group">
    <label for="pName">Product Name</label>
    <input type="text" class="form-control" name="pName" id="pName" placeholder="Van T-Shirt" value="{{$data[0]['productName']}}">
  </div>
  <div class="form-group">
    <label for="pDesc">Product Description</label>
    <input type="text" class="form-control" name="pDesc" id="pDescz" placeholder="Description" value="{{$data[0]['description']}}">
  </div>
  <div class="form-group">
    <label for="pPrice">Price</label>
    <input type="number" class="form-control" name="pPrice" id="pPrice" placeholder="100" value="{{$data[0]['price']}}">
  </div>
  <div class="form-group">
    <label for="pQuantity">Quantity</label>
    <input type="number" class="form-control" name="pQuantity" id="pQuantity" placeholder="100" value="{{$data[0]['quantity']}}">
  </div>
  <div class="form-group">
    <label for="pImage">Image</label>
    <input type="file" class="form-control" name="pImage" id="pImage" placeholder="100" accept=".jpg, .png" value="{{$data[0]['image']}}">

        @if($data[0]['image']!='')


            <div>
                <img src="{{asset('storage/documents/product/'.$data[0]['image']) }}" alt="image" height="100px" width="100px">
            </div>

        @endif

  </div>
  <input type="hidden" name="id" value="{{$data[0]['id']}}">

  <button type="button" class="btn btn-info" onclick="validator();">{{$submit}}</button>
</form>
</div>
</body>
</html>

