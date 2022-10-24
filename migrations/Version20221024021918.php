<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221024021918 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE evenement_adherant (evenement_id INT NOT NULL, adherant_id INT NOT NULL, INDEX IDX_18BCC354FD02F13 (evenement_id), INDEX IDX_18BCC354BE612E45 (adherant_id), PRIMARY KEY(evenement_id, adherant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE evenement_adherant ADD CONSTRAINT FK_18BCC354FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evenement_adherant ADD CONSTRAINT FK_18BCC354BE612E45 FOREIGN KEY (adherant_id) REFERENCES adherant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE administratif ADD enfant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE administratif ADD CONSTRAINT FK_145F75AA450D2529 FOREIGN KEY (enfant_id) REFERENCES enfant (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_145F75AA450D2529 ON administratif (enfant_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenement_adherant DROP FOREIGN KEY FK_18BCC354FD02F13');
        $this->addSql('ALTER TABLE evenement_adherant DROP FOREIGN KEY FK_18BCC354BE612E45');
        $this->addSql('DROP TABLE evenement_adherant');
        $this->addSql('ALTER TABLE administratif DROP FOREIGN KEY FK_145F75AA450D2529');
        $this->addSql('DROP INDEX UNIQ_145F75AA450D2529 ON administratif');
        $this->addSql('ALTER TABLE administratif DROP enfant_id');
    }
}
