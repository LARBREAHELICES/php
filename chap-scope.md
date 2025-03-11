### **Cours sur les Scopes (Portées des Variables) en PHP 8.3**  

En PHP, une variable a une **portée** (*scope*), c'est-à-dire l’endroit où elle est accessible dans le code. Comprendre ces notions est crucial pour éviter des erreurs et structurer son code proprement.

---

## **1. La Portée Globale**  
Une variable définie **en dehors d'une fonction** est dite **globale**.  

**Exemple :**  
```php
$a = 1; // Variable globale

function showValue() {
    echo $a; // ❌ Erreur : $a n'est pas accessible ici
}

showValue();
```
🚨 **Erreur !** Une variable globale **n’est pas accessible à l’intérieur d’une fonction** (sauf cas particulier).

### **💡 Solution 1 : Le Mot-Clé `global`**  
On peut explicitement dire à PHP d'utiliser une variable globale avec `global` :
```php
$a = 1;

function showValue() {
    global $a; // Récupération de la variable globale
    echo $a; // ✅ Affiche 1
}

showValue();
```
⚠️ **Attention** : L’usage abusif de `global` peut rendre le code difficile à maintenir et à tester.

---

## **2. La Portée Locale**  
Une variable définie **dans une fonction** est **locale** et n'existe qu'à l’intérieur de cette fonction.

**Exemple :**  
```php
function compute() {
    $b = 10; // Variable locale
    echo $b;
}

compute(); // ✅ Affiche 10
echo $b;   // ❌ Erreur : $b n'existe pas en dehors de compute()
```
📌 **Règle** : Une variable locale **n’est pas accessible** en dehors de la fonction.

---

## **3. Utilisation du `use` pour capturer des variables externes**  
PHP permet de passer des **variables globales** à une **fonction anonyme** grâce au mot-clé `use`.

**Exemple :**
```php
$a = 5;

$multiply = function($x) use ($a) {
    return $x * $a;
};

echo $multiply(3); // ✅ Affiche 15 (3 * 5)
```
📝 **Pourquoi `use` ?**  
- `use` capture **la valeur** de la variable **au moment de la définition de la fonction**.  
- Contrairement à `global`, `use` est **plus sécurisé et prévisible**.

---

## **4. La Portée des Paramètres de Fonction**  
Les **paramètres de fonction** sont locaux à la fonction et ne sont pas accessibles ailleurs.

```php
function add($x, $y) {
    return $x + $y;
}

echo add(4, 6); // ✅ Affiche 10
echo $x; // ❌ Erreur : $x n’existe pas ici
```
📌 **Règle** : Les paramètres d’une fonction **ne sont accessibles qu’à l’intérieur de cette fonction**.

---

## **5. Les Variables Statique (`static`)**  
Les variables locales disparaissent après l’exécution de la fonction. Mais on peut **retenir leur valeur** entre plusieurs appels grâce à `static`.

```php
function counter() {
    static $count = 0; // Conserve sa valeur entre les appels
    $count++;
    echo $count . "\n";
}

counter(); // ✅ Affiche 1
counter(); // ✅ Affiche 2
counter(); // ✅ Affiche 3
```
📝 **Pourquoi `static` ?**  
- Contrairement à une variable normale, elle **ne disparaît pas** après l’exécution de la fonction.  
- Utile pour **mémoriser un état** dans une fonction sans utiliser de variables globales.

---

## **6. La Portée des Variables Superglobales**  
PHP propose plusieurs variables dites **superglobales** accessibles partout, sans besoin de `global` :

| Superglobale | Rôle |
|-------------|------|
| `$_GET` | Récupère les paramètres d’URL |
| `$_POST` | Récupère les données envoyées par un formulaire |
| `$_SESSION` | Stocke des données entre plusieurs pages |
| `$_COOKIE` | Stocke des valeurs sur le navigateur de l'utilisateur |
| `$_SERVER` | Contient des infos sur le serveur |

**Exemple : Accès à `$_GET` dans une fonction**
```php
function showQueryParam() {
    echo $_GET['name'] ?? 'No name';
}
```
🚨 **À noter** : Ces variables doivent être manipulées avec précaution (vérification des données pour éviter les failles de sécurité).

---

## **Résumé des Portées en PHP**  

| Type de variable | Accessible où ? | Exemple |
|-----------------|-----------------|---------|
| **Globale** | Partout sauf dans les fonctions (sauf avec `global`) | `$a = 1;` |
| **Locale** | Seulement dans la fonction où elle est déclarée | `function foo() { $x = 5; }` |
| **Paramètre** | Seulement dans la fonction qui le reçoit | `function bar($y) {}` |
| **Superglobale** | Accessible partout | `$_GET['name']` |
| **Statique (`static`)** | Conserve sa valeur entre les appels de fonction | `static $count = 0;` |

---

## **Exercice : Testez vos connaissances !**  

1️⃣ Quel sera l’affichage du code suivant ?  

```php
$a = 10;

function test() {
    global $a;
    $a = 20;
}

test();
echo $a; 
```
❓ **Question** : Quelle sera la valeur affichée ?  

La valeur de \$a vaut 20 car la variable est globalisée avec le mot réservé global.

2️⃣ Que se passe-t-il ici ?  
```php
$a = 5;

$fn = function() use ($a) {
    $a = 10;

    return $a;
};

echo $fn();
echo $a;
```
❓ **Question** : Quelle valeur `$a` aura-t-il après l’appel de `$fn()` ?

La valeur de \$a vaut 5 la fonction \$fn utilise `use` pour récupérer le contexte d'exécution dans lequel elle est définie.


##  Extrait de code 

```php

$a = 10;

// effet de bord le global remonte les scopes
function test() {
    // global $a;
    // echo $a; 
    // echo "<br/>";
    // $a = 20;

    function test2(){
        global $a;
        echo $a; 
        $a = 20;
        echo "<br/>";
    }

    test2();
}

test();
echo $a;

// Attention fonction anonyme les scopes sont imbriqués
$f = function() use($a)  {
    $g = function() use($a) {
        echo $a;
        echo "<br />";
    };
    return $g;
};

$f()();

echo "<br />";
$a = 5;

$fn = function() use ($a) {
    $a = 10;

    return $a;
};

echo $fn();
echo "<br />";
echo $a;
echo "<br />";
```

## Remarque sur le scope des objets et structure de données

Attention en PHP un tableau est une structure de données et n'est pas un objet. En JS un tableau assigné dans une autre variable crée une référence identique pour les deux tableaux.

```php

$a = [1, 2, 3];
// copie 
$b = $a ; // structure de données 
$b[0] = 9 ;

print_r('<pre>');
print_r($a );
print_r('</pre>');

class A{
    public $number = 1 ;
}

$a = new A;
$b = $a ; // même référence car c'est un objet pas de copie

$b->number = 9;

print_r('<pre>');
print_r($a );
print_r('</pre>');
```



