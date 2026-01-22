<?php

$clubs = [];
$clubCount = 0;
$totalStudents = 0;

try {
 
    if (isset($data['clubs'])) {
        $clubs = $data['clubs'];
        $clubCount = count($clubs);
    }
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | ClubHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f3f4f6; }
        .sidebar-item:hover { transform: translateX(5px); }
        .admin-card { border: 2px solid #000; border-radius: 2rem; box-shadow: 4px 4px 0px #000; transition: all 0.2s; }
        .admin-card:hover { transform: translate(-2px, -2px); box-shadow: 7px 7px 0px #000; }
    </style>
</head>
<body class="flex min-h-screen">


    <aside class="w-64 bg-black text-white p-8 flex flex-col hidden lg:flex">
        <div class="text-xl font-extrabold uppercase italic mb-12">
            <span class="bg-[#D9E954] text-black px-2 py-1">Admin</span>Hub
        </div>
        
        <nav class="flex-grow space-y-4">
            <a href="/" class="flex items-center gap-3 text-[#D9E954] font-bold sidebar-item transition">
                <i class="fa-solid fa-chart-pie"></i> Dashboard
            </a>
            <a href="/admin/clubs" class="flex items-center gap-3 text-gray-400 hover:text-white sidebar-item transition">
                <i class="fa-solid fa-layer-group"></i> Gérer les Clubs
            </a>
            <a href="/admin/events" class="flex items-center gap-3 text-gray-400 hover:text-white sidebar-item transition">
                <i class="fa-solid fa-calendar-days"></i> Événements
            </a>
            <a href="/admin/students" class="flex items-center gap-3 text-gray-400 hover:text-white sidebar-item transition">
                <i class="fa-solid fa-user-graduate"></i> Étudiants
            </a>
        </nav>

        <div class="pt-8 border-t border-zinc-800">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-[#D9E954] text-black flex items-center justify-center font-bold">A</div>
                <div>
                    <p class="text-xs font-bold">Admin Principal</p>
                    <p class="text-[10px] text-gray-500 cursor-pointer hover:text-white"><a href="/logout">Déconnexion</a></p>
                </div>
            </div>
        </div>
    </aside>

    <main class="flex-grow p-8 md:p-12 overflow-y-auto">
        <header class="flex justify-between items-end mb-12">
            <div>
                <h1 class="text-4xl font-extrabold tracking-tight">Panneau de Contrôle</h1>
                <p class="text-gray-500 font-medium italic mt-1">Gérez vos clubs et vos étudiants avec précision.</p>
            </div>
            <button onclick="openAddClubModal()" class="bg-black text-white px-6 py-3 rounded-full font-bold flex items-center gap-2 hover:bg-zinc-800 shadow-lg">
                <i class="fa-solid fa-plus text-xs"></i> Nouveau Club
            </button>
        </header>

       
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <div class="admin-card bg-white p-6">
                <p class="text-xs font-black text-gray-400 uppercase">Clubs Actifs</p>
                <p class="text-4xl font-extrabold"><?php echo $clubCount; ?></p>
            </div>
            <div class="admin-card bg-white p-6">
                <p class="text-xs font-black text-gray-400 uppercase">Total Étudiants</p>
                <p class="text-4xl font-extrabold"><?php echo $totalStudents; ?></p>
            </div>
            <div class="admin-card bg-[#D9E954] p-6">
                <p class="text-xs font-black text-black uppercase">Événements ce mois</p>
                <p class="text-4xl font-extrabold text-black">12</p>
            </div>
        </div>

     
        <?php if (isset($error)): ?>
            <div class="bg-red-100 border-2 border-red-500 text-red-700 px-4 py-3 rounded-lg mb-6">
                <p class="font-bold">Erreur:</p>
                <p><?php echo htmlspecialchars($error); ?></p>
            </div>
        <?php endif; ?>

       
        <section class="bg-white border-2 border-black rounded-[2.5rem] p-8 mb-12 shadow-sm">
            <h2 class="text-2xl font-black mb-6 uppercase flex items-center gap-3">
                <i class="fa-solid fa-folder-tree"></i> Vos Clubs
            </h2>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b-2 border-gray-100">
                            <th class="py-4 text-xs font-black uppercase text-gray-400 px-4">Nom du Club</th>
                            <th class="py-4 text-xs font-black uppercase text-gray-400 px-4">Président</th>
                            <th class="py-4 text-xs font-black uppercase text-gray-400 px-4">Description</th>
                            <th class="py-4 text-xs font-black uppercase text-gray-400 px-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($clubs)): ?>
                            <tr>
                                <td colspan="4" class="py-8 px-4 text-center text-gray-500">
                                    <p class="font-medium">Aucun club trouvé</p>
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($clubs as $club): ?>
                                <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                                    <td class="py-4 px-4">
                                        <p class="font-bold"><?php echo htmlspecialchars($club['name'] ?? 'N/A'); ?></p>
                                        <p class="text-[10px] text-gray-500 italic"><?php echo htmlspecialchars($club['description'] ?? ''); ?></p>
                                    </td>
                                    <td class="py-4 px-4 font-medium text-sm">
                                        <?php echo htmlspecialchars($club['president_id'] ?? 'N/A'); ?>
                                    </td>
                                    <td class="py-4 px-4">
                                        <span class="bg-zinc-100 text-black px-3 py-1 rounded-full text-[10px] font-black">
                                            ID: <?php echo $club['id']; ?>
                                        </span>
                                    </td>
                                    <td class="py-4 px-4 text-right space-x-2">
                                        <button onclick="editClub(<?php echo $club['id']; ?>)" class="p-2 hover:bg-blue-50 text-blue-600 rounded-lg" title="Modifier">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button onclick="deleteClub(<?php echo $club['id']; ?>)" class="p-2 hover:bg-red-50 text-red-600 rounded-lg" title="Supprimer">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
        
            <div class="bg-black text-white rounded-[2.5rem] p-8">
                <div class="flex justify-between items-start mb-6">
                    <h3 class="text-xl font-black uppercase">Derniers Événements</h3>
                    <i class="fa-solid fa-arrow-up-right-from-square text-[#D9E954]"></i>
                </div>
                <div class="space-y-4">
                    <div class="flex justify-between items-center border-b border-zinc-800 pb-3">
                        <p class="text-sm font-bold">Événement 1</p>
                        <p class="text-[10px] text-gray-500 font-black">À venir</p>
                    </div>
                    <div class="flex justify-between items-center border-b border-zinc-800 pb-3">
                        <p class="text-sm font-bold">Événement 2</p>
                        <p class="text-[10px] text-gray-500 font-black">À venir</p>
                    </div>
                </div>
            </div>

           
            <div class="bg-white border-2 border-black rounded-[2.5rem] p-8">
                <h3 class="text-xl font-black uppercase mb-6 text-black">Gestion Rapide</h3>
                <button onclick="openAddClubModal()" class="w-full text-center text-xs font-black uppercase bg-[#D9E954] text-black py-3 rounded-xl hover:bg-yellow-400 transition mb-3">
                    + Ajouter un Club
                </button>
                <button class="w-full text-center text-xs font-black uppercase bg-black text-white py-3 rounded-xl hover:bg-zinc-800 transition">
                    Voir Tous les Clubs
                </button>
            </div>
        </div>
    </main>
    

   
    <div id="clubModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-[2rem] p-8 max-w-md w-full mx-4 border-2 border-black">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-black uppercase">Nouveau Club</h3>
                <button onclick="closeModal()" class="text-2xl font-black text-gray-400 hover:text-black">&times;</button>
            </div>
            
            <form id="clubForm" onsubmit="handleFormSubmit(event)">
                <input type="hidden" id="clubId" name="id">
                <div class="mb-4">
                    <label class="block text-xs font-black uppercase text-gray-600 mb-2">Nom du Club</label>
                    <input type="text" id="clubName" name="name" required class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-black outline-none" placeholder="Ex: Tech Club">
                </div>
                
                <div class="mb-4">
                    <label class="block text-xs font-black uppercase text-gray-600 mb-2">Description</label>
                    <textarea id="clubDescription" name="description" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-black outline-none" rows="3" placeholder="Description du club"></textarea>
                </div>
                
                <div class="mb-6">
                    <label class="block text-xs font-black uppercase text-gray-600 mb-2">Président (ID)</label>
                    <input type="number" id="clubPresident" name="president_id" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-black outline-none" placeholder="ID du président">
                </div>
                
                <div class="flex gap-3">
                    <button type="button" onclick="closeModal()" class="flex-1 py-3 px-4 border-2 border-black rounded-lg font-black uppercase hover:bg-gray-50">Annuler</button>
                    <button type="submit" class="flex-1 py-3 px-4 bg-[#D9E954] border-2 border-black rounded-lg font-black uppercase hover:bg-yellow-400">Ajouter</button>
                </div>
            </form>
        </div>
    </div>

    <script>
      function openAddClubModal() {
    document.getElementById('clubModal').classList.remove('hidden');
    document.getElementById('clubForm').reset();
    document.getElementById('clubId').value = '';
}

function closeModal() {
    document.getElementById('clubModal').classList.add('hidden');
}

function handleFormSubmit(event) {
    event.preventDefault();

    const form = document.getElementById('clubForm');
    const formData = new FormData(form);
    const id = document.getElementById('clubId').value;

    const url = id ? '/club/edit' : '/club/create';

    fetch(url, {
        method: 'POST',
        body: new URLSearchParams(formData)
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            closeModal();
            location.reload();
        } else {
            alert('Erreur: ' + data.message);
        }
    })
    .catch(err => alert('Erreur: ' + err.message));
}

function editClub(id) {
    fetch(`/club/current?id=${id}`)
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                document.getElementById('clubId').value = data.data.id;
                document.getElementById('clubName').value = data.data.name;
                document.getElementById('clubDescription').value = data.data.description || '';
                document.getElementById('clubPresident').value = data.data.president_id || '';
                openAddClubModal();
            } else {
                alert(data.message);
            }
        });
}

function deleteClub(id) {
    if (!confirm('Êtes-vous sûr de vouloir supprimer ce club ?')) return;

    fetch('/club/delete', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'id=' + id
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            alert(data.message);  
            location.reload();
        } else {
            alert(data.message);
        }
    });
}

document.getElementById('clubModal').addEventListener('click', function (e) {
    if (e.target === this)
    {
        closeModal();
    }
});

    </script>
</body>




</html>





