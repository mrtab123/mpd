<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Http\Request;
use App\Models\Event;

class FullCalendarController extends Controller
{
    public function index(Request $request)
    {
        $events = array();
        $bookings = Event::all();
        
        foreach($bookings as $booking)
        {

            $events[] = [
				'id'		=>	$booking->id,
                'title'		=>	'Venue: '.$booking->location." \nTitle: ".$booking->title,
                'start'		=>	$booking->start,
                'end'		=>	$booking->end

            ];
        }

		
        return view('home.full-calendar', ['events' => $events]);
		
    	// if($request->ajax())
    	// {
			
    	// 	$data = Event::whereDate('start', '>=', $request->start)
        //                ->whereDate('end',   '<=', $request->end)
        //                ->get(['id', 'title','location', 'start', 'end']);
                      

                     
        //     return response()->json($data);
    	// }
    	// return view('home.full-calendar');
    }

    public function store()
    {  
		
		$attributes = request()->validate([

            'title' => 'required|max:255|string',
            'location' => 'required|max:255',
            'start' => 'required',
            'end' => 'required',
            

        ]);       

        	Event::create($attributes);
		
			return redirect('/full-calendar')->with('success', 'Your Conference Schedule has been created.');



             			
    	
    }


    public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		// if($request->type == 'add')
    		// {
    		// 	$event = Event::create([
    		// 		'title'		=>	$request->title,
            //         'location'		=>	$request->location,
    		// 		'start'		=>	$request->start,
    		// 		'end'		=>	$request->end
    		// 	]);

    		// 	return response()->json($event);
    		// }


    		if($request->type == 'update')
    		{
				$title  = Event::find($request->id);

    			$event = Event::find($request->id)->update([
    				'title'		=>	$title->title,                   
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'delete')
    		{
    			$event = Event::find($request->id)->delete();

    			return response()->json($event);
    		}
    	}
    }



}
