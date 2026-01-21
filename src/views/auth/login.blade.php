<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | ClubHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f3f4f6; }
        .brutal-input { border: 2px solid #000; border-radius: 1rem; padding: 0.75rem 1rem; width: 100%; transition: all 0.2s; }
        .brutal-input:focus { outline: none; box-shadow: 4px 4px 0px #000; transform: translate(-2px, -2px); }
        .login-card { box-shadow: 12px 12px 0px #000; border: 3px solid #000; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">

    <a href="/" class="absolute top-8 left-8 font-bold text-sm flex items-center gap-2 hover:underline">
        <i class="fa-solid fa-arrow-left"></i> Retour
    </a>

    <div class="max-w-4xl w-full bg-white rounded-[3rem] overflow-hidden login-card flex flex-col md:flex-row">
        
        <div class="md:w-1/2 bg-black text-white p-12 flex flex-col justify-between relative overflow-hidden">
            <div class="absolute -top-10 -left-10 w-40 h-40 bg-[#D9E954] rounded-full blur-[80px] opacity-20"></div>
            
            <div class="z-10">
                <div class="text-2xl font-extrabold uppercase italic mb-8">
                    <span class="bg-[#D9E954] text-black px-2 py-1">Club</span>Hub
                </div>
                <h1 class="text-5xl font-extrabold leading-tight">Ravis de vous <br>revoir.</h1>
                <p class="text-gray-400 mt-6 font-medium">Accédez à votre espace pour gérer vos clubs et ne rater aucun événement.</p>
            </div>

            <div class="z-10 mt-12">
                <div class="flex -space-x-3 mb-4">
                    <div class="w-10 h-10 rounded-full border-2 border-black bg-gray-400"></div>
                    <div class="w-10 h-10 rounded-full border-2 border-black bg-gray-500"></div>
                    <div class="w-10 h-10 rounded-full border-2 border-black bg-[#D9E954] flex items-center justify-center text-black text-[10px] font-bold">+2k</div>
                </div>
                <p class="text-[10px] font-black uppercase tracking-widest text-gray-500">Rejoignez la communauté étudiante</p>
            </div>
        </div>

        <div class="md:w-1/2 p-12 md:p-16">
            <h2 class="text-2xl font-black uppercase mb-8">Connexion</h2>
            
            <form action="" method="POST" class="space-y-6">
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase ml-1">Email Académique</label>
                    <div class="relative">
                        <i class="fa-solid fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input type="email" name="email" placeholder="nom@etudiant.univ.com" class="brutal-input pl-12">
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="flex justify-between items-center px-1">
                        <label class="text-xs font-black uppercase">Mot de passe</label>
                        <a href="#" class="text-[10px] font-bold text-gray-400 hover:text-black">Oublié ?</a>
                    </div>
                    <div class="relative">
                        <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input type="password" name="password" placeholder="••••••••" class="brutal-input pl-12">
                    </div>
                </div>

                <div class="flex items-center gap-2 px-1">
                    <input type="checkbox" id="remember" class="w-4 h-4 accent-black">
                    <label for="remember" class="text-xs font-bold text-gray-500">Rester connecté</label>
                </div>

                <button type="submit" class="w-full bg-black text-white py-4 rounded-2xl font-black text-lg flex items-center justify-center group hover:bg-zinc-800 transition-all">
                    SE CONNECTER
                    <i class="fa-solid fa-arrow-right ml-3 group-hover:translate-x-2 transition"></i>
                </button>
            </form>

            <div class="mt-10 text-center">
                <p class="text-xs font-bold text-gray-400">Pas encore de compte ?</p>
                <a href="#" class="text-xs font-black uppercase underline hover:text-[#D9E954] transition">Créer un profil étudiant</a>
            </div>
        </div>
    </div>

</body>
</html>