<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210901141536 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agents_specialities (agents_id INT NOT NULL, specialities_id INT NOT NULL, INDEX IDX_4EA537FA709770DC (agents_id), INDEX IDX_4EA537FA804698D6 (specialities_id), PRIMARY KEY(agents_id, specialities_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE agents_missions (agents_id INT NOT NULL, missions_id INT NOT NULL, INDEX IDX_B804F404709770DC (agents_id), INDEX IDX_B804F40417C042CF (missions_id), PRIMARY KEY(agents_id, missions_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contacts (id INT AUTO_INCREMENT NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, birth_date DATE NOT NULL, code_name VARCHAR(255) NOT NULL, nationality VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contacts_missions (contacts_id INT NOT NULL, missions_id INT NOT NULL, INDEX IDX_21A1513B719FB48E (contacts_id), INDEX IDX_21A1513B17C042CF (missions_id), PRIMARY KEY(contacts_id, missions_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hideouts (id INT AUTO_INCREMENT NOT NULL, code INT NOT NULL, address VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hideouts_missions (hideouts_id INT NOT NULL, missions_id INT NOT NULL, INDEX IDX_42CBC865FF2F627D (hideouts_id), INDEX IDX_42CBC86517C042CF (missions_id), PRIMARY KEY(hideouts_id, missions_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hideouts_type (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mission_type (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE missions (id INT AUTO_INCREMENT NOT NULL, status_id INT DEFAULT NULL, mission_type_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, code_name VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, begin_at DATE NOT NULL, ended_at DATE NOT NULL, INDEX IDX_34F1D47E6BF700BD (status_id), INDEX IDX_34F1D47E547018DE (mission_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE missions_targets (missions_id INT NOT NULL, targets_id INT NOT NULL, INDEX IDX_B7328F6017C042CF (missions_id), INDEX IDX_B7328F6043B5F743 (targets_id), PRIMARY KEY(missions_id, targets_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE missions_contacts (missions_id INT NOT NULL, contacts_id INT NOT NULL, INDEX IDX_FA54446417C042CF (missions_id), INDEX IDX_FA544464719FB48E (contacts_id), PRIMARY KEY(missions_id, contacts_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE missions_hideouts (missions_id INT NOT NULL, hideouts_id INT NOT NULL, INDEX IDX_C08158AD17C042CF (missions_id), INDEX IDX_C08158ADFF2F627D (hideouts_id), PRIMARY KEY(missions_id, hideouts_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE missions_specialities (missions_id INT NOT NULL, specialities_id INT NOT NULL, INDEX IDX_93096DF117C042CF (missions_id), INDEX IDX_93096DF1804698D6 (specialities_id), PRIMARY KEY(missions_id, specialities_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialities (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE targets (id INT AUTO_INCREMENT NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, birth_date DATE NOT NULL, code_name VARCHAR(255) NOT NULL, nationality VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agents_specialities ADD CONSTRAINT FK_4EA537FA709770DC FOREIGN KEY (agents_id) REFERENCES agents (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE agents_specialities ADD CONSTRAINT FK_4EA537FA804698D6 FOREIGN KEY (specialities_id) REFERENCES specialities (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE agents_missions ADD CONSTRAINT FK_B804F404709770DC FOREIGN KEY (agents_id) REFERENCES agents (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE agents_missions ADD CONSTRAINT FK_B804F40417C042CF FOREIGN KEY (missions_id) REFERENCES missions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contacts_missions ADD CONSTRAINT FK_21A1513B719FB48E FOREIGN KEY (contacts_id) REFERENCES contacts (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contacts_missions ADD CONSTRAINT FK_21A1513B17C042CF FOREIGN KEY (missions_id) REFERENCES missions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE hideouts_missions ADD CONSTRAINT FK_42CBC865FF2F627D FOREIGN KEY (hideouts_id) REFERENCES hideouts (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE hideouts_missions ADD CONSTRAINT FK_42CBC86517C042CF FOREIGN KEY (missions_id) REFERENCES missions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE missions ADD CONSTRAINT FK_34F1D47E6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE missions ADD CONSTRAINT FK_34F1D47E547018DE FOREIGN KEY (mission_type_id) REFERENCES mission_type (id)');
        $this->addSql('ALTER TABLE missions_targets ADD CONSTRAINT FK_B7328F6017C042CF FOREIGN KEY (missions_id) REFERENCES missions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE missions_targets ADD CONSTRAINT FK_B7328F6043B5F743 FOREIGN KEY (targets_id) REFERENCES targets (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE missions_contacts ADD CONSTRAINT FK_FA54446417C042CF FOREIGN KEY (missions_id) REFERENCES missions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE missions_contacts ADD CONSTRAINT FK_FA544464719FB48E FOREIGN KEY (contacts_id) REFERENCES contacts (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE missions_hideouts ADD CONSTRAINT FK_C08158AD17C042CF FOREIGN KEY (missions_id) REFERENCES missions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE missions_hideouts ADD CONSTRAINT FK_C08158ADFF2F627D FOREIGN KEY (hideouts_id) REFERENCES hideouts (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE missions_specialities ADD CONSTRAINT FK_93096DF117C042CF FOREIGN KEY (missions_id) REFERENCES missions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE missions_specialities ADD CONSTRAINT FK_93096DF1804698D6 FOREIGN KEY (specialities_id) REFERENCES specialities (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contacts_missions DROP FOREIGN KEY FK_21A1513B719FB48E');
        $this->addSql('ALTER TABLE missions_contacts DROP FOREIGN KEY FK_FA544464719FB48E');
        $this->addSql('ALTER TABLE hideouts_missions DROP FOREIGN KEY FK_42CBC865FF2F627D');
        $this->addSql('ALTER TABLE missions_hideouts DROP FOREIGN KEY FK_C08158ADFF2F627D');
        $this->addSql('ALTER TABLE missions DROP FOREIGN KEY FK_34F1D47E547018DE');
        $this->addSql('ALTER TABLE agents_missions DROP FOREIGN KEY FK_B804F40417C042CF');
        $this->addSql('ALTER TABLE contacts_missions DROP FOREIGN KEY FK_21A1513B17C042CF');
        $this->addSql('ALTER TABLE hideouts_missions DROP FOREIGN KEY FK_42CBC86517C042CF');
        $this->addSql('ALTER TABLE missions_targets DROP FOREIGN KEY FK_B7328F6017C042CF');
        $this->addSql('ALTER TABLE missions_contacts DROP FOREIGN KEY FK_FA54446417C042CF');
        $this->addSql('ALTER TABLE missions_hideouts DROP FOREIGN KEY FK_C08158AD17C042CF');
        $this->addSql('ALTER TABLE missions_specialities DROP FOREIGN KEY FK_93096DF117C042CF');
        $this->addSql('ALTER TABLE agents_specialities DROP FOREIGN KEY FK_4EA537FA804698D6');
        $this->addSql('ALTER TABLE missions_specialities DROP FOREIGN KEY FK_93096DF1804698D6');
        $this->addSql('ALTER TABLE missions DROP FOREIGN KEY FK_34F1D47E6BF700BD');
        $this->addSql('ALTER TABLE missions_targets DROP FOREIGN KEY FK_B7328F6043B5F743');
        $this->addSql('DROP TABLE agents_specialities');
        $this->addSql('DROP TABLE agents_missions');
        $this->addSql('DROP TABLE contacts');
        $this->addSql('DROP TABLE contacts_missions');
        $this->addSql('DROP TABLE hideouts');
        $this->addSql('DROP TABLE hideouts_missions');
        $this->addSql('DROP TABLE hideouts_type');
        $this->addSql('DROP TABLE mission_type');
        $this->addSql('DROP TABLE missions');
        $this->addSql('DROP TABLE missions_targets');
        $this->addSql('DROP TABLE missions_contacts');
        $this->addSql('DROP TABLE missions_hideouts');
        $this->addSql('DROP TABLE missions_specialities');
        $this->addSql('DROP TABLE specialities');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE targets');
    }
}
