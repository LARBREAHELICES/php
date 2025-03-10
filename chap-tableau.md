### **Créer, structurer des tableaux et accéder aux données en PHP**

#### **1. Introduction aux tableaux en PHP**

Un **tableau** (ou **array** en anglais) est une structure de données qui permet de stocker plusieurs valeurs sous un même nom. 

Chaque valeur dans le tableau est accessible grâce à un **indice** ou une **clé**.

En PHP, il existe deux types principaux de tableaux :
1. **Les tableaux indexés** : où les éléments sont accessibles via un indice numérique (par défaut, l'indice commence à 0).
2. **Les tableaux associatifs** : où les éléments sont accessibles via des **clés** personnalisées (chaînes de caractères).

#### **2. Créer un tableau**

##### **2.1. Tableau indexé**

Un tableau indexé est créé en utilisant des crochets `[]` avec des valeurs séparées par des virgules.

Exemple :
```php
$fruits = ["Pomme", "Banane", "Orange"];
```

Dans cet exemple, `$fruits` est un tableau qui contient trois éléments. Les indices associés à chaque élément sont automatiquement générés et commencent à 0 (donc `Pomme` est à l'indice 0, `Banane` à l'indice 1, et `Orange` à l'indice 2).

##### **2.2. Tableau associatif**

Un tableau associatif permet d'associer une clé à une valeur. Les clés peuvent être des chaînes de caractères.

Exemple :
```php
$persons = [
  "name" => "John",
  "age" => 25,
  "city" => "Paris"
];
```

Ici, les clés sont `"name"`, `"age"`, et `"city"`, et chaque clé correspond à une valeur.

#### **3. Accéder aux éléments d'un tableau**

##### **3.1. Accéder aux éléments d'un tableau indexé**

Pour accéder à un élément d'un tableau indexé, vous devez spécifier l'indice de l'élément entre crochets.

Exemple :
```php
$fruits = ["Pomme", "Banane", "Orange"];
echo $fruits[1];  // Affiche "Banane"
```

Ici, on accède à l'élément avec l'indice 1, donc "Banane" est affichée.

##### **3.2. Accéder aux éléments d'un tableau associatif**

Pour accéder à un élément d'un tableau associatif, vous utilisez la clé entre crochets.

Exemple :
```php
$personne = [
  "nom" => "John",
  "age" => 25,
  "city" => "Paris"
];
echo $personne["age"];  // Affiche 25
```

Ici, on accède à la clé `"age"`, ce qui retourne la valeur `25`.

#### **4. Ajouter des éléments dans un tableau**

##### **4.1. Ajouter un élément dans un tableau indexé**

Vous pouvez ajouter un élément à la fin d’un tableau en utilisant la fonction `array_push()`.

Exemple :
```php
$fruits = ["Pomme", "Banane"];
array_push($fruits, "Orange");  // Ajoute "Orange" à la fin du tableau
print_r($fruits);  // Affiche Array ( [0] => Pomme [1] => Banane [2] => Orange )

// également
$fruits[] = "cerise;
```

##### **4.2. Ajouter un élément dans un tableau associatif**

Pour ajouter un élément dans un tableau associatif, vous devez simplement utiliser une nouvelle clé.

Exemple :
```php
$personne = [
  "nom" => "John",
  "age" => 25
];
$personne["city"] = "Paris";  // Ajoute une nouvelle clé "city" avec la valeur "Paris"
print_r($personne);  // Affiche Array ( [nom] => John [age] => 25 [city] => Paris )
```

#### **5. Modifier des éléments dans un tableau**

##### **5.1. Modifier un élément dans un tableau indexé**

Vous pouvez modifier un élément d'un tableau indexé en accédant à son indice et en lui attribuant une nouvelle valeur.

Exemple :
```php
$fruits = ["Pomme", "Banane", "Orange"];
$fruits[1] = "Citron";  // Modifie "Banane" en "Citron"
print_r($fruits);  // Affiche Array ( [0] => Pomme [1] => Citron [2] => Orange )
```

##### **5.2. Modifier un élément dans un tableau associatif**

De la même manière, vous pouvez modifier un élément d’un tableau associatif en accédant à sa clé.

Exemple :
```php
$personne = [
  "nom" => "John",
  "age" => 25
];
$personne["age"] = 26;  // Modifie l'âge de John
print_r($personne);  // Affiche Array ( [nom] => John [age] => 26 )
```

#### **6. Supprimer des éléments dans un tableau**

##### **6.1. Supprimer un élément dans un tableau indexé**

Pour supprimer un élément dans un tableau indexé, vous utilisez la fonction `unset()`.

Exemple :
```php
$fruits = ["Pomme", "Banane", "Orange"];
unset($fruits[1]);  // Supprime l'élément à l'indice 1
print_r($fruits);  // Affiche Array ( [0] => Pomme [2] => Orange )
```

Notez que l'indice du tableau n'est pas réindexé automatiquement. Si vous souhaitez réindexer les éléments, vous pouvez utiliser la fonction `array_values()`.

##### **6.2. Supprimer une clé dans un tableau associatif**

Pour supprimer une clé d’un tableau associatif, vous utilisez également la fonction `unset()`.

Exemple :
```php
$personne = [
  "name" => "John",
  "age" => 25,
  "city" => "Paris"
];
unset($personne["city"]);  // Supprime la clé "city"
print_r($personne);  // Affiche Array ( [name] => John [age] => 25 )
```

#### **7. Fusionner des tableaux**

Vous pouvez fusionner plusieurs tableaux en un seul avec la fonction `array_merge()`.

Exemple :
```php
$tableau1 = ["Pomme", "Banane"];
$tableau2 = ["Orange", "Citron"];
$tableauFusionne = array_merge($tableau1, $tableau2);
print_r($tableauFusionne);  // Affiche Array ( [0] => Pomme [1] => Banane [2] => Orange [3] => Citron )
```

#### **8. Parcourir un tableau**

##### **8.1. Utilisation de `foreach`**

La boucle `foreach` est une manière très pratique de parcourir un tableau.

Exemple pour un tableau indexé :
```php
$fruits = ["Pomme", "Banane", "Orange"];
foreach ($fruits as $fruit) {
  echo $fruit . "<br>";  // Affiche chaque fruit sur une nouvelle ligne
}
```

Exemple pour un tableau associatif :
```php
$personne = [
  "nom" => "John",
  "age" => 25
];
foreach ($personne as $cle => $valeur) {
  echo $cle . ": " . $valeur . "<br>";  // Affiche chaque clé et sa valeur
}
```

#### **9. Compter les éléments d'un tableau**

La fonction `count()` permet de compter le nombre d'éléments dans un tableau.

Exemple :
```php
$fruits = ["Pomme", "Banane", "Orange"];
echo count($fruits);  // Affiche 3
```
