<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin-master','data' => []]); ?>
<?php $component->withName('admin-master'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->startSection('content'); ?>

        <h2>Users</h2>

        <?php if(session('user-deleted')): ?>
        <div class="alert alert-danger"><?php echo e(session('user-deleted')); ?></div>
        <?php endif; ?>  
        
        <div class="card shadow mb-4">
    
        <div class="card-header py-4">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Avatar</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        

                        <tr>
                            <td><?php echo e($user->id); ?></td>
                            <td><?php echo e($user->username); ?></td>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            

                            <!-- ROLE -->
                            <?php if($user->userHasRole('Admin')): ?>
                            <td>Admin</td>
                            <?php elseif($user->userHasRole('Editor')): ?>
                            <td>Editor</td>
                            <?php else: ?>
                            <td>Leitor</td>
                            <?php endif; ?>
                            <!-- END ROLE -->

                            <!-- ACTION -->
                            <?php if(strpos($user->avatar, 'image')): ?>
                                <td>
                                    <img class="img-profile rounded-circle" 
                                    src="<?php echo e($user->avatar); ?>"
                                    style="height: 35px;">
                                </td>
                            <?php else: ?>
                                <td></td>
                            <?php endif; ?>

                            <?php if($user->id != auth()->user()->id): ?>
                                <td>
                                    <form method="post" action="<?php echo e(route('user.destroy', $user->id)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            <?php else: ?>
                                <td></td>
                            <?php endif; ?>
                            <!-- END ACTION -->
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
       </div> 

    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('scripts'); ?>
        <!-- Page level custom scripts -->
        <script src="<?php echo e(secure_asset('vendor/datatables/jquery.dataTables.js')); ?>"></script>
        <script src="<?php echo e(secure_asset('vendor/datatables/dataTables.bootstrap4.js')); ?>"></script>
        <script src="<?php echo e(secure_asset('js/demo/datatables-demo.js')); ?>"></script> 
    <?php $__env->stopSection(); ?>
 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH C:\Users\lucas\Documents\rep\Laravel\Access\resources\views/admin/users/index.blade.php ENDPATH**/ ?>