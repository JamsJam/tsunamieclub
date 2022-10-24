<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221024054548 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mail (id INT AUTO_INCREMENT NOT NULL, sujet VARCHAR(255) DEFAULT NULL, message VARCHAR(255) DEFAULT NULL, send_at DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail_adherant (mail_id INT NOT NULL, adherant_id INT NOT NULL, INDEX IDX_4A0D99F4C8776F01 (mail_id), INDEX IDX_4A0D99F4BE612E45 (adherant_id), PRIMARY KEY(mail_id, adherant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mail_adherant ADD CONSTRAINT FK_4A0D99F4C8776F01 FOREIGN KEY (mail_id) REFERENCES mail (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mail_adherant ADD CONSTRAINT FK_4A0D99F4BE612E45 FOREIGN KEY (adherant_id) REFERENCES adherant (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mail_adherant DROP FOREIGN KEY FK_4A0D99F4C8776F01');
        $this->addSql('ALTER TABLE mail_adherant DROP FOREIGN KEY FK_4A0D99F4BE612E45');
        $this->addSql('DROP TABLE mail');
        $this->addSql('DROP TABLE mail_adherant');
    }
}
