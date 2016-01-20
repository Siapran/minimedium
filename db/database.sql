create database if not exists minimedium character set utf8 collate utf8_unicode_ci;
use minimedium;

grant all privileges on minimedium.* to 'minimedium_user'@'localhost' identified by 'secret';
