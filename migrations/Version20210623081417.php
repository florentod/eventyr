<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210623081417 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bookings (id INT AUTO_INCREMENT NOT NULL, dateprice_id INT DEFAULT NULL, user_id INT DEFAULT NULL, comment_content LONGTEXT DEFAULT NULL, INDEX IDX_7A853C359BBB2167 (dateprice_id), INDEX IDX_7A853C35A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE countries (id INT AUTO_INCREMENT NOT NULL, country_name VARCHAR(255) NOT NULL, continent_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dates_prices (id INT AUTO_INCREMENT NOT NULL, offer_id INT DEFAULT NULL, price INT NOT NULL, start_date DATE NOT NULL, return_date DATE NOT NULL, INDEX IDX_8AC6FA3E53C674EE (offer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offers (id INT AUTO_INCREMENT NOT NULL, country_id INT DEFAULT NULL, offer_name VARCHAR(255) NOT NULL, offer_type VARCHAR(255) NOT NULL, offer_hosting VARCHAR(255) NOT NULL, offer_difficulty VARCHAR(255) NOT NULL, offer_description LONGTEXT NOT NULL, offer_map_photo VARCHAR(255) NOT NULL, offer_start_photo VARCHAR(255) NOT NULL, INDEX IDX_DA460427F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photos (id INT AUTO_INCREMENT NOT NULL, offers_id INT DEFAULT NULL, photo VARCHAR(255) NOT NULL, INDEX IDX_876E0D9A090B42E (offers_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE steps (id INT AUTO_INCREMENT NOT NULL, offers_id INT DEFAULT NULL, step_name VARCHAR(255) NOT NULL, step_order INT NOT NULL, step_description LONGTEXT NOT NULL, INDEX IDX_34220A72A090B42E (offers_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(255) DEFAULT NULL, user_civility VARCHAR(255) DEFAULT NULL, user_first_name VARCHAR(255) DEFAULT NULL, user_last_name VARCHAR(255) DEFAULT NULL, user_birthday DATE DEFAULT NULL, user_nationality VARCHAR(255) DEFAULT NULL, user_address VARCHAR(255) DEFAULT NULL, user_city VARCHAR(255) DEFAULT NULL, user_zipcode VARCHAR(255) DEFAULT NULL, user_phone INT DEFAULT NULL, user_mobile INT DEFAULT NULL, user_passport_number VARCHAR(255) DEFAULT NULL, user_passport_country VARCHAR(255) DEFAULT NULL, user_passport_date DATE DEFAULT NULL, user_photo VARCHAR(255) DEFAULT NULL, user_select_comment VARCHAR(255) DEFAULT NULL, is_verified TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_offers (user_id INT NOT NULL, offers_id INT NOT NULL, INDEX IDX_BF141F1AA76ED395 (user_id), INDEX IDX_BF141F1AA090B42E (offers_id), PRIMARY KEY(user_id, offers_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bookings ADD CONSTRAINT FK_7A853C359BBB2167 FOREIGN KEY (dateprice_id) REFERENCES dates_prices (id)');
        $this->addSql('ALTER TABLE bookings ADD CONSTRAINT FK_7A853C35A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE dates_prices ADD CONSTRAINT FK_8AC6FA3E53C674EE FOREIGN KEY (offer_id) REFERENCES offers (id)');
        $this->addSql('ALTER TABLE offers ADD CONSTRAINT FK_DA460427F92F3E70 FOREIGN KEY (country_id) REFERENCES countries (id)');
        $this->addSql('ALTER TABLE photos ADD CONSTRAINT FK_876E0D9A090B42E FOREIGN KEY (offers_id) REFERENCES offers (id)');
        $this->addSql('ALTER TABLE steps ADD CONSTRAINT FK_34220A72A090B42E FOREIGN KEY (offers_id) REFERENCES offers (id)');
        $this->addSql('ALTER TABLE user_offers ADD CONSTRAINT FK_BF141F1AA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_offers ADD CONSTRAINT FK_BF141F1AA090B42E FOREIGN KEY (offers_id) REFERENCES offers (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offers DROP FOREIGN KEY FK_DA460427F92F3E70');
        $this->addSql('ALTER TABLE bookings DROP FOREIGN KEY FK_7A853C359BBB2167');
        $this->addSql('ALTER TABLE dates_prices DROP FOREIGN KEY FK_8AC6FA3E53C674EE');
        $this->addSql('ALTER TABLE photos DROP FOREIGN KEY FK_876E0D9A090B42E');
        $this->addSql('ALTER TABLE steps DROP FOREIGN KEY FK_34220A72A090B42E');
        $this->addSql('ALTER TABLE user_offers DROP FOREIGN KEY FK_BF141F1AA090B42E');
        $this->addSql('ALTER TABLE bookings DROP FOREIGN KEY FK_7A853C35A76ED395');
        $this->addSql('ALTER TABLE user_offers DROP FOREIGN KEY FK_BF141F1AA76ED395');
        $this->addSql('DROP TABLE bookings');
        $this->addSql('DROP TABLE countries');
        $this->addSql('DROP TABLE dates_prices');
        $this->addSql('DROP TABLE offers');
        $this->addSql('DROP TABLE photos');
        $this->addSql('DROP TABLE steps');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE user_offers');
    }
}
