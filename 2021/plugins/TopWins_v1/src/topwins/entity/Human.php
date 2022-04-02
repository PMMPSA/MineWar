<?php

namespace topwins\entity;

use pocketmine\entity\Human as Humano;
use pocketmine\entity\Entity;
use pocketmine\network\protocol\AddPlayerPacket;
use pocketmine\network\protocol\PlayerListPacket;
use pocketmine\Player;
use pocketmine\Server;
use topwins\Main;

class Human extends Humano{
	
	private $times = 0;
	
	public function onUpdate($currentTick){
		$has = parent::onUpdate($currentTick);
		if($this->closed){
			return false;
		}
		if($this->times < 100){
			$this->times++;
			return false;
		}
		if(!isset($this->namedtag["Top"]) or !isset($this->namedtag["Categoria"])){
			return false;
		}
		$num = $this->namedtag["Top"];
		$cat = $this->namedtag["Categoria"];
		$plugin = Main::getInstance();
		if(is_null($plugin)){
			return false;
		}
		$data = $plugin->getKill($this->namedtag["Top"]);
		$final = "Abates";
		switch($this->namedtag["Categoria"]){
			case "wins":
			$data = $plugin->getTop($this->namedtag["Top"]);
			$final = "Vitorias";
			break;
			case "kills":
			$data = $plugin->getKill($this->namedtag["Top"]);
			$final = "Abates";
			break;
		}
		$name = $data["name"];
		$pp = $plugin->getServer()->getPlayerExact($name);
		if(isset($data["tag"])){
			$name = $data["tag"];
		}
		$msg = "§l§c" . $this->namedtag["Top"] . "º §r§7Địa điểm§r\n§e$name".$data["name"]." \n§e" . $data["count"] . " §7$final";
		$msg = $plugin->centralize($msg);
		$this->setDataProperty(2, Entity::DATA_TYPE_STRING, $msg);
		if(!is_null($pp)){
			if($this->getSkinData() !== $pp->getSkinData() and $this->getSkinId() !== $pp->getSkinId()){
				$this->setSkin($pp->getSkinData(), $pp->getSkinId());
				$this->respawnToAll();
			}
		}
		$this->times = 0;
		if(!$has){
			$has = true;
		}
		return $has;
	}

    public function spawnTo(Player $player){
        if ($player !== $this and !isset($this->hasSpawned[$player->getLoaderId()])) {
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
            $pk->item = $this->getInventory()->getItemInHand();
            $pk->metadata = [
                2 => [4, $this->getDataProperty(2)],
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