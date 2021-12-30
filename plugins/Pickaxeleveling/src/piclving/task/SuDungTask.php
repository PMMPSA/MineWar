<?php

namespace piclving\task;

use pocketmine\Server;
use pocketmine\scheduler\PluginTask;
use pocketmine\plugin\Plugin;
use piclving\Main;
use pocketmine\Player;

class SuDungTask extends PluginTask{

    public function __construct(Main $plugin){
        $this->plugin = $plugin;
        parent::__construct($plugin);
    }

    public function onRun($tick){
		 $this->plugin->onSuDung();
    }

	public function cancel(){
      $this->getHandler()->cancel();
   }

}