<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoticeController extends Controller
{
    public function create()
    {
        return view('notice.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'content' => 'required|string',
        ]);

        // Save the notice in the database
        DB::table('notices')->insert([
            'title' => $request->input('title'),
            'date' => $request->input('date'),
            'content' => $request->input('content'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('notice.create')->with('success', 'Notice saved successfully!');
    }
    public function index()
{
    $notices = DB::table('notices')->orderBy('date', 'desc')->get();
    return view('notice.index', compact('notices'));
}

public function show($id)
{
    $notice = DB::table('notices')->find($id);
    $otherNotices = DB::table('notices')
        ->where('id', '!=', $id)
        ->orderBy('date', 'desc')
        ->limit(5)
        ->get();

    return view('notice.show', compact('notice', 'otherNotices'));
}

}
