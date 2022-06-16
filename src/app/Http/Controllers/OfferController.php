<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Recruit;
use Illuminate\Http\Request;
use App\Http\Requests\OfferRequest;
use App\Http\Requests\OfferCreateRequest;

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
    public function create(OfferCreateRequest $request, Offer $offer, Recruit $recruit,)
    {
        // dd($request);
        // $recruitRoles = $recruit->recruitRoles()->with('role')->get()->whereNotNull('reward');
        $recruitRoles = $recruit->getRecruitRoles($recruit);

        $data = ['recruit' => $recruit, 'offer' => $offer, 'recruitRoles' => $recruitRoles];

        return view('offers.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferRequest $request, Offer $offer)
    {
        $offer = new Offer;
        $offer->fill($request->except('recruit_roles', 'attachedFile'));
        $offer->user_id = \Auth::id();
        $offer->storeFile($request, $offer);
        $offer->dateFormat($request, $offer);
        // dd($request,$offer);

        $offer->save();
        $offer->registerOfferRoles($offer, $request);

        // $this->sendMessageAfterStored($offer);
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

    public function sendMessageAfterStored($offer)
    {
        return dd($offer);
    }
}
