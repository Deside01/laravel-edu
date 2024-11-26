<?php

namespace App\Http\Controllers;

use App\Http\Requests\LunarMissionRequest;
use App\Http\Resources\LunarMissionResource;
use App\Http\Resources\SearchMissionResource;
use App\Models\LunarMission;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class LunarMissionController extends Controller
{
    /**
     * Get missions
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
//        return LunarMission::query()->get();
        return LunarMissionResource::collection(LunarMission::query()->get());
    }

    /**
     * Get one mission
     *
     * @param LunarMission $mission
     * @return LunarMissionResource
     */
    public function show(LunarMission $mission): LunarMissionResource
    {
        return LunarMissionResource::make($mission);
    }

    /**
     * Add mission
     * @param LunarMissionRequest $request
     * @return JsonResponse
     */
    public function store(LunarMissionRequest $request): JsonResponse
    {
        /** @var User $user */
        $user = auth()->user();
        $user->lunarMissions()->create($request->validated()['mission']);

        return response()->json([
            'data' => [
                'code' => 201,
                'message' => 'Миссия добавлена.',
            ]
        ], 201);
    }

    /**
     * @param LunarMission $mission
     * @return Response
     */
    public function delete(LunarMission $mission): Response
    {
        $mission->delete();

        return response()->noContent();
    }

    /**
     * @param LunarMissionRequest $request
     * @param LunarMission $mission
     * @return JsonResponse
     */
    public function update(LunarMissionRequest $request, LunarMission $mission): JsonResponse
    {
        $mission->update($request->validated()['mission']);

        return response()->json([
           'data' => [
               'code' => 200,
               'message' => "Миссия обновлена"
           ]
        ]);
    }

    public function search()
    {
        //$query = request('query', ''); Тоже самое
        $query = request()->input('query', '');

        return SearchMissionResource::collection(LunarMission::query()->
        where('name', 'like', '%' . $query . '%')
            ->orWhereJsonContains('spacecraft->crew', ['name' => $query])
            ->get());
    }
}
