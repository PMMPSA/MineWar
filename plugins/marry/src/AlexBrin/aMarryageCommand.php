<?php

	namespace AlexBrin;

	use AlexBrin\aMarryage;
	use AlexBrin\aMarryageEconomyManager as eco;

	use pocketmine\command\Command;
	use pocketmine\command\CommandSender;

	use pocketmine\level\Position;
	use pocketmine\level\particle\HeartParticle;

	use pocketmine\math\Vector3;

	class aMarryageCommand extends aMarryage {
		private $request = [];

		public function __construct(aMarryage $plugin) {
			//parent::__construct($plugin);
			$this->plugin = $plugin;
		}

		 public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
			// if($sender instanceof Player) {
				if(strtolower($command->getName()) == "kethon") {
					$config = $this->plugin->config;
					$prefix = $config["prefix"]." ";

					switch(count($args)) {

						case 0:
								$sender->sendMessage($prefix.$config["titleList"]."\n§e/kethon (người chơi) §a- thể hiện tình yêu §c♥\n§e/kethon sethome §a- thiết lập một ngôi nhà chung\n§e/kethon home §a- dịch chuyển đến một ngôi nhà chung\n§e/kethon tp §a- dịch chuyển tức thời đến vợ / chồng\n§e/kethon lyhon bỏ người chơi§a\n§e/kethon chapnhan để Chấp Nhận Lời Yêu Cầu\n§e/kethon tuchoi để từ chối lời kết hôn':\n");
							break;

						case 1:
								$name = strtolower($sender->getName());
								switch(strtolower($args[0])) {

									case 'help':
										$sender->sendMessage($prefix.$config["titleList"]."\n§e/kethon (người chơi)§a- thể hiện tình yêu §c♥\n§e/kethon sethome §a- thiết lập một ngôi nhà chung\n§e/kethon home §a- dịch chuyển đến một ngôi nhà chung\n§e/kethon tp §a- dịch chuyển tức thời đến vợ / chồng\n§e/kethon lyhon bỏ người chơi§a\n§e/kethon chapnhan để Chấp Nhận Lời Yêu Cầu\n§e/kethon tuchoi để từ chối lời kết hôn':\n");
										break;

									case "kethon":
											for($i = 1; $i <= $config["hearth"]; $i++) {
												$particle = new HeartParticle(new Vector3($sender->getX() + mt_rand(0, 0.55), $sender->getY() + 2, $sender->getZ() + mt_rand(0, 0.55)), $config["scale"]);
												$sender->getLevel()->addParticle($particle);
											}
										break;

									case "sethome":
											foreach($this->plugin->families as $id => $family) {
												if($name == $family["first"] || $name == $family["second"]) {
													$this->plugin->families[$id]["home"] = [
														"x" => round($sender->getX()),
														"y" => round($sender->getY()),
														"z" => round($sender->getZ()),
														"level" => $sender->getLevel()->getName()
													];
													$this->plugin->save();
													$sender->sendMessage($prefix.$config["homeCreate"]);
													$p = $name == $family["first"]? $family["second"] : $family["first"];
													$p = $this->plugin->getServer()->getPlayer($p);
													if($p !== null)
														$p->sendMessage($prefix.$config["homeCreate"]);
													return true;
												}
											}
											$sender->sendMessage($prefix.$config["lonely"]);
										break;

									case "home":
											foreach($this->plugin->families as $family) {
												if($name == $family["first"] || $name == $family["second"]) {
													if($family["home"] !== false) {
														$sender->teleport(new Position($family["home"]["x"], $family["home"]["y"], $family["home"]["z"], $this->plugin->getServer()->getLevelByName($family["home"]["level"])));
														$sender->sendMessage($prefix.$config["homeTP"]);
													} else $sender->sendMessage($prefix.$config["homeNotExist"]);
													return true;
												}
											}
											$sender->sendMessage($prefix.$config["lonely"]);
										break;

									case "tp":
											foreach($this->plugin->families as $family) {
												if($name == $family["first"] || $name == $family["second"]) {
													$p = $name == $family["first"]? $family["second"] : $family["first"];
													$p = $this->plugin->getServer()->getPlayer($p);
													if($p !== null) {
														$x = round($p->getX());
														$y = round($p->getY());
														$z = round($p->getZ());
														$sender->teleport(new Position($x, $y, $z, $p->getLevel()));
														$sender->sendMessage($prefix.$config["tp"]);
														$p->sendMessage($prefix.$config["tpToYou"]);
													} else $sender->sendMessage($prefix.$config["offline"]);
													return true;
												}
											}
											$sender->sendMessage($prefix.$config["lonely"]);
										break;

									case "lyhon":
											foreach($this->plugin->families as $id => $family) {
												if($name == $family["first"] || $name == $family["second"]) {
													unset($this->plugin->families[$id]);
													$p = $name == $family["first"] ? $family["second"] : $family["first"];
													$sender->sendMessage(str_replace("{player}", $p, $prefix.$config["divorce"]));
													$p = $this->plugin->getServer()->getPlayer($p);
													if($p instanceof Player)
														$p->sendMessage(str_replace("{player}", $sender->getName(), $prefix.$config["leftYou"]));
													$this->plugin->save();
													return true;
												} 
											}
											$sender->sendMessage($prefix.$config["lonely"]);
										break;

									case "chapnhan":
											foreach($this->request as $player => $req) {
												if($name == $player) {
													$p = $this->plugin->getServer()->getPlayer($req);
													if($this->plugin->eco->getMoney($req) < $config["MoneyToMarry"]) {
														if($p !== null)
															$p->sendMessage($prefix.$config["notEnoughMoney"]);
														$sender->sendMessage(str_replace("{player}", $req, $prefix.$config["firstNotEnoughMoney"]));
														return true;
													}
													$this->plugin->eco->createFamily($req, $config["MoneyToMarry"]);
													$this->plugin->families[] = [
														"first" => $req,
														"second" => $name,
														"home" => false
													];
													$sender->sendMessage(str_replace("{player}", $p->getName(), $prefix.$config["accept"]));
													if($p !== null)
														$p->sendMessage(str_replace("{player}", $sender->getName(), $prefix.$config["accept"]));
													unset($this->request[$name]);
													$this->plugin->save();
													$this->plugin->getServer()->broadcastMessage(str_replace(["{first}", "{second}"], [$sender->getName(), $p->getName()], $prefix.$config["broadcast"]));
													return true;
												}
											}
											$sender->sendMessage($prefix.$config["notExist"]);
										break;

									case "tuchoi":
											if(isset($this->request[$name])) {
												$p = $this->plugin->getServer()->getPlayer($this->request[$name]);
												$sender->sendMessage($prefix.$config["rejected"]);
												if($p !== null)
													$p->sendMessage($prefix.$config["reject"]);
											} else $sender->sendMessage($prefix.$config["notExist"]);
										break;

									default:

										foreach($this->plugin->families as $family)
											if($name == $family["first"] || $name == $family["second"]) {
												$sender->sendMessage($prefix.$config["exist"]);
												return true;
											}
										foreach($this->plugin->families as $family)
											if(strtolower($args[0]) == $family["first"] || strtolower($args[0]) == $family["second"]) {
												$sender->sendMessage($prefix.$config["alreadyPair"]);
												return true;
											}

										if($this->plugin->eco->getMoney($name) < $config["MoneyToMarry"]) {
											$sender->sendMessage($prefix.$config["notEnoughMoney"]);
											return true;
										}

										if($name == strtolower($args[0])) {
											$sender->sendMessage($prefix.$config['wtf']);
											return true;
										}

										$player = $this->plugin->getServer()->getPlayer($args[0]);
										if($player !== null) {
											$this->request[strtolower($player->getName())] = $name;
											$sender->sendMessage(str_replace("{player}", $player->getName(), $prefix.$config["sent"]));
											if($player->isOnline())
												$player->sendMessage(str_replace("{player}", $sender->getName(), $prefix.$config["incoming"]));
										} else $sender->sendMessage($prefix.$config["offline"]);

								}
							break;

					}

				}
			// } else $sender->sendMessage("§cOnly for players!");
		}

	}

?>
