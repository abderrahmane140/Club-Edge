<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClubEdge | Inscription au Club</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f3f4f6;
        }

        .input-brutal {
            border: 2px solid #000;
            border-radius: 1rem;
            padding: 0.75rem 1rem;
            width: 100%;
            transition: all 0.2s;
        }

        .input-brutal:focus {
            outline: none;
            box-shadow: 4px 4px 0px #000;
            transform: translate(-2px, -2px);
        }

        .card-shadow {
            box-shadow: 8px 8px 0px #000;
        }
    </style>
</head>

<body class="text-gray-900 min-h-screen flex flex-col">

    <nav class="flex justify-between items-center px-8 py-6 max-w-7xl mx-auto w-full">
        <a href="/" class="flex items-center font-bold hover:underline">
            <i class="fa-solid fa-arrow-left mr-2"></i> Retour aux clubs
        </a>
        <div class="text-xl font-extrabold uppercase italic">
            <span class="bg-black text-white px-2 py-1">Club</span>Edge
        </div>
        <div class="w-10"></div>
    </nav>

    <main class="flex-grow flex items-center justify-center px-4 py-12">
        <div class="max-w-5xl w-full bg-white border-[3px] border-black rounded-[3rem] overflow-hidden card-shadow flex flex-col md:flex-row">

            <div class="md:w-2/5 bg-black text-white p-10 flex flex-col justify-between">
                <div>
                    <span class="bg-[#D9E954] text-black text-xs font-black px-4 py-1 rounded-full uppercase">Design Class</span>
                    <h1 class="text-4xl font-extrabold mt-6 leading-tight">Rejoignez le <br>Creative Studio</h1>
                    <p class="mt-4 text-gray-400 text-sm leading-relaxed">
                        En rejoignant ce club, vous aurez accès à plus de 500 tutoriels et une communauté de 2k+ membres passionnés.
                    </p>
                </div>

                <div class="mt-12 space-y-6">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-zinc-800 rounded-2xl flex items-center justify-center border border-zinc-700">
                            <i class="fa-solid fa-calendar text-[#D9E954]"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 font-bold uppercase">Session</p>
                            <p class="font-bold">Automne 2026</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-zinc-800 rounded-2xl flex items-center justify-center border border-zinc-700">
                            <i class="fa-solid fa-user-group text-[#D9E954]"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 font-bold uppercase">Places Restantes</p>
                            <p class="font-bold text-[#D9E954]">08 places disponibles</p>
                        </div>
                    </div>
                </div>

                <div class="mt-12 pt-8 border-t border-zinc-800">
                    <p class="italic text-gray-500 text-xs">"L'art ne reproduit pas le visible ; il rend visible."</p>
                </div>
            </div>

            <div class="md:w-3/5 p-10 md:p-16 bg-white">
                <h2 class="text-2xl font-black mb-8 uppercase tracking-tight">Formulaire d'adhésion</h2>

                <form action="" method="POST" class="space-y-6">
                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase ml-1">Nom complet</label>
                        <input type="text" name="fullName" placeholder="John Doe" class="input-brutal">
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase ml-1">Email Académique</label>
                        <input type="email" name="email" placeholder="john.doe@universite.edu" class="input-brutal">
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase ml-1">Mot De Pass</label>
                        <input type="password" name="password" placeholder="Ex : 12test23" class="input-brutal">
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase ml-1">Pourquoi voulez-vous nous rejoindre ?</label>
                        <textarea rows="3" placeholder="Parlez-nous de vos motivations..." class="input-brutal resize-none"></textarea>
                    </div>

                    <div class="flex items-start gap-3 py-2">
                        <input type="checkbox" id="terms" class="mt-1 w-4 h-4 accent-black">
                        <label for="terms" class="text-xs text-gray-500 leading-tight">
                            J'accepte de respecter le règlement intérieur du club et de participer activement aux événements hebdomadaires.
                        </label>
                    </div>

                    <button type="submit" class="w-full bg-black text-white py-4 rounded-2xl font-black text-lg flex items-center justify-center group hover:bg-[#D9E954] hover:text-black transition-all duration-300">
                        CONFIRMER MON INSCRIPTION
                        <i class="fa-solid fa-arrow-right ml-3 group-hover:translate-x-2 transition"></i>
                    </button>
                </form>

            </div>
        </div>
    </main>

    <footer class="text-center py-6 text-gray-400 text-[10px] font-bold uppercase tracking-widest">
        Système de Gestion de Clubs Sécurisé • Ruang Edit 2026
    </footer>

</body>

</html>