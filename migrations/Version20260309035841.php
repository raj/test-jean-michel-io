<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260309035841 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE INDEX IDX_FIRST_LAST_NAME ON freelance_conso (first_name, last_name)');
        $this->addSql('CREATE INDEX IDX_FULL_NAME ON freelance_conso (full_name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_JEAN_PAUL_ID ON freelance_jean_paul (jean_paul_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_LINKEDIN_URL ON freelance_linked_in (url)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_LINKEDIN_URL ON freelance_linked_in');
        $this->addSql('DROP INDEX IDX_FIRST_LAST_NAME ON freelance_conso');
        $this->addSql('DROP INDEX IDX_FULL_NAME ON freelance_conso');
        $this->addSql('DROP INDEX UNIQ_JEAN_PAUL_ID ON freelance_jean_paul');
    }
}
