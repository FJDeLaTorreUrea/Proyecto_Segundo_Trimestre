<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220211130531 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fotos DROP FOREIGN KEY FK_CB8405C7A9276E6C');
        $this->addSql('DROP INDEX IDX_CB8405C7A9276E6C ON fotos');
        $this->addSql('ALTER TABLE fotos CHANGE tipo_id habitacion_id INT NOT NULL');
        $this->addSql('ALTER TABLE fotos ADD CONSTRAINT FK_CB8405C7B009290D FOREIGN KEY (habitacion_id) REFERENCES habitacion (id)');
        $this->addSql('CREATE INDEX IDX_CB8405C7B009290D ON fotos (habitacion_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fotos DROP FOREIGN KEY FK_CB8405C7B009290D');
        $this->addSql('DROP INDEX IDX_CB8405C7B009290D ON fotos');
        $this->addSql('ALTER TABLE fotos CHANGE nombre nombre VARCHAR(80) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE habitacion_id tipo_id INT NOT NULL');
        $this->addSql('ALTER TABLE fotos ADD CONSTRAINT FK_CB8405C7A9276E6C FOREIGN KEY (tipo_id) REFERENCES tipo_habitacion (id)');
        $this->addSql('CREATE INDEX IDX_CB8405C7A9276E6C ON fotos (tipo_id)');
        $this->addSql('ALTER TABLE habitacion CHANGE descripcion descripcion VARCHAR(200) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE messenger_messages CHANGE body body LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE headers headers LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE queue_name queue_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE nacionalidad CHANGE nombre nombre VARCHAR(80) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE reserva CHANGE nombre nombre VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE apellidos apellidos VARCHAR(90) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE telefono telefono VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(60) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE direccion direccion VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE temporada CHANGE nombre nombre VARCHAR(30) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE tipo_habitacion CHANGE nombre nombre VARCHAR(40) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE usuario CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nombre nombre VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE apellidos apellidos VARCHAR(90) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE telefono telefono VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE direccion direccion VARCHAR(80) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
