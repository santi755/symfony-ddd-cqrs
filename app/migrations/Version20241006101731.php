<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241006101731 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users ADD roles TEXT NOT NULL');
        $this->addSql('ALTER TABLE users ALTER id TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE users ALTER email TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE users ALTER auth_password TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE users ALTER created_at TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE users ALTER updated_at TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE users ALTER deleted_at TYPE VARCHAR(255)');
        $this->addSql('COMMENT ON COLUMN users.roles IS \'(DC2Type:array)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE users DROP roles');
        $this->addSql('ALTER TABLE users ALTER id TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE users ALTER email TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE users ALTER auth_password TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE users ALTER created_at TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE users ALTER updated_at TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE users ALTER deleted_at TYPE VARCHAR(255)');
    }
}
