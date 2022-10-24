<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221024043421 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE grade (id INT AUTO_INCREMENT NOT NULL, grade VARCHAR(255) NOT NULL, centure VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE role_club ADD grade_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE role_club ADD CONSTRAINT FK_6514AE6FE19A1A8 FOREIGN KEY (grade_id) REFERENCES grade (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6514AE6FE19A1A8 ON role_club (grade_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE role_club DROP FOREIGN KEY FK_6514AE6FE19A1A8');
        $this->addSql('DROP TABLE grade');
        $this->addSql('DROP INDEX UNIQ_6514AE6FE19A1A8 ON role_club');
        $this->addSql('ALTER TABLE role_club DROP grade_id');
    }
}
