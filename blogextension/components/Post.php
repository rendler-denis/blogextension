<?php

namespace KoderHut\BlogExtension\Components;

use Cms\Classes\ComponentBase,
    Cms\Classes\Page;

use RainLab\Blog\Components\Post as RainLabPost,
    RainLab\Blog\Models\Post as BlogPost;

/**
 * Class Post
 *
 * @package KoderHut\BlogExtension\Components
 */
class Post
    extends RainLabPost
{

    /**
     * Reference to the page name for linking to posts.
     * @var string
     */
    public $postPage;

    /**
     * Override of original method
     * - add the post URL to the post entity
     *
     * @return mixed
     */
    protected function loadPost()
    {
        $post     = parent::loadPost();
        $postPage = $this->property('postPage');

        if ($post instanceof BlogPost) {
            $post->setUrl($postPage, $this->controller);
        }

        return $post;
    }

    /**
     * Override of original method
     * - add new setting for the post page id
     *
     * @return array
     */
    public function defineProperties()
    {
        $parentProps = parent::defineProperties();

        $properties = array_merge(
            $parentProps,
            [
                'postPage' => [
                    'title'       => 'rainlab.blog::lang.settings.posts_post',
                    'description' => 'rainlab.blog::lang.settings.posts_post_description',
                    'type'        => 'dropdown',
                    'default'     => 'blog/post',
                    'group'       => 'Links',
                ],
            ]
        );

        return is_array($properties) ? $properties : $parentProps;
    }

    /**
     * Retrieve the postPage properties
     *
     * @return string
     */
    public function getPostPageOptions()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }

}