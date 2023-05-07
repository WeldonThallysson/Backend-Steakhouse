<?php

namespace App\Http\Controllers;

use App\Models\Mesas;
use Illuminate\Http\Request;

class MesasController extends Controller
{
    private $entity;

    public function __construct(Mesas $mesas)
    {
        $this->entity = $mesas;
    }

    public function index()
    {
        try{
            $mesas = $this->entity->all();
            return response()->json(['data' => $mesas],202);
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }


}
