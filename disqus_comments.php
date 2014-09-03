<?php
namespace Grav\Plugin;

use Grav\Common\Grav;
use Grav\Common\Page\Collection;
use Grav\Common\Page\Page;
use Grav\Common\Plugin;
use Grav\Component\EventDispatcher\Event;

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
      $this->grav['twig']->twig_vars['disqus_title']      = (isset($disqus_comments['disqus_title'])) ? $disqus_comments['disqus_title'] : $post->title();
      $this->grav['twig']->twig_vars['disqus_developer']  = (isset($disqus_comments['disqus_developer'])) ? 'true' : 'false';
      $this->grav['twig']->twig_vars['disqus_identifier'] = (isset($disqus_comments['disqus_identifier'])) ? $disqus_comments['disqus_identifier'] : $post->id();
      $this->grav['twig']->twig_vars['disqus_url']        = (isset($disqus_comments['disqus_url'])) ? $disqus_comments['disqus_url'] : $post->url(true);
    }
  }
}
