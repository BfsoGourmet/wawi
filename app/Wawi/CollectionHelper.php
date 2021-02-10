<?php

namespace App\Wawi;


use Illuminate\Support\Collection;

class CollectionHelper
{
    /**
     * @param Collection $products
     * @param float $threshold
     * @return Collection
     */
    public static function productsWithPriceLargerThan(Collection $products, float $threshold) : Collection{
        return $products->where('price','>=',$threshold);
    }

    /**
     * @param Collection $products
     * @return float
     */
    public static function findTotalProductsPriceInCard(Collection $products) : float{
        return $products->sum('price');
    }

    /**
     * @param Collection $products
     * @return Collection
     */
    public static function findAllProductTitles(Collection $products) : Collection {
        return $products->pluck('title');
    }


}
