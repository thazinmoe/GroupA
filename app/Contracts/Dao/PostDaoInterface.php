<?php

namespace App\Contracts\Dao;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;

/**
 * Interface for Data Accessing Object of Post
 */
interface PostDaoInterface
{
    public function getPostList();
    public function getStorePostList(StorePostRequest $request);
    public function getUpdatePostList(StorePostRequest $request, Post $post);
    public function getDeletePostList(Post $post);
}