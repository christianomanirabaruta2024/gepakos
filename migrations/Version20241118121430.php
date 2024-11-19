<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241118121430 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE baptemes DROP FOREIGN KEY FK_402C94169C29AAE1');
        $this->addSql('DROP INDEX IDX_402C94169C29AAE1 ON baptemes');
        $this->addSql('ALTER TABLE baptemes ADD bapteme_status VARCHAR(10) NOT NULL, CHANGE parrain parrain BIGINT DEFAULT NULL, CHANGE marraine marraine BIGINT DEFAULT NULL, CHANGE mere mere BIGINT DEFAULT NULL, CHANGE pere pere BIGINT DEFAULT NULL, CHANGE mere_on_paroissien mere_non_paroissien BIGINT DEFAULT NULL');
        $this->addSql('ALTER TABLE baptemes ADD CONSTRAINT FK_402C9416DBA05214 FOREIGN KEY (mere_non_paroissien) REFERENCES non_paroissiens (id_non_paroissien)');
        $this->addSql('CREATE INDEX IDX_402C9416DBA05214 ON baptemes (mere_non_paroissien)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE baptemes DROP FOREIGN KEY FK_402C9416DBA05214');
        $this->addSql('DROP INDEX IDX_402C9416DBA05214 ON baptemes');
        $this->addSql('ALTER TABLE baptemes DROP bapteme_status, CHANGE mere mere BIGINT NOT NULL, CHANGE pere pere BIGINT NOT NULL, CHANGE parrain parrain BIGINT NOT NULL, CHANGE marraine marraine BIGINT NOT NULL, CHANGE mere_non_paroissien mere_on_paroissien BIGINT DEFAULT NULL');
        $this->addSql('ALTER TABLE baptemes ADD CONSTRAINT FK_402C94169C29AAE1 FOREIGN KEY (mere_on_paroissien) REFERENCES non_paroissiens (id_non_paroissien)');
        $this->addSql('CREATE INDEX IDX_402C94169C29AAE1 ON baptemes (mere_on_paroissien)');
    }
}
