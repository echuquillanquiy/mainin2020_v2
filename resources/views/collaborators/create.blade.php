@extends('layouts.panel')

@section('content')

<div class="container-fluid mt-1">
    <form action="{{ url('collaborators') }}" method="POST">
        @csrf
        <div class="row">
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
                     <div class="row text-center">
                        <div class="form-group col-sm-12 col-lg-2 col-s-12">
                          <label for="document">Tipo de documento</label>
                          <select class="form-control" name="document">
                            <option value="DNI">DNI</option>
                            <option value="PASAPORTE">PASAPORTE</option>
                            <option value="CARNET DE EXTRANJERIA">CARNET DE EXTRANJERIA</option>
                          </select>
                        </div>

                        <div class="form-group col-sm-12 col-lg-2 col-s-12">
                          <label for="n_document">N° de Documento</label>
                          <input type="text" class="form-control" name="n_document">
                        </div>

                        <div class="form-group col-sm-12 col-lg-5 col-s-12">
                          <label for="name">Nombres y Apellidos</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                        </div>
                        
                        <div class="form-group col-sm-12 col-lg-3 col-s-12">
                          <label for="date_of_birthday">Fecha de nacimiento</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                          <input type="date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask name="date_of_birthday" id="date_of_birthday" value="{{ old('date_of_birthday') }}">
                          </div>
                        </div>

                        <div class="form-group col-sm-12 col-lg-2 col-s-12">
                          <label for="phone">Telefóno / Celular</label>
                          <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                        </div>

                        <div class="form-group col-sm-12 col-lg-4 col-s-12">
                          <label for="address">Dirección</label>
                          <input type="text" name="address" id="address" class="form-control">
                        </div>

                        <div class="form-group col-md-6 col-lg-2 col-s-12">
                          <label for="department">Departamento</label>
                          <select class="form-control select2" data-style="btn-success" name="department">
                            <option>[SELECCIONE]</option>
                            @foreach ($departments as $department)
                              <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group col-sm-12 col-lg-2 col-s-12">
                          <label for="province">Provincia</label>
                          <select class="form-control select2" name="province">
                            <option>[SELECCIONE]</option>
                          </select>
                        </div>

                        <div class="form-group col-sm-12 col-lg-2 col-s-12">
                          <label for="district">Distrito</label>
                          <select class="form-control select2" name="district">
                            <option>[SELECCIONE]</option>
                          </select>
                        </div>

                        <div class="form-group col-sm-12 col-lg-4 col-s-12">
                          <label for="email">Correo electronico</label>
                          <input type="text" name="email" id="email" class="form-control">
                        </div>

                        <div class="form-group col-sm-12 col-lg-2 col-s-12">
                          <label for="ubigeo">Lugar de Nacimiento</label>
                          <select class="form-control select2" name="ubigeo">
                            <option>[SELECCIONE]</option>
                            @foreach ($ubigeos as $ubigeo)
                              <option value="{{ $ubigeo->ubigeo }}">{{ $ubigeo->distrito }}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group col-sm-12 col-lg-2 col-s-12">
                          <label for="sex">Sexo</label>
                          <select class="form-control select2" name="sex">
                            <option value="MASCULINO">MASCULINO</option>
                            <option value="FEMENINO">FEMENINO</option>
                          </select>
                        </div>

                        <div class="form-group col-sm-12 col-lg-2 col-s-12">
                          <label for="civil_state">Estado Civil</label>
                          <select class="form-control select2" name="civil_state">
                            <option value="SOLTERO">SOLTERO</option>
                            <option value="CASADO">CASADO</option>
                            <option value="DIVORCIADO">DIVORCIADO</option>
                            <option value="CONVIVIENTE">CONVIVIENTE</option>
                            <option value="VIUDO">VIUDO</option>
                          </select>
                        </div>

                        <div class="form-group col-sm-12 col-lg-2 col-s-12">
                          <label for="blood_type">Grupo Sanguineo</label>
                          <select class="form-control select2" name="blood_type">
                            <option value="O+">O+</option>
                            <option value="A+">A+</option>
                            <option value="B+">B+</option>
                            <option value="AB+">AB+</option>
                            <option value="O-">O-</option>
                            <option value="A-">A-</option>
                            <option value="B-">B-</option>
                            <option value="AB-">AB-</option>
                          </select>
                        </div>
                     </div>
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
        </div>        
        <button type="submit" class="btn btn-primary btn-lg">Registrar</button>
        <a href="{{ url('collaborators') }}" class="btn btn-danger btn-lg text-white">Cancelar</a>

    </form>   
</div>

@endsection