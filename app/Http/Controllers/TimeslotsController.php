<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timeslots;

class TimeslotsController extends Controller
{
    public function index()
    {
        $data = Timeslots::all();

        return response()->json($data, 200);
    }

    public function show($id)
    {
        $data = Timeslots::find($id);

        return response()->json($data, 200);
    }

    public function showMovie($id)
    {
        $data = Timeslots::where('movie_id', '=', $id)->get();

        return response()->json($data, 200);
    }

    public function countMovies(Request $request)
    {
        $data = count(Timeslots::where('theater_name', '=', $request["name"])->get());

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $data = Timeslots::create($request->all());

        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $timeslots = Timeslots::findOrFail($id);

        $data = $timeslots->update($request->all());

        return response()->json($data, 200);
    }

    public function delete(Request $request, $id)
    {
        $timeslots = Timeslots::findOrFail($id);
        $timeslots->delete();

        return response()->json('Timeslot successfully deleted.', 204);
    }
}
