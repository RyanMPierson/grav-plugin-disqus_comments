# Grav Disqus Comments Plugin

`disqus_comments` is a [Grav](http://github.com/getgrav/grav) plugin and allows Grav to use a [Disqus Comments](http://disqus.com) into your pages.

Enabling is very simple. Just install this plugin in the `/user/plugins/` folder in your Grav install. By default, the plugin is enabled and provides some default values.

# Installation

To install this plugin, just download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `disqus_comments`.

You should now have all the plugin files under

  /your/site/grav/user/plugins/disqus_comments

>> NOTE: This plugin is a modular component for Grav which requires [Grav](http://github.com/getgrav/grav), the [Error](https://github.com/getgrav/grav-plugin-error) and [Problems](https://github.com/getgrav/grav-plugin-problems) plugins, and a theme to be installed in order to operate.

# Usage

Put in the your theme file this example:

```
{% include 'disqus_comments.html.twig' %}
```

Here the list of variables available:
- disqus_comments:
  - shortname
  - title
  - developer
  - identifier
  - url

Default values:
- title = Page title
- identifier = Page ID
- url = Page URL

You can setup directly the child page (blog page example) in the headers or directly on `/your/site/grav/user/plugins/disqus_comments/disqus_comments.yaml`:
```
disqus_comments:
  shortname: disqus_shortname_example
  title: Different title page
  id: page-slug-example
```

I suggest to setup only shortname and if you develop in the local environment, in the blog page, for the other variables use a default variables
