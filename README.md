# 📚 LibCore — Gestion de Bibliothèque

## 📌 Description

**LibCore** est une application de gestion de bibliothèque développée en **PHP orienté objet (OOP)**.
Elle permet de gérer les livres, les membres et les opérations d’emprunt et de retour de manière structurée et sécurisée.

---
## 📌 diagrams

## 📌 diagrams de classe
<img width="846" height="784" alt="declass" src="https://github.com/user-attachments/assets/d8230637-112c-4aa9-809d-ce55535ae248" />
## 📌 diagrams de use case
<img width="760" height="832" alt="case" src="https://github.com/user-attachments/assets/2a0819aa-6c1e-40eb-8410-71431b3e82bd" />
## 📌 ERD
<img width="553" height="625" alt="image" src="https://github.com/user-attachments/assets/9a7e09df-bdaf-4264-b605-967bbe924ca1" />



---
## 🎯 Objectif du projet

* Digitaliser la gestion d’une bibliothèque associative
* Automatiser les emprunts et retours de livres
* Appliquer les règles métier selon le type de membre
* Utiliser une architecture propre basée sur la POO

---

## ⚙️ Fonctionnalités

### 👨‍💼 Bibliothécaire

* Ajouter / supprimer des livres
* Gérer les membres
* Consulter le stock des livres
* Marquer un livre en réparation
* Suivre les emprunts

### 👤 Membre

* Rechercher un livre
* Emprunter un livre disponible
* Retourner un livre
* Consulter ses emprunts

---

## 👥 Types de membres

* **Student** → maximum 3 livres
* **Teacher** → maximum 10 livres

---

## 🛠️ Technologies utilisées

* PHP (OOP)
* UML (modélisation)
* Git & GitHub
* Trello (gestion de projet)
* StarUML

---

## 📁 Structure du projet

```
LibCore/
├── src/
│   ├── Entities/
│   └── Services/
├── docs/
├── mainAdmin.php
├── mainMember.php
├── README.md
```

---

## 📊 Modélisation

Le projet contient :

* Diagramme de cas d’utilisation (Use Case)
* Diagramme de classes (Class Diagram)
* Modélisation des relations entre entités

---

## 🚀 Améliorations futures

* Ajout d’une base de données MySQL
* Développement d’une interface web
* Authentification des utilisateurs
* Notifications automatiques
* API REST

---

## 👨‍🎓 Auteurs

* Développeur 1
* Développeur 2

---

## 📌 Conclusion

LibCore est un projet académique qui simule un système réel de gestion de bibliothèque en utilisant les principes de la programmation orientée objet.
