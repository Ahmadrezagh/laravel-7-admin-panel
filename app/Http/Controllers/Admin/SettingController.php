<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Setting;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    protected $admin;

    public function __construct()
    {

        $this->middleware(function ($request, $next) {
            $this->admin = auth('admin')->user();
            if (!$this->admin->can('canEdit') and $this->admin->id != 1) {
                abort(404);
            }
            return $next($request);
        });

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($setting_name)
    {
        if(count(Setting::where('name',$setting_name)->get())> 0){
        $array = Setting::where('name',$setting_name)->first();
        $descs = json_decode($array->description,true);
        $values = json_decode($array->value,true);
        $keys = array_keys($descs);
        $settings = [];
        foreach($keys as $key)
        {
            $object["name"] = $key;
            $object["desc"] = $descs[$key];
            $object["value"] = $values[$key];
            array_push($settings,$object);
        }
        $settings = \json_decode(\json_encode($settings));
        return view('admin.settings.site-setting',compact('settings','setting_name'));
        }else{
            abort(404);
        }
    }

    public function update(Request $req)
    {
        if(count(Setting::where('name',$req->setting_name)->get())> 0){
            $array = Setting::where('name',$req->setting_name)->first();
            $descs = json_decode($array->description,true);
            $values = json_decode($array->value,true);
            $keys = array_keys($descs);
            $new_values;
            foreach($keys as $key)
            {
                if(isset($req[$key]) && $req[$key] != NULL && $req[$key] != '')
                {
                    $new_values[$key] = $req[$key];
                    if(strpos($key,'img')>0)
                    {
                        $name = $key;
                        $file_name = $name.".jpeg";
                        $path = '/uploads';
                        $req[$key]->move(public_path($path), $file_name);
                        $new_values[$key] = $path."/".$file_name;
                    }
                }else{
                    $new_values[$key] = $values[$key];
                }
            }
            Setting::where('name',$req->setting_name)->update([
                'value' => json_encode($new_values)
            ]);
             return back();
        }else{
            abort('404');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {

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
        //
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
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
