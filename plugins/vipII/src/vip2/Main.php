<?php

namespace vip2;

use pocketmine\event\Listener;
use pocketmine\{Server, Player};
use pocketmine\plugin\PluginBase;
use pocketmine\command\{Command,CommandSender, CommandExecutor, ConsoleCommandSender};
use vip2\taskvip2\Taskvip2;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\Config;
class Main extends PluginBase implements Listener{
	public function onEnable(){$this->getServer()->getPluginManager()->registerEvents($this,$this);
	 @mkdir($this->getDataFolder());
				$this->vip2 = new Config($this->getDataFolder()."vip2.yml",Config::YAML);
	$this->getServer()->getScheduler()->scheduleRepeatingTask(new Taskvip2($this), 34560000);
	}
	public function onDisable ()
	{
		$this->getLogger()->info("Plugin Vip2 By Jero Gaming Đã Dừng Hoạt Động");
	}
	 public function onVip2() {
		foreach($this->getServer()->getOnlinePlayers() as $player){
		 if($player->isOnline()){
$vip2p = $this->vip2->get($player->getName());
if($vip2p =="on"){
			 $this->vip2->set($player->getName(), off);
									$this->vip2->save();
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$player->getName()." pchat.command.setsuffix");
						$this->getServer()->getCommandMap()->dispatch($ev->getPlayer(),"setsuffix §e§l❖");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$player->getName()." pchat.command.setsuffix");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$player->getName()." advancedkits.vip2");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$player->getName()." essentials.warps.*");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$player->getName()." feed.command");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$player->getName()." fly.command");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$player->getName()." heal.command");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$sender->getName()." command.size");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$sender->getName()." size.command");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$player->getName()." vipjoin.use");
									}
									}
									}
									}
										 public function onJoin (PlayerJoinEvent $event){
										 $player = $event->getPlayer()->getName();
			 if(!$this->vip2->exists($player)){
				$this->vip2->set($player, off);
				$this->vip2->save();
				}
										 }
				 public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
		if($cmd->getName() == "❖vip2❖"){
			if($sender->hasPermission('vip2.cmd')){
			$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." pchat.command.setsuffix");
			$this->getServer()->getCommandMap()->dispatch($sender->getPlayer(),"setsuffix §e§l❖§cWar§dVip§eII");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$sender->getName()." pchat.command.setsuffix");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." advancedkits.vip2");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." essentials.warps.*");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." feed.command");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." fly.command");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." heal.command");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." command.size");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." size.command");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." vipjoin.use");
						$this->vip2->set($sender->getName(), on);
						$this->vip2->save();
			}
		}
				 }
										 }