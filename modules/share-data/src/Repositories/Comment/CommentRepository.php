<?php

/**
 * Created by: MinhLuc
 * Email: luccui2k@gmail.com
 * Date: 21/12/2022
 * Time: 22:36
 * File: CommentRepository.php
 */
namespace Luccui\ShareData\Repositories\Comment;

use Luccui\ShareData\Models\Comment;
use Luccui\ShareData\Repositories\EloquentRepository;

class CommentRepository extends EloquentRepository implements CommentInterface
{
    public function model()
    {
        return Comment::class;
    }

    public function totalComments()
    {
        return $this->model->count();
    }
}