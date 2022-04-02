<?php

namespace mj;

use pocketmine\utils\Config;
use pocketmine\event\Listener;
use pocketmine\{Player, Server};
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\{PlayerJoinEvent, PlayerQuitEvent, PlayerMoveEvent};
use pocketmine\command\{Command, CommandSender, ConsoleCommandSender};

class Main extends PluginBase implements Listener {

public function onEnable() {
$this->getServer()->getPluginManager()->registerEvents($this, $this);
$this->coin = $this->getServer()->getPluginManager()->getPlugin("PointAPI");
$this->pp = $this->getServer()->getPluginManager()->getPlugin("PurePerms");
@mkdir($this->getDataFolder(), 0744, true);
$this->cfg = new Config($this->getDataFolder()."DanhHieu.yml",Config::YAML);
}

public function onMove(PlayerMoveEvent $ev) {
if($this->cfg->get($ev->getPlayer()->getName()) == 0) {
$ev->getPlayer()->setNameTag("§c§l✡ §dNew§bBi§ae§c✡\n§6§l✦ §aNhân Vật:§b ".$ev->getPlayer()->getDisplayName());
}
if($this->cfg->get($ev->getPlayer()->getName()) == 1) {
$ev->getPlayer()->setNameTag("§e§l❖§cPhượng §bHoàng Lửa§e❖\n§6§l✦ §aNhân Vật:§b ".$ev->getPlayer()->getDisplayName());
}
if($this->cfg->get($ev->getPlayer()->getName()) == 2) {
$ev->getPlayer()->setNameTag("§a§l❖§dMộc§bHoả§a❖\n§6§l✦ §aNhân Vật:§b ".$ev->getPlayer()->getDisplayName());
}
if($this->cfg->get($ev->getPlayer()->getName()) == 3) {
$ev->getPlayer()->setNameTag("§b§lTrùm§eWOAM\n§6§l✦ §aNhân Vật:§b ".$ev->getPlayer()->getDisplayName());
}
if($this->cfg->get($ev->getPlayer()->getName()) == 4) {
$ev->getPlayer()->setNameTag("§c§lYoutube §fNổi Tiếng\n§6§l✦ §aNhân Vật:§b ".$ev->getPlayer()->getDisplayName());

    }
}

public function onJoin(PlayerJoinEvent $ev) {
if(!$this->cfg->exists($ev->getPlayer()->getName())) {
$this->cfg->set($ev->getPlayer()->getName(), 0);
$this->cfg->save();
    }
}

public function onQuit(PlayerQuitEvent $ev) {
$this->cfg->save();
}
	
public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
if(!$sender instanceof Player) {
$sender->sendMessage("Vui Lòng Sử Dụng Lệnh Trong Trò Chơi");;
return true;
}

if ($cmd == "danhhieu") {
if(empty($args[0]) or !isset($args[0]) or $args[0] == "help") {
$sender->sendMessage("§e§l❖ §cHệ Thống Danh Hiệu Của §bVCraft§e ❖\n§f§l⇀ §eDanh Hiệu: §dPhượng Hoàng Lửa §b[§dPHL§b] §640 point\n§f§l⇀ §eDanh Hiệu: §dMộc Hỏa §b[§dMH§b] §6120 point\n§f§l⇀ §eDanh Hiệu: §dTrùm War OF Ambition §b[§dTWOAM§b] §6200 point\n§f§l⇀ §eDanh Hiệu: §dYoutube Nổi Tiếng §b[YNT] §6310 point\n§e§l♦ §b/danhhieu [Tên] §aĐể Mua");
return true;
}

if(!empty($args[0]) or isset($args[0])) {
switch(strtoupper($args[0])) {
case "PHL":
if($this->coin->myPoint($sender->getName()) < 40) {
$sender->sendMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖§bBạn Cần 40 point Để Mua Danh Hiệu Phượng Hoàng Lửa");
}else{
$this->coin->reducePoint($sender->getName(), 40);
$sender->getServer()->broadcastMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖§aNgười Chơi ".$sender->getName()." Đã Mua Thành Công Danh Hiệu §b Phượng Hoàng Lửa");
$sender->sendMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖§aMua Thành Công Danh Hiệu §bPhượng Hoàng Lửa");
$this->cfg->set($sender->getName(), 1);
$this->cfg->save();
}
break;

case "MH":
if($this->coin->myPoint($sender->getName()) < 120) {
$sender->sendMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖§bBạn Cần 120 point Để Mua Danh Hiệu§cMộc Hỏa");
}else{
$this->coin->reducePoint($sender->getName(), 120);
$sender->getServer()->broadcastMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖§bNgười Chơi ".$sender->getName()." Đã Mua Thành Công Danh Hiệu §cMộc Hỏa");
$sender->sendMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖§6Mua Thành Công Danh Hiệu §cMộc Hỏa");
$this->cfg->set($sender->getName(), 2);
$this->cfg->save();
}
break;

case "WOAM":
if($this->coin->myPoint($sender->getName()) < 200) {
$sender->sendMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖§bBạn Cần 200 point Để Mua Danh Hiệu §aTrùm WOAM");
}else{
$this->coin->reducePoint($sender->getName(), 200);
$sender->getServer()->broadcastMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖§6Người Chơi §a".$sender->getName()." §6Đã Mua Thành Công Danh Hiệu Trùm WOAM");
$sender->sendMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖§aBạn đã mua Danh Hiệu Trùm WOAM");
$this->cfg->set($sender->getName(), 3);
$this->cfg->save();
}
break;

case "YNT":
if($this->coin->myPoint($sender->getName()) < 310) {
$sender->sendMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖§6Bạn Cần 310 point Để Mua Danh Hiệu §Youtube Nổi Tiếng");
}else{
$this->coin->reducePoint($sender->getName(), 310);
$sender->getServer()->broadcastMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖§6Người Chơi §a".$sender->getName()." §6Đã Mua Thành Công Danh Hiệu §dYoutube Nổi Tiếng");
$sender->sendMessage("§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖§6Mua Thành Công Danh Hiệu §dYoutube Nổi Tiếng");
$this->cfg->set($sender->getName(), 4);
$this->cfg->save();

	}
					break;
					default:
					    $sender->sendMessage("§e§l❖ §cHệ Thống Danh Hiệu Của §bWOAMMC§e ❖\n§f§l⇀ §eDanh Hiệu: §dPhượng Hoàng Lửa §b[§dPHL§b] §640 point\n§f§l⇀ §eDanh Hiệu: §dMộc Hỏa §b[§dMH§b] §6120 point\n§f§l⇀ §eDanh Hiệu: §dTrùm Sinh Tồn §b[§dTST§b] §6200 point\n§f§l⇀ §eDanh Hiệu: §dYoutube Nổi Tiếng §b[YNT] §6310 point\n§e§l♦ §b/danhhieu [Tên] §aĐể Mua");
					    break;
				}
			}
		}
return true;
	}
}