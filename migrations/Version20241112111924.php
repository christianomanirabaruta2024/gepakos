<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241112111924 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE defunts CHANGE ministre ministre VARCHAR(45) DEFAULT NULL');
        $this->addSql('ALTER TABLE non_paroissiens CHANGE prenom prenom VARCHAR(30) DEFAULT NULL, CHANGE confession confession VARCHAR(40) DEFAULT NULL');
        $this->addSql('ALTER TABLE paroissiens CHANGE telephone telephone VARCHAR(20) DEFAULT NULL, CHANGE email email VARCHAR(25) DEFAULT NULL');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE defunts CHANGE ministre ministre VARCHAR(45) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\' COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE non_paroissiens CHANGE prenom prenom VARCHAR(30) DEFAULT \'NULL\', CHANGE confession confession VARCHAR(40) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE paroissiens CHANGE telephone telephone VARCHAR(20) DEFAULT \'NULL\', CHANGE email email VARCHAR(25) DEFAULT \'NULL\'');
    }
}
