<?php

namespace App\Http\Controllers\admin;

use App\Models\Download;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $downloads = download::query();
        $downloads = $downloads->latest()->paginate(10);
        return view('admin.downloads.all', compact('downloads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.downloads.create');
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
            'img' => 'nullable',
            'file' => 'required',
        ]);

        $download = download::create($data);
        if ($request->file('img')) {
            $file = $request->file('img');
            $name_img = $download->id . '_img' . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/media/download/image'), $name_img);
            $path = public_path('/media/download/image/' . $name_img);
            if (file_exists($path)) {
                Image::make($path)->fit(100, 90)->save(public_path('/media/download/image/' . $name_img));
            }
        $download->update(['img' => $name_img]);

        }
        if ($request->file('file')) {
            $file = $request->file('file');
            $name_file = $download->id . '_file' . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/media/download/file'), $name_file);
        $download->update(['file' => $name_file]);

        }


        alert()->success('فایل   با موفقیت  ساخته شد ');
        return redirect()->route('download.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Download $download)
    {
        return view('admin.downloads.edit', compact('download'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Download $download)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable',
            'img' => 'nullable',
            'file' => 'nullable',
        ]);

        $download ->update($data);
        if ($request->file('img')) {
            $file = $request->file('img');
            $name_img = $download->id . '_img' . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/media/download/image'), $name_img);
            $path = public_path('/media/download/image/' . $name_img);
            if (file_exists($path)) {
                Image::make($path)->fit(100, 90)->save(public_path('/media/download/image/' . $name_img));
            }
        $download->update(['img' => $name_img]);

        }
        if ($request->file('file')) {
            $file = $request->file('file');
            $name_file = $download->id . '_file' . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/media/download/file'), $name_file);
        $download->update(['file' => $name_file]);

        }


        alert()->success('فایل   با موفقیت  به روز شد ');
        return redirect()->route('download.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Download $download)
    {
        if (file_exists($download->file_path())) {
            unlink($download->file_path());
        }
        if (file_exists($download->image_path())) {
            unlink($download->image_path());
        }
        $download->delete();
        alert()->success('فایل با موفقیت حذف شد ');
        return back();

    }
}
