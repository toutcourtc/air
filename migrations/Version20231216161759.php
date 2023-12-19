<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231216161759 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vol (id INT AUTO_INCREMENT NOT NULL, ville_depart_id INT NOT NULL, ville_arrivee_id INT NOT NULL, numero_vol VARCHAR(6) NOT NULL, depart DATETIME NOT NULL, arrivee DATETIME NOT NULL, prix DOUBLE PRECISION NOT NULL, reduction TINYINT(1) NOT NULL, nb_places INT NOT NULL, INDEX IDX_95C97EB497832A6 (ville_depart_id), INDEX IDX_95C97EB34AC9A4B (ville_arrivee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vol ADD CONSTRAINT FK_95C97EB497832A6 FOREIGN KEY (ville_depart_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE vol ADD CONSTRAINT FK_95C97EB34AC9A4B FOREIGN KEY (ville_arrivee_id) REFERENCES ville (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vol DROP FOREIGN KEY FK_95C97EB497832A6');
        $this->addSql('ALTER TABLE vol DROP FOREIGN KEY FK_95C97EB34AC9A4B');
        $this->addSql('DROP TABLE ville');
        $this->addSql('DROP TABLE vol');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
