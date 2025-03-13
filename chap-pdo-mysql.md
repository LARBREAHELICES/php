# **PDO avec `fetch` et `fetchAll` avec MySQL**  

Données structurées.

Créez une base de données dans MySQL

```sql
CREATE DATABASE db_todolist CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE db_todolist;

CREATE TABLE IF NOT EXISTS task (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    status ENUM('pending', 'completed', 'delete') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

## **1. Introduction à PDO**  

PDO (*PHP Data Objects*) est une extension PHP permettant d’interagir avec différentes bases de données de manière sécurisée et orientée objet. Son principal avantage est d’être agnostique vis-à-vis du moteur de base de données utilisé (MySQL, PostgreSQL, SQLite, etc.).  

---

## **2. Connexion à une base de données avec PDO**  
Avant d'utiliser `fetch` et `fetchAll`, il faut établir une connexion à la base de données.  

### **Exemple de connexion à MySQL avec PDO :**  
```php
<?php
$dsn = "mysql:host=localhost;dbname=ma_base;charset=utf8";
$user = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Active les erreurs PDO
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Définit le mode de récupération par défaut
    ]);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
```

- `$dsn` contient les informations de connexion à MySQL.
- `$user` et `$password` sont les identifiants d’accès.
- `PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION` permet d’afficher les erreurs sous forme d’exceptions.
- `PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC` fait en sorte que les résultats soient retournés sous forme de tableau associatif.

---

## **3. Exécution d’une requête et récupération des résultats**  

PDO propose plusieurs méthodes pour récupérer les résultats d’une requête SQL :  
- **`fetch()`** : récupère une seule ligne.  
- **`fetchAll()`** : récupère toutes les lignes sous forme d’un tableau.  

### **3.1. Utilisation de `fetch()`**  
```php
<?php
$sql = "SELECT * FROM users WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => 1]);

$user = $stmt->fetch(); // Récupère une seule ligne
print_r($user);
?>
```
**Explication :**  
- `prepare()` prépare la requête pour éviter les injections SQL.  
- `execute(['id' => 1])` exécute la requête en remplaçant `:id` par `1`.  
- `fetch()` retourne **une seule ligne** sous forme d’un tableau associatif (`['id' => 1, 'name' => 'Dupont']`).  

Remarque de sécurité : la méthode `prepare` compile la requête SQL avant d'y intégrer les valeurs, ce qui empêche toute modification malveillante de la structure de la requête. Cela permet de se protéger efficacement contre les attaques par injection SQL, en s'assurant que les données fournies par l'utilisateur sont traitées comme des valeurs et non comme du code exécutable.

---

### **3.2. Utilisation de `fetchAll()`**  

Si une requête peut renvoyer plusieurs résultats, la méthode `fetchAll()` récupère **toutes les lignes** sous forme de tableau multidimensionnel.  

Toutefois, comme `fetchAll()` charge l'intégralité des résultats en mémoire, son utilisation peut devenir coûteuse en ressources pour de grandes quantités de données. Pour optimiser la performance et limiter l'usage de la mémoire, il est préférable d'utiliser `fetch()`, qui récupère les résultats ligne par ligne.

```php
<?php
$sql = "SELECT * FROM users";
$stmt = $pdo->query($sql);

$users = $stmt->fetchAll();
print_r($users);
?>
```
**Explication :**  
- `query()` exécute directement la requête (utile si elle ne contient pas de paramètres).  
- `fetchAll()` récupère **toutes les lignes** sous forme d’un tableau de tableaux associatifs.  

Exemple de sortie :  
```php
Array
(
    [0] => Array ( [id] => 1, [name] => Dupont )
    [1] => Array ( [id] => 2, [name] => Martin )
)
```

---

## **4. Différentes options de `fetch` et `fetchAll`**  
Les méthodes `fetch()` et `fetchAll()` acceptent un paramètre optionnel pour modifier le format des résultats.  

### **4.1. `PDO::FETCH_ASSOC` (par défaut)**
Retourne un tableau associatif :  
```php
$user = $stmt->fetch(PDO::FETCH_ASSOC);
```
Résultat :
```php
['id' => 1, 'name' => 'Dupont']
```

### **4.2. `PDO::FETCH_NUM`**  
Retourne un tableau indexé numériquement :  
```php
$user = $stmt->fetch(PDO::FETCH_NUM);
```
Résultat :
```php
[1, 'Dupont']
```

### **4.3. `PDO::FETCH_OBJ`**  
Retourne un objet anonyme :  
```php
$user = $stmt->fetch(PDO::FETCH_OBJ);
echo $user->name; // Affiche 'Dupont'
```

### **4.4. `PDO::FETCH_CLASS`**  
Retourne un objet d’une classe spécifique :  
```php
class User {
    public $id;
    public $name;
}

$sql = "SELECT * FROM users WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => 1]);

$user = $stmt->fetchObject('Utilisateur');
echo $user->name; // Affiche 'Dupont'
```

---

## **5. Exemple complet avec `fetch` et `fetchAll`**  

```php
<?php
$dsn = "mysql:host=localhost;dbname=todo;charset=utf8";
$user = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    // Récupérer un seul utilisateur avec fetch()
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([1]);
    $user = $stmt->fetch();
    echo "Utilisateur unique : " . print_r($user, true) . "\n";

    // Récupérer tous les users avec fetchAll()
    $stmt = $pdo->query("SELECT * FROM users");
    $users = $stmt->fetchAll();
    echo "Tous les users : " . print_r($users, true) . "\n";

} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
```

## Mise en place 

Voici le code SQL pour créer une table `tasks` dans une base de données MySQL pour un projet To-Do.  

### **Schéma de la table `tasks`**  
- **`id`** : Clé primaire, identifiant unique auto-incrémenté.  
- **`title`** : Titre de la tâche (obligatoire).  
- **`description`** : Description détaillée (facultative).  
- **`status`** : État de la tâche (`pending`, `in_progress`, `completed`).  
- **`created_at`** : Date de création de la tâche.  
- **`updated_at`** : Date de dernière mise à jour.  

---

### **SQL : Création de la table `tasks`**
```sql
CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NULL,
    status ENUM('pending', 'in_progress', 'completed') NOT NULL DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

---

### **Explication :**
1. **`id INT AUTO_INCREMENT PRIMARY KEY`**  
   → Identifiant unique auto-incrémenté.  
2. **`title VARCHAR(255) NOT NULL`**  
   → Titre obligatoire (255 caractères max).  
3. **`description TEXT NULL`**  
   → Description facultative.  
4. **`status ENUM('pending', 'in_progress', 'completed') NOT NULL DEFAULT 'pending'`**  
   → Champ avec trois valeurs possibles :  
   - `pending` (en attente)  
   - `in_progress` (en cours)  
   - `completed` (terminée)  
   - Valeur par défaut : `pending`.  
5. **`created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP`**  
   → Date de création automatique.  
6. **`updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP`**  
   → Mise à jour automatique à chaque modification.  

---

### **Exemple d'insertion de données**
```sql
INSERT INTO task (title, description, status) 
VALUES 
('Acheter du pain', 'Aller à la boulangerie avant 19h', 'pending'),
('Réviser le cours PDO', 'Lire la documentation et faire des tests', 'in_progress'),
('Déployer le projet', 'Mettre en ligne la version finale', 'completed');
```


