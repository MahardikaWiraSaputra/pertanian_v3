<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-03-25 08:06:59 --> Severity: 8192 --> strpos(): Non-string needles will be interpreted as strings in the future. Use an explicit chr() call to preserve the current behavior C:\xampp\htdocs\bobawangi\application\third_party\MX\Router.php 239
ERROR - 2021-03-25 08:07:01 --> Query error: Table 'bobawangi.master_wilayah' doesn't exist - Invalid query: SELECT `a`.`nama_kecamatan`, `a`.`no_kec`
FROM `master_wilayah` AS `a`
GROUP BY `a`.`no_kec`
ERROR - 2021-03-25 08:07:01 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\xampp\htdocs\bobawangi\application\modules\home\models\Model_home.php 11
ERROR - 2021-03-25 08:07:14 --> Severity: 8192 --> strpos(): Non-string needles will be interpreted as strings in the future. Use an explicit chr() call to preserve the current behavior C:\xampp\htdocs\bobawangi\application\third_party\MX\Router.php 239
ERROR - 2021-03-25 08:07:15 --> Query error: Table 'bobawangi.master_wilayah' doesn't exist - Invalid query: SELECT `a`.`nama_kecamatan`, `a`.`no_kec`
FROM `master_wilayah` AS `a`
GROUP BY `a`.`no_kec`
ERROR - 2021-03-25 08:07:47 --> Severity: 8192 --> strpos(): Non-string needles will be interpreted as strings in the future. Use an explicit chr() call to preserve the current behavior C:\xampp\htdocs\bobawangi\application\third_party\MX\Router.php 239
ERROR - 2021-03-25 08:07:47 --> Query error: Table 'bobawangi.umkm_list' doesn't exist - Invalid query: SELECT `a`.`umkm_id`, `a`.`nama_produk`, `a`.`deskripsi_produk`, `a`.`harga_produk`, `a`.`status_stok`, `a`.`slug` as `slug_produk`, `a`.`view`, `b`.`slug`, `c`.`NAMA_USAHA`, `c`.`ALAMAT`, `c`.`TELP`, `c`.`KODE_KEC`, `c`.`NAMA_KEC`, `c`.`KODE_DESA`, `c`.`NAMA_DESA`, `c`.`LONGITUDE`, `c`.`LATITUDE`, `d`.`sm_facebook`, `d`.`sm_instagram`, `d`.`sm_whastapp`, `d`.`mp_tokopedia`, `d`.`mp_shopee`, `d`.`mp_bukalapak`, `d`.`mp_lazada`, `d`.`mp_blibli`, `e`.`produk_img`
FROM `produk` AS `a`
INNER JOIN `umkm_list` AS `b` ON `a`.`umkm_id` = `b`.`umkm_id`
INNER JOIN `umkm_master_data` AS `c` ON `b`.`umkm_id` = `c`.`ID`
LEFT JOIN `umkm_media_akun` AS `d` ON `c`.`ID` = `d`.`umkm_id`
LEFT JOIN `produk_images` AS `e` ON `a`.`id_produk` = `e`.`produk_id`
GROUP BY `a`.`umkm_id`
ORDER BY `a`.`view` DESC
 LIMIT 6
ERROR - 2021-03-25 08:08:28 --> Severity: 8192 --> strpos(): Non-string needles will be interpreted as strings in the future. Use an explicit chr() call to preserve the current behavior C:\xampp\htdocs\bobawangi\application\third_party\MX\Router.php 239
ERROR - 2021-03-25 08:08:28 --> Query error: Table 'bobawangi.umkm_list' doesn't exist - Invalid query: SELECT `a`.`umkm_id`, `a`.`nama_produk`, `a`.`deskripsi_produk`, `a`.`harga_produk`, `a`.`status_stok`, `a`.`slug` as `slug_produk`, `a`.`view`, `b`.`slug`, `c`.`NAMA_USAHA`, `c`.`ALAMAT`, `c`.`TELP`, `c`.`KODE_KEC`, `c`.`NAMA_KEC`, `c`.`KODE_DESA`, `c`.`NAMA_DESA`, `c`.`LONGITUDE`, `c`.`LATITUDE`, `d`.`sm_facebook`, `d`.`sm_instagram`, `d`.`sm_whastapp`, `d`.`mp_tokopedia`, `d`.`mp_shopee`, `d`.`mp_bukalapak`, `d`.`mp_lazada`, `d`.`mp_blibli`, `e`.`produk_img`
FROM `produk` AS `a`
INNER JOIN `umkm_list` AS `b` ON `a`.`umkm_id` = `b`.`umkm_id`
INNER JOIN `umkm_master_data` AS `c` ON `b`.`umkm_id` = `c`.`ID`
LEFT JOIN `umkm_media_akun` AS `d` ON `c`.`ID` = `d`.`umkm_id`
LEFT JOIN `produk_images` AS `e` ON `a`.`id_produk` = `e`.`produk_id`
GROUP BY `a`.`umkm_id`
ORDER BY `a`.`id_produk` DESC
 LIMIT 6
ERROR - 2021-03-25 08:08:39 --> Severity: 8192 --> strpos(): Non-string needles will be interpreted as strings in the future. Use an explicit chr() call to preserve the current behavior C:\xampp\htdocs\bobawangi\application\third_party\MX\Router.php 239
ERROR - 2021-03-25 08:08:40 --> Query error: Table 'bobawangi.umkm_list' doesn't exist - Invalid query: SELECT `a`.`umkm_id`, `a`.`nama_produk`, `a`.`deskripsi_produk`, `a`.`harga_produk`, `a`.`status_stok`, `a`.`slug` as `slug_produk`, `a`.`view`, `b`.`slug`, `c`.`NAMA_USAHA`, `c`.`ALAMAT`, `c`.`TELP`, `c`.`KODE_KEC`, `c`.`NAMA_KEC`, `c`.`KODE_DESA`, `c`.`NAMA_DESA`, `c`.`LONGITUDE`, `c`.`LATITUDE`, `d`.`sm_facebook`, `d`.`sm_instagram`, `d`.`sm_whastapp`, `d`.`mp_tokopedia`, `d`.`mp_shopee`, `d`.`mp_bukalapak`, `d`.`mp_lazada`, `d`.`mp_blibli`, `e`.`produk_img`
FROM `produk` AS `a`
INNER JOIN `umkm_list` AS `b` ON `a`.`umkm_id` = `b`.`umkm_id`
INNER JOIN `umkm_master_data` AS `c` ON `b`.`umkm_id` = `c`.`ID`
LEFT JOIN `umkm_media_akun` AS `d` ON `c`.`ID` = `d`.`umkm_id`
LEFT JOIN `produk_images` AS `e` ON `a`.`id_produk` = `e`.`produk_id`
GROUP BY `a`.`umkm_id`
ORDER BY `a`.`view` DESC
 LIMIT 6
ERROR - 2021-03-25 08:09:55 --> Severity: 8192 --> strpos(): Non-string needles will be interpreted as strings in the future. Use an explicit chr() call to preserve the current behavior C:\xampp\htdocs\bobawangi\application\third_party\MX\Router.php 239
ERROR - 2021-03-25 08:09:55 --> Query error: Table 'bobawangi.umkm_list' doesn't exist - Invalid query: SELECT `a`.`umkm_id`, `a`.`nama_produk`, `a`.`deskripsi_produk`, `a`.`harga_produk`, `a`.`status_stok`, `a`.`slug` as `slug_produk`, `a`.`view`, `b`.`slug`, `c`.`NAMA_USAHA`, `c`.`ALAMAT`, `c`.`TELP`, `c`.`KODE_KEC`, `c`.`NAMA_KEC`, `c`.`KODE_DESA`, `c`.`NAMA_DESA`, `c`.`LONGITUDE`, `c`.`LATITUDE`, `d`.`sm_facebook`, `d`.`sm_instagram`, `d`.`sm_whastapp`, `d`.`mp_tokopedia`, `d`.`mp_shopee`, `d`.`mp_bukalapak`, `d`.`mp_lazada`, `d`.`mp_blibli`, `e`.`produk_img`
FROM `produk` AS `a`
INNER JOIN `umkm_list` AS `b` ON `a`.`umkm_id` = `b`.`umkm_id`
INNER JOIN `umkm_master_data` AS `c` ON `b`.`umkm_id` = `c`.`ID`
LEFT JOIN `umkm_media_akun` AS `d` ON `c`.`ID` = `d`.`umkm_id`
LEFT JOIN `produk_images` AS `e` ON `a`.`id_produk` = `e`.`produk_id`
GROUP BY `a`.`umkm_id`
ORDER BY `a`.`view` DESC
 LIMIT 6
ERROR - 2021-03-25 08:11:48 --> Severity: 8192 --> strpos(): Non-string needles will be interpreted as strings in the future. Use an explicit chr() call to preserve the current behavior C:\xampp\htdocs\bobawangi\application\third_party\MX\Router.php 239
ERROR - 2021-03-25 08:11:49 --> Query error: Table 'bobawangi.umkm_list' doesn't exist - Invalid query: SELECT `a`.`umkm_id`, `a`.`nama_produk`, `a`.`deskripsi_produk`, `a`.`harga_produk`, `a`.`status_stok`, `a`.`slug` as `slug_produk`, `a`.`view`, `b`.`slug`, `c`.`NAMA_USAHA`, `c`.`ALAMAT`, `c`.`TELP`, `c`.`KODE_KEC`, `c`.`NAMA_KEC`, `c`.`KODE_DESA`, `c`.`NAMA_DESA`, `c`.`LONGITUDE`, `c`.`LATITUDE`, `d`.`sm_facebook`, `d`.`sm_instagram`, `d`.`sm_whastapp`, `d`.`mp_tokopedia`, `d`.`mp_shopee`, `d`.`mp_bukalapak`, `d`.`mp_lazada`, `d`.`mp_blibli`, `e`.`produk_img`
FROM `produk` AS `a`
INNER JOIN `umkm_list` AS `b` ON `a`.`umkm_id` = `b`.`umkm_id`
INNER JOIN `umkm_master_data` AS `c` ON `b`.`umkm_id` = `c`.`ID`
LEFT JOIN `umkm_media_akun` AS `d` ON `c`.`ID` = `d`.`umkm_id`
LEFT JOIN `produk_images` AS `e` ON `a`.`id_produk` = `e`.`produk_id`
GROUP BY `a`.`umkm_id`
ORDER BY `a`.`view` DESC
 LIMIT 6
ERROR - 2021-03-25 08:12:56 --> Severity: 8192 --> strpos(): Non-string needles will be interpreted as strings in the future. Use an explicit chr() call to preserve the current behavior C:\xampp\htdocs\bobawangi\application\third_party\MX\Router.php 239
ERROR - 2021-03-25 08:13:14 --> Severity: 8192 --> strpos(): Non-string needles will be interpreted as strings in the future. Use an explicit chr() call to preserve the current behavior C:\xampp\htdocs\bobawangi\application\third_party\MX\Router.php 239
ERROR - 2021-03-25 08:13:14 --> Query error: Table 'bobawangi.umkm_list' doesn't exist - Invalid query: SELECT `a`.`umkm_id`, `a`.`nama_produk`, `a`.`deskripsi_produk`, `a`.`harga_produk`, `a`.`status_stok`, `a`.`slug` as `slug_produk`, `a`.`view`, `b`.`slug`, `c`.`NAMA_USAHA`, `c`.`ALAMAT`, `c`.`TELP`, `c`.`KODE_KEC`, `c`.`NAMA_KEC`, `c`.`KODE_DESA`, `c`.`NAMA_DESA`, `c`.`LONGITUDE`, `c`.`LATITUDE`, `d`.`sm_facebook`, `d`.`sm_instagram`, `d`.`sm_whastapp`, `d`.`mp_tokopedia`, `d`.`mp_shopee`, `d`.`mp_bukalapak`, `d`.`mp_lazada`, `d`.`mp_blibli`, `e`.`produk_img`
FROM `produk` AS `a`
INNER JOIN `umkm_list` AS `b` ON `a`.`umkm_id` = `b`.`umkm_id`
INNER JOIN `umkm_master_data` AS `c` ON `b`.`umkm_id` = `c`.`ID`
LEFT JOIN `umkm_media_akun` AS `d` ON `c`.`ID` = `d`.`umkm_id`
LEFT JOIN `produk_images` AS `e` ON `a`.`id_produk` = `e`.`produk_id`
GROUP BY `a`.`umkm_id`
ORDER BY `a`.`view` DESC
 LIMIT 6
ERROR - 2021-03-25 08:19:31 --> Severity: 8192 --> strpos(): Non-string needles will be interpreted as strings in the future. Use an explicit chr() call to preserve the current behavior C:\xampp\htdocs\bobawangi\application\third_party\MX\Router.php 239
ERROR - 2021-03-25 08:21:30 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:21:30 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:21:31 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:21:46 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:21:46 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:21:46 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:21:53 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:21:53 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:22:03 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:22:03 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:22:09 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:22:09 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:22:10 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:22:16 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:22:16 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:22:26 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:22:26 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:24:21 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:24:21 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:28:53 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:28:53 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:29:00 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:29:06 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:29:06 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:29:06 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:29:31 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:29:31 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:29:31 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:33:25 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:33:25 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:33:26 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:33:26 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:34:03 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:34:03 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:34:04 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:34:04 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:34:04 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:38:29 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:38:29 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:38:30 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:38:30 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:38:44 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:38:44 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:38:59 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:38:59 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:39:52 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:39:52 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:40:50 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:40:50 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:40:50 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:40:50 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:40:50 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:42:03 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:42:03 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:42:15 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:42:16 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:42:21 --> 404 Page Not Found: /index
ERROR - 2021-03-25 08:56:29 --> 404 Page Not Found: /index
ERROR - 2021-03-25 09:32:04 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'root'@'localhost' (using password: NO) /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:32:04 --> Unable to connect to the database
ERROR - 2021-03-25 09:34:09 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'root'@'localhost' (using password: NO) /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:34:09 --> Unable to connect to the database
ERROR - 2021-03-25 09:34:50 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'root'@'localhost' (using password: NO) /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:34:50 --> Unable to connect to the database
ERROR - 2021-03-25 09:45:49 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:45:49 --> Unable to connect to the database
ERROR - 2021-03-25 09:46:07 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:46:07 --> Unable to connect to the database
ERROR - 2021-03-25 09:48:28 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:48:28 --> Unable to connect to the database
ERROR - 2021-03-25 09:48:55 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:48:55 --> Unable to connect to the database
ERROR - 2021-03-25 09:51:00 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:51:00 --> Unable to connect to the database
ERROR - 2021-03-25 09:51:00 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:51:00 --> Unable to connect to the database
ERROR - 2021-03-25 09:51:00 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:51:00 --> Unable to connect to the database
ERROR - 2021-03-25 09:51:00 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:51:00 --> Unable to connect to the database
ERROR - 2021-03-25 09:51:00 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:51:00 --> Unable to connect to the database
ERROR - 2021-03-25 09:51:00 --> Query error: Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' - Invalid query: SELECT `a`.`id_kategori`, `a`.`nama_kategori`, `a`.`ikon`, `a`.`gambar`, `a`.`featured_img`, `a`.`slug_kat`
FROM `kategori_produk` AS `a`
ORDER BY `a`.`id_kategori` ASC
 LIMIT 11
ERROR - 2021-03-25 09:51:00 --> Severity: error --> Exception: Call to a member function result() on boolean /home/elkt1425/public_html/bobawangi.com/application/modules/home/controllers/Home.php 14
ERROR - 2021-03-25 09:55:12 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:55:12 --> Unable to connect to the database
ERROR - 2021-03-25 09:55:12 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:55:12 --> Unable to connect to the database
ERROR - 2021-03-25 09:55:12 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:55:12 --> Unable to connect to the database
ERROR - 2021-03-25 09:55:12 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:55:12 --> Unable to connect to the database
ERROR - 2021-03-25 09:55:12 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:55:12 --> Unable to connect to the database
ERROR - 2021-03-25 09:55:12 --> Query error: Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' - Invalid query: SELECT `a`.`id_kategori`, `a`.`nama_kategori`, `a`.`ikon`, `a`.`gambar`, `a`.`featured_img`, `a`.`slug_kat`
FROM `kategori_produk` AS `a`
ORDER BY `a`.`id_kategori` ASC
 LIMIT 11
ERROR - 2021-03-25 09:55:12 --> Severity: error --> Exception: Call to a member function result() on boolean /home/elkt1425/public_html/bobawangi.com/application/modules/home/controllers/Home.php 14
ERROR - 2021-03-25 09:55:22 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:55:22 --> Unable to connect to the database
ERROR - 2021-03-25 09:55:22 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:55:22 --> Unable to connect to the database
ERROR - 2021-03-25 09:55:22 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:55:22 --> Unable to connect to the database
ERROR - 2021-03-25 09:55:22 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:55:22 --> Unable to connect to the database
ERROR - 2021-03-25 09:55:22 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:55:22 --> Unable to connect to the database
ERROR - 2021-03-25 09:55:22 --> Query error: Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' - Invalid query: SELECT `a`.`id_kategori`, `a`.`nama_kategori`, `a`.`ikon`, `a`.`gambar`, `a`.`featured_img`, `a`.`slug_kat`
FROM `kategori_produk` AS `a`
ORDER BY `a`.`id_kategori` ASC
 LIMIT 11
ERROR - 2021-03-25 09:55:22 --> Severity: error --> Exception: Call to a member function result() on boolean /home/elkt1425/public_html/bobawangi.com/application/modules/home/controllers/Home.php 14
ERROR - 2021-03-25 09:55:30 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:55:30 --> Unable to connect to the database
ERROR - 2021-03-25 09:55:30 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:55:30 --> Unable to connect to the database
ERROR - 2021-03-25 09:55:30 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:55:30 --> Unable to connect to the database
ERROR - 2021-03-25 09:55:30 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:55:30 --> Unable to connect to the database
ERROR - 2021-03-25 09:55:30 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:55:30 --> Unable to connect to the database
ERROR - 2021-03-25 09:55:30 --> Query error: Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' - Invalid query: SELECT `a`.`id_kategori`, `a`.`nama_kategori`, `a`.`ikon`, `a`.`gambar`, `a`.`featured_img`, `a`.`slug_kat`
FROM `kategori_produk` AS `a`
ORDER BY `a`.`id_kategori` ASC
 LIMIT 11
ERROR - 2021-03-25 09:55:30 --> Severity: error --> Exception: Call to a member function result() on boolean /home/elkt1425/public_html/bobawangi.com/application/modules/home/controllers/Home.php 14
ERROR - 2021-03-25 09:55:39 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:55:39 --> Unable to connect to the database
ERROR - 2021-03-25 09:55:49 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:55:49 --> Unable to connect to the database
ERROR - 2021-03-25 09:55:50 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:55:50 --> Unable to connect to the database
ERROR - 2021-03-25 09:57:09 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:57:09 --> Unable to connect to the database
ERROR - 2021-03-25 09:58:07 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:58:07 --> Unable to connect to the database
ERROR - 2021-03-25 09:58:08 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:58:08 --> Unable to connect to the database
ERROR - 2021-03-25 09:58:08 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:58:08 --> Unable to connect to the database
ERROR - 2021-03-25 09:58:08 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:58:08 --> Unable to connect to the database
ERROR - 2021-03-25 09:58:08 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:58:08 --> Unable to connect to the database
ERROR - 2021-03-25 09:58:08 --> Query error: Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' - Invalid query: SELECT `a`.`id_kategori`, `a`.`nama_kategori`, `a`.`ikon`, `a`.`gambar`, `a`.`featured_img`, `a`.`slug_kat`
FROM `kategori_produk` AS `a`
ORDER BY `a`.`id_kategori` ASC
 LIMIT 11
ERROR - 2021-03-25 09:58:08 --> Severity: error --> Exception: Call to a member function result() on boolean /home/elkt1425/public_html/bobawangi.com/application/modules/home/controllers/Home.php 14
ERROR - 2021-03-25 09:58:09 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:58:09 --> Unable to connect to the database
ERROR - 2021-03-25 09:58:09 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:58:09 --> Unable to connect to the database
ERROR - 2021-03-25 09:58:09 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:58:09 --> Unable to connect to the database
ERROR - 2021-03-25 09:58:09 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:58:09 --> Unable to connect to the database
ERROR - 2021-03-25 09:58:09 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:58:09 --> Unable to connect to the database
ERROR - 2021-03-25 09:58:09 --> Query error: Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' - Invalid query: SELECT `a`.`id_kategori`, `a`.`nama_kategori`, `a`.`ikon`, `a`.`gambar`, `a`.`featured_img`, `a`.`slug_kat`
FROM `kategori_produk` AS `a`
ORDER BY `a`.`id_kategori` ASC
 LIMIT 11
ERROR - 2021-03-25 09:58:09 --> Severity: error --> Exception: Call to a member function result() on boolean /home/elkt1425/public_html/bobawangi.com/application/modules/home/controllers/Home.php 14
ERROR - 2021-03-25 09:58:25 --> Severity: Warning --> mysqli::real_connect(): (HY000/1044): Access denied for user 'elkt1425_bobawangi'@'localhost' to database 'elkt1425_bobawangi' /home/elkt1425/public_html/bobawangi.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-25 09:58:25 --> Unable to connect to the database
