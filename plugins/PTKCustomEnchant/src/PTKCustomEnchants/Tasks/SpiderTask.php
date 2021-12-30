<?php

namespace PTKCustomEnchants\Tasks;


use PTKCustomEnchants\CustomEnchants\CustomEnchants;
use PTKCustomEnchants\Main;
use pocketmine\block\Block;
use pocketmine\entity\Entity;
use pocketmine\scheduler\PluginTask;

/**
 * Class SpiderTask
 * @package PTKCustomEnchants\Tasks
 */
class SpiderTask extends PluginTask
{
    private $plugin;

    /**
     * SpiderTask constructor.
     * @param Main $plugin
     */
    public function __construct(Main $plugin)
    {
        $this->plugin = $plugin;
        parent::__construct($plugin);
    }

    /**
     * @param int $currentTick
     */
    public function onRun ($currentTick)
    {
        foreach ($this->plugin->getServer()->getOnlinePlayers() as $player) {
            $enchantment = $this->plugin->getEnchantment($player->getInventory()->getChestplate(), CustomEnchants::SPIDER);
            if($enchantment !== null){
                $blocks = $player->getLevel()->getBlock($player)->getHorizontalSides(); //getBlocksAround() returns an empty array...
                $nonair = 0;
                foreach ($blocks as $block){
                    if($block->getId() !== Block::AIR && $block->isSolid()){
                        $nonair++;
                    }
                }
                if($nonair > 0){
                    if(!$player->getGenericFlag(Entity::DATA_FLAG_WALLCLIMBING)){
                        $player->setGenericFlag(Entity::DATA_FLAG_WALLCLIMBING, true);
                    }
                    $player->resetFallDistance();
                }else{
                    if($player->getGenericFlag(Entity::DATA_FLAG_WALLCLIMBING)){
                        $player->setGenericFlag(Entity::DATA_FLAG_WALLCLIMBING, false);
                    }
                }
            }else{
                if($player->getGenericFlag(Entity::DATA_FLAG_WALLCLIMBING)){
                    $player->setGenericFlag(Entity::DATA_FLAG_WALLCLIMBING, false);
                }
            }
        }
    }
}