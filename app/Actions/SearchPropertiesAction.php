<?php

namespace App\Actions;

use App\Helpers\QueryFilter\QueryFilter;
use App\Models\Property;
use App\QueryFilters\PropertyPriceFilter;
use Illuminate\Database\Eloquent\Collection;
use Spatie\QueryBuilder\AllowedFilter;

class SearchPropertiesAction
{
    /**
     * @return Collection|array
     */
    public function execute(): Collection|array
    {
        $query = Property::query();

        new QueryFilter($query, $this->getAllowedFilters(), $this->getDefaultSort());

        return $query->get();
    }

    /**
     * @return array
     */
    private function getAllowedFilters(): array
    {
        return [
            AllowedFilter::partial('name'),
            AllowedFilter::exact('bedrooms'),
            AllowedFilter::exact('bathrooms'),
            AllowedFilter::exact('storeys'),
            AllowedFilter::exact('garages'),
            AllowedFilter::custom('price', new PropertyPriceFilter())
        ];
    }

    protected function getDefaultSort(): ?string
    {
        return '-id';
    }
}
