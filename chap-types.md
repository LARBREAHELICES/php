### 📌 **Utilisation des Types en PHP 8.3**  

Depuis PHP 7, la gestion des **types** a été améliorée avec l'introduction des **déclarations de types** pour les arguments et les valeurs de retour. PHP 8 et ses mises à jour, dont **PHP 8.3**, renforcent encore cette sécurité et flexibilité.  

---

## **1️ Les Types Scalaires en PHP 8.3**
PHP supporte plusieurs types primitifs, aussi appelés **scalaires**, que vous pouvez utiliser dans les déclarations de fonctions.  

### **🔹 Exemple d'utilisation des types scalaires :**
```php
function additionner(int $a, int $b): int {
    return $a + $b;
}

echo additionner(5, 3); // Affiche 8
```
✅ Ici, `$a` et `$b` sont forcés à être **des entiers** (`int`). La fonction renvoie aussi un **entier** (`int`).  

📌 **Types scalaires supportés en PHP 8.3 :**  
- `int` : Nombre entier  
- `float` : Nombre à virgule flottante  
- `string` : Chaîne de caractères  
- `bool` : Valeur booléenne (`true` ou `false`)  

---

## **2️ Les Types Complexes**
En plus des types scalaires, PHP supporte d'autres types comme :  
- `array` : Tableau  
- `callable` : Fonction anonyme ou callback  
- `iterable` : Générateurs et tableaux itérables  
- `object` : Tout objet de classe  
- `null` : Valeur nulle  

### **🔹 Exemple avec un tableau (`array`)**
```php
function afficherNoms(array $noms): void {
    foreach ($noms as $nom) {
        echo $nom . "\n";
    }
}

afficherNoms(["Alice", "Bob", "Charlie"]);
```
✅ Ici, `$noms` doit être **un tableau**, sinon une erreur est générée.  

---

## **3️ Le Type `mixed` en PHP 8**
Le type `mixed` permet d'accepter **n'importe quel type de valeur**.  

### **🔹 Exemple d'une fonction acceptant tout type de valeur :**
```php
function afficherValeur(mixed $valeur): void {
    var_dump($valeur);
}

afficherValeur(42);         // int(42)
afficherValeur("Bonjour");  // string(7) "Bonjour"
afficherValeur([1, 2, 3]);  // array(3) { ... }
```
✅ Pratique pour les fonctions génériques !  

---

## **4️ Les Types Unions (`|`)**
Introduits en PHP 8, les types unions permettent **d'accepter plusieurs types** pour un même argument ou une valeur de retour.  

### **🔹 Exemple avec une fonction acceptant `int` ou `float`**
```php
function multiplier(int|float $a, int|float $b): int|float {
    return $a * $b;
}

echo multiplier(3, 2.5); // Affiche 7.5
```
✅ Ici, `$a` et `$b` peuvent être **entiers ou flottants**.  

---

## **5️ Le Type `never` en PHP 8.3**
Le type `never` indique qu'une fonction **ne retourne jamais de valeur** (ex : elle arrête l'exécution).  

### **🔹 Exemple avec une fonction qui stoppe le script :**
```php
function erreurFatale(): never {
    throw new Exception("Erreur critique !");
}

erreurFatale(); // L'exécution est arrêtée
```
✅ Utile pour les **fonctions qui arrêtent l'exécution** via `exit()` ou une exception.  

---

## **6️ Le Mode Strict en PHP**
Par défaut, PHP convertit automatiquement les types (`int` en `string`, etc.). Pour forcer une **vérification stricte**, utilisez `declare(strict_types=1);` au début du fichier.  

### **🔹 Exemple de mode strict**
```php
declare(strict_types=1);

function addition(int $a, int $b): int {
    return $a + $b;
}

echo addition("3", "4"); // ❌ Erreur TypeError en mode strict
```
✅ Si `strict_types` est activé, **passer une chaîne à `int` déclenche une erreur**.  
