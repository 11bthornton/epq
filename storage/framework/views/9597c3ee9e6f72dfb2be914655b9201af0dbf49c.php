 
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="panel panel-default shadow">
        <div class="panel-heading"><h1><?php echo e($question->body); ?></h1></div>
        <div class="panel-body">
           <div class="row">
           <div class="col-md-4">
            <table class="table table-bordered">
                <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <h3><?php echo e($option->body); ?></h3>
                        <h3><?php echo e($option->votes); ?> votes.</h3>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
               </div>
               <div class="col-md-8">
               </div>
            </div>
            <hr>
            <h3>Demographic Analysis:</h3>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>