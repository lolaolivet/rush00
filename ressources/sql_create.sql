-- ****************** SqlDBM: MySQL ******************;
-- ***************************************************;

DROP TABLE IF EXISTS `basket_has_products`;


DROP TABLE IF EXISTS `comments`;


DROP TABLE IF EXISTS `baskets`;


DROP TABLE IF EXISTS `product_has_categories`;


DROP TABLE IF EXISTS `users`;


DROP TABLE IF EXISTS `categories`;


DROP TABLE IF EXISTS `products`;



-- ************************************** `categories`

CREATE TABLE `categories`
(
 `id_category` INT NOT NULL AUTO_INCREMENT,
 `name`        VARCHAR(45) NOT NULL ,
 `description` TEXT NOT NULL ,

PRIMARY KEY (`id_category`)
);





-- ************************************** `products`

CREATE TABLE `products`
(
 `id_product`  INT NOT NULL AUTO_INCREMENT,
 `name`        VARCHAR(45) NOT NULL ,
 `description` TEXT NOT NULL ,
 `price`       DOUBLE NOT NULL ,
 `stock`       INT NOT NULL ,
 `image`       VARCHAR(255) NOT NULL ,

PRIMARY KEY (`id_product`)
);





-- ************************************** `product_has_categories`

CREATE TABLE `product_has_categories`
(
 `id_product_has_category`  INT NOT NULL AUTO_INCREMENT ,
 `id_product`               INT NOT NULL ,
 `id_category`              INT NOT NULL ,

PRIMARY KEY (`id_product_has_category`),
KEY `fkIdx_98` (`id_product`),
CONSTRAINT `FK_98` FOREIGN KEY `fkIdx_98` (`id_product`) REFERENCES `products` (`id_product`),
KEY `fkIdx_102` (`id_category`),
CONSTRAINT `FK_102` FOREIGN KEY `fkIdx_102` (`id_category`) REFERENCES `categories` (`id_category`)
);





-- ************************************** `users`

CREATE TABLE `users`
(
 `id_user`    INT NOT NULL AUTO_INCREMENT ,
 `passwd`     LONGTEXT NOT NULL ,
 `name`       VARCHAR(45) NOT NULL ,
 `first_name` VARCHAR(45) NOT NULL ,
 `email`      VARCHAR(254) NOT NULL ,
 `is_user`	  TINYINT(1),
  `street`     VARCHAR(255)  NOT NULL ,
 `zipcode`    VARCHAR(45)  NOT NULL ,
 `city`       VARCHAR(45)  NOT NULL ,
 `country`    VARCHAR(45)  NOT NULL ,

PRIMARY KEY (`id_user`),
KEY `fkIdx_58` (`id_address`),
CONSTRAINT `FK_58` FOREIGN KEY `fkIdx_58` (`id_address`) REFERENCES `address` (`id_address`)
);





-- ************************************** `comments`

CREATE TABLE `comments`
(
 `id_comment`  INT NOT NULL AUTO_INCREMENT,
 `str`        TEXT NOT NULL ,
 `id_product`  INT NOT NULL ,
 `id_user`     INT NOT NULL ,

PRIMARY KEY (`id_comment`),
KEY `fkIdx_106` (`id_product`),
CONSTRAINT `FK_106` FOREIGN KEY `fkIdx_106` (`id_product`) REFERENCES `products` (`id_product`),
KEY `fkIdx_110` (`id_user`),
CONSTRAINT `FK_110` FOREIGN KEY `fkIdx_110` (`id_user`) REFERENCES `users` (`id_user`)
);





-- ************************************** `baskets`

CREATE TABLE `baskets`
(
 `id_basket`     INT NOT NULL AUTO_INCREMENT,
 `id_user`      INT NOT NULL ,
 `date_create` DATETIME NOT NULL ,
 `is_bought`   TINYINT(1) NOT NULL ,
 `total`       DOUBLE NOT NULL ,

PRIMARY KEY (`id_basket`),
KEY `fkIdx_46` (`id_user`),
CONSTRAINT `FK_46` FOREIGN KEY `fkIdx_46` (`id_user`) REFERENCES `users` (`id_user`)
);





-- ************************************** `basket_has_products`

CREATE TABLE `basket_has_products`
(
 `id_basket_has_product`  INT NOT NULL AUTO_INCREMENT ,
 `id_basket`              INT NOT NULL ,
 `id_product`             INT NOT NULL ,

PRIMARY KEY (`id_basket_has_product`),
KEY `fkIdx_86` (`id_basket`),
CONSTRAINT `FK_86` FOREIGN KEY `fkIdx_86` (`id_basket`) REFERENCES `baskets` (`id_basket`),
KEY `fkIdx_90` (`id_product`),
CONSTRAINT `FK_90` FOREIGN KEY `fkIdx_90` (`id_product`) REFERENCES `products` (`id_product`)
);
