<tbody>
    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="table-active">
            <td><?php echo e($book->title); ?></td>
            <td>Lorem ipsum dolom marchum hucum dolom..</td>
            <td>Harun Nur Rasyid</td>
            <td><?php echo e($book->stock); ?> Buah</td>
            <td>Rp.<?php echo e(number_format($book->price,2)); ?></td>
            <td><?php echo e($book->created_at); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>