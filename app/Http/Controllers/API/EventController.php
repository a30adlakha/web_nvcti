<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Event;
use App\Http\Resources\Event as EventResource;

class EventController extends BaseController
{
    function addEvents(Request $req){
        $event= new Event;     //Instance created for backend event
        $event->name=$req->input('name');  //we are getting the input from request and storing in backend tble right->frontend left->backend
        $event->description=$req->input('description');
        $event->form_link=$req->input('form_link');
        $event->pdf_link=$req->input('pdf_link');
        $event->category=$req->input('category');
        $event->tags=$req->input('tags');
        $event->image_path=$req->input('image_path');
        $event->save();
    }
    function list(){
        return Event::all();
    }
    function flagshipList(){
        return Event::where('category','Flagship')->get();
    }
    function micList(){
        return Event::where('category','MIC')->get();
    }
    function othersList(){
        return Event::where('category','Others')->get();
    }
    function delete($id){
        $result=Event::where('id',$id)->delete();
        if($result){
            return ["result"=>"product has been deleted"];
        }
        else{
            return ["result"=>"Operation failed"];
        }
    }
    function updateProduct($id,Request $req){
        $event= Event::find($id);
        $event->name=$req->input('name');
        $event->description=$req->input('description');
        $event->form_link=$req->input('form_link');
        $event->pdf_link=$req->input('pdf_link');
        $event->category=$req->input('category');
        $event->tags=$req->input('tags');
        $event->image_path=$req->input('image_path');
        $event->save();
    }
}
