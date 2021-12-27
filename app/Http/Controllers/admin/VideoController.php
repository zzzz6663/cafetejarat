<?php

namespace App\Http\Controllers\admin;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vcat;
use Intervention\Image\Facades\Image;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vcats = Vcat::query();
        $vcats = $vcats->latest()->paginate(10);
        return view('admin.videos.all', compact('vcats'));
    }
    public function cat(Vcat $vcat)
    {
        $videos = $vcat->videos();
        $videos = $videos->orderBy('sort','asc')->paginate(10);
        return view('admin.videos.cat', compact('videos','vcat'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.videos.create');
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
            'content' => 'required',
            'price' => 'required',
            'sort' => 'required',

            'vcat_id' => 'required',
            'type' => 'required',
            'model' => 'required',
            'cover' => 'nullable',
            'video' => 'required',
        ]);

        $video = Video::create($data);
        if ($request->file('cover')) {
            $file = $request->file('cover');
            $name_cover = $video->id . '_cover' . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/media/video/cover'), $name_cover);
        $video->update(['cover' => $name_cover]);

        }
        if ($request->file('video')) {
            $file = $request->file('video');
            $name_video = $video->id . '_video' . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/media/video/video'), $name_video);
        $video->update(['video' => $name_video]);

        }
        // $path = public_path('/media/video/image/' . $name_image);
        // if (file_exists($path)) {
        //     Image::make($path)->fit(300, 400)->save(public_path('/media/video/image/' . $name_image));
        // }

        alert()->success('ویدئو   با موفقیت  ساخته شد ');
        return redirect()->route('video.index');
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
    public function edit(Video $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'price' => 'required',
            'sort' => 'required',
            'vcat_id' => 'required',
            'type' => 'required',
            'model' => 'required',
            'cover' => 'nullable',
            'video' => 'nullable',
        ]);

        $video ->update($data);
        if ($request->file('cover')) {
            $file = $request->file('cover');
            $name_cover = $video->id . '_cover' . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/media/video/cover'), $name_cover);
        $video->update(['cover' => $name_cover]);

        }
        if ($request->file('video')) {
            $file = $request->file('video');
            $name_video = $video->id . '_video' . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/media/video/video'), $name_video);
        $video->update(['video' => $name_video]);


        }
        // $path = public_path('/media/video/image/' . $name_image);
        // if (file_exists($path)) {
        //     Image::make($path)->fit(300, 400)->save(public_path('/media/video/image/' . $name_image));
        // }

        alert()->success('ویدئو   با موفقیت  ساخته شد ');
        return redirect()->route('video.index');
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
