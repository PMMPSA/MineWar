<?php

namespace vip3;

use pocketmine\event\Listener;
use pocketmine\{Server, Player};
use pocketmine\plugin\PluginBase;
use pocketmine\command\{Command,CommandSender, CommandExecutor, ConsoleCommandSender};
use vip3\taskvip3\Taskvip3;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\Config;
class Main extends PluginBase implements Listener{
	public function onEnable(){$this->getServer()->getPluginManager()->registerEvents($this,$this);
	 @mkdir($this->getDataFolder());
				$this->vip3 = new Config($this->getDataFolder()."vip3.yml",Config::YAML);
	$this->getServer()->getScheduler()->scheduleRepeatingTask(new Taskvip3($this), 77760000);
	}
	public function onDisable ()
	{
		$this->getLogger()->info("Plugin Vip3 By Jero Gaming Đã Dừng Hoạt Động");
	}
	 public function onVip3() {
		foreach($this->getServer()->getOnlinePlayers() as $player){
		 if($player->isOnline()){
$vip3p = $this->vip3->get($player->getName());
if($vip3p =="on"){
			 $this->vip3->set($player->getName(), off);
									$this->vip3->save();
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$player->getName()." pchat.command.setsuffix");
						$this->getServer()->getCommandMap()->dispatch($ev->getPlayer(),"setsuffix §e§l❖");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$player->getName()." pchat.command.setsuffix");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$player->getName()." advancedkits.vip3");
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
			 if(!$this->vip3->exists($player)){
				$this->vip3->set($player, off);
				$this->vip3->save();
				}
										 }
				 public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
		if($cmd->getName() == "❖vip3❖"){
			if($sender->hasPermission('vip3.cmd')){
			$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." pchat.command.setsuffix");
			$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setsuffix ".$sender->getPlayer()." §e§l❖§cWar§dVip§eIII");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"unsetuperm ".$sender->getName()." pchat.command.setsuffix");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." advancedkits.vip3");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." essentials.warps.*");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." feed.command");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." essentials.gamemode.use");
				    $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." essentials.gamemode.other");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." pocketmine.command.time");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." command.size");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." size.command");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." pocketmine.command.teleport");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." fly.command");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." heal.command");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." vipjoin.use");
						$this->vip3->set($sender->getName(), on);
						$this->vip3->save();
			}
		}
				 }
										 }