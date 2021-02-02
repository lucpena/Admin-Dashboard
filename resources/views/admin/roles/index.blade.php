<x-admin-master>
    @section('content')
    
    @if(session()->has('role-deleted'))
            <div class="alert alert-danger">{{ session('role-deleted') }}</div>
    @endif

    <h2>Roles Manager</h2>

    <div class="row">
        <div class="col-md-3">
            <form action="{{ route('roles.store') }}" method="post">
            @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input 
                    id="name" 
                    type="text" 
                    name="name" 
                    class="form-control @error('name') is-invalid @enderror">

                    @error('name')
                        <span><strong>{{ $message }}</strong></span>
                    @enderror

                </div>
                <button type="submit" class="btn btn-primary btn-block">Add new Role</button>
            </form>
        </div>

        <div class="col-md-9">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Label</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)           
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td><a href="{{ route('roles.edit', $role->id) }}">{{ $role->name }}</a></td>
                                <td>{{ $role->label }}</td>
                                <td>
                                    <form method="post" action="{{ route('roles.destroy', $role->id) }}" >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>

                                    </form>
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

    @endsection
</x-admin-master>