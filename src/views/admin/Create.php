<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel | Créer un Club</title>

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
                <a href="/admin/clubs" class="text-sm font-black text-gray-500 hover:text-black transition">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Retour
                </a>
            </div>
            <h1 class="text-4xl font-extrabold tracking-tight">Créer un Club</h1>
            <p class="text-gray-500 font-medium italic mt-1">
                Remplissez les champs puis cliquez sur Créer.
            </p>
        </div>

        <div class="bg-white border-2 border-black rounded-full px-5 py-3 font-bold text-xs text-gray-600 inline-flex items-center gap-2">
            <i class="fa-solid fa-circle-info"></i>
            <span>Le nom est obligatoire. La description est optionnelle.</span>
        </div>
    </header>

    <section class="bg-white border-2 border-black rounded-[2.5rem] p-6 md:p-8 shadow-sm">

        <?php if (!empty($data['error'])): ?>
            <div class="admin-card bg-white p-5 mb-8">
                <p class="text-xs font-black uppercase text-gray-400 mb-1">Erreur</p>
                <p class="font-extrabold"><?= htmlspecialchars($data['error']) ?></p>
            </div>
        <?php endif; ?>

        <div class="flex items-start justify-between gap-6 mb-8">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-full bg-black text-[#D9E954] flex items-center justify-center font-extrabold text-xl">
                    C
                </div>
                <div>
                    <p class="text-xs font-black text-gray-400 uppercase">Club</p>
                    <p class="text-2xl font-extrabold">Nouveau Club</p>
                    <p class="text-[11px] text-gray-500 font-semibold italic">Créer un club dans le système</p>
                </div>
            </div>

            <button
                type="submit"
                form="createClubForm"
                class="admin-card bg-white px-6 py-3 font-black text-xs uppercase inline-flex items-center gap-2"
            >
                <i class="fa-solid fa-plus"></i>
                Créer
            </button>
        </div>

        <!-- FORM -->
        <form action="/ClubEdge/admin/create" method="POST" id="createClubForm">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- CLUB NAME -->
                <div class="admin-card bg-white p-6 md:col-span-2">
                    <label class="block text-xs font-black uppercase text-gray-400 mb-2">Nom du club *</label>
                    <input
                        name="name"
                        required
                        value="<?= htmlspecialchars($data['old']['name'] ?? '') ?>"
                        class="w-full bg-white border-2 border-black rounded-2xl px-4 py-3 font-bold outline-none focus:ring-2 focus:ring-black"
                        placeholder="Ex: Club Robotique"
                    />
                    <p class="text-[10px] text-gray-400 font-semibold italic mt-2">
                        Champ obligatoire.
                    </p>
                </div>

                <!-- DESCRIPTION -->
                <div class="admin-card bg-white p-6 md:col-span-2">
                    <label class="block text-xs font-black uppercase text-gray-400 mb-2">Description</label>
                    <textarea
                        name="description"
                        rows="6"
                        class="w-full bg-white border-2 border-black rounded-2xl px-4 py-3 font-bold outline-none focus:ring-2 focus:ring-black"
                        placeholder="Décrivez le club (objectifs, activités...)"
                    ><?= htmlspecialchars($data['old']['description'] ?? '') ?></textarea>
                    <p class="text-[10px] text-gray-400 font-semibold italic mt-2">
                        Optionnel.
                    </p>
                </div>
            </div>

            <div class="mt-8 flex flex-col md:flex-row gap-4">
                <button
                    type="submit"
                    class="admin-card bg-[#D9E954] px-6 py-3 font-black text-xs uppercase inline-flex items-center gap-2 justify-center"
                >
                    <i class="fa-solid fa-check"></i>
                    Créer le club
                </button>

                <a
                    href="/admin/clubs"
                    class="admin-card bg-white px-6 py-3 font-black text-xs uppercase inline-flex items-center gap-2 justify-center"
                >
                    <i class="fa-solid fa-xmark"></i>
                    Annuler
                </a>
            </div>
        </form>

    </section>

</main>
</body>
</html>
