SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`evento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  `tag` VARCHAR(45) NOT NULL,
  `data_inicial` DATE NOT NULL,
  `data_final` DATE NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`endereco` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `logradouro` VARCHAR(200) NOT NULL,
  `bairro` VARCHAR(45) NOT NULL,
  `uf` VARCHAR(2) NOT NULL,
  `cep` INT(8) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`cliente` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cnpj` INT(11) NOT NULL,
  `razao_social` VARCHAR(100) NOT NULL,
  `nome_fantasia` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `endereco_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cnpj_UNIQUE` (`cnpj` ASC),
  UNIQUE INDEX `nome_fantasia_UNIQUE` (`nome_fantasia` ASC),
  UNIQUE INDEX `razao_social_UNIQUE` (`razao_social` ASC),
  INDEX `fk_cliente_endereco_idx` (`endereco_id` ASC),
  CONSTRAINT `fk_cliente_endereco`
    FOREIGN KEY (`endereco_id`)
    REFERENCES `mydb`.`endereco` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`evento_has_cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`evento_has_cliente` (
  `evento_id` INT NOT NULL,
  `cliente_id` INT NOT NULL,
  PRIMARY KEY (`evento_id`, `cliente_id`),
  INDEX `fk_evento_has_cliente_cliente1_idx` (`cliente_id` ASC),
  INDEX `fk_evento_has_cliente_evento1_idx` (`evento_id` ASC),
  CONSTRAINT `fk_evento_has_cliente_evento1`
    FOREIGN KEY (`evento_id`)
    REFERENCES `mydb`.`evento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_has_cliente_cliente1`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `mydb`.`cliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`pesquisa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`pesquisa` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`periodo_evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`periodo_evento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data_inicial` DATETIME NOT NULL,
  `data_final` DATETIME NOT NULL,
  `evento_id` INT NOT NULL,
  `pesquisa_id` INT NOT NULL,
  PRIMARY KEY (`id`, `evento_id`),
  INDEX `fk_periodo_evento_evento1_idx` (`evento_id` ASC),
  INDEX `fk_periodo_evento_pesquisa1_idx` (`pesquisa_id` ASC),
  CONSTRAINT `fk_periodo_evento_evento1`
    FOREIGN KEY (`evento_id`)
    REFERENCES `mydb`.`evento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_periodo_evento_pesquisa1`
    FOREIGN KEY (`pesquisa_id`)
    REFERENCES `mydb`.`pesquisa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`prestadora`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`prestadora` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cnpj` INT(11) NOT NULL,
  `razao_social` VARCHAR(100) NOT NULL,
  `nome_fantasia` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `endereco_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cnpj_UNIQUE` (`cnpj` ASC),
  UNIQUE INDEX `nome_fantasia_UNIQUE` (`nome_fantasia` ASC),
  UNIQUE INDEX `razao_social_UNIQUE` (`razao_social` ASC),
  INDEX `fk_cliente_endereco_idx` (`endereco_id` ASC),
  CONSTRAINT `fk_cliente_endereco0`
    FOREIGN KEY (`endereco_id`)
    REFERENCES `mydb`.`endereco` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`segmento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`segmento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`categoria` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `segmento_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_categoria_segmento1_idx` (`segmento_id` ASC),
  CONSTRAINT `fk_categoria_segmento1`
    FOREIGN KEY (`segmento_id`)
    REFERENCES `mydb`.`segmento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`sub_categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`sub_categoria` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NULL,
  `categoria_id` INT NOT NULL,
  PRIMARY KEY (`id`, `categoria_id`),
  INDEX `fk_sub_categoria_categoria1_idx` (`categoria_id` ASC),
  CONSTRAINT `fk_sub_categoria_categoria1`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `mydb`.`categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`pesquisa_sub_categoria_prestadora`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`pesquisa_sub_categoria_prestadora` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `sub_categoria_id` INT NOT NULL,
  `pesquisa_id` INT NOT NULL,
  `prestadora_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_pesquisa_sub_categoria_prestadora_sub_categoria1_idx` (`sub_categoria_id` ASC),
  INDEX `fk_pesquisa_sub_categoria_prestadora_pesquisa1_idx` (`pesquisa_id` ASC),
  INDEX `fk_pesquisa_sub_categoria_prestadora_prestadora1_idx` (`prestadora_id` ASC),
  UNIQUE INDEX `sub_categoria_id_UNIQUE` (`sub_categoria_id` ASC),
  UNIQUE INDEX `pesquisa_id_UNIQUE` (`pesquisa_id` ASC),
  UNIQUE INDEX `prestadora_id_UNIQUE` (`prestadora_id` ASC),
  CONSTRAINT `fk_pesquisa_sub_categoria_prestadora_sub_categoria1`
    FOREIGN KEY (`sub_categoria_id`)
    REFERENCES `mydb`.`sub_categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pesquisa_sub_categoria_prestadora_pesquisa1`
    FOREIGN KEY (`pesquisa_id`)
    REFERENCES `mydb`.`pesquisa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pesquisa_sub_categoria_prestadora_prestadora1`
    FOREIGN KEY (`prestadora_id`)
    REFERENCES `mydb`.`prestadora` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`resultado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`resultado` (
  `id` INT NOT NULL,
  `voto` INT NOT NULL,
  `cliente_id` INT NOT NULL,
  `pesquisa_sub_categoria_prestadora_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_resultado_cliente1_idx` (`cliente_id` ASC),
  INDEX `fk_resultado_pesquisa_sub_categoria_prestadora1_idx` (`pesquisa_sub_categoria_prestadora_id` ASC),
  CONSTRAINT `fk_resultado_cliente1`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `mydb`.`cliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_resultado_pesquisa_sub_categoria_prestadora1`
    FOREIGN KEY (`pesquisa_sub_categoria_prestadora_id`)
    REFERENCES `mydb`.`pesquisa_sub_categoria_prestadora` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
