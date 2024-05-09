<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Performers;
use App\Models\PerformersMovies;
use App\Models\Movies;

class PerformersController extends Controller
{
    public function index()
    {
        $data = Performers::all()->unique();

        //Calculate the count of movies and total views for each performer
        foreach ($data as $d) {
            $sum = 0;
            $each = PerformersMovies::where('name', '=', $d["name"])->get();
            foreach ($each as $e) {
                $s = Movies::find($e["movie_id"]);
                $sum += $s["views"];
            }
            $d["sum"] = $sum;
            $d["count"] = count(PerformersMovies::where('name', '=', $d["name"])->get());
        }

        return response()->json($data, 200);
    }

    public function show($id)
    {
        $data = Performers::find($id);
        $sum = 0;
        $each = PerformersMovies::where('name', '=', $data["name"])->get();
        foreach ($each as $e) {
            $s = Movies::find($e["movie_id"]);
            $sum += $s["views"];
        }
        $data["sum"] = $sum;
        $data["count"] = count(PerformersMovies::where('name', '=', $data["name"])->get());

        return response()->json($data, 200);
    }

    public function searchPerformer(Request $request)
    {
        $name = $request->input('name');
        $data = Performers::where('name', '=', $name)->get();

        return response()->json($data, 200);
    }

    public function searchMovie($id)
    {
        $data = Performers::where('movie_id', '=', $id)->get();

        return response()->json($data, 200);
    }

    public function search($search)
    {
        $data = Performers::where('name', 'like', '%' . $search . '%')->get();

        foreach ($data as $d) {
            $sum = 0;
            $each = PerformersMovies::where('name', '=', $d["name"])->get();
            foreach ($each as $e) {
                $s = Movies::find($e["movie_id"]);
                $sum += $s["views"];
            }
            $d["sum"] = $sum;
            $d["count"] = count(PerformersMovies::where('name', '=', $d["name"])->get());
        }

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $data = Performers::create($request->all());

        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $performers = Performers::findOrFail($id);

        $data = $performers->update($request->all());

        return response()->json($data, 200);
    }

    public function delete(Request $request, $id)
    {
        $performers = Performers::findOrFail($id);
        $performers->delete();

        return response()->json('Record successfully deleted.', 204);
    }
}
