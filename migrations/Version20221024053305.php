<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221024053305 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE role_club ADD enfant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE role_club ADD CONSTRAINT FK_6514AE6450D2529 FOREIGN KEY (enfant_id) REFERENCES enfant (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6514AE6450D2529 ON role_club (enfant_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE role_club DROP FOREIGN KEY FK_6514AE6450D2529');
        $this->addSql('DROP INDEX UNIQ_6514AE6450D2529 ON role_club');
        $this->addSql('ALTER TABLE role_club DROP enfant_id');
    }
}
