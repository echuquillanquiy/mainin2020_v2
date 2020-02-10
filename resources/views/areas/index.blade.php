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
                    <h3 class="card-title">Listado de Áreas</h3>

                    @if (session('notification'))
                        <div class="alert alert-success" role="alert">
                        <span class="alert-icon"><i class="ni ni-curved-next"></i></span>
                        {{ session('notification') }}
                        </div>
                    @endif
            
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <a onclick="event.preventDefault();addAreaForm();" href="#" class="btn btn-block btn-success float-right text-white" data-toggle="modal"><i class="fab fa-app-store-ios mr-2"></i> Nueva Área</a>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Área</th>
                                <th>Descripción</th>
                                <th>Fecha y hora de creación</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($areas as $area)
                            <tr>
                                <td>{{$area->id}}</td>
                                <td>{{$area->name}}</td>
                                <td>{{$area->description}}</td>
                                <td>{{$area->created_at}}</td>                                
                                <td>
                                    <a onclick="event.preventDefault();editAreaForm({{$area->id}});" href="#" class="edit open-modal" data-toggle="modal" value="{{$area->id}}"><i class="fas fa-edit fa-lg text-primary" data-toggle="tooltip" title="Editar"></i></a>
                                </td>
                                <td>
                                    <a onclick="event.preventDefault();deleteAreaForm({{$area->id}});" href="#" class="delete" data-toggle="modal"><i class="fas fa-trash fa-lg text-danger" data-toggle="tooltip" title="Eliminar"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $areas->links() }}
        </div>
    </div>
</div>

@include('areas.partial.area_add')
@include('areas.partial.area_edit')
@include('areas.partial.area_delete')
    
@endsection

@section('areaScrips')
<script src="{{ asset('js/area.js') }}"></script>
@endsection