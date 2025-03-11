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
✅ Gérer des bases de données légères (JSON, CSV, TXT)  
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

---

## **2️ Exercice : Écriture et Lecture de Données Structurées**

1. Créez un tableau associatif contenant plusieurs utilisateurs (`nom`, `email`, `âge`).  
2. Enregistrez ces données dans un fichier `users.txt` sous un format structuré (JSON ou CSV).  
3. Écrivez un second script PHP pour lire ce fichier et afficher les utilisateurs.  

### **Exemple de sortie attendue :**  
```
Nom : Alice - Email : alice@example.com - Âge : 25
Nom : Bob - Email : bob@example.com - Âge : 30
Nom : Charlie - Email : charlie@example.com - Âge : 22
```

## ✨ **3 Exercice Analyse des ventes d'un magasin**  

Objectif :
✅ Lire un fichier CSV contenant des ventes  
✅ Calculer le chiffre d'affaires total  
✅ Trouver l'article le plus vendu  

---

### 📄 **Fichier `ventes.csv`**  
Chaque ligne contient un article, une quantité vendue et un prix unitaire.  
```
Produit,Quantité,PrixUnitaire
Ordinateur,5,800
Clavier,10,50
Souris,15,30
Ecran,8,200
Clavier,5,50
Ordinateur,2,800
```

1. **Lire le fichier CSV** et stocker les données sous forme de tableau associatif.  
2. **Calculer le chiffre d’affaires total** du magasin.  
   > (Quantité * PrixUnitaire) pour chaque ligne  
3. **Trouver l’article le plus vendu** (celui avec la plus grande quantité totale).  
4. **Afficher les résultats** en console (pas de page web).  

---

### 💻 **Solution attendue (exemple d'affichage)**
```
Chiffre d’affaires total : 10 700 €
Produit le plus vendu : Clavier (15 unités)
```
