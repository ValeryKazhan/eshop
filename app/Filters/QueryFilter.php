<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class QueryFilter
{
    public Request $request;
    protected Builder $builder;
    protected string $delimiter;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function filters(){
        return $this->request->query();
    }

    public function apply(Builder $builder){
        $this->builder = $builder;

        foreach ($this->filters() as $name => $value){

            if(method_exists($this, $name)&&$value){
                call_user_func_array([$this, $name], array_filter([$value]));
            }
        }

        return $builder;
    }

}
