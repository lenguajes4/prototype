<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class GestoresController extends Controller
{
    protected $user = null;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gestores = $this->user->where('rol_id', 4)->get();
        //harcodeado rol 4 de gestor

        return view('gestor.index', compact('gestores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->user->getRules('gestor_create'));

        $data = $request->all();
        $data['nombre'] = ucfirst($request->nombre);
        $data['apellido'] = ucfirst($request->apellido);
        $data['nickname'] = substr($request->nombre, 0, 1).$request->apellido.substr($request->dni, -3, 3);
        $data['password'] = bcrypt('123456');
        $data['registro_id'] = 1;
        $data['rol_id'] = 4;
        $data['image_path'] = 'img/user.png';

        $gestor = $this->user->create($data);
        
        return redirect()
            ->route('gestor.index')
            ->with('success', 'Gestor agregado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gestor = $this->user->find($id);
        return view('gestor.show', compact('gestor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gestor = $this->user->find($id);
        return view('gestor.edit', compact('gestor'));
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
        $gestor = $this->user->find($id);
        $rules = $this->user->getRules('gestor_update') +
            [
                'dni' => 'required|integer|min:1000000|unique:usuarios,dni,'.$gestor->id,
                'matricula' => 'required|string|unique:usuarios,matricula,'.$gestor->id,
                'email' => 'required|email|unique:usuarios,email,'.$gestor->id
            ];

        $this->validate($request, $rules);
        
        $gestor->fill($request->all());
        $gestor->save();

        return redirect()
            ->route('gestor.index')
            ->with('success', 'Gestor modificado correctamente.');

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
     * Muestra dashboard para gestores.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('gestor.dashboard.index');
    }

    /**
     * Muestra dashboard para gestores con trámites publicados.
     *
     * @return \Illuminate\Http\Response
     */
    public function tramites()
    {
        $informes = Auth::user()->informe->where('estado_tramite_id', 2);
        //@TODO harcodeado estado publicado

        return view('gestor.dashboard.tramites', compact('informes'));
    }

    /**
     * Muestra dashboard para gestores con trámites publicados.
     *
     * @return \Illuminate\Http\Response
     */
    public function concluidos()
    {
        $informes = Auth::user()->informe->where('estado_tramite_id', 3);
        //@TODO harcodeado estado concluido

        return view('gestor.dashboard.concluidos', compact('informes'));
    }

    /**
     * Muestra informe especifico al gestor.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showInforme($id)
    {
        $informe = \App\Informe::find($id);
        $conceptos = $informe->conceptos;
        $multas = $informe->vehiculo->multas->sortBy('jurisdiccion_id');
        $patentes = $informe->vehiculo->patentes->sortBy('jurisdiccion_id')->sortBy('year');

        return view('gestor.dashboard.informe', compact('informe', 'conceptos', 'multas', 'patentes'));
    }
}
