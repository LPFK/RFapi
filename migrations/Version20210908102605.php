<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210908102605 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE liste_ingredients_recette (id INT AUTO_INCREMENT NOT NULL, recette_id_id INT NOT NULL, ingredient_id_id INT NOT NULL, unite VARCHAR(32) NOT NULL, quantite INT NOT NULL, INDEX IDX_CFF4638983B016C1 (recette_id_id), INDEX IDX_CFF463896676F996 (ingredient_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE liste_ingredients_recette ADD CONSTRAINT FK_CFF4638983B016C1 FOREIGN KEY (recette_id_id) REFERENCES recette (id)');
        $this->addSql('ALTER TABLE liste_ingredients_recette ADD CONSTRAINT FK_CFF463896676F996 FOREIGN KEY (ingredient_id_id) REFERENCES ingredient (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE liste_ingredients_recette');
    }
}
