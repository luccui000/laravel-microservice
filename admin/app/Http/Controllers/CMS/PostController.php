<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Luccui\ShareData\Models\Post;

class PostController extends Controller
{
    public function index(Request $request)
    {
        try {
            $perPage = $request->get('per_page', 20);
            $posts = Post::with(['category'])->paginate($perPage);

            return $this->jsonData($posts);
        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function store(Request $request)
    {
        try {

        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function show($id)
    {
        try {

        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function update(Request $request, $id)
    {
        try {

        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }

    public function destroy($id)
    {
        try {

        } catch(\Exception $e) {
            return $this->jsonError($e);
        }
    }
}
