<?php

namespace vip4\taskvip4;

use pocketmine\Server;
use pocketmine\scheduler\PluginTask;
use pocketmine\plugin\Plugin;
use vip4\Main;

class Taskvip4 extends PluginTask{

    public function __construct(Main $plugin){
        $this->plugin = $plugin;
        parent::__construct($plugin);
    }

    public function onRun($tick){
		$this->plugin->onVip4();
    }

	public function cancel(){
      $this->getHandler()->cancel();
   }

}