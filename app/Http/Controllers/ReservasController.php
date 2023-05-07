<?php

namespace App\Http\Controllers;

use App\Http\Requests\FazerReservasRequest;
use App\Models\Reservas;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservasController extends Controller
{
    private $entity;

    public function __construct(Reservas $reservas)
    {
        $this->entity = $reservas;
    }
    public function fazerReserva(FazerReservasRequest $request)
    {


        try{
            $result = $this->entity
                ->where('hora', $request->hora)
                ->where('data',$request->data)
                ->where('mesa_id',$request->mesa_id)
                ->first();

            $validaData = new Carbon($request->data);

            if($result){
                return response()->json(['error' =>'Mesa já reservada'], 404);
            }

            if($validaData->isSunday()){
                return response()->json(['error' =>'Dia de domingo não funcionamos'], 404);
            }

            $reserva = $this->entity->create($request->all());
            return response()->json(['data' => $reserva], 204);
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    public function listarReservas(Request $request){
        try{
            $result = $this->entity->with('user','mesas')->paginate();


            return response()->json(['data' => $result], 200);
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

}
