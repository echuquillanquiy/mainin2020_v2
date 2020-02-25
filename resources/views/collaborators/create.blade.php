@extends('layouts.panel')

@section('inputfileStyle')

<link rel="stylesheet" href="{{ asset('bootstrap-fileinput/css/fileinput.min.css') }}">

@endsection

@section('content')

<div class="container-fluid mt-1">
    <form action="{{ url('collaborators') }}" method="POST" enctype="multipart/form-data">
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
                        <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                        <input type="hidden" value="{{ auth()->user()->name }}" name="interviewer">
                        <div class="form-group col-sm-12 col-lg-2 col-xl-2 col-s-12">
                          <label for="document">Tipo de documento</label>
                          <select class="form-control" name="document">
                            <option value="DNI">DNI</option>
                            <option value="PASAPORTE">PASAPORTE</option>
                            <option value="CARNET DE EXTRANJERIA">CARNET DE EXTRANJERIA</option>
                          </select>
                        </div>

                        <div class="form-group col-sm-12 col-lg-2 col-xl-2 col-s-12">
                          <label for="n_document">N° de Documento</label>
                          <input type="text" class="form-control" name="n_document">
                        </div>

                        <div class="form-group col-sm-12 col-lg-5 col-xl-5 col-s-12">
                          <label for="name">Nombres y Apellidos</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                        </div>
                        
                        <div class="form-group col-sm-12 col-lg-3 col-xl-3 col-s-12">
                          <label for="date_of_birthday">Fecha de nacimiento</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                          <input type="date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask name="date_of_birthday" id="date_of_birthday" value="{{ old('date_of_birthday') }}">
                          </div>
                        </div>

                        <div class="form-group col-sm-12 col-lg-3 col-xl-3 col-s-12">
                          <label for="instruction">Grado de instrucción</label>
                          <select class="form-control select2" name="instruction">
                            <option value="ANALFABETO">ANALFABETO</option>
                            <option value="PRIMARIA COMPLETA">PRIMARIA COMPLETA</option>
                            <option value="SECUNDARIA COMPLETA">SECUNDARIA COMPLETA</option>
                            <option value="TECNICO COMPLETO">TECNICO COMPLETO</option>
                            <option value="UNIVERSITARIO COMPLETO">UNIVERSITARIO COMPLETO</option>
                            <option value="PRIMARIA INCOMPLETA">PRIMARIA INCOMPLETA</option>
                            <option value="SECUNDARIA INCOMPLETA">SECUNDARIA INCOMPLETA</option>
                            <option value="TECNICO INCOMPLETO">TECNICO INCOMPLETO</option>
                            <option value="UNIVERSITARIO INCOMPLETO">UNIVERSITARIO INCOMPLETO</option>
                          </select>
                        </div>

                        <div class="form-group col-sm-12 col-lg-2 col-xl-2 col-s-12">
                          <label for="phone">Telefóno / Celular</label>
                          <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                        </div>

                        <div class="form-group col-sm-12 col-lg-4 col-xl-4 col-s-12">
                          <label for="address">Dirección</label>
                          <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
                        </div>

                        <div class="form-group col-sm-12 col-lg-3 col-s-12">
                          <label for="email">Correo electronico</label>
                          <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
                        </div>

                        <div class="form-group col-md-6 col-lg-2 col-xl-2 col-s-12">
                          <label for="department_id">Departamento</label>
                          <select class="form-control select2" data-style="btn-success" id="select-department" name="department_id">
                            <option>[SELECCIONE]</option>
                            @foreach ($departments as $department)
                              <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group col-sm-12 col-lg-2 col-xl-2 col-s-12">
                          <label for="province_id">Provincia</label>
                          <select class="form-control select2" name="province_id" id="select-province">

                          </select>
                        </div>

                        <div class="form-group col-sm-12 col-lg-2 col-xl-2 col-s-12">
                          <label for="district_id">Distrito</label>
                          <select class="form-control select2" name="district_id" id="select-district">

                          </select>
                        </div>

                        <div class="form-group col-sm-12 col-lg-2 col-xl-2 col-s-12">
                          <label for="ubigeo_id">Ubigeo</label>
                          <select class="form-control select2" name="ubigeo_id" id="select-ubigeo">
                            @foreach ($ubigeos as $ubigeo)
                            <option value="{{ $ubigeo->id }}">{{ $ubigeo->distrito }}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group col-sm-12 col-lg-2 col-xl-2 col-s-12">
                          <label for="sex">Sexo</label>
                          <select class="form-control select2" name="sex">
                            <option value="MASCULINO">MASCULINO</option>
                            <option value="FEMENINO">FEMENINO</option>
                          </select>
                        </div>

                        <div class="form-group col-sm-12 col-lg-2 col-xl-2 col-s-12">
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

                        <div class="form-group col-sm-12 col-lg-2 col-s-12">
                          <label for="n_sons">N° de hijos</label>
                          <input type="text" name="n_sons" id="n_sons" class="form-control" value="{{ old('n_sons') }}">
                        </div>

                        <div class="form-group col-sm-12 col-lg-4 col-s-12">
                          <label for="contact">Contacto de emergencia</label>
                          <input type="text" name="contact" id="contact" class="form-control" value="{{ old('contact') }}">
                        </div>

                        <div class="form-group col-sm-12 col-lg-4 col-s-12">
                          <label for="emergency_phone">Telefóno de emergencia</label>
                          <input type="text" name="emergency_phone" id="emergency_phone" class="form-control" value="{{ old('emergency_phone') }}">
                        </div>

                        <div class="form-group col-sm-12 col-lg-3 col-s-12">
                          <label for="home_time">Tiempo en casa</label>
                          <input type="text" name="home_time" id="home_time" class="form-control" value="{{ old('phone', ' años') }}">
                        </div>

                        <div class="form-group col-sm-12 col-lg-2 col-s-12">
                          <label for="bank">Banco</label>
                          <select class="form-control select2" name="bank">
                            <option value="BCP">BCP</option>
                              <option value="BBVA">BBVA</option>
                              <option value="INTERBANK">INTERBANK</option>
                              <option value="BANBIF">BANBIF</option>
                              <option value="SCOTIABANK">SCOTIABANK</option>
                          </select>
                        </div>

                        <div class="form-group col-sm-12 col-lg-7 col-s-12">
                          <label for="bancary_account">Cuenta bancaria</label>
                          <input type="text" name="bancary_account" id="bancary_account" class="form-control" value="{{ old('bancary_account') }}">
                        </div>
                        
                     </div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                      <div class="row text-center">
                        <div class="form-group col-md-6 col-lg-2 col-xl-2 col-s-12">
                          <label for="category">Categoría</label>
                          <select class="form-control select2" data-style="btn-success" name="category">
                            @foreach ($categories as $category)
                              <option value="{{ $category->name }}">{{ $category->name }}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group col-md-6 col-lg-2 col-xl-2 col-s-12">
                          <label for="amount">Área</label>
                          <select class="form-control select2" data-style="btn-success" name="amount">
                            @foreach ($amounts as $amount)
                              <option value="{{ $amount->amount }}">{{ 'S/. '.$amount->amount }}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group col-md-6 col-lg-2 col-xl-2 col-s-12">
                          <label for="area">Área</label>
                          <select class="form-control select2" data-style="btn-success" name="area">
                            @foreach ($areas as $area)
                              <option value="{{ $area->name }}">{{ $area->name }}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group col-md-6 col-lg-3 col-xl-3 col-s-12">
                          <label for="position">Puestos</label>
                          <select class="form-control select2" data-style="btn-success" name="position">
                            @foreach ($positions as $position)
                              <option value="{{ $position->name }}">{{ $position->name }}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group col-md-6 col-lg-3 col-xl-3 col-s-12">
                          <label for="company">Empresas</label>
                          <select class="form-control select2" data-style="btn-success" name="company">
                            @foreach ($companies as $company)
                              <option value="{{ $company->name }}">{{ $company->name }}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group col-sm-12 col-lg-3 col-xl-3 col-s-12">
                          <label for="date_medic_examen">Fecha de examen</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                          <input type="date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask name="date_medic_examen" id="date_medic_examen" value="{{ old('date_medic_examen', date('Y-m-d')) }}">
                          </div>
                        </div>

                        <div class="form-group col-md-6 col-lg-2 col-xl-2 col-s-12">
                          <label for="respirator">¿Cuenta con respirador?</label>
                          <select class="form-control select2" data-style="btn-success" name="respirator">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                          </select>
                        </div>

                        <div class="form-group col-md-6 col-lg-2 col-xl-2 col-s-12">
                          <label for="shoes">¿Cuenta con zapatos?</label>
                          <select class="form-control select2" data-style="btn-success" name="shoes">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                          </select>
                        </div>

                        <div class="form-group col-md-6 col-lg-1 col-xl-1 col-s-12">
                          <label for="size_shoe">Talla</label>
                          <input type="text" name="size_shoe" class="form-control">
                        </div>

                        <div class="form-group col-md-6 col-lg-2 col-xl-2 col-s-12">
                          <label for="size_pant">Talla de pantalón</label>
                          <select class="form-control select2" data-style="btn-success" name="size_pant">
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                          </select>
                        </div>

                        <div class="form-group col-md-6 col-lg-2 col-xl-2 col-s-12">
                          <label for="size_shirt">Talla de camisa</label>
                          <select class="form-control select2" data-style="btn-success" name="size_shirt">
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                          </select>
                        </div>

                        <div class="form-group col-md-6 col-lg-2 col-xl-2 col-s-12">
                          <label for="height">Talla</label>
                          <input type="number" name="height" id="talla" class="form-control" onchange="calcularImc();" placeholder="Talla" value="{{ old('height') }}">
                        </div>

                        <div class="form-group col-md-6 col-lg-2 col-xl-2 col-s-12">
                          <label for="weight">Peso</label>
                          <input type="number" name="weight" id="peso" class="form-control" onchange="calcularImc();" placeholder="Peso" value="{{ old('weight') }}">
                        </div>

                        <div class="form-group col-md-6 col-lg-2 col-xl-2 col-s-12">
                          <label for="imc">IMC</label>
                          <textarea id="imc" class="form-control" name="imc" rows="1" cols="0" readonly>{{ old('imc') }}</textarea>
                        </div>

                        <div class="form-group col-md-6 col-lg-2 col-xl-2 col-s-12">
                          <label for="dx_nutrition">Dx Nutrición</label>
                          <textarea id="dx_nutrition" class="form-control" name="dx_nutrition" rows="1" readonly>{{ old('dx_nutrition') }}</textarea>
                        </div>

                        <div class="form-group col-md-6 col-lg-4 col-xl-4 col-s-12">
                          <label for="especialty">Especialidad</label>
                          <input type="text" name="especialty" class="form-control" value="{{ old('especialty') }}">
                        </div>

                        <div class="form-group col-sm-12 col-lg-3 col-xl-3 col-s-12">
                          <label for="induction_date_start">Inicio de inducción</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                          <input type="date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask name="induction_date_start" id="induction_date_start" value="{{ old('induction_date_start', date('Y-m-d')) }}">
                          </div>
                        </div>

                        <div class="form-group col-sm-12 col-lg-3 col-xl-3 col-s-12">
                          <label for="induction_date_end">Fin de induccción</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                          <input type="date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask name="induction_date_end" id="induction_date_end" value="{{ old('induction_date_end', date('Y-m-d')) }}">
                          </div>
                        </div>

                        <div class="form-group col-md-6 col-lg-3 col-xl-3 col-s-12">
                          <label for="induction_place">Lugar de inducción</label>
                          <input type="text" name="induction_place" class="form-control" value="{{ old('induction_place') }}">
                        </div>

                        <div class="form-group col-md-6 col-lg-3 col-xl-3 col-s-12">
                          <label for="medic_center">Centro médico</label>
                          <input type="text" name="medic_center" class="form-control" value="{{ old('medic_center') }}">
                        </div>
                        
                        <div class="form-group col-md-6 col-lg-3 col-xl-3 col-s-12">
                          <label for="medic_aptitud">APTITUD MEDICA</label>
                          <select class="form-control select2" data-style="btn-success" name="medic_aptitud">
                            <option value="MEDICAMENTE APTO">MEDICAMENTE APTO</option>
                            <option value="MEDICAMENTE NO APTO">MEDICAMENTE NO APTO</option>
                            <option value="APTO CON RESTRICCIÓN">APTO CON RESTRICCIÓN</option>
                            <option value="APTO CON RECOMENDACIÓN">APTO CON RECOMENDACIÓN</option>
                            <option value="EVALUADO">EVALUADO</option>
                            <option value="OBSERVADO">OBSERVADO</option>
                            <option value="SIN APTITUD">SIN APTITUD</option>
                          </select>
                        </div>

                        <div class="form-group col-md-6 col-lg-3 col-xl-3 col-s-12">
                          <label for="medium">DONDE SE ENTERO DE LA ENTREVISTA</label>
                          <select class="form-control select2" data-style="btn-success" name="medium">
                            <option value="FACEBOOK">FACEBOOK</option>
                            <option value="COMPUTRABAJO">COMPUTRABAJO</option>
                            <option value="INDEED">INDEED</option>
                            <option value="AMIGOS">AMIGOS</option>
                            <option value="FAMILIARES">FAMILIARES</option>
                            <option value="LLAMADA">LLAMADA</option>
                            <option value="RECOMENDACION">RECOMENDACIÓN</option>
                            <option value="ING. CARASONA">ING. CARASONA</option>
                          </select>
                        </div>
                      </div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                      <div class="row text-center">

                        <div class="form-group col-sm-12 col-lg-3 col-xl-3 col-s-12">
                          <label for="date_up_obs">Levantamiento de observación</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                          <input type="date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask name="date_up_obs" id="date_up_obs" value="{{ old('date_up_obs', date('Y-m-d')) }}">
                          </div>
                        </div>
                        
                        <div class="form-group col-12 col-sm-12 col-md-5 col-xl-5 col-lg-5">
                          <label>Observaciones</label>
                          <textarea name="observations" id="observations" rows="1" class="form-control">{{ old('observations') }}</textarea>
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-4 col-xl-4 col-lg-4">
                          <label>Comentarios</label>
                          <textarea name="comments" id="comments" rows="1" class="form-control">{{ old('comments') }}</textarea>
                        </div>

                        <div class="col-5">
                          <label for="photo1">Foto</label>
                          <input type="file" name="photo_up" id="photo1" data-initial-preview="{{ isset($data->image) ? Storage::url("collaborators/photo/$data->image") : "http://lorempixel.com/output/people-q-c-640-480-3.jpg" }}" accept="image/*" />                                    
                        </div>
                      </div>
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

@section('ScriptInputfile')
    <script src="{{ asset('bootstrap-fileinput/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('bootstrap-fileinput/js/locales/es.js') }}"></script>
    <script src="{{ asset('bootstrap-fileinput/themes/fas/theme.min.js') }}"></script>
    <script src="{{ asset('js/photo.js') }}"></script>
    <script src="{{ asset('js/province.js') }}"></script>
    <script src="{{ asset('js/imc.js') }}"></script>
@endsection