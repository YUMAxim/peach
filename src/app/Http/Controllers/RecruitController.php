<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecruitRequest;
use App\Models\Recruit;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\RecruitSelectController;

class RecruitController extends Controller
{
    private $recruit_select;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recruits = Recruit::with('user')->get();

        $recruit_select = new RecruitSelectController;
        $categories = $recruit_select->categories();
        $select_options = $recruit_select->selectOptions();

        $data = ['categories' => $categories, 'select_options' => $select_options];

        return view('recruits.index', ['recruits' => $recruits], $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recruit_select = new RecruitSelectController;
        $categories = $recruit_select->categories();
        $select_options = $recruit_select->selectOptions();

        $data = collect(['categories' => $categories, 'select_options' => $select_options]);

        return view('recruits.create', $data);
    }

    /**
     * Confirm the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // RecruitRequest injection
    // public function confirm(Request $request)
    // {
    //     $inputs = collect($request->all());
    //     $recruit_select = new RecruitSelectController;
    //     $categories = $recruit_select->categories();
    //     $select_options = $recruit_select->selectOptions();
    //     $data = collect(['inputs' => $inputs, 'categories' => $categories, 'select_options' => $select_options]);

    //     return view('recruits.confirm', $data);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Recruit $recruit)
    {
        $recruit = \Auth::user()->recruits()->create($request->all());
        $data = ['recruit' => $recruit];
        return redirect()->route('recruits.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Recruit $recruit)
    {
        return view('recruits.show', ['recruit' => $recruit]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Recruit $recruit)
    {
        $recruit_select = new RecruitSelectController;
        $categories = $recruit_select->categories();
        $select_options = $recruit_select->selectOptions();

        $data = collect(['recruit' => $recruit, 'categories' => $categories, 'select_options' => $select_options]);

        return view('recruits.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $recruit = \Auth::user()->recruits()->create($request->all());
        $data = ['recruit' => $recruit];

        return redirect()->route('recruits.index', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }
}
