<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Consulta;
use App\Informe;

class ConsultasController extends Controller
{
    protected $consulta = null;
    protected $informe = null;
    protected $byReg = null;

    public function __construct(Consulta $consulta, Informe $informe)
    {
        $this->consulta = $consulta;
        $this->informe = $informe;

        $this->middleware(function ($request, $next) {
            $this->byReg = $this->consulta->where('registro_id', \Auth::user()->registro_id);
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $consultas = $this->byReg->paginate(20);

        if ($request->ajax()) {
            return response()->json(view('consultas.load', compact('consultas'))->render());
        }

        return view('consultas.inbox', compact('consultas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $informe = $this->informe->find($id);
        return view('gestor.dashboard.consultar', compact('informe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $informe = $this->informe->find($request->informe_id);
        $data = $request->all();

        if ($request->file('path')) {
            $date = Carbon::now()->format('Y_m_d_h_i_s');
            $file = $request->file('path');
            $ext = '.'.$file->getClientOriginalExtension();
            $registro = $informe->registro->codigo;
            $tramite = $informe->numero_tramite;
            $data['path'] = $registro.'_'.$tramite.'_'.$date.$ext;
            \Storage::disk('local')->put($data['path'], \File::get($file));
        }
        $data['registro_id'] = $informe->registro_id;
        
        $this->consulta->create($data);

        return redirect()
            ->route('gestor.showInforme', $informe->id)
            ->with('success', 'Consulta enviada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consulta = $this->consulta->find($id);

        return view('consultas.show', compact('consulta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPendientes(Request $request)
    {
        $consultas = $this->byReg->estado(1)->paginate(20);

        if ($request->ajax()) {
            return response()->json(view('consultas.load', compact('consultas'))->render());
        }

        return view('consultas.pendientes', compact('consultas'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showBorrador(Request $request)
    {
        $consultas = $this->byReg->estado(2)->paginate(20);

        if ($request->ajax()) {
            return response()->json(view('consultas.load', compact('consultas'))->render());
        }

        return view('consultas.borrador', compact('consultas'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showRespondidas(Request $request)
    {
        $consultas = $this->byReg->estado(3)->paginate(20);

        if ($request->ajax()) {
            return response()->json(view('consultas.load', compact('consultas'))->render());
        }

        return view('consultas.respondidas', compact('consultas'));
    }
}
