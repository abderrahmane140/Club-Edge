<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Événement | Workshop UI/UX Design</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f3f4f6; }
        .brutal-card { border: 3px solid #000; box-shadow: 8px 8px 0px #000; }
        .review-input { border: 2px solid #000; border-radius: 1rem; width: 100%; padding: 1rem; transition: all 0.2s; }
        .review-input:focus { outline: none; box-shadow: 4px 4px 0px #D9E954; }
    </style>
</head>
<body class="text-gray-900 pb-20">

    <nav class="flex justify-between items-center px-8 py-6 max-w-7xl mx-auto w-full">
        <a href="#" class="font-bold hover:underline flex items-center gap-2">
            <i class="fa-solid fa-chevron-left text-xs"></i> Tous les événements
        </a>
        <div class="text-xl font-extrabold uppercase italic">
            <span class="bg-black text-white px-2 py-1">Club</span>Edge
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-6 mt-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            
            <div class="lg:col-span-2 space-y-8">
                <div class="bg-white brutal-card rounded-[3rem] p-8 md:p-12">
                    <div class="flex items-center gap-4 mb-6">
                        <span class="bg-[#D9E954] text-black text-[10px] font-black px-4 py-1 rounded-full uppercase border border-black">Workshop</span>
                        <span class="text-gray-400 font-bold text-xs uppercase tracking-widest">24 Janvier 2026</span>
                    </div>
                    
                    <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-6">Workshop UI/UX : <br>Le Design Brutaliste</h1>
                    
                    <p class="text-gray-600 leading-relaxed text-lg mb-8">
                        Apprenez à créer des interfaces audacieuses et modernes en utilisant les principes du néo-brutalisme. 
                        Une session pratique de 3 heures avec les mentors du Creative Studio. Matériel requis : Votre ordinateur et une soif d'apprendre !
                    </p>

                    <div class="grid grid-cols-2 md:grid-cols-3 gap-6 py-8 border-y-2 border-gray-100 mb-8">
                        <div>
                            <p class="text-[10px] font-black text-gray-400 uppercase">Heure</p>
                            <p class="font-bold text-lg italic underline">14:00 - 17:00</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-gray-400 uppercase">Lieu</p>
                            <p class="font-bold text-lg">Salle Amphi B</p>
                        </div>
                        <div class="col-span-2 md:col-span-1">
                            <p class="text-[10px] font-black text-gray-400 uppercase">Organisé par</p>
                            <p class="font-bold text-lg">Creative Studio</p>
                        </div>
                    </div>

                    <button class="w-full bg-black text-white py-6 rounded-2xl font-black text-xl flex items-center justify-center group hover:bg-[#D9E954] hover:text-black transition-all">
                        JE CONFIRME MA PRÉSENCE
                        <i class="fa-solid fa-check-circle ml-4 group-hover:scale-125 transition"></i>
                    </button>
                    <p class="text-center text-[10px] font-bold text-gray-400 mt-4 uppercase tracking-tighter">12 places restantes sur 40</p>
                </div>

                <div class="bg-white brutal-card rounded-[3rem] p-8 md:p-12">
                    <h3 class="text-2xl font-black uppercase mb-8 italic">Avis des étudiants (12)</h3>
                    
                    <!--form review-->

                    <form action="" method="POST">
                        <div class="mb-12">
                            <label class="text-[10px] font-black uppercase ml-1 mb-2 block">Laissez un avis ou une question</label>
                            <div class="space-y-4">
                                <textarea rows="3" name="comment" class="review-input resize-none bg-gray-50" placeholder="Super workshop ! J'ai hâte..."></textarea>
                                <div class="flex justify-between items-center">
                                    <div class="flex gap-2 text-[#D9E954] text-sm">
                                        <i class="fa-solid fa-star text-black"></i>
                                        <i class="fa-solid fa-star text-black"></i>
                                        <i class="fa-solid fa-star text-black"></i>
                                        <i class="fa-solid fa-star text-black"></i>
                                        <i class="fa-regular fa-star text-black"></i>
                                    </div>
                                    <button class="bg-black text-white px-8 py-2 rounded-full font-bold text-sm">Poster</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="space-y-8">
                        <div class="flex gap-4 border-b border-gray-100 pb-6">
                            <div class="w-12 h-12 rounded-full bg-zinc-200 border-2 border-black flex-shrink-0"></div>
                            <div>
                                <div class="flex items-center gap-3 mb-1">
                                    <p class="font-black text-sm">Alexandre Martin</p>
                                    <span class="text-[10px] font-bold text-gray-400">Il y a 2h</span>
                                </div>
                                <p class="text-sm text-gray-600">Est-ce qu'on doit installer Figma avant de venir ou on le fera sur place ?</p>
                            </div>
                        </div>

                        <div class="flex gap-4 border-b border-gray-100 pb-6">
                            <div class="w-12 h-12 rounded-full bg-[#D9E954] border-2 border-black flex-shrink-0 flex items-center justify-center font-bold">SM</div>
                            <div>
                                <div class="flex items-center gap-3 mb-1">
                                    <p class="font-black text-sm">Sarah Miller</p>
                                    <span class="text-[10px] font-bold text-gray-400">Hier</span>
                                </div>
                                <p class="text-sm text-gray-600">Le précédent workshop était incroyable, j'ai déjà réservé ma place pour celui-ci !</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-8">
                <div class="bg-black text-white brutal-card rounded-[3rem] p-8">
                    <h3 class="text-xl font-black uppercase mb-6 text-[#D9E954]">Participants</h3>
                    <div class="flex -space-x-3 mb-6">
                        <div class="w-12 h-12 rounded-full border-2 border-black bg-zinc-700"></div>
                        <div class="w-12 h-12 rounded-full border-2 border-black bg-zinc-600"></div>
                        <div class="w-12 h-12 rounded-full border-2 border-black bg-zinc-500"></div>
                        <div class="w-12 h-12 rounded-full border-2 border-black bg-[#D9E954] text-black flex items-center justify-center font-black text-xs">+28</div>
                    </div>
                    <p class="text-xs text-gray-400 font-medium">Rejoignez Sarah, Alexandre et 26 autres étudiants inscrits.</p>
                </div>

                <div class="bg-[#D9E954] border-2 border-black rounded-[3rem] p-8">
                    <h3 class="text-xl font-black uppercase mb-4 text-black italic leading-tight">Prochain <br>Événement</h3>
                    <p class="text-sm font-bold text-black opacity-60 mb-6">Conférence IA & Créativité</p>
                    <button class="w-full bg-black text-white py-3 rounded-full font-black text-xs uppercase tracking-widest">Voir l'agenda</button>
                </div>
                
                <div class="text-center p-6 border-2 border-black border-dashed rounded-[2rem]">
                    <i class="fa-solid fa-shield-halved text-2xl mb-2"></i>
                    <p class="text-[10px] font-black uppercase leading-tight">Événement réservé <br>aux étudiants de l'institut</p>
                </div>
            </div>

        </div>
    </main>

</body>
</html>