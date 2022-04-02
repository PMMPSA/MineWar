<?php

namespace vip4;

use pocketmine\event\Listener;
use pocketmine\{Server, Player};
use pocketmine\plugin\PluginBase;
use pocketmine\command\{Command,CommandSender, CommandExecutor, ConsoleCommandSender};
use vip4\taskvip4\Taskvip4;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\Config;
class Main extends PluginBase implements Listener{
	public function onEnable(){$this->getServer()->getPluginManager()->registerEvents($this,$this);
	 @mkdir($this->getDataFolder());
				$this->vip4 = new Config($this->getDataFolder()."vip4.yml",Config::YAML);
	$this->getServer()->getScheduler()->scheduleRepeatingTask(new Taskvip4($this), 130680000);
	}
	public function onDisable ()
	{
		$this->getLogger()->info("Plugin Vip4 By Jero Gaming Đã Dừng Hoạt Động");
	}
	 public function onVip4() {
		foreach($this->getServer()->getOnlinePlayers() as $player){
		 if($player->isOnline()){
$vip4p = $this->vip4->get($player->getName());
if($vip4p =="on"){
			 $this->vip4->set($player->getName(), off);
									$this->vip4->save();
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$player->getName()." pchat.command.setsuffix");
						$this->getServer()->getCommandMap()->dispatch($ev->getPlayer(),"setsuffix §e§l❖");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$player->getName()." pchat.command.setsuffix");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$player->getName()." advancedkits.vip4");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$player->getName()." essentials.warps.*");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$player->getName()." feed.command");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$player->getName()." fly.command");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$sender->getName()." essentials.gamemode.use");
				    $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$sender->getName()." essentials.gamemode.other");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$sender->getName()." pocketmine.command.time");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$sender->getName()." command.size");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$sender->getName()." size.command");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$sender->getName()." pocketmine.command.teleport");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$player->getName()." heal.command");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$player->getName()." vipjoin.use");
									}
									}
									}
									}
										 public function onJoin (PlayerJoinEvent $event){
										 $player = $event->getPlayer()->getName();
			 if(!$this->vip4->exists($player)){
				$this->vip4->set($player, off);
				$this->vip4->save();
				}
										 }
				 public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
		if($cmd->getName() == "❖vip4❖"){
			if($sender->hasPermission('vip4.cmd')){
			$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." pchat.command.setsuffix");
			$this->getServer()->getCommandMap()->dispatch($sender->getPlayer(),"setsuffix §e§l❖§cWar§dVip§eIV");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$sender->getName()." pchat.command.setsuffix");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." advancedkits.vip4");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." essentials.warps.*");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." feed.command");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." essentials.gamemode.use");
				    $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." essentials.gamemode.other");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." pocketmine.command.time");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." command.size");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." size.command");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." autofeed.command");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." pocketmine.command.teleport");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." fly.command");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." heal.command");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." vipjoin.use");
						$this->vip4->set($sender->getName(), on);
						$this->vip4->save();
			}
		}
				 }
										 }