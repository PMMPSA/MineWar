<?php

namespace ItemText;

use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Server;
use pocketmine\item\Item;
use pocketmine\event\entity\ItemSpawnEvent;
use pocketmine\entity\Entity;

class Main extends PluginBase implements Listener {
	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	public function onItemSpawn(ItemSpawnEvent $event) {
		$entity = $event->getEntity();
		$item = $entity->getItem();
		$name = $item->getName();
		$entity->setNameTag("§e§l༺§a".$name."§e༻");
		$entity->setNameTagVisible(true);
		$entity->setNameTagAlwaysVisible(true);
 	}
}