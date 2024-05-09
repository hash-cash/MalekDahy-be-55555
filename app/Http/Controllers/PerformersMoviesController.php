<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Performers;
use App\Models\PerformersMovies;
use App\Models\Movies;

class PerformersMoviesController extends Controller
{
    public function index()
    {
        $data = PerformersMovies::all();

        return response()->json($data, 200);
    }

    public function show($id)
    {
        $each = PerformersMovies::where('name', '=', $id)->get();
        $movies = collect();
        foreach ($each as $e) {
            $s = Movies::find($e["movie_id"]);
            $movies->add($s);
        }

        return response()->json($movies, 200);
    }

    public function store(Request $request)
    {
        $movie = Movies::whereRaw('lower(title) like (?)',["%{$request["movie_name"]}%"])->get();

        $save = collect();
        $save["movie_id"] = $movie[0]["id"];
        $save["name"] = $request["name"];

        $data = PerformersMovies::create($save->all());

        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $performersMovies = PerformersMovies::findOrFail($id);

        $data = $performersMovies->update($request->all());

        return response()->json($data, 200);
    }

    public function delete(Request $request, $id)
    {
        $performersMovies = PerformersMovies::findOrFail($id);
        $performersMovies->delete();

        return response()->json('Timeslot successfully deleted.', 204);
    }
}
