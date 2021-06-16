<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210616083953 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE username username VARCHAR(255) DEFAULT NULL, CHANGE user_civility user_civility VARCHAR(255) DEFAULT NULL, CHANGE user_first_name user_first_name VARCHAR(255) DEFAULT NULL, CHANGE user_last_name user_last_name VARCHAR(255) DEFAULT NULL, CHANGE user_birthday user_birthday DATE DEFAULT NULL, CHANGE user_nationality user_nationality VARCHAR(255) DEFAULT NULL, CHANGE user_address user_address VARCHAR(255) DEFAULT NULL, CHANGE user_city user_city VARCHAR(255) DEFAULT NULL, CHANGE user_zipcode user_zipcode VARCHAR(255) DEFAULT NULL, CHANGE user_phone user_phone INT DEFAULT NULL, CHANGE user_mobile user_mobile INT DEFAULT NULL, CHANGE user_passport_number user_passport_number VARCHAR(255) DEFAULT NULL, CHANGE user_passport_country user_passport_country VARCHAR(255) DEFAULT NULL, CHANGE user_passport_date user_passport_date DATE DEFAULT NULL, CHANGE user_photo user_photo VARCHAR(255) DEFAULT NULL, CHANGE user_select_comment user_select_comment VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `user` CHANGE username username VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_civility user_civility VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_first_name user_first_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_last_name user_last_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_birthday user_birthday DATE NOT NULL, CHANGE user_nationality user_nationality VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_address user_address VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_city user_city VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_zipcode user_zipcode VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_phone user_phone INT NOT NULL, CHANGE user_mobile user_mobile INT NOT NULL, CHANGE user_passport_number user_passport_number VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_passport_country user_passport_country VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_passport_date user_passport_date DATE NOT NULL, CHANGE user_photo user_photo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_select_comment user_select_comment VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
