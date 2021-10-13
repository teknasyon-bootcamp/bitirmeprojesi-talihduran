-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 13 Eki 2021, 21:04:17
-- Sunucu sürümü: 10.4.20-MariaDB
-- PHP Sürümü: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `teknasyon_haber`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `author`
--

CREATE TABLE `author` (
  `id` bigint(20) NOT NULL,
  `name_surname` varchar(110) NOT NULL,
  `bio` text DEFAULT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` bigint(11) NOT NULL,
  `news_id` bigint(20) NOT NULL,
  `haber` tinyint(1) NOT NULL DEFAULT 1,
  `spor` tinyint(1) NOT NULL DEFAULT 0,
  `finans` tinyint(1) NOT NULL DEFAULT 0,
  `seyahat` tinyint(1) NOT NULL DEFAULT 0,
  `oyun` tinyint(1) NOT NULL DEFAULT 0,
  `egitim` tinyint(1) NOT NULL DEFAULT 0,
  `sinema` tinyint(1) NOT NULL DEFAULT 0,
  `sanat` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) NOT NULL,
  `news_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `comments`
--

INSERT INTO `comments` (`id`, `news_id`, `user_id`, `comment`) VALUES
(1, 3, 4, 'hahdsadhhsadhsa'),
(2, 3, 2, 'fasfaslfşlkaskşlfkşlasfşlkasf');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `news`
--

CREATE TABLE `news` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `images` text NOT NULL,
  `breaking_news` tinyint(1) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `news`
--

INSERT INTO `news` (`id`, `user_id`, `title`, `content`, `images`, `breaking_news`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Araç alacaklar dikkat! \"Fiyatı 10 katı arttı\"', 'Koronavirüs salgınıyla başlayan çip krizi birçok otomotiv devinin dönem dönem ara vererek üretim durdurmasına neden olmuştu. Çin tedarik sorunu nedeniyle hala devam eden soruna ilişkin açıklama yapan Farplas Yönetim Kurulu Üyesi Ömer Burhanoğlu, çip maliyetinin 10 katı artarak 300 dolardan 3 bin dolara çıktığını belirtti.\r\n\r\nBaşta otomotiv şirketleri olmak üzere teknoloji üretimini etkileyen küresel çip tedarik sorunu maliyetlerin yükselmesine neden olmaya devam ediyor. Farplas Yönetim Kurulu Üyesi Burhanoğlu, dünyayı etkisi altına alan krizle birlikte çip maliyetinin 10 katı arttığını söyledi.\r\n\r\n\"300 DOLARDAN 3 BİN DOLARA ÇIKTI\"\r\nBloomberg HT\'ye konuşan Burhanoğlu, klasik bir araçta 1000 adet çip kullanıldığını, bunların maliyetinin de son dönemdeki çip krizi nedeniyle 300 dolardan 3 bin dolarlara geldiğini söyledi.\r\n\r\n\"ELEKTRİKLİ ARAÇTA DURUM DAHA DA VAHİM\"\r\nEektrikli araçlarda durumun daha da vahim olduğunu belirten Burhanoğlu, elektrikli araçta 3 bin çip kullanıldığı için maliyetlerin bin dolardan 10 bin dolara kadar çıktığını belirtti.\r\n\r\n\"SADECE DÜNYA DEĞİL ÜLKE PROBLEMİ\"\r\nÇip tedarik sorununun sadece küresel değil, ülkesel bir sorun olduğunu da belirten Burhanoğlu, bir ülkenin enerji sektörü gibi nasıl bağımsız olarak kendi üretimini yapıyorsa çip konusunda da kendi üretimini yaparak bağımsız hale gelmesi gerektiğini söyledi.', 'haber1.jpg', 1, 1, '2021-10-13 21:24:20', '2021-10-13 20:23:01'),
(2, 1, 'Bizim çocuklar Elit Tur\'a yükseldi!\r\n', '17 Yaş Altı Avrupa Şampiyonası Elemelerinde Danimarka\'ya penaltı atışlarında 6-5 üstünlük kuran Türkiye, Elit Tur\'a yükseldi.\r\n\r\n17 Yaş Altı Milli Futbol Takımı, Avrupa Şampiyonası Elemeleri üçüncü karşılaşmasında Danimarka\'yı normal süresi 3-3 biten maçta penaltı atışları sonucu 6-5 mağlup etti. Milliler, eleme turu grup maçlarının ardından Elit Tur oynamaya hak kazandı.\r\n\r\nTürkiye Futbol Federasyonundan yapılan açıklamaya göre, Malta\'da Hibernians Stadı\'nda oynanan maçta millilerin golleri 7. dakikada Hasan Berat Kayalı, 33. dakikada Ali Turap Bülbül ve 69. dakikada Semih Kılıçsoy\'dan gelirken Danimarka\'nın gollerini 22. dakikada Elias Hansborg-Sorensen, 37. dakikada Batuhan Sertdemir ve 45. dakikada Noah Sahsah kaydetti.\r\n\r\nElit Tur maçları 2022 yılının bahar aylarında oynanacak. Finaller, 2022 yılının mayıs ayında İsrail\'de düzenlenecek.', 'haber2.jpg', 0, 1, '2021-10-13 21:28:46', '2021-10-13 20:26:16'),
(3, 1, 'DSÖ açıkladı: Bu yılın en düşük rakamları', 'Dünya Sağlık Örgütü (DSÖ), dünyada yeni tip koronavirüs (Kovid-19) kaynaklı ölümlerde düşüşün sürdüğünü ve bu yılın en düşük can kaybı rakamlarının görüldüğünü açıkladı.\r\n\r\nDSÖ Genel Direktörü Dr. Tedros Adhanom Ghebreyesus, örgütün Cenevre\'deki merkezinde düzenlenen çevrim içi basın toplantısında, Kovid-19 salgınına ilişkin son gelişmeleri değerlendirdi.\r\n\r\nBirçok ülkenin, bu yılın sonuna kadar nüfuslarının yüzde 40\'ına Kovid-19 aşısı yaptırma hedefine ulaşamama riskinin bulunduğunu belirten Ghebreyesus, \"Aşı piyasasından fiili olarak dışlanan ve çoğu Afrika\'da bulunan 56 ülke, eylülün sonuna kadar nüfuslarının yüzde 10\'unu aşılama hedefine ulaşamadı.\" dedi.\r\n\r\nGhebreyesus, Kuzey Kore, Eritre ve Brundi\'de ise henüz aşılamaların başlamadığı bilgisini paylaştı.\r\n\r\nAşılama hedefine ulaşamayan ülkelerin büyük çoğunluğunun aşı tedarik sıkıntısı yaşadığını vurgulayan Ghebreyesus, \"Küresel aşı tedariklerini kontrol eden ülke ve firmalara, bir kez daha COVAX ve AVAT programlarına aşı yollamayı önceleme çağrısında bulunuyoruz.\" diye konuştu.\r\n\r\n\"BU YILIN EN DÜŞÜK RAKAMLARI\"\r\nGhebreyesus, dünyada Kovid-19 kaynaklı ölümlere ilişkin son gelişmeleri ise \"Haftalık Kovid-19 ölümlerindeki düşüş sürmekte ve an itibarıyla bu yılın en düşük rakamlarında seyretmektedir.\" ifadeleriyle değerlendirdi.\r\n\r\nBuna karşın dünyada haftalık Kovid-19 can kayıplarının, yaklaşık 50 binlerde ilerlemesinin kabul edilemez olduğunu vurgulayan Ghebreyesus, \"Avrupa dışındaki bölgelerde de can kayıpları azalıyor. Bazı ülkelerde ise yeni dalgalar ve can kaybı artışları gözlemleniyor.\" açıklamasında bulundu. (AA)', 'haber3.jpg', 1, 1, '2021-10-13 21:31:16', '2021-10-13 20:29:46'),
(6, 4, 'Dolar kuru rekorun 4. gününde! İşte dolar/TL kurunda son durum', 'Dört gündür üst üste rekor kıran Dolar/TL, güne yatay başlamasının ardından öğle saatlerinde 9,06 lira seviyelerine kadar çıktı. ABD\'de açıklanacak kritik enflasyon verileri ve ABD Merkez Bankası\'nın (Fed) toplantı tutanakları öncesinde dolar/TL kuru yükselişine devam ederek saat 16.20 itibarıyla 9.10 lira seviyesiyle tüm zamanların rekorunu kırdı. Tırmanışına devam eden dolar 17.30 itibarıyla da 9.10 seviyesini aştı.\r\n\r\nDün yükseliş eğiliminde hareket eden dolar/TL, günü önceki kapanışın yüzde 0,48 üzerinde 9,0427 lira seviyesinden tamamladı.\r\n\r\nDolar/TL, yeni güne yatay seyirle başlamasının ardından saat 16.20 itibarıyla önceki kapanışın yüzde 0,06 üstünde 9.10 lira seviyelerini gördü. Daha sonra tekrar düşen kur 9.09 lira seviyelerini inse de 17.30 itibarıyla 9.10 lira seviyesini aştı.\r\n\r\nREKORUN 4. GÜNÜ\r\nÜst üste 4. günde de rekor seviyelerini güncelleyen dolar/TL\'nin yeni zirvesi 9.10\'un üzerine çıktı.\r\n\r\nAnalistler, ABD Merkez Bankası\'nın (Fed) varlık alımlarının azaltılması konusunda dikkate aldığı enflasyon verisi öncesi dolar endeksinin sınırlı da olsa düşüş eğiliminde hareket ettiğini aktardı.\r\n\r\nKüresel bazda artan enflasyon endişelerinin fiyatlama zorluklarına neden olmaya devam ettiğini belirten analistler, veri takviminde ise ayrıca Avro Bölgesi\'nde sanayi üretimi ve ABD\'de Fed tutanaklarının bulunduğunu ifade etti.\r\n', 'haber4.jpg', 1, 1, '2021-10-13 22:02:31', '2021-10-13 21:01:55');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `slug` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `_create` tinyint(1) NOT NULL DEFAULT 0,
  `_update` tinyint(1) NOT NULL DEFAULT 0,
  `_delete` tinyint(1) NOT NULL DEFAULT 0,
  `_read` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `moderator` tinyint(1) NOT NULL DEFAULT 0,
  `editor` tinyint(1) NOT NULL DEFAULT 0,
  `user` tinyint(1) DEFAULT 1,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `roles`
--

INSERT INTO `roles` (`id`, `admin`, `moderator`, `editor`, `user`, `user_id`) VALUES
(1, 1, 1, 1, 1, 1),
(2, 0, 0, 0, 1, 2),
(3, 1, 1, 1, 1, 3),
(4, 0, 0, 0, 1, 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(55) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `pass`) VALUES
(1, 'admin@teknasyonhaber@gmail.com', 'admin', 'admin'),
(2, 'anonymus@gmail.com', 'anonymus', '$2y$10$evT/EEjdMtFfu9ZY8jC7A.w8Gz/jnVuQ260YuJpaRaumr52qfovBa'),
(3, 'erayaydin@gmail.com', 'erayaydin', '$2y$10$7VPnS8ARvaKA/wox2mIBdOJeZhPyk2.pHM4Hfhqhz3UW/zPiE9D7W'),
(4, 'ancyra@gmail.com', 'ancyra', '$2y$10$J.ETg5DSZdHyPBWT2iVH6O7yseya5G2efWeRvEgQHAS0Cv4mYbVh2');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_id` (`news_id`);

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `news_id` (`news_id`);

--
-- Tablo için indeksler `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `author`
--
ALTER TABLE `author`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `author`
--
ALTER TABLE `author`
  ADD CONSTRAINT `author_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
