<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecruitRequest;
use App\Models\Recruit;
use App\Models\RecruitRole;
use App\Models\Category;
use Illuminate\Http\Request;

class RecruitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Recruit $recruit)
    {
        $recruits = Recruit::with('user')->get();

        $categories = $recruit->selectCategories();
        $select_options = $recruit->selectOptions();

        $data = ['categories' => $categories, 'select_options' => $select_options];

        return view('recruits.index', ['recruits' => $recruits], $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Recruit $recruit)
    {
        $select_categories = $recruit->selectCategories();
        $select_options = $recruit->selectOptions();
        $select_roles = $recruit->selectRoles();

        $data = ['select_categories' => $select_categories, 'select_options' => $select_options, 'select_roles' => $select_roles, 'recruit' => $recruit];
        // dd($data);
        return view('recruits.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, RecruitRole $recruit_role)
    {
        $recruit = new Recruit;
        $recruit->fill($request->all());
        $files = $request->file('file_attachment');
        $recruit->storeFiles($files);
        $recruit->user_id = \Auth::id();
        $roles = [];
        foreach ($request->rewards as $key => $val) {
            if (isset($val)) {
                array_push($roles, $key);
            }
        }
        $recruit->dateFormat($request, $recruit);

        // dd($request, $recruit, $roles);
        $recruit->save();

        $recruit->recruits_roles = $roles;
        $recruit->recruit_role_roles()->sync($recruit->recruits_roles);

        // foreach($request->rewards as $key => $reward){
        //     $tmp = $recruit_role->whereRoleId($key)->first();
        //     // dd($tmp);
        //     $tmp->create([
        //         'reward' => $reward,
        //     ]);
        // }


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
        $select_options = $recruit->selectOptions();
        $category = $recruit->getCategory($recruit);

        return view('recruits.show', ['recruit' => $recruit, 'select_options' => $select_options, 'category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Recruit $recruit)
    {
        $categories = $recruit->categories();
        $select_options = $recruit->selectOptions();

        $data = ['recruit' => $recruit, 'categories' => $categories, 'select_options' => $select_options];

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
