<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240212082649 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE boxs_ingredients (boxs_id INT NOT NULL, ingredients_id INT NOT NULL, INDEX IDX_F4ECBD2851CF8763 (boxs_id), INDEX IDX_F4ECBD283EC4DCE (ingredients_id), PRIMARY KEY(boxs_id, ingredients_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE ingredients (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, quantites DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE boxs_ingredients ADD CONSTRAINT FK_F4ECBD2851CF8763 FOREIGN KEY (boxs_id) REFERENCES boxs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE boxs_ingredients ADD CONSTRAINT FK_F4ECBD283EC4DCE FOREIGN KEY (ingredients_id) REFERENCES ingredients (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE boxs_ingredients DROP FOREIGN KEY FK_F4ECBD2851CF8763');
        $this->addSql('ALTER TABLE boxs_ingredients DROP FOREIGN KEY FK_F4ECBD283EC4DCE');
        $this->addSql('DROP TABLE boxs_ingredients');
        $this->addSql('DROP TABLE ingredients');
    }
}
