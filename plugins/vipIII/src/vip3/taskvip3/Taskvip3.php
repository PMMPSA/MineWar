<?php

namespace vip3\taskvip3;

use pocketmine\Server;
use pocketmine\scheduler\PluginTask;
use pocketmine\plugin\Plugin;
use vip3\Main;

class Taskvip3 extends PluginTask{

    public function __construct(Main $plugin){
        $this->plugin = $plugin;
        parent::__construct($plugin);
    }

    public function onRun($tick){
		$this->plugin->onVip3();
    }

	public function cancel(){
      $this->getHandler()->cancel();
   }

}