<?php

namespace App\Http\Controllers;

use App\Models\Emonth;
use Illuminate\Http\Request;

class EMonthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emonth = Emonth::all();
        
        //return json_encode($employer);
        //return view('employers/editemployer', ['id' => $id]);
        return view('emonth',compact('emonth'));
        //return view('emonth');
    }

    public function getEmonth($id){
        $emonth = Emonth::where('id', $id)->first();
        return $emonth;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function emptyForm(){
        return redirect('/emonth');
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
            'department' => 'required',
            'month' => 'required',
            //'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'year' => 'required',
        ]);
        //  Store data in database
        Emonth::create($request->all());
        // 
        return redirect('/emonth');
        //return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EMonth  $eMonth
     * @return \Illuminate\Http\Response
     */
    public function show(EMonth $eMonth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EMonth  $eMonth
     * @return \Illuminate\Http\Response
     */
    public function edit(EMonth $eMonth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EMonth  $eMonth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'department' => 'required',
            'month' => 'required',
            //'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'year' => 'required',
        ]);
        //  Store data in database
        //$employer->fill($request->all())->update();
        $emonth = $request->except('_token','_method','id');

        Emonth::where('id', $request->id)->update($emonth);

        return redirect('/emonth');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EMonth  $eMonth
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
                //
        /*$employer->delete();
        return redirect()->route('/manageemployers');//->with('success','Company has been deleted successfully');*/
        $id = $request['id'];

        EMonth::where('id', $id)->delete();

        return redirect('/emonth');
    }
}
