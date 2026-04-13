<?php

namespace App\DTOs\Catalog;

use Illuminate\Http\Request;

final readonly class FilterCriteria
{
    public const int DEFAULT_PAGE = 1;
    public const int DEFAULT_PER_PAGE = 12;
    public const int MIN_PER_PAGE = 1;
    public const int MAX_PER_PAGE = 100;

    public function __construct(
        public ?int $brandId = null,
        public ?int $priceMin = null,
        public ?int $priceMax = null,
        public  int $page = self::DEFAULT_PAGE,
        public  int $perPage = self::DEFAULT_PER_PAGE
    ) {}
}
