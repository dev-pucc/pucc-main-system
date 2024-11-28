<?php

namespace App\Http\Controllers\DivisionLead;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MeetingController extends Controller
{
    // Store a new meeting
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'meeting_name' => 'required|string|max:255',
        ]);

        // Insert into the database using Query Builder
        DB::table('meetings')->insert([
            'meeting_name' => $request->meeting_name,
            'status' => 1, // Default active
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect with a success message
        return back()->with('success', 'Meeting created successfully!');
    }

    // Show all meetings
    public function showMeetings()
    {
        // Fetch all meetings
        $meetings = DB::table('meetings')->get();

        // Return the meetings view with data
        return view('division_lead.meetingManagement', compact('meetings'));
    }

    // Terminate a meeting by ID
    public function terminateMeeting($id)
    {
        // Update the status of the meeting to 0
        DB::table('meetings')
            ->where('id', $id)
            ->update(['status' => 0]);

        // Redirect back with a success message
        return back()->with('success', 'Meeting terminated successfully!');
    }

    // Fetch students attending a specific meeting
    public function getMeetingStudents($meetingId)
    {
        // Fetch students who are attending the meeting
        $students = DB::table('attended')
            ->where('meeting_id', $meetingId)
            ->get();

        // Return the students data to the view
        return back()->with('students', $students);
    }

    // Store a attendance
    public function storeAttendance(Request $request, $meetingId)
    {
        // Insert attendance using Query Builder
        DB::table('attended')->insert([
            'meeting_id' => $meetingId,
            'name' => 'Md. Imtiaz Uddin',
            'student_id'=> '2104010202213',
            'created_at' => now(),
            'updated_at' => now(), 
        ]);
        // Redirect back with a success message
        return back()->with('success', 'Attendance marked successfully.');
    }

    // Fetch data if any meeting is active
    public function checkMeetingStatus()
    {
        // Use Query Builder to fetch data if any meeting is active
        $isMeetingCreated = DB::table('meetings')
            ->where('status', 1) // '1' indicates an active meeting
            ->get();
            
        // Pass the variable to the view
        return view('division_lead.index', compact('isMeetingCreated'));
    }
}
