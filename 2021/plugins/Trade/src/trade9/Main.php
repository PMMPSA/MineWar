<?php 

namespace trade9; 
use pocketmine\command\Command; 
use pocketmine\command\CommandSender; 
use pocketmine\event\Listener; 
use pocketmine\plugin\PluginBase; 
use pocketmine\Server; 
use pocketmine\item\enchantment\Enchantment; 
use pocketmine\item\Item; 
use pocketmine\Player; 
use pocketmine\utils\TextFormat as TF; 

class Main extends PluginBase implements Listener{ 

public function onEnable(){ 
$this->getServer()->getPluginManager()->registerEvents($this, $this); 
$this->money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
$this->CE = $this->getServer()->getPluginManager()->getPlugin("PTKCustomEnchants");
$this->getLogger()->info(TF::GREEN . "Trao đổi By Jero đã được bật"); 
          } 
          
public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){ 
         if ($cmd->getName() == "traodoi"){     
     $sender->sendMessage(TF::BLUE . "§e§l❖§aＭｉｎｅ§6Ｗａｒ§e❖»  §b§lSử dụng: /traodoi danhsach để xem danh sách vật phẩm"); 
         if(isset($args[0])){ 
      switch(strtolower($args[0])){ 
       case "danhsach": 
       $sender->sendMessage(TF::BLUE . "§d§l♦ §aSử Dụng Lệnh §b/traodoi doi (vật phẩm) §aĐể Đổi Đồ"); 
       $sender->sendMessage(TF::GREEN . "§6§l• §l§o§c❖ §fCúp §cĐịa Ngục §c❖ §c- §d20 Nether Star§b[§6Cú Pháp: cupdianguc§b]"); 
       $sender->sendMessage(TF::GREEN . "§6§l• §l§o§c❖ §fKiếm §cĐịa Ngục §c❖ §c- §d50 Nether Star §b[§6Cú Pháp: kiemdianguc§b]");
       $sender->sendMessage(TF::GREEN . "§6§l• §l§o§c❖ §fMũ §cĐịa Ngục§c❖ §c- §d80 Nether Star§b[§6Cú Pháp: mudianguc§b]");
       $sender->sendMessage(TF::GREEN . "§6§l• §l§o§c❖ §fÁo §cĐịa Ngục §c❖ §c- §d80 Nether Star §b[§6Cú Pháp: aodianguc§b]");
       $sender->sendMessage(TF::GREEN . "§6§l• §l§o§c❖ §fQuần §cĐịa Ngục§c ❖ §c- §d80 Nether Star§b[§6Cú Pháp: quandianguc§b]");
       $sender->sendMessage(TF::GREEN . "§6§l• §l§o§e||| §fGiày §cĐịa Ngục§e |||§c ❖ §c- §d80 Nether Star §b[§6Cú Pháp: giaydianguc§b]");
       $sender->sendMessage(TF::BLUE . "§d§l♦ §aGhi §b/traodoi danhsach 2 §aĐể Xem Trang Tiếp Theo --->");
          if(isset($args[1])){ 
       switch (strtolower($args[1])){ 
        case "2": 
       $sender->sendMessage(TF::BLUE . "§d§l❀ §bList 2 Của TRAO ĐỔI"); 
$sender->sendMessage(TF::GREEN . "§6§l• §e1 Nether Star §c- §d 500.000 Xu §b[§6Cú Pháp: netherstar§b]"); 
return true; 
break; 
} 
} 
return true; 
case "doi": 
if(isset($args[1])){      
switch (strtolower($args[1])){ 
case "cupdianguc": 
$p = $this->getServer()->getPlayer($sender->getName()); 
$item = Item::get(278, 0, 1); 
$item->setCustomName("§l§o§c❖ §fCúp §cĐịa Ngục §c❖"); 
if($sender->getInventory()->contains(Item::get(399,0,20))){ 
$item->setLore(array(" §o§fCúp §cĐịa Ngục \n§a -§eLoại Dụng Cụ Chính §a- \n§c ▬▬▬▬▬▬▬▬ \n§e -Kỹ Năng- \n§a Tự Động Sửa \n§a Giúp Bạn Farm Tiền \n§c ▬▬▬▬▬▬▬▬ \n§d -Có Độ Bền Lên Tới:§650 \n§d -Vật Phẩm:§6 Hiếm")); 
$sender->getInventory()->removeItem(Item::get(399,0,20)); 
$item->addEnchantment(Enchantment::getEnchantment(18)->setLevel(50)); 
$item->addEnchantment(Enchantment::getEnchantment(34)->setLevel(100)); 
$item->addEnchantment(Enchantment::getEnchantment(32)->setLevel(20)); 
$item->addEnchantment(Enchantment::getEnchantment(33)->setLevel(10)); 
$this->CE->addEnchantment($item, "Haste", 2);
$sender->getInventory()->addItem($item); 
$sender->getInventory()->removeItem(Item::get(399,0,10)); 
$sender->sendMessage("§e§l❖§aＭｉｎｅ§6Ｗａｒ§e❖ ".TF::YELLOW . " §l§o§c❖ §fCúp §6Địa Ngục§c❖ §b20Viên NetherStar"); 
} else{ 
$sender->sendMessage("§e§l❖§aＭｉｎｅ§6Ｗａｒ§e❖» ".TF::RED . "Bạn không có vật phẩm để đổi"); 
} 
return true; 
break; 
case "kiemdianguc": 
$p = $this->getServer()->getPlayer($sender->getName()); 
$item = Item::get(276, 0, 1); 
$item->setCustomName(" §l§o§c❖ §fKiếm §cĐịa Ngục §c❖"); 
if ($sender->getInventory()->contains(Item::get(399,0,50))){ 
$item->setLore(array(" l§o§c=======§e[§bINFO§e]§c======= \n§a Độ Bá: ■■■■■■■ \n§a Độ Hiếm: ■■■■■■■ \n §dSet §cĐịa Ngục§d Đã Có Từ Rất Lâu Đời Được Tu Luyện Cách Đây 22 Thế Kỉ \n§a [§6+] §eKiếm Địa Ngục Được Nung Bởi 1 Sức Nóng Khủng Kiếp")); 
$sender->getInventory()->removeItem(Item::get(399,0,50)); 
$item->addEnchantment(Enchantment::getEnchantment(9)->setLevel(100)); 
$item->addEnchantment(Enchantment::getEnchantment(34)->setLevel(500)); 
$item->addEnchantment(Enchantment::getEnchantment(12)->setLevel(20)); 
$this->CE->addEnchantment($item, "Autorepair", 3);
$sender->getInventory()->addItem($item); 
$sender->sendMessage("§e§l❖§aＭｉｎｅ§6Ｗａｒ§e❖» ".TF::YELLOW . " §l§o§c❖ §fKiếm §aĐịa Ngục§c ❖ §b50Viên NetherStar"); 
} else{ 
$sender->sendMessage("§e§l❖§aＭｉｎｅ§6Ｗａｒ§e❖» ".TF::RED . "Bạn Không Có Đủ Vật Phẩm Để Đổi"); 
} 
return true; 
break; 
case "mudianguc": 
$p = $this->getServer()->getPlayer($sender->getName()); 
$item = Item::get(310, 0, 1); 
$item->setCustomName("§l§o§c❖ §fMũ §cĐịa Ngục §c❖"); 
if ($sender->getInventory()->contains(Item::get(399,0,80))){ 
$item->setLore(array(" §l§c§o=======§e[§bINFO§e]§c======= \n§a Độ Bá: ■■■■■■■■■■ \n§a Độ Hiếm: ■■■■■■■■■■ \n§e [§a+§e] §bVật Phẩm: §cHiếm \n§6 ✘Enchant✘ \n§a ➱§e Có Độ Bền:§b600 \n§a ➱§e Có Độ Bảo Vệ:§b1350 \n§a ➱§e Gai:§b5 \n§a ➱ §6Chỉ Xuất Hiện Ở Lava\n§e ▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰ \n§a •§cNgười Tạo: §eQ1_Jero §a(OWNER) \n§a ✔§cGiá Thị Trường:§e20.000.000Xu \n§e ▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰")); 
$sender->getInventory()->removeItem(Item::get(399,0,80)); 
$item->addEnchantment(Enchantment::getEnchantment(0)->setLevel(1350)); 
$item->addEnchantment(Enchantment::getEnchantment(17)->setLevel(600)); 
$item->addEnchantment(Enchantment::getEnchantment(5)->setLevel(5)); 
$sender->getInventory()->addItem($item); 
$sender->sendMessage("§e§l❖§aＭｉｎｅ§6Ｗａｒ§e❖» ".TF::YELLOW . " §l§o§e80 NetherStar §a➱➱ §fMũ §eĐịa Ngục"); 
} else{ 
$sender->sendMessage("§e§l❖§aＭｉｎｅ§6Ｗａｒ§e❖» ".TF::RED . "Bạn Không Có Đủ Vật Phẩm Để Đổi"); 
} 
return true; 
break; 
case "aodianguc":
$p = $this->getServer()->getPlayer($sender->getName()); 
$item = Item::get(311, 0, 1); 
$item->setCustomName(" §l§o§c❖ §fÁo §cĐịa Ngục§c❖"); 
if ($sender->getInventory()->contains(Item::get(399,0,80))){ 
$item->setLore(array("§l§c§o=======§e[§bINFO§e]§c======= \n§a Độ Bá: ■■■■■■■■■■ \n§a Độ Hiếm: ■■■■■■■■■■ \n§e [§a+§e] §bVật Phẩm: §cHiếm \n§6 ✘Enchant✘ \n§a ➱§e Có Độ Bền:§b600 \n§a ➱§e Có Độ Bảo Vệ:§b1340 \n§a ➱§e Gai:§b5 \n§a ➱ §6Chỉ Xuất Hiện Ở Lava\n§e ▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰ \n§a •§cNgười Tạo: §eQ1_Jero§a(OWNER) \n§a ✔§cGiá Thị Trường:§e 20.000.000Xu \n§e ▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰")); 
$sender->getInventory()->removeItem(Item::get(399,0,80)); 
$item->addEnchantment(Enchantment::getEnchantment(0)->setLevel(1340)); 
$item->addEnchantment(Enchantment::getEnchantment(17)->setLevel(600)); 
$item->addEnchantment(Enchantment::getEnchantment(5)->setLevel(5)); 
$this->CE->addEnchantment($item, "Autorepair", 1);
$this->CE->addEnchantment($item, "Overload ", 2);
$this->CE->addEnchantment($item, "Forcefield", 1);
$sender->getInventory()->addItem($item); 
$sender->sendMessage("§e§l❖§aＭｉｎｅ§6Ｗａｒ§e❖» ".TF::YELLOW . " §l§o§e80 NetherStar§a➱➱ §fÁo §cĐịa Ngục"); 
}else{ 
$sender->sendMessage("§e§l❖§aＭｉｎｅ§6Ｗａｒ§e❖» ".TF::RED . "Bạn Không Có Đủ Vật Phẩm Để Đổi");
} 
return true;
break;
case "quandianguc":
 $p = $this->getServer()->getPlayer($sender->getName()); 
$item = Item::get(312, 0, 1); 
$item->setCustomName(" §l§o§c❖ §fQuần §cĐịa Ngục§c ❖"); 
if ($sender->getInventory()->contains(Item::get(399,0,80))){ 
$item->setLore(array("§l§c§o=======§e[§bINFO§e]§c======= \n§a Độ Bá: ■■■■■■■■■■ \n§a Độ Hiếm: ■■■■■■■■■■ \n§e [§a+§e] §bVật Phẩm: §cHiếm \n§6 ✘Enchant✘ \n§a ➱§e Có Độ Bền:§b600 \n§a ➱§e Có Độ Bảo Vệ:§b1350 \n§a ➱§e Gai:§b10 \n§a ➱ §6Chỉ Xuất Hiện Ở Lava\n§e ▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰ \n§a •§cNgười Tạo: §eYTB_Jero §a(OWNER) \n§a ✔§cGiá Thị Trường:§e 200.000Xu \n§e ▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰")); 
$sender->getInventory()->removeItem(Item::get(399,0,80)); 
$item->addEnchantment(Enchantment::getEnchantment(0)->setLevel(1350)); 
$item->addEnchantment(Enchantment::getEnchantment(17)->setLevel(600)); 
$item->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10)); 
$sender->getInventory()->addItem($item); 
$sender->sendMessage("§e§l❖§aＭｉｎｅ§6Ｗａｒ§e❖» ".TF::YELLOW . " §l§o§e80 NetherStar §a➱➱§f Quần §cĐịa Ngục"); 
}else{ 
$sender->sendMessage("§e§l❖§aＭｉｎｅ§6Ｗａｒ§e❖» ".TF::RED . "Bạn Không Có Đủ Vật Phẩm Để Đổi");
} 
return true; 
break;
case "giaydianguc": 
$p = $this->getServer()->getPlayer($sender->getName()); 
$item = Item::get(313, 0, 1); 
$item->setCustomName(" §l§o§e❖ §fGiày §cĐịa Ngục§e ❖"); 
if ($sender->getInventory()->contains(Item::get(399,0,80))){ 
$item->setLore(array(" §l§c§o=======§e[§bINFO§e]§c======= \n§a Độ Bá: ■■■■■■■■■■ \n§a Độ Hiếm: ■■■■■■■■■■ \n§e [§a+§e] §bVật Phẩm: §cHiếm \n§6 ✘Enchant✘ \n§a ➱§e Có Độ Bền:§b600 \n§a ➱§e Có Độ Bảo Vệ:§b1350 \n§a ➱§e Gai:§b15 \n§a ➱ §6Chỉ Xuất Hiện Ở Lava\n§e ▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰ \n§a •§cNgười Tạo: §eYTB_Jero §a(OWNER) \n§a ✔§cGiá Thị Trường:§e 200.000Xu \n§e ▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰▰")); 
$sender->getInventory()->removeItem(Item::get(399,0,80)); 
$item->addEnchantment(Enchantment::getEnchantment(0)->setLevel(1350)); 
$item->addEnchantment(Enchantment::getEnchantment(17)->setLevel(600)); 
$item->addEnchantment(Enchantment::getEnchantment(5)->setLevel(15)); 
$sender->getInventory()->addItem($item); 
$sender->sendMessage("§e§l❖§aＭｉｎｅ§6Ｗａｒ§e❖» ".TF::YELLOW . " §l§o§e80 NetherStar §a➱➱§f Giày §cĐịa Ngục"); 
}else{ 
$sender->sendMessage("§e§l❖§aＭｉｎｅ§6Ｗａｒ§e❖» ".TF::RED . "Bạn Không Có Đủ Vật Phẩm Để Đổi");
} 
return true;
break;
case "netherstar": 
$p = $this->getServer()->getPlayer($sender->getName());
$item = Item::get(399, 0, 1);
$name = $item->setCustomName("§a§lNetherStar");
$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
if ($money < 500000){ $sender->sendMessage(TF::RED . "Không đủ tiền");
} else{ $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 2000000);
$item->addEnchantment(Enchantment::getEnchantment(17)->setLevel(1));
$sender->getInventory()->addItem($item);
$item->setCustomName($name);
$sender->sendMessage(TF::YELLOW . "Bạn đã mua NetherStar với giá 500000 xu");
} 
return true;
break;
case "c": 
$p = $this->getServer()->getPlayer($sender->getName());
$item = Item::get(339, 0, 1);
$name = $item->setCustomName("§c§lC");
$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
if ($money < 2000){ $sender->sendMessage(TF::RED . "Không đủ tiền");
} else{ $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 2000);
$item->addEnchantment(Enchantment::getEnchantment(17)->setLevel(1));
$sender->getInventory()->addItem($item);
$item->setCustomName($name);
$sender->sendMessage(TF::YELLOW . "Bạn đã mua chữ C với giá 4000 xu");
} 
return true;
break;
case "h": 
$p = $this->getServer()->getPlayer($sender->getName());
$item = Item::get(339, 0, 1);
$name = $item->setCustomName("§c§lH");
$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
if ($money < 2000){ $sender->sendMessage(TF::RED . "Không đủ tiền");
} else{ $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 2000);
$item->addEnchantment(Enchantment::getEnchantment(17)->setLevel(1));
$sender->getInventory()->addItem($item);
$item->setCustomName($name);
$sender->sendMessage(TF::YELLOW . "Bạn đã mua chữ H với giá 4000 xu");
} 
return true;
break;
case "u": 
$p = $this->getServer()->getPlayer($sender->getName());
$item = Item::get(339, 0, 1);
$name = $item->setCustomName("§c§lU");
$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
if ($money < 2000){ $sender->sendMessage(TF::RED . "Không đủ tiền");
} else{ $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 2000);
$item->addEnchantment(Enchantment::getEnchantment(17)->setLevel(1));
$sender->getInventory()->addItem($item);
$item->setCustomName($name);
$sender->sendMessage(TF::YELLOW . "Bạn đã mua chữ U với giá 4000 xu");
} 
return true;
break;
case "tet": 
$p = $this->getServer()->getPlayer($sender->getName());
$item = Item::get(339, 0, 1);
$name = $item->setCustomName("§c§lTET");
$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
if ($money < 8000){ $sender->sendMessage(TF::RED . "Không đủ tiền");
} else{ $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 8000);
$item->addEnchantment(Enchantment::getEnchantment(17)->setLevel(1));
$sender->getInventory()->addItem($item);
$item->setCustomName($name);
$sender->sendMessage(TF::YELLOW . "Bạn đã mua chữ TET với giá 9000 xu");
} 
return true;
break;
case "m": 
$p = $this->getServer()->getPlayer($sender->getName());
$item = Item::get(339, 0, 1);
$name = $item->setCustomName("§c§lM");
$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
if ($money < 2000){ $sender->sendMessage(TF::RED . "Không đủ tiền");
} else{ $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 4000);
$item->addEnchantment(Enchantment::getEnchantment(17)->setLevel(1));
$sender->getInventory()->addItem($item);
$item->setCustomName($name);
$sender->sendMessage(TF::YELLOW . "Bạn đã mua chữ M với giá 4000 xu");
} 
return true;
break;
case "y": $p = $this->getServer()->getPlayer($sender->getName());
$item = Item::get(339, 0, 1);
$name = $item->setCustomName("§c§lY");
$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
if ($money < 2000){ $sender->sendMessage(TF::RED . "Không đủ tiền");
} else{ $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 2000);
$item->addEnchantment(Enchantment::getEnchantment(17)->setLevel(1));
$sender->getInventory()->addItem($item);
$item->setCustomName($name);
$sender->sendMessage(TF::YELLOW . "Bạn đã mua chữ Y với giá 4000 xu");
} 
return true;
break;
case "s": $p = $this->getServer()->getPlayer($sender->getName());
$item = Item::get(339, 0, 1);
$name = $item->setCustomName("§c§lS");
$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
if ($money < 2000){ $sender->sendMessage(TF::RED . "Không đủ tiền");
} else{ $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 2000);
$item->addEnchantment(Enchantment::getEnchantment(17)->setLevel(1));
$sender->getInventory()->addItem($item);
$item->setCustomName($name);
$sender->sendMessage(TF::YELLOW . "Bạn đã mua chữ S với giá 4000 xu");
} 
return true;
break;
case "ngocdo": $p = $this->getServer()->getPlayer($sender->getName());
$item = Item::get(372, 0, 1);
$name = $item->setCustomName("§c§lNgọc Đỏ");
$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
if ($money < 90000){ $sender->sendMessage(TF::RED . "Không đủ tiền");
} else{ $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 90000);
$item->addEnchantment(Enchantment::getEnchantment(17)->setLevel(1));
$sender->getInventory()->addItem($item);
$item->setCustomName($name);
$sender->sendMessage(TF::YELLOW . "Bạn đã mua Ngọc Đỏ với giá 90000 xu");
} 
return true;
break;
case "ngocxanh": $p = $this->getServer()->getPlayer($sender->getName());
$item = Item::get(351, 4, 1);
$name = $item->setCustomName("§c§lNgọc Xanh");
$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
if ($money < 90000){ $sender->sendMessage(TF::RED . "Không đủ tiền");
} else{ $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 90000);
$item->addEnchantment(Enchantment::getEnchantment(17)->setLevel(1));
$sender->getInventory()->addItem($item);
$item->setCustomName($name);
$sender->sendMessage(TF::YELLOW . "Bạn đã mua Ngọc Xanh với giá 90000 xu");
} 
return true;
break;
case "ngocvang": $p = $this->getServer()->getPlayer($sender->getName());
$item = Item::get(371, 0, 1);
$name = $item->setCustomName("§c§lNgọc Vàng");
$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
if ($money < 90000){ $sender->sendMessage(TF::RED . "Không đủ tiền");
} else{ $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 90000);
$item->addEnchantment(Enchantment::getEnchantment(17)->setLevel(1));
$sender->getInventory()->addItem($item);
$item->setCustomName($name);
$sender->sendMessage(TF::YELLOW . "Bạn đã mua Ngọc Vàng với giá 90000 xu");
} 
return true;
break;
case "ngocga": $p = $this->getServer()->getPlayer($sender->getName());
$item = Item::get(266, 0, 1);
$name = $item->setCustomName("§c§lNgọc In Dấu Gà");
$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
if ($money < 90000){ $sender->sendMessage(TF::RED . "Không đủ tiền");
} else{ $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 90000);
$item->addEnchantment(Enchantment::getEnchantment(17)->setLevel(1));
$sender->getInventory()->addItem($item);
$item->setCustomName($name); 
$sender->sendMessage(TF::YELLOW . "Bạn đã mua Ngọc In Dấu Gà với giá 90000 xu"); 
} 
return true; 
break; 
} 
return true; 
} 
} 
} 
} 
} 
}