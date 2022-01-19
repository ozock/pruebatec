<?php

namespace App\Http\Controllers;

use App\Models\Tercero;
use Illuminate\Http\Request;

class EliminarDatosController extends Controller
{
    public function eliminarTercero()
    {
        $id = request()->input('id');

        $tercero = Tercero::where('id', '=', $id)->first();

        $tercero->delete();

        $info = "El tercero se ha eliminado exitosamente";

        return redirect('/registrar')->with('status', $info);

    }
}
