<?php

namespace huongdan;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\{Command, CommandSender, ConsoleCommandSender};
use pocketmine\Player;

class Main extends PluginBase implements Listener{
    public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
		if ($cmd->getName() == "huongdan"){
				$sender->sendMessage("§a§l♦ §6§lHệ Thống Hướng Dẫn Của §e§lWOMMC§a♦");
				$sender->sendMessage("§c§l• §aCác Lệnh Cơ Bản:");
				$sender->sendMessage("§3-§a/chodo§c:§eMở Giao Diện Shop Của Server");
				$sender->sendMessage("§3-§a/muavip§c:§eMở Giao Diện Mua vip");
				$sender->sendMessage("§3-§a/sb§c:§eMở Giao Diện Skyblock");
				$sender->sendMessage("§3-§a/muaec§c:§eMở Giao Diện Mua Enchant Với 1000 Xu/1 Cấp");
				$sender->sendMessage("§3-§a/danhhieu§c:§eMở Giao Diện Mua Danh Hiệu");
				$sender->sendMessage("§3-§a/muaskill§c:§eMở Giao Diện Mua Skill");
				}
    }
}
