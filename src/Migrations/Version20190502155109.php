<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190502155109 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_880E0D76E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE administrateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, password VARCHAR(64) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE allergenes (id INT AUTO_INCREMENT NOT NULL, gluten INT NOT NULL, oeuf INT NOT NULL, fruit_a_coque INT NOT NULL, lait INT NOT NULL, soja INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ateliers (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, prix INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE glace (id INT AUTO_INCREMENT NOT NULL, reference VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, allergenes INT NOT NULL, prix INT NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE glace_allergenes (glace_id INT NOT NULL, allergenes_id INT NOT NULL, INDEX IDX_FEE3AA357BD89A2B (glace_id), INDEX IDX_FEE3AA35C21A0BEF (allergenes_id), PRIMARY KEY(glace_id, allergenes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE newsletter (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE glace_allergenes ADD CONSTRAINT FK_FEE3AA357BD89A2B FOREIGN KEY (glace_id) REFERENCES glace (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE glace_allergenes ADD CONSTRAINT FK_FEE3AA35C21A0BEF FOREIGN KEY (allergenes_id) REFERENCES allergenes (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE glace_allergenes DROP FOREIGN KEY FK_FEE3AA35C21A0BEF');
        $this->addSql('ALTER TABLE glace_allergenes DROP FOREIGN KEY FK_FEE3AA357BD89A2B');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE administrateur');
        $this->addSql('DROP TABLE allergenes');
        $this->addSql('DROP TABLE ateliers');
        $this->addSql('DROP TABLE glace');
        $this->addSql('DROP TABLE glace_allergenes');
        $this->addSql('DROP TABLE newsletter');
    }
}
