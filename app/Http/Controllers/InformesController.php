<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Profip\Repositories\InformeRepository as Informe;
use App\TipoTramite;
use App\User;
use App\Multa;
use App\Patente;

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
        return view('informe.show', compact('informe'));
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
        $multas = $this->multa->where('vehiculo_id', $informe->vehiculo_id)->get();
        //$patentes = $this->patente->where('vehiculo_id', $informe->vehiculo_id)->get();
        
        return view('informe.edit', compact('informe', 'conceptos', 'multas'));
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
}
