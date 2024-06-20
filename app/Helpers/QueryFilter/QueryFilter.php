<?php

namespace App\Helpers\QueryFilter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Spatie\QueryBuilder\QueryBuilder;

class QueryFilter extends QueryBuilder
{
    public function __construct(Builder|Relation $query, ?array $filters = null, ?string $defaultSort = null)
    {
        parent::__construct($query);

        if ($filters) {
            $this->allowedFilters($filters);
        }

        if ($defaultSort) {
            $this->defaultSorts($defaultSort);
        }
    }
}
