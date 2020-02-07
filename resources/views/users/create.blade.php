@extends('layouts.panel')

@section('content')
    
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-7">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">FORMULARIO DE CREACIÓN DE USUARIOS</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <form action="{{ url('users') }}" method="POST">
                    @csrf
                    <div class="card-body">
        
                        <div class="form-group">
                            <label for="name">Nombres y Apelllidos</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nombres y Apellidos" value="{{ old('name') }}" required>
                        </div>
        
                        <div class="form-group">
                            <label for="nickname">Nombre de usuario (Nickname)</label>
                            <input type="text" class="form-control" id="nickname" name="nickname" placeholder="Nombre de usuario" value="{{ old('nickname') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="dni">Documento de Identidad</label>
                            <input type="number" class="form-control" id="dni" name="dni" placeholder="Documento de Identidad" value="{{ old('dni') }}">
                        </div>
        
                        <div class="form-group">
                            <label for="email">Correo Electronico</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="example@example.com.pe" value="{{ old('email') }}" required>
                        </div>
        
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="text" class="form-control" id="password" name="password" value="{{ $random }}">
                        </div>
                        <div>
                            <select class="form-control select2" style="width: 100%;" name="role">
                                <option value="administrador">Administrador</option>
                                <option value="recursos">Recursos</option>
                                <option value="rdministracion">Administración</option>
                                <option value="visita">Visita</option>
                            </select>
                        </div>
                        
                    </div>
                <!-- /.card-body -->
    
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-lg">Registrar</button>
                    <a href="{{ url('users') }}" class="btn btn-danger btn-lg text-white">Cancelar</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>

        <div class="col-md-5">
            <!-- general form elements -->
            <div class="card card-danger">
              <div class="card-header">
                <h5>ALERTAS!</h5>
                    @if ($errors->any())
                        <ul class="bg-danger">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
              </div>              
            </div>
            <!-- /.card -->
        </div>
    </div>
    
     
    
</div>

@endsection