<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250114140507 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create the jeux table';
    }

    public function up(Schema $schema): void
    {
        // Adding the 'jeux' table
        $this->addSql('CREATE TABLE jeux (
            id INT AUTO_INCREMENT NOT NULL, 
            name VARCHAR(255) NOT NULL, 
            description LONGTEXT NOT NULL, 
            image_url VARCHAR(255) NOT NULL, 
            price DOUBLE PRECISION NOT NULL, 
            rate DOUBLE PRECISION NOT NULL, 
            quantity INT NOT NULL, 
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // Dropping the 'jeux' table
        $this->addSql('DROP TABLE jeux');
    }
}
