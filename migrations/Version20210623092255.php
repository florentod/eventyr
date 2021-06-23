<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210623092255 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bookings ADD CONSTRAINT FK_7A853C359BBB2167 FOREIGN KEY (dateprice_id) REFERENCES dates_prices (id)');
        $this->addSql('ALTER TABLE bookings ADD CONSTRAINT FK_7A853C35A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE dates_prices ADD CONSTRAINT FK_8AC6FA3E53C674EE FOREIGN KEY (offer_id) REFERENCES offers (id)');
        $this->addSql('ALTER TABLE offers ADD CONSTRAINT FK_DA460427F92F3E70 FOREIGN KEY (country_id) REFERENCES countries (id)');
        $this->addSql('ALTER TABLE photos ADD CONSTRAINT FK_876E0D9A090B42E FOREIGN KEY (offers_id) REFERENCES offers (id)');
        $this->addSql('ALTER TABLE steps ADD CONSTRAINT FK_34220A72A090B42E FOREIGN KEY (offers_id) REFERENCES offers (id)');
        $this->addSql('ALTER TABLE user CHANGE user_phone user_phone VARCHAR(255) DEFAULT NULL, CHANGE user_mobile user_mobile VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user_offers ADD CONSTRAINT FK_BF141F1AA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_offers ADD CONSTRAINT FK_BF141F1AA090B42E FOREIGN KEY (offers_id) REFERENCES offers (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bookings DROP FOREIGN KEY FK_7A853C359BBB2167');
        $this->addSql('ALTER TABLE bookings DROP FOREIGN KEY FK_7A853C35A76ED395');
        $this->addSql('ALTER TABLE dates_prices DROP FOREIGN KEY FK_8AC6FA3E53C674EE');
        $this->addSql('ALTER TABLE offers DROP FOREIGN KEY FK_DA460427F92F3E70');
        $this->addSql('ALTER TABLE photos DROP FOREIGN KEY FK_876E0D9A090B42E');
        $this->addSql('ALTER TABLE steps DROP FOREIGN KEY FK_34220A72A090B42E');
        $this->addSql('ALTER TABLE `user` CHANGE user_phone user_phone INT DEFAULT NULL, CHANGE user_mobile user_mobile INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user_offers DROP FOREIGN KEY FK_BF141F1AA76ED395');
        $this->addSql('ALTER TABLE user_offers DROP FOREIGN KEY FK_BF141F1AA090B42E');
    }
}
