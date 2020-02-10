<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Amount;
use Illuminate\Support\Facades\Validator;

class AmountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amounts = Amount::orderBy('id', 'asc')->paginate(9);

        return view('amounts.index')->with('amounts',$amounts);
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
        $validator = Validator::make($request->input(), array(
            'description' => 'required|min:5',
            'amount' => 'required|min:3',
        ));

        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validator->errors(),
            ], 422);
        }

        $amount = Amount::create($request->all());

        return response()->json([
            'error' => false,
            'amount'  => $amount,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $amount = Amount::find($id);

        return response()->json([
            'error' => false,
            'amount'  => $amount,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->input(), array(
            'description' => 'required|min:5',
            'amount' => 'required|min:3',
        ));

        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validator->errors(),
            ], 422);
        }

        $amount = Amount::find($id);

        $amount->description =  $request->description;
        $amount->amount = $request->amount;

        $amount->save();

        return response()->json([
            'error' => false,
            'amount'  => $amount,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $amount = Amount::destroy($id);

        return response()->json([
            'error' => false,
            'amount'  => $amount,
        ], 200);
    }
}
