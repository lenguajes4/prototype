<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Multa;
use App\Jurisdiccion;
//use App\Vehiculo;
use App\Informe;

class MultasController extends Controller
{
    protected $multa = null;
    protected $jurisdiccion = null;
    //protected $vehiculo = null;
    protected $informe = null;
    
    public function __construct(
        Multa $multa,
        Jurisdiccion $jurisdiccion,
        //Vehiculo $vehiculo,
        Informe $informe
    )
    {
        $this->multa = $multa;
        $this->jurisdiccion = $jurisdiccion;
        //$this->vehiculo = $vehiculo;
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

        return view('multas.create', compact('jurisdicciones', 'informe_id', 'vehiculo_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->multa->getRules());
        $this->multa->create($request->all());

        return redirect()
            ->route('informe.edit', $request->informe_id)
            ->with('success', 'Acta agregada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($informe_id, $multa_id)
    {
        $multa = $this->multa->find($multa_id);

        return view('multas.destroy', compact('multa', 'informe_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($informe_id, $multa_id)
    {
        $multa = $this->multa->find($multa_id);
        $jurisdicciones = $this->jurisdiccion->pluck('nombre', 'id')->toArray();

        return view('multas.edit', compact('multa', 'jurisdicciones', 'informe_id'));
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
        $multa = $this->multa->find($id);
        $multa->fill($request->all());
        $multa->save();

        return redirect()
            ->route('informe.edit', $request->informe_id)
            ->with('success', 'Acta actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $multa = $this->multa->find($id);
        $multa->delete();

        return redirect()
            ->route('informe.edit', $request->informe_id)
            ->with('success', 'Acta eliminada correctamente.');
    }
}
