# **Cours : Les Fonctions en PHP 8.3**  

### **1. Introduction aux fonctions en PHP**  
Les fonctions permettent de regrouper du code réutilisable et d'améliorer la lisibilité et la modularité d'un programme. PHP propose des **fonctions natives** ainsi que la possibilité de **créer des fonctions personnalisées**.

### **2. Définition et Appel d’une Fonction**  
Une fonction en PHP se définit avec le mot-clé `function` :

```php
function sayHello() {
    echo "Hello!";
}

sayHello(); // Affiche "Hello!"
```

### **3. Les Paramètres de Fonction**  
Les fonctions peuvent accepter des **paramètres** pour personnaliser leur comportement :

```php
function greetUser($name) {
    echo "Hello, $name!";
}

greetUser("Alice"); // Affiche "Hello, Alice!"
```

### **4. Valeurs de Retour**  
Une fonction peut **retourner une valeur** grâce à `return` :

```php
function addNumbers($a, $b) {
    return $a + $b;
}

$result = addNumbers(5, 10);
echo $result; // Affiche 15
```

### **5. Types de Données en PHP 8.3**  
PHP permet de **typer** les paramètres et les valeurs de retour :

```php
function multiply(int $a, int $b): int {
    return $a * $b;
}

echo multiply(4, 3); // Affiche 12
```

PHP 8.3 renforce la vérification des types pour éviter des erreurs de conversion implicite.

### **6. Les Paramètres Optionnels et Valeurs par Défaut**  
Un paramètre peut être facultatif avec une valeur par défaut :

```php
function welcomeUser($name = "Guest") {
    echo "Welcome, $name!";
}

welcomeUser(); // Affiche "Welcome, Guest!"
welcomeUser("Elodie"); // Affiche "Welcome, Elodie!"
```

### **7. Les Paramètres Nommés (PHP 8+)**  
Depuis PHP 8, on peut appeler une fonction en utilisant des **paramètres nommés** :

```php
function createUser($name, $age, $email) {
    echo "Name: $name, Age: $age, Email: $email";
}

createUser(age: 30, email: "test@example.com", name: "John");
```

Cela permet d’améliorer la lisibilité et d’éviter les erreurs d’ordre des arguments.

### **8. Les Fonctions Fléchées (Arrow Functions, PHP 7.4+)**  
Les fonctions fléchées sont une syntaxe compacte pour les fonctions anonymes :

```php
$square = fn($x) => $x * $x;

echo $square(4); // Affiche 16
```

### **9. Les Fonctions Anonymes (Closures)**  
PHP permet de créer des **fonctions anonymes** et de capturer des variables externes avec `use` :

```php
$message = "Hello";
$sayHello = function() use ($message) {
    echo $message;
};

$sayHello(); // Affiche "Hello"
```

### **10. Les Variadic Functions (PHP 5.6+)**  
Une fonction peut accepter un nombre illimité d'arguments grâce à `...` :

```php
function sumNumbers(...$numbers) {
    return array_sum($numbers);
}

echo sumNumbers(1, 2, 3, 4); // Affiche 10
```

### **11. Les Nouveautés de PHP 8.3 pour les Fonctions**  

#### **a. Amélioration des erreurs dans les Closures**  
En PHP 8.3, les closures affichent des erreurs plus explicites en cas de problème, facilitant ainsi le débogage.

#### **b. Vérification renforcée des types**  
Les erreurs de conversion implicite entre les types sont plus strictes, réduisant les erreurs inattendues.

Cela dépend du type de fonction. En PHP, **les fonctions déclarées classiquement** avec `function` peuvent être appelées avant leur définition grâce au **hoisting** (*remontée*), mais **les fonctions anonymes et fléchées ne le peuvent pas**.

---

### **12. Les Fonctions Classiques (Hoisting)**
Les fonctions définies avec `function` sont automatiquement chargées par PHP avant l'exécution du script. Ainsi, on peut les appeler avant leur définition :

```php
sayHello(); // ✅ Fonction appelée avant sa définition

function sayHello() {
    echo "Hello!";
}
```
✔️ Cela fonctionne parce que PHP charge les définitions de fonctions avant d’exécuter le code.

---

### **13. Les Fonctions Anonymes et Fléchées (Pas de Hoisting)**
Les fonctions anonymes et les **arrow functions** sont **traitées comme des valeurs** et **ne bénéficient pas du hoisting**. Elles doivent être définies avant d’être appelées :

```php
echo $double(5); // ❌ Erreur : $double n'est pas encore défini

$double = fn($x) => $x * 2;
```

Ou avec une fonction anonyme classique :

```php
echo $multiply(5, 2); // ❌ Erreur : $multiply n'est pas encore défini

$multiply = function($a, $b) {
    return $a * $b;
};
```

💡 **Pourquoi ?**  
Les fonctions anonymes et fléchées sont considérées comme **des expressions** et ne sont évaluées qu’au moment de leur affectation.

---

## **Résumé : Peut-on appeler une fonction avant sa définition ?**
| Type de fonction       | Peut être appelée avant sa définition ? |
|------------------------|----------------------------------------|
| Fonction classique (`function`) | ✅ Oui, grâce au hoisting |
| Fonction anonyme (`function() {}`) | ❌ Non, car c'est une expression |
| Arrow function (`fn() =>`) | ❌ Non, car c'est une expression |

## Exercice générateur de remise

Créez une fonction `discountGenerator($discountRate)` qui retourne une fonction anonyme permettant d'appliquer une remise sur un prix donné.

1. La fonction génératrice doit capturer le taux de remise avec `use`.
2. La fonction anonyme doit prendre en paramètre un prix (`$price`) et appliquer la remise.

#### Exemple :

```php
$discount10 = discountGenerator(10);
echo $discount10(100); // Affiche 90

$discount20 = discountGenerator(20);
echo $discount20(100); // Affiche 80
```

```php

function discount(float $rate): callable{

    return function(float $price) use($rate): float{

        return $price - ($price * $rate / 100);
    };
}

// appelée on lui passe paramètre
$d10 = discount(10);
echo '<pre>';
echo $d10(100);
echo '</pre>';

echo '<pre>';
echo $d10(800);
echo '</pre>';

$d20 = discount(20);
echo '<pre>';
echo $d20(100);
echo '</pre>';

```

### **Indications :**
- Utilisez `use` pour capturer le taux de remise.
- Testez avec plusieurs prix.

## **Exercice : Calculateur enchaîné avec fonction fléchée**  

1. Déclarez une variable `$base` contenant un entier.  
2. Créez une **fonction fléchée** qui prend un premier paramètre `$a` et retourne une autre fonction fléchée prenant `$b`.  
3. La fonction retournée doit multiplier `$a` et `$b`, puis ajouter `$base`.  
4. Testez la fonction avec plusieurs valeurs.

```php

$calcul = fn($base = 10) => fn($a) => fn($b) => $a * $b + $base ;

echo '<pre>';
echo $calcul()(9)(2);
echo '</pre>';
```
