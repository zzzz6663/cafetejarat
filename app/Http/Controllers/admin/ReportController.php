<?php

namespace App\Http\Controllers\admin;

use NumberFormatter;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::query();
        $reports = $reports->latest()->paginate(10);
        return view('admin.reports.all', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable',
            'cover' => 'nullable',
            'video' => 'required',
            'type' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);
        if(  $request->start){
            $data['start']=$this->convert_date($data['start']);
        }
        if(  $request->end){
            $data['end']=$this->convert_date($data['end']);
        }
        $report = Report::create($data);
        if ($request->file('cover')) {
            $file = $request->file('cover');
            $name_cover = $report->id . '_cover' . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/media/report/cover'), $name_cover);
        $report->update(['cover' => $name_cover]);

        }
        if ($request->file('video')) {
            $file = $request->file('video');
            $name_video = $report->id . '_video' . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/media/report/video'), $name_video);
        $report->update(['video' => $name_video]);

        }
        // $path = public_path('/media/video/image/' . $name_image);
        // if (file_exists($path)) {
        //     Image::make($path)->fit(300, 400)->save(public_path('/media/video/image/' . $name_image));
        // }

        alert()->success('گزارش   با موفقیت  ساخته شد ');
        return redirect()->route('report.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        return view('admin.reports.edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable',
            'cover' => 'nullable',
            'video' => 'nullable',
            'type' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);
        if(  $request->start){
            $data['start']=$this->convert_date($data['start']);
        }
        if(  $request->end){
            $data['end']=$this->convert_date($data['end']);
        }
        $report ->update($data);
        if ($request->file('cover')) {
            $file = $request->file('cover');
            $name_cover = $report->id . '_cover' . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/media/report/cover'), $name_cover);
        $report->update(['cover' => $name_cover]);

        }
        if ($request->file('video')) {
            $file = $request->file('video');
            $name_video = $report->id . '_video' . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/media/report/video'), $name_video);
        $report->update(['video' => $name_video]);

        }
        // $path = public_path('/media/video/image/' . $name_image);
        // if (file_exists($path)) {
        //     Image::make($path)->fit(300, 400)->save(public_path('/media/video/image/' . $name_image));
        // }

        alert()->success('گزارش   با موفقیت  ساخته شد ');
        return redirect()->route('report.index');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        if (file_exists($report->video_path())) {
            unlink($report->video_path());
        }
        if (file_exists($report->cover_path())) {
            unlink($report->cover_path());
        }
        $report->delete();
        alert()->success('گزارش با موفقیت حذف شد ');
        return back();

    }
    public function convert_date( $from){

        $date=explode('-',$from);
        $fmt = numfmt_create('fa', NumberFormatter::DECIMAL);
        $year= numfmt_parse($fmt, $date[0])  ;
        $month= numfmt_parse($fmt, $date[1])  ;
        $day= numfmt_parse($fmt, $date[2])  ;
        $from=  \Morilog\Jalali\CalendarUtils::toGregorian($year, $month, $day);
        return   $from=$from[0].'-'.$from[1].'-'.$from[2].' 00:00:00';
    }
}
