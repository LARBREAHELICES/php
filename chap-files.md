#  **Gestion des fichiers en PHP 8.3**  

## 🎯 **Objectifs du cours**  
- Lire et écrire des fichiers en PHP  
- Manipuler les fichiers avec les fonctions natives  
- Gérer les erreurs et exceptions liées aux fichiers  
- Optimiser l'utilisation des fichiers  

---

## 🟢 **1. Introduction aux fichiers en PHP**  
En PHP, la gestion des fichiers permet de **lire, écrire, modifier, copier, supprimer** des fichiers. Cela est particulièrement utile pour :  
✅ Stocker des logs  
✅ Lire des configurations  
✅ Gérer des données semi-structurées (JSON, CSV, TXT)  
✅ Traiter des fichiers d’import/export  

---

## 🟠 **2. Ouvrir et fermer un fichier avec `fopen()` et `fclose()`**  
Avant de lire ou écrire dans un fichier, **il faut l'ouvrir** avec la fonction `fopen()`.  

### **Syntaxe**  
```php
$handle = fopen("fichier.txt", "mode");
```
📌 `$handle` : Pointeur vers le fichier.  
📌 `"mode"` : Mode d’ouverture du fichier.  

### **Modes d'ouverture**
| Mode  | Signification |
|--------|--------------|
| `"r"`  | Lecture seule (le fichier doit exister) |
| `"r+"` | Lecture et écriture (le fichier doit exister) |
| `"w"`  | Écriture seule (efface le fichier existant ou en crée un nouveau) |
| `"w+"` | Lecture et écriture (efface le fichier existant ou en crée un nouveau) |
| `"a"`  | Écriture en ajout à la fin (le fichier est créé s’il n’existe pas) |
| `"a+"` | Lecture et écriture en ajout à la fin |
| `"x"`  | Crée un fichier et l’ouvre en écriture (échec si le fichier existe déjà) |
| `"x+"` | Crée un fichier et l’ouvre en lecture/écriture (échec si le fichier existe déjà) |

### **Exemple : Ouvrir et fermer un fichier**
```php
$file = fopen("monfichier.txt", "r"); // Ouvre le fichier en lecture
fclose($file); // Ferme le fichier
```

⚠️ **Toujours fermer un fichier après utilisation** avec `fclose($handle);` pour libérer la mémoire.

---

## 🔵 **3. Lire un fichier en PHP**
PHP propose plusieurs fonctions pour lire un fichier.

### 📌 **Lire ligne par ligne avec `fgets()`**  

```php

<?php

// Ouvre le fichier en mode lecture ("r")

// chemin absolu plus rapide pour ouvrir un fichier par rapport au chemin relatif 
$file = __DIR__ . '/post.txt';

if (file_exists($file)) {
    $handle = fopen($file, "r");
    // lecture de chaque ligne avec un bool false en de fichier 
    while ($line = fgets($handle)) {
        echo $line;
        echo "<br />";
    }
    // retour au début du fichier
    rewind($handle);

    echo "<br />";
    echo "<br />";
    while ($line = fgets($handle)) {
        echo $line;
        echo "<br />";
    }

    // fermeture du fichier 
    fclose($handle);
    $handle =  null;
}

```

Une autre manière de parcourir un fichier avec la fonction feof qui renvoie true quand on est à la fin du fichier.

```php
$file = fopen("monfichier.txt", "r");

while (!feof($file)) { // Tant que ce n'est pas la fin du fichier
    echo fgets($file); // Lit une ligne
}

fclose($file);
```



### 📌 **Lire tout le fichier avec `file_get_contents()`**  
```php
$contenu = file_get_contents("monfichier.txt");
echo $contenu;
```
✅ Plus rapide pour les petits fichiers, car il charge tout en mémoire.

### 📌 **Lire tout le fichier ligne par ligne avec `file()`**  
```php
$lines = file("monfichier.txt");
foreach ($lines as $line) {
    echo $line;
}
```
✅ Charge le fichier sous forme de tableau (chaque ligne devient un élément).


Remarques :

```php
// ouvre le fichier et récupère tout le contenu dans un tableau
$content = file_get_contents($file );
echo $content;

echo "<br />";
echo "<br />";

// ouvre le fichier et récupère tout le contenu dans un tableau
$lines = file($file); 
var_dump($lines);
foreach ($lines as $line) {
    echo $line;
    echo "<br />";
}
```

---

## 🟣 **4. Écrire dans un fichier**
### 📌 **Écrire avec `fwrite()`**
```php
$file = fopen("monfichier.txt", "w"); // Efface le fichier existant
fwrite($file, "Bonjour, ceci est un test !");
fclose($file);
```

✅ Utilisation en mode `"a"` pour ajouter sans effacer :  
```php
$file = fopen("monfichier.txt", "a"); // Ouvre en mode ajout
fwrite($file, "\nNouvelle ligne ajoutée !");
fclose($file);
```

### 📌 **Écrire directement avec `file_put_contents()`**
```php
file_put_contents("monfichier.txt", "Bonjour !");
```
✅ Plus rapide et simple.  
✅ Ajout possible avec `FILE_APPEND` :  
```php
file_put_contents("monfichier.txt", "\nNouvelle ligne", FILE_APPEND);
```

---

## 🟡 **5. Vérifier et manipuler les fichiers**
### 📌 **Vérifier si un fichier existe : `file_exists()`**
```php
if (file_exists("monfichier.txt")) {
    echo "Le fichier existe.";
} else {
    echo "Le fichier n'existe pas.";
}
```

### 📌 **Obtenir la taille d’un fichier : `filesize()`**
```php
echo "Taille du fichier : " . filesize("monfichier.txt") . " octets";
```

### 📌 **Supprimer un fichier : `unlink()`**
```php
if (file_exists("monfichier.txt")) {
    unlink("monfichier.txt");
    echo "Fichier supprimé.";
}
```

### 📌 **Renommer/Déplacer un fichier : `rename()`**
```php
rename("monfichier.txt", "nouveaunom.txt");
```

---

## 🟠 **6. Gérer les erreurs et exceptions**
### 📌 **Gérer les erreurs avec `try-catch`**
```php
try {
    if (!file_exists("monfichier.txt")) {
        throw new Exception("Fichier introuvable !");
    }
    $contenu = file_get_contents("monfichier.txt");
    echo $contenu;
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
```

---

## 🔴 **7. Manipuler les fichiers CSV**
### 📌 **Écrire dans un fichier CSV**
```php
$file = fopen("data.csv", "w");

$data = [
    ["Nom", "Email", "Âge"],
    ["Alice", "alice@example.com", 25],
    ["Bob", "bob@example.com", 30]
];

foreach ($data as $row) {
    fputcsv($file, $row);
}

fclose($file);
```

### 📌 **Lire un fichier CSV**
```php
$file = fopen("data.csv", "r");

while (($row = fgetcsv($file)) !== false) {
    echo implode(" | ", $row) . "\n";
}

fclose($file);
```

---

## 🟢 **8. Manipuler les fichiers JSON**
### 📌 **Écrire un fichier JSON**
```php
$data = [
    "nom" => "Alice",
    "email" => "alice@example.com",
    "âge" => 25
];

file_put_contents("data.json", json_encode($data, JSON_PRETTY_PRINT));
```

### 📌 **Lire un fichier JSON**
```php
$json = file_get_contents("data.json");
$data = json_decode($json, true);
print_r($data);
```

---

## ✅ **Résumé**
| Fonction | Description |
|----------|------------|
| `fopen()` | Ouvre un fichier |
| `fclose()` | Ferme un fichier |
| `fgets()` | Lit une ligne |
| `file_get_contents()` | Lit tout le fichier |
| `file_put_contents()` | Écrit dans un fichier |
| `fwrite()` | Écrit dans un fichier |
| `file_exists()` | Vérifie si un fichier existe |
| `unlink()` | Supprime un fichier |
| `rename()` | Renomme un fichier |
| `filesize()` | Donne la taille du fichier |
| `fputcsv()` | Écrit dans un fichier CSV |
| `fgetcsv()` | Lit un fichier CSV |
| `json_encode()` | Convertit un tableau en JSON |
| `json_decode()` | Convertit un JSON en tableau |

---


## 📌 **Exercices : Traitement des Données dans des Fichiers en PHP**  


## **1️ Exercice : Lecture d'un Fichier et Affichage**
1. Créez un fichier `data.txt` contenant plusieurs lignes de texte.  
2. Écrivez un script PHP qui ouvre ce fichier et affiche chaque ligne.  
3. Ajoutez un numéro de ligne avant chaque affichage.
4. Changez maintenant les valeurs dans le fichier et mettez en majuscule tous les mots contenant au moins un  "n".

### **Exemple de `data.txt` :**  
```
PHP est un langage puissant.
Il permet de créer des sites dynamiques.
Les fichiers sont utiles pour stocker des données.
```

### **Exemple de sortie attendue :**  
```
1. PHP est un langage puissant.
2. Il permet de créer des sites dynamiques.
3. Les fichiers sont utiles pour stocker des données.
```

### **Exemple de sortie attendue :**  
```
PHP est uN laNgage puissANT.
Il permet de créer des sites dyNAMIQUES.
Les fichiers soNt utiles pour stocker des doNNées.
```

- Correction

```php

$file = __DIR__ . '/data.txt';
// Une chaine de caractères longue
$str = <<<EOT
PHP est un langage puissant.
Il permet de creer des sites dynamiques.
Les fichiers sont utiles pour stocker des donnees.
EOT;

if (!file_exists($file)) {
    file_put_contents($file, $str);
}

// ouvrir le fichier et lire le contenu avec erreur first
if (!file_exists($file)) throw new Exception("Fichier pas créé");

$handle = fopen($file, 'r+');

$count = 1;
while ($line = fgets($handle)) {
    echo '<br />';
    echo "$count $line";
    $count++;
}

// transformer en tableau en utilisant le caractère de retour à la ligne dans le fichier
$content = explode("\n", file_get_contents($file));
echo '<pre />';
print_r($content);
echo '<pre />';

$buffer = '';
$sep = "\n";
$lenContent = count($content) ;
for ($i = 0; $i < $lenContent; $i++) {
    
    if($i == $lenContent - 1)
        $buffer .= format(str_split($content[$i], 1));
    else 
       $buffer .= format(str_split($content[$i], 1)) .$sep;
}

file_put_contents($file, $buffer);

// echo '<pre>';
// print_r($buffer);
// echo '</pre>';

function format(array $char, string $occ = 'n'): string
{
    for ($i = 0; $i < count($char); $i++) {
        if ($char[$i] == ' ' || $char[$i] == '') continue;

        if (strtolower($char[$i]) === $occ) $char[$i] = strtoupper($char[$i]);
    }

    return implode('', $char);
}
```

---

## **2️ Exercice : Écriture et Lecture de Données Structurées**

1. Créez un tableau associatif contenant plusieurs utilisateurs (`name`, `email`, `age`).  
2. Enregistrez ces données dans un fichier `users.json` sous un format semi-structuré (JSON).  
3. Écrivez un second script PHP pour lire ce fichier et afficher les utilisateurs.
4. Modifiez, dans le fichier, l'age de chaque personne, ajoutez +2 ans.

rmq : gestion des accents

```php
$data = ["message" => "Éléphant"];
$json = json_encode($data, JSON_UNESCAPED_UNICODE);
file_put_contents("fichier.json", $json);
```


### **Exemple de sortie attendue :**  
```
Nom : Alice - Email : alice@example.com - Âge : 25
Nom : Bob - Email : bob@example.com - Âge : 30
Nom : Charlie - Email : charlie@example.com - Âge : 22
```
