<footer>
        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-5 col-md-12 p-r-5">
                    <p style="font-size: 14px;text-align: justify;margin-top: 22px;">Always the best holiday for you at <a href="http://bookhomestays.in/">BOOKHOMESTAYS.IN</a></p>
                    <div class="follow_us">
                        <ul>
                            <li>Follow us</li>
                            <li><a href="#0"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#0"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#0"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 ml-lg-auto">
                    <h5>Useful links</h5>
                    <ul class="links">
                        
                        <li>
                            <?php if(session('session_id')): ?>
                                <a href="<?php echo e(url('user/logout')); ?>">Log Out</a>
                            <?php else: ?> 
                                <a href="<?php echo e(url('customer_signup')); ?>"> Register / Login</a>
                                
                            <?php endif; ?>
                        </li>
                        
                        <li><a href="<?php echo e(url('terms_and_conditions')); ?>">Terms &amp; Conditions</a></li>
                        <li><a href="<?php echo e(url('cancellation_policy')); ?>">Cancellation Policy</a></li>

                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>Contact with Us</h5>
                    <ul class="contacts">
                        <li><a href="#"><i class="la la-phone-square"></i> + 91 99 3382 0006</a></li>
                        <li><a href="#"><i class="la la-envelope-o"></i> info@bookhomestays.in </a></li>
                    </ul>
                    <div id="newsletter">
                        <h6>Newsletter</h6>
                        <div id="message-newsletter"></div>
                        <form action="<?php echo e(url('user/news')); ?>" class="form-horizontal" method="post">
						<?php echo csrf_field(); ?>
                            <div class="form-group">
                                <input type="email" name="email" id="email_newsletter" class="form-control" placeholder="Your email">
                                <input type="submit" value="Submit" id="submit-newsletter">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-lg-6">
                    <ul id="additional_links">
                        <li><a href="<?php echo e(url('terms_and_conditions')); ?>">Terms and conditions</a></li>
                        <li><span>@ 2019 BookHomestays</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>