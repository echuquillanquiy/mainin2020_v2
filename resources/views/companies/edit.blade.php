@extends('layouts.panel')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-9">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">FORMULARIO DE CREACIÓN DE EMPRESAS</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <form action="{{ url('companies/'.$companies->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        
                        <div class="row">
                            
                        <div class="form-group col-3">
                            <label for="ruc">RUC</label>
                            <input type="number" id="ruc" class="form-control" placeholder="RUC" name="ruc" value="{{ old('ruc', $companies->ruc) }}">
                        </div>
        
                        <div class="form-group col-9">
                            <label for="name">Razón social</label>
                            <input type="text" id="name" class="form-control" placeholder="Razón social" name="name" value="{{ old('name', $companies->name) }}" required autofocus>   
                        </div>

                        <div class="form-group col-12">
                            <label for="address">Dirección</label>
                            <input type="text" id="address" class="form-control" placeholder="Dirección" name="address" value="{{ old('address', $companies->address) }}">
                        </div>
        
                        <div class="form-group col-4">
                            <label for="contact_name">Nombre de contacto</label>
                            <input type="text" id="contact_name" class="form-control" placeholder="Nombre de contacto 1" name="contact_name" value="{{ old('contact_name', $companies->contact_name) }}">
                        </div>

                        <div class="form-group col-4">
                            <label for="email">Correo electronico de contacto</label>
                            <input type="email" id="contact_email" class="form-control" placeholder="Correo electronico 1" name="contact_email" value="{{ old('contact_email', $companies->contact_email) }}">       
                        </div>
                        <div class="form-group col-4">
                            <label for="contact_phone">Telefóno de Contacto</label>
                            <input type="number" id="contact_phone" class="form-control" placeholder="Telefóno de contacto 1" name="contact_phone" value="{{ old('contact_phone', $companies->contact_phone) }}">
                        </div>
                        <div class="form-group col-4">
                            <label for="contact_name2">Nombre de contacto</label>
                            <input type="text" id="contact_name2" class="form-control" placeholder="Nombre de contacto 2" name="contact_name2" value="{{ old('contact_name2', $companies->contact_name2) }}">
                        </div>
                        <div class="form-group col-4">
                            <label for="contact_email2">Correo electronico de contacto</label>
                            <input type="email" id="contact_email2" class="form-control" placeholder="Correo electronico 2" name="contact_email2" value="{{ old('contact_email2', $companies->contact_email2) }}">
                        </div>
                        <div class="form-group col-4">
                            <label for="contact_phone2">Telefóno de Contacto</label>
                            <input type="number" id="contact_phone2" class="form-control" placeholder="Telefóno de contacto 2" name="contact_phone2" value="{{ old('contact_phone2', $companies->contact_phone2) }}">
                        </div>
                        </div>

                        
                    </div>
                <!-- /.card-body -->
    
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-lg">Actualizar</button>
                    <a href="{{ url('companies') }}" class="btn btn-danger btn-lg text-white">Cancelar</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>

        <div class="col-md-3">
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