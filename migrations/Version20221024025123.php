<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221024025123 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adherant ADD contact_urgence_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adherant ADD CONSTRAINT FK_97DA58BC9032262A FOREIGN KEY (contact_urgence_id) REFERENCES contact_urgence (id)');
        $this->addSql('CREATE INDEX IDX_97DA58BC9032262A ON adherant (contact_urgence_id)');
        $this->addSql('ALTER TABLE contact ADD adherant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638BE612E45 FOREIGN KEY (adherant_id) REFERENCES adherant (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4C62E638BE612E45 ON contact (adherant_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adherant DROP FOREIGN KEY FK_97DA58BC9032262A');
        $this->addSql('DROP INDEX IDX_97DA58BC9032262A ON adherant');
        $this->addSql('ALTER TABLE adherant DROP contact_urgence_id');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638BE612E45');
        $this->addSql('DROP INDEX UNIQ_4C62E638BE612E45 ON contact');
        $this->addSql('ALTER TABLE contact DROP adherant_id');
    }
}
