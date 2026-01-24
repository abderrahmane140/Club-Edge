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
        <div class="flex items-center gap-6">
            <a href="/club" class="font-bold flex items-center gap-2 hover:underline">
                <i class="fa-solid fa-arrow-left"></i> Retour
            </a>
            <a href="/myClub" class="text-sm font-bold hover:underline">Mon Club</a>
        </div>
        <div class="text-xl font-extrabold uppercase italic">
            <span class="bg-black text-white px-2 py-1">Club</span>Edge
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 mt-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <div class="lg:col-span-8 space-y-10">
                
                <section class="bg-white brutal-card rounded-[3rem] p-10">
                    <div class="flex justify-between items-start mb-6">
                        <h1 class="text-5xl font-black uppercase leading-tight">{{ $club['name'] }}</h1>
                        <div class="bg-black text-white p-4 rounded-3xl">
                            <i class="fa-solid fa-camera-retro text-3xl"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 text-lg leading-relaxed mb-8">
                        {{ $club['description'] }}
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

                <!-- ... (Dynamic Articles and Events can be added here later if data exists) ... -->

            </div>

            <div class="lg:col-span-4 space-y-8">
                
                <div class="bg-white brutal-card rounded-[2.5rem] p-8 text-center">
                    <p class="text-[10px] font-black uppercase text-gray-400 mb-6">Président du Club</p>
                    <div class="w-24 h-24 bg-zinc-100 rounded-[2rem] mx-auto mb-4 border-2 border-black flex items-center justify-center">
                        <i class="fa-solid fa-user-tie text-4xl"></i>
                    </div>
                    <!-- President Name Placeholder or Fetch if available -->
                    <h3 class="text-xl font-black uppercase">Président</h3> 
                    <p class="text-xs font-bold text-gray-500 mb-6 italic">Étudiant responsable</p>
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
                    <!-- Placeholder Members -->
                    <div class="grid grid-cols-4 gap-3">
                         <!-- Dynamically list members if available -->
                        <div class="w-full aspect-square rounded-xl bg-gray-900 border-2 border-black" title="Membre 1"></div>
                        <div class="w-full aspect-square rounded-xl border-2 border-black border-dashed flex items-center justify-center">
                            <i class="fa-solid fa-plus text-gray-300"></i>
                        </div>
                    </div>
                </div>

                @if ($isMember)
                    <div class="w-full bg-green-500 text-white py-5 rounded-[2rem] font-black text-lg border-4 border-black text-center">
                        VOUS ÊTES MEMBRE <i class="fa-solid fa-check-circle ml-2"></i>
                    </div>
                @elseif ($userClub && $userClub['id'] != $club['id'])
                    <div class="w-full bg-red-100 text-red-600 py-5 rounded-[2rem] font-black text-sm border-4 border-black text-center px-4">
                        <i class="fa-solid fa-triangle-exclamation mb-2 text-2xl"></i><br>
                        VOUS ÊTES DÉJÀ MEMBRE DU CLUB <br>
                        <span class="uppercase underline text-black">{{ $userClub['name'] }}</span>
                    </div>
                    <a href="/myClub" class="block mt-4 text-center text-xs font-bold underline hover:text-[#D9E954]">
                        Voir mon club
                    </a>
                @else
                    <form action="/confirmPresence" method="POST">
                        <input type="hidden" name="idClub" value="{{ $club['id'] }}">
                        <button type="submit" class="w-full bg-[#D9E954] text-black py-5 rounded-[2rem] font-black text-lg border-4 border-black hover:shadow-[10px_10px_0px_0px_rgba(0,0,0,1)] transition-all transform hover:-translate-x-2 hover:-translate-y-2">
                            JE CONFIRME MA PRÉSENCE <i class="fa-solid fa-check ml-2"></i>
                        </button>
                    </form>
                    <p class="text-center text-[10px] font-bold uppercase text-gray-400">En cliquant, vous validez votre inscription.</p>
                @endif
            </div>

        </div>
    </main>

</body>
</html>