<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClubHub | Digitalisez votre vie étudiante</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f3f4f6; }
        .neo-brutalism { border: 2px solid #000; box-shadow: 4px 4px 0px #000; }
        .card-radius { border-radius: 2rem; }
    </style>
</head>
<body class="text-gray-900">

    <nav class="flex justify-between items-center px-8 py-6 max-w-7xl mx-auto">
        <div class="flex space-x-6 text-sm font-semibold">
            <a href="#" class="hover:underline">Accueil</a>
            <a href="#" class="hover:underline">Clubs</a>
            <a href="#" class="hover:underline">Événements</a>
        </div>
        <div class="text-xl font-extrabold tracking-tighter uppercase">
            <span class="bg-black text-white px-2 py-1">Club</span>Hub
        </div>
        <div class="flex items-center space-x-4">
            <a href="/login" class="text-sm font-semibold">Connexion</a>
            <a href="/register" class="bg-black text-white px-6 py-2 rounded-full text-sm font-bold flex items-center hover:bg-gray-800 transition">
                S'inscrire <i class="fa-solid fa-arrow-up-right-from-square ml-2 text-xs"></i>
            </a>
        </div>
    </nav>

    <header class="text-center py-16 px-4">
        <h1 class="text-5xl md:text-7xl font-extrabold leading-tight mb-8">
            Digitalisez Vos Clubs <br> 
            <span class="flex justify-center items-center gap-4">
                En Un <span class="bg-black text-white rounded-full px-6 py-1 flex items-center"> <i class="fa-solid fa-arrow-right"></i> </span> Clic
            </span>
        </h1>
        
        <div class="flex justify-center items-center space-x-12 mb-12">
            <div class="text-left">
                <p class="font-bold text-xl">15+ CLUBS</p>
                <p class="text-gray-500 font-medium">Inscrivez-vous dès maintenant</p>
            </div>
            <div class="text-2xl">★★★★★</div>
            <button class="bg-white border-2 border-black rounded-full px-8 py-3 font-bold flex items-center hover:bg-gray-100 transition shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                Rejoindre <i class="fa-solid fa-arrow-up-right-from-square ml-2"></i>
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto mt-12 px-4">
            <div class="bg-black rounded-[2.5rem] h-80 flex items-center justify-center overflow-hidden">
                <i class="fa-solid fa-users text-white text-7xl opacity-50"></i>
            </div>
            <div class="bg-[#D9E954] rounded-[2.5rem] h-96 flex items-center justify-center overflow-hidden border-2 border-black -mt-8">
                <i class="fa-solid fa-calendar-check text-black text-8xl"></i>
            </div>
            <div class="bg-black rounded-[2.5rem] h-80 flex items-center justify-center overflow-hidden">
                <i class="fa-solid fa-bolt text-white text-7xl opacity-50"></i>
            </div>
        </div>
    </header>

    <section class="max-w-6xl mx-auto bg-white border-2 border-black rounded-[3rem] p-12 mb-20 shadow-xl">
        <div class="flex justify-between items-end mb-12">
            <h2 class="text-4xl font-extrabold">Nos Catégories</h2>
            <p class="text-gray-500 max-w-xs text-right italic">
                Découvrez les clubs qui correspondent à vos passions et gérez votre emploi du temps.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="border-2 border-gray-200 rounded-[2rem] p-6 hover:border-black transition group">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-xl font-bold">Clubs <br>Sportifs</h3>
                    <div class="bg-black text-white w-10 h-10 rounded-full flex items-center justify-center group-hover:rotate-45 transition">
                        <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i>
                    </div>
                </div>
                <p class="text-sm text-gray-500 mb-6">Pour ceux qui veulent bouger et représenter l'école.</p>
                <div class="bg-gray-100 rounded-2xl h-40 flex items-center justify-center">
                    <i class="fa-solid fa-volleyball text-4xl text-gray-400"></i>
                </div>
            </div>

            <div class="bg-black text-white rounded-[2rem] p-6">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-xl font-bold">Clubs <br>Techniques</h3>
                    <div class="bg-white text-black w-10 h-10 rounded-full flex items-center justify-center">
                        <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i>
                    </div>
                </div>
                <p class="text-sm text-gray-400 mb-6">Apprenez le code, le design et l'IA avec vos pairs.</p>
                <div class="bg-zinc-800 rounded-2xl h-40 flex items-center justify-center">
                    <i class="fa-solid fa-code text-4xl text-white"></i>
                </div>
            </div>

            <div class="border-2 border-gray-200 rounded-[2rem] p-6 hover:border-black transition group">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-xl font-bold">Clubs <br>Culturels</h3>
                    <div class="bg-black text-white w-10 h-10 rounded-full flex items-center justify-center group-hover:rotate-45 transition">
                        <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i>
                    </div>
                </div>
                <p class="text-sm text-gray-500 mb-6">Art, musique et théâtre pour exprimer votre créativité.</p>
                <div class="bg-gray-100 rounded-2xl h-40 flex items-center justify-center">
                    <i class="fa-solid fa-masks-theater text-4xl text-gray-400"></i>
                </div>
            </div>
        </div>

        <div class="mt-16 text-center">
            <p class="text-xl font-medium italic">"Gérez votre <span class="border border-black rounded-full px-4 py-1">passion</span> jusqu'à trouver votre <span class="border border-black rounded-full px-4 py-1">succès</span>."</p>
            <p class="mt-6 text-gray-400 text-sm font-bold uppercase tracking-widest">Plateforme d'Administration Académique</p>
        </div>
    </section>

    <footer class="max-w-7xl mx-auto px-8 py-12 flex justify-between text-xs font-bold text-gray-400 border-t border-gray-200">
        <p>Copyright ClubHub 2026</p>
        <p>Créé pour l'excellence étudiante</p>
        <p>RE Production • 2026</p>
    </footer>

</body>
</html>