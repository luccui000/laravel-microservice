<?php

namespace App\Http\Controllers;

use Luccui\ShareData\Repositories\Comment\CommentRepository;

class CommentController extends GeneralController
{
    public function __construct(
        CommentRepository $commentRepository
    )
    {
        parent::__construct($commentRepository);
    }
}
