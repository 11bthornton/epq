 
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="panel panel-default shadow">
        <div class="panel-heading">Create your poll:</div>
        <div class="panel-body">
            <form action="/poll/create/" method="POST">
               <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <textarea name="body" id="body" class="textarea" placeholder="Ask your question" required></textarea>
                </div>
                <hr>
                <h4>Add some options</h4> 
                <div class="form-group">
                    <input type="text" class="form-control" name="options[]" placeholder="Enter new option" required>
                </div>
        <div class="input-group control-group after-add-more">
          <input type="text" name="options[]" class="form-control" placeholder="Enter new option" required>
          <div class="input-group-btn"> 
            <button class="btn btn-default add-more" type="button">Add</button>
          </div>
        </div>
        

        <div class="copy hide">
          <div class="control-group input-group" style="margin-top:10px">
            <input type="text" name="options[]" class="form-control" placeholder="Enter Name Here">
            <div class="input-group-btn"> 
              <button class="btn btn-default remove" type="button">Remove</button>
            </div>
          </div>
        </div>
        <hr>
           <button class="btn btn-primary" type="submit">Create Poll</button>
            </form>
        </div>
    </div>
</div> 
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script type="text/javascript">


    $(document).ready(function() {


      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });


      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });


    });


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>