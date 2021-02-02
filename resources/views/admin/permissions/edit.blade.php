<x-admin-master>
    @section('content')

        <h2>Edit Permission</h2>

        @if(session('user-deleted'))
        <div class="alert alert-danger">{{ session('permission-updated') }}</div>
        @endif 

        <div class="row">
         <div class="col-md-4">
            <form action="{{ route('permissions.update', $permission->id) }}" method="post">
            @csrf
            @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ $permission->name }}">
                    <button class="btn btn-primary mt-2">Update</button>
                </div>
            </form>
        </div>

        </div>

    @endsection
</x-admin-master>