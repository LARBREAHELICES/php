# Manipuler les chaînes de caractères en PHP 8.3

## 📌 **Introduction**
En PHP, les chaînes de caractères (ou "strings") sont essentielles pour manipuler du texte, générer du contenu dynamique, traiter des entrées utilisateur, etc. PHP propose une multitude de fonctions et d'opérateurs pour travailler efficacement avec les chaînes.

---

## 🏗 **Déclaration des chaînes**

Une chaîne de caractères en PHP peut être définie de plusieurs manières :

### 🔹 **Avec des guillemets simples (`'`)**

```php
$chaine = 'Bonjour';
echo $chaine; // Affiche : Bonjour
```
✅ Plus rapide car PHP ne cherche pas à interpréter les variables à l’intérieur.  
❌ Impossible d’inclure directement des variables dans la chaîne.

### 🔹 **Avec des guillemets doubles (`"`)**

```php
$nom = "Alice";
$message = "Bonjour $nom !";
echo $message; // Affiche : Bonjour Alice !
```
✅ Permet l'interpolation (inclusion de variables).  
❌ Peut être plus lent que les guillemets simples.

### 🔹 **Avec la syntaxe Heredoc (`<<<`)**
Permet d’écrire plusieurs lignes sans concaténation :
```php
$nom = "Alice";
$texte = <<<EOT
Bonjour $nom,
Bienvenue dans notre système.
EOT;

echo $texte;
```
✅ Pratique pour les longs textes.  
✅ Supporte l'interpolation.

### 🔹 **Avec la syntaxe Nowdoc (`<<<'`)**
Semblable à Heredoc, mais sans interpolation.
```php
$texte = <<<'EOT'
Ceci est un texte
avec plusieurs lignes.
EOT;

echo $texte;
```
✅ Utile si vous ne voulez pas interpréter les variables.

---

## 🎭 **Concaténation de chaînes**

En PHP, vous pouvez assembler plusieurs chaînes avec `.` :

```php
$prenom = "Alice";
$nom = "Dupont";
$nomComplet = $prenom . " " . $nom;

echo $nomComplet; // Affiche : Alice Dupont
```
> 🔹 On utilise `.` pour concaténer et non `+`.

---

## 🔄 **Longueur d'une chaîne**

Pour connaître le nombre de caractères d'une chaîne, utilisez `strlen()` :

```php
$texte = "Bonjour";
echo strlen($texte); // Affiche : 7
```
> ❗ `strlen()` compte **les caractères y compris les espaces**.

---

## 🔍 **Accéder à un caractère**

PHP permet d’accéder à un caractère spécifique avec `[index]` :

```php
$texte = "PHP";
echo $texte[0]; // Affiche : P
echo $texte[1]; // Affiche : H
```
> 🔹 L'index commence à **0**.

---

## 🔎 **Rechercher dans une chaîne**

### 🔹 **Position d’un mot (`strpos`)**

```php
$phrase = "Bonjour tout le monde";
$position = strpos($phrase, "tout");

echo $position; // Affiche : 8
```
> ❗ Retourne `false` si la chaîne n'est pas trouvée.

### 🔹 **Vérifier la présence d’un mot (`str_contains` en PHP 8)**

```php
$texte = "Apprendre PHP est utile.";
if (str_contains($texte, "PHP")) {
    echo "Le texte contient PHP";
}
```
> ✅ `str_contains()` est plus lisible que `strpos()`.

---

## 🔀 **Remplacement dans une chaîne**

### 🔹 **Remplacer un mot (`str_replace`)**

```php
$phrase = "Bonjour tout le monde";
$nouvellePhrase = str_replace("Bonjour", "Salut", $phrase);

echo $nouvellePhrase; // Affiche : Salut tout le monde
```
> 🔹 Sensible à la casse.

---

## ✂️ **Découper une chaîne**

### 🔹 **Extraire une partie (`substr`)**

```php
$texte = "Programmation PHP";
echo substr($texte, 0, 12); // Affiche : Programmation
echo substr($texte, -3); // Affiche : PHP
```

### 🔹 **Découper en tableau (`explode`)**

```php
$csv = "Pomme,Banane,Cerise";
$fruits = explode(",", $csv);

print_r($fruits);
/* Affiche :
Array (
    [0] => Pomme
    [1] => Banane
    [2] => Cerise
)
*/
```

### 🔹 **Transformer un tableau en chaîne (`implode`)**

```php
$fruits = ["Pomme", "Banane", "Cerise"];
$texte = implode(" - ", $fruits);

echo $texte; // Affiche : Pomme - Banane - Cerise
```

---

## 🏆 **Mise en forme des chaînes**

### 🔹 **Tout en majuscules (`strtoupper`)**

```php
echo strtoupper("php est génial"); // PHP EST GÉNIAL
```

### 🔹 **Tout en minuscules (`strtolower`)**

```php
echo strtolower("PHP EST PUISSANT"); // php est puissant
```

### 🔹 **Mettre la première lettre en majuscule (`ucfirst`)**

```php
echo ucfirst("php est amusant"); // Php est amusant
```

### 🔹 **Mettre la première lettre de chaque mot en majuscule (`ucwords`)**

```php
echo ucwords("php est super"); // Php Est Super
```

---

## 🛡 **Nettoyer une chaîne**

### 🔹 **Supprimer les espaces (`trim`)**

```php
$texte = "  Bonjour ";
echo trim($texte); // "Bonjour"
```
- `ltrim()` → Supprime uniquement à gauche.  
- `rtrim()` → Supprime uniquement à droite.

---

## 🔢 **Convertir une chaîne en nombre**

### 🔹 **Transformer une chaîne en entier (`intval`)**

```php
$nombre = intval("42");
echo $nombre + 10; // 52
```

### 🔹 **Transformer une chaîne en flottant (`floatval`)**

```php
$prix = floatval("19.99");
echo $prix * 2; // 39.98
```

---

## 🛠 **Comparaison de chaînes**

### 🔹 **Comparer deux chaînes (`strcmp`)**

```php
if (strcmp("apple", "banana") < 0) {
    echo "apple vient avant banana";
}
```
> 🔹 Retourne `0` si elles sont identiques, `< 0` si la première est avant, `> 0` sinon.

---

## **Résumé**

Les chaînes de caractères sont **essentielles** en PHP. Voici un résumé des opérations utiles :

| Action | Fonction |
|--------|---------|
| Déterminer la longueur | `strlen()` |
| Concaténer | `.` |
| Accéder à un caractère | `$chaine[0]` |
| Trouver un mot | `strpos()`, `str_contains()` |
| Remplacer du texte | `str_replace()` |
| Extraire une portion | `substr()` |
| Découper une chaîne | `explode()` |
| Transformer un tableau en chaîne | `implode()` |
| Modifier la casse | `strtoupper()`, `strtolower()`, `ucfirst()`, `ucwords()` |
| Supprimer les espaces | `trim()` |
| Comparer | `strcmp()` |

---

## Exercices

### Exercice 1 : Compter le nombre de caractères
**Objectif :** Compter le nombre de caractères dans une chaîne.
- La chaîne donnée est : `"mississippi"`.
- Utilisez `strlen()` pour afficher le nombre de caractères.

### Exercice 2 : Couper une chaîne
**Objectif :** Couper la chaîne `"Bonjour tout le monde"` après 10 caractères.
- Utilisez `substr()` pour obtenir la première partie de la chaîne.
- Affichez le résultat.

### Exercice 3 : Inverser une chaîne
**Objectif :** Renverser la chaîne `"PHP est génial"` et l'afficher.
- Utilisez `strrev()` pour obtenir la chaîne inversée.

### Exercice 4 : Remplacer des mots
**Objectif :** Remplacer `"Bonjour"` par `"Salut"` dans la phrase `"Bonjour tout le monde"`.
- Utilisez `str_replace()` pour effectuer le remplacement et afficher la nouvelle chaîne.
