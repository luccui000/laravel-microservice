<?php
/**
 * Created by: MinhLuc
 * Email: luccui2k@gmail.com
 * Date: 21/12/2022
 * Time: 22:37
 * File: Comment.php
 */

namespace Luccui\ShareData\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
        'post_id',
    ];
}
