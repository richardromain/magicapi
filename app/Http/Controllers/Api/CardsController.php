<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Card\StoreRequest;
use App\Http\Requests\Card\UpdateRequest;
use App\Models\Card;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection
     */
    public function index(): Collection
    {
        return Card::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        return Card::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Card
     */
    public function show($id): Card
    {
        return Card::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest|Request $request
     * @param  int $id
     * @return Card
     */
    public function update(UpdateRequest $request, $id): Card
    {
        $card = Card::findOrFail($id);
        $card->update($request->all());
        return $card;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $card = Card::findOrFail($id);
        $card->delete();
        return JsonResponse::create([
            "message" => "La carte $card->name a bien été supprimée."
        ], 200);
    }
}
