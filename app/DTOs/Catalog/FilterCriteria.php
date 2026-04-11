<?php

namespace App\DTOs\Catalog;

final readonly class FilterCriteria
{
    public function __construct(
        public ?int $brandId  = null,
        public ?int $priceMin = null,
        public ?int $priceMax = null,
        public int $page      = 1,
        public int $perPage   = 10,
        public string $sort   = 'newest'
    ) {}
}
