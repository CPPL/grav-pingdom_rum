<?php
namespace Grav\Plugin;
use Grav\Common\Plugin;

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
        /**
         * Ok, we're ready to go
         */
        $prumid = trim($this->config->get('plugins.pingdom_rum.prumid'));
        if ($prumid) {
            $gsjs = <<<PingdomRUMJS
var _prum = [['id', '5519be67abe53d310131abbc'],
            ['mark', 'firstbyte', (new Date()).getTime()]];
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
