<?php

namespace App\Http\Controllers;

use App\Models\AccountHead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AccountHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trans= AccountHead::with('head','trans','group')->get(['account_head','id']);
        return response()->json($trans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $head = new AccountHead();
        $head->group_id=$request->group_id;
        $head->account_head=$request->account_head;
        $head->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccountHead  $accountHead
     * @return \Illuminate\Http\Response
     */
    public function show(AccountHead $accountHead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccountHead  $accountHead
     * @return \Illuminate\Http\Response
     */
    public function edit(AccountHead $accountHead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccountHead  $accountHead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccountHead $accountHead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccountHead  $accountHead
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountHead $accountHead)
    {
        //
    }
}
