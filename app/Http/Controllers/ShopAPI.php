<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Http;

class ShopAPI extends Controller
{
    /**
     * syncOrders cronjob
     * 
     * @access public
     * @return void
     */
    public function syncOrders()
    {
        $last_order_id = Orders::get_last_id();
        $response = Http::get('http://example.com//webshop/public/api/v1/orders?last_order_id='.$last_order_id);

    }



    /**
     * Send all products
     * 
     * @access public
     * @return void
     */
    public function send_all_products() {
        
    }

    /**
     * Send all categories
     * 
     * @access public
     * @return void
     */
    public function send_all_categories() {

    }
}
