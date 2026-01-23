
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin Panel | Étudiants</title>

        <!-- Tailwind + Icons -->
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

    <!-- SIDEBAR (même style) -->
    <aside class="w-64 bg-black text-white p-8 flex flex-col hidden lg:flex">
        <div class="text-xl font-extrabold uppercase italic mb-12">
            <span class="bg-[#D9E954] text-black px-2 py-1">Admin</span>Hub
        </div>

        <nav class="flex-grow space-y-4">
            <a href="#" class="flex items-center gap-3 text-gray-400 hover:text-white sidebar-item transition">
                <i class="fa-solid fa-chart-pie"></i> Dashboard
            </a>
            <a href="#" class="flex items-center gap-3 text-gray-400 hover:text-white sidebar-item transition">
                <i class="fa-solid fa-layer-group"></i> Gérer les Clubs
            </a>
            <a href="#" class="flex items-center gap-3 text-gray-400 hover:text-white sidebar-item transition">
                <i class="fa-solid fa-calendar-days"></i> Événements
            </a>
            <a href="#" class="flex items-center gap-3 text-[#D9E954] font-bold sidebar-item transition">
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

        <!-- HEADER -->
        <header class="flex flex-col md:flex-row md:justify-between md:items-end gap-6 mb-12">
            <div>
                <h1 class="text-4xl font-extrabold tracking-tight">Liste des Étudiants</h1>
                <p class="text-gray-500 font-medium italic mt-1">
                    Cliquez sur un étudiant pour voir sa fiche. Supprimez si nécessaire.
                </p>
            </div>

            <div class="flex gap-3 w-full md:w-auto">
                <div class="relative w-full md:w-80">
                    <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                    <input
                        type="text"
                        placeholder="Rechercher (nom, email, ID)"
                        class="w-full pl-10 pr-4 py-3 rounded-full border-2 border-black bg-white font-semibold outline-none focus:ring-2 focus:ring-black"
                    />
                </div>

            </div>
        </header>

        <!-- CARD TABLE -->
        <section class="bg-white border-2 border-black rounded-[2.5rem] p-6 md:p-8 shadow-sm">
            <div class="flex items-center justify-between gap-4 mb-6">
                <h2 class="text-2xl font-black uppercase flex items-center gap-3">
                    <i class="fa-solid fa-list"></i> Étudiants
                </h2>
                <span class="text-[11px] font-black uppercase text-gray-400">
            Total: <span class="text-black">3</span>
            </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                    <tr class="border-b-2 border-gray-100">
                        <th class="py-4 text-xs font-black uppercase text-gray-400 px-4">Nom</th>
                        <th class="py-4 text-xs font-black uppercase text-gray-400 px-4">Email</th>
                        <th class="py-4 text-xs font-black uppercase text-gray-400 px-4">ID</th>
                        <th class="py-4 text-xs font-black uppercase text-gray-400 px-4 text-right">Actions</th>
                    </tr>
                    </thead>

                    <tbody>


<?php foreach ($data as $user): ?>
<tr class="border-b border-gray-50 hover:bg-gray-50 transition cursor-pointer"
    data-href="/ClubEdge/admin/etudiants/<?= $user->id ?>">

    <td class="py-4 px-4">
        <p class="font-extrabold"><?= htmlspecialchars($user->name) ?></p>
        <p class="text-[10px] text-gray-500 italic"><?= htmlspecialchars($user->role) ?></p>
    </td>

    <td class="py-4 px-4 font-medium text-sm text-gray-700">
        <?= htmlspecialchars($user->email) ?>
    </td>

    <td class="py-4 px-4">
        <span class="bg-zinc-100 text-black px-3 py-1 rounded-full text-[10px] font-black underline">
            #<?= $user->id ?>
        </span>
    </td>

    <td class="py-4 px-4 text-right">
        <form action="/ClubEdge/admin/delete" method="POST"
              class="inline" data-no-rowclick data-delete-form>
            <input type="hidden" name="std_id" value="<?= $user->id ?>" />
            <button type="submit"
                    class="px-4 py-2 rounded-full border-2 border-black bg-red-600 text-white font-black text-xs">
                <i class="fa-solid fa-trash"></i> Supprimer
            </button>
        </form>
    </td>

</tr>
<?php endforeach; ?>



                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <p class="text-xs text-gray-500 font-semibold italic">
                    Astuce: clique sur la ligne pour ouvrir la fiche étudiant.
                </p>
                <div class="flex gap-2">
                    <button class="admin-card bg-white px-5 py-2 text-xs font-black">Précédent</button>
                    <button class="admin-card bg-[#D9E954] px-5 py-2 text-xs font-black">Suivant</button>
                </div>
            </div>
        </section>

    </main>

    <script>
        // Row click => redirect (sauf si click sur bouton delete / form)
        document.querySelectorAll("tr[data-href]").forEach((row) => {
            row.addEventListener("click", (e) => {
                if (e.target.closest("[data-no-rowclick]")) return;
                window.location.href = row.dataset.href;
            });
        });

        // Confirm delete + empêcher redirect
        document.querySelectorAll("[data-delete]").forEach((btn) => {
            btn.addEventListener("click", (e) => {
                e.stopPropagation();
                const ok = confirm("Supprimer cet étudiant ?");
                if (!ok) e.preventDefault();
            });
        });
    </script>

    </body>
    </html>
