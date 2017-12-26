<?php namespace Profip\Repositories;

use App\Informe;
use App\Vehiculo;
use Carbon\Carbon;
use Auth;
use DB;

class InformeRepository
{
    protected $informe;

    public $rules = [
        'create' => [
            'numero_tramite' => 'required|integer|unique:informes',
            'tipo_tramite_id' => 'required|integer',
            'usuario_id' => 'required|integer',
            'registro_id' => 'required|integer'
        ],
        'update_observaciones' => [
            'observaciones' => 'required|string'
        ],
        'update_baja' => [
            'provincia_baja_id' => 'required|integer',
            'municipio_baja' => 'required|string',
            'fecha_baja' => 'required|date'
        ],
    ];

    public function __construct(Informe $informe)
    {
        $this->informe = $informe;
    }

    public function store($data)
    {
        $informe = null;
        $vehiculo = null;

        if (isset($data['dominio']) && $data['tipo_tramite_id'] != 1) {
            $vehiculo = Vehiculo::where('dominio', $data['dominio'])->first();
            $data['dominio'] = strtoupper($data['dominio']);
        } else {
            $data['dominio'] = 'N/D (0 Km)';
        }
        
        DB::transaction(function () use (&$data, &$informe, $vehiculo) {
            if (! $vehiculo) {
                $vehiculo = Vehiculo::create([
                    'dominio' => $data['dominio'],
                    'tipo_vehiculo_id' => 1
                ]);
            }

            $data['vehiculo_id'] = $vehiculo->id;
            $data['estado_tramite_id'] = 1;
            $informe = $this->informe->create($data);
        });

        return $informe;
    }

    public function find($id)
    {
        return $this->informe->find($id);
    }

    public function get()
    {
        return $this->informe->orderBy('created_at', 'desc')->get();
    }
}
