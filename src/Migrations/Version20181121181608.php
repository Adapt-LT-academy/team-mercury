<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181121181608 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE room (id INT AUTO_INCREMENT NOT NULL, host_id INT DEFAULT NULL, number INT NOT NULL, price INT NOT NULL, INDEX IDX_729F519B1FB8D185 (host_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519B1FB8D185 FOREIGN KEY (host_id) REFERENCES host (id)');
        $this->addSql('DROP TABLE size');
        $this->addSql('ALTER TABLE city ADD name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE host ADD name VARCHAR(255) NOT NULL, ADD type VARCHAR(255) NOT NULL, CHANGE city_id city_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE size (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, type VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, size VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, price INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE room');
        $this->addSql('ALTER TABLE city DROP name');
        $this->addSql('ALTER TABLE host DROP name, DROP type, CHANGE city_id city_id INT DEFAULT NULL');
    }
}
