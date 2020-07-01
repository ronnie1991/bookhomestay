<?php
?>

<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('user.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

   

<body>
    <div id="page" class="theia-exception">
       <?php echo $__env->make('user.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <main>
            <div class="filter-bar">
                <div class="contents">
                    <div class="filter search-destination search-select">
                        <div class="filter-btn">
                            <input type="text" id="destination" class="search-select-input form-control required" value="<?php echo e(session('destinationName')); ?>" placeholder="Destination" readonly>
                            <input type="hidden" id="destinationId" name="destination" value="<?php echo e(session('destination')); ?>">
                        </div>
                        <div class="filter-content search-select-box">
                            <input type="text" id="searchDestinationInput" class="search-destination-input" placeholder="Search...">
                            <div class="select-box">
                                <?php $__currentLoopData = $placeforselect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pselect): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="select-item" data-val="<?php echo e($pselect->id); ?>" selected="<?php if(session('destination')==$pselect->id){ echo 'selected'; }else{ echo ''; } ?>"><?php echo e($pselect->place); ?></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="filter-actions">
                                <a href="#" class="cancel-fitler hide-filters-btn">Close</a>
                            </div>
                        </div>
                    </div>
                    <div class="filter search-dates">
                        <div id="dateRangeInput" class="filter-btn" data-checkin-date="<?php echo e(session('checkIn')); ?>" data-checkout-date="<?php echo e(session('checkOut')); ?>"><span></span></div>
                    </div>
                    <div class="filter search-guests">
                        <div class="search-select">
                            <div class="no-of-guests search-select-input">
                                <input type="hidden" id="noOfGuests" name="no_of_guests" value="<?php if(session('totalGuests')!=''){ echo session('totalGuests'); }else{ echo '1'; } ?>">
                                <div class="filter-btn">
                                    <span class="no"><?php if(session('totalGuests')!=''){ echo session('totalGuests'); }else{ echo '1'; } ?></span>
                                    <span>Guests</span>
                                </div>
                            </div>
                            <div class="filter-content search-select-box">
                                <div class="guest-type adults">
                                    <div class="title">Adults</div>
                                    <div class="number-selector">
                                        <input type="hidden" id="noOfAdults" name="adults" value="<?php if(session('totalAdults')!=''){ echo session('totalAdults'); }else{ echo '1'; } ?>">
                                        <span class="selector-btn decrease-btn">-</span>
                                        <span class="number"><?php if(session('totalAdults')!=''){ echo session('totalAdults'); }else{ echo '1'; } ?></span>
                                        <span class="selector-btn increase-btn">+</span>
                                    </div>
                                </div>
                                <div class="guest-type childrens">
                                    <div class="title">Childrens</div>
                                    <div class="number-selector">
                                        <input type="hidden" id="noOfChildrens" name="child" value="<?php if(session('totalAdults')!=''){ echo session('totalAdults'); }else{ echo '0'; } ?>">
                                        <span class="selector-btn decrease-btn">-</span>
                                        <span class="number"><?php if(session('totalChilds')!=''){ echo session('totalChilds'); }else{ echo '0'; } ?></span>
                                        <span class="selector-btn increase-btn">+</span>
                                    </div>
                                </div>
                                <div class="filter-actions">
                                    <a href="#" class="cancel-fitler hide-filters-btn">Close</a>
                                    <a href="#" id="filterGuestsNoBtn" class="filter-save-btn">Save</a>
                                </div>
                            </div>
                        </div>    
                    </div>
                    <div class="filter price-filter">
                        <div class="filter-btn">Price</div>
                        <div class="filter-content">
                            <div class="filters">
                                <div class="filter-group">
                                    <div class="filter-list">
                                        <ul>
                                            <li class="price <?php if(session('minPrice')=='1001'){ echo 'active'; } ?>"><span class="min-price" data-min="500">Rs. 500</span> <span>–</span> <span class="max-price" data-max="1000">Rs. 1000</span></li>
                                            <li class="price <?php if(session('minPrice')=='1001'){ echo 'active'; } ?>"><span class="min-price" data-min="1001">Rs. 1001</span> <span>–</span> <span class="max-price" data-max="1500">Rs. 1500</span></li>
                                            <li class="price <?php if(session('minPrice')=='1501'){ echo 'active'; } ?>"><span class="min-price" data-min="1501">Rs. 1501</span> <span>–</span> <span class="max-price" data-max="2000">Rs. 2000</span></li>
                                            <li class="price <?php if(session('minPrice')=='2001'){ echo 'active'; } ?>"><span class="min-price" data-min="2001">Rs. 2001</span> <span>–</span> <span class="max-price" data-max="2500">Rs. 2500</span></li>
                                            <li class="price <?php if(session('minPrice')=='2501'){ echo 'active'; } ?>"><span class="min-price" data-min="2501">Rs. 2501</span> <span>–</span> <span class="max-price" data-max="3000">Rs. 3000</span></li>
                                            <li class="price <?php if(session('minPrice')=='3001'){ echo 'active'; } ?>"><span class="min-price" data-min="3001">Rs. 3001</span> <span>–</span> <span class="max-price" data-max="3500">Rs. 3500</span></li>
                                            <li class="price <?php if(session('minPrice')=='3501'){ echo 'active'; } ?>"><span class="min-price" data-min="3501">Rs. 3501</span> <span>–</span> <span class="max-price" data-max="4000">Rs. 4000</span></li>
                                            <li class="price <?php if(session('minPrice')=='4001'){ echo 'active'; } ?>"><span class="min-price" data-min="4001">Rs. 4001</span> <span>–</span> <span class="max-price" data-max="4500">Rs. 4500</span></li>
                                            <li class="price <?php if(session('minPrice')=='4501'){ echo 'active'; } ?>"><span class="min-price" data-min="4501">Rs. 4501</span> <span>–</span> <span class="max-price" data-max="5000">Rs. 5000</span></li>
                                            <li class="price <?php if(session('minPrice')=='5001'){ echo 'active'; } ?>"><span class="min-price" data-min="5001">Rs. 5001</span> <span>–</span> <span class="max-price" data-max="10000">Rs. 10000</span></li>
                                        </ul>
                                    </div>
                                    <div class="filter-actions">
                                        <a href="#" class="cancel-fitler hide-filters-btn">Close</a>
                                        <a href="#" class="show-hide-btn show-btn"><span>Show all</span> <i class="fa fa-chevron-down"></i></a>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                    <div class="filter more-filters">
                        <div class="filter-btn">More Filters <span id="noOfSelectedFilters"></span></div>
                        <div class="filter-content">
                            <div class="filters">
                                <div class="filter-group">
                                    <h4>Amenities</h4>
                                    <div class="filter-list amenities">
                                        <ul>
                                            <?php $__currentLoopData = $amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $checked = '';
                                                if($selectedAmenities != ''){
                                                if (is_array($selectedAmenities) || is_object($selectedAmenities))
                                                    if((array_search($amenity->id, $selectedAmenities)) !== false) {
                                                        $checked = 'checked="checked"';
                                                    }
                                                }    
                                            ?>
                                            <li><input type="checkbox" id="amenity_<?php echo e($amenity->id); ?>" class="amenity" value="<?php echo e($amenity->id); ?>" <?php echo e($checked); ?>> <span><label for="amenity_<?php echo e($amenity->id); ?>"><?php echo e($amenity->aminities); ?></label></span></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                    <?php if(count($amenities) > 6): ?>
                                    <a href="#" class="show-hide-btn show-btn"><span>Show all</span> <i class="fa fa-chevron-down"></i></a>
                                    <?php endif; ?>
                                </div>
                                <div class="filter-group">
                                    <h4>Activities</h4>
                                    <div class="filter-list activities">
                                        <ul>
                                            <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $checked = '';
                                                if($selectedActivities != ''){
                                                    if((array_search($activity->id, $selectedActivities)) !== false) {
                                                        $checked = 'checked="checked"';
                                                    }
                                                }
                                            ?>
                                            <li><input type="checkbox" id="activity_<?php echo e($activity->id); ?>" class="activity" value="<?php echo e($activity->id); ?>" <?php echo e($checked); ?>> <span><label for="activity_<?php echo e($activity->id); ?>"><?php echo e($activity->name); ?></label></span></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                    <?php if(count($activities) > 6): ?>
                                    <a href="#" class="show-hide-btn show-btn"><span>Show all</span> <i class="fa fa-chevron-down"></i></a>
                                    <?php endif; ?>
                                </div>
                                <div class="filter-group">
                                    <h4>Personal Preferable</h4>
                                    <div class="filter-list preferables">
                                        <ul>
                                            <?php $__currentLoopData = $personal_preferables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $preferable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $checked = '';
                                                if($selectedPreferables != ''){
                                                    if((array_search($preferable->id, $selectedPreferables)) !== false) {
                                                        $checked = 'checked="checked"';
                                                    }
                                                }
                                            ?>
                                            <li><input type="checkbox" id="preferable_<?php echo e($preferable->id); ?>" class="preferable" value="<?php echo e($preferable->id); ?>" <?php echo e($checked); ?>> <span><label for="preferable_<?php echo e($preferable->id); ?>"><?php echo e($preferable->name); ?></label></span></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                    <?php if(count($personal_preferables) > 6): ?>
                                    <a href="#" class="show-hide-btn show-btn"><span>Show all</span> <i class="fa fa-chevron-down"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="filter-actions">
                                <a href="#" class="cancel-fitler hide-filters-btn">Close</a>
                                <a href="#" id="showStaysBtn" class="btn_1 btn-rounded">Show Stays</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overlay"></div>
            </div>
            <div class="container-fluid">
                <div class="clearfix">
                    <div class="search-grid">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-7">
                                <div class="row" id="searchResults">
                                </div>    
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-5">
                                <div id="map" class="show-map" style="width:100%;height:800px;position:relative;display:block;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
   </div>

    </main>

    <?php echo $__env->make('user.footer_content', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>

    <div id="toTop"></div>

    <!-- JavaScript Libraries -->

    <?php echo $__env->make('user.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDT_LmCgQrsLKDjs3zQGU2ZWHgVr6j9Npg"></script>
   
</body>



</html>