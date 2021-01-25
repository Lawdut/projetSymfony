<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210125123828 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dispose ADD animal_id INT DEFAULT NULL, ADD personne_id INT DEFAULT NULL, ADD nom VARCHAR(255) NOT NULL, ADD nombre INT DEFAULT NULL');
        $this->addSql('ALTER TABLE dispose ADD CONSTRAINT FK_6262E0668E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE dispose ADD CONSTRAINT FK_6262E066A21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id)');
        $this->addSql('CREATE INDEX IDX_6262E0668E962C16 ON dispose (animal_id)');
        $this->addSql('CREATE INDEX IDX_6262E066A21BD112 ON dispose (personne_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dispose DROP FOREIGN KEY FK_6262E0668E962C16');
        $this->addSql('ALTER TABLE dispose DROP FOREIGN KEY FK_6262E066A21BD112');
        $this->addSql('DROP INDEX IDX_6262E0668E962C16 ON dispose');
        $this->addSql('DROP INDEX IDX_6262E066A21BD112 ON dispose');
        $this->addSql('ALTER TABLE dispose DROP animal_id, DROP personne_id, DROP nom, DROP nombre');
    }
}
