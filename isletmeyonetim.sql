-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 16 Nis 2022, 09:42:58
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `isletmeyonetim`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bankas`
--

CREATE TABLE `bankas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bankaKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bankaAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bankaHN` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bankaIBAN` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bankaHesapAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bankaFirmaId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bankaMHK` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bankaMHA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `bankas`
--

INSERT INTO `bankas` (`id`, `bankaKod`, `bankaAd`, `bankaHN`, `bankaIBAN`, `bankaHesapAd`, `bankaFirmaId`, `bankaMHK`, `bankaMHA`, `created_at`, `updated_at`) VALUES
(7, '0301', 'Akbank', '639217817', 'TR-639217817639217817', 'Akbank XXX\'nolu Hesap', '1', '102.01.01.1001', 'Akbank XXX\'nolu Hesap', '2021-06-13 08:50:32', '2021-06-13 08:55:27'),
(8, '0302', 'Akbank', '290810215', 'TR-290810215290810215', 'Akbank  YYY\'nolu Hesap', '1', '102.01.01.1002', 'Akbank YYY\'nolu Hesap', '2021-06-13 08:51:04', '2021-06-13 08:55:19'),
(9, '0101', 'Garanti Bankası', '416496683', 'TR-416496683416496683', 'Garanti XXX\'nolu Hesap', '1', '102.01.01.2001', 'Garanti XXX\'nolu Hesap', '2021-06-13 08:53:23', '2021-06-13 08:55:40'),
(10, '0303', 'Akbank', '609027240', 'TR-609027240609027240', 'Akbank ZZZ\'nolu Hesap', '1', '102.01.02.1001', 'Akbank ZZZ\'nolu Hesap', '2021-06-13 08:54:07', '2021-06-13 08:55:10'),
(11, '0304', 'Akbank', '140701159', 'TR-140701159140701159', 'Akbank TTT\'nolu Hesap', '1', '120.01.03.1002', 'Akbank TTT\'nolu Hesap', '2021-06-13 08:54:37', '2021-06-13 08:54:58');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `caris`
--

CREATE TABLE `caris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cariKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cariAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cariTip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cariVKN` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cariTCKN` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cariVD` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cariFirmaId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cariMHK` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cariMHA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cariIl` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cariIlce` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cariAdres` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `caris`
--

INSERT INTO `caris` (`id`, `cariKod`, `cariAd`, `cariTip`, `cariVKN`, `cariTCKN`, `cariVD`, `cariFirmaId`, `cariMHK`, `cariMHA`, `cariIl`, `cariIlce`, `cariAdres`, `created_at`, `updated_at`) VALUES
(5, 'AT01', 'ÇITIR SİMİTÇİLİK AŞ', 'Tedarikçi', '996203855', '367938088', 'Beyoğlu', '1', '320.01.34.0003', 'ÇITIR SİMİTÇİLİK AŞ', 'İstanbul', 'Beyoğlu', 'İstanbul Beyoğlu', '2021-06-13 08:21:35', '2021-06-13 08:21:35'),
(6, 'AT02', 'KAVRULMUŞ ÇEREZCİLİK AŞ', 'Tedarikçi', '148415319', '148415319', 'Eyüp', '1', '320.01.34.0004', 'KAVRULMUŞ ÇEREZCİLİK AŞ', 'İstanbul', 'Eyüp', 'İstanbul Eyüp', '2021-06-13 08:22:42', '2021-06-13 08:22:42'),
(7, 'AT03', 'BEYAZ PEYNİRCİLİK AŞ', 'Tedarikçi', '771483625', '771483625', 'Esenyurt', '1', '320.01.34.0005', 'BEYAZ PEYNİRCİLİK AŞ', 'İstanbul', 'Esenyurt', 'İstanbul Esenyurt', '2021-06-13 08:23:31', '2021-06-13 08:23:31'),
(8, 'AT04', 'SİYAH ZEYTİNCİLİK AŞ', 'Tedarikçi', '312928482', '312928482', 'Beşiktaş', '1', '320.01.34.0006', 'SİYAH ZEYTİNCİLİK AŞ', 'İstanbul', 'Beşiktaş', 'İstanbul Beşiktaş', '2021-06-13 08:25:38', '2021-06-13 08:25:38'),
(9, 'AT05', 'EKŞİ DOMATESCİLİK AŞ', 'Tedarikçi', '672000961', '672000961', 'Nişantaşı', '1', '320.01.34.0007', 'EKŞİ DOMATESCİLİK AŞ', 'İstanbul', 'Nişantaşı', 'İstanbul Nişantaşı', '2021-06-13 08:26:26', '2021-06-13 08:26:26'),
(10, 'AM01', 'MİGROS  AŞ', 'Müşteri', '940663201', '940663201', 'Taksim', '1', '120.01.34.0001', 'MİGROS  A.Ş.', 'İstanbul', 'Taksim', 'İstanbul Taksim', '2021-06-13 08:28:58', '2021-06-13 08:28:58'),
(11, 'AM02', 'CARREFOUR AŞ', 'Müşteri', '188043472', '188043472', 'Eyüp', '1', '120.01.34.0002', 'CARREFOUR A.Ş.', 'İstanbul', 'Eyüp', 'İstanbul Eyüp', '2021-06-13 08:34:26', '2021-06-13 08:34:26'),
(12, 'AM03', 'ŞOK AŞ', 'Müşteri', '182151812', '182151812', 'Beyoğlu', '1', '120.01.34.0003', 'ŞOK A.Ş.', 'İstanbul', 'Beyoğlu', 'İstanbul Beyoğlu', '2021-06-13 08:35:20', '2021-06-13 08:35:20'),
(13, 'AM04', '7-ELEVEN AŞ', 'Müşteri', '239087518', '239087518', 'Esenyurt', '1', '120.01.34.0004', '7-ELEVEN A.Ş.', 'İstanbul', 'Esenyurt', 'İstanbul Esenyurt', '2021-06-13 08:35:58', '2021-06-13 08:45:55'),
(14, 'AM05', 'WALLMART AŞ', 'Müşteri', '126330350', '126330350', 'Kasımpaşa', '1', '120.01.34.0005', 'WALLMART A.Ş.', 'İstanbul', 'Kasımpaşa', 'İstanbul Kasımpaşa', '2021-06-13 08:36:46', '2021-06-13 08:36:46'),
(15, 'BT01', 'PARILTI CAMCILIK AŞ', 'Tedarikçi', '731832730', '731832730', 'Fatih', '1', '320.01.34.0008', 'PARILTI CAMCILIK AŞ', 'İstanbul', 'Fatih', 'İstanbul Fatih', '2021-06-13 08:37:52', '2021-06-13 08:37:52'),
(16, 'BT02', 'SAĞLAM MARANGOZ AŞ', 'Tedarikçi', '937940290', '937940290', 'Kadifekale', '1', '320.01.35.0009', 'SAĞLAM MARANGOZ AŞ', 'İzmir', 'Kadifekale', 'İzmir Kadifekale', '2021-06-13 08:38:38', '2021-06-13 08:38:38'),
(17, 'BT03', 'KÖŞELİ TOPÇULUK AŞ', 'Tedarikçi', '695932717', '695932717', 'Buca', '1', '320.01.35.0010', 'KÖŞELİ TOPÇULUK AŞ', 'İzmir', 'Buca', 'İzmir Buca', '2021-06-13 08:39:10', '2021-06-13 08:39:10'),
(18, 'BT04', 'SERT PLASTİK AŞ', 'Tedarikçi', '411611972', '411611972', 'Konak', '1', '320.01.35.0011', 'SERT PLASTİK AŞ', 'İzmir', 'Konak', 'İzmir Konak', '2021-06-13 08:40:06', '2021-06-13 08:40:06'),
(19, 'BT05', 'ŞAHİN BAKKALİYE AŞ', 'Tedarikçi', '547691210', '547691210', 'Karabağlar', '1', '320.01.35.0012', 'ŞAHİN BAKKALİYE AŞ', 'İzmir', 'Karabağlar', 'İzmir Karabağlar', '2021-06-13 08:40:46', '2021-06-13 08:40:46'),
(20, 'BM01', 'KARDEŞLER BİLARDO VE LANGIRT AŞ', 'Müşteri', '359238067', '359238067', 'Bornova', '1', '120.01.35.0001', 'KARDEŞLER BİLARDO VE LANGIRT A.Ş.', 'İzmir', 'Bornova', 'İzmir Bornova', '2021-06-13 08:41:27', '2021-06-13 08:41:27'),
(21, 'BM02', 'HAVALI CAFE AŞ', 'Müşteri', '269157205', '269157205', 'Balçova', '1', '120.01.35.0002', 'HAVALI CAFE A.Ş.', 'İzmir', 'Balçova', 'İzmir Balçova', '2021-06-13 08:42:12', '2021-06-13 08:42:12'),
(22, 'BM03', 'EĞLENCE TRENİ LUNAPARK AŞ', 'Müşteri', '780392483', '780392483', 'Alsancak', '1', '120.01.35.0003', 'EĞLENCE TRENİ LUNAPARK A.Ş.', 'İzmir', 'Alsancak', 'İzmir Alsancak', '2021-06-13 08:42:50', '2021-06-13 08:42:50'),
(23, 'BM04', 'FIRFIR LANGIRTÇILIK AŞ', 'Müşteri', '567779643', '567779643', 'Çankaya', '1', '120.01.35.0004', 'FIRFIR LANGIRTÇILIK A.Ş.', 'İzmir', 'Çankaya', 'İzmir Çankaya', '2021-06-13 08:43:50', '2021-06-13 08:43:50'),
(24, 'BM05', 'GOL OYUNCAKÇILIK AŞ', 'Müşteri', '528993965', '528993965', 'Hatay', '1', '120.01.35.0005', 'GOL OYUNCAKÇILIK A.Ş.', 'İzmir', 'Hatay', 'İzmir Hatay', '2021-06-13 08:44:26', '2021-06-13 08:44:26');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `depos`
--

CREATE TABLE `depos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `depoFirmaId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depoKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depoAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `depos`
--

INSERT INTO `depos` (`id`, `depoFirmaId`, `depoKod`, `depoAd`, `created_at`, `updated_at`) VALUES
(1, '1', 'AHD01', 'HAMMADDE DEPO', '2021-04-17 13:16:29', '2021-04-17 13:16:29'),
(2, '1', 'AMD01', 'MAMÜL DEPO', '2021-04-17 13:16:42', '2021-04-17 13:16:42'),
(3, '1', 'ATD01', 'TİCARİ DEPO', '2021-04-17 13:16:58', '2021-04-17 13:16:58'),
(4, '1', 'AÜD01', 'ÜRETİM DEPO', '2021-04-17 13:17:17', '2021-04-17 13:17:17'),
(5, '1', 'AYD01', 'YARI MAMÜL DEPO', '2021-04-17 13:17:31', '2021-04-17 13:17:31');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `finans_fis`
--

CREATE TABLE `finans_fis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fiFisNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fiFirmaId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fiFisTipKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fiFisTarih` date NOT NULL,
  `fiAciklama` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `finans_fis`
--

INSERT INTO `finans_fis` (`id`, `fiFisNo`, `fiFirmaId`, `fiFisTipKod`, `fiFisTarih`, `fiAciklama`, `created_at`, `updated_at`) VALUES
(5, 'FFİS-0001', '1', 'Banka Hareket', '2021-04-15', 'Migros cari alacak kaydı.', '2021-06-13 13:23:04', '2021-06-13 13:23:04'),
(6, 'FFİS-0001', '1', 'Banka Hareket', '2021-06-14', 'İş yeri kira ödeme', '2021-06-14 06:03:53', '2021-06-14 06:03:53'),
(7, 'FFİS-0003', '1', 'Kasa Tahsil', '2021-06-14', 'Hammade alım fişi', '2021-06-14 06:06:01', '2021-06-14 06:06:01'),
(8, 'FFİS-0004', '1', 'Banka Hareket', '2021-06-14', 'Taşıma gideri ödeme', '2021-06-14 06:07:15', '2021-06-14 06:07:15'),
(9, 'FFİS-0005', '1', 'Virman', '2021-06-14', 'Virman kaydı', '2021-06-14 06:09:40', '2021-06-14 06:09:40'),
(10, 'FFİS-0006', '1', 'Banka Hareket', '2021-06-14', 'Borç alma işlem kaydı', '2021-06-14 06:11:43', '2021-06-14 06:11:43');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `finans_fis_islems`
--

CREATE TABLE `finans_fis_islems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fiFisId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fiIslemTipKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fiIslemTipAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fiMHK` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fiMHA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fiBA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fiTutar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fiBorc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fiAlacak` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fiFark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `finans_fis_islems`
--

INSERT INTO `finans_fis_islems` (`id`, `fiFisId`, `fiIslemTipKod`, `fiIslemTipAd`, `fiMHK`, `fiMHA`, `fiBA`, `fiTutar`, `fiBorc`, `fiAlacak`, `fiFark`, `created_at`, `updated_at`) VALUES
(11, '5', '8', '8', '120.01.34.0001', 'MIGROS  AS', 'Alacak', '45000', NULL, NULL, NULL, '2021-06-13 13:23:04', '2021-06-13 13:23:04'),
(12, '6', '4', '4', '102', 'BANKALAR', 'Alacak', '5000', NULL, NULL, NULL, '2021-06-14 06:03:53', '2021-06-14 06:03:53'),
(13, '6', '7', '7', '770', 'GENEL YONETIM GIDERLERI', 'Borç', '5000', NULL, NULL, NULL, '2021-06-14 06:03:53', '2021-06-14 06:03:53'),
(14, '7', '10', '10', '100.01.01.0001', 'Merkez TL KASA', 'Alacak', '15000', NULL, NULL, NULL, '2021-06-14 06:06:01', '2021-06-14 06:06:01'),
(15, '7', '7', '7', '150', 'ILK MADDE VE MALZEME', 'Borç', '15000', NULL, NULL, NULL, '2021-06-14 06:06:01', '2021-06-14 06:06:01'),
(16, '8', '5', '5', '102.01.01.1001', 'Akbank XXXnolu Hesap', 'Alacak', '1500', NULL, NULL, NULL, '2021-06-14 06:07:15', '2021-06-14 06:07:15'),
(17, '8', '7', '7', '631', 'PAZARLAMA SAT.VE DAG.GID.', 'Borç', '1500', NULL, NULL, NULL, '2021-06-14 06:07:15', '2021-06-14 06:07:15'),
(18, '9', '5', '5', '102.01.01.2001', 'Garanti XXXnolu Hesap', 'Alacak', '7550', NULL, NULL, NULL, '2021-06-14 06:09:40', '2021-06-14 06:09:40'),
(19, '9', '6', '6', '102.01.01.1002', 'Akbank YYYnolu Hesap', 'Borç', '7550', NULL, NULL, NULL, '2021-06-14 06:09:40', '2021-06-14 06:09:40'),
(20, '10', '6', '6', '102', 'BANKALAR', 'Borç', '50000', NULL, NULL, NULL, '2021-06-14 06:11:43', '2021-06-14 06:11:43'),
(21, '10', '8', '8', '300', 'BANKA KREDILERI', 'Alacak', '50000', NULL, NULL, NULL, '2021-06-14 06:11:43', '2021-06-14 06:11:43');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `fis_tips`
--

CREATE TABLE `fis_tips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fisTipKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fisTipAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fisKartTip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fisDetayTip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fisMuhTip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `fis_tips`
--

INSERT INTO `fis_tips` (`id`, `fisTipKod`, `fisTipAd`, `fisKartTip`, `fisDetayTip`, `fisMuhTip`, `created_at`, `updated_at`) VALUES
(6, 'Banka Hareket', 'Banka Hareketleri', 'Banka', 'Borç', 'Mahsup', '2021-06-13 10:48:50', '2021-06-13 10:48:50'),
(7, 'Devir Banka', 'Devir Banka Hareketleri', 'Banka', 'Borç', 'Mahsup', '2021-06-13 10:49:25', '2021-06-13 10:49:25'),
(8, 'Devir Cari', 'Devir Cari Hareketleri', 'Cari', 'Borç', 'Mahsup', '2021-06-13 10:54:12', '2021-06-13 10:54:12'),
(9, 'Devir Kasa', 'Devir Kasa Hareketleri', 'Kasa', 'Borç', 'Mahsup', '2021-06-13 10:55:06', '2021-06-13 10:55:06'),
(10, 'Kasa Tahsil', 'Kasa Tahsil İşlemi', 'Kasa', 'Alacak', 'Tahsil', '2021-06-13 10:55:38', '2021-06-13 10:55:38'),
(11, 'Kasa Tediye', 'Kasa Tediye Ödeme İşlemi', 'Kasa', 'Borç', 'Tediye', '2021-06-13 10:56:12', '2021-06-13 10:56:12'),
(12, 'Virman', 'Virman Hareketleri', 'Banka', 'Borç', 'Mahsup', '2021-06-13 10:56:35', '2021-06-13 10:56:35');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hesap_kods`
--

CREATE TABLE `hesap_kods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hesapKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hesapAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `hesap_kods`
--

INSERT INTO `hesap_kods` (`id`, `hesapKod`, `hesapAd`, `updated_at`, `created_at`) VALUES
(1, '100', 'KASA', NULL, NULL),
(2, '101', 'ALINAN CEKLER', NULL, NULL),
(3, '102', 'BANKALAR', NULL, NULL),
(4, '103', 'VERILEN CEK ve ODEME EMRI ', NULL, NULL),
(5, '108', 'DIGER HAZIR DEGERLER', NULL, NULL),
(6, '110', 'HISSE SENETLERI', NULL, NULL),
(7, '111', 'OZEL KESIM TAHVIL SNT.VE BONO.', NULL, NULL),
(8, '112', 'KAMU KESIMI TAHVIL SNT.VE BONO', NULL, NULL),
(9, '118', 'DIGER MENKUL KIYMETLER', NULL, NULL),
(10, '119', 'MENKUL KIY.DEGER DUS.KAR.', NULL, NULL),
(11, '120', 'ALICILAR', NULL, NULL),
(12, '121', 'ALACAK SENETLERI', NULL, NULL),
(13, '122', 'ALACAK SENETLERI REESKONTU ', NULL, NULL),
(14, '124', 'KAZANILMAMIS FIN.KIRA.FZ.GL', NULL, NULL),
(15, '126', 'VERILEN DEPOZITO VE TEMINATLAR', NULL, NULL),
(16, '127', 'DIGER TICARI ALACAKLAR', NULL, NULL),
(17, '128', 'SUPHELI TICARI ALACAKLAR', NULL, NULL),
(18, '129', 'SUPHELI TIC.AL. KARSIGI ', NULL, NULL),
(19, '131', 'ORTAKLARDAN ALACAKLAR', NULL, NULL),
(20, '132', 'ISTIRAKLERDEN ALACAKLAR', NULL, NULL),
(21, '133', 'BAGLI ORTAKLIKLARDAN ALACAKLAR', NULL, NULL),
(22, '135', 'PERSONELDEN ALACAKLAR', NULL, NULL),
(23, '136', 'DIGER CESITLI ALACAKLAR', NULL, NULL),
(24, '137', 'DIGER ALACAK SNT.REESKONTU ', NULL, NULL),
(25, '138', 'SUPHELI DIGER ALACAKLAR', NULL, NULL),
(26, '139', 'SUPHELI DIGER ALACAK.KARS.', NULL, NULL),
(27, '150', 'ILK MADDE VE MALZEME', NULL, NULL),
(28, '151', 'YARI MAMULLER - URETIM', NULL, NULL),
(29, '152', 'MAMULLER', NULL, NULL),
(30, '153', 'TICARI MALLAR', NULL, NULL),
(31, '157', 'DIGER STOKLAR', NULL, NULL),
(32, '158', 'STOK DEGER DUSUKLUGU KARS.', NULL, NULL),
(33, '159', 'VERILEN SIPARIS AVANSLARI', NULL, NULL),
(34, '170', 'YILLARA YAY. INS.VE ON.MALIYET', NULL, NULL),
(35, '171', 'YILLARA YAY. INS.VE ON.MALIYET', NULL, NULL),
(36, '172', 'YILLARA YAY. INS.VE ON.MALIYET', NULL, NULL),
(37, '173', 'YILLARA YAY. INS.VE ON.MALIYET', NULL, NULL),
(38, '174', 'YILLARA YAY. INS.VE ON.MALIYET', NULL, NULL),
(39, '175', 'YILLARA YAY. INS.VE ON.MALIYET', NULL, NULL),
(40, '176', 'YILLARA YAY. INS.VE ON.MALIYET', NULL, NULL),
(41, '177', 'YILLARA YAY. INS.VE ON.MALIYET', NULL, NULL),
(42, '178', 'YILLARA YAY.INS.ENF.DUZELT.HES', NULL, NULL),
(43, '179', 'TASERONLARA VERILEN AVANSLAR', NULL, NULL),
(44, '180', 'GELECEK AYLARA AIT GIDERLER', NULL, NULL),
(45, '181', 'GELIR TAHAKKUKLARI', NULL, NULL),
(46, '190', 'DEVREDEN KATMA DEGER VERGISI', NULL, NULL),
(47, '191', 'INDIRILECEK KDV', NULL, NULL),
(48, '192', 'DIGER KDV', NULL, NULL),
(49, '193', 'PESIN ODENEN VERGI VE FONLAR', NULL, NULL),
(50, '195', 'IS AVANSLARI', NULL, NULL),
(51, '196', 'PERSONEL AVANSLARI', NULL, NULL),
(52, '197', 'SAYIM VE TESELLUM NOKSANLARI', NULL, NULL),
(53, '198', 'DIGER CESITLI DONEN VARLIKLAR', NULL, NULL),
(54, '199', 'DIGER DONEN VARLIKLAR KRS. ', NULL, NULL),
(55, '220', 'ALICILAR', NULL, NULL),
(56, '221', 'ALACAK SENETLERI', NULL, NULL),
(57, '222', 'ALACAK SENETLERI REESKONTU ', NULL, NULL),
(58, '224', 'KAZANILMAMIS FIN.KIRA.FZ.GL', NULL, NULL),
(59, '226', 'VERILEN DEPOZITO VE TEMINATLAR', NULL, NULL),
(60, '229', 'SUPHELI ALACAKLAR KARSILIGI', NULL, NULL),
(61, '231', 'ORTAKLARDAN ALACAKLAR', NULL, NULL),
(62, '232', 'ISTIRAKLERDEN ALACAKLAR', NULL, NULL),
(63, '233', 'BAGLI ORTAKLIKLARDAN ALACAKLAR', NULL, NULL),
(64, '235', 'PERSONELDEN ALACAKLAR', NULL, NULL),
(65, '236', 'DIGER CESITLI ALACAKLAR', NULL, NULL),
(66, '237', 'DIGER ALACAK SNT.REESKONTU ', NULL, NULL),
(67, '239', 'SUPHELI DIGER ALACAK.KARS. ', NULL, NULL),
(68, '240', 'BAGLI MENKUL KIYMETLER', NULL, NULL),
(69, '241', 'BAGLI MEN.KIY.DEG. DUS.KAR.', NULL, NULL),
(70, '242', 'ISTIRAKLER', NULL, NULL),
(71, '243', 'ISTIRAKLERE SERM.TAAHHUT. ', NULL, NULL),
(72, '244', 'IST.SERM.PAY.DEG.DUSUK.KRS.', NULL, NULL),
(73, '245', 'BAGLI ORTAKLIKLAR', NULL, NULL),
(74, '246', 'BAGLI ORTAK.SER.TAAHHUTLERI', NULL, NULL),
(75, '247', 'BAG.ORT.SER.PAY.DEG.DUS.KRS', NULL, NULL),
(76, '248', 'DIGER MALI DURAN VARLIKLAR', NULL, NULL),
(77, '249', 'DGR.MALI DURAN VARLIK.KRS. ', NULL, NULL),
(78, '250', 'ARAZI VE ARSALAR', NULL, NULL),
(79, '251', 'YERALTI VE YERUSTU DUZENLERI', NULL, NULL),
(80, '252', 'BINALAR', NULL, NULL),
(81, '253', 'TESIS MAKINE VE CIHAZLAR', NULL, NULL),
(82, '254', 'TASITLAR', NULL, NULL),
(83, '255', 'DEMIRBASLAR', NULL, NULL),
(84, '256', 'DIGER MADDI DURAN VARLIKLAR', NULL, NULL),
(85, '257', 'BIRIKMIS AMORTISMANLAR ', NULL, NULL),
(86, '258', 'YAPILMAKTA OLAN YATIRIMLAR', NULL, NULL),
(87, '259', 'VERILEN AVANSLAR', NULL, NULL),
(88, '260', 'HAKLAR', NULL, NULL),
(89, '261', 'SEREFIYE', NULL, NULL),
(90, '262', 'KURULUS VE ORGUTLENME GIDER.', NULL, NULL),
(91, '263', 'ARASTIRMA VE GELISTIRME GIDER.', NULL, NULL),
(92, '264', 'OZEL MALIYETLER', NULL, NULL),
(93, '267', 'DIGER.MADDI OLM. DURAN VARLIK.', NULL, NULL),
(94, '268', 'BIRIKMIS AMORTISMANLAR ', NULL, NULL),
(95, '269', 'VERILEN AVANSLAR', NULL, NULL),
(96, '271', 'ARAMA GIDERLERI', NULL, NULL),
(97, '272', 'HAZIRLIK VE GELISTIRME GIDER.', NULL, NULL),
(98, '277', 'DIGER OZEL TUKENMEYE TABI VAR.', NULL, NULL),
(99, '278', 'BIRIKMIS TUKENME PAYLARI ', NULL, NULL),
(100, '279', 'VERILEN AVANSLAR', NULL, NULL),
(101, '280', 'GELECEK YILLARA AIT GIDERLER', NULL, NULL),
(102, '281', 'GELIR TAAHHUKLARI', NULL, NULL),
(103, '291', 'GELECEK YILLARDA INDIRILE. KDV', NULL, NULL),
(104, '292', 'DIGER KDV', NULL, NULL),
(105, '293', 'GELECEK YILLAR IHTIYACI STOK.', NULL, NULL),
(106, '294', 'ELD.CIK.STOK.VE MAD.DURAN VAR.', NULL, NULL),
(107, '295', 'PESIN ODENEN VERGILER VE FON', NULL, NULL),
(108, '297', 'DIGER CESITLI DURAN VARLIKLAR', NULL, NULL),
(109, '298', 'STOK DEGER DUSUKLUGU KARS. ', NULL, NULL),
(110, '299', 'BIRIKMIS AMORTISMANLAR ', NULL, NULL),
(111, '300', 'BANKA KREDILERI', NULL, NULL),
(112, '301', 'FINANSAL KIRALAMA ISL.BORCLAR', NULL, NULL),
(113, '302', 'ERTELEN.FIN.KIRA.BORC.MAL. ', NULL, NULL),
(114, '303', 'UZUN VAD.KRD.ANAP.TAKS.VE FAIZ', NULL, NULL),
(115, '304', 'TAHVIL ANAP.BORC TAK.VE FAIZ.', NULL, NULL),
(116, '305', 'CIKARILMIS BONOLAR VE SENETLER', NULL, NULL),
(117, '306', 'CIKARILMIS DIGER MENKUL KIYM.', NULL, NULL),
(118, '308', 'MENKUL KIYMET. IHRAC FARKI ', NULL, NULL),
(119, '309', 'DIGER MALI BORCLAR', NULL, NULL),
(120, '320', 'SATICILAR', NULL, NULL),
(121, '321', 'BORC SENETLERI', NULL, NULL),
(122, '322', 'BORC SENETLERI REESKONTU ', NULL, NULL),
(123, '326', 'ALINAN DEPOZITO VE TEMINATLAR', NULL, NULL),
(124, '329', 'DIGER TICARI BORCLAR', NULL, NULL),
(125, '331', 'ORTAKLARA BORCLAR', NULL, NULL),
(126, '332', 'ISTIRAKLERE BORCLAR', NULL, NULL),
(127, '333', 'BAGLI ORTAKLIKLARA BORCLAR', NULL, NULL),
(128, '335', 'PERSONELE BORCLAR', NULL, NULL),
(129, '336', 'DIGER CESITLI BORCLAR', NULL, NULL),
(130, '337', 'DIGER BORC.SENET.REESKONTU ', NULL, NULL),
(131, '340', 'ALINAN SIPARIS AVANSLARI', NULL, NULL),
(132, '349', 'ALINAN DIGER AVANSLAR', NULL, NULL),
(133, '350', 'YILLARA YAY.INS.ve ONR.HAKEDIS', NULL, NULL),
(134, '351', 'YILLARA YAY.INS.ve ONR.HAKEDIS', NULL, NULL),
(135, '352', 'YILLARA YAY.INS.ve ONR.HAKEDIS', NULL, NULL),
(136, '353', 'YILLARA YAY.INS.ve ONR.HAKEDIS', NULL, NULL),
(137, '354', 'YILLARA YAY.INS.ve ONR.HAKEDIS', NULL, NULL),
(138, '355', 'YILLARA YAY.INS.ve ONR.HAKEDIS', NULL, NULL),
(139, '356', 'YILLARA YAY.INS.ve ONR.HAKEDIS', NULL, NULL),
(140, '357', 'YILLARA YAY.INS.ve ONR.HAKEDIS', NULL, NULL),
(141, '358', 'YILLARA YAY.INS.ENF.DUZELT.HES', NULL, NULL),
(142, '360', 'ODENECEK VERGI VE FONLAR', NULL, NULL),
(143, '361', 'ODENECEK SOS. GUV. KESINTILERI', NULL, NULL),
(144, '368', 'VD.GEC.ER.VEYA TK.VR.VE DG.YUK', NULL, NULL),
(145, '369', 'ODENECEK DIGER YUKUMLULUKLER', NULL, NULL),
(146, '370', 'DON.KARI VER.VE DIG.YUK.KARS.', NULL, NULL),
(147, '371', 'DON.KAR.PES.OD.VER.VE YUK ', NULL, NULL),
(148, '372', 'KIDEM TAZMINATI KARSILIGI', NULL, NULL),
(149, '373', 'MALIYET GIDERLERI KARSILIGI', NULL, NULL),
(150, '379', 'DIGER BORC VE GIDER KARSILIGI', NULL, NULL),
(151, '380', 'GELECEK AYLARA AIT GELIRLER', NULL, NULL),
(152, '381', 'GIDER TAHAKKUKLARI', NULL, NULL),
(153, '391', 'HESAPLANAN KDV', NULL, NULL),
(154, '392', 'DIGER KDV', NULL, NULL),
(155, '393', 'MERKEZ VE SUBELER CARI HESABI', NULL, NULL),
(156, '397', 'SAYIM VE TESELLUM FAZLALARI', NULL, NULL),
(157, '399', 'DIGER CESITLI YAB. KAYNAKLAR', NULL, NULL),
(158, '400', 'BANKA KREDILERI', NULL, NULL),
(159, '401', 'FINANSAL KIRALAMA ISL.BORCLAR', NULL, NULL),
(160, '402', 'ERTELEN.FIN.KIRA.BORC.MAL. ', NULL, NULL),
(161, '405', 'CIKARILMIS TAHVILLER', NULL, NULL),
(162, '407', 'CIKARILMIS DGR.MENKUL KIYMET.', NULL, NULL),
(163, '408', 'MENKUL KIYMET.IHRAC FARKI ', NULL, NULL),
(164, '409', 'DIGER MALI BORCLAR', NULL, NULL),
(165, '420', 'SATICILAR', NULL, NULL),
(166, '421', 'BORC SENETLERI', NULL, NULL),
(167, '422', 'BORC SENETLERI REESKONTU ', NULL, NULL),
(168, '426', 'ALINAN DEPOZITO VE TEMINATLAR', NULL, NULL),
(169, '429', 'DIGER TICARI BORCLAR', NULL, NULL),
(170, '431', 'ORTAKLARA BORCLAR', NULL, NULL),
(171, '432', 'ISTIRAKLERE BORCLAR', NULL, NULL),
(172, '433', 'BAGLI ORTAKLIKLARA BORCLAR', NULL, NULL),
(173, '436', 'DIGER CESITLI BORCLAR', NULL, NULL),
(174, '437', 'DIGER BORC SENETLERI REES. ', NULL, NULL),
(175, '438', 'KAMUYA OL.ERT.VEYA TAKSIT.BORC', NULL, NULL),
(176, '440', 'ALINAN SIPARIS AVANSLARI', NULL, NULL),
(177, '449', 'ALINAN DIGER AVANSLAR', NULL, NULL),
(178, '472', 'KIDEM TAZMINATI KARSILIGI', NULL, NULL),
(179, '479', 'DIGER BORC VE GIDER KARSILIK.', NULL, NULL),
(180, '480', 'GELECEK YILLARA AIT GELIRLER', NULL, NULL),
(181, '481', 'GIDER TAHAKKUKLARI', NULL, NULL),
(182, '492', 'GEL.YIL.ERT.VEYA TERKIN ED.KDV', NULL, NULL),
(183, '493', 'TESISE KATILMA PAYLARI', NULL, NULL),
(184, '499', 'DI.CES.UZUN VAD.YAB.KAYNAKLAR', NULL, NULL),
(185, '500', 'SERMAYE', NULL, NULL),
(186, '501', 'ODENMEMIS SERMAYE ', NULL, NULL),
(187, '502', 'SERMAYE DUZELT.OLUMLU FARKLARI', NULL, NULL),
(188, '503', 'SERMAYE DUZELT.OLUMSUZ FARKLARI ', NULL, NULL),
(189, '520', 'HISSE SENETLERI IHRAC PRIMLERI', NULL, NULL),
(190, '521', 'HISSE SENEDI IPTAL KARLARI', NULL, NULL),
(191, '522', 'M.D.V.YENIDEN DEGERLEME ARTIS.', NULL, NULL),
(192, '523', 'ISTIRAKLER YENIDEN DEGER.ART.', NULL, NULL),
(193, '529', 'DIGER SERMAYE YEDEKLERI', NULL, NULL),
(194, '540', 'YASAL YEDEKLER', NULL, NULL),
(195, '541', 'STATU YEDEKLERI', NULL, NULL),
(196, '542', 'OLAGANUSTU YEDEKLER', NULL, NULL),
(197, '548', 'DIGER KAR YEDEKLERI', NULL, NULL),
(198, '549', 'OZEL FONLAR', NULL, NULL),
(199, '570', 'GECMIS YILLAR KARLARI', NULL, NULL),
(200, '580', 'GECMIS YILLAR ZARARLARI ', NULL, NULL),
(201, '590', 'DONEM NET KARI', NULL, NULL),
(202, '591', 'DONEM NET ZARARI ', NULL, NULL),
(203, '600', 'YURT ICI SATISLAR', NULL, NULL),
(204, '601', 'YURT DISI SATISLAR', NULL, NULL),
(205, '602', 'DIGER GELIRLER', NULL, NULL),
(206, '610', 'SATISTAN IADELER ', NULL, NULL),
(207, '611', 'SATIS ISKONTOLARI ', NULL, NULL),
(208, '612', 'DIGER INDIRIMLER ', NULL, NULL),
(209, '620', 'SATILAN MAMULLER MALIYETI ', NULL, NULL),
(210, '621', 'SATILAN TIC.MALLAR MALIYETI', NULL, NULL),
(211, '622', 'SATILAN HIZMET MALIYETI ', NULL, NULL),
(212, '623', 'DIGER SATISLARIN MALIYETI ', NULL, NULL),
(213, '630', 'ARASTIRMA VE GELISTIRME GID', NULL, NULL),
(214, '631', 'PAZARLAMA SAT.VE DAG.GID. ', NULL, NULL),
(215, '632', 'GENEL YONETIM GIDERLERI ', NULL, NULL),
(216, '640', 'ISTIRAKLERDEN TEMETTU GELIR.', NULL, NULL),
(217, '641', 'BAGLI ORT.TEMETTU GELIRLERI', NULL, NULL),
(218, '642', 'FAIZ GELIRLERI', NULL, NULL),
(219, '643', 'KOMISYON GELIRLERI', NULL, NULL),
(220, '644', 'KONUSU KALMAYAN KARSILIKLAR', NULL, NULL),
(221, '645', 'MENKUL KIYMETLER SATIS KARLARI', NULL, NULL),
(222, '646', 'KAMBIYO KARLARI', NULL, NULL),
(223, '647', 'REESKONT FAIZ GELIRLERI', NULL, NULL),
(224, '648', 'ENFLASYON DUZELTMESI KARLARI', NULL, NULL),
(225, '649', 'DIGER OLAGAN GELIR VE KARLAR', NULL, NULL),
(226, '653', 'KOMISYON GIDERLERI ', NULL, NULL),
(227, '654', 'KARSILIK GIDERLERI ', NULL, NULL),
(228, '655', 'MENKUL KIYMET SATIS ZARAR ', NULL, NULL),
(229, '656', 'KAMBIYO ZARARLARI ', NULL, NULL),
(230, '657', 'REESKONT FAIZ GIDERLERI ', NULL, NULL),
(231, '658', 'ENFLASYON DUZELT.ZARARLARI ', NULL, NULL),
(232, '659', 'DIGER GIDER VE ZARARLAR ', NULL, NULL),
(233, '660', 'KISA VADELI BORCLANMA GID. ', NULL, NULL),
(234, '661', 'UZUN VADELI BORCLANMA GID. ', NULL, NULL),
(235, '671', 'ONCEKI DONEM GELIR VE KARLARI', NULL, NULL),
(236, '679', 'DIG.OLAGANDISI GELIR VE KARLAR', NULL, NULL),
(237, '680', 'CALISMAYAN KISIM GID.VE ZAR', NULL, NULL),
(238, '681', 'ONCEKI DON.GID.VE ZARARLARI', NULL, NULL),
(239, '689', 'DIGER O.DISI GID.VE ZARAR.', NULL, NULL),
(240, '690', 'DONEM KARI VEYA ZARARI', NULL, NULL),
(241, '691', 'D.K.VER.VE DIG.YAS.YUK.KAR.', NULL, NULL),
(242, '692', 'DONEM NET KARI VEYA ZARARI', NULL, NULL),
(243, '697', 'YILLARA YAY.INS.ENF.DUZELT.HES', NULL, NULL),
(244, '698', 'ENFLASYON DUZELTME HESABI', NULL, NULL),
(245, '700', 'MALIYET MUHASEBESI BAGLANTI HS', NULL, NULL),
(246, '701', 'MALIYET MUHASEBESI YANSITMA HS', NULL, NULL),
(247, '710', 'DIREKT ILK MADDE VE MALZEME GD', NULL, NULL),
(248, '711', 'DIREKT ILK MAD.VE MAL.YANS.', NULL, NULL),
(249, '712', 'DIREKT ILK MAD.VE MAL.FIAT FAR', NULL, NULL),
(250, '713', 'DIREKT ILK MAD.VE MAL.MIK.FAR.', NULL, NULL),
(251, '720', 'DIREKT ISCILIK GIDERLERI', NULL, NULL),
(252, '721', 'DIREKT ISCILIK GID.YANSIT.HES.', NULL, NULL),
(253, '722', 'DIREKT ISCILIK UCRET FARKLARI', NULL, NULL),
(254, '723', 'DIREKT ISCILIK SURE FARKLARI', NULL, NULL),
(255, '730', 'GENEL URETIM GIDERLERI', NULL, NULL),
(256, '731', 'GENEL URETIM GID.YANSITMA HES.', NULL, NULL),
(257, '732', 'GENEL URETIM GID.BUTCE FARK.', NULL, NULL),
(258, '733', 'GENEL URETIM GIDERLERI VER.FRK', NULL, NULL),
(259, '734', 'GENEL URETIM GID.KAPASITE FRK.', NULL, NULL),
(260, '740', 'HIZMET URETIM MALIYETI', NULL, NULL),
(261, '741', 'HIZMET URETIM MAL.YAN.HES.', NULL, NULL),
(262, '742', 'HIZMET URET.MAL.FARK HESAPLARI', NULL, NULL),
(263, '750', 'ARASTIRMA VE GELISTIRME GIDER.', NULL, NULL),
(264, '751', 'ARAS.VE GELIS.GID.YANS.HESABI', NULL, NULL),
(265, '752', 'ARAS.VE GELIS.GIDER FARKLARI', NULL, NULL),
(266, '760', 'PAZARLAMA SATIS VE DAGITIM GIDERLERI', NULL, NULL),
(267, '761', 'PAZARLAMA SAT.VE DAG.GID.YANSITMA HS', NULL, NULL),
(268, '762', 'PAZARLAMA SAT.VE DAG.GID.FARK HESABI', NULL, NULL),
(269, '770', 'GENEL YONETIM GIDERLERI', NULL, NULL),
(270, '771', 'GEN.YON.GID.YANSITMA HESABI', NULL, NULL),
(271, '772', 'GENEL YONETIM GID.FARKLARI HS.', NULL, NULL),
(272, '780', 'FINANSMAN GIDERLERI', NULL, NULL),
(273, '781', 'FINANSMAN GIDERLERI YANSITMA HESABI', NULL, NULL),
(274, '782', 'FINANSMAN GIDERLERI FARK HESABI', NULL, NULL),
(275, '790', 'ILK MADDE VE MALZEME GIDERLERI', NULL, NULL),
(276, '791', 'ISCI UCRET VE GIDERLERI', NULL, NULL),
(277, '792', 'MEMUR UCRET VE GIDERLERI', NULL, NULL),
(278, '793', 'DIS. SAGL. FAYDA VE HIZMETLER', NULL, NULL),
(279, '794', 'CESITLI GIDERLER', NULL, NULL),
(280, '795', 'VERGI RESIM VE HARCLAR', NULL, NULL),
(281, '796', 'AMORTISMANLAR VE TUKENME PAYL.', NULL, NULL),
(282, '797', 'FINANSMAN GIDERLERI', NULL, NULL),
(283, '798', 'GIDER CESITLERI YANSITMA HES.', NULL, NULL),
(284, '799', 'URETIM MALIYET HESABI', NULL, NULL),
(299, '120.01.34.0001', 'MIGROS  AS', '2021-06-13 08:10:20', '2021-06-13 08:10:20'),
(300, '120.01.34.0002', 'CARREFOUR AS', '2021-06-13 08:10:39', '2021-06-13 08:10:39'),
(301, '120.01.34.0003', 'SOK AS', '2021-06-13 08:10:51', '2021-06-13 08:10:51'),
(302, '120.01.34.0004', '7ELEVEN AS', '2021-06-13 08:11:07', '2021-06-13 08:11:07'),
(303, '120.01.34.0005', 'WALLMART AS', '2021-06-13 08:11:17', '2021-06-13 08:11:17'),
(304, '120.01.35.0001', 'KARDESLER BILARDO VE LANGIRT AS', '2021-06-13 08:11:33', '2021-06-13 08:11:33'),
(305, '120.01.35.0002', 'HAVALI CAFE AS', '2021-06-13 08:11:50', '2021-06-13 08:11:50'),
(306, '120.01.35.0003', 'EGLENCE TRENI LUNAPARK AS', '2021-06-13 08:12:10', '2021-06-13 08:12:10'),
(307, '120.01.35.0004', 'FIRFIR LANGIRTCILIK AS', '2021-06-13 08:12:27', '2021-06-13 08:12:27'),
(308, '120.01.35.0005', 'GOL OYUNCAKÇILIK AS', '2021-06-13 08:12:41', '2021-06-13 08:12:41'),
(309, '320.01.34.0003', 'CITIR SIMITÇILIK AS', '2021-06-13 08:13:27', '2021-06-13 08:13:27'),
(310, '320.01.34.0004', 'KAVRULMUS CEREZCİLİK AS', '2021-06-13 08:13:46', '2021-06-13 08:13:46'),
(311, '320.01.34.0005', 'BEYAZ PEYNIRCILIK AS', '2021-06-13 08:14:32', '2021-06-13 08:14:32'),
(312, '320.01.34.0006', 'SIYAH ZEYTINCLIK AS', '2021-06-13 08:14:44', '2021-06-13 08:14:44'),
(313, '320.01.34.0007', 'EKSI DOMATESCILIK AS', '2021-06-13 08:15:34', '2021-06-13 08:15:34'),
(314, '320.01.34.0008', 'PARILTI CAMCILIK AS', '2021-06-13 08:15:46', '2021-06-13 08:15:46'),
(315, '320.01.35.0009', 'SAGLAM MARANGOZ AS', '2021-06-13 08:16:02', '2021-06-13 08:16:02'),
(316, '320.01.35.0010', 'KOSELI TOPCULUK AS', '2021-06-13 08:16:23', '2021-06-13 08:16:23'),
(317, '320.01.35.0011', 'SERT PLASTİK AS', '2021-06-13 08:16:41', '2021-06-13 08:16:41'),
(318, '320.01.35.0012', 'SAHIN BAKKALIYE AS', '2021-06-13 08:16:56', '2021-06-13 08:16:56'),
(319, '102.01.01.1001', 'Akbank XXXnolu Hesap', '2021-06-13 08:47:58', '2021-06-13 08:47:58'),
(320, '102.01.01.1002', 'Akbank YYYnolu Hesap', '2021-06-13 08:48:17', '2021-06-13 08:48:17'),
(321, '102.01.01.2001', 'Garanti XXXnolu Hesap', '2021-06-13 08:48:36', '2021-06-13 08:48:36'),
(322, '102.01.02.1001', 'Akbank ZZZnolu Hesap', '2021-06-13 08:49:00', '2021-06-13 08:49:00'),
(323, '120.01.03.1002', 'Akbank TTTnolu Hesap', '2021-06-13 08:49:22', '2021-06-13 08:49:22'),
(324, '100.01.01.0001', 'Merkez TL KASA', '2021-06-13 08:56:31', '2021-06-13 08:56:31'),
(325, '100.01.02.0001', 'Merkez USD KASA', '2021-06-13 08:56:53', '2021-06-13 08:56:53'),
(326, '100.01.03.0001', 'Merkez EUR KASA', '2021-06-13 08:57:06', '2021-06-13 08:57:06');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `isemris`
--

CREATE TABLE `isemris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isemriFirmaKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isemriNumara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isemriTarih` date NOT NULL,
  `isemriStokKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isemriMiktar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isemriBirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isemriCariKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isemriGirisDepoKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `isemris`
--

INSERT INTO `isemris` (`id`, `isemriFirmaKod`, `isemriNumara`, `isemriTarih`, `isemriStokKod`, `isemriMiktar`, `isemriBirim`, `isemriCariKod`, `isemriGirisDepoKod`, `created_at`, `updated_at`) VALUES
(27, '1', 'İSE-0001', '2021-06-13', 'BYM10', '1', 'Adet', 'BM04', 'ÜRETİM DEPO', '2021-06-13 14:35:24', '2021-06-13 14:35:24'),
(28, '1', 'İSE-0002', '2021-06-13', 'BYM20', '1', 'Adet', 'BM04', 'ÜRETİM DEPO', '2021-06-13 14:35:47', '2021-06-13 14:35:47');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `isistasyons`
--

CREATE TABLE `isistasyons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isistasyonFirmaId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isistasyonKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isistasyonAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ismerkeziKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ismerkeziAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isistasyonAciklama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `isistasyons`
--

INSERT INTO `isistasyons` (`id`, `isistasyonFirmaId`, `isistasyonKod`, `isistasyonAd`, `ismerkeziKod`, `ismerkeziAd`, `isistasyonAciklama`, `created_at`, `updated_at`) VALUES
(1, '1', 'İST-001', 'Konak İş İstasyonu', 'ISM-01', 'Konak İş Merkezi', 'Konak iş istasyonu', '2021-06-10 02:28:28', '2021-06-10 15:23:33'),
(2, '1', 'İST-002', 'Alsancak İş İstasyonu', 'ISM-02', 'Alsancak İş Merkezi', 'Alsancak İş İstasyonu', '2021-06-10 02:41:07', '2021-06-13 17:54:54'),
(5, '1', 'İST-003', 'Buca İş İstasyonu', 'ISM-04', 'Buca İş Merkezi', 'Buca İş İstasyonu', '2021-06-13 14:31:49', '2021-06-13 14:31:49');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `isistasyon_operasyons`
--

CREATE TABLE `isistasyon_operasyons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isistasyonId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isistasyonOperasyonKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isistasyonOperasyonAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `islem_tips`
--

CREATE TABLE `islem_tips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `islemTipKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `islemTipAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `islemKaynak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `islemBA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `islemKartTip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `islem_tips`
--

INSERT INTO `islem_tips` (`id`, `islemTipKod`, `islemTipAd`, `islemKaynak`, `islemBA`, `islemKartTip`, `created_at`, `updated_at`) VALUES
(4, 'Alacak', 'Alacak', 'Muhasebe', 'Alacak', 'Muhasebe', '2021-06-13 10:57:46', '2021-06-13 10:57:46'),
(5, 'Banka Alacak', 'Banka Alacak', 'Muhasebe', 'Borç', 'Muhasebe', '2021-06-13 10:58:12', '2021-06-13 17:55:51'),
(6, 'Banka Borç', 'Banka Borç', 'Finans', 'Borç', 'Banka', '2021-06-13 10:58:34', '2021-06-13 10:58:34'),
(7, 'Borç', 'Borç', 'Muhasebe', 'Borç', 'Muhasebe', '2021-06-13 10:58:48', '2021-06-13 10:58:48'),
(8, 'Cari Alacak', 'Cari Alacak', 'Finans', 'Alacak', 'Cari', '2021-06-13 10:59:14', '2021-06-13 10:59:14'),
(9, 'Cari Borç', 'Cari Borç', 'Finans', 'Borç', 'Cari', '2021-06-13 10:59:31', '2021-06-13 10:59:31'),
(10, 'Kasa Alacak', 'Kasa Alacak', 'Finans', 'Alacak', 'Kasa', '2021-06-13 10:59:52', '2021-06-13 10:59:52'),
(11, 'Kasa Borç', 'Kasa Borç', 'Finans', 'Borç', 'Kasa', '2021-06-13 11:00:10', '2021-06-13 11:00:10');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ismerkezis`
--

CREATE TABLE `ismerkezis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ismerkeziFirmaId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ismerkeziKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ismerkeziAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ismerkeziAciklama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `ismerkezis`
--

INSERT INTO `ismerkezis` (`id`, `ismerkeziFirmaId`, `ismerkeziKod`, `ismerkeziAd`, `ismerkeziAciklama`, `created_at`, `updated_at`) VALUES
(28, '1', 'ISM-01', 'Konak İş Merkezi', 'Konak 1 numaralı iş merkezi', '2021-06-13 14:18:37', '2021-06-13 17:54:48'),
(29, '1', 'ISM-02', 'Alsancak İş Merkezi', 'Alsancak 1 numaralı iş merkezi', '2021-06-13 14:18:58', '2021-06-13 14:18:58'),
(30, '1', 'ISM-03', 'Konak İş Merkezi 2', 'Konak 2 numaralı iş merkezi', '2021-06-13 14:19:14', '2021-06-13 14:19:14'),
(32, '1', 'ISM-04', 'Buca İş Merkezi', 'Buca iş merkezi', '2021-06-13 14:24:47', '2021-06-13 14:24:47');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ismerkezi_istasyons`
--

CREATE TABLE `ismerkezi_istasyons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ismerkeziId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ismerkeziIstasyonKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ismerkeziIstasyonAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ismerkezi_operasyons`
--

CREATE TABLE `ismerkezi_operasyons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ismerkeziId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ismerkeziOperasyonKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ismerkeziOperasyonAd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `ismerkezi_operasyons`
--

INSERT INTO `ismerkezi_operasyons` (`id`, `ismerkeziId`, `ismerkeziOperasyonKod`, `ismerkeziOperasyonAd`, `created_at`, `updated_at`) VALUES
(16, '29', 'OP-2', 'MONTAJ OPERASYONU', '2021-06-13 14:18:58', '2021-06-13 14:18:58'),
(17, '30', 'OP-3', 'KESME OPERASYONU', '2021-06-13 14:19:14', '2021-06-13 14:19:14'),
(24, '32', 'OP-4', '10 NUMARALI OPERASYON', '2021-06-13 14:24:47', '2021-06-13 14:24:47'),
(25, '32', 'OP-5', '20NUMARALI OPERASYON', '2021-06-13 14:24:47', '2021-06-13 14:24:47'),
(26, '32', 'OP-6', '30 NUMARALI OPERASYON', '2021-06-13 14:24:47', '2021-06-13 14:24:47'),
(27, '28', 'OP-1', 'BOYAMA OPERASYONU', '2021-06-13 17:54:48', '2021-06-13 17:54:48');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kasas`
--

CREATE TABLE `kasas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kasaKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kasaAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kasaPB` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kasaFirmaId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kasaMHK` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kasaMHA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `kasas`
--

INSERT INTO `kasas` (`id`, `kasaKod`, `kasaAd`, `kasaPB`, `kasaFirmaId`, `kasaMHK`, `kasaMHA`, `created_at`, `updated_at`) VALUES
(4, '0101', 'Merkez TL KASA', 'TL', '1', 'Merkez TL KASA', '100.01.01.0001', '2021-06-13 08:58:13', '2021-06-13 08:58:13'),
(5, '0102', 'Merkez USD KASA', 'USD', '1', 'Merkez USD KASA', '100.01.02.0001', '2021-06-13 08:58:31', '2021-06-13 08:58:31'),
(6, '0103', 'Merkez EUR KASA', 'EUR', '1', 'Merkez EUR KASA', '100.01.03.0001', '2021-06-13 08:58:53', '2021-06-13 08:58:53');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `loggers`
--

CREATE TABLE `loggers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `islem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `loggers`
--

INSERT INTO `loggers` (`id`, `text`, `islem`, `created_at`, `updated_at`) VALUES
(1, 'İSTANBUL SİMİDİ Düzenlendi', 'Stok Kart Tanım', '2021-06-13 16:39:06', '2021-06-13 16:39:06'),
(2, 'Satış siparişi eklendi', 'Satış Siparşi İşlemleri', '2021-06-13 17:28:04', '2021-06-13 17:28:04'),
(3, 'Satış fatura eklendi', 'Satış Faturası İşlemleri', '2021-06-13 17:28:14', '2021-06-13 17:28:14'),
(4, 'STS-0001 Düzenlendi', 'Satış Sipariş İşlemleri', '2021-06-13 17:28:33', '2021-06-13 17:28:33'),
(5, 'Satış teklifi eklendi', 'Satış Teklif İşlemleri', '2021-06-13 17:53:47', '2021-06-13 17:53:47'),
(6, 'STSTK-0001 Düzenlendi', 'Satış Teklif İşlemleri', '2021-06-13 17:54:08', '2021-06-13 17:54:08'),
(7, 'Banka Alacak Düzenlendi', 'İşlem Tipi Tanım', '2021-06-13 17:54:28', '2021-06-13 17:54:28'),
(8, 'Konak İş Merkezi Düzenlendi', 'İş Merkezi İşlemleri', '2021-06-13 17:54:48', '2021-06-13 17:54:48'),
(9, 'Alsancak İş İstasyonu Düzenlendi', 'İş İstasyon İşlemleri', '2021-06-13 17:54:54', '2021-06-13 17:54:54'),
(10, 'Banka Alacak Düzenlendi', 'İşlem Tipi Tanım', '2021-06-13 17:55:51', '2021-06-13 17:55:51'),
(11, '# Silindi', 'Üretim Giriş İşlemleri', '2021-06-13 17:57:11', '2021-06-13 17:57:11'),
(12, '# Silindi', 'İş Emri İşlemleri', '2021-06-13 18:00:10', '2021-06-13 18:00:10'),
(13, '# Silindi', 'Ürün Rota İşlemleri', '2021-06-13 18:00:17', '2021-06-13 18:00:17'),
(14, '# Silindi', 'Ürün Ağacı İşlemleri', '2021-06-13 18:00:24', '2021-06-13 18:00:24'),
(15, 'Finans fişi eklendi', 'Finans Fiş Tanım', '2021-06-14 06:03:53', '2021-06-14 06:03:53'),
(16, 'Finans fişi eklendi', 'Finans Fiş Tanım', '2021-06-14 06:03:53', '2021-06-14 06:03:53'),
(17, 'Finans fişi eklendi', 'Finans Fiş Tanım', '2021-06-14 06:06:01', '2021-06-14 06:06:01'),
(18, 'Finans fişi eklendi', 'Finans Fiş Tanım', '2021-06-14 06:06:02', '2021-06-14 06:06:02'),
(19, 'Finans fişi eklendi', 'Finans Fiş Tanım', '2021-06-14 06:07:15', '2021-06-14 06:07:15'),
(20, 'Finans fişi eklendi', 'Finans Fiş Tanım', '2021-06-14 06:07:15', '2021-06-14 06:07:15'),
(21, 'Muhasebe fişi eklendi', 'Muhasebe Fiş İşlemleri', '2021-06-14 06:08:38', '2021-06-14 06:08:38'),
(22, 'Muhasebe fişi eklendi', 'Muhasebe Fiş İşlemleri', '2021-06-14 06:08:38', '2021-06-14 06:08:38'),
(23, 'Finans fişi eklendi', 'Finans Fiş Tanım', '2021-06-14 06:09:40', '2021-06-14 06:09:40'),
(24, 'Finans fişi eklendi', 'Finans Fiş Tanım', '2021-06-14 06:09:40', '2021-06-14 06:09:40'),
(25, 'Finans fişi eklendi', 'Finans Fiş Tanım', '2021-06-14 06:11:43', '2021-06-14 06:11:43'),
(26, 'Finans fişi eklendi', 'Finans Fiş Tanım', '2021-06-14 06:11:43', '2021-06-14 06:11:43'),
(27, 'Satış siparişi eklendi', 'Satış Siparşi İşlemleri', '2021-06-14 06:19:56', '2021-06-14 06:19:56'),
(28, 'Satış fatura eklendi', 'Satış Faturası İşlemleri', '2021-06-14 06:20:22', '2021-06-14 06:20:22'),
(29, 'Üretim girişi eklendi', 'Üretim Giriş İşlemleri', '2021-06-14 06:24:49', '2021-06-14 06:24:49'),
(30, 'Üretim girişi eklendi', 'Üretim Giriş İşlemleri', '2021-06-14 06:24:49', '2021-06-14 06:24:49'),
(31, 'Üretim girişi eklendi', 'Üretim Giriş İşlemleri', '2021-06-14 06:24:49', '2021-06-14 06:24:49'),
(32, 'İSE-0001 Düzenlendi', 'Üretim Giriş İşlemleri', '2021-06-14 06:25:08', '2021-06-14 06:25:08'),
(33, 'Ürün ağacı eklendi', 'Ürün Ağacı İşlemleri', '2021-06-14 06:27:21', '2021-06-14 06:27:21'),
(34, 'Ürün ağacı eklendi', 'Ürün Ağacı İşlemleri', '2021-06-14 06:27:21', '2021-06-14 06:27:21'),
(35, 'Ürün ağacı eklendi', 'Ürün Ağacı İşlemleri', '2021-06-14 06:27:21', '2021-06-14 06:27:21'),
(36, 'Ürün ağacı eklendi', 'Ürün Ağacı İşlemleri', '2021-06-14 06:27:21', '2021-06-14 06:27:21'),
(37, '# Silindi', 'Satış Sipariş İşlemleri', '2021-06-14 06:30:35', '2021-06-14 06:30:35'),
(38, 'Satış siparişi eklendi', 'Satış Siparşi İşlemleri', '2021-06-14 06:31:19', '2021-06-14 06:31:19'),
(39, 'Satış teklifi eklendi', 'Satış Teklif İşlemleri', '2021-06-14 06:32:59', '2021-06-14 06:32:59'),
(40, 'Ürün rotası eklendi', 'Ürün Rota İşlemleri', '2021-06-14 07:42:43', '2021-06-14 07:42:43'),
(41, 'Üretim girişi eklendi', 'Üretim Giriş İşlemleri', '2021-06-14 08:51:49', '2021-06-14 08:51:49'),
(42, 'Üretim girişi eklendi', 'Üretim Giriş İşlemleri', '2021-06-14 08:51:49', '2021-06-14 08:51:49'),
(43, 'Üretim girişi eklendi', 'Üretim Giriş İşlemleri', '2021-06-14 08:51:49', '2021-06-14 08:51:49'),
(44, 'İSE-0001 Düzenlendi', 'Üretim Giriş İşlemleri', '2021-06-14 08:52:08', '2021-06-14 08:52:08'),
(45, 'Üretim girişi eklendi', 'Üretim Giriş İşlemleri', '2021-08-20 06:34:55', '2021-08-20 06:34:55'),
(46, 'Üretim girişi eklendi', 'Üretim Giriş İşlemleri', '2021-08-20 06:34:55', '2021-08-20 06:34:55'),
(47, 'Üretim girişi eklendi', 'Üretim Giriş İşlemleri', '2021-08-20 06:34:55', '2021-08-20 06:34:55');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_03_093036_create_caris_table', 2),
(5, '2021_04_03_102106_create_hesap_kods_table', 3),
(6, '2021_04_04_081819_create_bankas_table', 4),
(7, '2021_04_06_065438_create_kasas_table', 5),
(8, '2021_04_06_155837_create_fis_tips_table', 6),
(9, '2021_04_06_160754_create_fis_tips_tables', 7),
(10, '2021_04_06_160904_create_fis_tips_table', 8),
(11, '2021_04_06_172909_create_islem_tips_table', 9),
(12, '2021_04_06_193328_create_muhasebe_fis_table', 10),
(13, '2021_04_11_063923_create_muhasebe_fis_islems_table', 11),
(14, '2021_04_17_090801_create_finans_fis_table', 12),
(15, '2021_04_17_090831_create_finans_fis_islems_table', 12),
(16, '2021_04_17_134535_create_stok_karts_table', 13),
(17, '2021_04_17_141144_create_stok_karts_table', 14),
(18, '2021_04_17_143851_create_depos_table', 15),
(19, '2021_04_22_082158_create_satis_siparis_table', 16),
(20, '2021_04_22_083553_create_satis_siparis_islems_table', 16),
(21, '2021_04_23_095049_create_satis_teklifs_table', 17),
(22, '2021_04_23_095110_create_satis_teklif_islems_table', 17),
(23, '2021_05_23_132608_create_satinalmas_table', 18),
(24, '2021_05_23_132629_create_satinalma_islems_table', 18),
(25, '2021_05_23_132644_create_satinalma_teklifs_table', 18),
(26, '2021_05_23_132656_create_satinalma_teklif_islems_table', 18),
(27, '2021_05_23_155024_create_stok_harekets_table', 19),
(28, '2021_05_30_075714_create_satinalma_faturas_table', 20),
(29, '2021_05_30_075820_create_satinalma_fatura_islems_table', 20),
(30, '2021_05_30_075853_create_satis_faturas_table', 20),
(31, '2021_05_30_075906_create_satis_fatura_islems_table', 20),
(32, '2021_06_08_091725_create_operasyons_table', 21),
(33, '2021_06_08_153242_create_ismerkezis_table', 22),
(34, '2021_06_08_154543_create_ismerkezi_operasyons_table', 22),
(35, '2021_06_08_154820_create_ismerkezi_istasyons_table', 22),
(36, '2021_06_09_090232_create_isistasyons_table', 23),
(37, '2021_06_09_090326_create_isistasyon_operasyons_table', 23),
(38, '2021_06_10_065415_create_urunagacis_table', 24),
(39, '2021_06_10_065439_create_urunagaci_malzemes_table', 24),
(40, '2021_06_10_085252_create_rota_tips_table', 25),
(41, '2021_06_10_091433_create_urunrotas_table', 26),
(42, '2021_06_10_091449_create_urunrota_islems_table', 26),
(43, '2021_06_11_045528_create_isemris_table', 27),
(44, '2021_06_12_082340_create_uretim_giris_table', 28),
(45, '2021_06_12_082441_create_uretim_giris_malzemes_table', 28),
(46, '2021_06_12_085510_create_uretimgiris_rotaas_table', 28),
(47, '2021_06_13_192209_create_loggers_table', 29);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `muhasebe_fis`
--

CREATE TABLE `muhasebe_fis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `miFisNo` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `miFirmaId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `miFisTipKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `miFisTarih` date NOT NULL,
  `miAciklama` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `muhasebe_fis`
--

INSERT INTO `muhasebe_fis` (`id`, `miFisNo`, `miFirmaId`, `miFisTipKod`, `miFisTarih`, `miAciklama`, `created_at`, `updated_at`) VALUES
(23, 'MFİS-0001', '1', 'Açılış', '2021-01-01', 'Murat Kondu firması açılış kaydı.', '2021-06-13 11:56:31', '2021-06-13 11:56:31'),
(24, 'MFİS-0002', '1', 'Yansıtma', '2021-06-14', 'Finansman giderleri yansıtma', '2021-06-14 06:08:38', '2021-06-14 06:08:38');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `muhasebe_fis_islems`
--

CREATE TABLE `muhasebe_fis_islems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `miFisId` int(11) NOT NULL,
  `miIslemTipKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `miIslemTipAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `miMHK` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `miMHA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `miBA` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `miTutar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `miBorc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `miAlacak` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `miFark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `muhasebe_fis_islems`
--

INSERT INTO `muhasebe_fis_islems` (`id`, `miFisId`, `miIslemTipKod`, `miIslemTipAd`, `miMHK`, `miMHA`, `miBA`, `miTutar`, `miBorc`, `miAlacak`, `miFark`, `created_at`, `updated_at`) VALUES
(42, 23, '10', '10', '100.01.01.0001', 'Merkez TL KASA', 'Alacak', '500000', NULL, NULL, NULL, '2021-06-13 11:56:31', '2021-06-13 11:56:31'),
(43, 23, '11', '11', '100.01.01.0001', 'Merkez TL KASA', 'Borç', '500000', NULL, NULL, NULL, '2021-06-13 11:56:31', '2021-06-13 11:56:31'),
(44, 23, '5', '5', '102.01.01.1001', 'Akbank XXXnolu Hesap', 'Alacak', '250000', NULL, NULL, NULL, '2021-06-13 11:56:31', '2021-06-13 11:56:31'),
(45, 23, '6', '6', '102.01.01.1001', 'Akbank XXXnolu Hesap', 'Borç', '250000', NULL, NULL, NULL, '2021-06-13 11:56:31', '2021-06-13 11:56:31'),
(46, 24, '4', '4', '780', 'FINANSMAN GIDERLERI', 'Alacak', '20000', NULL, NULL, NULL, '2021-06-14 06:08:38', '2021-06-14 06:08:38'),
(47, 24, '7', '7', '781', 'FINANSMAN GIDERLERI YANSITMA HESABI', 'Borç', '200000', NULL, NULL, NULL, '2021-06-14 06:08:38', '2021-06-14 06:08:38');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `operasyons`
--

CREATE TABLE `operasyons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `operasyonFirmaId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operasyonKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operasyonAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `operasyons`
--

INSERT INTO `operasyons` (`id`, `operasyonFirmaId`, `operasyonKod`, `operasyonAd`, `created_at`, `updated_at`) VALUES
(1, '1', 'OP-1', 'BOYAMA OPERASYONU', '2021-06-08 06:26:43', '2021-06-08 06:31:02'),
(2, '1', 'OP-2', 'MONTAJ OPERASYONU', '2021-06-08 06:30:54', '2021-06-08 06:30:54'),
(4, '1', 'OP-3', 'KESME OPERASYONU', '2021-06-13 13:59:17', '2021-06-13 13:59:17'),
(5, '1', 'OP-4', '10 NUMARALI OPERASYON', '2021-06-13 13:59:46', '2021-06-13 13:59:46'),
(6, '1', 'OP-5', '20NUMARALI OPERASYON', '2021-06-13 14:00:00', '2021-06-13 14:00:00'),
(7, '1', 'OP-6', '30 NUMARALI OPERASYON', '2021-06-13 14:00:12', '2021-06-13 14:00:12');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rota_tips`
--

CREATE TABLE `rota_tips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rotatipFirmaId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rotatipKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rotatipAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rotatipAciklama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `rota_tips`
--

INSERT INTO `rota_tips` (`id`, `rotatipFirmaId`, `rotatipKod`, `rotatipAd`, `rotatipAciklama`, `created_at`, `updated_at`) VALUES
(1, '1', 'ROTA-1', 'KESME ROTASI', 'Kesme rota tanımı güncelleme', '2021-06-10 05:59:12', '2021-06-10 06:05:06'),
(2, '1', 'ROTA-2', 'MONTAJ ROTASI', 'Montaj rota tanımı', '2021-06-10 05:59:46', '2021-06-10 05:59:46'),
(3, '1', 'ROTA-3', 'BOYAMA ROTASI', 'BOYAMA', '2021-06-11 14:14:32', '2021-06-13 14:00:52'),
(5, '1', 'ROTA-4', '10 NUMARALI ROTA', '10 NUMARALI ROTA', '2021-06-13 14:01:17', '2021-06-13 14:01:17'),
(6, '1', 'ROTA-5', '20 NUMARALI ROTA', '20 NUMARALI ROTA', '2021-06-13 14:01:31', '2021-06-13 14:01:31'),
(7, '1', 'ROTA-6', '30 NUMARALI ROTA', '30 NUMARALI ROTA', '2021-06-13 14:01:43', '2021-06-13 14:01:43');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satinalmas`
--

CREATE TABLE `satinalmas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `satinalmaSiparisFirmaId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmaSiparisTarih` date NOT NULL,
  `satinalmaSiparisBelgeNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmaSiparisHareketKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmaSiparisCariId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmaSiparisAciklama` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `satinalmas`
--

INSERT INTO `satinalmas` (`id`, `satinalmaSiparisFirmaId`, `satinalmaSiparisTarih`, `satinalmaSiparisBelgeNo`, `satinalmaSiparisHareketKod`, `satinalmaSiparisCariId`, `satinalmaSiparisAciklama`, `created_at`, `updated_at`) VALUES
(11, '1', '2021-06-13', 'STA-0001', 'Satınalma Siparişi', '20', 'Yay satınalma siparişi', '2021-06-13 15:32:53', '2021-06-13 15:32:53');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satinalma_faturas`
--

CREATE TABLE `satinalma_faturas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `satinalmafaturaFirmaId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmafaturaBelgeTarih` date NOT NULL,
  `satinalmafaturaBelgeNumara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmafaturaHesapKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmafaturaHesapAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmafaturaAciklama` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `satinalma_faturas`
--

INSERT INTO `satinalma_faturas` (`id`, `satinalmafaturaFirmaId`, `satinalmafaturaBelgeTarih`, `satinalmafaturaBelgeNumara`, `satinalmafaturaHesapKod`, `satinalmafaturaHesapAd`, `satinalmafaturaAciklama`, `created_at`, `updated_at`) VALUES
(14, '1', '2021-06-13', 'STA-0001', '120.01.35.0001', 'KARDEŞLER BİLARDO VE LANGIRT AŞ', 'Yay satınalma siparişi\'e ait satınalma faturasıdır.', '2021-06-13 15:32:59', '2021-06-13 15:32:59');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satinalma_fatura_islems`
--

CREATE TABLE `satinalma_fatura_islems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `satinalmafaturaId` int(11) NOT NULL,
  `satinalmaDepoKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmafaturaDepoAd` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmaMuhasebeKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmaMuhasebeAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmaBirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmaMiktar` int(50) NOT NULL,
  `satinalmaBirimFiyat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmaToplamTutar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `satinalma_fatura_islems`
--

INSERT INTO `satinalma_fatura_islems` (`id`, `satinalmafaturaId`, `satinalmaDepoKod`, `satinalmafaturaDepoAd`, `satinalmaMuhasebeKod`, `satinalmaMuhasebeAd`, `satinalmaBirim`, `satinalmaMiktar`, `satinalmaBirimFiyat`, `satinalmaToplamTutar`, `created_at`, `updated_at`) VALUES
(17, 14, 'AHD01', 'HAMMADDE DEPO', 'BHM05', 'YAY', 'Adet', 100, '10', '1000.00', '2021-06-13 15:32:59', '2021-06-13 15:32:59');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satinalma_islems`
--

CREATE TABLE `satinalma_islems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `satinalmaSiparisId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmaSiparisTip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmaSiparisDepoId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmaSiparisStokId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmaSiparisStokAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmaSiparisBirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmaSiparisMiktar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmaSiparisBirimFiyat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmaSiparisToplamTutar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `satinalma_islems`
--

INSERT INTO `satinalma_islems` (`id`, `satinalmaSiparisId`, `satinalmaSiparisTip`, `satinalmaSiparisDepoId`, `satinalmaSiparisStokId`, `satinalmaSiparisStokAd`, `satinalmaSiparisBirim`, `satinalmaSiparisMiktar`, `satinalmaSiparisBirimFiyat`, `satinalmaSiparisToplamTutar`, `created_at`, `updated_at`) VALUES
(17, '11', 'Stok', '1', '27', '27', 'Adet', '100', '10', '1000.00', '2021-06-13 15:32:53', '2021-06-13 15:32:53');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satinalma_teklifs`
--

CREATE TABLE `satinalma_teklifs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `satinalmaTeklifFirmaId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmaTeklifTarih` date NOT NULL,
  `satinalmaTeklifBelgeNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmaTeklifHareketKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmaTeklifCariId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmaTeklifAciklama` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satinalma_teklif_islems`
--

CREATE TABLE `satinalma_teklif_islems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `satinalmaTeklifId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmaTeklifTip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmaTeklifDepoId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmaTeklifStokId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmaTeklifStokAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmaTeklifBirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmaTeklifMiktar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmaTeklifBirimFiyat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satinalmaTeklifToplamTutar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satis_faturas`
--

CREATE TABLE `satis_faturas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `satisfaturaFirmaId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisfaturaBelgeTarih` date NOT NULL,
  `satisfaturaBelgeNumara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisfaturaHesapKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisfaturaHesapAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisfaturaAciklama` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `satis_faturas`
--

INSERT INTO `satis_faturas` (`id`, `satisfaturaFirmaId`, `satisfaturaBelgeTarih`, `satisfaturaBelgeNumara`, `satisfaturaHesapKod`, `satisfaturaHesapAd`, `satisfaturaAciklama`, `created_at`, `updated_at`) VALUES
(9, '1', '2021-06-13', 'STS-0001', '120.01.35.0004', 'FIRFIR LANGIRTÇILIK AŞ', 'Langırt masası 30 satış siparişi\'e ait satış faturası kaydıdır.', '2021-06-13 15:32:08', '2021-06-13 15:32:08'),
(10, '1', '2021-06-13', 'STS-0002', '320.01.35.0011', 'SERT PLASTİK AŞ', 'Sert plastik satış siparişi\'e ait satış faturası kaydıdır.', '2021-06-13 17:28:13', '2021-06-13 17:28:13'),
(11, '1', '2021-06-14', 'STS0001', '320.01.35.0009', 'SAĞLAM MARANGOZ AŞ', 'Örnek satış\'e ait satış faturası kaydıdır.', '2021-06-14 06:20:22', '2021-06-14 06:20:22');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satis_fatura_islems`
--

CREATE TABLE `satis_fatura_islems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `satisfaturaId` int(11) NOT NULL,
  `satisDepoKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisfaturaDepoAd` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisMuhasebeKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisMuhasebeAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisBirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisMiktar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisBirimFiyat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisToplamTutar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `satis_fatura_islems`
--

INSERT INTO `satis_fatura_islems` (`id`, `satisfaturaId`, `satisDepoKod`, `satisfaturaDepoAd`, `satisMuhasebeKod`, `satisMuhasebeAd`, `satisBirim`, `satisMiktar`, `satisBirimFiyat`, `satisToplamTutar`, `created_at`, `updated_at`) VALUES
(13, 9, 'ATD01', 'TİCARİ DEPO', 'BMA30', 'LANGIRT MASASI 30', 'Adet', '1', '5000', '5000.00', '2021-06-13 15:32:08', '2021-06-13 15:32:08'),
(14, 10, 'AHD01', 'HAMMADDE DEPO', 'BHM03', 'PLASTİK ADAM', 'Adet', '250', '10', '2500.00', '2021-06-13 17:28:14', '2021-06-13 17:28:14'),
(15, 11, 'AHD01', 'HAMMADDE DEPO', 'BHM08', 'KOL SAPI', 'Adet', '5', '1000', '5000.00', '2021-06-14 06:20:22', '2021-06-14 06:20:22');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satis_siparis`
--

CREATE TABLE `satis_siparis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `satisSiparisFirmaId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisSiparisTarih` date NOT NULL,
  `satisSiparisBelgeNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisSiparisHareketKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisSiparisCariId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisSiparisAciklama` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `satis_siparis`
--

INSERT INTO `satis_siparis` (`id`, `satisSiparisFirmaId`, `satisSiparisTarih`, `satisSiparisBelgeNo`, `satisSiparisHareketKod`, `satisSiparisCariId`, `satisSiparisAciklama`, `created_at`, `updated_at`) VALUES
(15, '1', '2021-06-13', 'STS-0001', 'Satış Siparişi', '23', 'Langırt masası 30 satış siparişi', '2021-06-13 14:38:07', '2021-06-13 17:28:33'),
(16, '1', '2021-06-17', 'STS-0002', 'Satış Siparişi', '18', 'Sert plastik satış siparişi', '2021-06-13 17:28:03', '2021-06-13 17:28:03'),
(17, '1', '2021-06-14', 'STS0001', 'Satış Siparişi', '16', 'Örnek satış', '2021-06-14 06:19:56', '2021-06-14 06:19:56'),
(19, '1', '2021-06-14', 'STS-0003', 'Satış Siparişi', '21', 'Langırt masası satış siparişi', '2021-06-14 06:31:19', '2021-06-14 06:31:19'),
(20, '1', '2022-01-13', 'STSTKLF-0001', '0', '18', 'Sert plastik\'ten plastik koruyucu satma teklifi', '2022-01-13 13:55:42', '2022-01-13 13:55:42');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satis_siparis_islems`
--

CREATE TABLE `satis_siparis_islems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `satisSiparisId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisSiparisTip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisSiparisDepoId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisSiparisStokId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisSiparisStokAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisSiparisBirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisSiparisMiktar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisSiparisBirimFiyat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisSiparisToplamTutar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `satis_siparis_islems`
--

INSERT INTO `satis_siparis_islems` (`id`, `satisSiparisId`, `satisSiparisTip`, `satisSiparisDepoId`, `satisSiparisStokId`, `satisSiparisStokAd`, `satisSiparisBirim`, `satisSiparisMiktar`, `satisSiparisBirimFiyat`, `satisSiparisToplamTutar`, `created_at`, `updated_at`) VALUES
(34, '13', 'Stok', '5', '2', '2', 'Adet', '5', '2500', '12500.00', '2021-05-23 13:49:37', '2021-05-23 13:49:37'),
(35, '13', 'Hizmet', '4', '2', '2', 'Adet', '15', '1500', '22500.00', '2021-05-23 13:49:37', '2021-05-23 13:49:37'),
(36, '13', 'Hizmet', '3', '2', '2', 'Adet', '3', '2450', '7350.00', '2021-05-23 13:49:37', '2021-05-23 13:49:37'),
(42, '16', 'Stok', '1', '25', '25', 'Adet', '250', '10', '2500.00', '2021-06-13 17:28:03', '2021-06-13 17:28:03'),
(43, '15', 'Stok', '3', '34', '34', 'Adet', '1', '5000', '5000.00', '2021-06-13 17:28:33', '2021-06-13 17:28:33'),
(44, '17', 'Stok', '1', '30', '30', 'Adet', '5', '1000', '5000.00', '2021-06-14 06:19:56', '2021-06-14 06:19:56'),
(46, '19', 'Stok', '2', '34', '34', 'Adet', '7', '5000', '35000.00', '2021-06-14 06:31:19', '2021-06-14 06:31:19'),
(47, '20', 'Stok', '1', '26', '26', 'Adet', '10', '50', '500.00', '2022-01-13 13:55:42', '2022-01-13 13:55:42');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satis_teklifs`
--

CREATE TABLE `satis_teklifs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `satisTeklifFirmaId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisTeklifTarih` date NOT NULL,
  `satisTeklifBelgeNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisTeklifHareketKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisTeklifCariId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisTeklifAciklama` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satis_teklif_islems`
--

CREATE TABLE `satis_teklif_islems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `satisTeklifId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisTeklifTip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisTeklifDepoId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisTeklifStokId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisTeklifStokAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisTeklifBirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisTeklifMiktar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisTeklifBirimFiyat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisTeklifToplamTutar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stok_harekets`
--

CREATE TABLE `stok_harekets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stokHareketId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stokHareketTip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stokHareketDepo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stokHareketAd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stokHareketBirim` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stokHareketMiktar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stokHareketBirimFiyat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stokHareketToplamTutar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stokHareketDurum` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `stok_harekets`
--

INSERT INTO `stok_harekets` (`id`, `stokHareketId`, `stokHareketTip`, `stokHareketDepo`, `stokHareketAd`, `stokHareketBirim`, `stokHareketMiktar`, `stokHareketBirimFiyat`, `stokHareketToplamTutar`, `stokHareketDurum`, `created_at`, `updated_at`) VALUES
(9, '11', 'Stok', '1', '27', 'Adet', '100', '10', '1000.00', 'Girdi', '2021-06-13 15:32:53', '2021-06-13 15:32:53'),
(10, '16', 'Stok', '1', '25', 'Adet', '250', '10', '2500.00', 'Çıktı', '2021-06-13 17:28:03', '2021-06-13 17:28:03'),
(11, '17', 'Stok', '1', '30', 'Adet', '5', '1000', '5000.00', 'Çıktı', '2021-06-14 06:19:56', '2021-06-14 06:19:56'),
(12, '19', 'Stok', '2', '34', 'Adet', '7', '5000', '35000.00', 'Çıktı', '2021-06-14 06:31:19', '2021-06-14 06:31:19');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stok_karts`
--

CREATE TABLE `stok_karts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stokKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stokAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stokBirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stokFirmaId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stokDepoId` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stokMHK` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stokMHA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stokTipKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `stok_karts`
--

INSERT INTO `stok_karts` (`id`, `stokKod`, `stokAd`, `stokBirim`, `stokFirmaId`, `stokDepoId`, `stokMHK`, `stokMHA`, `stokTipKod`, `created_at`, `updated_at`) VALUES
(13, 'ATM01', 'İSTANBUL SİMİDİ', 'Adet', '1', '3', '153', 'TICARI MALLAR', 'Ticari Mamül', '2021-06-13 13:34:53', '2021-06-13 16:39:06'),
(14, 'ATM02', 'ANKARA SİMİDİ', 'Adet', '1', 'TİCARİ DEPO', '153', 'TICARI MALLAR', 'Ticari Mamül', '2021-06-13 13:36:17', '2021-06-13 13:36:17'),
(15, 'ATM03', 'FINDIK', 'Kilogram', '1', 'TİCARİ DEPO', '153', 'TICARI MALLAR', 'Ticari Mamül', '2021-06-13 13:36:46', '2021-06-13 13:36:46'),
(16, 'ATM04', 'FISTIK', 'Kilogram', '1', 'TİCARİ DEPO', '153', 'TICARI MALLAR', 'Ticari Mamül', '2021-06-13 13:37:09', '2021-06-13 13:37:09'),
(17, 'ATM05', 'ÜÇGEN PEYNİR', 'Adet', '1', 'TİCARİ DEPO', '153', 'TICARI MALLAR', 'Ticari Mamül', '2021-06-13 13:37:35', '2021-06-13 13:37:35'),
(18, 'ATM06', 'GEMLİK SİYAH ZEYTİN', 'Kilogram', '1', 'TİCARİ DEPO', '153', 'TICARI MALLAR', 'Ticari Mamül', '2021-06-13 13:38:05', '2021-06-13 13:38:05'),
(19, 'ATM07', 'SELE SİYAH ZEYTİN', 'Kilogram', '1', 'TİCARİ DEPO', '153', 'TICARI MALLAR', 'Ticari Mamül', '2021-06-13 13:38:24', '2021-06-13 13:38:24'),
(20, 'ATM08', 'ÇİZME SİYAH ZEYTİN', 'Kilogram', '1', 'TİCARİ DEPO', '153', 'TICARI MALLAR', 'Ticari Mamül', '2021-06-13 13:38:47', '2021-06-13 13:38:47'),
(21, 'ATM09', 'SALKIM DOMATES', 'Kilogram', '1', 'TİCARİ DEPO', '153', 'TICARI MALLAR', 'Ticari Mamül', '2021-06-13 13:39:12', '2021-06-13 13:39:12'),
(22, 'ATM10', 'CHERRY DOMATES', 'Kilogram', '1', 'TİCARİ DEPO', '153', 'TICARI MALLAR', 'Ticari Mamül', '2021-06-13 13:39:33', '2021-06-13 13:39:33'),
(23, 'BHM01', 'LANGIRT AHŞAP KASA', 'Adet', '1', 'HAMMADDE DEPO', '150', 'ILK MADDE VE MALZEME', 'Hammadde', '2021-06-13 13:40:43', '2021-06-13 13:40:43'),
(24, 'BHM02', 'DEMİR ÇUBUK', 'Adet', '1', 'HAMMADDE DEPO', '150', 'ILK MADDE VE MALZEME', 'Hammadde', '2021-06-13 13:41:07', '2021-06-13 13:41:07'),
(25, 'BHM03', 'PLASTİK ADAM', 'Adet', '1', 'HAMMADDE DEPO', '150', 'ILK MADDE VE MALZEME', 'Hammadde', '2021-06-13 13:41:30', '2021-06-13 13:41:30'),
(26, 'BHM04', 'PLASTİK KORUYUCU', 'Adet', '1', 'HAMMADDE DEPO', '150', 'ILK MADDE VE MALZEME', 'Hammadde', '2021-06-13 13:41:59', '2021-06-13 13:41:59'),
(27, 'BHM05', 'YAY', 'Adet', '1', 'HAMMADDE DEPO', '150', 'ILK MADDE VE MALZEME', 'Hammadde', '2021-06-13 13:42:18', '2021-06-13 13:42:18'),
(28, 'BHM06', 'KORUYUCU CAM', 'Adet', '1', 'HAMMADDE DEPO', '150', 'ILK MADDE VE MALZEME', 'Hammadde', '2021-06-13 13:42:38', '2021-06-13 13:42:38'),
(29, 'BHM07', 'LANGIRT TOPU', 'Adet', '1', 'HAMMADDE DEPO', '150', 'ILK MADDE VE MALZEME', 'Hammadde', '2021-06-13 13:42:57', '2021-06-13 13:42:57'),
(30, 'BHM08', 'KOL SAPI', 'Adet', '1', 'HAMMADDE DEPO', '150', 'ILK MADDE VE MALZEME', 'Hammadde', '2021-06-13 13:43:16', '2021-06-13 13:43:16'),
(31, 'BHM09', 'İÇ SAHA ZEMİNİ', 'Adet', '1', 'HAMMADDE DEPO', '150', 'ILK MADDE VE MALZEME', 'Hammadde', '2021-06-13 13:43:34', '2021-06-13 13:43:34'),
(32, 'BYM10', 'LANGIRT MASASI 10', 'Adet', '1', 'ÜRETİM DEPO', '151', 'YARI MAMULLER - URETIM', 'Yarı Mamül', '2021-06-13 13:44:09', '2021-06-13 13:44:09'),
(33, 'BYM20', 'KOL SAP TAKIMI 20', 'Adet', '1', 'ÜRETİM DEPO', '151', 'YARI MAMULLER - URETIM', 'Yarı Mamül', '2021-06-13 13:44:33', '2021-06-13 13:44:33'),
(34, 'BMA30', 'LANGIRT MASASI 30', 'Adet', '1', 'MAMÜL DEPO', '152', 'MAMULLER', 'Mamül', '2021-06-13 13:45:00', '2021-06-13 13:45:00'),
(35, 'BTM30', 'AL-SAT LANGIRT', 'Adet', '1', 'TİCARİ DEPO', '153', 'TICARI MALLAR', 'Ticari Mamül', '2021-06-13 13:45:38', '2021-06-13 13:45:38');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uretimgiris_rotaas`
--

CREATE TABLE `uretimgiris_rotaas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uretimgirisId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uretimrotaIsistasyonKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uretimrotaOperasyonKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `uretimgiris_rotaas`
--

INSERT INTO `uretimgiris_rotaas` (`id`, `uretimgirisId`, `uretimrotaIsistasyonKod`, `uretimrotaOperasyonKod`, `created_at`, `updated_at`) VALUES
(16, '10', 'Buca İş İstasyonu', '10 NUMARALI OPERASYON', '2021-06-14 06:25:08', '2021-06-14 06:25:08'),
(18, '11', 'Buca İş İstasyonu', '10 NUMARALI OPERASYON', '2021-06-14 08:52:08', '2021-06-14 08:52:08'),
(19, '12', 'Buca İş İstasyonu', '10 NUMARALI OPERASYON', '2021-08-20 06:34:55', '2021-08-20 06:34:55');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uretim_giris`
--

CREATE TABLE `uretim_giris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uretimgirisFirmaKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uretimgirisIsEmriKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uretimgirisStokKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uretimgirisBaslangıcTarih` date DEFAULT NULL,
  `uretimgirisBitisTarih` date DEFAULT NULL,
  `uretimgirisBaslangicSaat` time DEFAULT NULL,
  `uretimgirisBitisSaat` time DEFAULT NULL,
  `uretimgirisMiktar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uretimgirisBirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uretimgirisDepoKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `uretim_giris`
--

INSERT INTO `uretim_giris` (`id`, `uretimgirisFirmaKod`, `uretimgirisIsEmriKod`, `uretimgirisStokKod`, `uretimgirisBaslangıcTarih`, `uretimgirisBitisTarih`, `uretimgirisBaslangicSaat`, `uretimgirisBitisSaat`, `uretimgirisMiktar`, `uretimgirisBirim`, `uretimgirisDepoKod`, `created_at`, `updated_at`) VALUES
(10, '1', 'İSE-0001', 'BYM10', '2021-06-14', '2021-06-14', '09:30:00', '10:00:00', '1', 'Adet', 'ÜRETİM DEPO', '2021-06-14 06:24:49', '2021-06-14 06:25:08'),
(11, '1', 'İSE-0001', 'BYM10', '2021-06-14', '2021-06-14', '12:00:00', '12:00:00', '1', 'Adet', 'ÜRETİM DEPO', '2021-06-14 08:51:49', '2021-06-14 08:52:08'),
(12, '1', 'İSE-0001', 'BYM10', NULL, NULL, NULL, NULL, '1', 'Adet', 'ÜRETİM DEPO', '2021-08-20 06:34:55', '2021-08-20 06:34:55');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uretim_giris_malzemes`
--

CREATE TABLE `uretim_giris_malzemes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uretimgirisId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uretimmalzemeSatırTip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uretimmalzemeStokKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uretimmalzemeStokAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uretimmalzemeOperasyon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uretimmalzemeBirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uretimmalzemeMiktar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `uretim_giris_malzemes`
--

INSERT INTO `uretim_giris_malzemes` (`id`, `uretimgirisId`, `uretimmalzemeSatırTip`, `uretimmalzemeStokKod`, `uretimmalzemeStokAd`, `uretimmalzemeOperasyon`, `uretimmalzemeBirim`, `uretimmalzemeMiktar`, `created_at`, `updated_at`) VALUES
(31, '10', 'Hammadde', 'LANGIRT AHŞAP KASA', 'BHM01', '10 NUMARALI OPERASYON', 'Adet', '1', '2021-06-14 06:25:08', '2021-06-14 06:25:08'),
(32, '10', 'Hammadde', 'İÇ SAHA ZEMİNİ', 'BHM09', '10 NUMARALI OPERASYON', 'Adet', '1', '2021-06-14 06:25:08', '2021-06-14 06:25:08'),
(33, '10', 'Hammadde', 'PLASTİK KORUYUCU', 'BHM04', '10 NUMARALI OPERASYON', 'Adet', '32', '2021-06-14 06:25:08', '2021-06-14 06:25:08'),
(37, '11', 'Hammadde', 'LANGIRT AHŞAP KASA', 'BHM01', '10 NUMARALI OPERASYON', 'Adet', '1', '2021-06-14 08:52:08', '2021-06-14 08:52:08'),
(38, '11', 'Hammadde', 'İÇ SAHA ZEMİNİ', 'BHM09', '10 NUMARALI OPERASYON', 'Adet', '1', '2021-06-14 08:52:08', '2021-06-14 08:52:08'),
(39, '11', 'Hammadde', 'PLASTİK KORUYUCU', 'BHM04', '10 NUMARALI OPERASYON', 'Adet', '32', '2021-06-14 08:52:08', '2021-06-14 08:52:08'),
(40, '12', 'Hammadde', 'LANGIRT AHŞAP KASA', 'BHM01', '10 NUMARALI OPERASYON', 'Adet', '1', '2021-08-20 06:34:55', '2021-08-20 06:34:55'),
(41, '12', 'Hammadde', 'İÇ SAHA ZEMİNİ', 'BHM09', '10 NUMARALI OPERASYON', 'Adet', '1', '2021-08-20 06:34:55', '2021-08-20 06:34:55'),
(42, '12', 'Hammadde', 'PLASTİK KORUYUCU', 'BHM04', '10 NUMARALI OPERASYON', 'Adet', '32', '2021-08-20 06:34:55', '2021-08-20 06:34:55');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunagacis`
--

CREATE TABLE `urunagacis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `urunagaciFirmaKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urunagaciStokKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urunagaciStokAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urunagaciStokTakipBirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urunagaciStokGirişDepoAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urunagaciAciklama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `urunagacis`
--

INSERT INTO `urunagacis` (`id`, `urunagaciFirmaKod`, `urunagaciStokKod`, `urunagaciStokAd`, `urunagaciStokTakipBirim`, `urunagaciStokGirişDepoAd`, `urunagaciAciklama`, `created_at`, `updated_at`) VALUES
(8, '1', 'BYM10', 'LANGIRT MASASI 10', 'Adet', 'ÜRETİM DEPO', 'Langırt masası 10 ürün ağacı', '2021-06-13 14:10:10', '2021-06-13 14:10:10'),
(9, '1', 'BYM20', 'KOL SAP TAKIMI 20', 'Adet', 'ÜRETİM DEPO', 'Kol sap takımı 20 üretim ağacı', '2021-06-13 14:11:44', '2021-06-13 14:11:44'),
(11, '1', 'BMA30', 'LANGIRT MASASI 30', 'Stok Takip Birim Seçiniz', 'MAMÜL DEPO', 'Langırt masası 30 üretim ağacı', '2021-06-14 06:27:21', '2021-06-14 06:27:21');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunagaci_malzemes`
--

CREATE TABLE `urunagaci_malzemes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `urunagaciId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urunagacimalzemeSatırTip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urunagacimalzemeStokKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urunagacimalzemeStokAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urunagacimalzemeOperasyonAd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urunagacimalzemeBirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urunagacimalzemeMiktar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `urunagaci_malzemes`
--

INSERT INTO `urunagaci_malzemes` (`id`, `urunagaciId`, `urunagacimalzemeSatırTip`, `urunagacimalzemeStokKod`, `urunagacimalzemeStokAd`, `urunagacimalzemeOperasyonAd`, `urunagacimalzemeBirim`, `urunagacimalzemeMiktar`, `created_at`, `updated_at`) VALUES
(27, '8', 'Hammadde', '23', '23', '5', 'Adet', '1', '2021-06-13 14:10:10', '2021-06-13 14:10:10'),
(28, '8', 'Hammadde', '31', '31', '5', 'Adet', '1', '2021-06-13 14:10:10', '2021-06-13 14:10:10'),
(29, '8', 'Hammadde', '26', '26', '5', 'Adet', '32', '2021-06-13 14:10:10', '2021-06-13 14:10:10'),
(30, '9', 'Hammadde', '24', '24', '6', 'Adet', '8', '2021-06-13 14:11:44', '2021-06-13 14:11:44'),
(31, '9', 'Hammadde', '27', '27', '6', 'Adet', '8', '2021-06-13 14:11:44', '2021-06-13 14:11:44'),
(32, '9', 'Hammadde', '25', '25', '6', 'Adet', '22', '2021-06-13 14:11:44', '2021-06-13 14:11:44'),
(33, '9', 'Hammadde', '30', '30', '6', 'Adet', '8', '2021-06-13 14:11:44', '2021-06-13 14:11:44'),
(38, '11', 'Yarı Mamül', '32', '32', '7', 'Adet', '1', '2021-06-14 06:27:21', '2021-06-14 06:27:21'),
(39, '11', 'Yarı Mamül', '33', '33', '7', 'Adet', '1', '2021-06-14 06:27:21', '2021-06-14 06:27:21'),
(40, '11', 'Hammadde', '28', '28', '7', 'Adet', '1', '2021-06-14 06:27:21', '2021-06-14 06:27:21'),
(41, '11', 'Hammadde', '29', '29', '7', 'Adet', '20', '2021-06-14 06:27:21', '2021-06-14 06:27:21');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunrotas`
--

CREATE TABLE `urunrotas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `urunrotaFirmaKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urunrotaRotaTip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urunrotaStokKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urunrotaAciklama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `urunrotas`
--

INSERT INTO `urunrotas` (`id`, `urunrotaFirmaKod`, `urunrotaRotaTip`, `urunrotaStokKod`, `urunrotaAciklama`, `created_at`, `updated_at`) VALUES
(9, '1', '10 NUMARALI ROTA', 'BYM10', 'Langırt masası 10 ürün rotası', '2021-06-13 14:33:47', '2021-06-13 14:33:47'),
(10, '1', '20 NUMARALI ROTA', 'BYM20', 'Kol sapı takımı 20 ürün rotası', '2021-06-13 14:34:08', '2021-06-13 14:34:08'),
(12, '1', '30 NUMARALI ROTA', 'BMA30', 'Langırt 30 için ürün rotası', '2021-06-14 07:42:43', '2021-06-14 07:42:43');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunrota_islems`
--

CREATE TABLE `urunrota_islems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `urunrotaId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urunrotaOperasyonKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urunrotaIsmerkezKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urunrotaIsistasyonKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `urunrota_islems`
--

INSERT INTO `urunrota_islems` (`id`, `urunrotaId`, `urunrotaOperasyonKod`, `urunrotaIsmerkezKod`, `urunrotaIsistasyonKod`, `created_at`, `updated_at`) VALUES
(9, '9', 'OP-4', 'ISM-04', 'İST-003', '2021-06-13 14:33:47', '2021-06-13 14:33:47'),
(10, '10', 'OP-5', 'ISM-04', 'İST-003', '2021-06-13 14:34:08', '2021-06-13 14:34:08'),
(12, '12', 'OP-6', 'ISM-04', 'İST-003', '2021-06-14 07:42:43', '2021-06-14 07:42:43');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Murat KONDU', 'murat.kondu.wp@hotmail.com', NULL, '$2y$10$w9JfaOBb7hpnyEG1Sxv38e/U1YdWm4Hbn0K9fRSIU4cE0hC1icuF.', 'quNxADctNZ2N6EgItrjbbQ06FR4grSeaCgXBZsSKqJUoNHlI04hTDDRnJiy0', '2021-03-30 15:31:41', '2021-03-30 15:31:41'),
(4, 'Murat Kondu Buca İşyeri', 'lokman.ozdemirr35@gmail.com', NULL, '$2y$10$Rmvb9CqIcfvB3yiX64GZCu0aEYJOWsdW5C/TpJc90rAdXMcx6vO1O', NULL, '2021-06-14 05:46:08', '2021-06-14 05:46:08');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `bankas`
--
ALTER TABLE `bankas`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `caris`
--
ALTER TABLE `caris`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `depos`
--
ALTER TABLE `depos`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `finans_fis`
--
ALTER TABLE `finans_fis`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `finans_fis_islems`
--
ALTER TABLE `finans_fis_islems`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `fis_tips`
--
ALTER TABLE `fis_tips`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hesap_kods`
--
ALTER TABLE `hesap_kods`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `isemris`
--
ALTER TABLE `isemris`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `isistasyons`
--
ALTER TABLE `isistasyons`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `isistasyon_operasyons`
--
ALTER TABLE `isistasyon_operasyons`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `islem_tips`
--
ALTER TABLE `islem_tips`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ismerkezis`
--
ALTER TABLE `ismerkezis`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ismerkezi_istasyons`
--
ALTER TABLE `ismerkezi_istasyons`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ismerkezi_operasyons`
--
ALTER TABLE `ismerkezi_operasyons`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kasas`
--
ALTER TABLE `kasas`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `loggers`
--
ALTER TABLE `loggers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `muhasebe_fis`
--
ALTER TABLE `muhasebe_fis`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `muhasebe_fis_islems`
--
ALTER TABLE `muhasebe_fis_islems`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `operasyons`
--
ALTER TABLE `operasyons`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `rota_tips`
--
ALTER TABLE `rota_tips`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `satinalmas`
--
ALTER TABLE `satinalmas`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `satinalma_faturas`
--
ALTER TABLE `satinalma_faturas`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `satinalma_fatura_islems`
--
ALTER TABLE `satinalma_fatura_islems`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `satinalma_islems`
--
ALTER TABLE `satinalma_islems`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `satinalma_teklifs`
--
ALTER TABLE `satinalma_teklifs`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `satinalma_teklif_islems`
--
ALTER TABLE `satinalma_teklif_islems`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `satis_faturas`
--
ALTER TABLE `satis_faturas`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `satis_fatura_islems`
--
ALTER TABLE `satis_fatura_islems`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `satis_siparis`
--
ALTER TABLE `satis_siparis`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `satis_siparis_islems`
--
ALTER TABLE `satis_siparis_islems`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `satis_teklifs`
--
ALTER TABLE `satis_teklifs`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `satis_teklif_islems`
--
ALTER TABLE `satis_teklif_islems`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `stok_harekets`
--
ALTER TABLE `stok_harekets`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `stok_karts`
--
ALTER TABLE `stok_karts`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uretimgiris_rotaas`
--
ALTER TABLE `uretimgiris_rotaas`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uretim_giris`
--
ALTER TABLE `uretim_giris`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uretim_giris_malzemes`
--
ALTER TABLE `uretim_giris_malzemes`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urunagacis`
--
ALTER TABLE `urunagacis`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urunagaci_malzemes`
--
ALTER TABLE `urunagaci_malzemes`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urunrotas`
--
ALTER TABLE `urunrotas`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urunrota_islems`
--
ALTER TABLE `urunrota_islems`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `bankas`
--
ALTER TABLE `bankas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `caris`
--
ALTER TABLE `caris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `depos`
--
ALTER TABLE `depos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `finans_fis`
--
ALTER TABLE `finans_fis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `finans_fis_islems`
--
ALTER TABLE `finans_fis_islems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `fis_tips`
--
ALTER TABLE `fis_tips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `hesap_kods`
--
ALTER TABLE `hesap_kods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=327;

--
-- Tablo için AUTO_INCREMENT değeri `isemris`
--
ALTER TABLE `isemris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Tablo için AUTO_INCREMENT değeri `isistasyons`
--
ALTER TABLE `isistasyons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `isistasyon_operasyons`
--
ALTER TABLE `isistasyon_operasyons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `islem_tips`
--
ALTER TABLE `islem_tips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `ismerkezis`
--
ALTER TABLE `ismerkezis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Tablo için AUTO_INCREMENT değeri `ismerkezi_istasyons`
--
ALTER TABLE `ismerkezi_istasyons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `ismerkezi_operasyons`
--
ALTER TABLE `ismerkezi_operasyons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Tablo için AUTO_INCREMENT değeri `kasas`
--
ALTER TABLE `kasas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `loggers`
--
ALTER TABLE `loggers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Tablo için AUTO_INCREMENT değeri `muhasebe_fis`
--
ALTER TABLE `muhasebe_fis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `muhasebe_fis_islems`
--
ALTER TABLE `muhasebe_fis_islems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Tablo için AUTO_INCREMENT değeri `operasyons`
--
ALTER TABLE `operasyons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `rota_tips`
--
ALTER TABLE `rota_tips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `satinalmas`
--
ALTER TABLE `satinalmas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `satinalma_faturas`
--
ALTER TABLE `satinalma_faturas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `satinalma_fatura_islems`
--
ALTER TABLE `satinalma_fatura_islems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `satinalma_islems`
--
ALTER TABLE `satinalma_islems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `satinalma_teklifs`
--
ALTER TABLE `satinalma_teklifs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `satinalma_teklif_islems`
--
ALTER TABLE `satinalma_teklif_islems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `satis_faturas`
--
ALTER TABLE `satis_faturas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `satis_fatura_islems`
--
ALTER TABLE `satis_fatura_islems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `satis_siparis`
--
ALTER TABLE `satis_siparis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Tablo için AUTO_INCREMENT değeri `satis_siparis_islems`
--
ALTER TABLE `satis_siparis_islems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Tablo için AUTO_INCREMENT değeri `satis_teklifs`
--
ALTER TABLE `satis_teklifs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `satis_teklif_islems`
--
ALTER TABLE `satis_teklif_islems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `stok_harekets`
--
ALTER TABLE `stok_harekets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `stok_karts`
--
ALTER TABLE `stok_karts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Tablo için AUTO_INCREMENT değeri `uretimgiris_rotaas`
--
ALTER TABLE `uretimgiris_rotaas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `uretim_giris`
--
ALTER TABLE `uretim_giris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `uretim_giris_malzemes`
--
ALTER TABLE `uretim_giris_malzemes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Tablo için AUTO_INCREMENT değeri `urunagacis`
--
ALTER TABLE `urunagacis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `urunagaci_malzemes`
--
ALTER TABLE `urunagaci_malzemes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Tablo için AUTO_INCREMENT değeri `urunrotas`
--
ALTER TABLE `urunrotas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `urunrota_islems`
--
ALTER TABLE `urunrota_islems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
