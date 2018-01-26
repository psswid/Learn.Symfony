<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180124155102 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE budget (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE expense (id INT AUTO_INCREMENT NOT NULL, budget_id INT DEFAULT NULL, amount INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_2D3A8DA636ABA6B8 (budget_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE income_stream (id INT AUTO_INCREMENT NOT NULL, budget_id INT DEFAULT NULL, amount INT NOT NULL, name VARCHAR(255) NOT NULL, frequency INT NOT NULL, INDEX IDX_F3AC82B36ABA6B8 (budget_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE expense ADD CONSTRAINT FK_2D3A8DA636ABA6B8 FOREIGN KEY (budget_id) REFERENCES budget (id)');
        $this->addSql('ALTER TABLE income_stream ADD CONSTRAINT FK_F3AC82B36ABA6B8 FOREIGN KEY (budget_id) REFERENCES budget (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE expense DROP FOREIGN KEY FK_2D3A8DA636ABA6B8');
        $this->addSql('ALTER TABLE income_stream DROP FOREIGN KEY FK_F3AC82B36ABA6B8');
        $this->addSql('DROP TABLE budget');
        $this->addSql('DROP TABLE expense');
        $this->addSql('DROP TABLE income_stream');
    }
}
