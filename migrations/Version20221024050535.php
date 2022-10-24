<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221024050535 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE administratif (id INT AUTO_INCREMENT NOT NULL, adherant_id INT DEFAULT NULL, licence VARCHAR(255) DEFAULT NULL, certificat_medical TINYINT(1) DEFAULT NULL, is_paid TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_145F75AABE612E45 (adherant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE administratif ADD CONSTRAINT FK_145F75AABE612E45 FOREIGN KEY (adherant_id) REFERENCES adherant (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE administratif DROP FOREIGN KEY FK_145F75AABE612E45');
        $this->addSql('DROP TABLE administratif');
    }
}
