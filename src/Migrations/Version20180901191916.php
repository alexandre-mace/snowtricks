<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180901191916 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2CF675F31B');
        $this->addSql('DROP INDEX IDX_7CC7DA2CF675F31B ON video');
        $this->addSql('ALTER TABLE video DROP author_id');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FF675F31B');
        $this->addSql('DROP INDEX IDX_C53D045FF675F31B ON image');
        $this->addSql('ALTER TABLE image DROP author_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE image ADD author_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FF675F31B FOREIGN KEY (author_id) REFERENCES app_users (id)');
        $this->addSql('CREATE INDEX IDX_C53D045FF675F31B ON image (author_id)');
        $this->addSql('ALTER TABLE video ADD author_id INT NOT NULL');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2CF675F31B FOREIGN KEY (author_id) REFERENCES app_users (id)');
        $this->addSql('CREATE INDEX IDX_7CC7DA2CF675F31B ON video (author_id)');
    }
}