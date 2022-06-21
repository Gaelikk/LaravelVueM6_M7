<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Review;
use App\Models\Room;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class MenuController extends Controller
{
    public function all(): Factory|View|Application
    {
        return view("/menu", ["games" => Game::all(), "books" => Room::all()]);
    }
}
