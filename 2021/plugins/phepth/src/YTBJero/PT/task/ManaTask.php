<?php

namespace YTBJero\PT\task;

use pocketmine\Server;
use pocketmine\scheduler\PluginTask;
use pocketmine\plugin\Plugin;
use YTBJero\PT\Main;

class ManaTask extends PluginTask{

    public function __construct(Main $plugin){
        $this->plugin = $plugin;
        parent::__construct($plugin);
    }

    public function onRun($tick){
		$this->plugin->onPhep();
    }

	public function cancel(){
      $this->getHandler()->cancel();
   }
}