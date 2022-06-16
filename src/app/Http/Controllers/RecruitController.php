<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RecruitRequest;
use App\Models\Recruit;
use App\Models\Role;
use App\Models\RolesCategory;
use App\Models\RecruitRole;
use App\Models\Offer;

class RecruitController extends Controller
{
    const PERPAGE = 1;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Recruit $recruit)
    {
        // dd($request->to);
        if ($request->to === 'me') {
            return $this->ownRecruits();
        }
        else
        {
            $recruits = $recruit->with('user')->paginate($this::PERPAGE);
            // $categories = $recruit->getCategories();

            $data = ['recruits' => $recruits,];
            // dd($recruits);
            return view('recruits.index', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recruit = new Recruit;
        $bookCategories = $recruit->getBookCategories();
        $rolesCategories = RolesCategory::with('roles')->get();
        // dd($bookCategories);
        $data = ['recruit' => $recruit, 'bookCategories' => $bookCategories, 'rolesCategories' => $rolesCategories];

        return view('recruits.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecruitRequest $request)
    {
        $recruit = new Recruit;
        $recruit->fill($request->except('rewards', 'attachedFile'));
        $recruit->user_id = auth()->id();
        $recruit->storeFile($request, $recruit);
        // dd($recruit, $request);

        $recruit->save();

        // Register rewards to recruit_roles intermediate table after $recruit saved
        $recruit->registerRewards($recruit, $request);

        return redirect()->route('recruits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Recruit $recruit, Offer $offer)
    {
        $bookCategory = $recruit->getBookCategory($recruit);
        $recruitRoles = $recruit->recruitRoles()->with('role')->get()->whereNotNull('reward');
        $offers = Offer::with('user')->get();

        $recruitRoles = $recruit->getRecruitRoles($recruit);

        // dd($recruitRoles);

        // dump($tmp, $offers);
        return view('recruits.show', ['recruit' => $recruit, 'offers' => $offers, 'bookCategory' => $bookCategory, 'recruitRoles' => $recruitRoles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Recruit $recruit)
    {
        $bookCategories = $recruit->getCategories();
        $rolesCategories = RolesCategory::with('roles')->get();
        // $recruitRoles = $recruit->recruitRoles()->with('role')->get()->whereNotNull('reward');
        $recruitRoles = $recruit->getRecruitRoles($recruit);

        $data = ['recruit' => $recruit, 'bookCategories' => $bookCategories, 'rolesCategories' => $rolesCategories, 'recruitRoles' => $recruitRoles];

        return view('recruits.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recruit $recruit)
    {
        $recruit->fill($request->all());
        $recruit->dateFormat($request, $recruit);
        $recruit->user_id = \Auth::id();
        $recruit->storeFile($request, $recruit);
        $recruit->save();
        // dd($request, $recruit);
        $recruit->registerRewards($recruit, $request);

        $data = ['recruit' => $recruit];

        return redirect()->route('recruits.index', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recruit $recruit)
    {
        $recruit->delete();
        return redirect()->route('recruits.index');
    }

    public function ownRecruits()
    {
            $id = auth()->id();
            $recruits = Recruit::where('user_id', $id)->paginate($this::PERPAGE);
            if ($recruits->isEmpty()) {
                return back();
            }else{
                // dd($recruits);
                $data = ['recruits' => $recruits,];

                return view('recruits.index', $data);
            }
    }
}
