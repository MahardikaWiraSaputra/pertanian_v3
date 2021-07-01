<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-04-01 14:36:33 --> Severity: 8192 --> strpos(): Non-string needles will be interpreted as strings in the future. Use an explicit chr() call to preserve the current behavior C:\xampp\htdocs\bobawangi_fix\application\third_party\MX\Router.php 239
ERROR - 2021-04-01 14:36:36 --> 404 Page Not Found: /index
ERROR - 2021-04-01 14:36:36 --> 404 Page Not Found: /index
ERROR - 2021-04-01 14:36:37 --> 404 Page Not Found: /index
ERROR - 2021-04-01 14:36:37 --> 404 Page Not Found: /index
ERROR - 2021-04-01 14:36:37 --> 404 Page Not Found: /index
ERROR - 2021-04-01 14:36:37 --> 404 Page Not Found: /index
ERROR - 2021-04-01 14:36:37 --> 404 Page Not Found: /index
ERROR - 2021-04-01 14:36:37 --> 404 Page Not Found: /index
ERROR - 2021-04-01 14:36:37 --> 404 Page Not Found: /index
ERROR - 2021-04-01 14:41:19 --> 404 Page Not Found: /index
ERROR - 2021-04-01 14:41:19 --> 404 Page Not Found: /index
ERROR - 2021-04-01 14:41:19 --> 404 Page Not Found: /index
ERROR - 2021-04-01 14:41:19 --> 404 Page Not Found: /index
ERROR - 2021-04-01 14:41:19 --> 404 Page Not Found: /index
ERROR - 2021-04-01 14:41:19 --> 404 Page Not Found: /index
ERROR - 2021-04-01 14:41:19 --> 404 Page Not Found: /index
ERROR - 2021-04-01 14:41:20 --> 404 Page Not Found: /index
ERROR - 2021-04-01 14:41:20 --> 404 Page Not Found: /index
ERROR - 2021-04-01 14:49:24 --> 404 Page Not Found: /index
ERROR - 2021-04-01 14:49:40 --> 404 Page Not Found: /index
ERROR - 2021-04-01 14:50:34 --> 404 Page Not Found: /index
ERROR - 2021-04-01 14:50:35 --> 404 Page Not Found: /index
ERROR - 2021-04-01 14:50:35 --> 404 Page Not Found: /index
ERROR - 2021-04-01 14:50:35 --> 404 Page Not Found: /index
ERROR - 2021-04-01 14:50:35 --> 404 Page Not Found: /index
ERROR - 2021-04-01 14:50:35 --> 404 Page Not Found: /index
ERROR - 2021-04-01 14:51:46 --> 404 Page Not Found: /index
ERROR - 2021-04-01 14:52:52 --> 404 Page Not Found: /index
ERROR - 2021-04-01 14:52:52 --> 404 Page Not Found: /index
ERROR - 2021-04-01 14:52:53 --> 404 Page Not Found: /index
ERROR - 2021-04-01 14:53:05 --> Query error: Table 'bobawangi_fix.umkm_master_data' doesn't exist - Invalid query: SELECT count(*) as count
FROM `umkm_master_data` AS `a`
LEFT JOIN `umkm_list` AS `b` ON `a`.`ID` = `b`.`umkm_id`
ERROR - 2021-04-01 14:53:05 --> Severity: error --> Exception: Call to a member function row() on bool C:\xampp\htdocs\bobawangi_fix\application\modules\backend\models\Model_umkm.php 99
ERROR - 2021-04-01 15:13:18 --> Query error: Table 'bobawangi_fix.umkm_list' doesn't exist - Invalid query: SELECT `a`.`umkm_id`
FROM `produk` AS `a`
INNER JOIN `umkm_list` AS `b` ON `a`.`umkm_id` = `b`.`umkm_id`
INNER JOIN `umkm_master_data` AS `c` ON `a`.`umkm_id` = `c`.`ID`
LEFT JOIN `produk_images` AS `d` ON `a`.`id_produk` = `d`.`produk_id`
GROUP BY `a`.`umkm_id`
ERROR - 2021-04-01 15:13:18 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\bobawangi_fix\application\modules\backend\controllers\Produk.php 48
ERROR - 2021-04-01 15:15:58 --> Query error: Table 'bobawangi_fix.umkm_list' doesn't exist - Invalid query: SELECT `a`.`umkm_id`
FROM `produk` AS `a`
INNER JOIN `umkm_list` AS `b` ON `a`.`umkm_id` = `b`.`umkm_id`
INNER JOIN `umkm_master_data` AS `c` ON `a`.`umkm_id` = `c`.`ID`
LEFT JOIN `produk_images` AS `d` ON `a`.`id_produk` = `d`.`produk_id`
WHERE `b`.`status` = 'yes'
GROUP BY `a`.`umkm_id`
ERROR - 2021-04-01 15:15:58 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\bobawangi_fix\application\modules\backend\controllers\Produk.php 48
ERROR - 2021-04-01 15:16:01 --> 404 Page Not Found: ../modules/backend/controllers/Main/index.html
ERROR - 2021-04-01 15:28:00 --> 404 Page Not Found: ../modules/backend/controllers//index
ERROR - 2021-04-01 15:36:00 --> Query error: Table 'bobawangi_fix.umkm_list' doesn't exist - Invalid query: SELECT `a`.`umkm_id`
FROM `produk` AS `a`
INNER JOIN `umkm_list` AS `b` ON `a`.`umkm_id` = `b`.`umkm_id`
INNER JOIN `umkm_master_data` AS `c` ON `a`.`umkm_id` = `c`.`ID`
LEFT JOIN `produk_images` AS `d` ON `a`.`id_produk` = `d`.`produk_id`
GROUP BY `a`.`umkm_id`
ERROR - 2021-04-01 15:36:00 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\bobawangi_fix\application\modules\backend\controllers\Produk.php 48
ERROR - 2021-04-01 15:37:21 --> Query error: Table 'bobawangi_fix.umkm_list' doesn't exist - Invalid query: SELECT `a`.`umkm_id`
FROM `produk` AS `a`
INNER JOIN `umkm_list` AS `b` ON `a`.`umkm_id` = `b`.`umkm_id`
INNER JOIN `umkm_master_data` AS `c` ON `a`.`umkm_id` = `c`.`ID`
LEFT JOIN `produk_images` AS `d` ON `a`.`id_produk` = `d`.`produk_id`
GROUP BY `a`.`umkm_id`
ERROR - 2021-04-01 15:37:21 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\bobawangi_fix\application\modules\backend\controllers\Produk.php 48
ERROR - 2021-04-01 15:39:08 --> Query error: Table 'bobawangi_fix.umkm_list' doesn't exist - Invalid query: SELECT `a`.`umkm_id`
FROM `produk` AS `a`
INNER JOIN `umkm_list` AS `b` ON `a`.`umkm_id` = `b`.`umkm_id`
INNER JOIN `umkm_master_data` AS `c` ON `a`.`umkm_id` = `c`.`ID`
LEFT JOIN `produk_images` AS `d` ON `a`.`id_produk` = `d`.`produk_id`
GROUP BY `a`.`umkm_id`
ERROR - 2021-04-01 15:39:08 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\bobawangi_fix\application\modules\backend\controllers\Produk.php 48
ERROR - 2021-04-01 15:39:09 --> Query error: Table 'bobawangi_fix.umkm_list' doesn't exist - Invalid query: SELECT `a`.`umkm_id`
FROM `produk` AS `a`
INNER JOIN `umkm_list` AS `b` ON `a`.`umkm_id` = `b`.`umkm_id`
INNER JOIN `umkm_master_data` AS `c` ON `a`.`umkm_id` = `c`.`ID`
LEFT JOIN `produk_images` AS `d` ON `a`.`id_produk` = `d`.`produk_id`
GROUP BY `a`.`umkm_id`
ERROR - 2021-04-01 15:39:09 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\bobawangi_fix\application\modules\backend\controllers\Produk.php 48
ERROR - 2021-04-01 15:45:54 --> 404 Page Not Found: ../modules/backend/controllers//index
ERROR - 2021-04-01 15:46:18 --> 404 Page Not Found: /index
