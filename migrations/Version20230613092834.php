<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230613092834 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipment (id INT AUTO_INCREMENT NOT NULL, object_type_id INT NOT NULL, location_id INT NOT NULL, person_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, datestart DATE NOT NULL, dateend DATE DEFAULT NULL, characteristics JSON DEFAULT NULL, INDEX IDX_D338D583C5020C33 (object_type_id), INDEX IDX_D338D58364D218E (location_id), INDEX IDX_D338D583217BBB47 (person_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipment ADD CONSTRAINT FK_D338D583C5020C33 FOREIGN KEY (object_type_id) REFERENCES object_type (id)');
        $this->addSql('ALTER TABLE equipment ADD CONSTRAINT FK_D338D58364D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('ALTER TABLE equipment ADD CONSTRAINT FK_D338D583217BBB47 FOREIGN KEY (person_id) REFERENCES person (id)');
        $this->addSql('ALTER TABLE file ADD equipment_id INT NOT NULL');
        $this->addSql('ALTER TABLE file ADD CONSTRAINT FK_8C9F3610517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipment (id)');
        $this->addSql('CREATE INDEX IDX_8C9F3610517FE9FE ON file (equipment_id)');
        $this->addSql('ALTER TABLE objectservice ADD equipment_id INT NOT NULL');
        $this->addSql('ALTER TABLE objectservice ADD CONSTRAINT FK_562EDD51517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipment (id)');
        $this->addSql('CREATE INDEX IDX_562EDD51517FE9FE ON objectservice (equipment_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE file DROP FOREIGN KEY FK_8C9F3610517FE9FE');
        $this->addSql('ALTER TABLE objectservice DROP FOREIGN KEY FK_562EDD51517FE9FE');
        $this->addSql('ALTER TABLE equipment DROP FOREIGN KEY FK_D338D583C5020C33');
        $this->addSql('ALTER TABLE equipment DROP FOREIGN KEY FK_D338D58364D218E');
        $this->addSql('ALTER TABLE equipment DROP FOREIGN KEY FK_D338D583217BBB47');
        $this->addSql('DROP TABLE equipment');
        $this->addSql('DROP INDEX IDX_562EDD51517FE9FE ON objectservice');
        $this->addSql('ALTER TABLE objectservice DROP equipment_id');
        $this->addSql('DROP INDEX IDX_8C9F3610517FE9FE ON file');
        $this->addSql('ALTER TABLE file DROP equipment_id');
    }
}
