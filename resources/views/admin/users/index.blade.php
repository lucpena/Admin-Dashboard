<x-admin-master>
    @section('content')

        <h2>Users</h2>

        @if(session('user-deleted'))
        <div class="alert alert-danger">{{ session('user-deleted') }}</div>
        @endif  
        
        <div class="card shadow mb-4">
    
        <div class="card-header py-4">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Avatar</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        

                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            

                            <!-- ROLE -->
                            @if($user->userHasRole('Admin'))
                            <td>Admin</td>
                            @elseif($user->userHasRole('Editor'))
                            <td>Editor</td>
                            @else
                            <td>Leitor</td>
                            @endif
                            <!-- END ROLE -->

                            <!-- ACTION -->
                            @if(strpos($user->avatar, 'image'))
                                <td>
                                    <img class="img-profile rounded-circle" 
                                    src="{{ $user->avatar }}"
                                    style="height: 35px;">
                                </td>
                            @else
                                <td></td>
                            @endif

                            @if($user->id != auth()->user()->id)
                                <td>
                                    <form method="post" action="{{ route('user.destroy', $user->id) }}">
                                    @csrf
                                    @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            @else
                                <td></td>
                            @endif
                            <!-- END ACTION -->
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
       </div> 

    @endsection

    @section('scripts')
        <!-- Page level custom scripts -->
        <script src="{{ secure_asset('vendor/datatables/jquery.dataTables.js') }}"></script>
        <script src="{{ secure_asset('vendor/datatables/dataTables.bootstrap4.js') }}"></script>
        <script src="{{ secure_asset('js/demo/datatables-demo.js') }}"></script> 
    @endsection
</x-admin-master>