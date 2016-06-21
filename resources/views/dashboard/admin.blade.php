<div class="row">
    <div class="col-md-8">
        <form action="" action="{{ route('permission.create') }}">
            <div class="form-group">
                <label for="role">Add Permission</label>
                <input type="text" class="form-control" name="roll" id="roll">
            </div>
            <button type="submit" class="btn btn-primary pull-right">Add Permission</button>
        </form>
        <br>

        <br>
        <form action="" action="{{ route('role.create') }}">
            <div class="form-group">
                <label for="role">Add Permission</label>
                <input type="text" class="form-control" name="roll" id="roll">
            </div>
            <button type="submit" class="btn btn-primary pull-right">Add Permission</button>
        </form>
        <br>

        <div class="checkbox">
            <label><input type="checkbox" value="">Option 1</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" value="">Option 2</label>
        </div>
        <div class="checkbox disabled">
            <label><input type="checkbox" value="" disabled>Option 3</label>
        </div>
    </div>


    <div class="col-md-3 col-md-offset-1">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Roles
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning btn-xs pull-right" data-toggle="modal" data-target="">
                    <span class="glyphicon glyphicon-pencil"></span>
                </button>
            </div>

            <div class="panel-body">
                <form action="" action="{{ route('role.create') }}">
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
                    <button type="submit" class="btn btn-primary pull-right">Add Role</button>
                </form>
            </div>
        </div>


        <div class="panel panel-primary">
            <div class="panel-heading">
                Permissions
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning btn-xs pull-right" data-toggle="modal" data-target="">
                    <span class="glyphicon glyphicon-pencil"></span>
                </button>
            </div>

            <div class="panel-body">
                <form action="" action="{{ route('permission.create') }}">
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
                    <button type="submit" class="btn btn-primary pull-right">Add Permission</button>
                </form>
            </div>
        </div>
    </div>
</div>