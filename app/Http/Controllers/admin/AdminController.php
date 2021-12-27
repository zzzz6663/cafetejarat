<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function agents_show (Request $request ,User $user){
           return view('admin.agents.show',compact('user'));
    }
    public function agents_all(Request $request){
        $agents=User::query();
        $agents->where('level','agent');
        if($request->search){
            $search=$request->search;
            $agents->where(function($query) use ($search){
                $query->where('name','LIKE',"%{$search}%")
                ->orWhere('family','LIKE',"%{$search}%")
                ->orWhere('mobile','LIKE',"%{$search}%");
            });
        }
        if($request->ostan_id){
            $ostan=$request->ostan_id;
            $agents->whereHas('ostan',function($query) use ($ostan){
                $query->where('id',$ostan );
            });
        }
        if($request->shahr_id){
            $shahr=$request->shahr_id;
            $agents->whereHas('shahr',function($query) use ($shahr){
                $query->where('id',$shahr );
            });
        }
        $agents=$agents->latest()->paginate(12);
        return view('admin.agents.all',compact('agents'));
    }

}
