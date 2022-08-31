<?php

namespace App\Dao;

use App\Contracts\Dao\PostDaoInterface;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

/**
 * Data accessing object for post
 */
class PostDao implements PostDaoInterface
{
    /**
     * getPostList function
     *
     * @return void
     */
    public function getPostList()
    {
        $posts = Post::orderBy('created_at', 'desc')->Paginate(3);
        return $posts;
    }

    /**
     * getStorePostList function
     *
     * @param StorePostRequest $request
     * @return void
     */
    public function getStorePostList(StorePostRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['image'] = $request->file('image')->store(
            'assets/post', 'public'
        );

        return Post::create($data);

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
        if ($request->image) {
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

    /**
     * getDeletePostList function
     *
     * @param Post $post
     * @return void
     */
    public function getDeletePostList(Post $post)
    {
        if ($post->image) {
            File::delete('storage/' . $post->image);
        }

        $post->delete();
        return $post;

    }
}
