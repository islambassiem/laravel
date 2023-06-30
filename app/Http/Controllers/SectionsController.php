<?php

namespace App\Http\Controllers;

use App\Models\sections;
use App\Http\Requests\SectionsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = sections::all();
        return view('sections.sections', ['sections' => $sections] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SectionsRequest $request)
    {

        $exists = sections::where('section_name', '=', $request->section_name)->exists();

        if($exists){
            session()->flash('error', __('sections.error'));
            return redirect('sections');
        }else{
            sections::create([
                'section_name' => $request->section_name,
                'description'  => $request->notes,
                'created_by'   => Auth::user()->name,
            ]);
            session()->flash('success', __('sections.success'));
            return redirect('sections');
        }

        sections::create([
            'section_name' => $request->section_name,
            'description'  => $request->notes,
            'created_by'   => Auth::user()->name,
        ]);
        session()->flash('success', __('sections.success'));
        return redirect('sections');
    }

    /**
     * Display the specified resource.
     */
    public function show(sections $sections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sections $sections)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, sections $sections)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sections $sections)
    {
        //
    }
}
