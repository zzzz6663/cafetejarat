<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Video;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $video=Video::find($request->video);
        $questions =  $video->questions()->latest()->get();

        return view('admin.questions.all', compact(['questions','video']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $video=Video::find($request->video);
        return view('admin.questions.create',compact(['video']));
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
            'video_id' => 'required|string|max:2000',
            'q' => 'required|string|max:2000',
            'a' => 'required|string|max:2000',
            'b' => 'required|string|max:2000',
            'c' => 'required|string|max:2000',
            'd' => 'required|string|max:2000',
            'answer' => 'required',
        ]);
        $question = Question::create($data);
        alert()->success('ویدئو   با موفقیت  ساخته شد ');
        return redirect()->route('question.index',['video'=>$request->video_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $video=$question->video;
        return view('admin.questions.edit', compact(['question','video']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $video=$question->video;
        $data = $request->validate([
            'video_id' => 'required|string|max:2000',
            'q' => 'required|string|max:2000',
            'a' => 'required|string|max:2000',
            'b' => 'required|string|max:2000',
            'c' => 'required|string|max:2000',
            'd' => 'required|string|max:2000',
            'answer' => 'required',
        ]);
        $question ->update($data);
        alert()->success('ویدئو   با موفقیت  به روز شد ');
        return redirect()->route('question.index',['video'=>$request->video_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
