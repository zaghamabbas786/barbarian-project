

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>

body {
    background: rgb(99, 39, 120)
}

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
    </style>
</head>
<body>

<div class="container rounded bg-white mt-5 mb-5">
<form action="update-profile" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="row">
       
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" name='image' width="150px" type ='file' src= "<?php echo e(url('/')); ?>/image/<?php echo e($user->image); ?>" alt="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">Edogaru</span><span class="text-black-50">edogaru@mail.com.my</span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" name='username' placeholder="first name" value='<?php echo e($user->username); ?>'></div>
                </div> 
                <div class="row mt-3">
                   
                    <div class="col-md-12"><label class="labels">Email ID</label><input type="email" class="form-control" name ='email' placeholder="enter email id" value="<?php echo e($user->email); ?>"></div> 
                    <div class="col-md-12"><label class="labels">Password</label><input type="password" name ='password' value = '' class="form-control" ></div> 
                    <div class="col-md-12"><label class="labels">Image Upload</label><input type="File" name ='file' class="form-control" ></div> 
                  
                </div>
                
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                </form>
            </div>
        </div>
        
   
    </div>
</form>
</div>
</div>
</div> 

    
</body>
</html>

<?php /**PATH F:\project\Barbarain\resources\views/Mainpage/components/profile.blade.php ENDPATH**/ ?>