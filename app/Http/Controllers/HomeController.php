<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employer;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $user = Auth::user();
        
            $employer = new Employer;
    
            $employer->fill([
                'empID' => '0',
                'name' => 'Not Employer',
                'email' => '',
                'phone' => '0',
                'ext' => '',
                'position'=>'Not Employer',
                'department' => 'Not Employer'
            ]);

            $certifications = json_encode([]);
    
            if(!is_null($user['empid'])){
                $employer = app('App\Http\Controllers\EmployerController')->getSpecificEmployer($user['empid']);
                $certifications = app('App\Http\Controllers\EmployerController')->getCertificates($user['empid']);
            }
    
            $latest_news = app('App\Http\Controllers\NewsController')->getLatestNews();
            
            return view('home',compact('employer','latest_news','certifications'));
        }else {
            return redirect('login');
        }
    }
}
