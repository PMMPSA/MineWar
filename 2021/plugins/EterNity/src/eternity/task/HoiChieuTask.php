<?php

namespace eternity\task;

use pocketmine\Server;
use pocketmine\scheduler\PluginTask;
use pocketmine\plugin\Plugin;
use eternity\Main;
use pocketmine\Player;

class HoiChieuTask extends PluginTask{

    public function __construct(Main $plugin){
        $this->plugin = $plugin;
        parent::__construct($plugin);
    }

    public function onRun($tick){
		 $this->plugin->onHoiChieu();
    }

	public function cancel(){
      $this->getHandler()->cancel();
   }

}