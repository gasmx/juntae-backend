<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{

    public function __construct(Activity $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        //dd(\App\ActivityCard::first()->status);
        $model = $this->model->leftJoin('activity_users', 'activity_users.activity_id', 'activities.id');

        $model->where(
            function ($query) {
                return $query
                    ->where('activities.owner_id', auth()->user()->id)
                    ->orWhere('activity_users.user_id', auth()->user()->id);
            }
        );

        $model->select('activities.*')->with('cards')->with('comments');

        return $model->get();
    }

    public function store(Request $request)
    {
        $params = $request->all();
        $params['owner_id'] = auth()->user()->id;
        return $this->model->create($params);
    }

    public function show($id)
    {
        return $this->model->find($id);
    }

    public function update(Request $request, $id)
    {
        $this->model->find($id)->fill($request->all())->save();
        return response(null, 204);
    }

    public function destroy($id)
    {
        $this->model->destroy($id);
        return response(null, 204);
    }
}
