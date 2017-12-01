<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Profip\Repositories\InformeRepository as Informe;
use App\TipoTramite;
use App\User;
use App\Multa;
use App\Patente;
use Carbon\Carbon;

class InformesController extends Controller
{
    protected $informe = null;
    protected $tipo = null;
    protected $usuario = null;
    protected $multa = null;
    protected $patente = null;

    public function __construct(
        Informe $informe,
        TipoTramite $tipo,
        User $usuario,
        Multa $multa,
        Patente $patente
    )
    {
        $this->informe = $informe;
        $this->tipo = $tipo;
        $this->usuario = $usuario;
        $this->multa = $multa;
        $this->patente = $patente;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informes = $this->informe->get();
        
        return view('informe.index', compact('informes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gestores = [];
        $this->usuario->where('rol_id', 4)->get()->each(function ($item, $key) use (&$gestores) {
            $gestores[$item->id] = $item->apellido.', '.$item->nombre;
        });

        $tipos = $this->tipo->pluck('nombre', 'id')->toArray();
        
        return view('informe.create', compact('tipos', 'gestores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->informe->rules['create']);
        $informe = $this->informe->store($request->all());
        
        return redirect()
            ->route('informe.edit', [$informe->id])
            ->with('success', 'Informe agregado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $informe = $this->informe->find($id);
        $conceptos = $informe->conceptos;
        $multas = $this->multa->where('vehiculo_id', $informe->vehiculo_id)->get();
        $patentes = $this->patente->where('vehiculo_id', $informe->vehiculo_id)->get();

        
        return view('informe.show', compact('informe', 'conceptos', 'multas', 'patentes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $informe = $this->informe->find($id);
        $conceptos = $informe->conceptos;

        $multas = $this->multa
            ->where('vehiculo_id', $informe->vehiculo_id)
            ->orderBy('jurisdiccion_id')
            ->get();

        $patentes = $this->patente
            ->where('vehiculo_id', $informe->vehiculo_id)
            ->orderBy('jurisdiccion_id')
            ->orderBy('year')
            ->get();
        
        return view('informe.edit', compact('informe', 'conceptos', 'multas', 'patentes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $informe = $this->informe->find($id);
        $informe->fill($request->all());
        $informe->save();

        return redirect()
            ->route('informe.edit', $id)
            ->with('success', 'Observaciones actualizadas correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Carga formulario para editar la solicitud de baja.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editBaja($informe_id)
    {
        $provincias = \App\Provincia::pluck('nombre', 'id')->toArray();
        $informe = $this->informe->find($informe_id);

        return view('baja.form', compact('provincias', 'informe'));
    }

    /**
     * Actualiza datos de la solicitud de baja.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateBaja(Request $request)
    {
        $this->validate($request, $this->informe->rules['update_baja']);
        $data = $request->all();
        $data['fecha_baja'] = $this->getDate($request->fecha_baja);
        $data['municipio_baja'] = ucfirst($request->municipio_baja);
        
        $vehiculo = $this->informe->find($request->informe_id)->vehiculo;
        $vehiculo->fill($data);
        $vehiculo->save();

        return redirect()
            ->route('informe.edit', $request->informe_id)
            ->with('success', 'Solicitud de baja agregada correctamente.');

    }

    /**
     * Carga formulario para editar la solicitud de baja.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showBaja($informe_id)
    {
        $informe = $this->informe->find($informe_id);

        return view('baja.destroy', compact('informe'));
    }

    /**
     * Carga formulario para editar la solicitud de baja.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyBaja(Request $request)
    {
        $vehiculo = $this->informe->find($request->informe_id)->vehiculo;
        $vehiculo->provincia_baja_id = null;
        $vehiculo->municipio_baja = null;
        $vehiculo->fecha_baja = null;
        $vehiculo->baja_requerida = false;
        $vehiculo->save();

        return redirect()
            ->route('informe.edit', $request->informe_id)
            ->with('success', 'Solicitud de baja eliminada correctamente.');
    }

    /**
     * Transforma $input en formato válido de fecha.
     *
     * @return Response
     */
    protected function getDate($input)
    {
        return !$input? null : Carbon::createFromFormat('d/m/Y', $input);
    }
}
