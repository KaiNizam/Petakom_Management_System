<?php

namespace App\Http\Controllers;

use App\Models\VotingRecord;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = VotingRecord::all();    
        // return view('Manage Committee Election.Committee.CandidateListPage.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AddCandidatePage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'CandidateID'           => 'required',
            'candidate_name'        =>  'required',
            'candidate_program'     =>  'required',
            'candidate_year'        =>  'required',
            'image'                 =>  'required',
            'manifesto'             =>  'required'
        ]);

        $file_name = time() . '.' . request()->image->getClientOriginalExtension();

        request()->image->move(public_path('images\candidate'), $file_name);

        $VotingRecord = new VotingRecord();

        $VotingRecord->CandidateID  = $request->CandidateID;
        $VotingRecord->StudentID  = $request->CandidateID;
        $VotingRecord->candidate_name = $request->candidate_name;
        $VotingRecord->candidate_program = $request->candidate_program;
        $VotingRecord->candidate_year = $request->candidate_year;
        $VotingRecord->manifesto = $request->manifesto;
        $VotingRecord->image = $file_name;

        $VotingRecord->save();

        return redirect()->route('test.index')->with('success', 'Student Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VotingRecord  $votingRecord
     * @return \Illuminate\Http\Response
     */
    public function show(VotingRecord $votingRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VotingRecord  $votingRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(VotingRecord $votingRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VotingRecord  $votingRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VotingRecord $votingRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VotingRecord  $votingRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(VotingRecord $votingRecord)
    {
        //
    }
}
