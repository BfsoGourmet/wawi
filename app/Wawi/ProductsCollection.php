<?php

namespace App\Wawi;


use Illuminate\Support\Collection;

class ProductsCollection extends Collection
{
    /**
     * @param float $threshold
     * @return Collection
     */
    public function priceLagerThan(float $threshold) : Collection{
        return $this->where('price','>=',$threshold);
    }

    /**
     * @return float
     */
    public function totalPrice() : float{
        return $this->sum('prce');
    }

    /**
     * @return Collection
     */
    public function findAllTitles() : Collection {
        return $this->pluck('title');
    }


}
