<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $Todolists = $user->Todolists;
        return view('todolist.index', compact('Todolists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todolist.create');
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'start' => 'required|date',
             'end' => 'required|date|after:start',
             'name' => 'required|string',
         ]);

         $startDateTime = Carbon::parse($validatedData['start']);
         $endDateTime = Carbon::parse($validatedData['end']);

         $validatedData['start'] = $startDateTime->toDateString();
         $validatedData['end'] = $endDateTime->toDateString();
         $validatedData['status'] = 'pending';

         if ($endDateTime > $startDateTime && $startDateTime > Carbon::now()) {
             $user = Auth::user();
             $user->todolists()->create($validatedData);
             return back()->with('success','Successfull');
         } else {
             return back()->with('error', 'The end date should be greater than the start date And the Starting date should be advance not the same day as now');
         }
     }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $todolist = Todolist::find($id);

        return view('todolist.show', compact(['todolist']));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $todolist = Todolist::find($id);

        return view('todolist.edit', compact(['todolist']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    $request->validate([
        'end' => 'required|date',
        'name' => 'required|string',
    ]);

    $todolist = Todolist::findOrFail($id);
    $todolist->update($request->only('end', 'name'));

    return $this->index();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $todolist = Todolist::findOrFail($id);
        $todolist->delete();
        return $this->index();
    }
    public function start($id)
    {
    $todolist = Todolist::findOrFail($id);
    $todolist->status = 'starting';
    $todolist->save();

    return $this->index();
    }
    public function end($id)
    {
    $todolist = Todolist::findOrFail($id);
    $todolist->status = 'finished';
    $todolist->save();

    return $this->index();
    }

}
