<?php
#Mệt Vãi Nòi -_-
namespace ThanhTuan;


use ThanhTuan\Tasks\PanelTask;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener {

 	
 
 	public function onEnable() {
 		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		
	$this->EconomyAPI = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
	
	 $this->PointAPI = $this->getServer()->getPluginManager()->getPlugin("PointAPI");
	
	$this->TopDao = $this->getServer()->getPluginManager()->getPlugin("TopIS");
	
	$this->Cs = $this->getServer()->getPluginManager()->getPlugin("Taisinh");

	$this->FactionsPro = $this->getServer()->getPluginManager()->getPlugin('FactionsPro');
			
   $this->PurePerms = $this->getServer()->getPluginManager()->getPlugin('PurePerms');
   
   $this->KillChat = $this->getServer()->getPluginManager()->getPlugin('KillChat');

      $this->getServer()->getScheduler()->scheduleRepeatingTask(new PanelTask($this), 10);

$this->getLogger()->info("§bPlugin §eSuperBar §bMake by §ThanhTuan => Bật");
	
     @mkdir($this->getDataFolder());
     $this->config = new Config ($this->getDataFolder() . "config.yml" , Config::YAML, array("nameserver" => "§a§lＭＩＮＥ §bＷＡＲ"));
     $this->saveResource("config.yml");
       
 	
		
		
}
 	
 	
  public function onDisable() {
	$this->getlogger()->info("§eMake by ThanhTuan =>Tắt");
	}
	 
 
	public function onPanel() {		
		$load = $this->getServer()->getTickUsage();
		$tps = $this->getServer()->getTicksPerSecond();
		$plon = count($this->getServer()->getOnlinePlayers());
		$mxon = $this->getServer()->getMaxPlayers();
	   $a = 0;
		foreach($this->getServer()->getOnlinePlayers() as $p) {
		
			$name = $p->getName();
	  
      if ($this->PurePerms)
					$rank = $a = $this->PurePerms->getUserDataMgr()->getData($p)['group'];
    	 	else
					$rank = '§cNo Plugin';
				
	   if ($this->FactionsPro) {
					$fac = $this->FactionsPro->getPlayerFaction($name);
					
	 	} else $fac = '§cNo Plugin';
				
      if ($this->KillChat) {
					$kll = $this->KillChat->getKills($name);
					$dth = $this->KillChat->getDeaths($name);
				} else {
					$kll = $dth =  '§cNo Plugin';
				}

	   if ($this->EconomyAPI)
		           $money = $this->EconomyAPI->myMoney($name);
		  else
					  $money = '§cNo Plugin';
					  
					  
					  if ($this->PointAPI)
		           $coin = $this->PointAPI->myPoint($name);
		  else
					  $coin = '§cNo Plugin';
					
					
					 if ($this->TopDao)
		           $capdao = $this->TopDao->level->get($name);
		  else
					  $capdao = '§cNo Plugin';
					
					
					  if ($this->TopDao)
		           $exp = $this->TopDao->exp->get($name);
		  else
					  $exp = '§cNo Plugin';
					
					
					
					 if ($this->Cs)
		           $cs = $this->Cs->myReincarnated($name);
		  else
					  $cs = '§cNo Plugin';
			
			
 					



		 	$t = str_repeat(" ", 85);
           $p->sendTip($t. " §6§l==[§bSky§aBlock §e❖ ".$this->getConfig()->get("nameserver")."§6]== §r\n" .$t ."§d§l• §cO§6n§el§ai§bn§de: §d" .$plon."§r\n" .$t. "§d§l• §cR§6a§en§ak: §a".$rank."§r\n" .$t."§d§l• §cT§6ê§en: §c".$name."§r\n".$t."§d§l• §cX§6u: §6".$money."§r\n".$t."§d§l• §cC§6o§ei§bn: §c".$coin."§r\n".$t."§d§l• §cT§6á§ei §cS§6i§en§ah: ".$cs."§r\n".$t."§d§l• §cC§6l§ea§an: §d" .$fac."§r\n" .$t ."§d§l• §cL§6ag: §d" .$tps."§r\n" .$t ."§d§lmcvcraft.net§r\n" .$t. "".str_repeat("\n", 20));
			
				
				
		}
	}
 
 
 
	       
			  

	
}
