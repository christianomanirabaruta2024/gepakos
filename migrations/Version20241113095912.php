<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241113095912 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresses (id_adresse BIGINT AUTO_INCREMENT NOT NULL, numero_rue VARCHAR(10) NOT NULL, nom_rue VARCHAR(25) NOT NULL, ville VARCHAR(30) NOT NULL, code_postal VARCHAR(20) NOT NULL, pays VARCHAR(25) NOT NULL, PRIMARY KEY(id_adresse)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE baptemes (id_bapteme BIGINT AUTO_INCREMENT NOT NULL, mere BIGINT NOT NULL, pere BIGINT NOT NULL, parrain BIGINT NOT NULL, marraine BIGINT NOT NULL, pere_non_paroissien BIGINT DEFAULT NULL, mere_on_paroissien BIGINT DEFAULT NULL, id_paroissien BIGINT NOT NULL, date_bapteme DATETIME NOT NULL, lieu_bapteme VARCHAR(60) NOT NULL, ministre VARCHAR(60) NOT NULL, registre_bapteme VARCHAR(60) NOT NULL, INDEX IDX_402C941686C577AA (mere), INDEX IDX_402C941624B6F8E8 (pere), INDEX IDX_402C9416A7A835B4 (parrain), INDEX IDX_402C9416C4CF8100 (marraine), INDEX IDX_402C9416FFC9F921 (pere_non_paroissien), INDEX IDX_402C94169C29AAE1 (mere_on_paroissien), INDEX IDX_402C9416755FBAD2 (id_paroissien), PRIMARY KEY(id_bapteme)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE communions (id_communion BIGINT AUTO_INCREMENT NOT NULL, id_paroissien BIGINT NOT NULL, date_communion DATE NOT NULL, lieu_communion VARCHAR(30) NOT NULL, ministre VARCHAR(50) NOT NULL, INDEX IDX_B135065A755FBAD2 (id_paroissien), PRIMARY KEY(id_communion)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE confirmations (id_confirmation BIGINT AUTO_INCREMENT NOT NULL, id_paroissien BIGINT NOT NULL, date_confirmation DATE NOT NULL, lieu_confirmation VARCHAR(35) NOT NULL, ministre VARCHAR(45) NOT NULL, INDEX IDX_34298E9E755FBAD2 (id_paroissien), PRIMARY KEY(id_confirmation)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE defunts (id_defunt BIGINT AUTO_INCREMENT NOT NULL, id_paroissien BIGINT NOT NULL, date_defunt DATE NOT NULL, date_funerailles DATE NOT NULL, lieu_funerailles VARCHAR(25) NOT NULL, ministre VARCHAR(45) DEFAULT NULL, nom_conjoint_ou_pere VARCHAR(45) NOT NULL, INDEX IDX_3029817C755FBAD2 (id_paroissien), PRIMARY KEY(id_defunt)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription_mariages (id_inscription BIGINT AUTO_INCREMENT NOT NULL, id_futur_epoux1_paroissien BIGINT DEFAULT NULL, id_futur_epoux2_paroissien BIGINT DEFAULT NULL, id_futur_epoux1_non_paroissien BIGINT DEFAULT NULL, id_futur_epoux2_non_paroissien BIGINT DEFAULT NULL, id_parrain BIGINT NOT NULL, id_marraine BIGINT NOT NULL, id_pere_epoux1 BIGINT DEFAULT NULL, id_mere_epoux1 BIGINT DEFAULT NULL, id_pere_epoux2 BIGINT DEFAULT NULL, id_mere_epoux2 BIGINT DEFAULT NULL, id_pere_epoux1_non_paroissien BIGINT DEFAULT NULL, id_mere_epoux1_non_paroissien BIGINT DEFAULT NULL, id_pere_epoux2_non_paroissien BIGINT DEFAULT NULL, id_mere_epoux2_non_paroissien BIGINT DEFAULT NULL, date_inscription DATE NOT NULL, approuve TINYINT(1) NOT NULL, INDEX IDX_67D419A671E3BF13 (id_futur_epoux1_paroissien), INDEX IDX_67D419A667D6DE3 (id_futur_epoux2_paroissien), INDEX IDX_67D419A61C45BBA1 (id_futur_epoux1_non_paroissien), INDEX IDX_67D419A6358D0F53 (id_futur_epoux2_non_paroissien), INDEX IDX_67D419A679359CC4 (id_parrain), INDEX IDX_67D419A694146D95 (id_marraine), INDEX IDX_67D419A6F16FD02 (id_pere_epoux1), INDEX IDX_67D419A66A7474CE (id_mere_epoux1), INDEX IDX_67D419A6961FACB8 (id_pere_epoux2), INDEX IDX_67D419A6F37D2574 (id_mere_epoux2), INDEX IDX_67D419A66A6B4E16 (id_pere_epoux1_non_paroissien), INDEX IDX_67D419A65899089B (id_mere_epoux1_non_paroissien), INDEX IDX_67D419A643A3FAE4 (id_pere_epoux2_non_paroissien), INDEX IDX_67D419A67151BC69 (id_mere_epoux2_non_paroissien), PRIMARY KEY(id_inscription)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mariages (id_mariage BIGINT AUTO_INCREMENT NOT NULL, id_epoux1 BIGINT NOT NULL, id_epoux2_poroissien BIGINT DEFAULT NULL, id_epoux2_non_paroissien BIGINT DEFAULT NULL, date_mariage DATE NOT NULL, ministre VARCHAR(60) NOT NULL, type_mariage VARCHAR(255) NOT NULL, lieu_mariage VARCHAR(60) NOT NULL, INDEX IDX_CE416603B159D442 (id_epoux1), INDEX IDX_CE41660310B16D16 (id_epoux2_poroissien), INDEX IDX_CE416603ED48C865 (id_epoux2_non_paroissien), PRIMARY KEY(id_mariage)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE non_paroissiens (id_non_paroissien BIGINT AUTO_INCREMENT NOT NULL, id_adresse BIGINT NOT NULL, nom VARCHAR(30) NOT NULL, prenom VARCHAR(30) DEFAULT NULL, confession VARCHAR(40) DEFAULT NULL, INDEX IDX_181E296F1DC2A166 (id_adresse), PRIMARY KEY(id_non_paroissien)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paroissiens (id_paroissien BIGINT AUTO_INCREMENT NOT NULL, id_adresse BIGINT NOT NULL, nom VARCHAR(30) NOT NULL, prenom VARCHAR(25) NOT NULL, date_naissance DATE NOT NULL, lieu_naissance VARCHAR(30) NOT NULL, telephone VARCHAR(20) DEFAULT NULL, email VARCHAR(25) DEFAULT NULL, INDEX IDX_6BB4EEBE1DC2A166 (id_adresse), PRIMARY KEY(id_paroissien)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnels (id INT AUTO_INCREMENT NOT NULL, id_paroissien BIGINT DEFAULT NULL, id_non_paroissien BIGINT DEFAULT NULL, titres VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE baptemes ADD CONSTRAINT FK_402C941686C577AA FOREIGN KEY (mere) REFERENCES paroissiens (id_paroissien)');
        $this->addSql('ALTER TABLE baptemes ADD CONSTRAINT FK_402C941624B6F8E8 FOREIGN KEY (pere) REFERENCES paroissiens (id_paroissien)');
        $this->addSql('ALTER TABLE baptemes ADD CONSTRAINT FK_402C9416A7A835B4 FOREIGN KEY (parrain) REFERENCES paroissiens (id_paroissien)');
        $this->addSql('ALTER TABLE baptemes ADD CONSTRAINT FK_402C9416C4CF8100 FOREIGN KEY (marraine) REFERENCES paroissiens (id_paroissien)');
        $this->addSql('ALTER TABLE baptemes ADD CONSTRAINT FK_402C9416FFC9F921 FOREIGN KEY (pere_non_paroissien) REFERENCES non_paroissiens (id_non_paroissien)');
        $this->addSql('ALTER TABLE baptemes ADD CONSTRAINT FK_402C94169C29AAE1 FOREIGN KEY (mere_on_paroissien) REFERENCES non_paroissiens (id_non_paroissien)');
        $this->addSql('ALTER TABLE baptemes ADD CONSTRAINT FK_402C9416755FBAD2 FOREIGN KEY (id_paroissien) REFERENCES paroissiens (id_paroissien)');
        $this->addSql('ALTER TABLE communions ADD CONSTRAINT FK_B135065A755FBAD2 FOREIGN KEY (id_paroissien) REFERENCES paroissiens (id_paroissien)');
        $this->addSql('ALTER TABLE confirmations ADD CONSTRAINT FK_34298E9E755FBAD2 FOREIGN KEY (id_paroissien) REFERENCES paroissiens (id_paroissien)');
        $this->addSql('ALTER TABLE defunts ADD CONSTRAINT FK_3029817C755FBAD2 FOREIGN KEY (id_paroissien) REFERENCES paroissiens (id_paroissien)');
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
        $this->addSql('ALTER TABLE mariages ADD CONSTRAINT FK_CE416603B159D442 FOREIGN KEY (id_epoux1) REFERENCES paroissiens (id_paroissien)');
        $this->addSql('ALTER TABLE mariages ADD CONSTRAINT FK_CE41660310B16D16 FOREIGN KEY (id_epoux2_poroissien) REFERENCES paroissiens (id_paroissien)');
        $this->addSql('ALTER TABLE mariages ADD CONSTRAINT FK_CE416603ED48C865 FOREIGN KEY (id_epoux2_non_paroissien) REFERENCES non_paroissiens (id_non_paroissien)');
        $this->addSql('ALTER TABLE non_paroissiens ADD CONSTRAINT FK_181E296F1DC2A166 FOREIGN KEY (id_adresse) REFERENCES adresses (id_adresse)');
        $this->addSql('ALTER TABLE paroissiens ADD CONSTRAINT FK_6BB4EEBE1DC2A166 FOREIGN KEY (id_adresse) REFERENCES adresses (id_adresse)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE baptemes DROP FOREIGN KEY FK_402C941686C577AA');
        $this->addSql('ALTER TABLE baptemes DROP FOREIGN KEY FK_402C941624B6F8E8');
        $this->addSql('ALTER TABLE baptemes DROP FOREIGN KEY FK_402C9416A7A835B4');
        $this->addSql('ALTER TABLE baptemes DROP FOREIGN KEY FK_402C9416C4CF8100');
        $this->addSql('ALTER TABLE baptemes DROP FOREIGN KEY FK_402C9416FFC9F921');
        $this->addSql('ALTER TABLE baptemes DROP FOREIGN KEY FK_402C94169C29AAE1');
        $this->addSql('ALTER TABLE baptemes DROP FOREIGN KEY FK_402C9416755FBAD2');
        $this->addSql('ALTER TABLE communions DROP FOREIGN KEY FK_B135065A755FBAD2');
        $this->addSql('ALTER TABLE confirmations DROP FOREIGN KEY FK_34298E9E755FBAD2');
        $this->addSql('ALTER TABLE defunts DROP FOREIGN KEY FK_3029817C755FBAD2');
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
        $this->addSql('ALTER TABLE mariages DROP FOREIGN KEY FK_CE416603B159D442');
        $this->addSql('ALTER TABLE mariages DROP FOREIGN KEY FK_CE41660310B16D16');
        $this->addSql('ALTER TABLE mariages DROP FOREIGN KEY FK_CE416603ED48C865');
        $this->addSql('ALTER TABLE non_paroissiens DROP FOREIGN KEY FK_181E296F1DC2A166');
        $this->addSql('ALTER TABLE paroissiens DROP FOREIGN KEY FK_6BB4EEBE1DC2A166');
        $this->addSql('DROP TABLE adresses');
        $this->addSql('DROP TABLE baptemes');
        $this->addSql('DROP TABLE communions');
        $this->addSql('DROP TABLE confirmations');
        $this->addSql('DROP TABLE defunts');
        $this->addSql('DROP TABLE inscription_mariages');
        $this->addSql('DROP TABLE mariages');
        $this->addSql('DROP TABLE non_paroissiens');
        $this->addSql('DROP TABLE paroissiens');
        $this->addSql('DROP TABLE personnels');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
