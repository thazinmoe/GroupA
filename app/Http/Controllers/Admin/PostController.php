<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Contracts\Services\PostServiceInterface;

class PostController extends Controller
{
    /**
     * Post interface
     */
    private $postInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    function __construct(PostServiceInterface $postServiceInterface)
    {
         $this->middleware('permission:post-list|post-create|post-edit|post-delete', ['only' => ['index','show']]);
         $this->middleware('permission:post-create', ['only' => ['create','store']]);
         $this->middleware('permission:post-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:post-delete', ['only' => ['destroy']]);
         $this->postInterface = $postServiceInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(): View
    {
        
        $posts = $this->postInterface->getPostList();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(): View
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StorePostRequest $request): RedirectResponse
    {
        $data = $this->postInterface->getStorePostList($request);
        return redirect()->route('admin.posts.index')->with('message', 'Added Successfully !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post): View
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Post $post): RedirectResponse
    {

        $data = $this->postInterface->getUpdatePostList($request , $post);

        return redirect()->route('admin.posts.index')->with('message', 'Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post):  RedirectResponse
    {

        $post = $this->postInterface->getDeletePostList($post);

        return redirect()->route('admin.posts.index')->with('message', 'Deleted  Successfully !');
        //return redirect()->with('message', 'Deleted  Successfully !');
    }
}
