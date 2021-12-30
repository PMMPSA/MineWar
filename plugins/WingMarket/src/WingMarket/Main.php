<?php  

namespace WingMarket;

use pocketmine\event\Listener;
use pocketmine\{Server, Player};
use pocketmine\plugin\PluginBase;
use pocketmine\command\{Command, CommandSender, ConsoleCommandSender};

 
class Main extends PluginBase implements Listener {  
  	
  
public function onEnable() {
$this->coin = $this->getServer()->getPluginManager()->getPlugin("PointAPI");
}
  
public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) { 
if($cmd->getName() == "chocanh") {
if(!isset($args[0]) or empty($args[0])) {
$sender->sendMessage("§e§l♦§aDanh Sách Chợ Cánh Trong §b§lMINEWAR§e♦\n§a§l➺Cánh Bong Bóng §c- §d150 Kim Cương-§a[§b§lcanhbongbong Hoặc cbb§a]\n§a§l➺Cánh Phẫn Nộ §c- §d200 Kim Cương - §a[§bcanhphanno Hoặc cpn§a]");
}

if(isset($args[0])) {
switch(strtolower($args[0])) {
case "canhphanno":
case "cpn":
if($this->coin->myPoint($sender->getName()) > 200) {
$this->coin->reducePoint($sender->getName(), 200);
$this->getServer()->broadcastMessage("§l§b".$sender->getName()." §a§l➺§6Đã Mua Cánh Phẫn Nộ");
$sender->sendMessage("§a§l➺§bMua Cánh Phẫn Nộ Thành Công");
$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." wingangry.command");
}else{
$sender->sendMessage("§c§lKhông Đủ Kim Cương");
}
break;

case "canhbongbong":
case "cbb":
if($this->coin->myPoint($sender->getName()) > 150) {
$this->coin->reducePoint($sender->getName(), 150);
$this->getServer()->broadcastMessage("§l§b".$sender->getName()." §a§l➺§6Đã Mua Cánh Bong Bóng");
$sender->sendMessage("§a§l➺§bMua Cánh Bong Bóng Thành Công");
$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()." wingbubble.command");
}else{
$sender->sendMessage("§c§lKhông Đủ Kim Cương");
}
break;

case "tbb":
case "khoikia":
if($this->coin->myPoint($sender->getName()) > 150) {
$this->coin->reducePoint($sender->getName(), 150);
$this->getServer()->broadcastMessage("§l§b".$sender->getName()." §a§l➺§6Đã Mua Cánh Bong Bóng");
$sender->sendMessage("§a§l➺§bMua Cánh Bong Bóng Thành Công");
$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()."kit.vip ");
$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()."healer.heal ");
$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()."autofix.cmd ");
$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()."effect.buy ");
$this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm ".$sender->getName()."kickk.buy ");
}else{
$sender->sendMessage("§c§lKhông Đủ Kim Cương");
}
break;

default:
$sender->sendMessage("§e§l♦§aDanh Sách Chợ Cánh Trong §b§lMINEWAR§e♦\n§a§l➺Cánh Bong Bóng §c- §d150 Kim Cương-§a[§b§lcanhbongbong Hoặc cbb§a]\n§a§l➺Cánh Phẫn Nộ §c- §d200 Kim Cương - §a[§bcanhphanno Hoặc cpn§a]");
break;
                }
            }
        }
return true;        
    }
}      