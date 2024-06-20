<?php

namespace App\Http\Controllers;

use App\Actions\SearchPropertiesAction;
use App\Http\Requests\PropertySearchRequest;
use App\Http\Resources\PropertyResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PropertyController extends Controller
{
    /**
     * @param PropertySearchRequest $request
     * @param SearchPropertiesAction $action
     * @return AnonymousResourceCollection
     */
    public function index(PropertySearchRequest $request, SearchPropertiesAction $action): AnonymousResourceCollection
    {
        return PropertyResource::collection($action->execute());
    }
}
