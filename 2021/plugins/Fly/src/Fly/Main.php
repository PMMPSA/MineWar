<?php

namespace Fly;

use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\entity\EntityLevelChangeEvent;
use pocketmine\command\{Command, CommandSender};

class Main extends PluginBase implements Listener {

public function onEnable() {
$this->getServer()->getPluginManager()->registerEvents($this, $this);
}


public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
if (strtolower($cmd->getName()) === "fly")
if (empty($args)) {
if (!$sender->hasPermission("fly.command")) {
$sender->sendMessage("§cYou do not have permission to use this command");
return true;
}else{
if (!$sender instanceof Player) {
$sender->sendMessage("Vui Lòng Sử Dụng Lệnh Trong Trò Chơi");
return true;
}

if ($sender->getAllowFlight()) {
$sender->setAllowFlight(false);
$sender->sendMessage("§aMINE§bWAR§a•§aSKYBLOCK Đã Tắt Fly");
return true;
}else{
$sender->setAllowFlight(true);
$sender->sendMessage("§aMINE§bWAR§a•§aSKYBLOCK Đã Bật Fly");
return true;
            }
        }
    }
return false;
}
    
public function onLevelChange(EntityLevelChangeEvent $ev) {
$ev->getEntity()->setFlying(false);
$ev->getEntity()->setAllowFlight(false);
    }
}