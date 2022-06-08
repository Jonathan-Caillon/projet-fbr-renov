<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220606190419 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_636F27F619EB6921');
        $this->addSql('CREATE TEMPORARY TABLE __temp__chantier AS SELECT id, client_id, intitule, adresse, ville, code_postal, date, date_modif, duree_travaux, travaux_supl, distance, note_perso, note_client, urgent, type_chantier FROM chantier');
        $this->addSql('DROP TABLE chantier');
        $this->addSql('CREATE TABLE chantier (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, client_id INTEGER DEFAULT NULL, intitule VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, date DATE NOT NULL, date_modif DATETIME DEFAULT NULL, duree_travaux INTEGER NOT NULL, travaux_supl DOUBLE PRECISION DEFAULT NULL, distance DOUBLE PRECISION NOT NULL, note_perso CLOB DEFAULT NULL, note_client CLOB DEFAULT NULL, urgent BOOLEAN DEFAULT NULL, type_chantier VARCHAR(255) NOT NULL, CONSTRAINT FK_636F27F619EB6921 FOREIGN KEY (client_id) REFERENCES client (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO chantier (id, client_id, intitule, adresse, ville, code_postal, date, date_modif, duree_travaux, travaux_supl, distance, note_perso, note_client, urgent, type_chantier) SELECT id, client_id, intitule, adresse, ville, code_postal, date, date_modif, duree_travaux, travaux_supl, distance, note_perso, note_client, urgent, type_chantier FROM __temp__chantier');
        $this->addSql('DROP TABLE __temp__chantier');
        $this->addSql('CREATE INDEX IDX_636F27F619EB6921 ON chantier (client_id)');
        $this->addSql('DROP INDEX IDX_9DABBCDDF3E2294');
        $this->addSql('DROP INDEX IDX_9DABBCDDD0C0049D');
        $this->addSql('CREATE TEMPORARY TABLE __temp__chantier_categorie_chantier AS SELECT chantier_id, categorie_chantier_id FROM chantier_categorie_chantier');
        $this->addSql('DROP TABLE chantier_categorie_chantier');
        $this->addSql('CREATE TABLE chantier_categorie_chantier (chantier_id INTEGER NOT NULL, categorie_chantier_id INTEGER NOT NULL, PRIMARY KEY(chantier_id, categorie_chantier_id), CONSTRAINT FK_9DABBCDDD0C0049D FOREIGN KEY (chantier_id) REFERENCES chantier (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_9DABBCDDF3E2294 FOREIGN KEY (categorie_chantier_id) REFERENCES categorie_chantier (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO chantier_categorie_chantier (chantier_id, categorie_chantier_id) SELECT chantier_id, categorie_chantier_id FROM __temp__chantier_categorie_chantier');
        $this->addSql('DROP TABLE __temp__chantier_categorie_chantier');
        $this->addSql('CREATE INDEX IDX_9DABBCDDF3E2294 ON chantier_categorie_chantier (categorie_chantier_id)');
        $this->addSql('CREATE INDEX IDX_9DABBCDDD0C0049D ON chantier_categorie_chantier (chantier_id)');
        $this->addSql('DROP INDEX UNIQ_C7440455A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__client AS SELECT id, user_id, nom, prenom, ville, adresse, code_postal, telephone, raison_sociale, email FROM client');
        $this->addSql('DROP TABLE client');
        $this->addSql('CREATE TABLE client (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, raison_sociale VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, CONSTRAINT FK_C7440455A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO client (id, user_id, nom, prenom, ville, adresse, code_postal, telephone, raison_sociale, email) SELECT id, user_id, nom, prenom, ville, adresse, code_postal, telephone, raison_sociale, email FROM __temp__client');
        $this->addSql('DROP TABLE __temp__client');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C7440455A76ED395 ON client (user_id)');
        $this->addSql('DROP INDEX IDX_E442E5CDE7A1254A');
        $this->addSql('DROP INDEX IDX_E442E5CD7968EFE6');
        $this->addSql('CREATE TEMPORARY TABLE __temp__contact_categorie_contact AS SELECT contact_id, categorie_contact_id FROM contact_categorie_contact');
        $this->addSql('DROP TABLE contact_categorie_contact');
        $this->addSql('CREATE TABLE contact_categorie_contact (contact_id INTEGER NOT NULL, categorie_contact_id INTEGER NOT NULL, PRIMARY KEY(contact_id, categorie_contact_id), CONSTRAINT FK_E442E5CDE7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_E442E5CD7968EFE6 FOREIGN KEY (categorie_contact_id) REFERENCES categorie_contact (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO contact_categorie_contact (contact_id, categorie_contact_id) SELECT contact_id, categorie_contact_id FROM __temp__contact_categorie_contact');
        $this->addSql('DROP TABLE __temp__contact_categorie_contact');
        $this->addSql('CREATE INDEX IDX_E442E5CDE7A1254A ON contact_categorie_contact (contact_id)');
        $this->addSql('CREATE INDEX IDX_E442E5CD7968EFE6 ON contact_categorie_contact (categorie_contact_id)');
        $this->addSql('DROP INDEX IDX_F3C7E6B119EB6921');
        $this->addSql('CREATE TEMPORARY TABLE __temp__depannage AS SELECT id, client_id, intitule, adresse, ville, code_postal, horaire_depannage, prix_depannage, numero_intervention, distance, note_perso FROM depannage');
        $this->addSql('DROP TABLE depannage');
        $this->addSql('CREATE TABLE depannage (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, client_id INTEGER DEFAULT NULL, intitule VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, horaire_depannage VARCHAR(255) NOT NULL, prix_depannage DOUBLE PRECISION NOT NULL, numero_intervention INTEGER NOT NULL, distance DOUBLE PRECISION DEFAULT NULL, note_perso CLOB DEFAULT NULL, CONSTRAINT FK_F3C7E6B119EB6921 FOREIGN KEY (client_id) REFERENCES client (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO depannage (id, client_id, intitule, adresse, ville, code_postal, horaire_depannage, prix_depannage, numero_intervention, distance, note_perso) SELECT id, client_id, intitule, adresse, ville, code_postal, horaire_depannage, prix_depannage, numero_intervention, distance, note_perso FROM __temp__depannage');
        $this->addSql('DROP TABLE __temp__depannage');
        $this->addSql('CREATE INDEX IDX_F3C7E6B119EB6921 ON depannage (client_id)');
        $this->addSql('DROP INDEX IDX_8B27C52BD0C0049D');
        $this->addSql('CREATE TEMPORARY TABLE __temp__devis AS SELECT id, chantier_id, numero_devis, prix_devis, statut, paiement_acompte, paiement_intermed, paiement_final FROM devis');
        $this->addSql('DROP TABLE devis');
        $this->addSql('CREATE TABLE devis (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, chantier_id INTEGER DEFAULT NULL, numero_devis INTEGER NOT NULL, prix_devis DOUBLE PRECISION NOT NULL, statut VARCHAR(255) NOT NULL, paiement_acompte DOUBLE PRECISION DEFAULT NULL, paiement_intermed DOUBLE PRECISION DEFAULT NULL, paiement_final DOUBLE PRECISION DEFAULT NULL, CONSTRAINT FK_8B27C52BD0C0049D FOREIGN KEY (chantier_id) REFERENCES chantier (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO devis (id, chantier_id, numero_devis, prix_devis, statut, paiement_acompte, paiement_intermed, paiement_final) SELECT id, chantier_id, numero_devis, prix_devis, statut, paiement_acompte, paiement_intermed, paiement_final FROM __temp__devis');
        $this->addSql('DROP TABLE __temp__devis');
        $this->addSql('CREATE INDEX IDX_8B27C52BD0C0049D ON devis (chantier_id)');
        $this->addSql('DROP INDEX IDX_D8698A7641DEFADA');
        $this->addSql('CREATE TEMPORARY TABLE __temp__document AS SELECT id, devis_id, content_url, file_path FROM document');
        $this->addSql('DROP TABLE document');
        $this->addSql('CREATE TABLE document (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, devis_id INTEGER DEFAULT NULL, content_url VARCHAR(255) DEFAULT NULL, file_path VARCHAR(255) DEFAULT NULL, CONSTRAINT FK_D8698A7641DEFADA FOREIGN KEY (devis_id) REFERENCES devis (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO document (id, devis_id, content_url, file_path) SELECT id, devis_id, content_url, file_path FROM __temp__document');
        $this->addSql('DROP TABLE __temp__document');
        $this->addSql('CREATE INDEX IDX_D8698A7641DEFADA ON document (devis_id)');
        $this->addSql('DROP INDEX IDX_EC9FA95ED0C0049D');
        $this->addSql('CREATE TEMPORARY TABLE __temp__image_chantier AS SELECT id, chantier_id, image FROM image_chantier');
        $this->addSql('DROP TABLE image_chantier');
        $this->addSql('CREATE TABLE image_chantier (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, chantier_id INTEGER DEFAULT NULL, image VARCHAR(255) NOT NULL, CONSTRAINT FK_EC9FA95ED0C0049D FOREIGN KEY (chantier_id) REFERENCES chantier (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO image_chantier (id, chantier_id, image) SELECT id, chantier_id, image FROM __temp__image_chantier');
        $this->addSql('DROP TABLE __temp__image_chantier');
        $this->addSql('CREATE INDEX IDX_EC9FA95ED0C0049D ON image_chantier (chantier_id)');
        $this->addSql('DROP INDEX IDX_2B453DE5AFF9529D');
        $this->addSql('CREATE TEMPORARY TABLE __temp__image_depannage AS SELECT id, depannage_id, image FROM image_depannage');
        $this->addSql('DROP TABLE image_depannage');
        $this->addSql('CREATE TABLE image_depannage (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, depannage_id INTEGER DEFAULT NULL, image VARCHAR(255) NOT NULL, CONSTRAINT FK_2B453DE5AFF9529D FOREIGN KEY (depannage_id) REFERENCES depannage (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO image_depannage (id, depannage_id, image) SELECT id, depannage_id, image FROM __temp__image_depannage');
        $this->addSql('DROP TABLE __temp__image_depannage');
        $this->addSql('CREATE INDEX IDX_2B453DE5AFF9529D ON image_depannage (depannage_id)');
        $this->addSql('DROP INDEX IDX_5E9E89CB16880AAF');
        $this->addSql('DROP INDEX IDX_5E9E89CBD0C0049D');
        $this->addSql('DROP INDEX IDX_5E9E89CB5632D108');
        $this->addSql('CREATE TEMPORARY TABLE __temp__location AS SELECT id, chantier_id, materiel_id, locatier_id, quantite, prix FROM location');
        $this->addSql('DROP TABLE location');
        $this->addSql('CREATE TABLE location (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, chantier_id INTEGER DEFAULT NULL, materiel_id INTEGER DEFAULT NULL, locatier_id INTEGER DEFAULT NULL, quantite INTEGER NOT NULL, prix DOUBLE PRECISION NOT NULL, CONSTRAINT FK_5E9E89CBD0C0049D FOREIGN KEY (chantier_id) REFERENCES chantier (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_5E9E89CB16880AAF FOREIGN KEY (materiel_id) REFERENCES materiel (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_5E9E89CB5632D108 FOREIGN KEY (locatier_id) REFERENCES locatier (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO location (id, chantier_id, materiel_id, locatier_id, quantite, prix) SELECT id, chantier_id, materiel_id, locatier_id, quantite, prix FROM __temp__location');
        $this->addSql('DROP TABLE __temp__location');
        $this->addSql('CREATE INDEX IDX_5E9E89CB16880AAF ON location (materiel_id)');
        $this->addSql('CREATE INDEX IDX_5E9E89CBD0C0049D ON location (chantier_id)');
        $this->addSql('CREATE INDEX IDX_5E9E89CB5632D108 ON location (locatier_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_636F27F619EB6921');
        $this->addSql('CREATE TEMPORARY TABLE __temp__chantier AS SELECT id, client_id, intitule, adresse, ville, code_postal, date, date_modif, duree_travaux, travaux_supl, distance, note_perso, note_client, urgent, type_chantier FROM chantier');
        $this->addSql('DROP TABLE chantier');
        $this->addSql('CREATE TABLE chantier (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, client_id INTEGER DEFAULT NULL, intitule VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, date DATE NOT NULL, date_modif DATETIME DEFAULT NULL, duree_travaux INTEGER NOT NULL, travaux_supl DOUBLE PRECISION DEFAULT NULL, distance DOUBLE PRECISION NOT NULL, note_perso CLOB DEFAULT NULL, note_client CLOB DEFAULT NULL, urgent BOOLEAN DEFAULT NULL, type_chantier VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO chantier (id, client_id, intitule, adresse, ville, code_postal, date, date_modif, duree_travaux, travaux_supl, distance, note_perso, note_client, urgent, type_chantier) SELECT id, client_id, intitule, adresse, ville, code_postal, date, date_modif, duree_travaux, travaux_supl, distance, note_perso, note_client, urgent, type_chantier FROM __temp__chantier');
        $this->addSql('DROP TABLE __temp__chantier');
        $this->addSql('CREATE INDEX IDX_636F27F619EB6921 ON chantier (client_id)');
        $this->addSql('DROP INDEX IDX_9DABBCDDD0C0049D');
        $this->addSql('DROP INDEX IDX_9DABBCDDF3E2294');
        $this->addSql('CREATE TEMPORARY TABLE __temp__chantier_categorie_chantier AS SELECT chantier_id, categorie_chantier_id FROM chantier_categorie_chantier');
        $this->addSql('DROP TABLE chantier_categorie_chantier');
        $this->addSql('CREATE TABLE chantier_categorie_chantier (chantier_id INTEGER NOT NULL, categorie_chantier_id INTEGER NOT NULL, PRIMARY KEY(chantier_id, categorie_chantier_id))');
        $this->addSql('INSERT INTO chantier_categorie_chantier (chantier_id, categorie_chantier_id) SELECT chantier_id, categorie_chantier_id FROM __temp__chantier_categorie_chantier');
        $this->addSql('DROP TABLE __temp__chantier_categorie_chantier');
        $this->addSql('CREATE INDEX IDX_9DABBCDDD0C0049D ON chantier_categorie_chantier (chantier_id)');
        $this->addSql('CREATE INDEX IDX_9DABBCDDF3E2294 ON chantier_categorie_chantier (categorie_chantier_id)');
        $this->addSql('DROP INDEX UNIQ_C7440455A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__client AS SELECT id, user_id, nom, prenom, ville, adresse, code_postal, telephone, raison_sociale, email FROM client');
        $this->addSql('DROP TABLE client');
        $this->addSql('CREATE TABLE client (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, raison_sociale VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO client (id, user_id, nom, prenom, ville, adresse, code_postal, telephone, raison_sociale, email) SELECT id, user_id, nom, prenom, ville, adresse, code_postal, telephone, raison_sociale, email FROM __temp__client');
        $this->addSql('DROP TABLE __temp__client');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C7440455A76ED395 ON client (user_id)');
        $this->addSql('DROP INDEX IDX_E442E5CDE7A1254A');
        $this->addSql('DROP INDEX IDX_E442E5CD7968EFE6');
        $this->addSql('CREATE TEMPORARY TABLE __temp__contact_categorie_contact AS SELECT contact_id, categorie_contact_id FROM contact_categorie_contact');
        $this->addSql('DROP TABLE contact_categorie_contact');
        $this->addSql('CREATE TABLE contact_categorie_contact (contact_id INTEGER NOT NULL, categorie_contact_id INTEGER NOT NULL, PRIMARY KEY(contact_id, categorie_contact_id))');
        $this->addSql('INSERT INTO contact_categorie_contact (contact_id, categorie_contact_id) SELECT contact_id, categorie_contact_id FROM __temp__contact_categorie_contact');
        $this->addSql('DROP TABLE __temp__contact_categorie_contact');
        $this->addSql('CREATE INDEX IDX_E442E5CDE7A1254A ON contact_categorie_contact (contact_id)');
        $this->addSql('CREATE INDEX IDX_E442E5CD7968EFE6 ON contact_categorie_contact (categorie_contact_id)');
        $this->addSql('DROP INDEX IDX_F3C7E6B119EB6921');
        $this->addSql('CREATE TEMPORARY TABLE __temp__depannage AS SELECT id, client_id, intitule, adresse, ville, code_postal, horaire_depannage, prix_depannage, numero_intervention, distance, note_perso FROM depannage');
        $this->addSql('DROP TABLE depannage');
        $this->addSql('CREATE TABLE depannage (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, client_id INTEGER DEFAULT NULL, intitule VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, horaire_depannage VARCHAR(255) NOT NULL, prix_depannage DOUBLE PRECISION NOT NULL, numero_intervention INTEGER NOT NULL, distance DOUBLE PRECISION DEFAULT NULL, note_perso CLOB DEFAULT NULL)');
        $this->addSql('INSERT INTO depannage (id, client_id, intitule, adresse, ville, code_postal, horaire_depannage, prix_depannage, numero_intervention, distance, note_perso) SELECT id, client_id, intitule, adresse, ville, code_postal, horaire_depannage, prix_depannage, numero_intervention, distance, note_perso FROM __temp__depannage');
        $this->addSql('DROP TABLE __temp__depannage');
        $this->addSql('CREATE INDEX IDX_F3C7E6B119EB6921 ON depannage (client_id)');
        $this->addSql('DROP INDEX IDX_8B27C52BD0C0049D');
        $this->addSql('CREATE TEMPORARY TABLE __temp__devis AS SELECT id, chantier_id, numero_devis, prix_devis, statut, paiement_acompte, paiement_intermed, paiement_final FROM devis');
        $this->addSql('DROP TABLE devis');
        $this->addSql('CREATE TABLE devis (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, chantier_id INTEGER DEFAULT NULL, numero_devis INTEGER NOT NULL, prix_devis DOUBLE PRECISION NOT NULL, statut VARCHAR(255) NOT NULL, paiement_acompte DOUBLE PRECISION DEFAULT NULL, paiement_intermed DOUBLE PRECISION DEFAULT NULL, paiement_final DOUBLE PRECISION DEFAULT NULL)');
        $this->addSql('INSERT INTO devis (id, chantier_id, numero_devis, prix_devis, statut, paiement_acompte, paiement_intermed, paiement_final) SELECT id, chantier_id, numero_devis, prix_devis, statut, paiement_acompte, paiement_intermed, paiement_final FROM __temp__devis');
        $this->addSql('DROP TABLE __temp__devis');
        $this->addSql('CREATE INDEX IDX_8B27C52BD0C0049D ON devis (chantier_id)');
        $this->addSql('DROP INDEX IDX_D8698A7641DEFADA');
        $this->addSql('CREATE TEMPORARY TABLE __temp__document AS SELECT id, devis_id, content_url, file_path FROM document');
        $this->addSql('DROP TABLE document');
        $this->addSql('CREATE TABLE document (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, devis_id INTEGER DEFAULT NULL, content_url VARCHAR(255) DEFAULT NULL, file_path VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO document (id, devis_id, content_url, file_path) SELECT id, devis_id, content_url, file_path FROM __temp__document');
        $this->addSql('DROP TABLE __temp__document');
        $this->addSql('CREATE INDEX IDX_D8698A7641DEFADA ON document (devis_id)');
        $this->addSql('DROP INDEX IDX_EC9FA95ED0C0049D');
        $this->addSql('CREATE TEMPORARY TABLE __temp__image_chantier AS SELECT id, chantier_id, image FROM image_chantier');
        $this->addSql('DROP TABLE image_chantier');
        $this->addSql('CREATE TABLE image_chantier (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, chantier_id INTEGER DEFAULT NULL, image VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO image_chantier (id, chantier_id, image) SELECT id, chantier_id, image FROM __temp__image_chantier');
        $this->addSql('DROP TABLE __temp__image_chantier');
        $this->addSql('CREATE INDEX IDX_EC9FA95ED0C0049D ON image_chantier (chantier_id)');
        $this->addSql('DROP INDEX IDX_2B453DE5AFF9529D');
        $this->addSql('CREATE TEMPORARY TABLE __temp__image_depannage AS SELECT id, depannage_id, image FROM image_depannage');
        $this->addSql('DROP TABLE image_depannage');
        $this->addSql('CREATE TABLE image_depannage (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, depannage_id INTEGER DEFAULT NULL, image VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO image_depannage (id, depannage_id, image) SELECT id, depannage_id, image FROM __temp__image_depannage');
        $this->addSql('DROP TABLE __temp__image_depannage');
        $this->addSql('CREATE INDEX IDX_2B453DE5AFF9529D ON image_depannage (depannage_id)');
        $this->addSql('DROP INDEX IDX_5E9E89CBD0C0049D');
        $this->addSql('DROP INDEX IDX_5E9E89CB16880AAF');
        $this->addSql('DROP INDEX IDX_5E9E89CB5632D108');
        $this->addSql('CREATE TEMPORARY TABLE __temp__location AS SELECT id, chantier_id, materiel_id, locatier_id, quantite, prix FROM location');
        $this->addSql('DROP TABLE location');
        $this->addSql('CREATE TABLE location (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, chantier_id INTEGER DEFAULT NULL, materiel_id INTEGER DEFAULT NULL, locatier_id INTEGER DEFAULT NULL, quantite INTEGER NOT NULL, prix DOUBLE PRECISION NOT NULL)');
        $this->addSql('INSERT INTO location (id, chantier_id, materiel_id, locatier_id, quantite, prix) SELECT id, chantier_id, materiel_id, locatier_id, quantite, prix FROM __temp__location');
        $this->addSql('DROP TABLE __temp__location');
        $this->addSql('CREATE INDEX IDX_5E9E89CBD0C0049D ON location (chantier_id)');
        $this->addSql('CREATE INDEX IDX_5E9E89CB16880AAF ON location (materiel_id)');
        $this->addSql('CREATE INDEX IDX_5E9E89CB5632D108 ON location (locatier_id)');
    }
}
