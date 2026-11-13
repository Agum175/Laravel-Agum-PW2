<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Produk</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-800">

    <div class="max-w-6xl mx-auto px-4 py-10">
        
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4 bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-slate-900">AGUM SHUTRIANSYAH | 231091750175 </h1>
                <h1 class="text-2xl font-bold tracking-tight text-slate-900">Daftar Produk</h1>
                <p class="text-sm text-slate-500 mt-1">Kelola data inventaris produk toko Anda dengan mudah.</p>
            </div>
            <!-- Tombol Trigger Modal (Desain Baru: Warna Indigo/Blue Modern) -->
            <button onclick="toggle_modal()" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-5 py-2.5 rounded-xl shadow-md shadow-indigo-100 transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Item Baru
            </button>
        </div>

        <!-- Tabel Produk Card Container -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/75 border-b border-slate-100 text-xs font-semibold uppercase tracking-wider text-slate-500">
                            <th class="py-4 px-6">Nama Barang</th>
                            <th class="py-4 px-6">Harga</th>
                            <th class="py-4 px-6">Stok</th>
                            <th class="py-4 px-6">Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="py-4 px-6 font-medium text-slate-900"><?php echo e($p->nama_barang); ?></td>
                            <td class="py-4 px-6 text-emerald-600 font-semibold">Rp <?php echo e(number_format($p->harga, 0, ',', '.')); ?></td>
                            <td class="py-4 px-6">
                                <span class="px-2.5 py-1 text-xs font-medium bg-slate-100 text-slate-700 rounded-full">
                                    <?php echo e($p->stok); ?> pcs
                                </span>
                            </td>
                            <td class="py-4 px-6 text-slate-500 max-w-xs truncate"><?php echo e($p->deskripsi); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- Modal Tambah Item (Desain Pop-up Baru yang Elegan) -->
    <div id="modal_tambah_item" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm hidden items-center justify-center p-4 z-50 transition-all">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden transform transition-all border border-slate-100">
            
            <!-- Modal Header -->
            <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                <h2 class="text-lg font-bold text-slate-900">Tambah Item Baru</h2>
                <button onclick="toggle_modal()" class="text-slate-400 hover:text-slate-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Modal Form -->
            <form action="<?php echo e(route('products.store')); ?>" method="POST" class="p-6 space-y-4">
                <?php echo csrf_field(); ?>
                
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">Nama Barang</label>
                    <input type="text" name="nama_barang" placeholder="Contoh: Buket Bunga" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all" required>
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">Harga (Rp)</label>
                    <input type="number" name="harga" placeholder="Contoh: 50000" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all" required>
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">Stok</label>
                    <input type="number" name="stok" placeholder="Contoh: 15" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all" required>
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" placeholder="Tuliskan detail barang..." class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all" required></textarea>
                </div>

                <div class="flex justify-end gap-3 pt-2">
                    <button type="button" onclick="toggle_modal()" class="px-5 py-2.5 text-sm font-medium text-slate-600 hover:bg-slate-100 rounded-xl transition-all">
                        Batal
                    </button>
                    <button type="submit" class="px-5 py-2.5 text-sm font-medium bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl shadow-md shadow-indigo-100 transition-all">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script Toggle Modal (Struktur Tetap Sama) -->
    <script>
        function toggle_modal() {
            const modal = document.getElementById('modal_tambah_item');
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }
    </script>

</body>
</html><?php /**PATH C:\xampp\htdocs\TOKOBUNGA\laravel-project\resources\views/products/index.blade.php ENDPATH**/ ?>