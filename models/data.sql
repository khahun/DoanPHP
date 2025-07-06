-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 12, 2025 lúc 04:06 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duy11`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `anhsp`
--

CREATE TABLE `anhsp` (
  `MaSP` int(11) NOT NULL,
  `Anh1` varchar(500) NOT NULL,
  `Anh2` varchar(500) DEFAULT NULL,
  `Anh3` varchar(500) DEFAULT NULL,
  `Anh4` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `anhsp`
--

INSERT INTO `anhsp` (`MaSP`, `Anh1`, `Anh2`, `Anh3`, `Anh4`) VALUES
(49, 'ADIDAS_4DFWD_BLACK.jpg', 'ADIDAS_4DFWD_BLACK1.jpg', 'ADIDAS_4DFWD_BLACK2.jpg', NULL),
(11, 'ADIDAS_ADICANE_CLOGS_BEGIE1.jpg', 'ADIDAS_ADICANE_CLOGS_BEGIE2.jpg', 'ADIDAS_ADICANE_CLOGS_BEGIE3.jpg', 'ADIDAS_ADICANE_CLOGS_BEGIE4.jpg'),
(12, 'ADIDAS_ADICANE_SLIDE_GREY1.jpg', 'ADIDAS_ADICANE_SLIDE_GREY2.jpg', 'ADIDAS_ADICANE_SLIDE_GREY3.jpg', 'ADIDAS_ADICANE_SLIDE_GREY4.jpg'),
(1, 'ADIDAS_ADICLOG_CREAM1.jpg', 'ADIDAS_ADICLOG_CREAM2.jpg', 'ADIDAS_ADICLOG_CREAM3.jpg', 'ADIDAS_ADICLOG_CREAM4.jpg'),
(15, 'ADIDAS_ADIFOM_ADILETTE_WHITE1.jpg', 'ADIDAS_ADIFOM_ADILETTE_WHITE2.jpg', 'ADIDAS_ADIFOM_ADILETTE_WHITE3.jpg', 'ADIDAS_ADIFOM_ADILETTE_WHITE4.jpg'),
(2, 'ADIDAS_ADIFOM_BLACK1.jpg', 'ADIDAS_ADIFOM_BLACK2.jpg', 'ADIDAS_ADIFOM_BLACK3.jpg', 'ADIDAS_ADIFOM_BLACK4.jpg'),
(13, 'ADIDAS_ADILETTE_22_GREY_SILVER_GREEN1.jpg', 'ADIDAS_ADILETTE_22_GREY_SILVER_GREEN2.jpg', 'ADIDAS_ADILETTE_22_GREY_SILVER_GREEN3.jpg', 'ADIDAS_ADILETTE_22_GREY_SILVER_GREEN4.jpg'),
(14, 'ADIDAS_ADILETTE_22_WHITE_BLACK1.jpg', 'ADIDAS_ADILETTE_22_WHITE_BLACK2.jpg', 'ADIDAS_ADILETTE_22_WHITE_BLACK3.jpg', NULL),
(3, 'ADIDAS_ADILETTE_AQUA_ARMY_GREEN1.jpg', 'ADIDAS_ADILETTE_AQUA_ARMY_GREEN2.jpg', 'ADIDAS_ADILETTE_AQUA_ARMY_GREEN3.jpg', 'ADIDAS_ADILETTE_AQUA_ARMY_GREEN4.jpg'),
(4, 'ADIDAS_ADILETTE_COMFORT_BLACK_WHITE.jpg', 'ADIDAS_ADILETTE_COMFORT_BLACK_WHITE1.jpg', 'ADIDAS_ADILETTE_COMFORT_BLACK_WHITE2.jpg', 'ADIDAS_ADILETTE_COMFORT_BLACK_WHITE3.jpg'),
(5, 'ADIDAS_ADILETTE_GT_NAVY_GOLD.jpg', 'ADIDAS_ADILETTE_GT_NAVY_GOLD1.jpg', 'ADIDAS_ADILETTE_GT_NAVY_GOLD2.jpg', 'ADIDAS_ADILETTE_GT_NAVY_GOLD3.jpg'),
(6, 'ADIDAS_ADILETTE_PRINT_BLACK_WHITE.jpg', 'ADIDAS_ADILETTE_PRINT_BLACK_WHITE1.jpg', 'ADIDAS_ADILETTE_PRINT_BLACK_WHITE2.jpg', 'ADIDAS_ADILETTE_PRINT_BLACK_WHITE3.jpg'),
(7, 'ADIDAS_ADILETTE_SLIDES_BLACK.jpg', NULL, NULL, NULL),
(8, 'ADIDAS_ADILETTE_WHITE_BLACK.jpg', NULL, NULL, NULL),
(39, 'ADIDAS_BREAKNET_BLACK_WHITE.jpg', 'ADIDAS_BREAKNET_BLACK_WHITE1.jpg', 'ADIDAS_BREAKNET_BLACK_WHITE2.jpg', NULL),
(50, 'ADIDAS_CAMPUS_00S_BE.jpg', 'ADIDAS_CAMPUS_00S_BE1.jpg', 'ADIDAS_CAMPUS_00S_BE2.jpg', NULL),
(51, 'ADIDAS_CAMPUS_00S_GREEN.jpg', 'ADIDAS_CAMPUS_00S_GREEN1.jpg', 'ADIDAS_CAMPUS_00S_GREEN2.jpg', NULL),
(40, 'ADIDAS_DURAMO_PINK_BEIGE_LEOPARD.jpg', 'ADIDAS_DURAMO_PINK_BEIGE_LEOPARD1.jpg', 'ADIDAS_DURAMO_PINK_BEIGE_LEOPARD2.jpg', NULL),
(9, 'ADIDAS_FLOW_SLIVER.jpg', NULL, NULL, NULL),
(52, 'ADIDAS_FORUM_PANDA.jpg', 'ADIDAS_FORUM_PANDA1.jpg', 'ADIDAS_FORUM_PANDA2.jpg', NULL),
(41, 'ADIDAS_GALAXY_WHITE_ORANGE_GREY.jpg', 'ADIDAS_GALAXY_WHITE_ORANGE_GREY1.jpg', 'ADIDAS_GALAXY_WHITE_ORANGE_GREY2.jpg', NULL),
(53, 'ADIDAS_GAZELLE_BOLD_BLACK.jpg', 'ADIDAS_GAZELLE_BOLD_BLACK1.jpg', 'ADIDAS_GAZELLE_BOLD_BLACK2.jpg', NULL),
(42, 'ADIDAS_HOOPS_WHITE_BLUE_BLACK.jpg', 'ADIDAS_HOOPS_WHITE_BLUE_BLACK1.jpg', 'ADIDAS_HOOPS_WHITE_BLUE_BLACK2.jpg', NULL),
(43, 'ADIDAS_KAPTIR_BROWN_BEIGE_PATTERN.jpg', 'ADIDAS_KAPTIR_BROWN_BEIGE_PATTERN1.jpg', 'ADIDAS_KAPTIR_BROWN_BEIGE_PATTERN2.jpg', NULL),
(44, 'ADIDAS_LITE_RACER_NAVY_RED_WHITE.jpg', 'ADIDAS_LITE_RACER_NAVY_RED_WHITE1.jpg', 'ADIDAS_LITE_RACER_NAVY_RED_WHITE2.jpg', NULL),
(45, 'ADIDAS_NIZA_PLATFORM_WHITE_PINK.jpg', 'ADIDAS_NIZA_PLATFORM_WHITE_PINK1.jpg', 'ADIDAS_NIZA_PLATFORM_WHITE_PINK2.jpg', NULL),
(46, 'ADIDAS_RUNFALCON_WHITE.jpg', 'ADIDAS_RUNFALCON_WHITE1.jpg', 'ADIDAS_RUNFALCON_WHITE2.jpg', NULL),
(47, 'ADIDAS_SAMBA_CLASSIC_WHITE_GREEN_GUM.jpg', 'ADIDAS_SAMBA_CLASSIC_WHITE_GREEN_GUM1.jpg', 'ADIDAS_SAMBA_CLASSIC_WHITE_GREEN_GUM2.jpg', NULL),
(54, 'ADIDAS_SAMBA_OG_WHITE_GREEN.jpg', 'ADIDAS_SAMBA_OG_WHITE_GREEN1.jpg', 'ADIDAS_SAMBA_OG_WHITE_GREEN2.jpg', NULL),
(48, 'ADIDAS_ULTRABOOST_BEIGE.jpg', 'ADIDAS_ULTRABOOST_BEIGE1.jpg', 'ADIDAS_ULTRABOOST_BEIGE2.jpg', NULL),
(10, 'ADIDAS_YEEZY_SLIDE_BEIGEE.jpg', 'ADIDAS_YEEZY_SLIDE_BEIGEE1.jpg', NULL, NULL),
(65, 'CONVERSE_ALL_STAR_BB_JET_WHITE_RED.jpg', 'CONVERSE_ALL_STAR_BB_JET_WHITE_RED1.jpg', 'CONVERSE_ALL_STAR_BB_JET_WHITE_RED2.jpg', NULL),
(66, 'CONVERSE_ALL_STAR_HIGH_WHITE_TRANSPARENT.jpg', 'CONVERSE_ALL_STAR_HIGH_WHITE_TRANSPARENT1.jpg', 'CONVERSE_ALL_STAR_HIGH_WHITE_TRANSPARENT2.jpg', NULL),
(67, 'CONVERSE_CHUCK_TAYLOR_GORETEX_BROWN_BLACK.jpg', 'CONVERSE_CHUCK_TAYLOR_GORETEX_BROWN_BLACK1.jpg', 'CONVERSE_CHUCK_TAYLOR_GORETEX_BROWN_BLACK2.jpg', NULL),
(68, 'CONVERSE_ERX_MID_RED_WHITE.jpg', 'CONVERSE_ERX_MID_RED_WHITE1.jpg', 'CONVERSE_ERX_MID_RED_WHITE2.jpg', NULL),
(69, 'CONVERSE_ERX_MID_WHITE_PURPLE.jpg', 'CONVERSE_ERX_MID_WHITE_PURPLE1.jpg', 'CONVERSE_ERX_MID_WHITE_PURPLE2.jpg', NULL),
(70, 'CONVERSE_JACK_PURCELL_BLACK_WHITE.jpg', 'CONVERSE_JACK_PURCELL_BLACK_WHITE1.jpg', 'CONVERSE_JACK_PURCELL_BLACK_WHITE2.jpg', NULL),
(71, 'CONVERSE_STAR_PLAYER_76_OLIVE_ORANGE.jpg', 'CONVERSE_STAR_PLAYER_76_OLIVE_ORANGE1.jpg', 'CONVERSE_STAR_PLAYER_76_OLIVE_ORANGE2.jpg', NULL),
(72, 'CONVERSE_STAR_PLAYER_BEIGE_OFFWHITE.jpg', 'CONVERSE_STAR_PLAYER_BEIGE_OFFWHITE1.jpg', 'CONVERSE_STAR_PLAYER_BEIGE_OFFWHITE2.jpg', NULL),
(73, 'CONVERSE_STAR_PLAYER_BLACK_WHITE_GUM.jpg', 'CONVERSE_STAR_PLAYER_BLACK_WHITE_GUM1.jpg', 'CONVERSE_STAR_PLAYER_BLACK_WHITE_GUM2.jpg', NULL),
(74, 'CONVERSE_STAR_PLAYER_BLACK_WHITE_GUMSOLE.jpg', 'CONVERSE_STAR_PLAYER_BLACK_WHITE_GUMSOLE1.jpg', 'CONVERSE_STAR_PLAYER_BLACK_WHITE_GUMSOLE2.jpg', NULL),
(55, 'FILA_COURT_ALL_WHITE.jpg', 'FILA_COURT_ALL_WHITE1.jpg', 'FILA_COURT_ALL_WHITE2.jpg', NULL),
(56, 'FILA_COURT_BLACK_RED_WHITE.jpg', 'FILA_COURT_BLACK_RED_WHITE1.jpg', 'FILA_COURT_BLACK_RED_WHITE2.jpg', NULL),
(57, 'FILA_COURT_CREAM_BLACK_RED.jpg', 'FILA_COURT_CREAM_BLACK_RED1.jpg', 'FILA_COURT_CREAM_BLACK_RED2.jpg', NULL),
(58, 'FILA_COURT_NAVY_WHITE.jpg', 'FILA_COURT_NAVY_WHITE1.jpg', 'FILA_COURT_NAVY_WHITE2.jpg', NULL),
(59, 'FILA_COURT_WHITE_BURGUNDY.jpg', 'FILA_COURT_WHITE_BURGUNDY1.jpg', 'FILA_COURT_WHITE_BURGUNDY2.jpg', NULL),
(60, 'FILA_COURT_WHITE_GREEN.jpg', 'FILA_COURT_WHITE_GREEN1.jpg', 'FILA_COURT_WHITE_GREEN2.jpg', NULL),
(61, 'FILA_DISRUPTOR_2_WHITE.jpg', 'FILA_DISRUPTOR_2_WHITE1.jpg', 'FILA_DISRUPTOR_2_WHITE2.jpg', NULL),
(62, 'FILA_OAKMONT_BEIGE_TAN.jpg', 'FILA_OAKMONT_BEIGE_TAN1.jpg', 'FILA_OAKMONT_BEIGE_TAN2.jpg', NULL),
(63, 'FILA_OAKMONT_BLACK.jpg', 'FILA_OAKMONT_BLACK1.jpg', 'FILA_OAKMONT_BLACK2.jpg', NULL),
(64, 'FILA_OAKMONT_WHITE_GOLD_PINK.jpg', 'FILA_OAKMONT_WHITE_GOLD_PINK1.jpg', 'FILA_OAKMONT_WHITE_GOLD_PINK2.jpg', NULL),
(75, 'NIKE_AIR_FORCE_1_WHITE_BLACK.jpg', 'NIKE_AIR_FORCE_1_WHITE_BLACK1.jpg', 'NIKE_AIR_FORCE_1_WHITE_BLACK2.jpg', NULL),
(77, 'NIKE_AIR_MAX_270_WHITE_BLACK.jpg', 'NIKE_AIR_MAX_270_WHITE_BLACK1.jpg', 'NIKE_AIR_MAX_270_WHITE_BLACK2.jpg', NULL),
(76, 'NIKE_AIR_MAX_90_BLUE_BLACK_WHITE.jpg', 'NIKE_AIR_MAX_90_BLUE_BLACK_WHITE1.jpg', 'NIKE_AIR_MAX_90_BLUE_BLACK_WHITE2.jpg', NULL),
(78, 'NIKE_AIR_ZOOM_PEGASUS_40_WHITE_BLUE.jpg', 'NIKE_AIR_ZOOM_PEGASUS_40_WHITE_BLUE1.jpg', 'NIKE_AIR_ZOOM_PEGASUS_40_WHITE_BLUE2.jpg', NULL),
(16, 'NIKE_ASUNA_SLIDE_GREY_BLACK.jpg', NULL, NULL, NULL),
(26, 'NIKE_CALM_MULE_BE.jpg', 'NIKE_CALM_MULE_BE1.jpg', 'NIKE_CALM_MULE_BE2.jpg', NULL),
(27, 'NIKE_CALM_SLIDE_BLACK.jpg', 'NIKE_CALM_SLIDE_BLACK1.jpg', 'NIKE_CALM_SLIDE_BLACK2.jpg', NULL),
(17, 'NIKE_CALM_SLIDE_CAMO_BEIGE.jpg', 'NIKE_CALM_SLIDE_CAMO_BEIGE1.jpg', 'NIKE_CALM_SLIDE_CAMO_BEIGE2.jpg', 'NIKE_CALM_SLIDE_CAMO_BEIGE3.jpg'),
(18, 'NIKE_CALM_SLIDE_PINK.jpg', 'NIKE_CALM_SLIDE_PINK1.jpg', 'NIKE_CALM_SLIDE_PINK2.jpg', 'NIKE_CALM_SLIDE_PINK3.jpg'),
(28, 'NIKE_CALM_SLIDE_WHITE.jpg', 'NIKE_CALM_SLIDE_WHITE1.jpg', 'NIKE_CALM_SLIDE_WHITE2.jpg', NULL),
(79, 'NIKE_COURT_AIR_ZOOM_VAPOR_PRO_BEIGE_NAVY.jpg', 'NIKE_COURT_AIR_ZOOM_VAPOR_PRO_BEIGE_NAVY1.jpg', 'NIKE_COURT_AIR_ZOOM_VAPOR_PRO_BEIGE_NAVY2.jpg', NULL),
(80, 'NIKE_DUNK_LOW_PANDA_BLACK_WHITE.jpg', 'NIKE_DUNK_LOW_PANDA_BLACK_WHITE1.jpg', 'NIKE_DUNK_LOW_PANDA_BLACK_WHITE2.jpg', NULL),
(19, 'NIKE_ISO_SLIDE_VOLT_BLACK.jpg', NULL, NULL, NULL),
(20, 'NIKE_KAWA_RED_BLACK.jpg', 'NIKE_KAWA_RED_BLACK1.jpg', 'NIKE_KAWA_RED_BLACK2.jpg', 'NIKE_KAWA_RED_BLACK3.jpg'),
(81, 'NIKE_KILL_SHOT_WHITE_NAVY_GUM.jpg', 'NIKE_KILL_SHOT_WHITE_NAVY_GUM1.jpg', 'NIKE_KILL_SHOT_WHITE_NAVY_GUM2.jpg', NULL),
(21, 'NIKE_LA_SLIDE_BLACK_BLUE.jpg', NULL, NULL, NULL),
(82, 'NIKE_P4000_WHITE_SILVER.jpg', 'NIKE_P4000_WHITE_SILVER1.jpg', 'NIKE_P4000_WHITE_SILVER2.jpg', NULL),
(83, 'NIKE_REACT_ESCAPE_RUN_BLACK_WHITE.jpg', 'NIKE_REACT_ESCAPE_RUN_BLACK_WHITE1.jpg', 'NIKE_REACT_ESCAPE_RUN_BLACK_WHITE2.jpg', NULL),
(22, 'NIKE_VICTORI_BLACK_GOLD.jpg', 'NIKE_VICTORI_BLACK_GOLD1.jpg', NULL, NULL),
(23, 'NIKE_VICTORI_BLACK_WHITE.jpg', 'NIKE_VICTORI_BLACK_WHITE1.jpg', 'NIKE_VICTORI_BLACK_WHITE2.jpg', 'NIKE_VICTORI_BLACK_WHITE3.jpg'),
(24, 'NIKE_VICTORI_BLACK_YELLOW.jpg', 'NIKE_VICTORI_BLACK_YELLOW1.jpg', 'NIKE_VICTORI_BLACK_YELLOW2.jpg', 'NIKE_VICTORI_BLACK_YELLOW3.jpg'),
(25, 'NIKE_VICTORI_WHITE_BLUE.jpg', 'NIKE_VICTORI_WHITE_BLUE1.jpg', NULL, NULL),
(84, 'NIKE_ZOOM_VOMERO_5_SILVER_GREY.jpg', 'NIKE_ZOOM_VOMERO_5_SILVER_GREY1.jpg', 'NIKE_ZOOM_VOMERO_5_SILVER_GREY2.jpg', NULL),
(29, 'PUMA_CALM_SLIDE_BEIGE.jpg', 'PUMA_CALM_SLIDE_BEIGE1.jpg', 'PUMA_CALM_SLIDE_BEIGE2.jpg', NULL),
(85, 'PUMA_CA_PRO_CLASSIC_CREAM_NAVY.jpg', 'PUMA_CA_PRO_CLASSIC_CREAM_NAVY1.jpg', 'PUMA_CA_PRO_CLASSIC_CREAM_NAVY2.jpg', NULL),
(86, 'PUMA_COURT_RIDER_RED_BLACK_GOLD.jpg', 'PUMA_COURT_RIDER_RED_BLACK_GOLD1.jpg', 'PUMA_COURT_RIDER_RED_BLACK_GOLD2.jpg', NULL),
(87, 'PUMA_DEVIATE_NITRO_WHITE_PINK_BLUE.jpg', 'PUMA_DEVIATE_NITRO_WHITE_PINK_BLUE1.jpg', 'PUMA_DEVIATE_NITRO_WHITE_PINK_BLUE2.jpg', NULL),
(88, 'PUMA_DEVIATE_NITRO_YELLOW_ORANGE_RED.jpg', 'PUMA_DEVIATE_NITRO_YELLOW_ORANGE_RED1.jpg', 'PUMA_DEVIATE_NITRO_YELLOW_ORANGE_RED2.jpg', NULL),
(89, 'PUMA_EVOSPEED_INDOOR_ORANGE_BLACK.jpg', 'PUMA_EVOSPEED_INDOOR_ORANGE_BLACK1.jpg', 'PUMA_EVOSPEED_INDOOR_ORANGE_BLACK2.jpg', NULL),
(90, 'PUMA_FOREVERRUN_NITRO_GREEN_LIME.jpg', 'PUMA_FOREVERRUN_NITRO_GREEN_LIME1.jpg', 'PUMA_FOREVERRUN_NITRO_GREEN_LIME2.jpg', NULL),
(91, 'PUMA_FOREVERRUN_NITRO_LIGHT_BLUE_GREY.jpg', 'PUMA_FOREVERRUN_NITRO_LIGHT_BLUE_GREY1.jpg', 'PUMA_FOREVERRUN_NITRO_LIGHT_BLUE_GREY2.jpg', NULL),
(96, 'PUMA_MULE_WHITE_PINK.jpg', 'PUMA_MULE_WHITE_PINK1.jpg', 'PUMA_MULE_WHITE_PINK2.jpg', NULL),
(92, 'PUMA_NRGY_COMET_PURPLE_YELLOW.jpg', 'PUMA_NRGY_COMET_PURPLE_YELLOW1.jpg', 'PUMA_NRGY_COMET_PURPLE_YELLOW2.jpg', NULL),
(30, 'PUMA_POPCAT_BLACK_GOLD.jpg', 'PUMA_POPCAT_BLACK_GOLD1.jpg', 'PUMA_POPCAT_BLACK_GOLD2.jpg', NULL),
(31, 'PUMA_POPCAT_BLACK_PINK.jpg', 'PUMA_POPCAT_BLACK_PINK1.jpg', 'PUMA_POPCAT_BLACK_PINK2.jpg', NULL),
(32, 'PUMA_POPCAT_LOGO_WHITE_BLUE_YELLOW.jpg', 'PUMA_POPCAT_LOGO_WHITE_BLUE_YELLOW1.jpg', 'PUMA_POPCAT_LOGO_WHITE_BLUE_YELLOW2.jpg', NULL),
(33, 'PUMA_POPCAT_WHITE_BLACK.jpg', 'PUMA_POPCAT_WHITE_BLACK1.jpg', 'PUMA_POPCAT_WHITE_BLACK2.jpg', NULL),
(95, 'PUMA_REBOUND_BLUE.jpg', 'PUMA_REBOUND_BLUE1.jpg', 'PUMA_REBOUND_BLUE2.jpg', NULL),
(97, 'PUMA_REBOUND_HAZE_CORAL.jpg', 'PUMA_REBOUND_HAZE_CORAL1.jpg', 'PUMA_REBOUND_HAZE_CORAL2.jpg', NULL),
(98, 'PUMA_RS-X3_PUZZLE_BLACK_WHITE.jpg', 'PUMA_RS-X3_PUZZLE_BLACK_WHITE1.jpg', 'PUMA_RS-X3_PUZZLE_BLACK_WHITE2.jpg', NULL),
(99, 'PUMA_RS-X3_PUZZLE_LIMESTONE.jpg', 'PUMA_RS-X3_PUZZLE_LIMESTONE1.jpg', 'PUMA_RS-X3_PUZZLE_LIMESTONE2.jpg', NULL),
(100, 'PUMA_RS-X3_PUZZLE_PINK.jpg', 'PUMA_RS-X3_PUZZLE_PINK1.jpg', 'PUMA_RS-X3_PUZZLE_PINK2.jpg', NULL),
(101, 'PUMA_RS-X3_PUZZLE_WHITE.jpg', 'PUMA_RS-X3_PUZZLE_WHITE1.jpg', 'PUMA_RS-X3_PUZZLE_WHITE2.jpg', NULL),
(102, 'PUMA_RS-X3_WHITE_RED.jpg', 'PUMA_RS-X3_WHITE_RED1.jpg', 'PUMA_RS-X3_WHITE_RED2.jpg', NULL),
(34, 'PUMA_SOFTFOAM_BLACK_WHITE.jpg', NULL, NULL, NULL),
(35, 'PUMA_SUEDE_SLIDE_BLACK_WHITE.jpg', 'PUMA_SUEDE_SLIDE_BLACK_WHITE1.jpg', 'PUMA_SUEDE_SLIDE_BLACK_WHITE2.jpg', NULL),
(38, 'PUMA_SUEDE_SLIDE_CREM_WHITE.jpg', 'PUMA_SUEDE_SLIDE_CREM_WHITE1.jpg', 'PUMA_SUEDE_SLIDE_CREM_WHITE2.jpg', NULL),
(36, 'PUMA_SUEDE_SLIDE_GREY_WHITE.jpg', 'PUMA_SUEDE_SLIDE_GREY_WHITE1.jpg', 'PUMA_SUEDE_SLIDE_GREY_WHITE2.jpg', NULL),
(37, 'PUMA_SUEDE_SLIDE_PINK_WHITE.jpg', 'PUMA_SUEDE_SLIDE_PINK_WHITE1.jpg', 'PUMA_SUEDE_SLIDE_PINK_WHITE2.jpg', NULL),
(93, 'PUMA_VELOCITY_NITRO_BLACK_GREEN.jpg', 'PUMA_VELOCITY_NITRO_BLACK_GREEN1.jpg', 'PUMA_VELOCITY_NITRO_BLACK_GREEN2.jpg', NULL),
(94, 'PUMA_VELOCITY_NITRO_BLACK_WHITE.jpg', 'PUMA_VELOCITY_NITRO_BLACK_WHITE1.jpg', 'PUMA_VELOCITY_NITRO_BLACK_WHITE2.jpg', NULL),
(113, 'REEBOK_CLUB_C_85_CLASSIC_CREAM.jpg', 'REEBOK_CLUB_C_85_CLASSIC_CREAM1.jpg', 'REEBOK_CLUB_C_85_CLASSIC_CREAM2.jpg', NULL),
(114, 'REEBOK_CLUB_C_85_CLASSIC_CREAM_GREEN.jpg', 'REEBOK_CLUB_C_85_CLASSIC_CREAM_GREEN1.jpg', 'REEBOK_CLUB_C_85_CLASSIC_CREAM_GREEN2.jpg', NULL),
(115, 'REEBOK_CLUB_C_85_CLASSIC_WHITE.jpg', 'REEBOK_CLUB_C_85_CLASSIC_WHITE1.jpg', 'REEBOK_CLUB_C_85_CLASSIC_WHITE2.jpg', NULL),
(116, 'REEBOK_CLUB_C_85_HICLOUD_WHITE_VECTOR_BLUE.jpg', 'REEBOK_CLUB_C_85_HICLOUD_WHITE_VECTOR_BLUE1.jpg', 'REEBOK_CLUB_C_85_HICLOUD_WHITE_VECTOR_BLUE2.jpg', NULL),
(117, 'REEBOK_CLUB_C_85_WHITE.jpg', 'REEBOK_CLUB_C_85_WHITE1.jpg', 'REEBOK_CLUB_C_85_WHITE2.jpg', NULL),
(120, 'REEBOK_CLUB_C_85_WHITE_BLUE.jpg', 'REEBOK_CLUB_C_85_WHITE_BLUE1.jpg', 'REEBOK_CLUB_C_85_WHITE_BLUE2.jpg', NULL),
(121, 'REEBOK_CLUB_C_85_WHITE_BROWN.jpg', 'REEBOK_CLUB_C_85_WHITE_BROWN1.jpg', 'REEBOK_CLUB_C_85_WHITE_BROWN2.jpg', NULL),
(118, 'REEBOK_CLUB_C_85_WHITE_CLASSIC_TEAL.jpg', 'REEBOK_CLUB_C_85_WHITE_CLASSIC_TEAL1.jpg', 'REEBOK_CLUB_C_85_WHITE_CLASSIC_TEAL2.jpg', NULL),
(119, 'REEBOK_CLUB_C_85_WHITE_CREAM_VEGAN.jpg', 'REEBOK_CLUB_C_85_WHITE_CREAM_VEGAN1.jpg', 'REEBOK_CLUB_C_85_WHITE_CREAM_VEGAN2.jpg', NULL),
(122, 'REEBOK_PUMP_FURY_WHITE_RED_YELLOW.jpg', 'REEBOK_PUMP_FURY_WHITE_RED_YELLOW1.jpg', 'REEBOK_PUMP_FURY_WHITE_RED_YELLOW2.jpg', NULL),
(103, 'VANS_AUTHENTIC_DEEP_GREEN_WHITE.jpg', 'VANS_AUTHENTIC_DEEP_GREEN_WHITE1.jpg', 'VANS_AUTHENTIC_DEEP_GREEN_WHITE2.jpg', NULL),
(104, 'VANS_AUTHENTIC_VINTAGE_WHITE_BLUE.jpg', 'VANS_AUTHENTIC_VINTAGE_WHITE_BLUE1.jpg', 'VANS_AUTHENTIC_VINTAGE_WHITE_BLUE2.jpg', NULL),
(105, 'VANS_OLD_SKOOL_BLACK_WHITE_SUEDE.jpg', 'VANS_OLD_SKOOL_BLACK_WHITE_SUEDE1.jpg', 'VANS_OLD_SKOOL_BLACK_WHITE_SUEDE2.jpg', NULL),
(106, 'VANS_OLD_SKOOL_BONE_WHITE_GREY.jpg', 'VANS_OLD_SKOOL_BONE_WHITE_GREY1.jpg', 'VANS_OLD_SKOOL_BONE_WHITE_GREY2.jpg', NULL),
(107, 'VANS_SK8_HI_BLACK_WHITE.jpg', 'VANS_SK8_HI_BLACK_WHITE1.jpg', 'VANS_SK8_HI_BLACK_WHITE2.jpg', NULL),
(108, 'VANS_SLIP_ON_CHECKERBOARD_BLACK_WHITE.jpg', 'VANS_SLIP_ON_CHECKERBOARD_BLACK_WHITE1.jpg', 'VANS_SLIP_ON_CHECKERBOARD_BLACK_WHITE2.jpg', NULL),
(109, 'VANS_SLIP_ON_FLANNEL_BROWN.jpg', 'VANS_SLIP_ON_FLANNEL_BROWN1.jpg', 'VANS_SLIP_ON_FLANNEL_BROWN2.jpg', NULL),
(110, 'VANS_STYLE_112_BLACK_WHITE.jpg', 'VANS_STYLE_112_BLACK_WHITE1.jpg', 'VANS_STYLE_112_BLACK_WHITE2.jpg', NULL),
(111, 'VANS_STYLE_112_BLUE_WHITE.jpg', 'VANS_STYLE_112_BLUE_WHITE1.jpg', 'VANS_STYLE_112_BLUE_WHITE2.jpg', NULL),
(112, 'VANS_STYLE_112_DELUXE_BLACK_WHITE.jpg', 'VANS_STYLE_112_DELUXE_BLACK_WHITE1.jpg', 'VANS_STYLE_112_DELUXE_BLACK_WHITE2.jpg', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `tieu_de` varchar(255) NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `lien_ket` varchar(255) DEFAULT NULL,
  `trang_thai` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `tieu_de`, `hinh_anh`, `lien_ket`, `trang_thai`) VALUES
(1, 'Giảm giá mùa hè', 'banner_summer.jpg', 'sanpham.php', 1),
(2, 'Hàng mới về', 'banner_new.jpg', 'sanpham.php?moi=1', 1),
(3, 'Khuyến mãi lớn', 'banner_sale.jpg', 'khuyenmai.php', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `MaBL` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `MaKH` int(11) NOT NULL,
  `NoiDung` text NOT NULL,
  `ThoiGian` datetime NOT NULL DEFAULT current_timestamp(),
  `DanhGia` int(11) DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`MaBL`, `MaSP`, `MaKH`, `NoiDung`, `ThoiGian`, `DanhGia`) VALUES
(1, 4, 1, 'Sản phẩm đẹp , chất lượng . ', '2019-10-27 00:00:00', 5),
(2, 4, 6, ' sản phẩm rất ok', '2019-10-27 20:58:25', 5),
(3, 4, 6, '  sản phẩm dùng tốt', '2019-10-27 23:29:35', 5),
(4, 4, 1, 'ok', '2019-10-29 14:38:48', 5),
(5, 4, 1, ' cho 5 sao', '2019-10-29 14:39:24', 5),
(6, 12, 1, 'a', '2019-10-31 14:41:10', 5),
(7, 4, 1, 'sản phẩm chất lượng', '2019-11-06 09:19:36', 5),
(8, 4, 1, 'toot', '2019-11-12 15:29:30', 5),
(9, 4, 1, 'ok', '2019-11-12 15:31:12', 5),
(10, 4, 1, 'ok', '2019-11-12 15:31:51', 5),
(11, 4, 1, 'ok', '2019-11-12 15:32:20', 5),
(12, 5, 1, 'ok', '2019-11-13 09:15:31', 5),
(14, 5, 1, 'sản phẩm tốt', '2019-12-18 17:12:34', 5),
(15, 10, 1, 'Rất đẹp', '2020-01-10 14:19:19', 5),
(16, 4, 6, 'a', '2023-06-12 13:54:02', 5),
(17, 4, 6, 'a', '2023-06-12 13:54:31', 5),
(18, 4, 6, 'test', '2023-06-12 13:54:56', 5),
(19, 4, 6, 'okii nò', '2023-06-12 13:55:12', 5),
(20, 4, 1, 'oki', '2023-06-21 08:24:14', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cau_hoi_thuong_gap`
--

CREATE TABLE `cau_hoi_thuong_gap` (
  `id` int(11) NOT NULL,
  `cau_hoi` text NOT NULL,
  `tra_loi` text NOT NULL,
  `trang_thai` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cau_hoi_thuong_gap`
--

INSERT INTO `cau_hoi_thuong_gap` (`id`, `cau_hoi`, `tra_loi`, `trang_thai`) VALUES
(1, 'Làm sao để đặt hàng?', 'Bạn có thể đặt hàng qua website bằng cách chọn sản phẩm và nhấn nút \"Thêm vào giỏ hàng\".', 1),
(2, 'Chính sách đổi trả như thế nào?', 'Chúng tôi hỗ trợ đổi trả trong vòng 7 ngày kể từ khi nhận hàng.', 1),
(3, 'Có cần đăng nhập để mua hàng không?', 'Không bắt buộc, nhưng đăng nhập sẽ giúp bạn theo dõi đơn hàng dễ dàng hơn.', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MaHD` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` decimal(10,0) NOT NULL,
  `ThanhTien` decimal(10,0) NOT NULL,
  `Size` int(11) NOT NULL,
  `MaMau` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MaHD`, `MaSP`, `SoLuong`, `DonGia`, `ThanhTien`, `Size`, `MaMau`) VALUES
(91, 1, 1, 985000, 985000, 37, 'Kem');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietsanpham`
--

CREATE TABLE `chitietsanpham` (
  `MaSP` int(11) NOT NULL,
  `MaSize` int(11) NOT NULL,
  `MaMau` varchar(50) NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietsanpham`
--

INSERT INTO `chitietsanpham` (`MaSP`, `MaSize`, `MaMau`, `SoLuong`) VALUES
(1, 36, 'Kem', 68),
(1, 37, 'Kem', 75),
(1, 38, 'Kem', 60),
(1, 39, 'Kem', 72),
(1, 40, 'Kem', 55),
(1, 41, 'Kem', 80),
(1, 42, 'Kem', 65),
(1, 43, 'Kem', 78),
(2, 36, 'Đen', 72),
(2, 37, 'Đen', 58),
(2, 38, 'Đen', 81),
(2, 39, 'Đen', 63),
(2, 40, 'Đen', 77),
(2, 41, 'Đen', 52),
(2, 42, 'Đen', 85),
(2, 43, 'Đen', 69),
(3, 36, 'Xanh Lá', 66),
(3, 37, 'Xanh Lá', 79),
(3, 38, 'Xanh Lá', 54),
(3, 39, 'Xanh Lá', 70),
(3, 40, 'Xanh Lá', 61),
(3, 41, 'Xanh Lá', 88),
(3, 42, 'Xanh Lá', 49),
(3, 43, 'Xanh Lá', 74),
(4, 36, 'Đen - Trắng', 80),
(4, 37, 'Đen - Trắng', 64),
(4, 38, 'Đen - Trắng', 93),
(4, 39, 'Đen - Trắng', 57),
(4, 40, 'Đen - Trắng', 82),
(4, 41, 'Đen - Trắng', 68),
(4, 42, 'Đen - Trắng', 95),
(4, 43, 'Đen - Trắng', 60),
(5, 36, 'Xanh Dương', 75),
(5, 37, 'Xanh Dương', 60),
(5, 38, 'Xanh Dương', 85),
(5, 39, 'Xanh Dương', 69),
(5, 40, 'Xanh Dương', 73),
(5, 41, 'Xanh Dương', 55),
(5, 42, 'Xanh Dương', 90),
(5, 43, 'Xanh Dương', 65),
(6, 36, 'Đen - Trắng', 69),
(6, 37, 'Đen - Trắng', 83),
(6, 38, 'Đen - Trắng', 58),
(6, 39, 'Đen - Trắng', 72),
(6, 40, 'Đen - Trắng', 65),
(6, 41, 'Đen - Trắng', 92),
(6, 42, 'Đen - Trắng', 53),
(6, 43, 'Đen - Trắng', 78),
(7, 36, 'Đen', 82),
(7, 37, 'Đen', 67),
(7, 38, 'Đen', 96),
(7, 39, 'Đen', 61),
(7, 40, 'Đen', 86),
(7, 41, 'Đen', 71),
(7, 42, 'Đen', 99),
(7, 43, 'Đen', 63),
(8, 36, 'Trắng - Đen', 78),
(8, 37, 'Trắng - Đen', 62),
(8, 38, 'Trắng - Đen', 91),
(8, 39, 'Trắng - Đen', 55),
(8, 40, 'Trắng - Đen', 80),
(8, 41, 'Trắng - Đen', 65),
(8, 42, 'Trắng - Đen', 94),
(8, 43, 'Trắng - Đen', 58),
(9, 36, 'Bạc', 63),
(9, 37, 'Bạc', 77),
(9, 38, 'Bạc', 52),
(9, 39, 'Bạc', 68),
(9, 40, 'Bạc', 59),
(9, 41, 'Bạc', 85),
(9, 42, 'Bạc', 47),
(9, 43, 'Bạc', 72),
(10, 36, 'Be', 85),
(10, 37, 'Be', 70),
(10, 38, 'Be', 99),
(10, 39, 'Be', 64),
(10, 40, 'Be', 89),
(10, 41, 'Be', 74),
(10, 42, 'Be', 102),
(10, 43, 'Be', 67),
(11, 36, 'Be', 70),
(11, 37, 'Be', 55),
(11, 38, 'Be', 80),
(11, 39, 'Be', 65),
(11, 40, 'Be', 72),
(11, 41, 'Be', 58),
(11, 42, 'Be', 83),
(11, 43, 'Be', 68),
(12, 36, 'Xám', 76),
(12, 37, 'Xám', 61),
(12, 38, 'Xám', 86),
(12, 39, 'Xám', 71),
(12, 40, 'Xám', 78),
(12, 41, 'Xám', 64),
(12, 42, 'Xám', 89),
(12, 43, 'Xám', 74),
(13, 36, 'Đa sắc', 64),
(13, 37, 'Đa sắc', 79),
(13, 38, 'Đa sắc', 54),
(13, 39, 'Đa sắc', 70),
(13, 40, 'Đa sắc', 61),
(13, 41, 'Đa sắc', 87),
(13, 42, 'Đa sắc', 49),
(13, 43, 'Đa sắc', 75),
(14, 36, 'Trắng - Đen', 88),
(14, 37, 'Trắng - Đen', 73),
(14, 38, 'Trắng - Đen', 102),
(14, 39, 'Trắng - Đen', 67),
(14, 40, 'Trắng - Đen', 92),
(14, 41, 'Trắng - Đen', 77),
(14, 42, 'Trắng - Đen', 105),
(14, 43, 'Trắng - Đen', 70),
(15, 36, 'Trắng', 73),
(15, 37, 'Trắng', 58),
(15, 38, 'Trắng', 83),
(15, 39, 'Trắng', 68),
(15, 40, 'Trắng', 75),
(15, 41, 'Trắng', 61),
(15, 42, 'Trắng', 86),
(15, 43, 'Trắng', 71),
(16, 36, 'Xám - Đen', 79),
(16, 37, 'Xám - Đen', 64),
(16, 38, 'Xám - Đen', 89),
(16, 39, 'Xám - Đen', 74),
(16, 40, 'Xám - Đen', 81),
(16, 41, 'Xám - Đen', 67),
(16, 42, 'Xám - Đen', 92),
(16, 43, 'Xám - Đen', 77),
(17, 36, 'Nâu - Be', 67),
(17, 37, 'Nâu - Be', 82),
(17, 38, 'Nâu - Be', 57),
(17, 39, 'Nâu - Be', 73),
(17, 40, 'Nâu - Be', 64),
(17, 41, 'Nâu - Be', 90),
(17, 42, 'Nâu - Be', 51),
(17, 43, 'Nâu - Be', 78),
(18, 36, 'Hồng', 91),
(18, 37, 'Hồng', 76),
(18, 38, 'Hồng', 105),
(18, 39, 'Hồng', 70),
(18, 40, 'Hồng', 95),
(18, 41, 'Hồng', 80),
(18, 42, 'Hồng', 108),
(18, 43, 'Hồng', 73),
(19, 36, 'Đen', 74),
(19, 37, 'Đen', 59),
(19, 38, 'Đen', 84),
(19, 39, 'Đen', 69),
(19, 40, 'Đen', 76),
(19, 41, 'Đen', 62),
(19, 42, 'Đen', 87),
(19, 43, 'Đen', 72),
(20, 36, 'Đỏ - Đen', 80),
(20, 37, 'Đỏ - Đen', 65),
(20, 38, 'Đỏ - Đen', 90),
(20, 39, 'Đỏ - Đen', 75),
(20, 40, 'Đỏ - Đen', 82),
(20, 41, 'Đỏ - Đen', 68),
(20, 42, 'Đỏ - Đen', 93),
(20, 43, 'Đỏ - Đen', 78),
(21, 36, 'Đen', 83),
(21, 37, 'Đen', 68),
(21, 38, 'Đen', 93),
(21, 39, 'Đen', 78),
(21, 40, 'Đen', 85),
(21, 41, 'Đen', 71),
(21, 42, 'Đen', 96),
(21, 43, 'Đen', 81),
(22, 36, 'Đen', 70),
(22, 37, 'Đen', 55),
(22, 38, 'Đen', 80),
(22, 39, 'Đen', 65),
(22, 40, 'Đen', 72),
(22, 41, 'Đen', 58),
(22, 42, 'Đen', 83),
(22, 43, 'Đen', 68),
(23, 36, 'Đen - Trắng', 95),
(23, 37, 'Đen - Trắng', 80),
(23, 38, 'Đen - Trắng', 110),
(23, 39, 'Đen - Trắng', 75),
(23, 40, 'Đen - Trắng', 100),
(23, 41, 'Đen - Trắng', 85),
(23, 42, 'Đen - Trắng', 113),
(23, 43, 'Đen - Trắng', 78),
(24, 36, 'Đen', 78),
(24, 37, 'Đen', 63),
(24, 38, 'Đen', 88),
(24, 39, 'Đen', 73),
(24, 40, 'Đen', 80),
(24, 41, 'Đen', 66),
(24, 42, 'Đen', 91),
(24, 43, 'Đen', 76),
(25, 36, 'Trắng', 82),
(25, 37, 'Trắng', 67),
(25, 38, 'Trắng', 92),
(25, 39, 'Trắng', 77),
(25, 40, 'Trắng', 84),
(25, 41, 'Trắng', 70),
(25, 42, 'Trắng', 95),
(25, 43, 'Trắng', 80),
(26, 36, 'Be', 88),
(26, 37, 'Be', 73),
(26, 38, 'Be', 98),
(26, 39, 'Be', 83),
(26, 40, 'Be', 90),
(26, 41, 'Be', 76),
(26, 42, 'Be', 101),
(26, 43, 'Be', 86),
(27, 36, 'Đen', 75),
(27, 37, 'Đen', 60),
(27, 38, 'Đen', 85),
(27, 39, 'Đen', 70),
(27, 40, 'Đen', 77),
(27, 41, 'Đen', 63),
(27, 42, 'Đen', 88),
(27, 43, 'Đen', 73),
(28, 36, 'Trắng', 92),
(28, 37, 'Trắng', 77),
(28, 38, 'Trắng', 102),
(28, 39, 'Trắng', 87),
(28, 40, 'Trắng', 94),
(28, 41, 'Trắng', 80),
(28, 42, 'Trắng', 105),
(28, 43, 'Trắng', 90),
(29, 36, 'Be', 80),
(29, 37, 'Be', 65),
(29, 38, 'Be', 90),
(29, 39, 'Be', 75),
(29, 40, 'Be', 82),
(29, 41, 'Be', 68),
(29, 42, 'Be', 93),
(29, 43, 'Be', 78),
(30, 36, 'Đen', 85),
(30, 37, 'Đen', 70),
(30, 38, 'Đen', 95),
(30, 39, 'Đen', 80),
(30, 40, 'Đen', 87),
(30, 41, 'Đen', 73),
(30, 42, 'Đen', 98),
(30, 43, 'Đen', 83),
(31, 36, 'Đen', 90),
(31, 37, 'Đen', 75),
(31, 38, 'Đen', 100),
(31, 39, 'Đen', 85),
(31, 40, 'Đen', 92),
(31, 41, 'Đen', 78),
(31, 42, 'Đen', 103),
(31, 43, 'Đen', 88),
(32, 36, 'Đa sắc', 78),
(32, 37, 'Đa sắc', 63),
(32, 38, 'Đa sắc', 88),
(32, 39, 'Đa sắc', 73),
(32, 40, 'Đa sắc', 80),
(32, 41, 'Đa sắc', 66),
(32, 42, 'Đa sắc', 91),
(32, 43, 'Đa sắc', 76),
(33, 36, 'Trắng - Đen', 93),
(33, 37, 'Trắng - Đen', 78),
(33, 38, 'Trắng - Đen', 103),
(33, 39, 'Trắng - Đen', 88),
(33, 40, 'Trắng - Đen', 95),
(33, 41, 'Trắng - Đen', 81),
(33, 42, 'Trắng - Đen', 106),
(33, 43, 'Trắng - Đen', 91),
(34, 36, 'Đen - Trắng', 82),
(34, 37, 'Đen - Trắng', 67),
(34, 38, 'Đen - Trắng', 92),
(34, 39, 'Đen - Trắng', 77),
(34, 40, 'Đen - Trắng', 84),
(34, 41, 'Đen - Trắng', 70),
(34, 42, 'Đen - Trắng', 95),
(34, 43, 'Đen - Trắng', 80),
(35, 36, 'Đen - Trắng', 87),
(35, 37, 'Đen - Trắng', 72),
(35, 38, 'Đen - Trắng', 97),
(35, 39, 'Đen - Trắng', 82),
(35, 40, 'Đen - Trắng', 89),
(35, 41, 'Đen - Trắng', 75),
(35, 42, 'Đen - Trắng', 100),
(35, 43, 'Đen - Trắng', 85),
(36, 36, 'Xám - Trắng', 91),
(36, 37, 'Xám - Trắng', 76),
(36, 38, 'Xám - Trắng', 101),
(36, 39, 'Xám - Trắng', 86),
(36, 40, 'Xám - Trắng', 93),
(36, 41, 'Xám - Trắng', 79),
(36, 42, 'Xám - Trắng', 104),
(36, 43, 'Xám - Trắng', 89),
(37, 36, 'Hồng - Trắng', 84),
(37, 37, 'Hồng - Trắng', 69),
(37, 38, 'Hồng - Trắng', 94),
(37, 39, 'Hồng - Trắng', 79),
(37, 40, 'Hồng - Trắng', 86),
(37, 41, 'Hồng - Trắng', 72),
(37, 42, 'Hồng - Trắng', 97),
(37, 43, 'Hồng - Trắng', 82),
(38, 36, 'Kem - Trắng', 89),
(38, 37, 'Kem - Trắng', 74),
(38, 38, 'Kem - Trắng', 99),
(38, 39, 'Kem - Trắng', 84),
(38, 40, 'Kem - Trắng', 91),
(38, 41, 'Kem - Trắng', 77),
(38, 42, 'Kem - Trắng', 102),
(38, 43, 'Kem - Trắng', 87),
(39, 36, 'Đen - Trắng', 76),
(39, 37, 'Đen - Trắng', 61),
(39, 38, 'Đen - Trắng', 86),
(39, 39, 'Đen - Trắng', 71),
(39, 40, 'Đen - Trắng', 78),
(39, 41, 'Đen - Trắng', 64),
(39, 42, 'Đen - Trắng', 89),
(39, 43, 'Đen - Trắng', 74),
(40, 36, 'Đa sắc', 94),
(40, 37, 'Đa sắc', 79),
(40, 38, 'Đa sắc', 104),
(40, 39, 'Đa sắc', 89),
(40, 40, 'Đa sắc', 96),
(40, 41, 'Đa sắc', 82),
(40, 42, 'Đa sắc', 107),
(40, 43, 'Đa sắc', 92),
(41, 36, 'Đa sắc', 81),
(41, 37, 'Đa sắc', 66),
(41, 38, 'Đa sắc', 91),
(41, 39, 'Đa sắc', 76),
(41, 40, 'Đa sắc', 83),
(41, 41, 'Đa sắc', 69),
(41, 42, 'Đa sắc', 94),
(41, 43, 'Đa sắc', 79),
(42, 36, 'Đa sắc', 86),
(42, 37, 'Đa sắc', 71),
(42, 38, 'Đa sắc', 96),
(42, 39, 'Đa sắc', 81),
(42, 40, 'Đa sắc', 88),
(42, 41, 'Đa sắc', 74),
(42, 42, 'Đa sắc', 99),
(42, 43, 'Đa sắc', 84),
(43, 36, 'Đa sắc', 90),
(43, 37, 'Đa sắc', 75),
(43, 38, 'Đa sắc', 100),
(43, 39, 'Đa sắc', 85),
(43, 40, 'Đa sắc', 92),
(43, 41, 'Đa sắc', 78),
(43, 42, 'Đa sắc', 103),
(43, 43, 'Đa sắc', 88),
(44, 36, 'Đa sắc', 79),
(44, 37, 'Đa sắc', 64),
(44, 38, 'Đa sắc', 89),
(44, 39, 'Đa sắc', 74),
(44, 40, 'Đa sắc', 81),
(44, 41, 'Đa sắc', 67),
(44, 42, 'Đa sắc', 92),
(44, 43, 'Đa sắc', 77),
(45, 36, 'Trắng - Hồng', 95),
(45, 37, 'Trắng - Hồng', 80),
(45, 38, 'Trắng - Hồng', 105),
(45, 39, 'Trắng - Hồng', 90),
(45, 40, 'Trắng - Hồng', 97),
(45, 41, 'Trắng - Hồng', 83),
(45, 42, 'Trắng - Hồng', 108),
(45, 43, 'Trắng - Hồng', 93),
(46, 36, 'Trắng', 83),
(46, 37, 'Trắng', 68),
(46, 38, 'Trắng', 93),
(46, 39, 'Trắng', 78),
(46, 40, 'Trắng', 85),
(46, 41, 'Trắng', 71),
(46, 42, 'Trắng', 96),
(46, 43, 'Trắng', 81),
(47, 36, 'Trắng - Xanh Lá', 88),
(47, 37, 'Trắng - Xanh Lá', 73),
(47, 38, 'Trắng - Xanh Lá', 98),
(47, 39, 'Trắng - Xanh Lá', 83),
(47, 40, 'Trắng - Xanh Lá', 90),
(47, 41, 'Trắng - Xanh Lá', 76),
(47, 42, 'Trắng - Xanh Lá', 101),
(47, 43, 'Trắng - Xanh Lá', 86),
(48, 36, 'Be', 92),
(48, 37, 'Be', 77),
(48, 38, 'Be', 102),
(48, 39, 'Be', 87),
(48, 40, 'Be', 94),
(48, 41, 'Be', 80),
(48, 42, 'Be', 105),
(48, 43, 'Be', 90),
(49, 36, 'Đen', 80),
(49, 37, 'Đen', 65),
(49, 38, 'Đen', 90),
(49, 39, 'Đen', 75),
(49, 40, 'Đen', 82),
(49, 41, 'Đen', 68),
(49, 42, 'Đen', 93),
(49, 43, 'Đen', 78),
(50, 36, 'Be', 96),
(50, 37, 'Be', 81),
(50, 38, 'Be', 106),
(50, 39, 'Be', 91),
(50, 40, 'Be', 98),
(50, 41, 'Be', 84),
(50, 42, 'Be', 109),
(50, 43, 'Be', 94),
(51, 36, 'Xanh Lá', 84),
(51, 37, 'Xanh Lá', 69),
(51, 38, 'Xanh Lá', 94),
(51, 39, 'Xanh Lá', 79),
(51, 40, 'Xanh Lá', 86),
(51, 41, 'Xanh Lá', 72),
(51, 42, 'Xanh Lá', 97),
(51, 43, 'Xanh Lá', 82),
(52, 36, 'Đen - Trắng', 89),
(52, 37, 'Đen - Trắng', 74),
(52, 38, 'Đen - Trắng', 99),
(52, 39, 'Đen - Trắng', 84),
(52, 40, 'Đen - Trắng', 91),
(52, 41, 'Đen - Trắng', 77),
(52, 42, 'Đen - Trắng', 102),
(52, 43, 'Đen - Trắng', 87),
(53, 36, 'Đen - Trắng', 93),
(53, 37, 'Đen - Trắng', 78),
(53, 38, 'Đen - Trắng', 103),
(53, 39, 'Đen - Trắng', 88),
(53, 40, 'Đen - Trắng', 95),
(53, 41, 'Đen - Trắng', 81),
(53, 42, 'Đen - Trắng', 106),
(53, 43, 'Đen - Trắng', 91),
(54, 36, 'Trắng - Xanh Lá', 81),
(54, 37, 'Trắng - Xanh Lá', 66),
(54, 38, 'Trắng - Xanh Lá', 91),
(54, 39, 'Trắng - Xanh Lá', 76),
(54, 40, 'Trắng - Xanh Lá', 83),
(54, 41, 'Trắng - Xanh Lá', 69),
(54, 42, 'Trắng - Xanh Lá', 94),
(54, 43, 'Trắng - Xanh Lá', 79),
(55, 36, 'Trắng', 97),
(55, 37, 'Trắng', 82),
(55, 38, 'Trắng', 107),
(55, 39, 'Trắng', 92),
(55, 40, 'Trắng', 99),
(55, 41, 'Trắng', 85),
(55, 42, 'Trắng', 110),
(55, 43, 'Trắng', 95),
(56, 36, 'Đen - Trắng', 85),
(56, 37, 'Đen - Trắng', 70),
(56, 38, 'Đen - Trắng', 95),
(56, 39, 'Đen - Trắng', 80),
(56, 40, 'Đen - Trắng', 87),
(56, 41, 'Đen - Trắng', 73),
(56, 42, 'Đen - Trắng', 98),
(56, 43, 'Đen - Trắng', 83),
(57, 36, 'Kem - Đen', 90),
(57, 37, 'Kem - Đen', 75),
(57, 38, 'Kem - Đen', 100),
(57, 39, 'Kem - Đen', 85),
(57, 40, 'Kem - Đen', 92),
(57, 41, 'Kem - Đen', 78),
(57, 42, 'Kem - Đen', 103),
(57, 43, 'Kem - Đen', 88),
(58, 36, 'Xanh Dương', 82),
(58, 37, 'Xanh Dương', 67),
(58, 38, 'Xanh Dương', 92),
(58, 39, 'Xanh Dương', 77),
(58, 40, 'Xanh Dương', 84),
(58, 41, 'Xanh Dương', 70),
(58, 42, 'Xanh Dương', 95),
(58, 43, 'Xanh Dương', 80),
(59, 36, 'Trắng', 98),
(59, 37, 'Trắng', 83),
(59, 38, 'Trắng', 108),
(59, 39, 'Trắng', 93),
(59, 40, 'Trắng', 100),
(59, 41, 'Trắng', 86),
(59, 42, 'Trắng', 111),
(59, 43, 'Trắng', 96),
(60, 36, 'Trắng - Xanh Lá', 86),
(60, 37, 'Trắng - Xanh Lá', 71),
(60, 38, 'Trắng - Xanh Lá', 96),
(60, 39, 'Trắng - Xanh Lá', 81),
(60, 40, 'Trắng - Xanh Lá', 88),
(60, 41, 'Trắng - Xanh Lá', 74),
(60, 42, 'Trắng - Xanh Lá', 99),
(60, 43, 'Trắng - Xanh Lá', 84),
(61, 36, 'Trắng', 91),
(61, 37, 'Trắng', 76),
(61, 38, 'Trắng', 101),
(61, 39, 'Trắng', 86),
(61, 40, 'Trắng', 93),
(61, 41, 'Trắng', 79),
(61, 42, 'Trắng', 104),
(61, 43, 'Trắng', 89),
(62, 36, 'Be', 83),
(62, 37, 'Be', 68),
(62, 38, 'Be', 93),
(62, 39, 'Be', 78),
(62, 40, 'Be', 85),
(62, 41, 'Be', 71),
(62, 42, 'Be', 96),
(62, 43, 'Be', 81),
(63, 36, 'Đen', 99),
(63, 37, 'Đen', 84),
(63, 38, 'Đen', 109),
(63, 39, 'Đen', 94),
(63, 40, 'Đen', 101),
(63, 41, 'Đen', 87),
(63, 42, 'Đen', 112),
(63, 43, 'Đen', 97),
(64, 36, 'Đa sắc', 87),
(64, 37, 'Đa sắc', 72),
(64, 38, 'Đa sắc', 97),
(64, 39, 'Đa sắc', 82),
(64, 40, 'Đa sắc', 89),
(64, 41, 'Đa sắc', 75),
(64, 42, 'Đa sắc', 100),
(64, 43, 'Đa sắc', 85),
(65, 36, 'Trắng - Đỏ', 94),
(65, 37, 'Trắng - Đỏ', 79),
(65, 38, 'Trắng - Đỏ', 104),
(65, 39, 'Trắng - Đỏ', 89),
(65, 40, 'Trắng - Đỏ', 96),
(65, 41, 'Trắng - Đỏ', 82),
(65, 42, 'Trắng - Đỏ', 107),
(65, 43, 'Trắng - Đỏ', 92),
(66, 36, 'Trắng', 88),
(66, 37, 'Trắng', 73),
(66, 38, 'Trắng', 98),
(66, 39, 'Trắng', 83),
(66, 40, 'Trắng', 90),
(66, 41, 'Trắng', 76),
(66, 42, 'Trắng', 101),
(66, 43, 'Trắng', 86),
(67, 36, 'Nâu - Đen', 92),
(67, 37, 'Nâu - Đen', 77),
(67, 38, 'Nâu - Đen', 102),
(67, 39, 'Nâu - Đen', 87),
(67, 40, 'Nâu - Đen', 94),
(67, 41, 'Nâu - Đen', 80),
(67, 42, 'Nâu - Đen', 105),
(67, 43, 'Nâu - Đen', 90),
(68, 36, 'Đỏ - Trắng', 80),
(68, 37, 'Đỏ - Trắng', 65),
(68, 38, 'Đỏ - Trắng', 90),
(68, 39, 'Đỏ - Trắng', 75),
(68, 40, 'Đỏ - Trắng', 82),
(68, 41, 'Đỏ - Trắng', 68),
(68, 42, 'Đỏ - Trắng', 93),
(68, 43, 'Đỏ - Trắng', 78),
(69, 36, 'Trắng - Tím', 100),
(69, 37, 'Trắng - Tím', 85),
(69, 38, 'Trắng - Tím', 110),
(69, 39, 'Trắng - Tím', 95),
(69, 40, 'Trắng - Tím', 102),
(69, 41, 'Trắng - Tím', 88),
(69, 42, 'Trắng - Tím', 113),
(69, 43, 'Trắng - Tím', 98),
(70, 36, 'Đen - Trắng', 86),
(70, 37, 'Đen - Trắng', 71),
(70, 38, 'Đen - Trắng', 96),
(70, 39, 'Đen - Trắng', 81),
(70, 40, 'Đen - Trắng', 88),
(70, 41, 'Đen - Trắng', 74),
(70, 42, 'Đen - Trắng', 99),
(70, 43, 'Đen - Trắng', 84),
(71, 36, 'Xanh Lá', 91),
(71, 37, 'Xanh Lá', 76),
(71, 38, 'Xanh Lá', 101),
(71, 39, 'Xanh Lá', 86),
(71, 40, 'Xanh Lá', 93),
(71, 41, 'Xanh Lá', 79),
(71, 42, 'Xanh Lá', 104),
(71, 43, 'Xanh Lá', 89),
(72, 36, 'Be', 95),
(72, 37, 'Be', 80),
(72, 38, 'Be', 105),
(72, 39, 'Be', 90),
(72, 40, 'Be', 97),
(72, 41, 'Be', 83),
(72, 42, 'Be', 108),
(72, 43, 'Be', 93),
(73, 36, 'Đen - Trắng', 83),
(73, 37, 'Đen - Trắng', 68),
(73, 38, 'Đen - Trắng', 93),
(73, 39, 'Đen - Trắng', 78),
(73, 40, 'Đen - Trắng', 85),
(73, 41, 'Đen - Trắng', 71),
(73, 42, 'Đen - Trắng', 96),
(73, 43, 'Đen - Trắng', 81),
(74, 36, 'Đen - Trắng', 88),
(74, 37, 'Đen - Trắng', 73),
(74, 38, 'Đen - Trắng', 98),
(74, 39, 'Đen - Trắng', 83),
(74, 40, 'Đen - Trắng', 90),
(74, 41, 'Đen - Trắng', 76),
(74, 42, 'Đen - Trắng', 101),
(74, 43, 'Đen - Trắng', 86),
(75, 36, 'Trắng - Đen', 101),
(75, 37, 'Trắng - Đen', 86),
(75, 38, 'Trắng - Đen', 111),
(75, 39, 'Trắng - Đen', 96),
(75, 40, 'Trắng - Đen', 103),
(75, 41, 'Trắng - Đen', 89),
(75, 42, 'Trắng - Đen', 114),
(75, 43, 'Trắng - Đen', 99),
(76, 36, 'Đa sắc', 87),
(76, 37, 'Đa sắc', 72),
(76, 38, 'Đa sắc', 97),
(76, 39, 'Đa sắc', 82),
(76, 40, 'Đa sắc', 89),
(76, 41, 'Đa sắc', 75),
(76, 42, 'Đa sắc', 100),
(76, 43, 'Đa sắc', 85),
(77, 36, 'Trắng - Đen', 92),
(77, 37, 'Trắng - Đen', 77),
(77, 38, 'Trắng - Đen', 102),
(77, 39, 'Trắng - Đen', 87),
(77, 40, 'Trắng - Đen', 94),
(77, 41, 'Trắng - Đen', 80),
(77, 42, 'Trắng - Đen', 105),
(77, 43, 'Trắng - Đen', 90),
(78, 36, 'Trắng - Xanh Dương', 96),
(78, 37, 'Trắng - Xanh Dương', 81),
(78, 38, 'Trắng - Xanh Dương', 106),
(78, 39, 'Trắng - Xanh Dương', 91),
(78, 40, 'Trắng - Xanh Dương', 98),
(78, 41, 'Trắng - Xanh Dương', 84),
(78, 42, 'Trắng - Xanh Dương', 109),
(78, 43, 'Trắng - Xanh Dương', 94),
(79, 36, 'Be', 84),
(79, 37, 'Be', 69),
(79, 38, 'Be', 94),
(79, 39, 'Be', 79),
(79, 40, 'Be', 86),
(79, 41, 'Be', 72),
(79, 42, 'Be', 97),
(79, 43, 'Be', 82),
(80, 36, 'Đen - Trắng', 102),
(80, 37, 'Đen - Trắng', 87),
(80, 38, 'Đen - Trắng', 112),
(80, 39, 'Đen - Trắng', 97),
(80, 40, 'Đen - Trắng', 104),
(80, 41, 'Đen - Trắng', 90),
(80, 42, 'Đen - Trắng', 115),
(80, 43, 'Đen - Trắng', 100),
(81, 36, 'Trắng', 89),
(81, 37, 'Trắng', 74),
(81, 38, 'Trắng', 99),
(81, 39, 'Trắng', 84),
(81, 40, 'Trắng', 91),
(81, 41, 'Trắng', 77),
(81, 42, 'Trắng', 102),
(81, 43, 'Trắng', 87),
(82, 36, 'Trắng - Bạc', 93),
(82, 37, 'Trắng - Bạc', 78),
(82, 38, 'Trắng - Bạc', 103),
(82, 39, 'Trắng - Bạc', 88),
(82, 40, 'Trắng - Bạc', 95),
(82, 41, 'Trắng - Bạc', 81),
(82, 42, 'Trắng - Bạc', 106),
(82, 43, 'Trắng - Bạc', 91),
(83, 36, 'Đen - Trắng', 97),
(83, 37, 'Đen - Trắng', 82),
(83, 38, 'Đen - Trắng', 107),
(83, 39, 'Đen - Trắng', 92),
(83, 40, 'Đen - Trắng', 99),
(83, 41, 'Đen - Trắng', 85),
(83, 42, 'Đen - Trắng', 110),
(83, 43, 'Đen - Trắng', 95),
(84, 36, 'Xám', 85),
(84, 37, 'Xám', 70),
(84, 38, 'Xám', 95),
(84, 39, 'Xám', 80),
(84, 40, 'Xám', 87),
(84, 41, 'Xám', 73),
(84, 42, 'Xám', 98),
(84, 43, 'Xám', 83),
(85, 36, 'Kem - Xanh Dương', 103),
(85, 37, 'Kem - Xanh Dương', 88),
(85, 38, 'Kem - Xanh Dương', 113),
(85, 39, 'Kem - Xanh Dương', 98),
(85, 40, 'Kem - Xanh Dương', 105),
(85, 41, 'Kem - Xanh Dương', 91),
(85, 42, 'Kem - Xanh Dương', 116),
(85, 43, 'Kem - Xanh Dương', 101),
(86, 36, 'Đỏ - Đen', 90),
(86, 37, 'Đỏ - Đen', 75),
(86, 38, 'Đỏ - Đen', 100),
(86, 39, 'Đỏ - Đen', 85),
(86, 40, 'Đỏ - Đen', 92),
(86, 41, 'Đỏ - Đen', 78),
(86, 42, 'Đỏ - Đen', 103),
(86, 43, 'Đỏ - Đen', 88),
(87, 36, 'Đa sắc', 94),
(87, 37, 'Đa sắc', 79),
(87, 38, 'Đa sắc', 104),
(87, 39, 'Đa sắc', 89),
(87, 40, 'Đa sắc', 96),
(87, 41, 'Đa sắc', 82),
(87, 42, 'Đa sắc', 107),
(87, 43, 'Đa sắc', 92),
(88, 36, 'Đa sắc', 98),
(88, 37, 'Đa sắc', 83),
(88, 38, 'Đa sắc', 108),
(88, 39, 'Đa sắc', 93),
(88, 40, 'Đa sắc', 100),
(88, 41, 'Đa sắc', 86),
(88, 42, 'Đa sắc', 111),
(88, 43, 'Đa sắc', 96),
(89, 36, 'Cam - Đen', 86),
(89, 37, 'Cam - Đen', 71),
(89, 38, 'Cam - Đen', 96),
(89, 39, 'Cam - Đen', 81),
(89, 40, 'Cam - Đen', 88),
(89, 41, 'Cam - Đen', 74),
(89, 42, 'Cam - Đen', 99),
(89, 43, 'Cam - Đen', 84),
(90, 36, 'Xanh Lá', 104),
(90, 37, 'Xanh Lá', 89),
(90, 38, 'Xanh Lá', 114),
(90, 39, 'Xanh Lá', 99),
(90, 40, 'Xanh Lá', 106),
(90, 41, 'Xanh Lá', 92),
(90, 42, 'Xanh Lá', 117),
(90, 43, 'Xanh Lá', 102),
(91, 36, 'Xanh Dương', 91),
(91, 37, 'Xanh Dương', 76),
(91, 38, 'Xanh Dương', 101),
(91, 39, 'Xanh Dương', 86),
(91, 40, 'Xanh Dương', 93),
(91, 41, 'Xanh Dương', 79),
(91, 42, 'Xanh Dương', 104),
(91, 43, 'Xanh Dương', 89),
(92, 36, 'Tím - Vàng', 95),
(92, 37, 'Tím - Vàng', 80),
(92, 38, 'Tím - Vàng', 105),
(92, 39, 'Tím - Vàng', 90),
(92, 40, 'Tím - Vàng', 97),
(92, 41, 'Tím - Vàng', 83),
(92, 42, 'Tím - Vàng', 108),
(92, 43, 'Tím - Vàng', 93),
(93, 36, 'Đen - Xanh Lá', 99),
(93, 37, 'Đen - Xanh Lá', 84),
(93, 38, 'Đen - Xanh Lá', 109),
(93, 39, 'Đen - Xanh Lá', 94),
(93, 40, 'Đen - Xanh Lá', 101),
(93, 41, 'Đen - Xanh Lá', 87),
(93, 42, 'Đen - Xanh Lá', 112),
(93, 43, 'Đen - Xanh Lá', 97),
(94, 36, 'Đen - Trắng', 87),
(94, 37, 'Đen - Trắng', 72),
(94, 38, 'Đen - Trắng', 97),
(94, 39, 'Đen - Trắng', 82),
(94, 40, 'Đen - Trắng', 89),
(94, 41, 'Đen - Trắng', 75),
(94, 42, 'Đen - Trắng', 100),
(94, 43, 'Đen - Trắng', 85),
(95, 36, 'Xanh Dương', 105),
(95, 37, 'Xanh Dương', 90),
(95, 38, 'Xanh Dương', 115),
(95, 39, 'Xanh Dương', 100),
(95, 40, 'Xanh Dương', 107),
(95, 41, 'Xanh Dương', 93),
(95, 42, 'Xanh Dương', 118),
(95, 43, 'Xanh Dương', 103),
(96, 36, 'Trắng - Hồng', 92),
(96, 37, 'Trắng - Hồng', 77),
(96, 38, 'Trắng - Hồng', 102),
(96, 39, 'Trắng - Hồng', 87),
(96, 40, 'Trắng - Hồng', 94),
(96, 41, 'Trắng - Hồng', 80),
(96, 42, 'Trắng - Hồng', 105),
(96, 43, 'Trắng - Hồng', 90),
(97, 36, 'Hồng', 96),
(97, 37, 'Hồng', 81),
(97, 38, 'Hồng', 106),
(97, 39, 'Hồng', 91),
(97, 40, 'Hồng', 98),
(97, 41, 'Hồng', 84),
(97, 42, 'Hồng', 109),
(97, 43, 'Hồng', 94),
(98, 36, 'Đen - Trắng', 100),
(98, 37, 'Đen - Trắng', 85),
(98, 38, 'Đen - Trắng', 110),
(98, 39, 'Đen - Trắng', 95),
(98, 40, 'Đen - Trắng', 102),
(98, 41, 'Đen - Trắng', 88),
(98, 42, 'Đen - Trắng', 113),
(98, 43, 'Đen - Trắng', 98),
(99, 36, 'Kem', 88),
(99, 37, 'Kem', 73),
(99, 38, 'Kem', 98),
(99, 39, 'Kem', 83),
(99, 40, 'Kem', 90),
(99, 41, 'Kem', 76),
(99, 42, 'Kem', 101),
(99, 43, 'Kem', 86),
(100, 36, 'Hồng', 106),
(100, 37, 'Hồng', 91),
(100, 38, 'Hồng', 116),
(100, 39, 'Hồng', 101),
(100, 40, 'Hồng', 108),
(100, 41, 'Hồng', 94),
(100, 42, 'Hồng', 119),
(100, 43, 'Hồng', 104),
(101, 36, 'Trắng', 93),
(101, 37, 'Trắng', 78),
(101, 38, 'Trắng', 103),
(101, 39, 'Trắng', 88),
(101, 40, 'Trắng', 95),
(101, 41, 'Trắng', 81),
(101, 42, 'Trắng', 106),
(101, 43, 'Trắng', 91),
(102, 36, 'Trắng - Đỏ', 97),
(102, 37, 'Trắng - Đỏ', 82),
(102, 38, 'Trắng - Đỏ', 107),
(102, 39, 'Trắng - Đỏ', 92),
(102, 40, 'Trắng - Đỏ', 99),
(102, 41, 'Trắng - Đỏ', 85),
(102, 42, 'Trắng - Đỏ', 110),
(102, 43, 'Trắng - Đỏ', 95),
(103, 36, 'Xanh Lá', 101),
(103, 37, 'Xanh Lá', 86),
(103, 38, 'Xanh Lá', 111),
(103, 39, 'Xanh Lá', 96),
(103, 40, 'Xanh Lá', 103),
(103, 41, 'Xanh Lá', 89),
(103, 42, 'Xanh Lá', 114),
(103, 43, 'Xanh Lá', 99),
(104, 36, 'Trắng - Xanh Dương', 89),
(104, 37, 'Trắng - Xanh Dương', 74),
(104, 38, 'Trắng - Xanh Dương', 99),
(104, 39, 'Trắng - Xanh Dương', 84),
(104, 40, 'Trắng - Xanh Dương', 91),
(104, 41, 'Trắng - Xanh Dương', 77),
(104, 42, 'Trắng - Xanh Dương', 102),
(104, 43, 'Trắng - Xanh Dương', 87),
(105, 36, 'Đen - Trắng', 107),
(105, 37, 'Đen - Trắng', 92),
(105, 38, 'Đen - Trắng', 117),
(105, 39, 'Đen - Trắng', 102),
(105, 40, 'Đen - Trắng', 109),
(105, 41, 'Đen - Trắng', 95),
(105, 42, 'Đen - Trắng', 120),
(105, 43, 'Đen - Trắng', 105),
(106, 36, 'Trắng - Xám', 94),
(106, 37, 'Trắng - Xám', 79),
(106, 38, 'Trắng - Xám', 104),
(106, 39, 'Trắng - Xám', 89),
(106, 40, 'Trắng - Xám', 96),
(106, 41, 'Trắng - Xám', 82),
(106, 42, 'Trắng - Xám', 107),
(106, 43, 'Trắng - Xám', 92),
(107, 36, 'Đen - Trắng', 98),
(107, 37, 'Đen - Trắng', 83),
(107, 38, 'Đen - Trắng', 108),
(107, 39, 'Đen - Trắng', 93),
(107, 40, 'Đen - Trắng', 100),
(107, 41, 'Đen - Trắng', 86),
(107, 42, 'Đen - Trắng', 111),
(107, 43, 'Đen - Trắng', 96),
(108, 36, 'Đen - Trắng', 102),
(108, 37, 'Đen - Trắng', 87),
(108, 38, 'Đen - Trắng', 112),
(108, 39, 'Đen - Trắng', 97),
(108, 40, 'Đen - Trắng', 104),
(108, 41, 'Đen - Trắng', 90),
(108, 42, 'Đen - Trắng', 115),
(108, 43, 'Đen - Trắng', 100),
(109, 36, 'Nâu', 90),
(109, 37, 'Nâu', 75),
(109, 38, 'Nâu', 100),
(109, 39, 'Nâu', 85),
(109, 40, 'Nâu', 92),
(109, 41, 'Nâu', 78),
(109, 42, 'Nâu', 103),
(109, 43, 'Nâu', 88),
(110, 36, 'Đen - Trắng', 108),
(110, 37, 'Đen - Trắng', 93),
(110, 38, 'Đen - Trắng', 118),
(110, 39, 'Đen - Trắng', 103),
(110, 40, 'Đen - Trắng', 110),
(110, 41, 'Đen - Trắng', 96),
(110, 42, 'Đen - Trắng', 121),
(110, 43, 'Đen - Trắng', 106),
(111, 36, 'Xanh Dương - Trắng', 95),
(111, 37, 'Xanh Dương - Trắng', 80),
(111, 38, 'Xanh Dương - Trắng', 105),
(111, 39, 'Xanh Dương - Trắng', 90),
(111, 40, 'Xanh Dương - Trắng', 97),
(111, 41, 'Xanh Dương - Trắng', 83),
(111, 42, 'Xanh Dương - Trắng', 108),
(111, 43, 'Xanh Dương - Trắng', 93),
(112, 36, 'Đen - Trắng', 99),
(112, 37, 'Đen - Trắng', 84),
(112, 38, 'Đen - Trắng', 109),
(112, 39, 'Đen - Trắng', 94),
(112, 40, 'Đen - Trắng', 101),
(112, 41, 'Đen - Trắng', 87),
(112, 42, 'Đen - Trắng', 112),
(112, 43, 'Đen - Trắng', 97),
(113, 36, 'Kem', 103),
(113, 37, 'Kem', 88),
(113, 38, 'Kem', 113),
(113, 39, 'Kem', 98),
(113, 40, 'Kem', 105),
(113, 41, 'Kem', 91),
(113, 42, 'Kem', 116),
(113, 43, 'Kem', 101),
(114, 36, 'Kem - Xanh Lá', 91),
(114, 37, 'Kem - Xanh Lá', 76),
(114, 38, 'Kem - Xanh Lá', 101),
(114, 39, 'Kem - Xanh Lá', 86),
(114, 40, 'Kem - Xanh Lá', 93),
(114, 41, 'Kem - Xanh Lá', 79),
(114, 42, 'Kem - Xanh Lá', 104),
(114, 43, 'Kem - Xanh Lá', 89),
(115, 36, 'Trắng', 109),
(115, 37, 'Trắng', 94),
(115, 38, 'Trắng', 119),
(115, 39, 'Trắng', 104),
(115, 40, 'Trắng', 111),
(115, 41, 'Trắng', 97),
(115, 42, 'Trắng', 122),
(115, 43, 'Trắng', 107),
(116, 36, 'Trắng - Xanh Dương', 96),
(116, 37, 'Trắng - Xanh Dương', 81),
(116, 38, 'Trắng - Xanh Dương', 106),
(116, 39, 'Trắng - Xanh Dương', 91),
(116, 40, 'Trắng - Xanh Dương', 98),
(116, 41, 'Trắng - Xanh Dương', 84),
(116, 42, 'Trắng - Xanh Dương', 109),
(116, 43, 'Trắng - Xanh Dương', 94),
(117, 36, 'Trắng', 100),
(117, 37, 'Trắng', 85),
(117, 38, 'Trắng', 110),
(117, 39, 'Trắng', 95),
(117, 40, 'Trắng', 102),
(117, 41, 'Trắng', 88),
(117, 42, 'Trắng', 113),
(117, 43, 'Trắng', 98),
(118, 36, 'Trắng', 104),
(118, 37, 'Trắng', 89),
(118, 38, 'Trắng', 114),
(118, 39, 'Trắng', 99),
(118, 40, 'Trắng', 106),
(118, 41, 'Trắng', 92),
(118, 42, 'Trắng', 117),
(118, 43, 'Trắng', 102),
(119, 36, 'Trắng - Kem', 92),
(119, 37, 'Trắng - Kem', 77),
(119, 38, 'Trắng - Kem', 102),
(119, 39, 'Trắng - Kem', 87),
(119, 40, 'Trắng - Kem', 94),
(119, 41, 'Trắng - Kem', 80),
(119, 42, 'Trắng - Kem', 105),
(119, 43, 'Trắng - Kem', 90),
(120, 36, 'Trắng - Xanh Dương', 110),
(120, 37, 'Trắng - Xanh Dương', 95),
(120, 38, 'Trắng - Xanh Dương', 120),
(120, 39, 'Trắng - Xanh Dương', 105),
(120, 40, 'Trắng - Xanh Dương', 112),
(120, 41, 'Trắng - Xanh Dương', 98),
(120, 42, 'Trắng - Xanh Dương', 123),
(120, 43, 'Trắng - Xanh Dương', 108),
(121, 36, 'Trắng - Nâu', 97),
(121, 37, 'Trắng - Nâu', 82),
(121, 38, 'Trắng - Nâu', 107),
(121, 39, 'Trắng - Nâu', 92),
(121, 40, 'Trắng - Nâu', 99),
(121, 41, 'Trắng - Nâu', 85),
(121, 42, 'Trắng - Nâu', 110),
(121, 43, 'Trắng - Nâu', 95),
(122, 36, 'Đa sắc', 105),
(122, 37, 'Đa sắc', 90),
(122, 38, 'Đa sắc', 115),
(122, 39, 'Đa sắc', 100),
(122, 40, 'Đa sắc', 107),
(122, 41, 'Đa sắc', 93),
(122, 42, 'Đa sắc', 118),
(122, 43, 'Đa sắc', 103);

--
-- Bẫy `chitietsanpham`
--
DELIMITER $$
CREATE TRIGGER `tongsl` AFTER UPDATE ON `chitietsanpham` FOR EACH ROW UPDATE sanpham SET SoLuong= (SELECT SUM(SoLuong) from chitietsanpham WHERE MaSP = NEW.MaSP) WHERE MaSP = NEW.MaSP
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tongsl_del` AFTER DELETE ON `chitietsanpham` FOR EACH ROW UPDATE sanpham SET SoLuong= (SELECT SUM(SoLuong) from chitietsanpham WHERE MaSP = OLD.MaSP) WHERE MaSP = OLD.MaSP
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tongsl_insert` AFTER INSERT ON `chitietsanpham` FOR EACH ROW UPDATE sanpham SET SoLuong= (SELECT SUM(SoLuong) from chitietsanpham WHERE MaSP = NEW.MaSP) WHERE MaSP = NEW.MaSP
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `MaDM` int(11) NOT NULL,
  `TenDM` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`MaDM`, `TenDM`) VALUES
(1, 'Sản Phẩm Nổi Bật'),
(2, 'Sản Phẩm Mới'),
(3, 'Sản Phẩm bán chạy'),
(4, 'Dép'),
(5, 'Giày');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id` int(11) NOT NULL,
  `MaKH` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL DEFAULT 1,
  `size` int(11) DEFAULT NULL,
  `Mau` varchar(50) DEFAULT NULL,
  `ngay_them` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `gio_hang`
--

INSERT INTO `gio_hang` (`id`, `MaKH`, `MaSP`, `SoLuong`, `size`, `Mau`, `ngay_them`) VALUES
(1, 1, 4, 2, 39, 'Đen - Trắng', '2025-06-12 13:04:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` int(11) NOT NULL,
  `MaKH` int(11) NOT NULL,
  `MaNV` int(11) DEFAULT NULL,
  `NgayDat` datetime DEFAULT current_timestamp(),
  `NgayGiao` datetime DEFAULT NULL,
  `TinhTrang` varchar(20) DEFAULT NULL,
  `TongTien` decimal(10,0) NOT NULL,
  `MaNVGH` varchar(50) DEFAULT NULL,
  `MaGiamGia` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `TienGiam` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `MaKH`, `MaNV`, `NgayDat`, `NgayGiao`, `TinhTrang`, `TongTien`, `MaNVGH`, `MaGiamGia`, `TienGiam`) VALUES
(91, 1, 2, '2025-06-12 10:30:00', '2025-06-14 09:00:00', 'Đã giao', 985000, '2', 'GG2025', 150000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` int(11) NOT NULL,
  `TenKH` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `SDT` bigint(12) NOT NULL,
  `DiaChi` text NOT NULL,
  `MatKhau` varchar(50) NOT NULL,
  `TokenResetMatKhau` varchar(255) DEFAULT NULL,
  `ThoiGianResetMatKhau` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `TenKH`, `Email`, `SDT`, `DiaChi`, `MatKhau`, `TokenResetMatKhau`, `ThoiGianResetMatKhau`) VALUES
(6, 'Nguyễn Văn A', 'duyg@gmail.com', 1228923743, 'diachi', '123456', NULL, NULL),
(1, 'Phạm Trịnh Thanh Duy', 'duyp5565@gmail.com', 778923743, '62/32 trần thánh tông - tân bình - hcm', '123456', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `MaKM` int(11) NOT NULL,
  `TenKM` varchar(50) DEFAULT NULL,
  `MoTa` varchar(11) DEFAULT NULL,
  `KM_PT` int(5) DEFAULT NULL,
  `TienKM` decimal(10,0) DEFAULT NULL,
  `NgayBD` date DEFAULT NULL,
  `NgayKT` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`MaKM`, `TenKM`, `MoTa`, `KM_PT`, `TienKM`, `NgayBD`, `NgayKT`) VALUES
(1, 'Tri Ân Khách Hàng', 'sale', 0, 50000, '2020-01-01', '2024-01-31'),
(3, 'Vui Xuân - Đón Tết ', NULL, 30, NULL, '2019-12-19', '2020-02-29'),
(4, 'Khuyến Mãi Đặc Biệt', NULL, NULL, 100000, '2019-12-19', '2020-01-31'),
(5, 'khuyễn mãi đặc biệt trị giá 500.000 đ', 'ok', 1, 500000, '2020-01-02', '2020-01-04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mau`
--

CREATE TABLE `mau` (
  `MaMau` varchar(50) NOT NULL DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `mau`
--

INSERT INTO `mau` (`MaMau`) VALUES
('Bạc'),
('Be'),
('Cam'),
('Cam - Đen'),
('Đa sắc'),
('Đen'),
('Đen - Trắng'),
('Đen - Xanh Lá'),
('Đỏ'),
('Đỏ - Đen'),
('Đỏ - Trắng'),
('Hồng'),
('Hồng - Be'),
('Hồng - Trắng'),
('Kem'),
('Kem - Đen'),
('Kem - Trắng'),
('Kem - Xám'),
('Kem - Xanh Dương'),
('Kem - Xanh Lá'),
('Nâu'),
('Nâu - Be'),
('Nâu - Đen'),
('none'),
('Tím'),
('Tím - Vàng'),
('Trắng'),
('Trắng - Bạc'),
('Trắng - Đen'),
('Trắng - Đỏ'),
('Trắng - Hồng'),
('Trắng - Kem'),
('Trắng - Nâu'),
('Trắng - Tím'),
('Trắng - Xám'),
('Trắng - Xanh Dương'),
('Trắng - Xanh Lá'),
('Vàng'),
('Vàng Chanh'),
('Xám'),
('Xám - Đen'),
('Xám - Trắng'),
('Xanh'),
('Xanh Dương'),
('Xanh Dương - Trắng'),
('Xanh Dương - Vàng'),
('Xanh Dương - Xám'),
('Xanh Lá'),
('Xanh Lá - Trắng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoinhan`
--

CREATE TABLE `nguoinhan` (
  `MaHD` int(11) NOT NULL,
  `TenNN` varchar(50) NOT NULL,
  `DiaChiNN` text NOT NULL,
  `SDTNN` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacc`
--

CREATE TABLE `nhacc` (
  `MaNCC` int(11) NOT NULL,
  `TenNCC` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacc`
--

INSERT INTO `nhacc` (`MaNCC`, `TenNCC`) VALUES
(1, 'ADIDAS'),
(2, 'NIKE'),
(3, 'PUMA'),
(4, 'FILA'),
(5, 'CONVERSE'),
(6, 'VANS'),
(7, 'REEBOK');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` int(11) NOT NULL,
  `TenNV` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `SDT` int(12) NOT NULL,
  `DiaChi` text NOT NULL,
  `MatKhau` varchar(50) NOT NULL,
  `Quyen` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `TenNV`, `Email`, `SDT`, `DiaChi`, `MatKhau`, `Quyen`) VALUES
(3, 'Admin', 'admin@gmail.com', 905027527, 'Xóm 9 - Quảng Ngãi', 'admin', 1),
(1, 'Quản Lý', 'duykul@gmail.com', 778923743, 'Phổ An - Quảng Ngãi', '123456', 2),
(4, 'Thanh Duy', 'duyp5565@gmail.com', 132465798, 'Xóm 9 - Quảng Ngãi', '123456', 3),
(2, 'Nhân Viên Bán Hàng ', 'NVBH@gmail.com', 123456789, 'Quảng Ngãi', '123456', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieugiamgia`
--

CREATE TABLE `phieugiamgia` (
  `id` int(11) NOT NULL,
  `MaGiamGia` varchar(50) NOT NULL,
  `GiaTri` decimal(10,2) NOT NULL,
  `NgayHetHan` datetime NOT NULL,
  `TrangThai` enum('Chưa sử dụng','Đã sử dụng','Hết hạn') NOT NULL DEFAULT 'Chưa sử dụng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieugiamgia`
--

INSERT INTO `phieugiamgia` (`id`, `MaGiamGia`, `GiaTri`, `NgayHetHan`, `TrangThai`) VALUES
(1, 'GIAM10K', 10000.00, '2025-12-31 23:59:59', 'Chưa sử dụng'),
(2, 'GIAM20K', 20000.00, '2025-11-30 23:59:59', 'Chưa sử dụng'),
(3, 'VIP50', 50000.00, '2025-06-30 23:59:59', 'Đã sử dụng'),
(4, 'HETHANG30K', 30000.00, '2024-12-31 23:59:59', 'Hết hạn'),
(5, 'GG2025', 150000.00, '2025-12-31 23:59:59', 'Chưa sử dụng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `MaPN` int(11) NOT NULL,
  `MaNV` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` decimal(10,0) DEFAULT NULL,
  `TongTien` decimal(10,0) NOT NULL,
  `NgayNhap` datetime NOT NULL DEFAULT current_timestamp(),
  `Note` varchar(100) DEFAULT NULL,
  `Size` int(11) NOT NULL,
  `Mau` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `phieunhap`
--

INSERT INTO `phieunhap` (`MaPN`, `MaNV`, `MaSP`, `SoLuong`, `DonGia`, `TongTien`, `NgayNhap`, `Note`, `Size`, `Mau`) VALUES
(1, 1, 1, 55, 950000, 52250000, '2024-06-01 10:00:00', NULL, 36, 'Kem'),
(2, 1, 1, 58, 950000, 55100000, '2024-06-01 10:00:00', NULL, 37, 'Kem'),
(3, 1, 1, 50, 950000, 47500000, '2024-06-01 10:00:00', NULL, 38, 'Kem'),
(4, 1, 1, 60, 950000, 57000000, '2024-06-01 10:00:00', NULL, 39, 'Kem'),
(5, 1, 1, 48, 950000, 45600000, '2024-06-01 10:00:00', NULL, 40, 'Kem'),
(6, 1, 1, 62, 950000, 58900000, '2024-06-01 10:00:00', NULL, 41, 'Kem'),
(7, 1, 1, 53, 950000, 50350000, '2024-06-01 10:00:00', NULL, 42, 'Kem'),
(8, 1, 1, 65, 950000, 61750000, '2024-06-01 10:00:00', NULL, 43, 'Kem'),
(9, 2, 2, 60, 780000, 46800000, '2024-06-02 09:00:00', NULL, 39, 'Đen'),
(10, 2, 2, 45, 780000, 35100000, '2024-06-02 09:00:00', NULL, 40, 'Đen'),
(11, 2, 2, 63, 780000, 49140000, '2024-06-02 09:00:00', NULL, 41, 'Đen'),
(12, 3, 3, 50, 870000, 43500000, '2024-06-03 10:00:00', NULL, 42, 'Xanh'),
(13, 3, 3, 40, 870000, 34800000, '2024-06-03 10:00:00', NULL, 43, 'Xanh'),
(14, 4, 4, 58, 1100000, 63800000, '2024-06-04 08:00:00', NULL, 36, 'Đen - Trắng'),
(15, 4, 4, 45, 1100000, 49500000, '2024-06-04 08:00:00', NULL, 37, 'Đen - Trắng'),
(16, 4, 4, 66, 1100000, 72600000, '2024-06-04 08:00:00', NULL, 38, 'Đen - Trắng'),
(17, 4, 4, 52, 1100000, 57200000, '2024-06-04 08:00:00', NULL, 39, 'Đen - Trắng'),
(18, 4, 4, 60, 1100000, 66000000, '2024-06-04 08:00:00', NULL, 40, 'Đen - Trắng'),
(19, 4, 4, 41, 1100000, 45100000, '2024-06-04 08:00:00', NULL, 41, 'Đen - Trắng'),
(20, 4, 4, 64, 1100000, 70400000, '2024-06-04 08:00:00', NULL, 42, 'Đen - Trắng'),
(21, 4, 4, 50, 1100000, 55000000, '2024-06-04 08:00:00', NULL, 43, 'Đen - Trắng'),
(22, 1, 5, 42, 700000, 29400000, '2024-06-05 13:00:00', NULL, 38, 'Xanh Dương'),
(23, 1, 5, 59, 700000, 41300000, '2024-06-05 13:00:00', NULL, 39, 'Xanh Dương'),
(24, 1, 5, 48, 700000, 33600000, '2024-06-05 13:00:00', NULL, 40, 'Xanh Dương'),
(25, 1, 5, 65, 700000, 45500000, '2024-06-05 13:00:00', NULL, 41, 'Xanh Dương'),
(26, 2, 6, 50, 1000000, 50000000, '2024-06-06 10:00:00', NULL, 42, 'Đen - Trắng'),
(27, 2, 6, 40, 1000000, 40000000, '2024-06-06 10:00:00', NULL, 43, 'Đen - Trắng'),
(28, 3, 7, 66, 680000, 44880000, '2024-06-07 11:30:00', NULL, 36, 'Đen'),
(29, 3, 7, 51, 680000, 34680000, '2024-06-07 11:30:00', NULL, 37, 'Đen'),
(30, 3, 7, 45, 680000, 30600000, '2024-06-07 11:30:00', NULL, 38, 'Đen'),
(31, 3, 7, 59, 680000, 40120000, '2024-06-07 11:30:00', NULL, 39, 'Đen'),
(32, 3, 7, 40, 680000, 27200000, '2024-06-07 11:30:00', NULL, 40, 'Đen'),
(33, 3, 7, 63, 680000, 42840000, '2024-06-07 11:30:00', NULL, 41, 'Đen'),
(34, 3, 7, 52, 680000, 35360000, '2024-06-07 11:30:00', NULL, 42, 'Đen'),
(35, 3, 7, 60, 680000, 40800000, '2024-06-07 11:30:00', NULL, 43, 'Đen'),
(36, 4, 8, 48, 890000, 42720000, '2024-06-08 09:45:00', NULL, 38, 'Trắng'),
(37, 4, 8, 66, 890000, 58740000, '2024-06-08 09:45:00', NULL, 39, 'Trắng'),
(38, 4, 8, 51, 890000, 45390000, '2024-06-08 09:45:00', NULL, 40, 'Trắng'),
(39, 1, 9, 60, 1050000, 63000000, '2024-06-09 13:00:00', NULL, 42, 'Bạc'),
(40, 1, 9, 40, 1050000, 42000000, '2024-06-09 13:00:00', NULL, 43, 'Bạc'),
(41, 2, 10, 55, 1180000, 64900000, '2024-06-10 10:00:00', NULL, 36, 'Be'),
(42, 2, 10, 42, 1180000, 49560000, '2024-06-10 10:00:00', NULL, 37, 'Be'),
(43, 2, 10, 61, 1180000, 71980000, '2024-06-10 10:00:00', NULL, 38, 'Be'),
(44, 2, 10, 49, 1180000, 57820000, '2024-06-10 10:00:00', NULL, 39, 'Be'),
(45, 2, 10, 64, 1180000, 75520000, '2024-06-10 10:00:00', NULL, 40, 'Be'),
(46, 2, 10, 52, 1180000, 61360000, '2024-06-10 10:00:00', NULL, 41, 'Be'),
(47, 2, 10, 50, 1180000, 59000000, '2024-06-10 10:00:00', NULL, 42, 'Be'),
(48, 2, 10, 66, 1180000, 77880000, '2024-06-10 10:00:00', NULL, 43, 'Be'),
(49, 3, 11, 48, 880000, 42240000, '2024-06-11 11:30:00', NULL, 38, 'Be'),
(50, 3, 11, 60, 880000, 52800000, '2024-06-11 11:30:00', NULL, 39, 'Be'),
(51, 3, 11, 45, 880000, 39600000, '2024-06-11 11:30:00', NULL, 40, 'Be'),
(52, 4, 12, 63, 800000, 50400000, '2024-06-12 09:00:00', NULL, 42, 'Xám'),
(53, 4, 12, 40, 800000, 32000000, '2024-06-12 09:00:00', NULL, 43, 'Xám'),
(54, 1, 13, 50, 1090000, 54500000, '2024-06-13 13:00:00', NULL, 36, 'Xám'),
(55, 1, 13, 66, 1090000, 72000000, '2024-06-13 13:00:00', NULL, 37, 'Xám'),
(56, 1, 13, 42, 1090000, 45780000, '2024-06-13 13:00:00', NULL, 38, 'Xám'),
(57, 1, 13, 59, 1090000, 64510000, '2024-06-13 13:00:00', NULL, 39, 'Xám'),
(58, 1, 13, 48, 1090000, 52320000, '2024-06-13 13:00:00', NULL, 40, 'Xám'),
(59, 1, 13, 65, 1090000, 70850000, '2024-06-13 13:00:00', NULL, 41, 'Xám'),
(60, 1, 13, 53, 1090000, 57770000, '2024-06-13 13:00:00', NULL, 42, 'Xám'),
(61, 1, 13, 60, 1090000, 65400000, '2024-06-13 13:00:00', NULL, 43, 'Xám'),
(62, 2, 14, 40, 980000, 39200000, '2024-06-14 10:30:00', NULL, 38, 'Trắng'),
(63, 2, 14, 55, 980000, 53900000, '2024-06-14 10:30:00', NULL, 39, 'Trắng'),
(64, 2, 14, 42, 980000, 41160000, '2024-06-14 10:30:00', NULL, 40, 'Trắng'),
(65, 3, 15, 60, 840000, 50400000, '2024-06-15 08:00:00', NULL, 42, 'Trắng'),
(66, 3, 15, 40, 840000, 33600000, '2024-06-15 08:00:00', NULL, 43, 'Trắng'),
(67, 4, 16, 50, 800000, 40000000, '2024-07-01 10:00:00', NULL, 36, 'Xám - Đen'),
(68, 4, 16, 60, 800000, 48000000, '2024-07-01 10:00:00', NULL, 37, 'Xám - Đen'),
(69, 4, 16, 45, 800000, 36000000, '2024-07-01 10:00:00', NULL, 38, 'Xám - Đen'),
(70, 4, 16, 62, 800000, 49600000, '2024-07-01 10:00:00', NULL, 39, 'Xám - Đen'),
(71, 4, 16, 51, 800000, 40800000, '2024-07-01 10:00:00', NULL, 40, 'Xám - Đen'),
(72, 4, 16, 66, 800000, 52800000, '2024-07-01 10:00:00', NULL, 41, 'Xám - Đen'),
(73, 4, 16, 53, 800000, 42400000, '2024-07-01 10:00:00', NULL, 42, 'Xám - Đen'),
(74, 4, 16, 40, 800000, 32000000, '2024-07-01 10:00:00', NULL, 43, 'Xám - Đen'),
(75, 1, 17, 42, 830000, 34860000, '2024-07-02 13:00:00', NULL, 38, 'Be'),
(76, 1, 17, 59, 830000, 48970000, '2024-07-02 13:00:00', NULL, 39, 'Be'),
(77, 1, 17, 48, 830000, 39840000, '2024-07-02 13:00:00', NULL, 40, 'Be'),
(78, 1, 17, 65, 830000, 53950000, '2024-07-02 13:00:00', NULL, 41, 'Be'),
(79, 2, 18, 50, 760000, 38000000, '2024-07-03 10:00:00', NULL, 42, 'Hồng'),
(80, 2, 18, 40, 760000, 30400000, '2024-07-03 10:00:00', NULL, 43, 'Hồng'),
(81, 3, 19, 58, 810000, 46980000, '2024-07-04 09:00:00', NULL, 36, 'Đen - Vàng Chanh'),
(82, 3, 19, 45, 810000, 36450000, '2024-07-04 09:00:00', NULL, 37, 'Đen - Vàng Chanh'),
(83, 3, 19, 66, 810000, 53460000, '2024-07-04 09:00:00', NULL, 38, 'Đen - Vàng Chanh'),
(84, 3, 19, 52, 810000, 42120000, '2024-07-04 09:00:00', NULL, 39, 'Đen - Vàng Chanh'),
(85, 3, 19, 60, 810000, 48600000, '2024-07-04 09:00:00', NULL, 40, 'Đen - Vàng Chanh'),
(86, 3, 19, 41, 810000, 33210000, '2024-07-04 09:00:00', NULL, 41, 'Đen - Vàng Chanh'),
(87, 3, 19, 64, 810000, 51840000, '2024-07-04 09:00:00', NULL, 42, 'Đen - Vàng Chanh'),
(88, 3, 19, 50, 810000, 40500000, '2024-07-04 09:00:00', NULL, 43, 'Đen - Vàng Chanh'),
(89, 4, 20, 40, 770000, 30800000, '2024-07-05 14:00:00', NULL, 38, 'Đỏ - Đen'),
(90, 4, 20, 55, 770000, 42350000, '2024-07-05 14:00:00', NULL, 39, 'Đỏ - Đen'),
(91, 4, 20, 42, 770000, 32340000, '2024-07-05 14:00:00', NULL, 40, 'Đỏ - Đen'),
(92, 1, 21, 60, 830000, 49800000, '2024-07-06 10:00:00', NULL, 42, 'Đen - Xanh Dương'),
(93, 1, 21, 40, 830000, 33200000, '2024-07-06 10:00:00', NULL, 43, 'Đen - Xanh Dương'),
(94, 2, 22, 50, 780000, 39000000, '2024-07-07 11:30:00', NULL, 36, 'Đen - Vàng'),
(95, 2, 22, 60, 780000, 46800000, '2024-07-07 11:30:00', NULL, 37, 'Đen - Vàng'),
(96, 2, 22, 45, 780000, 35100000, '2024-07-07 11:30:00', NULL, 38, 'Đen - Vàng'),
(97, 2, 22, 62, 780000, 48360000, '2024-07-07 11:30:00', NULL, 39, 'Đen - Vàng'),
(98, 2, 22, 51, 780000, 39780000, '2024-07-07 11:30:00', NULL, 40, 'Đen - Vàng'),
(99, 2, 22, 66, 780000, 51480000, '2024-07-07 11:30:00', NULL, 41, 'Đen - Vàng'),
(100, 2, 22, 53, 780000, 41340000, '2024-07-07 11:30:00', NULL, 42, 'Đen - Vàng'),
(101, 2, 22, 40, 780000, 31200000, '2024-07-07 11:30:00', NULL, 43, 'Đen - Vàng'),
(102, 3, 23, 48, 850000, 40800000, '2024-07-08 09:00:00', NULL, 38, 'Đen - Trắng'),
(103, 3, 23, 60, 850000, 51000000, '2024-07-08 09:00:00', NULL, 39, 'Đen - Trắng'),
(104, 3, 23, 45, 850000, 38250000, '2024-07-08 09:00:00', NULL, 40, 'Đen - Trắng'),
(105, 4, 24, 63, 820000, 51660000, '2024-07-09 14:00:00', NULL, 42, 'Đen - Vàng'),
(106, 4, 24, 40, 820000, 32800000, '2024-07-09 14:00:00', NULL, 43, 'Đen - Vàng'),
(107, 1, 25, 55, 750000, 41250000, '2024-07-10 10:00:00', NULL, 36, 'Trắng - Xanh Dương'),
(108, 1, 25, 42, 750000, 31500000, '2024-07-10 10:00:00', NULL, 37, 'Trắng - Xanh Dương'),
(109, 1, 25, 61, 750000, 45750000, '2024-07-10 10:00:00', NULL, 38, 'Trắng - Xanh Dương'),
(110, 1, 25, 49, 750000, 36750000, '2024-07-10 10:00:00', NULL, 39, 'Trắng - Xanh Dương'),
(111, 1, 25, 64, 750000, 48000000, '2024-07-10 10:00:00', NULL, 40, 'Trắng - Xanh Dương'),
(112, 1, 25, 52, 750000, 39000000, '2024-07-10 10:00:00', NULL, 41, 'Trắng - Xanh Dương'),
(113, 1, 25, 50, 750000, 37500000, '2024-07-10 10:00:00', NULL, 42, 'Trắng - Xanh Dương'),
(114, 1, 25, 66, 750000, 49500000, '2024-07-10 10:00:00', NULL, 43, 'Trắng - Xanh Dương'),
(115, 2, 26, 40, 820000, 32800000, '2024-07-11 13:00:00', NULL, 38, 'Be'),
(116, 2, 26, 55, 820000, 45100000, '2024-07-11 13:00:00', NULL, 39, 'Be'),
(117, 2, 26, 42, 820000, 34440000, '2024-07-11 13:00:00', NULL, 40, 'Be'),
(118, 3, 27, 60, 760000, 45600000, '2024-07-12 09:00:00', NULL, 42, 'Đen'),
(119, 3, 27, 40, 760000, 30400000, '2024-07-12 09:00:00', NULL, 43, 'Đen'),
(120, 4, 28, 50, 880000, 44000000, '2024-07-13 11:30:00', NULL, 36, 'Trắng'),
(121, 4, 28, 60, 880000, 52800000, '2024-07-13 11:30:00', NULL, 37, 'Trắng'),
(122, 4, 28, 45, 880000, 39600000, '2024-07-13 11:30:00', NULL, 38, 'Trắng'),
(123, 4, 28, 62, 880000, 54560000, '2024-07-13 11:30:00', NULL, 39, 'Trắng'),
(124, 4, 28, 51, 880000, 44880000, '2024-07-13 11:30:00', NULL, 40, 'Trắng'),
(125, 4, 28, 66, 880000, 58080000, '2024-07-13 11:30:00', NULL, 41, 'Trắng'),
(126, 4, 28, 53, 880000, 46640000, '2024-07-13 11:30:00', NULL, 42, 'Trắng'),
(127, 4, 28, 40, 880000, 35200000, '2024-07-13 11:30:00', NULL, 43, 'Trắng'),
(128, 1, 29, 55, 810000, 44550000, '2024-08-01 10:00:00', NULL, 36, 'Be'),
(129, 1, 29, 42, 810000, 34020000, '2024-08-01 10:00:00', NULL, 37, 'Be'),
(130, 1, 29, 61, 810000, 49410000, '2024-08-01 10:00:00', NULL, 38, 'Be'),
(131, 1, 29, 49, 810000, 39690000, '2024-08-01 10:00:00', NULL, 39, 'Be'),
(132, 1, 29, 64, 810000, 51840000, '2024-08-01 10:00:00', NULL, 40, 'Be'),
(133, 1, 29, 52, 810000, 42120000, '2024-08-01 10:00:00', NULL, 41, 'Be'),
(134, 1, 29, 50, 810000, 40500000, '2024-08-01 10:00:00', NULL, 42, 'Be'),
(135, 1, 29, 66, 810000, 53460000, '2024-08-01 10:00:00', NULL, 43, 'Be'),
(136, 2, 30, 40, 860000, 34400000, '2024-08-02 13:00:00', NULL, 38, 'Đen - Vàng'),
(137, 2, 30, 55, 860000, 47300000, '2024-08-02 13:00:00', NULL, 39, 'Đen - Vàng'),
(138, 2, 30, 42, 860000, 36120000, '2024-08-02 13:00:00', NULL, 40, 'Đen - Vàng'),
(139, 3, 31, 60, 780000, 46800000, '2024-08-03 09:00:00', NULL, 42, 'Đen - Hồng'),
(140, 3, 31, 40, 780000, 31200000, '2024-08-03 09:00:00', NULL, 43, 'Đen - Hồng'),
(141, 4, 32, 50, 820000, 41000000, '2024-08-04 14:00:00', NULL, 36, 'Đa sắc'),
(142, 4, 32, 60, 820000, 49200000, '2024-08-04 14:00:00', NULL, 37, 'Đa sắc'),
(143, 4, 32, 45, 820000, 36900000, '2024-08-04 14:00:00', NULL, 38, 'Đa sắc'),
(144, 4, 32, 62, 820000, 50840000, '2024-08-04 14:00:00', NULL, 39, 'Đa sắc'),
(145, 4, 32, 51, 820000, 41820000, '2024-08-04 14:00:00', NULL, 40, 'Đa sắc'),
(146, 4, 32, 66, 820000, 54120000, '2024-08-04 14:00:00', NULL, 41, 'Đa sắc'),
(147, 4, 32, 53, 820000, 43460000, '2024-08-04 14:00:00', NULL, 42, 'Đa sắc'),
(148, 4, 32, 40, 820000, 32800000, '2024-08-04 14:00:00', NULL, 43, 'Đa sắc'),
(149, 1, 33, 48, 750000, 36000000, '2024-08-05 10:00:00', NULL, 38, 'Trắng - Đen'),
(150, 1, 33, 60, 750000, 45000000, '2024-08-05 10:00:00', NULL, 39, 'Trắng - Đen'),
(151, 1, 33, 45, 750000, 33750000, '2024-08-05 10:00:00', NULL, 40, 'Trắng - Đen'),
(152, 2, 34, 63, 880000, 55440000, '2024-08-06 13:00:00', NULL, 42, 'Đen - Trắng'),
(153, 2, 34, 40, 880000, 35200000, '2024-08-06 13:00:00', NULL, 43, 'Đen - Trắng'),
(154, 3, 35, 55, 810000, 44550000, '2024-08-07 09:00:00', NULL, 36, 'Đen - Trắng'),
(155, 3, 35, 42, 810000, 34020000, '2024-08-07 09:00:00', NULL, 37, 'Đen - Trắng'),
(156, 3, 35, 61, 810000, 49410000, '2024-08-07 09:00:00', NULL, 38, 'Đen - Trắng'),
(157, 3, 35, 49, 810000, 39690000, '2024-08-07 09:00:00', NULL, 39, 'Đen - Trắng'),
(158, 3, 35, 64, 810000, 51840000, '2024-08-07 09:00:00', NULL, 40, 'Đen - Trắng'),
(159, 3, 35, 52, 810000, 42120000, '2024-08-07 09:00:00', NULL, 41, 'Đen - Trắng'),
(160, 3, 35, 50, 810000, 40500000, '2024-08-07 09:00:00', NULL, 42, 'Đen - Trắng'),
(161, 3, 35, 66, 810000, 53460000, '2024-08-07 09:00:00', NULL, 43, 'Đen - Trắng'),
(162, 4, 36, 40, 740000, 29600000, '2024-08-08 14:00:00', NULL, 38, 'Xám - Trắng'),
(163, 4, 36, 55, 740000, 40700000, '2024-08-08 14:00:00', NULL, 39, 'Xám - Trắng'),
(164, 4, 36, 42, 740000, 31080000, '2024-08-08 14:00:00', NULL, 40, 'Xám - Trắng'),
(165, 1, 37, 60, 870000, 52200000, '2024-08-09 10:00:00', NULL, 42, 'Hồng - Trắng'),
(166, 1, 37, 40, 870000, 34800000, '2024-08-09 10:00:00', NULL, 43, 'Hồng - Trắng'),
(167, 2, 38, 50, 730000, 36500000, '2024-08-10 11:30:00', NULL, 36, 'Kem - Trắng'),
(168, 2, 38, 60, 730000, 43800000, '2024-08-10 11:30:00', NULL, 37, 'Kem - Trắng'),
(169, 2, 38, 45, 730000, 32850000, '2024-08-10 11:30:00', NULL, 38, 'Kem - Trắng'),
(170, 2, 38, 62, 730000, 45260000, '2024-08-10 11:30:00', NULL, 39, 'Kem - Trắng'),
(171, 2, 38, 51, 730000, 37230000, '2024-08-10 11:30:00', NULL, 40, 'Kem - Trắng'),
(172, 2, 38, 66, 730000, 48180000, '2024-08-10 11:30:00', NULL, 41, 'Kem - Trắng'),
(173, 2, 38, 53, 730000, 38690000, '2024-08-10 11:30:00', NULL, 42, 'Kem - Trắng'),
(174, 2, 38, 40, 730000, 29200000, '2024-08-10 11:30:00', NULL, 43, 'Kem - Trắng'),
(175, 3, 39, 45, 1750000, 78750000, '2024-09-01 10:00:00', NULL, 38, 'Đen - Trắng'),
(176, 3, 39, 62, 1750000, 108500000, '2024-09-01 10:00:00', NULL, 39, 'Đen - Trắng'),
(177, 3, 39, 50, 1750000, 87500000, '2024-09-01 10:00:00', NULL, 40, 'Đen - Trắng'),
(178, 3, 39, 66, 1750000, 115500000, '2024-09-01 10:00:00', NULL, 41, 'Đen - Trắng'),
(179, 3, 39, 53, 1750000, 92750000, '2024-09-01 10:00:00', NULL, 42, 'Đen - Trắng'),
(180, 3, 39, 40, 1750000, 70000000, '2024-09-01 10:00:00', NULL, 43, 'Đen - Trắng'),
(181, 4, 40, 60, 1900000, 114000000, '2024-09-02 09:00:00', NULL, 38, 'Hồng - Be'),
(182, 4, 40, 45, 1900000, 85500000, '2024-09-02 09:00:00', NULL, 39, 'Hồng - Be'),
(183, 4, 40, 63, 1900000, 119700000, '2024-09-02 09:00:00', NULL, 40, 'Hồng - Be'),
(184, 1, 41, 50, 1770000, 88500000, '2024-09-03 13:00:00', NULL, 42, 'Đa sắc'),
(185, 1, 41, 40, 1770000, 70800000, '2024-09-03 13:00:00', NULL, 43, 'Đa sắc'),
(186, 2, 42, 55, 2050000, 112750000, '2024-09-04 10:00:00', NULL, 36, 'Đa sắc'),
(187, 2, 42, 42, 2050000, 86100000, '2024-09-04 10:00:00', NULL, 37, 'Đa sắc'),
(188, 2, 42, 61, 2050000, 125050000, '2024-09-04 10:00:00', NULL, 38, 'Đa sắc'),
(189, 2, 42, 49, 2050000, 100450000, '2024-09-04 10:00:00', NULL, 39, 'Đa sắc'),
(190, 2, 42, 64, 2050000, 131200000, '2024-09-04 10:00:00', NULL, 40, 'Đa sắc'),
(191, 2, 42, 52, 2050000, 106600000, '2024-09-04 10:00:00', NULL, 41, 'Đa sắc'),
(192, 2, 42, 50, 2050000, 102500000, '2024-09-04 10:00:00', NULL, 42, 'Đa sắc'),
(193, 2, 42, 66, 2050000, 135300000, '2024-09-04 10:00:00', NULL, 43, 'Đa sắc'),
(194, 3, 43, 40, 1800000, 72000000, '2024-09-05 09:00:00', NULL, 38, 'Nâu'),
(195, 3, 43, 55, 1800000, 99000000, '2024-09-05 09:00:00', NULL, 39, 'Nâu'),
(196, 3, 43, 42, 1800000, 75600000, '2024-09-05 09:00:00', NULL, 40, 'Nâu'),
(197, 4, 44, 60, 1700000, 102000000, '2024-09-06 14:00:00', NULL, 42, 'Đa sắc'),
(198, 4, 44, 40, 1700000, 68000000, '2024-09-06 14:00:00', NULL, 43, 'Đa sắc'),
(199, 1, 45, 50, 2080000, 104000000, '2024-09-07 10:00:00', NULL, 36, 'Trắng - Hồng'),
(200, 1, 45, 60, 2080000, 124800000, '2024-09-07 10:00:00', NULL, 37, 'Trắng - Hồng'),
(201, 1, 45, 45, 2080000, 93600000, '2024-09-07 10:00:00', NULL, 38, 'Trắng - Hồng'),
(202, 1, 45, 62, 2080000, 128960000, '2024-09-07 10:00:00', NULL, 39, 'Trắng - Hồng'),
(203, 1, 45, 51, 2080000, 106080000, '2024-09-07 10:00:00', NULL, 40, 'Trắng - Hồng'),
(204, 1, 45, 66, 2080000, 137280000, '2024-09-07 10:00:00', NULL, 41, 'Trắng - Hồng'),
(205, 1, 45, 53, 2080000, 110240000, '2024-09-07 10:00:00', NULL, 42, 'Trắng - Hồng'),
(206, 1, 45, 40, 2080000, 83200000, '2024-09-07 10:00:00', NULL, 43, 'Trắng - Hồng'),
(207, 2, 46, 48, 1860000, 89280000, '2024-09-08 09:00:00', NULL, 38, 'Trắng'),
(208, 2, 46, 60, 1860000, 111600000, '2024-09-08 09:00:00', NULL, 39, 'Trắng'),
(209, 2, 46, 45, 1860000, 83700000, '2024-09-08 09:00:00', NULL, 40, 'Trắng'),
(210, 3, 47, 63, 1960000, 123480000, '2024-09-09 13:00:00', NULL, 42, 'Trắng - Xanh Lá'),
(211, 3, 47, 40, 1960000, 78400000, '2024-09-09 13:00:00', NULL, 43, 'Trắng - Xanh Lá'),
(212, 4, 48, 55, 2120000, 116600000, '2024-09-10 10:00:00', NULL, 36, 'Be'),
(213, 4, 48, 42, 2120000, 89040000, '2024-09-10 10:00:00', NULL, 37, 'Be'),
(214, 4, 48, 61, 2120000, 129320000, '2024-09-10 10:00:00', NULL, 38, 'Be'),
(215, 4, 48, 49, 2120000, 103880000, '2024-09-10 10:00:00', NULL, 39, 'Be'),
(216, 4, 48, 64, 2120000, 135680000, '2024-09-10 10:00:00', NULL, 40, 'Be'),
(217, 4, 48, 52, 2120000, 110240000, '2024-09-10 10:00:00', NULL, 41, 'Be'),
(218, 4, 48, 50, 2120000, 106000000, '2024-09-10 10:00:00', NULL, 42, 'Be'),
(219, 4, 48, 66, 2120000, 139920000, '2024-09-10 10:00:00', NULL, 43, 'Be'),
(220, 1, 49, 40, 2150000, 86000000, '2024-09-11 09:00:00', NULL, 38, 'Đen'),
(221, 1, 49, 55, 2150000, 118250000, '2024-09-11 09:00:00', NULL, 39, 'Đen'),
(222, 1, 49, 42, 2150000, 90300000, '2024-09-11 09:00:00', NULL, 40, 'Đen'),
(223, 2, 50, 60, 1850000, 111000000, '2024-09-12 14:00:00', NULL, 42, 'Be'),
(224, 2, 50, 40, 1850000, 74000000, '2024-09-12 14:00:00', NULL, 43, 'Be'),
(225, 3, 51, 50, 1970000, 98500000, '2024-09-13 10:00:00', NULL, 36, 'Xanh Lá'),
(226, 3, 51, 60, 1970000, 118200000, '2024-09-13 10:00:00', NULL, 37, 'Xanh Lá'),
(227, 3, 51, 45, 1970000, 88650000, '2024-09-13 10:00:00', NULL, 38, 'Xanh Lá'),
(228, 3, 51, 62, 1970000, 122140000, '2024-09-13 10:00:00', NULL, 39, 'Xanh Lá'),
(229, 3, 51, 51, 1970000, 100470000, '2024-09-13 10:00:00', NULL, 40, 'Xanh Lá'),
(230, 3, 51, 66, 1970000, 130020000, '2024-09-13 10:00:00', NULL, 41, 'Xanh Lá'),
(231, 3, 51, 53, 1970000, 104410000, '2024-09-13 10:00:00', NULL, 42, 'Xanh Lá'),
(232, 3, 51, 40, 1970000, 78800000, '2024-09-13 10:00:00', NULL, 43, 'Xanh Lá'),
(233, 4, 52, 48, 2030000, 97440000, '2024-09-14 09:00:00', NULL, 38, 'Đen - Trắng'),
(234, 4, 52, 60, 2030000, 121800000, '2024-09-14 09:00:00', NULL, 39, 'Đen - Trắng'),
(235, 4, 52, 45, 2030000, 91350000, '2024-09-14 09:00:00', NULL, 40, 'Đen - Trắng'),
(236, 1, 53, 63, 1720000, 108360000, '2024-09-15 13:00:00', NULL, 42, 'Đen'),
(237, 1, 53, 40, 1720000, 68800000, '2024-09-15 13:00:00', NULL, 43, 'Đen'),
(238, 2, 54, 55, 1900000, 104500000, '2024-09-16 10:00:00', NULL, 36, 'Trắng - Xanh Lá'),
(239, 2, 54, 42, 1900000, 79800000, '2024-09-16 10:00:00', NULL, 37, 'Trắng - Xanh Lá'),
(240, 2, 54, 61, 1900000, 115900000, '2024-09-16 10:00:00', NULL, 38, 'Trắng - Xanh Lá'),
(241, 2, 54, 49, 1900000, 93100000, '2024-09-16 10:00:00', NULL, 39, 'Trắng - Xanh Lá'),
(242, 2, 54, 64, 1900000, 121600000, '2024-09-16 10:00:00', NULL, 40, 'Trắng - Xanh Lá'),
(243, 2, 54, 52, 1900000, 98800000, '2024-09-16 10:00:00', NULL, 41, 'Trắng - Xanh Lá'),
(244, 2, 54, 50, 1900000, 95000000, '2024-09-16 10:00:00', NULL, 42, 'Trắng - Xanh Lá'),
(245, 2, 54, 66, 1900000, 125400000, '2024-09-16 10:00:00', NULL, 43, 'Trắng - Xanh Lá'),
(246, 3, 55, 40, 1680000, 67200000, '2024-10-01 10:00:00', NULL, 38, 'Trắng'),
(247, 3, 55, 55, 1680000, 92400000, '2024-10-01 10:00:00', NULL, 39, 'Trắng'),
(248, 3, 55, 42, 1680000, 70560000, '2024-10-01 10:00:00', NULL, 40, 'Trắng'),
(249, 4, 56, 60, 1830000, 109800000, '2024-10-02 09:00:00', NULL, 42, 'Đa sắc'),
(250, 4, 56, 40, 1830000, 73200000, '2024-10-02 09:00:00', NULL, 43, 'Đa sắc'),
(251, 1, 57, 50, 1770000, 88500000, '2024-10-03 13:00:00', NULL, 36, 'Đa sắc'),
(252, 1, 57, 60, 1770000, 106200000, '2024-10-03 13:00:00', NULL, 37, 'Đa sắc'),
(253, 1, 57, 45, 1770000, 79650000, '2024-10-03 13:00:00', NULL, 38, 'Đa sắc'),
(254, 1, 57, 62, 1770000, 109740000, '2024-10-03 13:00:00', NULL, 39, 'Đa sắc'),
(255, 1, 57, 51, 1770000, 90270000, '2024-10-03 13:00:00', NULL, 40, 'Đa sắc'),
(256, 1, 57, 66, 1770000, 116820000, '2024-10-03 13:00:00', NULL, 41, 'Đa sắc'),
(257, 1, 57, 53, 1770000, 93810000, '2024-10-03 13:00:00', NULL, 42, 'Đa sắc'),
(258, 1, 57, 40, 1770000, 70800000, '2024-10-03 13:00:00', NULL, 43, 'Đa sắc'),
(259, 2, 58, 48, 1930000, 92640000, '2024-10-04 10:00:00', NULL, 38, 'Xanh Dương - Trắng'),
(260, 2, 58, 60, 1930000, 115800000, '2024-10-04 10:00:00', NULL, 39, 'Xanh Dương - Trắng'),
(261, 2, 58, 45, 1930000, 86850000, '2024-10-04 10:00:00', NULL, 40, 'Xanh Dương - Trắng'),
(262, 3, 59, 63, 1790000, 112770000, '2024-10-05 09:00:00', NULL, 42, 'Trắng - Đỏ'),
(263, 3, 59, 40, 1790000, 71600000, '2024-10-05 09:00:00', NULL, 43, 'Trắng - Đỏ'),
(264, 4, 60, 55, 1740000, 95700000, '2024-10-06 14:00:00', NULL, 36, 'Trắng - Xanh Lá'),
(265, 4, 60, 42, 1740000, 73080000, '2024-10-06 14:00:00', NULL, 37, 'Trắng - Xanh Lá'),
(266, 4, 60, 61, 1740000, 106140000, '2024-10-06 14:00:00', NULL, 38, 'Trắng - Xanh Lá'),
(267, 4, 60, 49, 1740000, 85260000, '2024-10-06 14:00:00', NULL, 39, 'Trắng - Xanh Lá'),
(268, 4, 60, 64, 1740000, 111360000, '2024-10-06 14:00:00', NULL, 40, 'Trắng - Xanh Lá'),
(269, 4, 60, 52, 1740000, 90480000, '2024-10-06 14:00:00', NULL, 41, 'Trắng - Xanh Lá'),
(270, 4, 60, 50, 1740000, 87000000, '2024-10-06 14:00:00', NULL, 42, 'Trắng - Xanh Lá'),
(271, 4, 60, 66, 1740000, 114840000, '2024-10-06 14:00:00', NULL, 43, 'Trắng - Xanh Lá'),
(272, 1, 61, 40, 1980000, 79200000, '2024-10-07 10:00:00', NULL, 38, 'Trắng'),
(273, 1, 61, 55, 1980000, 108900000, '2024-10-07 10:00:00', NULL, 39, 'Trắng'),
(274, 1, 61, 42, 1980000, 83160000, '2024-10-07 10:00:00', NULL, 40, 'Trắng'),
(275, 2, 62, 60, 1850000, 111000000, '2024-10-08 09:00:00', NULL, 42, 'Be'),
(276, 2, 62, 40, 1850000, 74000000, '2024-10-08 09:00:00', NULL, 43, 'Be'),
(277, 3, 63, 50, 1710000, 85500000, '2024-10-09 13:00:00', NULL, 36, 'Đen'),
(278, 3, 63, 60, 1710000, 102600000, '2024-10-09 13:00:00', NULL, 37, 'Đen'),
(279, 3, 63, 45, 1710000, 76950000, '2024-10-09 13:00:00', NULL, 38, 'Đen'),
(280, 3, 63, 62, 1710000, 106020000, '2024-10-09 13:00:00', NULL, 39, 'Đen'),
(281, 3, 63, 51, 1710000, 87210000, '2024-10-09 13:00:00', NULL, 40, 'Đen'),
(282, 3, 63, 66, 1710000, 112860000, '2024-10-09 13:00:00', NULL, 41, 'Đen'),
(283, 3, 63, 53, 1710000, 90630000, '2024-10-09 13:00:00', NULL, 42, 'Đen'),
(284, 3, 63, 40, 1710000, 68400000, '2024-10-09 13:00:00', NULL, 43, 'Đen'),
(285, 4, 64, 48, 1970000, 94560000, '2024-10-10 10:00:00', NULL, 38, 'Đa sắc'),
(286, 4, 64, 60, 1970000, 118200000, '2024-10-10 10:00:00', NULL, 39, 'Đa sắc'),
(287, 4, 64, 45, 1970000, 88650000, '2024-10-10 10:00:00', NULL, 40, 'Đa sắc'),
(288, 1, 65, 55, 1800000, 99000000, '2024-11-01 10:00:00', NULL, 36, 'Trắng - Đỏ'),
(289, 1, 65, 42, 1800000, 75600000, '2024-11-01 10:00:00', NULL, 37, 'Trắng - Đỏ'),
(290, 1, 65, 61, 1800000, 109800000, '2024-11-01 10:00:00', NULL, 38, 'Trắng - Đỏ'),
(291, 1, 65, 49, 1800000, 88200000, '2024-11-01 10:00:00', NULL, 39, 'Trắng - Đỏ'),
(292, 1, 65, 64, 1800000, 115200000, '2024-11-01 10:00:00', NULL, 40, 'Trắng - Đỏ'),
(293, 1, 65, 52, 1800000, 93600000, '2024-11-01 10:00:00', NULL, 41, 'Trắng - Đỏ'),
(294, 1, 65, 50, 1800000, 90000000, '2024-11-01 10:00:00', NULL, 42, 'Trắng - Đỏ'),
(295, 1, 65, 66, 1800000, 118800000, '2024-11-01 10:00:00', NULL, 43, 'Trắng - Đỏ'),
(296, 2, 66, 40, 1880000, 75200000, '2024-11-02 09:00:00', NULL, 38, 'Trắng'),
(297, 2, 66, 55, 1880000, 103400000, '2024-11-02 09:00:00', NULL, 39, 'Trắng'),
(298, 2, 66, 42, 1880000, 78960000, '2024-11-02 09:00:00', NULL, 40, 'Trắng'),
(299, 3, 67, 60, 1930000, 115800000, '2024-11-03 13:00:00', NULL, 42, 'Nâu - Đen'),
(300, 3, 67, 40, 1930000, 77200000, '2024-11-03 13:00:00', NULL, 43, 'Nâu - Đen'),
(301, 4, 68, 50, 1760000, 88000000, '2024-11-04 10:00:00', NULL, 36, 'Đỏ - Trắng'),
(302, 4, 68, 60, 1760000, 105600000, '2024-11-04 10:00:00', NULL, 37, 'Đỏ - Trắng'),
(303, 4, 68, 45, 1760000, 79200000, '2024-11-04 10:00:00', NULL, 38, 'Đỏ - Trắng'),
(304, 4, 68, 62, 1760000, 109120000, '2024-11-04 10:00:00', NULL, 39, 'Đỏ - Trắng'),
(305, 4, 68, 51, 1760000, 89760000, '2024-11-04 10:00:00', NULL, 40, 'Đỏ - Trắng'),
(306, 4, 68, 66, 1760000, 116160000, '2024-11-04 10:00:00', NULL, 41, 'Đỏ - Trắng'),
(307, 4, 68, 53, 1760000, 93280000, '2024-11-04 10:00:00', NULL, 42, 'Đỏ - Trắng'),
(308, 4, 68, 40, 1760000, 70400000, '2024-11-04 10:00:00', NULL, 43, 'Đỏ - Trắng'),
(309, 1, 69, 48, 1850000, 88800000, '2024-11-05 09:00:00', NULL, 38, 'Trắng - Tím'),
(310, 1, 69, 60, 1850000, 111000000, '2024-11-05 09:00:00', NULL, 39, 'Trắng - Tím'),
(311, 1, 69, 45, 1850000, 83250000, '2024-11-05 09:00:00', NULL, 40, 'Trắng - Tím'),
(312, 2, 70, 63, 1720000, 108360000, '2024-11-06 14:00:00', NULL, 42, 'Đen - Trắng'),
(313, 2, 70, 40, 1720000, 68800000, '2024-11-06 14:00:00', NULL, 43, 'Đen - Trắng'),
(314, 3, 71, 55, 1810000, 99550000, '2024-11-07 10:00:00', NULL, 36, 'Đa sắc'),
(315, 3, 71, 42, 1810000, 76020000, '2024-11-07 10:00:00', NULL, 37, 'Đa sắc'),
(316, 3, 71, 61, 1810000, 110410000, '2024-11-07 10:00:00', NULL, 38, 'Đa sắc'),
(317, 3, 71, 49, 1810000, 88690000, '2024-11-07 10:00:00', NULL, 39, 'Đa sắc'),
(318, 3, 71, 64, 1810000, 115840000, '2024-11-07 10:00:00', NULL, 40, 'Đa sắc'),
(319, 3, 71, 52, 1810000, 94120000, '2024-11-07 10:00:00', NULL, 41, 'Đa sắc'),
(320, 3, 71, 50, 1810000, 90500000, '2024-11-07 10:00:00', NULL, 42, 'Đa sắc'),
(321, 3, 71, 66, 1810000, 119460000, '2024-11-07 10:00:00', NULL, 43, 'Đa sắc'),
(322, 4, 72, 40, 1890000, 75600000, '2024-11-08 09:00:00', NULL, 38, 'Be'),
(323, 4, 72, 55, 1890000, 103950000, '2024-11-08 09:00:00', NULL, 39, 'Be'),
(324, 4, 72, 42, 1890000, 79380000, '2024-11-08 09:00:00', NULL, 40, 'Be'),
(325, 1, 73, 60, 1770000, 106200000, '2024-11-09 13:00:00', NULL, 42, 'Đen - Trắng'),
(326, 1, 73, 40, 1770000, 70800000, '2024-11-09 13:00:00', NULL, 43, 'Đen - Trắng'),
(327, 2, 74, 50, 1840000, 92000000, '2024-11-10 10:00:00', NULL, 36, 'Đen - Trắng'),
(328, 2, 74, 60, 1840000, 110400000, '2024-11-10 10:00:00', NULL, 37, 'Đen - Trắng'),
(329, 2, 74, 45, 1840000, 82800000, '2024-11-10 10:00:00', NULL, 38, 'Đen - Trắng'),
(330, 2, 74, 62, 1840000, 113920000, '2024-11-10 10:00:00', NULL, 39, 'Đen - Trắng'),
(331, 2, 74, 51, 1840000, 93840000, '2024-11-10 10:00:00', NULL, 40, 'Đen - Trắng'),
(332, 2, 74, 66, 1840000, 121440000, '2024-11-10 10:00:00', NULL, 41, 'Đen - Trắng'),
(333, 2, 74, 53, 1840000, 97520000, '2024-11-10 10:00:00', NULL, 42, 'Đen - Trắng'),
(334, 2, 74, 40, 1840000, 73600000, '2024-11-10 10:00:00', NULL, 43, 'Đen - Trắng'),
(335, 3, 75, 45, 2100000, 94500000, '2024-12-01 10:00:00', NULL, 38, 'Trắng - Đen'),
(336, 3, 75, 62, 2100000, 130200000, '2024-12-01 10:00:00', NULL, 39, 'Trắng - Đen'),
(337, 3, 75, 50, 2100000, 105000000, '2024-12-01 10:00:00', NULL, 40, 'Trắng - Đen'),
(338, 3, 75, 66, 2100000, 138600000, '2024-12-01 10:00:00', NULL, 41, 'Trắng - Đen'),
(339, 3, 75, 53, 2100000, 111300000, '2024-12-01 10:00:00', NULL, 42, 'Trắng - Đen'),
(340, 3, 75, 40, 2100000, 84000000, '2024-12-01 10:00:00', NULL, 43, 'Trắng - Đen'),
(341, 4, 76, 60, 2550000, 153000000, '2024-12-02 09:00:00', NULL, 38, 'Đa sắc'),
(342, 4, 76, 45, 2550000, 114750000, '2024-12-02 09:00:00', NULL, 39, 'Đa sắc'),
(343, 4, 76, 63, 2550000, 160650000, '2024-12-02 09:00:00', NULL, 40, 'Đa sắc'),
(344, 1, 77, 50, 2900000, 145000000, '2024-12-03 13:00:00', NULL, 42, 'Trắng - Đen'),
(345, 1, 77, 40, 2900000, 116000000, '2024-12-03 13:00:00', NULL, 43, 'Trắng - Đen'),
(346, 2, 78, 55, 1880000, 103400000, '2024-12-04 10:00:00', NULL, 36, 'Trắng - Xanh Dương'),
(347, 2, 78, 42, 1880000, 78960000, '2024-12-04 10:00:00', NULL, 37, 'Trắng - Xanh Dương'),
(348, 2, 78, 61, 1880000, 114680000, '2024-12-04 10:00:00', NULL, 38, 'Trắng - Xanh Dương'),
(349, 2, 78, 49, 1880000, 92120000, '2024-12-04 10:00:00', NULL, 39, 'Trắng - Xanh Dương'),
(350, 2, 78, 64, 1880000, 120320000, '2024-12-04 10:00:00', NULL, 40, 'Trắng - Xanh Dương'),
(351, 2, 78, 52, 1880000, 97760000, '2024-08-04 10:00:00', NULL, 41, 'Trắng - Xanh Dương'),
(352, 2, 78, 50, 1880000, 94000000, '2024-12-04 10:00:00', NULL, 42, 'Trắng - Xanh Dương'),
(353, 2, 78, 66, 1880000, 124080000, '2024-12-04 10:00:00', NULL, 43, 'Trắng - Xanh Dương'),
(354, 3, 79, 40, 2300000, 92000000, '2024-12-05 09:00:00', NULL, 38, 'Be - Xanh Dương'),
(355, 3, 79, 55, 2300000, 126500000, '2024-12-05 09:00:00', NULL, 39, 'Be - Xanh Dương'),
(356, 3, 79, 42, 2300000, 96600000, '2024-12-05 09:00:00', NULL, 40, 'Be - Xanh Dương'),
(357, 4, 80, 60, 2750000, 165000000, '2024-12-06 14:00:00', NULL, 42, 'Đen - Trắng'),
(358, 4, 80, 40, 2750000, 110000000, '2024-12-06 14:00:00', NULL, 43, 'Đen - Trắng'),
(359, 1, 81, 50, 1630000, 81500000, '2024-12-07 10:00:00', NULL, 36, 'Trắng - Xanh Dương'),
(360, 1, 81, 60, 1630000, 97800000, '2024-12-07 10:00:00', NULL, 37, 'Trắng - Xanh Dương'),
(361, 1, 81, 45, 1630000, 73350000, '2024-12-07 10:00:00', NULL, 38, 'Trắng - Xanh Dương'),
(362, 1, 81, 62, 1630000, 101060000, '2024-12-07 10:00:00', NULL, 39, 'Trắng - Xanh Dương'),
(363, 1, 81, 51, 1630000, 83130000, '2024-12-07 10:00:00', NULL, 40, 'Trắng - Xanh Dương'),
(364, 1, 81, 66, 1630000, 107580000, '2024-12-07 10:00:00', NULL, 41, 'Trắng - Xanh Dương'),
(365, 1, 81, 53, 1630000, 86390000, '2024-12-07 10:00:00', NULL, 42, 'Trắng - Xanh Dương'),
(366, 1, 81, 40, 1630000, 65200000, '2024-12-07 10:00:00', NULL, 43, 'Trắng - Xanh Dương'),
(367, 2, 82, 48, 1720000, 82560000, '2024-12-08 09:00:00', NULL, 38, 'Trắng - Bạc'),
(368, 2, 82, 60, 1720000, 103200000, '2024-12-08 09:00:00', NULL, 39, 'Trắng - Bạc'),
(369, 2, 82, 45, 1720000, 77400000, '2024-12-08 09:00:00', NULL, 40, 'Trắng - Bạc'),
(370, 3, 83, 63, 2400000, 151200000, '2024-12-09 13:00:00', NULL, 42, 'Đen - Trắng'),
(371, 3, 83, 40, 2400000, 96000000, '2024-12-09 13:00:00', NULL, 43, 'Đen - Trắng'),
(372, 4, 84, 55, 2950000, 162250000, '2024-12-10 10:00:00', NULL, 36, 'Bạc - Xám'),
(373, 4, 84, 42, 2950000, 123900000, '2024-12-10 10:00:00', NULL, 37, 'Bạc - Xám'),
(374, 4, 84, 61, 2950000, 180950000, '2024-12-10 10:00:00', NULL, 38, 'Bạc - Xám'),
(375, 4, 84, 49, 2950000, 144550000, '2024-12-10 10:00:00', NULL, 39, 'Bạc - Xám'),
(376, 4, 84, 64, 2950000, 188800000, '2024-12-10 10:00:00', NULL, 40, 'Bạc - Xám'),
(377, 4, 84, 52, 2950000, 153400000, '2024-12-10 10:00:00', NULL, 41, 'Bạc - Xám'),
(378, 4, 84, 50, 2950000, 147500000, '2024-12-10 10:00:00', NULL, 42, 'Bạc - Xám'),
(379, 4, 84, 66, 2950000, 194700000, '2024-12-10 10:00:00', NULL, 43, 'Bạc - Xám'),
(380, 1, 85, 45, 1700000, 76500000, '2025-01-01 10:00:00', NULL, 38, 'Kem - Xanh Dương'),
(381, 1, 85, 62, 1700000, 105400000, '2025-01-01 10:00:00', NULL, 39, 'Kem - Xanh Dương'),
(382, 1, 85, 50, 1700000, 85000000, '2025-01-01 10:00:00', NULL, 40, 'Kem - Xanh Dương'),
(383, 1, 85, 66, 1700000, 112200000, '2025-01-01 10:00:00', NULL, 41, 'Kem - Xanh Dương'),
(384, 1, 85, 53, 1700000, 90100000, '2025-01-01 10:00:00', NULL, 42, 'Kem - Xanh Dương'),
(385, 1, 85, 40, 1700000, 68000000, '2025-01-01 10:00:00', NULL, 43, 'Kem - Xanh Dương'),
(386, 2, 86, 60, 1900000, 114000000, '2025-01-02 09:00:00', NULL, 38, 'Đa sắc'),
(387, 2, 86, 45, 1900000, 85500000, '2025-01-02 09:00:00', NULL, 39, 'Đa sắc'),
(388, 2, 86, 63, 1900000, 119700000, '2025-01-02 09:00:00', NULL, 40, 'Đa sắc'),
(389, 3, 87, 50, 2000000, 100000000, '2025-01-03 13:00:00', NULL, 42, 'Đa sắc'),
(390, 3, 87, 40, 2000000, 80000000, '2025-01-03 13:00:00', NULL, 43, 'Đa sắc'),
(391, 4, 88, 55, 1860000, 102300000, '2025-01-04 10:00:00', NULL, 36, 'Đa sắc'),
(392, 4, 88, 42, 1860000, 78120000, '2025-01-04 10:00:00', NULL, 37, 'Đa sắc'),
(393, 4, 88, 61, 1860000, 113460000, '2025-01-04 10:00:00', NULL, 38, 'Đa sắc'),
(394, 4, 88, 49, 1860000, 91140000, '2025-01-04 10:00:00', NULL, 39, 'Đa sắc'),
(395, 4, 88, 64, 1860000, 119040000, '2025-01-04 10:00:00', NULL, 40, 'Đa sắc'),
(396, 4, 88, 52, 1860000, 96720000, '2025-01-04 10:00:00', NULL, 41, 'Đa sắc'),
(397, 4, 88, 50, 1860000, 93000000, '2025-01-04 10:00:00', NULL, 42, 'Đa sắc'),
(398, 4, 88, 66, 1860000, 122760000, '2025-01-04 10:00:00', NULL, 43, 'Đa sắc'),
(399, 1, 89, 40, 1740000, 69600000, '2025-01-05 09:00:00', NULL, 38, 'Cam - Đen'),
(400, 1, 89, 55, 1740000, 95700000, '2025-01-05 09:00:00', NULL, 39, 'Cam - Đen'),
(401, 1, 89, 42, 1740000, 73080000, '2025-01-05 09:00:00', NULL, 40, 'Cam - Đen'),
(402, 2, 90, 60, 2080000, 124800000, '2025-01-06 14:00:00', NULL, 42, 'Xanh Lá'),
(403, 2, 90, 40, 2080000, 83200000, '2025-01-06 14:00:00', NULL, 43, 'Xanh Lá'),
(404, 3, 91, 50, 1820000, 91000000, '2025-01-07 10:00:00', NULL, 36, 'Xanh Dương - Xám'),
(405, 3, 91, 60, 1820000, 109200000, '2025-01-07 10:00:00', NULL, 37, 'Xanh Dương - Xám'),
(406, 3, 91, 45, 1820000, 81900000, '2025-01-07 10:00:00', NULL, 38, 'Xanh Dương - Xám'),
(407, 3, 91, 62, 1820000, 112840000, '2025-01-07 10:00:00', NULL, 39, 'Xanh Dương - Xám'),
(408, 3, 91, 51, 1820000, 92820000, '2025-01-07 10:00:00', NULL, 40, 'Xanh Dương - Xám'),
(409, 3, 91, 66, 1820000, 120120000, '2025-01-07 10:00:00', NULL, 41, 'Xanh Dương - Xám'),
(410, 3, 91, 53, 1820000, 96460000, '2025-01-07 10:00:00', NULL, 42, 'Xanh Dương - Xám'),
(411, 3, 91, 40, 1820000, 72800000, '2025-01-07 10:00:00', NULL, 43, 'Xanh Dương - Xám'),
(412, 4, 92, 48, 1690000, 81120000, '2025-01-08 09:00:00', NULL, 38, 'Tím - Vàng'),
(413, 4, 92, 60, 1690000, 101400000, '2025-01-08 09:00:00', NULL, 39, 'Tím - Vàng'),
(414, 4, 92, 45, 1690000, 76050000, '2025-01-08 09:00:00', NULL, 40, 'Tím - Vàng'),
(415, 1, 93, 63, 1950000, 122850000, '2025-01-09 13:00:00', NULL, 42, 'Đen - Xanh Lá'),
(416, 1, 93, 40, 1950000, 78000000, '2025-01-09 13:00:00', NULL, 43, 'Đen - Xanh Lá'),
(417, 2, 94, 55, 1770000, 97350000, '2025-01-10 10:00:00', NULL, 36, 'Đen - Trắng'),
(418, 2, 94, 42, 1770000, 74340000, '2025-01-10 10:00:00', NULL, 37, 'Đen - Trắng'),
(419, 2, 94, 61, 1770000, 108000000, '2025-01-10 10:00:00', NULL, 38, 'Đen - Trắng'),
(420, 2, 94, 49, 1770000, 86730000, '2025-01-10 10:00:00', NULL, 39, 'Đen - Trắng'),
(421, 2, 94, 64, 1770000, 113280000, '2025-01-10 10:00:00', NULL, 40, 'Đen - Trắng'),
(422, 2, 94, 52, 1770000, 92040000, '2025-01-10 10:00:00', NULL, 41, 'Đen - Trắng'),
(423, 2, 94, 50, 1770000, 88500000, '2025-01-10 10:00:00', NULL, 42, 'Đen - Trắng'),
(424, 2, 94, 66, 1770000, 116820000, '2025-01-10 10:00:00', NULL, 43, 'Đen - Trắng'),
(425, 3, 95, 40, 1770000, 70800000, '2025-01-11 09:00:00', NULL, 38, 'Xanh Dương'),
(426, 3, 95, 55, 1770000, 97350000, '2025-01-11 09:00:00', NULL, 39, 'Xanh Dương'),
(427, 3, 95, 42, 1770000, 74340000, '2025-01-11 09:00:00', NULL, 40, 'Xanh Dương'),
(428, 4, 96, 60, 1690000, 101400000, '2025-01-12 14:00:00', NULL, 42, 'Trắng - Hồng'),
(429, 4, 96, 40, 1690000, 67600000, '2025-01-12 14:00:00', NULL, 43, 'Trắng - Hồng'),
(430, 1, 97, 50, 1860000, 93000000, '2025-01-13 10:00:00', NULL, 36, 'Cam'),
(431, 1, 97, 60, 1860000, 111600000, '2025-01-13 10:00:00', NULL, 37, 'Cam'),
(432, 1, 97, 45, 1860000, 83700000, '2025-01-13 10:00:00', NULL, 38, 'Cam'),
(433, 1, 97, 62, 1860000, 115320000, '2025-01-13 10:00:00', NULL, 39, 'Cam'),
(434, 1, 97, 51, 1860000, 94860000, '2025-01-13 10:00:00', NULL, 40, 'Cam'),
(435, 1, 97, 66, 1860000, 122760000, '2025-01-13 10:00:00', NULL, 41, 'Cam'),
(436, 1, 97, 53, 1860000, 98580000, '2025-01-13 10:00:00', NULL, 42, 'Cam'),
(437, 1, 97, 40, 1860000, 74400000, '2025-01-13 10:00:00', NULL, 43, 'Cam'),
(438, 2, 98, 48, 2010000, 96480000, '2025-01-14 09:00:00', NULL, 38, 'Đen - Trắng'),
(439, 2, 98, 60, 2010000, 120600000, '2025-01-14 09:00:00', NULL, 39, 'Đen - Trắng'),
(440, 2, 98, 45, 2010000, 90450000, '2025-01-14 09:00:00', NULL, 40, 'Đen - Trắng'),
(441, 3, 99, 63, 1890000, 119070000, '2025-01-15 13:00:00', NULL, 42, 'Xám'),
(442, 3, 99, 40, 1890000, 75600000, '2025-01-15 13:00:00', NULL, 43, 'Xám'),
(443, 4, 100, 55, 2120000, 116600000, '2025-01-16 10:00:00', NULL, 36, 'Hồng'),
(444, 4, 100, 42, 2120000, 89040000, '2025-01-16 10:00:00', NULL, 37, 'Hồng'),
(445, 4, 100, 61, 2120000, 129320000, '2025-01-16 10:00:00', NULL, 38, 'Hồng'),
(446, 4, 100, 49, 2120000, 103880000, '2025-01-16 10:00:00', NULL, 39, 'Hồng'),
(447, 4, 100, 64, 2120000, 135680000, '2025-01-16 10:00:00', NULL, 40, 'Hồng'),
(448, 4, 100, 52, 2120000, 110240000, '2025-01-16 10:00:00', NULL, 41, 'Hồng'),
(449, 4, 100, 50, 2120000, 106000000, '2025-01-16 10:00:00', NULL, 42, 'Hồng'),
(450, 4, 100, 66, 2120000, 139920000, '2025-01-16 10:00:00', NULL, 43, 'Hồng'),
(451, 1, 101, 40, 1960000, 78400000, '2025-01-17 09:00:00', NULL, 38, 'Trắng'),
(452, 1, 101, 55, 1960000, 107800000, '2025-01-17 09:00:00', NULL, 39, 'Trắng'),
(453, 1, 101, 42, 1960000, 82320000, '2025-01-17 09:00:00', NULL, 40, 'Trắng'),
(454, 2, 102, 60, 1820000, 109200000, '2025-01-18 14:00:00', NULL, 42, 'Trắng - Đỏ'),
(455, 2, 102, 40, 1820000, 72800000, '2025-01-18 14:00:00', NULL, 43, 'Trắng - Đỏ'),
(456, 3, 103, 50, 1700000, 85000000, '2025-02-01 10:00:00', NULL, 36, 'Xanh Lá - Trắng'),
(457, 3, 103, 60, 1700000, 102000000, '2025-02-01 10:00:00', NULL, 37, 'Xanh Lá - Trắng'),
(458, 3, 103, 45, 1700000, 76500000, '2025-02-01 10:00:00', NULL, 38, 'Xanh Lá - Trắng'),
(459, 3, 103, 62, 1700000, 105400000, '2025-02-01 10:00:00', NULL, 39, 'Xanh Lá - Trắng'),
(460, 3, 103, 51, 1700000, 86700000, '2025-02-01 10:00:00', NULL, 40, 'Xanh Lá - Trắng'),
(461, 3, 103, 66, 1700000, 112200000, '2025-02-01 10:00:00', NULL, 41, 'Xanh Lá - Trắng'),
(462, 3, 103, 53, 1700000, 90100000, '2025-02-01 10:00:00', NULL, 42, 'Xanh Lá - Trắng'),
(463, 3, 103, 40, 1700000, 68000000, '2025-02-01 10:00:00', NULL, 43, 'Xanh Lá - Trắng'),
(464, 4, 104, 48, 1850000, 88800000, '2025-02-02 09:00:00', NULL, 38, 'Trắng - Xanh Dương'),
(465, 4, 104, 60, 1850000, 111000000, '2025-02-02 09:00:00', NULL, 39, 'Trắng - Xanh Dương'),
(466, 4, 104, 45, 1850000, 83250000, '2025-02-02 09:00:00', NULL, 40, 'Trắng - Xanh Dương'),
(467, 1, 105, 63, 1900000, 119700000, '2025-02-03 13:00:00', NULL, 42, 'Đen - Trắng'),
(468, 1, 105, 40, 1900000, 76000000, '2025-02-03 13:00:00', NULL, 43, 'Đen - Trắng'),
(469, 2, 106, 55, 1740000, 95700000, '2025-02-04 10:00:00', NULL, 36, 'Kem - Xám'),
(470, 2, 106, 42, 1740000, 73080000, '2025-02-04 10:00:00', NULL, 37, 'Kem - Xám'),
(471, 2, 106, 61, 1740000, 106140000, '2025-02-04 10:00:00', NULL, 38, 'Kem - Xám'),
(472, 2, 106, 49, 1740000, 85260000, '2025-02-04 10:00:00', NULL, 39, 'Kem - Xám'),
(473, 2, 106, 64, 1740000, 111360000, '2025-02-04 10:00:00', NULL, 40, 'Kem - Xám'),
(474, 2, 106, 52, 1740000, 90480000, '2025-02-04 10:00:00', NULL, 41, 'Kem - Xám'),
(475, 2, 106, 50, 1740000, 87000000, '2025-02-04 10:00:00', NULL, 42, 'Kem - Xám'),
(476, 2, 106, 66, 1740000, 114840000, '2025-02-04 10:00:00', NULL, 43, 'Kem - Xám'),
(477, 3, 107, 40, 1990000, 79600000, '2025-02-05 09:00:00', NULL, 38, 'Đen - Trắng'),
(478, 3, 107, 55, 1990000, 109450000, '2025-02-05 09:00:00', NULL, 39, 'Đen - Trắng'),
(479, 3, 107, 42, 1990000, 83580000, '2025-02-05 09:00:00', NULL, 40, 'Đen - Trắng'),
(480, 4, 108, 60, 1680000, 100800000, '2025-02-06 14:00:00', NULL, 42, 'Đen - Trắng'),
(481, 4, 108, 40, 1680000, 67200000, '2025-02-06 14:00:00', NULL, 43, 'Đen - Trắng'),
(482, 1, 109, 50, 1830000, 91500000, '2025-02-07 10:00:00', NULL, 36, 'Nâu'),
(483, 1, 109, 60, 1830000, 109800000, '2025-02-07 10:00:00', NULL, 37, 'Nâu'),
(484, 1, 109, 45, 1830000, 82350000, '2025-02-07 10:00:00', NULL, 38, 'Nâu'),
(485, 1, 109, 62, 1830000, 113460000, '2025-02-07 10:00:00', NULL, 39, 'Nâu'),
(486, 1, 109, 51, 1830000, 93330000, '2025-02-07 10:00:00', NULL, 40, 'Nâu'),
(487, 1, 109, 66, 1830000, 120780000, '2025-02-07 10:00:00', NULL, 41, 'Nâu'),
(488, 1, 109, 53, 1830000, 97000000, '2025-02-07 10:00:00', NULL, 42, 'Nâu'),
(489, 1, 109, 40, 1830000, 73200000, '2025-02-07 10:00:00', NULL, 43, 'Nâu'),
(490, 2, 110, 48, 1940000, 93120000, '2025-02-08 09:00:00', NULL, 38, 'Đen - Trắng'),
(491, 2, 110, 60, 1940000, 116400000, '2025-02-08 09:00:00', NULL, 39, 'Đen - Trắng'),
(492, 2, 110, 45, 1940000, 87300000, '2025-02-08 09:00:00', NULL, 40, 'Đen - Trắng'),
(493, 3, 111, 63, 1720000, 108360000, '2025-02-09 13:00:00', NULL, 42, 'Xanh Dương - Trắng'),
(494, 3, 111, 40, 1720000, 68800000, '2025-02-09 13:00:00', NULL, 43, 'Xanh Dương - Trắng'),
(495, 4, 112, 55, 2050000, 112750000, '2025-02-10 10:00:00', NULL, 36, 'Đen - Trắng'),
(496, 4, 112, 42, 2050000, 86100000, '2025-02-10 10:00:00', NULL, 37, 'Đen - Trắng'),
(497, 4, 112, 61, 2050000, 125050000, '2025-02-10 10:00:00', NULL, 38, 'Đen - Trắng'),
(498, 4, 112, 49, 2050000, 100450000, '2025-02-10 10:00:00', NULL, 39, 'Đen - Trắng'),
(499, 4, 112, 64, 2050000, 131200000, '2025-02-10 10:00:00', NULL, 40, 'Đen - Trắng'),
(500, 4, 112, 52, 2050000, 106600000, '2025-02-10 10:00:00', NULL, 41, 'Đen - Trắng'),
(501, 4, 112, 50, 2050000, 102500000, '2025-02-10 10:00:00', NULL, 42, 'Đen - Trắng'),
(502, 4, 112, 66, 2050000, 135300000, '2025-02-10 10:00:00', NULL, 43, 'Đen - Trắng'),
(503, 1, 113, 40, 1760000, 70400000, '2025-03-01 10:00:00', NULL, 38, 'Kem'),
(504, 1, 113, 55, 1760000, 96800000, '2025-03-01 10:00:00', NULL, 39, 'Kem'),
(505, 1, 113, 42, 1760000, 73920000, '2025-03-01 10:00:00', NULL, 40, 'Kem'),
(506, 2, 114, 60, 1900000, 114000000, '2025-03-02 09:00:00', NULL, 42, 'Kem - Xanh Lá'),
(507, 2, 114, 40, 1900000, 76000000, '2025-03-02 09:00:00', NULL, 43, 'Kem - Xanh Lá'),
(508, 3, 115, 50, 1680000, 84000000, '2025-03-03 13:00:00', NULL, 36, 'Trắng'),
(509, 3, 115, 60, 1680000, 100800000, '2025-03-03 13:00:00', NULL, 37, 'Trắng'),
(510, 3, 115, 45, 1680000, 75600000, '2025-03-03 13:00:00', NULL, 38, 'Trắng'),
(511, 3, 115, 62, 1680000, 104160000, '2025-03-03 13:00:00', NULL, 39, 'Trắng'),
(512, 3, 115, 51, 1680000, 85680000, '2025-03-03 13:00:00', NULL, 40, 'Trắng'),
(513, 3, 115, 66, 1680000, 110880000, '2025-03-03 13:00:00', NULL, 41, 'Trắng'),
(514, 3, 115, 53, 1680000, 89040000, '2025-03-03 13:00:00', NULL, 42, 'Trắng'),
(515, 3, 115, 40, 1680000, 67200000, '2025-03-03 13:00:00', NULL, 43, 'Trắng'),
(516, 4, 116, 48, 2030000, 97440000, '2025-03-04 10:00:00', NULL, 38, 'Trắng - Xanh Dương'),
(517, 4, 116, 60, 2030000, 121800000, '2025-03-04 10:00:00', NULL, 39, 'Trắng - Xanh Dương'),
(518, 4, 116, 45, 2030000, 91350000, '2025-03-04 10:00:00', NULL, 40, 'Trắng - Xanh Dương'),
(519, 1, 117, 63, 1810000, 114030000, '2025-03-05 09:00:00', NULL, 42, 'Trắng'),
(520, 1, 117, 40, 1810000, 72400000, '2025-03-05 09:00:00', NULL, 43, 'Trắng'),
(521, 2, 118, 55, 1960000, 107800000, '2025-03-06 14:00:00', NULL, 36, 'Trắng - Xanh'),
(522, 2, 118, 42, 1960000, 82320000, '2025-03-06 14:00:00', NULL, 37, 'Trắng - Xanh'),
(523, 2, 118, 61, 1960000, 119560000, '2025-03-06 14:00:00', NULL, 38, 'Trắng - Xanh'),
(524, 2, 118, 49, 1960000, 96040000, '2025-03-06 14:00:00', NULL, 39, 'Trắng - Xanh'),
(525, 2, 118, 64, 1960000, 125440000, '2025-03-06 14:00:00', NULL, 40, 'Trắng - Xanh'),
(526, 2, 118, 52, 1960000, 101920000, '2025-03-06 14:00:00', NULL, 41, 'Trắng - Xanh'),
(527, 2, 118, 50, 1960000, 98000000, '2025-03-06 14:00:00', NULL, 42, 'Trắng - Xanh'),
(528, 2, 118, 66, 1960000, 129360000, '2025-03-06 14:00:00', NULL, 43, 'Trắng - Xanh'),
(529, 3, 119, 40, 1730000, 69200000, '2025-03-07 09:00:00', NULL, 38, 'Trắng - Kem'),
(530, 3, 119, 55, 1730000, 95150000, '2025-03-07 09:00:00', NULL, 39, 'Trắng - Kem'),
(531, 3, 119, 42, 1730000, 72660000, '2025-03-07 09:00:00', NULL, 40, 'Trắng - Kem'),
(532, 4, 120, 60, 1870000, 112200000, '2025-03-08 14:00:00', NULL, 42, 'Trắng - Xanh Dương'),
(533, 4, 120, 40, 1870000, 74800000, '2025-03-08 14:00:00', NULL, 43, 'Trắng - Xanh Dương'),
(534, 1, 121, 50, 1700000, 85000000, '2025-03-09 10:00:00', NULL, 36, 'Trắng - Nâu'),
(535, 1, 121, 60, 1700000, 102000000, '2025-03-09 10:00:00', NULL, 37, 'Trắng - Nâu'),
(536, 1, 121, 45, 1700000, 76500000, '2025-03-09 10:00:00', NULL, 38, 'Trắng - Nâu'),
(537, 1, 121, 62, 1700000, 105400000, '2025-03-09 10:00:00', NULL, 39, 'Trắng - Nâu'),
(538, 1, 121, 51, 1700000, 86700000, '2025-03-09 10:00:00', NULL, 40, 'Trắng - Nâu'),
(539, 1, 121, 66, 1700000, 112200000, '2025-03-09 10:00:00', NULL, 41, 'Trắng - Nâu'),
(540, 1, 121, 53, 1700000, 90100000, '2025-03-09 10:00:00', NULL, 42, 'Trắng - Nâu'),
(541, 1, 121, 40, 1700000, 68000000, '2025-03-09 10:00:00', NULL, 43, 'Trắng - Nâu'),
(542, 2, 122, 48, 2080000, 99840000, '2025-03-10 09:00:00', NULL, 38, 'Đa sắc'),
(543, 2, 122, 60, 2080000, 124800000, '2025-03-10 09:00:00', NULL, 39, 'Đa sắc'),
(544, 2, 122, 45, 2080000, 93600000, '2025-03-10 09:00:00', NULL, 40, 'Đa sắc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuxuat`
--

CREATE TABLE `phieuxuat` (
  `MaPX` int(11) NOT NULL,
  `MaNV` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `Mau` varchar(100) NOT NULL,
  `Size` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` decimal(10,0) NOT NULL,
  `TongTien` decimal(10,0) NOT NULL,
  `Note` varchar(500) NOT NULL,
  `NgayXuat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `phieuxuat`
--

INSERT INTO `phieuxuat` (`MaPX`, `MaNV`, `MaSP`, `Mau`, `Size`, `SoLuong`, `DonGia`, `TongTien`, `Note`, `NgayXuat`) VALUES
(5, 3, 4, 'none', 36, 40, 1000000, 40000000, 'test', '2020-01-10 21:18:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `id` int(11) NOT NULL,
  `Ten` varchar(100) NOT NULL,
  `MoTa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`id`, `Ten`, `MoTa`) VALUES
(1, 'Manager', 'chủ cửa hàng'),
(2, 'Project Manager', 'quản trị viên'),
(3, 'Quản lý Kho', ''),
(4, 'Nhân viên Bán Hàng', ''),
(5, 'Nhân viên giao hàng', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL,
  `TenSP` varchar(50) NOT NULL,
  `MaDM` int(11) DEFAULT NULL,
  `MaNCC` int(11) NOT NULL,
  `SoLuong` int(11) DEFAULT 0,
  `MoTa` text DEFAULT NULL,
  `DonGia` decimal(10,0) NOT NULL,
  `AnhNen` varchar(50) DEFAULT NULL,
  `SanPhamNoiBat` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `MaDM`, `MaNCC`, `SoLuong`, `MoTa`, `DonGia`, `AnhNen`, `SanPhamNoiBat`) VALUES
(1, 'ADIDAS_ADICLOG_CREAM', 4, 1, 50, 'Dép Adidas Adiclog Cream với thiết kế đúc nguyên khối, mang lại sự thoải mái tối đa và phong cách hiện đại. Lý tưởng cho cả trong nhà và ngoài trời.', 985000, 'ADIDAS_ADICLOG_CREAM1.jpg', 0),
(2, 'ADIDAS_ADIFOM_BLACK', 4, 1, 50, 'Dép Adidas Adifom Black được làm từ chất liệu EVA siêu nhẹ, bền bỉ, ôm chân và êm ái, thích hợp cho mọi hoạt động hàng ngày.', 799000, 'ADIDAS_ADIFOM_BLACK1.jpg', 0),
(3, 'ADIDAS_ADILETTE_AQUA_ARMY_GREEN', 4, 1, 50, 'Dép Adidas Adilette Aqua Army Green với thiết kế nhanh khô, chống trượt, hoàn hảo cho hồ bơi, bãi biển hoặc sử dụng hàng ngày.', 880000, 'ADIDAS_ADILETTE_AQUA_ARMY_GREEN1.jpg', 0),
(4, 'ADIDAS_ADILETTE_COMFORT_BLACK_WHITE', 4, 1, 50, 'Dép Adidas Adilette Comfort Black White với công nghệ đệm Cloudfoam Plus siêu mềm, mang đến sự êm ái vượt trội cho đôi chân sau những giờ tập luyện.', 1150000, 'ADIDAS_ADILETTE_COMFORT_BLACK_WHITE.jpg', 0),
(5, 'ADIDAS_ADILETTE_GT_NAVY_GOLD', 4, 1, 50, 'Dép Adidas Adilette GT Navy Gold nổi bật với phối màu sang trọng, đế đúc nguyên khối chắc chắn, bền bỉ, mang lại cảm giác thoải mái tối ưu.', 725000, 'ADIDAS_ADILETTE_GT_NAVY_GOLD.jpg', 0),
(6, 'ADIDAS_ADILETTE_PRINT_BLACK_WHITE', 4, 1, 50, 'Dép Adidas Adilette Print Black White với họa tiết độc đáo, tạo điểm nhấn thời trang. Đế dép mềm mại, chống trượt, phù hợp cho mọi hoạt động.', 1020000, 'ADIDAS_ADILETTE_PRINT_BLACK_WHITE.jpg', 0),
(7, 'ADIDAS_ADILETTE_SLIDES_BLACK', 4, 1, 50, 'Dép Adidas Adilette Slides Black mang phong cách cổ điển, thiết kế đơn giản nhưng không kém phần linh hoạt và thoải mái, lý tưởng cho thư giãn.', 705000, 'ADIDAS_ADILETTE_SLIDES_BLACK.jpg', 0),
(8, 'ADIDAS_ADILETTE_WHITE_BLACK', 4, 1, 50, 'Dép Adidas Adilette White Black với gam màu đối lập kinh điển, đế đúc siêu êm, phù hợp cho cả hoạt động thể thao và thường ngày.', 910000, 'ADIDAS_ADILETTE_WHITE_BLACK.jpg', 0),
(9, 'ADIDAS_FLOW_SLIVER', 4, 1, 50, 'Dép Adidas Flow Sliver với thiết kế nhẹ nhàng, thoáng khí, ôm sát chân, tạo cảm giác chắc chắn và thoải mái tối ưu trong mọi di chuyển.', 1080000, 'ADIDAS_FLOW_SLIVER.jpg', 0),
(10, 'ADIDAS_YEEZY_SLIDE_BEIGEE', 4, 1, 50, 'Dép Adidas Yeezy Slide Beigee với thiết kế độc đáo, tối giản và chất liệu EVA cao cấp, mang lại trải nghiệm êm ái vượt trội và phong cách đột phá.', 1195000, 'ADIDAS_YEEZY_SLIDE_BEIGEE.jpg', 0),
(11, 'ADIDAS_ADICANE_CLOGS_BEGIE', 4, 1, 50, 'Dép Adidas Adicane Clogs Beigie - sự kết hợp hoàn hảo giữa phong cách và tiện dụng, với chất liệu nhẹ, thoáng khí, mang lại sự thoải mái dễ chịu.', 900000, 'ADIDAS_ADICANE_CLOGS_BEGIE1.jpg', 0),
(12, 'ADIDAS_ADICANE_SLIDE_GREY', 4, 1, 50, 'Dép Adidas Adicane Slide Grey có thiết kế trượt tiện lợi, đế đệm êm ái và bề mặt chống trượt, là lựa chọn lý tưởng cho ngày hè năng động.', 810000, 'ADIDAS_ADICANE_SLIDE_GREY1.jpg', 0),
(13, 'ADIDAS_ADILETTE_22_GREY_SILVER_GREEN', 4, 1, 50, 'Dép Adidas Adilette 22 Grey Silver Green với vẻ ngoài tương lai, được làm từ vật liệu bền vững, mang lại sự êm ái và phong cách độc đáo.', 1100000, 'ADIDAS_ADILETTE_22_GREY_SILVER_GREEN1.jpg', 0),
(14, 'ADIDAS_ADILETTE_22_WHITE_BLACK', 4, 1, 50, 'Dép Adidas Adilette 22 White Black với thiết kế táo bạo, gam màu tương phản và đế dày dặn, tạo nên phong cách nổi bật và thoải mái tối đa.', 990000, 'ADIDAS_ADILETTE_22_WHITE_BLACK1.jpg', 0),
(15, 'ADIDAS_ADIFOM_ADILETTE_WHITE', 4, 1, 50, 'Dép Adidas Adifom Adilette White với thiết kế lấy cảm hứng từ tương lai, chất liệu đúc nguyên khối siêu nhẹ và êm ái, mang lại cảm giác thoải mái vượt trội.', 850000, 'ADIDAS_ADIFOM_ADILETTE_WHITE1.jpg', 0),
(16, 'NIKE_ASUNA_SLIDE_GREY_BLACK', 4, 2, 50, 'Dép Nike Asuna Slide Grey Black với thiết kế quai đôi độc đáo, đế xốp mềm mại, mang lại cảm giác thoải mái và năng động.', 810000, 'NIKE_ASUNA_SLIDE_GREY_BLACK.jpg', 0),
(17, 'NIKE_CALM_SLIDE_CAMO_BEIGE', 4, 2, 50, 'Dép Nike Calm Slide Camo Beige với họa tiết rằn ri thời thượng, chất liệu bền bỉ và đế êm ái, lý tưởng cho cả trong nhà và ngoài trời.', 850000, 'NIKE_CALM_SLIDE_CAMO_BEIGE.jpg', 0),
(18, 'NIKE_CALM_SLIDE_PINK', 4, 2, 50, 'Dép Nike Calm Slide Pink mang đến sự êm ái tối đa với thiết kế đơn giản, màu sắc trẻ trung, lý tưởng cho việc thư giãn sau những giờ hoạt động.', 770000, 'NIKE_CALM_SLIDE_PINK.jpg', 0),
(19, 'NIKE_ISO_SLIDE_VOLT_BLACK', 4, 2, 50, 'Dép Nike ISO Slide Volt Black với đệm lót siêu mềm và quai điều chỉnh tiện lợi, mang lại sự thoải mái cá nhân hóa.', 820000, 'NIKE_ISO_SLIDE_VOLT_BLACK.jpg', 0),
(20, 'NIKE_KAWA_RED_BLACK', 4, 2, 50, 'Dép Nike Kawa Red Black với đế xốp mềm dẻo và rãnh linh hoạt, giúp bàn chân vận động tự nhiên và thoải mái.', 780000, 'NIKE_KAWA_RED_BLACK.jpg', 0),
(21, 'NIKE_LA_SLIDE_BLACK_BLUE', 4, 2, 50, 'Dép Nike LA Slide Black Blue thiết kế trượt tiện lợi, phù hợp cho mọi hoạt động hàng ngày và sau thể thao.', 840000, 'NIKE_LA_SLIDE_BLACK_BLUE.jpg', 0),
(22, 'NIKE_VICTORI_BLACK_GOLD', 4, 2, 50, 'Dép Nike Victori Black Gold mang đến sự thoải mái nhẹ nhàng với quai đệm và đế xốp êm ái, lý tưởng cho thư giãn.', 790000, 'NIKE_VICTORI_BLACK_GOLD.jpg', 0),
(23, 'NIKE_VICTORI_BLACK_WHITE', 4, 2, 50, 'Dép Nike Victori Black White với thiết kế đơn giản, đế mềm và khả năng chống trượt tốt, là lựa chọn lý tưởng cho hàng ngày.', 860000, 'NIKE_VICTORI_BLACK_WHITE.jpg', 0),
(24, 'NIKE_VICTORI_BLACK_YELLOW', 4, 2, 50, 'Dép Nike Victori Black Yellow nổi bật với màu sắc trẻ trung, chất liệu bền bỉ và đế đệm êm ái cho sự thoải mái suốt cả ngày.', 830000, 'NIKE_VICTORI_BLACK_YELLOW.jpg', 0),
(25, 'NIKE_VICTORI_WHITE_BLUE', 4, 2, 50, 'Dép Nike Victori White Blue với thiết kế tối giản, tông màu tươi sáng, mang lại cảm giác dễ chịu và phong cách năng động.', 760000, 'NIKE_VICTORI_WHITE_BLUE.jpg', 0),
(26, 'NIKE_CALM_MULE_BE', 4, 2, 50, 'Dép Nike Calm Mule Be - Thiết kế dạng sục tiện lợi, đế êm ái và chất liệu bền bỉ, phù hợp cho cả trong nhà và các hoạt động nhẹ ngoài trời.', 825000, 'NIKE_CALM_MULE_BE.jpg', 0),
(27, 'NIKE_CALM_SLIDE_BLACK', 4, 2, 50, 'Dép Nike Calm Slide Black mang phong cách tối giản, chất liệu mềm mại và đế chống trượt, là lựa chọn lý tưởng cho sự thoải mái hàng ngày.', 775000, 'NIKE_CALM_SLIDE_BLACK.jpg', 0),
(28, 'NIKE_CALM_SLIDE_WHITE', 4, 2, 50, 'Dép Nike Calm Slide White với gam màu tinh tế, thiết kế đơn giản nhưng không kém phần phong cách, đem lại sự êm ái cho đôi chân.', 890000, 'NIKE_CALM_SLIDE_WHITE.jpg', 0),
(29, 'PUMA_CALM_SLIDE_BEIGE', 4, 3, 50, 'Dép Puma Calm Slide Beige với thiết kế tối giản, chất liệu êm ái, mang lại sự thư giãn tuyệt đối cho đôi chân.', 815000, 'PUMA_CALM_SLIDE_BEIGE.jpg', 0),
(30, 'PUMA_POPCAT_BLACK_GOLD', 4, 3, 50, 'Dép Puma Popcat Black Gold với thiết kế trẻ trung, quai ngang bản lớn và đế đúc nguyên khối, mang đến sự thoải mái bền bỉ.', 875000, 'PUMA_POPCAT_BLACK_GOLD.jpg', 0),
(31, 'PUMA_POPCAT_BLACK_PINK', 4, 3, 50, 'Dép Puma Popcat Black Pink nổi bật với tông màu năng động, đệm chân êm ái và thiết kế dễ chịu cho mọi hoạt động.', 795000, 'PUMA_POPCAT_BLACK_PINK.jpg', 0),
(32, 'PUMA_POPCAT_LOGO_WHITE_BLUE_YELLOW', 4, 3, 50, 'Dép Puma Popcat Logo White Blue Yellow với logo Puma nổi bật, mang lại phong cách thể thao và sự thoải mái cho mùa hè.', 835000, 'PUMA_POPCAT_LOGO_WHITE_BLUE_YELLOW.jpg', 0),
(33, 'PUMA_POPCAT_WHITE_BLACK', 4, 3, 50, 'Dép Puma Popcat White Black với sự kết hợp màu sắc tương phản, mang lại vẻ ngoài năng động và sự thoải mái cần thiết.', 765000, 'PUMA_POPCAT_WHITE_BLACK.jpg', 0),
(34, 'PUMA_SOFTFOAM_BLACK_WHITE', 4, 3, 50, 'Dép Puma Softfoam Black White tích hợp công nghệ Softfoam mang đến đệm lót êm ái vượt trội, lý tưởng cho mọi hoạt động.', 890000, 'PUMA_SOFTFOAM_BLACK_WHITE.jpg', 0),
(35, 'PUMA_SUEDE_SLIDE_BLACK_WHITE', 4, 3, 50, 'Dép Puma Suede Slide Black White mang phong cách cổ điển của Puma, với chất liệu da lộn mềm mại và đế êm ái.', 820000, 'PUMA_SUEDE_SLIDE_BLACK_WHITE.jpg', 0),
(36, 'PUMA_SUEDE_SLIDE_GREY_WHITE', 4, 3, 50, 'Dép Puma Suede Slide Grey White kết hợp giữa phong cách thể thao và sự sang trọng của da lộn, mang lại cảm giác thoải mái độc đáo.', 755000, 'PUMA_SUEDE_SLIDE_GREY_WHITE.jpg', 0),
(37, 'PUMA_SUEDE_SLIDE_PINK_WHITE', 4, 3, 50, 'Dép Puma Suede Slide Pink White với màu sắc nổi bật, chất liệu da lộn cao cấp và đế đệm êm ái, mang lại vẻ ngoài thời trang và sự thoải mái.', 885000, 'PUMA_SUEDE_SLIDE_PINK_WHITE.jpg', 0),
(38, 'PUMA_SUEDE_SLIDE_CREM_WHITE', 4, 3, 50, 'Dép Puma Suede Slide Crem White mang đến phong cách cổ điển, chất liệu da lộn cao cấp và đệm chân thoải mái.', 740000, 'PUMA_SUEDE_SLIDE_CREM_WHITE.jpg', 0),
(39, 'ADIDAS_BREAKNET_BLACK_WHITE', 5, 1, 50, 'Giày Adidas Breaknet Black White với thiết kế đơn giản, phong cách casual, phù hợp cho mọi hoạt động hàng ngày và dễ phối đồ.', 1750000, 'ADIDAS_BREAKNET_BLACK_WHITE.jpg', 0),
(40, 'ADIDAS_DURAMO_PINK_BEIGE_LEOPARD', 5, 1, 50, 'Giày Adidas Duramo Pink Beige Leopard nổi bật với họa tiết da báo cá tính, mang lại sự thoải mái và hỗ trợ tối ưu cho các bài tập.', 1920000, 'ADIDAS_DURAMO_PINK_BEIGE_LEOPARD.jpg', 0),
(41, 'ADIDAS_GALAXY_WHITE_ORANGE_GREY', 5, 1, 50, 'Giày Adidas Galaxy White Orange Grey với công nghệ đệm Cloudfoam êm ái, mang lại sự thoải mái tối ưu cho các buổi chạy bộ hàng ngày.', 1780000, 'ADIDAS_GALAXY_WHITE_ORANGE_GREY.jpg', 0),
(42, 'ADIDAS_HOOPS_WHITE_BLUE_BLACK', 5, 1, 50, 'Giày Adidas Hoops White Blue Black mang phong cách bóng rổ cổ điển, thiết kế cổ cao hỗ trợ mắt cá chân, phù hợp cho cả sân đấu và đường phố.', 2050000, 'ADIDAS_HOOPS_WHITE_BLUE_BLACK.jpg', 0),
(43, 'ADIDAS_KAPTIR_BROWN_BEIGE_PATTERN', 5, 1, 50, 'Giày Adidas Kaptir Brown Beige Pattern với thiết kế hiện đại, họa tiết độc đáo và công nghệ đệm êm ái, mang lại sự thoải mái và phong cách.', 1830000, 'ADIDAS_KAPTIR_BROWN_BEIGE_PATTERN.jpg', 0),
(44, 'ADIDAS_LITE_RACER_NAVY_RED_WHITE', 5, 1, 50, 'Giày Adidas Lite Racer Navy Red White nhẹ nhàng, thoáng khí, lý tưởng cho những buổi chạy bộ nhẹ hoặc đi bộ hàng ngày.', 1720000, 'ADIDAS_LITE_RACER_NAVY_RED_WHITE.jpg', 0),
(45, 'ADIDAS_NIZA_PLATFORM_WHITE_PINK', 5, 1, 50, 'Giày Adidas Niza Platform White Pink với đế độn thời trang, mang lại vẻ ngoài nổi bật và sự thoải mái cho phong cách đường phố.', 2100000, 'ADIDAS_NIZA_PLATFORM_WHITE_PINK.jpg', 0),
(46, 'ADIDAS_RUNFALCON_WHITE', 5, 1, 50, 'Giày Adidas Runfalcon White là đôi giày chạy bộ đa năng, nhẹ và êm ái, phù hợp cho người mới bắt đầu và các buổi tập luyện hàng ngày.', 1880000, 'ADIDAS_RUNFALCON_WHITE.jpg', 0),
(47, 'ADIDAS_SAMBA_CLASSIC_WHITE_GREEN_GUM', 5, 1, 50, 'Giày Adidas Samba Classic White Green Gum - Biểu tượng của phong cách thể thao cổ điển, phù hợp cho cả bóng đá trong nhà và trang phục casual.', 1980000, 'ADIDAS_SAMBA_CLASSIC_WHITE_GREEN_GUM.jpg', 0),
(48, 'ADIDAS_ULTRABOOST_BEIGE', 5, 1, 50, 'Giày Adidas Ultraboost Beige với công nghệ Boost™ mang lại khả năng hoàn trả năng lượng tối đa, siêu êm ái và thoải mái cho chạy bộ đường dài.', 2150000, 'ADIDAS_ULTRABOOST_BEIGE.jpg', 0),
(49, 'ADIDAS_4DFWD_BLACK', 5, 1, 50, 'Giày Adidas 4DFWD Black với công nghệ đế in 3D tiên tiến, tối ưu hóa năng lượng phản hồi, mang lại trải nghiệm chạy bộ mượt mà và hiệu quả.', 2180000, 'ADIDAS_4DFWD_BLACK.jpg', 0),
(50, 'ADIDAS_CAMPUS_00S_BE', 5, 1, 50, 'Giày Adidas Campus 00S Be mang phong cách retro của thập niên 2000, chất liệu da lộn cao cấp và đế bền bỉ, là lựa chọn hoàn hảo cho phong cách đường phố.', 1870000, 'ADIDAS_CAMPUS_00S_BE.jpg', 0),
(51, 'ADIDAS_CAMPUS_00S_GREEN', 5, 1, 50, 'Giày Adidas Campus 00S Green nổi bật với màu xanh lá cây cá tính, chất liệu da lộn mềm mại và thiết kế cổ điển, dễ dàng phối đồ.', 1990000, 'ADIDAS_CAMPUS_00S_GREEN.jpg', 0),
(52, 'ADIDAS_FORUM_PANDA', 5, 1, 50, 'Giày Adidas Forum Panda với phối màu đen trắng kinh điển, thiết kế cổ cao và quai dán, mang lại phong cách bóng rổ retro độc đáo.', 2050000, 'ADIDAS_FORUM_PANDA.jpg', 0),
(53, 'ADIDAS_GAZELLE_BOLD_BLACK', 5, 1, 50, 'Giày Adidas Gazelle Bold Black với đế dày dặn và chất liệu da lộn cao cấp, là biểu tượng thời trang casual, mang lại sự thoải mái và phong cách.', 1740000, 'ADIDAS_GAZELLE_BOLD_BLACK.jpg', 0),
(54, 'ADIDAS_SAMBA_OG_WHITE_GREEN', 5, 1, 50, 'Giày Adidas Samba OG White Green - Mẫu giày đá bóng trong nhà kinh điển, với phối màu tươi mới và chất liệu da cao cấp, phù hợp cho cả thể thao và thời trang.', 1930000, 'ADIDAS_SAMBA_OG_WHITE_GREEN.jpg', 0),
(55, 'FILA_COURT_ALL_WHITE', 5, 4, 50, 'Giày Fila Court All White - Thiết kế tối giản, tông màu trắng tinh khôi, dễ dàng phối hợp với mọi trang phục, mang lại vẻ ngoài thanh lịch và năng động.', 1700000, 'FILA_COURT_ALL_WHITE.jpg', 0),
(56, 'FILA_COURT_BLACK_RED_WHITE', 5, 4, 50, 'Giày Fila Court Black Red White với phối màu thể thao mạnh mẽ, chất liệu bền bỉ, lý tưởng cho các hoạt động thường ngày.', 1850000, 'FILA_COURT_BLACK_RED_WHITE.jpg', 0),
(57, 'FILA_COURT_CREAM_BLACK_RED', 5, 4, 50, 'Giày Fila Court Cream Black Red nổi bật với sự kết hợp màu sắc độc đáo, mang lại phong cách retro và sự thoải mái cho đôi chân.', 1790000, 'FILA_COURT_CREAM_BLACK_RED.jpg', 0),
(58, 'FILA_COURT_NAVY_WHITE', 5, 4, 50, 'Giày Fila Court Navy White với thiết kế cổ điển, tông màu xanh navy và trắng, phù hợp cho những ai yêu thích phong cách thể thao.', 1950000, 'FILA_COURT_NAVY_WHITE.jpg', 0),
(59, 'FILA_COURT_WHITE_BURGUNDY', 5, 4, 50, 'Giày Fila Court White Burgundy mang đến vẻ ngoài sang trọng với màu trắng kết hợp đỏ burgundy, chất liệu da cao cấp và sự thoải mái.', 1810000, 'FILA_COURT_WHITE_BURGUNDY.jpg', 0),
(60, 'FILA_COURT_WHITE_GREEN', 5, 4, 50, 'Giày Fila Court White Green với điểm nhấn màu xanh lá cây, thiết kế đơn giản nhưng phong cách, là lựa chọn tuyệt vời cho hàng ngày.', 1760000, 'FILA_COURT_WHITE_GREEN.jpg', 0),
(61, 'FILA_DISRUPTOR_2_WHITE', 5, 4, 50, 'Giày Fila Disruptor 2 White - Biểu tượng của phong cách chunky sneaker, với thiết kế mạnh mẽ và đế dày dặn, mang lại vẻ ngoài cá tính.', 2000000, 'FILA_DISRUPTOR_2_WHITE.jpg', 0),
(62, 'FILA_OAKMONT_BEIGE_TAN', 5, 4, 50, 'Giày Fila Oakmont Beige Tan với thiết kế outdoor mạnh mẽ, chất liệu bền bỉ và đế bám tốt, phù hợp cho các hoạt động khám phá.', 1870000, 'FILA_OAKMONT_BEIGE_TAN.jpg', 0),
(63, 'FILA_OAKMONT_BLACK', 5, 4, 50, 'Giày Fila Oakmont Black mang phong cách địa hình cá tính, chất liệu bền và đế chống trượt tốt, lý tưởng cho những chuyến đi phiêu lưu.', 1730000, 'FILA_OAKMONT_BLACK.jpg', 0),
(64, 'FILA_OAKMONT_WHITE_GOLD_PINK', 5, 4, 50, 'Giày Fila Oakmont White Gold Pink với sự kết hợp màu sắc nổi bật, mang lại vẻ ngoài trẻ trung và năng động.', 1990000, 'FILA_OAKMONT_WHITE_GOLD_PINK.jpg', 0),
(65, 'CONVERSE_ALL_STAR_BB_JET_WHITE_RED', 5, 5, 50, 'Giày Converse All Star BB Jet White Red - Thiết kế chuyên dụng cho bóng rổ, nhẹ nhàng, hỗ trợ tốt và đệm êm ái cho hiệu suất cao.', 1820000, 'CONVERSE_ALL_STAR_BB_JET_WHITE_RED.jpg', 0),
(66, 'CONVERSE_ALL_STAR_HIGH_WHITE_TRANSPARENT', 5, 5, 50, 'Giày Converse All Star High White Transparent với thiết kế độc đáo, chất liệu trong suốt mang lại phong cách hiện đại và cá tính.', 1900000, 'CONVERSE_ALL_STAR_HIGH_WHITE_TRANSPARENT.jpg', 0),
(67, 'CONVERSE_CHUCK_TAYLOR_GORETEX_BROWN_BLACK', 5, 5, 50, 'Giày Converse Chuck Taylor Goretex Brown Black tích hợp công nghệ GORE-TEX chống thấm nước, lý tưởng cho mọi điều kiện thời tiết.', 1950000, 'CONVERSE_CHUCK_TAYLOR_GORETEX_BROWN_BLACK.jpg', 0),
(68, 'CONVERSE_ERX_MID_RED_WHITE', 5, 5, 50, 'Giày Converse ERX Mid Red White mang phong cách bóng rổ retro những năm 90, với đệm êm ái và thiết kế cổ trung hỗ trợ.', 1780000, 'CONVERSE_ERX_MID_RED_WHITE.jpg', 0),
(69, 'CONVERSE_ERX_MID_WHITE_PURPLE', 5, 5, 50, 'Giày Converse ERX Mid White Purple với sự kết hợp màu sắc nổi bật, mang lại vẻ ngoài cá tính và năng động cho phong cách streetwear.', 1870000, 'CONVERSE_ERX_MID_WHITE_PURPLE.jpg', 0),
(70, 'CONVERSE_JACK_PURCELL_BLACK_WHITE', 5, 5, 50, 'Giày Converse Jack Purcell Black White với thiết kế mũi giày \"nụ cười\" đặc trưng, mang lại vẻ ngoài thanh lịch và thoải mái.', 1740000, 'CONVERSE_JACK_PURCELL_BLACK_WHITE.jpg', 0),
(71, 'CONVERSE_STAR_PLAYER_76_OLIVE_ORANGE', 5, 5, 50, 'Giày Converse Star Player 76 Olive Orange với phối màu độc đáo, mang lại phong cách thể thao cổ điển và sự thoải mái.', 1830000, 'CONVERSE_STAR_PLAYER_76_OLIVE_ORANGE.jpg', 0),
(72, 'CONVERSE_STAR_PLAYER_BEIGE_OFFWHITE', 5, 5, 50, 'Giày Converse Star Player Beige Offwhite với tông màu trung tính, dễ dàng phối hợp, mang lại vẻ ngoài giản dị và phong cách.', 1910000, 'CONVERSE_STAR_PLAYER_BEIGE_OFFWHITE.jpg', 0),
(73, 'CONVERSE_STAR_PLAYER_BLACK_WHITE_GUM', 5, 5, 50, 'Giày Converse Star Player Black White Gum với đế gum cổ điển, mang lại vẻ ngoài thể thao năng động và khả năng bám tốt.', 1790000, 'CONVERSE_STAR_PLAYER_BLACK_WHITE_GUM.jpg', 0),
(74, 'CONVERSE_STAR_PLAYER_BLACK_WHITE_GUMSOLE', 5, 5, 50, 'Giày Converse Star Player Black White Gumsole tương tự mẫu trên nhưng nhấn mạnh vào phần đế gum, độ bền và phong cách.', 1860000, 'CONVERSE_STAR_PLAYER_BLACK_WHITE_GUMSOLE.jpg', 0),
(75, 'NIKE_AIR_FORCE_1_WHITE_BLACK', 5, 2, 50, 'Giày Nike Air Force 1 White Black - Biểu tượng thời trang đường phố, thiết kế cổ điển và đệm Air êm ái, dễ dàng phối hợp.', 2150000, 'NIKE_AIR_FORCE_1_WHITE_BLACK.jpg', 0),
(76, 'NIKE_AIR_MAX_90_BLUE_BLACK_WHITE', 5, 2, 50, 'Giày Nike Air Max 90 Blue Black White với bộ đệm Max Air nhìn thấy được, mang lại sự êm ái và phong cách cổ điển, năng động.', 2600000, 'NIKE_AIR_MAX_90_BLUE_BLACK_WHITE.jpg', 0),
(77, 'NIKE_AIR_MAX_270_WHITE_BLACK', 5, 2, 50, 'Giày Nike Air Max 270 White Black với bộ đệm Air lớn nhất của Nike, mang lại cảm giác êm ái và đàn hồi vượt trội.', 2950000, 'NIKE_AIR_MAX_270_WHITE_BLACK.jpg', 0),
(78, 'NIKE_AIR_ZOOM_PEGASUS_40_WHITE_BLUE', 5, 2, 50, 'Giày Nike Air Zoom Pegasus 40 White Blue - Đôi giày chạy bộ đáng tin cậy với đệm Zoom Air nhạy bén, phù hợp cho mọi cự ly.', 1900000, 'NIKE_AIR_ZOOM_PEGASUS_40_WHITE_BLUE.jpg', 0),
(79, 'NIKE_COURT_AIR_ZOOM_VAPOR_PRO_BEIGE_NAVY', 5, 2, 50, 'Giày Nike Court Air Zoom Vapor Pro Beige Navy - Thiết kế nhẹ, nhanh và hỗ trợ tốt cho sân tennis, với đệm Zoom Air nhạy bén.', 2350000, 'NIKE_COURT_AIR_ZOOM_VAPOR_PRO_BEIGE_NAVY.jpg', 0),
(80, 'NIKE_DUNK_LOW_PANDA_BLACK_WHITE', 5, 2, 50, 'Giày Nike Dunk Low Panda Black White - Phối màu \"Panda\" kinh điển, thiết kế cổ thấp đa năng, phù hợp với mọi phong cách.', 2800000, 'NIKE_DUNK_LOW_PANDA_BLACK_WHITE.jpg', 0),
(81, 'NIKE_KILL_SHOT_WHITE_NAVY_GUM', 5, 2, 50, 'Giày Nike Kill Shot White Navy Gum mang phong cách vintage, chất liệu da và đế gum cao su, lý tưởng cho vẻ ngoài casual và thanh lịch.', 1650000, 'NIKE_KILL_SHOT_WHITE_NAVY_GUM.jpg', 0),
(82, 'NIKE_P4000_WHITE_SILVER', 5, 2, 50, 'Giày Nike P4000 White Silver với thiết kế retro lấy cảm hứng từ thập niên 2000, mang lại sự thoải mái và phong cách độc đáo.', 1750000, 'NIKE_P4000_WHITE_SILVER.jpg', 0),
(83, 'NIKE_REACT_ESCAPE_RUN_BLACK_WHITE', 5, 2, 50, 'Giày Nike React Escape Run Black White với đệm React siêu mềm và nhẹ, lý tưởng cho các buổi chạy bộ hàng ngày.', 2450000, 'NIKE_REACT_ESCAPE_RUN_BLACK_WHITE.jpg', 0),
(84, 'NIKE_ZOOM_VOMERO_5_SILVER_GREY', 5, 2, 50, 'Giày Nike Zoom Vomero 5 Silver Grey - Đôi giày chạy bộ cao cấp với đệm Zoom Air và công nghệ Cushlon êm ái, bền bỉ.', 2980000, 'NIKE_ZOOM_VOMERO_5_SILVER_GREY.jpg', 0),
(85, 'PUMA_CA_PRO_CLASSIC_CREAM_NAVY', 5, 3, 50, 'Giày Puma CA Pro Classic Cream Navy với thiết kế retro, chất liệu da cao cấp và đế bền chắc, mang lại phong cách cổ điển.', 1720000, 'PUMA_CA_PRO_CLASSIC_CREAM_NAVY.jpg', 0),
(86, 'PUMA_COURT_RIDER_RED_BLACK_GOLD', 5, 3, 50, 'Giày Puma Court Rider Red Black Gold - Giày bóng rổ hiệu suất cao với công nghệ đệm Rider Foam, mang lại sự thoải mái và phản hồi tốt.', 1930000, 'PUMA_COURT_RIDER_RED_BLACK_GOLD.jpg', 0),
(87, 'PUMA_DEVIATE_NITRO_WHITE_PINK_BLUE', 5, 3, 50, 'Giày Puma Deviate Nitro White Pink Blue - Giày chạy bộ cao cấp với công nghệ Nitro Foam êm ái và carbon plate để tăng tốc độ.', 2050000, 'PUMA_DEVIATE_NITRO_WHITE_PINK_BLUE.jpg', 0),
(88, 'PUMA_DEVIATE_NITRO_YELLOW_ORANGE_RED', 5, 3, 50, 'Giày Puma Deviate Nitro Yellow Orange Red với màu sắc nổi bật và công nghệ Nitro Foam, lý tưởng cho các vận động viên tìm kiếm hiệu suất cao.', 1890000, 'PUMA_DEVIATE_NITRO_YELLOW_ORANGE_RED.jpg', 0),
(89, 'PUMA_EVOSPEED_INDOOR_ORANGE_BLACK', 5, 3, 50, 'Giày Puma Evospeed Indoor Orange Black - Giày bóng đá trong nhà nhẹ và nhanh, mang lại khả năng kiểm soát bóng và tốc độ tối ưu.', 1760000, 'PUMA_EVOSPEED_INDOOR_ORANGE_BLACK.jpg', 0),
(90, 'PUMA_FOREVERRUN_NITRO_GREEN_LIME', 5, 3, 50, 'Giày Puma Foreverrun Nitro Green Lime - Giày chạy bộ với đệm Nitro Foam êm ái, mang lại sự ổn định và thoải mái cho quãng đường dài.', 2100000, 'PUMA_FOREVERRUN_NITRO_GREEN_LIME.jpg', 0),
(91, 'PUMA_FOREVERRUN_NITRO_LIGHT_BLUE_GREY', 5, 3, 50, 'Giày Puma Foreverrun Nitro Light Blue Grey - Phiên bản màu sắc nhẹ nhàng, lý tưởng cho những người chạy bộ tìm kiếm sự êm ái và hỗ trợ.', 1840000, 'PUMA_FOREVERRUN_NITRO_LIGHT_BLUE_GREY.jpg', 0),
(92, 'PUMA_NRGY_COMET_PURPLE_YELLOW', 5, 3, 50, 'Giày Puma NRGY Comet Purple Yellow với công nghệ NRGY Foam mang lại đệm êm ái, là lựa chọn tuyệt vời cho các hoạt động hàng ngày và tập luyện nhẹ.', 1710000, 'PUMA_NRGY_COMET_PURPLE_YELLOW.jpg', 0),
(93, 'PUMA_VELOCITY_NITRO_BLACK_GREEN', 5, 3, 50, 'Giày Puma Velocity Nitro Black Green - Giày chạy bộ đa năng với đệm Nitro Foam, mang lại sự phản hồi và thoải mái tối ưu.', 1970000, 'PUMA_VELOCITY_NITRO_BLACK_GREEN.jpg', 0),
(94, 'PUMA_VELOCITY_NITRO_BLACK_WHITE', 5, 3, 50, 'Giày Puma Velocity Nitro Black White - Phiên bản màu sắc cơ bản, lý tưởng cho các buổi chạy bộ hàng ngày với sự êm ái và bền bỉ.', 1790000, 'PUMA_VELOCITY_NITRO_BLACK_WHITE.jpg', 0),
(95, 'PUMA_REBOUND_BLUE', 5, 3, 50, 'Giày Puma Rebound Blue với thiết kế lấy cảm hứng từ bóng rổ, chất liệu bền bỉ và đệm êm ái, phù hợp cho các hoạt động hàng ngày.', 1790000, 'PUMA_REBOUND_BLUE.jpg', 0),
(96, 'PUMA_MULE_WHITE_PINK', 5, 3, 50, 'Giày Puma Mule White Pink dạng sục tiện lợi, màu sắc nữ tính và đệm SoftFoam+ êm ái, lý tưởng cho phong cách thoải mái, năng động.', 1710000, 'PUMA_MULE_WHITE_PINK.jpg', 0),
(97, 'PUMA_REBOUND_HAZE_CORAL', 5, 3, 50, 'Giày Puma Rebound Haze Coral với tông màu san hô nổi bật, thiết kế thể thao và đệm êm ái, mang lại vẻ ngoài trẻ trung và thoải mái.', 1880000, 'PUMA_REBOUND_HAZE_CORAL.jpg', 0),
(98, 'PUMA_RS-X3_PUZZLE_BLACK_WHITE', 5, 3, 50, 'Giày Puma RS-X3 Puzzle Black White với thiết kế chunky hiện đại, các mảng màu và chất liệu ghép lại độc đáo, mang lại sự thoải mái và phong cách nổi bật.', 2030000, 'PUMA_RS-X3_PUZZLE_BLACK_WHITE.jpg', 0),
(99, 'PUMA_RS-X3_PUZZLE_LIMESTONE', 5, 3, 50, 'Giày Puma RS-X3 Puzzle Limestone với phối màu trung tính, thiết kế phức tạp và đệm RS Technology, mang lại vẻ ngoài cá tính và êm ái.', 1910000, 'PUMA_RS-X3_PUZZLE_LIMESTONE.jpg', 0),
(100, 'PUMA_RS-X3_PUZZLE_PINK', 5, 3, 50, 'Giày Puma RS-X3 Puzzle Pink nổi bật với tông màu hồng ngọt ngào, thiết kế chunky độc đáo và công nghệ RS, lý tưởng cho những ai yêu thích sự phá cách.', 2150000, 'PUMA_RS-X3_PUZZLE_PINK.jpg', 0),
(101, 'PUMA_RS-X3_PUZZLE_WHITE', 5, 3, 50, 'Giày Puma RS-X3 Puzzle White với gam màu trắng tinh khôi, thiết kế phức tạp và đệm RS, mang lại sự thoải mái và phong cách ấn tượng.', 1980000, 'PUMA_RS-X3_PUZZLE_WHITE.jpg', 0),
(102, 'PUMA_RS-X3_WHITE_RED', 5, 3, 50, 'Giày Puma RS-X3 White Red với phối màu thể thao cổ điển, thiết kế chunky và công nghệ RS, mang lại sự kết hợp hoàn hảo giữa phong cách và hiệu suất.', 1840000, 'PUMA_RS-X3_WHITE_RED.jpg', 0),
(103, 'VANS_AUTHENTIC_DEEP_GREEN_WHITE', 5, 6, 50, 'Giày Vans Authentic Deep Green White - Thiết kế cổ điển của Vans với màu xanh lá cây đậm, phù hợp với phong cách casual và trượt ván.', 1730000, 'VANS_AUTHENTIC_DEEP_GREEN_WHITE.jpg', 0),
(104, 'VANS_AUTHENTIC_VINTAGE_WHITE_BLUE', 5, 6, 50, 'Giày Vans Authentic Vintage White Blue với vẻ ngoài cổ điển, màu sắc nhẹ nhàng, là lựa chọn lý tưởng cho phong cách hàng ngày.', 1880000, 'VANS_AUTHENTIC_VINTAGE_WHITE_BLUE.jpg', 0),
(105, 'VANS_OLD_SKOOL_BLACK_WHITE_SUEDE', 5, 6, 50, 'Giày Vans Old Skool Black White Suede - Mẫu giày trượt ván kinh điển với sọc Jazz SideStripe đặc trưng, chất liệu vải canvas và da lộn bền bỉ.', 1920000, 'VANS_OLD_SKOOL_BLACK_WHITE_SUEDE.jpg', 0),
(106, 'VANS_OLD_SKOOL_BONE_WHITE_GREY', 5, 6, 50, 'Giày Vans Old Skool Bone White Grey với tông màu trung tính, dễ phối đồ, giữ nguyên nét cổ điển và phong cách thể thao đường phố.', 1760000, 'VANS_OLD_SKOOL_BONE_WHITE_GREY.jpg', 0),
(107, 'VANS_SK8_HI_BLACK_WHITE', 5, 6, 50, 'Giày Vans Sk8-Hi Black White - Thiết kế cổ cao mang tính biểu tượng, chất liệu canvas và da lộn bền chắc, lý tưởng cho những người yêu thích phong cách đường phố.', 2010000, 'VANS_SK8_HI_BLACK_WHITE.jpg', 0),
(108, 'VANS_SLIP_ON_CHECKERBOARD_BLACK_WHITE', 5, 6, 50, 'Giày Vans Slip-On Checkerboard Black White - Họa tiết bàn cờ iconic, thiết kế không dây tiện lợi, là biểu tượng của phong cách cá tính.', 1700000, 'VANS_SLIP_ON_CHECKERBOARD_BLACK_WHITE.jpg', 0),
(109, 'VANS_SLIP_ON_FLANNEL_BROWN', 5, 6, 50, 'Giày Vans Slip-On Flannel Brown với chất liệu flannel ấm áp, mang lại vẻ ngoài độc đáo và thoải mái cho mùa lạnh.', 1850000, 'VANS_SLIP_ON_FLANNEL_BROWN.jpg', 0),
(110, 'VANS_STYLE_112_BLACK_WHITE', 5, 6, 50, 'Giày Vans Style 112 Black White - Thiết kế chuyên dụng cho trượt ván với công nghệ Vans Vulc Lite, mang lại sự bền bỉ và cảm giác ván tốt.', 1960000, 'VANS_STYLE_112_BLACK_WHITE.jpg', 0),
(111, 'VANS_STYLE_112_BLUE_WHITE', 5, 6, 50, 'Giày Vans Style 112 Blue White với màu xanh dương trẻ trung, thiết kế mạnh mẽ, phù hợp cho cả trượt ván và phong cách hàng ngày.', 1740000, 'VANS_STYLE_112_BLUE_WHITE.jpg', 0),
(112, 'VANS_STYLE_112_DELUXE_BLACK_WHITE', 5, 6, 50, 'Giày Vans Style 112 Deluxe Black White - Phiên bản cao cấp với vật liệu nâng cấp, mang lại sự thoải mái và độ bền vượt trội.', 2080000, 'VANS_STYLE_112_DELUXE_BLACK_WHITE.jpg', 0),
(113, 'REEBOK_CLUB_C_85_CLASSIC_CREAM', 5, 7, 50, 'Giày Reebok Club C 85 Classic Cream mang phong cách cổ điển, chất liệu da mềm mại và thiết kế tối giản, phù hợp cho mọi trang phục hàng ngày.', 1780000, 'REEBOK_CLUB_C_85_CLASSIC_CREAM.jpg', 0),
(114, 'REEBOK_CLUB_C_85_CLASSIC_CREAM_GREEN', 5, 7, 50, 'Giày Reebok Club C 85 Classic Cream Green với điểm nhấn màu xanh lá, mang lại vẻ ngoài tươi mới và phong cách retro.', 1920000, 'REEBOK_CLUB_C_85_CLASSIC_CREAM_GREEN.jpg', 0),
(115, 'REEBOK_CLUB_C_85_CLASSIC_WHITE', 5, 7, 50, 'Giày Reebok Club C 85 Classic White - Biểu tượng của sự đơn giản và tinh tế, chất liệu da cao cấp và sự thoải mái tối ưu.', 1700000, 'REEBOK_CLUB_C_85_CLASSIC_WHITE.jpg', 0),
(116, 'REEBOK_CLUB_C_85_HICLOUD_WHITE_VECTOR_BLUE', 5, 7, 50, 'Giày Reebok Club C 85 Hicloud White Vector Blue với điểm nhấn màu xanh vector độc đáo, mang lại vẻ ngoài năng động và hiện đại.', 2050000, 'REEBOK_CLUB_C_85_HICLOUD_WHITE_VECTOR_BLUE.jpg', 0),
(117, 'REEBOK_CLUB_C_85_WHITE', 5, 7, 50, 'Giày Reebok Club C 85 White - Phiên bản màu trắng cơ bản, dễ dàng phối đồ, mang lại sự thoải mái và phong cách cổ điển không lỗi thời.', 1830000, 'REEBOK_CLUB_C_85_WHITE.jpg', 0),
(118, 'REEBOK_CLUB_C_85_WHITE_CLASSIC_TEAL', 5, 7, 50, 'Giày Reebok Club C 85 White Classic Teal với điểm nhấn màu xanh ngọc, mang lại vẻ ngoài tươi mới và phong cách retro.', 1980000, 'REEBOK_CLUB_C_85_WHITE_CLASSIC_TEAL.jpg', 0),
(119, 'REEBOK_CLUB_C_85_WHITE_CREAM_VEGAN', 5, 7, 50, 'Giày Reebok Club C 85 White Cream Vegan - Phiên bản thân thiện môi trường, chất liệu thuần chay và phong cách cổ điển.', 1750000, 'REEBOK_CLUB_C_85_WHITE_CREAM_VEGAN.jpg', 0),
(120, 'REEBOK_CLUB_C_85_WHITE_BLUE', 5, 7, 50, 'Giày Reebok Club C 85 White Blue với điểm nhấn màu xanh dương, mang lại vẻ ngoài năng động và cổ điển.', 1890000, 'REEBOK_CLUB_C_85_WHITE_BLUE.jpg', 0),
(121, 'REEBOK_CLUB_C_85_WHITE_BROWN', 5, 7, 50, 'Giày Reebok Club C 85 White Brown với chi tiết màu nâu tinh tế, mang lại vẻ ngoài ấm áp và phong cách cổ điển.', 1720000, 'REEBOK_CLUB_C_85_WHITE_BROWN.jpg', 0),
(122, 'REEBOK_PUMP_FURY_WHITE_RED_YELLOW', 5, 7, 50, 'Giày Reebok Pump Fury White Red Yellow - Thiết kế độc đáo với công nghệ Pump tùy chỉnh, mang lại sự ôm sát hoàn hảo và phong cách nổi bật.', 2120000, 'REEBOK_PUMP_FURY_WHITE_RED_YELLOW.jpg', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanphamkhuyenmai`
--

CREATE TABLE `sanphamkhuyenmai` (
  `MaSP` int(11) NOT NULL,
  `MaKM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sanphamkhuyenmai`
--

INSERT INTO `sanphamkhuyenmai` (`MaSP`, `MaKM`) VALUES
(4, 1),
(4, 3),
(5, 1),
(5, 3),
(6, 1),
(6, 3),
(7, 1),
(7, 3),
(9, 1),
(9, 3),
(10, 1),
(10, 3),
(11, 1),
(11, 3),
(12, 1),
(12, 3),
(53, 3),
(53, 4),
(54, 3),
(54, 4),
(55, 3),
(55, 4),
(56, 3),
(56, 4),
(68, 3),
(68, 5),
(69, 3),
(69, 4),
(70, 3),
(71, 3),
(72, 3),
(73, 3),
(74, 3),
(75, 3),
(76, 3),
(77, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `MaSize` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`MaSize`) VALUES
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `anhsp`
--
ALTER TABLE `anhsp`
  ADD PRIMARY KEY (`Anh1`,`MaSP`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`MaBL`,`MaSP`,`MaKH`),
  ADD KEY `MaKH` (`MaKH`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Chỉ mục cho bảng `cau_hoi_thuong_gap`
--
ALTER TABLE `cau_hoi_thuong_gap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`MaHD`,`MaSP`,`Size`,`MaMau`),
  ADD KEY `MaSP` (`MaSP`),
  ADD KEY `Size` (`Size`),
  ADD KEY `MaMau` (`MaMau`);

--
-- Chỉ mục cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD PRIMARY KEY (`MaSP`,`MaSize`,`MaMau`),
  ADD KEY `MaSize` (`MaSize`),
  ADD KEY `MaMau` (`MaMau`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`MaDM`);

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_giohang_khachhang` (`MaKH`),
  ADD KEY `fk_giohang_sanpham` (`MaSP`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `MaKH` (`MaKH`),
  ADD KEY `MaNV` (`MaNV`),
  ADD KEY `fk_hoadon_magiamgia` (`MaGiamGia`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `MaKH` (`MaKH`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`MaKM`);

--
-- Chỉ mục cho bảng `mau`
--
ALTER TABLE `mau`
  ADD PRIMARY KEY (`MaMau`);

--
-- Chỉ mục cho bảng `nguoinhan`
--
ALTER TABLE `nguoinhan`
  ADD PRIMARY KEY (`MaHD`);

--
-- Chỉ mục cho bảng `nhacc`
--
ALTER TABLE `nhacc`
  ADD PRIMARY KEY (`MaNCC`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `MaNV` (`MaNV`),
  ADD KEY `Quyen` (`Quyen`);

--
-- Chỉ mục cho bảng `phieugiamgia`
--
ALTER TABLE `phieugiamgia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `MaGiamGia` (`MaGiamGia`),
  ADD UNIQUE KEY `MaGiamGia_2` (`MaGiamGia`),
  ADD UNIQUE KEY `MaGiamGia_3` (`MaGiamGia`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`MaPN`),
  ADD KEY `MaNV` (`MaNV`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Chỉ mục cho bảng `phieuxuat`
--
ALTER TABLE `phieuxuat`
  ADD PRIMARY KEY (`MaPX`),
  ADD KEY `MaNV` (`MaNV`),
  ADD KEY `MauSP` (`MaSP`),
  ADD KEY `Mau` (`Mau`),
  ADD KEY `Size` (`Size`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `MaNCC` (`MaNCC`),
  ADD KEY `MaDM` (`MaDM`);

--
-- Chỉ mục cho bảng `sanphamkhuyenmai`
--
ALTER TABLE `sanphamkhuyenmai`
  ADD PRIMARY KEY (`MaSP`,`MaKM`),
  ADD KEY `MaKH` (`MaKM`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`MaSize`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `MaBL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `cau_hoi_thuong_gap`
--
ALTER TABLE `cau_hoi_thuong_gap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `MaDM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `MaKM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `nhacc`
--
ALTER TABLE `nhacc`
  MODIFY `MaNCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `phieugiamgia`
--
ALTER TABLE `phieugiamgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `MaPN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=545;

--
-- AUTO_INCREMENT cho bảng `phieuxuat`
--
ALTER TABLE `phieuxuat`
  MODIFY `MaPX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`);

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`MaHD`) REFERENCES `hoadon` (`MaHD`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`),
  ADD CONSTRAINT `chitiethoadon_ibfk_3` FOREIGN KEY (`Size`) REFERENCES `size` (`MaSize`),
  ADD CONSTRAINT `chitiethoadon_ibfk_4` FOREIGN KEY (`MaMau`) REFERENCES `mau` (`MaMau`);

--
-- Các ràng buộc cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD CONSTRAINT `chitietsanpham_ibfk_1` FOREIGN KEY (`MaSize`) REFERENCES `size` (`MaSize`),
  ADD CONSTRAINT `chitietsanpham_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`),
  ADD CONSTRAINT `chitietsanpham_ibfk_3` FOREIGN KEY (`MaMau`) REFERENCES `mau` (`MaMau`);

--
-- Các ràng buộc cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `fk_giohang_khachhang` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_giohang_sanpham` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `fk_hoadon_magiamgia` FOREIGN KEY (`MaGiamGia`) REFERENCES `phieugiamgia` (`MaGiamGia`),
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`),
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);

--
-- Các ràng buộc cho bảng `nguoinhan`
--
ALTER TABLE `nguoinhan`
  ADD CONSTRAINT `nguoinhan_ibfk_1` FOREIGN KEY (`MaHD`) REFERENCES `hoadon` (`MaHD`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`Quyen`) REFERENCES `quyen` (`id`);

--
-- Các ràng buộc cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `phieunhap_ibfk_1` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`),
  ADD CONSTRAINT `phieunhap_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`);

--
-- Các ràng buộc cho bảng `phieuxuat`
--
ALTER TABLE `phieuxuat`
  ADD CONSTRAINT `phieuxuat_ibfk_1` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`),
  ADD CONSTRAINT `phieuxuat_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`),
  ADD CONSTRAINT `phieuxuat_ibfk_3` FOREIGN KEY (`Mau`) REFERENCES `mau` (`MaMau`),
  ADD CONSTRAINT `phieuxuat_ibfk_4` FOREIGN KEY (`Size`) REFERENCES `size` (`MaSize`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaNCC`) REFERENCES `nhacc` (`MaNCC`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`MaDM`) REFERENCES `danhmuc` (`MaDM`);

--
-- Các ràng buộc cho bảng `sanphamkhuyenmai`
--
ALTER TABLE `sanphamkhuyenmai`
  ADD CONSTRAINT `sanphamkhuyenmai_ibfk_1` FOREIGN KEY (`MaKM`) REFERENCES `khuyenmai` (`MaKM`),
  ADD CONSTRAINT `sanphamkhuyenmai_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
