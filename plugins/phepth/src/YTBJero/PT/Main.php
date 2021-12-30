<?php
//đây là đường dẫn
namespace YTBJero\PT;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pockketmine\Player;
use pocketmine\command\{Command, CommandSender, ConsoleCommandSender};
use pocketmine\utils\Config;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\block\BlockBreakEvent;
use YTBJero\PT\task\ManaTask;
class Main extends PluginBase implements Listener{
	 public $task;
	
    public $tasks = [];
    
public function onEnable (){
	 $this->getServer()->getPluginManager()->registerEvents($this, $this);
	 $this->eco = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
	 @mkdir($this->getDataFolder());
				$this->mana = new Config($this->getDataFolder()."mana.yml",Config::YAML);
				$this->ml = new Config($this->getDataFolder()."ml.yml",Config::YAML);
				$this->lv = new Config($this->getDataFolder()."lv.yml",Config::YAML);
	      $this->getLogger()->info("Plugin Mana By Jero Gaming Đã Hoạt Động");
	 $this->getServer()->getScheduler()->scheduleRepeatingTask(new ManaTask($this), 20);
	}
	 public function onPhep() {
		foreach($this->getServer()->getOnlinePlayers() as $player){
		 if($player->isOnline()){
$mn = $this->ml->get($player->getName());
$max = $this->mana->get($player->getName());
	$player->sendPopup("§d§l❖ §r§bLượng Mana Còn: §c".$mn."§b/§c".$max." §d§l❖");	
if($max >= $mn){
	$this->ml->set($player->getName(), $this->ml->get($player->getName()) + 1);
									$this->ml->save();
										
									}
									}
									}
									}
									public function onJoin (PlayerJoinEvent $event){
										 $player = $event->getPlayer()->getName();
			 if(!$this->mana->exists($player)){
				$this->mana->set(($player),  200);
				$this->mana->save();
			}
			 if(!$this->ml->exists($player)){
				$this->ml->set(($player), 0);
				$this->ml->save();
				}
			 if(!$this->lv->exists($player)){
				$this->lv->set(($player), 1);
				$this->lv->save();
				$sender->sendMessage("§d§l❖ §r§bĐã Mở Khóa Mana Hãy /upmana để nâng cấp");
			}
		}
public function onBreak(BlockBreakEvent $event) {
		$player = $event->getPlayer();
				 	$mn = $this->ml->get($player->getName());
				 	if(3 >= $mn){
				 		$player->sendMessage("§d§l❖ §r§bLượng Mana §cCạn");
		$event->setDrops([]);
		$event->setCancelled();
								} else{
									$mn = $this->ml->get($player->getName());
$max = $this->mana->get($player->getName());
$level = $this->lv->get($player->getName());
$this->ml->set($player->getName(), $this->ml->get($player->getName()) - 3);
									$this->ml->save();
				 		
		}
	}
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
		if($cmd->getName() == "upmana"){
$player = $sender->getPlayer();
			$mn = $this->ml->get($player->getName());
$max = $this->mana->get($player->getName());
$level = $this->lv->get($player->getName());
$eco = $this->eco->myMoney($player);
if($eco >= 1000000*$level){
	$this->eco->reduceMoney($player, 1000000*$level);
	$this->mana->set($player->getName(), $this->mana->get($player->getName()) + 100);
									$this->mana->save();
	$this->lv->set($player->getName(), $this->lv->get($player->getName()) + 1);
								$this->lv->save();
	$sender->sendMessage("§d§l❖ §r§bĐã Nâng Cấp Level Mana lên cấp §b".$level."!");
} else{
	$sender->sendMessage("§d§l❖ §r§cKhông đủ tiền lên cấp");
}
}
		}
	}
