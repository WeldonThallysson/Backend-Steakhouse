<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastroUsuarioRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private $entity;

    public function __construct(User $user)
    {
        $this->entity = $user;
    }

    public function login(Request $request){
        $user = $this->entity->where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => 'Credenciais invalidas'
            ], 401);
        }

        $token = $user->createToken('primeirotoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response,200);
    }
    public function cadastroUsuario(CadastroUsuarioRequest $request){
        try{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return response()->json(['data' => $user],202);
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }
}
