<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210628183615 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offers ADD type_hosting VARCHAR(255) NOT NULL, ADD description_hosting VARCHAR(255) NOT NULL, ADD type_food VARCHAR(255) NOT NULL, ADD description_food LONGTEXT NOT NULL, ADD start_point VARCHAR(255) NOT NULL, ADD end_point VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE is_verified is_verified TINYINT(1) DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offers DROP type_hosting, DROP description_hosting, DROP type_food, DROP description_food, DROP start_point, DROP end_point');
        $this->addSql('ALTER TABLE `user` CHANGE is_verified is_verified TINYINT(1) NOT NULL, CHANGE created_at created_at DATETIME NOT NULL');
    }
}
