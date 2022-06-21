<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Review;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function all(): Factory|View|Application
    {
        return view("reviews/reviews", ["reviews" => Review::all(), "user" => Auth::user()]);
    }

    public function createReview(): Factory|View|Application
    {
        return view("reviews/create", ['games' => Game::all(), "user" => Auth::user()]);
    }

    public function store(Request $request, $id): Redirector|Application|RedirectResponse
    {
        $this->validate($request, [
            'user' => 'required',
            'rating' => 'required',
            'comment' => 'required|min:10|max:200',
            'game' => 'required',
        ]);

        $data = $request->all();
        $data['user_id'] = $id;
        Review::create($data);
        return redirect('/reviews');
    }

    public function delete($id): Redirector|Application|RedirectResponse
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return redirect('reviews');
    }
}
