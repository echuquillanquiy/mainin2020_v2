@extends('layouts.panel')

@section('content')

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Importar datos de colaboradores</h3>
              </div>

              <!-- /.card-header -->
              <!-- form start -->
                <form action="{{ route('importexcel') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <input type="file" name="file" required>
                    </div>    
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-lg">Registrar</button>
                    <a href="{{ url('collaborators') }}" class="btn btn-danger btn-lg text-white">Cancelar</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection
