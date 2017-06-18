<?php
namespace Grav\Plugin;
use Grav\Common\Plugin;
use Grav\Common\Page\Page;
use RocketTheme\Toolbox\Event\Event;


class Pingdom_RUMPlugin extends Plugin
{
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'onAssetsInitialized' => ['onAssetsInitialized', 0]
        ];
    }
    /**
     * Add GoSquared JS in assets initialisation
     */
    public function onAssetsInitialized()
    {
        /** Don't proceed if we are in the admin plugin */
        if ($this->isAdmin()) return;

        /**
         * Make sure we're enabled
         */
        if ($this->config->get('plugins.pingdom_rum.prumid') == false) return;

        /**
         * Ok, we're ready to go
         */

        $this->enable([
            'onPageProcessed'           => ['onPageProcessed', 0],
        ]);
    }

    public function onPageProcessed(Event $e) {
        /** @var Page $page */
        $page = $e['page'];
        $tagsElement = '';

        if ($this->config->get('plugins.pingdom_rum.autotags') == true && isset($page->taxonomy()['tag'])) {
            $tags = implode("', '",$page->taxonomy()['tag']);
            $tagsElement =  ", ['tags', ['$tags']],";
        }

        $prumid = trim($this->config->get('plugins.pingdom_rum.prumid'));
        if ($prumid) {

            /** Assemble our Javascript */
            $gsjs = <<<PingdomRUMJS
var _prum = [['id', '$prumid'],
            ['mark', 'firstbyte', (new Date()).getTime()]$tagsElement];
        (function() {
            var s = document.getElementsByTagName('script')[0]
                , p = document.createElement('script');
            p.async = 'async';
            p.src = '//rum-static.pingdom.net/prum.min.js';
            s.parentNode.insertBefore(p, s);
        })();
PingdomRUMJS;

            $this->grav['assets']->addInlineJs($gsjs);
        }
    }
}
