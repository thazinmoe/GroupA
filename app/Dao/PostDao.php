<?php

namespace App\Dao;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Contracts\Dao\PostDaoInterface;
use App\Http\Requests\StorePostRequest;

/**
 * Data accessing object for post
 */
class PostDao implements PostDaoInterface
{
  public function getPostList()
  {
    $posts = Post::get();
    return $posts;
  }
  public function getStorePostList(StorePostRequest $request)
  {
    $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['image'] = $request->file('image')->store(
            'assets/post', 'public'
        );
        
        return Post::create($data);
    
  }
  public function getUpdatePostList(StorePostRequest $request, Post $post)
  {
        if($request->image){
                    File::delete('storage/' . $post->image);
                }
        
                $data = $request->all();
                $data['slug'] = Str::slug($request->title);
                $data['image'] = $request->image ? $request->file('image')->store(
                    'assets/post', 'public'
                ) : $post->image;
            
             $post->update($data);
             return $post;
    
  }
  public function getDeletePostList(Post $post)
  {
    if($post->image){
                    File::delete('storage/' . $post->image);
                }
        
                $post->delete();
                return $post;
    
  }
}
