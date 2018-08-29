<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;
use App\User;
use App\Models\Manager;
use App\Models\Viewer;


class ManagerController extends Controller
{
    public function showAll(Request $request){
        $user = $request->user();
        $role = $user->roles()->first()->name;
        $admins = Admin::all();
        $managers = Manager::all();
        $viewers = Viewer::all();
        return view('dashboard')->with('role', $role)->with('admins', $admins)->with('managers', $managers)->with('viewers', $viewers);
    }

    public function createViewer(Request $request){
        $user = $request->user();
        $role = $user->roles()->first()->name;
        return view('viewer.create')->with('role',$role);
    }

    public function saveViewer(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        //$roleIds = [4];
        $role = Role::where('name',config('constants.ROLE_VIEWER'))->first();
        $user->roles()->attach($role->id);

        $viewer = Viewer::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => 'Test Address',
        ]);
        $role = $request->user()->roles()->first()->name;
        return view('viewer.create')->with('role',$role)->with('msg','Viewer saved successfully');
    }

    public function editViewer(Request $request,$viewerId){
        $viewer = Viewer::find($viewerId);
        $user = $request->user();
        $role = $user->roles()->first()->name;
        return view('viewer.edit')->with('role',$role)->with('viewer',$viewer);
    }

    public function updateViewer(Request $request){
        $user = User::find($request->viewerId);
        $viewer = $user->viewer;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $viewer->name = $request->name;
        $viewer->email = $request->email;
        $viewer->save();

        $role = $request->user()->roles()->first()->name;
        return view('viewer.edit')->with('role',$role)->with('viewer',$viewer)->with('msg','Viewer saved successfully');
    }
}


