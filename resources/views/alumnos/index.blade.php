@extends('base')
@section('titulo','Alumnos')
@section('contenido')
<div class="row">
    <div class="col-lg-12">
    <div class="card">
        <div class="card-body">
        <h5 class="card-title">Lista de alumnos</h5>
        @if(Session::has('exito'))
        <p>{{Session::get('exito')}}</p>
        @endif
        <div class="text-right">
        <a class="btn btn-sm btn-primary" href="{{route('alumnos.create')}}">Crear alumno</a>
        </div>
    
    <table class="table table-hover"> 
        <thead>
            <tr>
                <th> Nombre</th>
                <th>Acciones</th>
            </tr>
            <tbody>
                @foreach($alumnos as $alumno)
                <tr>
                    <td>{{$alumno->nombre}}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{route('alumnos.edit',$alumno->id)}}"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger btn-sm" href="{{route('alumnos.delete',$alumno->id)}}"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </thead>
    </table>
        


        </div>
    </div>

 
    </div>

</div>
    
@endsection