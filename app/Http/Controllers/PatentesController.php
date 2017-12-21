<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patente;
use App\Jurisdiccion;
use App\Informe;

class PatentesController extends Controller
{
    protected $patente = null;
    protected $jurisdiccion = null;
    protected $informe = null;
    
    public function __construct(
        Patente $patente,
        Jurisdiccion $jurisdiccion,
        Informe $informe
    )
    {
        $this->patente = $patente;
        $this->jurisdiccion = $jurisdiccion;
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
    public function create($informe_id)
    {
        $vehiculo_id = $this->informe->find($informe_id)->vehiculo_id;
        $jurisdicciones = $this->jurisdiccion->pluck('nombre', 'id')->toArray();

        return view('patentes.create', compact('jurisdicciones', 'informe_id', 'vehiculo_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->patente->getRules());
        $data = $request->all();
        $data['periodos'] = json_encode($request->periodos);
        $this->patente->create($data);

        return redirect()
            ->route('informe.edit', $request->informe_id)
            ->with('success', 'Periodos agregados correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($informe_id, $patente_id)
    {
        $patente = $this->patente->find($patente_id);

        return view('patentes.destroy', compact('patente', 'informe_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($informe_id, $patente_id)
    {
        $patente = $this->patente->find($patente_id);
        $jurisdicciones = $this->jurisdiccion->pluck('nombre', 'id')->toArray();

        return view('patentes.edit', compact('patente', 'jurisdicciones', 'informe_id'));
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
        $this->validate($request, $this->patente->getRules());
        $data = $request->all();
        $data['periodos'] = json_encode($request->periodos);

        $patente = $this->patente->find($id);
        $patente->fill($data);
        $patente->save();

        return redirect()
            ->route('informe.edit', $request->informe_id)
            ->with('success', 'Periodos actualizados correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $patente = $this->patente->find($id);
        $patente->delete();

        return redirect()
            ->route('informe.edit', $request->informe_id)
            ->with('success', 'Periodos eliminados correctamente.');
    }
}
