<?php
require_once __DIR__ . '/services/service_model.php';

session_start();
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TODO List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-md">
        <h1 class="text-2xl font-bold text-center mb-4">TODO List</h1>

        <!-- Formulaire -->
        <form action="<?php echo './services/service_task.php' ?>" method="POST" class="flex mb-4">
            <input
                type="text"
                name="task"
                placeholder="Ajouter une tâche"
                required
                class="flex-1 border border-gray-300 p-2 rounded-l focus:outline-none focus:ring-2 focus:ring-blue-500" />

            <input type="hidden" value="<?php echo $_SESSION['csrf_token'] ?>" name="csrf_token" />
            <button
                type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-r hover:bg-blue-600 transition">
                Ajouter
            </button>
        </form>

        <!-- Liste des tâches -->
        <ul class="space-y-2">
            <?php $stmt = tasks() ; while($task = $stmt->fetch()) : ?>
                <li class="flex justify-between items-center bg-gray-200 p-2 rounded">
                    <span class="ml-2 text-sm"><?php echo $task['title'] ?></span>
                    <span class="ml-2 text-sm"><?php echo $task['status'] ?></span>
                    <button
                        class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 transition">
                        Supprimer
                    </button>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
</body>

</html>