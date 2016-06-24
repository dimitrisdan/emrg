<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Roles
                </div>

            <div class="panel-body">
                <form class="form-inline" role="form" action="{{ route('role.create') }}" method="post">
                    <div class="form-group">
                        <label for="role_name">Role</label>
                        <input type="text" class="form-control" name="role_name" id="role_name">
                    </div>
                    <div class="form-group">
                        <label for="role_display_name">Display Name</label>
                        <input type="text" class="form-control" name="role_display_name" id="role_display_name">
                    </div>
                    <div class="form-group">
                        <label for="role_description">Description</label>
                        <textarea class="form-control" name="role_description" id="role_description"></textarea>
                    </div>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    <button type="submit" class="btn btn-primary pull-right">Add Role</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-primary">
            <div class="panel-heading">
                Permissions
            </div>
            <div class="panel-body">
                <form class="form-inline" role="form" action="{{ route('permission.create') }}" method="post">
                    <div class="form-group">
                        <label for="permission_name">Permission</label>
                        <input type="text" class="form-control" name="permission_name" id="permission_name">
                    </div>
                    <div class="form-group">
                        <label for="permission_display_name">Display Name</label>
                        <input type="text" class="form-control" name="permission_display_name" id="permission_display_name">
                    </div>
                    <div class="form-group">
                        <label for="permission_description">Description</label>
                     <textarea class="form-control" name="permission_description" id="permission_description"></textarea>
                    </div>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    <button type="submit" class="btn btn-primary pull-right">Add Permission</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="row">

    <div class="col-md-6">
        <div class="panel panel-danger">
            <div class="panel-heading">Users, Roles and Permissions</div>
            <div class="panel-body">

                <div class="table-responsive" style="height:600px;overflow:auto">
                    <table class="table table-condensed">
                        <thead>
                        <tr>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Permissions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users_info as $email => $value)
                            <tr>
                                <td>{{ $email }}</td>
                                <td>{{ $value['role']}}</td>
                                <td>
                                    @foreach($value['permissions'] as $permission)
                                        <i>{{ $permission }}</i>
                                        <br>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">

        <div class="panel panel-info">
            <div class="panel-heading">Roles</div>
            <div class="panel-body">
                <div class="table-responsive" style="height:250px;overflow:auto">
                <table class="table table-condensed table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Display Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <th>{{$role->name}}</th>
                            <td>{{$role->display_name}}</td>
                            <td>{{$role->description}}</td>
                            <td>
                                <form action="{{ route('role.delete', [ 'role_id' => $role->id ]) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-link">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </button>
                                </form>
                                {{----}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>

        <div class="panel panel-info">
            <div class="panel-heading">Permissions</div>
            <div class="panel-body">
                <div class="table-responsive" style="height:250px;overflow:auto">
                <table class="table table-condensed table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Display Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{$permission->id}}</td>
                            <th>{{$permission->name}}</th>
                            <td>{{$permission->display_name}}</td>
                            <td>{{$permission->description}}</td>
                            <td><a href="{{ route('permission.delete', [ 'permission_id' => $permission->id ]) }}">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>



    </div>
</div>