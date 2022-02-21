<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220214094658 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reserva DROP FOREIGN KEY FK_188D2E3BAB8DC0F8');
        $this->addSql('DROP INDEX IDX_188D2E3BAB8DC0F8 ON reserva');
        $this->addSql('ALTER TABLE reserva DROP nacionalidad_id, DROP nombre, DROP apellidos, DROP telefono, DROP email, DROP fecha_nacimiento, DROP direccion');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fotos CHANGE nombre nombre VARCHAR(80) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE habitacion CHANGE descripcion descripcion VARCHAR(200) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE messenger_messages CHANGE body body LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE headers headers LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE queue_name queue_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE nacionalidad CHANGE nombre nombre VARCHAR(80) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE reserva ADD nacionalidad_id INT NOT NULL, ADD nombre VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD apellidos VARCHAR(90) NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD telefono VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD email VARCHAR(60) NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD fecha_nacimiento DATE NOT NULL, ADD direccion VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE reserva ADD CONSTRAINT FK_188D2E3BAB8DC0F8 FOREIGN KEY (nacionalidad_id) REFERENCES nacionalidad (id)');
        $this->addSql('CREATE INDEX IDX_188D2E3BAB8DC0F8 ON reserva (nacionalidad_id)');
        $this->addSql('ALTER TABLE temporada CHANGE nombre nombre VARCHAR(30) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE tipo_habitacion CHANGE nombre nombre VARCHAR(40) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE usuario CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nombre nombre VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE apellidos apellidos VARCHAR(90) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE telefono telefono VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE direccion direccion VARCHAR(80) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
