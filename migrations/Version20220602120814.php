<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220602120814 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie_chantier (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_categorie VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE categorie_contact (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_categorie VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE chantier (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, client_id INTEGER DEFAULT NULL, intitule VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, date DATE NOT NULL, date_modif DATETIME DEFAULT NULL, duree_travaux INTEGER NOT NULL, travaux_supl DOUBLE PRECISION DEFAULT NULL, distance DOUBLE PRECISION NOT NULL, note_perso CLOB DEFAULT NULL, note_client CLOB DEFAULT NULL, urgent BOOLEAN DEFAULT NULL, type_chantier VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_636F27F619EB6921 ON chantier (client_id)');
        $this->addSql('CREATE TABLE chantier_categorie_chantier (chantier_id INTEGER NOT NULL, categorie_chantier_id INTEGER NOT NULL, PRIMARY KEY(chantier_id, categorie_chantier_id))');
        $this->addSql('CREATE INDEX IDX_9DABBCDDD0C0049D ON chantier_categorie_chantier (chantier_id)');
        $this->addSql('CREATE INDEX IDX_9DABBCDDF3E2294 ON chantier_categorie_chantier (categorie_chantier_id)');
        $this->addSql('CREATE TABLE client (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, raison_sociale VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C7440455A76ED395 ON client (user_id)');
        $this->addSql('CREATE TABLE contact (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, intitule VARCHAR(255) NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE contact_categorie_contact (contact_id INTEGER NOT NULL, categorie_contact_id INTEGER NOT NULL, PRIMARY KEY(contact_id, categorie_contact_id))');
        $this->addSql('CREATE INDEX IDX_E442E5CDE7A1254A ON contact_categorie_contact (contact_id)');
        $this->addSql('CREATE INDEX IDX_E442E5CD7968EFE6 ON contact_categorie_contact (categorie_contact_id)');
        $this->addSql('CREATE TABLE depannage (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, client_id INTEGER DEFAULT NULL, intitule VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, horaire_depannage VARCHAR(255) NOT NULL, prix_depannage DOUBLE PRECISION NOT NULL, numero_intervention INTEGER NOT NULL, distance DOUBLE PRECISION DEFAULT NULL, note_perso CLOB DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_F3C7E6B119EB6921 ON depannage (client_id)');
        $this->addSql('CREATE TABLE devis (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, chantier_id INTEGER DEFAULT NULL, numero_devis INTEGER NOT NULL, prix_devis DOUBLE PRECISION NOT NULL, statut VARCHAR(255) NOT NULL, paiement VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_8B27C52BD0C0049D ON devis (chantier_id)');
        $this->addSql('CREATE TABLE image_chantier (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, chantier_id INTEGER DEFAULT NULL, image VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_EC9FA95ED0C0049D ON image_chantier (chantier_id)');
        $this->addSql('CREATE TABLE image_depannage (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, depannage_id INTEGER DEFAULT NULL, image VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_2B453DE5AFF9529D ON image_depannage (depannage_id)');
        $this->addSql('CREATE TABLE locatier (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, intitule VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, site_internet VARCHAR(255) DEFAULT NULL, mail VARCHAR(255) DEFAULT NULL, note_perso VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE location (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, chantier_id INTEGER DEFAULT NULL, materiel_id INTEGER DEFAULT NULL, locatier_id INTEGER DEFAULT NULL, quantite INTEGER NOT NULL, prix DOUBLE PRECISION NOT NULL)');
        $this->addSql('CREATE INDEX IDX_5E9E89CBD0C0049D ON location (chantier_id)');
        $this->addSql('CREATE INDEX IDX_5E9E89CB16880AAF ON location (materiel_id)');
        $this->addSql('CREATE INDEX IDX_5E9E89CB5632D108 ON location (locatier_id)');
        $this->addSql('CREATE TABLE materiel (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_materiel VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE categorie_chantier');
        $this->addSql('DROP TABLE categorie_contact');
        $this->addSql('DROP TABLE chantier');
        $this->addSql('DROP TABLE chantier_categorie_chantier');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE contact_categorie_contact');
        $this->addSql('DROP TABLE depannage');
        $this->addSql('DROP TABLE devis');
        $this->addSql('DROP TABLE image_chantier');
        $this->addSql('DROP TABLE image_depannage');
        $this->addSql('DROP TABLE locatier');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE materiel');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
