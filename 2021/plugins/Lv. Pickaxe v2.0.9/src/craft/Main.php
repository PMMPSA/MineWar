<?php

namespace CRAFT;

/*
* Lv. Pickaxe Plugin
* Support PocketMine MCPE 1.1.5
* Plugin-Market: KAIDOMC
* Plugin Price: 60.000 VND
* Type: Viettel
*
*/

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\block\Block;
use pocketmine\item\Item;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\Config;
use craft\PopupTask;

class Main extends PluginBase implements Listener{
	
		public function onEnable(){
			$this->getServer()->getPluginManager()->registerEvents($this, $this);
			$this->EconomyAPI = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
			@mkdir($this->getDataFolder());
				$this->config = new Config($this->getDataFolder()."players.yml",Config::YAML);
					$this->getLogger()->info("§9Enable!");
		}
		
		public function onJoin(PlayerJoinEvent $event){
			$player = $event->getPlayer();
			$user = $event->getPlayer()->getname();
				 if(!$this->config->exists($user)){
					
					$this->getLogger()->notice(" Không tìm thấy data của ".$user.".§6 Đang tạo cơ sở dữ liệu...");
					$this->getLogger()->info(" Xong...");
					
					$item = Item::get(278, 0, 1);
					$item->setCustomName($this->getNamePickaxe($player));
					$item->setLore(array($this->getLore($player)));
					
					$player->getInventory()->addItem($item);
					$player->sendMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖ §6Đã Thêm Cúp Vào Kho Đồ Của bạn,Hãy Đồng Hành Cùng Nó Nhé!");
					
					$this->config->set(($user), ["Level" => 1, "exp" => 0, "nextexp" => 100]);
					$this->config->save();
					}
				return true;
		}
		public function getNamePickaxe($player){
			if($player instanceof Player){
				$player = $player->getName();
				}
				$brv = "§l§a⚒§b WAR§dOF AMBITION§6 §r§l[§cLevel: §b ".$this->config->get($player)["Level"]." §r§l]§a§l ".$player;
			return $brv;	
		}
		public function getLore($player){
			if($player instanceof Player){
				$player = $player->getName();
				}
				$player = strtolower($player);
				$lore = "§b§l⇲ Thông Tin:\n§e§lChiếc Cúp Được Rèn Từ\n§e§l§cMột Vị Thần tài Giỏi Đã Chiến Thắng §eCuộc Thời Chiến Tranh\n§e§l✦ §6Cậu Đã Triệu Hồi Ta?, Thế Cậu Đã sẵn Sàng Đối Đầu Chưa?\n\n§9§l↦ §bChủ Nhân: §a".$player."!";
			return $lore;				
		}
		public function onHeld(PlayerItemHeldEvent $event){
			
			$task = new PopupTask($this, $event->getPlayer());
			$this->task[$event->getPlayer()->getId()] = $task;
				$this->getServer()->getScheduler()->scheduleRepeatingTask($task, 1);
				
				$player = $event->getPlayer();
				$item = $player->getInventory()->getItemInHand();
				
				if(isset($this->need[$player->getName()])){
					
					$item->setCustomName($this->getNamePickaxe($player));
					$item->setLore(array($this->getLore($player)));
					
					if($this->getLevel($player) == 3){
						
						$item = Item::get(278, 0, 1);
						$item->setCustomName($this->getNamePickaxe($player));
						$item->setLore(array($this->getLore($player)));
						$player->sendMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖§bCÚP Của bạn đã Nâng cấp!");
					
						
						} elseif($this->getLevel($player) == 20){
							
							$item = Item::get(278, 0, 1);
							$item->setCustomName($this->getNamePickaxe($player));
							$this->setLore(array($this->getLore($player)));
							$player->sendMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖§bCÚP Của bạn đã Nâng cấp!");
							
							}
							if(in_array($this->getLevel($player), array(10, 20))){						
								}
								if(in_array($this->getLevel($player), array(2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 26, 28, 30, 32, 34, 36, 38, 40, 42, 44, 46, 48, 50, 52, 54, 56, 58, 60))){
									$enchant = Enchantment::getEnchantment(17)->setLevel($this->getLevel($player)/2);
									$item->addEnchantment($enchant);
									$player->sendMessage(" l§6⚒§e Cúp đã được cường hóa".($this->getLevel($player)/2).".");
									} elseif(in_array($this->getLevel($player), array(3, 5, 7, 9, 11, 13, 15, 17, 19, 21, 23, 25, 27, 29, 31, 33, 35, 37, 39, 41, 43, 45, 47, 49, 51, 53, 55, 57, 59))){
										$enchant = Enchantment::getEnchantment(15)->setLevel($this->getLevel($player)/3);
										$item->addEnchantment($enchant);
										$player->sendMessage("§eCÚP Của bạn đã được cường hoá§6 Hiệu năng§b ".($this->getLevel($player)/3).".");
										} 								
											$player->getInventory()->setItemInHand($item);
												unset($this->need[$player->getName()]);											
					}			
				}
					
			public function onBreak(BlockBreakEvent $event){
				$player = $event->getPlayer();
				$item = $player->getInventory()->getItemInHand();
				$icn = $item->getCustomName();
				$pas = explode(" ", $icn);
					if($pas[0] == "§e|§b"){
			if(!in_array($player->getName(), explode(" ", $icn))){
				$event->setCancelled(true);
				$player->sendMessage(" §l§c•§6 Vật Phẩm Không Phải Của Bạn");
	
				}
			}
					if(!$event->isCancelled()){
						if($pas[0] == "§l§a⚒§b"){
							$block = $event->getBlock();
							$name = strtolower($player->getName());
							$n = $this->config->get($name);
								
								switch($block->getId()){
									 case 56:
                       $this->addExp($player, 4);
                       break;
                   case 14:
                       $this->addExp($player, 3);
                       break;
                   case 15:
                       $this->addExp($player, 4);
                       break;
                   case 16:
                       $this->addExp($player, 2);
                       break;
                  case 87:
                       $this->addExp($player, 0);
                       break;
                   case 129:
                       $this->addExp($player, 6);
                       break;
                   case 133:
                       $this->addExp($player, 8);
                       break;
                   case 57:
                           $this->addExp($player, 7);
                   case 42:
                       $this->addExp($player, 6);
                   case 41:
                       $this->addExp($player, 6);
                       break;
                   default:
                       $this->addExp($player, 2);
                       break;					
									}
										$player->sendPopup("§e§l⎳ §dCÚP: §b§l❖ §bＷＡＲ §cＯＦ §e✪§9ＡＭＢＩＴＩＯＮ§e✪ §e⚒\n§c§l ⊱ §bKinh Nghiệm:§a".$n["exp"]."§3/§a".$n["nextexp"]." §c| §bCấp Cúp: §a".$n["Level"]);
									
											if($this->getExp($player) >= $this->getNextExp($player)){
												$this->setLevel($player, $this->getLevel($player) + 1);
												$player->sendMessage("§e§l❖§6Level Cúp§e: ".$this->getLevel($player)."!");
												$player->addTitle("§a❖§l§9 Lên cấp§e ".$this->getLevel($player));
												$this->getServer()->broadcastMessage("§e§l❖§aＭｉｎｅ§6Ｗａｒ§e❖ §bPickaxe Của:§e".$player->getName()." §bVừa lên Level§d : ".$this->getLevel($player)."!");
													if(in_array($this->getLevel($player), array(3, 20, 40, 80, 200))){
														$this->EconomyAPI->addMoney($player->getName(), $this->getLevel($player)*1000);
														$player->sendMessage("[§a+§f]§e Bạn nhận được§6 ".($this->getLevel($player)*1000)."§eXu. Quà tặng mỗi khi lên cấp pickaxe§6 ".$this->getLevel($player).".");
														}
														$this->need[$player->getName()] = true;
												}						
											}
										}
									}
		public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
				switch($command->getName()){
					case "givecup":
				if($sender->isOp()){
					if(!isset($args[0])){
						$sender->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §aSử dụng lệnh§e /givecup <người chơi>§c Đưa cúp cho người chơi.");
						return true;
                  }
					$player = $this->getServer()->getPlayer($args[0]);
					if(!$player){
						$sender->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §cKhông tìm thấy người chơi này!");
						return true;
							}
					if($this->getLevel($player) < 3){
						$item = Item::get(278, 0, 1);
						$item->setCustomName($this->getNamePickaxe($player));
						$item->setLore(array($this->getLore($player)));
							} elseif($this->getLevel($player) >= 3 && $this->getLevel($player) < 20){
								$item = Item::get(278, 0, 1);
								$item->setCustomName($this->getNamePickaxe($player));
								$item->setLore(array($this->getLore($player)));
								} elseif($this->getLevel($player) >= 20){
									$item = Item::get(278, 0, 1);
									$item->setCustomName($this->getNamePickaxe($player));
									$item->setLore(array($this->getLore($player)));
									}
									$player->getInventory()->addItem($item);
										$player->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §6Bạn Đã Hồi Sinh Cúp Level Của Mình Thành Công");									
					} else{
						$sender->sendMessage("§cKhông có Quyền!");
					}
					break;
						case "topcup":
							$max = 0;
							foreach($this->config->getAll() as $c){
								$max += count($c);
								}
							$page = ceil($max /5);
							$page = array_shift($args);
							$page = max(1, $page);
							$page = min($max, $page);
							$page = (int)$page;
					$sender->sendMessage("§l§c⚒§6 Xếp Hạng Cấp Cúp §a".$page."§f/§a".$max."§c ⚒");
							$aa = $this->config->getAll();
							arsort($aa);
							$i = 0;
							foreach($aa as $b=>$a){
								if(($page - 1) * 5 <= $i && $i <= ($page - 1) * 5 + 4){
									$i1 = $i + 1;
									$c = $this->config->get(strtolower($b))["Level"];
										$sender->sendMessage("§l§bHạng §e".$i1."§b thuộc về §c".$b.":§aCấp ".$c);
									}
								$i++;
							}
						return true;						
				}
			}
			public function getLevel($player){
		if($player instanceof Player){
			$player = $player->getName();
			}
			$level = $this->config->get(strtolower($player))["Level"];
			return $level;
		}
	public function setLevel($player, $level){
		if($player instanceof Player){
			$name = $player->getName();
		}

		$nextexp = ($this->getLevel($player)+1)*50;
		$this->config->set(strtolower($name), ["Level" => $level, "exp" => 0, "nextexp" => $nextexp]);
		$this->config->save();
	}
	public function setNextExp($player, $exp){
		if($player instanceof Player){
			$player = $player->getName();
		}

		$player = strtolower($player);
		$lv = $this->config->get($player)["nextexp"] + $exp;
		$this->config->set($player, ["Level" => $this->config->get($player)["Level"], "exp" => $this->config->get($player)["exp"], "nextexp" => $lv]);
		$this->config->save();
	}
	public function getExp($player){
		if($player instanceof Player){
			$player = $player->getName();
		}

		$player = strtolower($player);
		$e = $this->config->get($player)["exp"];
		return $e;
	}
	public function getNextExp($player){
		if($player instanceof Player){
			$player = $player->getName();
		}

		$player = strtolower($player);
		$lv = $this->config->get($player)["nextexp"];
		return $lv;
	}
	public function addExp($player, $exp){
		if($player instanceof Player){
			$player = $player->getName();
		}

		$player = strtolower($player);
		$e = $this->config->get($player)["exp"];
		$lv = $this->config->get($player)["Level"];
		$this->config->set($player, ["Level" => $lv, "exp" => $e + $exp, "nextexp" => $this->getNextExp($player)]);
		$this->config->save();
       	}
		}	
		