<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250406184336 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE answer (id INT AUTO_INCREMENT NOT NULL, question_id INT NOT NULL, content LONGTEXT NOT NULL, is_correct TINYINT(1) NOT NULL, created_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_DADD4A251E27F6BF (question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, quiz_id INT NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_B6F7494E853CD175 (quiz_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE quiz (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)', UNIQUE INDEX UNIQ_B723AF33E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE student_response (id INT AUTO_INCREMENT NOT NULL, student_id INT NOT NULL, question_id INT NOT NULL, answer_id INT NOT NULL, created_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_8DF04760CB944F1A (student_id), INDEX IDX_8DF047601E27F6BF (question_id), INDEX IDX_8DF04760AA334807 (answer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE answer ADD CONSTRAINT FK_DADD4A251E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE question ADD CONSTRAINT FK_B6F7494E853CD175 FOREIGN KEY (quiz_id) REFERENCES quiz (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE student_response ADD CONSTRAINT FK_8DF04760CB944F1A FOREIGN KEY (student_id) REFERENCES student (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE student_response ADD CONSTRAINT FK_8DF047601E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE student_response ADD CONSTRAINT FK_8DF04760AA334807 FOREIGN KEY (answer_id) REFERENCES answer (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A251E27F6BF
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E853CD175
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE student_response DROP FOREIGN KEY FK_8DF04760CB944F1A
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE student_response DROP FOREIGN KEY FK_8DF047601E27F6BF
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE student_response DROP FOREIGN KEY FK_8DF04760AA334807
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE answer
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE question
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE quiz
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE student
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE student_response
        SQL);
    }
}
