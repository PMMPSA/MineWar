<?php

namespace kuraLLsz;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\Command\CommandSender;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Event;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\scheduler\CallbackTask;
use _64FF00\PureChat\PureChat;
use pocketmine\item\Item;
use pocketmine\block\Block;
use pocketmine\{Player, Server};
use pocketmine\entity\Entity;
use pocketmine\entity\Human;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener{
	 public $prefix = "§b[§cLevelIS§b] ";
	
	public $cfg;
	public $config;
	public $level;
	public $exp;
	public $nextexp;
	public function onEnable(){
		 $this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info("§l§aPlugin LevelIsland Được Làm Bởi Nguyễn Công Danh (NCD) Edit By Jero Gaming [JR]");
		$this->getLogger()->notice("§l§aVui Lòng Tôn Trọng Người Làm Plugin Không Được Chỉnh Sửa Author");
		$this->eco = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
		
		@mkdir($this->getDataFolder());
		$this->level = new Config($this->getDataFolder() . "Level.yml", Config::YAML);
		$this->exp = new Config($this->getDataFolder() . "EXPLevel.yml", Config::YAML);
	    $this->nextexp = new Config($this->getDataFolder() . "NextEXPLevel.yml", Config::YAML);
}
public function onJoin(PlayerJoinEvent $ev){
		$p = $ev->getPlayer()->getName();
		if($this->nextexp->get($p) > 0){
		} else {
			$this->level->set($p, 1);
			$this->exp->set($p, 1);
			$this->nextexp->set($p, 100);
		}
	}

public function onBlock(BlockPlaceEvent $ev){
		if ($ev->isCancelled()){
			return;
		}
		$p = $ev->getPlayer()->getName();
		$sender = $ev->getPlayer();
		if($this->exp->get($p) < $this->nextexp->get($p)){
			$this->exp->set($p, $this->exp->get($p) +0.5);
		} else {
			$this->level->set($p,$this->level->get($p) +1);
			$this->exp->set($p, 0);
			$this->nextexp->set($p, $this->nextexp->get($p) + 50);
			$this->level->save();
			$this->exp->save();
			$this->nextexp->save();
			
			$money = 1000;
			$this->eco->addMoney($sender, $money);
			
			$this->getServer()->broadcastMessage($this->prefix . "§aCấp Đảo của người chơi §c".$p." §ađã lên cấp §c".$this->level->get($p));
			$sender->sendMessage($this->prefix . "§aCấp đảo của bạn đã được lên cấp §c".$this->level->get($p));
			$sender->sendMessage($this->prefix . "§eBạn nhận được §c$money xu §ekhi lên level.");
           }
       }
       
       public function onCommand(CommandSender $s, Command $kmt, $label, array $args){
       		$user = $s->getPlayer()->getName();
		$user2 = $s->getPlayer();
       	$o = $s->getPlayer()->getName();
       	if($kmt->getName() == "levelisland"){
       		if(isset($args[0])){
       if(strtolower($args[0] == "info")){
					$s->sendMessage("§l§dLevel Island");
					$s->sendMessage("§c♦ §eNgười chơi§f: " . $user . "!");
					$s->sendMessage("§c♦ §eLevel Island hiện tại§f: " . $this->level->get($user) . "!");
					$s->sendMessage("§c♦ §eXP Island Hiện Tại§f: " . $this->exp->get($user) . "/" . $this->nextexp->get($user) . "!");
				
				
				}
				} else {
					$s->sendMessage("§f•§aGhi §f/levelisland info §aĐể Xem Thông Tin Đảo");
				}
       	}
       	if($kmt->getName() == "topis"){
 	$max = 0;
				foreach($this->level->getAll() as $c){
				$max += count($c);
				}
				$max = ceil(($max / 5));
				$page = array_shift($args);
				$page = max(1, $page);
				$page = min($max, $page);
				$page = (int)$page;
				$s->sendMessage("§f•§aXếp Hạng Cấp Độ Đảo §f[§a". $page."§f/§a".$max."§f]");
				$aa = $this->level->getAll();
				arsort($aa);
				$i = 0;
				foreach($aa as $b=>$a){
				if(($page - 1) * 5 <= $i && $i <= ($page - 1) * 5 + 4){
				$i1 = $i + 1;
				$s->sendMessage("§l§cTOP".$i1."§f] §a".$b." §b:§a ".$a);
				}
				$i++;
				}
				}
       	}
      
   public function getLevelIsland($sender){
		if($sender instanceof Player){
			$name = $sender->getName();
			$levelisland = $this->level->get($name);
			return $levelisland;
    }
    }
    }