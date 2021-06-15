<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210615130635 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bookings (id INT AUTO_INCREMENT NOT NULL, comment_content LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE countries (id INT AUTO_INCREMENT NOT NULL, country_name VARCHAR(255) NOT NULL, continent_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dates_prices (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offers (id INT AUTO_INCREMENT NOT NULL, offer_name VARCHAR(255) NOT NULL, offer_type VARCHAR(255) NOT NULL, offer_hosting VARCHAR(255) NOT NULL, offer_difficulty VARCHAR(255) NOT NULL, offer_description LONGTEXT NOT NULL, offer_map_photo VARCHAR(255) NOT NULL, offer_start_photo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photos (id INT AUTO_INCREMENT NOT NULL, photo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE steps (id INT AUTO_INCREMENT NOT NULL, step_name VARCHAR(255) NOT NULL, step_order INT NOT NULL, step_description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, user_civility VARCHAR(255) NOT NULL, user_first_name VARCHAR(255) NOT NULL, user_last_name VARCHAR(255) NOT NULL, user_birthday DATE NOT NULL, user_nationality VARCHAR(255) NOT NULL, user_address VARCHAR(255) NOT NULL, user_city VARCHAR(255) NOT NULL, user_zipcode VARCHAR(255) NOT NULL, user_phone INT NOT NULL, user_mobile INT NOT NULL, user_passport_number VARCHAR(255) NOT NULL, user_passport_country VARCHAR(255) NOT NULL, user_passport_date DATE NOT NULL, user_photo VARCHAR(255) NOT NULL, user_select_comment VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE bookings');
        $this->addSql('DROP TABLE countries');
        $this->addSql('DROP TABLE dates_prices');
        $this->addSql('DROP TABLE offers');
        $this->addSql('DROP TABLE photos');
        $this->addSql('DROP TABLE steps');
        $this->addSql('DROP TABLE `user`');
    }
}
