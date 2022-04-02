<?php

namespace cur1;

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
	public $tag = "§e§l❖§aＭｉｎｅ§6Ｗａｒ§e❖";
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);

		$this->coin = $this->getServer()->getPluginManager()->getPlugin("PointAPI");

		$this->economyAPI = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
		$this->getLogger()->info(TF::GREEN . "§d§l====================\n§l§eDoiCoin§6 BY§b CurliestDrake66 \n§d§l====================");
	}
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args): bool{
		if ($cmd == "muapoint"){
			if(empty($args[0])){
				$sender->sendMessage("§e§l❖§aＭｉｎｅ§6Ｗａｒ§e❖ §l§9•§b /muapoint [số point]§a ||§eGiá trị quy ước như sau: §b400.000 Xu  = 1 Point");
			return true;
		}
		$args[0]  >= 1;
		$mymoney = $this->economyAPI->myMoney($sender);
			if(!is_numeric($args[0])){
				$sender->sendMessage("§e§l❖§aＭｉｎｅ§6Ｗａｒ§e❖§r §l§e " . $args[0] . "§c phải là số");
			return true;
		}
			if($mymoney >= $args[0]*400000){
			$sender->sendMessage("§e§l❖§aＭｉｎｅ§6Ｗａｒ§e❖§r §r§l§a Bạn đã đổi§e " . $args[0] . "§a Point");
			$this->economyAPI->reduceMoney($sender, $args[0]*400000);
			$this->coin->addPoint($sender->getName(), $args[0]);
			}else{
			$sender->sendMessage("§e§l❖§aＭｉｎｅ§6Ｗａｒ§e❖§r §r§c§l Không đủ tiền để đổi Point!");
			}
		return true;
}
}
}