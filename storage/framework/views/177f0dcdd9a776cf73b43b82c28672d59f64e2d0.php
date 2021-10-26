<?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!DOCTYPE html>
<html>
<head>

    <script>
        <?php
                if($msg){
                    ?>
                    alert('<?php echo $msg; ?>');
                    <?php
                }
            ?>
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
    <?php echo csrf_field(); ?>
  <div class="form-group">
    <label for="pName">Product Name</label>
    <input type="text" class="form-control" name="pName" id="pName" placeholder="Van T-Shirt" value="<?php echo e($data[0]['productName']); ?>">
  </div>
  <div class="form-group">
    <label for="pDesc">Product Description</label>
    <input type="text" class="form-control" name="pDesc" id="pDescz" placeholder="Description" value="<?php echo e($data[0]['description']); ?>">
  </div>
  <div class="form-group">
    <label for="pPrice">Price</label>
    <input type="number" class="form-control" name="pPrice" id="pPrice" placeholder="100" value="<?php echo e($data[0]['price']); ?>">
  </div>
  <div class="form-group">
    <label for="pQuantity">Quantity</label>
    <input type="number" class="form-control" name="pQuantity" id="pQuantity" placeholder="100" value="<?php echo e($data[0]['quantity']); ?>">
  </div>
  <div class="form-group">
    <label for="pImage">Image</label>
    <input type="file" class="form-control" name="pImage" id="pImage" placeholder="100" accept=".jpg, .png" value="<?php echo e($data[0]['image']); ?>">

        <?php if($data[0]['image']!=''): ?>


            <div>
                <img src="<?php echo e(asset('storage/documents/product/'.$data[0]['image'])); ?>" alt="image" height="100px" width="100px">
            </div>

        <?php endif; ?>

  </div>
  <input type="hidden" name="id" value="<?php echo e($data[0]['id']); ?>">

  <button type="button" class="btn btn-info" onclick="validator();"><?php echo e($submit); ?></button>
</form>
</div>
</body>
</html>

<?php /**PATH /home/pradiptad/laravel/eShop/resources/views/admin/addProduct.blade.php ENDPATH**/ ?>