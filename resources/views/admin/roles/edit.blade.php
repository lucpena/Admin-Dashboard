<x-admin-master>
    @section('content')

        <h2>Edit Role</h2>

        @if(session('user-deleted'))
        <div class="alert alert-danger">{{ session('role-updated') }}</div>
        @endif 

        <div class="row">
            <div class="col-md-4">

                <form action="{{ route('roles.update', $role->id) }}" method="post">
                @csrf
                @method('PUT')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ $role->name }}">
                        <button class="btn btn-primary mt-2">Update</button>
                    </div>
                </form>
            </div>

        @if($permissions->isNotEmpty())
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
                            @foreach($permissions as $permission)           
                                <tr>
                                    <td><input type="checkbox" onclick="return false;"
                                    @foreach($role->permissions as $role_permission)
                                        @if($role_permission->label == $permission->label)
                                            checked
                                        @endif
                                    @endforeach                            
                                    ></td>

                                    <td>{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->label }}</td>
                                    
                                    <td> <!--  route('roles.permission.attach', $role)  -->
                                        <form method="post" action="{{ route('roles.permission.attach', $role) }}">
                                        @method("PUT")
                                        @csrf
                                        <input type="hidden" name="permission" value="{{ $permission->id }}">
                                        <button 
                                        type="submit" 
                                        class="btn btn-primary"

                                        @if($role->permissions->contains($permission))
                                            disabled
                                        @endif

                                        >Add</button>
                                    </td>

                                    <td> 
                                        <form method="post" action="{{ route('roles.permission.detach', $role) }}">
                                        @method("PUT")
                                        @csrf
                                        <input type="hidden" name="permission" value="{{ $permission->id }}">
                                        <button 
                                        type="submit" 
                                        class="btn btn-danger"

                                        @if(!$role->permissions->contains($permission))
                                            disabled
                                        @endif

                                        >Remove</button>
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
        @endif
    @endsection
</x-admin-master>