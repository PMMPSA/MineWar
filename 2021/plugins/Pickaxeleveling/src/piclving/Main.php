<?php

namespace piclving;

use pocketmine\event\Listener;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\item\ItemFactory;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\inventory\PlayerInventory;
use pocketmine\Server;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\item\Item;
use piclving\task\HoiChieuTask;
use piclving\task\SuDungTask;
use pocketmine\utils\Config;
use pocketmine\command\{Command, CommandSender, ConsoleCommandSender};

class Main extends PluginBase implements Listener {
     public function onEnable() {
		$this->getLogger()->info("Plugin Eternity By Jero Gaming Đã Bật\nVui Lòng Tôn Trọng Người Code Không Chỉnh Sửa Author");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->autosell = $this->getServer()->getPluginManager()->getPlugin("AutoSell");
		 @mkdir($this->getDataFolder());
$this->cfg = new Config($this->getDataFolder()."eternity.yml",Config::YAML);
$this->hoichieu = new Config($this->getDataFolder()."hoichieu.yml",Config::YAML);
 $this->getServer()->getScheduler()->scheduleRepeatingTask(new HoiChieuTask($this), 3600);
  $this->getServer()->getScheduler()->scheduleRepeatingTask(new SuDungTask($this), 6000);
 }
 public function onJoin(PlayerJoinEvent $event) {
$player = $event->getPlayer()->getName();
			 if(!$this->cfg->exists($player)){
				$this->cfg->set($player, off);
				$this->cfg->save();
				}
				$player = $event->getPlayer()->getName();
				if(!$this->hoichieu->exists($player)){
					$this->hoichieu->set($player, 0);
					$this->hoichieu->save();
				}
					}
					public function onHoiChieu(){
						 foreach($this->getServer()->getOnlinePlayers() as $player){
							 if($this->hoichieu->get($player->getName()) == 15){
								$this->hoichieu->set($player->getName(), 0);
								$this->hoichieu->save();
								}
								}
								}
								public function onSuDung(){
									 foreach($this->getServer()->getOnlinePlayers() as $player){
										 if($this->cfg->get($player->getName()) == "on"){
							 $this->getServer()->dispatchCommand(new ConsoleCommandSender(),'unsetuperm ' . $sender->getPlayer() . ' pickaxe.use');
								$this->cfg->save();
								$this->hoichieu->set($player->getName(), 15);
								$this->hoichieu->save();
								}
								}
								}
					 public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
	 if (strtolower($cmd->getName()) == "cupleveling") {
           if(!isset($args[0])){
               $sender->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §b/cupleveling §e<on | off> §ađể sử dụng");
               return false;
           }
           switch ($args[0]) {
               case "on":
               if($this->hoichieu->get($sender->getName()) == 15){
			       $sender->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §bcupleveling§cĐang Hồi Vui Lòng Chờ");
				   } else{
					$this->getServer()->dispatchCommand(new ConsoleCommandSender(),'setuperm ' . $sender->getPlayer() . ' pickaxe.use');
					$sender->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §bcupleveling §aĐã Được Bật");
					}
				   break;
               case "off":
			       $sender->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §bcupleveling §aĐã Tắt"); 
                  $this->getServer()->dispatchCommand(new ConsoleCommandSender(),'unsetuperm ' . $sender->getPlayer() . ' pickaxe.use');
				   break;
               default :
                   $sender->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §b/cupleveling §e<on | off> §ađể sử dụng");
                   break;
           }
       }
					 }
   }
