<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221024042407 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE role_club (id INT AUTO_INCREMENT NOT NULL, adherant_id INT DEFAULT NULL, competiteur TINYINT(1) DEFAULT NULL, arbitre TINYINT(1) DEFAULT NULL, commissaire TINYINT(1) DEFAULT NULL, professeur TINYINT(1) DEFAULT NULL, pole TINYINT(1) DEFAULT NULL, kata TINYINT(1) DEFAULT NULL, staf TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_6514AE6BE612E45 (adherant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE role_club ADD CONSTRAINT FK_6514AE6BE612E45 FOREIGN KEY (adherant_id) REFERENCES adherant (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE role_club DROP FOREIGN KEY FK_6514AE6BE612E45');
        $this->addSql('DROP TABLE role_club');
    }
}
