<?php

namespace App\Http\Controllers;

use App\ActivityComment;
use Illuminate\Http\Request;

class ActivityCommentController extends Controller
{

    public function __construct(ActivityComment $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model->all();
    }

    public function store(Request $request)
    {
        return $this->model->create($request->all());
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
