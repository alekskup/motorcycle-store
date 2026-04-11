<?php

namespace App\Actions\Catalog;

use App\Contracts\Catalog\CatalogFilterInterface;
use App\DTOs\Catalog\FilterCriteria;
use App\Models\Motorcycle;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class FilterMotorcyclesAction implements CatalogFilterInterface
{
    public function filter(FilterCriteria $criteria): LengthAwarePaginator
    {
        $query = Motorcycle::query()
            ->with('brand')
            ->available();


        if ($criteria->brandId) {
            $query->where('brand_id', $criteria->brandId);
        }

        $query->priceBetween($criteria->priceMin, $criteria->priceMax);

        $sortedQuery = match ($criteria->sort) {
            'price_asc'  => (clone $query)->orderBy('price', 'asc'),
            'price_desc' => (clone $query)->orderBy('price', 'desc'),
            default      => (clone $query)->latest(),
        };

        return $sortedQuery->paginate(
            perPage: $criteria->perPage,
            columns: ['*'],
            pageName: 'page',
            page: $criteria->page
        );
    }
}
