<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-04-22 08:18:08 --> 404 Page Not Found: /index
ERROR - 2021-04-22 08:34:24 --> 404 Page Not Found: /index
ERROR - 2021-04-22 08:36:28 --> Severity: error --> Exception: Function name must be a string C:\xampp\htdocs\pertanian\application\modules\backend\models\Model_pertanian.php 35
ERROR - 2021-04-22 08:50:05 --> 404 Page Not Found: /index
ERROR - 2021-04-22 09:01:58 --> 404 Page Not Found: /index
ERROR - 2021-04-22 09:29:43 --> 404 Page Not Found: /index
ERROR - 2021-04-22 10:56:49 --> 404 Page Not Found: /index
ERROR - 2021-04-22 11:48:39 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\pertanian\application\modules\backend\controllers\Pertanian.php 90
ERROR - 2021-04-22 11:55:33 --> 404 Page Not Found: /index
ERROR - 2021-04-22 12:56:10 --> 404 Page Not Found: /index
ERROR - 2021-04-22 12:56:11 --> 404 Page Not Found: /index
ERROR - 2021-04-22 13:57:37 --> Query error: Not unique table/alias: 'b' - Invalid query: SELECT `a`.`tahun`, `a`.`kategori`, `b`.`nama_desa`, `b`.`nama_kecamatan`, `c`.`komoditas`
FROM `tanaman_pangan` AS `a`
JOIN `master_wilayah` as `b` ON `a`.`desa` = `b`.`kode_desa`
INNER JOIN `master_wilayah` as `b` ON `a`.`kecamatan` = `b`.`no_kec`
INNER JOIN `komoditas` AS `c` ON `a`.`komoditas` = `c`.`id`
GROUP BY `a`.`kategori`, `a`.`tahun`
ORDER BY `a`.`kategori` ASC
 LIMIT 25
ERROR - 2021-04-22 13:57:39 --> 404 Page Not Found: /index
ERROR - 2021-04-22 13:57:41 --> Query error: Not unique table/alias: 'b' - Invalid query: SELECT `a`.`tahun`, `a`.`kategori`, `b`.`nama_desa`, `b`.`nama_kecamatan`, `c`.`komoditas`
FROM `tanaman_pangan` AS `a`
JOIN `master_wilayah` as `b` ON `a`.`desa` = `b`.`kode_desa`
INNER JOIN `master_wilayah` as `b` ON `a`.`kecamatan` = `b`.`no_kec`
INNER JOIN `komoditas` AS `c` ON `a`.`komoditas` = `c`.`id`
GROUP BY `a`.`kategori`, `a`.`tahun`
ORDER BY `a`.`kategori` ASC
 LIMIT 25
ERROR - 2021-04-22 14:00:04 --> Query error: Unknown column 'a.tahun' in 'field list' - Invalid query: SELECT `a`.`tahun`, `a`.`kategori`, `b`.`nama_desa`, `b`.`nama_kecamatan`, `c`.`komoditas`
FROM `tanaman_pangan` AS `aa`
INNER JOIN `master_wilayah` as `b` ON `a`.`desa` = `b`.`kode_desa`
INNER JOIN `master_wilayah` as `d` ON `a`.`kecamatan` = `d`.`no_kec`
INNER JOIN `komoditas` AS `c` ON `a`.`komoditas` = `c`.`id`
GROUP BY `a`.`kategori`, `a`.`tahun`
ORDER BY `a`.`kategori` ASC
 LIMIT 25
ERROR - 2021-04-22 14:00:38 --> Query error: Unknown column 'a.tahun' in 'field list' - Invalid query: SELECT `a`.`tahun`, `a`.`kategori`, `b`.`nama_desa`, `b`.`nama_kecamatan`, `c`.`komoditas`
FROM `tanaman_pangan` AS `aa`
JOIN `master_wilayah` as `b` ON `a`.`desa` = `b`.`kode_desa`
INNER JOIN `komoditas` AS `c` ON `a`.`komoditas` = `c`.`id`
GROUP BY `a`.`kategori`, `a`.`tahun`
ORDER BY `a`.`kategori` ASC
 LIMIT 25
ERROR - 2021-04-22 14:02:10 --> Query error: Unknown column 'a.tahun' in 'field list' - Invalid query: SELECT `a`.`tahun`, `a`.`kategori`, `b`.`nama_desa`, `b`.`nama_kecamatan`, `c`.`komoditas`
FROM `tanaman_pangan` AS `aa`
INNER JOIN `master_wilayah` as `b` ON `a`.`desa` = `b`.`kode_desa` AND `a`.`kecamatan` = `b`.`no_kec`
INNER JOIN `komoditas` AS `c` ON `a`.`komoditas` = `c`.`id`
GROUP BY `a`.`kategori`, `a`.`tahun`
ORDER BY `a`.`kategori` ASC
 LIMIT 25
ERROR - 2021-04-22 14:27:19 --> Severity: Notice --> Trying to get property 'id_produk' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 32
ERROR - 2021-04-22 14:27:19 --> Severity: Notice --> Trying to get property 'store_id' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 33
ERROR - 2021-04-22 14:27:19 --> Severity: Notice --> Trying to get property 'nama_produk' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 43
ERROR - 2021-04-22 14:27:19 --> Severity: Notice --> Trying to get property 'nama_produk' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 51
ERROR - 2021-04-22 14:27:19 --> Severity: Notice --> Trying to get property 'stock' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 61
ERROR - 2021-04-22 14:27:19 --> Severity: Notice --> Trying to get property 'satuan' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 69
ERROR - 2021-04-22 14:27:19 --> Severity: Notice --> Trying to get property 'harga' of non-object C:\xampp\htdocs\pertanian\application\modules\backend\views\produk\v_edit.php 77
