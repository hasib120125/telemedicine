<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\RechargeDetail;
use Illuminate\Support\Carbon;
use App\Models\UserBalance;
use Auth;
use App\Models\Transaction;

class RechargeController extends Controller
{
    public function index(){
        $recharge_users = DB::table('users')->where('user_type', 'user')->where('status','1')->get();
        $users = DB::table('users')->where('user_type', 'user')->where('status','1')->first();
        return view('admin.recharge.index', compact('recharge_users','users'));
    }

    public function view(){
        $recharges = RechargeDetail::all();
        return view('admin.recharge.view', compact('recharges'));
    }

    public function store(Request $request){
        $recharge = new RechargeDetail;
        $recharge->user_id          = $request->user_id;
        $recharge->mobile           = $request->mobile;
        $recharge->tracking_number  = mt_rand();
        $recharge->recharge_time    = Carbon::now();
        $recharge->recharge_amount  = $request->recharge_amount;
        $recharge->status           = $request->status;
        $recharge->recharge_type    = $request->recharge_type;
        $recharge->ref_number       = $request->ref_number;
        $recharge->remarks          = $request->remarks;
        $recharge->save();

        $users_recharge = DB::table('recharge_details')->where('user_id', $request->user_id)->latest()->first();
        $user_balance = DB::table('user_balances')->where('user_id', $request->user_id)->latest()->first();

        $account_balance = 0;
        $balance_status = 1;
        $insertTransaction = [
            'user_id' => $users_recharge->user_id,
            'transaction_time' => Carbon::now(),
            'debit' => $users_recharge->recharge_amount,
            'credit' => $account_balance,
            'balance' => $users_recharge->recharge_amount + $user_balance->balance,
            'details' => $users_recharge->tracking_number,
            'party' => auth()->user()->id,
            'amount' => $users_recharge->recharge_amount,
            'ref_number' => $users_recharge->ref_number,
            'status' => $balance_status,
            'created_at' => Carbon::now(),
            ];
        DB::table('transactions')->insert($insertTransaction);

        $updateUserBalance = [
            'user_id' => $users_recharge->user_id,
            'balance' => $users_recharge->recharge_amount + $user_balance->balance,
            'available_balance' => $users_recharge->recharge_amount + $user_balance->available_balance,
            'updated_at' => Carbon::now(),
            ];
        DB::table('user_balances')->where('user_id', $request->user_id)->update($updateUserBalance);
        
    return redirect('recharge')->with('flash_message_success','Recharge Successfully Done');
    }

    public function userRecharge(){
        
        return view('admin.recharge.user_recharge');
    }

    public function userRechargeSave(Request $request){
        $recharge = new RechargeDetail;
        $recharge->user_id          = auth()->user()->id;
        $recharge->mobile           = $request->mobile;
        $recharge->tracking_number  = mt_rand();
        $recharge->recharge_time    = Carbon::now();
        $recharge->recharge_amount  = $request->recharge_amount;
        $recharge->status           = $request->status;
        $recharge->recharge_type    = $request->recharge_type;
        $recharge->ref_number       = $request->ref_number;
        $recharge->remarks          = $request->remarks;
        $recharge->save();

    return redirect('user-recharge')->with('flash_message_success','Recharge Successfully Done');
    }

    public function userRechargeApprove(Request $request, $id){

        DB::table('recharge_details')->where('id', $id)->update(['status' => '1']);

        $users_recharge = DB::table('recharge_details')->where('id', $id)->first();
        
        $user_balance = DB::table('user_balances')->where('user_id', $users_recharge->user_id)->first();

        $account_balance = 0;
        $balance_status = 1;
        $insertTransaction = [
            'user_id' => $users_recharge->user_id,
            'transaction_time' => Carbon::now(),
            'debit' => $users_recharge->recharge_amount,
            'credit' => $account_balance,
            'balance' => $users_recharge->recharge_amount + $user_balance->balance,
            'details' => $users_recharge->tracking_number,
            'party' => auth()->user()->id,
            'amount' => $users_recharge->recharge_amount,
            'ref_number' => $users_recharge->ref_number,
            'status' => $balance_status,
            'created_at' => Carbon::now(),
            ];
        DB::table('transactions')->insert($insertTransaction);
        
        $updateUserBalance = [
            'user_id' => $users_recharge->user_id,
            'balance' => $users_recharge->recharge_amount + $user_balance->balance,
            'available_balance' => $users_recharge->recharge_amount + $user_balance->available_balance,
            'status' => $balance_status,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ];

        DB::table('user_balances')->where('user_id', $users_recharge->user_id)->update($updateUserBalance);

        return redirect('manage-recharge')->with('flash_message_success','Recharge Successfully Done');
    }

    public function edit($id){
        $balance = UserBalance::findOrFail($id);
        $recharge_users = DB::table('users')->where('user_type', 'user')->where('status','1')->get();
        $users = DB::table('users')->where('user_type', 'user')->where('status','1')->first();
        $recharge = RechargeDetail::where('id', $id)->first();
        return view('admin.recharge.edit',compact('balance','recharge_users','users','recharge'));
    }

    public function update(Request $request, $id){
        
    }

    public function delete(){
        
    }
}
