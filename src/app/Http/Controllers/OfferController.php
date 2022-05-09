<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Recruit;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Offer $offer, Recruit $recruit)
    {
        $select_options = $offer->selectOptions();
        $select_roles = $recruit->selectRoles();

        $data = ['recruit' => $recruit, 'select_options' => $select_options, 'select_roles' => $select_roles];

        return view('offers.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Offer $offer, Recruit $recruit)
    {
        $offer->fill($request->all());
    $offer->recruit_id = Recruit::find($request->recruit_id);
        $offer->user_id = \Auth::id();

        $offer->dateFormat($request, $offer);

        $offer->save();

        $data = ['offer' => $offer];
        return redirect()->route('recruits.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        //
    }
}
