<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $plans=Plan::query();
       $plans=$plans->latest()->paginate(10);
       return view('admin.plans.all',compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $introduceds =\App\Models\User::distinct()->get(['introduced']);
        return view('admin.plans.create' ,compact(['introduceds']));
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
            'name'=>'required|string|max:255',
            'ostan_id'=>'nullable|string|max:255',
            'shahr_id'=>'nullable|string|max:255',
            'user_id'=>'nullable|string|max:255',
            'type'=>'required',
            'text'=>'required',
            'image' => 'required|max:2048',
        ]);

        $plan=Plan::create($data);
        if ($request->file('image')){
            $file=$request->file('image');
            $name_image= $plan->id.'_plan'.'_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/media/plan/image'),$name_image);
            $plan->update(['image'=>$name_image]);
        }
        alert()->success('طرح با موفقیت  ساخته شد ');
        return redirect()->route('plan.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        $introduceds =\App\Models\User::distinct()->get(['introduced']);
        return view('admin.plans.edit' ,compact(['plan','introduceds']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        $data=$request->validate([
            'name'=>'required|string|max:255',
            'ostan_id'=>'nullable|string|max:255',
            'shahr_id'=>'nullable|string|max:255',
            'user_id'=>'nullable|string|max:255',
            'text'=>'required',
            'image' => 'nullable|max:2048',
        ]);

        $plan->update($data);
        if ($request->file('image')){
            $file=$request->file('image');
            $name_image= $plan->id.'_plan'.'_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/media/plan/image/'),$name_image);
            $plan->update(['image'=>$name_image]);
        }
        alert()->success('طرح با موفقیت  به روز  شد ');
        return redirect()->route('plan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        $plan->users()->detach();
        $plan->delete();
        alert()->success('طرح  با موفقیت  حذف   شد ');
        return redirect()->route('plan.index');
    }
}
