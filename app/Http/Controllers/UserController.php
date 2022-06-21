<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UserController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('users.users');
    }


    public function create()
    {
        //
    }

    public function list(): JsonResponse
    {
        return response()->json([
            'users' => User::latest()->get()
        ], ResponseAlias::HTTP_OK);
    }

    public function store(Request $request): JsonResponse
    {
        $user = User::create($request->post());
        return response()->json([
            'user' => $user
        ]);
    }

    public function show(User $user): JsonResponse
    {
        return response()->json($user);
    }


    public function edit($id)
    {
        return view('users.edit');
    }


    public function update(\http\Env\Request $request, User $user): JsonResponse
    {
        $user->fill($request->post()->save());
        return response()->json([
            'user' => $user
        ]);
    }


    public function destroy(User $user): JsonResponse
    {
        $user->delete();
        return response()->json([
            'message' => 'Usuari eliminat'
        ]);
    }
}
