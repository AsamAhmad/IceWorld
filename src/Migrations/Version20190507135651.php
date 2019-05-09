<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190507135651 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE glace_allergenes');
        $this->addSql('ALTER TABLE allergenes CHANGE nom name VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE glace CHANGE allergenes allergenes VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE glace_allergenes (glace_id INT NOT NULL, allergenes_id INT NOT NULL, INDEX IDX_FEE3AA357BD89A2B (glace_id), INDEX IDX_FEE3AA35C21A0BEF (allergenes_id), PRIMARY KEY(glace_id, allergenes_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE glace_allergenes ADD CONSTRAINT FK_FEE3AA357BD89A2B FOREIGN KEY (glace_id) REFERENCES glace (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE glace_allergenes ADD CONSTRAINT FK_FEE3AA35C21A0BEF FOREIGN KEY (allergenes_id) REFERENCES allergenes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE allergenes CHANGE name nom VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE glace CHANGE allergenes allergenes INT NOT NULL');
    }
}
