<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210407215402 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE afrekening (id INT AUTO_INCREMENT NOT NULL, datum DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groep (id INT AUTO_INCREMENT NOT NULL, groep_naam VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE members (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, groep_id_id INT NOT NULL, INDEX IDX_45A0D2FF9D86650F (user_id_id), INDEX IDX_45A0D2FF53D3841B (groep_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payment_log (id INT AUTO_INCREMENT NOT NULL, member_id_id INT NOT NULL, afrekening_id_id INT DEFAULT NULL, bedrag DOUBLE PRECISION NOT NULL, beschrijving VARCHAR(255) NOT NULL, details VARCHAR(255) DEFAULT NULL, datum DATE NOT NULL, foto LONGBLOB DEFAULT NULL, calculated DOUBLE PRECISION NOT NULL, INDEX IDX_B85CA9F11D650BA4 (member_id_id), INDEX IDX_B85CA9F18BE83A3D (afrekening_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, voornaam VARCHAR(255) NOT NULL, achternaam VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, wachtwoord VARCHAR(255) NOT NULL, profiel_foto LONGBLOB DEFAULT NULL, rekeningnummer VARCHAR(25) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE members ADD CONSTRAINT FK_45A0D2FF9D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE members ADD CONSTRAINT FK_45A0D2FF53D3841B FOREIGN KEY (groep_id_id) REFERENCES groep (id)');
        $this->addSql('ALTER TABLE payment_log ADD CONSTRAINT FK_B85CA9F11D650BA4 FOREIGN KEY (member_id_id) REFERENCES members (id)');
        $this->addSql('ALTER TABLE payment_log ADD CONSTRAINT FK_B85CA9F18BE83A3D FOREIGN KEY (afrekening_id_id) REFERENCES afrekening (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE payment_log DROP FOREIGN KEY FK_B85CA9F18BE83A3D');
        $this->addSql('ALTER TABLE members DROP FOREIGN KEY FK_45A0D2FF53D3841B');
        $this->addSql('ALTER TABLE payment_log DROP FOREIGN KEY FK_B85CA9F11D650BA4');
        $this->addSql('ALTER TABLE members DROP FOREIGN KEY FK_45A0D2FF9D86650F');
        $this->addSql('DROP TABLE afrekening');
        $this->addSql('DROP TABLE groep');
        $this->addSql('DROP TABLE members');
        $this->addSql('DROP TABLE payment_log');
        $this->addSql('DROP TABLE `user`');
    }
}
