<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Luccui\ShareData\Repositories\Post\PostRepository;

class PostController extends Controller
{
    private $_postRepo;

    public function __construct(PostRepository $postRepository)
    {
        $this->_postRepo = $postRepository;
    }

    public function index(): JsonResponse
    {
        try {
            $posts = $this->_postRepo->getAllPost();
            return $this->jsonData($posts);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }
}
