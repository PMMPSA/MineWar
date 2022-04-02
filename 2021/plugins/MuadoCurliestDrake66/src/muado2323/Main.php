<?php

namespace muado2323;

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
	public $tag = "§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖";
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->eco = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
		$this->getLogger()->info(TF::GREEN . "§d§l====================\n§l§eＭＵＡＤＯ§6 BY§b CurPlayzz \n§d§l====================");
	}
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args): bool{
		if ($cmd->getName() == "muado"){
      $sender->sendMessage("§d§l-=-=-=-=-=-=§eDanh Sách Đồ Trong MW§d=-=-=-=-=-=-");
      $sender->sendMessage("§d§l[§bCú pháp: kiemmw§d] §aKiếm §cMineWar:§6 10.000.000 Xu");
      $sender->sendMessage("§d§l[§bCú pháp: nonmw§d] §aNón §eMineWar:§6 10.000.000 XU");
      $sender->sendMessage("§d§l[§bCú pháp: aomw§d] §aGiáp §bMineWar:§6 10.000.000 XU");
      $sender->sendMessage("§d§l[§bCú pháp: quanmw§d] §aQuần §bMineWar:§6 10.000.000 XU");
      $sender->sendMessage("§d§l[§bCú pháp: giaymw§d] §aGiày §bMineWar:§6 10.000.000 XU");
      $sender->sendMessage("§d§l[§bCú pháp: cupthansau§d] §aCúp Thần Sầu:§6 700.000 XU");
      $sender->sendMessage("§d§l[§bCú pháp: riutiachop§d] §aRìu Tia Chớp:§6 450.000 XU");
      $sender->sendMessage("§d§l[§bCú pháp: xengsucmanh§d] §aXẻng Sức Mạnh:§6 400.000 XU");
      $sender->sendMessage("§d§l[§bCú pháp: gaybaton§d] §aGậy Baton:§6 700.000 XU");
      $sender->sendMessage("§d§l[§bCú pháp: cupvietnam§d] §aCúp Việt Nam:§6 800.000 XU");
      $sender->sendMessage("§d§l[§bCú pháp: cungsieulua§d] §aCung Siêu Lửa:§6 800.000 XU");
      $sender->sendMessage("§d§l/muado [cú pháp] §a để mua");
      $sender->sendMessage("§d-=-=-=-=-=-=-=-=-=-=-=-=-=-=-");
      }

if(isset($args[0])) {
switch(strtolower($args[0])) {
				case "kiemmw":
				$item1 = Item::get(276, 0, 1);
$name1 = $item1->setCustomName(" §c§l❖§f kiếm§c MineWar §c❖");
$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender->getName());
if($money < 10000000) {
$sender->sendMessage(TF::RED . "Bạn Không Đủ Tiền Để Mua");
}else{
$item1->addEnchantment(Enchantment::getEnchantment(16)->setLevel(100));
$item1->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
$item1->addEnchantment(Enchantment::getEnchantment(18)->setLevel(100));
$item1->addEnchantment(Enchantment::getEnchantment(20)->setLevel(100));
$item1->addEnchantment(Enchantment::getEnchantment(21)->setLevel(100));
$item1->addEnchantment(Enchantment::getEnchantment(34)->setLevel(100));
$item1->addEnchantment(Enchantment::getEnchantment(19)->setLevel(100));
$item1->setLore(array(" §c§l❖§f kiếm§c MineWar §c❖ §f: §b200 §4Vụ Nổ Từ Thời xưa§e$\n§fSau 200 trận chiến tranh thanh kiếm được sinh ra\n§fSắc Bén:§b 100\n§fSmite:§b 100\n§fĐốt Cháy:§b 100\n§fSắt Bén:§b 100"));
$item1->setCustomName($name1);
$sender->getInventory()->addItem($item1);
$sender->sendMessage($this->tag. "§a Mua Thành Công");
$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 10000000);
}
break;
					  case "nonmw":
					   $item2 = Item::get(310, 0, 1);
$name2 = $item2->setCustomName(" §c§l❖§f Nón§c MineWar §c❖");
$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender->getName());
if($money < 10000000) {
$sender->sendMessage(TF::RED . "Bạn Không Đủ Tiền Để Mua");
}else{
$item2->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
$item2->addEnchantment(Enchantment::getEnchantment(5)->setLevel(100));
$item2->addEnchantment(Enchantment::getEnchantment(7)->setLevel(100));
$item2->addEnchantment(Enchantment::getEnchantment(70)->setLevel(1));
$item2->addEnchantment(Enchantment::getEnchantment(34)->setLevel(100));
$item2->addEnchantment(Enchantment::getEnchantment(6)->setLevel(100));
$item2->setLore(array(" §c§l❖§f Nón§c MineWar §c❖ §f: §b200 §4Vụ Nổ Từ Thời xưa§e$\n§fSau 200 trận chiến tranh thanh kiếm được sinh ra"));
$item2->setCustomName($name2);
$sender->getInventory()->addItem($item2);
$sender->sendMessage($this->tag. "§a Mua Thành Công");
$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 10000000);
}
break;
					  case "aomw":
								   $item3 = Item::get(307, 0, 1);
$name3 = $item3->setCustomName(" §c§l❖§f Áo§c MineWar §c❖");
$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender->getName());
if($money < 10000000) {
$sender->sendMessage(TF::RED . "Bạn Không Đủ Tiền Để Mua");
}else{
$item3->addEnchantment(Enchantment::getEnchantment(1)->setLevel(100));
$item3->addEnchantment(Enchantment::getEnchantment(34)->setLevel(100));
$item3->addEnchantment(Enchantment::getEnchantment(7)->setLevel(100));
$item3->addEnchantment(Enchantment::getEnchantment(70)->setLevel(1));
$item3->setLore(array(" §c§l❖§f Áo§c MineWar §c❖ §f: §b200 §4Vụ Nổ Từ Thời xưa§e$\n§fSau 200 trận chiến tranh thanh kiếm được sinh ra"));
$item3->setCustomName($name3);
$sender->getInventory()->addItem($item3);
$sender->sendMessage($this->tag. "§a Mua Thành Công");
$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 10000000);
}
break;
					  case "quanmw":
								   $item4 = Item::get(312, 0, 1);
$name4 = $item4->setCustomName(" §c§l❖§f Quần§c MineWar §c❖");
$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender->getName());
if($money < 10000000) {
$sender->sendMessage(TF::RED . "Bạn Không Đủ Tiền Để Mua");
}else{
$item4->addEnchantment(Enchantment::getEnchantment(3)->setLevel(100));
$item4->addEnchantment(Enchantment::getEnchantment(34)->setLevel(100));
$item4->addEnchantment(Enchantment::getEnchantment(7)->setLevel(100));
$item4->addEnchantment(Enchantment::getEnchantment(70)->setLevel(1));
$item4->setLore(array(" §c§l❖§f Quần§c MineWar §c❖ §f: §b200 §4Vụ Nổ Từ Thời xưa§e$\n§fSau 200 trận chiến tranh thanh kiếm được sinh ra"));
$item4->setCustomName($name4);
$sender->getInventory()->addItem($item4);
$sender->sendMessage($this->tag. "§a Mua Thành Công");
$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 10000000);
}
break;
					  case "giaymw":
												   $item5 = Item::get(313, 0, 1);
$name5 = $item5->setCustomName(" §c§l❖§f Giày§c MineWar §c❖");
$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender->getName());
if($money < 10000000) {
$sender->sendMessage(TF::RED . "Bạn Không Đủ Tiền Để Mua");
}else{
$item5->addEnchantment(Enchantment::getEnchantment(34)->setLevel(100));
$item5->addEnchantment(Enchantment::getEnchantment(70)->setLevel(100));
$item5->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
$item5->addEnchantment(Enchantment::getEnchantment(7)->setLevel(100));
$item5->addEnchantment(Enchantment::getEnchantment(9)->setLevel(100));
$item5->addEnchantment(Enchantment::getEnchantment(2)->setLevel(1));
$item5->setLore(array(" §c§l❖§f Giày§c MineWar §c❖ §f: §b200 §4Vụ Nổ Từ Thời xưa§e$\n§fSau 200 trận chiến tranh thanh kiếm được sinh ra"));
$item5->setCustomName($name5);
$sender->getInventory()->addItem($item5);
$sender->sendMessage($this->tag. "§a Mua Thành Công");
$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 10000000);
}
break;
					  case "cupthansau":
					   $item1 = Item::get(310, 0, 1);
						 $item2 = Item::get(311, 0, 1);
						 $item3 = Item::get(32, 0, 1);
						 $item4 = Item::get(313, 0, 1);
						 $item5 = Item::get(276, 0, 1);
						 $item6 = Item::get(278, 0, 1);
						 $item7 = Item::get(278, 0, 1);
						 $item8 = Item::get(279, 0, 1);
						 $name1 = $item1->setCustomName("§l§b•=[§a Mũ §bThe KING §b]=•");
						 $name2 = $item2->setCustomName("§l§b•=[§a Áo §bThe KING §b]=•");
						 $name3 = $item3->setCustomName("§l§b•=[§a Quần §bThe KING§b ]=•");
						 $name4 = $item4->setCustomName("§l§b•=[§a Giày §bThe KING§b ]=•");
						 $name5 = $item5->setCustomName("§l§b•=[§a⚡ Kiếm §bSét§b ⚡]=•");
						 $name6 = $item6->setCustomName("§l§b•=[§a Cúp §4Thần Sầu§b ]=•");
 $money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						  if ($money < 700000){
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
							 $item5->addEnchantment(Enchantment::getEnchantment(2)->setLevel(20));
							 $item5->addEnchantment(Enchantment::getEnchantment(26)->setLevel(7));
							 $item5->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item6->addEnchantment(Enchantment::getEnchantment(15)->setLevel(50));
							 $item6->addEnchantment(Enchantment::getEnchantment(17)->setLevel(25));
							 $item6->addEnchantment(Enchantment::getEnchantment(18)->setLevel(35));
							$item6->addEnchantment(Enchantment::getEnchantment(26)->setLevel(20));
							   //$sender->getInventory()->addItem($item1);
							 //$sender->getInventory()->addItem($item2);
							 //$sender->getInventory()->addItem($item3);
							 //$sender->getInventory()->addItem($item4);
							 //$sender->getInventory()->addItem($item5);
							 $sender->getInventory()->addItem($item6);
							 //$item1->setCustomName($name1);
							 //$item2->setCustomName($name2);
							 //$item3->setCustomName($name3);
							 //$item4->setCustomName($name4);
							 //$item5->setCustomName($name5);
							 $item6->setCustomName($name6);
						  $sender->sendMessage($this->tag. "§a Mua Thành Công");
						  
						  
							  $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 700000);
							  }
							  return true;
							break;
					  case "riutiachop":
					   $item1 = Item::get(310, 0, 1);
						 $item2 = Item::get(311, 0, 1);
						 $item3 = Item::get(32, 0, 1);
						 $item4 = Item::get(313, 0, 1);
						 $item5 = Item::get(276, 0, 1);
						 $item6 = Item::get(278, 0, 1);
						 $item7 = Item::get(278, 0, 1);
						 $item8 = Item::get(279, 0, 1);
						 $name1 = $item1->setCustomName("§l§b•=[§a Mũ §bThe KING §b]=•");
						 $name2 = $item2->setCustomName("§l§b•=[§a Áo §bThe KING §b]=•");
						 $name3 = $item3->setCustomName("§l§b•=[§a Quần §bThe KING§b ]=•");
						 $name4 = $item4->setCustomName("§l§b•=[§a Giày §bThe KING§b ]=•");
						 $name5 = $item5->setCustomName("§l§b•=[§a⚡ Kiếm §bSét§b ⚡]=•");
						 $name8 = $item8->setCustomName("§l§b•=[§a Rìu §4Tia Chớp§b ]=•");
 $money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						  if ($money < 450000){
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
							 $item5->addEnchantment(Enchantment::getEnchantment(2)->setLevel(20));
							 $item5->addEnchantment(Enchantment::getEnchantment(26)->setLevel(7));
							 $item5->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item8->addEnchantment(Enchantment::getEnchantment(15)->setLevel(50));
							 $item8->addEnchantment(Enchantment::getEnchantment(17)->setLevel(25));
							 $item8->addEnchantment(Enchantment::getEnchantment(18)->setLevel(35));
							$item8->addEnchantment(Enchantment::getEnchantment(26)->setLevel(20));
							   //$sender->getInventory()->addItem($item1);
							 //$sender->getInventory()->addItem($item2);
							 //$sender->getInventory()->addItem($item3);
							 //$sender->getInventory()->addItem($item4);
							 //$sender->getInventory()->addItem($item5);
							 $sender->getInventory()->addItem($item8);
							 //$item1->setCustomName($name1);
							 //$item2->setCustomName($name2);
							 //$item3->setCustomName($name3);
							 //$item4->setCustomName($name4);
							 //$item5->setCustomName($name5);
							 $item8->setCustomName($name8);
						  $sender->sendMessage($this->tag. "§a Mua Thành Công");
						  
						  
							  $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 450000);
							  }
							  return true;
							break;
					  case "xengsucmanh":
					   $item1 = Item::get(310, 0, 1);
						 $item2 = Item::get(311, 0, 1);
						 $item3 = Item::get(32, 0, 1);
						 $item4 = Item::get(313, 0, 1);
						 $item5 = Item::get(276, 0, 1);
						 $item6 = Item::get(277, 0, 1);
						 $item7 = Item::get(278, 0, 1);
						 $item8 = Item::get(279, 0, 1);
						 $name1 = $item1->setCustomName("§l§b•=[§a Mũ §bThe KING §b]=•");
						 $name2 = $item2->setCustomName("§l§b•=[§a Áo §bThe KING §b]=•");
						 $name3 = $item3->setCustomName("§l§b•=[§a Quần §bThe KING§b ]=•");
						 $name4 = $item4->setCustomName("§l§b•=[§a Giày §bThe KING§b ]=•");
						 $name5 = $item5->setCustomName("§l§b•=[§a⚡ Kiếm §bSét§b ⚡]=•");
						 $name6 = $item6->setCustomName("§l§b•=[§a Xẻng §4Sức Mạnh§b ]=•");
 $money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						  if ($money < 400000){
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
							 $item5->addEnchantment(Enchantment::getEnchantment(2)->setLevel(20));
							 $item5->addEnchantment(Enchantment::getEnchantment(26)->setLevel(7));
							 $item5->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item6->addEnchantment(Enchantment::getEnchantment(15)->setLevel(50));
							 $item6->addEnchantment(Enchantment::getEnchantment(17)->setLevel(25));
							 $item6->addEnchantment(Enchantment::getEnchantment(18)->setLevel(35));
							$item6->addEnchantment(Enchantment::getEnchantment(26)->setLevel(20));
							   //$sender->getInventory()->addItem($item1);
							 //$sender->getInventory()->addItem($item2);
							 //$sender->getInventory()->addItem($item3);
							 //$sender->getInventory()->addItem($item4);
							 //$sender->getInventory()->addItem($item5);
							 $sender->getInventory()->addItem($item6);
							 //$item1->setCustomName($name1);
							 //$item2->setCustomName($name2);
							 //$item3->setCustomName($name3);
							 //$item4->setCustomName($name4);
							 //$item5->setCustomName($name5);
							 $item6->setCustomName($name6);
						  $sender->sendMessage($this->tag. "§a Mua Thành Công");
						  
						  
							  $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 400000);
							  }
							  return true;
							break;
					  case "cupvietnam":
					   $item1 = Item::get(310, 0, 1);
						 $item2 = Item::get(311, 0, 1);
						 $item3 = Item::get(32, 0, 1);
						 $item4 = Item::get(313, 0, 1);
						 $item5 = Item::get(276, 0, 1);
						 $item6 = Item::get(278, 0, 1);
						 $item7 = Item::get(278, 0, 1);
						 $item8 = Item::get(279, 0, 1);
						 $name1 = $item1->setCustomName("§l§b•=[§a Mũ §bThe KING §b]=•");
						 $name2 = $item2->setCustomName("§l§b•=[§a Áo §bThe KING §b]=•");
						 $name3 = $item3->setCustomName("§l§b•=[§a Quần §bThe KING§b ]=•");
						 $name4 = $item4->setCustomName("§l§b•=[§a Giày §bThe KING§b ]=•");
						 $name5 = $item5->setCustomName("§l§b•=[§a⚡ Kiếm §bSét§b ⚡]=•");
						 $name6 = $item6->setCustomName("§l§b•=[§a Cúp §6Việt Nam§b ]=•");
 $money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						  if ($money < 800000){
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
							 $item5->addEnchantment(Enchantment::getEnchantment(2)->setLevel(20));
							 $item5->addEnchantment(Enchantment::getEnchantment(26)->setLevel(7));
							 $item5->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item6->addEnchantment(Enchantment::getEnchantment(15)->setLevel(100));
							 $item6->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item6->addEnchantment(Enchantment::getEnchantment(18)->setLevel(100));
							$item6->addEnchantment(Enchantment::getEnchantment(26)->setLevel(100));
							   //$sender->getInventory()->addItem($item1);
							 //$sender->getInventory()->addItem($item2);
							 //$sender->getInventory()->addItem($item3);
							 //$sender->getInventory()->addItem($item4);
							 //$sender->getInventory()->addItem($item5);
							 $sender->getInventory()->addItem($item6);
							 //$item1->setCustomName($name1);
							 //$item2->setCustomName($name2);
							 //$item3->setCustomName($name3);
							 //$item4->setCustomName($name4);
							 //$item5->setCustomName($name5);
							 $item6->setCustomName($name6);
						  $sender->sendMessage($this->tag. "§a Mua Thành Công");
						  
						  
							  $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 800000);
							  }
							  return true;
							break;
					  case "gaybaton":
					   $item1 = Item::get(310, 0, 1);
						 $item2 = Item::get(311, 0, 1);
						 $item3 = Item::get(32, 0, 1);
						 $item4 = Item::get(313, 0, 1);
						 $item5 = Item::get(280, 0, 1);
						 $item6 = Item::get(278, 0, 1);
						 $item7 = Item::get(278, 0, 1);
						 $item8 = Item::get(279, 0, 1);
						 $name1 = $item1->setCustomName("§l§b•=[§a Mũ §bThe KING §b]=•");
						 $name2 = $item2->setCustomName("§l§b•=[§a Áo §bThe KING §b]=•");
						 $name3 = $item3->setCustomName("§l§b•=[§a Quần §bThe KING§b ]=•");
						 $name4 = $item4->setCustomName("§l§b•=[§a Giày §bThe KING§b ]=•");
						 $name5 = $item5->setCustomName("§l§b•=[§5 Gậy §5Baton§b ]=•");
						 $name6 = $item6->setCustomName("§l§b•=[§a Cúp §4Thần Sầu§b ]=•");
 $money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						  if ($money < 700000){
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
							 $item5->addEnchantment(Enchantment::getEnchantment(2)->setLevel(50));
							 $item5->addEnchantment(Enchantment::getEnchantment(26)->setLevel(50));
							 $item5->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item6->addEnchantment(Enchantment::getEnchantment(15)->setLevel(50));
							 $item6->addEnchantment(Enchantment::getEnchantment(17)->setLevel(25));
							 $item6->addEnchantment(Enchantment::getEnchantment(18)->setLevel(35));
							$item6->addEnchantment(Enchantment::getEnchantment(26)->setLevel(20));
							   //$sender->getInventory()->addItem($item1);
							 //$sender->getInventory()->addItem($item2);
							 //$sender->getInventory()->addItem($item3);
							 //$sender->getInventory()->addItem($item4);
							 $sender->getInventory()->addItem($item5);
							 //$sender->getInventory()->addItem($item6);
							 //$item1->setCustomName($name1);
							 //$item2->setCustomName($name2);
							 //$item3->setCustomName($name3);
							 //$item4->setCustomName($name4);
							 $item5->setCustomName($name5);
							 //$item6->setCustomName($name6);
						  $sender->sendMessage($this->tag. "§a Mua Thành Công");
						  
						  
							  $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 700000);
							  }
							  return true;
							break;
					  case "cungsieulua":
					   $item1 = Item::get(310, 0, 1);
						 $item2 = Item::get(311, 0, 1);
						 $item3 = Item::get(32, 0, 1);
						 $item4 = Item::get(313, 0, 1);
						 $item5 = Item::get(280, 0, 1);
						 $item6 = Item::get(278, 0, 1);
						 $item7 = Item::get(278, 0, 1);
						 $item8 = Item::get(261, 0, 1);
						 $name1 = $item1->setCustomName("§l§b•=[§a Mũ §bThe KING §b]=•");
						 $name2 = $item2->setCustomName("§l§b•=[§a Áo §bThe KING §b]=•");
						 $name3 = $item3->setCustomName("§l§b•=[§a Quần §bThe KING§b ]=•");
						 $name4 = $item4->setCustomName("§l§b•=[§a Giày §bThe KING§b ]=•");
						 $name5 = $item5->setCustomName("§l§b•=[§5 Gậy §5Baton§b ]=•");
						 $name8 = $item8->setCustomName("§l§b•=[§a Cung §4Siêu Lửa§b ]=•");
 $money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						  if ($money < 800000){
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
							 $item5->addEnchantment(Enchantment::getEnchantment(2)->setLevel(50));
							 $item5->addEnchantment(Enchantment::getEnchantment(26)->setLevel(50));
							 $item5->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item8->addEnchantment(Enchantment::getEnchantment(22)->setLevel(1));
							 $item8->addEnchantment(Enchantment::getEnchantment(26)->setLevel(10));
							 $item8->addEnchantment(Enchantment::getEnchantment(19)->setLevel(30));
							$item8->addEnchantment(Enchantment::getEnchantment(20)->setLevel(20));
							$item8->addEnchantment(Enchantment::getEnchantment(21)->setLevel(15));
							$item8->addEnchantment(Enchantment::getEnchantment(17)->setLevel(75));
							   //$sender->getInventory()->addItem($item1);
							 //$sender->getInventory()->addItem($item2);
							 //$sender->getInventory()->addItem($item3);
							 //$sender->getInventory()->addItem($item4);
							 $sender->getInventory()->addItem($item8);
							 //$sender->getInventory()->addItem($item6);
							 //$item1->setCustomName($name1);
							 //$item2->setCustomName($name2);
							 //$item3->setCustomName($name3);
							 //$item4->setCustomName($name4);
							 $item8->setCustomName($name8);
							 //$item6->setCustomName($name6);
						  $sender->sendMessage($this->tag. "§a Mua Thành Công");
						  
						  
							  $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 800000);
							  }
							  return true;
							  default:
							     $sender->sendMessage("§d§l-=-=-=-=-=-=§eDanh Sách Đồ Trong MW§d=-=-=-=-=-=-");
      $sender->sendMessage("§d§l[§bCú pháp: kiemmw§d] §aKiếm §cMineWar:§6 10.000.000 Xu");
      $sender->sendMessage("§d§l[§bCú pháp: nonmw§d] §aNón §eMineWar:§6 10.000.000 XU");
      $sender->sendMessage("§d§l[§bCú pháp: aomw§d] §aGiáp §bMineWar:§6 10.000.000 XU");
      $sender->sendMessage("§d§l[§bCú pháp: quanmw§d] §aQuần §bMineWar:§6 10.000.000 XU");
      $sender->sendMessage("§d§l[§bCú pháp: giaymw§d] §aGiày §bMineWar:§6 10.000.000 XU");
      $sender->sendMessage("§d§l[§bCú pháp: cupthansau§d] §aCúp Thần Sầu:§6 700.000 XU");
      $sender->sendMessage("§d§l[§bCú pháp: riutiachop§d] §aRìu Tia Chớp:§6 450.000 XU");
      $sender->sendMessage("§d§l[§bCú pháp: xengsucmanh§d] §aXẻng Sức Mạnh:§6 400.000 XU");
      $sender->sendMessage("§d§l[§bCú pháp: gaybaton§d] §aGậy Baton:§6 700.000 XU");
      $sender->sendMessage("§d§l[§bCú pháp: cupvietnam§d] §aCúp Việt Nam:§6 800.000 XU");
      $sender->sendMessage("§d§l[§bCú pháp: cungsieulua§d] §aCung Siêu Lửa:§6 800.000 XU");
      $sender->sendMessage("§d§l/muado [cú pháp] §a để mua");
      $sender->sendMessage("§d-=-=-=-=-=-=-=-=-=-=-=-=-=-=-");
	  break;
						       }
}
return true;        
    }
}    