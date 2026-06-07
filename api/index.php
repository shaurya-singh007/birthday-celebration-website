<?php
if (isset($_COOKIE['auth_status']) && $_COOKIE['auth_status'] === 'authenticated') {
    header('Location: home.php');
    exit();
}
?>
<!DOCTYPE html>
<html class="scroll-smooth" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Enter | Secret Birthday Portal</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&amp;family=Be+Vietnam+Pro:wght@400;500;600&amp;family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet"/>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#ba002c",
                        "primary-container": "#e9003a",
                        accent: "#ff0055"
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-[#0f090c] text-white overflow-hidden min-h-screen flex items-center justify-center relative">
    
    <!-- Heart Particles Container -->
    <div id="heart-container"></div>
    
    <!-- Custom Cursor elements -->
    <div class="custom-cursor"></div>
    <div class="custom-cursor-follower"></div>

    <!-- Parallax Glow Shapes -->
    <div class="parallax-bg">
        <div class="parallax-shape w-80 h-80 bg-[#ffb3b3] top-10 left-10 opacity-10"></div>
        <div class="parallax-shape w-96 h-96 bg-[#78555e] bottom-10 right-10 opacity-15" style="animation-delay: 2s"></div>
    </div>

    <!-- Main Content Container -->
    <div class="relative z-10 w-full max-w-md px-6 text-center reveal active">
        <!-- Heart lock icon -->
        <div class="mb-6 flex justify-center">
            <div class="w-20 h-20 bg-white/5 border border-white/10 rounded-full flex items-center justify-center glass-card shadow-lg animate-pulse">
                <span class="material-symbols-outlined text-4xl text-accent" style="font-variation-settings: 'FILL' 1;">lock_person</span>
            </div>
        </div>

        <!-- Heading -->
        <h1 class="font-headline-lg text-4xl text-white font-semibold mb-2 text-glow">The Secret Portal</h1>
        <p class="text-pink-100/60 font-body-md text-sm mb-8">For Ankita's Eyes Only • Enter the secret key to unlock your birthday surprise.</p>

        <!-- Login Glass Card with 3D Tilt -->
        <div class="glass-card p-8 tilt-card shadow-2xl relative overflow-hidden">
            <div class="tilt-inner">
                <form action="authenticate.php" method="POST" class="space-y-6">
                    <div class="text-left">
                        <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-pink-200/70 mb-2 pl-3">Secret Key</label>
                        <div class="relative flex items-center">
                            <span class="material-symbols-outlined absolute left-4 text-pink-200/50">key</span>
                            <input type="password" name="password" id="password" required 
                                   class="w-full bg-white/5 border border-white/10 rounded-full py-4 pl-12 pr-6 text-white placeholder-white/20 focus:outline-none focus:border-accent focus:ring-1 focus:ring-accent/30 transition-all font-body-md" 
                                   placeholder="Enter Ankita's secret password..."/>
                        </div>
                    </div>

                    <!-- Error Alert -->
                    <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
                        <div class="bg-red-950/40 border border-red-500/20 text-red-200 text-xs py-3 px-4 rounded-xl flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm text-red-400">warning</span>
                            <span>Oops! That is not the secret key. Hint: It's a nickname.</span>
                        </div>
                    <?php endif; ?>

                    <button type="submit" 
                            class="w-full bg-primary hover:bg-primary-container text-white py-4 rounded-full font-semibold shadow-lg hover:shadow-primary/30 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-2">
                        <span>Unlock Surprise</span>
                        <span class="material-symbols-outlined text-lg">arrow_forward</span>
                    </button>
                </form>
            </div>
            
            <!-- Tiny footer inside card -->
            <div class="mt-8 pt-6 border-t border-white/5 text-[10px] text-white/30 tracking-widest uppercase">
                Design System v1.0 • Heartfelt Experience
            </div>
        </div>
    </div>

    <!-- Global Javascript -->
    <script src="js/main.js"></script>
</body>
</html>
