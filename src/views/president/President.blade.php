<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Président | ClubHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f3f4f6; }
        .brutal-card { border: 3px solid #000; box-shadow: 6px 6px 0px #000; transition: all 0.2s; }
        .brutal-input { border: 2px solid #000; border-radius: 1rem; width: 100%; padding: 0.75rem; outline: none; }
        .brutal-input:focus { box-shadow: 4px 4px 0px #000; transform: translate(-2px, -2px); }
        .tab-active { background-color: black; color: white; border-radius: 9999px; }
    </style>
</head>
<body class="text-gray-900">

    <header class="bg-black text-white px-8 py-10">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-6">
                <div class="w-20 h-20 rounded-[2rem] bg-[#D9E954] border-2 border-white flex items-center justify-center text-black">
                    <i class="fa-solid fa-crown text-3xl"></i>
                </div>
                <div>
                    <h1 class="text-3xl font-black uppercase tracking-tight">Espace Président</h1>
                    <p class="text-[#D9E954] font-bold italic">Club : Creative Studio Design</p>
                </div>
            </div>
            <a href="index.html" class="bg-white text-black px-6 py-2 rounded-full font-bold text-sm hover:bg-gray-200 transition">
                <i class="fa-solid fa-house mr-2"></i> Voir le site
            </a>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <div class="lg:col-span-1">
                <div class="bg-white brutal-card rounded-[2.5rem] p-8 h-[750px] flex flex-col">
                    <h2 class="text-xl font-black mb-6 uppercase flex items-center justify-between">
                        Membres <span class="text-sm bg-gray-100 px-3 py-1 rounded-full">42</span>
                    </h2>
                    
                    <div class="flex-grow overflow-y-auto pr-2 space-y-4 custom-scrollbar">
                        <div class="flex items-center justify-between p-4 border-2 border-gray-50 rounded-2xl hover:border-black transition cursor-pointer group">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-zinc-200 font-bold flex items-center justify-center text-xs">AM</div>
                                <div>
                                    <p class="text-sm font-black">Alice Martin</p>
                                    <p class="text-[10px] text-gray-400">ID-2026-001</p>
                                </div>
                            </div>
                            <i class="fa-solid fa-chevron-right text-gray-300 group-hover:text-black"></i>
                        </div>
                        <div class="flex items-center justify-between p-4 border-2 border-gray-50 rounded-2xl">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-zinc-900 text-white font-bold flex items-center justify-center text-xs">BJ</div>
                                <div>
                                    <p class="text-sm font-black">Bob Johnson</p>
                                    <p class="text-[10px] text-gray-400">ID-2026-014</p>
                                </div>
                            </div>
                            <i class="fa-solid fa-chevron-right text-gray-300"></i>
                        </div>
                        <div class="p-4 text-center text-xs text-gray-400 italic">... et 40 autres membres</div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 space-y-10">
                
                <div class="bg-white brutal-card rounded-[2.5rem] p-8 md:p-10 border-t-8 border-t-[#D9E954]">
                    <h2 class="text-2xl font-black mb-6 uppercase flex items-center gap-3">
                        <i class="fa-solid fa-calendar-plus text-[#D9E954] bg-black p-2 rounded-lg text-sm"></i>
                        Créer un Événement
                    </h2>
                    
                    <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2 md:col-span-2">
                            <label class="text-[10px] font-black uppercase ml-1">Titre de l'événement</label>
                            <input type="text" placeholder="Ex: Workshop Adobe XD" class="brutal-input">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase ml-1">Date & Heure</label>
                            <input type="datetime-local" class="brutal-input">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase ml-1">Lieu / Salle</label>
                            <input type="text" placeholder="Amphi C" class="brutal-input">
                        </div>
                        <div class="space-y-2 md:col-span-2">
                            <label class="text-[10px] font-black uppercase ml-1">Description courte</label>
                            <textarea rows="2" class="brutal-input resize-none" placeholder="Objectifs de l'événement..."></textarea>
                        </div>
                        <button type="submit" class="md:col-span-2 bg-black text-white py-4 rounded-2xl font-black hover:bg-zinc-800 transition shadow-[4px_4px_0px_#D9E954]">
                            PUBLIER L'ÉVÉNEMENT <i class="fa-solid fa-paper-plane ml-2"></i>
                        </button>
                    </form>
                </div>

                <div class="bg-white brutal-card rounded-[2.5rem] p-8 md:p-10 border-t-8 border-t-black">
                    <h2 class="text-2xl font-black mb-6 uppercase flex items-center gap-3">
                        <i class="fa-solid fa-newspaper text-white bg-black p-2 rounded-lg text-sm"></i>
                        Rédiger un Article
                    </h2>
                    
                    <div class="space-y-6">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase ml-1 text-gray-400">Sujet de l'article</label>
                            <input type="text" placeholder="Résumé du dernier workshop..." class="brutal-input font-bold italic">
                        </div>
                        
                        <div class="border-2 border-black rounded-2xl overflow-hidden">
                            <div class="bg-gray-100 p-2 border-b-2 border-black flex gap-4">
                                <button class="p-1 hover:bg-white rounded"><i class="fa-solid fa-bold text-xs"></i></button>
                                <button class="p-1 hover:bg-white rounded"><i class="fa-solid fa-italic text-xs"></i></button>
                                <button class="p-1 hover:bg-white rounded"><i class="fa-solid fa-link text-xs"></i></button>
                                <button class="p-1 hover:bg-white rounded"><i class="fa-solid fa-image text-xs"></i></button>
                            </div>
                            <textarea rows="6" class="w-full p-4 outline-none resize-none" placeholder="Racontez ce qui s'est passé..."></textarea>
                        </div>

                        <div class="flex justify-between items-center">
                            <p class="text-[10px] font-bold text-gray-400 italic">* L'article sera visible par tous les étudiants.</p>
                            <button class="bg-[#D9E954] text-black px-10 py-3 rounded-full font-black border-2 border-black hover:shadow-[4px_4px_0px_black] transition transform hover:-translate-y-1">
                                POSTER L'ARTICLE
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <footer class="max-w-7xl mx-auto px-8 py-10 border-t border-gray-200 mt-12 flex justify-between items-center text-[10px] font-bold uppercase text-gray-400">
        <p>Session 2026 • Creative Studio Dashboard</p>
        <p class="flex items-center gap-2">
            <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span> Président Connecté
        </p>
    </footer>

</body>
</html>