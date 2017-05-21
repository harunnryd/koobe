<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reader-access')): ?>
    <?php echo $__env->make($partial_view, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php else: ?>
    <?php if(auth()->guest()): ?>
        <?php echo $__env->make($partial_view, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
<?php endif; ?>
