# bitirmeprojesi-talihduran
Talih Duran PHP Bootcamp bitirme projesi

## Önemli bilgi
Proje çalıştırılmadan önce .conf dosyası ayaları yapılmalı ve default olarak servername "teknasyon.project " olarak ayarlanmalı

## Rest apiler
http://teknasyon.project/rest/news -> Tüm haberleri döndürür(GET)
http://teknasyon.project/rest/news -> Formda parametre olarak verilen değerlerle yeni haber ekler (POST)
http://teknasyon.project/rest/news/id -> Formda parametre olarak verilen değerlerle belirtilen id deki haber için parça güncelleme yapar (PATCH)
http://teknasyon.project/rest/news/id -> Formda parametre olarak verilen değerlerle belirtilen id deki haber için tam güncelleme yapar (PUT)
http://teknasyon.project/rest/news/id -> Belirtilen id deki haberi siler(DELETE)

http://teknasyon.project/rest/users -> "*" (GET)
http://teknasyon.project/rest/users -> "*" (POST)
http://teknasyon.project/rest/news/id -> "*" (PATCH)
http://teknasyon.project/rest/news/id -> "*" (PUT)
http://teknasyon.project/rest/news/id -> "*" (DELETE)

## Proje Durumu
Login sistemi başarıyla çalışıyor, haber ekleme güncelleme admin sistemi çalışıyor fakat bazı buglar yer almaktadır. Maalesef süreden dolayı düzeltilememiştir. Bazı özellikler geliştirilmeyi beklerken projede oldukça güvenlik açıkları bulunmaktadır.
