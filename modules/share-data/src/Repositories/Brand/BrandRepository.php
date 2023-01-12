<?php
/**
 * Created by: MinhLuc
 * Email: luccui2k@gmail.com
 * Date: 24/12/2022
 * Time: 15:16
 * File: BrandRepository.php
 */

namespace Luccui\ShareData\Repositories\Brand;

use Luccui\ShareData\Models\Brand;
use Luccui\ShareData\Repositories\EloquentRepository;

class BrandRepository extends EloquentRepository implements BrandInterface
{
    public function model()
    {
        return Brand::class;
    }
}