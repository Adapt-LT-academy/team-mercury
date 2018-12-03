<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181203161817 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE apartament (id INT AUTO_INCREMENT NOT NULL, host_id INT DEFAULT NULL, number VARCHAR(255) NOT NULL, number_of_rooms INT NOT NULL, price INT NOT NULL, available_from DATETIME NOT NULL, available_to DATETIME NOT NULL, INDEX IDX_551D61F91FB8D185 (host_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ordered_room (id INT AUTO_INCREMENT NOT NULL, order_id INT DEFAULT NULL, apartament_id INT DEFAULT NULL, price INT NOT NULL, ordered_from DATETIME NOT NULL, ordered_to DATETIME NOT NULL, INDEX IDX_4A3D0BB8D9F6D38 (order_id), UNIQUE INDEX UNIQ_4A3D0BBC3B4BB05 (apartament_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE host (id INT AUTO_INCREMENT NOT NULL, city_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_CF2713FD8BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, customer_id INT DEFAULT NULL, INDEX IDX_E52FFDEE9395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE apartament ADD CONSTRAINT FK_551D61F91FB8D185 FOREIGN KEY (host_id) REFERENCES host (id)');
        $this->addSql('ALTER TABLE ordered_room ADD CONSTRAINT FK_4A3D0BB8D9F6D38 FOREIGN KEY (order_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE ordered_room ADD CONSTRAINT FK_4A3D0BBC3B4BB05 FOREIGN KEY (apartament_id) REFERENCES apartament (id)');
        $this->addSql('ALTER TABLE host ADD CONSTRAINT FK_CF2713FD8BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ordered_room DROP FOREIGN KEY FK_4A3D0BBC3B4BB05');
        $this->addSql('ALTER TABLE apartament DROP FOREIGN KEY FK_551D61F91FB8D185');
        $this->addSql('ALTER TABLE ordered_room DROP FOREIGN KEY FK_4A3D0BB8D9F6D38');
        $this->addSql('ALTER TABLE host DROP FOREIGN KEY FK_CF2713FD8BAC62AF');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE9395C3F3');
        $this->addSql('DROP TABLE apartament');
        $this->addSql('DROP TABLE ordered_room');
        $this->addSql('DROP TABLE host');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE customer');
    }
}
