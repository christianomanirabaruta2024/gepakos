<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241112162546 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE inscription_mariages (id_inscription INT AUTO_INCREMENT NOT NULL, id_futur_epoux1_paroissien BIGINT DEFAULT NULL, id_futur_epoux2_paroissien BIGINT DEFAULT NULL, id_futur_epoux1_non_paroissien BIGINT DEFAULT NULL, id_futur_epoux2_non_paroissien BIGINT DEFAULT NULL, id_parrain BIGINT DEFAULT NULL, id_marraine BIGINT DEFAULT NULL, id_pere_epoux1 BIGINT DEFAULT NULL, id_mere_epoux1 BIGINT DEFAULT NULL, id_pere_epoux2 BIGINT DEFAULT NULL, id_mere_epoux2 BIGINT DEFAULT NULL, id_pere_epoux1_non_paroissien BIGINT DEFAULT NULL, id_mere_epoux1_non_paroissien BIGINT DEFAULT NULL, id_pere_epoux2_non_paroissien BIGINT DEFAULT NULL, id_mere_epoux2_non_paroissien BIGINT DEFAULT NULL, date_inscription DATE NOT NULL, approuve TINYINT(1) NOT NULL, INDEX IDX_67D419A671E3BF13 (id_futur_epoux1_paroissien), INDEX IDX_67D419A667D6DE3 (id_futur_epoux2_paroissien), INDEX IDX_67D419A61C45BBA1 (id_futur_epoux1_non_paroissien), INDEX IDX_67D419A6358D0F53 (id_futur_epoux2_non_paroissien), INDEX IDX_67D419A679359CC4 (id_parrain), INDEX IDX_67D419A694146D95 (id_marraine), INDEX IDX_67D419A6F16FD02 (id_pere_epoux1), INDEX IDX_67D419A66A7474CE (id_mere_epoux1), INDEX IDX_67D419A6961FACB8 (id_pere_epoux2), INDEX IDX_67D419A6F37D2574 (id_mere_epoux2), INDEX IDX_67D419A66A6B4E16 (id_pere_epoux1_non_paroissien), INDEX IDX_67D419A65899089B (id_mere_epoux1_non_paroissien), INDEX IDX_67D419A643A3FAE4 (id_pere_epoux2_non_paroissien), INDEX IDX_67D419A67151BC69 (id_mere_epoux2_non_paroissien), PRIMARY KEY(id_inscription)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE inscription_mariages ADD CONSTRAINT FK_67D419A671E3BF13 FOREIGN KEY (id_futur_epoux1_paroissien) REFERENCES paroissiens (id_paroissien)');
        $this->addSql('ALTER TABLE inscription_mariages ADD CONSTRAINT FK_67D419A667D6DE3 FOREIGN KEY (id_futur_epoux2_paroissien) REFERENCES paroissiens (id_paroissien)');
        $this->addSql('ALTER TABLE inscription_mariages ADD CONSTRAINT FK_67D419A61C45BBA1 FOREIGN KEY (id_futur_epoux1_non_paroissien) REFERENCES non_paroissiens (id_non_paroissien)');
        $this->addSql('ALTER TABLE inscription_mariages ADD CONSTRAINT FK_67D419A6358D0F53 FOREIGN KEY (id_futur_epoux2_non_paroissien) REFERENCES non_paroissiens (id_non_paroissien)');
        $this->addSql('ALTER TABLE inscription_mariages ADD CONSTRAINT FK_67D419A679359CC4 FOREIGN KEY (id_parrain) REFERENCES paroissiens (id_paroissien)');
        $this->addSql('ALTER TABLE inscription_mariages ADD CONSTRAINT FK_67D419A694146D95 FOREIGN KEY (id_marraine) REFERENCES paroissiens (id_paroissien)');
        $this->addSql('ALTER TABLE inscription_mariages ADD CONSTRAINT FK_67D419A6F16FD02 FOREIGN KEY (id_pere_epoux1) REFERENCES paroissiens (id_paroissien)');
        $this->addSql('ALTER TABLE inscription_mariages ADD CONSTRAINT FK_67D419A66A7474CE FOREIGN KEY (id_mere_epoux1) REFERENCES paroissiens (id_paroissien)');
        $this->addSql('ALTER TABLE inscription_mariages ADD CONSTRAINT FK_67D419A6961FACB8 FOREIGN KEY (id_pere_epoux2) REFERENCES paroissiens (id_paroissien)');
        $this->addSql('ALTER TABLE inscription_mariages ADD CONSTRAINT FK_67D419A6F37D2574 FOREIGN KEY (id_mere_epoux2) REFERENCES paroissiens (id_paroissien)');
        $this->addSql('ALTER TABLE inscription_mariages ADD CONSTRAINT FK_67D419A66A6B4E16 FOREIGN KEY (id_pere_epoux1_non_paroissien) REFERENCES non_paroissiens (id_non_paroissien)');
        $this->addSql('ALTER TABLE inscription_mariages ADD CONSTRAINT FK_67D419A65899089B FOREIGN KEY (id_mere_epoux1_non_paroissien) REFERENCES non_paroissiens (id_non_paroissien)');
        $this->addSql('ALTER TABLE inscription_mariages ADD CONSTRAINT FK_67D419A643A3FAE4 FOREIGN KEY (id_pere_epoux2_non_paroissien) REFERENCES non_paroissiens (id_non_paroissien)');
        $this->addSql('ALTER TABLE inscription_mariages ADD CONSTRAINT FK_67D419A67151BC69 FOREIGN KEY (id_mere_epoux2_non_paroissien) REFERENCES non_paroissiens (id_non_paroissien)');
        $this->addSql('ALTER TABLE baptemes ADD mere BIGINT NOT NULL, ADD pere BIGINT NOT NULL, ADD pere_non_paroissien BIGINT DEFAULT NULL, ADD mere_on_paroissien BIGINT DEFAULT NULL, ADD registre_bapteme VARCHAR(60) NOT NULL');
        $this->addSql('ALTER TABLE baptemes ADD CONSTRAINT FK_402C941686C577AA FOREIGN KEY (mere) REFERENCES paroissiens (id_paroissien)');
        $this->addSql('ALTER TABLE baptemes ADD CONSTRAINT FK_402C941624B6F8E8 FOREIGN KEY (pere) REFERENCES paroissiens (id_paroissien)');
        $this->addSql('ALTER TABLE baptemes ADD CONSTRAINT FK_402C9416FFC9F921 FOREIGN KEY (pere_non_paroissien) REFERENCES non_paroissiens (id_non_paroissien)');
        $this->addSql('ALTER TABLE baptemes ADD CONSTRAINT FK_402C94169C29AAE1 FOREIGN KEY (mere_on_paroissien) REFERENCES non_paroissiens (id_non_paroissien)');
        $this->addSql('CREATE INDEX IDX_402C941686C577AA ON baptemes (mere)');
        $this->addSql('CREATE INDEX IDX_402C941624B6F8E8 ON baptemes (pere)');
        $this->addSql('CREATE INDEX IDX_402C9416FFC9F921 ON baptemes (pere_non_paroissien)');
        $this->addSql('CREATE INDEX IDX_402C94169C29AAE1 ON baptemes (mere_on_paroissien)');
        $this->addSql('ALTER TABLE defunts CHANGE ministre ministre VARCHAR(45) DEFAULT NULL');
        $this->addSql('ALTER TABLE non_paroissiens CHANGE prenom prenom VARCHAR(30) DEFAULT NULL, CHANGE confession confession VARCHAR(40) DEFAULT NULL');
        $this->addSql('ALTER TABLE paroissiens CHANGE telephone telephone VARCHAR(20) DEFAULT NULL, CHANGE email email VARCHAR(25) DEFAULT NULL');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription_mariages DROP FOREIGN KEY FK_67D419A671E3BF13');
        $this->addSql('ALTER TABLE inscription_mariages DROP FOREIGN KEY FK_67D419A667D6DE3');
        $this->addSql('ALTER TABLE inscription_mariages DROP FOREIGN KEY FK_67D419A61C45BBA1');
        $this->addSql('ALTER TABLE inscription_mariages DROP FOREIGN KEY FK_67D419A6358D0F53');
        $this->addSql('ALTER TABLE inscription_mariages DROP FOREIGN KEY FK_67D419A679359CC4');
        $this->addSql('ALTER TABLE inscription_mariages DROP FOREIGN KEY FK_67D419A694146D95');
        $this->addSql('ALTER TABLE inscription_mariages DROP FOREIGN KEY FK_67D419A6F16FD02');
        $this->addSql('ALTER TABLE inscription_mariages DROP FOREIGN KEY FK_67D419A66A7474CE');
        $this->addSql('ALTER TABLE inscription_mariages DROP FOREIGN KEY FK_67D419A6961FACB8');
        $this->addSql('ALTER TABLE inscription_mariages DROP FOREIGN KEY FK_67D419A6F37D2574');
        $this->addSql('ALTER TABLE inscription_mariages DROP FOREIGN KEY FK_67D419A66A6B4E16');
        $this->addSql('ALTER TABLE inscription_mariages DROP FOREIGN KEY FK_67D419A65899089B');
        $this->addSql('ALTER TABLE inscription_mariages DROP FOREIGN KEY FK_67D419A643A3FAE4');
        $this->addSql('ALTER TABLE inscription_mariages DROP FOREIGN KEY FK_67D419A67151BC69');
        $this->addSql('DROP TABLE inscription_mariages');
        $this->addSql('ALTER TABLE baptemes DROP FOREIGN KEY FK_402C941686C577AA');
        $this->addSql('ALTER TABLE baptemes DROP FOREIGN KEY FK_402C941624B6F8E8');
        $this->addSql('ALTER TABLE baptemes DROP FOREIGN KEY FK_402C9416FFC9F921');
        $this->addSql('ALTER TABLE baptemes DROP FOREIGN KEY FK_402C94169C29AAE1');
        $this->addSql('DROP INDEX IDX_402C941686C577AA ON baptemes');
        $this->addSql('DROP INDEX IDX_402C941624B6F8E8 ON baptemes');
        $this->addSql('DROP INDEX IDX_402C9416FFC9F921 ON baptemes');
        $this->addSql('DROP INDEX IDX_402C94169C29AAE1 ON baptemes');
        $this->addSql('ALTER TABLE baptemes DROP mere, DROP pere, DROP pere_non_paroissien, DROP mere_on_paroissien, DROP registre_bapteme');
        $this->addSql('ALTER TABLE defunts CHANGE ministre ministre VARCHAR(45) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\' COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE non_paroissiens CHANGE prenom prenom VARCHAR(30) DEFAULT \'NULL\', CHANGE confession confession VARCHAR(40) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE paroissiens CHANGE telephone telephone VARCHAR(20) DEFAULT \'NULL\', CHANGE email email VARCHAR(25) DEFAULT \'NULL\'');
    }
}
