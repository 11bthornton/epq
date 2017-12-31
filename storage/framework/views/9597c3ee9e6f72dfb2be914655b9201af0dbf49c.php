 
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="panel panel-default shadow">
        <div class="panel-heading"><h1><?php echo e($question->body); ?></h1></div>
        <div class="panel-body">
            <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <h3><?php echo e($option->body); ?> - <?php echo e($option->percentage); ?>%</h3>
            <h5><?php echo e($option->votes); ?> votes</h5>
            <div style="width: <?php echo e($option->percentage); ?>%;" class="percentage">
                <h4></h4>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <hr>
            <h3>Demographic Analysis</h3>
            <h5>By gender:</h5>
            <table class="table table-default">
                <thead>
                    <th scope="col">Option</th>
                    <th scope="col">Male Votes</th>
                    <th scope="col">Female Votes</th>
                    <th scope="col">Other Votes</th>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($option->body); ?></td>
                        <td><?php echo e($option->MaleVotes); ?></td>
                        <td><?php echo e($option->FemaleVotes); ?></td>
                        <td><?php echo e($option->OtherVotes); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <h5>By age</h5>
            <table class="table table-default">
                <thead>
                    <th scope="col">Option</th>
                    <th scope="col">Under 18s</th>
                    <th scope="col">18 - 30</th>
                    <th scope="col">30 - 50</th>
                    <th scope="col">50 - 65</th>
                    <th scope="col">Over 65</th>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($option->body); ?></td>
                        <td><?php echo e($option->range1); ?></td>
                        <td><?php echo e($option->range2); ?></td>
                        <td><?php echo e($option->range3); ?></td>
                        <td><?php echo e($option->range4); ?></td>
                        <td><?php echo e($option->range5); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>