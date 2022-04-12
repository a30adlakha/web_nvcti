<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Event;
use App\Http\Resources\Event as EventResource;

class EventController extends BaseController
{

    public function index()
    {
        $events = Event::all();
        return $this->sendResponse(EventResource::collection($events), 'Events fetched.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required',
            'links' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $event = Event::create($input);
        return $this->sendResponse(new EventResource($event), 'Event created.');
    }


    public function show($id)
    {
        $event = Event::find($id);
        if (is_null($event)) {
            return $this->sendError('Event does not exist.');
        }
        return $this->sendResponse(new EventResource($event), 'Event fetched.');
    }


    public function update(Request $request, Event $event)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required',
            'links' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $event->title = $input['title'];
        $event->description = $input['description'];
        $event->links = $input['links'];
        $event->save();

        return $this->sendResponse(new EventResource($event), 'Event updated.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return $this->sendResponse([], 'Event deleted.');
    }
}
