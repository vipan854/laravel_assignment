<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Manager;
use App\Models\Viewer;


class ViewerController extends Controller
{
    public function showAll(Request $request){
        $user = $request->user();
        $role = $user->roles()->first()->name;
        $admins = Admin::all();
        $managers = Manager::all();
        $viewers = Viewer::all();
        return view('dashboard')->with('role', $role)->with('admins', $admins)->with('managers', $managers)->with('viewers', $viewers);
    }
}
