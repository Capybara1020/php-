-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3308
-- 產生時間： 
-- 伺服器版本： 8.0.18
-- PHP 版本： 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `nuk+`
--

-- --------------------------------------------------------

--
-- 資料表結構 `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `ID` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `indorsement` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `identity` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_time` int(20) DEFAULT '0',
  `logout_time` int(20) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `account`
--

INSERT INTO `account` (`ID`, `nickname`, `password`, `indorsement`, `identity`, `login_time`, `logout_time`) VALUES
('a1083308', 'YJ', 'jack900308', '0', '0', 1591790679, 1591790674),
('A1083345', 'gemi', '123456', '0', 'x', NULL, NULL),
('test', '9487', '8787', '0', '1', 1591632704, 1591789245),
('test0487', '897654', '8787', '0', 'x', 1591712011, 1591715162);

-- --------------------------------------------------------

--
-- 資料表結構 `evaluation`
--

DROP TABLE IF EXISTS `evaluation`;
CREATE TABLE IF NOT EXISTS `evaluation` (
  `No` int(10) NOT NULL AUTO_INCREMENT,
  `ID` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `article_no` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `post_no` int(10) NOT NULL,
  `timing` int(20) NOT NULL,
  `evaluation` int(10) NOT NULL,
  PRIMARY KEY (`No`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `evaluation`
--

INSERT INTO `evaluation` (`No`, `ID`, `article_no`, `post_no`, `timing`, `evaluation`) VALUES
(8, 'test0487', '1589782842-a1083308-1', 1, 0, 4);

-- --------------------------------------------------------

--
-- 資料表結構 `paste`
--

DROP TABLE IF EXISTS `paste`;
CREATE TABLE IF NOT EXISTS `paste` (
  `No` int(100) NOT NULL AUTO_INCREMENT,
  `ID` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timing` int(20) NOT NULL,
  `click` int(10) DEFAULT '0',
  `article_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `post_no` int(100) NOT NULL,
  `type` int(10) NOT NULL,
  `title` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `respond_time` int(20) NOT NULL,
  PRIMARY KEY (`No`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `paste`
--

INSERT INTO `paste` (`No`, `ID`, `timing`, `click`, `article_no`, `post_no`, `type`, `title`, `content`, `respond_time`) VALUES
(1, 'a1083308', 1591380889, 17, '1591380889-a1083308-5', 0, 5, 'test', 'eryryryry', 0),
(48, 'a1083308', 1591381438, 1, '1591381438-a1083308-4', 0, 4, '我是誰', '我在哪裡?我是誰?我在做甚麼?', 0),
(46, 'a1083308', 1591380811, 0, '1591380811-a1083308-5', 0, 5, 'ssss', '5566', 0),
(3, 'a1083308', 1589782842, 19, '1589782842-a1083308-1', 0, 1, 'eafsegsh', 'thsdrhfagfhbsgnbvesrdgbdfthashaerhqwertyuiopoiuytrewertyuioiuytrew', 0),
(4, 'a1083308', 1589783303, 9, '1589783303-a1083308-1', 0, 1, 'eafsegsh', 'thsdrhfagfhbsgnbvesrdgbdfthashaerhqwertyuiopoiuytrewertyuioiuytrew', 0),
(24, 'a1083308', 1591349275, 2, '1591349275-a1083308-', 0, 0, '呱呱', 'cacacaccacacac', 0),
(41, 'a1083308', 1591379918, 0, '1591379918-a1083308-', 0, 0, 'dsfbdsfb', 'dfbfbfbbffb', 0),
(49, 'test0487', 1591423978, 1, '1591423978-test0487-3', 0, 3, '量子波動速讀', '有多家培訓機構聲稱「量子波動速讀」可利用「HSP高感知力」，能夠讓學員在5分鐘之內閱讀10萬字，甚至還能過目不忘等等。網際網路上有人發布北京某教育機構組織學生進行量子波動速讀比賽，有學生以極快的速度翻閱書本。一旁還有老師監督。視頻發布者稱，只需要不停翻書，就能閱讀、理解書本內容。該視頻還稱，此閱讀方法的原理在於「量子會跟量子產生糾纏」，過程中「會產生波粒二象性，通過眼睛作用於大腦，最後眼動腦動，讀完整本書。」此閱讀技術的培訓費用在半年6000元到終身26萬元之間不等。《北京青年報》推測分析，「量子波動速讀」想要包裝的物理學原理是利用量子波動「讓頭腦中產生動態影像」，以此「讓感知器官產生多維感受」。此外，還有兒童蒙上雙眼，通過「開發松果體」、打開「天眼」，從而直接「感知」書籍內容。深圳市福田區的培訓機構沐憶學堂稱該速讀技巧的原理是利用其「速讀腦波音頻」與右腦形成「共鳴」，從而達到開發右腦潛能的效果。在該機構2019年6月26日發布在微信公眾號的一篇文章《沐憶速讀——開啟全民閱讀大時代》中，沐憶學堂稱自己「通過有版權的訓練系統，以提升青少年專注力為前提，幫助孩子達到每分鐘萬字以上的閱讀水平」。也有北京的全腦教育培訓機構稱自己的課程中雖然推出「量子波動速讀」，但這只是個噱頭而已，與量子無關，「更像是升級版的快速閱讀」。\r\n經過媒體報導後，量子波動速讀引起中國大陸執法部門重視。10月16日，江蘇省鹽城市大豐區市場監管部門表示，已對聲稱能夠培訓「量子波動速讀」的教育機構進行現場調查，但未發現相關內容。監管部門對該機構其他不恰當宣傳進行拆除，並要求其進行整改。10月23日下午，深圳市市場監督管理局通報，經10月17日的檢查發現，沐憶學堂在起宣傳材料上發布的相關內容違規。該局對培訓機構發出詢問通知書，並持續立案調查。10月30日，深圳市教育局發布《關于禁止中小學生參加「量子波動速讀」培訓核查有關情況的通知》，禁止該市中小學生參加量子波動速讀的培訓，並組織培訓家長不要聽信培訓機構的誤導宣傳。\r\n2020年1月，中華人民共和國國務院教育督導委員會辦公室發布對培訓機構違規培訓的查處情況通報，其中，多家量子波動速讀培訓機構被關停。', 0),
(50, 'test0487', 1591425771, 0, '1591425771-test0487-2', 0, 2, '1+1=??', '0.9999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999', 0),
(51, 'test', 0, 7, '1591433305-test-5', 0, 5, 'adsdasdasdsad', 'asdsdsd333', 0),
(52, 'a1083308', 1591512306, 0, '1591380889-a1083308-5', 1, 5, ' ', 'acacacacac', 131417),
(53, 'test', 1591549170, 0, '1591549170-test-1', 0, 2, '04879487', '87878787878778878888777', 0),
(54, 'test', 1591627574, 0, '1589782842-a1083308-1', 1, 1, ' ', '1231131323', 1844732),
(55, 'test0487', 1591713680, 0, '1591713680-test0487-1', 0, 1, '99087', '8778787878', 0),
(56, 'test0487', 1591713697, 0, '1591713697-test0487-1', 0, 1, '5875649', '呵 呵 ', 0),
(57, 'test0487', 1591713721, 0, '1591713721-test0487-1', 0, 1, '拔ㄘ喔你', '8787', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `warn_save`
--

DROP TABLE IF EXISTS `warn_save`;
CREATE TABLE IF NOT EXISTS `warn_save` (
  `id` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `warn_id` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `reason` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `post_no` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `artical_no` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `indorse_no` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `no` int(100) NOT NULL AUTO_INCREMENT,
  `state` int(10) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=369 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `warn_save`
--

INSERT INTO `warn_save` (`id`, `warn_id`, `reason`, `post_no`, `artical_no`, `indorse_no`, `no`, `state`) VALUES
('test0487', 'a1083308', '3', '0', '1590908049-a1083308-1', 'test0487-a1083308-3', 357, 2),
('test0487', 'a1083308', '3', '0', '1589782842-a1083308-1', 'test0487-a1083308-3', 358, 2),
('test0487', 'test', '1', '0', '1591549170-test-1', 'test0487-test-1', 359, 0),
('test0487', 'a1083308', '1', '0', '1589782842-a1083308-1', 'test0487-a1083308-1', 360, 0),
('test0487', 'a1083308', '1', '0', '1589782842-a1083308-1', 'test0487-a1083308-1', 361, 0),
('test0487', '', '1', '', '', 'test0487--1', 362, 0),
('test0487', 'a1083308', '1', '0', '1589782842-a1083308-1', 'test0487-a1083308-1', 363, 0),
('test0487', 'a1083308', '1', '0', '1589782842-a1083308-1', 'test0487-a1083308-1', 364, 0),
('test0487', 'a1083308', '3', '0', '1589782842-a1083308-1', 'test0487-a1083308-3', 365, 2),
('test0487', 'a1083308', '3', '0', '1589782842-a1083308-1', 'test0487-a1083308-3', 366, 2),
('test0487', 'a1083308', '3', '0', '1589782842-a1083308-1', 'test0487-a1083308-3', 367, 2),
('test0487', 'a1083308', '1', '0', '1589782842-a1083308-1', 'test0487-a1083308-1', 368, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
