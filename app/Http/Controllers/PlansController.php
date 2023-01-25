<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlansController extends Controller
{
    public function list()
    {
        $plans = Plan::orderBy('position', 'desc')->orderBy('id', 'asc')->get();
        return view('plans/list', ['plans' => $plans]);
    }

    public function add()
    {
        return view('plans/add');
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        Plan::create([
            'user_id' => Auth::user()->id,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'special' => strval(intval(boolval($request->input('special'))))
        ]);

        return redirect("plans")->with('msg', 'Plan saved successfully');
    }

    public function detail(Plan $plan)
    {
        return view('plans.detail', ['plan' => $plan]);
    }

    public function edit(Plan $plan)
    {
        return view('plans.edit', ['plan' => $plan]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'title' => 'required',
            'description' => 'required'
        ]);

        $plan = Plan::find($request->input('id'));
        if ($plan === null) {
            return redirect('/')->with('msg', 'This plan does not exist');
        }

        $plan->title = $request->input('title');
        $plan->description = $request->input('description');
        $plan->special = strval(intval(boolval($request->input('special'))));
        $plan->save();

        return redirect('plans')->with('msg', 'Plan saved successfully');
    }

    public function publishEdit(Plan $plan)
    {
        return view('plans.publish', ['plan' => $plan]);
    }

    public function publish(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'title' => 'required',
            'text' => 'required'
        ]);

        // create news item from plan
        News::create([
            'user_id' => Auth::user()->id,
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'created_from_plan' => '1',
            'special' => strval(intval(boolval($request->input('special'))))
        ]);

        // delete the plan
        $plan = Plan::find($request->input('id'));
        $plan->delete();

        return redirect("news")->with('msg', 'News item published successfully');
    }
}
