<li><a href="<?php echo e(route('carts.show')); ?>">Cart : <i class="badge"><?php echo e($cart->sumBooks() < 1 ? '0' : $cart->sumBooks()); ?></i></a></li>