<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221023233100 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adherant ADD contact_id INT DEFAULT NULL, ADD contact_urgence_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adherant ADD CONSTRAINT FK_97DA58BCE7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id)');
        $this->addSql('ALTER TABLE adherant ADD CONSTRAINT FK_97DA58BC9032262A FOREIGN KEY (contact_urgence_id) REFERENCES contact_urgence (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_97DA58BCE7A1254A ON adherant (contact_id)');
        $this->addSql('CREATE INDEX IDX_97DA58BC9032262A ON adherant (contact_urgence_id)');
        $this->addSql('ALTER TABLE enfant ADD parent_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE enfant ADD CONSTRAINT FK_34B70CA2727ACA70 FOREIGN KEY (parent_id) REFERENCES adherant (id)');
        $this->addSql('CREATE INDEX IDX_34B70CA2727ACA70 ON enfant (parent_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adherant DROP FOREIGN KEY FK_97DA58BCE7A1254A');
        $this->addSql('ALTER TABLE adherant DROP FOREIGN KEY FK_97DA58BC9032262A');
        $this->addSql('DROP INDEX UNIQ_97DA58BCE7A1254A ON adherant');
        $this->addSql('DROP INDEX IDX_97DA58BC9032262A ON adherant');
        $this->addSql('ALTER TABLE adherant DROP contact_id, DROP contact_urgence_id');
        $this->addSql('ALTER TABLE enfant DROP FOREIGN KEY FK_34B70CA2727ACA70');
        $this->addSql('DROP INDEX IDX_34B70CA2727ACA70 ON enfant');
        $this->addSql('ALTER TABLE enfant DROP parent_id');
    }
}
