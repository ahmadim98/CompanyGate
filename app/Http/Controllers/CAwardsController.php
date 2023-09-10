<?php

namespace App\Http\Controllers;

use App\Models\Cawards;
use Illuminate\Http\Request;

class CAwardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cawards = Cawards::all();
        
        return view('cawards',compact('cawards'));
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

    public function getCaward($id){
        $caward = Cawards::where('id', $id)->first();
        return $caward;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'issuer' => 'required',
            'location' => 'required',
            //'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'award_date' => 'required',
        ]);
        //  Store data in database
        Cawards::create($request->all());
        // 
        return redirect('/cawards');
        //return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cawards  $cawards
     * @return \Illuminate\Http\Response
     */
    public function emptyForm(){
        return redirect('/cawards');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cawards  $cawards
     * @return \Illuminate\Http\Response
     */
    public function edit(Cawards $cawards)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cawards  $cawards
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'issuer' => 'required',
            'location' => 'required',
            //'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'award_date' => 'required',
        ]);
        //  Store data in database
        //$employer->fill($request->all())->update();
        $caward = $request->except('_token','_method','id');

        Cawards::where('id', $request->id)->update($caward);

        return redirect('/cawards');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cawards  $cawards
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request['id'];

        Cawards::where('id', $id)->delete();

        return redirect('/cawards');
    }
}
