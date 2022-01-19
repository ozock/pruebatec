<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\TipoTercero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DarDatosController extends Controller
{


    public function datosTipo()
    {

        $tipo = TipoTercero::all();

        $depto = Departamento::all();
        //Paso datos de los tipos de tercero a la vista
        return view('terceros/registrar', compact('tipo', 'depto'));
    }

    public function darMun(Request $request)
    {

        if ($request->ajax()) {

            $dp =  $request->dpto;
            $tipo = Municipio::where('iddepa', $dp)->get();

            foreach ($tipo as $t) {

                $valor = $t->id;
                $nombre = $t->nombmuni;

                echo "<option value='$valor'>$nombre</option>";
            }
        }
    }

    public function datosTerceros()
    {

        $consulta = DB::table('tercero')->select(
            'tercero.id',
            'tipoidentificacion',
            'numeroidentificacion',
            'tipotercero',
            'nombre1',
            'nombre2',
            'apellido1',
            'apellido2',
            'iddepartamento',
            'idmunicipio',
            'nombtipo',
            'nomdepa',
            'nombmuni',
            'iddepa'
        )
            ->join('tipotercero', 'tercero.tipotercero', "=", 'tipotercero.id')
            ->join('departamento', 'tercero.iddepartamento', "=", 'departamento.id')
            ->join('municipio', 'tercero.idmunicipio', "=", 'municipio.id')
            ->get();
            
            $tipo = TipoTercero::all();

            $depto = Departamento::all();
            
        return view('terceros/gestionar', compact('consulta','tipo','depto'));


    }

    public function darTercero(Request $request)
    {
        if ($request->ajax()) {

            $id = $request->id;

            $buscar = DB::table('tercero')->select(
                'tercero.id',
                'tipoidentificacion',
                'numeroidentificacion',
                'tipotercero',
                'nombre1',
                'nombre2',
                'apellido1',
                'apellido2',
                'iddepartamento',
                'idmunicipio',
                'nombtipo',
                'nomdepa',
                'nombmuni',
                'iddepa'
            )
                ->join('tipotercero', 'tercero.tipotercero', "=", 'tipotercero.id')
                ->join('departamento', 'tercero.iddepartamento', "=", 'departamento.id')
                ->join('municipio', 'tercero.idmunicipio', "=", 'municipio.id')->where('tercero.id',$id)
                ->get();



                return json_encode($buscar);
        }
    }

}
