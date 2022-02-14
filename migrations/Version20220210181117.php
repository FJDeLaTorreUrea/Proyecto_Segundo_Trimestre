<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220210181117 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fotos (id INT AUTO_INCREMENT NOT NULL, tipo_id INT NOT NULL, nombre VARCHAR(80) NOT NULL, INDEX IDX_CB8405C7A9276E6C (tipo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE habitacion (id INT AUTO_INCREMENT NOT NULL, tipo_id INT NOT NULL, n_habitacion INT NOT NULL, adultos INT NOT NULL, menores INT NOT NULL, camas INT NOT NULL, precio_temporada_alta DOUBLE PRECISION NOT NULL, precio_temporada_media DOUBLE PRECISION NOT NULL, precio_temporada_baja DOUBLE PRECISION NOT NULL, INDEX IDX_F45995BAA9276E6C (tipo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nacionalidad (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(80) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reserva (id INT AUTO_INCREMENT NOT NULL, nacionalidad_id INT NOT NULL, habitacion_id INT NOT NULL, usuario_id INT DEFAULT NULL, fecha_reserva DATE NOT NULL, fecha_inicio DATE NOT NULL, fecha_fin DATE NOT NULL, nombre VARCHAR(70) NOT NULL, apellidos VARCHAR(90) NOT NULL, telefono VARCHAR(20) NOT NULL, email VARCHAR(60) NOT NULL, fecha_nacimiento DATE NOT NULL, direccion VARCHAR(70) NOT NULL, desayuno TINYINT(1) NOT NULL, comida TINYINT(1) NOT NULL, cena TINYINT(1) NOT NULL, gim_spa TINYINT(1) NOT NULL, precio_final DOUBLE PRECISION NOT NULL, INDEX IDX_188D2E3BAB8DC0F8 (nacionalidad_id), UNIQUE INDEX UNIQ_188D2E3BB009290D (habitacion_id), INDEX IDX_188D2E3BDB38439E (usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE temporada (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(30) NOT NULL, fecha_inicio DATE NOT NULL, fecha_fin DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_habitacion (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(40) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, nacionalidad_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nombre VARCHAR(70) NOT NULL, apellidos VARCHAR(90) NOT NULL, telefono VARCHAR(20) NOT NULL, fecha_nacimiento DATE NOT NULL, direccion VARCHAR(80) NOT NULL, UNIQUE INDEX UNIQ_2265B05DE7927C74 (email), INDEX IDX_2265B05DAB8DC0F8 (nacionalidad_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fotos ADD CONSTRAINT FK_CB8405C7A9276E6C FOREIGN KEY (tipo_id) REFERENCES tipo_habitacion (id)');
        $this->addSql('ALTER TABLE habitacion ADD CONSTRAINT FK_F45995BAA9276E6C FOREIGN KEY (tipo_id) REFERENCES tipo_habitacion (id)');
        $this->addSql('ALTER TABLE reserva ADD CONSTRAINT FK_188D2E3BAB8DC0F8 FOREIGN KEY (nacionalidad_id) REFERENCES nacionalidad (id)');
        $this->addSql('ALTER TABLE reserva ADD CONSTRAINT FK_188D2E3BB009290D FOREIGN KEY (habitacion_id) REFERENCES habitacion (id)');
        $this->addSql('ALTER TABLE reserva ADD CONSTRAINT FK_188D2E3BDB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE usuario ADD CONSTRAINT FK_2265B05DAB8DC0F8 FOREIGN KEY (nacionalidad_id) REFERENCES nacionalidad (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reserva DROP FOREIGN KEY FK_188D2E3BB009290D');
        $this->addSql('ALTER TABLE reserva DROP FOREIGN KEY FK_188D2E3BAB8DC0F8');
        $this->addSql('ALTER TABLE usuario DROP FOREIGN KEY FK_2265B05DAB8DC0F8');
        $this->addSql('ALTER TABLE fotos DROP FOREIGN KEY FK_CB8405C7A9276E6C');
        $this->addSql('ALTER TABLE habitacion DROP FOREIGN KEY FK_F45995BAA9276E6C');
        $this->addSql('ALTER TABLE reserva DROP FOREIGN KEY FK_188D2E3BDB38439E');
        $this->addSql('DROP TABLE fotos');
        $this->addSql('DROP TABLE habitacion');
        $this->addSql('DROP TABLE nacionalidad');
        $this->addSql('DROP TABLE reserva');
        $this->addSql('DROP TABLE temporada');
        $this->addSql('DROP TABLE tipo_habitacion');
        $this->addSql('DROP TABLE usuario');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
