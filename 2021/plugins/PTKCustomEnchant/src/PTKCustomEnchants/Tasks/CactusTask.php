<?php

namespace PTKCustomEnchants\Tasks;

use PTKCustomEnchants\CustomEnchants\CustomEnchants;
use PTKCustomEnchants\Main;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\scheduler\PluginTask;

/**
 * Class CactusTask
 * @package PTKCustomEnchants\Tasks
 */
class CactusTask extends PluginTask
{
    private $plugin;

    /**
     * CactusTask constructor.
     * @param Main $plugin
     */
    public function __construct(Main $plugin)
    {
        parent::__construct($plugin);
        $this->plugin = $plugin;
    }

    /**
     * @param $currentTick
     */
    public function onRun ($currentTick)
    {
        foreach ($this->plugin->getServer()->getOnlinePlayers() as $player) {
            foreach ($player->getInventory()->getArmorContents() as $item) {
                if ($this->plugin->getEnchantment($item, CustomEnchants::CACTUS) !== null) {
                    foreach ($player->getLevel()->getNearbyEntities($player->getBoundingBox()->grow(1, 0, 1), $player) as $p) {
                        $ev = new EntityDamageByEntityEvent($player, $p, EntityDamageEvent::CAUSE_CONTACT, 1);
                        #$p->attack($ev);
                    }
                    break;
                }
            }
        }
    }
}