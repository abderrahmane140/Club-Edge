<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel | Profil Étudiant</title>

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

<!-- SIDEBAR -->
<aside class="w-64 bg-black text-white p-8 flex flex-col hidden lg:flex">
    <div class="text-xl font-extrabold uppercase italic mb-12">
        <span class="bg-[#D9E954] text-black px-2 py-1">Admin</span>Hub
    </div>

    <nav class="flex-grow space-y-4">
        <a href="/admin/dashboard" class="flex items-center gap-3 text-gray-400 hover:text-white sidebar-item transition">
            <i class="fa-solid fa-chart-pie"></i> Dashboard
        </a>
        <a href="/admin/clubs" class="flex items-center gap-3 text-gray-400 hover:text-white sidebar-item transition">
            <i class="fa-solid fa-layer-group"></i> Gérer les Clubs
        </a>
        <a href="/admin/events" class="flex items-center gap-3 text-gray-400 hover:text-white sidebar-item transition">
            <i class="fa-solid fa-calendar-days"></i> Événements
        </a>
        <a href="/admin/etudiants" class="flex items-center gap-3 text-[#D9E954] font-bold sidebar-item transition">
            <i class="fa-solid fa-user-graduate"></i> Étudiants
        </a>
    </nav>

    <div class="pt-8 border-t border-zinc-800">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-[#D9E954] text-black flex items-center justify-center font-bold">A</div>
            <div class="flex-1">
                <p class="text-xs font-bold">Admin Principal</p>
                <form action="/logout" method="POST" class="mt-2">
                    <button
                            type="submit"
                            class="w-full bg-white text-black px-4 py-2 rounded-full font-black text-[11px] hover:bg-zinc-200 transition border-2 border-black"
                    >
                        <i class="fa-solid fa-right-from-bracket mr-2"></i> Déconnexion
                    </button>
                </form>
            </div>
        </div>
    </div>
</aside>

<!-- MAIN -->
<main class="flex-grow p-8 md:p-12 overflow-y-auto">

    <!-- TOP BAR -->
    <header class="flex flex-col md:flex-row md:justify-between md:items-end gap-6 mb-12">
        <div>
            <div class="flex items-center gap-3 mb-2">
                <a href="/ClubEdge/admin" class="text-sm font-black text-gray-500 hover:text-black transition">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Retour
                </a>
            </div>
            <h1 class="text-4xl font-extrabold tracking-tight">Profil Étudiant</h1>
            <p class="text-gray-500 font-medium italic mt-1">
                Visualisez et modifiez (nom / rôle) uniquement.
            </p>
        </div>

        <!-- Hint -->
        <div class="bg-white border-2 border-black rounded-full px-5 py-3 font-bold text-xs text-gray-600 inline-flex items-center gap-2">
            <i class="fa-solid fa-lock"></i>
            <span id="hintText">Click Edit to unlock fields.</span>
        </div>
    </header>

    <!-- PROFILE CARD -->
    <section class="bg-white border-2 border-black rounded-[2.5rem] p-6 md:p-8 shadow-sm">
        <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-6 mb-8">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-full bg-black text-[#D9E954] flex items-center justify-center font-extrabold text-xl">
                    S
                </div>
                <div>
                    <p class="text-xs font-black text-gray-400 uppercase">Étudiant</p>
                    <p class="text-2xl font-extrabold" id="studentTitle">{{ $users->getName() }}</p>
                    <p class="text-[11px] text-gray-500 font-semibold italic">
                        ID: <span id="studentIdLabel">#{{ $users->getId() }}</span>
                    </p>
                </div>
            </div>

            <!-- Edit/Save button -->
            <button
                    id="editBtn"
                    type="button"
                    form="profileForm"
                    class="admin-card bg-white px-6 py-3 font-black text-xs uppercase inline-flex items-center gap-2"
                    aria-pressed="false"
            >
                <i class="fa-solid fa-pen-to-square"></i>
                <span id="editBtnLabel">Edit</span>
            </button>
        </div>

        <!-- FORM (MVC) -->
        <form action="/admin/save" method="POST" id="profileForm">
            <input type="hidden" name="id" value="{{ $users->getId() }}" id="studentIdHidden"/>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- ID -->
                <div class="admin-card bg-white p-6">
                    <label class="block text-xs font-black uppercase text-gray-400 mb-2">ID</label>
                    <input
                            value="{{ $users->getId() }}"
                            class="w-full bg-gray-50 border-2 border-black rounded-2xl px-4 py-3 font-extrabold outline-none"
                            readonly
                    />
                </div>

                <!-- NAME -->
                <div class="admin-card bg-white p-6">
                    <label class="block text-xs font-black uppercase text-gray-400 mb-2">Name</label>
                    <input
                            name="name"
                            value="{{ $users->getName() }}"
                            class="profile-input w-full bg-white border-2 border-black rounded-2xl px-4 py-3 font-bold outline-none focus:ring-2 focus:ring-black"
                            readonly
                            data-can-edit="true"
                            id="nameInput"
                    />
                </div>

                <!-- EMAIL -->
                <div class="admin-card bg-white p-6">
                    <label class="block text-xs font-black uppercase text-gray-400 mb-2">Email</label>
                    <input
                            name="email"
                            value="{{ $users->getEmail() }}"
                            class="w-full bg-gray-50 border-2 border-black rounded-2xl px-4 py-3 font-bold outline-none"
                            readonly
                            data-always-locked="true"
                    />
                    <p class="text-[10px] text-gray-400 font-semibold italic mt-2">
                        Email is locked.
                    </p>
                </div>

                <!-- ROLE -->
                <div class="admin-card bg-white p-6 md:col-span-2">
                    <label class="block text-xs font-black uppercase text-gray-400 mb-2">Role</label>
                    <select
                            name="role"
                            class="profile-input w-full bg-white border-2 border-black rounded-2xl px-4 py-3 font-bold outline-none focus:ring-2 focus:ring-black"
                            disabled
                            data-can-edit="true"
                            id="roleSelect"
                    >
                        <option value="{{ $users->getRole() }}" selected>
                            {{ $users->getRole() }}
                        </option>
                    </select>
                    <p class="text-[10px] text-gray-400 font-semibold italic mt-2">
                        Role is editable (when unlocked).
                    </p>
                </div>
            </div>
        </form>

        <div class="mt-8 text-xs text-gray-500 font-semibold italic">
            Tip: Click <span class="font-black text-black">Edit</span>, change Name/Role, then click <span class="font-black text-black">Save</span>.
        </div>
    </section>

</main>

<script>
    const editBtn = document.getElementById("editBtn");
    const editBtnLabel = document.getElementById("editBtnLabel");
    const hintText = document.getElementById("hintText");
    const form = document.getElementById("profileForm");

    const editableFields = Array.from(document.querySelectorAll('[data-can-edit="true"]'));
    let isEditing = false;

    function setEditing(state) {
        isEditing = state;
        editBtn.setAttribute("aria-pressed", String(isEditing));

        editableFields.forEach((el) => {
            const tag = el.tagName.toLowerCase();
            if (tag === "select") el.disabled = !isEditing;
            else el.readOnly = !isEditing;
        });

        if (isEditing) {
            editBtnLabel.textContent = "Save";
            hintText.textContent = "Make changes, then click Save.";
            setTimeout(() => document.getElementById("nameInput")?.focus(), 0);
        } else {
            editBtnLabel.textContent = "Edit";
            hintText.textContent = "Click Edit to unlock fields.";
        }
    }

    editBtn.addEventListener("click", (e) => {
        e.preventDefault();

        if (!isEditing) {
            setEditing(true);
            return;
        }

        // Ensure select is enabled right now so it submits
        editableFields.forEach((el) => {
            if (el.tagName.toLowerCase() === "select") el.disabled = false;
        });

        if (form.requestSubmit) form.requestSubmit();
        else form.submit();
    });

    // Live update header name while typing
    const nameInput = document.getElementById("nameInput");
    const studentTitle = document.getElementById("studentTitle");
    nameInput?.addEventListener("input", (e) => {
        if (studentTitle) studentTitle.textContent = e.target.value || "—";
    });

    setEditing(false);
</script>

</body>
</html>
