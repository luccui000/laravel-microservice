<?php
/**
 * Created by: MinhLuc
 * Email: luccui2k@gmail.com
 * Date: 24/12/2022
 * Time: 16:08
 * File: ProductVariantRepository.php
 */

namespace Luccui\ShareData\Repositories\ProductVariant;

use Luccui\ShareData\Models\ProductVariant;
use Luccui\ShareData\Repositories\EloquentRepository;

class ProductVariantRepository extends EloquentRepository implements ProductVariantInterface
{

    public function model()
    {
        return ProductVariant::class;
    }

    public function getProductVariantByProductId($productId)
    {
        return $this->model->where('product_id', $productId)->get('name');
    }
}