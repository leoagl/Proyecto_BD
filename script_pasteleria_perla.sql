-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
CREATE DATABASE pasteleria_perla;
USE pasteleria_perla;
-- -----------------------------------------------------
-- Schema pasteleria_perla
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema pasteleria_perla
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `pasteleria_perla` DEFAULT CHARACTER SET utf8mb3 ;
-- -----------------------------------------------------
-- Schema pasteleria_perla
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema pasteleria
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `pasteleria_perla` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
-- -----------------------------------------------------
-- Schema pasteleria_perla
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema pasteleria_perla
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `pasteleria_perla` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;

-- -----------------------------------------------------
-- Table `pasteleria_perla`.`Proveedores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pasteleria_perla`.`Proveedores` (
  `idProveedor` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(100) NULL DEFAULT NULL,
  `Direccion` VARCHAR(120) NULL DEFAULT NULL,
  `Telefono` INT(10) NULL DEFAULT NULL,
  `Email` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`idProveedor`))
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

-- -----------------------------------------------------
-- Table `pasteleria_perla`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pasteleria_perla`.`clientes` (
  `idCliente` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(120) NULL DEFAULT NULL,
  `apellido` VARCHAR(120) NULL DEFAULT NULL,
  `telefono` INT NULL DEFAULT NULL,
  PRIMARY KEY (`idCliente`))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8mb3;

-- -----------------------------------------------------
-- Table `pasteleria_perla`.`Compras`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pasteleria_perla`.`Compras` (
  `idCompra` INT NOT NULL AUTO_INCREMENT,
  `Fecha` DATETIME NULL,
  `Importe` FLOAT NULL,
  `proveedores_ProveedorID` INT NOT NULL,
  PRIMARY KEY (`idCompra`),
  INDEX `fk_COMPRA_proveedores1_idx` (`proveedores_ProveedorID` ASC) VISIBLE,
  CONSTRAINT `fk_COMPRA_proveedores1`
    FOREIGN KEY (`proveedores_ProveedorID`)
    REFERENCES `pasteleria`.`Proveedores` (`idProveedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pasteleria_perla`.`Pasteles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pasteleria_perla`.`Pasteles` (
  `idPastel` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(100) NULL DEFAULT NULL,
  `Precio` FLOAT NULL DEFAULT NULL,
  `Costo` FLOAT NULL,
  `STOCK` INT NULL DEFAULT NULL,
  `Reorden` INT NULL,
  `fecha_Caducidad` DATETIME NULL,
  `fecha_Preparación` DATETIME NULL,
  `Proveedores_idProveedor` INT NOT NULL,
  PRIMARY KEY (`idPastel`),
  INDEX `fk_productos_proveedores_idx` (`Proveedores_idProveedor` ASC) VISIBLE)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

-- -----------------------------------------------------
-- Table `pasteleria_perla`.`Detalles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pasteleria_perla`.`Detalles` (
  `Compras_idCompra` INT NOT NULL,
  `Pasteles_idPastel` INT NOT NULL,
  `Cantidad` INT NULL,
  `Costo` FLOAT NULL,
  PRIMARY KEY (`Compras_idCompra`, `Pasteles_idPastel`),
  INDEX `fk_COMPRA_has_productos_productos1_idx` (`Pasteles_idPastel` ASC) VISIBLE,
  INDEX `fk_COMPRA_has_productos_COMPRA_idx` (`Compras_idCompra` ASC) VISIBLE,
  CONSTRAINT `fk_COMPRA_has_productos_COMPRA`
    FOREIGN KEY (`Compras_idCompra`)
    REFERENCES `mydb`.`Compras` (`idCompra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_COMPRA_has_productos_productos1`
    FOREIGN KEY (`Pasteles_idPastel`)
    REFERENCES `pasteleria`.`Pasteles` (`idPastel`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pasteleria_perla`.`Roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pasteleria_perla`.`Roles` (
  `idRol` INT NOT NULL AUTO_INCREMENT,
  `Rol` VARCHAR(45) NULL,
  `Descripción` VARCHAR(120) NULL,
  PRIMARY KEY (`idRol`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pasteleria_perla`.`Permisos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pasteleria_perla`.`Permisos` (
  `idPermiso` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(120) NULL,
  PRIMARY KEY (`idPermiso`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pasteleria_perla`.`Roles_has_Permisos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pasteleria_perla`.`Roles_has_Permisos` (
  `Roles_idRol` INT NOT NULL,
  `Permisos_idPermiso` INT NOT NULL,
  PRIMARY KEY (`Roles_idRol`, `Permisos_idPermiso`),
  INDEX `fk_Roles_has_Permisos_Permisos1_idx` (`Permisos_idPermiso` ASC) VISIBLE,
  INDEX `fk_Roles_has_Permisos_Roles1_idx` (`Roles_idRol` ASC) VISIBLE,
  CONSTRAINT `fk_Roles_has_Permisos_Roles1`
    FOREIGN KEY (`Roles_idRol`)
    REFERENCES `mydb`.`Roles` (`idRol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Roles_has_Permisos_Permisos1`
    FOREIGN KEY (`Permisos_idPermiso`)
    REFERENCES `mydb`.`Permisos` (`idPermiso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `pasteleria_perla`.`Trabajadores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pasteleria_perla`.`Trabajadores` (
  `idTrabajador` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(50) NULL DEFAULT NULL,
  `Apellido` VARCHAR(100) NULL DEFAULT NULL,
  `Email` VARCHAR(100) NULL DEFAULT NULL,
  `password` VARCHAR(100) NULL DEFAULT NULL,
  `Roles_idRoles` INT NOT NULL,
  PRIMARY KEY (`idTrabajador`),
  INDEX `fk_Trabajador_Roles1_idx` (`Roles_idRoles` ASC) VISIBLE)
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `pasteleria_perla`.`Pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pasteleria`.`Pedidos` (
  `idVenta` INT NOT NULL AUTO_INCREMENT,
  `FechaVenta` DATE NULL DEFAULT NULL,
  `TotalVenta` FLOAT NULL DEFAULT NULL,
  `cantidad` INT NULL,
  `Clientes_idCliente` INT NOT NULL,
  `Trabajadores_idTrabajador` INT NOT NULL,
  `Pasteles_idPastel` INT NOT NULL,
  PRIMARY KEY (`idVenta`),
  INDEX `fk_ventas_clientes1_idx` (`Clientes_idCliente` ASC) VISIBLE,
  INDEX `fk_ventas_Trabajadores1_idx` (`Trabajadores_idTrabajador` ASC) VISIBLE,
  INDEX `fk_Pedidos_Pasteles1_idx` (`Pasteles_idPastel` ASC) VISIBLE)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb422
COLLATE = utf8mb4_0900_ai_ci;

-- -----------------------------------------------------
-- Table `pasteleria_perla`.`desgloce_Pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pasteleria_perla`.`desgloce_Pedidos` (
  `Pasteles_idPastel` INT NOT NULL,
  `Pedidos_idVenta` INT NOT NULL,
  `Fecha` DATETIME NULL,
  `Importe` FLOAT NULL,
  PRIMARY KEY (`Pasteles_idPastel`, `Pedidos_idVenta`),
  INDEX `fk_Pasteles_has_ventas_ventas1_idx` (`Pedidos_idVenta` ASC) VISIBLE,
  INDEX `fk_Pasteles_has_ventas_Pasteles1_idx` (`Pasteles_idPastel` ASC) VISIBLE)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


--Inserción de proveedores
INSERT INTO 'pasteleria_perla'.'proveedores' ('Nombre', 'Direccion', 'Telefono', 'Email') 
VALUES ('Pastelería ABC', 'Calle Principal 123', '1234567890', 'info@pasteleriaabc.com');

-- Inserción de roles 
INSERT INTO 'pasteleria_perla'.'roles' ('idRol', 'Rol', 'Descripcion') VALUES (1, 'ADMIN', 'Este rol es para el administrador'),
(2, 'ATM', 'Este rol es para el cajero');

-- Inserción de trabajadores
INSERT INTO 'pasteleria_perla'.'trabajadores' ('Nombre','Apellido','Email','Password','Roles_idRoles') VALUES ('ADMIN', 'ADMIN','admin@example.com','admin123',1),
('ATM', 'ATM','atm@example.com','atm123',2);

-- inserción de pasteles
INSERT INTO `pasteleria_perla`.`Pasteles` (`Nombre`, `Precio`, `Costo`, `STOCK`, `Categoria`, `Reorden`, `fecha_Caducidad`, `fecha_Preparación`, `Proveedores_idProveedor`) 
VALUES ('Pastel de Chocolate', 20.99, 12.50, 50, 'Postre', 10, '2023-12-31 23:59:59', '2023-12-06 15:30:00', 1);

-- Inserción de clientes
INSERT INTO `pasteleria_perla`.`clientes` (`nombre`, `apellido`, `telefono`)
VALUES ('Juan', 'Pérez', 123456789);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
