<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class CrudController
{
    protected $classe;

    public function index(Request $request)
    {
        return $this->classe::paginate($request->per_page);
    }

    public function store(Request $request)
    {
        return response()->json($this->classe::create($request->all()), 201);
    }

    public function show(int $id)
    {
        $resource = $this->classe::find($id);
        if (is_null($resource)) {
            return response()->json('', 204);
        }

        return response()->json($resource);
    }

    public function update(int $id, Request $request)
    {
        $resource = $this->classe::find($id);
        if (is_null($resource)) {
            return response()->json(['erro' => 'Resource not found'], 404);
        }
        $resource->fill($request->all());
        $resource->save();

        return $resource;
    }

    public function destroy(int $id)
    {
        $resourcesRemoved = $this->classe::destroy($id);
        if ($resourcesRemoved === 0) {
            return response()->json(['erro' => 'Resource not found'], 404);
        }

        return response()->json('', 204);
    }
}
