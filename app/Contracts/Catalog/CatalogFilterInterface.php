<?php

namespace App\Contracts\Catalog;

use App\DTOs\Catalog\FilterCriteria;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface CatalogFilterInterface
{
    public function filter(FilterCriteria $criteria): LengthAwarePaginator;
}
