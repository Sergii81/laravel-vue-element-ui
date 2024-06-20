<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class PropertyPriceFilter implements Filter
{

    /**
     * @param Builder $query
     * @param mixed $value
     * @param string $property
     * @return void
     */
    public function __invoke(Builder $query, mixed $value, string $property): void
    {
        if (! empty($value['price_min']) && ! empty($value['price_max']) && $value['price_min'] < $value['price_max']) {
            $query->whereBetween('price', $value);
        }
    }
}
