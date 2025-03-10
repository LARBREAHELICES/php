### ** Maîtriser les opérateurs, les structures de contrôle et les boucles en PHP**

---

### **1. Les opérateurs en PHP**

Les opérateurs sont des symboles qui effectuent des opérations sur des variables ou des valeurs.

#### **1.1. Opérateurs arithmétiques**

Les opérateurs arithmétiques permettent d'effectuer des opérations mathématiques sur des nombres.

| Opérateur | Description                           | Exemple           |
|-----------|---------------------------------------|-------------------|
| `+`       | Addition                              | `$a + $b`         |
| `-`       | Soustraction                          | `$a - $b`         |
| `*`       | Multiplication                        | `$a * $b`         |
| `/`       | Division                              | `$a / $b`         |
| `%`       | Modulo (reste de la division)         | `$a % $b`         |

**Exemple** :
```php
<?php
  $number1 = 10;
  $number2 = 5;
  
  echo $number1 + $number2; // Affiche 15
  echo $number1 - $number2; // Affiche 5
  echo $number1 * $number2; // Affiche 50
  echo $number1 / $number2; // Affiche 2
  echo $number1 % $number2; // Affiche 0
```

#### **1.2. Opérateurs de comparaison**

Les opérateurs de comparaison sont utilisés pour comparer deux valeurs.

| Opérateur | Description                         | Exemple          |
|-----------|-------------------------------------|------------------|
| `==`      | Égalité (valeur)                    | `$a == $b`       |
| `===`     | Identité (valeur et type)           | `$a === $b`      |
| `!=`      | Inégalité (valeur)                  | `$a != $b`       |
| `!==`     | Non-identité (valeur et type)       | `$a !== $b`      |
| `>`       | Supérieur à                         | `$a > $b`        |
| `<`       | Inférieur à                         | `$a < $b`        |
| `>=`      | Supérieur ou égal à                 | `$a >= $b`       |
| `<=`      | Inférieur ou égal à                 | `$a <= $b`       |

**Exemple** :
```php
<?php
  $a = 10;
  $b = 5;
  
  var_dump($a == $b);  // Affiche bool(false)
  var_dump($a !== $b); // Affiche bool(true)
  var_dump($a > $b);   // Affiche bool(true)
```

#### **1.3. Opérateurs logiques**

Les opérateurs logiques sont utilisés pour combiner des expressions conditionnelles.

| Opérateur | Description                         | Exemple           |
|-----------|-------------------------------------|-------------------|
| `&&`      | ET logique                          | `$a && $b`        |
| `||`      | OU logique                          | `$a || $b`        |
| `!`       | Négation                            | `!$a`             |

**Exemple** :
```php
<?php
  $isRaining = true;
  $isCold = false;

  var_dump($isRaining && $isCold); // Affiche bool(false)
  var_dump($isRaining || $isCold); // Affiche bool(true)
  var_dump(!$isRaining);           // Affiche bool(false)
```

---

### **2. Structures de contrôle en PHP**

Les structures de contrôle permettent d'exécuter certaines parties de code sous certaines conditions.

#### **2.1. La structure `if`**

La structure `if` permet d'exécuter un bloc de code si une condition est vraie.

**Exemple** :
```php
<?php
  $age = 18;

  if ($age >= 18) {
      echo "You are an adult.";
  }
```

#### **2.2. La structure `else`**

L'instruction `else` permet d'exécuter un bloc de code si la condition du `if` est fausse.

**Exemple** :
```php
<?php
  $age = 16;

  if ($age >= 18) {
      echo "You are an adult.";
  } else {
      echo "You are not an adult.";
  }
```

#### **2.3. La structure `elseif`**

La structure `elseif` permet de tester plusieurs conditions si la première est fausse.

**Exemple** :
```php
<?php
  $age = 20;

  if ($age < 18) {
      echo "You are a minor.";
  } elseif ($age >= 18 && $age < 60) {
      echo "You are an adult.";
  } else {
      echo "You are a senior.";
  }
```

---

### **3. Les boucles en PHP**

Les boucles permettent d'exécuter un bloc de code plusieurs fois en fonction d'une condition.

#### **3.1. La boucle `for`**

La boucle `for` est utilisée pour répéter un bloc de code un certain nombre de fois.

**Exemple** :
```php
<?php
  for ($i = 1; $i <= 5; $i++) {
      echo "Number: $i\n";
  }
```

#### **3.2. La boucle `while`**

La boucle `while` continue tant que la condition est vraie.

**Exemple** :
```php
<?php
  $i = 1;
  
  while ($i <= 5) {
      echo "Number: $i\n";
      $i++;
  }
```

#### **3.3. La boucle `foreach`**

La boucle `foreach` est utilisée pour parcourir les éléments d'un tableau.

**Exemple** :
```php
<?php
  $fruits = ["Apple", "Banana", "Cherry"];
  
  foreach ($fruits as $fruit) {
      echo "Fruit: $fruit\n";
  }
```

---

### **Exercice 1 : Calcul des puissances**

Écrivez un programme PHP qui calcule la puissance d'un nombre. La fonction devra prendre deux arguments :
- La base `x`
- L'exposant `n`

Implémentez une boucle pour effectuer le calcul. Vous ne devez pas utiliser l'opérateur `**`.

**Exemple :**
Si l'utilisateur entre `2` pour la base et `3` pour l'exposant, la fonction doit retourner `8` (car 2^3 = 8).

---

### **Exercice 2 : Triangle de nombres**

Écrivez un programme PHP qui affiche un triangle de nombres de cette forme, en utilisant une boucle `for` :
```
1
22
333
4444
55555
```

Le nombre de lignes doit être défini par une variable `$n` que l'utilisateur peut changer. Par exemple, si `$n` vaut 5, le triangle doit être de 5 lignes.

---

### **Exercice 3 : Inversion de chaîne de caractères**

Écrivez une fonction PHP qui inverse une chaîne de caractères sans utiliser la fonction `strrev`. Utilisez une boucle `for` pour parcourir la chaîne de la fin vers le début et reconstruire la chaîne inversée.

**Exemple :**
Si l'entrée est "Hello", la sortie doit être "olleH".

---

### **Exercice 4 : Compteur d'occurences dans un tableau**

Écrivez une fonction PHP qui prend un tableau d'entiers et un nombre cible. La fonction doit retourner le nombre d'occurrences de ce nombre dans le tableau.

**Exemple :**
```php
$numbers = [1, 2, 2, 3, 4, 2, 5];
$target = 2;
```
La fonction doit retourner `3` (car `2` apparaît 3 fois dans le tableau).

---

### **Exercice 5 : Fibonacci avec une boucle**

Écrivez un programme PHP qui génère et affiche les premiers `n` termes de la suite de Fibonacci, où `n` est un nombre que l'utilisateur peut choisir. Utilisez une boucle pour générer la suite. Ne devez pas utiliser de fonction récursive.

**Exemple :**
Si l'utilisateur entre `6` pour `n`, le programme doit afficher `0 1 1 2 3 5`, car ce sont les 6 premiers termes de la suite de Fibonacci.
