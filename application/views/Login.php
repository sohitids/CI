<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
if(isset($_SESSION['id'])){
	redirect('WelcomeView');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
  <style>
    .bg-changese {
    background: #fff;
    box-shadow: 0px 3px 5px #858383;
    border-radius: 5px;
}   .card {
    
    border-radius: 5px;
    box-shadow: 0px 0 30px rgb(1 41 112 / 10%);
}
  
body{background:#f6f9ff; font-family: "Poppins", sans-serif;}
      </style>
  </head>
  <body>
    
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 flex-column align-items-center justify-content-center">
                <div class="card mb-3">
                     <div class="card-body">
                     <div class="col-md-12 bg-changeses mt-2">
                     <div class=" pb-2"><h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5><p class="text-center small">Enter your username &amp; password to login</p></div>
       
        <form action="" method="post" enctype="multipart/form-data">
     
        <!--error message -->
        <?php if($this->session->flashdata('error')){?>
        <p style="color:red"><?php  echo $this->session->flashdata('error');?></p>	
        <?php } ?>
    
               
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" id="email" value="<?php echo set_value('email') ?>" name="email">
               <?php echo form_error('email',"<div style='color:red'>","</div>") ?>
                
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control" id="password" value="<?php echo set_value('password') ?>" name="password">
                <?php echo form_error('password',"<div style='color:red'>","</div>") ?>
            </div>
            
            <button type="submit" class="btn btn-primary mb-3" >Submit</button><br>
            <div class="text-center">Not Registered Yet? <a href="<?php echo site_url('Registration');?>">Sign up here</a></div>
    
    </form>
        </div>
                     </div>
                </div>
          </div>
        </div>


    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
