<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionRequest;
use App\Http\Requests\SectionStoreRequest;
use App\Http\Requests\SectionUpdateRequest;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allSections = Section::all();
        return view('sections.sections', compact('allSections'));
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
    public function store(SectionStoreRequest $request)
    {
        $data = $request->validated();
        $data['created_by'] = Auth::user()->email;
        Section::create($data);
        session()->flash('Add', 'تم اضافة القسم بنجاح ');
        return redirect()->route('sections.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $this->validate($request, [

            'section_name' => 'required|max:255|unique:sections,section_name,' . $id,
            'description' => 'required',
        ], [

            'section_name.required' => 'يرجي ادخال اسم القسم',
            'section_name.unique' => 'اسم القسم مسجل مسبقا',
            'description.required' => 'يرجي ادخال البيان',

        ]);

        $sections = Section::find($id);
        $sections->update($request->except('id', '_token'));
        session()->flash('edit', 'تم تعديل القسم بنجاج');
        return redirect('/sections');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id=$request->id;
        $section=Section::find($id);
        $section->delete();
        session()->flash('delete', 'تم حذف القسم بنجاج');
        return redirect('/sections');
    }
}
