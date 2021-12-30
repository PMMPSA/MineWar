<?php

namespace bank\task;

use pocketmine\Server;
use pocketmine\scheduler\PluginTask;
use pocketmine\plugin\Plugin;
use bank\Main;

class BankTask extends PluginTask{

    public function __construct(Main $plugin){
        $this->plugin = $plugin;
        parent::__construct($plugin);
    }

    public function onRun($tick){
		$this->plugin->onNganHang();
    }

	public function cancel(){
      $this->getHandler()->cancel();
   }

}