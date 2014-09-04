<?php
namespace Grav\Plugin;

use Grav\Common\Plugin;

class Disqus_CommentsPlugin extends Plugin
{
  public static function getSubscribedEvents() {
    return [
      'onTwigTemplatePaths' => ['onTwigTemplatePaths', 0],
      'onPageInitialized'   => ['onPageInitialized', 0]
    ];
  }

  public function onTwigTemplatePaths()
  {
    $this->grav['twig']->twig_paths[] = __DIR__ . '/templates';
  }

  public function onPageInitialized()
  {
    /* save post and blog page object */
    $post = $this->grav['page'];
    $blog = $post->parent();

    /* disable comments for this page */
    if ( isset($post->header()->disqus_comments) and $post->header()->disqus_comments->disabled ) {
      return;
    }

    /* get defaults from config file */
    $defaults = (array) $this->config->get('plugins.disqus_comments');

    /* validate first post then blog page header */
    if ( isset($post->header()->disqus_comments) ) {
      $post->header()->disqus_comments = array_merge($defaults, $post->header()->disqus_comments);
    } elseif ( $blog and isset($blog->header()->disqus_comments) ) {
      $post->header()->disqus_comments = array_merge($defaults, $blog->header()->disqus_comments);
    } else {
      $post->header()->disqus_comments = $defaults;
    }
  }
}
