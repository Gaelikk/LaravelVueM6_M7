<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Game;
use App\Models\Room;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function all(): Factory|View|Application
    {
        return view("books/books", ["books" => Book::all(), "user" => Auth::user()]);
    }

    public function getBook(): Factory|View|Application
    {
        $books = Book::where('id', auth()->id())->get();

        return view("books/books", compact('books'));
    }

    public function createBook(): Factory|View|Application
    {
        return view("books/create", ["rooms" => Room::all(), "games" => Game::all(), "users" => User::all(), "user" => Auth::user()]);
    }

    public function store(Request $request, $id): Redirector|Application|RedirectResponse
    {
        $this->validate($request, [
            'user' => 'required',
            'phone' => 'required|min:9|max:10',
            'country' => 'required',
            'date' => 'required',
            'game' => 'required',
            'room' => 'required',
        ]);
        $data = $request->all();
        $data['user_id'] = $id;
        Book::create($data);
        return redirect('/books');
    }

    public function edit($id): Factory|View|Application
    {
        return view('books/edit', [
            "user" => Auth::user(),
            'book' => Book::findOrFail($id),
            "rooms" => Room::all(),
            "games" => Game::all(),
            "users" => User::all(),
        ]);
    }

    public function update($id, Request $request): Redirector|Application|RedirectResponse
    {
        $this->validate($request, [
            'user' => 'required',
            'phone' => 'required|min:9|max:10',
            'country' => 'required',
            'date' => 'required',
            'game' => 'required',
            'room' => 'required',
        ]);
        $book = Book::find($id);
        $book->user = $request->user;
        $book->phone = $request->phone;
        $book->country = $request->country;
        $book->date = $request->date;
        $book->room = $request->room;
        $book->game = $request->game;
        $book->save();
        return redirect('books');
    }

    public function delete($id): Redirector|Application|RedirectResponse
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect('books');
    }
}
