<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\LabApplication;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class labapplicationsController extends Controller
{
    public function index(){
        return LabApplication::all();
    }
    
    public function details($id){
        return LabApplication::find($id);
    }
    
    public function findUserApplication($email){
        return LabApplication::where('email','=', $email)->get();
    }

    public function store(Request $request)
    {
        return LabApplication::create($request->all());
    }
    public function update(Request $request, $id)
    {
        $application = LabApplication::find($id);
        $application-> update($request->all());
        return $application;
    }
    public function delete($id){
        return LabApplication::destroy($id);
    }
}
