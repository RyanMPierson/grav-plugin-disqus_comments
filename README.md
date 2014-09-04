# Grav Disqus Comments Plugin

**disqus_comments** is a [Grav](http://github.com/getgrav/grav) plugin which allows Grav to integrate [Disqus Comments](http://disqus.com) into individual pages.

Enabling the plugin is very simple. Just install the plugin folder to `/user/plugins/` in your Grav install. By default, the plugin is enabled, providing some default values.

# Installation

To install this plugin, just download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the resulting folder to `disqus_comments`. 

>> It is important that the folder be named `disqus_comments` as this is the folder referenced in the plugin's code. 

The contents of the zipped folder should now be located in the `/your/site/grav/user/plugins/disqus_comments` directory.

>> NOTE: This plugin is a modular component for Grav which requires [Grav](http://github.com/getgrav/grav), the [Error](https://github.com/getgrav/grav-plugin-error) and [Problems](https://github.com/getgrav/grav-plugin-problems) plugins, and a theme to be installed in order to operate.

# Usage

### Initial Setup

Place the following line of code in the theme file you wish to add disqus comments for:

```
{% include 'disqus_comments.html.twig' %}
```

This code works best when placed within the content block of the page, just below the main `{{ page.content }}` tag. This will place it at the bottom of the page's content.

>> NOTE: Any time you are making alterations to a theme's files, you will likely want to duplicate the theme folder in the `user/themes/` directory, rename it, and set the new name as your active theme. This will ensure that you don't lose your customizations in the event that a theme is updated.

### Options

You have the ability to set a number of variables that affect the Disqus plugin. These variables include your site's Disqus shortname, which is used by Disqus to identify the community associated with the instance. You can also more specifically refine the page ID, URL, and specifically disable Disqus for a specific page.

These options can exist in two places. Primarily, your user defaults will be set within the **disqus_comments.yaml** file in the `user/config/plugins/` directory. If you do not have a `user/config/plugins/` already, create the folder as it will enable you to change the default settings of the plugin without losing these updates in the event that the plugin is updated and/or reinstalled later on.

Alterantively, you can override these defaults within the 

Here are the variables available:

- disqus_comments:
  - shortname
  - title
  - developer
  - identifier
  - url
  - disabled

Default values:
- title = Page title
- identifier = Page ID
- url = Page URL
- disabled = false

If you want to change any of these settings for a specific page (a blog page, for example) you can do so via the page's header. Below is an example of how these settings can be used.

```
disqus_comments:
  shortname: disqus_shortname_example
  title: Different title page
  id: page-slug-example
```

If you wish to set default options that remain static across all pages with Disqus enabled, you can do so in `/user/config/plugins/disqus_comments.yaml`. Here is an example:

```
shortname: disqus_shortname_example
developer: false
disabled: false
```

For most users, only the **shortname** option will need to be set. This will pull the Disqus settings from your account and pull information (such as the page title) from the page.
