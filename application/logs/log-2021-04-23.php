<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-04-23 07:35:49 --> 404 Page Not Found: /index
ERROR - 2021-04-23 08:00:00 --> Severity: Notice --> Undefined property: stdClass::$nama_desa C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_list.php 23
ERROR - 2021-04-23 08:00:00 --> Severity: Notice --> Undefined property: stdClass::$nama_kecamatan C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_list.php 26
ERROR - 2021-04-23 08:00:00 --> Severity: Notice --> Undefined property: stdClass::$nama_desa C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_list.php 23
ERROR - 2021-04-23 08:00:00 --> Severity: Notice --> Undefined property: stdClass::$nama_kecamatan C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_list.php 26
ERROR - 2021-04-23 08:00:54 --> Query error: Unknown column 'b.nama_kecamatan' in 'field list' - Invalid query: SELECT `a`.`kategori`, `a`.`desa`, `a`.`kecamatan`, `b`.`nama_kecamatan`, `b`.`nama_desa`, `a`.`komoditas`, `a`.`tahun`, `a`.`prov_januari`, `a`.`lt_januari`, `a`.`lp_januari`, `a`.`prov_februari`, `a`.`lt_februari`, `a`.`lp_februari`, `a`.`prov_maret`, `a`.`lt_maret`, `a`.`lp_maret`, `a`.`prov_april`, `a`.`lt_april`, `a`.`lp_april`, `a`.`prov_mei`, `a`.`lt_mei`, `a`.`lp_mei`, `a`.`prov_juni`, `a`.`lt_juni`, `a`.`lp_juni`, `a`.`prov_juli`, `a`.`lt_juli`, `a`.`lp_juli`, `a`.`prov_agustus`, `a`.`lt_agustus`, `a`.`lp_agustus`, `a`.`prov_september`, `a`.`lt_september`, `a`.`lp_september`, `a`.`prov_oktober`, `a`.`lt_oktober`, `a`.`lp_oktober`, `a`.`prov_november`, `a`.`lt_november`, `a`.`lp_november`, `a`.`prov_desember`, `a`.`lt_desember`, `a`.`lp_desember`, `b`.`komoditas`
FROM `v_data_tanaman_pangan3` AS `a`
INNER JOIN `komoditas` AS `b` ON `a`.`komoditas` = `b`.`id`
ORDER BY `a`.`kategori` ASC
 LIMIT 25
ERROR - 2021-04-23 08:00:57 --> Query error: Unknown column 'b.nama_kecamatan' in 'field list' - Invalid query: SELECT `a`.`kategori`, `a`.`desa`, `a`.`kecamatan`, `b`.`nama_kecamatan`, `b`.`nama_desa`, `a`.`komoditas`, `a`.`tahun`, `a`.`prov_januari`, `a`.`lt_januari`, `a`.`lp_januari`, `a`.`prov_februari`, `a`.`lt_februari`, `a`.`lp_februari`, `a`.`prov_maret`, `a`.`lt_maret`, `a`.`lp_maret`, `a`.`prov_april`, `a`.`lt_april`, `a`.`lp_april`, `a`.`prov_mei`, `a`.`lt_mei`, `a`.`lp_mei`, `a`.`prov_juni`, `a`.`lt_juni`, `a`.`lp_juni`, `a`.`prov_juli`, `a`.`lt_juli`, `a`.`lp_juli`, `a`.`prov_agustus`, `a`.`lt_agustus`, `a`.`lp_agustus`, `a`.`prov_september`, `a`.`lt_september`, `a`.`lp_september`, `a`.`prov_oktober`, `a`.`lt_oktober`, `a`.`lp_oktober`, `a`.`prov_november`, `a`.`lt_november`, `a`.`lp_november`, `a`.`prov_desember`, `a`.`lt_desember`, `a`.`lp_desember`, `b`.`komoditas`
FROM `v_data_tanaman_pangan3` AS `a`
INNER JOIN `komoditas` AS `b` ON `a`.`komoditas` = `b`.`id`
ORDER BY `a`.`kategori` ASC
 LIMIT 25
ERROR - 2021-04-23 08:00:59 --> 404 Page Not Found: /index
ERROR - 2021-04-23 08:01:00 --> Query error: Unknown column 'b.nama_kecamatan' in 'field list' - Invalid query: SELECT `a`.`kategori`, `a`.`desa`, `a`.`kecamatan`, `b`.`nama_kecamatan`, `b`.`nama_desa`, `a`.`komoditas`, `a`.`tahun`, `a`.`prov_januari`, `a`.`lt_januari`, `a`.`lp_januari`, `a`.`prov_februari`, `a`.`lt_februari`, `a`.`lp_februari`, `a`.`prov_maret`, `a`.`lt_maret`, `a`.`lp_maret`, `a`.`prov_april`, `a`.`lt_april`, `a`.`lp_april`, `a`.`prov_mei`, `a`.`lt_mei`, `a`.`lp_mei`, `a`.`prov_juni`, `a`.`lt_juni`, `a`.`lp_juni`, `a`.`prov_juli`, `a`.`lt_juli`, `a`.`lp_juli`, `a`.`prov_agustus`, `a`.`lt_agustus`, `a`.`lp_agustus`, `a`.`prov_september`, `a`.`lt_september`, `a`.`lp_september`, `a`.`prov_oktober`, `a`.`lt_oktober`, `a`.`lp_oktober`, `a`.`prov_november`, `a`.`lt_november`, `a`.`lp_november`, `a`.`prov_desember`, `a`.`lt_desember`, `a`.`lp_desember`, `b`.`komoditas`
FROM `v_data_tanaman_pangan3` AS `a`
INNER JOIN `komoditas` AS `b` ON `a`.`komoditas` = `b`.`id`
ORDER BY `a`.`kategori` ASC
 LIMIT 25
ERROR - 2021-04-23 08:01:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`b`.`komoditas`
FROM `v_data_tanaman_pangan3` AS `a`
INNER JOIN `komoditas` AS `' at line 1 - Invalid query: SELECT `a`.* `b`.`komoditas`
FROM `v_data_tanaman_pangan3` AS `a`
INNER JOIN `komoditas` AS `b` ON `a`.`komoditas` = `b`.`id`
ORDER BY `a`.`kategori` ASC
 LIMIT 25
ERROR - 2021-04-23 08:01:56 --> Severity: Notice --> Trying to get property 'id_produk' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 32
ERROR - 2021-04-23 08:01:56 --> Severity: Notice --> Trying to get property 'store_id' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 33
ERROR - 2021-04-23 08:01:56 --> Severity: Notice --> Trying to get property 'nama_produk' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 43
ERROR - 2021-04-23 08:01:56 --> Severity: Notice --> Trying to get property 'nama_produk' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 51
ERROR - 2021-04-23 08:01:56 --> Severity: Notice --> Trying to get property 'stock' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 61
ERROR - 2021-04-23 08:01:56 --> Severity: Notice --> Trying to get property 'satuan' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 69
ERROR - 2021-04-23 08:01:56 --> Severity: Notice --> Trying to get property 'harga' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 77
ERROR - 2021-04-23 08:05:56 --> Severity: Notice --> Trying to get property 'id_produk' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 32
ERROR - 2021-04-23 08:05:56 --> Severity: Notice --> Trying to get property 'store_id' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 33
ERROR - 2021-04-23 08:05:56 --> Severity: Notice --> Trying to get property 'nama_produk' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 43
ERROR - 2021-04-23 08:05:56 --> Severity: Notice --> Trying to get property 'nama_produk' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 51
ERROR - 2021-04-23 08:05:56 --> Severity: Notice --> Trying to get property 'stock' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 61
ERROR - 2021-04-23 08:05:56 --> Severity: Notice --> Trying to get property 'satuan' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 69
ERROR - 2021-04-23 08:05:56 --> Severity: Notice --> Trying to get property 'harga' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 77
ERROR - 2021-04-23 08:06:07 --> Severity: Notice --> Trying to get property 'id_produk' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 32
ERROR - 2021-04-23 08:06:07 --> Severity: Notice --> Trying to get property 'store_id' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 33
ERROR - 2021-04-23 08:06:07 --> Severity: Notice --> Trying to get property 'nama_produk' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 43
ERROR - 2021-04-23 08:06:07 --> Severity: Notice --> Trying to get property 'nama_produk' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 51
ERROR - 2021-04-23 08:06:07 --> Severity: Notice --> Trying to get property 'stock' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 61
ERROR - 2021-04-23 08:06:07 --> Severity: Notice --> Trying to get property 'satuan' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 69
ERROR - 2021-04-23 08:06:07 --> Severity: Notice --> Trying to get property 'harga' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 77
ERROR - 2021-04-23 08:06:34 --> Severity: Notice --> Trying to get property 'id_produk' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 32
ERROR - 2021-04-23 08:06:34 --> Severity: Notice --> Trying to get property 'store_id' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 33
ERROR - 2021-04-23 08:06:34 --> Severity: Notice --> Trying to get property 'nama_produk' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 43
ERROR - 2021-04-23 08:06:34 --> Severity: Notice --> Trying to get property 'nama_produk' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 51
ERROR - 2021-04-23 08:06:34 --> Severity: Notice --> Trying to get property 'stock' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 61
ERROR - 2021-04-23 08:06:34 --> Severity: Notice --> Trying to get property 'satuan' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 69
ERROR - 2021-04-23 08:06:34 --> Severity: Notice --> Trying to get property 'harga' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 77
ERROR - 2021-04-23 08:06:44 --> 404 Page Not Found: ../modules/backend/controllers/Produk/detail
ERROR - 2021-04-23 08:07:52 --> 404 Page Not Found: ../modules/backend/controllers/Produk/detail
ERROR - 2021-04-23 08:07:59 --> 404 Page Not Found: ../modules/backend/controllers/Pertanian/detail
ERROR - 2021-04-23 08:08:47 --> Query error: Table 'db_pertanian.v_tanaman_pangan3' doesn't exist - Invalid query: SELECT `a`.*
FROM `v_tanaman_pangan3` AS `aa`
WHERE `a`.`tahun` = 'sub_round_1'
AND `a`.`kategori` = '2021'
ERROR - 2021-04-23 08:10:20 --> Query error: Table 'db_pertanian.v_tanaman_pangan3' doesn't exist - Invalid query: SELECT `a`.*
FROM `v_tanaman_pangan3` AS `a`
WHERE `a`.`kategori` = 'sub_round_1'
AND `a`.`tahun` = '2021'
ERROR - 2021-04-23 08:13:10 --> Severity: Notice --> Trying to get property 'id_produk' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_edit.php 32
ERROR - 2021-04-23 08:13:10 --> Severity: Notice --> Trying to get property 'store_id' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_edit.php 33
ERROR - 2021-04-23 08:13:10 --> Severity: Notice --> Trying to get property 'nama_produk' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_edit.php 43
ERROR - 2021-04-23 08:13:10 --> Severity: Notice --> Trying to get property 'nama_produk' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_edit.php 51
ERROR - 2021-04-23 08:13:10 --> Severity: Notice --> Trying to get property 'stock' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_edit.php 61
ERROR - 2021-04-23 08:13:10 --> Severity: Notice --> Trying to get property 'satuan' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_edit.php 69
ERROR - 2021-04-23 08:13:10 --> Severity: Notice --> Trying to get property 'harga' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_edit.php 77
ERROR - 2021-04-23 08:13:10 --> Severity: Notice --> Undefined variable: foto C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_edit.php 90
ERROR - 2021-04-23 08:13:10 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_edit.php 90
ERROR - 2021-04-23 08:31:29 --> Severity: Notice --> Undefined variable: filter_kecamatan C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_edit.php 48
ERROR - 2021-04-23 08:31:29 --> Severity: Notice --> Trying to get property 'kecamatan' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_edit.php 48
ERROR - 2021-04-23 08:31:29 --> Severity: Notice --> Undefined variable: filter_komoditas C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_edit.php 66
ERROR - 2021-04-23 08:31:29 --> Severity: Notice --> Undefined variable: filter_tahun C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_edit.php 76
ERROR - 2021-04-23 08:31:58 --> Severity: Notice --> Trying to get property 'kecamatan' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_edit.php 48
ERROR - 2021-04-23 08:36:35 --> Query error: Unknown table 'db_pertanian.a' - Invalid query: SELECT `a`.*
FROM `v_data_tanaman_pangan3` AS `aa`
WHERE `a`.`kategori` = 'sub_round_1'
AND `a`.`tahun` = '2021'
ERROR - 2021-04-23 08:39:36 --> 404 Page Not Found: /index
ERROR - 2021-04-23 08:39:45 --> 404 Page Not Found: /index
ERROR - 2021-04-23 08:39:48 --> Query error: Unknown table 'db_pertanian.a' - Invalid query: SELECT `a`.*
FROM `v_data_tanaman_pangan3` AS `aa`
WHERE `a`.`kategori` = 'sub_round_1'
AND `a`.`tahun` = '2021'
ERROR - 2021-04-23 08:41:19 --> Severity: Notice --> Trying to get property 'kecamatan' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_edit.php 48
ERROR - 2021-04-23 08:46:07 --> Severity: Notice --> Trying to get property 'kecamatan' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_edit.php 48
ERROR - 2021-04-23 10:35:08 --> 404 Page Not Found: /index
ERROR - 2021-04-23 10:35:42 --> 404 Page Not Found: /index
ERROR - 2021-04-23 10:36:28 --> Query error: Unknown column 'a.sub_round' in 'where clause' - Invalid query: SELECT `a`.*
FROM `v_data_tanaman_pangan3` AS `a`
WHERE `a`.`sub_round` = 'sub_round_1'
AND `a`.`tahun` = 'all'
AND `a`.`komoditas` = 'all'
ERROR - 2021-04-23 10:36:33 --> 404 Page Not Found: /index
ERROR - 2021-04-23 10:36:34 --> Query error: Unknown column 'a.sub_round' in 'where clause' - Invalid query: SELECT `a`.*
FROM `v_data_tanaman_pangan3` AS `a`
WHERE `a`.`sub_round` = 'sub_round_1'
AND `a`.`tahun` = 'all'
AND `a`.`komoditas` = 'all'
ERROR - 2021-04-23 10:37:29 --> Query error: Unknown column 'a.sub_round' in 'where clause' - Invalid query: SELECT `a`.*
FROM `v_data_tanaman_pangan3` AS `a`
WHERE `a`.`sub_round` = 'sub_round_1'
AND `a`.`tahun` = '2021'
AND `a`.`komoditas` = '2'
ERROR - 2021-04-23 10:37:34 --> 404 Page Not Found: /index
ERROR - 2021-04-23 10:38:34 --> Query error: Unknown column 'a.sub_round' in 'where clause' - Invalid query: SELECT `a`.*
FROM `v_data_tanaman_pangan3` AS `a`
WHERE `a`.`sub_round` = 'sub_round_2'
AND `a`.`tahun` = '2021'
AND `a`.`komoditas` = '2'
ERROR - 2021-04-23 10:38:43 --> Query error: Unknown column 'a.sub_round' in 'where clause' - Invalid query: SELECT `a`.*
FROM `v_data_tanaman_pangan3` AS `a`
WHERE `a`.`sub_round` = 'sub_round_1'
AND `a`.`tahun` = '2021'
AND `a`.`komoditas` = '2'
ERROR - 2021-04-23 10:39:20 --> Severity: Notice --> Undefined variable: id C:\xampp\htdocs\pertanian\application\modules\backend\controllers\Pertanian.php 98
ERROR - 2021-04-23 10:39:20 --> Severity: Notice --> Undefined variable: id C:\xampp\htdocs\pertanian\application\modules\backend\controllers\Pertanian.php 100
ERROR - 2021-04-23 10:42:25 --> Severity: Notice --> Undefined property: stdClass::$maret C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_1.php 21
ERROR - 2021-04-23 10:56:59 --> Severity: error --> Exception: Too few arguments to function Pertanian::edit_sub(), 1 passed in C:\xampp\htdocs\pertanian\system\core\CodeIgniter.php on line 532 and exactly 3 expected C:\xampp\htdocs\pertanian\application\modules\backend\controllers\Pertanian.php 96
ERROR - 2021-04-23 10:57:00 --> Severity: error --> Exception: Too few arguments to function Pertanian::edit_sub(), 1 passed in C:\xampp\htdocs\pertanian\system\core\CodeIgniter.php on line 532 and exactly 3 expected C:\xampp\htdocs\pertanian\application\modules\backend\controllers\Pertanian.php 96
ERROR - 2021-04-23 10:57:01 --> Severity: error --> Exception: Too few arguments to function Pertanian::edit_sub(), 1 passed in C:\xampp\htdocs\pertanian\system\core\CodeIgniter.php on line 532 and exactly 3 expected C:\xampp\htdocs\pertanian\application\modules\backend\controllers\Pertanian.php 96
ERROR - 2021-04-23 11:06:26 --> Severity: error --> Exception: Too few arguments to function Pertanian::edit_sub(), 1 passed in C:\xampp\htdocs\pertanian\system\core\CodeIgniter.php on line 532 and exactly 3 expected C:\xampp\htdocs\pertanian\application\modules\backend\controllers\Pertanian.php 96
ERROR - 2021-04-23 11:06:29 --> Severity: Notice --> Trying to get property 'prov_september' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_3.php 18
ERROR - 2021-04-23 11:06:29 --> Severity: Notice --> Trying to get property 'prov_oktober' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_3.php 19
ERROR - 2021-04-23 11:06:29 --> Severity: Notice --> Trying to get property 'prov_november' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_3.php 20
ERROR - 2021-04-23 11:06:29 --> Severity: Notice --> Trying to get property 'prov_desember' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_3.php 21
ERROR - 2021-04-23 11:06:29 --> Severity: Notice --> Trying to get property 'lt_september' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_3.php 44
ERROR - 2021-04-23 11:06:29 --> Severity: Notice --> Trying to get property 'lt_oktober' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_3.php 45
ERROR - 2021-04-23 11:06:29 --> Severity: Notice --> Trying to get property 'lt_november' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_3.php 46
ERROR - 2021-04-23 11:06:29 --> Severity: Notice --> Trying to get property 'lt_desember' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_3.php 47
ERROR - 2021-04-23 11:06:29 --> Severity: Notice --> Trying to get property 'lp_september' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_3.php 70
ERROR - 2021-04-23 11:06:29 --> Severity: Notice --> Trying to get property 'lp_oktober' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_3.php 71
ERROR - 2021-04-23 11:06:29 --> Severity: Notice --> Trying to get property 'lp_november' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_3.php 72
ERROR - 2021-04-23 11:06:29 --> Severity: Notice --> Trying to get property 'lp_desember' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_3.php 73
ERROR - 2021-04-23 11:06:29 --> Severity: Notice --> Trying to get property 'produksi_september' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_3.php 96
ERROR - 2021-04-23 11:06:29 --> Severity: Notice --> Trying to get property 'produksi_oktober' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_3.php 97
ERROR - 2021-04-23 11:06:29 --> Severity: Notice --> Trying to get property 'produksi_november' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_3.php 98
ERROR - 2021-04-23 11:06:29 --> Severity: Notice --> Trying to get property 'produksi_desember' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_3.php 99
ERROR - 2021-04-23 11:06:29 --> Severity: error --> Exception: Too few arguments to function Pertanian::edit_sub(), 1 passed in C:\xampp\htdocs\pertanian\system\core\CodeIgniter.php on line 532 and exactly 3 expected C:\xampp\htdocs\pertanian\application\modules\backend\controllers\Pertanian.php 96
ERROR - 2021-04-23 11:06:35 --> Severity: error --> Exception: Too few arguments to function Pertanian::edit_sub(), 1 passed in C:\xampp\htdocs\pertanian\system\core\CodeIgniter.php on line 532 and exactly 3 expected C:\xampp\htdocs\pertanian\application\modules\backend\controllers\Pertanian.php 96
ERROR - 2021-04-23 11:06:41 --> Severity: Notice --> Trying to get property 'prov_januari' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_1.php 18
ERROR - 2021-04-23 11:06:41 --> Severity: Notice --> Trying to get property 'prov_februari' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_1.php 19
ERROR - 2021-04-23 11:06:41 --> Severity: Notice --> Trying to get property 'prov_maret' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_1.php 20
ERROR - 2021-04-23 11:06:41 --> Severity: Notice --> Trying to get property 'prov_april' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_1.php 21
ERROR - 2021-04-23 11:06:41 --> Severity: Notice --> Trying to get property 'lt_januari' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_1.php 44
ERROR - 2021-04-23 11:06:41 --> Severity: Notice --> Trying to get property 'lt_februari' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_1.php 45
ERROR - 2021-04-23 11:06:41 --> Severity: Notice --> Trying to get property 'lt_maret' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_1.php 46
ERROR - 2021-04-23 11:06:41 --> Severity: Notice --> Trying to get property 'lt_april' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_1.php 47
ERROR - 2021-04-23 11:06:41 --> Severity: Notice --> Trying to get property 'lp_januari' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_1.php 70
ERROR - 2021-04-23 11:06:41 --> Severity: Notice --> Trying to get property 'lp_februari' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_1.php 71
ERROR - 2021-04-23 11:06:41 --> Severity: Notice --> Trying to get property 'lp_maret' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_1.php 72
ERROR - 2021-04-23 11:06:41 --> Severity: Notice --> Trying to get property 'lp_april' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_1.php 73
ERROR - 2021-04-23 11:06:41 --> Severity: Notice --> Trying to get property 'produksi_januari' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_1.php 96
ERROR - 2021-04-23 11:06:41 --> Severity: Notice --> Trying to get property 'produksi_februari' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_1.php 97
ERROR - 2021-04-23 11:06:41 --> Severity: Notice --> Trying to get property 'produksi_maret' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_1.php 98
ERROR - 2021-04-23 11:06:41 --> Severity: Notice --> Trying to get property 'produksi_april' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_1.php 99
ERROR - 2021-04-23 11:06:41 --> Severity: error --> Exception: Too few arguments to function Pertanian::edit_sub(), 1 passed in C:\xampp\htdocs\pertanian\system\core\CodeIgniter.php on line 532 and exactly 3 expected C:\xampp\htdocs\pertanian\application\modules\backend\controllers\Pertanian.php 96
ERROR - 2021-04-23 11:06:43 --> Severity: Notice --> Trying to get property 'prov_mei' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_2.php 18
ERROR - 2021-04-23 11:06:43 --> Severity: Notice --> Trying to get property 'prov_juni' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_2.php 19
ERROR - 2021-04-23 11:06:43 --> Severity: Notice --> Trying to get property 'prov_juli' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_2.php 20
ERROR - 2021-04-23 11:06:43 --> Severity: Notice --> Trying to get property 'prov_agustus' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_2.php 21
ERROR - 2021-04-23 11:06:43 --> Severity: Notice --> Trying to get property 'lt_mei' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_2.php 44
ERROR - 2021-04-23 11:06:43 --> Severity: Notice --> Trying to get property 'lt_juni' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_2.php 45
ERROR - 2021-04-23 11:06:43 --> Severity: Notice --> Trying to get property 'lt_juli' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_2.php 46
ERROR - 2021-04-23 11:06:43 --> Severity: Notice --> Trying to get property 'lt_agustus' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_2.php 47
ERROR - 2021-04-23 11:06:43 --> Severity: Notice --> Trying to get property 'lp_mei' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_2.php 70
ERROR - 2021-04-23 11:06:43 --> Severity: Notice --> Trying to get property 'lp_juni' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_2.php 71
ERROR - 2021-04-23 11:06:43 --> Severity: Notice --> Trying to get property 'lp_juli' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_2.php 72
ERROR - 2021-04-23 11:06:43 --> Severity: Notice --> Trying to get property 'lp_agustus' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_2.php 73
ERROR - 2021-04-23 11:06:43 --> Severity: Notice --> Trying to get property 'produksi_mei' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_2.php 96
ERROR - 2021-04-23 11:06:43 --> Severity: Notice --> Trying to get property 'produksi_juni' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_2.php 97
ERROR - 2021-04-23 11:06:43 --> Severity: Notice --> Trying to get property 'produksi_juli' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_2.php 98
ERROR - 2021-04-23 11:06:43 --> Severity: Notice --> Trying to get property 'produksi_agustus' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\pertanian\v_sub_edit\sub_2.php 99
ERROR - 2021-04-23 11:06:43 --> Severity: error --> Exception: Too few arguments to function Pertanian::edit_sub(), 1 passed in C:\xampp\htdocs\pertanian\system\core\CodeIgniter.php on line 532 and exactly 3 expected C:\xampp\htdocs\pertanian\application\modules\backend\controllers\Pertanian.php 96
ERROR - 2021-04-23 11:06:47 --> Severity: error --> Exception: Too few arguments to function Pertanian::edit_sub(), 1 passed in C:\xampp\htdocs\pertanian\system\core\CodeIgniter.php on line 532 and exactly 3 expected C:\xampp\htdocs\pertanian\application\modules\backend\controllers\Pertanian.php 96
ERROR - 2021-04-23 13:21:33 --> 404 Page Not Found: /index
ERROR - 2021-04-23 13:52:53 --> 404 Page Not Found: /index
ERROR - 2021-04-23 13:52:56 --> 404 Page Not Found: /index
ERROR - 2021-04-23 13:57:57 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\pertanian\system\database\DB_driver.php 1525
ERROR - 2021-04-23 13:57:57 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '0 = Array' at line 1 - Invalid query: UPDATE `tanaman_pangan` SET 0 = Array
ERROR - 2021-04-23 13:58:36 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\pertanian\system\database\DB_driver.php 1525
ERROR - 2021-04-23 13:58:36 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\pertanian\system\database\DB_driver.php 1525
ERROR - 2021-04-23 13:58:36 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\pertanian\system\database\DB_driver.php 1525
ERROR - 2021-04-23 13:58:36 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\pertanian\system\database\DB_driver.php 1525
ERROR - 2021-04-23 13:58:36 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '0 = Array, 1 = Array, 2 = Array, 3 = Array' at line 1 - Invalid query: UPDATE `tanaman_pangan` SET 0 = Array, 1 = Array, 2 = Array, 3 = Array
ERROR - 2021-04-23 14:00:04 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\pertanian\system\database\DB_driver.php 1525
ERROR - 2021-04-23 14:00:04 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\pertanian\system\database\DB_driver.php 1525
ERROR - 2021-04-23 14:00:04 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\pertanian\system\database\DB_driver.php 1525
ERROR - 2021-04-23 14:00:04 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\pertanian\system\database\DB_driver.php 1525
ERROR - 2021-04-23 14:00:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '0 = Array, 1 = Array, 2 = Array, 3 = Array' at line 1 - Invalid query: UPDATE `tanaman_pangan` SET 0 = Array, 1 = Array, 2 = Array, 3 = Array
ERROR - 2021-04-23 14:04:01 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\pertanian\system\database\DB_driver.php 1525
ERROR - 2021-04-23 14:04:01 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\pertanian\system\database\DB_driver.php 1525
ERROR - 2021-04-23 14:04:01 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\pertanian\system\database\DB_driver.php 1525
ERROR - 2021-04-23 14:04:01 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\pertanian\system\database\DB_driver.php 1525
ERROR - 2021-04-23 14:04:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '0 = Array, 1 = Array, 2 = Array, 3 = Array' at line 1 - Invalid query: UPDATE `tanaman_pangan` SET 0 = Array, 1 = Array, 2 = Array, 3 = Array
ERROR - 2021-04-23 14:04:01 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\pertanian\system\core\Exceptions.php:271) C:\xampp\htdocs\pertanian\system\core\Common.php 570
ERROR - 2021-04-23 14:06:40 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\pertanian\system\database\DB_driver.php 1525
ERROR - 2021-04-23 14:06:40 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\pertanian\system\database\DB_driver.php 1525
ERROR - 2021-04-23 14:06:40 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\pertanian\system\database\DB_driver.php 1525
ERROR - 2021-04-23 14:06:40 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\pertanian\system\database\DB_driver.php 1525
ERROR - 2021-04-23 14:06:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '0 = Array, 1 = Array, 2 = Array, 3 = Array' at line 1 - Invalid query: UPDATE `tanaman_pangann` SET 0 = Array, 1 = Array, 2 = Array, 3 = Array
ERROR - 2021-04-23 14:11:32 --> Severity: Notice --> Undefined variable: query C:\xampp\htdocs\pertanian\application\modules\backend\controllers\Pertanian.php 345
ERROR - 2021-04-23 14:22:09 --> 404 Page Not Found: /index
ERROR - 2021-04-23 14:27:56 --> 404 Page Not Found: /index
ERROR - 2021-04-23 14:40:04 --> Query error: Unknown column 'a.nama_desa' in 'field list' - Invalid query: SELECT `a`.`nama_desa`, `a`.`kode_desa`
FROM `master_wilayah` as `aa`
GROUP BY `a`.`nama_desa`
ERROR - 2021-04-23 14:41:29 --> Severity: error --> Exception: Function name must be a string C:\xampp\htdocs\pertanian\application\modules\backend\models\Model_pertanian.php 36
ERROR - 2021-04-23 14:56:21 --> 404 Page Not Found: /index
ERROR - 2021-04-23 14:56:25 --> Severity: Notice --> Undefined variable: id C:\xampp\htdocs\pertanian\application\modules\backend\controllers\Pertanian.php 389
ERROR - 2021-04-23 14:56:45 --> Query error: Table 'db_pertanian.tanaman_pangann' doesn't exist - Invalid query: DELETE FROM `tanaman_pangann`
WHERE `kategori` = 'sub_round_1'
AND `tahun` = '2021'
ERROR - 2021-04-23 14:57:26 --> 404 Page Not Found: /index
ERROR - 2021-04-23 14:57:33 --> 404 Page Not Found: /index
ERROR - 2021-04-23 14:57:34 --> 404 Page Not Found: /index
ERROR - 2021-04-23 14:57:35 --> 404 Page Not Found: /index
ERROR - 2021-04-23 14:57:41 --> 404 Page Not Found: /index
ERROR - 2021-04-23 14:57:41 --> 404 Page Not Found: /index
ERROR - 2021-04-23 14:57:43 --> 404 Page Not Found: /index
