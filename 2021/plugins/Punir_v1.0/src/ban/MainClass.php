<?php

namespace ban;

use pocketmine\plugin\PluginBase;

use pocketmine\event\Listener;

use pocketmine\utils\Config;

use pocketmine\Player;

use pocketmine\event\player\PlayerJoinEvent;

use pocketmine\event\player\PlayerCommandPreprocessEvent;

use pocketmine\event\player\PlayerPreLoginEvent;

use pocketmine\level\sound\AnvilUseSound;

use pocketmine\Server;

use pocketmine\command\Command;

use pocketmine\command\CommandSender;

class MainClass extends PluginBase implements Listener{


  public $cfg;


  public function onEnable(){
   $this->saveDefaultConfig();
 @mkdir($this->getDataFolder());
    	$this->cfg = new Config($this->getDataFolder() ."config.yml");
  $this->getServer()->getPluginManager()->registerEvents($this, $this);
   if(!is_dir($this->getDataFolder()."database/players")){
			@mkdir($this->getDataFolder()."database/players", 0777, true);
		    }
   @mkdir($this->getDataFolder(), 0777, true);
		$this->bans = new Config($this->getDataFolder() . "players_banidos.txt", Config::ENUM, array(
		));
    }


 public function onCommandPreprocess(PlayerCommandPreprocessEvent $event){
        $player = $event->getPlayer();
        $cmd = explode(" ",strtolower($event->getMessage()));
        if($cmd[0] === "/ban" or $cmd[0] === "/ban-ip" or $cmd[0] === "/jsonban" or $cmd[0] === "/gban" or $cmd[0] === "/banir" or $cmd[0] === "/bancid" or $cmd[0] === "/bancidbyname" or $cmd[0] === "/pardon" or $cmd[0] === "/pardon-ip" or $cmd[0] === "/pardoncid" or $cmd[0] === "/desbanir"){
  $cfg = $this->getConfig()->getAll();
      $b0 = $cfg["banir.comandos.inuteis"];
     if($b0 === true){
        $event->setCancelled(true);
            }
        }
   }


 public function onPreLogin(PlayerPreLoginEvent $event){
		if($this->bans->exists(strtolower($event->getPlayer()->getName()))){
      $cfg = $this->getConfig()->getAll();
      $b0 = $cfg["player.pre.login.banido.mensagem"];
          $event->setKickMessage($b0);
			$event->setCancelled(true);
               } elseif($this->bans->exists($event->getPlayer()->getAddress())){
        $cfg = $this->getConfig()->getAll();
      $b1 = $cfg["player.pre.login.banido.mensagem"];
           $event->setKickMessage($b1);
			$event->setCancelled(true);
   } elseif($this->bans->exists($event->getPlayer()->getClientId())){
         $cfg = $this->getConfig()->getAll();
      $b2 = $cfg["player.pre.login.banido.mensagem"];
           $event->setKickMessage($b2);
			$event->setCancelled(true);
    }
}


   public function onJoin(PlayerJoinEvent $ev){
		$nome = $ev->getPlayer()->getName();
		$ip = $ev->getPlayer()->getAddress();
       $cid = $ev->getPlayer()->getClientId();
		if(is_file($this->getDataFolder()."database/players/".$nome[0]."/".$nome.".yml")){
			unlink($this->getDataFolder()."database/players/".$nome[0]."/".$nome.".yml");
			$nome = $ev->getPlayer()->getName();
			$ip = $ev->getPlayer()->getAddress();
          $cid = $ev->getPlayer()->getClientId();
			@mkdir($this->getDataFolder()."database/players/".$nome[0]."", 0777, true);
			$dados = new Config($this->getDataFolder()."database/players/".$nome[0]."/".$nome.".yml", CONFIG::YAML, array(
             "NOME" => "".$nome."",
				"IP" => "".$ip."",
             "CID" => "".$cid.""
			));
			$dados->save();
		} else {
			$nome = $ev->getPlayer()->getName();
			$ip = $ev->getPlayer()->getAddress();
          $cid = $ev->getPlayer()->getClientId();
			@mkdir($this->getDataFolder()."database/players/".$nome[0]."", 0777, true);
			$dados = new Config($this->getDataFolder()."database/players/".$nome[0]."/".$nome.".yml", CONFIG::YAML, array(
			 "NOME" => "".$nome."",
				"IP" => "".$ip."",
             "CID" => "".$cid.""
		));
			$dados->save();
       }
  }


 public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
		switch($cmd->getName()){
			case "phat":
      if(isset($args[0])){
      $user = $args[0];
    if(file_exists($this->getDataFolder()."database/players/".$user[0]."/".$user.".yml")){
    	 $dados = new Config($this->getDataFolder()."database/players/".$user[0]."/".$user.".yml", CONFIG::YAML);
								$ip = $dados->get("IP");
								$cid = $dados->get("CID");
                          if(isset($args[1])){
                          $reason = implode(" ", $args);
								$worte = explode(" ", $reason);
								unset($worte[0]);
								$reason = implode(" ", $worte);
      if($this->banUser($user, $ip, $cid)){
      $this->getServer()->getCommandMap()->dispatch($sender, "kickkkkkkkkkkkkkkkkkkkkkkkkkkkkkk ".$user ." ".$reason);
  $cfg = $this->getConfig()->getAll();
      $b0 = $cfg["bloquear.ip.ao.ser.banido"];
  if($b0 === true){
     $this->getServer()->getNetwork()->blockAddress($ip, -1);
  }
   $cfg = $this->getConfig()->getAll();
      $b1 = $cfg["player.banido.broadcast"];
       $b1 = str_replace("{player}", $user, $b1);
 $b1 = str_replace("{staff}", $sender->getName(), $b1);
        $b1 = str_replace("{motivo}", $reason, $b1);
      $this->getServer()->broadcastMessage($b1);
 if($sender instanceof Player){
   $cfg = $this->getConfig()->getAll();
      $b2 = $cfg["som.de.bigorna.ao.banir"];
     if($b2 === true){
    	$sender->getLevel()->addSound(new AnvilUseSound($sender));
              }
          }
     } else {
  $cfg = $this->getConfig()->getAll();
      $b3 = $cfg["player.já.banido.mensagem"];
   $b3 = str_replace("{player}", $user, $b3);
 $b3 = str_replace("{staff}", $sender->getName(), $b3);
   $sender->sendMessage($b3);
       return true;
          }
     } else {
    $sender->sendMessage("§a/phat [player] [lý do] :: /p [player] [lý do]");
        return true;
         }
     } else {
  $cfg = $this->getConfig()->getAll();
      $b4 = $cfg["player.nunca.entrado.mensagem"];
   $b4 = str_replace("{player}", $user, $b4);
 $b4 = str_replace("{staff}", $sender->getName(), $b4);
    $sender->sendMessage($b4);
        return true;
           }     
 } else {
     $sender->sendMessage("§a/phat [player] [lý do] :: /p [player] [lý do]");
        return true;
         }
    break; 
 case "kickkkkkkkkkkkkkkkkkkkkkkkkkkkkkk":
  if($sender->hasPermission("pocketmine.command.gamemode")){
      if(isset($args[0])){
         $player = $this->getServer()->getPlayer($args[0]);
     if($player instanceof Player){
     if(isset($args[1])){
  $reasonn = implode(" ", $args);
								$worte = explode(" ", $reasonn);
								unset($worte[0]);
								$reasonn = implode(" ", $worte);
        $cfg = $this->getConfig()->getAll();
      $b5 = $cfg["player.kickado.mensagem"];
                 $b5 = str_replace("{player}", $args[0], $b5);
 $b5 = str_replace("{staff}", $sender->getName(), $b5);
        $b5 = str_replace("{motivo}", $reasonn, $b5);
         $player->close("", $b5);
                 }
             }
          }
   }
 break;
  case "unban":
  if(isset($args[0])){
   $user = $args[0];
  if(file_exists($this->getDataFolder()."database/players/".$user[0]."/".$user.".yml")){
    	 $dados = new Config($this->getDataFolder()."database/players/".$user[0]."/".$user.".yml", CONFIG::YAML);
								$ip = $dados->get("IP");
								$cid = $dados->get("CID");
        if($this->unbanUser($user, $ip, $cid)){
 $cfg = $this->getConfig()->getAll();
      $b6 = $cfg["player.desbanido.broadcast"];
 $b6 = str_replace("{player}", $args[0], $b6);
 $b6 = str_replace("{staff}", $sender->getName(), $b6);
          $this->getServer()->broadcastMessage($b6);
      } else {
  $cfg = $this->getConfig()->getAll();
      $b7 = $cfg["player.não.banido.mensagem"];
  $b7 = str_replace("{player}", $args[0], $b7);
 $b7 = str_replace("{staff}", $sender->getName(), $b7);
    $sender->sendMessage($b7);
           return true;
          }
      }
else {
      $cfg = $this->getConfig()->getAll();
      $b8 = $cfg["player.nunca.entrado.mensagem"];
   $b8 = str_replace("{player}", $user, $b8);
 $b8 = str_replace("{staff}", $sender->getName(), $b8);
      $sender->sendMessage($b8);
       return true;
      }
   } else {
    $sender->sendMessage("§9/unban [player] :: /u [player]");
       return true;
        }
    break;
       }
 }


 public function banUser($user, $ip, $cid){
			$p = strtolower($user);		
		if($this->bans->exists($p)) return false;
       if($this->bans->exists($ip)) return false;
       if($this->bans->exists($cid)) return false;
       $this->bans->set($p, true);
		$this->bans->set($ip, true);
       $this->bans->set($cid, true);
		$this->bans->save();		
		return true;
	    }
  

 public function unbanUser($user, $ip, $cid){
			$p = strtolower($user);
		if(!$this->bans->exists($p)) return false;
      if(!$this->bans->exists($ip)) return false;
     if(!$this->bans->exists($cid)) return false;
       $this->bans->remove($p);
		$this->bans->remove($ip);
       $this->bans->remove($cid);
		$this->bans->save();	
		return true;
	      }
  }
?>