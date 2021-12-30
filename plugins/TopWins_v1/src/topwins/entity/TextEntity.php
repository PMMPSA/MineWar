<?php

namespace topwins\entity;

use pocketmine\entity\Human as Humano;
use pocketmine\network\protocol\AddPlayerPacket;
use pocketmine\network\protocol\PlayerListPacket;
use pocketmine\item\Item;
use pocketmine\entity\Entity;
use topwins\Main;
use pocketmine\Player;
use pocketmine\Server;

class TextEntity extends Humano {
	
	private $times = 0;
	public $realName = "";
	
	public function onUpdate($currentTick){
		if($this->closed){
			return false;
		}
		if($this->times < 400){
			$this->times++;
			return false;
		}
		if(!isset($this->namedtag["Top"])){
			return false;
		}
		$plugin = Main::getInstance();
		if(is_null($plugin)){
			return false;
		}
		$name = "§l§eREDEPHOENIX§r§7 \nTOP CHIẾN THẮNG\n§7\n" . $plugin->getMoneyTop();
		switch($this->namedtag["Top"]){
			case 1:
			$name = "§l§eREDE§7PHOENIX§r§7 \nTOP CHIẾN THẮNG\n§7\n" . $plugin->getMoneyTop();
			break;
			case 2:
			$name = "§l§eREDE§7PHOENIX§r§7 \nTOP GIẾT\n§7\n" . $plugin->getKillTop();
			break;
		}
		$this->setDataProperty(2, Entity::DATA_TYPE_STRING, $name);
		$this->respawnToAll();
		$this->times = 0;
		return parent::onUpdate($currentTick);
	}

    public function spawnTo(Player $player){
        if($player !== $this and !isset($this->hasSpawned[$player->getLoaderId()])){
            $this->hasSpawned[$player->getLoaderId()] = $player;
            $uuid = $this->getUniqueId();
            $entityId = $this->getId();
            $pk = new AddPlayerPacket();
            $pk->uuid = $uuid;
            $pk->username = "";
            $pk->eid = $entityId;
            $pk->x = $this->x;
            $pk->y = $this->y;
            $pk->z = $this->z;
            $pk->yaw = $this->yaw;
            $pk->pitch = $this->pitch;
            $pk->item = Item::get(Item::AIR);
            $pk->metadata = [
                2 => [4, $this->getDataProperty(2)],
                Entity::DATA_FLAGS => [Entity::DATA_TYPE_BYTE, 1 << Entity::DATA_FLAG_INVISIBLE],
                3 => [0, $this->getDataProperty(3)],
                15 => [0, 1],
		        23 => [7, -1],
		        24 => [0, 0]
            ];
            $player->dataPacket($pk);
            $this->inventory->sendArmorContents($player);
            $add = new PlayerListPacket();
            $add->type = 0;
            $add->entries[] = [$uuid, $entityId, isset($this->namedtag->MenuName) ? $this->namedtag["MenuName"] : "", $this->skinId, $this->skin];
            $player->dataPacket($add);
            if ($this->namedtag["MenuName"] === "") {
                $remove = new PlayerListPacket();
                $remove->type = 1;
                $remove->entries[] = [$uuid];
                $player->dataPacket($remove);
            }
        }
    }
}