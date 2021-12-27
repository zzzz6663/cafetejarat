<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function bills(Request $request){

        $bills=Bill::query();
        if( $request->search){
            $search=$request->search;
            $bills->whereHas('user' ,function($query) use($search){
                $query->where('name','LIKE',"%{$search}%")
                ->orWhere('family','LIKE',"%{$search}%")
                ->orWhere('mobile','LIKE',"%{$search}%");
            });
        }
        $bills=$bills->latest()->paginate(10);;
        return view('admin.bills.all',compact(['bills']));
    }
}
 