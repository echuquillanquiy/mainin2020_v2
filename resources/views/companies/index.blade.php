@extends('layouts.panel')
@section('content')
      
<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Listado de Empresas</h3>

              @if (session('notification'))
                <div class="alert alert-success" role="alert">
                  <span class="alert-icon"><i class="ni ni-curved-next"></i></span>
                  {{ session('notification') }}
                </div>
              @endif
    
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <a href="{{ route('companies.create') }}" class="btn btn-block btn-success float-right text-white">
                    <i class="fas fa-landmark"></i>
                    Nuevo Empresa
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
                    <th>Razón Social</th> 
                    <th>RUC</th>
                    <th>Dirección</th>
                    <th>Nombre de contacto</th>
                    <th>Telefono de contacto</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($companies as $company)
                    <tr>
                      <td>{{ $company->id }}</td>
                      <td>{{ $company->name }}</td>
                      <td>{{ $company->ruc }}</td>
                      <td>{{ $company->address }}</td>
                      <td>{{ $company->contact_name }}</td>
                      <td>{{ $company->contact_phone }}</td>
                      <td>
                        <form action="{{ url('/companies/'.$company->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="{{ url('/companies/'.$company->id.'/edit') }}"><i class="fas fa-edit fa-lg text-primary"></i></a>

                          <button class="btn btn-sm" onclick="return confirm('¿Seguro que desea eliminar la empresa: {{ $company->name }}?');" type="submit"><i class="fas fa-trash fa-lg text-danger"></i></button>
                      </form>
                        
                      </td>
      
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          {{$companies->links()}}
        </div>
    </div>
</div>
@endsection
