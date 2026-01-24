<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Club | Creative Studio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f3f4f6; }
        .brutal-card { border: 3px solid #000; box-shadow: 6px 6px 0px #000; }
        .article-card:hover { transform: translateY(-5px); transition: all 0.3s ease; }
    </style>
</head>
<body class="text-gray-900 pb-20">

    <nav class="flex justify-between items-center px-8 py-6 max-w-7xl mx-auto">
        <div class="flex space-x-6 text-sm font-bold">
            <a href="/" class="hover:underline">Accueil</a>
            <a href="#" class="text-[#D9E954] bg-black px-4 py-1 rounded-full">Mon Club</a>
        </div>
        <div class="text-xl font-extrabold tracking-tighter uppercase italic">
            <span class="bg-black text-white px-2 py-1">Club</span>Hub
        </div>
        <div class="flex items-center gap-4">
            <span class="text-xs font-black uppercase hidden md:block italic">Membre Gold</span>
            <div class="w-10 h-10 rounded-full bg-black flex items-center justify-center text-white border-2 border-[#D9E954]">
                <i class="fa-solid fa-user-check text-xs"></i>
            </div>
        </div>
    </nav>

    <header class="max-w-7xl mx-auto px-8 py-10">
        <div class="bg-black text-white rounded-[3rem] p-10 md:p-16 flex flex-col md:flex-row items-center gap-12 relative overflow-hidden">
            <div class="absolute right-0 top-0 w-64 h-64 bg-[#D9E954] rounded-full blur-[120px] opacity-20"></div>
            
            <div class="w-32 h-32 md:w-48 md:h-48 bg-[#D9E954] rounded-[3rem] flex items-center justify-center border-4 border-white shrink-0 rotate-3">
                <i class="fa-solid fa-pen-nib text-black text-6xl md:text-8xl"></i>
            </div>
            
            <div class="z-10 text-center md:text-left">
                <h1 class="text-4xl md:text-6xl font-black uppercase mb-4 leading-tight">{{ $club['name'] }}</h1>
                <p class="text-gray-400 text-lg max-w-xl mb-6">{{ $club['description'] }}</p>
                <div class="flex flex-wrap justify-center md:justify-start gap-4">
                    <span class="bg-zinc-800 border border-zinc-700 px-4 py-2 rounded-2xl text-xs font-bold"><i class="fa-solid fa-users mr-2 text-[#D9E954]"></i> 42 Membres</span>
                    <span class="bg-zinc-800 border border-zinc-700 px-4 py-2 rounded-2xl text-xs font-bold"><i class="fa-solid fa-trophy mr-2 text-[#D9E954]"></i> Top Club 2026</span>
                </div>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-8 mt-12 grid grid-cols-1 lg:grid-cols-3 gap-12">
        
        <div class="lg:col-span-2 space-y-10">
            <h2 class="text-3xl font-black uppercase italic border-l-8 border-black pl-4">Membres du Club</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($members as $member)
                <div class="bg-white brutal-card rounded-[2rem] p-6 border-2 border-black flex items-center gap-4 relative overflow-hidden">
                    @if($member['id'] == $club['president_id'])
                        <div class="absolute top-0 right-0 bg-[#D9E954] text-black text-[10px] font-black px-3 py-1 rounded-bl-xl uppercase">
                            Président
                        </div>
                    @endif
                    
                    <div class="w-16 h-16 rounded-full bg-black text-white flex items-center justify-center font-bold text-xl border-2 border-dashed border-white ring-2 ring-black">
                        {{ strtoupper(substr($member['name'], 0, 1)) }}
                    </div>
                    <div>
                        <h3 class="text-lg font-black uppercase leading-tight">{{ $member['name'] }}</h3>
                        <p class="text-xs font-bold text-gray-500">{{ $member['email'] }}</p>
                        @if($member['id'] == $club['president_id'])
                            <p class="text-[10px] font-black uppercase text-[#D9E954] bg-black inline-block px-2 rounded mt-1">Leader</p>
                        @else
                            <p class="text-[10px] font-bold text-gray-400 uppercase mt-1">Membre</p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>

            <!-- ARTICLES SECTION -->
            <div class="mt-12">
                <h2 class="text-3xl font-black uppercase italic border-l-8 border-black pl-4 mb-8">Articles du Club</h2>
                
                @if(isset($articles) && count($articles) > 0)
                    <div class="space-y-8">
                        @foreach($articles as $article)
                        <div class="bg-white brutal-card rounded-[2rem] p-6 border-2 border-black article-card relative">
                            <div class="absolute -top-3 -right-3 bg-black text-[#D9E954] px-4 py-2 rounded-xl font-black text-xs border-2 border-white transform rotate-3">
                                {{ isset($article['event_title']) ? $article['event_title'] : 'Article' }}
                            </div>
                            
                            <h3 class="text-xl font-black uppercase mb-3">{{ $article['title'] }}</h3>
                            <div class="prose prose-sm max-w-none text-gray-600 mb-4 line-clamp-3">
                                {{ $article['content'] }}
                            </div>
                            
                            <div class="flex justify-between items-center mt-4 pt-4 border-t-2 border-gray-100 border-dashed">
                                <span class="text-[10px] font-bold text-gray-400 uppercase">Publié le {{ date('d/m/Y', strtotime($article['created_at'])) }}</span>
                                <button class="bg-black text-white px-4 py-2 rounded-lg font-bold text-xs hover:bg-[#D9E954] hover:text-black transition">LIRE LA SUITE</button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-gray-100 rounded-2xl p-8 text-center border-2 border-dashed border-gray-300">
                        <i class="fa-solid fa-newspaper text-4xl text-gray-300 mb-4"></i>
                        <p class="text-sm font-bold text-gray-400">Aucun article publié pour le moment.</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="space-y-8">
            <h2 class="text-2xl font-black uppercase italic">Agenda du Club</h2>
            
            <div class="bg-[#D9E954] brutal-card rounded-[2.5rem] p-6 border-2 border-black">
                <div class="flex justify-between items-start mb-6">
                    <div class="bg-black text-white text-center px-3 py-2 rounded-2xl">
                        <p class="text-lg font-black leading-none">24</p>
                        <p class="text-[10px] font-bold uppercase">Jan</p>
                    </div>
                    <span class="bg-black text-white px-3 py-1 rounded-full text-[8px] font-black uppercase">Inscrit ✓</span>
                </div>
                <h4 class="text-lg font-black uppercase leading-tight mb-2">Workshop UI/UX : Design Brutaliste</h4>
                <p class="text-xs font-bold text-black opacity-60 mb-6"><i class="fa-solid fa-location-dot mr-1"></i> Salle Amphi B</p>
                <button class="w-full bg-white text-black py-3 rounded-2xl font-black text-xs border-2 border-black hover:bg-black hover:text-white transition">VOIR LES DÉTAILS</button>
            </div>

            <div class="bg-white brutal-card rounded-[2.5rem] p-6 border-2 border-black">
                <div class="flex justify-between items-start mb-6">
                    <div class="bg-gray-100 text-black text-center px-3 py-2 rounded-2xl border border-gray-200">
                        <p class="text-lg font-black leading-none">05</p>
                        <p class="text-[10px] font-bold uppercase">Fév</p>
                    </div>
                </div>
                <h4 class="text-lg font-black uppercase leading-tight mb-2">Sortie Musée de l'Art Moderne</h4>
                <p class="text-xs font-bold text-gray-400 mb-6"><i class="fa-solid fa-location-dot mr-1"></i> Centre Ville</p>
                <button class="w-full bg-black text-white py-3 rounded-2xl font-black text-xs hover:bg-[#D9E954] hover:text-black transition">RÉSERVER MA PLACE</button>
            </div>

            <div class="bg-black text-white rounded-[2rem] p-6 text-center">
                <p class="text-xs font-bold text-gray-400 uppercase mb-4 italic">Une question ?</p>
                <button class="flex items-center justify-center gap-3 w-full bg-zinc-800 py-3 rounded-full hover:bg-zinc-700 transition">
                    <i class="fa-solid fa-paper-plane text-[#D9E954]"></i>
                    <span class="text-xs font-black uppercase">Contacter le Président</span>
                </button>
            </div>
        </div>

    </main>
</body>
</html>