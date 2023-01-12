<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Luccui\ShareData\Repositories\Post\PostRepository;

class PostController extends Controller
{
    private $_postRepo;

    public function __construct(PostRepository $postRepository)
    {
        $this->_postRepo = $postRepository;
    }

    public function index()
    {
        try {

        } catch (\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function store(Request $request)
    {
        try {
            $post = $this->_postRepo->store($request);
            return $this->jsonData($post);
        } catch (\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function show($id)
    {
        try {
            $post = $this->_postRepo->find($id);
            return $this->jsonData($post);
        } catch (\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $post = $this->_postRepo->update($id, $request);
            return $this->jsonData($post);
        } catch (\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function destroy($id)
    {
        try {
            $this->_postRepo->destroy($id);
            return $this->jsonMessage('deleted');
        } catch (\Exception $e) {
            return $this->jsonError($e);
        }
    }
}
