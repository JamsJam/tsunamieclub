<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221024040107 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adherant DROP FOREIGN KEY FK_97DA58BC9032262A');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681EC54C8C93');
        $this->addSql('ALTER TABLE role_club DROP FOREIGN KEY FK_6514AE6BE612E45');
        $this->addSql('ALTER TABLE evenement_adherant DROP FOREIGN KEY FK_18BCC354BE612E45');
        $this->addSql('ALTER TABLE evenement_adherant DROP FOREIGN KEY FK_18BCC354FD02F13');
        $this->addSql('ALTER TABLE mail_adherant DROP FOREIGN KEY FK_4A0D99F4BE612E45');
        $this->addSql('ALTER TABLE mail_adherant DROP FOREIGN KEY FK_4A0D99F4C8776F01');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638BE612E45');
        $this->addSql('ALTER TABLE enfant DROP FOREIGN KEY FK_34B70CA2727ACA70');
        $this->addSql('ALTER TABLE administratif DROP FOREIGN KEY FK_145F75AABE612E45');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE role_club');
        $this->addSql('DROP TABLE evenement_adherant');
        $this->addSql('DROP TABLE mail');
        $this->addSql('DROP TABLE mail_adherant');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE enfant');
        $this->addSql('DROP TABLE type_evenement');
        $this->addSql('DROP TABLE administratif');
        $this->addSql('DROP TABLE contact_urgence');
        $this->addSql('DROP INDEX IDX_97DA58BC9032262A ON adherant');
        $this->addSql('ALTER TABLE adherant DROP contact_urgence_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date_debut DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', date_fin DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', organisateur VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_B26681EC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE role_club (id INT AUTO_INCREMENT NOT NULL, adherant_id INT DEFAULT NULL, competiteur TINYINT(1) NOT NULL, arbitre TINYINT(1) NOT NULL, commissaire_sportif TINYINT(1) NOT NULL, professeur TINYINT(1) NOT NULL, pole TINYINT(1) NOT NULL, kata TINYINT(1) NOT NULL, staff TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_6514AE6BE612E45 (adherant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE evenement_adherant (evenement_id INT NOT NULL, adherant_id INT NOT NULL, INDEX IDX_18BCC354FD02F13 (evenement_id), INDEX IDX_18BCC354BE612E45 (adherant_id), PRIMARY KEY(evenement_id, adherant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE mail (id INT AUTO_INCREMENT NOT NULL, sujet VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, message LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, send_at DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE mail_adherant (mail_id INT NOT NULL, adherant_id INT NOT NULL, INDEX IDX_4A0D99F4C8776F01 (mail_id), INDEX IDX_4A0D99F4BE612E45 (adherant_id), PRIMARY KEY(mail_id, adherant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, adherant_id INT DEFAULT NULL, adress VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, code_postal INT DEFAULT NULL, ville VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, telephone VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_4C62E638BE612E45 (adherant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE enfant (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date_de_naissance DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', sexe SMALLINT NOT NULL, INDEX IDX_34B70CA2727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE type_evenement (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE administratif (id INT AUTO_INCREMENT NOT NULL, adherant_id INT DEFAULT NULL, licence VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, certificat_medical TINYINT(1) NOT NULL, paid TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_145F75AABE612E45 (adherant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE contact_urgence (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, lien VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, telephone INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681EC54C8C93 FOREIGN KEY (type_id) REFERENCES type_evenement (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE role_club ADD CONSTRAINT FK_6514AE6BE612E45 FOREIGN KEY (adherant_id) REFERENCES adherant (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE evenement_adherant ADD CONSTRAINT FK_18BCC354BE612E45 FOREIGN KEY (adherant_id) REFERENCES adherant (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evenement_adherant ADD CONSTRAINT FK_18BCC354FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mail_adherant ADD CONSTRAINT FK_4A0D99F4BE612E45 FOREIGN KEY (adherant_id) REFERENCES adherant (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mail_adherant ADD CONSTRAINT FK_4A0D99F4C8776F01 FOREIGN KEY (mail_id) REFERENCES mail (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638BE612E45 FOREIGN KEY (adherant_id) REFERENCES adherant (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE enfant ADD CONSTRAINT FK_34B70CA2727ACA70 FOREIGN KEY (parent_id) REFERENCES adherant (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE administratif ADD CONSTRAINT FK_145F75AABE612E45 FOREIGN KEY (adherant_id) REFERENCES adherant (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE adherant ADD contact_urgence_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adherant ADD CONSTRAINT FK_97DA58BC9032262A FOREIGN KEY (contact_urgence_id) REFERENCES contact_urgence (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_97DA58BC9032262A ON adherant (contact_urgence_id)');
    }
}
