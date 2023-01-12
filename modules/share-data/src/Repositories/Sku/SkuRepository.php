<?php
/**
 * Created by: MinhLuc
 * Email: luccui2k@gmail.com
 * Date: 25/12/2022
 * Time: 13:52
 * File: SkuRepository.php
 */

namespace Luccui\ShareData\Repositories\Sku;

use Luccui\ShareData\Models\Sku;
use Luccui\ShareData\Repositories\EloquentRepository;

class SkuRepository extends EloquentRepository implements SkuInterface
{
    public function model()
    {
        return Sku::class;
    }
}