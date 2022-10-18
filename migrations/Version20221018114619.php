<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221018114619 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category ADD category VARCHAR(255) DEFAULT NULL, DROP mariage, DROP batheme, DROP kermesse, DROP brocante, DROP fete_foraine');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category ADD batheme VARCHAR(255) DEFAULT NULL, ADD kermesse VARCHAR(255) DEFAULT NULL, ADD brocante VARCHAR(255) DEFAULT NULL, ADD fete_foraine VARCHAR(255) DEFAULT NULL, CHANGE category mariage VARCHAR(255) DEFAULT NULL');
    }
}
