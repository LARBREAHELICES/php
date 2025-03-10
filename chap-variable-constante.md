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
2. Utilisez `echo` pour afficher "Hello World!" dans le navigateur.

---

#### **Exercice 2 : Afficher la date actuelle**

- **Objectif** : Utilisez la fonction `date()` pour afficher la date et l'heure actuelles du serveur.

**Indications :**
1. Utilisez la fonction `date()` avec le format `Y-m-d H:i:s` pour obtenir la date et l'heure actuelle.
2. Affichez cette information dans votre fichier PHP.

---

#### **Exercice 3 : Manipuler une variable de type chaîne**

- **Objectif** : Créez une variable `$message` contenant le texte "Bienvenue à PHP". Affichez ce message avec `echo`.

**Indications :**
1. Déclarez une variable `$message` avec la valeur "Bienvenue à PHP".
2. Affichez le contenu de cette variable à l'aide de `echo`.

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

**Code attendu :**
```php
<?php
  $a = 5;
  $b = 10;
  $c = 15;

  // Permutation sans variable temporaire
  $a = $a + $b + $c; // a = 30
  $b = $a - ($b + $c); // b = 5
  $c = $a - ($b + $c); // c = 10
  $a = $a - ($b + $c); // a = 15

  // Affichage des résultats après permutation
  echo "a = $a, b = $b, c = $c";  // a = 15, b = 5, c = 10
?>
```

---

### **Exercice 2 : Inverser l'ordre de deux variables**

**Objectif :** Inverser l'ordre de deux variables sans utiliser de variable temporaire.

**Consigne :** Créez deux variables, `$x` et `$y`, et inversez leurs valeurs sans utiliser de variable temporaire.

**Indication :** Vous pouvez toujours utiliser l'addition et la soustraction pour effectuer l'échange.

**Code attendu :**
```php
<?php
  $x = 100;
  $y = 200;

  // Inversion des variables sans variable temporaire
  $x = $x + $y; // x = 300
  $y = $x - $y; // y = 100
  $x = $x - $y; // x = 200

  // Affichage des résultats après inversion
  echo "x = $x, y = $y";  // x = 200, y = 100
?>
```

---

### **Exercice 3 : Calculer la somme des carrés de deux variables**

**Objectif :** Calculez la somme des carrés de deux variables sans utiliser de fonction ou de boucle.

**Consigne :** Créez deux variables `$a` et `$b` et calculez la somme de leurs carrés. Affichez le résultat.

**Indication :** Vous pouvez utiliser l’opérateur `*` pour calculer le carré d’un nombre.

**Code attendu :**
```php
<?php
  $a = 3;
  $b = 4;

  // Calcul des carrés et somme
  $sumOfSquares = ($a * $a) + ($b * $b);

  // Affichage du résultat
  echo "La somme des carrés de $a et $b est : $sumOfSquares";  // La somme des carrés de 3 et 4 est : 25
?>
```

---

### **Exercice 4 : Vérifier si un nombre est pair ou impair**

**Objectif :** Vérifiez si un nombre donné est pair ou impair sans utiliser de condition `if`.

**Consigne :** Créez une variable `$n` et vérifiez si ce nombre est pair ou impair.

**Indication :** Utilisez l’opérateur modulo `%` pour déterminer si le nombre est divisible par 2.

**Code attendu :**
```php
<?php
  $n = 7;

  // Vérification si n est pair ou impair
  echo ($n % 2 == 0) ? "$n est pair" : "$n est impair";  // 7 est impair
?>
```

---

### **Exercice 5 : Calculer le produit de trois variables**

**Objectif :** Multipliez trois variables ensemble sans utiliser de parenthèses.

**Consigne :** Créez trois variables `$a`, `$b`, et `$c`, et calculez leur produit.

**Indication :** Vous pouvez multiplier directement les valeurs sans besoin de parenthèses.

**Code attendu :**
```php
<?php
  $a = 2;
  $b = 3;
  $c = 4;

  // Calcul du produit des trois variables
  $product = $a * $b * $c;

  // Affichage du résultat
  echo "Le produit de $a, $b et $c est : $product";  // Le produit de 2, 3 et 4 est : 24
?>
```

---

### **Exercice 6 : Calculer la différence de carrés de deux variables**

**Objectif :** Calculez la différence de carrés de deux variables.

**Consigne :** Créez deux variables `$a` et `$b` et calculez la différence entre le carré de `$a` et le carré de `$b`.

**Indication :** Utilisez l’opérateur `*` pour calculer les carrés des variables et faites la soustraction ensuite.

**Code attendu :**
```php
<?php
  $a = 6;
  $b = 4;

  // Calcul de la différence des carrés
  $differenceOfSquares = ($a * $a) - ($b * $b);

  // Affichage du résultat
  echo "La différence des carrés de $a et $b est : $differenceOfSquares";  // La différence des carrés de 6 et 4 est : 20
?>
```
