**Schexe - Interpréteur Scheme en PHP**

### Installation

1. **Cloner le référentiel**

   ```bash
   git clone https://github.com/votre-utilisateur/schexe.git
   ```

2. **Accéder au répertoire du projet**

   ```bash
   cd schexe
   ```

3. **Installer les dépendances avec Composer**

   ```bash
   composer install
   ```

### Utilisation

1. **Lancer l'application avec PHP intégré (serveur local)**

   ```bash
   php -S localhost:8000 -t public
   ```

2. **Accéder à l'interpréteur Scheme dans le navigateur**

   Ouvrez votre navigateur et allez à l'adresse [http://localhost:8000](http://localhost:8000).

### Fonctionnalités

- Interprétation de base pour les expressions arithmétiques Scheme.
- Prise en charge des opérations telles que l'addition, la soustraction, la multiplication, la division et le modulo.
- Gestion des parenthèses pour les expressions imbriquées.

### Difficultés Rencontrées

- L'analyse syntaxique des expressions Scheme peut être complexe, en particulier la gestion des parenthèses imbriquées.
- Gérer les priorités des opérations et les règles de grammaire Scheme.
- Assurer la prise en charge des différentes fonctions Scheme de manière extensible.

### Documents de Conception

- Aucun document de conception fourni dans le cadre de ce référentiel.

### Liens Utiles

- [Documentation PHP](https://www.php.net/manual/en/)
- [Scheme (Wikipedia)](https://en.wikipedia.org/wiki/Scheme_(programming_language))

### Remarques

- Assurez-vous d'avoir PHP installé sur votre machine.
- Le serveur intégré de PHP est utilisé uniquement à des fins de démonstration. En production, envisagez d'utiliser un serveur Web complet comme Apache ou Nginx.
