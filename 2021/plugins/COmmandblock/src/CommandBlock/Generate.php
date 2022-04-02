<?php

namespace CommandBlock;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\math\Vector3;
use pocketmine\Player;
use pocketmine\event\block\BlockUpdateEvent;
use pocketmine\item\Item;
use pocketmine\event\Listener;
use pocketmine\level\Level;
use pocketmine\block\Block;
use pocketmine\block\IronOre;
use pocketmine\block\Cobblestone;
use pocketmine\block\CommandBlock;
use pocketmine\block\DiamondOre;
use pocketmine\block\EmeraldOre;
use pocketmine\block\GoldOre;
use pocketmine\block\CoalOre;
use pocketmine\block\LapisOre;
use pocketmine\block\RedstoneOre;

class Generate extends PluginBase implements Listener{

    public function onEnable(){
        $this->getLogger()->info("Plugin OreGenerator by vividmemory!");
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
    }

        public function onBlockSet(BlockUpdateEvent $event){
        $block = $event->getBlock();
        $end = false;
        for ($i = 0; $i <= 1; $i++) {
            $nearBlock = $block->getSide($i);
            if ($nearBlock instanceof commandblock) {
                $end = true;
            }
            if ($end) {
                $id = mt_rand(1, 60);
                switch ($id) {
                    case 30;
                        $newBlock = new IronOre();
                        break;
                    case 30;
                        $newBlock = new GoldOre();
                        break;
                    case 30;
                        $newBlock = new EmeraldOre();
                        break;
                    case 30;
                        $newBlock = new CoalOre();
                        break;
                    case 30;
                        $newBlock = new RedstoneOre();
                        break;
                    case 30;
                        $newBlock = new DiamondOre();
                        break;
					case 9;
                        $newBlock = new Cobblestone();
                        break;
                    default:
                        $newBlock = new DiamondOre();
                }
                $block->getLevel()->setBlock($block, $newBlock, true, false);
                return;
            }
        }
    }
}
