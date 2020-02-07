@extends('layouts.panel')
@section('content')
      
<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Listado de Usuarios</h3>

              @if (session('notification'))
                <div class="alert alert-success" role="alert">
                  <span class="alert-icon"><i class="ni ni-curved-next"></i></span>
                  {{ session('notification') }}
                </div>
              @endif
    
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <a href="{{ route('users.create') }}" class="btn btn-block btn-success float-right text-white">
                    <i class="fas fa-user-plus"></i>
                    Nuevo Usuario
                  </a>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombres y Apellidos</th>
                    <th>Nickmane</th>
                    <th>DNI</th>
                    <th>email</th>
                    <th>Rol</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                    <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->nickname }}</td>
                      <td>{{ $user->dni }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->role }}</td>
                      <td>
                        <form action="{{ url('/users/'.$user->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="{{ url('/users/'.$user->id.'/edit') }}"><i class="fas fa-edit fa-lg text-primary"></i></a>

                          <button class="btn btn-sm" onclick="return confirm('¿Seguro que desea eliminar al usuario: {{ $user->name }}?');" type="submit"><i class="fas fa-trash fa-lg text-danger"></i></button>
                      </form>
                        
                      </td>
      
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          {{$users->links()}}
        </div>
    </div>
</div>



@endsection
