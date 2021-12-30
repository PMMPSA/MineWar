<?php

namespace vip2\taskvip2;

use pocketmine\Server;
use pocketmine\scheduler\PluginTask;
use pocketmine\plugin\Plugin;
use vip2\Main;

class Taskvip2 extends PluginTask{

    public function __construct(Main $plugin){
        $this->plugin = $plugin;
        parent::__construct($plugin);
    }

    public function onRun($tick){
		$this->plugin->onVip2();
    }

	public function cancel(){
      $this->getHandler()->cancel();
   }

}