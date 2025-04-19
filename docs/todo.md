# TODO List

## [x] Configuration

1. [x] Configuration de la base de donnee
   1. [x] BDD
      1. [x] Cree la base de donnee psql
   2. [x] Metier
      1. [x] Modifier le fichier de configuration

## [x] Authentification

- [x] BDD
  - [x] Cree la migration create users (2)
  - [x] modifier le fichier existant (2)
  - [x] cree la migration create user_profiles
  - [x] faire la migration
- [x] Affichage
  - [x] login
    - [x] route de login
    - [x] page de login
    - [x] gestion d'erreur
  - [x] register
    - [x] route de register
    - [x] page de register
      - [x] formulaire de user et son profile
    - [x] gestion d'erreur
- [x] Metier
  - [x] cree le model users (6)
  - [x] cree le model user_profile
    - [x] faire la liaison entre user_profiles et users

## [ ] Creation de caisse (Account)

- [ ] Creation Bank<!-- Type de caisse : mobile money , physique , caisse , tirelir , banque -->
  - [ ] generer le model et la migration
  - [ ] modifier la structure de la migration
  - [ ] modifier model
    - [ ] ajouter HasCustomId
- [ ] Creation currency
  - [ ] generer le model et la migration
  - [ ] modifier la structure de la migration
  - [ ] modifier model
    - [ ] ajouter HasCustomId
- [ ] Creation de account
  - [ ] generer le model et la migration
  - [ ] modifier la structure de la migration
  - [ ] modifier le model
    - [ ] ajouter HasCustomId
    - [ ] rajouter relations
      - [ ] currency
      - [ ] bank
      - [ ] user
- [ ] Creation de account_info
  - [ ] generer le moddel et la migration
  - [ ] modifier la migration
  - [ ] modifier le model
    - [ ] ajouter HasCustomId
    - [ ] rajouter relations
      - [ ] account
- [ ] Creation de cash_report
  - [ ] generer le model et la migration
  - [ ] modifier la migration
  - [ ] modifier le model
    - [ ] ajouter HasCustomId
    - [ ] rajouter les relations
      - [ ] account
- [ ] Insertion account
  - [ ] Affichage
    - [ ] Cree le controller
      - [ ] fonction get:createForm() -> formulaire de caisse
    - [ ] cree le router groupe user
      - [ ] createAccount
    - [ ] page formulaire d'insertion
  - [ ] Metier
    - [ ] requeteAccount -> validation rules
      - [ ] name required
      - [ ] id_bank , id_user , id_currency exists
    - [ ] controller
      - [ ] fonction post:create()
        - [ ] cree un nouveau account
        - [ ] cree un cash report avec montant de depart 0
- [ ] List account
  - [ ] BDD
    - [ ] cree la vue etat_account
  - [ ] Affichage
    - [ ] controller
      - [ ] index -> lister les casses de l'utilisateur
        - [ ] recuperer les comptes de l'utilisateur avec
    - [ ] router groupe user
      - [ ] listAccount
