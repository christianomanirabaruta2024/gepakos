<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241114035101 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE authentifications (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(50) NOT NULL, password VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_B82F28B2E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnels (id_personnel BIGINT NOT NULL, id_paroissien BIGINT DEFAULT NULL, id_non_paroissien BIGINT DEFAULT NULL, titres VARCHAR(50) NOT NULL, INDEX IDX_7AC38C2B755FBAD2 (id_paroissien), INDEX IDX_7AC38C2B9B62D584 (id_non_paroissien), PRIMARY KEY(id_personnel)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE personnels ADD CONSTRAINT FK_7AC38C2B755FBAD2 FOREIGN KEY (id_paroissien) REFERENCES paroissiens (id_paroissien)');
        $this->addSql('ALTER TABLE personnels ADD CONSTRAINT FK_7AC38C2B9B62D584 FOREIGN KEY (id_non_paroissien) REFERENCES non_paroissiens (id_non_paroissien)');
        $this->addSql('ALTER TABLE defunts CHANGE ministre ministre VARCHAR(45) DEFAULT NULL');
        $this->addSql('ALTER TABLE non_paroissiens CHANGE prenom prenom VARCHAR(30) DEFAULT NULL, CHANGE confession confession VARCHAR(40) DEFAULT NULL');
        $this->addSql('ALTER TABLE paroissiens CHANGE telephone telephone VARCHAR(20) DEFAULT NULL, CHANGE email email VARCHAR(25) DEFAULT NULL');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personnels DROP FOREIGN KEY FK_7AC38C2B755FBAD2');
        $this->addSql('ALTER TABLE personnels DROP FOREIGN KEY FK_7AC38C2B9B62D584');
        $this->addSql('DROP TABLE authentifications');
        $this->addSql('DROP TABLE personnels');
        $this->addSql('ALTER TABLE defunts CHANGE ministre ministre VARCHAR(45) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\' COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE non_paroissiens CHANGE prenom prenom VARCHAR(30) DEFAULT \'NULL\', CHANGE confession confession VARCHAR(40) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE paroissiens CHANGE telephone telephone VARCHAR(20) DEFAULT \'NULL\', CHANGE email email VARCHAR(25) DEFAULT \'NULL\'');
    }
}
