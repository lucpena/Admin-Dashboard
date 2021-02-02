<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin-master','data' => []]); ?>
<?php $component->withName('admin-master'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->startSection('content'); ?>

        <?php if(auth()->user()->userHasRole('Admin')): ?>
            <h1 class="h3 mb-4 text-gray-800">SAMPLE TEXT ADMIN</h1>
        <?php endif; ?>
        <?php if(auth()->user()->userHasRole('Editor')): ?>
            <h1 class="h3 mb-4 text-gray-800">SAMPLE TEXT EDITOR</h1>
        <?php endif; ?>
        <?php if(auth()->user()->userHasRole('Leitor')): ?>
            <h1 class="h3 mb-4 text-gray-800">SAMPLE TEXT LEITOR</h1>
        <?php endif; ?>

    <?php $__env->stopSection(); ?>
 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH C:\Users\lucas\Documents\rep\Laravel\Access\resources\views/admin/index.blade.php ENDPATH**/ ?>