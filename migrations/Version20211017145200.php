<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211017145200 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE position ADD employee_id INT NOT NULL');
        $this->addSql('ALTER TABLE position ADD CONSTRAINT FK_462CE4F58C03F15C FOREIGN KEY (employee_id) REFERENCES employee (id)');
        $this->addSql('CREATE INDEX IDX_462CE4F58C03F15C ON position (employee_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE position DROP FOREIGN KEY FK_462CE4F58C03F15C');
        $this->addSql('DROP INDEX IDX_462CE4F58C03F15C ON position');
        $this->addSql('ALTER TABLE position DROP employee_id');
    }
}
