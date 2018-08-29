<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="dashboard">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                   <!--  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Models\Viewer::class)): ?>
                        Viewer privillages
                    <?php endif; ?> -->
                    <br />
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $viewer)): ?>
                        Viewer privillages
                    <?php endif; ?>
                    

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>