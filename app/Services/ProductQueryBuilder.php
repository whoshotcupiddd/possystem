<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;

class ProductQueryBuilder
{
    protected $query;

    public function __construct(Builder $query)
    {
        $this->query = $query;
    }

    public function applyFilters(array $filters)
    {
        foreach ($filters as $filter => $value) {
            $method = 'apply' . ucfirst($filter) . 'Filter';
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
        return $this->query;
    }

    protected function applySearchFilter($search)
    {
        $this->query->where('name', 'like', '%' . $search . '%');
    }

    protected function applyQuantityFilter($quantity)
    {
        $this->query->where('quantity', '>=', $quantity);
    }
}
