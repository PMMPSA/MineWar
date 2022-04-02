<?php
# plugin hecho por NashanPlaysYT :3
namespace NashanPlays\Blood;

use pocketmine\block\Block;
use pocketmine\level\particle\DestroyBlockParticle;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;

class Blood extends PluginBase implements Listener {
	public function onEnable()
	{
		  $this->getLogger()->info("§eBlood creado por NashanPlaysYT");
                  $this->getServer()->getPluginManager()->registerEvents($this ,$this);
                  $this->saveDefaultConfig();
                  $this->config = $this->getConfig();
        }
        public function onDamage(EntityDamageEvent $event) {
  	$player = $event->getEntity();
      $level = $player->getLevel()->getFolderName();
  	$cause = $event->getCause();
   if($cause===EntityDamageEvent::CAUSE_ENTITY_ATTACK) {
      	if($event instanceof EntityDamageByEntityEvent) {
         	$damager = $event->getDamager();
             $entity = $event->getEntity();
    
             if($damager instanceof Player and $entity instanceof Player) {
			$entity->getLevel()->addParticle(new DestroyBlockParticle($entity->add(0,0,0), Block::get(152))); 
} } } } }
