<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220526132257 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7D3656A45E237E06 ON account (name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7D3656A4E7769B0F ON account (surname)');
        $this->addSql('ALTER TABLE book CHANGE imagePath image_path VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_7D3656A45E237E06 ON account');
        $this->addSql('DROP INDEX UNIQ_7D3656A4E7769B0F ON account');
        $this->addSql('ALTER TABLE book CHANGE image_path imagePath VARCHAR(255) DEFAULT NULL');
    }
}
