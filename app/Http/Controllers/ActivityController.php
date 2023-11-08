<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Period;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the activities.
     */
    public function index()
    {
        $activities = Activity::all();
        return view('activity.index', compact('activities'));
    }

    /**
     * Show the form for creating a new activity.
     */
    public function create()
    {
        $periods = Period::all();
        $staffs = Staff::all();
        $users = User::all();

        return view('activity.create', compact('periods', 'staffs', 'users'));
    }

    /**
     * Store a newly created activity in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'objective' => 'required',
            'competence' => 'required',
            'syllabus' => 'required',
            'authorized' => 'required|in:yes,no',
            'activity' => 'required|integer',
            'credits' => 'required|integer',
            'period_id' => 'required|exists:periods,id',
            'staff_id' => 'required|exists:staff,id',
            'user_id' => 'required|exists:users,id',
        ]);

        Activity::create($data);
        return redirect()->route('activities.index');
    }

    /**
     * Display the specified activity.
     */
    public function show(Activity $activity)
    {
        return view('activity.show', compact('activity'));

    }

    /**
     * Show the form for editing the specified activity.
     */
    public function edit(Activity $activity)
    {
        $periods = Period::all();
        $staffs = Staff::all();
        $users = User::all();


        return view('activity.edit', compact('activity','periods', 'staffs', 'users'));
    }

    /**
     * Update the specified activity in storage.
     */
    public function update(Request $request, Activity $activity)
    {


        $data = $request->validate([
            'name' => 'required',
            'objective' => 'required',
            'competence' => 'required',
            'syllabus' => 'required',
            'authorized' => 'required|in:yes,no',
            'activity' => 'required|integer',
            'credits' => 'required|integer',
        ]);

        $activity->update($data);
        return redirect()->route('activities.index');
    }

    /**
     * Remove the specified activity from storage.
     */
    public function destroy(Activity $activity)
    {
        $message = 'Actividad eliminada con éxito';

        try {
            $activity->delete();
        } catch (\Exception $e) {
            $message = 'Error al eliminar la actividad';
        }

        return redirect()->route('activities.index')->with('message', $message);
    }
}
