<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181212154224 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE orders CHANGE customer_id customer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ordered_room DROP INDEX UNIQ_4A3D0BBC3B4BB05, ADD INDEX IDX_4A3D0BBC3B4BB05 (apartament_id)');
        $this->addSql('ALTER TABLE ordered_room CHANGE order_id order_id INT DEFAULT NULL, CHANGE apartament_id apartament_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE host CHANGE city_id city_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE apartament CHANGE host_id host_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE apartament CHANGE host_id host_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE host CHANGE city_id city_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ordered_room DROP INDEX IDX_4A3D0BBC3B4BB05, ADD UNIQUE INDEX UNIQ_4A3D0BBC3B4BB05 (apartament_id)');
        $this->addSql('ALTER TABLE ordered_room CHANGE order_id order_id INT DEFAULT NULL, CHANGE apartament_id apartament_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE orders CHANGE customer_id customer_id INT DEFAULT NULL');
    }
}
