<?php

namespace Clob\Repositories;

use Clob\Post;
use Clob\User;
use Carbon\Carbon;
use Clob\Repositories\Options as OptionRepository;

class Posts extends Repository
{
	/*
    |--------------------------------------------------------------------------
    | Posts Repository
    |--------------------------------------------------------------------------
    |
    | This class handles interacting with blog posts data in the database.
    |
    */

    /**
     * Repository constructor
     * Inject the OptionRepository so we can read options from the database.
     *
     * @param \Clob\Repositories\Options $options
     * @return void
     */
    public function __construct(OptionRepository $options)
    {
        $this->options = $options->getBlogSettings();
    }

    /**
     * Get all posts, most recent posts first.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
    	return Post::recentFirst()->get();
    }

    /**
     * Get published posts, most recent first.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function published()
    {
        $posts_per_page = $this->options->posts_per_page;

    	return Post::published()->recentFirst()->paginate($posts_per_page);
    }

    /**
     * Set post data values from passed array.
     *
     * @param \Clob\Post $post
     * @param array $data
     * @return \Clob\Post
     */
    private function setPostData(Post $post, $data)
    {
        $post->title = $data['title'];
        $post->slug = $data['slug'];
        $post->subtitle = $data['subtitle'];
        $post->markdown_content = $data['markdown_content']; // The PostObserver class auto-converts this to HTML
        $post->published_at = $data['published_at'];
        $post->tags = $data['tags'];
        $post->seo_title = $data['seo_title'];
        $post->seo_description = $data['seo_description'];
        $post->seo_image_url = $data['seo_image_url'];

        return $post;
    }

    /**
     * Create a new post.
     *
     * @param \Clob\User $user
     * @param array $data
     * @return \Clob\Post
     */
    public function create(User $user, $data)
    {
        $post = $this->setPostData(new Post, $data);
        $user->posts()->save($post);

        return $post;
    }

    /**
     * Update an existing post.
     *
     * @param \Clob\Post $post
     * @param array $data
     * @return \Clob\Post
     */
    public function update(Post $post, $data)
    {
        $post = $this->setPostData($post, $data);
        $post->save();

        return $post;
    }

    /**
     * Delete an existing post.
     *
     * @param \Clob\Post $post
     * @return void
     */
    public function delete(Post $post)
    {
        $post->delete();
    }

    public function previous(Post $post)
    {
        return Post::published()->previous($post)->first();
    }

    public function next(Post $post)
    {
        return Post::published()->next($post)->first();
    }
}