<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181230164328 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE Cha_admin (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Cha_iut_location (id INT AUTO_INCREMENT NOT NULL, content LONGTEXT NOT NULL, lon VARCHAR(255) NOT NULL, lat VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Cha_offer (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, title VARCHAR(255) NOT NULL, organisation VARCHAR(255) NOT NULL, duration VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, location VARCHAR(255) NOT NULL, INDEX IDX_3DF51D32C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Cha_testimony (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, age SMALLINT NOT NULL, state VARCHAR(255) DEFAULT NULL, date DATETIME NOT NULL, content LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Cha_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Cha_offer ADD CONSTRAINT FK_3DF51D32C54C8C93 FOREIGN KEY (type_id) REFERENCES Cha_type (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Cha_offer DROP FOREIGN KEY FK_3DF51D32C54C8C93');
        $this->addSql('DROP TABLE Cha_admin');
        $this->addSql('DROP TABLE Cha_iut_location');
        $this->addSql('DROP TABLE Cha_offer');
        $this->addSql('DROP TABLE Cha_testimony');
        $this->addSql('DROP TABLE Cha_type');
    }
}
