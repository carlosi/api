
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- bankaccount
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `bankaccount`;

CREATE TABLE `bankaccount`
(
    `idbankaccount` INTEGER NOT NULL AUTO_INCREMENT,
    `idcompany` INTEGER NOT NULL,
    `bankaccount_name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`idbankaccount`),
    INDEX `idcompany` (`idcompany`),
    CONSTRAINT `idcompany_bankaccount`
        FOREIGN KEY (`idcompany`)
        REFERENCES `company` (`idcompany`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- bankordertransaction
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `bankordertransaction`;

CREATE TABLE `bankordertransaction`
(
    `idbankordertransaction` INTEGER NOT NULL AUTO_INCREMENT,
    `idbankaccount` INTEGER NOT NULL,
    `idorder` INTEGER NOT NULL,
    `bankordertransaction_amount` DECIMAL(10,2) DEFAULT 0.00 NOT NULL,
    `bankordertransaction_date` DATETIME,
    `bankordertransaction_paymentmethod` ENUM('No identificado','transferencia electrónica','efectivo','Tarjeta de crédito','Tarjeta de débito','Cheque nomitativo','monedero electrónico') DEFAULT 'No identificado' NOT NULL,
    `bankordertransaction_last4of_account` VARCHAR(4) DEFAULT '0000' NOT NULL,
    PRIMARY KEY (`idbankordertransaction`),
    INDEX `idorder` (`idorder`),
    INDEX `idbankaccount` (`idbankaccount`),
    CONSTRAINT `idbankaccount_bankordertransaction`
        FOREIGN KEY (`idbankaccount`)
        REFERENCES `bankaccount` (`idbankaccount`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idorder_bankordertransaction`
        FOREIGN KEY (`idorder`)
        REFERENCES `order` (`idorder`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- branch
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `branch`;

CREATE TABLE `branch`
(
    `idbranch` INTEGER NOT NULL AUTO_INCREMENT,
    `idcompany` INTEGER NOT NULL,
    `branch_name` VARCHAR(255) NOT NULL,
    `branch_iso_codecountry` VARCHAR(45),
    `branch_address` VARCHAR(65),
    `branch_address2` VARCHAR(65),
    `branch_city` VARCHAR(65),
    `branch_state` VARCHAR(45),
    `branch_zipcode` VARCHAR(5),
    PRIMARY KEY (`idbranch`),
    INDEX `idcompany` (`idcompany`),
    CONSTRAINT `idcompany_branch`
        FOREIGN KEY (`idcompany`)
        REFERENCES `company` (`idcompany`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- branch_user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `branch_user`;

CREATE TABLE `branch_user`
(
    `idbranch_user` INTEGER NOT NULL AUTO_INCREMENT,
    `idbranch` INTEGER NOT NULL,
    `iduser` INTEGER NOT NULL,
    PRIMARY KEY (`idbranch_user`),
    INDEX `idbranch` (`idbranch`),
    INDEX `iduser` (`iduser`),
    CONSTRAINT `idbranch_branch_user`
        FOREIGN KEY (`idbranch`)
        REFERENCES `branch` (`idbranch`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `iduser_branch_user`
        FOREIGN KEY (`iduser`)
        REFERENCES `user` (`iduser`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- client
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `client`;

CREATE TABLE `client`
(
    `idclient` INTEGER NOT NULL AUTO_INCREMENT,
    `idcompany` INTEGER NOT NULL,
    `client_iso_codecountry` VARCHAR(5),
    `client_iso_codephone` VARCHAR(5),
    `client_fullname` VARCHAR(245) NOT NULL,
    `client_email` VARCHAR(65),
    `client_email2` VARCHAR(65),
    `client_password` TEXT,
    `client_cellular` VARCHAR(16),
    `client_phone` VARCHAR(16),
    `client_language` VARCHAR(6),
    `client_status` ENUM('pending','active','suspended','fraud') NOT NULL,
    `client_type` ENUM('NORMAL','GENERALPUBLIC','INVENTORYMANAGER') DEFAULT 'NORMAL',
    PRIMARY KEY (`idclient`),
    INDEX `idcompany` (`idcompany`),
    CONSTRAINT `idcompany_client`
        FOREIGN KEY (`idcompany`)
        REFERENCES `company` (`idcompany`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- clientaddress
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `clientaddress`;

CREATE TABLE `clientaddress`
(
    `idclientaddress` INTEGER NOT NULL AUTO_INCREMENT,
    `idclient` INTEGER NOT NULL,
    `clientaddress_iso_codecountry` VARCHAR(5),
    `clientaddress_iso_codephone` VARCHAR(5),
    `clientaddress_addressee` VARCHAR(45) NOT NULL,
    `clientaddress_addressee_cellular` VARCHAR(16),
    `clientaddress_addressee_phone` VARCHAR(16),
    `clientaddress_address` VARCHAR(45) NOT NULL,
    `clientaddress_address2` VARCHAR(45),
    `clientaddress_city` VARCHAR(45) NOT NULL,
    `clientaddress_state` VARCHAR(45) NOT NULL,
    `clientaddress_zipcode` VARCHAR(5) NOT NULL,
    PRIMARY KEY (`idclientaddress`),
    INDEX `idclient` (`idclient`),
    CONSTRAINT `idclient_clientaddress`
        FOREIGN KEY (`idclient`)
        REFERENCES `client` (`idclient`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- clientcomment
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `clientcomment`;

CREATE TABLE `clientcomment`
(
    `idclientcomment` INTEGER NOT NULL AUTO_INCREMENT,
    `idclient` INTEGER NOT NULL,
    `clientcomment_note` TEXT NOT NULL,
    `clientcomment_date` DATETIME NOT NULL,
    PRIMARY KEY (`idclientcomment`),
    INDEX `idclient` (`idclient`),
    CONSTRAINT `idclient_clientcomment`
        FOREIGN KEY (`idclient`)
        REFERENCES `client` (`idclient`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- clientfile
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `clientfile`;

CREATE TABLE `clientfile`
(
    `idclientfile` INTEGER NOT NULL AUTO_INCREMENT,
    `idclient` INTEGER NOT NULL,
    `clientfile_url` TEXT NOT NULL,
    `clientfile_note` TEXT,
    `clientfile_uploaddate` DATETIME NOT NULL,
    PRIMARY KEY (`idclientfile`),
    INDEX `idclient` (`idclient`),
    CONSTRAINT `idclient_clientfile`
        FOREIGN KEY (`idclient`)
        REFERENCES `client` (`idclient`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- clienttax
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `clienttax`;

CREATE TABLE `clienttax`
(
    `idclienttax` INTEGER NOT NULL AUTO_INCREMENT,
    `idclient` INTEGER NOT NULL,
    `clienttax_iso_codecountry` VARCHAR(5),
    `clienttax_iso_codephone` VARCHAR(5),
    `clienttax_name` VARCHAR(90) NOT NULL,
    `clienttax_taxesid` VARCHAR(45) NOT NULL,
    `clienttax_address` VARCHAR(45) NOT NULL,
    `clienttax_address2` VARCHAR(45),
    `clienttax_city` VARCHAR(45) NOT NULL,
    `clienttax_state` VARCHAR(45) NOT NULL,
    `clienttax_zipcode` VARCHAR(5) NOT NULL,
    PRIMARY KEY (`idclienttax`),
    INDEX `idclient` (`idclient`),
    CONSTRAINT `idclient_clienttax`
        FOREIGN KEY (`idclient`)
        REFERENCES `client` (`idclient`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- company
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `company`;

CREATE TABLE `company`
(
    `idcompany` INTEGER NOT NULL AUTO_INCREMENT,
    `company_name` VARCHAR(65) NOT NULL,
    `company_timezone` VARCHAR(65),
    `company_iso_codecountry` VARCHAR(65),
    `company_address` VARCHAR(65),
    `company_address2` VARCHAR(65),
    `company_city` VARCHAR(65),
    `company_state` VARCHAR(65),
    `company_zipcode` VARCHAR(5),
    PRIMARY KEY (`idcompany`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- departamentmember
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `departamentmember`;

CREATE TABLE `departamentmember`
(
    `iddepartamentmember` INTEGER NOT NULL AUTO_INCREMENT,
    `iddepartament` INTEGER NOT NULL,
    `iduser` INTEGER NOT NULL,
    PRIMARY KEY (`iddepartamentmember`),
    INDEX `iddepartament` (`iddepartament`),
    INDEX `iduser` (`iduser`),
    CONSTRAINT `iddepartament_departamentmember`
        FOREIGN KEY (`iddepartament`)
        REFERENCES `department` (`iddepartment`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `iduser_departamentmember`
        FOREIGN KEY (`iduser`)
        REFERENCES `user` (`iduser`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- department
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `department`;

CREATE TABLE `department`
(
    `iddepartment` INTEGER NOT NULL AUTO_INCREMENT,
    `idcompany` INTEGER NOT NULL,
    `departament_name` VARCHAR(245) NOT NULL,
    PRIMARY KEY (`iddepartment`),
    INDEX `idcompany` (`idcompany`),
    CONSTRAINT `departament_idcompany`
        FOREIGN KEY (`idcompany`)
        REFERENCES `company` (`idcompany`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- expensecategory
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `expensecategory`;

CREATE TABLE `expensecategory`
(
    `idexpensecategory` INTEGER NOT NULL AUTO_INCREMENT,
    `idcompany` INTEGER NOT NULL,
    `expensecategory_dependency` INTEGER NOT NULL,
    `expensecategory_name` VARCHAR(255) NOT NULL,
    `expensecategory_description` TEXT,
    PRIMARY KEY (`idexpensecategory`),
    INDEX `expensecategory_dependency` (`expensecategory_dependency`),
    INDEX `idcompany` (`idcompany`),
    CONSTRAINT `expensecategory_dependency_expensecategory`
        FOREIGN KEY (`expensecategory_dependency`)
        REFERENCES `expensecategory` (`idexpensecategory`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idcompany`
        FOREIGN KEY (`idcompany`)
        REFERENCES `company` (`idcompany`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- expenseitem
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `expenseitem`;

CREATE TABLE `expenseitem`
(
    `idexpenseitem` INTEGER NOT NULL AUTO_INCREMENT,
    `idexpensecategory` INTEGER NOT NULL,
    `expenseitem_name` VARCHAR(225) NOT NULL,
    `expenseitem_description` TEXT,
    `expenseitem_cause` ENUM('operation','sale','purchasedgoods') NOT NULL,
    PRIMARY KEY (`idexpenseitem`),
    INDEX `idexpensecategory` (`idexpensecategory`),
    CONSTRAINT `idexpensecategory_expenseitem`
        FOREIGN KEY (`idexpensecategory`)
        REFERENCES `expensecategory` (`idexpensecategory`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- expenserecurrency
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `expenserecurrency`;

CREATE TABLE `expenserecurrency`
(
    `idexpenserecurrency` INTEGER NOT NULL AUTO_INCREMENT,
    `idexpenseitem` INTEGER NOT NULL,
    `expenserecurrency_comment` TEXT,
    `expenserecurrency_themequantity` DECIMAL(10,2) DEFAULT 0.00 NOT NULL,
    `expenserecurrency_themevalue` DECIMAL(10,2) DEFAULT 0.00 NOT NULL,
    `expenserecurrency_cycle` ENUM('weekly','monthly','annually') NOT NULL,
    `expenserecurrency_applyeach` TEXT NOT NULL,
    PRIMARY KEY (`idexpenserecurrency`),
    INDEX `idexpenseitem` (`idexpenseitem`),
    CONSTRAINT `idexpenseitem`
        FOREIGN KEY (`idexpenseitem`)
        REFERENCES `expenseitem` (`idexpenseitem`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- expensetransaction
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `expensetransaction`;

CREATE TABLE `expensetransaction`
(
    `idexpensetransaction` INTEGER NOT NULL AUTO_INCREMENT,
    `idexpenseitem` INTEGER NOT NULL,
    `expensetransaction_status` ENUM('suggestion','pending','completed') DEFAULT 'suggestion' NOT NULL,
    `expensetransaction_comment` TEXT,
    `expensetransaction_quantity` DECIMAL(10,2) DEFAULT 0.00 NOT NULL,
    `expensetransaction_value` DECIMAL(10,2) DEFAULT 0.00 NOT NULL,
    `expensetransaction_date` DATETIME NOT NULL,
    PRIMARY KEY (`idexpensetransaction`),
    INDEX `idexpenseitem` (`idexpenseitem`),
    CONSTRAINT `idexpenseitem_expensetransaction`
        FOREIGN KEY (`idexpenseitem`)
        REFERENCES `expenseitem` (`idexpenseitem`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- expensetransactionfile
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `expensetransactionfile`;

CREATE TABLE `expensetransactionfile`
(
    `idexpensetransactionfile` INTEGER NOT NULL AUTO_INCREMENT,
    `idexpensetransaction` INTEGER NOT NULL,
    `expensetransactionfile_url` TEXT NOT NULL,
    PRIMARY KEY (`idexpensetransactionfile`),
    INDEX `idexpensetransaction` (`idexpensetransaction`),
    CONSTRAINT `idexpensetransaction_expensetransactionfile`
        FOREIGN KEY (`idexpensetransaction`)
        REFERENCES `expensetransaction` (`idexpensetransaction`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- loguser
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `loguser`;

CREATE TABLE `loguser`
(
    `idloguser` INTEGER NOT NULL AUTO_INCREMENT,
    `iduser` INTEGER NOT NULL,
    `table` VARCHAR(125),
    `loguser_type` ENUM('insert','update','delete'),
    `old_data` TEXT,
    `new_data` TEXT,
    `loguser_date` DATETIME,
    PRIMARY KEY (`idloguser`),
    INDEX `iduser` (`iduser`),
    CONSTRAINT `iduser_loguser`
        FOREIGN KEY (`iduser`)
        REFERENCES `user` (`iduser`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- mlitem
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `mlitem`;

CREATE TABLE `mlitem`
(
    `idmlitem` INTEGER NOT NULL AUTO_INCREMENT,
    `idproductmain` INTEGER NOT NULL,
    `mlitem_id` INTEGER NOT NULL,
    PRIMARY KEY (`idmlitem`),
    INDEX `idemployee` (`idproductmain`),
    CONSTRAINT `idproductmain_mlitem`
        FOREIGN KEY (`idproductmain`)
        REFERENCES `productmain` (`idproductmain`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- mlquestion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `mlquestion`;

CREATE TABLE `mlquestion`
(
    `idmlquestion` INTEGER NOT NULL AUTO_INCREMENT,
    `idmlitem` INTEGER NOT NULL,
    `mlnickname` VARCHAR(128) NOT NULL,
    `mlquestion_question` TEXT NOT NULL,
    `mlquestion_questiondate` DATETIME NOT NULL,
    `iduser` INTEGER NOT NULL,
    `mlquestion_answer` TEXT NOT NULL,
    `mlquestion_answerdate` DATETIME NOT NULL,
    PRIMARY KEY (`idmlquestion`),
    INDEX `idmlitem` (`idmlitem`),
    INDEX `iduser` (`iduser`),
    CONSTRAINT `idmlitem_mlquestion`
        FOREIGN KEY (`idmlitem`)
        REFERENCES `mlitem` (`idmlitem`),
    CONSTRAINT `iduser`
        FOREIGN KEY (`iduser`)
        REFERENCES `user` (`iduser`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- mxtaxdocument
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `mxtaxdocument`;

CREATE TABLE `mxtaxdocument`
(
    `idmxtaxdocument` INTEGER NOT NULL,
    `idclienttax` INTEGER NOT NULL,
    `idorder` INTEGER NOT NULL,
    `mxtaxdocument_folio` VARCHAR(45),
    `mxtaxdocument_version` VARCHAR(45) NOT NULL,
    `mxtaxdocument_type` ENUM('ingreso','egreso') NOT NULL,
    `mxtaxdocument_status` ENUM('CREATED','CANCELLED') DEFAULT 'CREATED' NOT NULL,
    `mxtaxdocument_url_xml` TEXT,
    `mxtaxdocument_url_pdf` TEXT,
    PRIMARY KEY (`idmxtaxdocument`),
    INDEX `idorder` (`idorder`),
    INDEX `idclienttax` (`idclienttax`),
    CONSTRAINT `idclienttax_mxtaxdocument`
        FOREIGN KEY (`idclienttax`)
        REFERENCES `clienttax` (`idclienttax`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idordermx_mxtaxdocument`
        FOREIGN KEY (`idorder`)
        REFERENCES `order` (`idorder`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- mxtaxinfo
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `mxtaxinfo`;

CREATE TABLE `mxtaxinfo`
(
    `idmxtaxinfo` INTEGER NOT NULL,
    `idcompany` INTEGER NOT NULL,
    `mxtaxinfo_rfc` VARCHAR(45) NOT NULL,
    `mxtaxinfo_razonsocial` VARCHAR(65) NOT NULL,
    PRIMARY KEY (`idmxtaxinfo`),
    INDEX `idcompany` (`idcompany`),
    CONSTRAINT `idcompany_mxtaxinfo`
        FOREIGN KEY (`idcompany`)
        REFERENCES `company` (`idcompany`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- order
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order`
(
    `idorder` INTEGER NOT NULL AUTO_INCREMENT,
    `idbranch` INTEGER NOT NULL,
    `idclient` INTEGER NOT NULL,
    `created_at` DATE NOT NULL,
    `order_status` ENUM('COMPLETE','INCOMPLETE') NOT NULL,
    `order_payment` ENUM('PAID','UNPAID') NOT NULL,
    `order_paymentmode` ENUM('UNIQUE','PARTIAL') DEFAULT 'UNIQUE' NOT NULL,
    `order_delivery` enENUMum('LOCALMODE','SHIPMODE','TRANSIT','FINISHED','TRANSITTOBRANCH') NOT NULL,
    PRIMARY KEY (`idorder`),
    INDEX `idbranch` (`idbranch`),
    INDEX `idclient` (`idclient`),
    CONSTRAINT `idbranch_order`
        FOREIGN KEY (`idbranch`)
        REFERENCES `branch` (`idbranch`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idclient_order`
        FOREIGN KEY (`idclient`)
        REFERENCES `client` (`idclient`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ordercomment
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ordercomment`;

CREATE TABLE `ordercomment`
(
    `idordercomment` INTEGER NOT NULL AUTO_INCREMENT,
    `idorder` INTEGER NOT NULL,
    `ordercomment_note` TEXT NOT NULL,
    `ordercomment_date` DATETIME NOT NULL,
    PRIMARY KEY (`idordercomment`),
    INDEX `idorder` (`idorder`),
    CONSTRAINT `idorder_ordercomment`
        FOREIGN KEY (`idorder`)
        REFERENCES `order` (`idorder`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- orderfile
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `orderfile`;

CREATE TABLE `orderfile`
(
    `idorderfile` INTEGER NOT NULL AUTO_INCREMENT,
    `idorder` INTEGER NOT NULL,
    `orderfile_url` TEXT NOT NULL,
    `orderfile_note` TEXT,
    `orderfile_uploaddate` DATETIME NOT NULL,
    PRIMARY KEY (`idorderfile`),
    INDEX `idorder` (`idorder`),
    CONSTRAINT `idorder_orderfile`
        FOREIGN KEY (`idorder`)
        REFERENCES `order` (`idorder`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- orderitem
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `orderitem`;

CREATE TABLE `orderitem`
(
    `idorderitem` INTEGER NOT NULL AUTO_INCREMENT,
    `idorder` INTEGER NOT NULL,
    `idproduct` INTEGER NOT NULL,
    `orderitem_note` TEXT,
    `quantity` DECIMAL(10,2) NOT NULL,
    `value` DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (`idorderitem`),
    INDEX `idproduct` (`idproduct`),
    INDEX `idorder` (`idorder`),
    CONSTRAINT `idorder_orderitem`
        FOREIGN KEY (`idorder`)
        REFERENCES `order` (`idorder`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idproduct`
        FOREIGN KEY (`idproduct`)
        REFERENCES `product` (`idproduct`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- orderrecord
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `orderrecord`;

CREATE TABLE `orderrecord`
(
    `idorderrecord` INTEGER NOT NULL,
    `idorder` INTEGER NOT NULL,
    `orderrecord_date` DATETIME,
    `orderrecord_event` TEXT,
    `orderrecord_note` TEXT,
    PRIMARY KEY (`idorderrecord`),
    INDEX `idorder` (`idorder`),
    CONSTRAINT `idorder_orderrecord`
        FOREIGN KEY (`idorder`)
        REFERENCES `order` (`idorder`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- product
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product`
(
    `idproduct` INTEGER NOT NULL AUTO_INCREMENT,
    `idproductmain` INTEGER NOT NULL,
    `property_array` TEXT NOT NULL,
    `product_status` ENUM('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
    PRIMARY KEY (`idproduct`),
    INDEX `idproductmain` (`idproductmain`),
    CONSTRAINT `idproductmain_product`
        FOREIGN KEY (`idproductmain`)
        REFERENCES `productmain` (`idproductmain`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- productcategory
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `productcategory`;

CREATE TABLE `productcategory`
(
    `idproductcategory` INTEGER NOT NULL AUTO_INCREMENT,
    `category_name` VARCHAR(45) NOT NULL,
    `productcategory_dependency` INTEGER,
    `productcategory_property` TEXT NOT NULL,
    PRIMARY KEY (`idproductcategory`),
    INDEX `productcategory_dependency` (`productcategory_dependency`),
    CONSTRAINT `productcategory_dependency_productcategory`
        FOREIGN KEY (`productcategory_dependency`)
        REFERENCES `productcategory` (`idproductcategory`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- productcategoryproperty
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `productcategoryproperty`;

CREATE TABLE `productcategoryproperty`
(
    `idproductcategoryproperty` INTEGER NOT NULL AUTO_INCREMENT,
    `idproductcategory` INTEGER NOT NULL,
    `productcategoryproperty_name` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`idproductcategoryproperty`),
    INDEX `idproductcategory` (`idproductcategory`),
    CONSTRAINT `idproductcategory_productcategoryproperty`
        FOREIGN KEY (`idproductcategory`)
        REFERENCES `productcategory` (`idproductcategory`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- productcategorypropertyoption
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `productcategorypropertyoption`;

CREATE TABLE `productcategorypropertyoption`
(
    `idproductcategorypropertyoption` INTEGER NOT NULL AUTO_INCREMENT,
    `idproductcategoryproperty` INTEGER NOT NULL,
    `productcategorypropertyoption_name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`idproductcategorypropertyoption`),
    INDEX `idproductcategoryproperty` (`idproductcategoryproperty`),
    CONSTRAINT `idproductcategoryproperty_productcategorypropertyoption`
        FOREIGN KEY (`idproductcategoryproperty`)
        REFERENCES `productcategoryproperty` (`idproductcategoryproperty`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- productionorderitem
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `productionorderitem`;

CREATE TABLE `productionorderitem`
(
    `idproductionorderitem` INTEGER NOT NULL AUTO_INCREMENT,
    `idproductionteam` INTEGER NOT NULL,
    `idorderitem` INTEGER NOT NULL,
    `productionorderitem_dateinit` DATETIME,
    `productionorderitem_datedelivery` DATETIME,
    `productionorderitem_note` TEXT,
    `productionorderitem_status` ENUM('pending','initialized','completed') NOT NULL,
    PRIMARY KEY (`idproductionorderitem`),
    INDEX `idorderitem` (`idorderitem`),
    INDEX `idproductionteam` (`idproductionteam`),
    CONSTRAINT `idorderitem_productionorderitem`
        FOREIGN KEY (`idorderitem`)
        REFERENCES `orderitem` (`idorderitem`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idproductionteam_productionorderitem`
        FOREIGN KEY (`idproductionteam`)
        REFERENCES `productionteam` (`idproductionteam`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- productionteam
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `productionteam`;

CREATE TABLE `productionteam`
(
    `idproductionteam` INTEGER NOT NULL AUTO_INCREMENT,
    `idcompany` INTEGER NOT NULL,
    `productionteam_name` VARCHAR(145),
    PRIMARY KEY (`idproductionteam`),
    INDEX `idcompany` (`idcompany`),
    CONSTRAINT `idcompany_productionteam`
        FOREIGN KEY (`idcompany`)
        REFERENCES `company` (`idcompany`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- productionuser
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `productionuser`;

CREATE TABLE `productionuser`
(
    `idproductionuser` INTEGER NOT NULL AUTO_INCREMENT,
    `idproductionteam` INTEGER NOT NULL,
    `iduser` INTEGER NOT NULL,
    PRIMARY KEY (`idproductionuser`),
    INDEX `iduser` (`iduser`),
    INDEX `idproductionteam` (`idproductionteam`),
    CONSTRAINT `idproductionteam_productionuser`
        FOREIGN KEY (`idproductionteam`)
        REFERENCES `productionteam` (`idproductionteam`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `iduser_productionuser`
        FOREIGN KEY (`iduser`)
        REFERENCES `user` (`iduser`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- productmain
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `productmain`;

CREATE TABLE `productmain`
(
    `idproductmain` INTEGER NOT NULL AUTO_INCREMENT,
    `idcompany` INTEGER NOT NULL,
    `idproductcategory` INTEGER NOT NULL,
    `productmain_name` VARCHAR(255) NOT NULL,
    `productmain_unit` ENUM('kilo','metro cuadrado','cabeza','kilowatt','kilowatt-hora','gramo neto','docenas','gramo','metro cúbico','litro','millar','tonelada','decenas','caja','metro lineal','pieza','par','juego','barril','cientos','botella') NOT NULL,
    `productmain_discount` INTEGER DEFAULT 0,
    `productmain_eachpieces` INTEGER DEFAULT 0,
    `productmain_maxdiscount` INTEGER DEFAULT 0,
    `productmain_baseproperty` TEXT NOT NULL,
    `productmain_type` ENUM('COMPLEMENT','PRODUCT') DEFAULT 'PRODUCT',
    PRIMARY KEY (`idproductmain`),
    INDEX `idproductcategory` (`idproductcategory`),
    INDEX `idcompany` (`idcompany`),
    CONSTRAINT `idcompany_productmain`
        FOREIGN KEY (`idcompany`)
        REFERENCES `company` (`idcompany`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `idproductcategory_productmain`
        FOREIGN KEY (`idproductcategory`)
        REFERENCES `productcategory` (`idproductcategory`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- productmainphoto
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `productmainphoto`;

CREATE TABLE `productmainphoto`
(
    `idproductmainphoto` INTEGER NOT NULL AUTO_INCREMENT,
    `idproductmain` INTEGER NOT NULL,
    `productmainphoto_url` TEXT NOT NULL,
    `productmainphoto_width` VARCHAR(35),
    `productmainphoto_height` VARCHAR(35),
    `productmainphoto_status` ENUM('pending','rejected','active','revision'),
    PRIMARY KEY (`idproductmainphoto`),
    INDEX `idproductmain` (`idproductmain`),
    CONSTRAINT `idproductmain_productmainphoto`
        FOREIGN KEY (`idproductmain`)
        REFERENCES `productmain` (`idproductmain`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- project
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `project`;

CREATE TABLE `project`
(
    `idproject` INTEGER NOT NULL AUTO_INCREMENT,
    `iddepartament` INTEGER NOT NULL,
    `project_dependency` INTEGER NOT NULL,
    `project_name` VARCHAR(245),
    PRIMARY KEY (`idproject`),
    INDEX `iddepartament` (`iddepartament`),
    INDEX `project_dependency` (`project_dependency`),
    CONSTRAINT `project_dependency`
        FOREIGN KEY (`project_dependency`)
        REFERENCES `project` (`idproject`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `project_iddepartament`
        FOREIGN KEY (`iddepartament`)
        REFERENCES `department` (`iddepartment`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- projectactivity
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `projectactivity`;

CREATE TABLE `projectactivity`
(
    `idprojectactivity` INTEGER NOT NULL AUTO_INCREMENT,
    `idproject` INTEGER NOT NULL,
    `projectactivity_title` VARCHAR(45) NOT NULL,
    `projectactivity_description` TEXT,
    `projectactivity_status` ENUM('pending','rejected','progress','completed','pause') DEFAULT 'pending' NOT NULL,
    `projectactivity_dateinit` DATETIME,
    `projectactivity_datetofinish` DATETIME,
    PRIMARY KEY (`idprojectactivity`),
    INDEX `idproject` (`idproject`),
    CONSTRAINT `projectactivity_idproject`
        FOREIGN KEY (`idproject`)
        REFERENCES `project` (`idproject`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- projectactivitypost
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `projectactivitypost`;

CREATE TABLE `projectactivitypost`
(
    `idprojectactivitypost` INTEGER NOT NULL AUTO_INCREMENT,
    `idprojectactivity` INTEGER NOT NULL,
    `iduser` INTEGER NOT NULL,
    `projectactivitypost_text` TEXT,
    PRIMARY KEY (`idprojectactivitypost`),
    INDEX `idprojectactivity` (`idprojectactivity`),
    INDEX `iduser` (`iduser`),
    CONSTRAINT `idprojectactivity_projectactivitypost`
        FOREIGN KEY (`idprojectactivity`)
        REFERENCES `projectactivity` (`idprojectactivity`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `iduser_projectactivitypost`
        FOREIGN KEY (`iduser`)
        REFERENCES `user` (`iduser`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- projectactivityuser
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `projectactivityuser`;

CREATE TABLE `projectactivityuser`
(
    `idprojectactivityemployee` INTEGER NOT NULL AUTO_INCREMENT,
    `iduser` INTEGER NOT NULL,
    `idprojectactivity` INTEGER NOT NULL,
    PRIMARY KEY (`idprojectactivityemployee`),
    INDEX `iduser` (`iduser`),
    INDEX `idprojectactivity` (`idprojectactivity`),
    CONSTRAINT `idprojectactivity_projectactivityuser`
        FOREIGN KEY (`idprojectactivity`)
        REFERENCES `projectactivity` (`idprojectactivity`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `iduser_projectactivityuser`
        FOREIGN KEY (`iduser`)
        REFERENCES `user` (`iduser`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- shipping
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shipping`;

CREATE TABLE `shipping`
(
    `idshipping` INTEGER NOT NULL AUTO_INCREMENT,
    `idorder` INTEGER NOT NULL,
    `shipping_address` TEXT,
    `shipping_tracking` VARCHAR(45),
    `transport_company` ENUM('FEDEX','ESTAFETA','DHL','UPS','PRIVATE','OTHER','EMS','CORREOS DE MÉXICO','SEPOMEX'),
    `shipping_date` DATE NOT NULL,
    `shipping_datecompromise` DATE,
    `shipping_daterealdelivery` DATE,
    `shipping_iso_codecountry` VARCHAR(5),
    `shipping_iso_codephone` VARCHAR(5),
    `shipping_addressee` VARCHAR(145),
    `shipping_addressee_cellular` VARCHAR(145),
    `shipping_addressee_phone` VARCHAR(145),
    `shipping_address2` VARCHAR(145),
    `shipping_city` VARCHAR(145),
    `shipping_state` VARCHAR(145),
    `shipping_zipcode` VARCHAR(5),
    PRIMARY KEY (`idshipping`),
    UNIQUE INDEX `idorder_UNIQUE` (`idorder`),
    CONSTRAINT `idorder_shipping`
        FOREIGN KEY (`idorder`)
        REFERENCES `order` (`idorder`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- staff
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `staff`;

CREATE TABLE `staff`
(
    `idstaff` INTEGER NOT NULL AUTO_INCREMENT,
    `iduser` INTEGER NOT NULL,
    `staff_name` VARCHAR(45),
    `staff_email` VARCHAR(45),
    `staff_email2` VARCHAR(45),
    `staff_phone` VARCHAR(45),
    `staff_cellular` VARCHAR(45),
    `staff_language` VARCHAR(45) DEFAULT 'es_MX' NOT NULL,
    `staff_iso_codecountry` VARCHAR(5) DEFAULT 'MX' NOT NULL,
    `staff_iso_codephone` VARCHAR(5) DEFAULT '+52' NOT NULL,
    PRIMARY KEY (`idstaff`),
    INDEX `iduser` (`iduser`),
    CONSTRAINT `iduser_staff`
        FOREIGN KEY (`iduser`)
        REFERENCES `user` (`iduser`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- token
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `token`;

CREATE TABLE `token`
(
    `idtoken` INTEGER NOT NULL AUTO_INCREMENT,
    `iduser` INTEGER NOT NULL,
    `token` TEXT NOT NULL,
    `created_at` DATETIME NOT NULL,
    `expires_in` DATETIME NOT NULL,
    PRIMARY KEY (`idtoken`),
    INDEX `iduser` (`iduser`),
    CONSTRAINT `iduser_token`
        FOREIGN KEY (`iduser`)
        REFERENCES `user` (`iduser`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`
(
    `iduser` INTEGER NOT NULL AUTO_INCREMENT,
    `idcompany` INTEGER NOT NULL,
    `user_nickname` VARCHAR(245) NOT NULL,
    `user_password` TEXT NOT NULL,
    `user_type` ENUM('human','system') DEFAULT 'human' NOT NULL,
    `user_status` ENUM('pending','active','suspended','inactive') DEFAULT 'pending' NOT NULL,
    PRIMARY KEY (`iduser`),
    INDEX `idcompany` (`idcompany`),
    CONSTRAINT `user_idcompany`
        FOREIGN KEY (`idcompany`)
        REFERENCES `company` (`idcompany`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- useraccesslog
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `useraccesslog`;

CREATE TABLE `useraccesslog`
(
    `iduseraccesslog` INTEGER NOT NULL AUTO_INCREMENT,
    `iduser` INTEGER NOT NULL,
    `useraccesslog_date` DATETIME,
    `useraccesslog_result` ENUM('success','failed') NOT NULL,
    PRIMARY KEY (`iduseraccesslog`),
    INDEX `iduser` (`iduser`),
    CONSTRAINT `iduser_useraccesslog`
        FOREIGN KEY (`iduser`)
        REFERENCES `user` (`iduser`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- useracl
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `useracl`;

CREATE TABLE `useracl`
(
    `iduseracl` INTEGER NOT NULL AUTO_INCREMENT,
    `iduser` INTEGER NOT NULL,
    `module_name` ENUM('basic', 'sales', 'company', 'manufacture', 'contents') DEFAULT 'basic' NOT NULL,
    `user_accesslevel` ENUM('1','2','3','4','5') DEFAULT '1' NOT NULL,
    PRIMARY KEY (`iduseracl`),
    INDEX `iduser` (`iduser`),
    CONSTRAINT `iduser_useracl`
        FOREIGN KEY (`iduser`)
        REFERENCES `user` (`iduser`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
