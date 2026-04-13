<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Catalog\CatalogFilterInterface;
use App\DTOs\Catalog\FilterCriteria;
use Illuminate\Http\JsonResponse; // Тип возврата для JSON
use Illuminate\Http\Request;

readonly class CatalogController
{
    public function __construct(
        private CatalogFilterInterface $filter
    ) {}

    public function index(Request $request): JsonResponse
    {
        $criteria = new FilterCriteria(
            brandId: $request->integer('brand_id'),
            priceMin: $request->integer('price_min'),
            priceMax: $request->integer('price_max'),
            page: $request->integer('page', 1),
            perPage: $request->integer('per_page', 10),
            sort: $request->string('sort'),
        );

        $motorcycles = $this->filter->filter($criteria);

        return response()->json([
            'data' => $motorcycles->items(),
            'meta' => [
                'current_page' => $motorcycles->currentPage(),
                'last_page' => $motorcycles->lastPage(),
                'total' => $motorcycles->total(),
            ]
        ]);
    }
}
