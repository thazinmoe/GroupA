<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Contracts\Dao\PostDaoInterface;
use App\Http\Requests\StorePostRequest;
use App\Contracts\Services\PostServiceInterface;


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

  public function getPostList()
  {
    return $this->postDao->getPostList();
  }
  public function getStorePostList(StorePostRequest $request)
  {
    return $this->postDao->getStorePostList($request);
  }
  public function getUpdatePostList(StorePostRequest $request, Post $post)
  {
    return $this->postDao->getUpdatePostList($request ,$post);
  }
  public function getDeletePostList(Post $post)
  {
    return $this->postDao->getDeletePostList($post);
  }
 
}
