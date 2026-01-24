<?php
// views/admin/clubs/index.php
// Expected: $data['clubs'] = array of associative rows from DB
// Optional: $data['error'] = string
$clubs = $data['clubs'] ?? [];
$error = $data['error'] ?? null;

$created = isset($_GET['created']) && $_GET['created'] == '1';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel | Clubs</title>

    <!-- Tailwind (design only) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f3f4f6; }
        .sidebar-item:hover { transform: translateX(5px); }
        .admin-card { border: 2px solid #000; border-radius: 2rem; box-shadow: 4px 4px 0px #000; transition: all 0.2s; }
        .admin-card:hover { transform: translate(-2px, -2px); box-shadow: 7px 7px 0px #000; }
    </style>
</head>

<body class="flex min-h-screen">

<!-- SIDEBAR -->
<aside class="w-64 bg-black text-white p-8 flex flex-col hidden lg:flex">
    <div class="text-xl font-extrabold uppercase italic mb-12">
        <span class="bg-[#D9E954] text-black px-2 py-1">Admin</span>Hub
    </div>

    <nav class="flex-grow space-y-4">
        <a href="/admin/dashboard" class="flex items-center gap-3 text-gray-400 hover:text-white sidebar-item transition">
            <i class="fa-solid fa-chart-pie"></i> Dashboard
        </a>
        <a href="/admin/clubs" class="flex items-center gap-3 text-[#D9E954] font-bold sidebar-item transition">
            <i class="fa-solid fa-layer-group"></i> Gérer les Clubs
        </a>
        <a href="/admin/events" class="flex items-center gap-3 text-gray-400 hover:text-white sidebar-item transition">
            <i class="fa-solid fa-calendar-days"></i> Événements
        </a>
        <a href="/admin/etudiants" class="flex items-center gap-3 text-gray-400 hover:text-white sidebar-item transition">
            <i class="fa-solid fa-user-graduate"></i> Étudiants
        </a>
    </nav>

    <div class="pt-8 border-t border-zinc-800">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-[#D9E954] text-black flex items-center justify-center font-bold">A</div>
            <div class="flex-1">
                <p class="text-xs font-bold">Admin Principal</p>
                <form action="/logout" method="POST" class="mt-2">
                    <button
                        type="submit"
                        class="w-full bg-white text-black px-4 py-2 rounded-full font-black text-[11px] hover:bg-zinc-200 transition border-2 border-black"
                    >
                        <i class="fa-solid fa-right-from-bracket mr-2"></i> Déconnexion
                    </button>
                </form>
            </div>
        </div>
    </div>
</aside>

<!-- MAIN -->
<main class="flex-grow p-8 md:p-12 overflow-y-auto">

    <!-- TOP BAR -->
    <header class="flex flex-col md:flex-row md:justify-between md:items-end gap-6 mb-12">
        <div>
            <div class="flex items-center gap-3 mb-2">
                <a href="/ClubEdge/admin" class="text-sm font-black text-gray-500 hover:text-black transition">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Retour
                </a>
            </div>
            <h1 class="text-4xl font-extrabold tracking-tight">Clubs</h1>
            <p class="text-gray-500 font-medium italic mt-1">
                Liste des clubs enregistrés (nom, description, date).
            </p>
        </div>

        <div class="flex flex-col sm:flex-row gap-3">
            <a
                href="/ClubEdge/admin/create"
                class="admin-card bg-[#D9E954] px-6 py-3 font-black text-xs uppercase inline-flex items-center gap-2 justify-center"
            >
                <i class="fa-solid fa-plus"></i>
                Créer un club
            </a>

            <div class="bg-white border-2 border-black rounded-full px-5 py-3 font-bold text-xs text-gray-600 inline-flex items-center gap-2">
                <i class="fa-solid fa-layer-group"></i>
                <span><?= count($clubs) ?> club(s)</span>
            </div>
        </div>
    </header>

    <?php if ($created): ?>
        <section class="admin-card bg-white p-5 mb-8">
            <p class="text-xs font-black uppercase text-gray-400 mb-1">Succès</p>
            <p class="font-extrabold">Club créé avec succès.</p>
        </section>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
        <section class="admin-card bg-white p-5 mb-8">
            <p class="text-xs font-black uppercase text-gray-400 mb-1">Erreur</p>
            <p class="font-extrabold"><?= htmlspecialchars($error) ?></p>
        </section>
    <?php endif; ?>

    <!-- LIST -->
    <section class="bg-white border-2 border-black rounded-[2.5rem] p-6 md:p-8 shadow-sm">
        <div class="flex items-start justify-between gap-6 mb-8">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-full bg-black text-[#D9E954] flex items-center justify-center font-extrabold text-xl">
                    C
                </div>
                <div>
                    <p class="text-xs font-black text-gray-400 uppercase">Gérer</p>
                    <p class="text-2xl font-extrabold">Tous les clubs</p>
                    <p class="text-[11px] text-gray-500 font-semibold italic">Vue d’ensemble des clubs</p>
                </div>
            </div>

            <div class="text-xs text-gray-500 font-semibold italic">
                Tip: POST → Redirect (évite double submit)
            </div>
        </div>

        <?php if (empty($clubs)): ?>
            <div class="admin-card bg-white p-6">
                <p class="text-xs font-black uppercase text-gray-400 mb-2">Aucun club</p>
                <p class="font-extrabold">Aucun club trouvé dans la base de données.</p>
                <p class="text-[11px] text-gray-500 font-semibold italic mt-2">
                    Cliquez sur “Créer un club” pour ajouter le premier.
                </p>
            </div>
        <?php else: ?>

            <!-- Cards grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <?php foreach ($clubs as $club): ?>
                    <?php
                    $id = htmlspecialchars((string)($club['id'] ?? ''));
                    $name = htmlspecialchars((string)($club['name'] ?? '—'));
                    $descRaw = (string)($club['description'] ?? '');
                    $desc = trim($descRaw) === '' ? '—' : htmlspecialchars($descRaw);
                    $createdAt = htmlspecialchars((string)($club['created_at'] ?? ''));
                    ?>
                    <article class="admin-card bg-white p-6">
                        <div class="flex items-start justify-between gap-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-black text-[#D9E954] flex items-center justify-center font-extrabold">
                                    <?= strtoupper(mb_substr($name, 0, 1)) ?>
                                </div>
                                <div>
                                    <p class="text-xs font-black text-gray-400 uppercase">Club</p>
                                    <p class="text-xl font-extrabold leading-tight"><?= $name ?></p>
                                    <p class="text-[11px] text-gray-500 font-semibold italic">ID: #<?= $id ?></p>
                                </div>
                            </div>

                            <div class="bg-gray-50 border-2 border-black rounded-full px-4 py-2 text-[11px] font-black text-gray-700 inline-flex items-center gap-2">
                                <i class="fa-solid fa-clock"></i>
                                <span><?= $createdAt !== '' ? $createdAt : '—' ?></span>
                            </div>
                        </div>

                        <div class="mt-5">
                            <p class="text-xs font-black uppercase text-gray-400 mb-2">Description</p>
                            <div class="bg-white border-2 border-black rounded-2xl px-4 py-3 font-semibold text-gray-700">
                                <?= $desc ?>
                            </div>
                        </div>

                        <!-- Optional actions (no JS). Update links/routes if you have them -->
                        <div class="mt-6 flex flex-col sm:flex-row gap-3">
                            <a
                                href="/admin/clubs/<?= $id ?>"
                                class="admin-card bg-white px-5 py-3 font-black text-xs uppercase inline-flex items-center gap-2 justify-center"
                                title="Voir"
                            >
                                <i class="fa-solid fa-eye"></i> Voir
                            </a>

                            <!-- Example delete form (only if you have a POST route for delete). Otherwise remove. -->
                            <form action="/admin/clubs/delete" method="POST" class="w-full sm:w-auto">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <button
                                    type="submit"
                                    class="admin-card bg-white px-5 py-3 font-black text-xs uppercase inline-flex items-center gap-2 justify-center w-full"
                                    title="Supprimer"
                                >
                                    <i class="fa-solid fa-trash"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>
    </section>

</main>
</body>
</html>
