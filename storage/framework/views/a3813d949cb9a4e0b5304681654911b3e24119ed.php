<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Books

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('writer-access', \Request::user()->role)): ?>
                        <small><a href="<?php echo e(route('books.create')); ?>" class="btn btn-warning btn-sm"> New Book</a></small>    
                    <?php endif; ?>
                    
                </div>

                <div class="panel-body">

                <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                
                
                <?php echo Form::open(['route' => 'books.index', 'method' => 'get', 'class' => 'form-inline']); ?>

                <div class="form-group">
                    <?php echo Form::text('search', isset($search) ? $search : null, ['class' => 'form-control']); ?>

                </div>
                    <?php echo Form::submit('Search', ['class' => 'btn btn-primary']); ?>

                <?php echo Form::close(); ?>


                

                

                    <table class="table">
                        <thead>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Page</th>
                            <th>Stock</th>
                            <th>Category</th>
                    
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('writer-access', \Auth::user()->role)): ?>
                            <th>Action</th>    
                            <?php endif; ?>
                        
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($book->title); ?></td>
                                    <td><?php echo e($book->author); ?></td>
                                    <td><?php echo e($book->page); ?></td>
                                    <td><?php echo e($book->stock); ?></td>
                                    
                                    <td>
                                    <?php $__currentLoopData = $book->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="label label-primary">
                                    <i class="fa fa-btn fa-tags">*</i>
                                    <small><?php echo e($category->name); ?></small></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('writer-access', \Auth::user()->role)): ?>
                                    <td>
                                        <?php echo Form::open(['route' => ['books.destroy', $book->id], 'method' => 'delete', 'class' => 'form-inline']); ?>

                                            <a href="<?php echo e(route('books.edit', $book->id)); ?>">Edit</a> <small>or</small>   
                                            <?php echo Form::submit('Delete', ['class' => 'btn btn-xs btn-danger']); ?>

                                        <?php echo Form::close(); ?> 
                                    </td>
                                    <?php endif; ?>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                

                    <?php echo e($books->appends(compact('search'))->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>