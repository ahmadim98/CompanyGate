<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function getCertificates($id){
        //this just to simulate getting certificates from ERP system
        $certificates = [
            [
                'id' => 1,
                'empid' => 1,
                'name' => 'هندسة البرمجيات',
                'date' => '2021-01-01',
                'institute' => 'جامعة الملك سعود',
                'location' => 'المملكة العربية السعودية ,الرياض',
                'logo' => asset('assets/assets/images/ksu_logo.png'),
            ],
            [
                'id' => 2,
                'empid' => 1,
                'name' => 'ITIL V4',
                'date' => '2021-01-01',
                'institute' => 'Axelos',
                'location' => 'Riyadh, Saudi Arabia',
                'logo' => asset('assets/assets/images/itil_logo.gif'),
            ],
            [
                'id' => 3,
                'empid' => 1,
                'name' => 'Project Management Professional (PMP)',
                'date' => '2021-01-01',
                'institute' => 'Project Management Institute (PMI)',
                'location' => 'Riyadh, Saudi Arabia',
                'logo' => asset('assets/assets/images/pmp_logo.png'),
            ],
        ];

        //return response()->json($certificates);
        return json_encode($certificates);
    }

    public function getSpecificEmployer($id){
        $employer = Employer::where('empID', $id)->get()->first();
        return $employer;
    }

    public function getAllEmployers(){
        $employers = Employer::all();
        return $employers;
    }

    public function editEmployer($id){
        //return view('employers/editemployer', ['id' => $id]);
        $employer = Employer::where('empID', $id)->get()->first();
        
        //return json_encode($employer);
        //return view('employers/editemployer', ['id' => $id]);
        return view('employers/editemployer',compact('employer'));
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
        // Form validation
        $this->validate($request, [
            'empID' => 'required',
            'name' => 'required',
            'email' => 'required',
            //'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'phone' => 'required',
            'ext' => '',
            'position'=>'required',
            'department' => 'required'
        ]);
        //  Store data in database
        Employer::create($request->all());
        // 
        return redirect('/manageemployers');
        //return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function show(Employer $employer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function edit(Employer $employer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // Form validation
        $this->validate($request, [
            'empID' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'ext' => '',
            'position'=>'required',
            'department' => 'required',
        ]);

        
        //  Store data in database
        //$employer->fill($request->all())->update();
        $employer = $request->except('_token','_method');

        Employer::where('empID', $id)->update($employer);

        return redirect('/manageemployers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        /*$employer->delete();
        return redirect()->route('/manageemployers');//->with('success','Company has been deleted successfully');*/
        $empID = $request['empID'];

        Employer::where('empID', $empID)->delete();

        return redirect('/manageemployers');
    }

    public function emptyForm(){
        return redirect('/manageemployers');
    }
}
