<?php

namespace App\Filters;

class ProductFilter extends QueryFilter
{
    public function search($search){
        $search = ('%'.$search.'%');
        $this->builder
            ->where('name', 'like', $search);
    }

}
