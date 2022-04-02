<?php  

namespace mayfarm;

use pocketmine\event\Listener;
use pocketmine\{Server, Player};
use pocketmine\item\Item;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as TF;
use pocketmine\command\{Command, CommandSender, ConsoleCommandSender};

 
class Main extends PluginBase implements Listener {  
  	
  
public function onEnable() {
$this->coin = $this->getServer()->getPluginManager()->getPlugin("PointAPI");
$this->money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
}
  
public function onCommand(CommandSender $sender, Command $cmd, $label, array $args): bool{ 
if($cmd->getName() == "muamayfarm") {
if(!isset($args[0]) or empty($args[0])) {
$sender->sendMessage("§e§l♦§aDanh Sách Máy Farm Trong §b§lWOAMMC§e♦\n§a§l Máy Farm Normal §c- §d1.000.000-§a[§b§lnormal Hoặc nm§a]\n§a§l Máy Farm VIP §c- §d20 Kim Cương - §a[§bvip§a]");
}

if(isset($args[0])) {
switch(strtolower($args[0])) {
case "normal":
case "nm":
$item1 = Item::get(246, 0, 1);
$name1 = $item1->setCustomName("§c§l❖§a Máy Farm Thế Hệ 4.2.2 §c❖");
$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender->getName());
if($money < 1000000) {
$sender->sendMessage(TF::RED . "Bạn Không Đủ Tiền Để Mua");
}else{
	$item1->setCustomName($name1);
$sender->getInventory()->addItem($item1);
$sender->sendMessage("§a Mua Thành Công");
$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 1000000);
}
break;

case "vip":
$item4 = Item::get(137, 0, 1);
$name4 = $item4->setCustomName("§c§l❖§a Máy Farm Thế Hệ 4.2.2 VIP §c❖");
$money = $this->getServer()->getPluginManager()->getPlugin("PointAPI")->myPoint($sender->getName());
if($money < 20) {
$sender->sendMessage(TF::RED . "Bạn Không Đủ Tiền Để Mua");
}else{
	$item4->setCustomName($name4);
$sender->getInventory()->addItem($item4);
$sender->sendMessage("§a Mua Thành Công");
$this->getServer()->getPluginManager()->getPlugin("PointAPI")->reducePoint($sender->getName(), 20);
}
break;

default:
$sender->sendMessage("§e§l♦§aDanh Sách Máy Farm Trong §b§lMINEWAR§e♦\n§a§l Máy Farm Normal §c- §d1.000.000-§a[§b§lnormal Hoặc nm§a]\n§a§l Máy Farm VIP §c- §d20 Kim Cương - §a[§bvip§a]");
break;
                }
            }
        }
return true;        
    }
}      