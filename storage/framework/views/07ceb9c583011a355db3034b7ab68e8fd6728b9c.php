<?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
        <?php

            $count=1;
        ?>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr>
            <td><?php echo e($count++); ?> </td>
            <td><img src="<?php echo e(asset('storage/documents/product/'.$product->image)); ?>" alt="image" height="100px" width="100px"></td>
            <td><?php echo e($product->productName); ?></td>
            <td><?php echo e($product->description); ?></td>
            <td><?php echo e($product->price); ?></td>
            <td><?php echo e($product->quantity); ?></td>
            <td><a href="/addProduct/<?php echo e($product->id); ?>">Edit</a> </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </tbody>
  </table>



</body>
</html>
<?php /**PATH /home/pradiptad/laravel/eShop/resources/views/admin/productList.blade.php ENDPATH**/ ?>