<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210615132049 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dates_prices ADD offer_id INT DEFAULT NULL');
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
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dates_prices DROP FOREIGN KEY FK_8AC6FA3E53C674EE');
        $this->addSql('DROP INDEX IDX_8AC6FA3E53C674EE ON dates_prices');
        $this->addSql('ALTER TABLE dates_prices DROP offer_id');
        $this->addSql('ALTER TABLE offers DROP FOREIGN KEY FK_DA460427F92F3E70');
        $this->addSql('DROP INDEX IDX_DA460427F92F3E70 ON offers');
        $this->addSql('ALTER TABLE offers DROP country_id');
        $this->addSql('ALTER TABLE photos DROP FOREIGN KEY FK_876E0D9A090B42E');
        $this->addSql('DROP INDEX IDX_876E0D9A090B42E ON photos');
        $this->addSql('ALTER TABLE photos DROP offers_id');
        $this->addSql('ALTER TABLE steps DROP FOREIGN KEY FK_34220A72A090B42E');
        $this->addSql('DROP INDEX IDX_34220A72A090B42E ON steps');
        $this->addSql('ALTER TABLE steps DROP offers_id');
    }
}
