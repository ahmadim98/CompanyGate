<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employer;
use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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

    public function emptyForm(){
        return redirect('/manageusers');
    }

    public function getAllUsers(){
        $users = User::all();
        return $users;
    }

    public function editUser($id){
        //return view('employers/editemployer', ['id' => $id]);
        $user = User::where('id', $id)->get()->first();
        
        //return json_encode($employer);
        //return view('employers/editemployer', ['id' => $id]);
        return view('users/edituser',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        return User::create([
            'empid' => $data['empID'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role']
        ]);
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
            'empID' => '',
            'username' => 'required',
            'email' => 'required',
            //'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'password' => 'required',
            'role' => 'required'
        ]);
        //  Store data in database

        $data = $request->all();

        $check = $this->create($data);
        
        return redirect('/manageusers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Form validation
        $this->validate($request, [
            'empid' => '',
            'username' => '',
            'email' => '',
            'password' => '',
            'role'  => ''
        ]);
        //  Store data in database
        //$employer->fill($request->all())->update();
        
        $user = null;

        if(!is_null($request->password)){
            $encrypt_pass = Hash::make($request->password);
            $user = $request->except('_token','_method');
            $user['password'] = $encrypt_pass;
        }else{
            $user = $request->except('_token','_method','password');
        } 

        User::where('id', $id)->update($user);

        return redirect('/manageusers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $userid = $request['userID'];

        User::where('id', $userid)->delete();

        return redirect('/manageusers');
    }
}
