<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Room;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class RoomController extends Controller
{
    public function all(): Factory|View|Application
    {
        return view("rooms/rooms", ["rooms" => Room::all()]);
    }

    public function createRoom(): Factory|View|Application
    {
        return view("rooms/create", ["games" => Game::all()]);
    }

    public function store(Request $request): Redirector|Application|RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'organization' => 'required|max:255',
            'image' => 'required',
            'game' => 'required',
        ]);
        Room::create($validatedData);

        return redirect('/rooms');
    }

    public function edit($id): Factory|View|Application
    {
        return view('rooms/edit', ['room' => Room::findOrFail($id), "games" => Game::all()]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'organization' => 'required',
            'image' => 'required',
            'game' => 'required',
        ]);
        $room = Room::find($id);
        $room->name = $request->name;
        $room->organization = $request->organization;
        $room->image = $request->image;
        $room->game = $request->game;
        $room->save();

        return redirect('rooms');
    }

    public function delete($id): Redirector|Application|RedirectResponse
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect('rooms');
    }
}
