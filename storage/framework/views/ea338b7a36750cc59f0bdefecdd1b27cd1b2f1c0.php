<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('user.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body>
    <div id="page" class="theia-exception">
        <?php echo $__env->make('user.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <main style="margin-top:80px;">
            <div class="container terms-and-conditions" style="margin-top: 156px;margin-bottom: 69px;">
                <h2>Cancellation Policy</h2>
                <p>For any reservation booked through bookhomestays.in, All requests for cancellations of confirmed bookings have to be received from the person who made the booking in writing or email at our office in Bengaluru.</p>
                <ul>
                    <li>15% of tariff for cancellation prior to three weeks before chick-in date.</li>
                    <li>50% of tariff for cancellation less than three weeks and prior to one week before check-in date.
                    <li>No refund or cancellation less one week before check-in date.
                    <li>No refund for cancellation of booking between 15 December 2019 to 2 January 2020. Once confirmation voucher is raised and payment is received.
                </ul>
                <p>* bookhomestays.in also reserve the right under any circumstances to cancel your Booking or travel arrangements by assigning reasons to you (eg. Bad weather etc.).</p>
                <p>* In all circumstances, however, our liability shall be limited to refunding to you the price we charged as tour fees.</p>
                <p>* Please note cancellation policy is subject to change. It depends on the Homestays and Resort policy. In peak season, some may charge 100% cancellation.</p>
            </div>    
        </main>
   </div>

    

    <?php echo $__env->make('user.footer_content', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>

    <div id="toTop"></div>

    <!-- JavaScript Libraries -->

   <?php echo $__env->make('user.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>

</html>