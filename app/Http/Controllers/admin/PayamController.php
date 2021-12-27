<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Payam;
use App\Models\User;
use Illuminate\Http\Request;

class PayamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payams=Payam::query();
        $payams=$payams->latest()->paginate(10);
        return view('admin.payams.all',compact('payams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.payams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'title'=>'required|string|max:255',
            'ostan_id'=>'nullable',
            'shahr_id'=>'nullable',
            'plan_id'=>'nullable',
            'text'=>'required',
        ]);

        $users=User::query();
        if($request->ostan_id){
            $users->whereHas('ostan',function($query) use($request){
                $query->where('id',$request->ostan_id);
            });
        }
        if($request-> shahr_id){
            $users->whereHas('shahr',function($query) use($request){
                $query->where('id',$request-> shahr_id);
            });
        }
        if($request-> plan_id){
            $users->whereHas('plans',function($query) use($request){
                $query->where('id',$request-> plan_id);
            });
        }

        $users=  $users-> where('level','agent')->pluck('id')->toArray();
        $payam=Payam::create($data);
        $payam->users()->sync($users);
        alert()->success('پیام  با موفقیت  ساخته شد ');
        return redirect()->route('payam.index');
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
    public function edit(Payam  $payam)
    {
        return view('admin.payams.edit' ,compact('payam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payam  $payam)
    {
        $data=$request->validate([
            'title'=>'required|string|max:255',
            'ostan_id'=>'nullable',
            'shahr_id'=>'nullable',
            'plan_id'=>'nullable',
            'text'=>'required',
        ]);

        $users=User::query();
        if($request->ostan_id){
            $users->whereHas('ostan',function($query) use($request){
                $query->where('id',$request->ostan_id);
            });
        }
        if($request-> shahr_id){
            $users->whereHas('shahr',function($query) use($request){
                $query->where('id',$request-> shahr_id);
            });
        }
        if($request-> plan_id){
            $users->whereHas('plans',function($query) use($request){
                $query->where('id',$request-> plan_id);
            });
        }

        $users=  $users-> where('level','agent')->pluck('id')->toArray();
        $payam->update($data);
        $payam->users()->sync($users);
        alert()->success('پیام  با موفقیت  به روز شد ');
        return redirect()->route('payam.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payam  $payam)
    {
        // $users=$payam->users()->pluck('id')->toArray();
        $payam->users()->detach();
        $payam->delete();
        alert()->success('پیام  با موفقیت  حذف   شد ');
        return redirect()->route('payam.index');
    }
}
