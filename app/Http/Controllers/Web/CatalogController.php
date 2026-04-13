<?php

namespace App\Http\Controllers\Web;

use App\Contracts\Catalog\CatalogFilterInterface;
use App\DTOs\Catalog\FilterCriteria;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function __construct(
        private readonly CatalogFilterInterface $filter
    ) {}

    public function index(Request $request)
    {
        $criteria = new FilterCriteria(
            brandId: $request->integer('brand_id'),
            priceMin: $request->integer('price_min'),
            priceMax: $request->integer('price_max'),
            page: $request->integer('page', 1),
            sort: $request->string('sort'),
        );

        $motorcycles = $this->filter->filter($criteria);

        $brands = Brand::where('is_active', true)->get();

        return view('catalog.index', compact('motorcycles', 'brands'));
    }
}
