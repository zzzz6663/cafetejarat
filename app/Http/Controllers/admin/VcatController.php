<?php

namespace App\Http\Controllers\admin;

use App\Models\Vcat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class VcatController extends Controller
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
        return view('admin.vcats.all', compact('vcats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vcats.create');
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
            'image' => 'required|max:2048',
        ]);

        $vcat = Vcat::create($data);
        if ($request->file('image')) {
            $file = $request->file('image');
            $name_image = $vcat->id . '_vcat' . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/media/vcat/image'), $name_image);
        }
        $path = public_path('/media/vcat/image/' . $name_image);
        if (file_exists($path)) {
            Image::make($path)->fit(300,300)->save(public_path('/media/vcat/image/' . $name_image));
        }

        $vcat->update(['image' => $name_image]);
        alert()->success('دسته بندی با موفقیت  ساخته شد ');
        return redirect()->route('vcat.index');
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
    public function edit(Vcat $vcat)
    {
        return view('admin.vcats.edit', compact('vcat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vcat $vcat)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',

            'content' => 'required',
            'image' => 'nullable|max:2048',
        ]);

        $vcat->update($data);
        if ($request->file('image')) {
            $file = $request->file('image');
            $name_image = $vcat->id . '_vcat' . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/media/vcat/image'), $name_image);

            $path = public_path('/media/vcat/image/' . $name_image);
            if (file_exists($path)) {
                Image::make($path)->fit(300, 300)->save(public_path('/media/vcat/image/' . $name_image));
            }

            $vcat->update(['image' => $name_image]);
        }

        alert()->success('دسته بندی با موفقیت  ساخته شد ');
        return redirect()->route('vcat.index');
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
