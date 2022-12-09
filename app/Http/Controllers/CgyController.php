<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cgy;
use Illuminate\Http\Request;

class CgyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $cgies = Cgy::all();
        // $cgies = Cgy::where('id', 131)->get();
        // $cgies = Cgy::where('id', '=', 101)->get();
        // $cgies = Cgy::where('id', '>', 100)->get();
        // $cgies = Cgy::where('id', '>', 50)->where('id', '<=', 80)->orderby('id', 'desc')->get();
        $date = Carbon::createFromFormat('Y-m-d h:i:s', '2022-12-15 00:00:00');
        $cgies = Cgy::where('enabled_at', '<', $date)->orderby('enabled_at', 'asc')->get();

        return $cgies;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $cgy = Cgy::find($id);
        // $cgy = Cgy::find([1, 2]);

        $cgy = Cgy::where('id', $id)->orderBy('created_at', 'desc')->firstOrFail();
        // $cgy = Cgy::where('id', $id)->orderBy('created_at', 'desc')->first();

        return $cgy;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cgy $cgy)
    {
        $cgy->delete();
    }
}
