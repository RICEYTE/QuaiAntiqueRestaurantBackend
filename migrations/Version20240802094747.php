<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240802094747 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking ADD guest_number SMALLINT NOT NULL');
        $this->addSql('ALTER TABLE booking ADD order_date DATE NOT NULL');
        $this->addSql('ALTER TABLE booking ADD order_hour DATE NOT NULL');
        $this->addSql('ALTER TABLE booking ADD allergy VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE booking ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE booking ADD updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('COMMENT ON COLUMN booking.order_hour IS \'(DC2Type:date_immutable)\'');
        $this->addSql('COMMENT ON COLUMN booking.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN booking.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE category ADD title VARCHAR(128) NOT NULL');
        $this->addSql('ALTER TABLE category ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE category ADD updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('COMMENT ON COLUMN category.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN category.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE food ADD title VARCHAR(128) NOT NULL');
        $this->addSql('ALTER TABLE food ADD description TEXT NOT NULL');
        $this->addSql('ALTER TABLE food ADD price SMALLINT NOT NULL');
        $this->addSql('ALTER TABLE food ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE food ADD updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('COMMENT ON COLUMN food.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN food.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE menu ADD titke VARCHAR(128) NOT NULL');
        $this->addSql('ALTER TABLE menu ADD price SMALLINT NOT NULL');
        $this->addSql('ALTER TABLE menu ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE menu ADD updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('ALTER TABLE menu ADD description TEXT NOT NULL');
        $this->addSql('COMMENT ON COLUMN menu.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN menu.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE picture ADD title VARCHAR(128) NOT NULL');
        $this->addSql('ALTER TABLE picture ADD slug VARCHAR(128) NOT NULL');
        $this->addSql('ALTER TABLE picture ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE picture ADD updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('COMMENT ON COLUMN picture.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN picture.updated_at IS \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE booking DROP guest_number');
        $this->addSql('ALTER TABLE booking DROP order_date');
        $this->addSql('ALTER TABLE booking DROP order_hour');
        $this->addSql('ALTER TABLE booking DROP allergy');
        $this->addSql('ALTER TABLE booking DROP created_at');
        $this->addSql('ALTER TABLE booking DROP updated_at');
        $this->addSql('ALTER TABLE category DROP title');
        $this->addSql('ALTER TABLE category DROP created_at');
        $this->addSql('ALTER TABLE category DROP updated_at');
        $this->addSql('ALTER TABLE food DROP title');
        $this->addSql('ALTER TABLE food DROP description');
        $this->addSql('ALTER TABLE food DROP price');
        $this->addSql('ALTER TABLE food DROP created_at');
        $this->addSql('ALTER TABLE food DROP updated_at');
        $this->addSql('ALTER TABLE menu DROP titke');
        $this->addSql('ALTER TABLE menu DROP price');
        $this->addSql('ALTER TABLE menu DROP created_at');
        $this->addSql('ALTER TABLE menu DROP updated_at');
        $this->addSql('ALTER TABLE menu DROP description');
        $this->addSql('ALTER TABLE picture DROP title');
        $this->addSql('ALTER TABLE picture DROP slug');
        $this->addSql('ALTER TABLE picture DROP created_at');
        $this->addSql('ALTER TABLE picture DROP updated_at');
    }
}
