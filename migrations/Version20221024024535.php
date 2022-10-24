<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221024024535 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adherant DROP FOREIGN KEY FK_97DA58BC9032262A');
        $this->addSql('ALTER TABLE adherant DROP FOREIGN KEY FK_97DA58BCE7A1254A');
        $this->addSql('DROP INDEX IDX_97DA58BC9032262A ON adherant');
        $this->addSql('DROP INDEX UNIQ_97DA58BCE7A1254A ON adherant');
        $this->addSql('ALTER TABLE adherant DROP contact_id, DROP contact_urgence_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adherant ADD contact_id INT DEFAULT NULL, ADD contact_urgence_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adherant ADD CONSTRAINT FK_97DA58BC9032262A FOREIGN KEY (contact_urgence_id) REFERENCES contact_urgence (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE adherant ADD CONSTRAINT FK_97DA58BCE7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_97DA58BC9032262A ON adherant (contact_urgence_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_97DA58BCE7A1254A ON adherant (contact_id)');
    }
}
