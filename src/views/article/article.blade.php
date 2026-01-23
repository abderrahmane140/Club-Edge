<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article | Détails Complets</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f3f4f6; }
        .brutal-card { border: 3px solid #000; box-shadow: 10px 10px 0px #000; }
        .content-shadow { text-shadow: 2px 2px 0px #D9E954; }
    </style>
</head>
<body class="text-gray-900 pb-20">

    <nav class="flex justify-between items-center px-8 py-6 max-w-5xl mx-auto">
        <a href="#" onclick="history.back()" class="bg-white border-2 border-black px-4 py-2 rounded-full font-black text-xs hover:bg-black hover:text-white transition">
            <i class="fa-solid fa-arrow-left mr-2"></i> RETOUR AU JOURNAL
        </a>
        <div class="text-xl font-extrabold italic">
            <span class="bg-black text-white px-2 py-1">Club</span>Hub
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-6 mt-10">
        <article class="bg-white brutal-card rounded-[3rem] overflow-hidden border-2 border-black">
            
            <div class="h-[400px] bg-zinc-900 flex items-center justify-center relative border-b-4 border-black">
                <i class="fa-solid fa-newspaper text-9xl text-white opacity-10"></i>
                <div class="absolute bottom-8 left-8 text-white z-10">
                    <span class="bg-[#D9E954] text-black px-4 py-1 rounded-full text-xs font-black uppercase italic border-2 border-black">
                        Focus Design
                    </span>
                </div>
            </div>

            <div class="p-8 md:p-16">
                <div class="flex items-center gap-4 mb-8 text-gray-400">
                    <div class="w-12 h-12 rounded-2xl bg-black flex items-center justify-center text-[#D9E954] font-black">CS</div>
                    <div>
                        <p class="text-black font-black uppercase text-sm italic">Publié par le Creative Studio</p>
                        <p class="text-[10px] font-bold uppercase tracking-widest">Le 22 Janvier 2026 • 6 min de lecture</p>
                    </div>
                </div>

                <h1 class="text-4xl md:text-6xl font-black uppercase leading-tight mb-10 tracking-tighter">
                    L'art du <span class="underline decoration-[#D9E954] decoration-8">Néo-Brutalisme</span> dans le web moderne.
                </h1>

                <div class="space-y-8 text-lg leading-relaxed text-gray-700">
                    <p class="font-extrabold text-2xl text-black italic">
                        "Pourquoi tout le monde revient-il aux bordures noires et aux couleurs saturées ? Décryptage d'une tendance qui casse les codes du minimalisme fade."
                    </p>

                    <p>
                        Le néo-brutalisme n'est pas seulement un choix esthétique ; c'est une déclaration. Dans un monde web dominé par des ombres douces et des dégradés subtils, le brutalisme revient pour imposer une hiérarchie claire et une honnêteté visuelle.
                    </p>

                    <h2 class="text-3xl font-black text-black uppercase mt-12 mb-4 italic">1. La clarté avant tout</h2>
                    <p>
                        L'utilisation de bordures épaisses (comme celles que vous voyez sur ce site) permet de définir des zones d'action sans ambiguïté. Pour un étudiant, cela signifie une navigation plus rapide et une compréhension immédiate de l'interface. 
                    </p>

                    <div class="bg-black text-white p-10 rounded-[2.5rem] border-l-[12px] border-[#D9E954] my-10">
                        <i class="fa-solid fa-quote-left text-4xl text-[#D9E954] mb-4"></i>
                        <p class="text-2xl font-bold italic leading-snug">
                            "Le design ne doit pas seulement être beau, il doit être fonctionnel. Le brutalisme est le mariage parfait entre la structure et l'expression brute."
                        </p>
                        <p class="mt-6 text-[#D9E954] font-black uppercase text-xs">— Defri M. Fahrul, Président</p>
                    </div>

                    <h2 class="text-3xl font-black text-black uppercase mt-12 mb-4 italic">2. L'impact des couleurs</h2>
                    <p>
                        Oubliez les pastels. Ici, on utilise du jaune citron, du vert électrique ou du bleu pur. Ces couleurs, associées au noir profond, créent un contraste qui maintient l'utilisateur en alerte et engagé dans sa lecture.
                    </p>
                    
                    <p>
                        En conclusion, adopter ce style pour notre plateforme de clubs permet de refléter l'énergie et le dynamisme de notre vie étudiante. Nous ne sommes pas une administration classique, nous sommes un hub créatif.
                    </p>
                </div>

                <div class="mt-16 pt-10 border-t-4 border-black flex flex-col md:flex-row justify-between items-center gap-6">
                    <div class="flex gap-4">
                        <button class="flex items-center gap-2 font-black text-sm uppercase group">
                            <i class="fa-solid fa-heart text-2xl group-hover:text-red-500 transition"></i> 245
                        </button>
                        <button class="flex items-center gap-2 font-black text-sm uppercase group">
                            <i class="fa-solid fa-comment text-2xl group-hover:text-blue-500 transition"></i> 12
                        </button>
                    </div>
                    
                    <div class="flex gap-2">
                        <button class="w-10 h-10 rounded-full border-2 border-black flex items-center justify-center hover:bg-[#D9E954] transition">
                            <i class="fa-brands fa-x-twitter"></i>
                        </button>
                        <button class="w-10 h-10 rounded-full border-2 border-black flex items-center justify-center hover:bg-[#D9E954] transition">
                            <i class="fa-solid fa-link"></i>
                        </button>
                    </div>
                </div>
            </div>
        </article>
    </main>

</body>
</html>