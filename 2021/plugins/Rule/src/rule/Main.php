<?php

namespace rule;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\{Command, CommandSender, ConsoleCommandSender};
use pocketmine\Player;

class Main extends PluginBase implements Listener{
    public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
		if ($cmd->getName() == "luat"){
				$sender->sendMessage("§c§lLuật:");
				$sender->sendMessage("§l§a_1:§rKhông Được Gây War Với Nhau !");
				$sender->sendMessage("§l§a_2:§rKhông §6Cheat §rHay §bHack §rTrong Server(Nếu Thấy Hack Hãy Liên Hê Cho Staff Server)");
				$sender->sendMessage("§l§a_3:§rKhông Quảng Cáo Server Khác Trong Server");
				$sender->sendMessage("§l§a_4:§rKhông Lừa Đảo §cstaff §rHay §eMember §rKhác(ăn Ban 1 Ngày)");
				$sender->sendMessage("§l§a_5:§rGiúp Server Khai Thác Những Lỗi Sai Để Nhận Thưởng");
				$sender->sendMessage("§l§a_6:§lVote §rThường Xuyên Để Giúp Server Phát Triển");
				$sender->sendMessage("§l§a_7:§rThông Báo Ngay Cho OP Server Nếu Staff Làm Việc Xấu");
				$sender->sendMessage("§l§c§lStaff §eServer: §rVote Thường Xuyên");
				$sender->sendMessage("§l§d§lHelper:§rLuôn Giúp Đỡ Member, Không Lừa Đảo Mem,On Thường Xuyên(Không Nhất Thiết Phải On Nhiều Tiếng");
				$sender->sendMessage("§l§a§lPolice:§rGiúp Đỡ Cho Mem Khi Heler Vắng Mặt,Không Lợi Dụng Quyền Lợi Rank Hù Mem,Kick Mem Nếu Thấy Cheat/Hack/Gian Lận Hoặc Lừa Đảo,On Thường Xuyên (Không Nhất Thiết Phải Nhiều Tiếng),Quản Lý Mem");
				$sender->sendMessage("§l§c§lAdmin:§rQuản Lý Staff Và Mem Server,Kick Những Kẻ Hack/Cheat/Gian Lận hoặc Lừa Đảo(Nếu Tội Nặng Ban Hoặc Mute)");
				$sender->sendMessage("§l§b§lOwner:§rQuản Lý Server Và (Tổng Hợp Tất Cả Luật Của Các Staff Phải Làm Hết Trừ Luật Của §6Builder§r)");
				$sender->sendMessage("§l§e§l(Staff Server) §cLưu Ý:§r§bLàm Việc Không Đúng Luật Bị Báo Hay Bị §aMember§r Tố Cáo Đồng Nghĩa Với Mất §eRank!");
				}
    }
}