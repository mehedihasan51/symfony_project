<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240530161403 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pricing_plan_benefit (id INT AUTO_INCREMENT NOT NULL, pricing_plan_benefit_id INT NOT NULL, name VARCHAR(50) NOT NULL, pricing_plan VARCHAR(50) NOT NULL, price INT NOT NULL, INDEX IDX_E6A62C5F725C128 (pricing_plan_benefit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pricing_plan_benefit_pricing_plan_benefit (pricing_plan_benefit_source INT NOT NULL, pricing_plan_benefit_target INT NOT NULL, INDEX IDX_72828BAF39B031 (pricing_plan_benefit_source), INDEX IDX_72828BA16DCE0BE (pricing_plan_benefit_target), PRIMARY KEY(pricing_plan_benefit_source, pricing_plan_benefit_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pricing_plan_benefit ADD CONSTRAINT FK_E6A62C5F725C128 FOREIGN KEY (pricing_plan_benefit_id) REFERENCES pricing_plan_benefit (id)');
        $this->addSql('ALTER TABLE pricing_plan_benefit_pricing_plan_benefit ADD CONSTRAINT FK_72828BAF39B031 FOREIGN KEY (pricing_plan_benefit_source) REFERENCES pricing_plan_benefit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pricing_plan_benefit_pricing_plan_benefit ADD CONSTRAINT FK_72828BA16DCE0BE FOREIGN KEY (pricing_plan_benefit_target) REFERENCES pricing_plan_benefit (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pricing_plan_benefit DROP FOREIGN KEY FK_E6A62C5F725C128');
        $this->addSql('ALTER TABLE pricing_plan_benefit_pricing_plan_benefit DROP FOREIGN KEY FK_72828BAF39B031');
        $this->addSql('ALTER TABLE pricing_plan_benefit_pricing_plan_benefit DROP FOREIGN KEY FK_72828BA16DCE0BE');
        $this->addSql('DROP TABLE pricing_plan_benefit');
        $this->addSql('DROP TABLE pricing_plan_benefit_pricing_plan_benefit');
        $this->addSql('DROP TABLE product');
    }
}
