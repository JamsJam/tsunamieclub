<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221024041557 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE urgence (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, lien VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adherant ADD urgence_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adherant ADD CONSTRAINT FK_97DA58BC578B7FBD FOREIGN KEY (urgence_id) REFERENCES urgence (id)');
        $this->addSql('CREATE INDEX IDX_97DA58BC578B7FBD ON adherant (urgence_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adherant DROP FOREIGN KEY FK_97DA58BC578B7FBD');
        $this->addSql('DROP TABLE urgence');
        $this->addSql('DROP INDEX IDX_97DA58BC578B7FBD ON adherant');
        $this->addSql('ALTER TABLE adherant DROP urgence_id');
    }
}
