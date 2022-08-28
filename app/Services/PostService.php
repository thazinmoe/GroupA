<?php

namespace App\Services;

use App\Contracts\Dao\PostDaoInterface;
use App\Contracts\Services\PostServiceInterface;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;

/**
 * Service class for post.
 */
class PostService implements PostServiceInterface
{
    /**
     * postDao
     */
    private $postDao;
    /**
     * Class Constructor
     * @param PostDaoInterface
     * @return
     */
    public function __construct(PostDaoInterface $postDaoInterface)
    {
        $this->postDao = $postDaoInterface;
    }

    /**
     * getPostList function
     *
     * @return void
     */
    public function getPostList()
    {
        return $this->postDao->getPostList();
    }

    /**
     * getStorePostList function
     *
     * @param StorePostRequest $request
     * @return void
     */
    public function getStorePostList(StorePostRequest $request)
    {
        return $this->postDao->getStorePostList($request);
    }

    /**
     * getUpdatePostList function
     *
     * @param StorePostRequest $request
     * @param Post $post
     * @return void
     */
    public function getUpdatePostList(StorePostRequest $request, Post $post)
    {
        return $this->postDao->getUpdatePostList($request, $post);
    }

    /**
     * getDeletePostList function
     *
     * @param Post $post
     * @return void
     */
    public function getDeletePostList(Post $post)
    {
        return $this->postDao->getDeletePostList($post);
    }

}
