# 🎟️ Application de Billetterie en Ligne - Laravel

Ce projet est une application web de billetterie développée avec Laravel. Il permet aux administrateurs de créer et gérer des événements, et aux internautes d'y participer sans avoir besoin de créer un compte.

---

## 🔍 Fonctionnalités

### 🎯 Côté public (utilisateurs)
- Consulter la liste des événements actifs.
- Voir les détails d’un événement.
- Participer à un événement en renseignant nom, prénom et email.
- Réception automatique d’un e-mail contenant un ticket unique après inscription.
- Limite de participants respectée : un événement complet devient non-inscriptible.

### 🛠️ Côté administrateur
- Créer, modifier, supprimer (soft delete) un événement.
- Ajouter les informations : titre, description, date de début, date de fin, statut, nombre maximum de participants.
- Voir la liste des participants à un événement donné.
- Le statut d’un événement passe automatiquement à **expiré** à 23h59 le jour de la date de fin.

---

## 🧰 Technologies utilisées

- **Framework** : Laravel 10
- **Base de données** : MySQL
- **Mail** : Mailtrap (ou SMTP)
- **Templates** : Blade
- **Langage** : PHP

---

## ⚙️ Installation

1. Cloner le dépôt :

```bash
git clone https://github.com/assanihulda/ticketerie-laravel
cd nom-du-depot
