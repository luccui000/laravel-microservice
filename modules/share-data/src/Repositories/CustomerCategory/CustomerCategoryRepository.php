<?php
/**
 * Created by: MinhLuc
 * Email: luccui2k@gmail.com
 * Date: 25/12/2022
 * Time: 12:40
 * File: DetailOrderRepository.php
 */

namespace Luccui\ShareData\Repositories\CustomerCategory;
 
use Luccui\ShareData\Models\CustomerCategory; 
use Luccui\ShareData\Repositories\EloquentRepository;

class CustomerCategoryRepository extends EloquentRepository implements CustomerCategoryInterface
{
  public function model() 
  {
    return CustomerCategory::class;
  }
}