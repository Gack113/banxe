<?php

namespace App\Http\Controllers;
use App\Bill;
use App\Customer;
use App\BillDetail;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function index(){
        $bills = Bill::all();
        return view('admin.bills',compact('bills'));
    }

    public function show(Request $req){
        $bill = Bill::where('id',$req->id)->first();
        $customer = Customer::where('id',$bill->id_customer)->first();
        $billDetails = BillDetail::where('id_bill',$bill->id)->get();
        return view('admin.show_bill',compact('bill','customer','billDetails'));
    }

    public function update(Request $req){
        $bill = Bill::find($req->id);
        $bill->state_id = $req->state;
        $bill->save();
        return redirect()->back()->with('message','Cập nhật thành công');
    }

    public function delete(Request $req){
        $bill = Bill::where('id',$req->id)->first();
        BillDetail::where('id_bill',$bill->id)->delete();
        $bill->delete();
        return redirect()->route('list-bill')->with('message','Xóa thành công');
    }
}
