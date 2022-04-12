<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Equipments;
use Illuminate\Http\Request;

class EquipmentsController extends Controller
{
    public function index(){
        //fetch all posts data
        return Equipments ::all();
    }

    public function details($id){
        //fetch post data
        return Equipments::find($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | string',
            'description' => 'required | string',
            'domain' => 'required | string',
            'precautions' => 'required | string',
            'uses' => 'required | string'
        ]);
        return Equipments::create($request->all());
    }
    public function update(Request $request, $id)
    {
        $event = Equipments::find($id);
         $event-> update($request->all());
         return $event;
    }
    public function delete($id){
        return Equipments::destroy($id);
    }
}
