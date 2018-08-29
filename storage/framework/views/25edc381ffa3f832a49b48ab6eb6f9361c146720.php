<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <?php if(!empty($msg)): ?>
                        <div class="alert alert-success">
                            <?php echo e($msg); ?>    
                        </div>
                    <?php endif; ?>
                    <?php if($role == config('constants.ROLE_SUPER_ADMIN')): ?>
                        <form class="form-horizontal" method="POST" action="<?php echo e(action('SuperAdminController@updateViewer')); ?>">
                    <?php elseif($role == config('constants.ROLE_ADMIN')): ?>
                        <form class="form-horizontal" method="POST" action="<?php echo e(action('AdminController@updateViewer')); ?>">
                    <?php elseif($role == config('constants.ROLE_MANAGER')): ?>
                        <form class="form-horizontal" method="POST" action="<?php echo e(action('ManagerController@updateViewer')); ?>">
                    <?php endif; ?>    
                        <?php echo e(csrf_field()); ?>

                        <input name="_method" type="hidden" value="PATCH">
                        <input name="viewerId" type="hidden" value="<?php echo e($viewer->user->id); ?>">
                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e($viewer->name); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e($viewer->email); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Role</label>

                            <div class="col-md-6">
                                <input id="role" type="text" class="form-control" name="role" value="<?php echo e(config('constants.ROLE_VIEWER')); ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>