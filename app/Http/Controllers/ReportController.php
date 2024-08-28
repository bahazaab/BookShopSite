<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Models\Report;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request('search')) {
            $searchTerm = request('search');
            $reports = Report::where('title', 'like', '%' . $searchTerm . '%')
                ->orWhere('description', 'like', '%' . $searchTerm . '%')
                ->orWhere('content', 'like', '%' . $searchTerm . '%')
                ->paginate(3);
        } else {
            $reports = Report::latest()->paginate(3);
        }
        return view("pages.dashboard.reports.index", compact("reports"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.reports.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReportRequest $request)
    {
        $validations = Validator::make($request->all(), [
            'category' => 'required',
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'status' => 'nullable',
        ]);

        if ($validations->fails()) {
            return redirect()->back()->withErrors($validations)->withInput();
        }

        $attributes = $request->all();
        $attributes['user_id'] = auth()->id();
        $attributes['date'] = date('Y-m-d');

        try {
            Report::create($attributes);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e)->withInput();
        }

        return redirect()->route('dashboard.reports.index')->with('success', 'Report created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        return view('pages.dashboard.reports.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        return view('pages.dashboard.reports.edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReportRequest $request, Report $report)
    {
        $validations = Validator::make($request->all(), [
            'category' => 'required',
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'status' => 'nullable',
        ]);

        if ($validations->fails()) {
            return redirect()->back()->withErrors($validations)->withInput();
        }

        $attributes = $request->all();

        try {
            $report->update($attributes);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e)->withInput();
        }

        return redirect()->route('dashboard.reports.show', $report->id)->with('success', 'Report Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->route('dashboard.reports.index')->with('success', 'Report deleted successfully');
    }
}
