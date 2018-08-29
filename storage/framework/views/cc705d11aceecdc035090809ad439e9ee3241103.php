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
                    <ul class="nav nav-tabs">
                        <li><a href="#admin">Admin</a></li>
                        <li><a href="#manager">Manager</a></li>
                        <li><a href="#viewer">Viewer</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="admin" class="tab-pane fade">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $admin)): ?>
                                        <tr>
                                            <td><?php echo e($admin->name); ?></td>
                                            <td><?php echo e($admin->email); ?></td>
                                            <td><?php echo e($admin->address); ?></td>
                                            <td>  
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', $admin)): ?>
                                                   <a href="#" title="Add"> <span class="glyphicon glyphicon-plus"></span></a>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $admin)): ?>
                                                    <a href="#" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $admin)): ?>
                                                    <a href="#" title="Delete"><span class="glyphicon glyphicon-remove"></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>   
                        </div>
                        <div id="manager" class="tab-pane fade">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $manager)): ?>
                                        <tr>
                                            <td><?php echo e($manager->name); ?></td>
                                            <td><?php echo e($manager->email); ?></td>
                                            <td><?php echo e($manager->address); ?></td>
                                            <td>  
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', $manager)): ?>
                                                   <a href="#" title="Add"> <span class="glyphicon glyphicon-plus"></span></a>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $manager)): ?>
                                                    <a href="#" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $manager)): ?>
                                                    <a href="#" title="Delete"><span class="glyphicon glyphicon-remove"></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>    
                        </div>
                        <div id="viewer" class="tab-pane fade">
                            <div class="create-btn"> 
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Models\Viewer::class)): ?>
                                    <?php if($role == config('constants.ROLE_SUPER_ADMIN')): ?>
                                        <a href="<?php echo e(url('super-admin/createViewer')); ?>" title="Add"><button type="button" class="btn btn-primary btn-sm">Create <span class="glyphicon glyphicon-plus"></span></button></a>
                                    <?php elseif($role == config('constants.ROLE_ADMIN')): ?>
                                        <a href="<?php echo e(url('admin/createViewer')); ?>" title="Add"><button type="button" class="btn btn-primary btn-sm">Create <span class="glyphicon glyphicon-plus"></span></button></a>
                                    <?php elseif($role == config('constants.ROLE_MANAGER')): ?>    
                                        <a href="<?php echo e(url('manager/createViewer')); ?>" title="Add"><button type="button" class="btn btn-primary btn-sm">Create <span class="glyphicon glyphicon-plus"></span></button></a>
                                    <?php endif; ?>   
                                <?php endif; ?>
                            </div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $viewers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $viewer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $viewer)): ?>
                                        <tr>
                                            <td><?php echo e($viewer->name); ?></td>
                                            <td><?php echo e($viewer->email); ?></td>
                                            <td><?php echo e($viewer->address); ?></td>
                                            <td>  
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $viewer)): ?>
                                                <?php if($role == config('constants.ROLE_SUPER_ADMIN')): ?>
                                                    <a href="<?php echo e(url('super-admin/editViewer/'.$viewer->id)); ?>" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
                                                <?php elseif($role == config('constants.ROLE_ADMIN')): ?>
                                                    <a href="<?php echo e(url('admin/editViewer/'.$viewer->id)); ?>" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
                                                <?php elseif($role == config('constants.ROLE_MANAGER')): ?>    
                                                    <a href="<?php echo e(url('manager/editViewer/'.$viewer->id)); ?>" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
                                                <?php endif; ?>  
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $viewer)): ?>
                                                    <?php if($role == config('constants.ROLE_SUPER_ADMIN')): ?>
                                                        <form action="<?php echo e(action('SuperAdminController@deleteViewer', $viewer->user->id)); ?>" method="post">
                                                    <?php elseif($role == config('constants.ROLE_ADMIN')): ?>
                                                        <form action="<?php echo e(action('AdminController@deleteViewer', $viewer->user->id)); ?>" method="post">    
                                                    <?php endif; ?>    
                                                        <?php echo e(csrf_field()); ?>

                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button type="submit"><span class="glyphicon glyphicon-remove"></button>
                                                    </form>
                                                <?php endif; ?> 
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>    
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>