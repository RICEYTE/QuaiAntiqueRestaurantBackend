<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240802093907 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE booking_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE food_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE menu_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE picture_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE restaurant_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE booking (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE category (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE food (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE menu (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE picture (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE restaurant (id INT NOT NULL, name VARCHAR(64) NOT NULL, description TEXT NOT NULL, am_opening_time TEXT NOT NULL, pm_opening_time TEXT NOT NULL, max_guest INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN restaurant.am_opening_time IS \'(DC2Type:array)\'');
        $this->addSql('COMMENT ON COLUMN restaurant.pm_opening_time IS \'(DC2Type:array)\'');
        $this->addSql('COMMENT ON COLUMN restaurant.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN restaurant.updated_at IS \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE booking_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE category_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE food_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE menu_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE picture_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE restaurant_id_seq CASCADE');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE food');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE restaurant');
    }
}
