<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBillRequest;
use App\Http\Requests\UpdateBillRequest;
use App\Models\Bill;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBillRequest  $request
     * @return Response
     */
    public function store(StoreBillRequest $request)
    {
        dd($request->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param float $value
     * @return JsonResponse
     */
    public function getExpensive(float $value): JsonResponse
    {
        $bills_expensive = Bill::where('value', '>', $value)->get();
        return response()->json($bills_expensive);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param float $value
     * @return JsonResponse
     */
    public function getValueBetween(float $value1, float $value2): JsonResponse
    {
        $bills_between = Bill::whereBetween('value', array($value1, $value2))->get();
        return response()->json($bills_between);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return Response
     */
    public function show(Bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return Response
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBillRequest  $request
     * @param  \App\Models\Bill  $bill
     * @return Response
     */
    public function update(UpdateBillRequest $request, Bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bill  $bill
     * @return Response
     */
    public function destroy(Bill $bill)
    {
        //
    }
}
