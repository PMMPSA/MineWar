<?php

namespace CuaHang;

use pocketmine\item\Item;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\{Server, Player};
use pocketmine\utils\TextFormat as TF;
use pocketmine\item\enchantment\Enchantment;
use PTKCustomEnchants\CustomEnchants\CustomEnchants;
use pocketmine\command\{Command, CommandSender, ConsoleCommandSender};

class Main extends PluginBase implements Listener {
    
public $tag = "§e§l❖§1Ｖ§6ＣＲＡＦＴ§e❖";
	
public function onEnable() {
$this->getServer()->getPluginManager()->registerEvents($this, $this);
$this->CE = $this->getServer()->getPluginManager()->getPlugin("PTKCustomEnchants");
}
	
public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
if($cmd->getName() == "chodo") {
$sender->sendMessage($this->tag."§a§l /chodo danhsach để xem danh sách");
if(isset($args[0])) {
switch(strtolower($args[0])) {
case "danhsach":
$sender->sendMessage("§a§l• §c§l✡§f Cúp§a Thủy Thần §c✡ §b[§dcupthuythan§b]§6: §c200 Point");
$sender->sendMessage("§a§l• §c§l✡§f Giáp§2 SuperWater §c✡ §b[§dsuperwater§b]§6: §c450Point");
$sender->sendMessage("§a§l• §c§l✡§f Cúp§5 San Hô §c✡ §b[§dcupsanho§b]§6: §c 288Point");
$sender->sendMessage("§a§l• §c§l✡§f Nón§4 Cát §c✡ §b[§dnoncat§b]§6: §c887 Point");
$sender->sendMessage("§a§l• §c§l✡§f Cúp§a Cá Ngựa §c✡ §b[§dcupcangua§b]§6: §c1000 Point");
$sender->sendMessage("§a§l• §c§l✡§f Cúp§1 Siêu Nhiên§c✡ §b[§dcupsieunhien§b]§6: §c2000 Point");
$sender->sendMessage("§a§l• §c§l✡§f Kiếm§6 Răng Cưa §c✡ §b[§dkiemrangcua§b]§6: §c800 Point");
    }
}

if(isset($args[0])) {
switch(strtolower($args[0])) {

case "cupthuythan":
$item1 = Item::get(257, 0, 1);
$name1 = $item1->setCustomName(" §c§l✡§f Cúp§a Thủy Thần §c✡");
$money = $this->getServer()->getPluginManager()->getPlugin("PointAPI")->myPoint($sender->getName());
if($money < 200) {
$sender->sendMessage(TF::RED . "Bạn Không Đủ Tiền Để Mua");
}else{
$item1->addEnchantment(Enchantment::getEnchantment(15)->setLevel(8));
$item1->addEnchantment(Enchantment::getEnchantment(202)->setLevel(3));
$item1->addEnchantment(Enchantment::getEnchantment(18)->setLevel(4));
$item1->addEnchantment(Enchantment::getEnchantment(108)->setLevel(5));
$item1->addEnchantment(Enchantment::getEnchantment(9)->setLevel(5));
$item1->addEnchantment(Enchantment::getEnchantment(17)->setLevel(500));
$item1->setLore(array(" §c§l✡§f Cúp§a Thủy Thần §c✡ §f: §b200 §4hành Tin Bao Quanh là Nước§e$\n§fĐào Nhanh Khi Phá Block:§b 2\n§fHiệu Xuất:§b 7\n§fTự sửa:§b 5\n§fGia Tài:§b 3\n§fSắt Bén:§b 5\n§fChậm Hỏng:§b 500"));
$this->CE->addEnchantment($item1, "Haste", 2);
$item1->setCustomName($name1);
$sender->getInventory()->addItem($item1);
$sender->sendMessage($this->tag. "§a Mua Thành Công");
$this->getServer()->getPluginManager()->getPlugin("PointAPI")->reducePoint($sender->getName(), 200);
}
break;

case "giapsuperwater":
$item2 = Item::get(307, 0, 1);
$name2 = $item2->setCustomName(" §c§l✡§f Giáp§2 SuperWater §c✡");
$money = $this->getServer()->getPluginManager()->getPlugin("PointAPI")->myPoint($sender->getName());
if($money < 450) {
$sender->sendTitle(TF::RED . "Không đủ tiền\n §b Bạn Cần Thêm Point Để\n Sở Hữu");
}else{
$item2->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
$item2->addEnchantment(Enchantment::getEnchantment(17)->setLevel(500));
$item2->addEnchantment(Enchantment::getEnchantment(5)->setLevel(1));
$item2->setLore(array(" §c§l✡§f Giáp§2 SuperWater§c✡\n§fĐánh Giá :§5 ⋆⋆⋆⋆\n§fPhẩm Chất :§5 Vàng\n§fĐược Rèn Trong Lò Luyện Bằng Nước Hiếm Nhất Vũ Trụ\n§f===================\n§6Kĩ Năng:\n§f-§7 Tốc Độ§f : khi máu càng thấp bạn sẽ nhận được tốc chạy càng cao \n§f-§b Sinh Lực§f : Tăng Máu Tối Đa"));
$this->CE->addEnchantment($item2, "Autorepair", 5);
$this->CE->addEnchantment($item2, "Overload", 3);
$item2->setCustomName($name2);
$sender->getInventory()->addItem($item2);
$sender->sendTitle($this->tag. "§a Mua Thành Công\n §e Bạn Đã Sở Hữu Giáp");
$this->getServer()->getPluginManager()->getPlugin("PointAPI")->reducePoint($sender->getName(), 450);
}
break;

case "cupsanho":
$item3 = Item::get(278, 0, 1);
$name3 = $item3->setCustomName(" §c§l✡§f Cúp§aSan Hô§c✡");
$money = $this->getServer()->getPluginManager()->getPlugin("PointAPI")->myPoint($sender->getName());
if($money < 288) {
$sender->sendMessage(TF::RED . "Không đủ Point");
}else{
$item3->addEnchantment(Enchantment::getEnchantment(15)->setLevel(12));
$item3->addEnchantment(Enchantment::getEnchantment(9)->setLevel(11));
$item3->addEnchantment(Enchantment::getEnchantment(18)->setLevel(11));
$item3->addEnchantment(Enchantment::getEnchantment(17)->setLevel(500));
$item3->setLore(array(" §c§l✡§f Cúp§aSan Hô§c✡\n§fĐánh Giá: §5 ⋆⋆⋆⋆\n§fPhẩm Chất :§6 ++\n§fCúp Cao Cấp Thuộc Hệ §rCam\n§f===================\n§6Kĩ Năng:\n§f-§5 Cứng Cáp§f : Giúp Cho Cúp Không Bao Giờ Hỏng\n§f-§b Tăng Tốc Đào§f : Khi Phá Block Sẽ Nhận BUFF"));
$this->CE->addEnchantment($item3, "autorepair", 1);
$this->CE->addEnchantment($item3, "haster", 2);
$item3->setCustomName($name3);
$sender->getInventory()->addItem($item3);
$sender->sendMessage($this->tag. "§a Mua Thành Công");
$this->getServer()->getPluginManager()->getPlugin("PointAPI")->reducePoint($sender->getName(), 439);
}
break;

case "cupsieunhien":
$item4 = Item::get(278, 0, 1);
$name4 = $item4->setCustomName(" §c§l✡§f Cúp§5 Siêu Nhiên§c✡");
$money = $this->getServer()->getPluginManager()->getPlugin("PointAPI")->myPoint($sender->getName());
if($money < 1000) {
$sender->sendMessage(TF::RED . "Không đủ tiền");
}else{
$item4->addEnchantment(Enchantment::getEnchantment(15)->setLevel(8));
$item4->addEnchantment(Enchantment::getEnchantment(18)->setLevel(5));
$item4->addEnchantment(Enchantment::getEnchantment(17)->setLevel(500));
$item4->addEnchantment(Enchantment::getEnchantment(2)->setLevel(30));
$item4->setLore(array(" §c§l✡§f Cúp§5 Siêu Nhiên §c✡\n§fĐánh Giá :§5 ⋆⋆\n§fPhẩm Chất :§6 Xanh\n§fCúp Cao Cấp Thuộc Hệ §5Nước\n§f===================\n§6Kĩ Năng:\n§f-§5 Nhặt§f : tự động hút item vào túi đồ\n§f-§b Tăng Tốc Chạy§f : Khi Phá Block sẽ nhận BUFF"));
$this->CE->addEnchantment($item4, "Haste", 4);
$this->CE->addEnchantment($item4, "Autorepair", 4);
$this->CE->addEnchantment($item4, "Telepathy", 2);
$item4->setCustomName($name4);
$sender->getInventory()->addItem($item4);
$sender->sendMessage($this->tag. "§a Mua Thành Công");
$this->getServer()->getPluginManager()->getPlugin("PointAPI")->reducePoint($sender->getName(), 1000);			
	}
break;

case "cupcangua":
$item5 = Item::get(278, 0, 1);
$name5 = $item5->setCustomName(" §c§l✡§f Cúp§e Cá Ngựa §c✡");
$money = $this->getServer()->getPluginManager()->getPlugin("PointAPI")->myPoint($sender->getName());
if($money < 2000){
$sender->sendMessage(TF::RED . "Không đủ tiền");
}else{
$item5->addEnchantment(Enchantment::getEnchantment(15)->setLevel(550));
$item5->addEnchantment(Enchantment::getEnchantment(18)->setLevel(400));
$item5->addEnchantment(Enchantment::getEnchantment(17)->setLevel(5000));
$item5->setLore(array(" §c§l✡§f Cúp§e Cá Ngựa §c✡\n§fĐánh Giá :§5 ⋆⋆\n§fPhẩm Chất :§6 Đen\n§fCúp Cao Cấp Thuộc Hệ §5Nước\n§f===================\n§6Kĩ Năng:\n§f-§5 Nhặt§f : tự động hút item vào túi đồ\n§f-§b Tăng Tốc Chạy§f : Khi Phá Block sẽ nhận BUFF"));
$this->CE->addEnchantment($item5, "Haste", 5);
$this->CE->addEnchantment($item5, "Autorepair", 5);
$this->CE->addEnchantment($item5, "Jackpot", 4);
$this->CE->addEnchantment($item5, "Smelting", 3);
$this->CE->addEnchantment($item5, "Telepathy", 2);
$sender->getInventory()->addItem($item5);
$item5->setCustomName($name5);
$sender->sendMessage($this->tag. "§a Mua Thành Công");
$this->getServer()->getPluginManager()->getPlugin("PointAPI")->reducePoint($sender->getName(), 2000);
}
break;

case "noncat":
$item6 = Item::get(310, 0, 1);
$name6 = $item6->setCustomName(" §c§l✡§f Nón§4 Cát§c✡");
$money = $this->getServer()->getPluginManager()->getPlugin("PointAPI")->myPoint($sender->getName());
if($money < 887){
$sender->sendMessage(TF::RED . "Không đủ tiền");
}else{
$item6->addEnchantment(Enchantment::getEnchantment(9)->setLevel(1000));
$item6->addEnchantment(Enchantment::getEnchantment(0)->setLevel(105));
$item6->addEnchantment(Enchantment::getEnchantment(17)->setLevel(500));
$item6->setLore(array(" §c§l✡§f Nón§4 Cát§c✡\n§fĐánh Giá :§5 ⋆⋆⋆\n§fPhẩm Chất :§6 Đen\n§fCát Đã Hút Nón Này Vào Sâu Tận Bên trong\n§fMột con Qủy Vào Cái nón này\n§fAi sở Hữu sẽ có khả năng bất bại\n§f===================\n§6Kĩ Năng:\n§f-§7 Miễn Thương§f : Giảm 30/100 sát thương từ§6 Kiếm§f và§6 Cung\n§f-§b Sinh Lực§f : Tăng Máu Tối Đa"));
$item6->setCustomName($name6);
$sender->getInventory()->addItem($item6);
$sender->sendMessage($this->tag. "§a Mua Thành Công");
$this->getServer()->getPluginManager()->getPlugin("PointAPI")->reducePoint($sender->getName(), 439);			
	}
break;
							
case "kiemrangcua":
$item7 = Item::get(276, 0, 1);
$name7 = $item7->setCustomName(" §c§l✡§f Kiếm§6 Răng Cưa §c✡");
$money = $this->getServer()->getPluginManager()->getPlugin("PointAPI")->myPoint($sender->getName());
if($money < 800) {
$sender->sendMessage(TF::RED . "Không đủ tiền");
}else{
$item7->addEnchantment(Enchantment::getEnchantment(9)->setLevel(500));
$item7->addEnchantment(Enchantment::getEnchantment(9)->setLevel(150));
$item7->addEnchantment(Enchantment::getEnchantment(17)->setLevel(5000));
$item7->addEnchantment(Enchantment::getEnchantment(19)->setLevel(100));
$item7->setLore(array(" §c§l✡§f Kiếm§6 Răng Cưa §c✡\n§fĐánh Gía :§5 ⋆⋆⋆⋆\n§fPhẩm Chất :§6 Đỏ\n§fĐây là vũ khí đã tiêu diệt§4 Annabell§f và§4 The Nun\n§fMang Nguồn Sức Mạnh Cực Nóng Đáng Sợ\n§f===================\n§6Kĩ Năng:\n§f-§3 Hiệu Ứng: Gây Nhiều Loại Buff khác nhau\n§f-§b Chí Mạng§f : Tăng Sát Thương Khi Nhảy và đánh"));
$item7->setCustomName($name7);
$sender->getInventory()->addItem($item7);
$sender->sendMessage($this->tag. "§a Mua Thành Công");
$this->getServer()->getPluginManager()->getPlugin("PointAPI")->reducePoint($sender->getName(), 800);
}
break;
                }
			}
		}
    }
}