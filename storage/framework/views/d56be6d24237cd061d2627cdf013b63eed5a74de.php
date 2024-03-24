<?php
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Barbarian</title>
    
        <?php echo $__env->make('MainPage.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   
</head>

<body>
    <?php echo $__env->make('MainPage.components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('MainPage.components.hero', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('MainPage.components.media-wall', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    <?php echo $__env->make('MainPage.components.contact', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    <?php echo $__env->make('MainPage.components.plans', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    <?php echo $__env->make('MainPage.components.statement', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    <?php echo $__env->make('MainPage.components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
</body>

</html>

<?php
 ?><?php /**PATH F:\project\Barbarain\resources\views/MainPage/home.blade.php ENDPATH**/ ?>