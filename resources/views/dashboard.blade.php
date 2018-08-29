@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="dashboard">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
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
                                    @foreach ($admins as $admin)
                                        @can('view', $admin)
                                        <tr>
                                            <td>{{$admin->name}}</td>
                                            <td>{{$admin->email}}</td>
                                            <td>{{$admin->address}}</td>
                                            <td>  
                                                @can('create', $admin)
                                                   <a href="#" title="Add"> <span class="glyphicon glyphicon-plus"></span></a>
                                                @endcan
                                                @can('update', $admin)
                                                    <a href="#" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
                                                @endcan
                                                @can('delete', $admin)
                                                    <a href="#" title="Delete"><span class="glyphicon glyphicon-remove"></a>
                                                @endcan
                                            </td>
                                        </tr>
                                        @endcan
                                    @endforeach
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
                                    @foreach ($managers as $manager)
                                        @can('view', $manager)
                                        <tr>
                                            <td>{{$manager->name}}</td>
                                            <td>{{$manager->email}}</td>
                                            <td>{{$manager->address}}</td>
                                            <td>  
                                                @can('create', $manager)
                                                   <a href="#" title="Add"> <span class="glyphicon glyphicon-plus"></span></a>
                                                @endcan
                                                @can('update', $manager)
                                                    <a href="#" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
                                                @endcan
                                                @can('delete', $manager)
                                                    <a href="#" title="Delete"><span class="glyphicon glyphicon-remove"></a>
                                                @endcan
                                            </td>
                                        </tr>
                                        @endcan
                                    @endforeach
                                </tbody>
                            </table>    
                        </div>
                        <div id="viewer" class="tab-pane fade">
                            <div class="create-btn"> 
                                @can('create', App\Models\Viewer::class)
                                    @if($role == config('constants.ROLE_SUPER_ADMIN'))
                                        <a href="{{ url('super-admin/createViewer') }}" title="Add"><button type="button" class="btn btn-primary btn-sm">Create <span class="glyphicon glyphicon-plus"></span></button></a>
                                    @elseif($role == config('constants.ROLE_ADMIN'))
                                        <a href="{{ url('admin/createViewer') }}" title="Add"><button type="button" class="btn btn-primary btn-sm">Create <span class="glyphicon glyphicon-plus"></span></button></a>
                                    @elseif($role == config('constants.ROLE_MANAGER'))    
                                        <a href="{{ url('manager/createViewer') }}" title="Add"><button type="button" class="btn btn-primary btn-sm">Create <span class="glyphicon glyphicon-plus"></span></button></a>
                                    @endif   
                                @endcan
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
                                    @foreach ($viewers as $viewer)
                                        @can('view', $viewer)
                                        <tr>
                                            <td>{{$viewer->name}}</td>
                                            <td>{{$viewer->email}}</td>
                                            <td>{{$viewer->address}}</td>
                                            <td>  
                                                @can('update', $viewer)
                                                @if($role == config('constants.ROLE_SUPER_ADMIN'))
                                                    <a href="{{url('super-admin/editViewer/'.$viewer->id)}}" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
                                                @elseif($role == config('constants.ROLE_ADMIN'))
                                                    <a href="{{url('admin/editViewer/'.$viewer->id)}}" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
                                                @elseif($role == config('constants.ROLE_MANAGER'))    
                                                    <a href="{{url('manager/editViewer/'.$viewer->id)}}" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
                                                @endif  
                                                @endcan
                                                @can('delete', $viewer)
                                                    @if($role == config('constants.ROLE_SUPER_ADMIN'))
                                                        <form action="{{action('SuperAdminController@deleteViewer', $viewer->user->id)}}" method="post">
                                                    @elseif($role == config('constants.ROLE_ADMIN'))
                                                        <form action="{{action('AdminController@deleteViewer', $viewer->user->id)}}" method="post">    
                                                    @endif    
                                                        {{csrf_field()}}
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button type="submit"><span class="glyphicon glyphicon-remove"></button>
                                                    </form>
                                                @endcan 
                                            </td>
                                        </tr>
                                        @endcan
                                    @endforeach
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
@endsection
