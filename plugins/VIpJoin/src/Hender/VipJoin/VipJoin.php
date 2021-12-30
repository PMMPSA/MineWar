<?php

namespace Hender\VipJoin;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase as PB;
use pocketmine\event\Listener as LT;
use pocketmine\utils\TextFormat as TF;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;

class VipJoin extends PB implements LT
{
	public function onEnable()
	{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$p = $this->getServer()->getOnlinePlayers();
		$this->pprs = $this->getServer()->getPluginManager()->getPlugin("PurePerms");
		$this->getLogger()->info("Plugin đã bật");
	}
	
	public function onJoinEvent(PlayerJoinEvent $ev)
	{
		$player = $ev->getPlayer();
		if($this->pprs->getUserDataMgr()->getGroup($player)->getName() == "Vip5")
		{
       	$this->getServer()->broadcastMessage("§l§b✎ §eĐại Gia §d". $player->getName() ." §dVIP §cV §eĐã Vào Server");
			$player->sendMessage("§l§1『 §bChào Mừng Đại Gia §d". $player->getName() ." §6VIP§d V §bĐã §aTham Gia §eServer§1 』");
                     } elseif($this->pprs->getUserDataMgr()->getGroup($player)->getName() == "Vip4") 
                     {
                     	$this->getServer()->broadcastMessage("§l§b✎ §eĐại Gia §d". $player->getName() ." §6VIP §dIV §eĐã Vào Server");
			$player->sendMessage("§l§1『 §bChào Mừng Đại Gia §d". $player->getName() ." §dVIP§c IV §bĐã §aTham Gia §eServer§1 』");
              } elseif($this->pprs->getUserDataMgr()->getGroup($player)->getName() == "Vip3")
              {
              	$this->getServer()->broadcastMessage("§l§b✎ §eĐại gia §d". $player->getName() ." §6VIP §dIII §eĐã Vào Server");
			$player->sendMessage("§l§1『 §bChào Mừng Đại Gia §d". $player->getName() ." §dVIP§c III §bĐã §aTham Gia §eServer§1 』");
        } elseif($this->pprs->getUserDataMgr()->getGroup($player)->getName() == "Vip2")
        {
        	$this->getServer()->broadcastMessage("§l§b✎ §eĐại gia §d". $player->getName() ." §6VIP §dII §eĐã Vào Server");
			$player->sendMessage("§l§1『 §bChào Mừng Đại Gia §d". $player->getName() ." §dVIP§c II §bĐã §aTham Gia §eServer§1 』");
        } elseif($this->pprs->getUserDataMgr()->getGroup($player)->getName() == "Vip1")
        {
        	$this->getServer()->broadcastMessage("§l§b✎ §eĐại gia §d". $player->getName() ." §6VIP §dI §eĐã Vào Server");
			$player->sendMessage("§l§1『 §bChào Mừng Đại Gia §d". $player->getName() ."§6 VIP§d I §bĐã §aTham Gia §eServer§1 』");
        	} elseif($this->pprs->getUserDataMgr()->getGroup($player)->getName() == "Admin")
        {
        	$this->getServer()->broadcastMessage("§l§b✎ §cAdmin §d". $player->getName() ." §eĐã Vào Server");
			$player->sendMessage("§l§1『 §bChào mừng §cAdmin §d". $player->getName() ." §bĐã §aTham Gia §eServer§1 』");
        	} elseif($this->pprs->getUserDataMgr()->getGroup($player)->getName() == "OP")
        {
        	$this->getServer()->broadcastMessage("§l§b✎ §6OP §d". $player->getName() ." §eĐã Vào Server");
			$player->sendMessage("§l§1『 §bChào mừng §6OP §d". $player->getName() ." §bĐã §aTham Gia §eServer§1 』");
        	} elseif($this->pprs->getUserDataMgr()->getGroup($player)->getName() == "Owner")
        {
        $this->getServer()->broadcastMessage("§l§b✎ §aOwner §d". $player->getName() ." §eĐã Vào Server");
			$player->sendMessage("§l§1『 §bChào mừng §aOwner §d". $player->getName() ." §bĐã §cTham Gia §eServer§1 』");
        	} else {
        	$this->getServer()->broadcastMessage("§l§b✎ §3Người Chơi §d". $player->getName() ." §eĐã Vào Server");
			$player->sendMessage("§l§1『 §bChào mừng §3Người Chơi §d". $player->getName() ." §bĐã §cTham Gia §eServer§1 』");
        }
    }
    
    public function onQuitEvent(PlayerQuitEvent $ev) 
    {
    	$player = $ev->getPlayer();
    $this->getServer()->broadcastMessage("§l§1『 §bNgười Chơi §d". $player->getName() ." §bĐã §cThoát Khỏi §eServer§1 』");
         }
}