/*
Navicat MySQL Data Transfer

Source Server         : 1测试地址
Source Server Version : 50051
Source Host           : 211.149.191.186:3306
Source Database       : lhnwl

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2017-10-10 13:42:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for book
-- ----------------------------
DROP TABLE IF EXISTS `book`;
CREATE TABLE `book` (
  `id` int(11) NOT NULL auto_increment,
  `id_re` int(11) default '0',
  `subject` varchar(100) default NULL,
  `body` longtext,
  `name` varchar(50) default NULL,
  `company` varchar(100) default NULL,
  `wtime` int(20) default NULL,
  `ip` varchar(50) default NULL,
  `email` varchar(50) default NULL,
  `pass` tinyint(2) default '0',
  `huifu` tinyint(2) default '0',
  `chakan` tinyint(2) default '0',
  `tel` varchar(20) NOT NULL default '',
  `address` varchar(200) default NULL,
  `fax` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of book
-- ----------------------------

-- ----------------------------
-- Table structure for cp_co
-- ----------------------------
DROP TABLE IF EXISTS `cp_co`;
CREATE TABLE `cp_co` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `lm` int(10) unsigned NOT NULL default '0',
  `title` varchar(100) default NULL,
  `color_font` varchar(50) default NULL,
  `uselink` varchar(50) default NULL,
  `linkurl` varchar(100) default NULL,
  `info_from` varchar(50) default NULL,
  `info_author` varchar(50) default NULL,
  `title_key` varchar(5000) default NULL,
  `title_tion` varchar(5000) default NULL,
  `f_body` longtext,
  `z_body` longtext,
  `img_sl` varchar(50) default NULL,
  `hot` tinyint(1) unsigned default '0',
  `tuijian` tinyint(1) unsigned default '0',
  `pass` tinyint(1) unsigned default '0',
  `wtime` int(20) unsigned NOT NULL,
  `ip` varchar(20) default NULL,
  `read_num` int(4) unsigned default '0',
  `toptime` int(20) unsigned NOT NULL,
  `px` int(4) unsigned NOT NULL default '100',
  PRIMARY KEY  (`id`),
  KEY `lm` (`lm`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cp_co
-- ----------------------------

-- ----------------------------
-- Table structure for cp_lm
-- ----------------------------
DROP TABLE IF EXISTS `cp_lm`;
CREATE TABLE `cp_lm` (
  `id_lm` int(11) unsigned NOT NULL auto_increment,
  `fid` int(10) unsigned default '0',
  `title_lm` varchar(50) NOT NULL,
  `add_xx` tinyint(1) unsigned default '1',
  `xia` tinyint(1) unsigned default '1',
  `uselink` tinyint(1) unsigned default '0',
  `info_from` tinyint(1) unsigned default '0',
  `f_body` tinyint(1) unsigned default '0',
  `z_body` tinyint(1) unsigned default '0',
  `img_sl` tinyint(1) unsigned default '0',
  `px` int(11) unsigned default '100',
  PRIMARY KEY  (`id_lm`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cp_lm
-- ----------------------------

-- ----------------------------
-- Table structure for info_co
-- ----------------------------
DROP TABLE IF EXISTS `info_co`;
CREATE TABLE `info_co` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `lm` int(10) unsigned NOT NULL default '0',
  `title` varchar(200) default NULL,
  `color` varchar(200) default NULL,
  `linkurl` varchar(200) default NULL,
  `info_author` varchar(200) default NULL,
  `f_body` longtext,
  `z_body` longtext,
  `img_sl` varchar(50) default NULL,
  `hot` tinyint(1) unsigned default '0',
  `tuijian` tinyint(1) unsigned default '0',
  `pass` tinyint(1) unsigned default '0',
  `wtime` int(20) unsigned NOT NULL,
  `ip` varchar(20) default NULL,
  `read_num` int(5) unsigned default '0',
  `toptime` int(20) unsigned NOT NULL,
  `px` int(5) unsigned NOT NULL default '100',
  `e_title` varchar(200) default NULL,
  `keywords` varchar(2000) default NULL,
  `description` varchar(2000) default NULL,
  `bimg_sl` varchar(100) default NULL,
  PRIMARY KEY  (`id`),
  KEY `lm` (`lm`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of info_co
-- ----------------------------
INSERT INTO `info_co` VALUES ('1', '8', '入库', null, '', null, '客户把退货从Amazon FBA仓库或者从消费者手中直接退货我们处理中心。自动化的API对接系统让退货从Amazon 仓库的退货仔细核对，减少人为错误，提高效率。', '', 'attach/201708/1502674801077936181.jpg', '0', '0', '1', '1502703583', '127.0.0.1', '0', '1502703601', '100', '', '', '', null);
INSERT INTO `info_co` VALUES ('2', '8', '检查', null, '', null, '包括对退货的外观，包装，配件的检查。确保包装合乎要求，配件齐全。', '', 'attach/201708/1502674819249643542.jpg', '0', '0', '1', '1502703601', '127.0.0.1', '0', '1502703619', '100', '', '', '', null);
INSERT INTO `info_co` VALUES ('3', '8', '测试', null, '', null, '从消费者使用的角度检测产品各个方面的功能，确保产品工作正常。', '', 'attach/201708/1502674838386813177.jpg', '0', '0', '1', '1502703620', '127.0.0.1', '0', '1502703638', '100', '', '', '', null);
INSERT INTO `info_co` VALUES ('4', '8', '维修', null, '', null, '如果产品未通过功能测试，我们的技术人员会按照产品的设计要求和客户需要提供维修服务。', '', 'attach/201708/1502674864394473855.jpg', '0', '0', '1', '1502703639', '127.0.0.1', '0', '1502703664', '100', '', '', '', null);
INSERT INTO `info_co` VALUES ('5', '8', '翻新', null, '', null, '所有通过测试的产品经过我们重新清洁，封袋，包装以后，按照产品的实际成色标注，方便客户重新销售。', '', 'attach/201708/1502674888512303804.jpg', '0', '0', '1', '1502703665', '127.0.0.1', '0', '1502703688', '100', '', '', '', null);
INSERT INTO `info_co` VALUES ('6', '8', '仓储和发货', null, '', null, '按照客户要求，经过处理的退货可以直接寄回给Amazon 仓库FBA，或者由我们仓库直接寄到消费者或者客户指定的收货方。', '', 'attach/201708/1502674907505108994.jpg', '0', '0', '1', '1502703688', '127.0.0.1', '0', '1502703707', '100', '', '', '', null);
INSERT INTO `info_co` VALUES ('7', '8', '清算和回收', null, '', null, '对于没有处理价值的产品，客户可以选择由我们让专业回收公司处理。', '', 'attach/201708/1502674925325626994.jpg', '0', '0', '1', '1502703708', '127.0.0.1', '0', '1502703725', '100', '', '', '', null);
INSERT INTO `info_co` VALUES ('8', '9', '售后服务', null, '', null, '', '<div class=\"list_p\">\r\n	无论是零售商抑或生产商，成熟的售后服务，包括客服，技术支持，质保条款极大影响了品牌的口碑和用户体验。在电子商务时代，毁掉一个品牌和一款产品也许只需要几个客户的差评。蓝海逆物流售后服务部门帮你提供综合售后服务，包括客服、远程技术支持以及质保维修等一揽子解决方案。\r\n</div>', 'attach/201708/1502740698862851727.jpg', '0', '0', '1', '1502769462', '127.0.0.1', '0', '1502769559', '100', '', '', '', null);
INSERT INTO `info_co` VALUES ('9', '9', '服务流程', null, '', null, '', '<div class=\"list_p\"> 每个客户在自己的账号下面可以直接找到我们售后服务的页面。客户可以通过其他平台的聊天工具把我们售后服务的页面链接发送给客户，或者可以把我们售后服务的产品页直接附在每个订单内，引导消费者直接到我们的网站寻求服务。 </div>\r\n                            <div class=\"list_p\"> 最终消费者可以直接在我们的售后服务网页上，提交包括技术支持，在线客服，退货请求以及维修请求。无论我们的客户是零售商或者产品生产商，都可以使用我们售后服务模块，让消费者直接和我们的专业团队对话，解决消费者的困扰，提升购物体验和品牌口碑。</div>\r\n                            <div class=\"list_p\"> 每个消费者的客服记录都会保存在客户的账号下，方便客户回访，也可以用来分析消费者对产品和品牌的反馈和建议。</div>', 'attach/201708/1502740787745887243.jpg', '0', '0', '1', '1502769562', '127.0.0.1', '0', '1502769587', '100', '', '', '', null);
INSERT INTO `info_co` VALUES ('10', '10', '延期质保', null, '', null, '', '<div class=\"dec\">\r\n	我们可以帮助客户提供额外时限的第三方质保。不管是新产品的一年标准质保，或者是翻新产品的90天质保，抑或是客户自定义的质保期限，我们都可以提供专业的第三方质保，包括客服，技术支持，维修和寄还给消费者。消费者可以使用我们的技术支持模块，方便快捷的在线申请技术支持和维修。\r\n</div>\r\n<div class=\"dec\">\r\n	消费者在购买新产品是都期待能够有一年免费的质保维护。然而很多第三方零售商并不是主流品牌的授权经销商，造成厂商质保不足一年或者厂商拒绝承担非授权经销商的质保义务。蓝海逆物流完全可以帮助这些零售商承担质保服务。\r\n</div>\r\n<div class=\"dec\">\r\n	翻新产品的质保时限虽然只有90天，但是各个翻新产品的质保只能依赖于零售商自己而不是生产商。零售商受限于团队和技术力量，往往难以提供令客户满意的服务质量，带来消费者不满以及由此引发的平台经营风险。\r\n</div>', 'attach/201708/1502747155492638097.jpg', '0', '0', '1', '1502769589', '127.0.0.1', '0', '1502775955', '100', '', '', '', null);
INSERT INTO `info_co` VALUES ('11', '11', '仓储物流', null, '', null, '', '<div class=\"list_p\">\r\n	蓝海逆物流团队拥有接近10年运营美国电子商务公司的自有仓储的经验。从14年底开始，我们为使用我们退货管理的客户管理退货库存，利用自主开发的系统定位超过一万个精确到序列号的产品。\r\n</div>\r\n<div class=\"list_p\">\r\n	我们的仓储物流服务包括：\r\n</div>\r\n<div class=\"list_p\">\r\n	<table width=\"100%\" border=\"1\">\r\n		<tbody>\r\n			<tr>\r\n				<td class=\"a20\">\r\n					*退货预报\r\n				</td>\r\n				<td class=\"a20\">\r\n					*运单管理\r\n				</td>\r\n				<td class=\"a20\">\r\n					*退货转运\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td class=\"a20\">\r\n					*一键FBA\r\n				</td>\r\n				<td class=\"a20\">\r\n					*包裹入库\r\n				</td>\r\n				<td class=\"a20\">\r\n					*货物上架\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td class=\"a20\">\r\n					*货架管理\r\n				</td>\r\n				<td class=\"a20\">\r\n					*库存盘点\r\n				</td>\r\n				<td class=\"a20\">\r\n					*库存定位\r\n				</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n</div>\r\n<div class=\"list_p\">\r\n	通过与美国各地的仓储企业合作，利用遍布美国东部、中部和西部的仓库帮助客户完成正向物流的全美布局。客户可以借助我们的合作方的网络，迅速建立有效的物流网络。\r\n</div>', 'attach/201708/1502747525547366480.jpg', '0', '0', '1', '1502776271', '127.0.0.1', '0', '1502776325', '100', '', '', '', null);
INSERT INTO `info_co` VALUES ('12', '12', '报告分析', null, '', null, '', '<div class=\"dec\">\r\n	蓝海逆物流为客户提供多维、多角度专门针对退货管理的分析报告。既提供单个SKU的退货数量、比例、退货理由等微观分析报告，也提供整体退货数量、退货周期、技术问题分析等宏观分析报告。\r\n</div>\r\n<div class=\"dec\">\r\n	我们提供的分析报告覆盖整个逆物流供应链的每一个环节，从发起退货，到退货入库，到检测维修，再到重新回到市场，每一步都条理清晰，过程透明。<br />\r\n我们的分析报告可以帮助客户：<br />\r\n1）更好地追踪、核查退货记录，确保每个退货都以回到自己的库存<br />\r\n2）增加客户获取最大化退货价值<br />\r\n3）检查退货产生的可能原因并助力产品的迭代开发\r\n</div>\r\n<div class=\"dec\">\r\n	我们自主开发的系统能够提供以下报告：<br />\r\n1）入库报告<br />\r\n2）待测产品报告<br />\r\n3）待售库存<br />\r\n4）库存周期报告<br />\r\n5）出货报告\r\n</div>', 'attach/201708/1502747866963422358.jpg', '0', '0', '1', '1502776639', '127.0.0.1', '0', '1502776666', '100', '', '', '', null);
INSERT INTO `info_co` VALUES ('13', '3', '计费标准', null, '', null, '', '<p class=\"a96\">\r\n	关于计费标准的说明\r\n</p>\r\n<table width=\"100%\" border=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<th class=\"a99\">\r\n				服务内容\r\n			</th>\r\n			<td class=\"a100\">\r\n				说明\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th class=\"a99\">\r\n				换标重发\r\n			</th>\r\n			<td class=\"a100\">\r\n				客户可以把货物直接退回到我们仓库。利用我们的库存管理系统，精确管理每一次退货，并且一键换标重发。\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th class=\"a99\">\r\n				包装配件检查\r\n			</th>\r\n			<td class=\"a100\">\r\n				在重新贴标重发的服务基础上，我们可以帮助客户检查每个产品的包装是否完整，包装打开的情況下，配件是否齐全，产品是否依然崭新。如果只是包装有破损，我们可以帮忙重新封装。\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th class=\"a99\">\r\n				通电检查\r\n			</th>\r\n			<td class=\"a100\">\r\n				对于某些低价值的产品，仅仅需要通电开机即能找出大部分有问题的产品。在控制成本的前提下，依然可以保证退货的质量。\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th class=\"a99\">\r\n				功能检查\r\n			</th>\r\n			<td class=\"a100\">\r\n				这一服务适用于高价值的退货。我们会对这类产品实行全方位的功能检查，维修，质保，重新清洁，装袋，封箱等完整的流程，最大化实现退货的价值。\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	<br />\r\n</p>\r\n<p class=\"a96\">\r\n	关于尺寸和价格的说明\r\n</p>\r\n<table width=\"100%\" border=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<th class=\"a98\">\r\n				服务内容\r\n			</th>\r\n			<td class=\"a101\">\r\n				标准尺寸小型\r\n			</td>\r\n			<td class=\"a101\">\r\n				标准尺寸大型\r\n			</td>\r\n			<td class=\"a101\">\r\n				超大尺寸小型\r\n			</td>\r\n			<td class=\"a101\">\r\n				超大尺寸大型\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th class=\"a98\">\r\n				换标重发\r\n			</th>\r\n			<td class=\"a101\">\r\n				$0.80\r\n			</td>\r\n			<td class=\"a101\">\r\n				$1.00\r\n			</td>\r\n			<td class=\"a101\">\r\n				$1.60\r\n			</td>\r\n			<td class=\"a101\">\r\n				$3.00\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th class=\"a98\">\r\n				包装配件检查\r\n			</th>\r\n			<td class=\"a101\">\r\n				$2.00\r\n			</td>\r\n			<td class=\"a101\">\r\n				$2.60\r\n			</td>\r\n			<td class=\"a101\">\r\n				$3.00\r\n			</td>\r\n			<td class=\"a101\">\r\n				$3.60\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th class=\"a98\">\r\n				通电检查\r\n			</th>\r\n			<td class=\"a101\">\r\n				$4.00\r\n			</td>\r\n			<td class=\"a101\">\r\n				$5.00\r\n			</td>\r\n			<td class=\"a101\">\r\n				$7.00\r\n			</td>\r\n			<td class=\"a101\">\r\n				$9.00\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th class=\"a98\">\r\n				功能检查\r\n			</th>\r\n			<td class=\"a101\">\r\n				$12.00\r\n			</td>\r\n			<td class=\"a101\">\r\n				$16.00\r\n			</td>\r\n			<td class=\"a101\">\r\n				$23.00\r\n			</td>\r\n			<td class=\"a101\">\r\n				$26.00\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	<br />\r\n</p>\r\n<p class=\"a96\">\r\n	尺寸的等级\r\n</p>\r\n<table width=\"100%\" border=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<th class=\"a97\">\r\n				尺寸等级\r\n			</th>\r\n			<td class=\"a102\">\r\n				重量上限\r\n			</td>\r\n			<td class=\"a102\">\r\n				最长边上限\r\n			</td>\r\n			<td class=\"a102\">\r\n				中间边上限\r\n			</td>\r\n			<td class=\"a102\">\r\n				最短边上限\r\n			</td>\r\n			<td class=\"a102\">\r\n				长+宽上限\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th class=\"a97\">\r\n				标准尺寸小型\r\n			</th>\r\n			<td class=\"a102\">\r\n				12oz.\r\n			</td>\r\n			<td class=\"a102\">\r\n				15\"\r\n			</td>\r\n			<td class=\"a102\">\r\n				12\"\r\n			</td>\r\n			<td class=\"a102\">\r\n				0.75”\r\n			</td>\r\n			<td class=\"a102\">\r\n				n/a\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th class=\"a97\">\r\n				标准尺寸大型\r\n			</th>\r\n			<td class=\"a102\">\r\n				20lb.\r\n			</td>\r\n			<td class=\"a102\">\r\n				18\"\r\n			</td>\r\n			<td class=\"a102\">\r\n				14\"\r\n			</td>\r\n			<td class=\"a102\">\r\n				8”\r\n			</td>\r\n			<td class=\"a102\">\r\n				n/a\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th class=\"a97\">\r\n				超大尺寸小型\r\n			</th>\r\n			<td class=\"a102\">\r\n				40lb.\r\n			</td>\r\n			<td class=\"a102\">\r\n				60\"\r\n			</td>\r\n			<td class=\"a102\">\r\n				30\"\r\n			</td>\r\n			<td class=\"a102\">\r\n				n/a\r\n			</td>\r\n			<td class=\"a102\">\r\n				120”\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th class=\"a97\">\r\n				超大尺寸大型\r\n			</th>\r\n			<td class=\"a102\">\r\n				70lb.\r\n			</td>\r\n			<td class=\"a102\">\r\n				108\"\r\n			</td>\r\n			<td class=\"a102\">\r\n				n/a\r\n			</td>\r\n			<td class=\"a102\">\r\n				n/a\r\n			</td>\r\n			<td class=\"a102\">\r\n				130\"\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	<br />\r\n</p>', null, '0', '0', '1', '1502777200', '127.0.0.1', '0', '1502777321', '100', '', '计费标准', '计费标准', null);
INSERT INTO `info_co` VALUES ('14', '3', '产品类别', null, '', null, '', '<p class=\"a96\">\r\n	产品类别\r\n</p>\r\n<table width=\"100%\" border=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<th class=\"a10\">\r\n				通电检查和功能检查产品类别\r\n			</th>\r\n			<td class=\"a11\">\r\n				说明\r\n			</td>\r\n			<td class=\"a12\">\r\n				全功能检查价格（$）\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th class=\"a10\">\r\n				电脑类\r\n			</th>\r\n			<td class=\"a11\">\r\n				包括主流各大电脑品牌，例如惠普，联想，华硕，宏基，苹果，微软，三星，东芝等，及其他自有品牌。\r\n			</td>\r\n			<td class=\"a12\">\r\n				16-26\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th class=\"a10\">\r\n				显示器\r\n			</th>\r\n			<td class=\"a11\">\r\n				各个尺寸的电脑显示器和电视。\r\n			</td>\r\n			<td class=\"a12\">\r\n				12-15\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th class=\"a10\">\r\n				平板，手机类\r\n			</th>\r\n			<td class=\"a11\">\r\n				涵盖安卓，微软，苹果三大操作系统的手机和平板。\r\n			</td>\r\n			<td class=\"a12\">\r\n				12-16\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th class=\"a10\">\r\n				耳机类\r\n			</th>\r\n			<td class=\"a11\">\r\n				有线耳机，蓝牙耳机，游戏耳机等\r\n			</td>\r\n			<td class=\"a12\">\r\n				6-12\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th class=\"a10\">\r\n				硬盘类\r\n			</th>\r\n			<td class=\"a11\">\r\n				2.5寸和3.5寸的内部使用和外部使用的台式机硬盘，笔记本硬盘，便携式硬盘\r\n			</td>\r\n			<td class=\"a12\">\r\n				6-10\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th class=\"a10\">\r\n				家用电器\r\n			</th>\r\n			<td class=\"a11\">\r\n				主要包括家用小电器，如咖啡机，搅拌机，加湿器，电话机等\r\n			</td>\r\n			<td class=\"a12\">\r\n				12-20\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th class=\"a10\">\r\n				家用安全监控系统\r\n			</th>\r\n			<td class=\"a11\">\r\n				家用带摄像头的安全警报系统。包括有线和无线摄像头。\r\n			</td>\r\n			<td class=\"a12\">\r\n				18-26\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th class=\"a10\">\r\n				游戏机\r\n			</th>\r\n			<td class=\"a11\">\r\n				包括主流三大游戏机生产商微软，任天堂和Playstation。 xbox，nintendo，PS4和手掌游戏机\r\n			</td>\r\n			<td class=\"a12\">\r\n				16-20\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th class=\"a10\">\r\n				配件\r\n			</th>\r\n			<td class=\"a11\">\r\n				需要通电的电子配件，包括充电宝，带电源的手机壳等需要通电检测的配件\r\n			</td>\r\n			<td class=\"a12\">\r\n				6-10\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th class=\"a10\">\r\n				智能玩具\r\n			</th>\r\n			<td class=\"a11\">\r\n				包括需要安装电池，安装手机APP或者需要调试的智能玩具\r\n			</td>\r\n			<td class=\"a12\">\r\n				6-10\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	<br />\r\n</p>', null, '0', '0', '1', '1502777322', '127.0.0.1', '0', '1502777360', '100', '', '产品类别', '产品类别', null);
INSERT INTO `info_co` VALUES ('15', '13', '电子商务零售商', null, '', null, '', '<div class=\"list_p\">\r\n	随着网上购物的兴起和快速发展，各大电子商务平台以及大的卖家越来越倾向于提供友好的退货政策。统计数据显示，美国电子商务总体退货率达到惊人的30%，而实体店的退货率只有四分之一，为8.9%。对于电子商务卖家，如何有效处理客户退货，最大限度的重新卖出退货，并从退货中获取最大价值直接决定了各个卖家的最终利润率。\r\n</div>\r\n<div class=\"list_p\">\r\n	虽然美国市场电子商务市场成长非常迅速，平均以每年15%-16%的速度增长，而美国总体的零售市场在2016年只是成长了2.2%， 但是电子商务零售商的数量也增长更加迅速。各个零售商已经面临越来越多的新的竞争以及其他方面的压力，退货处理是影响整体竞争力的关键因素。\r\n</div>\r\n<div class=\"list_p\">\r\n	统计数据显示，美国电子商务零售商的平均净利润率只有2.5%-3.5%之间。 如果能够从退货中多获取10%的剩余价值，那么对净利润率的影响也是巨大的。\r\n</div>', 'attach/201708/1502751467983115446.jpg', '0', '0', '1', '1502780206', '127.0.0.1', '0', '1502780267', '100', '', '', '', null);
INSERT INTO `info_co` VALUES ('16', '13', '蓝海逆物流的退货管理和售后服务', null, '', null, '', '<div class=\"list_p\"> 退货管理是我们推出的专门解决电子商务零售商退货处理的综合解决方案。零售商无论是在第三方销售平台，包括Amazon，eBay，Walmart等，或者在自营网站产生的退货，可以直接发货到我们的处理中心。我们根据客户预设的处理计划，利用我们为电子商务零售商量身定制的操作系统，对线上销售产生的退货实现最大化的测试翻新。 客户只需要付一个很小比例的费用，就可以把杂乱的退货由我们转化成可以继续销售的库存。</div>\r\n                            <div class=\"list_p\"> 售后服务：最终消费者可以通过我们网页来寻求在线技术支持，退货，送修等，不需要零售商在此花费过多人力和时间。如果消费者需要退货或者送修，他们可以直接在我们网页打印退货运单。所有的记录都会同时收集显示在客户的账户下，方便客户分析问题，改进产品。</div>', 'attach/201708/1502751493862697216.jpg', '0', '0', '1', '1502780268', '127.0.0.1', '0', '1502780293', '100', '', '', '', null);
INSERT INTO `info_co` VALUES ('17', '14', '生产商', null, '', null, '', '<div class=\"list_p\">\r\n	如果您想在北美市场销售自由品牌的产品，或者您已经在北美市场开拓了一些市场，但是苦于没有自己的售后团队，那么蓝海科技是您理想的合作伙伴。\r\n</div>\r\n<div class=\"list_p\">\r\n	完善的客服和售后厂商质保在北美市场尤其重要。北美消费者对于品牌的信任度和口碑很多时候取决于售后服务。在电子商务时代，一个简单的一星差评足以在早期毁掉一个品牌。\r\n</div>\r\n<div class=\"list_p\">\r\n	蓝海科技拥有专业的技术团队，客服团队和系统开发团队。无论是产品的技术支持还是生产商质保，我们都可以提供一站式服务。消费者可以在我们客服网页直接对话我们的技术团队，获取远程协助。消费者也可以利用我们整合了物流模块的系统寄修需要维修的产品。\r\n</div>', 'attach/201708/1502751525025056964.jpg', '0', '0', '1', '1502780294', '127.0.0.1', '0', '1502780325', '100', '', '', '', null);
INSERT INTO `info_co` VALUES ('18', '15', '公司简介', null, '办公环境', null, '<p>\r\n	蓝海逆物流是北美领先的集退货处理，仓储物流与售后支持于一身的第三方服务提供商。我们专注于为第三方电子商务卖家以及生产商提供一站式反向物流服务。我们坚持以客户为本，持续优化创新，利用自动化系统、成熟的流程和高水平的团队，完整解决客户的反向物流的难题。域，并推动其轻量化发展。\r\n</p>\r\n<p style=\"border-top:1px dotted #ccc;margin-top:30px;margin-bottom:10px;\">\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style=\"font-size:16px;\"></span>蓝海逆物流总部位于美国俄勒冈州波特兰市，并在美国加州洛杉矶市和特拉华州分别建有仓储中心。经过两年多的快速发展，蓝海逆物流已经建立了一套成熟稳定的自动化退货处理流程和系统。公司总部现有员工四十多名，包括仓储、测试、维修以及技术支持团队。\r\n</p>\r\n<p style=\"border-top:1px dotted #ccc;margin-top:30px;margin-bottom:10px;\">\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style=\"font-size:16px;\"></span> \r\n</p>\r\n<p>\r\n	除了亚马逊FBA退货换标、入库重发等基本服务，蓝海逆物流尤其精通高附加值商品，比如电子产品、电脑、平板、手机和家电等品类的测试，维修以及售后客服支持。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>', '<p style=\"text-align:left;\">\r\n	蓝海逆物流总部位于美国俄勒冈州波特兰市，并在美国加州洛杉矶市和特拉华州分别建有仓储中心。经过两年多的快速发展，蓝海逆物流已经建立了一套成熟稳定的自动化退货处理流程和系统。公司总部现有员工四十多名，包括仓储、测试、维修以及技术支持团队。\r\n</p>', 'attach/201708/1502752831595453648.jpg', '0', '0', '1', '1502781353', '127.0.0.1', '0', '1502782374', '100', '', '', '', null);
INSERT INTO `info_co` VALUES ('19', '16', '企业文化', null, '', null, '', '<p class=\"ti\">\r\n	蓝海逆物流始终坚守忠诚 感恩 敬业 坚韧 创新 进取的企业精神。\r\n</p>\r\n<div class=\"tx\">\r\n	【使命】：做有社会责任感的企业<br />\r\n【经营理念】：以客户为中心<br />\r\n【核心价值观】：共同利益，共同发展，共同收益，共同美好生活<br />\r\n【企业精神】：忠诚 感恩 敬业 坚韧 创新 进取<br />\r\n【行为准则】：忠诚豁达、积极向上、恪守职责、是非分明<br />\r\n【人才观】：踏实、肯干、聪明、能干\r\n</div>', 'attach/201708/1502752898693275402.jpg', '0', '0', '1', '1502781632', '127.0.0.1', '0', '1502781698', '100', 'company culture', '', '', null);
INSERT INTO `info_co` VALUES ('20', '17', '联系我们', null, '仓储中心和客服中心', null, '<div class=\"title\">\r\n	总部\r\n</div>\r\n<div class=\"dec\">\r\n	美国俄勒冈州波特兰市\r\n</div>\r\n<div class=\"dec\">\r\n	地址：9564 SW Tualatin Rd， Tualatin， OR 97062， USA\r\n</div>\r\n<div class=\"dec\">\r\n	邮箱：support@blueoceancenter.com\r\n</div>\r\n<div class=\"dec\">\r\n	电话：+001 408-520-4233\r\n</div>\r\n<div class=\"dec\">\r\n	传真：408-520-4294\r\n</div>', '<div class=\"beij\">\r\n	<div class=\"beij_box\">\r\n		<div class=\"title\">\r\n			仓储中心\r\n		</div>\r\n		<div class=\"lxfs\">\r\n			<div class=\"dizhi\">\r\n				<i class=\"tubiao\"></i>地址：美国特拉华州\r\n			</div>\r\n			<div class=\"tel\">\r\n				<i class=\"tubiao\"></i>电话：+001 408-520-4233\r\n			</div>\r\n			<div class=\"mail\">\r\n				<i class=\"tubiao\"></i>邮箱：support@blueoceancenter.com\r\n			</div>\r\n			<div class=\"chuanzhen\">\r\n				<i class=\"tubiao\"></i>传真：408-520-429\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>\r\n<div class=\"xiang\">\r\n	<div class=\"xiang_box\">\r\n		<div class=\"title\">\r\n			客服中心\r\n		</div>\r\n		<div class=\"lxfs\">\r\n			<div class=\"dizhi\">\r\n				<i class=\"tubiao\"></i>地址：深圳市龙岗区平湖华南城\r\n			</div>\r\n			<div class=\"tel\">\r\n				<i class=\"tubiao\"></i>电话：+001 408-520-4233\r\n			</div>\r\n			<div class=\"mail\">\r\n				<i class=\"tubiao\"></i>邮箱：support@blueoceancenter.com\r\n			</div>\r\n			<div class=\"chuanzhen\">\r\n				<i class=\"tubiao\"></i>传真：408-520-429\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>', 'attach/201708/1502752977696085743.jpg', '0', '0', '1', '1502781699', '127.0.0.1', '0', '1502781777', '100', '', '', '', null);
INSERT INTO `info_co` VALUES ('21', '18', '高级招聘专员', '全职', '深圳龙岗', '大专及以上学历', '', '<h4>\r\n	职位描述：\r\n</h4>\r\n<p>\r\n	&nbsp;岗位职责：\r\n</p>\r\n<p>\r\n	1、根据公司需求及人员编制，制作招聘计划，完成空缺职位的招聘；\r\n</p>\r\n<p>\r\n	2、完善招聘制度和流程，根据公司业务发展情况，进行人力资源优化配置；\r\n</p>\r\n<p>\r\n	3、熟悉各种招聘渠道，进行招聘、甄选、面试、录用等工作，以及招聘效果评估；\r\n</p>\r\n<p>\r\n	4、及时有效的跟用人部门沟通、反馈招聘进度，保证用人部门满意度；\r\n</p>\r\n<p>\r\n	任职要求：\r\n</p>\r\n<p>\r\n	1、统招本科及以上学历，2年及以上招聘相关工作经验\r\n</p>\r\n<p>\r\n	2、熟悉中高端人才招聘，具有服装相关行业招聘工作经验或猎头经验者优先；\r\n</p>\r\n<p>\r\n	3、熟悉各种招聘渠道，掌握一定的社会招聘资源；具有主动搜索人才、挖掘人才的能力；\r\n</p>\r\n<p>\r\n	4、有较强的语言表达能力、沟通能力、组织协调能力；\r\n</p>\r\n<p>\r\n	5、有责任心，吃苦耐劳，能承受较大工作压力，可以接受较高强度的工作量；\r\n</p>', null, '0', '0', '1', '1502786867', '127.0.0.1', '0', '1502786948', '100', '1人', '', '', null);
INSERT INTO `info_co` VALUES ('22', '18', '商务专员', '全职', '深圳龙岗', '大专及以上学历', '', '<h4>\r\n	职位描述：\r\n</h4>\r\n<p>\r\n	&nbsp;岗位职责：\r\n</p>\r\n<p>\r\n	1、社交媒体广告业务销售，达到业绩目标；\r\n</p>\r\n<p>\r\n	2、通过电话、邮件、社交沟通应用软件与客户洽谈业务，了解客户合作意向，积极开发新客户；\r\n</p>\r\n<p>\r\n	3、负责合作可和产品合约的审核、方案的建议、合作的签订、合作后期的持续跟进与数据对接；\r\n</p>\r\n<p>\r\n	4、负责客户的信息反馈、投诉意见的处理，提供客户满意度；\r\n</p>\r\n<p>\r\n	5、负责建立并完善市场数据，负责收集整理相关行业数据和分析竞争者的信息；\r\n</p>\r\n<p>\r\n	6、定期做好客户回访工作，建立完善的客户管理系统，并及时归档资料、工作记录、客户信息等重要资源。\r\n</p>\r\n<p>\r\n	任职要求：\r\n</p>\r\n<p>\r\n	1、大专以上毕业生，有互联网销售经验可以优先；\r\n</p>\r\n<p>\r\n	2、具有较强的主动开发客户能力、沟通能力、协调能力；\r\n</p>\r\n<p>\r\n	3、具有良好的团队合作意识，较强学习能力；\r\n</p>\r\n<p>\r\n	4、欢迎有激情的应届毕业生加入。\r\n</p>', null, '0', '0', '1', '1502786949', '127.0.0.1', '0', '1502786996', '100', '2人', '', '', null);
INSERT INTO `info_co` VALUES ('23', '18', '客服专员', '全职', '深圳龙岗', '大专及以上学历', '', '<h4>\r\n	职位描述：\r\n</h4>\r\n<p>\r\n	&nbsp;岗位职责：\r\n</p>\r\n<p>\r\n	1、接听客户的咨询电话，给予客户专业的解说、指导与建议；\r\n</p>\r\n<p>\r\n	2、处理客户的邮件咨询，解决客户问题；\r\n</p>\r\n<p>\r\n	3、协调公司内部资料，提高客户满意度；\r\n</p>\r\n<p>\r\n	4、及时反馈客户情况，配合运营、销售与客服相关部门的工作等。\r\n</p>\r\n<p>\r\n	任职要求：\r\n</p>\r\n<p>\r\n	1、大专及以上学历，一年以上电子商务行业客服工作经验；\r\n</p>\r\n<p>\r\n	2、大学英语四级以上，英语读写优良；\r\n</p>\r\n<p>\r\n	3、熟练使用办公软件，电脑操作熟练；\r\n</p>\r\n<p>\r\n	4、服务意识强，具有良好的团队合作精神等。\r\n</p>', null, '0', '0', '1', '1502786997', '127.0.0.1', '0', '1502787041', '100', '1人', '', '', null);
INSERT INTO `info_co` VALUES ('24', '18', '电子商务ERP软件开发师', '全职', '深圳龙岗', '大专及以上学历', '', '                            <h4>职位描述：</h4>\r\n                            <p>&nbsp;岗位职责：</p>\r\n                            <p>1、负责外贸电子商务ERP系统各模块开发：产品、采购、FBA仓管理，系统管理模块等；</p>\r\n                            <p>2、负责梳理ERP的相关功能，不断优化系统流程，满足实际业务需要；</p>\r\n                            <p>3、负责电商平台的技术架构和概要设计，及时解决项目涉及到的技术问题。</p>\r\n                            <p>任职要求：</p>\r\n                            <p>1、熟悉Amazon，eBay，Fedex， UPS 等平台的API工具及二次开发。</p>\r\n                            <p>2、java语言基础扎实，精通java web语言，对java语言主要框架熟悉甚至精通(主要框架Spring MVC、JSP、servlet、javaScript、ejb、SSH等框架)，掌握HTTP协议，精通WEB Service、AJAX开发；</p>\r\n                            <p>3、熟悉掌握Sql、Mysql、、Redis、Oracle中1种或多种数据库开发；</p>\r\n                            <p>4、熟悉HTML,CSS,JS技术，熟悉DIV+CSS，具有较强的WEB页面程序处理能力；</p>\r\n                            <p>5、深刻理解面向对象设计、设计模式和常用的分布式运算架构模式。</p>', null, '0', '0', '1', '1502787042', '127.0.0.1', '0', '1502787087', '100', '1人', '', '', null);
INSERT INTO `info_co` VALUES ('25', '18', '高级招聘专员', '全职', '深圳龙岗', '大专及以上学历', '', '<h4>\r\n	职位描述：\r\n</h4>\r\n<p>\r\n	&nbsp;岗位职责：\r\n</p>\r\n<p>\r\n	1、根据公司需求及人员编制，制作招聘计划，完成空缺职位的招聘；\r\n</p>\r\n<p>\r\n	2、完善招聘制度和流程，根据公司业务发展情况，进行人力资源优化配置；\r\n</p>\r\n<p>\r\n	3、熟悉各种招聘渠道，进行招聘、甄选、面试、录用等工作，以及招聘效果评估；\r\n</p>\r\n<p>\r\n	4、及时有效的跟用人部门沟通、反馈招聘进度，保证用人部门满意度；\r\n</p>\r\n<p>\r\n	任职要求：\r\n</p>\r\n<p>\r\n	1、统招本科及以上学历，2年及以上招聘相关工作经验\r\n</p>\r\n<p>\r\n	2、熟悉中高端人才招聘，具有服装相关行业招聘工作经验或猎头经验者优先；\r\n</p>\r\n<p>\r\n	3、熟悉各种招聘渠道，掌握一定的社会招聘资源；具有主动搜索人才、挖掘人才的能力；\r\n</p>\r\n<p>\r\n	4、有较强的语言表达能力、沟通能力、组织协调能力；\r\n</p>\r\n<p>\r\n	5、有责任心，吃苦耐劳，能承受较大工作压力，可以接受较高强度的工作量；\r\n</p>', null, '0', '0', '1', '1502787088', '127.0.0.1', '0', '1502787137', '100', '1人', '', '', null);
INSERT INTO `info_co` VALUES ('26', '19', '蓝海物流与中国深圳成立客服和销售中心', '', '', '', '', ' <p style=\"TEXT-INDENT: 2em\">蓝海物流与中国深圳成立客服和销售中心，就近解决中国跨境电商的需求和服务。近日，蓝海逆物流举办男女混合拔河比赛，蓝海逆物流员工积极参与，派出两支队伍参加比赛，最终蓝海逆物流员工组成的蓝海一队成功夺冠。据悉，参加本次比赛的单位均为蓝海逆物流成员，比赛采取淘汰制，分两个阶段进行，第一阶段的前八名优胜队伍晋级到第二阶段进行半决赛和决赛</p>\r\n                    <p style=\"TEXT-INDENT: 2em\">近日，蓝海逆物流举办男女混合拔河比赛，蓝海逆物流员工积极参与，派出两支队伍参加比赛，最终蓝海逆物流员工组成的蓝海一队成功夺冠。据悉，参加本次比赛的单位均为蓝海逆物流成员，比赛采取淘汰制，分两个阶段进行，第一阶段的前八名优胜队伍晋级到第二阶段进行半决赛和决赛</p>\r\n                    <p>&nbsp;</p>\r\n                    <p style=\"TEXT-ALIGN: center\"><img src=\"http://www.blueoceancenter.net/images/n1.jpg\"/></p>\r\n                    <p>&nbsp;</p>\r\n                    <p style=\"TEXT-INDENT: 2em\">蓝海物流与中国深圳成立客服和销售中心，就近解决中国跨境电商的需求和服务。近日，蓝海逆物流举办男女混合拔河比赛，蓝海逆物流员工积极参与，派出两支队伍参加比赛，最终蓝海逆物流员工组成的蓝海一队成功夺冠。据悉，参加本次比赛的单位均为蓝海逆物流成员，比赛采取淘汰制，分两个阶段进行，第一阶段的前八名优胜队伍晋级到第二阶段进行半决赛和决赛</p>\r\n                    <p style=\"TEXT-INDENT: 2em\">近日，蓝海逆物流举办男女混合拔河比赛，蓝海逆物流员工积极参与，派出两支队伍参加比赛，最终蓝海逆物流员工组成的蓝海一队成功夺冠。据悉，参加本次比赛的单位均为蓝海逆物流成员，比赛采取淘汰制，分两个阶段进行，第一阶段的前八名优胜队伍晋级到第二阶段进行半决赛和决赛</p>\r\n                    <p>&nbsp;</p>', 'attach/201708/1502758483522138155.jpg', '0', '0', '1', '1502787149', '127.0.0.1', '0', '1502787283', '100', '蓝海逆物流', '蓝海物流与中国深圳成立客服和销售中心', '蓝海物流与中国深圳成立客服和销售中心', null);
INSERT INTO `info_co` VALUES ('27', '19', '上半年营业额同比增长120%', '', '', '', '', '<p style=\"text-indent:2em;\">\r\n	蓝海物流与中国深圳成立客服和销售中心，就近解决中国跨境电商的需求和服务。近日，蓝海逆物流举办男女混合拔河比赛，蓝海逆物流员工积极参与，派出两支队伍参加比赛，最终蓝海逆物流员工组成的蓝海一队成功夺冠。据悉，参加本次比赛的单位均为蓝海逆物流成员，比赛采取淘汰制，分两个阶段进行，第一阶段的前八名优胜队伍晋级到第二阶段进行半决赛和决赛\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	近日，蓝海逆物流举办男女混合拔河比赛，蓝海逆物流员工积极参与，派出两支队伍参加比赛，最终蓝海逆物流员工组成的蓝海一队成功夺冠。据悉，参加本次比赛的单位均为蓝海逆物流成员，比赛采取淘汰制，分两个阶段进行，第一阶段的前八名优胜队伍晋级到第二阶段进行半决赛和决赛\r\n</p>\r\n<p>\r\n	&nbsp;\r\n</p>\r\n<p style=\"text-align:center;\">\r\n	<img src=\"http://www.blueoceancenter.net/images/n1.jpg\" />\r\n</p>\r\n<p>\r\n	&nbsp;\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	蓝海物流与中国深圳成立客服和销售中心，就近解决中国跨境电商的需求和服务。近日，蓝海逆物流举办男女混合拔河比赛，蓝海逆物流员工积极参与，派出两支队伍参加比赛，最终蓝海逆物流员工组成的蓝海一队成功夺冠。据悉，参加本次比赛的单位均为蓝海逆物流成员，比赛采取淘汰制，分两个阶段进行，第一阶段的前八名优胜队伍晋级到第二阶段进行半决赛和决赛\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	近日，蓝海逆物流举办男女混合拔河比赛，蓝海逆物流员工积极参与，派出两支队伍参加比赛，最终蓝海逆物流员工组成的蓝海一队成功夺冠。据悉，参加本次比赛的单位均为蓝海逆物流成员，比赛采取淘汰制，分两个阶段进行，第一阶段的前八名优胜队伍晋级到第二阶段进行半决赛和决赛\r\n</p>\r\n<p>\r\n	&nbsp;\r\n</p>', 'attach/201708/1502758497066533614.jpg', '0', '0', '1', '1502787284', '127.0.0.1', '0', '1502787340', '100', '蓝海逆物流', '上半年营业额同比增长120%', '上半年营业额同比增长120%', null);
INSERT INTO `info_co` VALUES ('28', '19', '蓝海物流因业务增长需要，公司波特兰总部搬迁至新的办公室', '', '', '', '', '<p style=\"text-indent:2em;\">\r\n	蓝海物流与中国深圳成立客服和销售中心，就近解决中国跨境电商的需求和服务。近日，蓝海逆物流举办男女混合拔河比赛，蓝海逆物流员工积极参与，派出两支队伍参加比赛，最终蓝海逆物流员工组成的蓝海一队成功夺冠。据悉，参加本次比赛的单位均为蓝海逆物流成员，比赛采取淘汰制，分两个阶段进行，第一阶段的前八名优胜队伍晋级到第二阶段进行半决赛和决赛\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	近日，蓝海逆物流举办男女混合拔河比赛，蓝海逆物流员工积极参与，派出两支队伍参加比赛，最终蓝海逆物流员工组成的蓝海一队成功夺冠。据悉，参加本次比赛的单位均为蓝海逆物流成员，比赛采取淘汰制，分两个阶段进行，第一阶段的前八名优胜队伍晋级到第二阶段进行半决赛和决赛\r\n</p>\r\n<p>\r\n	&nbsp;\r\n</p>\r\n<p style=\"text-align:center;\">\r\n	<img src=\"http://www.blueoceancenter.net/images/n1.jpg\" />\r\n</p>\r\n<p>\r\n	&nbsp;\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	蓝海物流与中国深圳成立客服和销售中心，就近解决中国跨境电商的需求和服务。近日，蓝海逆物流举办男女混合拔河比赛，蓝海逆物流员工积极参与，派出两支队伍参加比赛，最终蓝海逆物流员工组成的蓝海一队成功夺冠。据悉，参加本次比赛的单位均为蓝海逆物流成员，比赛采取淘汰制，分两个阶段进行，第一阶段的前八名优胜队伍晋级到第二阶段进行半决赛和决赛\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	近日，蓝海逆物流举办男女混合拔河比赛，蓝海逆物流员工积极参与，派出两支队伍参加比赛，最终蓝海逆物流员工组成的蓝海一队成功夺冠。据悉，参加本次比赛的单位均为蓝海逆物流成员，比赛采取淘汰制，分两个阶段进行，第一阶段的前八名优胜队伍晋级到第二阶段进行半决赛和决赛\r\n</p>\r\n<p>\r\n	&nbsp;\r\n</p>', 'attach/201708/1502758506954423256.jpg', '0', '0', '1', '1502787298', '127.0.0.1', '0', '1502787354', '100', '蓝海逆物流', '蓝海物流因业务增长需要，公司波特兰总部搬迁至新的办公室', '蓝海物流因业务增长需要，公司波特兰总部搬迁至新的办公室', null);
INSERT INTO `info_co` VALUES ('29', '19', '蓝海物流自住定制开发的退货管理系统(Returns Management System)正式上线', '', '', '', '', '<p style=\"text-indent:2em;\">\r\n	蓝海物流与中国深圳成立客服和销售中心，就近解决中国跨境电商的需求和服务。近日，蓝海逆物流举办男女混合拔河比赛，蓝海逆物流员工积极参与，派出两支队伍参加比赛，最终蓝海逆物流员工组成的蓝海一队成功夺冠。据悉，参加本次比赛的单位均为蓝海逆物流成员，比赛采取淘汰制，分两个阶段进行，第一阶段的前八名优胜队伍晋级到第二阶段进行半决赛和决赛\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	近日，蓝海逆物流举办男女混合拔河比赛，蓝海逆物流员工积极参与，派出两支队伍参加比赛，最终蓝海逆物流员工组成的蓝海一队成功夺冠。据悉，参加本次比赛的单位均为蓝海逆物流成员，比赛采取淘汰制，分两个阶段进行，第一阶段的前八名优胜队伍晋级到第二阶段进行半决赛和决赛\r\n</p>\r\n<p>\r\n	&nbsp;\r\n</p>\r\n<p style=\"text-align:center;\">\r\n	<img src=\"http://www.blueoceancenter.net/images/n1.jpg\" />\r\n</p>\r\n<p>\r\n	&nbsp;\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	蓝海物流与中国深圳成立客服和销售中心，就近解决中国跨境电商的需求和服务。近日，蓝海逆物流举办男女混合拔河比赛，蓝海逆物流员工积极参与，派出两支队伍参加比赛，最终蓝海逆物流员工组成的蓝海一队成功夺冠。据悉，参加本次比赛的单位均为蓝海逆物流成员，比赛采取淘汰制，分两个阶段进行，第一阶段的前八名优胜队伍晋级到第二阶段进行半决赛和决赛\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	近日，蓝海逆物流举办男女混合拔河比赛，蓝海逆物流员工积极参与，派出两支队伍参加比赛，最终蓝海逆物流员工组成的蓝海一队成功夺冠。据悉，参加本次比赛的单位均为蓝海逆物流成员，比赛采取淘汰制，分两个阶段进行，第一阶段的前八名优胜队伍晋级到第二阶段进行半决赛和决赛\r\n</p>\r\n<p>\r\n	&nbsp;\r\n</p>', 'attach/201708/1502758517550968876.jpg', '0', '0', '1', '1502787307', '127.0.0.1', '0', '1502787375', '100', '蓝海逆物流', '蓝海物流自住定制开发的退货管理系统(Returns Management System)正式上线', '蓝海物流自住定制开发的退货管理系统(Returns Management System)正式上线', null);
INSERT INTO `info_co` VALUES ('30', '20', '联系我们', null, '', null, '', '', null, '0', '0', '1', '1502791092', '127.0.0.1', '0', '1502791115', '100', '', '', '', null);
INSERT INTO `info_co` VALUES ('31', '20', '人才招聘', null, '', null, '', '', null, '0', '0', '1', '1502791116', '127.0.0.1', '0', '1502791122', '100', '', '', '', null);
INSERT INTO `info_co` VALUES ('32', '20', '网站首页', null, '', null, '', '', null, '0', '0', '1', '1502791123', '127.0.0.1', '0', '1502791130', '100', '', '', '', null);
INSERT INTO `info_co` VALUES ('33', '21', '官方微信', null, '', null, '', '', 'attach/201708/1502817266270970769.jpg', '0', '0', '1', '1502846052', '127.0.0.1', '0', '1502846066', '100', '', '', '', null);
INSERT INTO `info_co` VALUES ('34', '21', '官方微博', null, '', null, '', '', 'attach/201708/1502817278320903249.jpg', '0', '0', '1', '1502846067', '127.0.0.1', '0', '1502846078', '100', '', '', '', null);
INSERT INTO `info_co` VALUES ('35', '22', 'BLUE OCEAN', null, '', '我们坚持以客户为本，持续优化创新', '利用自动化系统、成熟的流程和高水平的团队，完整解决客户的反向物流的难题。', '', 'attach/201708/1502818770182617801.jpg', '0', '0', '1', '1502847502', '127.0.0.1', '0', '1502851334', '100', 'TECH LLC', '', '', null);
INSERT INTO `info_co` VALUES ('36', '22', 'BLUE OCEAN', null, '', '我们坚持以客户为本，持续优化创新', '利用自动化系统、成熟的流程和高水平的团队，完整解决客户的反向物流的难题。', '', 'attach/201708/1502819002850504112.jpg', '0', '0', '1', '1502847571', '127.0.0.1', '0', '1502851320', '100', 'TECH LLC', '', '', null);
INSERT INTO `info_co` VALUES ('37', '22', 'BLUE OCEAN', null, '', '我们坚持以客户为本，持续优化创新', ' 利用自动化系统、成熟的流程和高水平的团队，完整解决客户的反向物流的难题。 ', '', 'attach/201708/1502819033601683868.jpg', '0', '0', '1', '1502847803', '127.0.0.1', '0', '1502851313', '100', ' TECH LLC', '', '', null);
INSERT INTO `info_co` VALUES ('38', '23', '退货管理', null, 'service.php', null, '我们提供从FBA 换标，收货重发到检查检测，再到零件维修等全品类，全深度的综合退货处理方案。我们尤其擅长和精通电子产品的包括检测维修的退货管理。', '', 'attach/201708/1502819460155297020.jpg', '0', '0', '1', '1502848214', '127.0.0.1', '0', '1502848260', '100', '', '', '', null);
INSERT INTO `info_co` VALUES ('39', '23', '延期质保', null, 'yqzb.php', null, '第三方质保解决方案，弥补了非授权零售商的质保难题，也为其他质保需求提供了可行选项。', '', 'attach/201708/1502819484867700329.jpg', '0', '0', '1', '1502848261', '127.0.0.1', '0', '1502848284', '100', '', '', '', null);
INSERT INTO `info_co` VALUES ('40', '23', '售后服务', null, 'shfw.php', null, '直接向最终消费者提供售后服务，包括客服，技术支持，质保等综合服务。解决零售商和生产商的后顾之忧。', '', 'attach/201708/1502819512506904347.jpg', '0', '0', '1', '1502848285', '127.0.0.1', '0', '1502848312', '100', '', '', '', null);
INSERT INTO `info_co` VALUES ('41', '24', '2015', null, '', '成立时间', '', '', null, '0', '0', '1', '1502849088', '127.0.0.1', '0', '1502851385', '100', '年', '', '', null);
INSERT INTO `info_co` VALUES ('42', '24', '3', null, '', '仓库面积', '', '', null, '0', '0', '1', '1502849117', '73.37.32.237', '0', '1503606796', '100', '万平方英尺', '', '', null);
INSERT INTO `info_co` VALUES ('43', '24', '1', null, '', '仓储中心', '', '', null, '0', '0', '1', '1502849139', '127.0.0.1', '0', '1502851401', '100', '个', '', '', null);
INSERT INTO `info_co` VALUES ('44', '24', '1', null, '', '客服中心', '', '', null, '0', '0', '1', '1502849158', '127.0.0.1', '0', '1502851408', '100', '个', '', '', null);
INSERT INTO `info_co` VALUES ('45', '24', '40', null, '', '北美运营团队', '', '', null, '0', '0', '1', '1502849178', '127.0.0.1', '0', '1502851414', '100', '余人', '', '', null);
INSERT INTO `info_co` VALUES ('46', '25', '电子商务零售商', null, 'case.php?lm=13', null, '如何在快速增长的电子商务市场保持竞争力，占领市场的同时尽可能的把退货最大化的转变为库存和资产？如何为消费者提供最优的购买体验和售后服务？蓝海逆物流帮助零售商在退货管理，售后服务，延期质保方面提供一揽子解决方案，让零售商腾出人力专注于产品和市场。', '', 'attach/201708/1502820743144288151.jpg', '0', '0', '1', '1502849481', '127.0.0.1', '0', '1502849543', '100', '', '', '', null);
INSERT INTO `info_co` VALUES ('47', '25', '生产商', null, 'case.php?lm=14', null, ' 如何在新产品、新市场拓展的同时提供与产品形象密切相关的售后客服和厂商质保？如何在初期避免因为售后的缺失导致品牌口碑的崩塌？蓝海逆物流专业的第三方售后团队帮助生产商在北美市场快速启动配套的售后服务。', '', 'attach/201708/1502820781874954754.jpg', '0', '0', '1', '1502849544', '127.0.0.1', '0', '1502849581', '100', '', '', '', null);
INSERT INTO `info_co` VALUES ('48', '26', '加入我们', null, '', null, '我们为你提供广阔的发展平台，蓝海逆物流诚邀你的加入！', '', 'attach/201708/1502821173079886978.jpg', '0', '0', '1', '1502849942', '127.0.0.1', '0', '1502849973', '100', '', '', '', null);

-- ----------------------------
-- Table structure for info_co1
-- ----------------------------
DROP TABLE IF EXISTS `info_co1`;
CREATE TABLE `info_co1` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `lm` int(10) unsigned NOT NULL default '0',
  `title` varchar(100) default NULL,
  `color_font` varchar(50) default NULL,
  `uselink` varchar(50) default NULL,
  `linkurl` varchar(1000) default NULL,
  `info_from` varchar(50) default NULL,
  `info_author` varchar(50) default NULL,
  `f_body` longtext,
  `z_body` longtext,
  `img_sl` varchar(50) default NULL,
  `hot` tinyint(1) unsigned default '0',
  `tuijian` tinyint(1) unsigned default '0',
  `pass` tinyint(1) unsigned default '1',
  `wtime` int(20) unsigned NOT NULL,
  `ip` varchar(20) default NULL,
  `read_num` int(4) unsigned default '0',
  `toptime` int(20) unsigned NOT NULL,
  `px` int(4) unsigned NOT NULL default '100',
  `title_key` varchar(5000) default NULL,
  `title_tion` varchar(5000) default NULL,
  `cpcs` longtext,
  `bimg_sl` varchar(60) default NULL,
  PRIMARY KEY  (`id`),
  KEY `lm` (`lm`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of info_co1
-- ----------------------------

-- ----------------------------
-- Table structure for info_lm
-- ----------------------------
DROP TABLE IF EXISTS `info_lm`;
CREATE TABLE `info_lm` (
  `id_lm` int(11) unsigned NOT NULL auto_increment,
  `fid` int(10) unsigned default '0',
  `title_lm` varchar(50) NOT NULL,
  `add_xx` tinyint(1) unsigned default '1',
  `e_name` tinyint(1) unsigned default '0',
  `web_key` tinyint(1) unsigned default '0',
  `xia` tinyint(1) unsigned default '1',
  `uselink` tinyint(1) unsigned default '0',
  `info_from` tinyint(1) unsigned default '0',
  `f_body` tinyint(1) unsigned default '0',
  `z_body` tinyint(1) unsigned default '0',
  `img_sl` tinyint(1) unsigned default '0',
  `bimg_sl` tinyint(1) unsigned default '0',
  `img_url` varchar(100) default NULL,
  `px` int(11) unsigned default '100',
  `title_en` varchar(200) default NULL,
  `keywords` varchar(5000) default NULL,
  `description` varchar(5000) default NULL,
  `jianjie` longtext,
  `neirong` longtext,
  `tuijiana` tinyint(1) default '0',
  `simg_url` varchar(100) default NULL,
  PRIMARY KEY  (`id_lm`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of info_lm
-- ----------------------------
INSERT INTO `info_lm` VALUES ('1', '0', '首页', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', null, '100', '', '', '', '', '', '0', null);
INSERT INTO `info_lm` VALUES ('2', '0', '服务介绍', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', 'attach/201708/1502673816557418440.jpg', '100', 'Blue Ocean Tech LLC', '服务介绍', '服务介绍', '致力轻量化发展，创享绿色未来', '', '0', null);
INSERT INTO `info_lm` VALUES ('3', '0', '服务收费', '1', '0', '1', '0', '0', '0', '0', '1', '0', '0', 'attach/201708/1502748392300724190.jpg', '100', '服务收费', '服务收费', '服务收费', '', '', '0', null);
INSERT INTO `info_lm` VALUES ('4', '0', '服务对象', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', 'attach/201708/1502751380941299310.jpg', '100', '服务对象', '服务对象', '服务对象', '', '', '0', null);
INSERT INTO `info_lm` VALUES ('5', '0', '关于我们', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', 'attach/201708/1502753472846212106.jpg', '100', '关于我们', '关于我们', '关于我们', '', '', '0', null);
INSERT INTO `info_lm` VALUES ('6', '0', '加入我们', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', 'attach/201708/1502758006418274608.jpg', '100', '加入我们', '加入我们', '加入我们', '', '', '0', null);
INSERT INTO `info_lm` VALUES ('15', '5', '公司简介', '1', '0', '0', '0', '1', '1', '1', '1', '1', '0', null, '100', '', '公司简介', '公司简介', '', '', '0', null);
INSERT INTO `info_lm` VALUES ('8', '2', '退货管理', '1', '0', '0', '0', '0', '0', '1', '0', '1', '0', null, '100', '', '退货管理', '退货管理', '', '<p>\r\n	<span style=\"color:#333;\">蓝海逆物流使用自主研发的自动化系统，直接通过后台API连接客户的销售平台，使发起退货，收货重发，重新销售变得无比顺畅。我们独一无二的系统安排让客户的每个退货都被记录，而且不会跟其他客户的退货产生混淆。高价值产品的退货会单独记录序列号，让每个产品的信息都得以完整保存。</span>\r\n</p>\r\n<p>\r\n	<span style=\"color:#333;\"></span>&nbsp;\r\n</p>\r\n<p>\r\n	<span style=\"color:#333;\">所有使用我们服务的客户都会拥有自己的基于云端的账号和系统管理自己的退货。</span>\r\n</p>', '0', null);
INSERT INTO `info_lm` VALUES ('9', '2', '售后服务', '1', '0', '0', '0', '0', '0', '0', '1', '1', '0', null, '100', '', '售后服务', '售后服务', '', '', '0', null);
INSERT INTO `info_lm` VALUES ('10', '2', '延期质保', '1', '0', '0', '0', '0', '0', '0', '1', '1', '0', null, '100', '', '延期质保', '延期质保', '', '', '0', null);
INSERT INTO `info_lm` VALUES ('11', '2', '仓储物流', '1', '0', '0', '0', '0', '0', '0', '1', '1', '0', null, '100', '', '仓储物流', '仓储物流', '', '', '0', null);
INSERT INTO `info_lm` VALUES ('12', '2', '报告分析', '1', '0', '0', '0', '0', '0', '0', '1', '1', '0', null, '100', '', '报告分析', '报告分析', '', '', '0', null);
INSERT INTO `info_lm` VALUES ('13', '4', '零售商', '1', '0', '0', '0', '0', '0', '0', '1', '1', '0', null, '1', '', '零售商', '零售商', '', '', '0', null);
INSERT INTO `info_lm` VALUES ('14', '4', '生产商', '1', '0', '0', '0', '0', '0', '0', '1', '1', '0', null, '100', '', '生产商', '生产商', '', '', '0', null);
INSERT INTO `info_lm` VALUES ('16', '5', '企业文化', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '100', '', '企业文化', '企业文化', '', '', '0', null);
INSERT INTO `info_lm` VALUES ('17', '5', '联系我们', '1', '0', '0', '0', '1', '0', '1', '1', '1', '0', null, '100', '', '联系我们', '联系我们', '', '', '0', null);
INSERT INTO `info_lm` VALUES ('18', '6', '人才招聘', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', null, '100', '', '人才招聘', '人才招聘', '首先请留意下面的招聘信息是否有合适你的职位。详细阅读职位要求并向我们发送你的个人简历，我们将安排专人评审您的应聘邮件，通过对简历进行筛选进入以下流程》面试/复试》确认入职时间》报到》试用》入职', '简历请投至邮箱 : support@blueoceancenter.com', '0', null);
INSERT INTO `info_lm` VALUES ('19', '6', '新闻动态', '1', '1', '1', '0', '0', '0', '0', '1', '1', '0', null, '100', '', '新闻动态', '新闻动态', '', '', '0', null);
INSERT INTO `info_lm` VALUES ('20', '1', '常用链接', '1', '0', '0', '0', '1', '0', '0', '0', '0', '0', null, '100', null, null, null, null, null, '0', null);
INSERT INTO `info_lm` VALUES ('21', '1', '二维码', '1', '0', '0', '0', '0', '0', '0', '0', '1', '0', null, '100', null, null, null, null, null, '0', null);
INSERT INTO `info_lm` VALUES ('22', '1', '首页轮播', '1', '1', '0', '0', '0', '0', '1', '0', '1', '0', null, '100', '', '', '', '', '', '0', null);
INSERT INTO `info_lm` VALUES ('23', '1', '服务内容', '1', '0', '0', '0', '1', '0', '1', '0', '1', '0', null, '100', '', '', '', '<p>\r\n	<span style=\"font-size:16px;\">我们的服务对象：1.零售商，包括跨境电商和本土电商； 2.品牌生产商</span>\r\n</p>\r\n<p>\r\n	<span style=\"font-size:16px;\">我们的服务：退货管理，售后服务，延期质保，以及仓储物流</span>\r\n</p>\r\n<p>\r\n	<span style=\"font-size:16px;\">我们的竞争优势：不断升级的自动化的系统以及以客户使用体验为根本的服务精神</span>\r\n</p>', '', '0', null);
INSERT INTO `info_lm` VALUES ('24', '1', '关于我们', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', 'attach/201708/1502820142416373994.jpg', '100', '2017年数据', '', '', '蓝海逆物流是北美领先的集退货处理，仓储物流与售后支持于一身的第三方服务提供商。我们专注于为第三方电子商务卖家以及生产商提供一站式反向物流服务。<br />\r\n我们坚持以客户为本，持续优化创新，利用自动化系统、成熟的流程和高水平的团队，完整解决客户的反向物流的难题。', '', '0', null);
INSERT INTO `info_lm` VALUES ('25', '1', '服务对象', '1', '0', '0', '0', '1', '0', '1', '0', '1', '0', null, '100', '', '', '', '我们的服务对象：零售商和生产商', '', '0', null);
INSERT INTO `info_lm` VALUES ('26', '1', '加入我们', '1', '0', '0', '0', '0', '0', '1', '0', '1', '0', null, '100', null, null, null, null, null, '0', null);

-- ----------------------------
-- Table structure for info_lm1
-- ----------------------------
DROP TABLE IF EXISTS `info_lm1`;
CREATE TABLE `info_lm1` (
  `id_lm` int(11) unsigned NOT NULL auto_increment,
  `fid` int(10) unsigned default '0',
  `pid` int(10) unsigned default '0',
  `title_lm` varchar(50) NOT NULL,
  `add_xx` tinyint(1) unsigned default '1',
  `xia` tinyint(1) unsigned default '1',
  `uselink` tinyint(1) unsigned default '0',
  `info_from` tinyint(1) unsigned default '0',
  `f_body` tinyint(1) unsigned default '0',
  `z_body` tinyint(1) unsigned default '0',
  `img_sl` tinyint(1) unsigned default '0',
  `img_url` varchar(50) default NULL,
  `simg_url` varchar(50) default NULL,
  `px` int(11) unsigned default '100',
  `title_en` varchar(5000) default NULL,
  `bimg_sl` tinyint(1) unsigned default '0',
  `cpcs` tinyint(1) unsigned default '0',
  PRIMARY KEY  (`id_lm`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of info_lm1
-- ----------------------------

-- ----------------------------
-- Table structure for master
-- ----------------------------
DROP TABLE IF EXISTS `master`;
CREATE TABLE `master` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `last_login` varchar(30) default NULL,
  `last_ip` varchar(30) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of master
-- ----------------------------
INSERT INTO `master` VALUES ('2', 'grwl', 'e10adc3949ba59abbe56e057f20f883e', '1504299516', '73.37.32.237');

-- ----------------------------
-- Table structure for pro_album
-- ----------------------------
DROP TABLE IF EXISTS `pro_album`;
CREATE TABLE `pro_album` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `pro_id` int(11) default NULL,
  `img_url` varchar(100) default NULL,
  `bimg_url` varchar(100) default NULL,
  `img_desc` varchar(100) default NULL,
  `tuijian` tinyint(1) default '0',
  `px` int(10) default '100',
  `wtime` int(20) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pro_album
-- ----------------------------
INSERT INTO `pro_album` VALUES ('1', '18', 'attach/201708/1502752831755894429.jpg', null, '会议室', '0', '100', '1502781631');
INSERT INTO `pro_album` VALUES ('2', '18', 'attach/201708/1502752831083554496.jpg', null, '办公区', '0', '100', '1502781631');
INSERT INTO `pro_album` VALUES ('3', '18', 'attach/201708/1502752831816528300.jpg', null, '休息区', '0', '100', '1502781631');

-- ----------------------------
-- Table structure for set
-- ----------------------------
DROP TABLE IF EXISTS `set`;
CREATE TABLE `set` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(100) default NULL,
  `keywords` longtext,
  `description` longtext,
  `record` varchar(100) default NULL,
  `record_url` varchar(200) default NULL,
  `copyright` varchar(200) default NULL,
  `wtime` int(20) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of set
-- ----------------------------
INSERT INTO `set` VALUES ('1', '蓝海逆物流', '蓝海逆物流', '蓝海逆物流', '', '', 'Copyright &copy; 2017 蓝海逆物流Blue Ocean Tech LLC. All Rights Reserved.', null);
