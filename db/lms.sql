/*
SQLyog Community v13.1.2 (64 bit)
MySQL - 10.1.29-MariaDB : Database - lms
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`lms` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `lms`;

/*Table structure for table `acm_account` */

DROP TABLE IF EXISTS `acm_account`;

CREATE TABLE `acm_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

/*Data for the table `acm_account` */

insert  into `acm_account`(`id`,`name`,`type`,`description`,`date`,`status`) values 
(4,'Accounting Fees','2','And others, such as Accounting or Bookkeeping Fees, Legal and Attorney Fees, etc.','2019-02-05',1),
(5,'Advertising and Promotion Expense','2','Costs of promoting the business such as those incurred in newspaper publications, television and radio broadcasts, billboards, flyers, banner, festoon, hand bill etc.','2019-02-05',1),
(6,'Bank Charges','2','This is an administrative expense which reports the fees incurred by a company for the expenses associated with its checking account transactions.','2019-02-05',1),
(7,'Computer Equipment','2','','2019-02-05',1),
(8,'Donations','2','A donation is a gift for charity, humanitarian aid, or to benefit a cause. A donation may take various forms, including money, alms, services, or goods such as clothing, toys, food, or vehicles. ','2019-02-05',1),
(9,'Utilities Expense','2','Water and electricity costs paid or payable to utility companies such as Gas Bill, Internet Bill, Dish Bill etc. ','2019-02-05',1),
(10,'Entertainment Expenses','2','Entertainment costs for customers, employees and owners. It is often coupled with traveling, hence the account title Travel and Representation Expense.','2019-02-05',1),
(11,'Legal Fees','2','Fees paid to professionals for personal advice, personal taxes, or personal legal services are not deductible business expenses. This would apply to monthly fees (for bookkeeping, for example) and for annual or one-time payments.','2019-02-05',1),
(12,'Loan Payment','2','Bank Loan, Personal Loan, Loan Installment Fees etc','2019-02-04',1),
(13,'Motor Vehicle Expenses','2','Fuel, Repairing, Servicing etc ','2019-02-04',1),
(14,'Printing and Stationery Expenses ','2','Cost of supplies (ball pens, ink, paper, spare parts, etc.) used by the business. Specific accounts may be in place such as Office Supplies Expense, Store Supplies Expense, and Service Supplies Expense.','2019-02-05',1),
(15,'Rent Expenses ','2','Under the accrual basis of accounting, the account Rent Expense will report the cost of occupying space during the time interval indicated in the heading of the income statement, whether or not the rent was paid within that period such as Office Rent, Hou','2019-02-05',1),
(16,'Repairs and Maintenance Expense','2','The costs incurred to bring an asset back to an earlier condition or to keep the asset operating at its present condition (as opposed to improving the asset).','2019-02-05',1),
(17,'Marketing Expense','2','Represents an amount of money the company spends on marketing and promotion.','2019-02-05',1),
(26,'Delivery Expense','2','Represents cost of gas, oil, courier fees, and other costs incurred by the business in transporting the goods sold to the customers. Delivery expense is also known as Freight-out.','2019-02-05',1),
(27,'Depreciation Expense','2','Refers to the portion of the cost of fixed assets (property, plant, and equipment) used for the operations of the period reported. ','2019-02-05',1),
(28,'Insurance Expense','2','Insurance premiums paid or payable to an insurance company who accepts to guarantee the business against losses from a specified event. ','2019-02-05',1),
(29,'Interest Expense','2','Cost of borrowing money. ','2019-02-05',1),
(30,'Salaries Expense','2','Compensation to employees for their services to the company. ','2019-02-05',1),
(31,'License Fees and Taxes','2','Business taxes, registration, and licensing fees paid to the government','2019-02-05',1),
(35,'Physiotherapy Session Charge','1','Physiotherapy Session Charge (PT/OT)','2019-02-14',1),
(36,'Rehab Hostel Charge ','1','RENT','2019-02-14',1),
(40,'Bela Assistive Device Corner','1','selling point','2019-02-07',1),
(43,'Report Fee','1','','2019-02-14',1),
(44,'Cabin Charge','1','','2019-02-14',1),
(45,'Speech Therapy','1','','2019-02-14',1),
(46,'Hand Therapy','1','','2019-02-14',1),
(47,'Consultant Fee','1','Consultant Fee','2019-02-14',1),
(48,'Dr. Board Fee','1','Dr. Board Fee','2019-02-14',1),
(49,'Special Dr. Visit Fee','1','Special Dr. Visit Fee','2019-02-14',1),
(50,'Splint','1','','2019-02-14',1),
(51,'Medicine ','1','Medicine ','2019-02-14',1),
(52,'Instrument ','1','Instrument ','2019-02-14',1),
(53,'Service Charge ','1','Service Charge ','2019-02-14',1),
(54,'Others ','1','Others ','2019-02-14',1);

/*Table structure for table `acm_invoice` */

DROP TABLE IF EXISTS `acm_invoice`;

CREATE TABLE `acm_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(20) NOT NULL,
  `total` float NOT NULL,
  `vat` float NOT NULL,
  `discount` float NOT NULL,
  `grand_total` float NOT NULL,
  `paid` float NOT NULL,
  `due` float NOT NULL,
  `created_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8;

/*Data for the table `acm_invoice` */

insert  into `acm_invoice`(`id`,`patient_id`,`total`,`vat`,`discount`,`grand_total`,`paid`,`due`,`created_id`,`date`,`status`) values 
(6,'190206091483',550,0,0,550,550,0,59,'2019-02-06',1),
(7,'190206582014',400,0,0,400,400,0,59,'2019-02-06',1),
(8,'190205942658',500,0,0,500,500,0,59,'2019-02-06',1),
(9,'190206689754',200,0,0,200,200,0,59,'2019-02-06',1),
(10,'190206689754',200,0,0,200,200,0,59,'2019-02-06',1),
(11,'190205942658',500,0,0,500,500,0,59,'2019-02-06',1),
(12,'190206582014',400,0,0,400,400,0,59,'2019-02-06',1),
(13,'190206091483',550,0,0,550,550,0,59,'2019-02-06',1),
(14,'190206917356',300,0,0,300,300,0,59,'2019-02-06',1),
(15,'190206871560',350,0,0,350,350,0,59,'2019-02-06',1),
(16,'190206680953',500,0,0,500,500,0,59,'2019-02-06',1),
(17,'190206184935',300,0,0,300,300,0,59,'2019-02-06',1),
(18,'190206145032',500,0,0,500,500,0,59,'2019-02-06',1),
(19,'190206609124',300,0,0,300,300,0,59,'2019-02-06',1),
(20,'190206725104',300,0,0,300,300,0,59,'2019-02-06',1),
(21,'190206087925',350,0,0,350,350,0,59,'2019-02-06',1),
(22,'190206130287',550,0,0,550,550,0,59,'2019-02-06',1),
(23,'190206241057',400,0,0,400,400,0,59,'2019-02-06',1),
(24,'190206584329',200,0,0,200,200,0,59,'2019-02-06',1),
(25,' 190206861075',500,0,0,500,500,0,59,'2019-02-06',1),
(26,'190207856137',200,0,0,200,200,0,59,'2019-02-07',1),
(27,'190206861075',500,0,0,500,500,0,59,'2019-02-07',1),
(28,'190206584329',200,0,0,200,200,0,59,'2019-02-07',1),
(29,'190206087925',350,0,0,350,350,0,59,'2019-02-07',1),
(30,'190207234685',600,0,0,600,600,0,59,'2019-02-07',1),
(31,'190207765482',300,0,30,270,0,270,55,'2019-02-07',1),
(32,'190207701839',300,0,0,300,300,0,59,'2019-02-07',1),
(33,'190207856137',400,0,0,400,400,0,59,'2019-02-08',1),
(34,'190208835670',300,0,0,300,300,0,59,'2019-02-08',1),
(35,'190206584329',200,0,0,200,200,0,59,'2019-02-08',1),
(36,' 190207765482',600,0,0,600,600,0,59,'2019-02-08',1),
(37,'190207234685',300,0,0,300,300,0,59,'2019-02-08',1),
(38,'190208049328',300,0,0,300,300,0,59,'2019-02-08',1),
(39,'190207701839',300,0,0,300,300,0,59,'2019-02-08',1),
(40,'190208935724',300,0,0,300,300,0,59,'2019-02-08',1),
(41,'190208543708',250,0,0,250,250,0,59,'2019-02-08',1),
(42,'190208197538',350,0,0,350,350,0,59,'2019-02-08',1),
(43,'190208096485',250,0,0,250,250,0,59,'2019-02-08',1),
(44,'190207234685 ',300,0,0,300,300,0,59,'2019-02-08',1),
(45,'190206582014',400,0,0,400,400,0,59,'2019-02-09',1),
(46,'190209738012',300,0,0,300,300,0,59,'2019-02-09',1),
(47,'190206130287',550,0,0,550,550,0,59,'2019-02-09',1),
(48,'190207234685',600,0,0,600,600,0,59,'2019-02-09',1),
(49,'190207765482',600,0,0,600,600,0,59,'2019-02-09',1),
(50,'190209857406',500,0,0,500,500,0,59,'2019-02-09',1),
(51,'190209078261',400,0,0,400,400,0,59,'2019-02-09',1),
(52,'190206087925',350,0,0,350,350,0,59,'2019-02-09',1),
(53,'190208197538',350,0,0,350,350,0,59,'2019-02-09',1),
(54,'190207701839',300,0,0,300,300,0,59,'2019-02-09',1),
(55,'190208096485',250,0,0,250,250,0,59,'2019-02-09',1),
(56,'190209690823',200,0,0,200,200,0,59,'2019-02-09',1),
(57,'190209157042',250,0,0,250,250,0,59,'2019-02-09',1),
(58,'190208935724',300,0,0,300,300,0,59,'2019-02-09',1),
(59,'190208049328',300,0,0,300,300,0,59,'2019-02-09',1),
(60,'190209304691',300,0,0,300,300,0,59,'2019-02-09',1),
(61,'190209738012',300,0,0,300,300,0,59,'2019-02-10',1),
(62,'190206087925',350,0,0,350,350,0,59,'2019-02-10',1),
(63,'190206582014',200,0,0,200,200,0,59,'2019-02-10',1),
(64,'190210492803',350,0,0,350,350,0,59,'2019-02-10',1),
(65,'190209078261',400,0,0,400,400,0,55,'2019-02-10',1),
(66,'190209857406',500,0,0,500,500,0,59,'2019-02-10',1),
(67,'190210405216',250,0,0,250,250,0,59,'2019-02-10',1),
(68,'190206145032',250,0,0,250,250,0,59,'2019-02-10',1),
(69,'190209690823',200,0,0,200,200,0,59,'2019-02-10',1),
(70,'190209157042',250,0,0,250,250,0,59,'2019-02-10',1),
(71,'190208096485',250,0,0,250,250,0,59,'2019-02-10',1),
(72,'190208197538',350,0,0,350,350,0,59,'2019-02-10',1),
(73,'190207856137',200,0,0,200,200,0,59,'2019-02-10',1),
(74,'190209304691',300,0,0,300,300,0,59,'2019-02-10',1),
(75,'190210265870',300,0,0,300,300,0,59,'2019-02-10',1),
(76,'190207856137',200,0,0,200,200,0,59,'2019-02-12',1),
(77,'190209319408',300,0,0,300,300,0,59,'2019-02-12',1),
(78,'190209078261',400,0,0,400,400,0,59,'2019-02-12',1),
(79,'190209857406',200,0,0,200,200,0,59,'2019-02-12',1),
(80,'190208197538',300,0,0,300,300,0,59,'2019-02-12',1),
(81,'190209857406',200,0,0,200,200,0,59,'2019-02-12',1),
(82,'190207701839',300,0,0,300,300,0,59,'2019-02-12',1),
(83,'190209690823',200,0,0,200,200,0,59,'2019-02-12',1),
(84,'190208049328',400,0,0,400,400,0,59,'2019-02-12',1),
(85,'190208935724',300,0,0,300,300,0,59,'2019-02-12',1),
(86,'190209157042',250,0,0,250,250,0,59,'2019-02-12',1),
(87,'190208935724',300,0,0,300,300,0,59,'2019-02-12',1),
(88,'190209157042',250,0,0,250,250,0,59,'2019-02-12',1),
(89,'190208756082',2200,0,0,2200,2200,0,55,'2019-02-12',1),
(90,'190210265870',300,0,0,300,300,0,59,'2019-02-12',1),
(91,'190207856137',200,0,0,200,200,0,59,'2019-02-12',1),
(92,'190210638504',200,0,0,200,200,0,59,'2019-02-12',1),
(93,'190213051832',350,0,0,350,350,0,59,'2019-02-13',1),
(94,'190206087925',350,0,0,350,350,0,59,'2019-02-13',1),
(95,'190206087925',100,0,0,100,100,0,59,'2019-02-13',1),
(96,'190214247856',4600,0,1380,3220,0,3220,55,'2019-02-14',1),
(97,'190206241057',200,0,0,200,200,0,59,'2019-02-14',1),
(98,'190209319408',300,0,0,300,300,0,59,'2019-02-14',1),
(99,'190206087925',350,0,0,350,350,0,59,'2019-02-14',1),
(100,'190213051832',350,0,0,350,350,0,59,'2019-02-14',1),
(101,'190209078261',400,0,0,400,400,0,59,'2019-02-14',1),
(102,'190210405216',250,0,0,250,250,0,59,'2019-02-14',1),
(103,'190208543708',200,0,0,200,200,0,59,'2019-02-14',1),
(104,'190214093728',250,0,0,250,250,0,59,'2019-02-14',1),
(105,'190208049328',300,0,0,300,300,0,59,'2019-02-14',1),
(106,'190208935724',300,0,0,300,300,0,59,'2019-02-14',1),
(107,'190214869703',300,0,0,300,300,0,59,'2019-02-14',1),
(108,'190209157042',250,0,0,250,250,0,59,'2019-02-14',1),
(109,'190213051832',100,0,0,100,100,0,59,'2019-02-14',1),
(110,'190214780369',200,0,0,200,200,0,59,'2019-02-14',1),
(111,'190209304691',300,0,0,300,300,0,59,'2019-02-14',1),
(112,'190207856137',200,0,0,200,200,0,59,'2019-02-14',1),
(113,'190214869703',1650,0,165,1485,1000,485,59,'2019-03-22',1),
(114,'190210638504',1000,0,100,900,900,0,59,'2019-03-23',1),
(115,'190323194205',500,0,0,500,500,0,59,'2019-03-30',1),
(121,'190406492781',450,45,20,475,400,75,1,'2019-04-06',1),
(122,'190406712698',1370,0,68.5,1301.5,1000,301.5,59,'2019-04-06',1);

/*Table structure for table `acm_invoice_details` */

DROP TABLE IF EXISTS `acm_invoice_details`;

CREATE TABLE `acm_invoice_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `quantity` float NOT NULL,
  `price` float NOT NULL,
  `subtotal` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=utf8;

/*Data for the table `acm_invoice_details` */

insert  into `acm_invoice_details`(`id`,`invoice_id`,`account_id`,`description`,`quantity`,`price`,`subtotal`) values 
(9,6,25,'T-FEE',2,275,550),
(10,7,25,'T-FEE',2,200,400),
(11,8,25,'T-FEE',2,250,500),
(12,9,25,'T-FEE',1,200,200),
(13,10,35,'T-FEE',1,200,200),
(14,11,35,'T-FEE',2,250,500),
(15,12,35,'T-FEE',2,200,400),
(16,13,35,'T-FEE',2,275,550),
(17,14,35,'T-FEE',1,300,300),
(18,15,35,'T-FEE',1,350,350),
(19,16,36,'RENT',1,500,500),
(20,17,35,'T-FEE',1,300,300),
(21,18,35,'T-FEE',2,250,500),
(22,19,35,'T-FEE',1,300,300),
(23,20,35,'T-FEE',1,300,300),
(24,21,35,'T-FEE',1,350,350),
(25,22,35,'T-FEE',2,275,550),
(26,23,35,'T-FEE',2,200,400),
(27,24,35,'T-FEE',1,200,200),
(28,25,35,'T-FEE',1,500,500),
(29,26,35,'T-FEE',1,200,200),
(30,27,35,'T-FEE',2,250,500),
(31,28,35,'T-FEE',1,200,200),
(32,29,35,'T-FEE',1,350,350),
(33,30,35,'T-FEE',2,300,600),
(34,31,35,'T-FEE',1,300,300),
(35,32,35,'T-FEE',1,300,300),
(36,33,35,'T-FEE',2,200,400),
(37,34,35,'T-FEE',1,300,300),
(38,35,35,'T-FEE',1,200,200),
(39,36,35,'T-FEE',2,300,600),
(40,37,35,'T-FEE',1,300,300),
(41,38,35,'T-FEE',1,300,300),
(42,39,35,'T-FEE',1,300,300),
(43,40,35,'T-FEE',1,300,300),
(44,41,35,'T-FEE',1,250,250),
(45,42,35,'T-FEE',1,350,350),
(46,43,35,'T-FEE',1,250,250),
(47,44,35,'01',1,300,300),
(48,45,35,'T-FEE',2,200,400),
(49,46,35,'T-FEE',1,300,300),
(50,47,35,'T-FEE',2,275,550),
(51,48,35,'T-FEE',2,300,600),
(52,49,35,'T-FEE',2,300,600),
(53,50,35,'D/C -T-FEE',2,250,500),
(54,51,35,'T-FEE',2,200,400),
(55,52,35,'T-FEE',1,350,350),
(56,53,35,'T-FEE',1,350,350),
(57,54,35,'T-FEE',1,300,300),
(58,55,35,'T-FEE',1,250,250),
(59,56,35,'T-FEE',1,200,200),
(60,57,35,'T-FEE',1,250,250),
(61,58,35,'T-FEE',1,300,300),
(62,59,35,'T-FEE',1,300,300),
(63,60,35,'T-FEE',1,300,300),
(64,61,35,'T-FEE',1,300,300),
(65,62,35,'T-FEE',1,350,350),
(66,63,35,'T-FEE',1,200,200),
(67,64,35,'T-FEE',1,350,350),
(69,66,35,'D/C - T-FEE',2,250,500),
(70,67,35,'T-FEE',1,250,250),
(71,68,35,'T-FEE',1,250,250),
(72,69,35,'T-FEE',1,200,200),
(73,70,35,'T-FEE',1,250,250),
(74,71,35,'T-FEE',1,250,250),
(75,72,35,'T-FEE',1,350,350),
(76,73,35,'T-FEE',1,200,200),
(77,74,35,'T-FEE',1,300,300),
(78,75,35,'T-FEE',1,300,300),
(79,76,35,'T-FEE',1,200,200),
(80,77,35,'T-FEE',1,300,300),
(81,78,35,'T-FEE',2,200,400),
(82,79,35,'T-FEE',1,200,200),
(83,80,35,'T-FEE',1,300,300),
(84,81,35,'T-FEE',1,200,200),
(85,82,35,'T-FEE',1,300,300),
(86,83,35,'T-FEE',1,200,200),
(87,84,35,'T-FEE',1,300,300),
(88,84,43,'X-RAY',1,100,100),
(89,85,35,'T-FEE',1,300,300),
(90,86,35,'T-FEE',1,250,250),
(91,65,35,'T-FEE',2,200,400),
(92,87,35,'T-FEE',1,300,300),
(93,88,35,'T-FEE',1,250,250),
(97,90,35,'T-FEE',1,300,300),
(98,91,35,'T-FEE',1,200,200),
(99,92,35,'T-FEE',1,200,200),
(100,93,35,'T-FEE',1,350,350),
(101,94,35,'T-FEE',1,350,350),
(102,95,35,'TICKET FEE',1,100,100),
(106,96,35,'Therapy Session Maintain by DPT',8,350,2800),
(107,96,35,'Therapy Session Maintain by Consultant',3,500,1500),
(108,96,35,'Consultant Fee',1,300,300),
(109,89,35,'Session fee',1,300,300),
(110,89,35,'Session fee (6 session in advanced) \r\nAdvanced details:\r\n(Daily-1 session, \r\n13/02/18 to 18/02/19)',6,300,1800),
(111,89,43,'Consultant fee',1,100,100),
(112,97,35,'SESSION FEE',1,200,200),
(113,98,35,'SESSION FEE',1,300,300),
(114,99,35,'SESSION FEE',1,350,350),
(115,100,35,'SESSION FEE',1,350,350),
(116,101,35,'SESSION FEE',1,400,400),
(117,102,35,'SESSION FEE',1,250,250),
(118,103,35,'SESSION FEE',1,200,200),
(119,104,35,'SESSION FEE',1,250,250),
(120,105,35,'SESSION FEE',1,300,300),
(121,106,35,'SESSION FEE',1,300,300),
(122,107,35,'SESSION FEE',1,300,300),
(123,108,35,'SESSION FEE',1,250,250),
(124,109,43,'CONSULTANT FEE',1,100,100),
(125,110,35,'SESSION FEE',1,200,200),
(126,111,35,'SESSION FEE',1,300,300),
(127,112,35,'SESSION FEE',1,200,200),
(128,113,35,'PT Fee',3,250,750),
(129,113,45,'SP Fee',3,300,900),
(130,114,35,'PT Fee',2,500,1000),
(131,115,35,'PT CF',2,250,500),
(140,121,51,'dfg',5,50,250),
(141,121,46,'sdg',1,200,200),
(142,122,40,'Scratch',1,1250,1250),
(143,122,51,'Napa',10,12,120);

/*Table structure for table `acm_payment` */

DROP TABLE IF EXISTS `acm_payment`;

CREATE TABLE `acm_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `pay_to` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `amount` float NOT NULL,
  `created_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `mobile` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

/*Data for the table `acm_payment` */

insert  into `acm_payment`(`id`,`account_id`,`pay_to`,`description`,`amount`,`created_id`,`date`,`status`,`mobile`,`address`,`quantity`) values 
(4,20,'DOKANDER','COIL, FOIL, MATCH BOX',22,59,'2019-02-05',1,NULL,NULL,0),
(5,14,'MRS. RIYA ENTERPRISE','A4 PRINTER PAPER',330,59,'2019-02-06',1,NULL,NULL,0),
(6,17,'RAFIQUL ISLAM , RONEY , SHARIF','MARKETING BILL',175,59,'2019-02-06',1,NULL,NULL,0),
(7,13,'PRESS','RICKSHAW FAIR',40,59,'2019-02-06',1,NULL,NULL,0),
(8,14,'SHOP','PHOTOCOPY , WHITE PAPER ',65,59,'2019-02-06',1,NULL,NULL,0),
(9,38,'RAFIQUL ISLAM','MOBILE BILL',300,59,'2019-02-06',1,NULL,NULL,0),
(10,7,'UNIK VISION','MOTHER BOARD \r\nRAM DDR - 3GB',2350,59,'2019-02-06',1,NULL,NULL,0),
(11,39,'AZIZ MIAH','NIGHT BILL',20,59,'2019-02-06',1,NULL,NULL,0),
(12,38,'SHARIFUL ISLAM','MOBILE BILL',300,59,'2019-02-07',1,NULL,NULL,0),
(13,38,'RECEPTION ','FLEXI LOAD',100,55,'2019-02-07',1,NULL,NULL,0),
(14,38,'COORDINATOR','',300,55,'2019-02-07',1,NULL,NULL,0),
(15,38,'COORDINATOR','',150,55,'2019-02-07',1,NULL,NULL,0),
(16,17,'RAFIQUL ISLAM , RONEY , SHARIF, S . K . ROY','MARKETING BILL',205,59,'2019-02-08',1,NULL,NULL,0),
(17,10,'MILON','TEA BAG ',100,59,'2019-02-08',1,NULL,NULL,0),
(18,14,'DHOKANDER','PHOTOCOPY',15,59,'2019-02-08',1,NULL,NULL,0),
(19,39,'AZIZ MIAH','NIGHT BILL',20,59,'2019-02-08',1,NULL,NULL,0),
(20,9,'DHAKA POLLI BIDDUT','BIDDUT BILL ( OFFICE )',1614,59,'2019-02-08',1,NULL,NULL,0),
(21,41,'UNIK VISION','LED LIGHT',950,59,'2019-02-08',1,NULL,NULL,0),
(22,17,'RAFIQUL ISLAM , RONEY , S . K . ROY','MARKETING BILL',155,59,'2019-02-09',1,NULL,NULL,0),
(23,14,'DOKANDER','PHOTOCOPY',40,59,'2019-02-09',1,NULL,NULL,0),
(24,42,'HIZRA','CONVEYANCE',20,59,'2019-02-09',1,NULL,NULL,0),
(25,14,'MILON','TISSUE  01-BOX ',60,59,'2019-02-09',1,NULL,NULL,0),
(26,10,'FRUITS BY SHOP','PEYERA',70,59,'2019-02-09',1,NULL,NULL,0),
(27,39,'AZIZ, ABDUL KHALEK','NIGHT BILL',20,59,'2019-02-09',1,NULL,NULL,0),
(28,12,'PUSKS','PREMIUM ( N G O)',2600,59,'2019-02-09',1,NULL,NULL,0),
(29,38,'RECEIPTION','FELEXI LOAD',100,59,'2019-02-14',1,NULL,NULL,0),
(30,17,'RAFIQUL ISLAM ,  , S . K . ROY','MARKETING BILL',105,59,'2019-02-14',1,NULL,NULL,0),
(31,39,'KHALEQ KHAN','CONVINCE ',20,59,'2019-02-14',1,NULL,NULL,0),
(32,13,' RAFIQUL ','RICKSHAW FAIR',40,59,'2019-02-14',1,NULL,NULL,0),
(33,16,'MD. ASAD','CONVINCE ',50,59,'2019-02-14',1,NULL,NULL,0),
(34,55,'AL-AMIN','SIGNBOARD',2000,59,'2019-02-14',1,NULL,NULL,0),
(35,14,'BHAI BAHI SATATIONARY','16 NO REGISTER KHATA',960,59,'2019-02-14',1,NULL,NULL,0),
(36,9,'SAVAR , PUROSOVA ','SIGNBOARD\r\nTRADE FEE',7000,59,'2019-02-14',1,NULL,NULL,0),
(37,9,'Landlord Mr. X','Rent for the mnth of Jan\'19',5500,59,'2019-03-22',1,'01515206220','C-12-2, BANK COLONY',0),
(39,16,'Ashraf Hossain ','Buy Bamboo for Fence.  ',120,59,'2019-03-22',1,'01515206120','C-12-2, BANK COLONY',5),
(41,4,'Jabbar Khan','Audit Fee.',4500,59,'2019-03-22',1,'01515206120','C-12-2, BANK COLONY',1);

/*Table structure for table `appointment` */

DROP TABLE IF EXISTS `appointment`;

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment_id` varchar(20) DEFAULT NULL,
  `patient_id` varchar(20) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `schedule_id` int(11) DEFAULT NULL,
  `serial_no` int(11) DEFAULT NULL,
  `appointment_type` varchar(30) DEFAULT 'First',
  `ticket_fee` float NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  `problem` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `create_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8;

/*Data for the table `appointment` */

insert  into `appointment`(`id`,`appointment_id`,`patient_id`,`department_id`,`doctor_id`,`schedule_id`,`serial_no`,`appointment_type`,`ticket_fee`,`date`,`problem`,`created_by`,`create_date`,`status`) values 
(130,'190205802613','190205847259',41,61,95,2,'Old',300,'2019-02-06','',59,'2019-02-05',1),
(131,'190205650478','190205762415',41,61,97,8,'First',500,'2019-02-08','',59,'2019-02-05',1),
(132,'190205018625','190205762415',41,60,88,6,'First',500,'2019-02-05','',59,'2019-02-05',1),
(133,'190206857432','190206732504',41,56,144,1,'First',500,'2019-02-06','',59,'2019-02-06',1),
(134,'190207409263','190207765482',41,70,202,1,'First',100,'2019-02-07','',59,'2019-02-07',1),
(135,'190209945120','190208835670',41,70,198,1,'First',100,'2019-02-09','BELLS PALESY',59,'2019-02-09',1),
(136,'190209097432','190209857406',41,69,197,2,'First',100,'2019-02-09','',59,'2019-02-09',1),
(137,'190209301927','190209078261',41,69,197,3,'First',100,'2019-02-09','',59,'2019-02-09',1),
(138,'190209381906','190209402683',41,69,197,4,'First',100,'2019-02-09','',59,'2019-02-09',1),
(139,'190210409261','190210638504',41,71,204,2,'First',300,'2019-02-10','',59,'2019-02-10',1),
(140,'190210719830','190210189364',41,71,204,1,'First',300,'2019-02-10','',59,'2019-02-10',1),
(141,'190213504263','190213051832',41,69,194,1,'First',100,'2019-02-13','L B P',59,'2019-02-13',1),
(142,'190214045917','190214780369',41,70,202,1,'First',100,'2019-02-14','',59,'2019-02-14',1),
(143,'190322981376','190322782109',41,69,196,1,'First',250,'2019-03-22','Knee Pain ',59,'2019-03-22',1),
(144,'190322816270','190214869703',41,69,196,2,'First',300,'2019-03-22','Knee Pain ',59,'2019-03-22',1),
(145,'190330715839','190323306925',41,74,217,1,'First',50,'2019-03-31','test pblm',59,'2019-03-30',1),
(146,'190330928603','190323194205',41,69,197,1,'First',200,'2019-03-30','Test prob. ',59,'2019-03-30',1);

/*Table structure for table `bill` */

DROP TABLE IF EXISTS `bill`;

CREATE TABLE `bill` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bill_id` varchar(20) DEFAULT NULL,
  `bill_type` varchar(20) DEFAULT NULL,
  `bill_date` date DEFAULT NULL,
  `admission_id` varchar(20) DEFAULT NULL,
  `discount` float DEFAULT '0',
  `tax` float DEFAULT '0',
  `total` float DEFAULT '0',
  `payment_method` varchar(10) DEFAULT NULL,
  `card_cheque_no` varchar(100) DEFAULT NULL,
  `receipt_no` varchar(100) DEFAULT NULL,
  `note` text,
  `date` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Index 3` (`bill_id`),
  KEY `Index 2` (`admission_id`),
  CONSTRAINT `FK_ipd_bill_ipd_admission` FOREIGN KEY (`admission_id`) REFERENCES `bill_admission` (`admission_id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `bill` */

insert  into `bill`(`id`,`bill_id`,`bill_type`,`bill_date`,`admission_id`,`discount`,`tax`,`total`,`payment_method`,`card_cheque_no`,`receipt_no`,`note`,`date`,`status`) values 
(12,'BLE40LTR6','ipd','2019-03-22','19030991647',50,0,8000,'Cash','','','','2019-03-22 07:08:46',1),
(13,'BLVRVF7W8','ipd','2019-03-22','UIDV30US',425,0,7050,'Cash','','','','2019-03-22 07:42:44',1),
(14,'BLZS921KD','ipd','2019-03-22','19032295810',0,0,5750,'Cash','','','','2019-03-22 12:59:27',1),
(15,'BL9CQRD21','ipd','2019-03-23','19032331469',0,0,1500,'Cash','','','','2019-03-23 07:54:37',1),
(16,'BLIFPMW65','ipd','2019-03-23','19032374832',0,0,4500,'Cash','','','','2019-03-23 08:31:10',1),
(17,'BLZ01UJJM','ipd','2019-03-23','19032361942',0,0,1200,'Cash','','','','2019-03-23 11:30:16',1),
(20,'BLS3NXZAN','ipd','2019-04-06','19040578953',0,0,120,'Cash','','','','2019-04-06 07:34:09',1);

/*Table structure for table `bill_admission` */

DROP TABLE IF EXISTS `bill_admission`;

CREATE TABLE `bill_admission` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `admission_id` varchar(20) DEFAULT NULL,
  `patient_id` varchar(20) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `discharge_date` date DEFAULT NULL,
  `insurance_id` int(11) DEFAULT NULL,
  `policy_no` varchar(100) DEFAULT NULL,
  `agent_name` varchar(255) DEFAULT NULL,
  `guardian_name` varchar(255) DEFAULT NULL,
  `guardian_relation` varchar(255) DEFAULT NULL,
  `guardian_contact` varchar(255) DEFAULT NULL,
  `guardian_address` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `reffered_by` varchar(255) DEFAULT NULL,
  `nurse_id` int(11) NOT NULL DEFAULT '0' COMMENT 'user role 5',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Index 2` (`admission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

/*Data for the table `bill_admission` */

insert  into `bill_admission`(`id`,`admission_id`,`patient_id`,`doctor_id`,`package_id`,`admission_date`,`discharge_date`,`insurance_id`,`policy_no`,`agent_name`,`guardian_name`,`guardian_relation`,`guardian_contact`,`guardian_address`,`status`,`reffered_by`,`nurse_id`) values 
(2,'UIDV30US','190205762415',69,0,'2019-02-05','2019-03-22',0,'','','SHARIF','UNCLE','01960-144944','TANGAIL',1,NULL,0),
(3,'UQCHVMDX','190205762415',78,0,'2019-02-05','2019-03-22',0,'','','GOLAM','FATHER','01254125522','SAVER ,DHAKA',1,NULL,0),
(4,'U7U1KM2R','190205762415',70,0,'2019-02-20',NULL,0,'','','','','','',1,NULL,0),
(5,'U68W6DVY','PM7YIOCI',69,0,'2019-02-17','2019-02-21',0,'','','','','','',1,NULL,0),
(6,'UXSCGLSE','PM7YIOCI',69,0,'2019-02-18','2019-02-17',0,'','','','','','',1,NULL,0),
(7,'U1K38JLJ','PM7YIOCI',75,0,'2019-02-27',NULL,0,'','','','','','',1,NULL,0),
(8,'UICREOJ4','PM7YIOCI',69,0,'2019-02-13',NULL,0,'','','','','','',1,NULL,0),
(9,'UC1QQ7OC','PM7YIOCI',68,0,'2019-02-21',NULL,0,'','','','','','',1,NULL,0),
(10,'UJE27DM6','PM7YIOCI',69,0,'2019-02-21',NULL,0,'','','','','','',1,NULL,0),
(11,'UA3G9866','PM7YIOCI',69,0,'2019-02-18',NULL,0,'','','','','','',1,NULL,0),
(12,'U81XM4IG','PM7YIOCI',69,0,'2019-02-21',NULL,0,'','','','','','',1,NULL,0),
(13,'U5YOY7XX','PM7YIOCI',69,0,'2019-02-21',NULL,0,'','','','','','',1,NULL,0),
(14,'USV7GQ6L','PM7YIOCI',69,0,'2019-02-17','0000-00-00',0,'','','','','','',1,NULL,0),
(15,'UYBW5XB9','190214869703',69,0,'2019-03-09',NULL,0,'','','','','','',1,NULL,0),
(17,'19030991647','190214780369',68,0,'2019-03-09','2019-03-22',0,'','','','','','',1,NULL,0),
(18,'19032295810','190322782109',68,0,'2019-03-22','2019-03-22',0,'','','Robi','Brother','01515206120','C-12-2, BANK COLONY',1,NULL,0),
(19,'19032331469','190213051832',69,0,'2019-03-23','2019-03-23',0,'','','Shamim Rony','Brother','01684175551','3/2 Prianka Super Market\r\nWapda Road',1,NULL,0),
(20,'19032374832','190213051832',68,0,'2019-03-23','2019-03-23',0,'','','Shamim Rony','Son','01684175551','3/2 Prianka Super Market\r\nWapda Road',1,NULL,0),
(21,'19032318946','190323194205',69,0,'2019-03-23',NULL,0,'','','Robi','Brother','01684175551','3/2 Prianka Super Market\r\nWapda Road',1,NULL,0),
(22,'19032316832','190209402683',68,0,'2019-03-23',NULL,0,'','','dgd','son','01726056985','gulsan',1,'sajib',80),
(23,'19032331467','190210638504',69,0,'2019-03-23',NULL,0,'','022','Robi','Brother','01684175551','3/2 Prianka Super Market\r\nWapda Road',1,'Mr. X',80),
(24,'19032361942','190209078261',68,0,'2019-03-23','2019-03-23',0,'','sdf','fdg','dfg','dfg','5645131',1,'x',80),
(25,'19040578953','190405527416',69,0,'2019-04-05','2019-04-06',0,'','sdf','g name','son','01726056968','rampura',1,'Dr. x',80);

/*Table structure for table `bill_advanced` */

DROP TABLE IF EXISTS `bill_advanced`;

CREATE TABLE `bill_advanced` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `admission_id` varchar(20) DEFAULT NULL,
  `patient_id` varchar(30) DEFAULT NULL,
  `amount` float DEFAULT '0',
  `payment_method` varchar(255) DEFAULT NULL,
  `cash_card_or_cheque` varchar(10) DEFAULT NULL COMMENT '1 cash, 2 card, 3 cheque',
  `receipt_no` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `FK_ipd_bill_advanced_ipd_admission` (`admission_id`),
  CONSTRAINT `FK_ipd_bill_advanced_ipd_admission` FOREIGN KEY (`admission_id`) REFERENCES `bill_admission` (`admission_id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `bill_advanced` */

insert  into `bill_advanced`(`id`,`admission_id`,`patient_id`,`amount`,`payment_method`,`cash_card_or_cheque`,`receipt_no`,`date`,`description`) values 
(3,'UIDV30US','190205762415',6000,'CASH','Cash','45455465','2019-02-05 15:47:56','this is test'),
(4,'UYBW5XB9','190214869703',4500,'','','','2019-03-09 05:39:22',NULL),
(5,'U7U1KM2R','190205762415',5000,'','','','2019-03-09 11:31:18',NULL),
(6,'UIDV30US','190205762415',625,'','','','2019-03-09 11:36:53','dsgdfg'),
(7,'USV7GQ6L','PM7YIOCI',4500,'','','','2019-03-09 12:40:02','this is test'),
(8,'19030991647','190214780369',5000,'','Cash','','2019-03-22 05:18:43',''),
(9,'19030991647','190214780369',2500,'','Cash','','2019-03-22 05:54:17',''),
(10,'19032295810','190322782109',2500,'','Cash','1903221620','2019-03-22 12:33:40','Admission Fee Adv.'),
(11,'19032331469','190213051832',2000,'','Cash','1903231748','2019-03-23 07:43:43','Advnc. Payment'),
(12,'19032374832','190213051832',3000,'','Cash','1903234186','2019-03-23 08:29:20','Boarding Fees'),
(13,'19032318946','190323194205',1000,'','Cash','1903233682','2019-03-23 10:05:35','Admission Fee Adv.'),
(14,'19032361942','190210638504',1000,'','Cash','1903235093','2019-03-23 11:25:01','Admission Fee Adv.'),
(16,'19040578953','190405527416',500,'','Cash','1904057058','2019-04-05 12:46:22','need special care');

/*Table structure for table `bill_details` */

DROP TABLE IF EXISTS `bill_details`;

CREATE TABLE `bill_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bill_id` varchar(20) DEFAULT NULL,
  `admission_id` varchar(20) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `quantity` float DEFAULT '0',
  `amount` float DEFAULT '0',
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Key As Bill_ID` (`bill_id`),
  KEY `Admission ID` (`admission_id`),
  CONSTRAINT `fk_ipd_bill_details_ipd_admission` FOREIGN KEY (`admission_id`) REFERENCES `bill_admission` (`admission_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_ipd_bill_details_ipd_bill` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`bill_id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

/*Data for the table `bill_details` */

insert  into `bill_details`(`id`,`bill_id`,`admission_id`,`package_id`,`service_id`,`quantity`,`amount`,`date`) values 
(13,'BLE40LTR6','19030991647',0,3,8,1000,'2019-03-22'),
(14,'BLVRVF7W8','UIDV30US',0,28,100,50,'2019-03-22'),
(15,'BLVRVF7W8','UIDV30US',0,45,5,10,'2019-03-22'),
(16,'BLVRVF7W8','UIDV30US',0,46,4,500,'2019-03-22'),
(17,'BLZS921KD','19032295810',0,1,6,500,'2019-03-22'),
(18,'BLZS921KD','19032295810',0,23,5,350,'2019-03-22'),
(19,'BLZS921KD','19032295810',0,24,1,1000,'2019-03-22'),
(20,'BL9CQRD21','19032331469',0,78,1,1000,'2019-03-23'),
(21,'BL9CQRD21','19032331469',0,77,2,250,'2019-03-23'),
(22,'BLIFPMW65','19032374832',0,78,2,1000,'2019-03-23'),
(23,'BLIFPMW65','19032374832',0,77,4,500,'2019-03-23'),
(24,'BLIFPMW65','19032374832',0,72,1,500,'2019-03-23'),
(25,'BLZ01UJJM','19032361942',0,79,1,1200,'2019-03-23'),
(28,'BLS3NXZAN','19040578953',0,80,2,50,'2019-04-06');

/*Table structure for table `bill_package` */

DROP TABLE IF EXISTS `bill_package`;

CREATE TABLE `bill_package` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `services` text,
  `discount` float DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `bill_package` */

/*Table structure for table `bill_service` */

DROP TABLE IF EXISTS `bill_service`;

CREATE TABLE `bill_service` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` float DEFAULT '0',
  `amount` float DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

/*Data for the table `bill_service` */

insert  into `bill_service`(`id`,`name`,`description`,`quantity`,`amount`,`status`) values 
(67,'Others','',100,0,1),
(68,'Assistive Device','',100,0,1),
(69,'Medicine','',100,0,1),
(70,'Instrument','',100,0,1),
(71,'Service Charge ','',100,0,1),
(72,'Special Dr. Visit Fee','',100,0,1),
(73,'Board Fee','',100,0,1),
(74,'Consultant Fee ','',100,0,1),
(75,'Hand Therapy','',100,0,1),
(76,'Speech Therapy','',100,0,1),
(77,'Session Charge (PT/OT)','',100,0,1),
(78,'Cabin Charge','',100,0,1),
(79,'Double (Normal)','Double (Normal)',0,1200,1),
(80,'Double (A/C)','Double (A/C)',0,2500,1),
(81,'Single Bed','Single Bed',0,600,1);

/*Table structure for table `bm_bed` */

DROP TABLE IF EXISTS `bm_bed`;

CREATE TABLE `bm_bed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `limit` int(3) NOT NULL,
  `charge` float NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `bm_bed` */

insert  into `bm_bed`(`id`,`type`,`description`,`limit`,`charge`,`status`) values 
(1,'Single','',4,600,1),
(2,'Double','Double (Normal)',4,1200,1),
(3,'Double (A/C)','',2,2500,1);

/*Table structure for table `bm_bed_assign` */

DROP TABLE IF EXISTS `bm_bed_assign`;

CREATE TABLE `bm_bed_assign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial` varchar(20) DEFAULT NULL,
  `patient_id` varchar(20) NOT NULL,
  `bed_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `assign_date` date NOT NULL,
  `discharge_date` date NOT NULL,
  `assign_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `bm_bed_assign` */

insert  into `bm_bed_assign`(`id`,`serial`,`patient_id`,`bed_id`,`description`,`assign_date`,`discharge_date`,`assign_by`,`status`) values 
(4,'EM9M10','190213051832',1,'Test Admit. ','2019-03-23','2019-03-23',54,1),
(5,'NCKUMP','190323194205',1,'Test Booking. ','2019-03-23','2019-03-23',54,1),
(6,'SYZXP4','190210638504',2,'','2019-03-23','0000-00-00',59,1),
(7,'M5GPGU','190209078261',3,'','2019-03-23','0000-00-00',59,1),
(8,'E6YPJ3','190405527416',2,'','2019-04-05','0000-00-00',55,1);

/*Table structure for table `cm_patient` */

DROP TABLE IF EXISTS `cm_patient`;

CREATE TABLE `cm_patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(30) NOT NULL,
  `case_manager_id` int(11) NOT NULL,
  `ref_doctor_id` int(11) DEFAULT NULL,
  `hospital_name` varchar(255) DEFAULT NULL,
  `hospital_address` text,
  `doctor_name` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cm_patient` */

/*Table structure for table `cm_status` */

DROP TABLE IF EXISTS `cm_status`;

CREATE TABLE `cm_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `critical_status` varchar(255) NOT NULL DEFAULT '1',
  `cm_patient_id` int(11) NOT NULL,
  `description` text,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cm_status` */

/*Table structure for table `custom_sms_info` */

DROP TABLE IF EXISTS `custom_sms_info`;

CREATE TABLE `custom_sms_info` (
  `custom_sms_id` int(11) NOT NULL AUTO_INCREMENT,
  `reciver` varchar(100) NOT NULL,
  `gateway` text NOT NULL,
  `message` text NOT NULL,
  `sms_date_time` datetime NOT NULL,
  PRIMARY KEY (`custom_sms_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `custom_sms_info` */

/*Table structure for table `customer_ledger` */

DROP TABLE IF EXISTS `customer_ledger`;

CREATE TABLE `customer_ledger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(100) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `invoice_no` varchar(100) DEFAULT NULL,
  `receipt_no` varchar(50) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `cheque_no` varchar(255) NOT NULL,
  `date` varchar(50) NOT NULL,
  `status` int(2) NOT NULL,
  `d_c` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `receipt_no` (`receipt_no`),
  KEY `receipt_no_2` (`receipt_no`),
  KEY `receipt_no_3` (`receipt_no`),
  KEY `receipt_no_4` (`receipt_no`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

/*Data for the table `customer_ledger` */

/*Table structure for table `department` */

DROP TABLE IF EXISTS `department`;

CREATE TABLE `department` (
  `dprt_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `department` */

insert  into `department`(`dprt_id`,`name`,`description`,`status`) values 
(30,'Orthopaedics','Orthopedic surgery or orthopedics is the branch of surgery concerned with conditions involving the musculoskeletal system.',1),
(31,'Musculoskeletal',' Musculoskeletal disorders (MSDs) are conditions that can affect your muscles, bones, and joints. ',1),
(33,'Doctor Chamber ','Consultancy activities ',1),
(34,'Bela Assistive Device Corner','Rehab. Aid Products sell point',1),
(35,'BPDTC','A Training Institute',1),
(36,'BIRHS ','An Institute ',1),
(37,'Care Giver Training ','A Special Training Program For 15 days in Autism, CP Child Guardians. ',1),
(38,'Rongdhanu','A special Needs School ',1),
(39,'Speech & Language Therapy','',1),
(40,'Occupational therapy','',1),
(41,'Physiotherapy','',1),
(0,'Accident and emergency','',1),
(0,'Anaesthetics','',1),
(0,'Breast screening','',1),
(0,'Cardiology','',1),
(0,'Chaplaincy','',1),
(0,'Critical care','',1),
(0,'Diagnostic imaging','',1),
(0,'Ear nose and throat ','Ear nose and throat (ENT)',1),
(0,'Elderly services department','',1),
(0,'Gastroenterology','',1),
(0,'General surgery','',1),
(0,'Gynaecology','',1),
(0,'Haematology','',1),
(0,'Maternity departments','',1),
(0,'Microbiology','',1),
(0,'Neonatal unit','',1),
(0,'Nephrology','',1),
(0,'Neurology','',1),
(0,'Nutrition and dietetics','',1),
(0,'Obstetrics and gynaecology units','',1),
(0,'Oncology','',1),
(0,'Ophthalmology','',1),
(0,'Pain management','',1),
(0,'Physiotherapy','',1),
(0,'Radiotherapy','',1),
(0,'Renal unit','',1),
(0,'Rheumatology','',1),
(0,'Sexual health','Sexual health (genitourinary medicine)',1),
(0,'Urology','',1);

/*Table structure for table `document` */

DROP TABLE IF EXISTS `document`;

CREATE TABLE `document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(30) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `description` text,
  `hidden_attach_file` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `upload_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `document` */

/*Table structure for table `enquiry` */

DROP TABLE IF EXISTS `enquiry`;

CREATE TABLE `enquiry` (
  `enquiry_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `enquiry` text,
  `checked` tinyint(1) DEFAULT NULL,
  `ip_address` varchar(20) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `checked_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`enquiry_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `enquiry` */

/*Table structure for table `ha_birth` */

DROP TABLE IF EXISTS `ha_birth`;

CREATE TABLE `ha_birth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ha_birth` */

/*Table structure for table `ha_category` */

DROP TABLE IF EXISTS `ha_category`;

CREATE TABLE `ha_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` text,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ha_category` */

/*Table structure for table `ha_death` */

DROP TABLE IF EXISTS `ha_death`;

CREATE TABLE `ha_death` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ha_death` */

/*Table structure for table `ha_investigation` */

DROP TABLE IF EXISTS `ha_investigation`;

CREATE TABLE `ha_investigation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ha_investigation` */

/*Table structure for table `ha_medicine` */

DROP TABLE IF EXISTS `ha_medicine`;

CREATE TABLE `ha_medicine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `manufactured_by` varchar(255) NOT NULL,
  `create_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ha_medicine` */

/*Table structure for table `ha_operation` */

DROP TABLE IF EXISTS `ha_operation`;

CREATE TABLE `ha_operation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ha_operation` */

/*Table structure for table `inc_insurance` */

DROP TABLE IF EXISTS `inc_insurance`;

CREATE TABLE `inc_insurance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `insurance_name` varchar(255) DEFAULT NULL,
  `service_tax` varchar(50) DEFAULT NULL,
  `discount` varchar(50) DEFAULT NULL,
  `remark` text,
  `insurance_no` varchar(50) DEFAULT NULL,
  `insurance_code` varchar(50) DEFAULT NULL,
  `disease_charge` text COMMENT 'array(name, charge)',
  `hospital_rate` varchar(50) DEFAULT NULL,
  `insurance_rate` varchar(50) DEFAULT NULL,
  `total` varchar(50) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `inc_insurance` */

/*Table structure for table `inc_limit_approval` */

DROP TABLE IF EXISTS `inc_limit_approval`;

CREATE TABLE `inc_limit_approval` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(30) DEFAULT NULL,
  `room_no` varchar(100) DEFAULT NULL,
  `disease_details` text COMMENT 'name, description',
  `consultant_id` int(11) DEFAULT NULL COMMENT 'doctor list',
  `policy_name` varchar(255) DEFAULT NULL,
  `policy_no` varchar(100) DEFAULT NULL,
  `policy_holder_name` varchar(255) DEFAULT NULL,
  `insurance_id` int(11) DEFAULT NULL,
  `approval_breakup` text COMMENT 'name, charge',
  `total` varchar(50) DEFAULT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `inc_limit_approval` */

/*Table structure for table `invoice` */

DROP TABLE IF EXISTS `invoice`;

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` varchar(50) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `date` varchar(50) DEFAULT NULL,
  `total_amount` float NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `total_discount` float DEFAULT NULL COMMENT 'total invoice discount',
  `invoice_discount` float NOT NULL,
  `total_tax` float DEFAULT NULL,
  `paid_amount` float DEFAULT '0',
  `due_amount` float NOT NULL DEFAULT '0',
  `invoice_details` varchar(200) DEFAULT NULL,
  `status` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `invoice` */

/*Table structure for table `invoice_details` */

DROP TABLE IF EXISTS `invoice_details`;

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_details_id` varchar(100) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `batch_id` varchar(30) NOT NULL,
  `cartoon` float DEFAULT NULL,
  `quantity` float NOT NULL,
  `rate` float NOT NULL,
  `manufacturer_rate` float DEFAULT NULL,
  `total_price` float NOT NULL,
  `discount` float DEFAULT NULL,
  `tax` float DEFAULT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `invoice_details` */

/*Table structure for table `lab_invoice` */

DROP TABLE IF EXISTS `lab_invoice`;

CREATE TABLE `lab_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` varchar(50) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `doctor_id` int(11) DEFAULT '0',
  `date` varchar(50) DEFAULT NULL,
  `total_amount` float NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `total_discount` float DEFAULT NULL COMMENT 'total invoice discount',
  `invoice_discount` float NOT NULL,
  `total_tax` float DEFAULT NULL,
  `paid_amount` float DEFAULT '0',
  `due_amount` float NOT NULL DEFAULT '0',
  `invoice_details` varchar(200) DEFAULT NULL,
  `status` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

/*Data for the table `lab_invoice` */

insert  into `lab_invoice`(`id`,`invoice_id`,`customer_id`,`doctor_id`,`date`,`total_amount`,`invoice`,`total_discount`,`invoice_discount`,`total_tax`,`paid_amount`,`due_amount`,`invoice_details`,`status`,`created_at`,`created_by`) values 
(17,'1904063824017','190206680953',0,'2019-04-06',500,'1904063824017',0,0,0,500,0,'',1,'2019-04-06 15:44:45',0),
(18,'1904064395806','190208197538',70,'2019-04-06',1880,'1904064395806',0,20,0,1500,380,'',0,'2019-04-06 17:18:41',0),
(19,'1904069678021','190206609124',71,'2019-04-06',720,'1904069678021',70,10,0,700,20,'hellow',0,'2019-04-06 17:31:38',0),
(20,'1904130921345','190214093728',70,'2019-04-13',500,'1904130921345',0,0,0,500,0,'',1,'2019-04-13 10:54:27',0),
(21,'1904131490653','190413456890',73,'2019-04-13',2500,'1904131490653',0,0,0,2500,0,'test 1',1,'2019-04-13 11:54:28',0),
(22,'1904135219380','190413394570',73,'2019-04-13',1170,'1904135219380',130,0,0,1100,70,'',0,'2019-04-13 12:25:12',0),
(23,'1904137698512','190413260954',76,'2019-04-13',1600,'1904137698512',0,100,0,1500,100,'sdfdsf',0,'2019-04-13 12:34:06',0);

/*Table structure for table `lab_invoice_details` */

DROP TABLE IF EXISTS `lab_invoice_details`;

CREATE TABLE `lab_invoice_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_details_id` varchar(100) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `quantity` float NOT NULL,
  `rate` float NOT NULL,
  `total_price` float NOT NULL,
  `discount` float DEFAULT NULL,
  `tax` float DEFAULT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

/*Data for the table `lab_invoice_details` */

insert  into `lab_invoice_details`(`id`,`invoice_details_id`,`invoice_id`,`product_id`,`quantity`,`rate`,`total_price`,`discount`,`tax`,`status`) values 
(19,'1904064390671',17,'1',1,500,500,0,0,1),
(20,'1904064380725',18,'1',1,500,500,0,0,1),
(21,'1904066317089',18,'130',1,200,200,0,0,1),
(22,'1904069230165',18,'11',1,1200,1200,0,0,1),
(23,'1904065162340',19,'1',1,500,500,10,0,1),
(24,'1904066524819',19,'123',3,100,300,20,0,1),
(25,'1904136807521',20,'1',1,500,500,0,0,1),
(26,'1904133602184',21,'1',5,500,2500,0,0,1),
(27,'1904131389674',22,'1',2,500,1000,50,0,1),
(28,'1904139704281',22,'123',3,100,300,10,0,1),
(29,'1904139563874',23,'1',1,500,500,0,0,1),
(30,'1904133796421',23,'76',1,1200,1200,0,0,1);

/*Table structure for table `lab_report_data` */

DROP TABLE IF EXISTS `lab_report_data`;

CREATE TABLE `lab_report_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` text NOT NULL,
  `sorting_order` int(5) DEFAULT '1',
  `status` int(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

/*Data for the table `lab_report_data` */

insert  into `lab_report_data`(`id`,`template_id`,`report_id`,`attribute_id`,`value`,`sorting_order`,`status`,`created_at`,`updated_at`) values 
(1,1,20,1,'1',1,1,'2019-04-06 15:46:19',NULL),
(2,1,20,2,'5',2,1,'2019-04-06 15:46:19',NULL),
(3,1,20,593,'9',3,1,'2019-04-06 15:46:19',NULL),
(4,1,20,594,'2',4,1,'2019-04-06 15:46:19',NULL),
(5,1,20,596,'5',6,1,'2019-04-06 15:46:19',NULL),
(6,1,20,597,'2',7,1,'2019-04-06 15:46:20',NULL),
(7,1,20,598,'8',8,1,'2019-04-06 15:46:20',NULL),
(8,1,20,599,'1',9,1,'2019-04-06 15:46:20',NULL),
(9,1,20,600,'52',10,1,'2019-04-06 15:46:20',NULL),
(10,1,30,1,'12',1,1,'2019-04-13 13:14:28',NULL),
(11,1,30,2,'12',2,1,'2019-04-13 13:14:28',NULL),
(12,1,30,593,'0',3,1,'2019-04-13 13:14:28',NULL),
(13,1,30,594,'24998',4,1,'2019-04-13 13:14:28',NULL),
(14,1,30,596,'50',6,1,'2019-04-13 13:14:28',NULL),
(15,1,30,597,'20',7,1,'2019-04-13 13:14:28',NULL),
(16,1,30,598,'2',8,1,'2019-04-13 13:14:28',NULL),
(17,1,30,599,'4',9,1,'2019-04-13 13:14:28',NULL),
(18,1,30,600,'00',10,1,'2019-04-13 13:14:28',NULL),
(19,1,26,1,'2',1,1,'2019-04-13 13:19:48',NULL),
(20,1,26,2,'23',2,1,'2019-04-13 13:19:48',NULL),
(21,1,26,593,'21',3,1,'2019-04-13 13:19:48',NULL),
(22,1,26,594,'2999',4,1,'2019-04-13 13:19:48',NULL),
(23,1,26,596,'40',6,1,'2019-04-13 13:19:48',NULL),
(24,1,26,597,'30',7,1,'2019-04-13 13:19:48',NULL),
(25,1,26,598,'2',8,1,'2019-04-13 13:19:48',NULL),
(26,1,26,599,'4',9,1,'2019-04-13 13:19:48',NULL),
(27,1,26,600,'1',10,1,'2019-04-13 13:19:48',NULL);

/*Table structure for table `lab_report_template_items` */

DROP TABLE IF EXISTS `lab_report_template_items`;

CREATE TABLE `lab_report_template_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `input_type` varchar(100) NOT NULL,
  `unit_id` int(11) NOT NULL DEFAULT '0',
  `reference_value` text,
  `sorting_order` int(5) DEFAULT '1',
  `status` int(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=631 DEFAULT CHARSET=utf8;

/*Data for the table `lab_report_template_items` */

insert  into `lab_report_template_items`(`id`,`template_id`,`name`,`code`,`input_type`,`unit_id`,`reference_value`,`sorting_order`,`status`,`created_at`,`updated_at`) values 
(1,1,'Hb ( Haemoglobin )','hb','number',3,'Male: 13 – 18 {{ unit }}\r\nFemale:  11 – 16 {{ unit }}\r\nNew born: 16 - 25 {{ unit }}',1,1,'2018-12-10 08:59:16',NULL),
(2,1,'( Cyanmethaemoglobin method )','cym','number',4,'Male: 13 – 18 {{ unit }}\r\nFemale:  11 – 16 {{ unit }}\r\nNew born: 16 - 25 {{ unit }}',2,1,'2018-12-10 08:59:16',NULL),
(3,2,'A+','','text',4,'',1,1,'2018-12-12 17:57:10',NULL),
(11,3,'Hb (Haemoglobin)','hb','text',3,'Male: 13 - 18 g/dl\r\nFemale: 11 - 16 g/dl\r\nNew born: 16 - 25 g/dl',1,1,'2018-12-17 10:32:15',NULL),
(12,4,'S. Ceruloplasmin Level','s_ceruloplasmin_level','text',11,'20.0-50.0 mg/dl',1,1,'2018-12-22 15:41:52',NULL),
(13,5,'Hb ( Haemoglobin ) ','Hb ( Haemoglobin','text',3,'Male: 13 - 18 gm/dl',1,1,'2018-12-22 15:51:51',NULL),
(14,5,'(Cyanmethaemoglobin method)','cyanmethaemoglobin_method','text',4,'Female: 11 - 16 {{Unit}}\r\nNew born: 16 - 25 {{Unit}}',2,1,'2018-12-22 15:51:51',NULL),
(23,6,'S. Total Protein','s_total_protein','number',14,'6.6 - 8.7 {{unit}}',1,1,'2018-12-22 18:17:38',NULL),
(24,6,'S. Albumin','s_albumin','number',4,'3.5 - 5.0 {{unit}}',2,1,'2018-12-22 18:17:38',NULL),
(25,6,'S. Globulin','s_globulin','number',14,'2.2 - 3.5 {{unit}}',3,1,'2018-12-22 18:17:38',NULL),
(26,6,'A/ G Ratio','a_g_atio','number',51,'1.2 {{unit}} - 2.5{{unit}}',4,1,'2018-12-22 18:17:38',NULL),
(27,7,'Sample 1','sample_1','text',3,'',1,1,'2018-12-22 18:38:59',NULL),
(28,7,'Sample 2','sample_2','text',3,'',2,1,'2018-12-22 18:38:59',NULL),
(29,7,'Sample 3','sample_3','text',3,'',3,1,'2018-12-22 18:38:59',NULL),
(30,8,'Ampicillin','ampicillin','text',0,'Shows {{}} of bacteria',1,1,'2018-12-22 19:12:40',NULL),
(31,9,'Anti- Tg (Thyroglobulin)','anti_tg','number',7,'&lt;75.00 {{unit}}',1,1,'2018-12-23 15:08:22',NULL),
(32,10,'Anti- TPO (Thyroperoxidase)','anti-tpo','text',7,'&lt;30.00 IU/ml',1,1,'2018-12-23 15:10:45',NULL),
(33,9,'Anti- TPO (Thyroperoxidase)','anti_tpo','number',7,'&lt; 30.00 {{unit}}',2,1,'2018-12-23 15:15:31',NULL),
(34,11,'Anti- HIV (1&2)','anti_hiv_1_2','number',0,'0.139',1,1,'2018-12-23 15:19:53',NULL),
(35,12,'Alpha-Feto Protein','alpha_feto_protein','number',8,'Adult: &lt;5.0 {{unit}}\r\n1 Years: &lt;30',1,1,'2018-12-23 15:22:22',NULL),
(36,11,'Impression','impression','positive_negetive',0,'',2,1,'2018-12-23 15:24:53',NULL),
(37,13,'Anti HBs by ELISA','anti_hbs_by_elisa','section',0,'',1,1,'2018-12-23 15:29:14',NULL),
(38,14,'Lipid Profile','lipid_profile','sub_section',0,'',1,1,'2018-12-23 15:32:40',NULL),
(39,14,'S. Cholesterol ( Total )','s_cholesterol_total','text',11,'200 - 239 {{unit}}',2,1,'2018-12-23 15:32:40',NULL),
(40,14,'S. Cholesterol ( HDL )','s_cholesterol_hdl','text',11,'>35 {{unit}}',3,1,'2018-12-23 15:32:40',NULL),
(41,14,'S. Cholesterol ( LDL )','s_cholesterol_ldl','text',11,'&lt;150 mg/dl',4,1,'2018-12-23 15:32:40',NULL),
(42,14,'S. Triglycerides','s_triglycerides','text',11,'35 - 160 {{unit}}',5,1,'2018-12-23 15:32:40',NULL),
(43,15,'Serum ANA (Antinuclear Antibodies)','serum_ana','text',55,'',1,1,'2018-12-23 15:37:50',NULL),
(44,16,'Blood Urea','blood_urea','number',11,'10-50 {{unit}}',1,1,'2018-12-23 15:41:06',NULL),
(45,17,'S. Uric Acid','s_uric_acid','text',11,'Male. 3.4-7.0 {{unit}}\r\nFemale. 2.4-5.7 {{unit}}',1,1,'2018-12-23 15:44:27',NULL),
(46,18,'need to correction','need','text',0,'',1,1,'2018-12-23 15:45:29',NULL),
(47,19,'S. Amylase','s_amylase','number',12,'Up to 100 {{unit}}',1,1,'2018-12-23 15:46:34',NULL),
(48,20,'S. Lipase','s_lipase','number',12,'23-300 {{unit}}',1,1,'2018-12-23 15:49:15',NULL),
(49,21,'Sodium (Na+)','sodium','number',10,'135-145 {{unit}}',1,1,'2018-12-23 15:56:50',NULL),
(50,21,'Potassium (k+)','potassium','number',10,'3.5-5.5 {{unit}}',2,1,'2018-12-23 15:56:50',NULL),
(51,21,'Chloride (CL-)','chloride','number',10,'96-110 {{unit}}',3,1,'2018-12-23 15:56:50',NULL),
(52,22,'S. Albumin','S_albumin','number',4,'3.5-5.0 {{unit}}',1,1,'2018-12-23 15:59:00',NULL),
(53,23,'Malarial Parasite (MP)','malarial_parasite','text',0,'-',1,1,'2018-12-23 16:20:51',NULL),
(54,23,'Platelets Count (P.C)','platelets_count','number',26,'150 - 350 {{unit}}',2,1,'2018-12-23 16:20:51',NULL),
(55,23,'Total Circulating Eosinophils Count (TCE)','circulating_eosinophils_count','number',49,'Up to 400 {{unit}}',3,1,'2018-12-23 16:20:51',NULL),
(56,24,'S. Progesterone','s_progesterone','number',8,'Male: 0.27-0.90 {{unit}}\r\nFemale:\r\nFollicular Phase :0.32-2.0 {{unit}}\r\nMidcycle :0.77-2.3 {{unit}}\r\nL Uteal Phase : 1.19-21.6 {{unit}}\r\nPostmenopausal :&lt;1.0 {{unit}}\r\n1st Trimester :9.3-33.2 {{unit}}\r\n2nd Trimester : 29.5-50 {{unit}}\r\n3rd Trimester : 83.1-160 {{unit}}',1,1,'2018-12-23 16:29:17',NULL),
(57,25,'Serum PSA','serum_psa','text',8,'&lt; 4.0 {{unit}}',1,1,'2018-12-23 18:20:27',NULL),
(58,26,'Growth Hormone (GH)','growth_hormone','text',8,'1 - 10 {{unit}}',1,1,'2018-12-23 18:21:52',NULL),
(59,27,'Serum Cortisol','serum_cortisol','text',8,'50 - 230 {{unit}}\r\nBetween 8.00 - 10.00 AM \r\n30 - 150 {{unit}} at 4.00 PM ',1,1,'2018-12-23 18:24:48',NULL),
(60,28,'Progesterone','progesterone','text',8,'Male : 0.27-0.90 {{unit}}. \r\nFemale :\r\nFollicular Phase  :0.32-2.0 {{unit}}\r\nMidcycle            : 0.77-2.3 {{unit}}. \r\nL Uteal Phase     : 1.19-21.6 {{unit}}l. \r\nPostmenopausal  : &lt;1.0 {{unit}}. \r\nIst Trimester       : 9.3-33.2 {{unit}}. \r\n2nd Trimester      : 29.5-50 {{unit}}. \r\n3rd Trimester       : 83.1-160 {{unit}}.',1,1,'2018-12-23 18:33:30',NULL),
(61,28,'Estradiol','estradiol','text',21,'Male : &lt; 56 {{unit}}. \r\nFemale :\r\nFollicular Phase  :&lt;160 {{unit}}\r\nPeriovulatory : 34-400 {{unit}}\r\n(+or-3 days).\r\nLuteal Phase : 27-246 {{unit}}\r\nPostmenopausal : &lt;93 {{unit}}.',2,1,'2018-12-23 18:33:30',NULL),
(62,29,'Serum Prolactine','serum_prolactine','text',8,'Male: 2.10 - 17.70\r\nFemale: \r\nNon pregnant: 2.8 - 29.2\r\nPregnant: 9.7 - 208.5\r\nPostmenopausal: 1.8 - 20.3',1,1,'2018-12-23 18:44:06',NULL),
(63,30,'Hb ( Haemoglobin )','hb_haemoglobin','text',3,'Male: 13 - 18 gm/dl\r\nFemale: 11 - 16 gm/dl',1,1,'2018-12-23 19:18:38',NULL),
(64,30,'(Cyanmethaemoglobin method)','cyanmethaemoglobin_method','text',4,'New born: 16 - 25 gm/dl',2,1,'2018-12-23 19:18:38',NULL),
(65,31,'RBC','rbc','text',0,'',1,1,'2018-12-23 19:29:12',NULL),
(66,32,'Random blood sugar (RBS)','random_blood_sugar','text',10,'3.5 - 7.8 {{unit}}',1,1,'2018-12-23 19:35:03',NULL),
(67,33,'S. Creatinine ','s_creatinine','text',11,'Male: 0.7 - 1.4 {{unit}}\r\nFemale: 0.6 - 1.1 {{unit}}',1,1,'2018-12-23 19:37:13',NULL),
(68,34,'S. Calcium','s_calcium','text',11,'Adult: 8.8 - 10.5 {{unit}}\r\nNewborn: 8.0 - 13.0 {{unit}}\r\nEnfants: 8.8 - 12.0 {{unit}}',1,1,'2018-12-23 19:39:10',NULL),
(69,35,'S. GPT','s_gpt','text',12,'10 - 45 {{unit}}',1,1,'2018-12-23 19:42:07',NULL),
(70,36,'S. GOT ( AST )','s_got_ast','text',12,'10 - 35 {{unit}}',1,1,'2018-12-23 19:44:04',NULL),
(71,37,'S. Alkaline Phosphate ( ALP )','s_alkaline_phosphate_alp','text',12,'Adult: 98 - 279 {{unit}}\r\nChildren: 73 - 207 {{unit}}',1,1,'2018-12-23 19:46:10',NULL),
(72,38,'Fasting blood sugar ( FBS )','fasting_blood_sugar','number',10,'4.2 - 6.4 {{unit}}',1,1,'2018-12-23 19:56:00',NULL),
(73,38,'C.U.S','cus','text',0,'-',2,1,'2018-12-23 19:56:00',NULL),
(74,38,'2hr After Breakfast','2hr_after_reakfast','number',10,'4.44 - 7.8 {{unit}}',3,1,'2018-12-23 19:56:00',NULL),
(75,38,'C.U.S','cus_1','text',0,'-',4,1,'2018-12-23 19:56:00',NULL),
(76,39,'Anti HCV','anti_hcv','number',0,'0.139',1,1,'2018-12-23 20:00:19',NULL),
(77,39,'Impression','impression','positive_negetive',0,'',2,1,'2018-12-23 20:00:19',NULL),
(78,40,'Anti-CCP Ab','anti_ccp_ab','number',23,'< 20>60.00 Strong Positive',1,1,'2018-12-23 20:02:52',NULL),
(79,41,'Serum Iron','serum_iron','text',44,'Male: 59 - 158 {{unit}}\r\nFemale: 37 - 45 {{unit}}',1,1,'2018-12-23 20:12:45',NULL),
(80,41,'Serum Ferritin','serum_ferritin','text',8,'Male: 22 - 322 {{unit}}\r\nFemale: 10 - 191 {{unit}}',2,1,'2018-12-23 20:12:45',NULL),
(81,41,'Serum TIBC','serum_tibc','text',44,'255 - 390 {{unit}} ',3,1,'2018-12-23 20:12:45',NULL),
(82,42,'S. Bilirubin (Total)','s_ilirubin_total','text',11,'0.4 - 1.2 {{unit}}',1,1,'2018-12-23 20:19:30',NULL),
(83,43,'Vit B12','vit_b12','text',8,'180 - 914 {{unit}} ',1,1,'2018-12-23 20:21:26',NULL),
(85,44,'24 Hour Urine For Electrolytes','24_hour_urine_for_electrolytes','text',0,'',2,1,'2018-12-23 20:32:45',NULL),
(86,44,'Sodium (Na<sup>+</sup>)','sodium_na+','text',10,'30 - 90 {{unit}}',3,1,'2018-12-23 20:32:45',NULL),
(87,44,'Potassium (K<sup>+</sup>)','potassium _k+','text',10,'Varies with diet',4,1,'2018-12-23 20:32:45',NULL),
(88,45,'Sodium (Na+)','sodium','number',10,'135-148 {{unit}}',1,1,'2018-12-24 10:23:22',NULL),
(89,45,'Potassium (k+)','potassium','number',10,'3.5-5.8 {{unit}}',2,1,'2018-12-24 10:23:22',NULL),
(90,45,'Chloride (CL-)','chloride','number',10,'98-107 {{unit}}',3,1,'2018-12-24 10:23:22',NULL),
(91,45,'Tco2','tco','number',10,'M: 25-29,\r\nF: 23-27',4,1,'2018-12-24 10:23:22',NULL),
(92,46,'NS1 Antigen For Dengue','ns1_antigen_for_dengue','text',0,'-',1,1,'2018-12-24 11:41:49',NULL),
(96,47,'I.C.T For Chikungunya','ict_for_chikungunya','text',0,'-',2,1,'2018-12-24 11:43:55',NULL),
(97,47,'IgG','igg','positive_negetive',0,'-',3,1,'2018-12-24 11:43:55',NULL),
(98,48,'Hb (Haemoglobin) (Cyanmethaemoglobin)','hb_haemoglobin','number',3,'',1,1,'2018-12-24 11:46:22',NULL),
(99,48,'Hb (Haemoglobin) (Cyanmethaemoglobin)','hb_haemoglobin_1','number',4,'Male: 13-18 {{unit}}\r\nFemale: 11-16 {{unit}}\r\nNew born: 16-25 {{unit}}',2,1,'2018-12-24 11:46:22',NULL),
(100,48,'ESR (Westergren)','esr_westergren','number',48,'Male: 0-15 {{unit}}\r\nFemale: 0-20 {{unit}}',3,1,'2018-12-24 11:46:22',NULL),
(101,48,'Total Count of WBC','count_wbc','number',49,'4,000-11,000 {{unit}}',4,1,'2018-12-24 11:46:22',NULL),
(102,48,'Neutrophils','neutrophils','number',3,'40-75 {{unit}}',5,1,'2018-12-24 11:46:22',NULL),
(103,48,'Lymphocytes','lymphocytes','number',3,'20-50 {{unit}}',6,1,'2018-12-24 11:46:22',NULL),
(104,48,'Monocytes','monocytes','number',3,'02-04 {{unit}}',7,1,'2018-12-24 11:46:22',NULL),
(105,48,'Eosinophils','eosinophils','number',3,'02-06 {{unit}}',8,1,'2018-12-24 11:46:22',NULL),
(106,48,'Basophils','basophils','number',3,'00-01 {{unit}}',9,1,'2018-12-24 11:46:22',NULL),
(107,49,'OGTT','ogtt','section',0,'',1,1,'2018-12-24 11:53:31',NULL),
(108,49,'Fasting blood sugar (FBS)','fasting_blood_sugar','number',10,'4.2-6.4 {{unit}}',2,1,'2018-12-24 11:53:31',NULL),
(109,49,'C.U.S','cus','text',0,'',3,1,'2018-12-24 11:53:31',NULL),
(110,49,'2hr After 75gm Glucose','after_glucose','number',10,'4.44-7.8 {{unit}}',4,1,'2018-12-24 11:53:31',NULL),
(111,50,'I.C.T For Dengue','ict_for_dengue','section',0,'',1,1,'2018-12-24 11:55:38',NULL),
(112,50,'IgG','igg','positive_negetive',0,'-',2,1,'2018-12-24 11:55:38',NULL),
(113,51,'PHYSICAL EXAMINATION','physical_examination','sub_section',0,'',1,1,'2018-12-24 11:57:05',NULL),
(114,51,'Colour','colour','text',0,'',2,1,'2018-12-24 11:57:05',NULL),
(115,51,'Appearance','appearance','text',0,'',3,1,'2018-12-24 11:57:05',NULL),
(116,51,'Sediment','sediment','text',0,'',4,1,'2018-12-24 11:57:05',NULL),
(117,51,'Specific Gravity','specific_gravity','text',0,'',5,1,'2018-12-24 11:57:05',NULL),
(118,51,'CHEMICAL EXAMINATION','chemical_examination','sub_section',0,'',6,1,'2018-12-24 11:57:05',NULL),
(119,51,'Reaction','reaction','text',0,'',7,1,'2018-12-24 11:57:05',NULL),
(120,51,'Excess of Phosphate','excess_of_phosphate','text',0,'',8,1,'2018-12-24 11:57:05',NULL),
(121,51,'Albumin','albumin','text',0,'',9,1,'2018-12-24 11:57:05',NULL),
(122,51,'Suger (reducing substance)','suger_reducing_substance','text',0,'',10,1,'2018-12-24 11:57:05',NULL),
(123,51,'Acetone','acetone','text',0,'',11,1,'2018-12-24 11:57:05',NULL),
(124,51,'MICROSCOPIC EXAMINATION','mivroscopic_examination','sub_section',0,'',12,1,'2018-12-24 11:57:05',NULL),
(125,51,'Epithelial cells','epithelial_cells','text',0,'',13,1,'2018-12-24 11:57:05',NULL),
(126,51,'RBC','rbc','text',0,'',14,1,'2018-12-24 11:57:05',NULL),
(127,51,'Pus cells','pus_cells','text',0,'',15,1,'2018-12-24 11:57:05',NULL),
(128,51,'Cellular casts','cellular_casts','text',0,'',16,1,'2018-12-24 11:57:05',NULL),
(129,51,'Yeasts','yeasts','text',0,'',17,1,'2018-12-24 11:57:05',NULL),
(130,51,'Calcium oxalate Crystals','calcium_oxalate_crystals','text',0,'',18,1,'2018-12-24 11:57:05',NULL),
(131,51,'Triple phosphate','triple_phosphate','text',0,'',19,1,'2018-12-24 11:57:05',NULL),
(132,51,'RBC Cast','rbc_cast','text',0,'',20,1,'2018-12-24 11:57:05',NULL),
(133,51,'Granular Casts','granular_casts','text',0,'',21,1,'2018-12-24 11:57:05',NULL),
(134,51,'Amorphous phosphate','amorphous_phosphate','text',0,'',22,1,'2018-12-24 11:57:05',NULL),
(135,51,'Calcium oxalate','calcium_oxalate','text',0,'',23,1,'2018-12-24 11:57:05',NULL),
(136,51,'Uric Acid Crystals','uric_acid_crystals','text',0,'',24,1,'2018-12-24 11:57:05',NULL),
(137,51,'Cystine Crystals','cystine_crystals','text',0,'',25,1,'2018-12-24 11:57:05',NULL),
(138,52,'Rh (D) Antibody Titre','rh_antibody_titre','text',0,'',1,1,'2018-12-24 11:57:57',NULL),
(139,53,'Urine for Bence Jones Protein','urine_for_bence_jones_protein','positive_negetive',0,'',1,1,'2018-12-24 11:58:33',NULL),
(140,54,'Pregnancy test','pregnancy_test','positive_negetive',0,'',1,1,'2018-12-24 11:59:27',NULL),
(141,55,'Blood Group ABO Rh (D) Factor','blood_group_abo_rh_factor','text',0,'',1,1,'2018-12-24 12:00:55',NULL),
(142,56,'Serum TSH','serum_tsh','number',18,'0.4 - 5.5 {{unit}}',1,1,'2018-12-24 12:03:14',NULL),
(143,56,'Thyroxine ( T4 )','thyroxine_t4','number',20,'Male: 4.4 - 10.8 {{unit}}\r\nFemale: 5.0 - 13.0 {{unit}}',2,1,'2018-12-24 12:03:14',NULL),
(144,56,'Total tri-iodothyronine ( T3 )','total_tri_iodothyronine_t3','number',8,'0.52 - 1.85 {{unit}}',3,1,'2018-12-24 12:03:14',NULL),
(145,57,'VDRL','vdrl','text',0,'',1,1,'2018-12-24 12:03:24',NULL),
(146,58,'Troponin - I','troponin-i','number',8,'Normal: 0 - 0.034 \r\nHigh Risk Group: 0 - 034 - 0.12\r\nAMI: 0.12 and above',1,1,'2018-12-24 12:04:54',NULL),
(147,59,'HBs Ag (Screening)','hbs_ag_screening','positive_negetive',0,'',1,1,'2018-12-24 12:05:27',NULL),
(148,60,'I.C.T. For Troponin I','ict_for_troponin_i','positive_negetive',0,'',1,1,'2018-12-24 12:05:55',NULL),
(149,61,'HBs Ag (Screening)','hbs_ag_screening','positive_negetive',0,'',1,1,'2018-12-24 12:07:51',NULL),
(150,62,'Triple Antigen:','triple_antigen','section',0,'',1,1,'2018-12-24 12:10:51',NULL),
(151,62,'Anti Rickettsia Ab:','anti_rickettsia_ab','section',0,'',2,1,'2018-12-24 12:10:51',NULL),
(152,62,'OXK','oxk','text',0,'1:40',3,1,'2018-12-24 12:10:51',NULL),
(153,62,'OX2','ox2','text',0,'1:40',4,1,'2018-12-24 12:10:51',NULL),
(154,62,'OX19','ox19','text',0,'1:40',5,1,'2018-12-24 12:10:51',NULL),
(155,62,'Anti Brucella Ab:','anti_brucella_ab','section',0,'',6,1,'2018-12-24 12:10:51',NULL),
(156,62,'(Brucella Abortus) BA','brucella_abortus_ba','text',0,'1:40',7,1,'2018-12-24 12:10:51',NULL),
(157,62,'(Brucella Melitensis) BM','brucella_melitensis_bm','text',0,'1:40',8,1,'2018-12-24 12:10:51',NULL),
(158,62,'WIDAL REACTION','widal_reaction','section',0,'',9,1,'2018-12-24 12:10:51',NULL),
(159,62,'TO','to','text',0,'1:80',10,1,'2018-12-24 12:10:51',NULL),
(160,62,'AO','ao','text',0,'1:80',11,1,'2018-12-24 12:10:51',NULL),
(161,62,'BO','bo','text',0,'1:80',12,1,'2018-12-24 12:10:51',NULL),
(162,62,'TH','th','text',0,'1:80',13,1,'2018-12-24 12:10:51',NULL),
(163,62,'AH','ah','text',0,'1:40',14,1,'2018-12-24 12:10:51',NULL),
(164,62,'BH','bh','text',0,'1:40',15,1,'2018-12-24 12:10:51',NULL),
(165,62,'Note:','note','textarea',0,'',16,1,'2018-12-24 12:10:51',NULL),
(166,63,'WIDAL TEST','widal_test_to','number',50,'1:80 {{unit}}',1,1,'2018-12-24 12:25:09',NULL),
(167,63,'WIDAL TEST','widal_test_th','number',50,'1:80 {{unit}}',2,1,'2018-12-24 12:25:09',NULL),
(168,63,'WIDAL TEST','widal_test_ah','number',50,'1:80 {{unit}}',3,1,'2018-12-24 12:25:09',NULL),
(169,63,'WIDAL TEST','widal_test_bh','number',50,'1:80 {{unit}}',4,1,'2018-12-24 12:25:09',NULL),
(170,63,'ASO Titre','aso_titre','number',7,'&lt;200 {{unit}}',5,1,'2018-12-24 12:25:09',NULL),
(171,63,'Rheumatoid Factor (R/A)','rheumatoid_factor','positive_negetive',0,'',6,1,'2018-12-24 12:25:09',NULL),
(172,63,'C-Reactive Protein (C R P)','reactive_protein','number',56,'&lt;6.0 {{unit}}',7,1,'2018-12-24 12:25:09',NULL),
(173,64,'I.C.T For Malarial Parasite (MP)','ict_malarial_parasite','positive_negetive',0,'-',1,1,'2018-12-24 12:35:19',NULL),
(174,64,'I.C.T For Kala-Azar','ict_kala_azar','positive_negetive',0,'-',2,1,'2018-12-24 12:35:19',NULL),
(175,64,'I.C.T For Filaria','ict_filaria','positive_negetive',0,'-',3,1,'2018-12-24 12:35:19',NULL),
(176,64,'Dengue IgG','dengue_igg','positive_negetive',0,'',4,1,'2018-12-24 12:35:19',NULL),
(177,64,'Dengue IgM','dengue_igm','positive_negetive',0,'',5,1,'2018-12-24 12:35:19',NULL),
(178,64,'ASO Titre','aso_titre','number',7,'&lt;200 {{unit}}',6,1,'2018-12-24 12:35:19',NULL),
(179,64,'C-Reactive Protein (C R P)','reactive_protein','number',56,'&lt;6 {{unit}}',7,1,'2018-12-24 12:35:19',NULL),
(180,64,'Rheumatoid Factor (R/A)','rheumatoid_factor','positive_negetive',0,'-',8,1,'2018-12-24 12:35:19',NULL),
(181,64,'I.C.T For Mycobacterium tuberculosis (TB)','ict_mycobacterium_tuberculosis','positive_negetive',0,'-',9,1,'2018-12-24 12:35:19',NULL),
(182,65,'Note1','note1','text',0,'',1,1,'2018-12-24 12:46:00',NULL),
(183,66,'Urine Amylase','urine_amylase','number',57,'1-17 {{unit}}',1,1,'2018-12-24 12:48:47',NULL),
(184,67,'Para Thyroid Hormone (PTH)','para_thyroid_hormone','number',21,'9.0-80.0 {{unit}}',1,1,'2018-12-24 12:53:05',NULL),
(185,68,'Specimen Source','specimen_source','text',0,'',1,1,'2018-12-24 12:54:57',NULL),
(186,69,'Microscopic Examination 02','microscopic_examination_02','text',0,'',1,1,'2018-12-24 12:56:31',NULL),
(187,70,'Oestrogen','oestrogen','number',21,'Children: &lt;10.00.\r\nAdult Male: 10.00-50.00\r\nAdult Female: \r\nNormal Follicular Phase: 26.6-161\r\nNormal Pre-ovulatory: 187-382\r\nNormal Luteal Phase: 32.7-201\r\nPostmenopausal: 5.37-38.4 ',1,1,'2018-12-24 13:04:59',NULL),
(188,71,'Serum LH','serum_lh','number',9,'Prepuberty Male: &lt;0.50\r\nAdult Male: 2.00-12.00\r\nPrepuberty Female: &lt;0.20\r\nAdult Female:\r\nFollicular phase: 2.0-15.0\r\nMidcycle peak: 22.0-105.0\r\nLuteal phase: 0.6-19.0\r\nPostmenopausal: 16.0-64.0',1,1,'2018-12-24 13:10:23',NULL),
(189,72,'Lactate Dehydrogenase (LDH)','lactate_dehydrogenase','number',12,'0 to 10 Days     : 290-2000 {{unit}}\r\n10 Days to 2 Years     : 180-430 {{unit}}\r\n02 to 12 Years     : 110-295 {{unit}}\r\nOlder than 12 Years     : 100-190 {{unit}}',1,1,'2018-12-24 13:16:06',NULL),
(190,73,'Patient','patient','text',0,'',1,1,'2018-12-24 13:20:51',NULL),
(191,74,'Cut off Value','cut_off_value','number',0,'',1,1,'2018-12-24 13:23:06',NULL),
(192,75,'HbA1c','hba1c','number',3,'4.5-6.3 {{unit}}',1,1,'2018-12-24 13:24:48',NULL),
(193,76,'Anti- H.Pylori IgG-Ab','anti_h.pylori_igg_ab','section',0,'',1,1,'2018-12-24 13:28:29',NULL),
(194,77,'Serum FSH','serum_fsh','number',9,'Prepuberty Male: &lt;2.00\r\nAdult Male: 1.00-8.00\r\nPrepuberty Female: &lt;2.00\r\nAdult Female:\r\nFollicular phase     : 4.0-13.0\r\nMidcycle peak     : 5.0-22.0\r\nLuteal phase     : 2.0-13.0\r\nPostmenopausal     : 20.0-138.0',1,1,'2018-12-24 13:33:45',NULL),
(195,78,'Serum Ferritin','serum_ferritin','number',8,'Adult Male: 20-300 {{unit}}\r\nAdult Female: 15-120 {{unit}}\r\nNew Born: 25-200 {{unit}}',1,1,'2018-12-24 13:36:37',NULL),
(196,79,'Sample Value','sample_value','number',23,'',1,1,'2018-12-24 13:48:32',NULL),
(197,80,'CK-MB','ck_mb','number',12,'Up to 25 {{unit}}',1,1,'2018-12-24 13:51:59',NULL),
(198,81,'Carcinoembryonic Antigen (CEA)','carcinoembryonic_antigeN','number',8,'&lt; 5.00 {{unit}}',1,1,'2018-12-24 13:54:10',NULL),
(199,82,'S. Magnesium','s_magnesium','number',11,'1.9-2.5 {{unit}}',1,1,'2018-12-24 13:56:16',NULL),
(200,83,'S. Creatinine','s_creatinine','number',11,'Male: 0.72-1.3 {{unit}}\r\nFemale: 0.6-1.1 {{unit}}',1,1,'2018-12-24 14:03:00',NULL),
(201,83,'Urine Creatinine','urine_creatinine','number',11,'Male: 63-166 {{unit}}\r\nFemale: 47-110 {{unit}}',2,1,'2018-12-24 14:03:00',NULL),
(202,83,'Urine Volume','urine_volume','number',6,'-',3,1,'2018-12-24 14:03:00',NULL),
(203,83,'CCR','ccr','number',27,'70-140 {{unit}}',4,1,'2018-12-24 14:03:00',NULL),
(204,84,'CEA','cea','number',8,'Non-Smoker: &lt;5.00 {{unit}}\r\nSmoker: &lt;10.00 {{unit}}',1,1,'2018-12-24 14:04:44',NULL),
(205,85,'CA-125','ca_125','number',23,'Up to: 35 {{unit}}',1,1,'2018-12-24 14:06:28',NULL),
(206,86,'Thyroxine (T4)','thyroxine_t4','number',20,'Male: 4.4-10.8 {{unit}}\r\nFemale: 4.8-11.6 {{unit}}',1,1,'2018-12-24 14:08:46',NULL),
(207,87,'Total tri-iodothyronine (T3)','total_tri-iodothyronine_t3','number',8,'0.52-1.85 {{unit}}',1,1,'2018-12-24 14:11:10',NULL),
(208,88,'Serum TSH','serum_tsh','number',18,'0.4-5.5 {{unit}}',1,1,'2018-12-24 14:12:50',NULL),
(209,89,'F T4','ft4','number',19,'8.50-22.50 {{unit}}',1,1,'2018-12-24 14:14:18',NULL),
(210,90,'F T3','ft3','number',19,'5.40-9.30 {{unit}}',1,1,'2018-12-24 14:15:34',NULL),
(211,91,'S. C3','sc3','number',17,'0.9-1.8 {{unit}}',1,1,'2018-12-24 14:18:13',NULL),
(212,91,'S. C4','sc4','number',17,'0.1-0.4 {{unit}}',2,1,'2018-12-24 14:18:13',NULL),
(213,92,'S. Ceruloplasmin Level','ceruloplasmin_level','number',11,'20.0-50.0 {{unit}}',1,1,'2018-12-24 14:26:46',NULL),
(214,93,'β-hCG','β-hcg','number',9,'Concentrations of B-hCG measured in the area of healthy, nonpregnent individuals were determined to be &lt;5.0 {{unit}}',1,1,'2018-12-24 14:32:31',NULL),
(215,94,'Comments','comments','text',0,'',1,1,'2018-12-24 14:41:22',NULL),
(216,95,'Note','note','text',0,'',1,1,'2018-12-24 14:49:28',NULL),
(217,96,'Note01','Note_01','text',0,'',1,1,'2018-12-24 15:00:37',NULL),
(218,97,'Oestragen','oestragen','number',21,'Normal:\r\nMen: 15-60 {{unit}}\r\nWomen:\r\nFollicular phase: 30-120 {{unit}}\r\nOvulation phase: 130-370 {{unit}}\r\nLuteal phase: 70-250 {{unit}}\r\nMenopause: 15-60 {{unit}}\r\n',1,1,'2018-12-24 15:06:54',NULL),
(219,98,'S. Immunoglobulin (IgE)','immunoglobulin_ige','number',7,'0-3 Years: &lt;10 {{unit}}\r\n3-4 Years: &lt;25 {{unit}}\r\n4-7 Years: &lt;50 {{unit}}\r\n7-14 Years: &lt;100 {{unit}}\r\n15+ Years: &lt;150 {{unit}}',1,1,'2018-12-24 15:10:51',NULL),
(220,99,'S. Bilirubin (Total)','s_bilirubin_total','number',11,'Adult: 0.4-11 {{unit}}\r\nNewborn Up to: 13.3 {{unit}}',1,1,'2018-12-24 15:16:34',NULL),
(221,99,'S. Bilirubin (Direct)','s_bilirubin_direct','number',11,'Up to 0.25 {{unit}}',2,1,'2018-12-24 15:16:34',NULL),
(222,99,'S. Bilirubin (Indirect)','s_bilirubin_indirect','number',11,'Up to 0.85 {{unit}}',3,1,'2018-12-24 15:16:34',NULL),
(223,100,'Serum - Testosterone','serum_testosterone','number',22,'<table cellspacing=\"20\"> <tr> <th>Age</th> <th>Male</th> <th>Female</th> </tr><tr> <td>1 - 9 Yrs</td><td><0><td>0.00 - 0.346</td></tr><tr> <td>10 - 11 Yrs</td><td>0.62 - 3.46</td><td>0.52 - 0.69</td></tr><tr> <td>12 - 15 Yrs</td><td>3.46 - 11.00</td><td>0.69 - 1.21</td></tr><tr> <td>16 - 19 Yrs</td><td>6.93 - 21.49</td><td>0.69 - 1.31</td></tr><tr> <td>20 - 50 Yrs</td><td>10.40 - 35.71</td><td>0.35 - 2.77</td></tr><tr> <td>>50 Yrs</td><td>6.2 - 26.00</td><td>0.24 - 1.38</td></tr></table>',1,1,'2018-12-24 15:23:21',NULL),
(224,101,'S. Phosphate (PO4)','s_phosphate_po4','number',11,'Adult: 2.5-5.0 {{unit}}\r\nChild: 4.0-7.0 {{unit}}',1,1,'2018-12-24 15:25:54',NULL),
(225,102,'APTT','aptt','number',58,'20-35 {{unit}}',1,1,'2018-12-24 15:30:11',NULL),
(226,102,'Control','control','number',58,'20-35 {{unit}}',2,1,'2018-12-24 15:30:11',NULL),
(227,103,'Anti-HEV IgM','anti_hev_igm','section',0,'',1,1,'2018-12-24 15:34:15',NULL),
(228,103,'Cut off','cut_off','number',0,'',2,1,'2018-12-24 15:34:15',NULL),
(229,104,'Occult Blood Test','occult_blood_test','positive_negetive',0,'',1,1,'2018-12-24 15:40:33',NULL),
(230,105,'Consistency','consistency','text',0,'',1,1,'2018-12-24 15:48:24',NULL),
(231,106,'X-Ray','x-ray','textarea',0,'',1,1,'2018-12-24 16:02:48',NULL),
(232,107,'Ciprofloxacin','ciprofloxacin','text',0,'',1,1,'2018-12-25 09:55:20',NULL),
(233,108,'Liver','liver','text',0,'',1,1,'2018-12-25 10:04:29',NULL),
(234,109,'Comments','comments','text',0,'',1,1,'2018-12-25 10:10:33',NULL),
(235,110,' Kidneys','kidneys','text',0,'',1,1,'2018-12-25 10:15:09',NULL),
(236,111,'U.Bladder','u_bladder','text',0,'',1,1,'2018-12-25 10:18:10',NULL),
(238,113,'Pus Cells','pus_cells','text',0,'',1,1,'2018-12-25 10:30:56',NULL),
(239,114,'Gram Positive Cocci','gram_positive_cocci','text',0,'',1,1,'2018-12-25 10:34:09',NULL),
(240,115,'Gram Negative Diplococci','gram_negative_diplococci','text',0,'',1,1,'2018-12-25 10:38:16',NULL),
(242,116,'KOH Preparation','koh_preparation','text',0,'',1,1,'2018-12-25 10:41:35',NULL),
(243,117,'Sputum for AFB','sputum_afb','text',0,'',1,1,'2018-12-25 10:45:51',NULL),
(244,118,'Comments','comments','text',0,'',1,1,'2018-12-25 10:53:01',NULL),
(245,119,'Clinical History','clinical_history','text',0,'',1,1,'2018-12-25 11:01:30',NULL),
(246,120,'Consistency','consistency','text',0,'',1,1,'2018-12-25 11:10:39',NULL),
(247,121,'NS1 Antigen For Dengue','ns1_dntigen_for_dengue','positive_negetive',0,'-',1,1,'2018-12-25 11:24:48',NULL),
(250,122,'Note_01','note_01','text',0,'',1,1,'2018-12-25 11:27:19',NULL),
(251,123,'Blood Group & Rh Factor','blood_group_rh_factor','text',0,'',1,1,'2018-12-25 11:51:36',NULL),
(252,123,'V.D.R.L','vdrl','text',0,'',2,1,'2018-12-25 11:51:36',NULL),
(253,123,'HBS Ag( Screening )','hbs_ag','positive_negetive',0,'',3,1,'2018-12-25 11:51:36',NULL),
(254,123,'WIDAL TEST','widal_test_to','number',50,'1:80 {{unit}}',4,1,'2018-12-25 11:51:36',NULL),
(255,123,'WIDAL TEST','widal_test_th','number',50,'1:80 {{unit}}',5,1,'2018-12-25 11:51:36',NULL),
(256,123,'WIDAL TEST','widal_test_ah','number',50,'1:80 {{unit}}',6,1,'2018-12-25 11:51:36',NULL),
(257,123,'WIDAL TEST','widal_test_bh','number',50,'1:80 {{unit}}',7,1,'2018-12-25 11:51:36',NULL),
(258,123,'ASO Titre','aso_titre','number',7,'&lt; 200 {{unit}}',8,1,'2018-12-25 11:51:36',NULL),
(259,123,'Rheumatoid Factor ( R/A )','rheumatoid_factor','positive_negetive',0,'',9,1,'2018-12-25 11:51:36',NULL),
(260,123,'C-Reactive Protein ( C. R. P )','reactive_protein','positive_negetive',0,'',10,1,'2018-12-25 11:51:36',NULL),
(261,123,'Urine for Pregnancy Test','urine_pregnancy_test','positive_negetive',0,'',11,1,'2018-12-25 11:51:36',NULL),
(262,123,'V.D.R.L','vdrl_1','positive_negetive',0,'',12,1,'2018-12-25 11:51:36',NULL),
(263,123,'T.P.H.A','tpha','positive_negetive',0,'',13,1,'2018-12-25 11:51:36',NULL),
(264,123,'HBS Ag ( Confirmatory )','hbs_ag_confirmatory','positive_negetive',0,'',14,1,'2018-12-25 11:51:36',NULL),
(265,123,'C.F.T. For Kala- Azar','cft_kala_azar','positive_negetive',0,'',15,1,'2018-12-25 11:51:36',NULL),
(266,123,'A. T. ( Aldehyde Test )','aldehyde_test','positive_negetive',0,'',16,1,'2018-12-25 11:51:36',NULL),
(267,123,'I. C. T. For Kala Azar/Filaria','ict_kala_azar_filaria','positive_negetive',0,'',17,1,'2018-12-25 11:51:36',NULL),
(268,123,'Anti HCV( Confirmatory )','anti_hcv_confirmatory','positive_negetive',0,'',18,1,'2018-12-25 11:51:36',NULL),
(269,123,'α- Fetoprotein ( AFP )','fetoprotein','positive_negetive',0,'',19,1,'2018-12-25 11:51:36',NULL),
(270,124,'Culture of Blood','culture_blood','text',0,'',1,1,'2018-12-25 16:28:08',NULL),
(271,61,'HIV (Screening)','hiv_screening','positive_negetive',0,'',2,1,'2018-12-25 18:12:00',NULL),
(272,61,'HCV (Screening)','hcv_screening','positive_negetive',0,'',3,1,'2018-12-25 18:12:00',NULL),
(273,61,'VDRL','vdrl','text',0,'',4,1,'2018-12-25 18:12:00',NULL),
(274,61,'Malarial Parasite (MP)','malarial_parasite_mp','text',0,'',5,1,'2018-12-25 18:12:00',NULL),
(275,112,'Liver','liver','textarea',0,'',1,1,'2018-12-25 18:26:55',NULL),
(276,112,'Gall Bladder','gall_bladder','textarea',0,'',2,1,'2018-12-25 18:26:55',NULL),
(277,112,'Billary tree','billary_tree','textarea',0,'',3,1,'2018-12-25 18:26:55',NULL),
(278,112,'Pancreas','pancreas','textarea',0,'',4,1,'2018-12-25 18:26:55',NULL),
(279,112,'Spleen','spleen','textarea',0,'',5,1,'2018-12-25 18:26:55',NULL),
(280,112,'Kidneys','kidneys','textarea',0,'',6,1,'2018-12-25 18:26:55',NULL),
(281,112,'U. Bladder','u_bladder','textarea',0,'',7,1,'2018-12-25 18:26:55',NULL),
(282,112,'Prostate','prostate','textarea',0,'',8,1,'2018-12-25 18:26:55',NULL),
(283,112,'Impression','impression','text',0,'',9,1,'2018-12-25 18:30:24',NULL),
(284,119,'PBF finding','pbf_finding','text',0,'',2,1,'2018-12-26 17:03:38',NULL),
(285,119,'Site of aspiration','site_aspiration','text',0,'',3,1,'2018-12-26 17:03:38',NULL),
(286,119,'Stain used','stain_used','text',0,'',4,1,'2018-12-26 17:03:38',NULL),
(287,119,'Cellularity','cellularity','text',0,'',5,1,'2018-12-26 17:03:38',NULL),
(288,119,'M:E ratio','me_ratio','text',0,'',6,1,'2018-12-26 17:03:38',NULL),
(289,119,'Erythropoiesis','erythropoiesis','text',0,'',7,1,'2018-12-26 17:03:38',NULL),
(290,119,'Granulopoiesis','granulopoiesis','text',0,'',8,1,'2018-12-26 17:03:38',NULL),
(291,119,'Megakaryocytes','megakaryocytes','text',0,'',9,1,'2018-12-26 17:03:38',NULL),
(292,119,'Lymphocytes','lymphocytes','text',0,'',10,1,'2018-12-26 17:03:38',NULL),
(293,119,'Plasma Cells','plasma_cells','text',0,'',11,1,'2018-12-26 17:03:38',NULL),
(294,119,'Comment','comment','text',0,'',12,1,'2018-12-26 17:03:38',NULL),
(295,111,'Uterus','uterus','text',0,'',2,1,'2018-12-26 17:13:27',NULL),
(296,111,'Adnexa','adnexa','text',0,'',3,1,'2018-12-26 17:13:27',NULL),
(297,111,'Cul- de dac','cul_de_dac','text',0,'',4,1,'2018-12-26 17:13:27',NULL),
(298,111,'Impression','impression','text',0,'',5,1,'2018-12-26 17:13:27',NULL),
(299,110,'U.Bladder','u_bladder','text',0,'',2,1,'2018-12-26 17:17:49',NULL),
(300,110,'Prostate','prostate','text',0,'',3,1,'2018-12-26 17:17:49',NULL),
(301,110,'Impression','impression','text',0,'',4,1,'2018-12-26 17:17:49',NULL),
(302,109,'Number of fetus Presentation','number_of_fetus_presentation','text',0,'',2,1,'2018-12-26 17:26:27',NULL),
(303,109,'Fetal movement Cardiac pulsation','fetal_movement_cardiac_pulsation','text',0,'',3,1,'2018-12-26 17:26:27',NULL),
(304,109,'Fetal biometry','fetal_biometry','text',0,'',4,1,'2018-12-26 17:26:27',NULL),
(305,109,'Placenta Amniotic fluid','placenta_amniotic_fluid','text',0,'',5,1,'2018-12-26 17:26:27',NULL),
(306,109,'EDD','edd','text',0,'',6,1,'2018-12-26 17:26:27',NULL),
(307,109,'Impression','impression','text',0,'',7,1,'2018-12-26 17:26:27',NULL),
(308,108,'Gall Bladder','gall_bladder','text',0,'',2,1,'2018-12-26 17:35:57',NULL),
(309,108,'Billiary tree','billiary_tree','text',0,'',3,1,'2018-12-26 17:35:57',NULL),
(310,108,'Pancreas','pancreas','text',0,'',4,1,'2018-12-26 17:35:57',NULL),
(311,108,'Spleen','spleen','text',0,'',5,1,'2018-12-26 17:35:57',NULL),
(312,108,'Kidneys','kidneys','text',0,'',6,1,'2018-12-26 17:35:57',NULL),
(313,108,'U.Bladder','u_bladder','text',0,'',7,1,'2018-12-26 17:35:57',NULL),
(314,108,'Uterus','uterus','text',0,'',8,1,'2018-12-26 17:35:57',NULL),
(315,108,'Adnexa','adnexa','text',0,'',9,1,'2018-12-26 17:35:57',NULL),
(316,108,'Cul- de sac','cul_de_sac','text',0,'',10,1,'2018-12-26 17:35:57',NULL),
(317,108,'Impression','impression','text',0,'',11,1,'2018-12-26 17:35:57',NULL),
(318,95,'Opinion','opinion','text',0,'',2,1,'2018-12-26 17:49:15',NULL),
(319,95,'Ampicillin','ampicillin','text',0,'',3,1,'2018-12-26 17:49:15',NULL),
(320,95,'Amoxycillin','amoxycillin','text',0,'',4,1,'2018-12-26 17:49:15',NULL),
(321,95,'Amoxiclav','amoxiclav','text',0,'',5,1,'2018-12-26 17:49:15',NULL),
(322,95,'Azithromycin','azithromycin','text',0,'',6,1,'2018-12-26 17:49:15',NULL),
(323,95,'Cephalexin','cephalexin','text',0,'',7,1,'2018-12-26 17:49:15',NULL),
(324,95,'Cephradine','cephradine','text',0,'',8,1,'2018-12-26 17:49:15',NULL),
(325,95,'Ceftriaxone','ceftriaxone','text',0,'',9,1,'2018-12-26 17:49:15',NULL),
(326,95,'Ceftazidime','ceftazidime','text',0,'',10,1,'2018-12-26 17:49:15',NULL),
(327,95,'Cloxacillin','cloxacillin','text',0,'',11,1,'2018-12-26 17:49:15',NULL),
(328,95,'Ciprofloxacin','ciprofloxacin','text',0,'',12,1,'2018-12-26 17:49:15',NULL),
(329,95,'Co-trimoxazole','co_trimoxazole','text',0,'',13,1,'2018-12-26 17:49:15',NULL),
(330,95,'Cloxacillin','cloxacillin_1','text',0,'',14,1,'2018-12-26 17:49:15',NULL),
(331,95,'Doxycycline','doxycycline','text',0,'',15,1,'2018-12-26 17:49:15',NULL),
(332,95,'Erythromycin','erythromycin','text',0,'',16,1,'2018-12-26 17:49:15',NULL),
(333,95,'Nitrofurantoin','nitrofurantoin','text',0,'',17,1,'2018-12-26 17:49:15',NULL),
(334,95,'Gentamicin','gentamicin','text',0,'',18,1,'2018-12-26 17:49:15',NULL),
(335,95,'Nalidixic acid','nalidixic_acid','text',0,'',19,1,'2018-12-26 17:49:15',NULL),
(336,95,'Penicillin','penicillin','text',0,'',20,1,'2018-12-26 17:49:15',NULL),
(337,95,'IMipenem','imipenem','text',0,'',21,1,'2018-12-26 17:49:15',NULL),
(338,95,'Cefuroxime','cefuroxime','text',0,'',22,1,'2018-12-26 17:49:15',NULL),
(339,85,'Clinical Utility','clinical_utility','text',0,'',2,1,'2018-12-26 17:51:49',NULL),
(341,122,'Note_02','note_02','text',0,'',2,1,'2018-12-26 18:04:15',NULL),
(342,122,'Ampicillin','ampicillin','text',0,'',3,1,'2018-12-26 18:09:12',NULL),
(343,122,'Amoxycillin','amoxycillin','text',0,'',4,1,'2018-12-26 18:09:12',NULL),
(344,122,'Amoxiclav','amoxiclav','text',0,'',5,1,'2018-12-26 18:09:12',NULL),
(345,122,'Azithromycin','azithromycin','text',0,'',6,1,'2018-12-26 18:09:12',NULL),
(346,122,'Cephalexin','cephalexin','text',0,'',7,1,'2018-12-26 18:09:12',NULL),
(347,122,'Cephradine','cephradine','text',0,'',8,1,'2018-12-26 18:09:12',NULL),
(348,122,'Ceftriaxone','ceftriaxone','text',0,'',9,1,'2018-12-26 18:09:12',NULL),
(349,122,'Ceftazidime','ceftazidime','text',0,'',10,1,'2018-12-26 18:09:12',NULL),
(350,122,'Cloxacillin','cloxacillin','text',0,'',11,1,'2018-12-26 18:09:12',NULL),
(351,122,'Ciprofloxacin','ciprofloxacin','text',0,'',12,1,'2018-12-26 18:09:12',NULL),
(352,122,'Co-trimoxazole','co_trimoxazole','text',0,'',13,1,'2018-12-26 18:09:12',NULL),
(353,122,'Cloxacillin','cloxacillin_1','text',0,'',14,1,'2018-12-26 18:09:12',NULL),
(354,122,'Doxycycline','doxycycline','text',0,'',15,1,'2018-12-26 18:09:12',NULL),
(355,122,'Erythromycin','erythromycin','text',0,'',16,1,'2018-12-26 18:09:12',NULL),
(356,122,'Nitrofurantoin','nitrofurantoin','text',0,'',17,1,'2018-12-26 18:09:12',NULL),
(357,122,'Gentamicin','gentamicin','text',0,'',18,1,'2018-12-26 18:09:12',NULL),
(358,122,'Nalidixic acid','nalidixic_acid','text',0,'',19,1,'2018-12-26 18:09:12',NULL),
(359,122,'Penicillin','penicillin','text',0,'',20,1,'2018-12-26 18:09:12',NULL),
(360,122,'IMipenem','imipenem','text',0,'',21,1,'2018-12-26 18:09:12',NULL),
(361,122,'Cefuroxime','cefuroxime','text',0,'',22,1,'2018-12-26 18:09:12',NULL),
(362,106,'Impression','impressio','text',0,'',2,1,'2018-12-26 18:12:28',NULL),
(363,106,'Advice','advice','text',0,'',3,1,'2018-12-26 18:12:28',NULL),
(364,123,'Checked By','checked_by','text',0,'',20,1,'2018-12-26 18:14:32',NULL),
(365,94,'Opinion','opinion','text',0,'',2,1,'2018-12-26 18:25:33',NULL),
(366,94,'Ampicillin','ampicillin','text',0,'',3,1,'2018-12-26 18:34:06',NULL),
(367,94,'Amoxycillin','amoxycillin','text',0,'',4,1,'2018-12-26 18:34:06',NULL),
(368,94,'Amoxiclav','amoxiclav','text',0,'',5,1,'2018-12-26 18:34:06',NULL),
(369,94,'Azithromycin','azithromycin','text',0,'',6,1,'2018-12-26 18:34:06',NULL),
(370,94,'Cephalexin','cephalexin','text',0,'',7,1,'2018-12-26 18:34:06',NULL),
(371,94,'Cephradine','cephradine','text',0,'',8,1,'2018-12-26 18:34:06',NULL),
(372,94,'Ceftriaxone','ceftriaxone','text',0,'',9,1,'2018-12-26 18:34:06',NULL),
(373,94,'Ceftazidime','ceftazidime','text',0,'',10,1,'2018-12-26 18:34:06',NULL),
(374,94,'Cloxacillin','cloxacillin','text',0,'',11,1,'2018-12-26 18:34:06',NULL),
(375,94,'Ciprofloxacin','ciprofloxacin','text',0,'',12,1,'2018-12-26 18:34:06',NULL),
(376,94,'Trimethoprim','trimethoprim','text',0,'',13,1,'2018-12-26 18:34:06',NULL),
(377,94,'Cloxacillin','cloxacillin_1','text',0,'',14,1,'2018-12-26 18:34:06',NULL),
(378,94,'Doxycycline','doxycycline','text',0,'',15,1,'2018-12-26 18:34:06',NULL),
(379,94,'Erythromycin','erythromycin','text',0,'',16,1,'2018-12-26 18:34:06',NULL),
(380,94,'Nitrofurantoin','nitrofurantoin','text',0,'',17,1,'2018-12-26 18:34:06',NULL),
(381,94,'Gentamicin','gentamicin','text',0,'',18,1,'2018-12-26 18:34:06',NULL),
(382,94,'Nalidixic acid','nalidixic_acid','text',0,'',19,1,'2018-12-26 18:34:06',NULL),
(383,94,'Levofloxacin','levofloxacin','text',0,'',20,1,'2018-12-26 18:34:06',NULL),
(384,94,'Pefloxacin','pefloxacin','text',0,'',21,1,'2018-12-26 18:34:06',NULL),
(385,94,'Cefuroxime','cefuroxime','text',0,'',22,1,'2018-12-26 18:34:06',NULL),
(386,93,'Comments','comments','text',0,'',2,1,'2018-12-26 18:45:56',NULL),
(387,93,'3-4 Weeks','34_weeks','text',0,'',3,1,'2018-12-26 18:45:56',NULL),
(388,93,'4-5 Weeks','45_weeks','text',0,'',4,1,'2018-12-26 18:45:56',NULL),
(389,93,'5-6 Weeks','56 _weeks','text',0,'',5,1,'2018-12-26 18:45:56',NULL),
(390,93,'6-7 Weeks','67_weeks','text',0,'',6,1,'2018-12-26 18:45:56',NULL),
(391,93,'7-12 Weeks','712_weeks','text',0,'',7,1,'2018-12-26 18:45:56',NULL),
(392,93,'12-16 Weeks','1216_weeks','text',0,'',8,1,'2018-12-26 18:45:56',NULL),
(393,93,'16-29 Weeks','1629_weeks','text',0,'',9,1,'2018-12-26 18:45:56',NULL),
(394,93,'2nd Trimester','2nd_trimester','text',0,'',10,1,'2018-12-26 18:45:56',NULL),
(395,93,'29-41 Weeks','2941_weeks','text',0,'',11,1,'2018-12-26 18:45:56',NULL),
(396,93,'3rd Trimester','3rd_trimester','text',0,'',12,1,'2018-12-26 18:45:56',NULL),
(397,103,'Patients Reding','patients_reading','number',0,'Patient\'s Sample Reading>Cut of is Positive </br>\r\nPatient\'s Sample Reading>Cut of is Negative',3,1,'2018-12-26 18:47:28',NULL),
(398,96,'Note02','Note_02','text',0,'',2,1,'2018-12-26 18:56:18',NULL),
(399,96,'Amikacin','amikacin','text',0,'',3,1,'2018-12-26 19:05:16',NULL),
(400,96,'Gentamycin','gentamycin','text',0,'',4,1,'2018-12-26 19:05:16',NULL),
(401,96,'Norfloxacin','norfloxacin','text',0,'',5,1,'2018-12-26 19:05:16',NULL),
(402,96,'Ofloxacin','ofloxacin','text',0,'',6,1,'2018-12-26 19:05:16',NULL),
(403,96,'Roxythromycin','roxythromycin','text',0,'',7,1,'2018-12-26 19:05:16',NULL),
(404,96,'Amoxycillin','amoxycillin','text',0,'',8,1,'2018-12-26 19:05:16',NULL),
(405,96,'Cephradine','cephradine','text',0,'',9,1,'2018-12-26 19:05:16',NULL),
(406,96,'Azithromycin','azithromycin','text',0,'',10,1,'2018-12-26 19:05:16',NULL),
(407,96,'Augumentin','augumentin','text',0,'',11,1,'2018-12-26 19:05:16',NULL),
(408,96,'Cefotaxime','cefotaxime','text',0,'',12,1,'2018-12-26 19:05:16',NULL),
(409,96,'Cefuroxime','cefuroxime','text',0,'',13,1,'2018-12-26 19:05:16',NULL),
(410,96,'Ceftriaxone','ceftriaxone','text',0,'',14,1,'2018-12-26 19:05:16',NULL),
(411,96,'Cefixime','cefixime','text',0,'',15,1,'2018-12-26 19:05:16',NULL),
(412,96,'Doxycilline','doxycilline','text',0,'',16,1,'2018-12-26 19:05:16',NULL),
(413,96,'Cephradine','cephradine_1','text',0,'',17,1,'2018-12-26 19:05:16',NULL),
(414,96,'Gatifloxacin','gatifloxacin','text',0,'',18,1,'2018-12-26 19:05:16',NULL),
(415,96,'Cefadroxil','cefadroxil','text',0,'',19,1,'2018-12-26 19:05:16',NULL),
(416,96,'Ceftazidime','ceftazidime','text',0,'',20,1,'2018-12-26 19:05:16',NULL),
(418,104,'Reducing Substance','reducing_substance','text',0,'',2,1,'2018-12-26 19:09:24',NULL),
(419,57,'HIV(Screening)','hiv_screening','positive_negetive',0,'',2,1,'2018-12-26 19:30:43',NULL),
(420,57,'HCV(Screening)','hcv_screening','positive_negetive',0,'',3,1,'2018-12-26 19:30:43',NULL),
(421,57,'TPHA(Screening)','tpha_screening','positive_negetive',0,'',4,1,'2018-12-26 19:30:43',NULL),
(422,79,'Reference Value','reference_value','number',23,'',2,1,'2018-12-26 19:37:43',NULL),
(423,79,'Opinion','opinion','positive_negetive',0,'',3,1,'2018-12-26 19:37:43',NULL),
(424,74,'Patient Absorbance','patient_absorbance','number',0,'',2,1,'2018-12-26 19:45:53',NULL),
(425,74,'Comments','comments','text',0,'',3,1,'2018-12-26 19:45:53',NULL),
(426,125,'Specimen source','specimen_source','text',0,'',1,1,'2018-12-26 20:06:03',NULL),
(427,125,'Collection Date','collection_date','text',0,'',2,1,'2018-12-26 20:06:03',NULL),
(428,125,'Last Menstrual Date','last_menstrual_date','text',0,'',3,1,'2018-12-26 20:06:03',NULL),
(429,125,'Previous Gynecologic Cytology','previous_gynecologic_cytology','textarea',0,'',4,1,'2018-12-26 20:06:03',NULL),
(430,125,'Specimen Adequacy','specimen_adequacy','textarea',0,'',5,1,'2018-12-26 20:06:03',NULL),
(431,125,'General Categorization','general_categorization','textarea',0,'',6,1,'2018-12-26 20:06:03',NULL),
(432,125,'Interpretation','interpretation','textarea',0,'',7,1,'2018-12-26 20:06:03',NULL),
(433,125,'Education Note/ Recommendations','education_note_recommendations','textarea',0,'',8,1,'2018-12-26 20:06:03',NULL),
(434,126,'Patient','patient','text',0,'',1,1,'2018-12-26 20:48:40',NULL),
(435,126,'Control','control','text',0,'',2,1,'2018-12-26 20:48:40',NULL),
(436,126,'Ratio','ratio','text',0,'',3,1,'2018-12-26 20:48:40',NULL),
(437,126,'Index','index','text',0,'',4,1,'2018-12-26 20:48:40',NULL),
(438,126,'INR','inr','text',0,'',5,1,'2018-12-26 20:48:40',NULL),
(439,68,'Collection Date','collection_date','text',0,'',2,1,'2018-12-26 21:07:34',NULL),
(440,68,'Last Menstrual Date','last_menstrual_date','text',0,'',3,1,'2018-12-26 21:07:34',NULL),
(441,68,'Comments','comments','text',0,'',4,1,'2018-12-26 21:07:34',NULL),
(442,68,'Dx','dx','text',0,'',5,1,'2018-12-26 21:07:34',NULL),
(443,107,'Cefriaxone','cefriaxone','text',0,'',2,1,'2018-12-26 21:27:13',NULL),
(444,107,'Cefuroxime','cefuroxime','text',0,'',3,1,'2018-12-26 21:27:13',NULL),
(445,107,'Pevmicillinum','pevmicillinum','text',0,'',4,1,'2018-12-26 21:27:13',NULL),
(446,107,'Nitrofurantion','nitrofurantion','text',0,'',5,1,'2018-12-26 21:27:13',NULL),
(447,107,'Cefixime','cefixime','text',0,'',6,1,'2018-12-26 21:27:13',NULL),
(448,107,'Azithromycin','azithromycin','text',0,'',7,1,'2018-12-26 21:27:13',NULL),
(449,107,'Nalidixic Acid','nalidixic_acid','text',0,'',8,1,'2018-12-26 21:27:13',NULL),
(450,107,'Co-trimoxazol','co_trimoxazol','text',0,'',9,1,'2018-12-26 21:27:13',NULL),
(451,107,'Pefloxacin','pefloxacin','text',0,'',10,1,'2018-12-26 21:27:13',NULL),
(452,107,'Gentamycine','gentamycine','text',0,'',11,1,'2018-12-26 21:27:13',NULL),
(453,107,'Amoxycillin','amoxycillin','text',0,'',12,1,'2018-12-26 21:27:13',NULL),
(454,107,'Amikacin','amikacin','text',0,'',13,1,'2018-12-26 21:27:13',NULL),
(455,107,'Ceftazidine','ceftazidine','text',0,'',14,1,'2018-12-26 21:27:13',NULL),
(456,107,'Cefepime','cefepime','text',0,'',15,1,'2018-12-26 21:27:13',NULL),
(457,107,'Colistin','colistin','text',0,'',16,1,'2018-12-26 21:27:13',NULL),
(458,127,'Comments','comments','textarea',0,'',1,1,'2018-12-27 10:10:04',NULL),
(459,127,'Result','result','text',0,'',2,1,'2018-12-27 10:10:04',NULL),
(460,127,'Impression','impression','positive_negetive',0,'',3,1,'2018-12-27 10:10:04',NULL),
(461,128,'Result','result','textarea',0,'',1,1,'2018-12-27 10:15:47',NULL),
(462,128,'Comment','comment','textarea',0,'',2,1,'2018-12-27 10:15:47',NULL),
(463,129,'Pus Cells','pus_cells','text',0,'',1,1,'2018-12-27 10:25:58',NULL),
(464,129,'Epithelial Cells','epithelial_cells','text',0,'',2,1,'2018-12-27 10:25:58',NULL),
(465,129,'RBC','rbc','text',0,'',3,1,'2018-12-27 10:25:58',NULL),
(466,129,'Yeast Cells','yeast_cells','text',0,'',4,1,'2018-12-27 10:25:58',NULL),
(467,113,'Epithelial Cells','epithelial_cells','text',0,'',2,1,'2018-12-27 10:36:40',NULL),
(468,113,'RBS','rbs','text',0,'',3,1,'2018-12-27 10:36:40',NULL),
(469,113,'Yeast Cells','yeast_cells','text',0,'',4,1,'2018-12-27 10:36:40',NULL),
(470,114,'Gram Negative Bacilli','gram_negative_bacilli','text',0,'',2,1,'2018-12-27 10:43:15',NULL),
(471,114,'Pus Cells','pus_cells','text',0,'',3,1,'2018-12-27 10:43:15',NULL),
(472,115,'Pus Cells','pus_cells','text',0,'',2,1,'2018-12-27 10:46:00',NULL),
(473,73,'Opinion','opinion','text',0,'',2,1,'2018-12-27 11:01:53',NULL),
(474,105,'Colour','colour','text',0,'',2,1,'2018-12-27 11:25:15',NULL),
(475,105,'Mucus','mucus','text',0,'',3,1,'2018-12-27 11:25:15',NULL),
(476,105,'Blood','blood','text',0,'',4,1,'2018-12-27 11:25:15',NULL),
(477,105,'Reaction','reaction','text',0,'',5,1,'2018-12-27 11:25:15',NULL),
(478,105,'Occult Blood Test ( O.B.T)','occult_blood_test','text',0,'',6,1,'2018-12-27 11:25:15',NULL),
(479,105,'Reducing Substance (R/S)','reducing_substance','text',0,'',7,1,'2018-12-27 11:25:15',NULL),
(480,105,'Vegetable Cell','vegetable_cell','text',0,'',8,1,'2018-12-27 11:40:57',NULL),
(481,105,'Epithelial Cell','epithelial_cell','text',0,'',9,1,'2018-12-27 11:40:57',NULL),
(482,105,'Pus Cell','pus_cell','text',0,'',10,1,'2018-12-27 11:40:57',NULL),
(483,105,'RBS','rbs','text',0,'',11,1,'2018-12-27 11:40:57',NULL),
(484,105,'Fat Globules','fat_globules','text',0,'',12,1,'2018-12-27 11:40:57',NULL),
(485,105,'Muscle Fibers','muscle_fibers','text',0,'',13,1,'2018-12-27 11:40:57',NULL),
(486,105,'Starch','starch','text',0,'',14,1,'2018-12-27 11:40:57',NULL),
(487,105,'Cysts of Giardia','cysts_of_giardia','text',0,'',15,1,'2018-12-27 11:40:57',NULL),
(488,105,'E. histolytica','e_histolytica','text',0,'',16,1,'2018-12-27 11:40:57',NULL),
(489,105,'E. coli','e_coli','text',0,'',17,1,'2018-12-27 11:40:57',NULL),
(490,105,'Yeasts Cell','yeasts_cell','text',0,'',18,1,'2018-12-27 11:40:57',NULL),
(491,120,'Colour','colour','text',0,'',2,1,'2018-12-27 11:58:18',NULL),
(492,120,'Odor','odor','text',0,'',3,1,'2018-12-27 11:58:18',NULL),
(493,120,'Volume','volume','text',0,'',4,1,'2018-12-27 11:58:18',NULL),
(494,120,'Collection Method','collection_method','text',0,'',5,1,'2018-12-27 11:58:18',NULL),
(495,120,'Reaction','reaction','text',0,'',6,1,'2018-12-27 11:58:18',NULL),
(496,120,'Total count of Spermatozoa (TCS)','total_count_of_spermatozoa','text',0,'',7,1,'2018-12-27 11:58:18',NULL),
(497,120,'Morphology','morphology','text',0,'',8,1,'2018-12-27 11:58:18',NULL),
(498,120,'Motility','motility','text',0,'',9,1,'2018-12-27 11:58:18',NULL),
(499,120,'Pus Cells','pus_cells','text',0,'',10,1,'2018-12-27 11:58:18',NULL),
(500,120,'Epithelial Cells','epithelial_cells','text',0,'',11,1,'2018-12-27 11:58:18',NULL),
(501,120,'RBC','rbs','text',0,'',12,1,'2018-12-27 11:58:18',NULL),
(502,120,'Comment','comment','text',0,'',13,1,'2018-12-27 11:58:18',NULL),
(503,69,'Dx','dx','text',0,'',2,1,'2018-12-27 13:29:58',NULL),
(504,46,'IgG','igg','positive_negetive',0,'-',2,1,'2018-12-27 14:31:42',NULL),
(505,47,'IgM','igm','positive_negetive',0,'',3,1,'2018-12-27 14:36:48',NULL),
(506,46,'IgM','igm','positive_negetive',0,'-',3,1,'2018-12-27 14:38:46',NULL),
(507,44,'Chloride (C1<sup>-</sup>)','chloride _c1-','text',10,'Varies greatly with Cl intake',4,1,'2018-12-27 14:41:42',NULL),
(508,107,'Note1','note_1','text',0,'',17,1,'2018-12-27 15:12:30',NULL),
(509,107,'Note2','Note_2','text',0,'',18,1,'2018-12-27 15:12:30',NULL),
(510,12,'Clinical Utility','clinical_utility','text',0,'',2,1,'2018-12-27 16:10:04',NULL),
(511,81,'Clinical Utility','clinical_utility','text',0,'',2,1,'2018-12-27 16:33:47',NULL),
(512,8,'Amoxycillin','amoxycillin','text',0,'',2,1,'2018-12-28 09:45:34',NULL),
(513,8,'A moxiclav','a_moxiclav','text',0,'',3,1,'2018-12-28 09:45:34',NULL),
(514,8,'Azithromycin','azithromycin','text',0,'',4,1,'2018-12-28 09:45:34',NULL),
(515,8,'Cephalexin','cephalexin','text',0,'',5,1,'2018-12-28 09:45:34',NULL),
(516,8,'Cephradine','cephradine','text',0,'',6,1,'2018-12-28 09:45:34',NULL),
(517,8,'Ceftriaxone','ceftriaxone','text',0,'',7,1,'2018-12-28 09:45:34',NULL),
(518,8,'Ceftazidime','ceftazidime','text',0,'',8,1,'2018-12-28 09:45:34',NULL),
(519,8,'Cloxacillin','cloxacillin','text',0,'',9,1,'2018-12-28 09:45:34',NULL),
(520,8,'Ciprofloxacin','ciprofloxacin','text',0,'',10,1,'2018-12-28 09:45:34',NULL),
(521,8,'Co-trimoxazole','co_trimoxazole','text',0,'',11,1,'2018-12-28 09:45:34',NULL),
(522,8,'Cloxacillin','cloxacillin_1','text',0,'',12,1,'2018-12-28 09:45:34',NULL),
(523,8,'Doxycycline','doxycycline','text',0,'',13,1,'2018-12-28 09:45:34',NULL),
(524,8,'Erythromycin','erythromycin','text',0,'',14,1,'2018-12-28 09:45:34',NULL),
(525,8,'Nitrofuration','nitrofuration','text',0,'',15,1,'2018-12-28 09:45:34',NULL),
(526,8,'Gentamicin','gentamicin','text',0,'',16,1,'2018-12-28 09:45:34',NULL),
(527,8,'Nalidixic acid','nalidixic_acid','text',0,'',17,1,'2018-12-28 09:45:34',NULL),
(528,8,'Penicillin','penicillin','text',0,'',18,1,'2018-12-28 09:45:34',NULL),
(529,8,'IMipenem','imipenem','text',0,'',19,1,'2018-12-28 09:45:34',NULL),
(530,8,'Cefuroxime','cefuroxime','text',0,'',20,1,'2018-12-28 09:45:34',NULL),
(531,8,'Note1','note_1','text',0,'',21,1,'2018-12-28 09:48:44',NULL),
(532,8,'Note2','note_2','text',0,'',22,1,'2018-12-28 09:48:44',NULL),
(533,103,'Impression ','impression','positive_negetive',0,'',4,1,'2018-12-28 09:58:27',NULL),
(534,76,'Concentration of Helicobacter pylori','helicobacter_pylori','number',0,'&lt; 0.80: Negative',2,1,'2018-12-28 10:31:53',NULL),
(535,49,'C.U.S','cus_1','text',0,'',5,1,'2018-12-28 10:38:36',NULL),
(536,13,'Anti HBs','anti_hbs','number',9,'< 10 xss=removed> 10 - 100 {{ unit }} = Low protective immunity is present against HBV.<br> > {{ unit }} = Significant protective immunity is present against HBV.',2,1,'2018-12-28 10:53:07',NULL),
(537,50,'IgM','igm','positive_negetive',0,'-',3,1,'2018-12-28 10:55:58',NULL),
(538,130,'Patient Name','patient_name','text',0,'',1,1,'2018-12-28 11:37:33',NULL),
(539,130,'Patient Age','patient_age','number',0,'',2,1,'2018-12-28 11:37:33',NULL),
(540,130,'Donar Name','donar_name','text',0,'',3,1,'2018-12-28 11:37:33',NULL),
(541,130,'Donar Age','donar_age','number',0,'',4,1,'2018-12-28 11:37:33',NULL),
(542,130,'Blood Group of Patient','blood_group_of_patient','text',0,'',5,1,'2018-12-28 11:37:33',NULL),
(543,130,'Donor Blood Group','donor_blood_group','textarea',0,'',6,1,'2018-12-28 11:37:33',NULL),
(544,130,'MP','mp','text',0,'',7,1,'2018-12-28 11:37:33',NULL),
(545,130,'HBsAg','hbsag','positive_negetive',0,'',8,1,'2018-12-28 11:37:33',NULL),
(546,130,'HIV','hiv','positive_negetive',0,'',9,1,'2018-12-28 11:37:33',NULL),
(547,130,'HCV','hcv','positive_negetive',0,'',10,1,'2018-12-28 11:37:33',NULL),
(548,130,'VDRL','vdrl','text',0,'',11,1,'2018-12-28 11:37:33',NULL),
(549,131,'Note1','note_1','text',0,'',1,1,'2018-12-28 12:15:28',NULL),
(550,131,'Note2','note_2','text',0,'',2,1,'2018-12-28 12:15:28',NULL),
(551,131,'Ciprofloxacin','ciprofloxacin','text',0,'',3,1,'2018-12-28 12:28:03',NULL),
(552,131,'Amoxycillin','amoxycillin','text',0,'',4,1,'2018-12-28 12:28:03',NULL),
(553,131,'Cefixime','cefixime','text',0,'',5,1,'2018-12-28 12:28:03',NULL),
(554,131,'Pevmicillinum','pevmicillinum','text',0,'',6,1,'2018-12-28 12:28:03',NULL),
(555,131,'Pefloxacin','pefloxacin','text',0,'',7,1,'2018-12-28 12:28:03',NULL),
(556,131,'Cephradine','cephradine','text',0,'',8,1,'2018-12-28 12:28:03',NULL),
(557,131,'Ceftriaxone','ceftriaxone','text',0,'',9,1,'2018-12-28 12:28:03',NULL),
(558,131,'Ceftazidime','ceftazidime','text',0,'',10,1,'2018-12-28 12:28:03',NULL),
(559,131,'Cloxacillin','cloxacillin','text',0,'',11,1,'2018-12-28 12:28:03',NULL),
(560,131,'Azithromycin','azithromycin','text',0,'',12,1,'2018-12-28 12:28:03',NULL),
(561,131,'Co-trimoxazole','co_trimoxazole','text',0,'',13,1,'2018-12-28 12:28:03',NULL),
(562,131,'Cloxacillin','cloxacillin_1','text',0,'',14,1,'2018-12-28 12:28:03',NULL),
(563,131,'Doxycycline','doxycycline','text',0,'',15,1,'2018-12-28 12:28:03',NULL),
(564,131,'Erythromycin','erythromycin','text',0,'',16,1,'2018-12-28 12:28:03',NULL),
(565,131,'Nitrofuration','nitrofuration','text',0,'',17,1,'2018-12-28 12:28:03',NULL),
(566,131,'Gentamicin','gentamicin','text',0,'',18,1,'2018-12-28 12:28:03',NULL),
(567,131,'Nalidixic acid','nalidixic_acid','text',0,'',19,1,'2018-12-28 12:28:03',NULL),
(568,131,'Penicillin','penicillin','text',0,'',20,1,'2018-12-28 12:28:03',NULL),
(569,131,'IMipenem','imipenem','text',0,'',21,1,'2018-12-28 12:28:03',NULL),
(570,131,'Cefuroxime','cefuroxime','text',0,'',22,1,'2018-12-28 12:28:03',NULL),
(571,65,'Note2','note2','text',0,'',2,1,'2018-12-28 14:26:06',NULL),
(572,65,'Colony Count','colony_count','text',0,'',3,1,'2018-12-28 14:26:06',NULL),
(573,65,'Penicillin-V','penicillin_v','text',0,'',4,1,'2018-12-28 14:33:12',NULL),
(574,65,'Ampicillin','ampicillin','text',0,'',5,1,'2018-12-28 14:33:12',NULL),
(575,65,'Amoxycillin','amoxycillin','text',0,'',6,1,'2018-12-28 14:33:12',NULL),
(576,65,'Cloxacillin','cloxacillin','text',0,'',7,1,'2018-12-28 14:33:12',NULL),
(577,65,'Mecillinum','mecillinum','text',0,'',8,1,'2018-12-28 14:33:12',NULL),
(578,65,'Erythromycin','erythromycin','text',0,'',9,1,'2018-12-28 14:33:12',NULL),
(579,65,'Gentamycin','gentamycin','text',0,'',10,1,'2018-12-28 14:33:12',NULL),
(580,65,'Tetracycline','tetracycline','text',0,'',11,1,'2018-12-28 14:33:12',NULL),
(581,65,'Co-trimoxazol','co_trimoxazol','text',0,'',12,1,'2018-12-28 14:33:12',NULL),
(582,65,'Ciprofloxazol','ciprofloxazol','text',0,'',13,1,'2018-12-28 14:33:12',NULL),
(583,65,'Nitrofurantion','nitrofurantion','text',0,'',14,1,'2018-12-28 14:33:12',NULL),
(584,65,'Nalidixic Acid','nalidixic_acid','text',0,'',15,1,'2018-12-28 14:33:12',NULL),
(585,65,'Ceftrioxan','ceftrioxan','text',0,'',16,1,'2018-12-28 14:33:12',NULL),
(586,65,'Neormycin','neormycin','text',0,'',17,1,'2018-12-28 14:33:12',NULL),
(587,65,'Cephalexin','cephalexin','text',0,'',18,1,'2018-12-28 14:33:12',NULL),
(588,65,'Cephradin','cephradin','text',0,'',19,1,'2018-12-28 14:33:12',NULL),
(589,65,'Doxycyclin','doxycyclin','text',0,'',20,1,'2018-12-28 14:33:12',NULL),
(590,65,'Choloramphenicol','choloramphenicol','text',0,'',21,1,'2018-12-28 14:33:12',NULL),
(591,65,'Ceftazidime','ceftazidime','text',0,'',22,1,'2018-12-28 14:33:12',NULL),
(592,65,'Aztreonam','aztreonam','text',0,'',23,1,'2018-12-28 14:33:12',NULL),
(593,1,'ESR (Westergren)','esr_westergren','number',48,'Male: 0 - 15 {{unit}}\r\nFemale: 0 - 20 {{unit}}',3,1,'2018-12-28 15:17:46',NULL),
(594,1,'Total count of WBC','total_count_of_wbc','number',49,'4,000 - 11,000 {{unit}}',4,1,'2018-12-28 15:17:46',NULL),
(595,1,'DIFFERENTIAL COUNT','differential_count','section',0,'',5,1,'2018-12-28 15:17:46',NULL),
(596,1,'Neutrophils','neutrophils','number',3,'40 - 75 {{unit}}',6,1,'2018-12-28 15:17:46',NULL),
(597,1,'Lymphocytes','lymphocytes','number',3,'20 - 50 {{unit}}',7,1,'2018-12-28 15:17:46',NULL),
(598,1,'Monocytes','monocytes','number',3,'02 - 04 {{unit}}',8,1,'2018-12-28 15:17:46',NULL),
(599,1,'Eosinophiis','eosinophiis','number',3,'02 - 06 {{unit}}',9,1,'2018-12-28 15:17:46',NULL),
(600,1,'Basophils','basophils','number',3,'00 - 01 {{unit}}',10,1,'2018-12-28 15:17:46',NULL),
(601,132,'Plasma Glucose Fasting','plasma_glucose_fasting','number',10,'4.2-6.4 {{unit}} CUS:Nil.',1,1,'2018-12-28 15:29:40',NULL),
(602,132,'2hr After Breakfast.','2hr_after_breakfast','number',10,'4.44-7.8 {{unit}} CUS:Nil.',2,1,'2018-12-28 15:29:40',NULL),
(603,132,'Random Plasma Glucose','random_plasma_glucose','number',10,'4.44-7.8 {{unit}}.',3,1,'2018-12-28 15:29:40',NULL),
(604,132,'Blood Urea','blood_urea','number',11,'10-50 {{unit}}.',4,1,'2018-12-28 15:35:19',NULL),
(605,132,'S. Creatinine','s_creatinine','number',11,'0.4-1.4 {{unit}}.',5,1,'2018-12-28 15:35:19',NULL),
(606,132,'S. Cholesterol ( Total )','s_cholesterol_total','number',11,'150-250 {{unit}}.',6,1,'2018-12-28 15:35:19',NULL),
(607,132,'S. Cholesterol ( HDL )','s_cholesterol_hdl','number',11,'>35 {{unit}}.',7,1,'2018-12-28 15:35:19',NULL),
(608,132,'S. Cholesterol ( LDL )','s_cholesterol_ldl','number',11,'108-188 {{unit}}.',8,1,'2018-12-28 15:39:59',NULL),
(609,132,'S. Triglycerides','s_triglycerides','number',11,'150-200 {{unit}}.',9,1,'2018-12-28 15:39:59',NULL),
(610,132,'S. Uric Acid','s_uric_acid','number',11,'Male: 3.4-7.0, Female: 2.4-5.7 {{unit}}.',10,1,'2018-12-28 15:39:59',NULL),
(611,132,'S. Bilirubin ( Total )','s_bilirubin_total','number',11,'0.4-1.2 {{unit}}',11,1,'2018-12-28 15:44:48',NULL),
(612,132,'S. Bilirubin ( Direct )','s_bilirubin_direct','number',11,'Up to 0.30 {{unit}}',12,1,'2018-12-28 15:44:48',NULL),
(613,132,'S. Bilirubin ( Indirect )','s_bilirubin_indirect','number',11,'',13,1,'2018-12-28 15:44:48',NULL),
(614,132,'S. GPT ( ALT )','s_gpt_alt','number',12,'10-40 {{unit}}',14,1,'2018-12-28 15:49:27',NULL),
(615,132,'S. GOT ( AST )','s_got_ast','number',12,'10-35 {{unit}}',15,1,'2018-12-28 15:49:27',NULL),
(616,132,'S. Alkaline Phosphate ( ALP )','s_alkaline_phosphate_alp','number',12,'Adult: 21-92 {{unit}} </br>\r\nChildren: 71-142 {{unit}}',16,1,'2018-12-28 15:49:27',NULL),
(617,132,'Empty','empty','section',0,'',17,1,'2018-12-28 15:58:50',NULL),
(618,132,'CK-MB','ck_mb','number',12,'Up to 25 {{unit}}',18,1,'2018-12-28 15:58:50',NULL),
(619,132,'S. Calcium','s_calcium','number',11,'8.1-10.4 {{unit}}',19,1,'2018-12-28 15:58:50',NULL),
(620,132,'S. Total Protein','s_total_protein','number',14,'6.6-8.7 {{unit}}',20,1,'2018-12-28 15:58:50',NULL),
(621,132,'S. Albumin','s_albumin','number',15,'3.5-5.10 {{unit}}',21,1,'2018-12-28 15:58:50',NULL),
(622,132,'S. Globulin','s_globulin','number',14,'2.2-3.5 {{unit}}',22,1,'2018-12-28 15:58:50',NULL),
(623,132,'A/ G Ration','ag_ration','number',51,'1.2 {{unit}} -2.5 {{unit}}',23,1,'2018-12-28 15:58:50',NULL),
(624,132,'S. Amylase','s_amylase','number',12,'28-100 {{unit}}',24,1,'2018-12-28 16:06:59',NULL),
(625,132,'S. Alkaline Phosphate ( ALP )','s_alkaline_phosphate_alp_1','text',0,'',25,1,'2018-12-28 16:06:59',NULL),
(626,132,'1hr. After 75 gm. glucose','after_gm_glucose','number',10,'4.44-7.8 {{unit}} CUS: Nil.',26,1,'2018-12-28 16:06:59',NULL),
(627,132,'1.5hr. After 75 gm. glucose','after_gm_glucose_1','number',10,'4.44-7.8 {{unit}} CUS: Nil.',27,1,'2018-12-28 16:06:59',NULL),
(628,132,'2hr. After 75 gm. glucose','after_gm_glucose_2','number',10,'4.44-7.8 {{unit}} CUS: Nil.',28,1,'2018-12-28 16:06:59',NULL),
(629,132,'BUN','bun','number',11,'4.67-23.36 {{unit}}',29,1,'2018-12-28 16:06:59',NULL),
(630,76,'Spc.IgG-ab','Spc_igg_ab','text',0,'0.80 - 0.90: Equivocal\r\n> 0.90: Positive',3,1,'2019-01-06 14:32:21',NULL);

/*Table structure for table `lab_report_template_units` */

DROP TABLE IF EXISTS `lab_report_template_units`;

CREATE TABLE `lab_report_template_units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

/*Data for the table `lab_report_template_units` */

insert  into `lab_report_template_units`(`id`,`name`,`created_at`,`updated_at`) values 
(3,'%','2018-12-12 13:58:50',NULL),
(4,'g/dl','2018-12-12 13:58:53',NULL),
(5,'mg/24hrs','2018-12-13 19:23:41',NULL),
(6,'ml','2018-12-13 19:23:53',NULL),
(7,'IU/ml ','2018-12-13 19:24:37',NULL),
(8,'ng/ml','2018-12-13 19:28:06',NULL),
(9,'mIU/ml','2018-12-13 19:30:09',NULL),
(10,'mmol/L','2018-12-13 19:35:18',NULL),
(11,'mg/dl','2018-12-13 19:35:39',NULL),
(12,'U/L','2018-12-13 19:36:00',NULL),
(13,'ml','2018-12-13 19:36:46',NULL),
(14,'g/l','2018-12-13 19:37:10',NULL),
(15,'g/dl','2018-12-13 19:37:17',NULL),
(17,'gm/L','2018-12-15 14:33:11',NULL),
(18,'μIU/ml','2018-12-15 14:34:21',NULL),
(19,'p mol / L','2018-12-15 14:34:46',NULL),
(20,'μg/dl.','2018-12-15 14:35:24',NULL),
(21,'pg/ml','2018-12-15 14:37:10',NULL),
(22,'n mol / L','2018-12-15 14:37:54',NULL),
(23,'U/ml','2018-12-15 14:39:07',NULL),
(24,'mm','2018-12-15 14:40:10',NULL),
(25,'cmm','2018-12-15 14:40:21',NULL),
(26,'Th / μl','2018-12-15 14:41:02',NULL),
(27,'ml/min','2018-12-15 14:43:51',NULL),
(28,'H.P.F.','2018-12-15 14:46:05',NULL),
(29,'R','2018-12-15 14:48:40',NULL),
(30,'S','2018-12-15 14:48:51',NULL),
(31,'FL','2018-12-15 14:52:03',NULL),
(32,'μl','2018-12-15 14:52:47',NULL),
(33,'Million/ml','2018-12-15 14:55:03',NULL),
(34,'M','2018-12-15 14:55:38',NULL),
(35,'ng/dl','2018-12-15 14:56:48',NULL),
(36,'μg/dl','2018-12-15 14:57:11',NULL),
(37,'μIU/L','2018-12-15 15:02:03',NULL),
(38,'gm/dl','2018-12-15 15:12:48',NULL),
(39,'mm in 1st hour ','2018-12-15 15:13:56',NULL),
(40,'Sero-Units','2018-12-15 15:16:57',NULL),
(41,'Negative','2018-12-15 15:17:32',NULL),
(42,'Dubious','2018-12-15 15:17:42',NULL),
(43,'Positive','2018-12-15 15:17:51',NULL),
(44,'μgm/dl','2018-12-15 15:37:49',NULL),
(45,'nmol/L','2018-12-15 15:38:55',NULL),
(46,'M/μL','2018-12-15 15:53:02',NULL),
(47,'pg','2018-12-15 15:54:00',NULL),
(48,'mm (1st hour)','2018-12-22 15:36:12',NULL),
(49,'/cmm','2018-12-22 15:39:54',NULL),
(50,'dia','2018-12-22 15:51:33',NULL),
(51,':l','2018-12-22 18:19:08',NULL),
(52,'Negative','2018-12-23 15:21:36',NULL),
(53,'Positive','2018-12-23 15:22:17',NULL),
(54,'* * ','2018-12-23 15:31:32',NULL),
(55,'units','2018-12-23 15:37:34',NULL),
(56,'mg/L','2018-12-24 12:25:56',NULL),
(57,'U/Hours','2018-12-24 12:49:38',NULL),
(58,'Sec.','2018-12-24 15:27:19',NULL);

/*Table structure for table `lab_report_templates` */

DROP TABLE IF EXISTS `lab_report_templates`;

CREATE TABLE `lab_report_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_id` varchar(100) NOT NULL,
  `name` varchar(191) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `sub_title` varchar(250) DEFAULT NULL,
  `data_method` varchar(250) DEFAULT NULL,
  `code` varchar(100) NOT NULL,
  `price` float(8,2) NOT NULL,
  `tax` float DEFAULT NULL,
  `date` date NOT NULL,
  `sample_type` varchar(150) DEFAULT NULL,
  `note` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8;

/*Data for the table `lab_report_templates` */

insert  into `lab_report_templates`(`id`,`template_id`,`name`,`title`,`sub_title`,`data_method`,`code`,`price`,`tax`,`date`,`sample_type`,`note`,`created_at`,`status`) values 
(1,'1901071093425','CBC','HEMATOLOGY REPORT','','','CBC',500.00,NULL,'2019-01-07','Blood','','2018-12-10 08:59:16',1),
(4,'1901074938152','S. Ceruloplasmin Level','HEMATOLOGY REPORT','','','S. Ceruloplasmin Level',1000.00,NULL,'2019-01-07','Blood','','2018-12-22 15:41:52',1),
(6,'1901077048269','S. Total Protein','BIOCHEMICAL ANALYSIS REPORT','','','S. Total Protein',500.00,NULL,'2019-01-07','Blood','','2018-12-22 18:17:38',1),
(7,'1901074836910','Sputum for AFB','MICROSCOPIC EXAMINATION','','','Sputum for AFB',0.00,NULL,'2019-01-07','Sputum','<h2>MICROSCOPIC EXAMINATION</h2>\r\n<p>SPUTUM FOR AFB REPORTS</p>\r\n<p> </p>\r\n<p>1<sup>st </sup>Sample 01 day : {{Sample 1}}</p>\r\n<p>2<sup>nd</sup><sup> </sup>Sample 02 day : {{Sample 2}}</p>\r\n<p>3<sup>rd</sup><sup> </sup>Sample 03 day :  {{Sample 3}}</p>','2018-12-22 18:38:59',1),
(8,'1901079206538','Culture (Aerobic / Anaerobic)','MICROBIOLOGICAL REPORT','','','Culture (Aerobic / Anaerobic)',0.00,NULL,'2019-01-07','Urine','<table width=\"426\">\r\n<tbody>\r\n<tr>\r\n<td>{{Note1}}</td>\r\n<td>{{Note2}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n<table border=\"1\">\r\n<tbody>\r\n<tr>\r\n<td colspan=\"4\"><strong>Anti Biogram of Organisms Isolated</strong></td>\r\n</tr>\r\n<tr>\r\n<td> Ampicillin</td>\r\n<td> {{Ampicillin}}</td>\r\n<td> Co-trimoxazole</td>\r\n<td> {{Co-trimoxazole}}</td>\r\n</tr>\r\n<tr>\r\n<td> Amoxycillin</td>\r\n<td> {{Amoxycillin}}</td>\r\n<td> Cloxacillin</td>\r\n<td> {{Cloxacillin}}</td>\r\n</tr>\r\n<tr>\r\n<td> A moxiclav</td>\r\n<td> {{A moxiclav}}</td>\r\n<td> Doxycycline</td>\r\n<td> {{Doxycycline}}</td>\r\n</tr>\r\n<tr>\r\n<td> Azithromycin</td>\r\n<td> {{Azithromycin}}</td>\r\n<td> Erythromycin</td>\r\n<td> {{Erythromycin}}</td>\r\n</tr>\r\n<tr>\r\n<td> Cephalexin</td>\r\n<td> {{Cephalexin}}</td>\r\n<td> Nitrofuration</td>\r\n<td> {{Nitrofuration}}</td>\r\n</tr>\r\n<tr>\r\n<td> Cephradine</td>\r\n<td> {{Cephradine}}</td>\r\n<td> Gentamicin</td>\r\n<td> {{Gentamicin}}</td>\r\n</tr>\r\n<tr>\r\n<td> Ceftriaxone</td>\r\n<td> {{Ceftriaxone}}</td>\r\n<td> Nalidixic acid</td>\r\n<td> {{Nalidixic acid}}</td>\r\n</tr>\r\n<tr>\r\n<td> Ceftazidime</td>\r\n<td> {{Ceftazidime}}</td>\r\n<td> Penicillin</td>\r\n<td> {{Penicillin}}</td>\r\n</tr>\r\n<tr>\r\n<td> Cloxacillin</td>\r\n<td> {{Cloxacillin}}</td>\r\n<td> IMipenem</td>\r\n<td>{{IMipenem}}</td>\r\n</tr>\r\n<tr>\r\n<td> Ciprofloxacin</td>\r\n<td> {{Ciprofloxacin}}</td>\r\n<td> Cefuroxime</td>\r\n<td> {{Cefuroxime}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n<p>R = Resistant S = Sensitive I = Intermediate</p>','2018-12-22 19:12:40',1),
(9,'1901078736154','Anti- Tg (Thyroglobulin)','IMMUNOLOGY REPORT','','Extimations are carried out by ELISA Method','Anti- Tg (Thyroglobulin)',0.00,NULL,'2019-01-07','Blood','','2018-12-23 15:08:22',1),
(11,'1904067526409','Anti- HIV (1&2)','IMMUNOLOGICAL REPORT','','Estimations are carried out by ELISA Method','Anti- HIV (1&2)',1200.00,NULL,'2019-04-06','Blood','','2018-12-23 15:19:53',1),
(12,'1901076439271','Alpha-Feto Protein','IMMUNOLOGY REPORT','','Extimations are carried out by ELISA Method','Alpha-Feto Protein',1200.00,NULL,'2019-01-07','Blood','<p><strong>Clinical Utility:</strong></p>\r\n<p>{{Clinical Utility}}</p>','2018-12-23 15:22:22',1),
(13,'1901077196032','Anti HBs by ELISA','IMMUNOLOGY REPORT','','Extimations are carried out by ELISA Method','Anti HBs by ELISA',0.00,NULL,'2019-01-07','Blood','','2018-12-23 15:29:14',1),
(14,'1901078530671','Lipid Profile','BIOCHEMICAL ANALYSIS REPORT','','','Lipid Profile',1000.00,NULL,'2019-01-07','Blood','','2018-12-23 15:32:40',1),
(15,'1901076152734','Serum ANA (Antinuclear Antibodies)','IMMUNOLOGY REPORT','','Extimations are carried out by ELISA Method','Serum ANA (Antinuclear Antibodies)',0.00,NULL,'2019-01-07','Blood','<table>\r\n<tbody>\r\n<tr>\r\n<td>TEST</td>\r\n<td>RESULT</td>\r\n</tr>\r\n<tr>\r\n<td>Serum ANA (Antinuclear Antibodies)</td>\r\n<td> </td>\r\n</tr>\r\n<tr>\r\n<td>Negative</td>\r\n<td> </td>\r\n</tr>\r\n<tr>\r\n<td>Moderate Positive</td>\r\n<td> </td>\r\n</tr>\r\n<tr>\r\n<td>Strong Positive</td>\r\n<td> </td>\r\n</tr>\r\n<tr>\r\n<td>Opinion</td>\r\n<td> </td>\r\n</tr>\r\n</tbody>\r\n</table>','2018-12-23 15:37:50',1),
(16,'1901072871364','Blood Urea','BIOCHEMICAL ANALYSIS REPORT','','','Blood Urea',0.00,NULL,'2019-01-07','Blood','','2018-12-23 15:41:06',1),
(17,'1901079743261','S. Uric Acid','BIOCHEMICAL ANALYSIS REPORT','','','S. Uric Acid',500.00,NULL,'2019-01-07','Blood','','2018-12-23 15:44:27',1),
(18,'1901063854672','#####Empty#####','SENSITIVITY RESULTS','','','#####Empty#####',0.00,NULL,'2019-01-06','','<table xss=removed width=\"100%\">\r\n<tbody>\r\n<tr xss=removed>\r\n<td xss=removed><strong>Anti Biogram of Organisms Isolated</strong></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table xss=removed width=\"100%\">\r\n<tbody>\r\n<tr xss=removed>\r\n<td xss=removed>Ampicillin</td>\r\n<td xss=removed>-</td>\r\n<td xss=removed>Co-Trimethoprim</td>\r\n<td xss=removed>-</td>\r\n</tr>\r\n<tr xss=removed>\r\n<td xss=removed>Amoxycillin</td>\r\n<td xss=removed>-</td>\r\n<td xss=removed>Cloxacillin</td>\r\n<td xss=removed>-</td>\r\n</tr>\r\n<tr xss=removed>\r\n<td xss=removed>Amoxiclav</td>\r\n<td xss=removed>-</td>\r\n<td xss=removed>Doxycycline</td>\r\n<td xss=removed>-</td>\r\n</tr>\r\n<tr xss=removed>\r\n<td xss=removed>Azithromycin</td>\r\n<td xss=removed>-</td>\r\n<td xss=removed>Erythromycin</td>\r\n<td xss=removed>-</td>\r\n</tr>\r\n<tr xss=removed>\r\n<td xss=removed>Cephalexin</td>\r\n<td xss=removed>-</td>\r\n<td xss=removed>Nitrofurantoin</td>\r\n<td xss=removed>-</td>\r\n</tr>\r\n<tr xss=removed>\r\n<td xss=removed>Cephradine</td>\r\n<td xss=removed>-</td>\r\n<td xss=removed>Gentamicin</td>\r\n<td xss=removed>-</td>\r\n</tr>\r\n<tr xss=removed>\r\n<td xss=removed>Ceftriaxone</td>\r\n<td xss=removed>-</td>\r\n<td xss=removed>Nalidixic acid</td>\r\n<td xss=removed>-</td>\r\n</tr>\r\n<tr xss=removed>\r\n<td xss=removed>Ceftazidime</td>\r\n<td xss=removed>-</td>\r\n<td xss=removed>Penicillin</td>\r\n<td xss=removed>-</td>\r\n</tr>\r\n<tr xss=removed>\r\n<td xss=removed>Cloxacillin</td>\r\n<td xss=removed>-</td>\r\n<td xss=removed>IMipenem</td>\r\n<td xss=removed>-</td>\r\n</tr>\r\n<tr xss=removed>\r\n<td xss=removed>Ciprofloxacin</td>\r\n<td xss=removed>-</td>\r\n<td xss=removed>Cefuroxime</td>\r\n<td xss=removed>-</td>\r\n</tr>\r\n</tbody>\r\n</table>','2018-12-23 15:45:29',1),
(19,'1901072915467','S. Amylase','BIOCHEMICAL ANALYSIS REPORT','','','S. Amylase',800.00,NULL,'2019-01-07','Blood','','2018-12-23 15:46:34',1),
(20,'1901078561094','S. Lipase','BIOCHEMICAL ANALYSIS REPORT','','','S. Lipase',1000.00,NULL,'2019-01-07','Blood','','2018-12-23 15:49:15',1),
(21,'1901076758139','Electrolytes','BIOCHEMICAL ANALYSIS REPORT','','Estimations are carried out by AFT-300 Automated Electrolytes Analyzer','Electrolytes',1000.00,NULL,'2019-01-07','Blood','','2018-12-23 15:56:50',1),
(22,'1901079324765','S. Albumin','BIOCHEMICAL ANALYSIS REPORT','','','S. Albumin',0.00,NULL,'2019-01-07','Blood','','2018-12-23 15:59:00',1),
(23,'1901075076438','Malarial Parasite (MP)','HAEMATOLOGY REPORT','','','Malarial Parasite (MP)',100.00,NULL,'2019-01-07','Blood','','2018-12-23 16:20:51',1),
(24,'1901078019264','S. Progesterone','IMMUNOLOGY REPORT','','Extimations are carried out by ELISA Method','S. Progesterone',0.00,NULL,'2019-01-07','Blood','','2018-12-23 16:29:17',1),
(25,'1901073157902','Serum PSA','TUMOUR MARKER TEST','','','Serum PSA',0.00,NULL,'2019-01-07','Blood','','2018-12-23 18:20:27',1),
(26,'1901070914265','Growth Hormone (GH)','HORMONE TEST REPORT','','','Growth Hormone (GH)',1500.00,NULL,'2019-01-07','Blood','','2018-12-23 18:21:52',1),
(27,'1901074319507','Serum Cortisol','HORMONE TEST REPORT','','','Serum Cortisol',0.00,NULL,'2019-01-07','Blood','','2018-12-23 18:24:48',1),
(28,'1901074817256','Progesterone','HORMONE TEST REPORT','','','Progesterone',0.00,NULL,'2019-01-07','Blood','','2018-12-23 18:33:30',1),
(29,'1901073480751','Serum Prolactine','HORMONE TEST REPORT','','','Serum Prolactine',0.00,NULL,'2019-01-07','Blood','','2018-12-23 18:44:06',1),
(30,'1901070845932','Hb ( Haemoglobin )','HAEMATOLOGY REPORT','','','Hb ( Haemoglobin )',0.00,NULL,'2019-01-07','Blood','','2018-12-23 19:18:38',1),
(31,'1812280246987','#####Empty#####','BLOOD FILM','','','#####Empty#####',0.00,NULL,'2018-12-28',NULL,'<h1>BLOOD FILM</h1>\r\n<p> </p>\r\n<h3>RBC shows anisochromia with anisocytosis</h3>\r\n<h3>WBC shows leucopenia</h3>\r\n<h3>Platelets are midly reduced</h3>\r\n<h3> </h3>\r\n<h3>Comment :</h3>\r\n<h3> </h3>','2018-12-23 19:29:12',1),
(32,'1901075327064','Random blood sugar (RBS)','BIOCHEMICAL ANALYSIS REPORT','','','Random blood sugar (RBS)',0.00,NULL,'2019-01-07','Blood','','2018-12-23 19:35:03',1),
(33,'1901078360512','S. Creatinine ','BIOCHEMICAL ANALYSIS REPORT','','','S. Creatinine ',300.00,NULL,'2019-01-07','Blood','','2018-12-23 19:37:13',1),
(34,'1901077138609','S. Calcium','BIOCHEMICAL ANALYSIS REPORT','','','S. Calcium',400.00,NULL,'2019-01-07','Blood','','2018-12-23 19:39:10',1),
(35,'1901078542103','S. GPT ( ALT )','BIOCHEMICAL ANALYSIS REPORT','','','S. GPT ( ALT )',400.00,NULL,'2019-01-07','Blood','','2018-12-23 19:42:07',1),
(36,'1901072168395','S. GOT ( AST )','BIOCHEMICAL ANALYSIS REPORT','','','S. GOT ( AST )',400.00,NULL,'2019-01-07','Blood','','2018-12-23 19:44:04',1),
(37,'1901075649012','S. Alkaline Phosphate ( ALP )','BIOCHEMICAL ANALYSIS REPORT','','','S. Alkaline Phosphate ( ALP )',0.00,NULL,'2019-01-07','Blood','','2018-12-23 19:46:10',1),
(38,'1901077540296','Fasting blood sugar ( FBS )','BIOCHEMICAL ANALYSIS REPORT','','','Fasting blood sugar ( FBS )',150.00,NULL,'2019-01-07','Blood','','2018-12-23 19:56:00',1),
(39,'1901072015498','Anti HCV','IMMUNOLOGICAL REPORT','IMMUNOLOGY REPORT','Estimations are carried out by ELISA Method','Anti HCV',1200.00,NULL,'2019-01-07','Blood','','2018-12-23 20:00:19',1),
(40,'1901062614937','Anti-CCP Ab','IMMUNOLOGICAL REPORT','','Estimations are carried out by ELISA Method','Anti-CCP Ab',0.00,NULL,'2019-01-06','Blood','','2018-12-23 20:02:52',1),
(41,'1901077523946','Serum Iron','BIOCHEMICAL ANALYSIS REPORT','','','Serum Iron',0.00,NULL,'2019-01-07','Blood','','2018-12-23 20:12:45',1),
(42,'1901070814572','S. Bilirubin (Total)','BIOCHEMICAL ANALYSIS REPORT','','','S. Bilirubin (Total)',0.00,NULL,'2019-01-07','Blood','','2018-12-23 20:19:30',1),
(43,'1901077056418','Vit B12','BIOCHEMICAL ANALYSIS REPORT','','','Vit B12',0.00,NULL,'2019-01-07','Blood','','2018-12-23 20:21:26',1),
(44,'1901074609382','24 Hour Urine For Electrolytes','BIOCHEMICAL ANALYSIS REPORT','','','24 Hour Urine For Electrolytes',0.00,NULL,'2019-01-07','Urine','','2018-12-23 20:32:45',1),
(45,'1901074962137','Electrolytes 1','BIOCHEMICAL ANALYSIS REPORT','','Estimations are carried out by AFT-300 Automated Electrolytes Analyzer','Electrolytes 1',0.00,NULL,'2019-01-07','Blood','','2018-12-24 10:23:22',1),
(46,'1901075246908','NS1 Antigen For Dengue','IMMUNOLOGICAL REPORT','NS1 Antigen For Dengue','','NS1 Antigen For Dengue',0.00,NULL,'2019-01-07','Blood','','2018-12-24 11:41:49',1),
(47,'1901072970546','I.C.T For Chikungunya','IMMUNOLOGICAL REPORT','','','I.C.T For Chikungunya',0.00,NULL,'2019-01-07','Blood','','2018-12-24 11:43:55',1),
(48,'1812285170264','#####Empty#####','HAEMATOLOGY REPORT','','','#####Empty#####',0.00,NULL,'2018-12-28',NULL,'','2018-12-24 11:46:22',1),
(49,'1901070936874','OGTT','BIOCHEMICAL ANALYSIS REPORT','','','OGTT',400.00,NULL,'2019-01-07','Blood','','2018-12-24 11:53:31',1),
(50,'1901071463270','I.C.T For Dengue','IMMUNOLOGICAL REPORT','','','I.C.T For Dengue',0.00,NULL,'2019-01-07','Blood','','2018-12-24 11:55:38',1),
(51,'1901078961342','Urine Routine Examination ','URINE ROUTINE EXAMINATION REPORT','','','Urine Routine Examination ',0.00,NULL,'2019-01-07','Urine','<table border=\"1\" width=\"417\">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<h3> PHYSICAL EXAMINATION</h3>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td> Colour</td>\r\n<td> {{Colour}}</td>\r\n</tr>\r\n<tr>\r\n<td> Appearance</td>\r\n<td> {{Appearance}}</td>\r\n</tr>\r\n<tr>\r\n<td> Sediment</td>\r\n<td> {{Sediment}}</td>\r\n</tr>\r\n<tr>\r\n<td> Specific Gravity</td>\r\n<td> {{Specific Gravity}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n<table border=\"1\" width=\"424\">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<h3>CHEMICAL EXAMINATION</h3>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td> Reaction</td>\r\n<td> {{Reaction}}</td>\r\n</tr>\r\n<tr>\r\n<td> Excess of Phosphate</td>\r\n<td> {{Excess of Phosphate}}</td>\r\n</tr>\r\n<tr>\r\n<td> Albumin</td>\r\n<td> {{Albumin}}</td>\r\n</tr>\r\n<tr>\r\n<td> Sugar (reducing substance)</td>\r\n<td> {{Suger (reducing substance)}}</td>\r\n</tr>\r\n<tr>\r\n<td> Acetone</td>\r\n<td> {{Acetone}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n<table border=\"1\" width=\"425\">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<h3> CHEMICAL EXAMINATION</h3>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td> Epithelial cells</td>\r\n<td> {{Epithelial cells}}</td>\r\n</tr>\r\n<tr>\r\n<td> RBC</td>\r\n<td> {{RBC}}</td>\r\n</tr>\r\n<tr>\r\n<td> Pus cells</td>\r\n<td> {{Pus cells}}</td>\r\n</tr>\r\n<tr>\r\n<td> Cellular casts</td>\r\n<td> {{Cellular casts}}</td>\r\n</tr>\r\n<tr>\r\n<td> Yeasts</td>\r\n<td> {{Yeasts}}</td>\r\n</tr>\r\n<tr>\r\n<td> Calcium oxalate Crystals</td>\r\n<td> {{Calcium oxalate Crystals}}</td>\r\n</tr>\r\n<tr>\r\n<td> Triple phosphate</td>\r\n<td> {{Triple phosphate}}</td>\r\n</tr>\r\n<tr>\r\n<td> RBC Cast</td>\r\n<td> {{RBC Cast}}</td>\r\n</tr>\r\n<tr>\r\n<td> Granular Casts</td>\r\n<td> {{Granular Casts}}</td>\r\n</tr>\r\n<tr>\r\n<td> Amorphous phosphate</td>\r\n<td> {{Amorphous phosphate}}</td>\r\n</tr>\r\n<tr>\r\n<td> Calcium oxalate</td>\r\n<td> {{Calcium oxalate}}</td>\r\n</tr>\r\n<tr>\r\n<td> Uric Acid Crystals</td>\r\n<td> {{Uric Acid Crystals}}</td>\r\n</tr>\r\n<tr>\r\n<td> Cystine Crystals</td>\r\n<td> {{Cystine Crystals}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>','2018-12-24 11:57:05',1),
(52,'1901077145062','Rh (D) Antibody Titre','Title','','','Rh (D) Antibody Titre',0.00,NULL,'2019-01-07','Blood','<table width=\"638\">\r\n<tbody>\r\n<tr>\r\n<td>TEST</td>\r\n<td>Result</td>\r\n</tr>\r\n<tr>\r\n<td>Rh (D) Antibody Titre</td>\r\n<td>{{Rh (D) Antibody Titre}}</td>\r\n</tr>\r\n</tbody>\r\n</table>','2018-12-24 11:57:57',1),
(53,'1901070915287','Urine for Bence Jones Protein','URINE FOR BENCE JONES PROTEIN','','','Urine for Bence Jones Protein',0.00,NULL,'2019-01-07','Urine','','2018-12-24 11:58:33',1),
(54,'1901072398157','Pregnancy test','SEROLOGICAL REPORT','','','Pregnancy test',0.00,NULL,'2019-01-07','Urine','','2018-12-24 11:59:27',1),
(55,'1901072658431','Blood Group ABO Rh (D) Factor','SEROLOGICAL REPORT','','','Blood Group ABO Rh (D) Factor',0.00,NULL,'2019-01-07','Blood','<table width=\"765\">\r\n<tbody>\r\n<tr>\r\n<td>Test</td>\r\n<td>Result</td>\r\n</tr>\r\n<tr>\r\n<td>Blood Group ABO Rh (D) Factor</td>\r\n<td>{{Blood Group ABO Rh (D) Factor}}</td>\r\n</tr>\r\n</tbody>\r\n</table>','2018-12-24 12:00:55',1),
(56,'1901073594617','Serum TSH 2','HORMONE TEST REPORT','','Estimations are carried out by ELISA Method','Serum TSH 2',0.00,NULL,'2019-01-07','Blood','','2018-12-24 12:03:14',1),
(57,'1901077694158','VDRL','SEROLOGICAL REPORT','','','VDRL',500.00,NULL,'2019-01-07','Blood','<table width=\"743\">\r\n<tbody>\r\n<tr>\r\n<td> TEST</td>\r\n<td> RESULT</td>\r\n</tr>\r\n<tr>\r\n<td> VDRL</td>\r\n<td> {{VDRL}}</td>\r\n</tr>\r\n<tr>\r\n<td> HIV(Screening)</td>\r\n<td> {{HIV(Screening)}}</td>\r\n</tr>\r\n<tr>\r\n<td> HCV(Screening)</td>\r\n<td> {{HCV(Screening)}}</td>\r\n</tr>\r\n<tr>\r\n<td> TPHA(Screening)</td>\r\n<td> {{TPHA(Screening)}}</td>\r\n</tr>\r\n</tbody>\r\n</table>','2018-12-24 12:03:24',1),
(58,'1901077054639','Troponin - I','BIOCHEMICAL ASSAY','','Estimations are carried out by ELISA plate reader','Troponin - I',0.00,NULL,'2019-01-07','Blood','','2018-12-24 12:04:54',1),
(59,'1901074971583','HBs Ag (Screening)','SEROLOGICAL REPORT','','','HBs Ag(Screening)',500.00,NULL,'2019-01-07','Blood','<table>\r\n<tbody>\r\n<tr>\r\n<td> TEST</td>\r\n<td> RESULT</td>\r\n</tr>\r\n<tr>\r\n<td> HBs Ag(Screening)</td>\r\n<td> {{HBs Ag (Screening)}}</td>\r\n</tr>\r\n</tbody>\r\n</table>','2018-12-24 12:05:27',1),
(60,'1901071208734','I.C.T. For Troponin I','IMMUNOLOGICAL REPORT','','','I.C.T. For Troponin I',0.00,NULL,'2019-01-07','Blood','','2018-12-24 12:05:55',1),
(61,'1901073105498','HBs Ag (Screening) 2','SEROLOGICAL REPORT','','','HBs Ag (Screening) 2',0.00,NULL,'2019-01-07','Blood','<table width=\"459\">\r\n<tbody>\r\n<tr>\r\n<td> TEST</td>\r\n<td> RESULT</td>\r\n</tr>\r\n<tr>\r\n<td> HBs Ag (Screening)</td>\r\n<td> {{HBs Ag (Screening)}}</td>\r\n</tr>\r\n<tr>\r\n<td> HIV (Screening)</td>\r\n<td> {{HIV (Screening)}}</td>\r\n</tr>\r\n<tr>\r\n<td> HCV (Screening)</td>\r\n<td> {{HCV (Screening)}}</td>\r\n</tr>\r\n<tr>\r\n<td> VDRL</td>\r\n<td> {{VDRL}}</td>\r\n</tr>\r\n<tr>\r\n<td> Malarial Parasite (MP)</td>\r\n<td> {{Malarial Parasite (MP)}}</td>\r\n</tr>\r\n</tbody>\r\n</table>','2018-12-24 12:07:51',1),
(62,'1901071759820','Triple Antigen','SEROLOGICAL REPORT','','','Triple Antigen',0.00,NULL,'2019-01-07','Blood','','2018-12-24 12:10:51',1),
(63,'1901077368954','WIDAL TEST','SEROLOGICAL REPORT','','','WIDAL TEST',500.00,NULL,'2019-01-07','Blood','','2018-12-24 12:25:09',1),
(64,'1901074081259','I.C.T For Malarial Parasite (MP)','SEROLOGICAL REPORT','','','I.C.T For Malarial Parasite (MP)',0.00,NULL,'2019-01-07','Blood','','2018-12-24 12:35:19',1),
(65,'1901072743180','Microscopy','MICROBIOLOGY REPORT','','','Microscopy',0.00,NULL,'2019-01-07','Urine','<p> </p>\r\n<table border=\"1\">\r\n<tbody>\r\n<tr>\r\n<td><strong>Microscopy</strong></td>\r\n<td> </td>\r\n</tr>\r\n<tr>\r\n<td>{{Note1}}</td>\r\n<td> {{Note2}}</td>\r\n</tr>\r\n<tr>\r\n<td>COLONY COUNT: {{Colony Count}}</td>\r\n<td> </td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<h3>SENSITIVITY</h3>\r\n<table border=\"1\">\r\n<tbody>\r\n<tr>\r\n<td> Penicillin-V</td>\r\n<td> {{Penicillin-V}}</td>\r\n<td> Nitrofurantion</td>\r\n<td> {{Nitrofurantion}}</td>\r\n</tr>\r\n<tr>\r\n<td> Ampicillin</td>\r\n<td> {{Ampicillin}}</td>\r\n<td> Nalidixic Acid</td>\r\n<td> {{Nalidixic Acid}}</td>\r\n</tr>\r\n<tr>\r\n<td> Amoxycillin</td>\r\n<td> {{Amoxycillin}}</td>\r\n<td> Ceftrioxan</td>\r\n<td> {{Ceftrioxan}}</td>\r\n</tr>\r\n<tr>\r\n<td> Cloxacillin</td>\r\n<td> {{Cloxacillin}}</td>\r\n<td> Neormycin</td>\r\n<td> {{Neormycin}}</td>\r\n</tr>\r\n<tr>\r\n<td> Mecillinum</td>\r\n<td> {{Mecillinum}}</td>\r\n<td> Cephalexin</td>\r\n<td> {{Cephalexin}}</td>\r\n</tr>\r\n<tr>\r\n<td> Erythromycin</td>\r\n<td> {{Erythromycin}}</td>\r\n<td> Cephradin</td>\r\n<td> {{Cephradin}}</td>\r\n</tr>\r\n<tr>\r\n<td> Gentamycin</td>\r\n<td> {{Gentamycin}}</td>\r\n<td> Doxycyclin</td>\r\n<td> {{Doxycyclin}}</td>\r\n</tr>\r\n<tr>\r\n<td> Tetracycline</td>\r\n<td> {{Tetracycline}}</td>\r\n<td> Choloramphenicol</td>\r\n<td> {{Choloramphenicol}}</td>\r\n</tr>\r\n<tr>\r\n<td> Co-trimoxazol</td>\r\n<td> {{Co-trimoxazol}}</td>\r\n<td> Ceftazidime</td>\r\n<td> {{Ceftazidime}}</td>\r\n</tr>\r\n<tr>\r\n<td> Ciprofloxazol</td>\r\n<td> {{Ciprofloxazol}}</td>\r\n<td> Aztreonam</td>\r\n<td> {{Aztreonam}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>','2018-12-24 12:46:00',1),
(66,'1901076092348','Urine Amylase','URINE ROUTINE EXAMINATION REPORT','','','Urine Amylase',0.00,NULL,'2019-01-07','Urine','','2018-12-24 12:48:47',1),
(67,'1901073802754','Para Thyroid Hormone (PTH)','HORMONE TEST REPORT','','Extimations are carried out by ELISA Method','Para Thyroid Hormone (PTH)',0.00,NULL,'2019-01-07','Blood','','2018-12-24 12:53:05',1),
(68,'1901070415873','Cytopathology','CYTOPATHOLOGY REPORT','','','Cytopathology',0.00,NULL,'2019-01-07','Pap\'s smear','<h3><strong>Microscopic Examination:</strong></h3>\r\n<table width=\"530\">\r\n<tbody>\r\n<tr>\r\n<td>Specimen Source</td>\r\n<td>:</td>\r\n<td>{{Specimen Source}}</td>\r\n</tr>\r\n<tr>\r\n<td>Collection Date</td>\r\n<td>:</td>\r\n<td>{{Collection Date}}</td>\r\n</tr>\r\n<tr>\r\n<td>Last Menstrual Date</td>\r\n<td>:</td>\r\n<td>{{Last Menstrual Date}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n<h3><strong>Microscopic Examination:</strong></h3>\r\n<p>{{Comments}}</p>\r\n<p> </p>\r\n<h3><strong>Dx: <br></strong></h3>\r\n<p>{{Dx}}</p>\r\n<p> </p>','2018-12-24 12:54:57',1),
(69,'1901073405267','Cytopathology 01','CYTOPATHOLOGY REPORT','','','Cytopathology 01',0.00,NULL,'2019-01-07','Pap\'s smear','<h3><strong>Microscopic Examination:</strong></h3>\r\n<p>{{Microscopic Examination 02}}</p>\r\n<p> </p>\r\n<p>DX:  {{Dx}}</p>','2018-12-24 12:56:31',1),
(70,'1901071709486','Oestrogen','IMMUNOLOGY REPORT','','Extimations are carried out by ELISA Method','Oestrogen',0.00,NULL,'2019-01-07','Blood','','2018-12-24 13:04:59',1),
(71,'1901072069741','Serum LH','HORMONE TEST REPORT','','Extimations are carried out by ELISA Method','Serum LH',0.00,NULL,'2019-01-07','Blood','','2018-12-24 13:10:23',1),
(72,'1901074651970','Lactate Dehydrogenase (LDH)','BIOCHEMICAL ASSAY','','','Lactate Dehydrogenase (LDH)',0.00,NULL,'2019-01-07','Blood','','2018-12-24 13:16:06',1),
(73,'1901071486037','Anti-TB,IgG(Elisa)','IMMUNOLOGY REPORT','','','Anti-TB,IgG(Elisa)',0.00,NULL,'2019-01-07','Blood','<h3>Anti-TB,IgG(Elisa)</h3>\r\n<table width=\"746\">\r\n<tbody>\r\n<tr>\r\n<td>TEST</td>\r\n<td> </td>\r\n<td>RESULT</td>\r\n</tr>\r\n<tr>\r\n<td>Patient</td>\r\n<td>:</td>\r\n<td> {{Patient}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n<p><strong>Interpretation:</strong></p>\r\n<p> </p>\r\n<table width=\"759\">\r\n<tbody>\r\n<tr>\r\n<td>Negative</td>\r\n<td>:</td>\r\n<td>< 125></td>\r\n</tr>\r\n<tr>\r\n<td>Borderline</td>\r\n<td>:</td>\r\n<td>125-225  Sero-Units</td>\r\n</tr>\r\n<tr>\r\n<td>Positive</td>\r\n<td>:</td>\r\n<td>> 225  Sero-Units</td>\r\n</tr>\r\n<tr>\r\n<td> </td>\r\n<td> </td>\r\n<td> </td>\r\n</tr>\r\n<tr>\r\n<td>Opinion</td>\r\n<td>:</td>\r\n<td>{{Opinion}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n<h3> </h3>','2018-12-24 13:20:51',1),
(74,'1901074206395','HBsAg(Elisa)','SEROLOGICAL REPORT','','','HBsAg(Elisa)',0.00,NULL,'2019-01-07','Blood','<h2>HBsAg(Elisa)</h2>\r\n<p> </p>\r\n<p>Cut off Value ---------------- {{Cut off Value}}</p>\r\n<p>Patient Absorbance --------- {{Patient Absorbance}}</p>\r\n<p> </p>\r\n<p><strong>Comments:</strong> {{Comments}}</p>','2018-12-24 13:23:06',1),
(75,'1901073260754','HbA1c','BIOCHEMICAL ANALYSIS REPORT','','','HbA1c',0.00,NULL,'2019-01-07','Blood','','2018-12-24 13:24:48',1),
(76,'1901074652098','Anti- H.Pylori IgG-Ab','IMMUNOLOGY REPORT','','Extimations are carried out by ELISA Method','Anti- H.Pylori IgG-Ab',1200.00,NULL,'2019-01-07','Blood','','2018-12-24 13:28:29',1),
(77,'1901074239860','Serum FSH','HORMONE TEST REPORT','','Extimations are carried out by ELISA Method','Serum FSH',0.00,NULL,'2019-01-07','Blood','','2018-12-24 13:33:45',1),
(78,'1901070417698','Serum Ferritin','BIOCHEMICAL ANALYSIS REPORT','','','Serum Ferritin',0.00,NULL,'2019-01-07','Blood','','2018-12-24 13:36:37',1),
(79,'1901078049173','Anti Ds DNA','IMMUNOLOGY REPORT','','Extimations are carried out by ELISA Method','Anti Ds DNA',0.00,NULL,'2019-01-07','Blood','<h2>Anti Ds DNA</h2>\r\n<p> </p>\r\n<p>Sample Value     : {{Sample Value}}</p>\r\n<p>Reference Value : {{Reference Value}}</p>\r\n<p> </p>\r\n<p><strong>Opinion:  </strong>{{Opinion}}</p>','2018-12-24 13:48:32',1),
(80,'1901072690137','CK-MB','BIOCHEMICAL ASSAY','','Extimations are carried out by ELISA plate reader','CK-MB',0.00,NULL,'2019-01-07','Blood','','2018-12-24 13:51:59',1),
(81,'1901079216038','Carcinoembryonic Antigen (CEA)','IMMUNOLOGY REPORT','','Extimations are carried out by ELISA Method','Carcinoembryonic Antigen (CEA)',0.00,NULL,'2019-01-07','Blood','<h3>Clinical Utility:</h3>\r\n<p>{{Clinical Utility}}</p>','2018-12-24 13:54:10',1),
(82,'1901078965342','S. Magnesium','BIOCHEMICAL ANALYSIS REPORT','','','S. Magnesium',0.00,NULL,'2019-01-07','Blood','','2018-12-24 13:56:16',1),
(83,'1901070819435','CCR','CLINICAL CHEMISTRY','','','CCR',0.00,NULL,'2019-01-07','Blood','','2018-12-24 14:03:00',1),
(84,'1901075096137','CEA','IMMUNOLOGY REPORT','','Extimations are carried out by ELISA Method','CEA',1400.00,NULL,'2019-01-07','Blood','','2018-12-24 14:04:44',1),
(85,'1901075431078','CA-125','IMMUNOLOGY REPORT','','Extimations are carried out by ELISA Method','CA-125',1200.00,NULL,'2019-01-07','Blood','<h3><strong>Clinical Utility:</strong></h3>\r\n<p>{{Clinical Utility}}</p>','2018-12-24 14:06:28',1),
(86,'1901072591784','Thyroxine (T4)','HORMONE TEST REPORT','','Extimations are carried out by ELISA Method','Thyroxine (T4)',0.00,NULL,'2019-01-07','Blood','','2018-12-24 14:08:46',1),
(87,'1901078039641','Total tri-iodothyronine (T3)','HORMONE TEST REPORT','','Extimations are carried out by ELISA Method','Total tri-iodothyronine (T3)',0.00,NULL,'2019-01-07','Blood','','2018-12-24 14:11:10',1),
(88,'1901079678103','Serum TSH','HORMONE TEST REPORT','','Estimations are carried out by ELISA Method','Serum TSH',0.00,NULL,'2019-01-07','Blood','','2018-12-24 14:12:50',1),
(89,'1901072148760','F T4','HORMONE TEST REPORT','','Extimations are carried out by ELISA Method','F T4',1000.00,NULL,'2019-01-07','Blood','','2018-12-24 14:14:18',1),
(90,'1901074053768','F T3','HORMONE TEST REPORT','','Extimations are carried out by ELISA Method','F T3',1000.00,NULL,'2019-01-07','Blood','','2018-12-24 14:15:34',1),
(91,'1901070278561','S. C3','IMMUNOLOGY REPORT','','Extimations are carried out by ELISA Method','S. C3',1000.00,NULL,'2019-01-07','Blood','','2018-12-24 14:18:13',1),
(92,'1812287082359','#####Empty#####','Title','','','#####Empty#####',0.00,NULL,'2018-12-28',NULL,'','2018-12-24 14:26:46',1),
(93,'1901074295081','β-hCG','TUMOUR MARKER','','Tests were carried out by using DSI ELISA (Germany)','β-hCG',0.00,NULL,'2019-01-07','Blood','<p>{{Comments}}</p>\r\n<table width=\"632\">\r\n<tbody>\r\n<tr>\r\n<td>Weeks Post LMP</td>\r\n<td>Approximate B-hCG Range (mIU/ml)</td>\r\n</tr>\r\n<tr>\r\n<td>3-4 Weeks</td>\r\n<td>{{3-4 Weeks}}</td>\r\n</tr>\r\n<tr>\r\n<td>4-5 Weeks</td>\r\n<td>{{4-5 Weeks}}</td>\r\n</tr>\r\n<tr>\r\n<td>5-6 Weeks</td>\r\n<td>{{5-6 Weeks}}</td>\r\n</tr>\r\n<tr>\r\n<td>6-7 Weeks</td>\r\n<td>{{6-7 Weeks}}</td>\r\n</tr>\r\n<tr>\r\n<td>7-12 Weeks</td>\r\n<td>{{7-12 Weeks}}</td>\r\n</tr>\r\n<tr>\r\n<td>12-16 Weeks</td>\r\n<td>{{12-16 Weeks}}</td>\r\n</tr>\r\n<tr>\r\n<td>16-29 Weeks</td>\r\n<td>{{16-29 Weeks}}</td>\r\n</tr>\r\n<tr>\r\n<td>2nd Trimester</td>\r\n<td>{{2nd Trimester}}</td>\r\n</tr>\r\n<tr>\r\n<td>29-41 Weeks</td>\r\n<td>{{29-41 Weeks}}</td>\r\n</tr>\r\n<tr>\r\n<td>3rd Trimester</td>\r\n<td>{{3rd Trimester}}</td>\r\n</tr>\r\n</tbody>\r\n</table>','2018-12-24 14:32:31',1),
(94,'1901076439102','E.coli','BACTERIOLOGICAL REPORT','','','E.coli',0.00,NULL,'2019-01-07','Urine','<p>{{Comments}}</p>\r\n<p>{{Opinion}}</p>\r\n<p> </p>\r\n<h2>SENSITIVITY RESULTS</h2>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td>Ampicillin</td>\r\n<td> {{Ampicillin}}</td>\r\n<td>Trimethoprim</td>\r\n<td> {{Trimethoprim}}</td>\r\n</tr>\r\n<tr>\r\n<td>Amoxycillin</td>\r\n<td> {{Amoxycillin}}</td>\r\n<td>Cloxacillin</td>\r\n<td> {{Cloxacillin}}</td>\r\n</tr>\r\n<tr>\r\n<td>Amoxiclav</td>\r\n<td> {{Amoxiclav}}</td>\r\n<td>Doxycycline</td>\r\n<td> {{Doxycycline}}</td>\r\n</tr>\r\n<tr>\r\n<td>Azithromycin</td>\r\n<td> {{Azithromycin}}</td>\r\n<td>Erythromycin</td>\r\n<td> {{Erythromycin}}</td>\r\n</tr>\r\n<tr>\r\n<td>Cephalexin</td>\r\n<td> {{Cephalexin}}</td>\r\n<td>Nitrofurantoin</td>\r\n<td> {{Nitrofurantoin}}</td>\r\n</tr>\r\n<tr>\r\n<td>Cephradine</td>\r\n<td> {{Cephradine}}</td>\r\n<td>Gentamicin</td>\r\n<td> {{Gentamicin}}</td>\r\n</tr>\r\n<tr>\r\n<td>Ceftriaxone</td>\r\n<td> {{Ceftriaxone}}</td>\r\n<td>Nalidixic acid</td>\r\n<td> {{Nalidixic acid}}</td>\r\n</tr>\r\n<tr>\r\n<td>Ceftazidime</td>\r\n<td> {{Ceftazidime}}</td>\r\n<td>Levofloxacin</td>\r\n<td> {{Levofloxacin}}</td>\r\n</tr>\r\n<tr>\r\n<td>Cloxacillin</td>\r\n<td> {{Cloxacillin}}</td>\r\n<td>Pefloxacin</td>\r\n<td> {{Pefloxacin}}</td>\r\n</tr>\r\n<tr>\r\n<td>Ciprofloxacin</td>\r\n<td> {{Ciprofloxacin}}</td>\r\n<td>Cefuroxime</td>\r\n<td> {{Cefuroxime}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>Key:              R=Resistant</p>\r\n<p>                     S=Sensitive</p>\r\n<p> </p>','2018-12-24 14:41:22',1),
(95,'1901072376184','Strepto Pyogenes','BACTERIOLOGICAL REPORT','','','Strepto Pyogenes',0.00,NULL,'2019-01-07','HVS','<p>{{Note}}</p>\r\n<p>Opinion: {{Opinion}}</p>\r\n<h1>SENSITIVITY RESULTS</h1>\r\n<table width=\"730\">\r\n<tbody>\r\n<tr>\r\n<td>Ampicillin</td>\r\n<td> {{Ampicillin}}</td>\r\n<td>Co-trimoxazole</td>\r\n<td> {{Co-trimoxazole}}</td>\r\n</tr>\r\n<tr>\r\n<td>Amoxycillin</td>\r\n<td> {{Amoxycillin}}</td>\r\n<td>Cloxacillin</td>\r\n<td> {{Cloxacillin}}</td>\r\n</tr>\r\n<tr>\r\n<td>Amoxiclav</td>\r\n<td> {{Amoxiclav}}</td>\r\n<td>Doxycycline</td>\r\n<td> {{Doxycycline}}</td>\r\n</tr>\r\n<tr>\r\n<td>Azithromycin</td>\r\n<td> {{Azithromycin}}</td>\r\n<td>Erythromycin</td>\r\n<td> {{Erythromycin}}</td>\r\n</tr>\r\n<tr>\r\n<td>Cephalexin</td>\r\n<td> {{Cephalexin}}</td>\r\n<td>Nitrofurantoin</td>\r\n<td> {{Nitrofurantoin}}</td>\r\n</tr>\r\n<tr>\r\n<td>Cephradine</td>\r\n<td> {{Cephradine}}</td>\r\n<td>Gentamicin</td>\r\n<td> {{Gentamicin}}</td>\r\n</tr>\r\n<tr>\r\n<td>Ceftriaxone</td>\r\n<td> {{Ceftriaxone}}</td>\r\n<td>Nalidixic acid</td>\r\n<td> {{Nalidixic acid}}</td>\r\n</tr>\r\n<tr>\r\n<td>Ceftazidime</td>\r\n<td> {{Ceftazidime}}</td>\r\n<td>Penicillin</td>\r\n<td> {{Penicillin}}</td>\r\n</tr>\r\n<tr>\r\n<td>Cloxacillin</td>\r\n<td> {{Cloxacillin}}</td>\r\n<td>IMipenem</td>\r\n<td> {{IMipenem}}</td>\r\n</tr>\r\n<tr>\r\n<td>Ciprofloxacin</td>\r\n<td> {{Ciprofloxacin}}</td>\r\n<td>Cefuroxime</td>\r\n<td> {{Cefuroxime}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>Key:                     R= Resistant</p>\r\n<p>                            S= Sensitive </p>','2018-12-24 14:49:28',1),
(96,'1901074927615','Staph. aureus','MICROBIOLOGY REPORT','','','Staph. aureus',0.00,NULL,'2019-01-07','Pus','<table width=\"739\">\r\n<tbody>\r\n<tr>\r\n<td>{{Note01}}</td>\r\n<td>{{Note02}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n<h2>SENSITIVITY</h2>\r\n<p> </p>\r\n<table width=\"731\">\r\n<tbody>\r\n<tr>\r\n<td>Amikacin</td>\r\n<td> {{Amikacin}}</td>\r\n<td>Cefotaxime</td>\r\n<td> {{Cefotaxime}}</td>\r\n</tr>\r\n<tr>\r\n<td>Gentamycin</td>\r\n<td> {{Gentamycin}}</td>\r\n<td>Cefuroxime</td>\r\n<td> {{Cefuroxime}}</td>\r\n</tr>\r\n<tr>\r\n<td>Norfloxacin</td>\r\n<td> {{Norfloxacin}}</td>\r\n<td>Ceftriaxone</td>\r\n<td> {{Ceftriaxone}}</td>\r\n</tr>\r\n<tr>\r\n<td>Ofloxacin</td>\r\n<td> {{Ofloxacin}}</td>\r\n<td>Cefixime</td>\r\n<td> {{Cefixime}}</td>\r\n</tr>\r\n<tr>\r\n<td>Roxythromycin</td>\r\n<td> {{Roxythromycin}}</td>\r\n<td>Doxycilline</td>\r\n<td> {{Doxycilline}}</td>\r\n</tr>\r\n<tr>\r\n<td>Amoxycillin</td>\r\n<td> {{Amoxycillin}}</td>\r\n<td>Cephradine</td>\r\n<td> {{Cephradine}}</td>\r\n</tr>\r\n<tr>\r\n<td>Cephradine</td>\r\n<td> {{Cephradine}}</td>\r\n<td>Gatifloxacin</td>\r\n<td> {{Gatifloxacin}}</td>\r\n</tr>\r\n<tr>\r\n<td>Azithromycin</td>\r\n<td> {{Azithromycin}}</td>\r\n<td>Cefadroxil</td>\r\n<td> {{Cefadroxil}}</td>\r\n</tr>\r\n<tr>\r\n<td>Augumentin</td>\r\n<td> {{Augumentin}}</td>\r\n<td>Ceftazidime</td>\r\n<td> {{Ceftazidime}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n<p>S= Sensitivity</p>\r\n<p>R= Resistance</p>','2018-12-24 15:00:37',1),
(97,'1901077842319','Gonadal Hormone','ENDOCRINOLOGY REPORT','','ESTIMATIONS ARE CARRIED OUT BY DRG EIA TECHNOLOGY','Gonadal Hormone',0.00,NULL,'2019-01-07','Blood','','2018-12-24 15:06:54',1),
(98,'1901073841092','S. Immunoglobulin (IgE)','SEROLOGICAL REPORT','','','S. Immunoglobulin (IgE)',0.00,NULL,'2019-01-07','Blood','','2018-12-24 15:10:51',1),
(99,'1901072631748','S. Bilirubin','BIOCHEMICAL ANALYSIS REPORT','','The tests are carried out by PROLYZER-RA-5010, Biochemistry Analyzer','S. Bilirubin',0.00,NULL,'2019-01-07','Blood','','2018-12-24 15:16:34',1),
(100,'1901079126578','Serum - Testosterone','IMMUNOLOGY REPORT','','Extimations are carried out by ELISA Method','Serum - Testosterone',0.00,NULL,'2019-01-07','Blood','','2018-12-24 15:23:21',1),
(101,'1901072461390','S. Phosphate (PO4)','BIOCHEMICAL ANALYSIS REPORT','','The tests are carried out by PROLYZER-RA-5010, Biochemistry Analyzer','S. Phosphate (PO4)',800.00,NULL,'2019-01-07','Blood','','2018-12-24 15:25:54',1),
(102,'1901077830921','APTT','HEMATOLOGICAL ANALYSIS REPORT','','','APTT',0.00,NULL,'2019-01-07','Blood','','2018-12-24 15:30:11',1),
(103,'1901071274086','Anti-HEV IgM','Title','','','Anti-HEV IgM',0.00,NULL,'2019-01-07','Skin for Fungus','','2018-12-24 15:34:15',1),
(104,'1901079301852','Occult Blood Test ( O. B. T )','STOOL ROUTINE EXAMINATION REPORT','','','Occult Blood Test ( O. B. T )',0.00,NULL,'2019-01-07','Stool','','2018-12-24 15:40:33',1),
(105,'1901076423078','Stool Routine Examination','STOOL ROUTINE EXAMINATION REPORT','','','Stool Routine Examination',0.00,NULL,'2019-01-07','Stool','<table border=\"1\" width=\"615\">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p><strong> PHYSICAL EXAMINATION</strong></p>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td> Consistency</td>\r\n<td> {{Consistency}}</td>\r\n</tr>\r\n<tr>\r\n<td> Colour</td>\r\n<td> {{Colour}}</td>\r\n</tr>\r\n<tr>\r\n<td> Mucus</td>\r\n<td> {{Mucus}}</td>\r\n</tr>\r\n<tr>\r\n<td> Blood</td>\r\n<td> {{Blood}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n<table border=\"1\">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p><strong> CHEMICAL EXAMINATION</strong></p>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td> Reaction</td>\r\n<td> {{Reaction}}</td>\r\n</tr>\r\n<tr>\r\n<td> Occult Blood Test ( O.B.T)</td>\r\n<td> {{Occult Blood Test ( O.B.T)}}</td>\r\n</tr>\r\n<tr>\r\n<td> Reducing Substance (R/S)</td>\r\n<td> {{Reducing Substance (R/S)}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n<table border=\"1\" width=\"668\">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p><strong> MICROSCOPIC EXAMINATION</strong></p>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td> Vegetable Cell</td>\r\n<td> {{Vegetable Cell}}</td>\r\n</tr>\r\n<tr>\r\n<td> Epithelial Cell</td>\r\n<td> {{Epithelial Cell}}</td>\r\n</tr>\r\n<tr>\r\n<td> Pus Cell</td>\r\n<td> {{Pus Cell}}</td>\r\n</tr>\r\n<tr>\r\n<td> RBS</td>\r\n<td> {{RBS}}</td>\r\n</tr>\r\n<tr>\r\n<td> Fat Globules</td>\r\n<td> {{Fat Globules}}</td>\r\n</tr>\r\n<tr>\r\n<td> Muscle Fibers</td>\r\n<td> {{Muscle Fibers}}</td>\r\n</tr>\r\n<tr>\r\n<td> Starch</td>\r\n<td> {{Starch}}</td>\r\n</tr>\r\n<tr>\r\n<td> Cysts of Giardia</td>\r\n<td> {{Cysts of Giardia}}</td>\r\n</tr>\r\n<tr>\r\n<td> E. histolytica</td>\r\n<td> {{E. histolytica}}</td>\r\n</tr>\r\n<tr>\r\n<td> E. coli</td>\r\n<td> {{E. coli}}</td>\r\n</tr>\r\n<tr>\r\n<td> Yeasts Cell</td>\r\n<td> {{Yeasts Cell}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>','2018-12-24 15:48:24',1),
(106,'1812265769423','X-Ray','X-RAY REPORT','','','X-Ray',0.00,NULL,'2018-12-26',NULL,'<p>{{X-Ray}}</p>\r\n<p> </p>\r\n<p><strong>Impression:</strong> {{Impression}}</p>\r\n<p><strong>Advice:</strong>  {{Advice}}</p>','2018-12-24 16:02:48',1),
(107,'1901076894215','Escherichia Coli','MICROBIOLOGY REPORT','','','Escherichia Coli',0.00,NULL,'2019-01-07','Urine for C/S','<p> </p>\r\n<table border=\"1\">\r\n<tbody>\r\n<tr>\r\n<td>{{Note1}}</td>\r\n<td>{{Note2}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n<table border=\"1\" width=\"773\">\r\n<tbody>\r\n<tr>\r\n<td>DRUG</td>\r\n<td>Strongly Sensitive</td>\r\n<td>Moderately Sensitive</td>\r\n<td>Weakly Sensitive</td>\r\n<td>Resistant</td>\r\n</tr>\r\n<tr>\r\n<td>Ciprofloxacin</td>\r\n<td> {{Ciprofloxacin}}</td>\r\n<td> {{Ciprofloxacin}}</td>\r\n<td> {{Ciprofloxacin}}</td>\r\n<td> {{Ciprofloxacin}}</td>\r\n</tr>\r\n<tr>\r\n<td>Cefriaxone</td>\r\n<td> {{Cefriaxone}}</td>\r\n<td> {{Cefriaxone}}</td>\r\n<td> {{Cefriaxone}}</td>\r\n<td> {{Cefriaxone}}</td>\r\n</tr>\r\n<tr>\r\n<td>Cefuroxime</td>\r\n<td> {{Cefuroxime}}</td>\r\n<td> {{Cefuroxime}}</td>\r\n<td> {{Cefuroxime}}</td>\r\n<td> {{Cefuroxime}}</td>\r\n</tr>\r\n<tr>\r\n<td>Pevmicillinum</td>\r\n<td> {{Pevmicillinum}}</td>\r\n<td> {{Pevmicillinum}}</td>\r\n<td> {{Pevmicillinum}}</td>\r\n<td> {{Pevmicillinum}}</td>\r\n</tr>\r\n<tr>\r\n<td>Nitrofurantion</td>\r\n<td> {{Nitrofurantion}}</td>\r\n<td> {{Nitrofurantion}}</td>\r\n<td> {{Nitrofurantion}}</td>\r\n<td> {{Nitrofurantion}}</td>\r\n</tr>\r\n<tr>\r\n<td>Cefixime</td>\r\n<td> {{Cefixime}}</td>\r\n<td> {{Cefixime}}</td>\r\n<td> {{Cefixime}}</td>\r\n<td> {{Cefixime}}</td>\r\n</tr>\r\n<tr>\r\n<td>Azithromycin</td>\r\n<td> {{Azithromycin}}</td>\r\n<td> {{Azithromycin}}</td>\r\n<td> {{Azithromycin}}</td>\r\n<td> {{Azithromycin}}</td>\r\n</tr>\r\n<tr>\r\n<td>Nalidixic Acid</td>\r\n<td> {{Nalidixic Acid}}</td>\r\n<td> {{Nalidixic Acid}}</td>\r\n<td> {{Nalidixic Acid}}</td>\r\n<td> {{Nalidixic Acid}}</td>\r\n</tr>\r\n<tr>\r\n<td>Co-trimoxazol</td>\r\n<td> {{Co-trimoxazol}}</td>\r\n<td> {{Co-trimoxazol}}</td>\r\n<td> {{Co-trimoxazol}}</td>\r\n<td> {{Co-trimoxazol}}</td>\r\n</tr>\r\n<tr>\r\n<td>Pefloxacin</td>\r\n<td> {{Pefloxacin}}</td>\r\n<td> {{Pefloxacin}}</td>\r\n<td> {{Pefloxacin}}</td>\r\n<td> {{Pefloxacin}}</td>\r\n</tr>\r\n<tr>\r\n<td>Gentamycine</td>\r\n<td> {{Gentamycine}}</td>\r\n<td> {{Gentamycine}}</td>\r\n<td> {{Gentamycine}}</td>\r\n<td> {{Gentamycine}}</td>\r\n</tr>\r\n<tr>\r\n<td>Amoxycillin</td>\r\n<td> {{Amoxycillin}}</td>\r\n<td> {{Amoxycillin}}</td>\r\n<td> {{Amoxycillin}}</td>\r\n<td> {{Amoxycillin}}</td>\r\n</tr>\r\n<tr>\r\n<td>Amikacin</td>\r\n<td> {{Amikacin}}</td>\r\n<td> {{Amikacin}}</td>\r\n<td> {{Amikacin}}</td>\r\n<td> {{Amikacin}}</td>\r\n</tr>\r\n<tr>\r\n<td>Ceftazidine</td>\r\n<td> {{Ceftazidine}}</td>\r\n<td> {{Ceftazidine}}</td>\r\n<td> {{Ceftazidine}}</td>\r\n<td> {{Ceftazidine}}</td>\r\n</tr>\r\n<tr>\r\n<td>Cefepime</td>\r\n<td> {{Cefepime}}</td>\r\n<td> {{Cefepime}}</td>\r\n<td> {{Cefepime}}</td>\r\n<td> {{Cefepime}}</td>\r\n</tr>\r\n<tr>\r\n<td>Colistin</td>\r\n<td> {{Colistin}}</td>\r\n<td> {{Colistin}}</td>\r\n<td> {{Colistin}}</td>\r\n<td> {{Colistin}}</td>\r\n</tr>\r\n</tbody>\r\n</table>','2018-12-25 09:55:20',1),
(108,'1812277209438','Ultrasound (Whole Abdomen)','Ultrasound Report of Whole Abdomen','','','Ultrasound (Whole Abdomen)',0.00,NULL,'2018-12-27',NULL,'<h3> Thank you for your kind and confident referral</h3>\r\n<h2>Ultrasound Report of Whole Abdomen</h2>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td>Liver</td>\r\n<td>:</td>\r\n<td> {{Liver}}</td>\r\n</tr>\r\n<tr>\r\n<td>Gall Bladder</td>\r\n<td>:</td>\r\n<td> {{Gall Bladder}}</td>\r\n</tr>\r\n<tr>\r\n<td>Billiary tree</td>\r\n<td>:</td>\r\n<td> {{Billiary tree}}</td>\r\n</tr>\r\n<tr>\r\n<td>Pancreas</td>\r\n<td>\r\n<p>:</p>\r\n</td>\r\n<td> {{Pancreas}}</td>\r\n</tr>\r\n<tr>\r\n<td>Spleen</td>\r\n<td>:</td>\r\n<td> {{Spleen}}</td>\r\n</tr>\r\n<tr>\r\n<td>Kidneys</td>\r\n<td>:</td>\r\n<td> {{Kidneys}}</td>\r\n</tr>\r\n<tr>\r\n<td>U.Bladder</td>\r\n<td>:</td>\r\n<td> {{U.Bladder}}</td>\r\n</tr>\r\n<tr>\r\n<td>Uterus</td>\r\n<td>:</td>\r\n<td> {{Uterus}}</td>\r\n</tr>\r\n<tr>\r\n<td>Adnexa</td>\r\n<td>:</td>\r\n<td> {{Adnexa}}</td>\r\n</tr>\r\n<tr>\r\n<td>Cul- de sac</td>\r\n<td>:</td>\r\n<td> {{Cul- de sac}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n<p><strong>Impression</strong> :  {{Impression}}</p>','2018-12-25 10:04:29',1),
(109,'1812278745210','Ultrasound (Pregnancy Profile)','Ultrasound Report of Pregnancy Profile','','','Ultrasound (Pregnancy Profile)',0.00,NULL,'2018-12-27',NULL,'<h3> Thanks you for your kind and confident referral</h3>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td colspan=\"3\">{{Comments}}</td>\r\n</tr>\r\n<tr>\r\n<td>Number of fetus Presentation</td>\r\n<td> :</td>\r\n<td> {{Number of fetus Presentation}}</td>\r\n</tr>\r\n<tr>\r\n<td>Fetal movement Cardiac pulsation</td>\r\n<td> :</td>\r\n<td> {{Fetal movement Cardiac pulsation}}</td>\r\n</tr>\r\n<tr>\r\n<td>Fetal biometry</td>\r\n<td> :</td>\r\n<td> {{Fetal biometry}}</td>\r\n</tr>\r\n<tr>\r\n<td>Placenta Amniotic fluid</td>\r\n<td> :</td>\r\n<td> {{Placenta Amniotic fluid}}</td>\r\n</tr>\r\n<tr>\r\n<td>EDD</td>\r\n<td> :</td>\r\n<td> {{EDD}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n<p><strong>Impression</strong>:  {{Impression}}</p>','2018-12-25 10:10:33',1),
(110,'1812288053724','Ultrasonogram','ULTRASONOGRAM REPORT','','','Ultrasonogram',0.00,NULL,'2018-12-28',NULL,'<h3> Thank you for your kind and confident referral</h3>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td>Kidneys</td>\r\n<td>:</td>\r\n<td> {{Kidneys}}</td>\r\n</tr>\r\n<tr>\r\n<td>U.Bladder</td>\r\n<td>:</td>\r\n<td> {{U.Bladder}}</td>\r\n</tr>\r\n<tr>\r\n<td>Prostate</td>\r\n<td>:</td>\r\n<td> {{Prostate}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n<p><strong>Impression:  </strong>{{Impression}}</p>','2018-12-25 10:15:09',1),
(111,'1812288901243','Ultrasonogram 1','ULTRASONOGRAM REPORT','','','Ultrasonogram 1',0.00,NULL,'2018-12-28',NULL,'<h3> Thank you for your kind and confident referral</h3>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td>U.Bladder</td>\r\n<td>:</td>\r\n<td> {{U.Bladder}}</td>\r\n</tr>\r\n<tr>\r\n<td>Uterus</td>\r\n<td>:</td>\r\n<td> {{Uterus}}</td>\r\n</tr>\r\n<tr>\r\n<td>Adnexa</td>\r\n<td>:</td>\r\n<td> {{Adnexa}}</td>\r\n</tr>\r\n<tr>\r\n<td>Cul- de dac</td>\r\n<td>:</td>\r\n<td> {{Cul- de dac}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n<p><strong>Impression:  </strong>{{Impression}}</p>','2018-12-25 10:18:10',1),
(112,'1812281304869','Ultrasonogram 2','ULTRASONOGRAM REPORT','','','Ultrasonogram 2',0.00,NULL,'2018-12-28',NULL,'<p> </p>\r\n<table width=\"745\">\r\n<tbody>\r\n<tr>\r\n<td>Liver</td>\r\n<td>:</td>\r\n<td> {{liver}}</td>\r\n</tr>\r\n<tr>\r\n<td>Gall Bladder</td>\r\n<td>\r\n<p>:</p>\r\n</td>\r\n<td> {{gall_bladder}}</td>\r\n</tr>\r\n<tr>\r\n<td>Billary tree</td>\r\n<td>:</td>\r\n<td> {{billary_tree}}</td>\r\n</tr>\r\n<tr>\r\n<td>Pancreas</td>\r\n<td>:</td>\r\n<td> {{pancreas}}</td>\r\n</tr>\r\n<tr>\r\n<td>Spleen</td>\r\n<td>:</td>\r\n<td> {{spleen}}</td>\r\n</tr>\r\n<tr>\r\n<td>Kidneys</td>\r\n<td>:</td>\r\n<td> {{kidneys}}</td>\r\n</tr>\r\n<tr>\r\n<td>U. Bladder</td>\r\n<td>:</td>\r\n<td> {{u_bladder}}</td>\r\n</tr>\r\n<tr>\r\n<td>Prostate</td>\r\n<td>:</td>\r\n<td> {{prostate}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n<p><strong>Impression: </strong>{{ impression }}<strong><br></strong></p>','2018-12-25 10:21:50',1),
(113,'1901078173654','Microscopic Examination','ROUTINE MICROSCOPIC EXAMINATION','','','Microscopic Examination',0.00,NULL,'2019-01-07','Sputum for R/E','<p> </p>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td>Pus Cells</td>\r\n<td>:</td>\r\n<td> {{Pus Cells}}</td>\r\n</tr>\r\n<tr>\r\n<td>Epithelial Cells</td>\r\n<td>:</td>\r\n<td> {{Epithelial Cells}}</td>\r\n</tr>\r\n<tr>\r\n<td>RBC</td>\r\n<td>:</td>\r\n<td> {{RBC}}</td>\r\n</tr>\r\n<tr>\r\n<td>Yeast Cells</td>\r\n<td>:</td>\r\n<td> {{Yeast Cells}}</td>\r\n</tr>\r\n</tbody>\r\n</table>','2018-12-25 10:30:56',1),
(114,'1901072678509','Microscopic Examination 01','MICROSCOPIC EXAMINATION','','','Microscopic Examination 01',0.00,NULL,'2019-01-07','Sputum for Gram Stain','<p> </p>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td>Gram Positive Cocci</td>\r\n<td>:</td>\r\n<td> {{Gram Positive Cocci}}</td>\r\n</tr>\r\n<tr>\r\n<td>Gram Negative Bacilli</td>\r\n<td>:</td>\r\n<td> {{Gram Negative Bacilli}}</td>\r\n</tr>\r\n<tr>\r\n<td>Pus Cells</td>\r\n<td>:</td>\r\n<td> {{Pus Cells}}</td>\r\n</tr>\r\n</tbody>\r\n</table>','2018-12-25 10:34:09',1),
(115,'1901079783456','Microscopic Examination 02','MICROSCOPIC EXAMINATION','','','Microscopic Examination 02',0.00,NULL,'2019-01-07','Sputum for Gram Stain','<p> </p>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td>Gram Negative Diplococci</td>\r\n<td>:</td>\r\n<td> {{Gram Negative Diplococci}}</td>\r\n</tr>\r\n<tr>\r\n<td>Pus Cells</td>\r\n<td>:</td>\r\n<td> {{Pus Cells}}</td>\r\n</tr>\r\n</tbody>\r\n</table>','2018-12-25 10:38:16',1),
(116,'1901070245798','KOH Preparation','Skin Scraping for Fungus','','','KOH Preparation',0.00,NULL,'2019-01-07','Skin Scraping for Fungus','<p><strong>KOH Preparation:</strong> {{KOH Preparation}}</p>','2018-12-25 10:41:35',1),
(117,'1901072415038','Sputum AFB','SPUTUM FOR AFB','','','Sputum AFB',0.00,NULL,'2019-01-07','Sputum','<h2><strong>SPUTUM FOR AFB </strong></h2>\r\n<p> </p>\r\n<table width=\"489\">\r\n<tbody>\r\n<tr>\r\n<td>Test</td>\r\n<td>Result</td>\r\n</tr>\r\n<tr>\r\n<td>Sputum for AFB</td>\r\n<td> {{Sputum for AFB}}</td>\r\n</tr>\r\n</tbody>\r\n</table>','2018-12-25 10:45:51',1),
(118,'1901073690281','Culture of Blood','MICROBIOLOGY REPORT','','','Culture of Blood',0.00,NULL,'2019-01-07','Blood (FAN Method)','<h2>MICROBIOLOGY REPORT</h2>\r\n<p>{{Comments}}</p>','2018-12-25 10:53:01',1),
(119,'1901078639451','Bone Marrow','Bone Marrow Report','','','Bone Marrow',0.00,NULL,'2019-01-07','Bone Marrow','<h2><strong>Bone Marrow Report</strong></h2>\r\n<p> (Morphology)</p>\r\n<table width=\"799\">\r\n<tbody>\r\n<tr>\r\n<td>Clinical History</td>\r\n<td>:</td>\r\n<td> {{Clinical History}}</td>\r\n</tr>\r\n<tr>\r\n<td>PBF finding</td>\r\n<td>:</td>\r\n<td> {{PBF finding}}</td>\r\n</tr>\r\n<tr>\r\n<td>Site of aspiration</td>\r\n<td>:</td>\r\n<td> {{Site of aspiration}}</td>\r\n</tr>\r\n<tr>\r\n<td>Stain used</td>\r\n<td>:</td>\r\n<td> {{Stain used}}</td>\r\n</tr>\r\n<tr>\r\n<td>Cellularity</td>\r\n<td>:</td>\r\n<td> {{Cellularity}}</td>\r\n</tr>\r\n<tr>\r\n<td>M:E ratio</td>\r\n<td>:</td>\r\n<td> {{M:E ratio}}</td>\r\n</tr>\r\n<tr>\r\n<td>Erythropoiesis</td>\r\n<td>:</td>\r\n<td> {{Erythropoiesis}}</td>\r\n</tr>\r\n<tr>\r\n<td>Granulopoiesis</td>\r\n<td>:</td>\r\n<td> {{Granulopoiesis}}</td>\r\n</tr>\r\n<tr>\r\n<td>Megakaryocytes</td>\r\n<td>:</td>\r\n<td> {{Megakaryocytes}}</td>\r\n</tr>\r\n<tr>\r\n<td>Lymphocytes</td>\r\n<td>:</td>\r\n<td> {{Lymphocytes}}</td>\r\n</tr>\r\n<tr>\r\n<td>Plasma Cells</td>\r\n<td>:</td>\r\n<td> {{Plasma Cells}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p><strong>Comment:  </strong>{{Comment}}</p>','2018-12-25 11:01:30',1),
(120,'1901073795281','Semen Analysis','SEMEN ANALYSIS REPORT','','','Semen Analysis',0.00,NULL,'2019-01-07','Semen','<p> </p>\r\n<table border=\"1\" width=\"800\">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p><strong> PHYSICAL EXAMINATION.</strong></p>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td> Consistency</td>\r\n<td> {{Consistency}}</td>\r\n</tr>\r\n<tr>\r\n<td> Colour</td>\r\n<td> {{Colour}}</td>\r\n</tr>\r\n<tr>\r\n<td> Odor</td>\r\n<td> {{Odor}}</td>\r\n</tr>\r\n<tr>\r\n<td> Volume</td>\r\n<td> {{Volume}}</td>\r\n</tr>\r\n<tr>\r\n<td> Collection Method</td>\r\n<td> {{Collection Method}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n<table border=\"1\" width=\"800\">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p><strong> CAEMICAL EXAMINATION.</strong></p>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td> Reaction</td>\r\n<td> {{Reaction}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n<table border=\"1\">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p><strong> MICROSCOPIC EXAMINATION.</strong></p>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td> Total count of Spermatozoa (TCS)</td>\r\n<td>:</td>\r\n<td> {{Total count of Spermatozoa (TCS)}}</td>\r\n</tr>\r\n<tr>\r\n<td> Morphology</td>\r\n<td>:</td>\r\n<td> {{Morphology}}</td>\r\n</tr>\r\n<tr>\r\n<td> Motility</td>\r\n<td>:</td>\r\n<td> {{Motility}}</td>\r\n</tr>\r\n<tr>\r\n<td> Pus Cells</td>\r\n<td>:</td>\r\n<td> {{Pus Cells}}</td>\r\n</tr>\r\n<tr>\r\n<td> Epithelial Cells</td>\r\n<td>:</td>\r\n<td> {{Epithelial Cells}}</td>\r\n</tr>\r\n<tr>\r\n<td> RBC</td>\r\n<td>:</td>\r\n<td> {{RBC}}</td>\r\n</tr>\r\n<tr>\r\n<td> Comment</td>\r\n<td>:</td>\r\n<td> {{Comment}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>','2018-12-25 11:10:39',1),
(121,'1901070964137','NS1 Antigen For Dengue 2','IMMUNOLOGICAL REPORT','','','NS1 Antigen For Dengue 2',0.00,NULL,'2019-01-07','Blood','','2018-12-25 11:24:48',1),
(122,'1812280819357','#####Empty#####','MICROBIOLOGICAL REPORT','','','#####Empty#####',0.00,NULL,'2018-12-28',NULL,'<p> </p>\r\n<table width=\"726\">\r\n<tbody>\r\n<tr>\r\n<td>{{Note_01}}</td>\r\n<td>{{Note_02}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n<p> </p>\r\n<table width=\"778\">\r\n<tbody>\r\n<tr>\r\n<td colspan=\"4\"> <strong>Anti Biogram of Organisms Isolated</strong></td>\r\n</tr>\r\n<tr>\r\n<td>Ampicillin</td>\r\n<td> {{Ampicillin}}</td>\r\n<td>Co-trimoxazole</td>\r\n<td> {{Co-trimoxazole}}</td>\r\n</tr>\r\n<tr>\r\n<td>Amoxycillin</td>\r\n<td> {{Amoxycillin}}</td>\r\n<td>Cloxacillin</td>\r\n<td> {{Cloxacillin}}</td>\r\n</tr>\r\n<tr>\r\n<td>Amoxiclav</td>\r\n<td> {{Amoxiclav}}</td>\r\n<td>Doxycycline</td>\r\n<td> {{Doxycycline}}</td>\r\n</tr>\r\n<tr>\r\n<td>Azithromycin</td>\r\n<td> {{Azithromycin}}</td>\r\n<td>Erythromycin</td>\r\n<td> {{Erythromycin}}</td>\r\n</tr>\r\n<tr>\r\n<td>Cephalexin</td>\r\n<td> {{Cephalexin}}</td>\r\n<td>Nitrofurantoin</td>\r\n<td> {{Nitrofurantoin}}</td>\r\n</tr>\r\n<tr>\r\n<td>Cephradine</td>\r\n<td> {{Cephradine}}</td>\r\n<td>Gentamicin</td>\r\n<td> {{Gentamicin}}</td>\r\n</tr>\r\n<tr>\r\n<td>Ceftriaxone</td>\r\n<td> {{Ceftriaxone}}</td>\r\n<td>Nalidixic acid</td>\r\n<td> {{Nalidixic acid}}</td>\r\n</tr>\r\n<tr>\r\n<td>Ceftazidime</td>\r\n<td> {{Ceftazidime}}</td>\r\n<td>Penicillin</td>\r\n<td> {{Penicillin}}</td>\r\n</tr>\r\n<tr>\r\n<td>Cloxacillin</td>\r\n<td> {{Cloxacillin}}</td>\r\n<td>IMipenem</td>\r\n<td> {{IMipenem}}</td>\r\n</tr>\r\n<tr>\r\n<td>Ciprofloxacin</td>\r\n<td> {{Ciprofloxacin}}</td>\r\n<td>Cefuroxime</td>\r\n<td> {{Cefuroxime}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>R= Resistant S= Sensitive I= Intermediate</p>','2018-12-25 11:27:19',1),
(123,'1901073850271','Blood Group & Rh Factor','SEROLOGICAL REPORT','','','Blood Group & Rh Factor',100.00,NULL,'2019-01-07','Blood','<p><strong>Checked By:</strong>  {{Checked By}}</p>','2018-12-25 11:51:36',1),
(124,'1812286025978','#####Empty#####','MICROBIOLOGY REPORT','','','#####Empty#####',0.00,NULL,'2018-12-28',NULL,'','2018-12-25 16:28:08',1),
(125,'1901077049361','Cytology','Cytology Report','','','Cytology',0.00,NULL,'2019-01-07','Pap\'s smear','<table>\r\n<tbody>\r\n<tr>\r\n<td>Specimen source</td>\r\n<td>:</td>\r\n<td>{{Specimen source}}</td>\r\n</tr>\r\n<tr>\r\n<td>Collection Date</td>\r\n<td>:</td>\r\n<td>{{Collection Date}}</td>\r\n</tr>\r\n<tr>\r\n<td>Last Menstrual Date</td>\r\n<td>:</td>\r\n<td>{{Last Menstrual Date}}</td>\r\n</tr>\r\n<tr>\r\n<td>Previous Gynecologic Cytology</td>\r\n<td>:</td>\r\n<td>{{Previous Gynecologic Cytology}}</td>\r\n</tr>\r\n<tr>\r\n<td>Specimen Adequacy</td>\r\n<td>:</td>\r\n<td>{{Specimen Adequacy}}</td>\r\n</tr>\r\n<tr>\r\n<td>General Categorization</td>\r\n<td>:</td>\r\n<td>{{General Categorization}}</td>\r\n</tr>\r\n<tr>\r\n<td>Interpretation</td>\r\n<td>:</td>\r\n<td>{{Interpretation}}</td>\r\n</tr>\r\n<tr>\r\n<td>Education Note/ Recommendations</td>\r\n<td>:</td>\r\n<td>{{Education Note/ Recommendations}}</td>\r\n</tr>\r\n</tbody>\r\n</table>','2018-12-26 20:06:03',1),
(126,'1901079614782','Prothombin','PROTHOMBIN TIME','','','Prothombin',0.00,NULL,'2019-01-07','Blood','<table width=\"701\">\r\n<tbody>\r\n<tr>\r\n<td>Test</td>\r\n<td> </td>\r\n<td>Result</td>\r\n</tr>\r\n<tr>\r\n<td>Patient</td>\r\n<td>:</td>\r\n<td>{{Patient}}</td>\r\n</tr>\r\n<tr>\r\n<td>Control</td>\r\n<td>:</td>\r\n<td>{{Control}}</td>\r\n</tr>\r\n<tr>\r\n<td>Ratio</td>\r\n<td>:</td>\r\n<td>{{Ratio}}</td>\r\n</tr>\r\n<tr>\r\n<td>Index</td>\r\n<td>:</td>\r\n<td>{{Index}}</td>\r\n</tr>\r\n<tr>\r\n<td>INR</td>\r\n<td>:</td>\r\n<td>{{INR}}</td>\r\n</tr>\r\n</tbody>\r\n</table>','2018-12-26 20:48:40',1),
(127,'1812278471329','Tuberculin','TUBERCULIN TEST','','','Tuberculin',0.00,NULL,'2018-12-27',NULL,'<p>{{Comments}}</p>\r\n<p>Result: {{Result}}</p>\r\n<p><strong>Impression:</strong> {{Impression}}</p>','2018-12-27 10:10:04',1),
(128,'1901078431609','Blood Film','BLOOD FILM REPORT','','','Blood Film',500.00,NULL,'2019-01-07','Blood','<p>{{Result}}</p>\r\n<p><strong>Comment:</strong> {{Comment}}</p>','2018-12-27 10:15:47',1),
(130,'1904069261735','Blood Cross Match','COMPATIBLE/ CROSS MATCH REPORT','','','Blood Cross Match',200.00,NULL,'2019-04-06','Blood','<table width=\"701\">\r\n<tbody>\r\n<tr>\r\n<td> Patient Name : {{Patient Name}}</td>\r\n<td> Patient Age : {{Patient Age}}</td>\r\n</tr>\r\n<tr>\r\n<td> Donar Name : {{Donar Name}}</td>\r\n<td> Donar Age : {{Donar Age}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n<p>Blood Group of Patient : {{Blood Group of Patient}}</p>\r\n<p>Donor Blood Group : {{Donor Blood Group}}</p>\r\n<p> </p>\r\n<p>Blood sample of the supplied Bag was Tested for :</p>\r\n<p><strong>MP : {{MP}}</strong></p>\r\n<p><strong>HBsAg : {{HBsAg}}</strong></p>\r\n<p><strong>HIV : {{HIV}}</strong></p>\r\n<p><strong>HCV : {{HCV}}</strong></p>\r\n<p><strong>VDRL: {{VDRL}}</strong></p>','2018-12-28 11:37:33',1),
(131,'1901077915483','Escherichia Coli 2','MICROBIOLOGICAL REPORT','','','Escherichia Coli 2',0.00,NULL,'2019-01-07','Urine','<table width=\"426\">\r\n<tbody>\r\n<tr>\r\n<td>{{Note1}}</td>\r\n<td>{{Note2}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n<table border=\"1\" width=\"749\">\r\n<tbody>\r\n<tr>\r\n<td colspan=\"4\"><strong>Anti Biogram of Organisms Isolated</strong></td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"4\"> </td>\r\n</tr>\r\n<tr>\r\n<td> Ciprofloxacin</td>\r\n<td> {{Ciprofloxacin}}</td>\r\n<td> Co-trimoxazole</td>\r\n<td> {{Co-trimoxazole}}</td>\r\n</tr>\r\n<tr>\r\n<td> Amoxycillin</td>\r\n<td> {{Amoxycillin}}</td>\r\n<td> Cloxacillin</td>\r\n<td> {{Cloxacillin}}</td>\r\n</tr>\r\n<tr>\r\n<td> Cefixime</td>\r\n<td> {{Cefixime}}</td>\r\n<td> Doxycycline</td>\r\n<td> {{Doxycycline}}</td>\r\n</tr>\r\n<tr>\r\n<td> Pevmicillinum</td>\r\n<td> {{Pevmicillinum}}</td>\r\n<td> Erythromycin</td>\r\n<td> {{Erythromycin}}</td>\r\n</tr>\r\n<tr>\r\n<td> Pefloxacin</td>\r\n<td> {{Pefloxacin}}</td>\r\n<td> Nitrofuration</td>\r\n<td> {{Nitrofuration}}</td>\r\n</tr>\r\n<tr>\r\n<td> Cephradine</td>\r\n<td> {{Cephradine}}</td>\r\n<td> Gentamicin</td>\r\n<td> {{Gentamicin}}</td>\r\n</tr>\r\n<tr>\r\n<td> Ceftriaxone</td>\r\n<td> {{Ceftriaxone}}</td>\r\n<td> Nalidixic acid</td>\r\n<td> {{Nalidixic acid}}</td>\r\n</tr>\r\n<tr>\r\n<td> Ceftazidime</td>\r\n<td> {{Ceftazidime}}</td>\r\n<td> Penicillin</td>\r\n<td> {{Penicillin}}</td>\r\n</tr>\r\n<tr>\r\n<td> Cloxacillin</td>\r\n<td> {{Cloxacillin}}</td>\r\n<td> IMipenem</td>\r\n<td>{{IMipenem}}</td>\r\n</tr>\r\n<tr>\r\n<td> Azithromycin</td>\r\n<td> {{Azithromycin}}</td>\r\n<td> Cefuroxime</td>\r\n<td> {{Cefuroxime}}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n<p>R = Resistant S = Sensitive I = Intermediate</p>','2018-12-28 12:15:28',1),
(132,'1901076239540','Plasma Glucose Fasting','BIOCHEMICAL ANALYSIS REPORT','','','Plasma Glucose Fasting',0.00,NULL,'2019-01-07','Blood','','2018-12-28 15:29:40',1);

/*Table structure for table `lab_reports` */

DROP TABLE IF EXISTS `lab_reports`;

CREATE TABLE `lab_reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_id` varchar(100) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `doctor_id` int(11) NOT NULL DEFAULT '0',
  `invoice_id` varchar(100) NOT NULL,
  `invoice_details_id` varchar(100) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `quantity` float NOT NULL,
  `rate` float NOT NULL,
  `total_price` float NOT NULL,
  `discount` float DEFAULT NULL,
  `tax` float DEFAULT NULL,
  `date` date DEFAULT NULL,
  `delivary_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

/*Data for the table `lab_reports` */

insert  into `lab_reports`(`id`,`report_id`,`customer_id`,`doctor_id`,`invoice_id`,`invoice_details_id`,`product_id`,`quantity`,`rate`,`total_price`,`discount`,`tax`,`date`,`delivary_date`,`status`) values 
(20,'1904061985423','190206680953',0,'17','19','1',1,500,500,0,0,'2019-04-06','2019-04-06 15:46:20',3),
(21,'1904061763024','190208197538',70,'18','20','1',1,500,500,0,0,'2019-04-06','2019-04-06 00:00:00',0),
(22,'1904060287539','190208197538',70,'18','21','130',1,200,200,0,0,'2019-04-06','2019-04-06 00:00:00',0),
(23,'1904063841027','190208197538',70,'18','22','11',1,1200,1200,0,0,'2019-04-06','2019-04-06 00:00:00',0),
(24,'1904062314860','190206609124',71,'19','23','1',1,500,500,10,0,'2019-04-06','2019-04-06 00:00:00',0),
(25,'1904067908523','190206609124',71,'19','24','123',3,100,300,20,0,'2019-04-06','2019-04-06 00:00:00',0),
(26,'1904133645871','190214093728',70,'20','25','1',1,500,500,0,0,'2019-04-13','2019-04-13 13:19:48',3),
(27,'1904134325196','190413456890',73,'21','26','1',5,500,2500,0,0,'2019-04-13','2019-04-13 00:00:00',0),
(28,'1904131054239','190413394570',73,'22','27','1',2,500,1000,50,0,'2019-04-13','2019-04-13 00:00:00',0),
(29,'1904138341752','190413394570',73,'22','28','123',3,100,300,10,0,'2019-04-13','2019-04-13 00:00:00',0),
(30,'1904131839567','190413260954',76,'23','29','1',1,500,500,0,0,'2019-04-13','2019-04-13 13:14:28',3),
(31,'1904133569827','190413260954',76,'23','30','76',1,1200,1200,0,0,'2019-04-13','2019-04-13 00:00:00',0);

/*Table structure for table `language` */

DROP TABLE IF EXISTS `language`;

CREATE TABLE `language` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `phrase` text NOT NULL,
  `english` text,
  `bangla` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=489 DEFAULT CHARSET=utf8;

/*Data for the table `language` */

insert  into `language`(`id`,`phrase`,`english`,`bangla`) values 
(1,'email','Email Address','ইমেইল '),
(2,'password','Password',''),
(3,'login','Log In',''),
(4,'incorrect_email_password','Incorrect Email/Password!','ভুল ইমেইল পাসওয়ার্ড'),
(5,'user_role','User Role','ব্যবহারকারী ভূমিকা'),
(6,'please_login','Please Log In',''),
(7,'setting','Setting',''),
(8,'profile','Profile',''),
(9,'logout','Log Out',''),
(10,'please_try_again','Please Try Again',''),
(11,'admin','Admin','অ্যাডমিন'),
(12,'doctor','Doctor','ডাক্তার '),
(13,'representative','Representative',''),
(14,'dashboard','Dashboard','পরিচালনা বোর্ড'),
(15,'department','Department',' বিভাগ'),
(16,'add_department','Add Department','বিভাগ যোগ করুন'),
(17,'department_list','Department List','বিভাগের তালিকা '),
(18,'add_doctor','Add Doctor','ডাক্তার যোগ করুন'),
(19,'doctor_list','Doctor List','ডাক্তারের তালিকা '),
(20,'add_representative','Add Representative','প্রতিনিধি যোগ করুন'),
(21,'representative_list','Representative List',''),
(22,'patient','Patient',''),
(23,'add_patient','Add Patient','রোগী যোগ করুন'),
(24,'patient_list','Patient List',''),
(25,'schedule','Schedule',''),
(26,'add_schedule','Add Schedule','সময়সূচী যোগ করুন'),
(27,'schedule_list','Schedule List',''),
(28,'appointment','Appointment','অ্যাপয়েন্টমেন্ট'),
(29,'add_appointment','Add Appointment','অ্যাপয়েন্টমেন্ট যোগ করুন'),
(30,'appointment_list','Appointment List','অ্যাপয়েন্টমেন্টের তালিকা'),
(31,'enquiry','Enquiry','অনুসন্ধান'),
(32,'language_setting','Language Setting','ভাষার সেটিংস '),
(33,'appointment_report','Appointment Report','অ্যাপয়েন্টমেন্টের প্রতিবেদন '),
(34,'assign_by_all','Assign by All','সকলের দ্বারা বরাদ্দকৃত '),
(35,'assign_by_doctor','Assign by Doctor','ডাক্তার কতৃক বরাদ্দকৃত '),
(36,'assign_to_doctor','Assign to Doctor','ডাক্তারের প্রতি বরাদ্দকৃত '),
(37,'assign_by_representative','Assign by Representative','প্রতিনিধী কতৃক বরাদ্দকৃত '),
(38,'report','Report',''),
(39,'assign_by_me','Assign by Me','আমার দ্বারা বরাদ্দকৃত '),
(40,'assign_to_me','Assign to Me','আমার প্রতি বরাদ্দকৃত '),
(41,'website','Website','ওয়েবসাইট'),
(42,'slider','Slider',''),
(43,'section','Section',''),
(44,'section_item','Section Item',''),
(45,'comments','Comment','মন্তব্য '),
(46,'latest_enquiry','Latest Enquiry','সর্বশেষ তদন্ত'),
(47,'total_progress','Total Progress',''),
(48,'last_year_status','Showing status from the last year',' গত বছর অবস্থান '),
(49,'department_name','Department Name','বিভাগের নাম '),
(50,'description','Description','বিবরণ'),
(51,'status','Status',''),
(52,'active','Active','সক্রিয়'),
(53,'inactive','Inactive','নিষ্ক্রিয়'),
(54,'cancel','Cancel','বাতিল'),
(55,'save','Save','যোগ করুন'),
(56,'serial','SL.NO',''),
(57,'action','Action','কর্ম'),
(58,'edit','Edit ','সম্পাদন '),
(59,'delete','Delete','মুছে ফেলা'),
(60,'save_successfully','Save Successfully!','সফলভাবে আপডেট হয়েছে!!'),
(61,'update_successfully','Update Successfully!',''),
(62,'department_edit','Department Edit','বিভাগ সম্পাদনা'),
(63,'delete_successfully','Delete successfully!','সফলভাবে মুছে ফেলা হয়েছে'),
(64,'are_you_sure','Are You Sure ? ','তুমি কি নিশ্চিত'),
(65,'first_name','First Name','নামের প্রথম অংশ'),
(66,'last_name','Last Name',' নামের শেষাংশ'),
(67,'phone','Phone No',''),
(68,'mobile','Mobile No',''),
(69,'blood_group','Blood Group','রক্তের গ্রুপ'),
(70,'sex','Sex',''),
(71,'date_of_birth','Date of Birth','জন্ম তারিখ '),
(72,'address','Address','ঠিকানা'),
(73,'invalid_picture','Invalid Picture',''),
(74,'doctor_profile','Doctor Profile','ডাক্তারের জীবন বৃত্তান্ত'),
(75,'edit_profile','Edit Profile',' জীবন বৃত্তান্ত সম্পাদনা'),
(76,'edit_doctor','Edit Doctor',' ডাক্তার সম্পাদন'),
(77,'designation','Designation','পদবি '),
(78,'short_biography','Short Biography',''),
(79,'picture','Picture',''),
(80,'specialist','Specialist',''),
(81,'male','Male',''),
(82,'female','Female','মহিলা'),
(83,'education_degree','Education/Degree','শিক্ষাগত যোগ্যতা '),
(84,'create_date','Create Date','তারিখ তৈরি '),
(85,'view','View','দেখা '),
(86,'doctor_information','Doctor Information','ডাক্তারের তথ্য'),
(87,'update_date','Update Date',''),
(88,'print','Print',''),
(89,'representative_edit','Representative Edit',''),
(90,'patient_information','Patient Information',''),
(91,'other','Other',''),
(92,'patient_id','Patient ID',''),
(93,'age','Age','বয়স '),
(94,'patient_edit','Patient Edit',''),
(95,'id_no','ID No.',' আইডি নং '),
(96,'select_option','Select Option',''),
(97,'doctor_name','Doctor Name','ডাক্তারের নাম '),
(98,'day','Day','দিন '),
(99,'start_time','Start Time',''),
(100,'end_time','End Time','সমাপ্তির সময় '),
(101,'per_patient_time','Per Patient Time',''),
(102,'serial_visibility_type','Serial Visibility',''),
(103,'sequential','Sequential',''),
(104,'timestamp','Timestamp',''),
(105,'available_days','Available Days','সহজলভ্য দিন '),
(106,'schedule_edit','Schedule Edit',''),
(107,'available_time','Available Time','সহজলভ্য সময়'),
(108,'serial_no','Serial No',''),
(109,'problem','Problem',''),
(110,'appointment_date','Appointment Date','অ্যাপয়েন্টমেন্টের তারিখ '),
(111,'you_are_already_registered','You Are Already Registered','আপনি ইতোমধ্যে নিবন্ধিত'),
(112,'invalid_patient_id','Invalid patient ID','রোগীর আইদ'),
(113,'invalid_input','Invalid Input','তথ্য প্রদান করা নেই '),
(114,'no_doctor_available','No Doctor Available',''),
(115,'invalid_department','Invalid Department!','বিভাগ নেই '),
(116,'no_schedule_available','No Schedule Available',''),
(117,'please_fillup_all_required_fields','Please fillup all required filelds',''),
(118,'appointment_id','Appointment ID','অ্যাপয়েন্টমেন্ট আইডি'),
(119,'schedule_time','Schedule Time',''),
(120,'appointment_information','Appointment Information','অ্যাপয়েন্টমেন্টের তথ্য'),
(121,'full_name','Full Name','পূর্ন নাম '),
(122,'read_unread','Read / Unread',''),
(123,'date','Date','তারিখ '),
(124,'ip_address','IP Address','আইপি ঠিকানা'),
(125,'user_agent','User Agent','ব্যবহারিক দূত'),
(126,'checked_by','Checked By','যার দ্বারা দেখা '),
(127,'enquiry_date','Enquirey Date','অনুসন্ধানের তারিখ '),
(128,'enquiry_list','Enquiry List','অনুসন্ধানের তালিকা '),
(129,'filter','Filter','ছাঁকনি'),
(130,'start_date','Start Date',''),
(131,'end_date','End Date','সমাপ্তির তারিখ'),
(132,'application_title','Application Title','আবেদনের শিরোনাম'),
(133,'favicon','Favicon','ফেভিকন'),
(134,'logo','Logo',''),
(135,'footer_text','Footer Text','পাদচরণ'),
(136,'language','Language','ভাষা '),
(137,'appointment_assign_by_all','Appointment Assign by All','সবার দ্বারা বরাদ্দকৃত অ্যাপয়েন্টমেন্ট'),
(138,'appointment_assign_by_doctor','Appointment Assign by Doctor','ডাক্তার দ্বারা বরাদ্দকৃত অ্যাপয়েন্টমেন্ট'),
(139,'appointment_assign_by_representative','Appointment Assign by Representative','প্রতিনিধী দ্বারা বরাদ্দকৃত অ্যাপয়েন্টমেন্ট'),
(140,'appointment_assign_to_all_doctor','Appointment Assign to All Doctor','সকল ডাক্তারের প্রতি বরাদ্দকৃত অ্যাপয়েন্টমেন্ট'),
(141,'appointment_assign_to_me','Appointment Assign to Me','আমার প্রতি বরাদ্দকৃত অ্যাপয়েন্টমেন্ট'),
(142,'appointment_assign_by_me','Appointment Assign by Me','আমার দ্বারা বরাদ্দকৃত অ্যাপয়েন্টমেন্ট'),
(143,'type','Type',''),
(144,'website_title','Website Title',' ওয়েবসাইট শিরোনাম'),
(145,'invalid_logo','Invalid Logo','লোগো নেই '),
(146,'details','Details','বিস্তারিত '),
(147,'website_setting','Website Setting','ওয়েবসাইট সেটিং'),
(148,'submit_successfully','Submit Successfully!',''),
(149,'application_setting','Application Setting','অ্যাপ্লিকেশন সেটিং'),
(150,'invalid_favicon','Invalid Favicon','ফেভিকন নেই '),
(151,'new_enquiry','New Enquiry',''),
(152,'information','Information','তথ্য '),
(153,'home','Home','বাড়ি'),
(154,'select_department','Select Department',''),
(155,'select_doctor','Select Doctor',''),
(156,'select_representative','Select Representative',''),
(157,'post_id','Post ID',''),
(158,'thank_you_for_your_comment','Thank you for your comment!',''),
(159,'comment_id','Comment ID',' মন্তব্য আইডি'),
(160,'comment_status','Comment Status','মন্তব্যের অবস্থা'),
(161,'comment_added_successfully','Comment Added Successfully','মন্তব্য সফলভাবে যোগ করা হয়েছে'),
(162,'comment_remove_successfully','Comment Remove Successfully','মন্তব্য সফলভাবে মুছে ফেলা হয়েছে'),
(163,'select_item','Section Item',''),
(164,'add_item','Add Item','আইটেম যোগ করুন'),
(165,'menu_name','Menu Name',''),
(166,'title','Title',''),
(167,'position','Position',''),
(168,'invalid_icon_image','Invalid Icon Image!',' আইকন চিত্র নেই '),
(169,'about','About','সম্পর্কে'),
(170,'blog','Blog','ব্লগ'),
(171,'service','Service',''),
(172,'item_edit','Item Edit',' আইটেম সম্পাদন'),
(173,'registration_successfully','Registration Successfully',''),
(174,'add_section','Add Section','বিভাগ যোগ করুন'),
(175,'section_name','Section Name',''),
(176,'invalid_featured_image','Invalid Featured Image!','বৈশিষ্ট্যযুক্ত_ চিত্র নেই '),
(177,'section_edit','Section Edit',''),
(178,'meta_description','Meta Description',''),
(179,'twitter_api','Twitter Api',''),
(180,'google_map','Google Map','গুগোল মানচিত্র '),
(181,'copyright_text','Copyright Text',' কপিরাইট টেক্সট'),
(182,'facebook_url','Facebook URL','ফেসবুক ইউআরএল '),
(183,'twitter_url','Twitter URL',''),
(184,'vimeo_url','Vimeo URL','Vimeo ইউআরএল'),
(185,'instagram_url','Instagram Url','ইনাষ্টাগ্রাম ইউআরএল'),
(186,'dribbble_url','Dribbble URL','ড্রিবল ইউআরএল'),
(187,'skype_url','Skype URL',''),
(188,'add_slider','Add Slider','স্লাইডার যোগ করুন'),
(189,'subtitle','Sub Title',''),
(190,'slide_position','Slide Position',''),
(191,'invalid_image','Invalid Image','ছবি নেই '),
(192,'image_is_required','Image is required','ছবি প্রয়োজন'),
(193,'slider_edit','Slider Edit',''),
(194,'meta_keyword','Meta Keyword',''),
(195,'year','Year','বছর'),
(196,'month','Month',''),
(197,'recent_post','Recent Post',''),
(198,'leave_a_comment','Leave a Comment',''),
(199,'submit','Submit',''),
(200,'google_plus_url','Google Plus URL','গুগল প্লাস ইউআরএল'),
(201,'website_status','Website Status',' ওয়েবসাইট অবস্থা'),
(202,'new_slide','New Slide',''),
(203,'new_section','New Section',''),
(204,'subtitle_description','Sub Title / Description',''),
(205,'featured_image','Featured Image','বৈশিষ্ট্যযুক্ত ইমেজ'),
(206,'new_item','New Item',''),
(207,'item_position','Item Position',' আইটেমের অবস্থান'),
(208,'icon_image','Icon Image','আইকন চিত্র'),
(209,'post_title','Post Title',''),
(210,'add_to_website','Add to Website','ওয়েবসাইটে যোগ করুন'),
(211,'read_more','Read More',''),
(212,'registration','Registration',''),
(213,'appointment_form','Appointment Form','অ্যাপয়েন্টমেন্ট ফর্ম'),
(214,'contact','Contact','যোগাযোগ'),
(215,'optional','Optional',''),
(216,'customer_comments','Customer Comments','গ্রাহকের মন্তব্য'),
(217,'need_a_doctor_for_checkup','Need a Doctor for Check-up?',''),
(218,'just_make_an_appointment_and_you_are_done','JUST MAKE AN APPOINTMENT & YOU\'RE DONE ! ',' শুধু একটি জাস্খাতকার করা এবং আপনি সম্পন্ন করেছেন '),
(219,'get_an_appointment','Get an appointment',' একটি সাক্ষাৎকার পেতে'),
(220,'latest_news','Latest News','সর্বশাষ সংবাদ '),
(221,'latest_tweet','Latest Tweet','সর্বশাষ টুইট '),
(222,'menu','Menu',''),
(223,'select_user_role','Select User Role',''),
(224,'site_align','Website Align',''),
(225,'right_to_left','Right to Left',''),
(226,'left_to_right','Left to Right',''),
(227,'account_manager','Account Manager','একাউন্ট ম্যানেজার'),
(228,'add_invoice','Add Invoice','চালান যোগ করুন'),
(229,'invoice_list','Invoice List','চালান সম্পাদনের তালিকা '),
(230,'account_list','Account List','অ্যাকাউন্টের তালিকা'),
(231,'add_account','Add Account','হিসাব যোগ করা'),
(232,'account_name','Account Name','হিসাবের নাম'),
(233,'credit','Credit','বাকি '),
(234,'debit','Debit','আয় '),
(235,'account_edit','Account Edit','অ্যাকাউন্ট সম্পাদনা'),
(236,'quantity','Quantity',''),
(237,'price','Price',''),
(238,'total','Total',''),
(239,'remove','Remove',''),
(240,'add','Add','যোগ করুন'),
(241,'subtotal','Sub Total',''),
(242,'vat','Vat','ভ্যাট '),
(243,'grand_total','Grand Total','সর্বমোট'),
(244,'discount','Discount','মূল্য ছাড় '),
(245,'paid','Paid',''),
(246,'due','Due','বাকি '),
(247,'reset','Reset',''),
(248,'add_or_remove','Add / Remove','যোগ অথবা অপসারণ'),
(249,'invoice','Invoice','চালান'),
(250,'invoice_information','Invoice Information',' চালান সম্পর্কিত তথ্য'),
(251,'invoice_edit','Invoice Edit','চালান সম্পাদন'),
(252,'update','Update',''),
(253,'all','All','সব '),
(254,'patient_wise','Patient Wise',''),
(255,'account_wise','Account Wise','অ্যাকাউন্ট অনুযায়ী'),
(256,'debit_report','Debit Report','আয়ের প্রতিবেদন '),
(257,'credit_report','Credit Report','বাকির রিপোর্ট'),
(258,'payment_list','Payment List',''),
(259,'add_payment','Add Payment','পেমেন্ট যোগ করুন'),
(260,'payment_edit','Payment Edit',''),
(261,'pay_to','Pay To',''),
(262,'amount','Amount','পরিমাণ'),
(263,'bed_type','Bed Type','বিছানার ধরন '),
(264,'bed_limit','Bed Capacity','বিছানার সীমা'),
(265,'charge','Charge','চার্জ'),
(266,'bed_list','Bed List','বিছানার তালিকা'),
(267,'add_bed','Add Bed','বিছানা যোগ করুন'),
(268,'bed_manager','Bed Manager','বিছানা ম্যানেজার'),
(269,'bed_edit','Bed Edit','বিছানা সম্পাদন'),
(270,'bed_assign','Bed Assign','বিছানা বরাদ্দ'),
(271,'assign_date','Assign Date','তারিখ নির্ধারণ'),
(272,'discharge_date','Discharge Date','অপসারনের তারিখ '),
(273,'bed_assign_list','Bed Assign List','বিছানা বরাদ্দের তালিকা '),
(274,'assign_by','Assign By','যার দ্বারা বরাদ্দকৃত '),
(275,'bed_available','Bed is Available','সহজলভ্য বিছানা '),
(276,'bed_not_available','Bed is Not Available','বিছানা খালি নেই'),
(277,'invlid_input','Invalid Input',' ভুল ইনপুট'),
(278,'allocated','Allocated','বরাদ্দ'),
(279,'free_now','Free','এখন বিনামূল্যে'),
(280,'select_only_avaiable_days','Select Only Avaiable Days',''),
(281,'human_resources','Human Resources',' মানব সম্পদ'),
(282,'nurse_list','Nurse List',''),
(283,'add_employee','Add Employee','কর্মচারী যোগ করুন'),
(284,'user_type','User Type',' ব্যবহারকারীর ধরন'),
(285,'employee_information','Employee Information',' কর্মচারীর তথ্য '),
(286,'employee_edit','Edit Employee','কর্মচারী সম্পাদন'),
(287,'laboratorist_list','Laboratorist List','ল্যাবরেটরিস্ট এর তালিকা '),
(288,'accountant_list','Accountant List','অ্যাকাউন্টেন্টদের তালিকা'),
(289,'receptionist_list','Receptionist List',''),
(290,'pharmacist_list','Pharmacist List',''),
(291,'nurse','Nurse',''),
(292,'laboratorist','Laboratorist','ল্যাবে কাজ করে এ যেকল কর্মি'),
(293,'pharmacist','Pharmacist',''),
(294,'accountant','Accountant','অ্যাকাউন্টেন্ট'),
(295,'receptionist','Receptionist',''),
(296,'noticeboard','Noticeboard',''),
(297,'notice_list','Notice List',''),
(298,'add_notice','Add Notice','নোটিশ যোগ করুন'),
(299,'hospital_activities','Hospital Activities','হাসপাতাল কার্যক্রম'),
(300,'death_report','Death Report','মৃত্যুর প্রতিবেদন '),
(301,'add_death_report','Add Death Report','মৃত্যু রিপোর্ট যোগ করুন'),
(302,'death_report_edit','Death Report Edit','মৃত্যুর প্রতিবেদন সম্পাদন '),
(303,'birth_report','Birth Report','জন্ম রিপোর্ট'),
(304,'birth_report_edit','Birth Report Edit','জন্ম রিপোর্ট সম্পাদন'),
(305,'add_birth_report','Add Birth Report','জন্ম রিপোর্ট যোগ করুন'),
(306,'add_operation_report','Add Operation Report','অপারেশন রিপোর্ট যোগ করুন'),
(307,'operation_report','Operation Report',''),
(308,'investigation_report','Investigation Report',' তদন্ত প্রতিবেদন'),
(309,'add_investigation_report','Add Investigation Report','তদন্ত রিপোর্ট যোগ করুন'),
(310,'add_medicine_category','Add Medicine Category','ঔষধের বিভাগ যোগ করুন'),
(311,'medicine_category_list','Medicine Category List',''),
(312,'category_name','Category Name',' বিভাগের নাম'),
(313,'medicine_category_edit','Medicine Category Edit',''),
(314,'add_medicine','Add Medicine','ঔষধ যোগ করুন'),
(315,'medicine_list','Medicine List',''),
(316,'medicine_edit','Medicine Edit',''),
(317,'manufactured_by','Manufactured By',''),
(318,'medicine_name','Medicine Name',''),
(319,'messages','Messages',''),
(320,'inbox','Inbox','ইনবক্স'),
(321,'sent','Sent',''),
(322,'new_message','New Message',''),
(323,'sender','Sender Name',''),
(324,'message','Message',''),
(325,'subject','Subject',''),
(326,'receiver_name','Send To',''),
(327,'select_user','Select User',''),
(328,'message_sent','Messages Sent',''),
(329,'mail','Mail',''),
(330,'send_mail','Send Mail',''),
(331,'mail_setting','Mail Setting',''),
(332,'protocol','Protocol',''),
(333,'mailpath','Mail Path',''),
(334,'mailtype','Mail Type',''),
(335,'validate_email','Validate Email Address',' ইমেল যাচাই'),
(336,'true','True',''),
(337,'false','False','মিথ্যা'),
(338,'attach_file','Attach File','ফাইল সংযুক্ত'),
(339,'wordwrap','Enable Word Wrap','শব্দ মোড়ানো'),
(340,'send','Send',''),
(341,'upload_successfully','Upload Successfully!','সফলভাবে আপলোড হয়েছে'),
(342,'app_setting','App Setting','অ্যাপ্লিকেশন সেটিং'),
(343,'case_manager','Case Manager','মামলা ব্যাবস্থাপক'),
(344,'patient_status','Patient Status',''),
(345,'patient_status_edit','Edit Patient Status',''),
(346,'add_patient_status','Add Patient Status','রোগীর অবস্থা যোগ করুন'),
(347,'add_new_status','Add New Status','নতুন অবস্থা যোগ করুন'),
(348,'case_manager_list','Case Manager List','মামলা ব্যাবস্থাপকের তালিকা'),
(349,'hospital_address','Hospital Address','হাসপাতালের ঠিকানা '),
(350,'ref_doctor_name','Ref. Doctor Name',''),
(351,'hospital_name','Hospital Name','হাসপাতালের নাম '),
(352,'patient_name','Patient  Name',''),
(353,'document_list','Document List','নথিপত্রের তালিকা '),
(354,'add_document','Add Document','নথি যোগ করুন'),
(355,'upload_by','Upload By','যার দ্বারা আপলোডকৃত'),
(356,'documents','Documents','নথিপত্র '),
(357,'prescription','Prescription',''),
(358,'add_prescription','Add Prescription','প্রেসক্রিপশন যোগ করুন'),
(359,'prescription_list','Prescription List',''),
(360,'add_insurance','Add Insurance','বীমা যোগ করুন'),
(361,'insurance_list','Insurance List','বীমার তালিকা '),
(362,'insurance_name','Insurance Name','বীমার নাম '),
(366,'add_patient_case_study','Add Patient Case Study','রোগীর ক্ষেত্রে অধ্যয়ন যোগ করুন'),
(367,'patient_case_study_list','Patient Case Study List',''),
(368,'food_allergies','Food Allergies',' খাবারে এ্যালার্জী'),
(369,'tendency_bleed','Tendency Bleed',''),
(370,'heart_disease','Heart Disease',' হৃদরোগ'),
(371,'high_blood_pressure','High Blood Pressure','উচ্চ্ রক্তচাপ'),
(372,'diabetic','Diabetic','ডায়াবেটিক'),
(373,'surgery','Surgery',''),
(374,'accident','Accident','দুর্ঘটনা'),
(375,'others','Others',''),
(376,'family_medical_history','Family Medical History',' পারিবারিক চিকিৎসার ইতিহাস'),
(377,'current_medication','Current Medication','বর্তমান ঔষধ'),
(378,'female_pregnancy','Female Pregnancy','মহিলা গর্ভাবস্থা'),
(379,'breast_feeding','Breast Feeding','স্তন্যপান করানো'),
(380,'health_insurance','Health Insurance',' স্বাস্থ্য বীমা'),
(381,'low_income','Low Income',''),
(382,'reference','Reference',''),
(385,'instruction','Instruction',' নির্দেশ'),
(386,'medicine_type','Medicine Type',''),
(387,'days','Days','দিনগুলো '),
(388,'weight','Weight',' ওজন'),
(389,'blood_pressure','Blood Pressure','রক্তচাপ'),
(390,'old','Old',''),
(391,'new','New',''),
(392,'case_study','Case Study','কেস স্টাডি'),
(393,'chief_complain','Chief Complain','প্রধান অভিযোগ'),
(394,'patient_notes','Patient Notes',''),
(395,'visiting_fees','Visiting Fees',' পরিদর্শন ফি'),
(396,'diagnosis','Diagnosis','রোগ নির্ণয়'),
(397,'prescription_id','Prescription ID',''),
(398,'name','Name',''),
(399,'prescription_information','Prescription Information',''),
(400,'sms','SMS',''),
(401,'gateway_setting','Gateway Setting','বহির্গমন সেটিং'),
(402,'time_zone','Time Zone',''),
(403,'username','User Name','ব্যবহারকারীর নাম'),
(404,'provider','Provider',''),
(405,'sms_template','SMS Template',''),
(406,'template_name','Template Name',''),
(407,'sms_schedule','SMS Schedule',''),
(408,'schedule_name','Schedule Name',''),
(409,'time','Time',''),
(410,'already_exists','Already Exists','আগে থেকেই আছে'),
(411,'send_custom_sms','Send Custom SMS',''),
(412,'sms_sent','SMS Sent!',''),
(413,'custom_sms_list','Custom SMS List','কাস্টম এসএমএস তালিকা'),
(414,'reciver','Reciver',''),
(415,'auto_sms_report','Auto SMS Report','স্বয়ংক্রিয় এসএমএস রিপোর্ট'),
(417,'user_sms_list','User SMS List','এসএমএস ব্যবহারকারী তালিকা'),
(418,'send_sms','Send SMS',''),
(419,'new_sms','New SMS',''),
(420,'sms_list','SMS List',''),
(421,'insurance','Insurance','বীমা '),
(422,'add_limit_approval','Add Limit Approval','অনুমোদন  সীমা যোগ করুন'),
(423,'limit_approval_list','Limit Approval List',''),
(424,'service_tax','Service Tax',''),
(425,'remark','Remark',''),
(426,'insurance_no','Insurance No.','বীমার নং '),
(427,'insurance_code','Insurance Code','বীমা কোড '),
(428,'hospital_rate','Hospital Rate','হাসপাতালের হার'),
(429,'insurance_rate','Insurance Rate','বীমার হার '),
(430,'disease_charge','Disease Charge','রোগের মূল্য '),
(431,'disease_name','Disease Name','রোগের নাম '),
(432,'room_no','Room No',''),
(433,'disease_details','Disease Details','রোগের বর্ননা '),
(434,'consultant_name','Consultant Name','পরামর্শদাতা নাম'),
(435,'policy_name','Policy Name',''),
(436,'policy_no','Policy No.',''),
(437,'policy_holder_name','Policy Holder Name',''),
(438,'approval_breakup',' Approval Charge Break up','অনুমোদন বিরতি'),
(439,'limit_approval','Limit Approval',''),
(440,'insurance_limit_approval','Insurance Limit Approval','বীমার সীমা অনুমোদন'),
(441,'billing','Billing','বিলিং'),
(442,'add_admission','Add Patient Admission','ভর্তি যোগ করুন'),
(443,'add_service','Add Service','সেবা যোগ করুন'),
(444,'service_list','Service List',''),
(445,'service_name','Service Name',''),
(446,'add_package','Add Package','প্যাকেজ যোগ করুন'),
(447,'package_list','Package List',''),
(448,'package_name','Package Name',''),
(449,'package_details','Package Details',''),
(450,'edit_package','Edit Package','প্যাকেজ সম্পাদন '),
(451,'admission_date','Admission Date','ভর্তির তারিখ'),
(452,'guardian_name','Guardian Name','অভিভাবকের নাম '),
(453,'agent_name','Agent Name','এজেন্টের নাম'),
(454,'guardian_relation','Guardian Relation','অভিভাবকের সাথে সম্পর্ক '),
(455,'guardian_contact','Guardian Contact','অভিভাবক যোগাযোগ'),
(456,'guardian_address','Guardian Address','অভিভাবক ঠিকানা'),
(457,'admission_list','Patient Admission List','ভর্তি তালিকা'),
(458,'admission_id','AID','ভর্তি আইডি'),
(459,'edit_admission','Edit Admission','ভর্তি সম্পাদন'),
(460,'add_advance','Add Advance Payment','আগাম যোগ করুন'),
(461,'advance_list','Advance Payment List','আগাম তালিকা'),
(462,'receipt_no','Receipt No',''),
(463,'cash_card_or_cheque','Cash / Card / Cheque',' নগদ কার্ড বা চেক'),
(464,'payment_method','Payment Method',''),
(465,'add_bill','Add Bill','বিল যোগ করুন'),
(466,'bill_list','Bill List','বিলের তালিকা'),
(467,'bill_date','Bill Date','বিলের তারিখ'),
(468,'total_days','Total Days',''),
(469,'advance_payment','Advance Payment','অগ্রিম পেমেন্ট'),
(470,'cash','Cash','নগদ'),
(471,'card','Card','কার্ড'),
(472,'cheque','Cheque','চেক '),
(473,'card_cheque_no','Card / Cheque No.',' কার্ড বা চেক না'),
(474,'receipt','Receipt',''),
(475,'tax','Tax',''),
(476,'pay_advance','Pay Advance',''),
(477,'payable','Payable',''),
(478,'notes','Notes',''),
(479,'rate','Rate',''),
(480,'bill_id','Bill ID.','বিলের আইডি'),
(481,'paid','Paid',''),
(482,'unpaid','Unpaid',''),
(483,'bill_details','Bill Details','বিলের বিবরণ'),
(484,'signature','Signature',''),
(485,'update_bill','Update Bill',''),
(486,'add_discharge_bill','Add Discharge Bill','নির্গমন বিল যোগ'),
(487,'discharge_bill_list','Discharge Bill list','অপসারন বিল তালিকা'),
(488,'employement_type','Employement Type',NULL);

/*Table structure for table `mail_setting` */

DROP TABLE IF EXISTS `mail_setting`;

CREATE TABLE `mail_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `protocol` varchar(20) NOT NULL,
  `mailpath` varchar(255) NOT NULL,
  `mailtype` varchar(20) NOT NULL,
  `validate_email` varchar(20) NOT NULL,
  `wordwrap` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `mail_setting` */

/*Table structure for table `manufacturer_information` */

DROP TABLE IF EXISTS `manufacturer_information`;

CREATE TABLE `manufacturer_information` (
  `manufacturer_id` varchar(100) NOT NULL,
  `manufacturer_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `details` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`manufacturer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `manufacturer_information` */

/*Table structure for table `manufacturer_ledger` */

DROP TABLE IF EXISTS `manufacturer_ledger`;

CREATE TABLE `manufacturer_ledger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(100) NOT NULL,
  `manufacturer_id` varchar(100) NOT NULL,
  `chalan_no` varchar(100) DEFAULT NULL,
  `deposit_no` varchar(50) DEFAULT NULL,
  `amount` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `cheque_no` varchar(255) NOT NULL,
  `date` varchar(50) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `receipt_no` (`deposit_no`),
  KEY `receipt_no_2` (`deposit_no`),
  KEY `receipt_no_3` (`deposit_no`),
  KEY `receipt_no_4` (`deposit_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `manufacturer_ledger` */

/*Table structure for table `medicine_categories` */

DROP TABLE IF EXISTS `medicine_categories`;

CREATE TABLE `medicine_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` varchar(60) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_id_unique` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `medicine_categories` */

/*Table structure for table `medicine_purchase` */

DROP TABLE IF EXISTS `medicine_purchase`;

CREATE TABLE `medicine_purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_id` varchar(100) NOT NULL,
  `chalan_no` varchar(100) NOT NULL,
  `manufacturer_id` varchar(100) NOT NULL,
  `grand_total_amount` float NOT NULL,
  `total_discount` float DEFAULT NULL,
  `purchase_date` varchar(50) NOT NULL,
  `purchase_details` text NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `medicine_purchase` */

/*Table structure for table `medicine_purchase_details` */

DROP TABLE IF EXISTS `medicine_purchase_details`;

CREATE TABLE `medicine_purchase_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_detail_id` varchar(100) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `quantity` float NOT NULL,
  `rate` float NOT NULL,
  `total_amount` float NOT NULL,
  `discount` float DEFAULT NULL,
  `batch_id` varchar(25) NOT NULL,
  `expeire_date` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

/*Data for the table `medicine_purchase_details` */

/*Table structure for table `medicine_return` */

DROP TABLE IF EXISTS `medicine_return`;

CREATE TABLE `medicine_return` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `return_id` varchar(30) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `invoice_id` varchar(20) NOT NULL,
  `purchase_id` varchar(30) DEFAULT NULL,
  `date_purchase` varchar(20) NOT NULL,
  `date_return` varchar(30) NOT NULL,
  `byy_qty` float NOT NULL,
  `ret_qty` float NOT NULL,
  `customer_id` varchar(20) NOT NULL,
  `manufacturer_id` varchar(30) NOT NULL,
  `product_rate` float NOT NULL,
  `deduction` float NOT NULL,
  `total_deduct` float NOT NULL,
  `total_tax` float NOT NULL,
  `total_ret_amount` float NOT NULL,
  `net_total_amount` float NOT NULL,
  `reason` text NOT NULL,
  `usablity` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `medicine_return` */

/*Table structure for table `medicine_types` */

DROP TABLE IF EXISTS `medicine_types`;

CREATE TABLE `medicine_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `medicine_types` */

/*Table structure for table `medicines` */

DROP TABLE IF EXISTS `medicines`;

CREATE TABLE `medicines` (
  `id` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `generic_name` varchar(50) NOT NULL,
  `box_size` varchar(30) NOT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `product_location` varchar(50) NOT NULL,
  `product_details` varchar(250) DEFAULT NULL,
  `category_id` varchar(50) NOT NULL,
  `type_id` varchar(50) NOT NULL,
  `manufacturer_id` varchar(50) NOT NULL,
  `price` float(9,2) NOT NULL,
  `buy_price` float(9,2) NOT NULL,
  `tax` varchar(20) DEFAULT NULL,
  `image` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `medicines` */

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL,
  `sender_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=unseen, 1=seen, 2=delete',
  `receiver_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=unseen, 1=seen, 2=delete',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `message` */

insert  into `message`(`id`,`sender_id`,`receiver_id`,`subject`,`message`,`datetime`,`sender_status`,`receiver_status`) values 
(1,59,72,'test','<p xss=removed>hello mr. x. this is for test message.</p>','2019-04-05 10:37:51',1,0);

/*Table structure for table `notice` */

DROP TABLE IF EXISTS `notice`;

CREATE TABLE `notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `assign_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `notice` */

/*Table structure for table `patient` */

DROP TABLE IF EXISTS `patient`;

CREATE TABLE `patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(20) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `affliate` varchar(50) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `age` int(11) DEFAULT NULL,
  `fatherOrSpouse` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `Occupation` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

/*Data for the table `patient` */

insert  into `patient`(`id`,`patient_id`,`firstname`,`lastname`,`email`,`password`,`phone`,`mobile`,`address`,`sex`,`blood_group`,`date_of_birth`,`affliate`,`picture`,`created_by`,`create_date`,`status`,`age`,`fatherOrSpouse`,`religion`,`Occupation`) values 
(11,'190205942658',' Kazi Hafizur Rhaman ','kiron','','d41d8cd98f00b204e9800998ecf8427e','','01823-733700','Ganda\r\nSaver, Dhaka','Male','','1970-01-01',NULL,'',59,'2019-02-05',1,NULL,NULL,NULL,NULL),
(12,'190205847259','MRS. ','AMBIYA','','d41d8cd98f00b204e9800998ecf8427e','','01966-601966','FULBARIYA ,RAJA GHAT\r\n','Female','','2019-02-05',NULL,'',59,'2019-02-05',1,NULL,NULL,NULL,NULL),
(13,'190205762415','MRS. SUKUR','JAN','','d41d8cd98f00b204e9800998ecf8427e','','01711-686115','BANK COLONEY\r\nSAVAR, DHAKA','Female','','1990-05-12',NULL,'',59,'2019-02-05',1,NULL,NULL,NULL,NULL),
(14,'190206091483','MRS.','BABLI','','d41d8cd98f00b204e9800998ecf8427e','','01684-835778','BANK COLONEY\r\nsAVAR , DHAKA ','Female','','1971-01-01',NULL,'',59,'2019-02-06',1,NULL,NULL,NULL,NULL),
(15,'190206582014','IMARAT','HOSSAIN','','d41d8cd98f00b204e9800998ecf8427e','','01679-303555','UPZELA ,SAVAR','Male','','1985-01-01',NULL,'',59,'2019-02-06',1,NULL,NULL,NULL,NULL),
(16,'190206689754','HAZERA','KHATUN','','d41d8cd98f00b204e9800998ecf8427e','','01715-416047','A/77-08 NORTH, TALBAG','Female','','1954-01-01',NULL,'',59,'2019-02-06',1,NULL,NULL,NULL,NULL),
(17,'190206985012','MOMOTAJ-03','AKTER','','d41d8cd98f00b204e9800998ecf8427e','','01839-290323','BOKTER PUR\r\nSAVER , DHAKA','Female','','1950-01-01',NULL,'',59,'2019-02-06',1,NULL,NULL,NULL,NULL),
(18,'190206421068','MOMOTAZ','AKTER','','d41d8cd98f00b204e9800998ecf8427e','','01839-290323','BOKTER PUR\r\nSAVER ,DHAKA','Female','','1950-01-01',NULL,'',59,'2019-02-06',1,NULL,NULL,NULL,NULL),
(19,'190206609124','ABUL ','KHASEM','','d41d8cd98f00b204e9800998ecf8427e','','01645-83253','RAJASON\r\nSAVAR ,DHAKA','Male','','1954-01-01',NULL,'',59,'2019-02-06',1,NULL,NULL,NULL,NULL),
(20,'190206732504','MOMOTAJ','AKTER','','d41d8cd98f00b204e9800998ecf8427e','','01839-290323','BOKTAR PUR \r\nSAVAR , DHAKA','Female','','1979-01-01',NULL,'',59,'2019-02-06',1,NULL,NULL,NULL,NULL),
(21,'190206725104','MRS.','MOMOTAZ','','d41d8cd98f00b204e9800998ecf8427e','','01645-83253','RAJASON\r\nSAVAR ,DHAKA','Female','','1964-01-01',NULL,'',59,'2019-02-06',1,NULL,NULL,NULL,NULL),
(22,'190206184935','MOMOTAZ','BEGUM','','d41d8cd98f00b204e9800998ecf8427e','','01645-83253','RAJASON\r\nSAVAR , DHAKA','Female','','1964-01-01',NULL,'',59,'2019-02-06',1,NULL,NULL,NULL,NULL),
(23,'190206917356','ABUL','KHASEM','','d41d8cd98f00b204e9800998ecf8427e','','01645-83253','RAJAS0N\r\nSAVAR , DHAKA','Male','','2019-02-06',NULL,'',59,'2019-02-06',1,NULL,NULL,NULL,NULL),
(24,'190206871560','MOMOTAZ','KHATUN','','d41d8cd98f00b204e9800998ecf8427e','','01839-290323','BOTAR PUR\r\nSAVAR , DHAKA','Female','','1979-01-01',NULL,'',59,'2019-02-06',1,NULL,NULL,NULL,NULL),
(25,'190206680953','ABU','SAYED','','d41d8cd98f00b204e9800998ecf8427e','','01777-574893','FULBARIYA \r\nSAVAR , DHAKA','Male','','1990-01-01',NULL,'',59,'2019-02-06',1,NULL,NULL,NULL,NULL),
(26,'190206145032','ANOWARA','BEGUM','','d41d8cd98f00b204e9800998ecf8427e','','01732-605270','SAVAR ,\r\nTHANA ROAD, DHAKA','Female','','1973-01-01',NULL,'',59,'2019-02-06',1,NULL,NULL,NULL,NULL),
(27,'190206087925','MINOTI','BONIK','','d41d8cd98f00b204e9800998ecf8427e','','01716-910342','ANANDHO PUR\r\nSAVAR , DHAKA','Female','','1949-01-01',NULL,'',59,'2019-02-06',1,NULL,NULL,NULL,NULL),
(28,'190206130287','MRS.','BABLI','','d41d8cd98f00b204e9800998ecf8427e','','01684-835778','BANK COLONEY\r\nSAVAR , DHAKA','Female','','1971-01-01',NULL,'',59,'2019-02-06',1,NULL,NULL,NULL,NULL),
(29,'190206241057','IMARAT','HOSSAIN','','d41d8cd98f00b204e9800998ecf8427e','','01679-303555','UPZELA \r\nSAVAR , DHAKA','Male','','1986-01-01',NULL,'',59,'2019-02-06',1,NULL,NULL,NULL,NULL),
(30,'190206584329','MRS','HAZERA','','d41d8cd98f00b204e9800998ecf8427e','','01759-992508','TALBAG \r\nSAVAR , DHAKA','Female','','1964-01-01',NULL,'',59,'2019-02-06',1,NULL,NULL,NULL,NULL),
(31,'190206861075','KAZI','KIRON','','d41d8cd98f00b204e9800998ecf8427e','','01823-733700','GANDA , SAVAR\r\nDHAKA','Male','','1989-01-01',NULL,'',59,'2019-02-06',1,NULL,NULL,NULL,NULL),
(32,'190207856137','IMARAT','HOSSAIN','','d41d8cd98f00b204e9800998ecf8427e','','01679-303555','upozela , savar \r\nDHAKA','Male','','1986-02-07',NULL,'',59,'2019-02-07',1,NULL,NULL,NULL,NULL),
(33,'190207234685','MR .','JOSSIMULLAH','','d41d8cd98f00b204e9800998ecf8427e','','01862-902245','SUBUJ BAG \r\nSAVAR , DHAKA','Male','','1981-01-01',NULL,'',59,'2019-02-07',1,NULL,NULL,NULL,NULL),
(34,'190207765482','MR. MOHI UDDIN','POLASH','','d41d8cd98f00b204e9800998ecf8427e','','01851-606606','SIRAMIX BAZER \r\nSAVAR , DHAKA','Male','','1979-01-01',NULL,'',59,'2019-02-07',1,NULL,NULL,NULL,NULL),
(35,'190207701839','MR.','MARUF','','d41d8cd98f00b204e9800998ecf8427e','','01689-803460','GAMGHORA \r\nASSULIYA , SAVER , DHAKA','Male','','1997-01-01',NULL,'',59,'2019-02-07',1,NULL,NULL,NULL,NULL),
(36,'190208835670','NURUL ','ISLAM','','d41d8cd98f00b204e9800998ecf8427e','','01811-293589','HAMAYET PUR \r\nSAVAR , DHAKA','Male','','1975-01-01',NULL,'',59,'2019-02-08',1,NULL,NULL,NULL,NULL),
(37,'190208756082','MRS. ','PAPIYA','','d41d8cd98f00b204e9800998ecf8427e','','01708-873604','ANANDHO PUR\r\nSAVAR , DHAKA','Female','','1969-01-01',NULL,'',59,'2019-02-08',1,NULL,NULL,NULL,NULL),
(38,'190208049328','MRS.','MOMOTAZ','','d41d8cd98f00b204e9800998ecf8427e','','01645-83253','RAJASON\r\nSAVAR ,DHAKA','Female','','2019-02-08',NULL,'',59,'2019-02-08',1,NULL,NULL,NULL,NULL),
(39,'190208935724','ABUL','KHASEM','','d41d8cd98f00b204e9800998ecf8427e','','01645-83253','RAJASON \r\nSAVAR ,  DHAKA','Male','','1954-01-01',NULL,'',59,'2019-02-08',1,NULL,NULL,NULL,NULL),
(40,'190208543708','KHALEDA','BEGUM','','d41d8cd98f00b204e9800998ecf8427e','','01728-319721','SINGAIR \r\nMINIKGONG','Female','','1984-01-01',NULL,'',59,'2019-02-08',1,NULL,NULL,NULL,NULL),
(41,'190208096485','MONOWARA','BEGUM','','d41d8cd98f00b204e9800998ecf8427e','','01746-038969','SAVAR \r\nDHAKA','Female','','1964-01-01',NULL,'',59,'2019-02-08',1,NULL,NULL,NULL,NULL),
(42,'190208197538','ABUL KALAM ','AZAD','','d41d8cd98f00b204e9800998ecf8427e','','01974-748278','SIRAMIX ,VAGOL PUR\r\nSAVAR , DHAKA','Male','','1983-01-01',NULL,'',59,'2019-02-08',1,NULL,NULL,NULL,NULL),
(43,'190209738012','NURUL ','ISLAM','','d41d8cd98f00b204e9800998ecf8427e','','01811-293589','HAMAYET PUR\r\nSAVAR , DHAKA','Male','','1975-01-01',NULL,'',59,'2019-02-09',1,NULL,NULL,NULL,NULL),
(44,'190209319408','NURUL ','ISLAM','','d41d8cd98f00b204e9800998ecf8427e','','01811-293589','HAMAYET PUR\r\nsSAVAR , DHAKA','Male','','1975-01-01',NULL,'',59,'2019-02-09',1,NULL,NULL,NULL,NULL),
(45,'190209857406','KHALIDA','AKTER','','d41d8cd98f00b204e9800998ecf8427e','','01818-342595','JAMSING \r\nSAVAR, DHAKA','Female','','1984-01-01',NULL,'',59,'2019-02-09',1,NULL,NULL,NULL,NULL),
(46,'190209078261','FORIDA ','BEGUM','','d41d8cd98f00b204e9800998ecf8427e','','01820-505112','TALBAG \r\nSAVAR, DHAKA\r\n','Female','','1969-01-01',NULL,'',59,'2019-02-09',1,NULL,NULL,NULL,NULL),
(47,'190209402683','NAZMA','BEGUM','','d41d8cd98f00b204e9800998ecf8427e','','01763-690221','BOLIHAR PUR\r\nKONDA BAZAR\r\nSAVAR , DHAKA','Female','','1964-01-01',NULL,'',59,'2019-02-09',1,NULL,NULL,NULL,NULL),
(48,'190209690823','MRS. ','SALMA','','d41d8cd98f00b204e9800998ecf8427e','','01711-536459','TALBAG\r\nSAVAR , DHAKA','Male','','1977-01-01',NULL,'',59,'2019-02-09',1,NULL,NULL,NULL,NULL),
(49,'190209157042','MD. MOJIBUR','RAHMAN','','d41d8cd98f00b204e9800998ecf8427e','','01817-01078','10/11 GANDA \r\nSAVAR , DHAKA\r\n','Male','','1957-01-01',NULL,'',59,'2019-02-09',1,NULL,NULL,NULL,NULL),
(50,'190209304691','MR. NEPAL','SAHA','','d41d8cd98f00b204e9800998ecf8427e','','01615-086903','UPOZELA \r\nSAVAR , DHAKA','Male','','1962-01-01',NULL,'',59,'2019-02-09',1,NULL,NULL,NULL,NULL),
(51,'190210839421','MOMOTAZ','KHATUN-05','','d41d8cd98f00b204e9800998ecf8427e','','01993-878014','BINODBAEIT\r\nBAZAR ROAD','Female','','2019-02-10',NULL,'',59,'2019-02-10',1,NULL,NULL,NULL,NULL),
(52,'190210492803','MOMOTAZ','KHATUN-05','','d41d8cd98f00b204e9800998ecf8427e','','01993-878014','BINODBAEIT\r\nBAZAR ROAD','Female','','2019-02-10',NULL,'',59,'2019-02-10',1,NULL,NULL,NULL,NULL),
(53,'190210405216','SUJIT','KUMAR','','d41d8cd98f00b204e9800998ecf8427e','','01713-229256','D-2/1 TALBAG\r\nUPOZELA , SAVAR','Male','','1964-01-01',NULL,'',59,'2019-02-10',1,NULL,NULL,NULL,NULL),
(54,'190210265870','MANNAN','BAHER','','d41d8cd98f00b204e9800998ecf8427e','','01758-949851','ANANDHO PUR\r\nSAVAR DHAKA','Male','','1971-01-01',NULL,'',59,'2019-02-10',1,NULL,NULL,NULL,NULL),
(55,'190210638504','ALAMGIR','HOSSAIN','','d41d8cd98f00b204e9800998ecf8427e','','01916-363486','SINGAIR\r\nMANIK GONG','Male','','1984-01-01',NULL,'',59,'2019-02-10',1,NULL,NULL,NULL,NULL),
(56,'190210189364','MOMOTAJ','KHATUN','','d41d8cd98f00b204e9800998ecf8427e','','01993-878014','BINOD BAIED\r\nBAZAR ROAD','Male','','1959-01-01',NULL,'',59,'2019-02-10',1,NULL,NULL,NULL,NULL),
(57,'190213051832','HAZI','SULTAN AHAMED','','d41d8cd98f00b204e9800998ecf8427e','','01748-953738','GIRLS SCHOOL \r\nBANK COLONEY\r\nSAVAR DHAKA','Male','','1949-01-01',NULL,'',59,'2019-02-13',1,NULL,NULL,NULL,NULL),
(58,'190214247856','Mazida ','Akter','','d41d8cd98f00b204e9800998ecf8427e','','01684175551','3/2, Wapda Road, Savar, Dhaka - 1340  ','Female','','1966-02-14',NULL,'',54,'2019-02-14',1,NULL,NULL,NULL,NULL),
(59,'190214093728','REKA ','RANI','','d41d8cd98f00b204e9800998ecf8427e','','01645-83253','GENDA\r\nSAVAR DHAKA','Male','','1964-02-01',NULL,'',59,'2019-02-14',1,NULL,NULL,NULL,NULL),
(60,'190214780369','MD. ','NAZRUL','faisalahmed01729735774@gmail.com','e10adc3949ba59abbe56e057f20f883e','','01820-257507','NOYAKHALI','Male','','1949-01-01',NULL,'assets/images/patient/b75f53168476b7ff53b4459820cd5e29.png',59,'2019-02-14',1,NULL,NULL,NULL,NULL),
(61,'190214869703','MRS. ','HAFIZA','faisalahmed01729735774@gmail.com','e10adc3949ba59abbe56e057f20f883e','','01720-243945','HAMAYET PUR \r\nSAVAR , DHAKA','Male','','1982-01-01',NULL,'',59,'2019-02-14',1,34,NULL,NULL,NULL),
(63,'190322782109','Shamim','Rony','','d41d8cd98f00b204e9800998ecf8427e','','01515206120','3/2 Prianka Manshion\r\nWapda Road','Male','','1985-02-22',NULL,'',59,'2019-03-22',1,34,NULL,NULL,NULL),
(64,'190323194205','Mr. ','patient','','d41d8cd98f00b204e9800998ecf8427e','','01726056968','dhaka','Male','A+','1995-02-23',NULL,'assets/images/patient/fbe9cc3040b1588b16f1950ccfa7ca0a.jpg',59,'2019-03-23',1,24,NULL,NULL,NULL),
(65,'190323306925','Mr.','null','','d41d8cd98f00b204e9800998ecf8427e','','1234567','erty','Male','','1984-02-23',NULL,'',59,'2019-03-23',1,35,'mr. f','islam',''),
(66,'190405527416','Mr. ','P1','','d41d8cd98f00b204e9800998ecf8427e','','01726056968','dhaka','Male','O+','1993-03-05',NULL,'',55,'2019-04-05',1,26,'f1','islam','teacher'),
(67,'190406208751','mr. sajib',NULL,NULL,NULL,NULL,NULL,'savar , dhaka',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),
(68,'190406023697','gfdgfg',NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),
(69,'190406614308','Md. XYZ',NULL,NULL,NULL,NULL,NULL,'3/2, Savar, Dhaka - 1340 ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),
(70,'190406492781','Mr. unregister 1',NULL,NULL,NULL,NULL,NULL,'dhaka',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),
(71,'190406712698','Kuddus',NULL,NULL,NULL,NULL,NULL,'14,A Chorok Ghat, Lalbag',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),
(72,'190413456890','mr. yy',NULL,NULL,NULL,NULL,NULL,'Dhaka , bangladesh',NULL,NULL,NULL,NULL,NULL,59,'2019-04-13',1,NULL,NULL,NULL,NULL),
(73,'190413394570','Mr. Sajib Hosen',NULL,NULL,NULL,NULL,NULL,'Rampura, dhaka',NULL,NULL,NULL,NULL,NULL,59,'2019-04-13',1,NULL,NULL,NULL,NULL),
(74,'190413260954','mr. old patient',NULL,NULL,NULL,NULL,NULL,'svr',NULL,NULL,NULL,NULL,NULL,59,'2019-04-13',1,NULL,NULL,NULL,NULL);

/*Table structure for table `pr_case_study` */

DROP TABLE IF EXISTS `pr_case_study`;

CREATE TABLE `pr_case_study` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(30) DEFAULT NULL,
  `food_allergies` varchar(255) DEFAULT NULL,
  `tendency_bleed` varchar(255) DEFAULT NULL,
  `heart_disease` varchar(255) DEFAULT NULL,
  `high_blood_pressure` varchar(255) DEFAULT NULL,
  `diabetic` varchar(255) DEFAULT NULL,
  `surgery` varchar(255) DEFAULT NULL,
  `accident` varchar(255) DEFAULT NULL,
  `others` varchar(255) DEFAULT NULL,
  `family_medical_history` varchar(255) DEFAULT NULL,
  `current_medication` varchar(255) DEFAULT NULL,
  `female_pregnancy` varchar(255) DEFAULT NULL,
  `breast_feeding` varchar(255) DEFAULT NULL,
  `health_insurance` varchar(255) DEFAULT NULL,
  `low_income` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pr_case_study` */

/*Table structure for table `pr_prescription` */

DROP TABLE IF EXISTS `pr_prescription`;

CREATE TABLE `pr_prescription` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `appointment_id` varchar(30) DEFAULT NULL,
  `patient_id` varchar(30) NOT NULL,
  `patient_type` varchar(50) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `chief_complain` text,
  `insurance_id` int(11) DEFAULT NULL,
  `policy_no` varchar(255) DEFAULT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `blood_pressure` varchar(255) DEFAULT NULL,
  `medicine` text,
  `diagnosis` text,
  `visiting_fees` float DEFAULT NULL,
  `patient_notes` text,
  `reference_by` varchar(50) DEFAULT NULL,
  `reference_to` varchar(50) DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pr_prescription` */

/*Table structure for table `schedule` */

DROP TABLE IF EXISTS `schedule`;

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `available_days` varchar(50) DEFAULT NULL,
  `per_patient_time` time DEFAULT NULL,
  `serial_visibility_type` tinyint(4) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`schedule_id`)
) ENGINE=InnoDB AUTO_INCREMENT=235 DEFAULT CHARSET=utf8;

/*Data for the table `schedule` */

insert  into `schedule`(`schedule_id`,`doctor_id`,`start_time`,`end_time`,`available_days`,`per_patient_time`,`serial_visibility_type`,`status`) values 
(188,68,'09:05:00','12:00:00','Friday','00:10:00',1,1),
(190,69,'09:00:00','20:00:00','Sunday','00:10:00',1,1),
(191,69,'09:00:00','20:00:00','Monday','00:10:00',1,1),
(192,69,'09:00:00','20:00:00','Tuesday','00:10:00',1,1),
(194,69,'09:00:00','20:00:00','Wednesday','00:10:00',1,1),
(195,69,'09:00:00','20:00:00','Thursday','00:10:00',1,1),
(196,69,'09:00:00','20:00:00','Friday','00:10:00',1,1),
(197,69,'09:00:00','20:00:00','Saturday','00:10:00',1,1),
(198,70,'09:00:00','18:00:00','Saturday','00:10:00',1,1),
(199,70,'09:00:00','18:00:00','Monday','00:10:00',1,1),
(200,70,'09:00:00','18:00:00','Tuesday','00:10:00',1,1),
(201,70,'09:00:00','18:00:00','Wednesday','00:10:00',1,1),
(202,70,'09:00:00','18:00:00','Thursday','00:10:00',1,1),
(203,70,'09:00:00','18:00:00','Saturday','00:10:00',1,1),
(204,71,'16:00:00','21:00:00','Sunday','00:10:00',1,1),
(205,73,'09:00:00','20:00:00','Monday','00:45:00',1,1),
(206,73,'09:00:00','20:00:00','Tuesday','00:45:00',1,1),
(207,73,'09:00:00','20:00:00','Wednesday','00:45:00',1,1),
(208,73,'09:00:00','20:00:00','Thursday','00:45:00',1,1),
(209,73,'09:00:00','20:00:00','Friday','00:45:00',1,1),
(210,73,'09:00:00','20:00:00','Saturday','00:45:00',1,1),
(211,75,'09:00:00','20:00:00','Sunday','00:45:00',1,1),
(212,75,'09:00:00','20:00:00','Monday','00:45:00',1,1),
(213,75,'09:00:00','20:00:00','Wednesday','00:45:00',1,1),
(214,75,'09:00:00','20:00:00','Thursday','00:45:00',1,1),
(215,75,'09:00:00','20:00:00','Friday','00:45:00',1,1),
(216,75,'09:00:00','20:00:00','Saturday','00:45:00',1,1),
(217,74,'09:00:00','20:00:00','Sunday','00:45:00',1,1),
(218,74,'09:00:00','20:00:00','Monday','00:45:00',1,1),
(219,74,'09:00:00','20:00:00','Tuesday','00:45:00',1,1),
(220,74,'09:00:00','20:00:00','Wednesday','00:45:00',1,1),
(221,74,'09:00:00','20:00:00','Thursday','00:45:00',1,1),
(222,74,'09:00:00','20:00:00','Friday','00:45:00',1,1),
(223,76,'09:00:00','20:00:00','Sunday','00:45:00',1,1),
(224,76,'09:00:00','20:00:00','Monday','00:45:00',1,1),
(225,76,'09:00:00','20:00:00','Tuesday','00:45:00',1,1),
(226,76,'09:00:00','20:00:00','Thursday','00:45:00',1,1),
(227,76,'09:00:00','20:00:00','Friday','00:45:00',1,1),
(228,76,'09:00:00','20:00:00','Saturday','00:45:00',1,1),
(229,78,'09:00:00','20:00:00','Monday','00:45:00',1,1),
(230,78,'09:00:00','20:00:00','Tuesday','00:45:00',1,1),
(231,78,'09:00:00','20:00:00','Wednesday','00:45:00',1,1),
(232,78,'09:00:00','20:00:00','Thursday','00:45:00',1,1),
(233,78,'09:00:00','20:00:00','Friday','00:45:00',1,1),
(234,78,'09:00:00','20:00:00','Saturday','00:45:00',1,1);

/*Table structure for table `setting` */

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `site_align` varchar(50) DEFAULT NULL,
  `footer_text` varchar(255) DEFAULT NULL,
  `time_zone` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `setting` */

insert  into `setting`(`setting_id`,`title`,`description`,`email`,`phone`,`mobile`,`fax`,`website`,`logo`,`favicon`,`language`,`site_align`,`footer_text`,`time_zone`) values 
(2,'Deep Clinic & Diagnostic Centre','D - 135/1, Talbag, Thana Stand,<br>Savar, Dhaka - 1340','','','+88 01726445903','','','assets/images/apps/ff730be2811f6cdfd5bb4ddcacc5085e.jpg','assets/images/icons/8fbacbbdf55feff65eb812ec653285a0.jpg','english','LTR','2018 - 2019 © SRS Software All Rights Reserved. V1.0','Asia/Dhaka');

/*Table structure for table `sms_delivery` */

DROP TABLE IF EXISTS `sms_delivery`;

CREATE TABLE `sms_delivery` (
  `sms_delivery_id` int(11) NOT NULL AUTO_INCREMENT,
  `ss_id` int(11) NOT NULL,
  `delivery_date_time` datetime NOT NULL,
  `sms_info_id` int(11) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`sms_delivery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sms_delivery` */

/*Table structure for table `sms_gateway` */

DROP TABLE IF EXISTS `sms_gateway`;

CREATE TABLE `sms_gateway` (
  `gateway_id` int(11) NOT NULL AUTO_INCREMENT,
  `provider_name` text NOT NULL,
  `user` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `authentication` text NOT NULL,
  `link` text NOT NULL,
  `default_status` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`gateway_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sms_gateway` */

/*Table structure for table `sms_info` */

DROP TABLE IF EXISTS `sms_info`;

CREATE TABLE `sms_info` (
  `sms_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `phone_no` varchar(30) NOT NULL,
  `appointment_id` varchar(30) NOT NULL,
  `appointment_date` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `sms_counter` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sms_info_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sms_info` */

/*Table structure for table `sms_schedule` */

DROP TABLE IF EXISTS `sms_schedule`;

CREATE TABLE `sms_schedule` (
  `ss_id` int(11) NOT NULL AUTO_INCREMENT,
  `ss_teamplate_id` int(11) NOT NULL,
  `ss_name` text NOT NULL,
  `ss_schedule` varchar(100) NOT NULL,
  `ss_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ss_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sms_schedule` */

/*Table structure for table `sms_setting` */

DROP TABLE IF EXISTS `sms_setting`;

CREATE TABLE `sms_setting` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `appointment` tinyint(1) DEFAULT NULL,
  `registration` tinyint(1) DEFAULT NULL,
  `schedule` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sms_setting` */

/*Table structure for table `sms_teamplate` */

DROP TABLE IF EXISTS `sms_teamplate`;

CREATE TABLE `sms_teamplate` (
  `teamplate_id` int(11) NOT NULL AUTO_INCREMENT,
  `teamplate_name` text,
  `teamplate` text,
  `type` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `default_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`teamplate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sms_teamplate` */

/*Table structure for table `sms_users` */

DROP TABLE IF EXISTS `sms_users`;

CREATE TABLE `sms_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `receiver` varchar(20) DEFAULT NULL,
  `message` text,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sms_users` */

/*Table structure for table `sys_cat` */

DROP TABLE IF EXISTS `sys_cat`;

CREATE TABLE `sys_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `icon` text,
  `order` int(11) DEFAULT '0',
  `sts` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `sys_cat` */

insert  into `sys_cat`(`id`,`name`,`group_id`,`url`,`icon`,`order`,`sts`) values 
(1,'User List',1,'user/list','<i class=\"fa fa-user\"></i>',2,1),
(2,'User Add',1,'user/create','<i class=\"fa fa-plus\"></i>',1,1),
(3,'Roles',1,'user/roles','<i class=\"fa fa-briefcase\"></i>',3,0),
(4,'Department List',3,'department/index',NULL,2,1),
(5,'Add Department',3,'department/create','<i class=\"fa fa-plus\"></i>',1,1);

/*Table structure for table `sys_group` */

DROP TABLE IF EXISTS `sys_group`;

CREATE TABLE `sys_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `child_sts` tinyint(1) NOT NULL DEFAULT '0',
  `icon` text,
  `sts` tinyint(1) NOT NULL DEFAULT '1',
  `order` int(11) NOT NULL DEFAULT '0',
  `url` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `sys_group` */

insert  into `sys_group`(`id`,`name`,`child_sts`,`icon`,`sts`,`order`,`url`) values 
(1,'User Managment',1,'<i class=\"fa fa-user-md\"></i>',1,1,NULL),
(2,'Product',1,'<i class=\"fa fa-sitemap\"></i>',1,2,NULL),
(3,'Department',1,'<i class=\"fa fa-sitemap\"></i>',1,3,NULL);

/*Table structure for table `sys_link` */

DROP TABLE IF EXISTS `sys_link`;

CREATE TABLE `sys_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `operation` varchar(100) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `sts` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `sys_link` */

insert  into `sys_link`(`id`,`name`,`operation`,`cat_id`,`group_id`,`url`,`sts`) values 
(1,'User Add','Add',2,1,'user/add',1),
(2,'User List','View',1,1,'user/edit',1),
(3,'User Edit','Edit',1,1,NULL,1),
(4,'User Roles','Add',3,1,NULL,1),
(5,'User Delete','Delete',1,1,NULL,1),
(6,'User Rights','Permision',1,1,NULL,1),
(7,'Department List','View',4,3,NULL,1),
(8,'Add Department','Add',4,3,NULL,1),
(9,'Edit Department ','Edit',4,3,NULL,1),
(10,'Delete Department','Delete',4,3,NULL,1),
(11,'Add Department','Add',5,3,NULL,1);

/*Table structure for table `tax_information` */

DROP TABLE IF EXISTS `tax_information`;

CREATE TABLE `tax_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tax` float DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tax_information` */

/*Table structure for table `template_setting` */

DROP TABLE IF EXISTS `template_setting`;

CREATE TABLE `template_setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `checker_id` int(11) NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `template_setting` */

insert  into `template_setting`(`setting_id`,`doctor_id`,`checker_id`) values 
(1,70,81);

/*Table structure for table `transection` */

DROP TABLE IF EXISTS `transection`;

CREATE TABLE `transection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(30) NOT NULL,
  `date_of_transection` varchar(30) NOT NULL,
  `transection_type` varchar(30) NOT NULL,
  `transection_category` varchar(30) NOT NULL,
  `transection_mood` varchar(25) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `pay_amount` float DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `relation_id` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `transection` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `user_role` tinyint(1) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `short_biography` text,
  `picture` varchar(255) DEFAULT NULL,
  `specialist` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `fee1` float NOT NULL DEFAULT '0',
  `fee2` float NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `employement_type` varchar(100) DEFAULT NULL,
  `father_or_spouse` varchar(100) DEFAULT NULL,
  `religion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`user_id`,`firstname`,`lastname`,`email`,`password`,`user_role`,`designation`,`department_id`,`address`,`phone`,`mobile`,`short_biography`,`picture`,`specialist`,`date_of_birth`,`sex`,`blood_group`,`degree`,`fee1`,`fee2`,`created_by`,`create_date`,`update_date`,`status`,`employement_type`,`father_or_spouse`,`religion`) values 
(1,'Sheikh','Saidy','saidylive@gmail.com','e10adc3949ba59abbe56e057f20f883e',1,NULL,NULL,'98 Green Road, Farmgate, Dhaka-1215',NULL,'1922296392',NULL,'assets/images/doctor/d49475ae2643ed555a40c75af42d074c.png',NULL,'1991-01-01','Male',NULL,NULL,0,0,2,'2017-10-29',NULL,1,NULL,NULL,NULL),
(54,'Shamim','Rony','rony.srstech@gmail.com','1c4752d6ccf598eee7b4dd52fb6625bc',1,NULL,NULL,'3/2 Prianka Manshion\r\nWapda Road\r\nSavar, Dhaka - 1340 ',NULL,'01684175551',NULL,'assets/images/doctor/84677aa521fdf36acbb1f11792aeee6e.png',NULL,'1970-01-01','Male',NULL,NULL,0,0,54,'2019-02-04',NULL,1,NULL,NULL,NULL),
(55,'BELA','Hef','bela.hef@gmail.com','e10adc3949ba59abbe56e057f20f883e',1,NULL,NULL,'A/87 - Talbag, Thana Road, \r\nSavar Dhaka - 1340',NULL,'01704-061427',NULL,'assets/images/doctor/6fa3bf67a2c3173215466051b3c5ea45.png',NULL,'1970-01-01','Male',NULL,NULL,0,0,55,'2019-01-20',NULL,1,NULL,NULL,NULL),
(59,'Md. Faisal ','Ahmed','faisalahmed01729735774@gmail.com','e10adc3949ba59abbe56e057f20f883e',7,NULL,NULL,'A/87, Talbag, Thana Road \r\nSavar, Dhaka-1340',NULL,'123456',NULL,'assets/images/doctor/dbfe7b121a5168d6b908c34cffeca324.jpg',NULL,'1970-01-01','Male',NULL,NULL,0,0,59,'2019-02-04',NULL,1,NULL,NULL,NULL),
(62,'Emdad Khan ','Sagor','rnbkhan@gmail.com','e10adc3949ba59abbe56e057f20f883e',1,NULL,NULL,'Chapain, taltola\r\nSavar, Dhaka - 1340, \r\n',NULL,'01913483533',NULL,'assets/images/doctor/c0709fef4b9260e79c442a35e9eb3436.jpg',NULL,'1970-01-01','Male',NULL,NULL,0,0,62,'2019-02-08',NULL,1,NULL,NULL,NULL),
(70,'Dr. Waheduzzaman','Maruf ','wzaman.maruf@gmail.com','e10adc3949ba59abbe56e057f20f883e',2,'Consultant ',41,'5-1/K-10, MADDAH PAIKPARA, MIRPUR-1, DHAKA.','01711-390848','01711-390848','','assets/images/doctor/90de5a70d0bc9459adc1371838b58ccc.jpg','Physiotherapist','1986-07-18','Male','A+','<p>BPT, CMT, MPH (STUDY)</p>',100,100,55,'2019-02-07',NULL,1,NULL,NULL,NULL),
(71,'DR. MAK','JAHID','jahidphysio@gmail.com','e10adc3949ba59abbe56e057f20f883e',2,'Senior Consultant ',41,'THANA ROAD, TALBAG, SAVAR, DHAKA.','','01819-464984','','assets/images/doctor/1b1e89bf762f3d3a272b0f76f807db6e.jpg','Physiotherapist','1982-02-07','Male','B+','<p>BPT (DU), MS-REHAB, CAGM (DU), D. ORTHO. MEDICINE (BASIC & ADVANCE, ETGOM, BELGIUM), PGT (GMR)</p>',300,300,55,'2019-02-07',NULL,1,NULL,NULL,NULL),
(72,'Rashed','Khan','shamim.rony777@gmail.com','e10adc3949ba59abbe56e057f20f883e',3,'Accountant',NULL,'3/2 Prianka Manshion\r\nWapda Road',NULL,'01600000000',NULL,'',NULL,NULL,'Male',NULL,NULL,0,0,54,'2019-02-07',NULL,1,NULL,NULL,NULL),
(73,'Mst. Semoly ','Khatun','shamoly037@gmail.com','e10adc3949ba59abbe56e057f20f883e',2,'DPT',41,'Talbag, Savar, Dhaka','','01744-984508','','assets/images/doctor/ef8849c6d8d8dd5f464e5bd265cbec2f.jpg','Physiotherapy Assistance ','1970-01-01','Female','A+','',350,300,55,'2019-02-08',NULL,0,NULL,NULL,NULL),
(74,'Mrs. Nazma','Khatun','khatunnazma397@gmail.com','e10adc3949ba59abbe56e057f20f883e',2,'PTA',41,'Bank colony savar , dhaka','','01718-883372','','','','1975-12-10','Female','','',350,300,62,'2019-02-08',NULL,1,NULL,NULL,NULL),
(75,'Nure','Alam','nurealom446@gmail.com','e10adc3949ba59abbe56e057f20f883e',2,'PTA',41,'talbag, savar','','01738-604031','','','Physiotherapy Assistance','1993-01-01','Male','','',350,300,62,'2019-02-14',NULL,1,NULL,NULL,NULL),
(76,'Sharifuzzaman ','Talukdar','shariftalukder1988@gmail.com','e10adc3949ba59abbe56e057f20f883e',2,'DPT',41,'86/A talbag savar dhaka','','01756-084622','','','Diploma in Physiotherapy ','1988-12-24','Male','','',350,300,62,'2019-02-08',NULL,1,NULL,NULL,NULL),
(78,'Prof. Dr. Md. liakat Ali ','Talukder','fahimahmadm@gmail.com','e10adc3949ba59abbe56e057f20f883e',2,'Doctor',41,'Jadurchor (Khan Bari), Hemayetpur\r\nSavar, Dhaka - 1340 ','','01632958582','','','','1985-09-10','Male','','<p>MBBS, DO, MPH (Opth)</p>',500,300,54,'2019-02-14',NULL,0,NULL,NULL,NULL),
(79,'Tahmina ','Akter ','stahmina173@gmail.com','e10adc3949ba59abbe56e057f20f883e',2,'PTA',41,'talbag , savar , dhaka','','01733-477007','','','','1995-02-08','Male','','',350,300,62,'2019-02-08',NULL,0,NULL,NULL,NULL),
(80,'Rina','Akter ','rina@gmail.com','e10adc3949ba59abbe56e057f20f883e',5,'Nurse',NULL,'24/B, Badda Banpukur, Savar, Dhaka - 1340 ',NULL,'0151206120',NULL,'',NULL,NULL,'Female',NULL,NULL,0,0,54,'2019-03-23',NULL,0,NULL,NULL,NULL),
(81,'Abdullah','Uddin','email@gmail.com','e10adc3949ba59abbe56e057f20f883e',4,'Laboratorist',NULL,'3/2 Prianka Super Market\r\nWapda Road',NULL,'01600000000',NULL,'',NULL,NULL,'Male',NULL,NULL,0,0,54,'2019-04-06',NULL,0,NULL,NULL,NULL),
(82,'sajib','Hosen','abcs@gmail.com','e10adc3949ba59abbe56e057f20f883e',3,'programmer',0,'rampura , dhaka',NULL,'01726056968','','assets/images/human_resources/dbf8b95f4747bbfebeaa6e381ecd4ea8.jpg','','2019-04-19','Male','','',0,0,54,'2019-04-19',NULL,1,'','',''),
(83,'test','1','faisalahmed01729735774@gmail.com','e10adc3949ba59abbe56e057f20f883e',2,'',NULL,'dhaka',NULL,'01485485547',NULL,'',NULL,NULL,'Male',NULL,NULL,0,0,1,'2019-04-19',NULL,1,NULL,NULL,NULL),
(84,'df','sdf','faisalahmed01729735774@gmail.com','e10adc3949ba59abbe56e057f20f883e',1,'prog',33,'sdgf',NULL,'01522','<p>dfgdfgd</p>','','df','1974-03-19','Male','B+','<p>bsc</p>',0,0,1,'2019-04-19',NULL,1,NULL,NULL,NULL),
(85,'test change 1','2','faisalahmed01729735774@gmail.com','e10adc3949ba59abbe56e057f20f883e',2,'programmer',35,'dfg dfg ',NULL,'01485485547','<p>dg df gd</p>','','dfg','1974-03-19','Male','B+','<p>ddfgd</p>',0,0,1,'2019-04-19',NULL,0,'Contractual','father ','islam');

/*Table structure for table `user_right` */

DROP TABLE IF EXISTS `user_right`;

CREATE TABLE `user_right` (
  `user_id` int(11) DEFAULT NULL,
  `link_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_right` */

insert  into `user_right`(`user_id`,`link_id`) values 
(62,2),
(84,2),
(84,3),
(84,5),
(84,6),
(84,1),
(1,5),
(1,6),
(1,2),
(1,3),
(1,1),
(1,8),
(1,9),
(1,10),
(1,7),
(1,11);

/*Table structure for table `user_role` */

DROP TABLE IF EXISTS `user_role`;

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `sts` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `user_role` */

insert  into `user_role`(`id`,`name`,`sts`) values 
(1,'Super Admin',1),
(2,'Admin',1),
(3,'User',1);

/*Table structure for table `view_i_sales_actual` */

DROP TABLE IF EXISTS `view_i_sales_actual`;

CREATE TABLE `view_i_sales_actual` (
  `DATE` varchar(50) DEFAULT NULL,
  `manufacturer_id` varchar(100) DEFAULT NULL,
  `sub_total` double DEFAULT NULL,
  `no_transection` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `view_i_sales_actual` */

/*Table structure for table `view_j_sales_report` */

DROP TABLE IF EXISTS `view_j_sales_report`;

CREATE TABLE `view_j_sales_report` (
  `date` varchar(50) DEFAULT NULL,
  `invoice_id` varchar(50) DEFAULT NULL,
  `invoice_details_id` varchar(100) DEFAULT NULL,
  `customer_id` varchar(100) DEFAULT NULL,
  `manufacturer_id` varchar(100) DEFAULT NULL,
  `product_id` varchar(100) DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `cartoon` float DEFAULT NULL,
  `quantity` float DEFAULT NULL,
  `sell_rate` float DEFAULT NULL,
  `manufacturer_rate` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `view_j_sales_report` */

/*Table structure for table `view_k_stock_batch_qty` */

DROP TABLE IF EXISTS `view_k_stock_batch_qty`;

CREATE TABLE `view_k_stock_batch_qty` (
  `batch_id` varchar(30) DEFAULT NULL,
  `product_id` varchar(100) DEFAULT NULL,
  `sell` double DEFAULT NULL,
  `Purchase` double DEFAULT NULL,
  `expeire_date` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `view_k_stock_batch_qty` */

/*Table structure for table `view_l_stock_history` */

DROP TABLE IF EXISTS `view_l_stock_history`;

CREATE TABLE `view_l_stock_history` (
  `vdate` varchar(50) DEFAULT NULL,
  `product_id` varchar(100) DEFAULT NULL,
  `sell` double DEFAULT NULL,
  `Purchase` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `view_l_stock_history` */

/*Table structure for table `view_m_total_batch_stock` */

DROP TABLE IF EXISTS `view_m_total_batch_stock`;

CREATE TABLE `view_m_total_batch_stock` (
  `product_id` varchar(100) DEFAULT NULL,
  `batch_id` varchar(30) DEFAULT NULL,
  `expeire_date` varchar(30) DEFAULT NULL,
  `stock` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `view_m_total_batch_stock` */

/*Table structure for table `view_m_total_product_stock` */

DROP TABLE IF EXISTS `view_m_total_product_stock`;

CREATE TABLE `view_m_total_product_stock` (
  `product_id` varchar(100) DEFAULT NULL,
  `batch_id` varchar(30) DEFAULT NULL,
  `expeire_date` varchar(30) DEFAULT NULL,
  `stock` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `view_m_total_product_stock` */

/*Table structure for table `ws_comment` */

DROP TABLE IF EXISTS `ws_comment`;

CREATE TABLE `ws_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL,
  `add_to_website` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ws_comment` */

/*Table structure for table `ws_item` */

DROP TABLE IF EXISTS `ws_item`;

CREATE TABLE `ws_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `icon_image` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `position` int(2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `counter` int(11) NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ws_item` */

/*Table structure for table `ws_section` */

DROP TABLE IF EXISTS `ws_section`;

CREATE TABLE `ws_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` text,
  `featured_image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ws_section` */

/*Table structure for table `ws_setting` */

DROP TABLE IF EXISTS `ws_setting`;

CREATE TABLE `ws_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `copyright_text` varchar(255) DEFAULT NULL,
  `twitter_api` text,
  `google_map` text,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `vimeo` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `dribbble` varchar(100) DEFAULT NULL,
  `skype` varchar(100) DEFAULT NULL,
  `google_plus` varchar(100) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `ws_setting` */

insert  into `ws_setting`(`id`,`title`,`description`,`logo`,`favicon`,`meta_tag`,`meta_keyword`,`email`,`phone`,`address`,`copyright_text`,`twitter_api`,`google_map`,`facebook`,`twitter`,`vimeo`,`instagram`,`dribbble`,`skype`,`google_plus`,`status`) values 
(1,'Deep Clinic & Diagnostic Centre','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. ','assets_web/images/icons/1c97bc1c9eed5aff20fb96e43c99cee3.jpg','assets_web/images/icons/24c0a93c6f7447ed2600611a236f0ffb.png','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. ','    Hospital, Appointment, System, Hospital Appointment, Demo, Appointment','info@deepclinic.club','+88027745066','D - 135/1, Talbag, Thana Road,<br>Savar, Dhaka - 1340','<p>&copy; 2018 <a title=\"SRS Software\" href=\"http://srs.one/\" target=\"_blank\">SRS Software</a>&nbsp;All rights reserved.V.01&nbsp;</p>\r\n<p>&nbsp;</p>','<a class=\"twitter-timeline\" data-lang=\"en\" data-dnt=\"true\" data-link-color=\"#207FDD\" href=\"https://twitter.com/taylorswift13\">Tweets by taylorswift13</a> <script async src=\"//platform.twitter.com/widgets.js\" charset=\"utf-8\"></script>','<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29215.021939977993!2d90.40923229999999!3d23.75173875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sbn!2sbd!4v1477987829881\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>','http://facebook.com/','http://','http://','http://','http://','http://','http://',1);

/*Table structure for table `ws_slider` */

DROP TABLE IF EXISTS `ws_slider`;

CREATE TABLE `ws_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `subtitle` varchar(100) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ws_slider` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
