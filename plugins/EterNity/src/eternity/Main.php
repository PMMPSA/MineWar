<?php

namespace eternity;

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
use eternity\task\HoiChieuTask;
use eternity\task\SuDungTask;
use pocketmine\utils\Config;
use pocketmine\command\{Command, CommandSender};

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
								$this->cfg->set($player->getName(), off);
								$this->cfg->save();
								$this->hoichieu->set($player->getName(), 15);
								$this->hoichieu->save();
								}
								}
								}
					 public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
	 if (strtolower($cmd->getName()) == "eternity") {
           if(!isset($args[0])){
               $sender->sendMessage("§e§l❖§aＭｉｎｅ§6Ｗａｒ§e❖ §b/eternity §e<on | off> §ađể sử dụng");
               return false;
           }
           switch ($args[0]) {
               case "on":
               if($this->hoichieu->get($sender->getName()) == 15){
			       $sender->sendMessage("§e§l❖§aＭｉｎｅ§6Ｗａｒ§e❖ §bEternity §cĐang Hồi Vui Lòng Chờ");
				   } else{
					$this->cfg->set($sender->getName(), on);
					$sender->sendMessage("§e§l❖§aＭｉｎｅ§6Ｗａｒ§e❖ §bEternity §aĐã Được Bật");
					}
				   break;
               case "off":
			       $sender->sendMessage("§e§l❖§aＭｉｎｅ§6Ｗａｒ§e❖ §bEternity §aĐã Tắt"); 
                   $this->cfg->set($sender->getName(), off);
				   break;
               default :
                   $sender->sendMessage("§e§l❖§aＭｉｎｅ§6Ｗａｒ§e❖ §b/eternity §e<on | off> §ađể sử dụng");
                   break;
           }
       }
       return true;
   }
								
					 public function handleBlockBreak(BlockBreakEvent $event) {
		$player = $event->getPlayer();
		if($this->cfg->get($player->getName()) == "on"){
			 foreach($event->getDrops() as $drop){
				if($player->getInventory()->canAddItem($drop)){
				$player->getInventory()->addItem($drop);
				 }else{
				if ($this->autosell->get()->mode[$player->getName()] == "on"){
				$this->getServer()->dispatchCommand($player, "sell all");
				$player->sendMessage("§l§a Tự động bán đồ thành công!");
				}
				}
				}
		$event->setDrops([]);
		$event->setCancelled();
	}
	}
}
