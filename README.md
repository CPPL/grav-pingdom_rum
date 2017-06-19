# Pingdom Real User Monitoring (RUM) for Grav

This is a [Grav](http://getgrav.org) plugin that adds the [Pingdom RUM](https://pingdom.com) script and PRUM Id to Grav pages.

## Installation

Installing the Pingdom RUM plugin can be done in one of two ways.

### Admin Installation (Coming Soon)
If you have the [GRAV Admin plugin](https://getgrav.org/downloads/plugins) installed (and you really should ) you can install this plugin from your browser. Simply login to your Admin area, click on "Plugins" in the left sidebar menu, the click on `+ Add` in the top right of the Plugins view.

Simply scroll to the Pingdom RUM Analytics plugin (or filter by name) and then click `+ Install` on the right end of the row for the plugin.

### GPM Installation

The simplest way to install this plugin is via the [Grav Package Manager (GPM)](http://learn.getgrav.org/advanced/grav-gpm) through your system's Terminal (also called the command line).  From the root of your Grav install type:

`bin/gpm install pingdom_rum`

This will install the Pingdom RUM plugin into your `/user/plugins` directory within Grav. The plugin files should now be in `/your/site/grav/user/plugins/pingdom_rum`

### Manual Installation

To install this plugin, just [download](https://github.com/cppl/grav-pingdom_rum/archive/master.zip) the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `pingdom_rum`.

You should now have all the plugin files under

    /your/site/grav/user/plugins/pingdom_rum

## Config Defaults

Prior to the [Admin plugin](https://github.com/getgrav/grav-plugin-admin) you could modify a plugins yaml file directly (you still can actually) but now the Admin screens offer a much easier and safer way to adjust the plugins settings.

If you insist on changing the values manually, before configuring this plugin, you should copy the `user/plugins/pingdom_rum/pingdom_rum.yaml` to `user/config/plugins/pingdom_rum.yaml` and only edit _that copy_.

The `pingdom_rum.yaml` contains only 2 settings:

```
enabled: true  
prumid: ''  
```

If you need to change any value, I recommend using the Admin screens available via the Admin plugin . This will let you change any of the settings and provide a useful tooltip for each setting (hover over the settings label).

## Usage

### General

1. Follow the Pingdom's article on [How to set up Real User Monitoring (RUM)](https://help.pingdom.com/hc/en-us/articles/203611002-How-to-set-up-Real-User-Monitoring-RUM-)
2. When presented with the code snippet, you will see line of code similar to  
```
var _prum = [['id', 'abcdef0123456789abcdef01'],
```
 (you want the **Id** value, i.e. the bit after `'id'`)
3. Copy the *RUM Id* (without the single quotes) and paste it into the field in the plugin settings (I recommend **copying and pasting** not typing...)
4. Click Save

### Tags

Pingdom's RUM feature supports "tags" - from version 0.2.0 this plugin supports including page tags in the Pingdom RUM script.

To enable it simply set the "Include Page Tags" setting to "Enabled".

To add tags to a page use either:
 - the Options tab of the Page Editor in the Grav Admin screen or
 - manually [add the tags to the frontmatter of the markdown page](https://learn.getgrav.org/content/headers#taxonomy).
