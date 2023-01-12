<?php
/**
 * Created by: MinhLuc
 * Email: luccui2k@gmail.com
 * Date: 25/12/2022
 * Time: 12:40
 * File: DetailOrderRepository.php
 */

namespace Luccui\ShareData\Repositories\DetailOrder;

use Illuminate\Support\Facades\DB;
use Luccui\ShareData\Models\DetailOrder;
use Luccui\ShareData\Models\Product;
use Luccui\ShareData\Models\Sku;
use Luccui\ShareData\Repositories\EloquentRepository;

class DetailOrderRepository extends EloquentRepository implements DetailOrderInterface
{
    public function model()
    {
        return DetailOrder::class;
    }

    public function makeOrderDetail($params)
    {
        $quantity = $params['quantity'];
        $sku = Sku::where([
            'id' => $params['sku_id'],
            'product_id' => $params['product_id'],
        ])->first();

        $product = Product::find($params['product_id']);

        if(!$sku || !$product)
            return;

        $name = $product->name;
        $price = $sku->price;

        return $this->model->create([
            'order_id' =>  $params['order_id'],
            'product_id' => $params['product_id'],
            'sku_id' =>  $params['sku_id'],
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
            'total' => $price * $quantity
        ]);
    }
}