<?php

namespace Muavip;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\command\{Command,CommandSender, CommandExecutor, ConsoleCommandSender};
use pocketmine\item\Item;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\inventory\InventoryTransactionEvent;
use pocketmine\event\inventory\InventoryCloseEvent;
use pocketmine\utils\Config;
use pocketmine\inventory\BaseInventory;

use Muavip\Inventor\Inv;

class Main extends PluginBase implements Listener{

	public $e = [];
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
			$this->point = $this->getServer()->getPluginManager()->getPlugin("PointAPI");
		@mkdir($this->getDataFolder());
		$this->bigorna = new Config($this->getDataFolder()."data.yml", Config::YAML);
		$this->bigorna->save();
	}
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args): bool{
		if(strtolower($cmd->getName()) == "muavip"){
			if(!$sender instanceof Player){
				$sender->sendMessage("§l§a§r§f Sử Dụng Trong Server");
				return;
			}
			$inv = new Inv($sender, 27, "§l§a✠§d Hệ Thống MUA §eVIP§a✠");
			$sender->addWindow($inv);
			$this->e[$sender->getName()] = $inv;
			$this->setMenu($inv, $sender);
		}
	}
	public function setMenu($inv, $p){
		$inv->clearAll();
		$item = Item::get(263, 0, 1);
		$item->setCustomName("§e§l❖§dWarVip§eI");
		$inv->setItem(12, $item);
		$item = Item::get(265, 0, 1);
		$item->setCustomName("§e§l❖§dWarVip§eII");
		$inv->setItem(13, $item);
		$item = Item::get(266, 0, 1);
		$item->setCustomName("§e§l❖§dWarVip§eIII");
		$inv->setItem(14, $item);
		$item = Item::get(264, 0, 1);
		$item->setCustomName("§e§l❖§dWarVip§eIV");
		$inv->setItem(15, $item);
	}
	public function onClose(InventoryCloseEvent $e){
		$name = $e->getPlayer()->getName();
		if(isset($this->e[$name])){
			unset($this->e[$name]);
		}
	}
	public function onQuit(PlayerQuitEvent $e){
		$name = $e->getPlayer()->getName();
		if(isset($this->e[$name])){
			unset($this->e[$name]);
		}
	}
	public function onTransaction(InventoryTransactionEvent $event){
		$put = $event->getTransaction();
		$p = $put->getPlayer();
		$name = $p->getName();
		foreach($put->getTransactions() as $action){
			$item = $action->getTargetItem();
			$custom = $item->getCustomName();
		$point1 = $this->point->myPoint($name);
			if(isset($this->e[$name])){
				$inv = $this->e[$name];
				if($custom == "§e§l❖§dWarVip§eI"){
					if($point1 >= 40){
						$this->point->reducePoint($name, 40);
				$this->getServer()->dispatchCommand(new ConsoleCommandSender(),'setuperm ' . $p . ' vip1.cmd');
						$this->getServer()->getCommandMap()->dispatch($p ,"❖vip1❖");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),'unsetuperm ' . $p . ' vip1.cmd');
						$p->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §l§bBạn đã mua thành công gói VIP I");
						$inv->onClose($p);
						$inv->clearAll();
						$this->setMenu($inv, $p);
						return;
					}
						$p->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §aBạn Cần 40 Point Để Mua §eWarVip1");
						$inv->onClose($p);
						$inv->clearAll();
						$this->setMenu($inv, $p);
					return true;
				}
				if($custom == "§e§l❖§dWarVip§eII"){
					if($point1 >= 80){
							$this->point->reducePoint($name, 80);
				$this->getServer()->dispatchCommand(new ConsoleCommandSender(),'setuperm ' . $p . ' vip2.cmd');
						$this->getServer()->getCommandMap()->dispatch($p ,"❖vip2❖");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),'unsetuperm ' . $p . ' vip2.cmd');
						$p->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §l§bBạn đã mua thành công gói VIP II");
						$inv->onClose($p);
						$inv->clearAll();
						$this->setMenu($inv, $p);
						
						
						return;
					}
				$p->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §aBạn Cần 80 Point Để Mua §eWarVip2");
						$inv->onClose($p);
						$inv->clearAll();
						$this->setMenu($inv, $p);
					return true;
				}
				if($custom == "§e§l❖§dWarVip§eIII"){
					if($money >= 109){
					$this->point->reducePoint($name, 109);
				$this->getServer()->dispatchCommand(new ConsoleCommandSender(),'setuperm ' . $p . ' vip3.cmd');
						$this->getServer()->getCommandMap()->dispatch($p ,"❖vip3❖");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),'unsetuperm ' . $p . ' vip3.cmd');
						$p->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §l§bBạn đã mua thành công gói VIP III");
						$inv->onClose($p);
						$inv->clearAll();
						$this->setMenu($inv, $p);
						return;
					}
						$p->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §aBạn Cần 109 Point Để Mua §eWarVip3");
						$inv->onClose($p);
						$inv->clearAll();
						$this->setMenu($inv, $p);
						}
				if($custom == "§e§l❖§dWarVip§eIV"){
					if($money >= 130){
						$this->point->reducePoint($name, 130);
				$this->getServer()->dispatchCommand(new ConsoleCommandSender(),'setuperm ' . $p . ' vip4.cmd');
						$this->getServer()->getCommandMap()->dispatch($p ,"❖vip4❖");
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),'unsetuperm ' . $p . ' vip4.cmd');
						$p->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §l§bBạn đã mua thành công gói VIP III");
						$inv->onClose($p);
						$inv->clearAll();
						$this->setMenu($inv, $p);
						return;
					}
						$p->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §aBạn Cần 130 Point Để Mua §eWarVip4");
						$inv->onClose($p);
						$inv->clearAll();
						$this->setMenu($inv, $p);
					return true;
			}
				}
			}
		}
}