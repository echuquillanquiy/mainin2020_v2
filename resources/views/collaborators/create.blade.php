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



        
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-lg">Registrar</button>
            <a href="{{ url('collaborators') }}" class="btn btn-danger btn-lg text-white">Cancelar</a>
        </div>
    </form>   
</div>

@endsection