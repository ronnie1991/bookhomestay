<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('user.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body>
    <div id="page" class="theia-exception">
       <?php echo $__env->make('user.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <main>
           

        <div class="container" style="margin-top: 156px;margin-bottom: 69px;">
            <div class="row">
              
                <div class="col-sm-12">
                 
                  
                    <?php if(session('status')): ?>                        
                        <div class="alert alert-<?php echo e(session('code')); ?> text-center">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                 
                  
               </div>
                <style type= "text/css">
                .inp {
                        border-top: none;
                        border-left: none;
                        border-right: none;
                        border-bottom: 1px solid #000000;
                        padding: 5px 15px;
                        outline: none;
                     }
                .inp:focus {
                    border-color: inherit;
                    -webkit-box-shadow: none;
                    border-bottom: 1px solid #3c8c28;
                    box-shadow: none;
                    }
                    
                    [placeholder]:focus::-webkit-input-placeholder {
                        transition: text-indent 0.4s 0.4s ease; 
                        text-indent: -100%;
                        opacity: 1;
                     }
                  
                </style>
                
                
                <div class="col-lg-5 col-md-5" style="box-shadow: 0 1px 6px 0 rgba(117,117,117,.25);">
                  <form action="<?php echo e(url('user/userLogin')); ?>" class="form-horizontal" method="post">
                          <?php echo csrf_field(); ?>
                      <div class="divider"><span>Login</span></div>
                      <div class="form-group">
                          <label>User Name*</label>
                          <input type="email" class="form-control inp" name="email" id="email"  required="required">
                      </div>
                      <div class="form-group">
                          <label>Password*</label>
                          <input type="password" class="form-control inp" name="password" id="password"  value="" required="required">
                      </div>
                      <div class="clearfix add_bottom_30">
                          <!--<div class="checkboxes float-left">
                              <label class="container_check">Remember me
                                <input type="checkbox">
                                <span class="checkmark"></span>
                              </label>
                          </div>-->
                          <div class="float-right mt-1"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>
                      </div>

                      <button class="btn_1 rounded full-width">Login</button>               
                  </form>
                </div>
                <div style="margin:50px;"></div>
                
                <div class="col-lg-5 col-md-5" style="box-shadow: 0 1px 6px 0 rgba(117,117,117,.25);">
                <form action="<?php echo e(url('user/userSignup')); ?>" class="form-horizontal" method="post" onsubmit="return validateForm()">
                  <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">	
                  <div class="divider"><span>Not a member yet ?&nbsp;&nbsp;Register Now !</span></div>
                <div class="form-group">
                    <label>Your Name*</label>
                    <input class="form-control inp" name="name" type="text" autocomplete="off"  value="<?php echo e(old('name')); ?>" required="required">                    
                </div>                
                
                <div class="form-group">
                    <label>Your Email*</label>
                    <input class="form-control inp" type="email" name="email" autocomplete="off"  value="<?php echo e(old('email')); ?>" required="required">
                </div>
                <div class="form-group">
                    <label>Create password*</label>
                    <input class="form-control inp" type="password" name="password" id="password1" required="required">
                </div>
                <div class="form-group">
                    <label>Contact Number*</label>
                    <input class="form-control inp" type="text" name="phone" id="phone" onkeyup="otp()"  pattern="[0-9]{1}[0-9]{9}" maxlength="10" oninvalid="setCustomValidity('Enter Valid Mobile Number')" required="required" onchange="try{setCustomValidity('')}catch(e){}">
                    <label class="sendotp" style="display:none; background: #00a63f;color: #fff;padding: 3px;margin-top: 7px;border-radius: 3px;" >Send OTP</label>

                </div>
                <div class="form-group otpset" style="display:none;">                   
                    <input class="form-control inp" type="text" name="otpv" id="otpv" placeholder="One Time Password" required="required">
                    <button type="button" style="margin-top: 10px;" class="btn btn-primary btn-sm" id="anotherOTP" onclick="otp()">Send Again</button>
                    <input type="hidden" id="generatedOTP">
                </div>
                <p id="vr"></p>

                <button class="btn_1 rounded full-width">Signup</button>     
                          
            </form>

                </div>
                
                
            </div>
            <!--/row-->
        </div>
        <!-- /container -->  
    </main>

    <?php echo $__env->make('user.footer_content', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>

    <div id="toTop"></div>

    <!-- JavaScript Libraries -->

   <?php echo $__env->make('user.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    <script>

      
      function otp() {       

        var phoneNumber = $("#phone").val();
        var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;

        if (filter.test(phoneNumber)) {
            if(phoneNumber.length==10){                
                var validate = true;
            } else {
                $("#vr").html('Not a valid number');
                $("#phone").css('border-color', 'red');
                $("#otpv").hide();
                $(".sendotp").hide();
                $("#anotherOTP").hide();
                var validate = false;
            }

        } else {
            $("#vr").html('Not a valid number');
            $("#phone").css('border-color', 'red');            
            $("#otpv").hide();
            var validate = false;
          }
          
           if(validate){
          $("#phone").css('border-color', 'green');
          $("#vr").html('');
          $(".sendotp").show(); 
           }
      }
      
      $(document).on('click','.sendotp',function(){ 
           var phoneNumber = $("#phone").val();
          //number is equal to 10 digit or number is not string 
          _token = $("#token").val();
          var dataString = 'phone=' + phoneNumber + '&_token=' + _token;
          
           $(".otpset").show();
           $("#otpv").show();
           $("#anotherOTP").show();
          $("#phone").css('border-color', 'green');
          $("#vr").html('');

          $.ajax({
              type: "POST",
              url: "<?php echo e(url('user/otp')); ?>",
              data: dataString,
              headers: {'X-CSRF-TOKEN': _token},
              success: function(response) {   
                $("#generatedOTP").val(response); 
              }

          });

        
		});	
      
      

      function validateForm() {
        var generatedOTP = $("#generatedOTP").val();
        var otpv = $("#otpv").val();

        if (generatedOTP == otpv) {          
          return true;
        } else {
          $("#anotherOTP").show();
          $("#otpv").css('border-color', 'red');
          $("#vr").html('Please provide valid otp');
          return false;
        }
      }
    </script>

</body>

</html>