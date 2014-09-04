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
    $post = $this->grav['page'];
    $blog = $post->parent();

    $defaults = (array) $this->config->get('plugins.disqus_comments');

    if ( isset($blog->header()->disqus_comments) ) {
      $post->header()->disqus_comments = array_merge($defaults, $blog->header()->disqus_comments);
    } elseif ( isset($post->header()->disqus_comments) ) {
      $post->header()->disqus_comments = array_merge($defaults, $post->header()->disqus_comments);
    } else {
      $post->header()->disqus_comments = $default;
    }
  }
}
