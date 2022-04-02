<?php

/*
*   _____      _ _ 
*  / ____|    | | |
* | (___   ___| | |
*  \___ \ / _ \ | |
*  ____) |  __/ | |
* |_____/ \___|_|_|
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU Lesser General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*/

namespace SellHand;

use pocketmine\Player;
use pocketmine\item\Item;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as TF;
use onebone\economyapi\EconomyAPI;

class Main extends PluginBase implements Listener{

	public function onLoad(){
		$this->getLogger()->info("§ePlugin Loading!");
	}

	public function onEnable(){
    	$this->getLogger()->info(TF::GREEN.TF::BOLD."
   _____      _ _ 
  / ____|    | | |
 | (___   ___| | |
  \___ \ / _ \ | |
  ____) |  __/ | |
 |_____/ \___|_|_|
 NightMC > Sell Plugin Enable | Arthur: JackMD 
 		");
		$files = array("sell.yml", "messages.yml");
		foreach($files as $file){
			if(!file_exists($this->getDataFolder() . $file)) {
				@mkdir($this->getDataFolder());
				file_put_contents($this->getDataFolder() . $file, $this->getResource($file));
			}
		}
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->sell = new Config($this->getDataFolder() . "sell.yml", Config::YAML);
		$this->messages = new Config($this->getDataFolder() . "messages.yml", Config::YAML);
		$this->skillminer = $this->getServer()->getPluginManager()->getPlugin("SkillMiner");
	}

	public function onDisable(){
    	$this->getLogger()->info("§cPlugin Disabled!");
  	}

	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
		switch(strtolower($cmd->getName())){
			case "sell":
			// Checks if command is executed by console.
			// It further solves the crash problem.
			if(!($sender instanceof Player)){
				$sender->sendMessage(TF::RED . TF::BOLD ."Error: ". TF::RESET . TF::DARK_RED ."Please use this command in game!");
				return true;
				break;
			}

				/* Check if the player is permitted to use the command */
				if($sender->hasPermission("sell") || $sender->hasPermission("sell.hand") || $sender->hasPermission("sell.all")){
					/* Disallow non-survival mode abuse */
					if(!$sender->isSurvival()){
						$sender->sendMessage("§e§l❖§aＭｉｎｅ§6Ｗａｒ§e❖ §aBạn Cần Chuyển Về Chế Độ Sinh Tồn Để Bán Đồ");
						return false;
					}
					
					/* Sell Hand */
					if(isset($args[0]) && strtolower($args[0]) == "hand"){
						if(!$sender->hasPermission("sell.hand")){
							$error_handPermission = $this->messages->get("error-nopermission-sellHand");
							$sender->sendMessage(TF::RED . TF::BOLD . "Error: " . TF::RESET . TF::RED . $error_handPermission);
							return false;
						}
						$item = $sender->getInventory()->getItemInHand();
						$name = $item->getCustomName();
						$itemId = $item->getId();
						/* Check if the player is holding a block */
						if($item->getId() === 0){
							$sender->sendMessage("§e§l❖§aＭｉｎｅ§6Ｗａｒ§e❖§aBạn Không Có Vật Phẩm Nào Để Bán");
							return false;
						}
						/* Recheck if the item the player is holding is a block */
						if($this->sell->get($itemId) == null){
							$sender->sendMessage("§e§l❖§aＭｉｎｅ§6Ｗａｒ§e❖§aBạn Không Thể Bán Vật Phẩm Này");
							return false;
						}
						if($name !== "")
						return false;
						/* Sell the item in the player's hand */
						if($sender->hasPermission("sellx2.miner")){
	EconomyAPI::getInstance()->addMoney($sender, ($this->sell->get($itemId) * $item->getCount()) * 3);
						}else{
						EconomyAPI::getInstance()->addMoney($sender, $this->sell->get($itemId) * $item->getCount());
						}
						$sender->getInventory()->removeItem($item);
						$price = $this->sell->get($item->getId()) * $item->getCount();
						$sender->sendMessage("§a§l(!) Bạn Đã Nhận Được §c$" . $price . " đã được thêm vào tài khoản của bạn.");
						$sender->sendMessage("§a§l(!) Bạn Đã Nhận Được §c$" . $price . " §aKhi Bán(" . $item->getCount() . " " . $item->getName() . " §a Với Giá §a$" . $this->sell->get($itemId) . " §aMỗi Vật Phẩm).");

					/* Sell All */
					}elseif(isset($args[0]) && strtolower($args[0]) == "all"){
						if(!$sender->hasPermission("sell.all")){
							$error_allPermission = $this->messages->get("error-nopermission-sellAll");
							$sender->sendMessage(TF::RED . TF::BOLD . "Lỗi: " . TF::RESET . TF::RED . $error_allPermission);
							return false;
						}
						$items = $sender->getInventory()->getContents();
						foreach($items as $slot=>$item){
							if($this->sell->get($item->getId()) !== null && $this->sell->get($item->getId()) > 0 && $item->getCustomName() == ""){
							    if($item->getCustomName() == ""){
									$itemId = $item->getId();
								$price = $this->sell->get($item->getId()) * $item->getCount();
						if($sender->hasPermission("sellx2.miner")){
	EconomyAPI::getInstance()->addMoney($sender, ($this->sell->get($itemId) * $item->getCount()) * 2);
						}else{
						EconomyAPI::getInstance()->addMoney($sender, $this->sell->get($itemId) * $item->getCount());
						}
								$sender->sendMessage("§a§l(!) Bạn Đã Nhận Được §c$ " ."" . $price . " §aKhi Bán(" . $item->getCount() . " " . $item->getName() . " §a Với Giá §a$ " . $this->sell->get($item->getId()) . " §aMỗi Vật Phẩm).");
								if($item->getCustomName() == ""){
								$sender->getInventory()->setItem($slot, Item::get(0));
							}
							    }
							}
						}
					}elseif(isset($args[0]) && strtolower($args[0]) == "about"){
						$sender->sendMessage("§a•Thông Tin Plugin•\n§f•§eTác Giả:§a Muqsit Rayyan\n§f•§eChỉnh Sửa:§a Master Jero\n§f•§ePhiên Bản:§a 1.1.x");
					}else{
						$sender->sendMessage("§a•Hướng Dẫn Sử Dụng Plugin•\n§f•§e /sell all §f-§a Để Bán Tất Cả Vật Phẩm Có Trong Túi Đồ\n§f•§e /sell hand §f-§a Bán Vật Phẩm Trên Tay Bạn Đang Cầm\n§f•§e /sell about §f-§a Xem Thông Tin Plugin");
						return true;
					}
				}else{
					$error_permission = $this->messages->get("error-permission");
					$sender->sendMessage($error_permission);
				}
				break;
		}
}
}