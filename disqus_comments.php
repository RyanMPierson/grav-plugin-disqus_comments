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
    if (!$this->config->get('plugins.disqus_comments.enabled')) {
      return;
    }

    $post = $this->grav['page'];
    $blog = $post->parent();

    if ( ($blog and $blog->header()) and $disqus_comments = $blog->header()->disqus_comments and is_array($disqus_comments) ) {
      $this->grav['twig']->twig_vars['disqus_shortname']  = (isset($disqus_comments['shortname'])) ? $disqus_comments['shortname'] : '';
      $this->grav['twig']->twig_vars['disqus_title']      = (isset($disqus_comments['title'])) ? $disqus_comments['title'] : $post->title();
      $this->grav['twig']->twig_vars['disqus_developer']  = (isset($disqus_comments['developer'])) ? 'true' : 'false';
      $this->grav['twig']->twig_vars['disqus_identifier'] = (isset($disqus_comments['identifier'])) ? $disqus_comments['identifier'] : $post->id();
      $this->grav['twig']->twig_vars['disqus_url']        = (isset($disqus_comments['url'])) ? $disqus_comments['url'] : $post->url(true);
    }
  }
}
