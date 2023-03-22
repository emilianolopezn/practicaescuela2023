<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar alumno</title>
</head>
<body>
    <h1> Editar alumno </h1>
    @if(Session::has('exito'))
        <p>{{Session::get('exito')}}</p>
    @endif
    <a href="{{route('alumnos.index')}}">Volver a la lista de alumnos</a>
    <form action="{{route('alumnos.update',$alumno->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            <label>Nombre: </label>
            <input type="text" name="nombre" value="{{$alumno->nombre}}">
        </div>
        <div>
            <select name="carrera">
                <option value="" disabled>Selecciona una carrera</option>
                @foreach($carreras as $carrera)
                    <option @if($alumno->id_carrera == $carrera->id) selected @endif value="{{$carrera->id}}">{{$carrera->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label >Foto de perfil:</label>
            <input type="file" name="foto">
        </div>
        <div>
            @if($alumno->foto)
                <img src="/storage/fotos/{{$alumno->foto}}" alt="">
            @endif
        </div>
        <div>
            <button type="submit">Actualizar alumno</button>
        </div>
    </form>

</body>
</html>