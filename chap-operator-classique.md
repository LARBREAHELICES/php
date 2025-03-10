# **Les Opérateurs Classiques en PHP 8.3**


#### **1. Les Opérateurs Arithmétiques**

Les opérateurs arithmétiques sont utilisés pour effectuer des opérations mathématiques de base sur les nombres.

##### **Exemples :**
- **Addition (`+`)** : Ajoute deux opérandes.
- **Soustraction (`-`)** : Soustrait le second opérande du premier.
- **Multiplication (`*`)** : Multiplie les deux opérandes.
- **Division (`/`)** : Divise le premier opérande par le second.
- **Modulo (`%`)** : Retourne le reste de la division du premier opérande par le second.
- **Exponentiation (`**`)** : Effectue une puissance (comme en mathématiques, 2^3 donne 8).

##### **Exemple :**
```php
$a = 10;
$b = 3;

echo $a + $b;  // 13
echo $a - $b;  // 7
echo $a * $b;  // 30
echo $a / $b;  // 3.333333...
echo $a % $b;  // 1
echo $a ** $b; // 1000
```

---

#### **2. Les Opérateurs de Comparaison**

Les opérateurs de comparaison sont utilisés pour comparer deux valeurs.

##### **Exemples :**
- **Égal à (`==`)** : Vérifie si deux valeurs sont égales.
- **Identique à (`===`)** : Vérifie si deux valeurs sont égales et ont le même type.
- **Différent de (`!=`)** : Vérifie si deux valeurs sont différentes.
- **Non identique à (`!==`)** : Vérifie si deux valeurs sont différentes ou ont des types différents.
- **Plus grand que (`>`)** : Vérifie si le premier opérande est plus grand que le second.
- **Plus petit que (`<`)** : Vérifie si le premier opérande est plus petit que le second.
- **Plus grand ou égal à (`>=`)** : Vérifie si le premier opérande est plus grand ou égal au second.
- **Plus petit ou égal à (`<=`)** : Vérifie si le premier opérande est plus petit ou égal au second.

##### **Exemple :**
```php
$a = 10;
$b = 20;

echo $a == $b;  // false
echo $a === $b; // false
echo $a != $b;  // true
echo $a !== $b; // true
echo $a > $b;   // false
echo $a < $b;   // true
echo $a >= $b;  // false
echo $a <= $b;  // true
```

---

#### **3. Les Opérateurs Logiques**

Les opérateurs logiques sont utilisés pour combiner des expressions conditionnelles ou booléennes.

##### **Exemples :**
- **ET logique (`&&` ou `and`)** : Retourne `true` si les deux opérandes sont vrais.
- **OU logique (`||` ou `or`)** : Retourne `true` si au moins un des opérandes est vrai.
- **Négation logique (`!`)** : Inverse la valeur d'un opérande booléen.
- **XOR logique (`xor`)** : Retourne `true` si une seule des expressions est vraie, mais pas les deux.

##### **Exemple :**
```php
$a = true;
$b = false;

echo $a && $b; // false
echo $a || $b; // true
echo !$a;      // false
echo $a xor $b; // true
```

---

#### **4. Les Opérateurs d'Assignation**

Les opérateurs d'assignation sont utilisés pour attribuer des valeurs à des variables.

##### **Exemples :**
- **Assignation simple (`=`)** : Assigne une valeur à une variable.
- **Assignation par addition (`+=`)** : Ajoute une valeur à une variable.
- **Assignation par soustraction (`-=`)** : Soustrait une valeur à une variable.
- **Assignation par multiplication (`*=`)** : Multiplie une variable par une valeur.
- **Assignation par division (`/=`)** : Divise une variable par une valeur.
- **Assignation par modulo (`%=`)** : Applique le modulo à une variable.

##### **Exemple :**
```php
$a = 10;
$a += 5;  // $a = 15
$a -= 3;  // $a = 12
$a *= 2;  // $a = 24
$a /= 4;  // $a = 6
$a %= 2;  // $a = 0
```

---

#### **5. Les Opérateurs de Chaînes de Caractères**

Les opérateurs de chaînes sont utilisés pour manipuler des chaînes de caractères.

##### **Exemples :**
- **Concaténation (`.`)** : Combine deux chaînes de caractères.
- **Concaténation et assignation (`.=`)** : Ajoute une chaîne à une autre et l'assigne à la première.

##### **Exemple :**
```php
$first_name = "John";
$last_name = "Doe";

// Concaténation
$full_name = $first_name . " " . $last_name;
echo $full_name; // John Doe

// Concaténation et assignation
$first_name .= "athan";
echo $first_name; // Jonathan
```

---

#### **6. Les Opérateurs de Tableau**

Les opérateurs de tableau sont utilisés pour manipuler les tableaux.

##### **Exemples :**
- **Accès aux éléments d'un tableau (`[]`)** : Accède ou modifie un élément d'un tableau.
- **Fusion de tableaux (`+`)** : Fusionne deux tableaux sans écraser les clés existantes.

##### **Exemple :**
```php
$array1 = [1, 2, 3];
$array2 = [4, 5, 6];

// Fusionner les tableaux
$merged = $array1 + $array2;
print_r($merged);
```

**Sortie :**
```php
Array
(
    [0] => 1
    [1] => 2
    [2] => 3
)
```
- **Explication** : Seuls les éléments des tableaux qui n'ont pas de clés en commun sont fusionnés.