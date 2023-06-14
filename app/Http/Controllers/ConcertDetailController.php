<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\Request;

class ConcertDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexSellsConcertDetails($id_concert){
        $details = DetailOrder::getDetailsByConcert($id_concert);
        $collection = collection;
        foreach($details as $detail){
            $user = User::findOrFail($detail->$user_id);
            $data = [
                'user' => $user,
                'detail_order' => $detail,
            ];
            $collection.add($data);
        }

        return view('admin.sellsDetails',[
            'allData' => $collection
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(task $task)
    {
        //
    }
}
