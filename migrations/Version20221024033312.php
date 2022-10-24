<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221024033312 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE administratif DROP FOREIGN KEY FK_145F75AA450D2529');
        $this->addSql('DROP INDEX UNIQ_145F75AA450D2529 ON administratif');
        $this->addSql('ALTER TABLE administratif DROP enfant_id');
        $this->addSql('ALTER TABLE role_club DROP FOREIGN KEY FK_6514AE6450D2529');
        $this->addSql('DROP INDEX UNIQ_6514AE6450D2529 ON role_club');
        $this->addSql('ALTER TABLE role_club DROP enfant_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE role_club ADD enfant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE role_club ADD CONSTRAINT FK_6514AE6450D2529 FOREIGN KEY (enfant_id) REFERENCES enfant (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6514AE6450D2529 ON role_club (enfant_id)');
        $this->addSql('ALTER TABLE administratif ADD enfant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE administratif ADD CONSTRAINT FK_145F75AA450D2529 FOREIGN KEY (enfant_id) REFERENCES enfant (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_145F75AA450D2529 ON administratif (enfant_id)');
    }
}
