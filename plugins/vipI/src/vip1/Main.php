<?php

namespace vip1;

use pocketmine\event\Listener;
use pocketmine\{Server, Player};
use pocketmine\plugin\PluginBase;
use pocketmine\command\{Command,CommandSender, CommandExecutor, ConsoleCommandSender};
use vip1\taskvip1\Taskvip1;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\Config;
class Main extends PluginBase implements Listener{
	public function onEnable(){$this->getServer()->getPluginManager()->registerEvents($this,$this);
	 @mkdir($this->getDataFolder());
				$this->vip1 = new Config($this->getDataFolder()."vip1.yml",Config::YAML);
	$this->getServer()->getScheduler()->scheduleRepeatingTask(new Taskvip1($this), 12096000);
	}
	public function onDisable ()
	{
		$this->getLogger()->info("Plugin Vip1 By Jero Gaming Đã Dừng Hoạt Động");
	}
	 public function onVip1() {
		foreach($this->getServer()->getOnlinePlayers() as $player){
		 if($player->isOnline()){
$vip1p = $this->vip1->get($player->getName());
if($vip1p =="on"){
			 $this->vip1->set($player->getName(), off);
									$this->vip1->save();
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$player->getName()." pchat.command.setsuffix");
						$this->getServer()->getCommandMap()->dispatch($ev->getPlayer(),"setsuffix §e§l❖");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$player->getName()." pchat.command.setsuffix");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$player->getName()." advancedkits.vip1");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$player->getName()." essentials.warps.*");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$player->getName()." feed.command");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$player->getName()." fly.command");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$player->getName()." heal.command");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$player->getName()." vipjoin.use");
									}
									}
									}
									}
										 public function onJoin (PlayerJoinEvent $event){
										 $player = $event->getPlayer()->getName();
			 if(!$this->vip1->exists($player)){
				$this->vip1->set($player, off);
				$this->vip1->save();
				}
										 }
				 public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
		if($cmd->getName() == "❖vip1❖"){
			if($sender->hasPermission('vip1.cmd')){
			$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." pchat.command.setsuffix");
			$this->getServer()->getCommandMap()->dispatch($sender->getPlayer(),"setsuffix §e§l❖§cWar§dVip§eI");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$sender->getName()." pchat.command.setsuffix");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." advancedkits.vip1");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." essentials.warps.*");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." feed.command");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." fly.command");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." heal.command");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." vipjoin.use");
						$this->vip1->set($sender->getName(), on);
						$this->vip1->save();
			}
		}
				 }
										 }