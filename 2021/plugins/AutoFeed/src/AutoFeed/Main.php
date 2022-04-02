<?php

namespace AutoFeed;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\TextFormat;
use pocketmine\block\Block;
use pocketmine\item\Item;
use pocketmine\event\player\PlayerJoinEvent;
class Main extends PluginBase implements Listener{
	
	public $players = [];
	
	public function onEnable()
	{
		$this->getLogger()->info("AutoFeed is working");
		$this->getServer()->getScheduler()->scheduleRepeatingTask(new AutoFeedTask($this), 1);
	}
	 public function onJoin(PlayerJoinEvent $ev){
        $p = $ev->getPlayer()->getName();
		$this->players[$p] = true;
	 }
}