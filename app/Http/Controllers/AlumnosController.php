<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Carrera;

class AlumnosController extends Controller
{
    public function index() {
        $alumnos = Alumno::all();

        $argumentos = array();
        $argumentos['alumnos'] = $alumnos;

        return view('alumnos.index',$argumentos);
    }

    public function create() {
        $argumentos = array();
        $carreras = Carrera::all();
        $argumentos['carreras'] = $carreras;
        return view('alumnos.create', $argumentos);
    }

    public function store(Request $request) {
        $nuevoAlumno = new Alumno();
        $nuevoAlumno->nombre = $request->input('nombre');
        $nuevoAlumno->id_carrera = $request->input('carrera');
        $foto = $request->file('foto');
        if ($foto) {
            $nuevoAlumno->foto = $foto->hashName();
            $foto->store('public/fotos');
            
        }
        $nuevoAlumno->save();
        return redirect()->route('alumnos.index')
            ->with('exito','Alumno creado exitosamente');
    }

    //Estamos recibiendo parámetros de ruta a través de
    //parámetros de función
    public function edit($id) {
        $alumno = Alumno::find($id);
        $carreras = Carrera::all();
        $argumentos = array();
        $argumentos['alumno'] = $alumno;
        $argumentos['carreras'] = $carreras;
        return view('alumnos.edit',$argumentos);
    }

    public function update(Request $request,$id) {
        //busca al alumno
        $alumno = Alumno::find($id);
        //Actualiza sus datos en base a los valores del form
        $alumno->nombre = $request->input('nombre');
        $alumno->id_carrera = $request->input('carrera');
        $foto = $request->file('foto');
        if ($foto) {
            $alumno->foto = $foto->hashName();
            $foto->store('public/fotos');
            
        }
        $alumno->save();
        return redirect()->route('alumnos.edit',$id)
            ->with('exito','El alumno se ha actualizado exitosamente');
    }

    public function delete($id) {
        $alumno = Alumno::find($id);

        $argumentos = array();
        $argumentos['alumno'] = $alumno;

        return view('alumnos.delete',$argumentos);
    }

    public function destroy(Request $request, $id) {
        $alumno = Alumno::find($id);
        $feedback = "Se elimino correctamenta a: " . $alumno->nombre;
        $alumno->delete();
        return redirect()->route('alumnos.index')
            ->with('exito',$feedback);
    }

    public function prueba() {
        return view('prueba');
    }

    
}
