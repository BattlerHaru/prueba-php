CREATE DATABASE `store`;

USE `store`;

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` text DEFAULT NULL,
  `prod_sku` int(11) DEFAULT NULL,
  `prod_cats` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `prod_cost` decimal(10,0) NOT NULL,
  `prod_desc` mediumtext NOT NULL,
  `prod_barcode` varchar(50) NOT NULL,
  `prod_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

CREATE TABLE `vw_prods_all` (
`prod_id` int(11)
,`prod_name` text
,`prod_sku` int(11)
,`prod_cats` text
,`prod_cost` decimal(10,0)
,`prod_desc` mediumtext
,`prod_barcode` varchar(50)
,`prod_active` tinyint(1)
);


INSERT INTO `products` (`prod_id`, `prod_name`, `prod_sku`, `prod_cats`, `prod_cost`, `prod_desc`, `prod_barcode`, `prod_active`) 
VALUES 
(NULL, 'Spider-Man: Miles Morales', '1', 'Accion, Superheroes, Aventura', '70', 'Un año después del primer juego y su DLC, Miles se ha integrado completamente en el traje negro y rojo como un experimentado Spider-Man mientras defiende a Nueva York de una guerra de pandillas entre una corporación energética y un ejército criminal de alta tecnología. El nuevo hogar de Miles en Harlem está en el corazón de la batalla. Parker le dice a Miles que tiene que ser como su difunto padre y caminar por el camino para convertirse en un héroe para la ciudad de Nueva York.', '', '1'), 
(NULL, 'Ghost of Tsushima', '2', 'Historia, Suspenso, RPG', '60', 'Ambientada en 1274 en la isla epónima de Tsushima, el juego gira en torno al samurái Jin Sakai (Daisuke Tsuji), uno de supervivientes de la primera invasión mongola a Japón. Jin tendrá que dominar un nuevo estilo de lucha, el camino del Fantasma, para derrotar a las fuerzas mongolas y luchar por la libertad de su pueblo y de la isla. Jin se ve envuelto en un conflicto moral, ya que según el estricto código samurái (Bushido) luchar sigilosamente es deshonroso.​', '', '1');