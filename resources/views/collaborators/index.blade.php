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
                <div class="row">
                  <div class="col-lg-6">
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <a href="{{ route('collaborators.create') }}" class="btn btn-block btn-primary float-right text-white">
                        <i class="fas fa-user-tie fa-2x mr-2"></i>
                        <span class="mt--5">Nuevo Colaborador</span>
                      </a>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <a href="{{ route('collaborators.import.excel') }}" class="btn btn-block btn-info float-right text-white">
                        <i class="fas fa-file-import fa-2x"></i>
                        <span class="mt--5">Importar data</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-center text-nowrap">
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
                    <th>Quitar</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($collaborators as $collaborator)
                    <tr>
                      <td>{{ $collaborator->user->nickname }}</td>
                      <td>{{ $collaborator->document }}</td>
                      <td>{{ $collaborator->n_document }}</td>
                      <td>{{ $collaborator->name }}</td>
                      <td>{{ $collaborator->position }}</td>
                      <td>{{ $collaborator->phone }}</td>
                      <td>{{ $collaborator->department->name }}</td>                    
                      <td>{{ $collaborator->company }}</td>
                      <td>{{ $collaborator->category }}</td>
                      <td>{{ $collaborator->ubigeo->ubigeo_cod}}</td>
                      <td>
                        <a href="{{ url('collaborators/'. $collaborator->id) }}" class="ver-foto">
                          <img class="img-circle img-sm" src="{{ Storage::url("collaborators/photo/$collaborator->photo") }}" alt="Foto Colaborador">
                        </a>
                      </td>
                      <td>
                        <form action="{{ url('/collaborators/'.$collaborator->id) }}" method="POST">
                            @csrf
                            @method('DELETE')  
                            <button class="btn btn-m" onclick="return confirm('¿Seguro que desea eliminar al colaborador: {{ $collaborator->name }}?');" type="submit"><i class="fas fa-times-circle fa-lg text-danger"></i></button>
                          </form>
                      </td>

                      <td>
                        @if($collaborator->state == "ACEPTADO")
                            
                            <a href="url('collaborators/'. $collaborator->id) }}" id="" data-id="{{ $collaborator->id }}" data-toggle="tooltip" data-placement="top" title="Aceptado"  class="btn btn-sm cambiar-estado"><i class="fas fa-user-check fa-lg text-success"></i></a>

                        @elseif($collaborator->state == "BANEADO")
                                
                            <a href="url('collaborators/'. $collaborator->id) }}" id="" data-id="{{ $collaborator->id }}" data-toggle="tooltip" data-placement="top" title="Baneado"  class="btn btn-sm cambiar-estado"><i class="fas fa-user-slash fa-lg text-danger"></i></a>

                        @elseif($collaborator->state == "OBSERVADO")

                            <a href="url('collaborators/'. $collaborator->id) }}" id="" data-id="{{ $collaborator->id }}" data-toggle="tooltip" data-placement="top" title="Observado" class="btn btn-sm cambiar-estado"><i class="fas fa-exclamation-triangle fa-lg text-warning"></i></a>                                        
                        @endif
                    </td>
                    
                    <td>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            Opciones
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item text-warning" href="{{ url('/collaborators/'.$collaborator->id.'/edit') }}" class="btn btn-m">Editar</a>
                            <a class="dropdown-item text-purple" href="#">EMO Chinalco</a>
                            <a class="dropdown-item text-pink" href="#">Imprimir EMO</a>
                          </div>
                        </div>
                      </div>
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

<div class="modal fade" id="modal-ver-foto" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Foto de colaborador</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer justify-content-between right">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modal-cambiar-estado" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Cambiar estado</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer justify-content-between right">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

@endsection

@section('foto')
<script src="{{ asset('js/indexcolaborador.js') }}"></script>
@endsection
