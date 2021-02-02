<x-admin-master>
    @section('content')

        <div class="row">
            <div class="col-md-6">

                <h2>Perfil do Usuário</h2>

                <div class="mb-4" style="margin-top: -18px;">
                    @if($user->userHasRole('Admin'))
                    <p><small>Cargo atual: Admin</small></p>
                    @elseif($user->userHasRole('Editor'))
                    <p><small>Cargo atual: Editor</small></p>
                    @else
                    <p><small>Cargo atual: Leitor</small></p>
                    @endif
                </div>

                <form method="post" action="{{ route('user.profile.update', $user) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                    <div class="">
                        <img src="{{ $user->avatar }}" alt="Imagem de Perfil" class="img-thumbnail rounded mb-2" style="height: 200px;">
                    </div>

                    <div class="form-group">
                        <input type="file" name="avatar" >
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" 
                               name="username" 
                               class="form-control" 
                               id="username"
                               value="{{ $user->username }}">

                        @error('username')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div> 

                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" 
                               name="name" 
                               class="form-control" 
                               id="name"
                               value="{{ $user->name }}">

                        @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div> 

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" 
                               name="email" 
                               class="form-control" 
                               id="email"
                               value="{{ $user->email }}">

                        @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div> 

                    <div class="">
                        <div class="form-group mt-5">
                            <label for="password">Senha</label>
                            <input type="password" 
                                name="password" 
                                class="form-control" 
                                id="password">

                            @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div> 

                        <div class="form-group mb-4">
                            <label for="password-confirmation">Confirmar senha</label>
                            <input type="password" 
                                name="password-confirmation" 
                                class="form-control" 
                                id="password">

                            @error('password-confirmation')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>      
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar</button>

                </form>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">

            <h2 class="mb-4">Cargo</h2>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody> 
                    @foreach($roles as $role)                   
                        <tr>
                            <td><input type="checkbox" onclick="return false;"
                            @foreach($user->roles as $user_role)
                                @if($user_role->label == $role->label)
                                    checked
                                @endif
                            @endforeach                            
                            ></td>

                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>

                            <td>
                                <form action="{{ route('user.role.attach', $user) }}" method="post">
                                @method('PUT')
                                @csrf
                                    <input type="hidden" name="role" value="{{ $role->id }}">
                                    <button 
                                    type="submit" 
                                    class="btn btn-primary"

                                    @if($user->roles->contains($role))
                                        disabled
                                    @endif

                                    >Add</button>
                                </form>
                            </td>

                            <td>
                                <form action="{{ route('user.role.detach', $user) }}" method="post">
                                @method('PUT')
                                @csrf
                                    <input type="hidden" name="role" value="{{ $role->id }}">
                                    <button 
                                    type="submit" 
                                    class="btn btn-danger"
                                    
                                    @if(!$user->roles->contains($role))
                                        disabled
                                    @endif

                                    >Remove</button>
                                </form>
                            </td>
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <!-- <button type="submit" class="btn btn-primary mb-5">Confirmar</button> -->

            </div>
        </div>

    @endsection
</x-admin-master>