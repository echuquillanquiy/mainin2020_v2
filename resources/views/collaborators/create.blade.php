@extends('layouts.panel')

@section('content')

<div class="container-fluid mt-1">
    <!-- general form elements -->
    <div class="card card-danger">
        <div class="card-header">
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

<div class="container-fluid">
    <form action="{{ url('collaborators') }}" method="POST">
        @csrf
        
        <div class="col-12 col-sm-12 col-lg-12">
            <div class="card card-warning card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true"><strong>DATOS PERSONALES</strong></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false"><strong>DATOS ESPECIFICOS</strong></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false"><strong>OBSERVACIONES /  COMENTARIOS</strong></a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                     
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                      
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                      
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-lg">Registrar</button>
            <a href="{{ url('collaborators') }}" class="btn btn-danger btn-lg text-white">Cancelar</a>
        </div>
    </form>   
</div>

@endsection