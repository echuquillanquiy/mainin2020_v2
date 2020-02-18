@extends('layouts.panel')
@section('content')
      
<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Listado de Colaboradores</h3>

              @if (session('notification'))
                <div class="alert alert-success" role="alert">
                  <span class="alert-icon"><i class="ni ni-curved-next"></i></span>
                  {{ session('notification') }}
                </div>
              @endif
    
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 250px;">
                    <a href="{{ route('collaborators.create') }}" class="btn btn-block btn-primary float-right text-white">
                    <i class="fas fa-user-tie fa-2x mr-2"></i>
                    <span class="mt--5">Nuevo Colaborador</span>
                  </a>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-center">
                <thead>
                  <tr>
                    <th>Entrevistador</th>
                    <th>Documento</th>
                    <th>N° DNI</th>
                    <th>Nombres y apellidos</th>
                    <th>Cargo</th>
                    <th>Telefóno</th>
                    <th>Departamento</th>
                    <th>Empresa Habilitada</th>
                    <th>Categororía</th>
                    <th>Ubigeo</th>
                    <th>Foto</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    <th>Estado</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($collaborators as $collaborator)
                    <tr>
                      <td>{{ $collaborator->interviewer }}</td>
                      <td>{{ $collaborator->document }}</td>
                      <td>{{ $collaborator->n_document }}</td>
                      <td>{{ $collaborator->name }}</td>
                      <td>{{ $collaborator->position }}</td>
                      <td>{{ $collaborator->phone }}</td>
                      <td>JUNIN</td>                      
                      <td>{{ $collaborator->company }}</td>
                      <td>{{ $collaborator->category }}</td>
                      <td>{{ $collaborator->ubigeo }}</td>
                      <td>
                        <a href="{{ url('/collaborators/'.$collaborator->id.'/edit') }}" class="btn btn-m"><i class="fas fa-eye fa-2x text-info"></i></a>
                      </td>
                      <td>
                        <a href="{{ url('/collaborators/'.$collaborator->id.'/edit') }}"  class="btn btn-m"><i class="fas fa-edit fa-2x text-primary"></i></a>                        
                      </td>
                      <td>
                        <form action="{{ url('/collaborators/'.$collaborator->id) }}" method="POST">
                            @csrf
                            @method('DELETE')  
                            <button class="btn btn-m" onclick="return confirm('¿Seguro que desea eliminar al colaborador: {{ $collaborator->name }}?');" type="submit"><i class="fas fa-times-circle fa-2x text-danger"></i></button>
                          </form>
                      </td>

                      <td>
                        @if($collaborator->state == "ACEPTADO")
                            
                            <a href="" id="" data-id="{{ $collaborator->id }}" data-toggle="tooltip" data-placement="top" title="Aceptado"  class="btn btn-sm"><i class="fas fa-user-check fa-2x text-success"></i></a>

                        @elseif($collaborator->state == "BANEADO")
                                
                            <a href="" id="" data-id="{{ $collaborator->id }}" data-toggle="tooltip" data-placement="top" title="Baneado"  class="btn btn-sm"><i class="fas fa-user-slash fa-2x text-danger"></i></a>

                        @elseif($collaborator->state == "OBSERVADO")

                            <a href="" id="" data-id="{{ $collaborator->id }}" data-toggle="tooltip" data-placement="top" title="Observado" class="btn btn-sm"><i class="fas fa-exclamation-triangle fa-2x text-warning"></i></a>                                        
                        @endif
                    </td>   
      
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          {{$collaborators->links()}}
        </div>
    </div>
</div>



@endsection
