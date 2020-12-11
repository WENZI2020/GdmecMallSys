# Host: 127.0.0.1  (Version: 5.5.53)
# Date: 2020-12-03 17:07:09
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "category1s"
#

CREATE TABLE `category1s` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `contents` varchar(255) DEFAULT NULL COMMENT '目录',
  `unit1` varchar(255) DEFAULT NULL COMMENT '单元',
  `unit2` varchar(255) DEFAULT NULL COMMENT '单元',
  `unit3` varchar(255) DEFAULT NULL COMMENT '单元',
  `unit4` varchar(255) DEFAULT NULL COMMENT '单元',
  `unit5` varchar(255) DEFAULT NULL COMMENT '单元',
  `unit6` varchar(255) DEFAULT NULL COMMENT '单元',
  `unit7` varchar(255) DEFAULT NULL COMMENT '单元',
  `unit8` varchar(255) DEFAULT NULL COMMENT '单元',
  `unit9` varchar(255) DEFAULT NULL COMMENT '单元',
  `unit10` varchar(255) DEFAULT NULL COMMENT '单元',
  `unit11` varchar(255) DEFAULT NULL COMMENT '单元',
  `unit12` varchar(255) DEFAULT NULL COMMENT '单元',
  `unit13` varchar(255) DEFAULT NULL COMMENT '单元',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='分类';

#
# Data for table "category1s"
#

INSERT INTO `category1s` VALUES (1,NULL,NULL,'电脑数码','手机通讯','摄影摄像','数码配件','软件应用','虚拟产品','存储设备','影音播放','电脑整机','电脑外设','网络设备','电脑配件','智能设备','电脑数码包'),(2,NULL,NULL,'游戏','游戏软件','游戏硬件',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,NULL,NULL,'家用电器','大家电','厨卫大电','生活电器','厨房小电','个护健康',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,NULL,NULL,'运动户外','运动服饰','户外服饰','户外装备','体育项目','运动鞋袜','运动器材','户外鞋袜',NULL,NULL,NULL,NULL,NULL,NULL),(5,NULL,NULL,'服饰鞋包','男装','女装','男鞋','女鞋','男包','女包','服装配饰','功能箱包','家居内衣',NULL,NULL,NULL,NULL),(6,NULL,NULL,'个护化妆','面部护理','身体护理','女性护理','男性护理','彩妆产品','口腔护理','美发护发','眼睛护理',NULL,NULL,NULL,NULL,NULL),(7,NULL,NULL,'母婴用品','奶粉','童车童床','营养辅食','婴儿家纺','尿裤湿巾','婴儿安全用品','喂养用品','童装','洗护用品','婴儿服饰','婴儿玩具','孕产妇用品',NULL),(8,NULL,NULL,'日用百货','宠物用品','厨房用具','生活用品','成人用品','家居清洁',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,NULL,NULL,'食品生鲜','酒类','水饮','冲调饮品','粮油调味','生鲜食品','有机食品','休闲食品','节日食品',NULL,NULL,NULL,NULL,NULL),(10,NULL,NULL,'配饰腕表','钟','手表','珠宝首饰',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,NULL,NULL,'图书影像','音像制品','图书杂志','电子书刊',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,NULL,NULL,'玩模乐器','玩具','模型','乐器','动漫周边',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,NULL,NULL,'办公设备','办公仪器','文具用品',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,NULL,NULL,'家居家装','家装主材','鲜花园艺','五金电工','住宅家具','灯具灯饰','家纺布艺','家居饰品',NULL,NULL,NULL,NULL,NULL,NULL),(15,NULL,NULL,'汽车消费','汽车整车','汽车服务','维修保养','车载电器','汽车装饰','美容清洁','安全自驾','摩托相关',NULL,NULL,NULL,NULL,NULL),(16,NULL,NULL,'金融服务','消费金融','投资理财','保险','众筹','其他金融',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,NULL,NULL,'旅游出行','国外旅游','国内旅游','出行必备','旅游周边',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,NULL,NULL,'文化娱乐','在线教育','其他文化娱乐','文娱会员服务','票务',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,NULL,NULL,'房产置业','新房','二手房','租房','海外置业','其他房产置业',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(20,NULL,NULL,'健康服务','皮肤管理','口腔健康','运动健康','妇婴健康','养老相关','素质提升',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,NULL,NULL,'艺术收藏','艺术品','拍卖',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
