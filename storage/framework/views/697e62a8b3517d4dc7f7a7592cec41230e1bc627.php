<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin-master','data' => []]); ?>
<?php $component->withName('admin-master'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->startSection('content'); ?>

        <h2>Edit Role</h2>

        <?php if(session('user-deleted')): ?>
        <div class="alert alert-danger"><?php echo e(session('role-updated')); ?></div>
        <?php endif; ?> 

        <div class="row">
            <div class="col-md-4">

                <form action="<?php echo e(route('roles.update', $role->id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name" value="<?php echo e($role->name); ?>">
                        <button class="btn btn-primary mt-2">Update</button>
                    </div>
                </form>
            </div>

        <?php if($permissions->isNotEmpty()): ?>
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Label</th>
                                <th>Add</th>
                                <th>Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>           
                                <tr>
                                    <td><input type="checkbox" onclick="return false;"
                                    <?php $__currentLoopData = $role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role_permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($role_permission->label == $permission->label): ?>
                                            checked
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                            
                                    ></td>

                                    <td><?php echo e($permission->id); ?></td>
                                    <td><?php echo e($permission->name); ?></td>
                                    <td><?php echo e($permission->label); ?></td>
                                    
                                    <td> <!--  route('roles.permission.attach', $role)  -->
                                        <form method="post" action="<?php echo e(route('roles.permission.attach', $role)); ?>">
                                        <?php echo method_field("PUT"); ?>
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="permission" value="<?php echo e($permission->id); ?>">
                                        <button 
                                        type="submit" 
                                        class="btn btn-primary"

                                        <?php if($role->permissions->contains($permission)): ?>
                                            disabled
                                        <?php endif; ?>

                                        >Add</button>
                                    </td>

                                    <td> 
                                        <form method="post" action="<?php echo e(route('roles.permission.detach', $role)); ?>">
                                        <?php echo method_field("PUT"); ?>
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="permission" value="<?php echo e($permission->id); ?>">
                                        <button 
                                        type="submit" 
                                        class="btn btn-danger"

                                        <?php if(!$role->permissions->contains($permission)): ?>
                                            disabled
                                        <?php endif; ?>

                                        >Remove</button>
                                    </td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    <?php $__env->stopSection(); ?>
 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH C:\Users\lucas\Documents\rep\Laravel\Access\resources\views/admin/roles/edit.blade.php ENDPATH**/ ?>