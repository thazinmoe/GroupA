<?php

namespace App\Contracts\Services;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;

/**
 * Interface for Data Accessing Object of Post
 */
interface PostServiceInterface
{
    /**
     * getPostList function
     *
     * @return void
     */
    public function getPostList();

    /**
     * getStorePostList function
     *
     * @param StorePostRequest $request
     * @return void
     */
    public function getStorePostList(StorePostRequest $request);

    /**
     * getUpdatePostList function
     *
     * @param StorePostRequest $request
     * @param Post $post
     * @return void
     */
    public function getUpdatePostList(StorePostRequest $request, Post $post);

    /**
     * getDeletePostList function
     *
     * @param Post $post
     * @return void
     */
    public function getDeletePostList(Post $post);
}
