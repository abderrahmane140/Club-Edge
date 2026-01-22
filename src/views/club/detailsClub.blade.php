<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails | Creative Studio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f3f4f6; }
        .brutal-card { border: 3px solid #000; box-shadow: 8px 8px 0px #000; }
        .limit-bar { height: 12px; border: 2px solid #000; border-radius: 99px; overflow: hidden; background: #fff; }
    </style>
</head>
<body class="text-gray-900 pb-20">

    <nav class="flex justify-between items-center px-8 py-6 max-w-7xl mx-auto">
        <a href="index.html" class="font-bold flex items-center gap-2 hover:underline">
            <i class="fa-solid fa-arrow-left"></i> Retour
        </a>
        <div class="text-xl font-extrabold uppercase italic">
            <span class="bg-black text-white px-2 py-1">Club</span>Edge
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 mt-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <div class="lg:col-span-8 space-y-10">
                
                <section class="bg-white brutal-card rounded-[3rem] p-10">
                    <div class="flex justify-between items-start mb-6">
                        <h1 class="text-5xl font-black uppercase leading-tight">Creative <br><span class="text-[#D9E954] bg-black px-4 italic">Studio</span></h1>
                        <div class="bg-black text-white p-4 rounded-3xl">
                             <i class="fa-solid fa-camera-retro text-3xl"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 text-lg leading-relaxed mb-8">
                        Le Creative Studio est l'espace ultime pour les passionnés de design graphique, de photographie et de direction artistique. Notre mission est de digitaliser la créativité au sein de l'institution à travers des projets concrets et des ateliers hebdomadaires.
                    </p>
                    
                    <div class="bg-gray-50 border-2 border-dashed border-black rounded-3xl p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-black uppercase text-sm">Disponibilité du Club</h3>
                            <span class="font-black text-sm">6 / 8 Membres</span>
                        </div>
                        <div class="limit-bar">
                            <div class="bg-[#D9E954] h-full w-[75%] border-r-2 border-black"></div>
                        </div>
                        <p class="text-[10px] font-bold text-gray-400 mt-3 uppercase">Attention : Ce club est limité à 8 membres pour garantir un encadrement de qualité.</p>
                    </div>
                </section>

                <section>
                    <h2 class="text-2xl font-black uppercase mb-6 flex items-center gap-3">
                        <i class="fa-solid fa-newspaper text-xl"></i> Articles du Club
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-white border-2 border-black rounded-[2rem] p-6 hover:translate-y-[-5px] transition-all">
                            <p class="text-[10px] font-black text-gray-400 mb-2 uppercase">15 Jan 2026</p>
                            <h4 class="font-black text-lg mb-3">L'IA dans le Design : Menace ou Outil ?</h4>
                            <p class="text-sm text-gray-500 line-clamp-2 mb-4">Résumé de notre dernier débat passionné sur l'utilisation de Midjourney...</p>
                            <a href="#" class="text-xs font-black underline italic">Lire l'article</a>
                        </div>
                        <div class="bg-white border-2 border-black rounded-[2rem] p-6 hover:translate-y-[-5px] transition-all">
                            <p class="text-[10px] font-black text-gray-400 mb-2 uppercase">02 Jan 2026</p>
                            <h4 class="font-black text-lg mb-3">Portfolio Review : Résultats</h4>
                            <p class="text-sm text-gray-500 line-clamp-2 mb-4">Félicitations aux 3 membres qui ont décroché un stage grâce à leurs travaux...</p>
                            <a href="#" class="text-xs font-black underline italic">Lire l'article</a>
                        </div>
                    </div>
                </section>

                <section class="bg-black text-white rounded-[3rem] p-10">
                    <h2 class="text-2xl font-black uppercase mb-8 text-[#D9E954]">Historique des Événements</h2>
                    <div class="space-y-6">
                        <div class="flex items-center gap-6 border-b border-zinc-800 pb-4">
                            <span class="text-xl font-black text-gray-500 italic">01.</span>
                            <div class="flex-grow">
                                <h4 class="font-bold">Workshop Logo Design</h4>
                                <p class="text-xs text-gray-500 italic">Décembre 2025 • 12 participants</p>
                            </div>
                            <i class="fa-solid fa-circle-check text-green-500"></i>
                        </div>
                        <div class="flex items-center gap-6 border-b border-zinc-800 pb-4">
                            <span class="text-xl font-black text-gray-500 italic">02.</span>
                            <div class="flex-grow">
                                <h4 class="font-bold">Sortie Photo Urbaine</h4>
                                <p class="text-xs text-gray-500 italic">Novembre 2025 • 8 participants</p>
                            </div>
                            <i class="fa-solid fa-circle-check text-green-500"></i>
                        </div>
                    </div>
                </section>
            </div>

            <div class="lg:col-span-4 space-y-8">
                
                <div class="bg-white brutal-card rounded-[2.5rem] p-8 text-center">
                    <p class="text-[10px] font-black uppercase text-gray-400 mb-6">Président du Club</p>
                    <div class="w-24 h-24 bg-zinc-100 rounded-[2rem] mx-auto mb-4 border-2 border-black flex items-center justify-center">
                        <i class="fa-solid fa-user-tie text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-black uppercase">Defri M. Fahrul</h3>
                    <p class="text-xs font-bold text-gray-500 mb-6 italic">Étudiant en Master Design</p>
                    <div class="flex justify-center gap-4">
                        <button class="w-10 h-10 rounded-full border-2 border-black flex items-center justify-center hover:bg-black hover:text-white transition">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </button>
                        <button class="w-10 h-10 rounded-full border-2 border-black flex items-center justify-center hover:bg-black hover:text-white transition">
                            <i class="fa-solid fa-envelope"></i>
                        </button>
                    </div>
                </div>

                <div class="bg-white brutal-card rounded-[2.5rem] p-8">
                    <h3 class="text-sm font-black uppercase mb-6 italic">Membres de l'équipe</h3>
                    <div class="grid grid-cols-4 gap-3">
                        <div class="w-full aspect-square rounded-xl bg-gray-900 border-2 border-black" title="Membre 1"></div>
                        <div class="w-full aspect-square rounded-xl bg-gray-800 border-2 border-black" title="Membre 2"></div>
                        <div class="w-full aspect-square rounded-xl bg-gray-700 border-2 border-black" title="Membre 3"></div>
                        <div class="w-full aspect-square rounded-xl bg-gray-600 border-2 border-black" title="Membre 4"></div>
                        <div class="w-full aspect-square rounded-xl bg-gray-500 border-2 border-black" title="Membre 5"></div>
                        <div class="w-full aspect-square rounded-xl bg-gray-400 border-2 border-black" title="Membre 6"></div>
                        <div class="w-full aspect-square rounded-xl border-2 border-black border-dashed flex items-center justify-center">
                            <i class="fa-solid fa-plus text-gray-300"></i>
                        </div>
                        <div class="w-full aspect-square rounded-xl border-2 border-black border-dashed flex items-center justify-center">
                            <i class="fa-solid fa-plus text-gray-300"></i>
                        </div>
                    </div>
                </div>

                <button class="w-full bg-[#D9E954] text-black py-5 rounded-[2rem] font-black text-lg border-4 border-black hover:shadow-[10px_10px_0px_0px_rgba(0,0,0,1)] transition-all transform hover:-translate-x-2 hover:-translate-y-2">
                    POSTULER AU CLUB <i class="fa-solid fa-paper-plane ml-2"></i>
                </button>
                <p class="text-center text-[10px] font-bold uppercase text-gray-400">Validation par le président requise</p>
            </div>

        </div>
    </main>

</body>
</html>