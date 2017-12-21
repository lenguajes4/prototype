<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Concepto;

class ConceptosController extends Controller
{
    protected $concepto = null;
    
    public function __construct(Concepto $concepto)
    {
        $this->concepto = $concepto;
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
    public function create($id)
    {
        return view('conceptos.create', ['informe_id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->concepto->getRules());
        $data = $request->all();
        $data['nombre'] = ucfirst($request->nombre);
        $this->concepto->create($data);

        return redirect()
            ->route('informe.edit', $request->informe_id)
            ->with('success', 'Concepto agregado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $concepto = $this->concepto->find($id);

        return view('conceptos.destroy', compact('concepto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $concepto = $this->concepto->find($id);

        return view('conceptos.edit', compact('concepto'));
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
        $concepto = $this->concepto->find($id);
        $data = $request->all();
        $data['nombre'] = ucfirst($request->nombre);
        $concepto->fill($data);
        $concepto->save();

        return redirect()
            ->route('informe.edit', $concepto->informe_id)
            ->with('success', 'Conceptos actualizadas correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $concepto = $this->concepto->find($id);
        $informe_id = $concepto->informe_id;
        $concepto->delete();

        return redirect()
            ->route('informe.edit', $informe_id)
            ->with('success', 'Concepto eliminado correctamente.');
    }
}
