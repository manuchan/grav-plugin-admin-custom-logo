# Admin Custom Logo Plugin

The **Admin Custom Logo** Plugin is an extension for [Grav CMS](http://github.com/getgrav/grav) to use custom logo in the Admin Panel.

### Manual Installation

To install the plugin manually, download the zip-version of this repository and unzip it under `/your/site/grav/user/plugins`. Then rename the folder to `admin-custom-logo`. You can find these files on [GitHub](https://github.com/manuchan/grav-plugin-admin-custom-logo) or via [GetGrav.org](http://getgrav.org/downloads/plugins#extras).

You should now have all the plugin files under

    /your/site/grav/user/plugins/admin-custom-logo
	
> NOTE: This plugin is a modular component for Grav which may require other plugins to operate, please see its [blueprints.yaml-file on GitHub](https://github.com/manuchan/grav-plugin-admin-custom-logo/blob/master/blueprints.yaml).

## Configuration

Before configuring this plugin, you should copy the `user/plugins/admin-custom-logo/admin-custom-logo.yaml` to `user/config/plugins/admin-custom-logo.yaml` and only edit that copy.

Here is the default configuration and an explanation of available options:

```yaml
enabled: true
```

Note that if you use the Admin Plugin, a file with your configuration named admin-custom-logo.yaml will be saved in the `user/config/plugins/`-folder once the configuration is saved in the Admin.
