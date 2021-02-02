<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin-master','data' => []]); ?>
<?php $component->withName('admin-master'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->startSection('content'); ?>

        <div class="row">
            <div class="col-md-6">

                <h2>Perfil do Usuário</h2>

                <div class="mb-4" style="margin-top: -18px;">
                    <?php if($user->userHasRole('Admin')): ?>
                    <p><small>Cargo atual: Admin</small></p>
                    <?php elseif($user->userHasRole('Editor')): ?>
                    <p><small>Cargo atual: Editor</small></p>
                    <?php else: ?>
                    <p><small>Cargo atual: Leitor</small></p>
                    <?php endif; ?>
                </div>

                <form method="post" action="<?php echo e(route('user.profile.update', $user)); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                    <div class="">
                        <img src="<?php echo e($user->avatar); ?>" alt="Imagem de Perfil" class="img-thumbnail rounded mb-2" style="height: 200px;">
                    </div>

                    <div class="form-group">
                        <input type="file" name="avatar" >
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" 
                               name="username" 
                               class="form-control" 
                               id="username"
                               value="<?php echo e($user->username); ?>">

                        <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div> 

                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" 
                               name="name" 
                               class="form-control" 
                               id="name"
                               value="<?php echo e($user->name); ?>">

                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div> 

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" 
                               name="email" 
                               class="form-control" 
                               id="email"
                               value="<?php echo e($user->email); ?>">

                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div> 

                    <div class="">
                        <div class="form-group mt-5">
                            <label for="password">Senha</label>
                            <input type="password" 
                                name="password" 
                                class="form-control" 
                                id="password">

                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div> 

                        <div class="form-group mb-4">
                            <label for="password-confirmation">Confirmar senha</label>
                            <input type="password" 
                                name="password-confirmation" 
                                class="form-control" 
                                id="password">

                            <?php $__errorArgs = ['password-confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>      
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar</button>

                </form>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">

            <h2 class="mb-4">Cargo</h2>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody> 
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                   
                        <tr>
                            <td><input type="checkbox" onclick="return false;"
                            <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($user_role->label == $role->label): ?>
                                    checked
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                            
                            ></td>

                            <td><?php echo e($role->id); ?></td>
                            <td><?php echo e($role->name); ?></td>

                            <td>
                                <form action="<?php echo e(route('user.role.attach', $user)); ?>" method="post">
                                <?php echo method_field('PUT'); ?>
                                <?php echo csrf_field(); ?>
                                    <input type="hidden" name="role" value="<?php echo e($role->id); ?>">
                                    <button 
                                    type="submit" 
                                    class="btn btn-primary"

                                    <?php if($user->roles->contains($role)): ?>
                                        disabled
                                    <?php endif; ?>

                                    >Add</button>
                                </form>
                            </td>

                            <td>
                                <form action="<?php echo e(route('user.role.detach', $user)); ?>" method="post">
                                <?php echo method_field('PUT'); ?>
                                <?php echo csrf_field(); ?>
                                    <input type="hidden" name="role" value="<?php echo e($role->id); ?>">
                                    <button 
                                    type="submit" 
                                    class="btn btn-danger"
                                    
                                    <?php if(!$user->roles->contains($role)): ?>
                                        disabled
                                    <?php endif; ?>

                                    >Remove</button>
                                </form>
                            </td>
                            
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

                <!-- <button type="submit" class="btn btn-primary mb-5">Confirmar</button> -->

            </div>
        </div>

    <?php $__env->stopSection(); ?>
 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH C:\Users\lucas\Documents\rep\Laravel\Access\resources\views/admin/profile.blade.php ENDPATH**/ ?>