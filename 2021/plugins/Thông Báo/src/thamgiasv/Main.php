<?php

namespace thamgiasv;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase as PB;
use pocketmine\event\Listener as LT;
use pocketmine\utils\TextFormat as TF;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;

class Main extends PB implements LT
{
	public function onEnable()
	{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$p = $this->getServer()->getOnlinePlayers();
		$this->getLogger()->info("Plugin đã bật");
	}
	
	public function onJoinEvent(PlayerJoinEvent $ev){
	$player = $ev->getPlayer();
	$player->setAllowFlight(true);
	$player->sendMessage("§e❖§a Chào Mừng Bạn Đã Đến Máy Chủ WOAM §e❖");
	$player->sendMessage("§e☁§6 Server War OF AMbition Chính Thức Mở Cửa");
	$player->sendMessage("§e☁§6 Server Update Rất Nhiều Tính Năng Hay Cho Dân Cày");
	$player->sendMessage("§e☁§6 Để Biết Thêm Thông Tin Hãy Vào Website: minewarvn.cf");
	 }
    }