<?php

namespace Muaskill;

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

use Muaskill\Inventor\Inv;

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
		if(strtolower($cmd->getName()) == "muaskill"){
			if(!$sender instanceof Player){
				$sender->sendMessage("§l§a§r§f Sử Dụng Trong Server");
				return;
			}
			$inv = new Inv($sender, 27, "§l§a✠§d Hệ Thống MUA §eSKILL§a✠");
			$sender->addWindow($inv);
			$this->e[$sender->getName()] = $inv;
			$this->setMenu($inv, $sender);
		}
	}
	public function setMenu($inv, $p){
		$inv->clearAll();
		$item = Item::get(264, 0, 1);
		$item->setCustomName("§e§l❖§dEternity");
		$inv->setItem(11, $item);
		$item = Item::get(265, 0, 1);
		$item->setCustomName("§e§l❖§cPickaxeLeveling");
		$inv->setItem(12, $item);
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
	public function onTransaction(InventoryTransactionEvent $e){
		$put = $e->getTransaction();
		$p = $put->getPlayer();
		$name = $p->getName();
		$point1 = $this->point->myPoint($name);
		foreach($put->getTransactions() as $action){
			$item = $action->getTargetItem();
			$custom = $item->getCustomName();
			if(isset($this->e[$name])){
				$inv = $this->e[$name];
				if($custom == "§e§l❖§dEternity"){
					if($point1 >= 500){
					$this->point->reducePoint($name, 500);
				$this->getServer()->dispatchCommand(new ConsoleCommandSender(),'setuperm ' . $p . ' eternity.cmd');
						$sender->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §l§bBạn đã mua thành công gói eternity");
						$inv->onClose($p);
						$inv->clearAll();
						$this->setMenu($inv, $p);
						return;
					}
						$p->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §aBạn Cần 500 Point Để Mua §eEternity");
						$inv->onClose($p);
						$inv->clearAll();
						$this->setMenu($inv, $p);
					return true;
				}
				if($custom == "§e§l❖§cPickaxeLeveling"){
					if($point1 >= 1000){
						$this->point->reducePoint($name, 1000);
				$this->getServer()->dispatchCommand(new ConsoleCommandSender(),'setuperm ' . $p . ' pickaxelv.bat');
						$sender->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §l§bBạn đã mua thành công gói PickaxeLeveling");
						$inv->onClose($p);
						$inv->clearAll();
						$this->setMenu($inv, $p);
						return;
				}
						$p->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §aBạn Cần 1000 Point Để Mua §ePickaxeLeveling");
						$inv->onClose($p);
						$inv->clearAll();
						$this->setMenu($inv, $p);
					
					return true;
			}
				}
			}
		}
}