<?php

namespace Phuongaz;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\utils\TextFormat as TF;
use pocketmine\command\CommandReader;
use pocketmine\command\CommandExecuter;
use pocketmine\command\ConsoleCommandSender;
class Main extends PluginBase implements Listener{
	public $tag = "§l§d[§eBUY§bKIT§d]§r ";
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->eco = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
		$this->getLogger()->info(TF::GREEN . "§d§l====================\n§l§eBUY§a KIT§6 BY§b Phuongaz \n§d§l====================");
	}
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
		if ($cmd->getName() == "muakit"){
		$sender->sendMessage($this->tag."§c /muakit list để xem danh sách KIT");
		if(isset($args[0])){
				if(isset($args[0])){
				switch(strtolower($args[0])){
      case "list":
      $sender->sendMessage("§d-=-=|§a §lDanh Sách KIT§d |=-=-");
      $sender->sendMessage("§d[1] §aKit §cRồng§6 500.000 XU");
      $sender->sendMessage("§d[2] §aKit §eHoppa§6 1.000.000 XU");
      $sender->sendMessage("§d[3] §aKit §bĐức Vua§6 2.500.000 XU");
	        $sender->sendMessage("§d[4] §aKit §bMèo Thần Tài§6 5.000.000 XU");
      $sender->sendMessage("§d/kit [id] §a để mua");
      $sender->sendMessage("§d-=-=-=-=-=-=-=-=-=-=-=-=-");
      }
    }
  }
      if(isset($args[0])){
				if(isset($args[0])){
				switch(strtolower($args[0])){
				case "1":
				 $item1 = Item::get(310, 0, 1);
						 $item2 = Item::get(311, 0, 1);
						 $item3 = Item::get(312, 0, 1);
						 $item4 = Item::get(313, 0, 1);
						 $item5 = Item::get(276, 0, 1);
						 $item6 = Item::get(278, 0, 1);
						 $item7 = Item::get(278, 0, 1);
						 $item8 = Item::get(279, 0, 1);
						 $name1 = $item1->setCustomName("§r§b•=[§a Mũ §cRồng §b]=•");
						 $name2 = $item2->setCustomName("§r§b•=[§a Áo §cRồng §b]=•");
						 $name3 = $item3->setCustomName("§r§b•=[§a Quần §cRồng§b ]=•");
						 $name4 = $item4->setCustomName("§r§b•=[§a Giày §cRồng§b ]=•");
						 $name5 = $item5->setCustomName("§r§b•=[§a Kiếm §cRồng§b ]=•");
						 $name6 = $item6->setCustomName("§r§b•=[§a Cúp §cRồng§b ]=•");
 $money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						  if ($money < 500000){
							  $sender->sendMessage(TF::RED . "Không đủ tiền");
						  }
						  else{
						   $item1->addEnchantment(Enchantment::getEnchantment(0)->setLevel(10));
						    $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(10));
							 $item1->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item1->addEnchantment(Enchantment::getEnchantment(17)->setLevel(50));
							 $item2->addEnchantment(Enchantment::getEnchantment(0)->setLevel(10));
							  $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(10));
							 $item2->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item2->addEnchantment(Enchantment::getEnchantment(17)->setLevel(50));
							 $item3->addEnchantment(Enchantment::getEnchantment(0)->setLevel(10));
							 $item3->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item3->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(0)->setLevel(10));
							 $item4->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item4->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item5->addEnchantment(Enchantment::getEnchantment(9)->setLevel(10));
							 $item5->addEnchantment(Enchantment::getEnchantment(12)->setLevel(2));
							 $item5->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item6->addEnchantment(Enchantment::getEnchantment(15)->setLevel(9));
							 $item6->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							   $sender->getInventory()->addItem($item1);
							 $sender->getInventory()->addItem($item2);
							 $sender->getInventory()->addItem($item3);
							 $sender->getInventory()->addItem($item4);
							 $sender->getInventory()->addItem($item5);
							 //$sender->getInventory()->addItem($item6);
							 $item1->setCustomName($name1);
							 $item2->setCustomName($name2);
							 $item3->setCustomName($name3);
							 $item4->setCustomName($name4);
							 $item5->setCustomName($name5);
							 $item6->setCustomName($name6);
						  $sender->sendMessage($this->tag. "§a Mua Thành Công KIT");
						  
						  
							  $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 500000);
							  }
 return true;
					  break;
					  case "2":
					   $item1 = Item::get(310, 0, 1);
						 $item2 = Item::get(311, 0, 1);
						 $item3 = Item::get(312, 0, 1);
						 $item4 = Item::get(313, 0, 1);
						 $item5 = Item::get(276, 0, 1);
						 $item6 = Item::get(278, 0, 1);
						 $item7 = Item::get(278, 0, 1);
						 $item8 = Item::get(279, 0, 1);
						 $name1 = $item1->setCustomName("§r§b•=[§a Mũ §eHoppa §b]=•");
						 $name2 = $item2->setCustomName("§r§b•=[§a Áo §eHoppa §b]=•");
						 $name3 = $item3->setCustomName("§r§b•=[§a Quần §eHoppa§b ]=•");
						 $name4 = $item4->setCustomName("§r§b•=[§a Giày §eHoppa§b ]=•");
						 $name5 = $item5->setCustomName("§r§b•=[§a Kiếm §eHoppa§b ]=•");
						 $name6 = $item6->setCustomName("§r§b•=[§a Cúp §cRồng§b ]=•");
 $money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						  if ($money < 1000000){
							  $sender->sendMessage(TF::RED . "Không đủ tiền");
						  }
						  else{
						   $item1->addEnchantment(Enchantment::getEnchantment(0)->setLevel(20));
						    $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(20));
							 $item1->addEnchantment(Enchantment::getEnchantment(5)->setLevel(5));
							 $item1->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item2->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
							  $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(20));
							 $item2->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item2->addEnchantment(Enchantment::getEnchantment(17)->setLevel(50));
							 $item3->addEnchantment(Enchantment::getEnchantment(0)->setLevel(20));
	$item3->addEnchantment(Enchantment::getEnchantment(2)->setLevel(10));
							 $item3->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item3->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(0)->setLevel(10));
							 $item4->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item4->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item5->addEnchantment(Enchantment::getEnchantment(9)->setLevel(20));
							 $item5->addEnchantment(Enchantment::getEnchantment(12)->setLevel(4));
							 $item5->addEnchantment(Enchantment::getEnchantment(17)->setLevel(999999998));
							 $item5->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item6->addEnchantment(Enchantment::getEnchantment(15)->setLevel(9));
							 $item6->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							   $sender->getInventory()->addItem($item1);
							 $sender->getInventory()->addItem($item2);
							 $sender->getInventory()->addItem($item3);
							 $sender->getInventory()->addItem($item4);
							 $sender->getInventory()->addItem($item5);
							 //$sender->getInventory()->addItem($item6);
							 $item1->setCustomName($name1);
							 $item2->setCustomName($name2);
							 $item3->setCustomName($name3);
							 $item4->setCustomName($name4);
							 $item5->setCustomName($name5);
							 $item6->setCustomName($name6);
						  $sender->sendMessage($this->tag. "§a Mua Thành Công KIT");
						  
						  
							  $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 1000000);
							  }
						 return true;
					  break;
					  case "3":
					   $item1 = Item::get(310, 0, 1);
						 $item2 = Item::get(311, 0, 1);
						 $item3 = Item::get(312, 0, 1);
						 $item4 = Item::get(313, 0, 1);
						 $item5 = Item::get(276, 0, 1);
						 $item6 = Item::get(278, 0, 1);
						 $item7 = Item::get(278, 0, 1);
						 $item8 = Item::get(279, 0, 1);
						 $name1 = $item1->setCustomName("§l§b•=[§a Mũ §bĐức Vua §b]=•");
						 $name2 = $item2->setCustomName("§l§b•=[§a Áo §bĐức Vua §b]=•");
						 $name3 = $item3->setCustomName("§l§b•=[§a Quần §bĐức Vua§b ]=•");
						 $name4 = $item4->setCustomName("§l§b•=[§a Giày §bĐức Vua§b ]=•");
						 $name5 = $item5->setCustomName("§l§b•=[§a Kiếm §bĐức Vua§b ]=•");
						 $name6 = $item6->setCustomName("§l§b•=[§a Cúp §cRồng§b ]=•");
 $money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						  if ($money < 2500000){
							  $sender->sendMessage(TF::RED . "Không đủ tiền");
						  }
						  else{
						   $item1->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
						    $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(50));
							 $item1->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item1->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item2->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
							  $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(30));
							 $item2->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item2->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item3->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
	$item3->addEnchantment(Enchantment::getEnchantment(2)->setLevel(10));
							 $item3->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item3->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item4->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item5->addEnchantment(Enchantment::getEnchantment(9)->setLevel(50));
							 $item5->addEnchantment(Enchantment::getEnchantment(12)->setLevel(5));
							 $item5->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item6->addEnchantment(Enchantment::getEnchantment(15)->setLevel(9));
							 $item6->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							   $sender->getInventory()->addItem($item1);
							 $sender->getInventory()->addItem($item2);
							 $sender->getInventory()->addItem($item3);
							 $sender->getInventory()->addItem($item4);
							 $sender->getInventory()->addItem($item5);
							 //$sender->getInventory()->addItem($item6);
							 $item1->setCustomName($name1);
							 $item2->setCustomName($name2);
							 $item3->setCustomName($name3);
							 $item4->setCustomName($name4);
							 $item5->setCustomName($name5);
							 $item6->setCustomName($name6);
						  $sender->sendMessage($this->tag. "§a Mua Thành Công KIT");
						  
						  
							  $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 2500000);
							  }
							  return true;
							  break;
							  	  case "4":
					   $item1 = Item::get(310, 0, 1);
						 $item2 = Item::get(311, 0, 1);
						 $item3 = Item::get(312, 0, 1);
						 $item4 = Item::get(313, 0, 1);
						 $item5 = Item::get(276, 0, 1);
						 $item6 = Item::get(278, 0, 1);
						 $item7 = Item::get(278, 0, 1);
						 $item8 = Item::get(279, 0, 1);
						 $name1 = $item1->setCustomName("§r§b•=[§a Mũ §eMèo Thần Tài §b]=•");
						 $name2 = $item2->setCustomName("§r§b•=[§a Áo §eMèo Thần Tài §b]=•");
						 $name3 = $item3->setCustomName("§r§b•=[§a Quần §eMèo Thần Tài§b ]=•");
						 $name4 = $item4->setCustomName("§r§b•=[§a Giày §eMèo Thần Tài§b ]=•");
						 $name5 = $item5->setCustomName("§r§b•=[§a Kiếm §eMèo Thần Tài§b ]=•");
						 $name6 = $item6->setCustomName("§r§b•=[§a Cúp §cMèo Thần Tài§b ]=•");
 $money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						  if ($money < 5000000){
							  $sender->sendMessage(TF::RED . "Không đủ tiền");
						  }
						  else{
								   $item1->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
						    $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(50));
							 $item1->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item1->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item2->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
							  $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(30));
							 $item2->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item2->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item3->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
	$item3->addEnchantment(Enchantment::getEnchantment(2)->setLevel(10));
							 $item3->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item3->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item4->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item5->addEnchantment(Enchantment::getEnchantment(9)->setLevel(50));
							 $item5->addEnchantment(Enchantment::getEnchantment(12)->setLevel(5));
							 $item5->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item6->addEnchantment(Enchantment::getEnchantment(15)->setLevel(9));
							 $item6->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							   $sender->getInventory()->addItem($item1);
							 $sender->getInventory()->addItem($item2);
							 $sender->getInventory()->addItem($item3);
							 $sender->getInventory()->addItem($item4);
							 $sender->getInventory()->addItem($item5);
							 //$sender->getInventory()->addItem($item6);
							 $item1->setCustomName($name1);
							 $item2->setCustomName($name2);
							 $item3->setCustomName($name3);
							 $item4->setCustomName($name4);
							 $item5->setCustomName($name5);
							 $item6->setCustomName($name6);
						  $sender->sendMessage($this->tag. "§a Mua Thành Công KIT");
						  
						  
							  $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 5000000);
							  }
						 return true;
						}
				}
		}
}
}
}