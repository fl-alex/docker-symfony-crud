<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230612120744 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE objectservice (id INT AUTO_INCREMENT NOT NULL, service_type_id INT NOT NULL, service_state_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, dateplan DATETIME NOT NULL, datefact DATETIME DEFAULT NULL, dateend DATETIME DEFAULT NULL, INDEX IDX_562EDD51AC8DE0F (service_type_id), INDEX IDX_562EDD51FCAE67FC (service_state_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE objectservice ADD CONSTRAINT FK_562EDD51AC8DE0F FOREIGN KEY (service_type_id) REFERENCES service_type (id)');
        $this->addSql('ALTER TABLE objectservice ADD CONSTRAINT FK_562EDD51FCAE67FC FOREIGN KEY (service_state_id) REFERENCES service_state (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE objectservice DROP FOREIGN KEY FK_562EDD51AC8DE0F');
        $this->addSql('ALTER TABLE objectservice DROP FOREIGN KEY FK_562EDD51FCAE67FC');
        $this->addSql('DROP TABLE objectservice');
    }
}
