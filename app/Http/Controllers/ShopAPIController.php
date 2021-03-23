<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Orders;
use App\Models\ApiLog;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class ShopAPIController extends Controller
{
    /**
     * syncOrders cronjob
     * 
     * @access public
     * @return void
     */
    public function syncOrders()
    {
        $last_order_id = DB::table('deliveries')->get('id')->last();
        $response = Http::get('http://example.com//webshop/public/api/v1/orders'.(!empty($last_order_id->id) ? 'last_order_id='.$last_order_id->id : ''));

        $response = json_decode($response);
        if (!empty($response) && is_array($response)) {
            foreach ($response as $order) {
                // Insert delivery
                DB::insert('insert into deliveries 
                (id, customer_firstname, customer_lastname, delivery_address, delivery_zip, delivery_place, delivery_country, created_at, updated_at) 
                values 
                (?, ?, ?, ?, ?, ?, ?, ?, ?)', 
                [$order->id, $order->customer->firstname, $order->customer->lastname, $order->shipping_address->address, $order->shipping_address->zipcode, $order->shipping_address->city, $order->shipping_address->country, now(), now()]);
                
                // Insert delivery_products
                foreach ($order->product_orders as $product) {
                    DB::insert('insert into delivery_products
                    (product_id, amount, delivery_id, created_at, updated_at) 
                    values 
                    (?, ?, ?, ?, ?)', 
                    [$product->id, $product->amount, $order->id, now(), now()]);
                }
            }
        }
    }



    /**
     * Send all product changes
     * 
     * @access public
     * @return void
     */
    public function send_product_changes() {
        $last_update = DB::table('api_logs')->where('status_id', '=', 1)->where('table', '=', 'products')->where('api_id', '=', 1)->get('created_at')->last();
        $changes = DB::table('products')->where('updated_at', '>=', $last_update->created_at)->orWhere('created_at', '>=', $last_update->created_at)->get();
        
        $status = false;
        if (!empty($changes)) {
          $status = true;
            foreach ($changes as $change) {
              if ($change->is_deleted) {
                $response = Http::post('http://example.com//webshop/public/api/v1/product?article_id='.$change->id.'&deleted=1', []);
              }
              else {
                $response = Http::post('http://example.com//webshop/public/api/v1/product?article_id='.$change->id.'&deleted=0&active='.$change->is_live, [
                  'uid'               => $change->id,
                  'product'           => $change->name,
                  'description'       => $change->long_desc,
                  'price'             => $change->price,
                  //'vegan'           => $change->vegan,
                  //'vegetarian'      => $change->vegetarian,
                  //'picture'         => $change->picture,
                  'slug'              => $change->sku,
                  'declaration'       => $change->declaration,
                  'manufacturer_id'   => $change->name,
                ]);
              }
              if (!$response->successful()) {
                $status = false;
              }
            }
        }
        DB::insert('insert into api_logs (`status_id`, `message`, `api_id`, `table`, `created_at`, `updated_at`) values (?, ?, 1, "products", NOW(), NOW())', [intval($status), ""]);
    }

    /**
     * Send all category changes
     * 
     * @access public
     * @return void
     */
    public function send_category_changes() {
        $last_update = APILog::where('status_id', '=', 1)->where('table', '=', 'category')->where('api_id', '=', 1)->get('created_at');
    }

    /**
     * Send all producers changes
     * 
     * @access public
     * @return void
     */
    public function send_producers_changes() {
        $last_update = APILog::where('status_id', '=', 1)->where('table', '=', 'producers')->where('api_id', '=', 1)->get('created_at');
    }

    /**
     * Send all special_prices changes
     * 
     * @access public
     * @return void
     */
    public function send_special_prices_changes() {
        $last_update = APILog::where('status_id', '=', 1)->where('table', '=', 'special_prices')->where('api_id', '=', 1)->get('created_at');
    }
}
