<?php

namespace App\Http\Controllers;

use App\Models\Tercero;
use Illuminate\Http\Request;

class RegistrarDatosController extends Controller
{
    public function registrar()
    {

        request()->validate([
            'tipodoc' => 'required',
            'numdoc' => 'required',
            'tipotercero' => 'required',
            'nombre1' => 'required',
            'apellido1' => 'required',
            'dpto' => 'required',
            'munc' => 'required'
        ]);

        $tipodoc = request()->input('tipodoc');
        $numdoc = request()->input('numdoc');
        $tipotercero = request()->input('tipotercero');
        $nombre1 = request()->input('nombre1');
        $nombre2 = request()->input('nombre2');
        $apellido1 = request()->input('apellido1');
        $apellido2 = request()->input('apellido2');
        $dpto = request()->input('dpto');
        $munc = request()->input('munc');

        $tercero = new Tercero();

        $tercero->tipoidentificacion = $tipodoc;
        $tercero->numeroidentificacion = $numdoc;
        $tercero->tipotercero = $tipotercero;
        $tercero->nombre1 = $nombre1;
        $tercero->nombre2 = $nombre2;
        $tercero->apellido1 = $apellido1;
        $tercero->apellido2 = $apellido2;
        $tercero->iddepartamento = $dpto;
        $tercero->idmunicipio = $munc;

        $tercero->save();

        $info = "El tercero se ha guardado exitosamente";
        
        return redirect('/registrar')->with('status', $info);

    }
}
