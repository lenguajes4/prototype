<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Vehiculo;
use App\Provincia;
use App\Informe;

class BajasController extends Controller
{
    protected $vehiculo = null;
    protected $provincia = null;
    protected $informe = null;
    
    public function __construct(
        Vehiculo $vehiculo,
        Provincia $provincia,
        Informe $informe
    )
    {
        $this->vehiculo = $vehiculo;
        $this->provincia = $provincia;
        $this->informe = $informe;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->vehiculo->getRules());
        $data = $request->all();
        $data['fecha_baja'] = $this->getDate($request->fecha_baja);

        $this->vehiculo->fill($data);


        return redirect()
            ->route('informe.edit', $request->informe_id)
            ->with('success', 'Solicitud de baja agregada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($informe_id)
    {
        $provincias = $this->provincia->pluck('nombre', 'id')->toArray();
        $informe = $this->informe->find($informe_id);

        return view('baja.form', compact('provincias', 'informe'));
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
        //
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
     * Transforma $input en formato válido de fecha.
     *
     * @return Response
     */
    protected function getDate($input)
    {
        return !$input? null : Carbon::createFromFormat('d/m/Y', $input);
    }
}
