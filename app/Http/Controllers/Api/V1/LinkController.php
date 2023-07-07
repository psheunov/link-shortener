<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LinkRequest;
use App\Http\Resources\LinkResource;
use App\Models\Link;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LinkController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function latest(): JsonResponse
    {
        $latest = Link::latest()->take(config('app.latest_urls_count'))->get();

        return response()->json( LinkResource::collection($latest));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LinkRequest $request
     * @return JsonResponse
     */
    public function store(LinkRequest $request): JsonResponse
    {
        Link::create($request->validated());

        return response()->json(['success' => true]);
    }
}
