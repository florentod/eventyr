<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210622140808 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_offers (user_id INT NOT NULL, offers_id INT NOT NULL, INDEX IDX_BF141F1AA76ED395 (user_id), INDEX IDX_BF141F1AA090B42E (offers_id), PRIMARY KEY(user_id, offers_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_offers ADD CONSTRAINT FK_BF141F1AA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_offers ADD CONSTRAINT FK_BF141F1AA090B42E FOREIGN KEY (offers_id) REFERENCES offers (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bookings ADD dateprice_id INT DEFAULT NULL, ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bookings ADD CONSTRAINT FK_7A853C359BBB2167 FOREIGN KEY (dateprice_id) REFERENCES dates_prices (id)');
        $this->addSql('ALTER TABLE bookings ADD CONSTRAINT FK_7A853C35A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_7A853C359BBB2167 ON bookings (dateprice_id)');
        $this->addSql('CREATE INDEX IDX_7A853C35A76ED395 ON bookings (user_id)');
        $this->addSql('ALTER TABLE dates_prices ADD offer_id INT DEFAULT NULL, ADD price INT NOT NULL, ADD start_date DATE NOT NULL, ADD return_date DATE NOT NULL');
        $this->addSql('ALTER TABLE dates_prices ADD CONSTRAINT FK_8AC6FA3E53C674EE FOREIGN KEY (offer_id) REFERENCES offers (id)');
        $this->addSql('CREATE INDEX IDX_8AC6FA3E53C674EE ON dates_prices (offer_id)');
        $this->addSql('ALTER TABLE offers ADD country_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offers ADD CONSTRAINT FK_DA460427F92F3E70 FOREIGN KEY (country_id) REFERENCES countries (id)');
        $this->addSql('CREATE INDEX IDX_DA460427F92F3E70 ON offers (country_id)');
        $this->addSql('ALTER TABLE photos ADD offers_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photos ADD CONSTRAINT FK_876E0D9A090B42E FOREIGN KEY (offers_id) REFERENCES offers (id)');
        $this->addSql('CREATE INDEX IDX_876E0D9A090B42E ON photos (offers_id)');
        $this->addSql('ALTER TABLE steps ADD offers_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE steps ADD CONSTRAINT FK_34220A72A090B42E FOREIGN KEY (offers_id) REFERENCES offers (id)');
        $this->addSql('CREATE INDEX IDX_34220A72A090B42E ON steps (offers_id)');
        $this->addSql('ALTER TABLE user ADD is_verified TINYINT(1) NOT NULL, CHANGE username username VARCHAR(255) DEFAULT NULL, CHANGE user_civility user_civility VARCHAR(255) DEFAULT NULL, CHANGE user_first_name user_first_name VARCHAR(255) DEFAULT NULL, CHANGE user_last_name user_last_name VARCHAR(255) DEFAULT NULL, CHANGE user_birthday user_birthday DATE DEFAULT NULL, CHANGE user_nationality user_nationality VARCHAR(255) DEFAULT NULL, CHANGE user_address user_address VARCHAR(255) DEFAULT NULL, CHANGE user_city user_city VARCHAR(255) DEFAULT NULL, CHANGE user_zipcode user_zipcode VARCHAR(255) DEFAULT NULL, CHANGE user_phone user_phone INT DEFAULT NULL, CHANGE user_mobile user_mobile INT DEFAULT NULL, CHANGE user_passport_number user_passport_number VARCHAR(255) DEFAULT NULL, CHANGE user_passport_country user_passport_country VARCHAR(255) DEFAULT NULL, CHANGE user_passport_date user_passport_date DATE DEFAULT NULL, CHANGE user_photo user_photo VARCHAR(255) DEFAULT NULL, CHANGE user_select_comment user_select_comment VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user_offers');
        $this->addSql('ALTER TABLE bookings DROP FOREIGN KEY FK_7A853C359BBB2167');
        $this->addSql('ALTER TABLE bookings DROP FOREIGN KEY FK_7A853C35A76ED395');
        $this->addSql('DROP INDEX IDX_7A853C359BBB2167 ON bookings');
        $this->addSql('DROP INDEX IDX_7A853C35A76ED395 ON bookings');
        $this->addSql('ALTER TABLE bookings DROP dateprice_id, DROP user_id');
        $this->addSql('ALTER TABLE dates_prices DROP FOREIGN KEY FK_8AC6FA3E53C674EE');
        $this->addSql('DROP INDEX IDX_8AC6FA3E53C674EE ON dates_prices');
        $this->addSql('ALTER TABLE dates_prices DROP offer_id, DROP price, DROP start_date, DROP return_date');
        $this->addSql('ALTER TABLE offers DROP FOREIGN KEY FK_DA460427F92F3E70');
        $this->addSql('DROP INDEX IDX_DA460427F92F3E70 ON offers');
        $this->addSql('ALTER TABLE offers DROP country_id');
        $this->addSql('ALTER TABLE photos DROP FOREIGN KEY FK_876E0D9A090B42E');
        $this->addSql('DROP INDEX IDX_876E0D9A090B42E ON photos');
        $this->addSql('ALTER TABLE photos DROP offers_id');
        $this->addSql('ALTER TABLE steps DROP FOREIGN KEY FK_34220A72A090B42E');
        $this->addSql('DROP INDEX IDX_34220A72A090B42E ON steps');
        $this->addSql('ALTER TABLE steps DROP offers_id');
        $this->addSql('ALTER TABLE `user` DROP is_verified, CHANGE username username VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_civility user_civility VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_first_name user_first_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_last_name user_last_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_birthday user_birthday DATE NOT NULL, CHANGE user_nationality user_nationality VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_address user_address VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_city user_city VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_zipcode user_zipcode VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_phone user_phone INT NOT NULL, CHANGE user_mobile user_mobile INT NOT NULL, CHANGE user_passport_number user_passport_number VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_passport_country user_passport_country VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_passport_date user_passport_date DATE NOT NULL, CHANGE user_photo user_photo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_select_comment user_select_comment VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
