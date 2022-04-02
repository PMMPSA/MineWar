<?php

namespace vip1\taskvip1;

use pocketmine\Server;
use pocketmine\scheduler\PluginTask;
use pocketmine\plugin\Plugin;
use vip1\Main;

class Taskvip1 extends PluginTask{

    public function __construct(Main $plugin){
        $this->plugin = $plugin;
        parent::__construct($plugin);
    }

    public function onRun($tick){
		$this->plugin->onVip1();
    }

	public function cancel(){
      $this->getHandler()->cancel();
   }

}