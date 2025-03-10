L'**évaluation paresseuse** (*short-circuit evaluation*), est un comportement des opérateurs logiques dans de nombreux langages de programmation comme PHP, JavaScript, Python, etc.

---

## 🔹 **ET (`&&`) passif**  
L'opérateur `&&` **(ET logique)** est dit **passif** lorsqu'une première condition **fausse** suffit pour ne pas évaluer la seconde.  

### **Exemple :**
```php
$condition1 = false;
$condition2 = fonctionQuiAffiche();

if ($condition1 && $condition2) {
    echo "Tout est vrai";
}

function fonctionQuiAffiche() {
    echo "Cette fonction est exécutée";
    return true;
}
```
📌 **Résultat :** Rien ne s'affiche ❌  

Explication :
- `$condition1` est `false`, donc **l'expression entière ne peut jamais être `true`**.
- `&&` étant un opérateur **paresseux**, il **n’évalue même pas** `$condition2`.

👉 **C'est pour cela qu'on appelle `&&` un opérateur passif ici : il ignore la deuxième condition si la première est `false`.**

---

## 🔹 **OU (`||`) passif**  
L'opérateur `||` **(OU logique)** est dit **passif** lorsqu'une première condition **vraie** suffit pour ne pas évaluer la seconde.

### **Exemple :**
```php
$condition1 = true;
$condition2 = fonctionQuiAffiche();

if ($condition1 || $condition2) {
    echo "L'un des deux est vrai";
}

function fonctionQuiAffiche() {
    echo "Cette fonction est exécutée";
    return true;
}
```
📌 **Résultat :**  
```
L'un des deux est vrai
```
❌ **Mais** `"Cette fonction est exécutée"` **n'est pas affiché !**  

Explication :
- `$condition1` est `true`, donc **l'expression entière est forcément `true`**.
- `||` étant un opérateur **paresseux**, **il ignore** `$condition2` car il sait déjà que la condition globale sera `true`.

👉 **C'est pourquoi `||` est passif ici : il ne vérifie pas la seconde condition si la première est `true`.**

---

### 🔥 **Résumé**
| Opérateur | Si la première condition est… | La deuxième condition est-elle évaluée ? |
|-----------|------------------------------|------------------------------------|
| `&&` (**ET**) | `false` | ❌ **Non** |
| `\|\|` (**OU**) | `true`  | ❌ **Non** |

✔ **Cette évaluation paresseuse permet d'optimiser les performances et d'éviter des erreurs inutiles !** 🎯