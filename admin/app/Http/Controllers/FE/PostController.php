<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Repositories\Post\PostRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
            $posts = $this->_postRepo->paginate(10);
            return $this->jsonData($posts);
        } catch (\Exception $ex) {
            return $this->jsonError($ex->getMessage());
        }
    }
}
