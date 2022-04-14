<?php

namespace App\Http\Controllers;

use App\Models\Recruit;
use App\Http\Requests\RecruitRequest;
use Illuminate\Http\Request;

class RecruitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*         $recruits = [
            (object) [
                'id' => 1,
                'title' => '募集タイトル1',
                'body' => '募集内容の詳細1',
                'budget' => '10万円',
                'category' => 'A',
                'recruits_role' => 'A',
                'created_at' => now(),
                'user' => (object) [
                    'id' => 1,
                    'name' => 'ユーザー名1',
                ],
            ],
            (object) [
                'id' => 1,
                'title' => '募集タイトル1',
                'body' => '募集内容の詳細1',
                'budget' => '10万円',
                'category' => 'A',
                'recruits_role' => 'A',
                'created_at' => now(),
                'user' => (object) [
                    'id' => 1,
                    'name' => 'ユーザー名1',
                ],
            ],
            (object) [
                'id' => 1,
                'title' => '募集タイトル1',
                'body' => '募集内容の詳細1',
                'budget' => '10万円',
                'category' => 'A',
                'recruits_role' => 'A',
                'created_at' => now(),
                'user' => (object) [
                    'id' => 1,
                    'name' => 'ユーザー名1',
                ],
            ],
        ];
 */
        $recruits = Recruit::with('user')->get();
        return view('recruits.index', ['recruits' => $recruits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recruits.create');
    }

    /**
     * Confirm the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request)
    {
        $inputs = $request->all();
        return view('recruits.confirm', ['inputs' => $inputs]);
    }
    /**
     * Send the confirmed form for storing a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        return redirect('recruits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
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
        //
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
