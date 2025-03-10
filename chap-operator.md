# **Le Spread Operator en PHP**

📌 **Objectif** : Comprendre l'utilisation du **spread operator** (`...`) pour manipuler des tableaux en PHP.

#### **Qu'est-ce que le Spread Operator ?**

Le **spread operator** (`...`) permet de décomposer un tableau ou d'ajouter des éléments dans un autre tableau de manière concise et flexible. Introduit dans PHP 5.6 pour les tableaux, cet opérateur facilite le clonage, la fusion et l'ajout d'éléments.

#### **1. Fusionner des Tableaux avec le Spread Operator**

Le spread operator vous permet de fusionner plusieurs tableaux en un seul. Les éléments des tableaux sont ajoutés dans l’ordre où ils sont écrits.

##### **Exemple : Fusionner deux tableaux**

```php
$array1 = [1, 2, 3];
$array2 = [4, 5, 6];

// Fusionner les tableaux
$merged = [...$array1, ...$array2];

print_r($merged);
```

**Sortie :**
```php
Array
(
    [0] => 1
    [1] => 2
    [2] => 3
    [3] => 4
    [4] => 5
    [5] => 6
)
```

- **Explication** : Le spread operator décompose les éléments des deux tableaux (`$array1` et `$array2`) et les insère dans un nouveau tableau.

##### **Exemple : Ajouter un tableau à un autre**

```php
$array1 = [1, 2];
$array2 = [3, 4];

// Ajouter les éléments de $array2 à $array1
$combined = [...$array1, 5, 6, ...$array2];

print_r($combined);
```

**Sortie :**
```php
Array
(
    [0] => 1
    [1] => 2
    [2] => 5
    [3] => 6
    [4] => 3
    [5] => 4
)
```

- **Explication** : Vous pouvez aussi ajouter des éléments directement dans le tableau fusionné tout en utilisant le spread operator.

#### **2. Cloner un Tableau avec le Spread Operator**

Le spread operator permet également de faire une copie d'un tableau sans modifier l'original.

##### **Exemple : Cloner un tableau**

```php
$array = [1, 2, 3];

// Créer une copie du tableau
$copy = [...$array];

print_r($copy);
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

- **Explication** : Ici, `$copy` est une copie du tableau `$array`. Si vous modifiez `$copy`, le tableau `$array` reste inchangé.

#### **3. Modifier un Tableau en Utilisant le Spread Operator**

Vous pouvez ajouter ou modifier des éléments d'un tableau tout en utilisant le spread operator pour garder les autres éléments intacts.

##### **Exemple : Modifier un tableau**

```php
$array = ['name' => 'Alice', 'age' => 30];

// Mettre à jour l'âge et ajouter une nouvelle propriété
$updated = [...$array, 'age' => 31, 'city' => 'Paris'];

print_r($updated);
```

**Sortie :**
```php
Array
(
    [name] => Alice
    [age] => 31
    [city] => Paris
)
```

- **Explication** : Le spread operator permet de **modifier** les valeurs existantes dans le tableau tout en conservant les autres éléments. Dans cet exemple, la propriété `age` est modifiée et une nouvelle propriété `city` est ajoutée.

#### **4. Passer un Tableau comme Arguments dans une Fonction**

Le spread operator est aussi très utile pour **passer un tableau d'arguments** à une fonction qui attend une liste d'arguments.

##### **Exemple : Passer un tableau d'arguments à une fonction**

```php
function sum(...$numbers) {
    return array_sum($numbers);
}

$array = [1, 2, 3, 4];

// Passer les éléments de $array comme arguments à la fonction sum
echo sum(...$array); // Affiche 10
```

- **Explication** : Dans cet exemple, le spread operator est utilisé pour décomposer le tableau `$array` et passer ses éléments comme arguments individuels à la fonction `sum()`. La fonction `sum()` additionne les éléments passés en argument.
