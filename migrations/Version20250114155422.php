<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250114155422 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50D4C32EAF4');
        $this->addSql('DROP INDEX IDX_3755B50D4C32EAF4 ON jeux');
        $this->addSql('ALTER TABLE jeux DROP jeux_id_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jeux ADD jeux_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50D4C32EAF4 FOREIGN KEY (jeux_id_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_3755B50D4C32EAF4 ON jeux (jeux_id_id)');
    }
}
