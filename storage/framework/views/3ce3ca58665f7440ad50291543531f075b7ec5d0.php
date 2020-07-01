<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('user.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body>
    <div id="page" class="theia-exception">
        <?php echo $__env->make('user.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <main> 

            
            <div id="unique" class="explor-sec margin_80_0" style="margin-top:50px;">
                    <div class="container clearfix">                        
                    <h1>Homestays at top rated places</h1>
                        <div class="row">
                             <?php $__currentLoopData = $comfort; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allComfortCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-6 col-md-3">
                                    <div class="holidayspot-list">
                                        <div class="team-block">
                                            <div class="img-sec">
											<form method="post" action="<?php echo e(url('/search_property')); ?>" name="myComforts" id="myComforts">
											<?php echo csrf_field(); ?>
											<input type="hidden" name="myComfort" id="myComfort">
											</form>
                                                <a href="<?php echo e(url('/myComfort/'.$allComfortCategory->id)); ?>" onclick="myComfort(<?php echo e($allComfortCategory->id); ?>)">
                                                    <img src="<?php echo e(asset('site_images/comfort_category')); ?>/<?php echo e($allComfortCategory->image); ?>" alt="" />
                                                </a>
                                            </div>
                                            <div class="team-info text-left">
                                                <h3><?php echo e($allComfortCategory->name); ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </div>
                            
                    </div>
            </div>            

    </div>

    </main>

    <?php echo $__env->make('user.footer_content', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>

    <div id="toTop"></div>

    <!-- JavaScript Libraries -->
	<script>
        function myFunction() {
          document.myform.submit();
        }
        function myPlace(id) {
            $("#myPlace").val(id);
            $("#myPlaces").submit();
        }

        function myHoliday(id) {
            $("#myHoliday").val(id);
            $("#myHolidays").submit();
        }

        function myComfort(id) {            
            $("#myComfort").val(id);
            $("#myComforts").submit();
        }

        function mySeason(id) {            
            $("#mySeason").val(id);
            $("#mySeasons").submit();
        }
    </script>

   <?php echo $__env->make('user.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>

</html>