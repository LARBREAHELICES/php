### **Support**

Dans la suite du cours, vous vous aiderez du support de cours en ligne :

[PHP Manual - PHP.net](https://www.php.net/manual/fr/)

---

### **Chapitre 1 : Structure d'un fichier PHP**

#### 1. **Structure de base d'un fichier PHP**

Un fichier PHP commence par `<?php` et se termine par `?>`. Le code PHP est écrit entre ces balises. Le fichier peut également contenir du code HTML ou JavaScript.

Exemple simple :
```php
<?php
  // Code PHP ici
  echo "Bonjour, PHP!";
```

- **<?php** : Balise d'ouverture PHP.
- **?>** : Balise de fermeture PHP (optionnelle dans les fichiers contenant uniquement du PHP). Déconseillé 
- Attention de ne pas mettre d'espace avant la balise d'ouverture du PHP dans un script PHP (que du script PHP).

Dans un fichier mélangeant HTML et PHP, voici ce à quoi cela pourrait ressembler :

```phtml
<p><?php echo "hello"; ?></p>
```

**Remarques :**
- La balise de fermeture `?>` est optionnelle si le fichier contient uniquement du code PHP.
- Pour faire des commentaires dans vos fichiers PHP, vous pouvez utiliser :

```php
// commentaire ligne unique

/*
Commentaire
multiligne
*/
```

#### 2. **Exécution de fichiers PHP**

Un fichier PHP doit être exécuté sur un serveur web avec PHP installé. Vous pouvez tester un fichier PHP via un navigateur en accédant à l'URL du fichier sur votre serveur local, par exemple `http://localhost/cours_php/index.php`.

**Exemple d'utilisation de `phpinfo()`** :  
Utilisez `phpinfo()` pour afficher les informations de configuration de PHP.

Exemple de fichier `index.php` :
```php
<?php
  phpinfo();
```

Ce fichier affichera toutes les informations de configuration de PHP.

---

### **Chapitre 2 : Créer et manipuler des constantes et variables**

#### 1. **Les variables en PHP**

Les variables en PHP sont des conteneurs pour stocker des données. Elles commencent par le symbole `$` suivi du nom de la variable.

**Règles pour nommer une variable :**
- Elle doit commencer par une lettre ou un underscore `_`.
- Elle peut contenir des chiffres après le premier caractère.
- PHP est sensible à la casse (`$variable` et `$Variable` sont différentes).

Exemple :
```php
$name = "John";  // Variable de type chaîne
$age = 30;       // Variable de type entier

// Affichage avec printf
printf("Nom : %s, Âge : %d", $name, $age);
```

Les types de données de variables peuvent être :
- **String** : Chaîne de caractères
- **Integer** : Nombre entier
- **Float** : Nombre à virgule flottante
- **Boolean** : Valeur booléenne (true/false)


## Exercice 

Créez un script pour permuter les valeurs des variables suivantes de manière circulaire -> 1, 2, 3 à 3, 1, 2 pour respectivement les variable ci-dessous.

```php
$a = 1;
$b = 2;
$c = 3;

// séquence suivante : 3 1 2 
```


#### 2. **Les constantes en PHP**

Une constante est une valeur qui ne peut pas être modifiée après sa déclaration. Elle est définie avec la fonction `define()`.

**Syntaxe de `define()`** :
```php
define("PI", 3.14159);
```

Les constantes sont généralement écrites en majuscules par convention pour les différencier des variables.

Exemple :
```php
define("TAXE", 0.20);  // Définition d'une constante
$prix = 100;
$prix_total = $prix + ($prix * TAXE);
echo "Prix total avec taxe : " . $prix_total;
```

Les constantes sont accessibles partout dans le code, contrairement aux variables qui peuvent être limitées à une fonction ou un bloc de code.

---

### **Exercices**

#### **Exercice 1 : Créer un fichier PHP simple**

- **Objectif** : Créez un fichier PHP appelé `index.php`. Dans ce fichier, affichez "Hello World!" à l'aide de PHP.

**Indications :**
1. Déclarez un fichier PHP.
2. Utilisez `echo` pour afficher "Hello World!" dans le navigateur.`


```php

echo "Hello World !" ;

// retour à la ligne dans la console
echo "\n";

// retour à la ligne dans la page Web
echo "<br />";

```

---

#### **Exercice 2 : Afficher la date actuelle**

- **Objectif** : Utilisez la fonction `date()` pour afficher la date et l'heure actuelles du serveur.

**Indications :**
1. Utilisez la fonction `date()` avec le format `Y-m-d H:i:s` pour obtenir la date et l'heure actuelle.
2. Affichez cette information dans votre fichier PHP.

```php

// Aujourd'hui, le 10 Mars 2001, 5:16:18 pm, Fuseau horaire 
// Mountain Standard Time (MST)
 
$today = date("F j, Y, g:i a");                   // March 10, 2001, 5:16 pm
$today = date("m.d.y");                           // 03.10.01
$today = date("j, n, Y");                         // 10, 3, 2001
$today = date("Ymd");                             // 20010310
$today = date('h-i-s, j-m-y, it is w Day');       // 05-16-18, 10-03-01, 1631 1618 6 Satpm01
$today = date('\i\t \i\s \t\h\e jS \d\a\y.');     // It is the 10th day (10ème jour du mois).
$today = date("D M j G:i:s T Y");                 // Sat Mar 10 17:16:18 MST 2001
$today = date('H:m:s \m \e\s\t\ \l\e\ \m\o\i\s'); // 17:03:18 m est le mois
$today = date("H:i:s");                           // 17:16:18
$today = date("Y-m-d H:i:s");                     // 2001-03-10 17:16:18 (le format DATETIME de MySQL)

echo "\n";
```
---

#### **Exercice 3 : Manipuler une variable de type chaîne**

- **Objectif** : Créez une variable `$message` contenant le texte "Bienvenue à PHP". Affichez ce message avec `echo`.

**Indications :**
1. Déclarez une variable `$message` avec la valeur "Bienvenue à PHP".
2. Affichez le contenu de cette variable à l'aide de `echo`.


```php
$message = "Bienvenue à PHP" ;
echo $message; 
``` 
---

#### **Exercice 4 : Concatenation de chaînes**

- **Objectif** : Créez deux variables `$prenom` et `$nom`, puis concaténez-les pour afficher le message "Bonjour Alice Dupont".

**Indications :**
1. Déclarez une variable `$prenom` avec la valeur "Alice".
2. Déclarez une variable `$nom` avec la valeur "Dupont".
3. Concaténez ces deux variables avec l'opérateur `.` et affichez le résultat.

---

#### **Exercice 5 : Calculer la somme de deux nombres**

- **Objectif** : Créez deux variables `$a` et `$b` contenant des nombres et calculez leur somme.

**Indications :**
1. Déclarez les variables `$a` et `$b` avec des valeurs numériques.
2. Calculez la somme de ces deux variables.
3. Affichez le résultat.

---

#### **Exercice 6 : Utiliser une constante**

- **Objectif** : Déclarez une constante `TAXE` avec la valeur `0.20`. Créez une variable `$prix` contenant un montant et affichez le prix total après application de la taxe.

**Indications :**
1. Déclarez la constante `TAXE` avec la fonction `define()`.
2. Déclarez la variable `$prix` avec une valeur numérique.
3. Calculez le prix total en appliquant la taxe.
4. Affichez le prix total.

---

#### **Exercice 7 : Vérifier le type de données d'une variable**

- **Objectif** : Créez une variable `$valeur` contenant un nombre entier et utilisez la fonction `var_dump()` pour afficher son type et sa valeur.

**Indications :**
1. Créez une variable `$valeur` et assignez-lui une valeur numérique.
2. Utilisez la fonction `var_dump()` pour afficher le type et la valeur de la variable.

---

#### **Exercice 8 : Utiliser `printf()`**

- **Objectif** : Utilisez la fonction `printf()` pour afficher un message formaté.

**Indications :**
1. Créez une variable `$age` et assignez-lui une valeur numérique.
2. Utilisez `printf()` pour afficher un message formaté avec l'âge.

---

## Exercices supplémentaires 

### **Exercice 1 : Permutation de trois variables**

**Objectif :** Échangez les valeurs de trois variables sans utiliser de variable temporaire.

**Consigne :** Créez trois variables `$a`, `$b` et `$c` avec des valeurs différentes (par exemple, `$a = 5`, `$b = 10`, et `$c = 15`). Permutez leurs valeurs sans utiliser de variable temporaire.

**Indication :** Vous pouvez toujours utiliser des opérations arithmétiques pour permuter les valeurs sans variable temporaire.


```php
```

---

### **Exercice 2 : Inverser l'ordre de deux variables**

**Objectif :** Inverser l'ordre de deux variables sans utiliser de variable temporaire.

**Consigne :** Créez deux variables, `$x` et `$y`, et inversez leurs valeurs sans utiliser de variable temporaire.

**Indication :** Vous pouvez toujours utiliser l'addition et la soustraction pour effectuer l'échange.

```php

```

---

### **Exercice 3 : Calculer la somme des carrés de deux variables**

**Objectif :** Calculez la somme des carrés de deux variables sans utiliser de fonction ou de boucle.

**Consigne :** Créez deux variables `$a` et `$b` et calculez la somme de leurs carrés. Affichez le résultat.

**Indication :** Vous pouvez utiliser l’opérateur `*` pour calculer le carré d’un nombre.


```php

```

---

### **Exercice 4 : Vérifier si un nombre est pair ou impair**

**Objectif :** Vérifiez si un nombre donné est pair ou impair sans utiliser de condition `if`.

**Consigne :** Créez une variable `$n` et vérifiez si ce nombre est pair ou impair.

**Indication :** Utilisez l’opérateur modulo `%` pour déterminer si le nombre est divisible par 2.


```php

```

---

### **Exercice 5 : Calculer le produit de trois variables**

**Objectif :** Multipliez trois variables ensemble sans utiliser de parenthèses.

**Consigne :** Créez trois variables `$a`, `$b`, et `$c`, et calculez leur produit.

**Indication :** Vous pouvez multiplier directement les valeurs sans besoin de parenthèses.


```php

```

---

### **Exercice 6 : Calculer la différence de carrés de deux variables**

**Objectif :** Calculez la différence de carrés de deux variables.

**Consigne :** Créez deux variables `$a` et `$b` et calculez la différence entre le carré de `$a` et le carré de `$b`.

**Indication :** Utilisez l’opérateur `*` pour calculer les carrés des variables et faites la soustraction ensuite.


```php

```
