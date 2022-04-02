<?php

namespace topwins;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntitySpawnEvent;

use pocketmine\utils\Config;

use pocketmine\nbt\tag\ByteTag;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\DoubleTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\nbt\tag\IntTag;
use pocketmine\nbt\tag\ShortTag;
use pocketmine\nbt\tag\StringTag;
use pocketmine\math\Vector3;

use pocketmine\entity\Entity;
use pocketmine\Player;
use pocketmine\Server;

use topwins\entity\TextEntity;
use topwins\entity\Human;

class Main extends PluginBase implements Listener{
	
	private static $instance = null;
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		self::$instance = $this;
		Entity::registerEntity(TextEntity::class, true);
		Entity::registerEntity(Human::class, true);
	}
	
	public function onChat(PlayerChatEvent $e){
		$sender = $e->getPlayer();
		$msg = explode(" ", $e->getMessage());
		if(strtolower($msg[0]) == "@topwin"){
			$e->setCancelled(true);
			if(!$sender->isOp()){
				$sender->sendMessage("§cBạn không được phép sử dụng lệnh này");
				return true;
			}
			if(isset($msg[1])){
				switch($msg[1]){
					case "killrate":
					case "kills":
					case "kill":
					case "k":
					if(isset($msg[2])){
						$pos = 1;
						if(is_numeric($msg[2])){
							$pos = $msg[2] * 1;
						} else {
							$sender->sendMessage("§cLỗi vị trí phải được thể hiện bằng một số, không phải một chữ cái!");
							return true;
						}
						if($pos > 10){
							$sender->sendMessage("§cLỗi là chỉ có thể thêm 10 vị trí!");
							return true;
						}
						$data = $this->getKill($pos);
						$name = $data["name"];
						if(isset($data["tag"])){
							$name = $data["tag"];
						}
						$msg = "§l§c" . $pos . "º §r§7Địa điểm\n§e$name".$data["name"]." \n§e" . $data["count"] . " §7Giết";
						$msg = $this->centralize($msg);
						$x = (int) $sender->getX();
						$y = $sender->getY();
						$z = (int) $sender->getZ();
						$nbt = $this->makeNBT($pos, "kills", $sender->getSkinData(), $sender->getSkinId(), $msg, [], $sender->getYaw(), $sender->getPitch(), $x, $y, $z);
						$ent = Entity::createEntity("Human", $sender->getLevel()->getChunk($x >> 4, $z >> 4), $nbt);
						$ent->spawnToAll();
					} else {
						$sender->sendMessage("§eUse: §7@topwin kills {posição}");
						return true;
					}
					break;
					case "topwins":
					case "wins":
					case "win":
					case "w":
					if(isset($msg[2])){
						$pos = 1;
						if(is_numeric($msg[2])){
							$pos = $msg[2] * 1;
						} else {
							$sender->sendMessage("§cLỗi vị trí phải được thể hiện bằng một số, không phải một chữ cái!");
							return true;
						}
						if($pos > 10){
							$sender->sendMessage("§cLỗi là chỉ có thể thêm 10 vị trí!");
							return true;
						}
						$data = $this->getTop($pos);
						$name = $data["name"];
						if(isset($data["tag"])){
							$name = $data["tag"];
						}
						$msg = "§l§c" . $pos . "º §r§7Địa điểm\n§e$name".$data["name"]." \n§e" . $data["count"] . " §7Victories";
						$msg = $this->centralize($msg);
						$x = (int) $sender->getX();
						$y = $sender->getY();
						$z = (int) $sender->getZ();
						$nbt = $this->makeNBT($pos, "wins", $sender->getSkinData(), $sender->getSkinId(), $msg, [], $sender->getYaw(), $sender->getPitch(), $x, $y, $z);
						$ent = Entity::createEntity("Human", $sender->getLevel()->getChunk($x >> 4, $z >> 4), $nbt);
						$ent->spawnToAll();
					} else {
						$sender->sendMessage("§eUse: §7@topwin wins {posição}");
						return true;
					}
					break;
					case "set":
					if(isset($msg[2])){
						switch(strtolower($msg[2])){
							case "texto":
							array_shift($msg);
							array_shift($msg);
							array_shift($msg);
							$name = str_replace(["{n}", "{t}"], ["\n", "\n"], trim(implode(" ", $msg)));
							$nameR = str_replace("{ON_PLAYERS}", Server::getInstance()->getDServerOnlinePlayers(), str_replace("{MAX_PLAYERS}", Server::getInstance()->getDServerMaxPlayers(), $name));
							$x = (int) $sender->getX();
							$y = $sender->getY();
							$z = (int) $sender->getZ();
							$nbt = $this->makeNBT(null, null, $sender->getSkinData(), $sender->getSkinId(), $nameR, [], $sender->getYaw(), $sender->getPitch(), $x, $y, $z);
							$ent = Entity::createEntity("TextEntity", $sender->getLevel()->getChunk($x >> 4, $z >> 4), $nbt);
							$ent->realName = $name;
							$ent->spawnToAll();
							break;
							case "topwins":
							$name = "§l§eREDE§7Phoenix§r§7\nTOP CHIẾN THẮNG\n§7\n" . $this->getMoneyTop();
							$x = (int) $sender->getX();
							$y = $sender->getY();
							$z = (int) $sender->getZ();
							$nbt = $this->makeNBT(1, null, $sender->getSkinData(), $sender->getSkinId(), $name, [], $sender->getYaw(), $sender->getPitch(), $x, $y, $z);
							$ent = Entity::createEntity("TextEntity", $sender->getLevel()->getChunk($x >> 4, $z >> 4), $nbt);
							$ent->spawnToAll();
							break;
							case "topkill":
							case "topkills":
							$name = "§l§eREDE§7PHOENIX§r§7\nTOP GIẾT\n§7\n" . $this->getKillTop();
							$x = (int) $sender->getX();
							$y = $sender->getY();
							$z = (int) $sender->getZ();
							$nbt = $this->makeNBT(2, null, $sender->getSkinData(), $sender->getSkinId(), $name, [], $sender->getYaw(), $sender->getPitch(), $x, $y, $z);
							$ent = Entity::createEntity("TextEntity", $sender->getLevel()->getChunk($x >> 4, $z >> 4), $nbt);
							$ent->spawnToAll();
							break;
							default:
							$sender->sendMessage("§eUse: §7@topwin set { topwins / topkills / texto }");
							break;
						}
					} else {
						$sender->sendMessage("§eUse: §7@topwin set { topwins / topkills / texto }");
					}
					break;
				}
			} else {
				$sender->sendMessage("§eUse: §7@topwin set { topwins / topkills / texto }");
			}
		}
	}
	
	public function onDamage(EntityDamageEvent $e){
		if($e instanceof EntityDamageByEntityEvent){
			$ent = $e->getEntity();
			if($ent instanceof TextEntity or $ent instanceof Human){
				$e->setCancelled(true);
				$p = $e->getDamager();
				if($p instanceof Player){
					if(!$p->isOp()){
						return true;
					}
					$inv = $p->getInventory();
					$item = $inv->getItemInHand();
					if($item->getId() == 352){
						$ent->kill();
						$ent->close();
					}
				}
			}
		}
		$ent = $e->getEntity();
		if($ent instanceof TextEntity or $ent instanceof Human){
			$e->setCancelled(true);
		}
	}
	
	public static function getInstance(){
		return self::$instance;
	}
	
	public function getKillTop(){
		$kill = $this->getServer()->getPluginManager()->getPlugin("KillRate");
		if(is_null($kill)){
			return "§cKhông có người chơi";
		}
		$msg = "";
		$top = $kill->getRankings(10);
		$count = 1;
		foreach($top as $data){
			$name = $data["player"];
			$abate = $data["count"];
			$p = $this->getServer()->getOfflinePlayer($name);
			$tag = is_null($this->getTag($p)) ? "" : $this->getTag($p);
			$msg .= "§l§c" . $count . "º §r§7\n" . $tag . " §7$name: §e $abate §7Giết\n";
			$count++;
		}
		if($msg == ""){
			return "§cKhông có người chơi";
		} else {
			return $msg;
		}
	}
	
	public function getKill($pos = 1){
		$kill = $this->getServer()->getPluginManager()->getPlugin("KillRate");
		if(is_null($kill)){
			return "§cKhông có người chơi";
		}
		$msg = "";
		$top = $kill->getRankings(10);
		$count = 1;
		foreach($top as $data){
			$name = $data["player"];
			$abate = $data["count"];
			if($count == $pos){
				$tag = $this->getTag($this->getServer()->getOfflinePlayer($name));
				if(is_null($tag)){
					return ["name" => $name, "count" => $abate];
				}
				return ["name" => $name, "tag" => $tag, "count" => $abate];
			}
			$count++;
		}
		return ["name" => "§cKhông có người chơi", "count" => "0"];
	}
	
	public function getTop($pos = 1){
		$economy = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
		if(is_null($economy)){
			return ["name" => "§cKhông có người chơi", "count" => "0"];
		}
		$data = $economy->getAllMoney()["money"];
		$top = [];
		$entries = $this->getServer()->getNameBans()->getEntries();
		$banList = [];
		foreach($entries as $entry){
			$banList[$entry->getName()] = true;
		}
		foreach($data as $name => $wins){
			$name = strtolower($name);
			if(isset($banList[$name])){
				continue;
			}
			$top[$name] = $wins;
		}
		arsort($top);
		$count = 0;
		foreach($top as $name => $win){
			$count++;
			if($count == $pos){
				$tag = $this->getTag($this->getServer()->getOfflinePlayer($name));
				if(is_null($tag)){
					return ["name" => $name, "count" => $win];
				}
				return ["name" => $name, "tag" => $tag, "count" => $win];
			}
		}
		return ["name" => "§cKhông có người chơi", "count" => "0"];
	}

	public function getMoneyTop(){
		$economy = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
		if(is_null($economy)){
			return "§cKhông có người chơi";
		}
		$data = $economy->getAllMoney()["money"];
		$top = [];
		$entries = $this->getServer()->getNameBans()->getEntries();
		$banList = [];
		foreach($entries as $entry){
			$banList[$entry->getName()] = true;
		}
		$msg = "";
		foreach($data as $name => $wins){
			$name = strtolower($name);
			if(isset($banList[$name])){
				continue;
			}
			$top[$name] = $wins;
		}
		arsort($top);
		$count = 0;
		foreach($top as $name => $wins){
			$count++;
			if($count <= 10){
				$p = $this->getServer()->getOfflinePlayer($name);
				$tag = is_null($this->getTag($p)) ? "" : $this->getTag($p);
				$msg .= "§l§c" . $count . "º §r§7\n" . $tag . " §7$name:§e $wins §7Vitorias\n";
			} else {
				break;
			}
		}
		if($msg == ""){
			return "§cKhông có người chơi";
		} else {
			return $msg;
		}
	}
	
	public function centralize(string $string){
		$array = explode("\n", $string);
		$message = "";
		if(count($array) > 1){
			$add = 0;
			$dd = 0;
			if(strlen($array[2]) >= 11){
				$add = 1;
			}
			$dt = explode(" ", $array[1]);
			$name = $dt[count($dt) - 2];
			$size = strlen($name);
			if($size >= 8){
				$dd = 2;
			} elseif($size >= 7){
				$dd = 1;
			}
			$count = count($array);
			$nn = 0;
			foreach($array as $arr){
				$len = strlen($arr) / 3;
				if($array[$nn] == $arr){
					$a = strlen($array[2]);
					for($i = 0; $i < (($a / 3) - 1 + $dd); $i++){
						$message .= " ";
					}
					$message .= $array[$nn] . "\n";
					continue;
				}
				if($nn == 0){
					$nn++;
					$ln = strlen($array[2]) / 3;
					if(strlen($array[$nn]) <= (strlen($array[2]) + ($ln - 1))){
						for($i = 0; $i < ($ln + ($ln / 2) - 2); $i++){
							$message .= " ";
						}
						$message .= $array[$nn] . "\n";
					} else {
						$message .= " " . $array[$nn] . "\n";
					}
					continue;
				}
				$nn++;
				for($n = 0; $n < (($len) + $dd - (1 + $add)); $n++){
					$message .= " ";
				}
				$message .= $array[$nn] . "\n";
			}
		}
		return $message;
	}
	
	public function getTag($p){
		$pure = $this->getServer()->getPluginManager()->getPlugin("PurePerms");
		$plugin = $this->getServer()->getPluginManager()->getPlugin("PureChat");
    	if(is_null($plugin) or is_null($pure)){
    		return null;
    	}
    	$plugin = $plugin->getConfig()->getAll();
    	$group = $pure->getUserDataMgr()->getGroup($p, null);
    	$groupN = $group->getName();
    	$tag = $plugin["groups"][$groupN]["default-nametag"];
    	$tag = str_replace(["{display_name}", "{faction}"], "", $tag);
		return $tag;
	}
	
	public function makeNBT($top, $cat, $skin, $skinId, $name, $inv, $yaw, $pitch, $x, $y, $z){
		$nbt = new CompoundTag;
		$nbt->Pos = new ListTag("Pos", [
		new DoubleTag("", $x + 0.5),
		new DoubleTag("", $y),
		new DoubleTag("", $z + 0.5)
		]);
		$nbt->Rotation = new ListTag("Rotation", [
		new FloatTag("", $yaw),
		new FloatTag("", $pitch)
		]);
		$nbt->Health = new ShortTag("Health", 1);
		$nbt->CustomName = new StringTag("CustomName", $name);
		$nbt->MenuName = new StringTag("MenuName", "");
		if(!is_null($cat)){
			$nbt->Categoria = new StringTag("Categoria", $cat);
		}
		if(!is_null($top)){
			$nbt->Top = new IntTag("Top", $top);
		}
		$nbt->CustomNameVisible = new ByteTag("CustomNameVisible", 1);
		$nbt->Inventory = new ListTag("Inventory", $inv);
		$nbt->Skin = new CompoundTag("Skin", ["Data" => new StringTag("Data", $skin), "Name" => new StringTag("Name", $skinId)]);
		return $nbt;
	}
} 