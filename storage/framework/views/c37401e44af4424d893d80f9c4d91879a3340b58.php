 
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="panel panel-default shadow">
        <div class="panel-heading">
            <h1><?php echo e($poll->body); ?></h1></div>
        <div class="panel-body">
            <form action="/poll/vote" method="post">
               <?php echo e(csrf_field()); ?>

               <input type="hidden" value="<?php echo e($poll->id); ?>" name="PollID">
                <div class="funkyradio"> 
                   <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="funkyradio-default">
                        <input type="radio" name="radio" id="<?php echo e($option->body); ?>" value="<?php echo e($option->id); ?>" required>
                        <label for="<?php echo e($option->body); ?>">
                            <h3><?php echo e($option->body); ?></h3></label>
                    </div> 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    <hr>
                <div class="form-group">
                    <button class="btn btn-default" type="submit">Vote</button>
                </div>
             </form>
            </div>
        </div>
    </div>
</div> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>