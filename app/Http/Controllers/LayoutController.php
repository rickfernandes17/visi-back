<?php

namespace App\Http\Controllers;

use App\Models\Layout;
use App\Http\Requests\StoreLayoutRequest;
use App\Http\Requests\UpdateLayoutRequest;
use Illuminate\Support\Facades\Auth;

class LayoutCOntroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLayoutRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLayoutRequest $request)
    {
        $data = $request->all();
        //$data['user_id'] = Auth::user()->id;
        $layout = Layout::create($data);
        return response()->json($layout);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function show(Layout $layout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLayoutRequest  $request
     * @param  \App\Models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLayoutRequest $request, Layout $layout)
    {
        $data = $request->validated();
        $layout->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Layout $layout)
    {
        //
    }
}
