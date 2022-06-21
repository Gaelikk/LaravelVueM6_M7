<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class GameController extends Controller
{
    public function index(): Application|Factory|View
    {
        return view('games.games');
    }

    public function list(): JsonResponse
    {
        return response()->json([
            'games' => Game::latest()->get()
        ], ResponseAlias::HTTP_OK);
    }

    public function create()
    {
        //
    }


    public function store(Request $request): JsonResponse
    {
        $game = Game::create($request->post());
        return response()->json([
            'game' => $game
        ]);
    }

    public function show(Game $game): JsonResponse
    {
        return response()->json($game);
    }


    public function edit($id)
    {
        return view('games.edit');
    }


    public function update(\http\Env\Request $request, Game $game): JsonResponse
    {
        $game->fill($request->post()->save());
        return response()->json([
            'game' => $game
        ]);
    }


    public function destroy(Game $game): JsonResponse
    {
        $game->delete();
        return response()->json([
            'message' => 'Joc eliminat'
        ]);
    }
}
