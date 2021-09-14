<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210908142955 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE liste_ingredients_recette DROP FOREIGN KEY FK_CFF4638983B016C1');
        $this->addSql('DROP INDEX IDX_CFF4638983B016C1 ON liste_ingredients_recette');
        $this->addSql('ALTER TABLE liste_ingredients_recette CHANGE recette_id_id recette_id INT NOT NULL');
        $this->addSql('ALTER TABLE liste_ingredients_recette ADD CONSTRAINT FK_CFF4638989312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id)');
        $this->addSql('CREATE INDEX IDX_CFF4638989312FE9 ON liste_ingredients_recette (recette_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE liste_ingredients_recette DROP FOREIGN KEY FK_CFF4638989312FE9');
        $this->addSql('DROP INDEX IDX_CFF4638989312FE9 ON liste_ingredients_recette');
        $this->addSql('ALTER TABLE liste_ingredients_recette CHANGE recette_id recette_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE liste_ingredients_recette ADD CONSTRAINT FK_CFF4638983B016C1 FOREIGN KEY (recette_id_id) REFERENCES recette (id)');
        $this->addSql('CREATE INDEX IDX_CFF4638983B016C1 ON liste_ingredients_recette (recette_id_id)');
    }
}
