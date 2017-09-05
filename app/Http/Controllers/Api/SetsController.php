<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Set\StoreRequest;
use App\Http\Requests\Set\UpdateRequest;
use App\Models\Set;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Set[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index(): Collection
    {
        return Set::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest|Request $request
     * @return Set
     */
    public function store(StoreRequest $request): Set
    {
        return Set::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Set
     */
    public function show($id): Set
    {
        return Set::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest|Request $request
     * @param  int $id
     * @return Set
     */
    public function update(UpdateRequest $request, $id): Set
    {
        $set = Set::findOrFail($id);
        $set->update($request->all());
        return $set;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $set = Set::findOrFail($id);
        $set->delete();
        return JsonResponse::create([
            "message" => "L'extension $set->name a bien été supprimée."
        ], 200);
    }
}
