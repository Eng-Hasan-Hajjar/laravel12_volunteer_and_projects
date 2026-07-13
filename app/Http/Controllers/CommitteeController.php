<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommitteeController extends Controller
{
    
public function review(Request $request, Project $project)
{
    $request->validate([
        'status' => 'required|in:approved,rejected',
        'notes' => 'nullable|string|max:500'
    ]);

    $project->verification()->create([
        'reviewer_id' => auth()->id(),
        'status' => $request->status,
        'notes' => $request->notes,
    ]);

    $project->status = $request->status === 'approved' ? 'verified' : 'rejected';
    $project->save();

    return back()->with('success', 'تمت مراجعة المشروع بنجاح.');
}
}


