<?php

namespace bank;

use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use bank\task\BankTask;
use onebone\economyapi\EconomyAPI;
use pocketmine\command\Command; 
use pocketmine\command\CommandSender; 
use pocketmine\utils\TextFormat as TF; 
use pocketmine\utils\Config;
use pocketmine\event\player\PlayerJoinEvent;
class Main extends PluginBase implements Listener{
	 public $task;
	
    public $tasks = [];
    
public function onEnable (){
	 $this->getServer()->getPluginManager()->registerEvents($this, $this);
	 $this->eco = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
	 @mkdir($this->getDataFolder());
				$this->bankmoney = new Config($this->getDataFolder()."bankmoney.yml",Config::YAML);
				 $this->banklaisuat = new Config($this->getDataFolder() . "laisuat.yml", config::YAML);
	      $this->getLogger()->info("Plugin Bank By Jero Gaming Đã Hoạt Động");
	 $this->getServer()->getScheduler()->scheduleRepeatingTask(new BankTask($this), 1200);
	}
	public function onDisable ()
	{
		$this->getLogger()->info("Plugin Bank By Jero Gaming Đã Dừng Hoạt Động");
	}
	 public function onNganHang() {
		foreach($this->getServer()->getOnlinePlayers() as $player){
		 if($player->isOnline()){
$bankmoney1 = $this->bankmoney->get($player->getName());
if($bankmoney1 >= 200000){
			 $this->banklaisuat->set($player->getName(), $this->banklaisuat->get($player->getName()) + 10000);
									$this->banklaisuat->save();
									}elseif($bankmoney1 >= 500000){
										$this->banklaisuat->set($player->getName(), $this->banklaisuat->get($player->getName()) + 50000);
									$this->banklaisuat->save();
									}elseif($bankmoney1 >= 1000000){
										$this->banklaisuat->set($player->getName(), $this->banklaisuat->get($player->getName()) + 100000);
									$this->banklaisuat->save();
										
									}
									}
									}
									}
									
									 public function onJoin (PlayerJoinEvent $event){
										 $player = $event->getPlayer()->getName();
			 if(!$this->bankmoney->exists($player)){
				$this->bankmoney->set($player, 0);
				$this->bankmoney->save();
										}
										  $player = $event->getPlayer()->getName();
			 if(!$this->banklaisuat->exists($player)){
				$this->banklaisuat->set($player, 0);
				$this->banklaisuat->save();
				}
				}
				
				 public function onCommand(CommandSender $sender, Command $cmd, $label, array $args): bool {
		if($cmd->getName() == "atm"){
			if(isset($args[0])){
				if($args[0] == "1"){
					 $sender->sendMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖ §a§lSố Tiền Của Bạn Trong WOAM ATM Là: §6".$this->bankmoney->get($sender->getName())." VND");
					  }elseif($args[0] == "2") {
					 $sender->sendMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖ §a§lSố Tiền Lãi Của Bạn Trong WOAM ATM Là: §6".$this->banklaisuat->get($sender->getName())." VND");
					 }elseif($args[0] == "3") {
					
					if(!isset($args[1])){
						$sender->sendMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖ §6Xin vui lòng nhập bằng số để hệ thống ATM thực hiện giao dịch!");
						return false;
					}
					
					if(!is_numeric($args[1])){
						$sender->sendMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖ §6Xin vui lòng nhập bằng số để hệ thống ATM thực hiện giao dịch!");
						return false;
					}
					 if($this->bankmoney->get($sender->getName()) >= $args[1]){
						$sender->sendMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖ §6Bạn đã rút §c".$args[1]."§a$ §6từ hệ thống ATM của chúng tôi!");
						 $this->eco->addMoney($sender, $args[1]);
						$this->bankmoney->set($sender->getName(), $this->bankmoney->get($sender->getName()) - $args[1]);
						$this->bankmoney->save();
						} else{
							$sender->sendMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖ §c§lSố Tiền Trong ATM Của Bạn Ít Hơn Số Tiền Bạn Rút");
							 }
							
							 }elseif($args[0] == "4") {
					
					if(!isset($args[1])){
						$sender->sendMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖ §6Xin vui lòng nhập bằng số để hệ thống ATM thực hiện giao dịch!");
						return false;
					}
					
					if(!is_numeric($args[1])){
						$sender->sendMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖ §6Xin vui lòng nhập bằng số để hệ thống ATM thực hiện giao dịch!");
						return false;
					}
					 if($this->banklaisuat->get($sender->getName()) >= $args[1]){
						$sender->sendMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖ §6Bạn đã rút §c".$args[1]."§a$ Lãi §6từ hệ thống ATM của chúng tôi!");
						 $this->eco->addMoney($sender, $args[1]);
						$this->banklaisuat->set($sender->getName(), $this->banklaisuat->get($sender->getName()) - $args[1]);
						$this->banklaisuat->save();
						} else{
							$sender->sendMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖ §c§lSố Tiền Lãi Trong ATM Của Bạn Ít Hơn Số Tiền Bạn Rút");
							 }
				
				}elseif($args[0] == "5"){
					
					if(!isset($args[1])){
						$sender->sendMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖ §c§lSố Tiền Bạn Gửi Phải Là số");
						return false;
					}
					
					if(!is_numeric($args[1])){
						$sender->sendMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖ §c§lSố Tiền Bạn Gửi Phải Là Số");
						return false; 
					}
					
					if($this->eco->myMoney($sender->getName()) >= $args[1]){
						 $sender->sendMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖ §a§lBạn Đã Gửi Thành Công: §6".$args[1]." §aVào ATM WOAM");
						$this->eco->reduceMoney($sender, $args[1]);
						$this->bankmoney->set($sender->getName(), $this->bankmoney->get($sender->getName()) + $args[1]);
									$this->bankmoney->save();
									}
									} else{
										$sender->sendMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖ §c§lSố Tiền Của Bạn Ít Hơn Tiền Bạn Gửi");
											}
											 } else{
												 $sender->sendMessage("§e§l❖ §cNgân Hàng WOAM§e ❖\n§a§l1 §fĐể Xem Tiền Trong ATM\n§a§l2 §fĐể Xem Số Tiền Lãi Trong ATM\n§a§l3 §fĐể Rút Tiền Trong ATM\n§a§l4 §fĐể Rút Tiền Lãi Trong ATM\n§a§l5 §fĐể Gửi Tiền Vào ATM\n§e§l❖§aＭｉｎｅ§6Ｗａｒ§e❖ Sử Dụng:/atm < 1, 2, 3, 4 hoặc 5>");
												 }
			}else{
				$sender->sendMessage("§e§l❖ §cATM WOAM ❖\n§a§l1 §fĐể Xem Tiền Trong ATM\n§a§l2 §fĐể Xem Số Tiền Lãi Trong ATM\n§a§l3 §fĐể Rút Tiền Trong ATM\n§a§l4 §fĐể Rút Tiền Lãi Trong ATM\n§a§l5 §fĐể Gửi Tiền Vào ATM\n§e§l❖§aＭｉｎｅ§6Ｗａｒ§e❖ Sử Dụng:/atm < 1, 2, 3, 4 hoặc 5>");
			}
		}
	}
