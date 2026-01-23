<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Président | Mes Publications</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f3f4f6; }
        .brutal-card { border: 3px solid #000; box-shadow: 6px 6px 0px #000; }
        .btn-action { border: 2px solid #000; transition: all 0.2s; }
        .btn-action:hover { transform: translate(-2px, -2px); box-shadow: 3px 3px 0px #000; }
    </style>
</head>
<body class="text-gray-900 pb-20">

    <nav class="flex justify-between items-center px-8 py-6 max-w-7xl mx-auto">
        <a href="#" class="font-bold flex items-center gap-2 hover:underline">
            <i class="fa-solid fa-chevron-left"></i> Dashboard Président
        </a>
        <div class="text-xl font-extrabold uppercase italic">
            <span class="bg-black text-white px-2 py-1">Club</span>Hub
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 mt-10">
        <header class="mb-12">
            <h1 class="text-4xl font-black uppercase italic tracking-tighter">Gestion des <span class="bg-[#D9E954] px-3 border-2 border-black shadow-[4px_4px_0px_#000]">Publications</span></h1>
            <p class="text-gray-500 font-bold mt-2">Modifiez ou supprimez vos événements et articles en un clic.</p>
        </header>

        <div class="space-y-16">
            
            <section>
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-black uppercase flex items-center gap-3">
                        <i class="fa-solid fa-calendar-day"></i> Vos Événements
                    </h2>
                    <button class="bg-black text-white px-6 py-2 rounded-full font-black text-xs hover:bg-[#D9E954] hover:text-black transition border-2 border-black">
                        + AJOUTER UN ÉVÉNEMENT
                    </button>
                </div>

                <div class="bg-white brutal-card rounded-[2.5rem] overflow-hidden">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b-4 border-black">
                                <th class="p-6 text-xs font-black uppercase">Nom de l'événement</th>
                                <th class="p-6 text-xs font-black uppercase">Date & Lieu</th>
                                <th class="p-6 text-xs font-black uppercase">Statut</th>
                                <th class="p-6 text-xs font-black uppercase text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y-2 divide-gray-100">
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-6 font-bold">Workshop UI/UX Brutaliste</td>
                                <td class="p-6 text-sm text-gray-500 italic">24 Jan 2026 • Amphi B</td>
                                <td class="p-6">
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-[10px] font-black uppercase">Actif</span>
                                </td>
                                <td class="p-6">
                                    <div class="flex justify-center gap-3">
                                        <button class="btn-action bg-white px-4 py-2 rounded-xl text-blue-600 font-black text-[10px] uppercase">
                                            <i class="fa-solid fa-pen mr-1"></i> Modifier
                                        </button>
                                        <button class="btn-action bg-white px-4 py-2 rounded-xl text-red-600 font-black text-[10px] uppercase">
                                            <i class="fa-solid fa-trash mr-1"></i> Supprimer
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-6 font-bold">Conférence IA & Créativité</td>
                                <td class="p-6 text-sm text-gray-500 italic">12 Fév 2026 • Salle 302</td>
                                <td class="p-6">
                                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-[10px] font-black uppercase">Brouillon</span>
                                </td>
                                <td class="p-6">
                                    <div class="flex justify-center gap-3">
                                        <button class="btn-action bg-white px-4 py-2 rounded-xl text-blue-600 font-black text-[10px] uppercase">
                                            <i class="fa-solid fa-pen mr-1"></i> Modifier
                                        </button>
                                        <button class="btn-action bg-white px-4 py-2 rounded-xl text-red-600 font-black text-[10px] uppercase">
                                            <i class="fa-solid fa-trash mr-1"></i> Supprimer
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <section>
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-black uppercase flex items-center gap-3">
                        <i class="fa-solid fa-newspaper"></i> Vos Articles
                    </h2>
                    <button class="bg-black text-white px-6 py-2 rounded-full font-black text-xs hover:bg-[#D9E954] hover:text-black transition border-2 border-black">
                        + RÉDIGER UN ARTICLE
                    </button>
                </div>

                <div class="bg-white brutal-card rounded-[2.5rem] overflow-hidden">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b-4 border-black">
                                <th class="p-6 text-xs font-black uppercase">Titre de l'article</th>
                                <th class="p-6 text-xs font-black uppercase">Date de publication</th>
                                <th class="p-6 text-xs font-black uppercase">Vues</th>
                                <th class="p-6 text-xs font-black uppercase text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y-2 divide-gray-100">
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-6 font-bold">L'importance du Noir et Blanc</td>
                                <td class="p-6 text-sm text-gray-500 italic">05 Jan 2026</td>
                                <td class="p-6 font-bold text-sm">1.2k</td>
                                <td class="p-6">
                                    <div class="flex justify-center gap-3">
                                        <button class="btn-action bg-white px-4 py-2 rounded-xl text-blue-600 font-black text-[10px] uppercase">
                                            <i class="fa-solid fa-pen mr-1"></i> Modifier
                                        </button>
                                        <button class="btn-action bg-white px-4 py-2 rounded-xl text-red-600 font-black text-[10px] uppercase">
                                            <i class="fa-solid fa-trash mr-1"></i> Supprimer
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

        </div>
    </main>

</body>
</html>