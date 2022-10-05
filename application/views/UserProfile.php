<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php include 'header.php'; ?>
<main id="main" class="main">
<div class="pagetitle">
  <h1>Profile</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="WelcomeView">Home</a></li>
      <li class="breadcrumb-item">Users</li>
      <li class="breadcrumb-item active">Profile</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
  <div class="row">
    <div class="col-xl-4">

      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

          <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
          <h2><?php echo $user->name ?></h2>
          <h3>Web Developer</h3>
          <div class="social-links mt-2">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>

    </div>

    <div class="col-xl-8">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
            </li>

            <!-- <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
            </li> -->

            <li class="nav-item">
              <button class="nav-link tb" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
            </li>

          </ul>
<!----------------------------------------  View profile  ------------------------------------------------->


          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">
              <h5 class="card-title">About</h5>
              <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

              <h5 class="card-title">Profile Details</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Username</div>
                <div class="col-lg-9 col-md-8"><?php echo $user->name ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Email</div>
                <div class="col-lg-9 col-md-8"><?php echo $user->email ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Password</div>
                <div class="col-lg-9 col-md-8"><?php echo $user->password ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Mobile</div>
                <div class="col-lg-9 col-md-8"><?php echo $user->mobile ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">City</div>
                <div class="col-lg-9 col-md-8"><?php echo $user->city ?></div>
              </div>

            </div>
<!----------------------------------------  Edit profile------------------------------------->
            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
            <p id="edit_error" style="display:none;color:red;"></p>
              <p id="edit_success" style="display:none;color:green;"></p>
<script>
  function imagePreview(evt){
    let image=document.getElementById('image');
    let imageUploadInputField=document.getElementById('imageUploadInputField');
    image.src=URL.createObjectURL(evt.target.files[0]);   
  }
  </script>
              <!-- Profile Edit Form -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                  <div class="col-md-8 col-lg-9">
                    <img src="assets/img/profile-img.jpg" alt="Profile" id="image">
                    <input type="file" class="form-control" id="imageUploadInputField"  onchange="imagePreview(event)" />
                   
                    <div class="pt-2">
                      <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                      <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                    </div>
                  </div>
                </div>
                <!-- <div id="uploaded_image">

                </div> -->
            </form>

                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Username</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="username" type="text" class="form-control" id="btn_Uname" value="<?php echo $user->name ?>">
                  </div>
                </div>

                <!-- <div class="row mb-3">
                  <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                  <div class="col-md-8 col-lg-9">
                    <textarea name="about" class="form-control" id="about" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                  </div>
                </div> -->

                <div class="row mb-3">
                  <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="email" type="email" class="form-control" id="btn_Email" value="<?php echo $user->email ?>">
                  </div>
                </div>


                <!-- <div class="row mb-3">
                  <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="job" type="text" class="form-control" id="Job" value="Web Designer">
                  </div>
                </div> -->

                <div class="row mb-3">
                  <label for="Mobile" class="col-md-4 col-lg-3 col-form-label">Mobile</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="mobile" type="text" class="form-control" id="btn_Mobile" value="<?php echo $user->mobile ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="City" class="col-md-4 col-lg-3 col-form-label">City</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="city" type="text" class="form-control" id="btn_City" value="<?php echo $user->city ?>">
                  </div>
                </div>

                <!-- <div class="row mb-3">
                  <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="phone" type="text" class="form-control" id="Phone" value="(436) 486-3538 x29071">
                  </div>
                </div> -->

               
                <!-- <div class="row mb-3">
                  <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="twitter" type="text" class="form-control" id="Twitter" value="https://twitter.com/#">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="facebook" type="text" class="form-control" id="Facebook" value="https://facebook.com/#">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="instagram" type="text" class="form-control" id="Instagram" value="https://instagram.com/#">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="linkedin" type="text" class="form-control" id="Linkedin" value="https://linkedin.com/#">
                  </div>
                </div> -->

                <div class="text-center">
                  <button type="button" id="btn_update" class="btn btn-primary">Save Changes</button>
                </div>
              </form><!-- End Profile Edit Form -->

            </div>

<!----------------------------------------  Save Changes  ------------------------------------------------->


            <!-- <div class="tab-pane fade pt-3" id="profile-settings"> -->

              <!-- Settings Form -->
              <!-- <form>

                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                  <div class="col-md-8 col-lg-9">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="changesMade" checked>
                      <label class="form-check-label" for="changesMade">
                        Changes made to your account
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="newProducts" checked>
                      <label class="form-check-label" for="newProducts">
                        Information on new products and services
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="proOffers">
                      <label class="form-check-label" for="proOffers">
                        Marketing and promo offers
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                      <label class="form-check-label" for="securityNotify">
                        Security alerts
                      </label>
                    </div>
                  </div>
                </div>

                <div class="text-center">
                  <button type="save" class="btn btn-primary">Save Changes</button>
                </div>
              </form>End settings Form -->

            <!-- </div> -->

<!----------------------------------------  Password Changes  ------------------------------------------------->


            <div class="tab-pane fade pt-3" id="profile-change-password">
              <!-- Change Password Form -->
              <p id="error" style="display:none;color:red;"></p>
              <p id="success" style="display:none;color:green;"></p>
              <form action="" method="post" >

                <div class="row mb-3">
                  <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="password" type="password" class="form-control" id="currentPassword">
               

                  </div>
                </div>

                <div class="row mb-3">
                  <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="new_pass" type="password" class="form-control" id="newPassword">
                   
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="renew_pass" type="password" class="form-control" id="renewPassword">
                 
                  </div>
                </div>

                <div class="text-center">
                  <button type="button" id ="btn" class="btn btn-primary">Change Password</button>
                </div>
              </form><!-- End Change Password Form -->

            </div>

          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>
  </div>
</section>
 
</main><!-- End #main -->
<script>

   $("#btn").on('click',function() {
    var currentPassword  = $('#currentPassword').val();
    var newPassword  = $('#newPassword').val();
    var renewPassword  = $('#renewPassword').val();

// if(newPassword!=renewPassword){
//   alert('Password and confirm password not mathc');

//   return false;
  
// }
    $.ajax({
    type: "POST",
    url: "http://localhost/codeigniter/Register/changepassword",
    data: {password:currentPassword,new_pass:newPassword,renew_pass:renewPassword},
    dataType: "json",
    success: function(result) {
      console.log(result);
      if(result.status=='success'){
        $('#error').hide();
        $('#success').show();
        $('#success').html(result.data);


      }else{
        $('#error').show();
        $('#success').hide();
        $('#error').html(result.data);


      }        
    }
    });

   });


    $("#btn_update").on('click',function(){  
       // alert("This paragraph was clicked.");  

       var btn_Uname = $('#btn_Uname').val();
       var btn_Email = $('#btn_Email').val();
       var btn_Mobile =$('#btn_Mobile').val();
       var btn_City =$('#btn_City').val();

       
       $.ajax({
    type: "POST",
    url: "http://localhost/codeigniter/Register/EditProfile",
    data: {username:btn_Uname,email:btn_Email,mobile:btn_Mobile,city:btn_City},
    dataType: "json",
    success: function(result) {
      console.log(result);
      if(result.status=='success'){
        $('#edit_error').hide();
        $('#edit_success').show();
        $('#edit_success').html(result.data);


      }else{
        $('#edit_error').show();
        $('#edit_success').hide();
        $('#edit_error').html(result.data);


      }        
    }
    });

    });     
</script>


<script>
      // select the file input (using a id would be faster)
      $('#imageUploadInputField').change(function() { 
        var imageUploadInputField = $('#imageUploadInputField').val();

      //($('#imageUploadInputField').length);

      alert('sohit');

          // select the form and submit
          //$('#imageUploadForm').ajaxForm(options) 

          // if($('#imageUploadInputField').val() == '')  
          //  {  
          //       //alert("Please Select the File");  
          //  }  
          //  else  
          //  {  
                $.ajax({  
                     type:"POST",  
                     url:"http://localhost/codeigniter/Register/UploadImage",   
                     //base_url() = http://localhost/tutorial/codeigniter  
                     data:{image:imageUploadInputField }, 
                     dataType: "json", 
                     success: function(result) {
                      console.log(result);
                      // if(result.status=='success'){
                      //   $('#error_edit').hide();
                      //   $('#error_edit').show();
                      //   $('#error_edit').html(result.data);


                      // }else{
                      //   $('#error_edit').show();
                      //   $('#error_edit').hide();
                      //   $('#error_edit').html(result.data);


                      // }        
                    }
                  
                });  
          // } 
      });


     

   </script>

<?php include 'footer.php'; ?>
