@extends('layouts.panel')

@section('csrfToken')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de Puestos</h3>

                    @if (session('notification'))
                        <div class="alert alert-success" role="alert">
                        <span class="alert-icon"><i class="ni ni-curved-next"></i></span>
                        {{ session('notification') }}
                        </div>
                    @endif
            
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <a onclick="event.preventDefault();addPositionForm();" href="#" class="btn btn-block btn-success float-right text-white" data-toggle="modal"><i class="fab fa-critical-role mr-2"></i> Nuevo Puesto</a>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Puesto</th>
                                <th>Descripción</th>
                                <th>Fecha y hora de creación</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($positions as $position)
                            <tr>
                                <td>{{$position->id}}</td>
                                <td>{{$position->name}}</td>
                                <td>{{$position->description}}</td>
                                <td>{{$position->created_at}}</td>                                
                                <td>
                                    <a onclick="event.preventDefault();editPositionForm({{$position->id}});" href="#" class="edit open-modal" data-toggle="modal" value="{{$position->id}}"><i class="fas fa-edit fa-lg text-primary" data-toggle="tooltip" title="Editar"></i></a>
                                </td>
                                <td>
                                    <a onclick="event.preventDefault();deletePositionForm({{$position->id}});" href="#" class="delete" data-toggle="modal"><i class="fas fa-trash fa-lg text-danger" data-toggle="tooltip" title="Eliminar"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $positions->links() }}
        </div>
    </div>
</div>

@include('positions.partial.position_add')
@include('positions.partial.position_edit')
@include('positions.partial.position_delete')
    
@endsection

@section('positionScrips')
<script src="{{ asset('js/position.js') }}"></script>
@endsection