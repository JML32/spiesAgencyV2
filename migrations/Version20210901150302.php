<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210901150302 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hideouts ADD type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE hideouts ADD CONSTRAINT FK_99509BAC54C8C93 FOREIGN KEY (type_id) REFERENCES hideouts_type (id)');
        $this->addSql('CREATE INDEX IDX_99509BAC54C8C93 ON hideouts (type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hideouts DROP FOREIGN KEY FK_99509BAC54C8C93');
        $this->addSql('DROP INDEX IDX_99509BAC54C8C93 ON hideouts');
        $this->addSql('ALTER TABLE hideouts DROP type_id');
    }
}
