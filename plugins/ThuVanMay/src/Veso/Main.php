<?php
namespace Veso;
use pocketmine\utils\TextFormat as T;
use pocketmine\utils\TextFormat as __;
use pocketmine\utils\Random;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use onebone\economyapi\EconomyAPI;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\level\sound\AnvilUseSound;
use pocketmine\level\sound\ExpPickupSound;
use pocketmine\level\sound\PopSound;
use pocketmine\item\Item;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\level\sound\GhastSound;
use pocketmine\level\sound\EndermanTeleportSound;
class Main extends PluginBase
{
    public $eco;
    public function onEnable()
    {
        $this->eco = EconomyAPI::getInstance();
        $this->getLogger()->info("§d Đã bật Plugin§6 vé số, [AMGM]");
    }
    public function onJoin(PlayerJoinEvent $event)
    {
        $player = $event->getPlayer();
        $player->getlevel()->addSound(new ExpPickupSound($player));
    }
    public function onDeath(PlayerDeathEvent $event)
    {
        $player = $event->getPlayer();
        $player->getlevel()->addSound(new GhastSound($player));
        $player->getlevel()->addSound(new ExpPickupSound($player));
    }
    public function onQuit(PlayerQuitEvent $event)
    {
        $player = $event->getPlayer();
        $player->getlevel()->addSound(new ExpPickupSound($player));
    }
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args)
    {
        if ($cmd->getName() == "muaveso") {
            if ($sender instanceof Player) {
                $rand = mt_rand(1, 80);
                $sender->getLevel()->addSound(new AnvilUseSound($sender));
                if ($this->eco->reduceMoney($sender->getName(), 10000)) {
                    switch ($rand) {
                        case 1:
                            $this->eco->addMoney($sender->getName(), 10000);
                            $sender->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §e•§d❖§d Bạn Đã Cào Vé Số Và Trúng Số Tiền: §610.000VNĐ");
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            break;
                        case 18:
                            $this->eco->addMoney($sender->getName(), 1000000);
                            $sender->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §e•§d❖§d Bạn Đã Cào Vé Số Và Trúng Giải Đặc Biệt: §61.000.000VNĐ");
                            $this->getServer()->broadcastMessage("§l§f⬛§c⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛§f⬛\n§r\n§aBản Tin Hôm Nay::\n§d" . $sender->getName() . "Đã Cào Vé Số Và Trúng Giải Đặc Biệt§b đã nhận§6 1.000.000VNĐ\n\n§a✔§f Giao dịch hoàn tất\n\n§a•§e Liên hệ tổng đài §b/muaveso\n\n§l§f⬛§c⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛⬛§f⬛");
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            break;
                        case 31:
                            $this->eco->reduceMoney($sender->getName(), 100000);
                            $sender->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §e•§d❖§d Bạn Đã Cào Vé Số Và Trúng Số Tiền: §6100.000VNĐ");
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            break;
                        case 45:
                            $this->eco->reduceMoney($sender->getName(), 0);
                            $sender->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §e•§d❖§d Bạn Đã Cào Vé Số Và Trúng Số Tiền:§6 0VNĐ");
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            break;
                        case 50:
                            $this->eco->reduceMoney($sender->getName(), 0);
                            $sender->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §e•§d❖§d Bạn Đã Cào Vé Số Và Trúng Số Tiền:§6 0VNĐ");
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            break;
                        case 55:
                            $this->eco->reduceMoney($sender->getName(), 0);
                            $sender->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §e•§d❖§d Bạn Đã Cào Vé Số Và Trúng Số Tiền:§6 0VNĐ");
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                        case 65:
                            $this->eco->reduceMoney($sender->getName(), 0);
                            $sender->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §e•§d❖§d Bạn Đã Cào Vé Số Và Trúng Số Tiền:§6 0VNĐ");
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                        case 70:
                            $this->eco->reduceMoney($sender->getName(), 0);
                            $sender->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §e•§d❖§d Bạn Đã Cào Vé Số Và Trúng Số Tiền:§6 0VNĐ");
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                        case 75:
                            $this->eco->reduceMoney($sender->getName(), 0);
                            $sender->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §e•§d❖§d Bạn Đã Cào Vé Số Và Trúng Số Tiền:§6 0VNĐ");
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                        case 80:
                            $this->eco->reduceMoney($sender->getName(), 0);
                            $sender->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §e•§d❖§d Bạn Đã Cào Vé Số Và Trúng Số Tiền:§6 0VNĐ");
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            $sender->getLevel()->addSound(new ExpPickupSound($sender));
                            break;
                        default:
                            $sender->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §e•§d❖§d Bạn Đã Cào Vé Số Và Trúng Số Tiền:§6 0VNĐ");
                            break;
                    }
                } else {
                    $sender->sendMessage("§b§l❖ §b6War §cOf §e✪§9AMbition§e✪ §e•§d❖§d Bạn Đã Cào Vé Số Nhưng Trong Túi Bạn Không Có Tờ Vé Số nào @@ :))");
                    return true;
                }
            }
        }
    }
}