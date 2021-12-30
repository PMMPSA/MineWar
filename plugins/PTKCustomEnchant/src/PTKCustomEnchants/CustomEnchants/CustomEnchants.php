<?php

 namespace PTKCustomEnchants\CustomEnchants;

 use pocketmine\item\enchantment\Enchantment;

 class CustomEnchants extends Enchantment {

 const LIFESTEAL = 100;
 const BLIND = 101;
 const DEATHBRINGER = 102;
 const GOOEY = 103;
 const POISON = 104;
 const AUTOREPAIR = 108;
 const CRIPPLE = 109;
 const CRIPPLINGSTRIKE = 109;
 const VAMPIRE = 111;
 const CHARGE = 113;
 const AERIAL = 114;
 const WITHER = 115;
 const DISARMING = 117;
 const SOULBOUND = 118;
 const HALLUCINATION = 119;
 const BLESSED = 120;
 const DISARMOR = 121;
 const BACKSTAB = 122;
 const EXPLOSIVE = 200;
 const SMELTING = 201;
 const ENERGIZING = 202;
 const QUICKENING = 203;
 const LUMBERJACK = 204;
 const TELEPATHY = 205;
 const DRILLER = 206;
 const HASTE = 207;
 const FERTILIZER = 208;
 const FARMER = 209;
 const HARVEST = 210;
 const OXYGENATE = 211;
 const JACKPOT = 212;
 const PARALYZE = 303;
 const PIERCING = 307;
 const SHUFFLE = 308;
 const BOUNTYHUNTER = 309;
 const HEALING = 310;
 const HEADHUNTER = 312;
 const MOLTEN = 400;
 const ENLIGHTED = 401;
 const HARDENED = 402;
 const POISONED = 403;
 const FROZEN = 404;
 const REVULSION = 406;
 const SELFDESTRUCT = 407;
 const CURSED = 408;
 const ENDERSHIFT = 409;
 const DRUNK = 410;
 const BERSERKER = 411;
 const CLOAKING = 412;
 const REVIVE = 413;
 const SHRINK = 414;
 const GROW = 415;
 const CACTUS = 416;
 const ANTIKNOCKBACK = 417;
 const FORCEFIELD = 418;
 const OVERLOAD = 419;
 const ARMORED = 420;
 const TANK = 421;
 const HEAVY = 422;
 const IMPLANTS = 600;
 const GLOWING = 601;
 const MEDITATION = 602;
 const FOCUSED = 603;
 const PARACHUTE = 800;
 const CHICKEN = 801;
 const PROWL = 802;
 const ENRAGED = 804;
 const VACUUM = 805;
 const GEARS = 500;
 const SPRINGS = 501;
 const STOMP = 502;
 const JETPACK = 503;
 const RADAR = 700;
 const INVALID = -1;
 const SLOT_COMPASS = 0b10000000000000;
 
 public static $enchantments;
 
 public static function registerEnchants($id, CustomEnchants $enchant) { 
 self::$enchantments[$id] = $enchant;
 }
 
 public static function getEnchantment($id) { 
 if (isset(self::$enchantments[$id])) {
 return 
 clone self::$enchantments[$id];
 } 
 return null;
 } 
 
 public static function getEnchantmentByName($name) { 
 if (defined(CustomEnchants::class . "::" . strtoupper($name))) { 
 return self::getEnchantment(constant(CustomEnchants::class . "::" . strtoupper($name)));
 } 
 return null;
 }
 }