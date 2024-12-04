<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Controllers\ApiController;

class EventController extends ApiController
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'from_time' => 'nullable|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i',
            'all_day' => 'required|boolean',
            'location_type' => 'required|in:virtual,physical',
            'meeting_type' => 'nullable|in:zoom,google_meet',
            'location' => 'nullable|string|max:255',
            'participants' => 'required|array',
            'participants.*' => 'exists:users,id',
        ]);
        
        if (!$validated) {
            return response()->json(['all requests' => $request->all()], 422);
        }

        $event = Event::create($validated);

        $event->participants()->attach($validated['participants']);

        return response()->json(['event' => $event->load('participants')], 201);
    }

    public function index(Request $request){
        // Get the 'title' query parameter from the request
        $title = $request->query('title');

        // Check if the 'title' parameter is provided
        if ($title) {
            // Filter events based on the 'title' field
            $events = Event::with('participants')
                ->where('title', 'like', '%' . $title . '%')
                ->get();
        } else {
            // Get all events if 'title' is not provided
            $events = Event::with('participants')->get();
        }

        return response()->json(['events' => $events], 200);
    }

       /**
     * Get a single event by ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $event = Event::with('participants')->findOrFail($id);

            return response()->json(['event' => $event], 200);
        } catch (\Exception $e) {
            // Catch any other exceptions
            return response()->json(['error' => 'An error occurred while retrieving the event'], 500);
        }
    }

    /**
     * Delete an event by ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $event = Event::findOrFail($id);
            $event->participants()->detach(); // Remove associated participants
            $event->delete(); // Delete the event

            return response()->json(['message' => 'Event deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while deleting the event'], 500);
        }
    }

    /**
     * Update an event by ID.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'date' => 'required|date',
                'from_time' => 'nullable|date_format:H:i',
                'end_time' => 'nullable|date_format:H:i',
                'all_day' => 'required|boolean',
                'location_type' => 'required|in:virtual,physical',
                'meeting_type' => 'nullable|in:zoom,google_meet',
                'location' => 'nullable|string|max:255',
                'participants' => 'required|array',
                'participants.*' => 'exists:users,id',
            ]);

            $event = Event::findOrFail($id);
            $event->update($validated); // Update event fields
            $event->participants()->sync($validated['participants']); // Sync participants

            return response()->json(['event' => $event->load('participants')], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while updating the event'], 500);
        }
    }
}
