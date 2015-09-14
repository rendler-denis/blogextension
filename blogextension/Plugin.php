<?php

namespace KoderHut\BlogExtension;

use System\Classes\PluginBase;

/**
 * BlogExtension Plugin Information File
 */
class Plugin extends PluginBase
{

    public $require = ['RainLab.Blog'];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'BlogExtension',
            'description' => 'A blog extension for the RainLab.Blog component',
            'author'      => 'Denis-Florin Rendler',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register plugin components
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'KoderHut\BlogExtension\Components\Post' => 'Post'
        ];
    }


    public function registerMarkupTags()
    {
        return [
            'functions' => [
                'ddump' => function($var) { var_dump($var); }
            ]
        ];
    }
}
