<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary"
                href="<?php echo e(route('logout')); ?>" 
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        </div>

        <form id="logout-form" 
        action="<?php echo e(route('logout')); ?>" 
        method="POST" 
        class="d-none">
        <?php echo csrf_field(); ?>
        </form>

        </div>
    </div>
  </div><?php /**PATH C:\Users\lucas\Documents\rep\Laravel\Access\resources\views/components/logout-modal-master.blade.php ENDPATH**/ ?>