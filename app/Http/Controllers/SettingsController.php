<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Artisan;

class SettingsController extends Controller
{

    public function SetSettings(Request $request)
    {
        $theme_mode = $request['thememode'];

        //edit config for current runtime
        Config::set('template.theme_mode', $theme_mode);
        // open config file for writing
        $config_file = fopen(base_path() .'/config/template.php' , 'w');
        // write updated runtime config to file
        fwrite($config_file, '<?php 
        /*
        |--------------------------------------------------------------------------
        | Template Configuration
        |--------------------------------------------------------------------------
        |
        | Here you may configure your settings for the template which is used
        | with the application which specifiy how the theme will look like,
        | it can be configured through the settings for admins.
        |
        |
        */
        return ' . var_export(Config::get('template'), true) . ';');
        // close the file
        fclose($config_file);
        // clear config cache
        Artisan::call('cache:clear');
        //config(['template.theme_mode' => 'Test']);

        return redirect('/settings');
    }

    public function GetSettings()
    {
        $config_file = Config::get('template');
        $config = json_encode($config_file);
        
        return view('settings',compact('config'));
        //return $config;
    }

    public function emptyForm(){
        return redirect('/settings');
    }

}
