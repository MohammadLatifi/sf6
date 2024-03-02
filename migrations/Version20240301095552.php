<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240301095552 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE post_image (post_id INT NOT NULL, image_id INT NOT NULL, PRIMARY KEY(post_id, image_id))');
        $this->addSql('CREATE INDEX IDX_522688B04B89032C ON post_image (post_id)');
        $this->addSql('CREATE INDEX IDX_522688B03DA5256D ON post_image (image_id)');
        $this->addSql('ALTER TABLE post_image ADD CONSTRAINT FK_522688B04B89032C FOREIGN KEY (post_id) REFERENCES post (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE post_image ADD CONSTRAINT FK_522688B03DA5256D FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE image DROP CONSTRAINT fk_c53d045f73611668');
        $this->addSql('DROP INDEX idx_c53d045f73611668');
        $this->addSql('ALTER TABLE image DROP related_posts_id');
        $this->addSql('ALTER TABLE image ALTER name SET NOT NULL');
        $this->addSql('ALTER TABLE image ALTER updated_at DROP NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE post_image DROP CONSTRAINT FK_522688B04B89032C');
        $this->addSql('ALTER TABLE post_image DROP CONSTRAINT FK_522688B03DA5256D');
        $this->addSql('DROP TABLE post_image');
        $this->addSql('ALTER TABLE image ADD related_posts_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE image ALTER name DROP NOT NULL');
        $this->addSql('ALTER TABLE image ALTER updated_at SET NOT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT fk_c53d045f73611668 FOREIGN KEY (related_posts_id) REFERENCES post (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_c53d045f73611668 ON image (related_posts_id)');
    }
}
