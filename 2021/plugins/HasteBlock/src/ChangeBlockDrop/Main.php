<?php

namespace ChangeBlockDrop;

use pocketmine\event\Listener;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\item\Item;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\item\ItemFactory;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\ProtectionEnchantment;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\block\Block;
use pocketmine\event\block\BlockBreakEvent;
class Main extends PluginBase implements Listener{
    
public function onEnable(){
			$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
public function onBreak(BlockBreakEvent $event) {
$player = $event->getPlayer();
    $effect1 = Effect::getEffect(3)->setDuration(999999999)->setAmplifier(3);
    $player->addEffect($effect1);
    if(!$event->isCancelled()){
        $id = mt_rand(0,90);
        if($id == 0){
    switch($event->getBlock()->getId()) {
        case Item::COBBLESTONE:
            $item = Item::get(433);
            $item->setCustomName("§l§e┃§a Mảnh War OF Ambition §e┃");
            $item->setLore(["§f-§e Loại:§f Mảnh Ghép -\n§c--------------------\n§fĐộ hiếm§l: §r§aCực hiếm\n§c--------------------\n§f-§d Tác dụng §f-\n§dDùng để Đổi đồ"]);
            $enchantment = Enchantment::getEnchantment(17);
            $item->addEnchantment(new EnchantmentInstance($enchantment, 32767));
            $event->setDrops([$item]);
            $this->getServer()->broadcastMessage("§l§b".$event->getPlayer()->getName()." §r§aVừa Mine Được §l§e┃§a Mảnh Miner §e┃");
            break;
    }
}
}
}
public function onDisable(){
	}
}