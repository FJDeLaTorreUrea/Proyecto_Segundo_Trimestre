<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220210182011 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE usuario ADD is_verified TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fotos CHANGE nombre nombre VARCHAR(80) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE messenger_messages CHANGE body body LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE headers headers LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE queue_name queue_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE nacionalidad CHANGE nombre nombre VARCHAR(80) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE reserva CHANGE nombre nombre VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE apellidos apellidos VARCHAR(90) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE telefono telefono VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(60) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE direccion direccion VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE temporada CHANGE nombre nombre VARCHAR(30) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE tipo_habitacion CHANGE nombre nombre VARCHAR(40) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE usuario DROP is_verified, CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nombre nombre VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE apellidos apellidos VARCHAR(90) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE telefono telefono VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE direccion direccion VARCHAR(80) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
