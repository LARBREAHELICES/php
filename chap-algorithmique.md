### **Savoir analyser un problème et mettre en pratique l'algorithmie**

L’algorithmie est l'art de concevoir des algorithmes pour résoudre des problèmes. Un algorithme est une suite finie d’instructions permettant de résoudre un problème donné, dans un temps raisonnable, en utilisant des ressources limitées. L'algorithmie est un outil puissant pour transformer une idée ou une tâche en une solution informatique pratique.

#### **1. Comprendre le problème**

Avant de commencer à coder ou à développer une solution, il est important de bien analyser le problème. Cela consiste à :

- **Lire attentivement le problème** : Identifier les informations importantes et comprendre ce qui est demandé.
- **Poser des questions** : Si certains aspects du problème ne sont pas clairs, il faut demander des précisions. 
- **Définir les entrées et sorties** : Quels sont les paramètres d’entrée et de sortie ? Quelles informations sont disponibles et qu’est-ce qui doit être calculé ?

##### Exemple :

**Problème** : Calculer la somme des nombres de 1 à N.

- **Entrées** : Un nombre entier `N`.
- **Sortie** : La somme des nombres de 1 à N (inclus).

---

#### **2. Modéliser le problème**

Une fois que vous avez compris le problème, il est essentiel de réfléchir à une méthode pour le résoudre. Cela implique :

- **De diviser le problème en sous-problèmes** : Parfois, un grand problème peut être décomposé en sous-problèmes plus simples.
- **D’identifier des patterns** : Certaines solutions sont déjà bien connues (par exemple, l’addition des nombres de 1 à N peut être calculée rapidement avec une formule arithmétique).
  
##### Exemple :

Le problème de la somme des nombres de 1 à N peut être vu comme une simple addition progressive.

1. Commencer à 1, ajouter 2, puis 3, etc.
2. Une autre approche plus rapide est d’utiliser la formule de la somme des entiers :  
   \[
   S = \frac{N \times (N + 1)}{2}
   \]

---

#### **3. Choisir la bonne approche**

Il existe différentes approches pour résoudre un problème. Celles-ci peuvent être :

- **Itérative** : L’algorithme utilise une boucle pour résoudre le problème.
- **Récursive** : L’algorithme appelle lui-même sa propre fonction avec des entrées modifiées.
- **Mathématique** : Certaines solutions peuvent être obtenues grâce à une formule directe (comme la somme des entiers de 1 à N).

Le choix de l'approche dépend de la complexité, de l'efficacité et de la lisibilité du code.

##### Exemple :
- L’approche itérative de la somme des entiers utilise une boucle.
- L’approche mathématique utilise la formule.

---

#### **4. Écrire l’algorithme**

L’algorithme est une représentation formelle ou informelle des étapes que l’on va suivre pour résoudre le problème.

- **Pseudo-code** : Écrire l’algorithme en utilisant des instructions proches du langage naturel, tout en respectant des structures logiques.
- **Diagramme de flux** : Représenter graphiquement les différentes étapes de l’algorithme.

##### Exemple (Pseudo-code pour calculer la somme des entiers de 1 à N) :

1. Demander à l'utilisateur de saisir un nombre entier N.
2. Calculer la somme de 1 à N :  
   \[
   S = \frac{N \times (N + 1)}{2}
   \]
3. Afficher la somme.

---

#### **5. Analyser l'efficacité de l'algorithme**

Lorsqu'on développe un algorithme, il est important de se demander s'il est **efficace**. Deux critères principaux sont à prendre en compte :

- **La complexité temporelle** : Combien de temps l'algorithme prendra-t-il en fonction de la taille des données d'entrée ?
- **La complexité spatiale** : Combien de mémoire l'algorithme nécessitera-t-il ?

On utilise souvent la **notation Big-O** pour exprimer la complexité.

##### Exemple :

- L'approche itérative pour la somme des entiers a une complexité **O(N)**, car l’algorithme doit parcourir tous les entiers de 1 à N.
- L’approche mathématique avec la formule a une complexité **O(1)**, car le calcul de la somme ne dépend pas de la taille de N.

---

#### **6. Implémenter l'algorithme**

Une fois que l’on a un algorithme solide, il faut le traduire en code. Il est important de :

- **Choisir le bon langage de programmation** : Un langage comme PHP, Python, JavaScript, ou C++ peut être choisi en fonction du problème à résoudre.
- **Écrire un code propre** : Assurez-vous que le code soit lisible, bien commenté et structuré.

##### Exemple en PHP pour calculer la somme des entiers de 1 à N :

```php
<?php
function sumNumbers($n) {
    return $n * ($n + 1) / 2;
}

$n = 10;
echo "La somme des nombres de 1 à $n est " . sumNumbers($n);
?>
```

---

#### **7. Tester et valider l'algorithme**

Il est crucial de tester votre solution pour vérifier qu’elle fonctionne dans tous les cas possibles, y compris les cas limites.

- **Cas de test normaux** : Vérifiez avec des entrées standards.
- **Cas limites** : Vérifiez avec des entrées extrêmes, comme N = 0 ou N = 1.
- **Cas invalides** : Testez ce qu'il se passe si l'entrée n'est pas valide (par exemple, un nombre négatif).

---

### **Exercice 1 : Somme des éléments d'un tableau**

**Objectif** : Calculer la somme de tous les éléments d'un tableau donné.

**Enoncé** : 
Écrivez un algorithme qui prend en entrée un tableau d’entiers et renvoie la somme de tous ses éléments.

**Entrée** : Un tableau d’entiers, par exemple `[1, 2, 3, 4, 5]`.

**Sortie** : La somme des éléments du tableau, ici `15`.

---

### **Exercice 2 : Trouver le plus grand élément d'un tableau**

**Objectif** : Identifier l'élément le plus grand d'un tableau.

**Enoncé** : 
Écrivez un algorithme qui prend un tableau d’entiers en entrée et renvoie le plus grand élément du tableau.

**Entrée** : Un tableau d’entiers, par exemple `[2, 8, 1, 5, 10]`.

**Sortie** : L’élément le plus grand du tableau, ici `10`.

---

### **Exercice 3 : Inverser une chaîne de caractères**

**Objectif** : Inverser une chaîne de caractères donnée.

**Enoncé** : 
Écrivez un algorithme qui prend une chaîne de caractères en entrée et renvoie la chaîne inversée.

**Entrée** : Une chaîne de caractères, par exemple `"hello"`.

**Sortie** : La chaîne inversée, ici `"olleh"`.

---

### **Exercice 4 : Vérification si un nombre est un palindrome**

**Objectif** : Vérifier si un nombre est un palindrome (c'est-à-dire, si le nombre est égal à sa version inversée).

**Enoncé** : 
Écrivez un algorithme qui prend un nombre entier en entrée et renvoie `True` si le nombre est un palindrome, et `False` sinon.

**Entrée** : Un entier, par exemple `121`.

**Sortie** : Si l’entier est un palindrome, ici `True` ; sinon, `False`.

---

### **Exercice 5 : Compter les voyelles dans une chaîne de caractères**

**Objectif** : Compter le nombre de voyelles dans une chaîne de caractères.

**Enoncé** : 
Écrivez un algorithme qui prend une chaîne de caractères en entrée et renvoie le nombre de voyelles (a, e, i, o, u).

**Entrée** : Une chaîne de caractères, par exemple `"Hello World"`.

**Sortie** : Le nombre de voyelles dans la chaîne, ici `3`.

---
