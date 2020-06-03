<?php
namespace Grav\Plugin;

use Composer\Autoload\ClassLoader;
use Grav\Common\Plugin;

/**
* Class AdminCustomLogoPlugin
* @package Grav\Plugin
*/
class AdminCustomLogoPlugin extends Plugin
{
    /**
    * @return array
    *
    * The getSubscribedEvents() gives the core a list of events
    *     that the plugin wants to listen to. The key of each
    *     array section is the event that the plugin listens to
    *     and the value (in the form of an array) contains the
    *     callable (or function) as well as the priority. The
    *     higher the number the higher the priority.
    */
    public static function getSubscribedEvents()
    {
        return [
            'onPluginsInitialized' => [
                ['autoload', 100000], // TODO: Remove when plugin requires Grav >=1.7
                ['onPluginsInitialized', 0]
            ]
        ];
    }

    /**
    * Composer autoload.
    * @return ClassLoader
    */
    public function autoload(): ClassLoader
    {
        return require __DIR__ . '/vendor/autoload.php';
    }

    /** 
    * Initialize the plugin
    */
    public function onPluginsInitialized()
    {
        // Don't proceed if we are not in the admin plugin or user has been authenticated already
        if (!$this->isAdmin()) {
            return;
        }

        // Enable the main events we are interested in
        $this->enable([
            'onAdminTwigTemplatePaths' => ['onAdminTwigTemplatePaths', 0],
            'onTwigSiteVariables' => ['onTwigSiteVariables', 0]
        ]);
    }

    /**
    * Insert custom login and admin logo into Twig variables
    */
    public function onTwigSiteVariables()
    {
        $custom_logo = $this->config->get('plugins.admin-custom-logo.custom_logo');

        // Proceed if user has uploaded a custom logo
        if ($custom_logo != null && is_array($custom_logo)) {
            $custom_logo = reset($custom_logo);
            $custom_logo = $custom_logo['path'];

            // Retrieve twig variables
            $twig = $this->grav['twig'];

            // Append custom logos variable into twig variables
            $twig->twig_vars['custom_login_logo'] = $custom_logo;
            $twig->twig_vars['custom_admin_logo'] = $custom_logo;
        }
    }

    /**
     * Use custom templates
     */
    public function onAdminTwigTemplatePaths($e)
    {
        $paths = $e['paths'];
        $paths[] = __DIR__ . DS . 'templates';
        $e['paths'] = $paths;
    }
}
