<?php
if (!isset($_COOKIE['auth_status']) || $_COOKIE['auth_status'] !== 'authenticated') {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html class="scroll-smooth" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Ankita's Birthday Surprise | With Love</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&amp;family=Be+Vietnam+Pro:wght@400;500;600&amp;family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
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
<body class="bg-[#0f090c] text-white font-body-md overflow-x-hidden">

    <!-- Floating Background Hearts -->
    <div id="heart-container"></div>
    
    <!-- Custom Cursor elements -->
    <div class="custom-cursor"></div>
    <div class="custom-cursor-follower"></div>

    <!-- Parallax Shapes -->
    <div class="parallax-bg">
        <div class="parallax-shape w-96 h-96 bg-[#ffb3b3] top-20 left-10 opacity-[0.08]"></div>
        <div class="parallax-shape w-[500px] h-[500px] bg-[#78555e] middle-20 right-10 opacity-[0.1]"></div>
        <div class="parallax-shape w-80 h-80 bg-accent bottom-20 left-1/3 opacity-[0.05]"></div>
    </div>

    <!-- Top Navigation Bar -->
    <header class="fixed top-0 w-full z-50 bg-[#0f090c]/80 backdrop-blur-md border-b border-white/10 shadow-lg">
        <nav class="flex justify-between items-center px-6 py-4 max-w-7xl mx-auto">
            <div class="flex items-center gap-2 scale-95 active:scale-90 transition-transform cursor-pointer" onclick="window.scrollTo({top: 0, behavior: 'smooth'})">
                <span class="material-symbols-outlined text-accent" style="font-variation-settings: 'FILL' 1;">favorite</span>
                <span class="font-headline-md text-xl text-accent italic font-semibold">With Love</span>
            </div>
            <div class="hidden md:flex gap-8 items-center">
                <a class="font-semibold text-xs tracking-wider uppercase text-pink-200/70 hover:text-accent transition-colors duration-300" href="#story">Our Story</a>
                <a class="font-semibold text-xs tracking-wider uppercase text-pink-200/70 hover:text-accent transition-colors duration-300" href="#doom-scroll">Doom Scroll</a>
                <a class="font-semibold text-xs tracking-wider uppercase text-pink-200/70 hover:text-accent transition-colors duration-300" href="#gallery">Memories</a>
                <a class="font-semibold text-xs tracking-wider uppercase text-pink-200/70 hover:text-accent transition-colors duration-300" href="#letters">Love Letters</a>
                <a class="font-semibold text-xs tracking-wider uppercase text-pink-200/70 hover:text-accent transition-colors duration-300" href="#activities">Surprise Jar</a>
                <a class="font-semibold text-xs tracking-wider uppercase text-pink-200/70 hover:text-accent transition-colors duration-300" href="#quiz">Memory Quiz</a>
                <a class="font-semibold text-xs tracking-wider uppercase text-pink-200/70 hover:text-accent transition-colors duration-300" href="#wishes">Wishing Wall</a>
            </div>
            <div>
                <a href="logout.php" class="bg-white/10 hover:bg-white/20 text-white border border-white/20 px-5 py-2.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-all inline-flex items-center gap-2">
                    <span>Logout</span>
                    <span class="material-symbols-outlined text-sm">logout</span>
                </a>
            </div>
        </nav>
    </header>

    <main class="pt-20">
        <!-- Hero Section -->
        <section class="min-h-[90vh] flex flex-col items-center justify-center px-6 relative overflow-hidden text-center">
            <div class="relative z-10 max-w-4xl mx-auto flex flex-col items-center">
                <p class="font-semibold text-xs uppercase tracking-widest text-accent mb-4 reveal active">Today is a Really Special Day • 29/05/26</p>
                <h1 class="font-display-lg text-4xl md:text-7xl text-accent mb-6 font-bold leading-tight reveal active" style="transition-delay: 0.2s">
                    Happy Birthday, <br/><span class="italic font-normal text-white text-glow">Ankita Sharma (Cutiee)</span>
                </h1>
                
                <!-- Couple Portrait inside Heart Shape -->
                <div class="my-8 reveal active scale-95 hover:scale-100 transition-all duration-700" style="transition-delay: 0.4s">
                    <div class="w-72 h-72 md:w-80 md:h-80 overflow-hidden relative border border-white/20 shadow-2xl glass-card flex items-center justify-center p-3" style="clip-path: path('M12 4.419C12.441 3.23 13.568 2 15.688 2 18.619 2 21 4.381 21 7.313c0 4.887-5.32 8.784-9 12.687-3.68-3.903-9-7.8-9-12.687C3 4.381 5.381 2 8.313 2 10.432 2 11.559 3.23 12 4.419z'); transform-origin: center; transform: scale(13);">
                        <img src="assets/images/couple_heart.jpg" alt="Ankita & You" class="w-full h-full object-cover"/>
                    </div>
                </div>

                <div class="flex justify-center gap-4 reveal active" style="transition-delay: 0.6s">
                    <a href="#gallery" class="bg-primary hover:bg-primary-container text-white px-8 py-4 rounded-full font-semibold shadow-lg hover:shadow-primary/30 hover:scale-105 active:scale-95 transition-all inline-flex items-center gap-2">
                        <span>Discover Our Journey</span>
                        <span class="material-symbols-outlined">expand_circle_down</span>
                    </a>
                </div>
            </div>
            
            <!-- Bouncing arrow down indicator -->
            <div class="absolute bottom-6 left-1/2 -translate-x-1/2 animate-bounce opacity-50">
                <span class="material-symbols-outlined text-accent text-3xl">keyboard_double_arrow_down</span>
            </div>
        </section>

        <!-- Our Story Section -->
        <section class="py-24 px-6 max-w-7xl mx-auto" id="story">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="reveal">
                    <span class="text-accent uppercase tracking-widest text-xs font-semibold mb-2 block">Our Beginning</span>
                    <h2 class="font-headline-lg text-3xl md:text-5xl text-white font-bold mb-6">How You Changed My World</h2>
                    <p class="text-pink-100/70 mb-6 leading-relaxed">
                        From the moment we met, my life took on a completely new color. You walked in with your beautiful smile, and suddenly everything else became background noise. 
                    </p>
                    <p class="text-pink-100/70 mb-6 leading-relaxed">
                        Today, on May 29, 2026, we celebrate the most amazing person to walk this earth. You are my partner, my best friend, and my favorite adventure. Happy Birthday, my beautiful Cutiee!
                    </p>
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-accent fill-1" style="font-variation-settings: 'FILL' 1;">favorite</span>
                        <span class="italic font-serif text-white">Forever & Always yours</span>
                    </div>
                </div>
                <div class="reveal relative">
                    <!-- Frame Illustration with Anime Picture -->
                    <div class="glass-card p-4 tilt-card shadow-2xl">
                        <div class="aspect-video rounded-xl overflow-hidden relative shadow-lg">
                            <img src="assets/images/lets_go_anime.jpg" alt="Let's Go Adventure" class="w-full h-full object-cover"/>
                            <div class="absolute bottom-4 left-4 bg-[#0f090c]/70 backdrop-blur-md px-3 py-1 rounded-full text-xs border border-white/10 text-glow">
                                🚀 Let's Gooo!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- DOOM SCROLL - Full-Screen Parallax Photo Gallery -->
        <section id="doom-scroll" class="relative">
            <div class="doom-scroll-intro h-screen flex flex-col items-center justify-center text-center px-6 sticky top-0 z-10">
                <span class="text-accent uppercase tracking-[0.3em] text-xs font-semibold mb-4 reveal">Keep Scrolling</span>
                <h2 class="font-headline-lg text-4xl md:text-7xl text-white font-bold text-glow reveal" style="transition-delay:0.2s">Our Beautiful Moments</h2>
                <p class="text-pink-100/50 mt-4 max-w-md reveal" style="transition-delay:0.4s">Scroll through our memories — each photo tells a story of us</p>
                <div class="mt-8 animate-bounce opacity-40">
                    <span class="material-symbols-outlined text-accent text-4xl">keyboard_double_arrow_down</span>
                </div>
            </div>
            <div class="doom-panels">
                <div class="doom-panel" data-caption="Beautiful in red ❤️" data-sub="My gorgeous Cutiee"><div class="doom-panel-img"><img src="assets/images/selfie_red.jpg" alt="Selfie in red"/></div></div>
                <div class="doom-panel" data-caption="Festival nights ✨" data-sub="You light up every place"><div class="doom-panel-img"><img src="assets/images/festival_night.jpg" alt="Festival night"/></div></div>
                <div class="doom-panel" data-caption="Park vibes 🌳" data-sub="Nature looks prettier with you"><div class="doom-panel-img"><img src="assets/images/park_texas.jpg" alt="Park Texas"/></div></div>
                <div class="doom-panel" data-caption="Our forever moment 💕" data-sub="Together is my favorite place"><div class="doom-panel-img"><img src="assets/images/couple_heart.jpg" alt="Couple heart"/></div></div>
                <div class="doom-panel" data-caption="Peaceful walks 🌅" data-sub="Lake side memories with you"><div class="doom-panel-img"><img src="assets/images/lake_bench.jpg" alt="Lake bench"/></div></div>
                <div class="doom-panel" data-caption="Connected by hearts 💗" data-sub="Distance means nothing"><div class="doom-panel-img"><img src="assets/images/heart_hands.jpg" alt="Heart hands"/></div></div>
                <div class="doom-panel" data-caption="The cutest smile 😻" data-sub="My kitty blush queen"><div class="doom-panel-img"><img src="assets/images/kitty_smile.jpg" alt="Kitty smile"/></div></div>
                <div class="doom-panel" data-caption="Let's Gooo! 🚀" data-sub="Our adventure begins"><div class="doom-panel-img"><img src="assets/images/lets_go_anime.jpg" alt="Lets go anime"/></div></div>
                <div class="doom-panel" data-caption="Museum date 🎨" data-sub="Art and you — both masterpieces"><div class="doom-panel-img"><img src="assets/images/couple_museum.jpg" alt="Couple museum"/></div></div>
                <div class="doom-panel" data-caption="Video call love 📱" data-sub="Seeing your face makes my day"><div class="doom-panel-img"><img src="assets/images/video_call_red.jpg" alt="Video call"/></div></div>
                <div class="doom-panel" data-caption="Texas vibes 🤠" data-sub="Coolest girl in town"><div class="doom-panel-img"><img src="assets/images/texas_stand.jpg" alt="Texas stand"/></div></div>
                <div class="doom-panel" data-caption="Pink bows 🎀" data-sub="Pretty in every frame"><div class="doom-panel-img"><img src="assets/images/pink_bows.jpg" alt="Pink bows"/></div></div>
            </div>
        </section>

        <!-- Memories / Gallery Section -->
        <section class="py-24 px-6 bg-white/5 border-y border-white/5" id="gallery">
            <div class="max-w-7xl mx-auto">
                <div class="mb-16 text-center reveal">
                    <h2 class="font-headline-lg text-3xl md:text-5xl text-glow text-white font-bold mb-4">A Year of Magic</h2>
                    <p class="text-pink-100/60 max-w-2xl mx-auto">Looking back at all the beautiful moments we've shared. Every single photograph holds a piece of my heart.</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Photo 1: Lake walk -->
                    <div class="reveal group">
                        <div class="glass-card p-5 tilt-card h-full flex flex-col">
                            <div class="aspect-[4/5] rounded-xl overflow-hidden mb-5 shadow-lg relative">
                                <img src="assets/images/lake_bench.jpg" alt="Special memory photo" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"/>
                                <div class="absolute top-4 right-4 bg-[#0f090c]/70 backdrop-blur-md p-2 rounded-full border border-white/10">
                                    <span class="material-symbols-outlined text-accent fill-1" style="font-variation-settings: 'FILL' 1;">favorite</span>
                                </div>
                            </div>
                            <div class="mt-auto pl-2">
                                <p class="font-serif text-lg text-accent italic mb-1">"Peaceful lake side walks"</p>
                                <p class="text-xs text-pink-200/50">Memories of us • May 2026</p>
                            </div>
                        </div>
                    </div>

                    <!-- Photo 2: Heart hands -->
                    <div class="reveal group" style="transition-delay: 0.2s">
                        <div class="glass-card p-5 tilt-card h-full flex flex-col">
                            <div class="aspect-[4/5] rounded-xl overflow-hidden mb-5 shadow-lg relative">
                                <img src="assets/images/heart_hands.jpg" alt="Heart Hands video call" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"/>
                                <div class="absolute top-4 right-4 bg-[#0f090c]/70 backdrop-blur-md p-2 rounded-full border border-white/10">
                                    <span class="material-symbols-outlined text-accent fill-1" style="font-variation-settings: 'FILL' 1;">favorite</span>
                                </div>
                            </div>
                            <div class="mt-auto pl-2">
                                <p class="font-serif text-lg text-accent italic mb-1">"Connected by hearts"</p>
                                <p class="text-xs text-pink-200/50">Our long-distance moments</p>
                            </div>
                        </div>
                    </div>

                    <!-- Photo 3: Kitty smile -->
                    <div class="reveal group" style="transition-delay: 0.4s">
                        <div class="glass-card p-5 tilt-card h-full flex flex-col">
                            <div class="aspect-[4/5] rounded-xl overflow-hidden mb-5 shadow-lg relative">
                                <img src="assets/images/kitty_smile.jpg" alt="Kitty smile selfie" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"/>
                                <div class="absolute top-4 right-4 bg-[#0f090c]/70 backdrop-blur-md p-2 rounded-full border border-white/10">
                                    <span class="material-symbols-outlined text-accent fill-1" style="font-variation-settings: 'FILL' 1;">favorite</span>
                                </div>
                            </div>
                            <div class="mt-auto pl-2">
                                <p class="font-serif text-lg text-accent italic mb-1">"The cutest smile in town"</p>
                                <p class="text-xs text-pink-200/50">Kitty blush selfie • Ankita</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Infinite Horizontal Photo Carousel -->
        <section class="py-24 overflow-hidden" id="photo-reel">
            <div class="text-center mb-12 px-6 reveal">
                <span class="text-accent uppercase tracking-widest text-xs font-semibold mb-2 block">Our Moments Together</span>
                <h2 class="font-headline-lg text-3xl md:text-5xl text-glow text-white font-bold">Photo Reel</h2>
            </div>
            <div class="carousel-track-wrapper">
                <div class="carousel-track">
                    <img src="assets/images/selfie_red.jpg" alt="Selfie red"/>
                    <img src="assets/images/couple_heart.jpg" alt="Couple heart"/>
                    <img src="assets/images/lake_bench.jpg" alt="Lake bench"/>
                    <img src="assets/images/festival_night.jpg" alt="Festival night"/>
                    <img src="assets/images/heart_hands.jpg" alt="Heart hands"/>
                    <img src="assets/images/kitty_smile.jpg" alt="Kitty smile"/>
                    <img src="assets/images/park_texas.jpg" alt="Park Texas"/>
                    <img src="assets/images/lets_go_anime.jpg" alt="Let's go anime"/>
                    <img src="assets/images/couple_museum.jpg" alt="Couple museum"/>
                    <img src="assets/images/video_call_red.jpg" alt="Video call"/>
                    <img src="assets/images/texas_stand.jpg" alt="Texas stand"/>
                    <img src="assets/images/pink_bows.jpg" alt="Pink bows selfie"/>
                    <img src="assets/images/selfie_red.jpg" alt="Selfie red"/>
                    <img src="assets/images/couple_heart.jpg" alt="Couple heart"/>
                    <img src="assets/images/lake_bench.jpg" alt="Lake bench"/>
                    <img src="assets/images/festival_night.jpg" alt="Festival night"/>
                    <img src="assets/images/heart_hands.jpg" alt="Heart hands"/>
                    <img src="assets/images/kitty_smile.jpg" alt="Kitty smile"/>
                    <img src="assets/images/park_texas.jpg" alt="Park Texas"/>
                    <img src="assets/images/lets_go_anime.jpg" alt="Let's go anime"/>
                    <img src="assets/images/couple_museum.jpg" alt="Couple museum"/>
                    <img src="assets/images/video_call_red.jpg" alt="Video call"/>
                    <img src="assets/images/texas_stand.jpg" alt="Texas stand"/>
                    <img src="assets/images/pink_bows.jpg" alt="Pink bows selfie"/>
                </div>
            </div>
        </section>

        <!-- Scratch-to-Reveal Love Letters Section -->
        <section class="py-24 px-6" id="letters">
            <div class="max-w-5xl mx-auto">
                <div class="text-center mb-16 reveal">
                    <span class="material-symbols-outlined text-6xl text-accent mb-4" style="font-variation-settings: 'FILL' 1;">mail</span>
                    <h2 class="font-headline-lg text-3xl md:text-5xl text-glow text-white font-bold mb-4">Love Letters</h2>
                    <p class="text-pink-100/60 max-w-xl mx-auto">Scratch the red cards below to reveal secret messages written just for you, Cutiee 💌</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div class="reveal">
                        <p class="text-center text-xs text-pink-200/50 uppercase tracking-widest mb-3">Letter #1 — From The Heart</p>
                        <div class="scratch-card-wrapper" id="scratch-card-1">
                            <div class="scratch-letter-content">
                                <h3>Dear Ankita,</h3>
                                <p>Kabhi kabhi words kam pad jaate hain, jab dil bohot kuch kehna chahta hai. Aaj bhi kuch aisa hi feel ho raha hai, kyunki tumhare liye jo feelings hain, unhe sirf likhkar bhi poora bayaan karna mushkil hai.</p>
                                <p>Ankita, tum meri life ki woh special feeling ho, jise main har roz mehsoos karta hoon. Tumhari smile, tumhari baatein, tumhara pyaar bhara nature — sab kuch dil ko sukoon deta hai. Tum mere din ko bright aur raat ko aur bhi khoobsurat bana deti ho.</p>
                                <p>Mujhe nahi pata future kya laaye, par itna zaroor pata hai ki mere dil mein tumhare liye jo jagah hai, woh kisi aur ki kabhi nahi ho sakti. Tum meri happiness ho, meri comfort ho, aur meri favorite person ho.</p>
                                <p>Jab tum saath hoti ho, duniya thodi aur beautiful lagti hai. Tumhari presence hi mere liye sabse badi blessing hai. Main bas itna chahta hoon ki tum hamesha khush raho, hasti raho, aur zindagi tumhe woh sab de jo tum deserve karti ho.</p>
                                <p>Shayad main perfect words nahi likh paaya, lekin yeh sach hai — I really, truly, deeply love you, Ankita. Tumhara hona hi mere liye ek bohot pyaari si dua jaisa hai.</p>
                                <div class="letter-sign">Always yours,<br/>Chiku ❤️</div>
                            </div>
                            <canvas class="scratch-canvas" id="scratch-canvas-1"></canvas>
                            <div class="scratch-hint" id="scratch-hint-1">
                                <span>💌 A Secret Letter</span>
                                <span class="hint-sub">Scratch to reveal</span>
                            </div>
                        </div>
                    </div>
                    <div class="reveal" style="transition-delay: 0.2s">
                        <p class="text-center text-xs text-pink-200/50 uppercase tracking-widest mb-3">Letter #2 — Birthday Special</p>
                        <div class="scratch-card-wrapper" id="scratch-card-2">
                            <div class="scratch-letter-content">
                                <h3>Dear Ankita,</h3>
                                <p>Happy Birthday meri jaan ✨ Aaj ka din mere liye bhi utna hi special hai jitna tumhare liye, kyunki aaj woh din hai jab duniya ko tum jaisi beautiful soul mili thi.</p>
                                <p>Sach bolun toh tum mere liye sirf ek naam nahi ho, tum ek feeling ho — ek aisi feeling jo dil ko sukoon bhi deti hai aur face pe smile bhi la deti hai. Tumhari baatein, tumhari hasi, aur tumhara pyaara sa nature… sab kuch itna special hai ki words kam pad jaate hain.</p>
                                <p>Main har roz yahi sochta hoon ki kaise koi itna adorable, caring aur lovely ho sakta hai. Tumhari presence hi kaafi hai kisi boring moment ko bhi beautiful bana dene ke liye. Tumhari smile meri favorite jagah jaisi hai — jahan dil baar-baar jana chahta hai.</p>
                                <p>Aaj ke din bas yahi dua hai ki tum hamesha khush raho, hamesha aise hi chamakti raho, aur life tumhe woh sab de jo tum deserve karti ho. Main chahta hoon ki tumhara har sapna poora ho, har din achha ho, aur tumhare chehre ki muskaan kabhi kam na ho.</p>
                                <p>Tum mere liye bahut special ho Ankita, aur yeh baat main dil se feel karta hoon. Happy Birthday baby. May your life be as beautiful, warm, and lovely as you are.</p>
                                <div class="letter-sign">Always yours,<br/>Chiku ❤️</div>
                            </div>
                            <canvas class="scratch-canvas" id="scratch-canvas-2"></canvas>
                            <div class="scratch-hint" id="scratch-hint-2">
                                <span>🎂 Birthday Letter</span>
                                <span class="hint-sub">Scratch to reveal</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Interactive Compliment Jar Section -->
        <section class="py-24 px-6 max-w-5xl mx-auto" id="activities">
            <div class="glass-card p-8 md:p-12 text-center relative overflow-hidden reveal shadow-2xl border border-white/10">
                <span class="material-symbols-outlined text-6xl text-accent mb-4 animate-bounce">auto_awesome</span>
                <h2 class="font-headline-lg text-3xl md:text-5xl text-glow text-white font-bold mb-4">Ankita's Compliment Jar</h2>
                <p class="text-pink-100/60 max-w-xl mx-auto mb-8">Click on the magic jar below to pull out a sweet, personalized compliment made just for you, Cutiee!</p>
                
                <!-- Compliment Jar Element -->
                <div class="flex flex-col items-center justify-center">
                    <div id="compliment-display" class="min-h-[80px] flex items-center justify-center max-w-xl text-center bg-white/5 border border-white/10 p-6 rounded-2xl mb-8 opacity-0 transition-opacity duration-500">
                        <p class="font-serif italic text-lg md:text-2xl text-pink-200"></p>
                    </div>
                    
                    <button onclick="generateCompliment()" class="bg-primary hover:bg-primary-container text-white px-8 py-4 rounded-full font-semibold shadow-lg hover:shadow-primary/30 active:scale-95 transition-all inline-flex items-center gap-2">
                        <span class="material-symbols-outlined">cookie</span>
                        <span>Open a Compliment</span>
                    </button>
                </div>
            </div>
        </section>

        <!-- Memory Lane Quiz Section -->
        <section class="py-24 px-6 bg-white/5 border-t border-white/5" id="quiz">
            <div class="max-w-4xl mx-auto">
                <div class="mb-12 text-center reveal">
                    <span class="text-accent uppercase tracking-widest text-xs font-semibold mb-2 block">Fun Activity</span>
                    <h2 class="font-headline-lg text-3xl md:text-5xl text-glow text-white font-bold mb-4">Memory Lane Quiz</h2>
                    <p class="text-pink-100/60">How well do you remember our special details? Finish the quiz to unlock the grand celebration confetti!</p>
                </div>

                <!-- Quiz Card -->
                <div class="glass-card p-8 md:p-12 tilt-card shadow-2xl relative reveal border border-white/10">
                    <div class="tilt-inner" id="quiz-box">
                        <div id="quiz-question-container">
                            <span class="text-accent text-xs font-semibold tracking-wider block mb-2" id="quiz-progress">Question 1 of 3</span>
                            <h3 class="font-headline-md text-xl md:text-2xl text-white font-semibold mb-6" id="quiz-question">What is Ankita's official nickname?</h3>
                            
                            <div class="space-y-4" id="quiz-options">
                                <!-- Dynamically generated buttons will go here -->
                            </div>
                        </div>
                        
                        <div id="quiz-result-container" class="hidden text-center py-6">
                            <span class="material-symbols-outlined text-6xl text-green-400 mb-4">celebration</span>
                            <h3 class="font-headline-lg text-2xl md:text-3xl text-white font-semibold mb-3">Quiz Completed!</h3>
                            <p class="text-pink-100/70 max-w-md mx-auto mb-6">Perfect score! You know us so well. You are officially the best partner in the universe!</p>
                            <button onclick="resetQuiz()" class="bg-primary hover:bg-primary-container text-white px-6 py-3 rounded-full font-semibold transition-all inline-flex items-center gap-2">
                                <span class="material-symbols-outlined">restart_alt</span>
                                <span>Play Again</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Wishing Wall Section -->
        <section class="py-24 px-6" id="wishes">
            <div class="max-w-5xl mx-auto text-center reveal">
                <span class="material-symbols-outlined text-6xl text-accent mb-6 animate-pulse" style="font-variation-settings: 'FILL' 1;">cake</span>
                <h2 class="font-display-lg text-3xl md:text-6xl text-accent font-bold mb-12">Wishing Wall</h2>
                
                <!-- Display Grid of Wishes -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-left" id="wishes-display-grid">
                    <!-- Dynamic Wish Card 1 -->
                    <div class="glass-card p-8 rounded-3xl relative hover:translate-y-[-8px] transition-all duration-300">
                        <span class="material-symbols-outlined text-accent text-3xl mb-4" style="font-variation-settings: 'FILL' 1;">auto_awesome</span>
                        <p class="font-body-md text-sm text-pink-100/80 leading-relaxed">May your day be filled with endless joy, delicious food, and all the things that make you smile!</p>
                        <div class="mt-4 pt-4 border-t border-white/5 text-[10px] text-white/40 tracking-wider">Anon wish</div>
                    </div>
                    
                    <!-- Dynamic Wish Card 2 -->
                    <div class="glass-card p-8 rounded-3xl relative hover:translate-y-[-8px] transition-all duration-300 translate-y-4">
                        <span class="material-symbols-outlined text-pink-300 text-3xl mb-4" style="font-variation-settings: 'FILL' 1;">celebration</span>
                        <p class="font-body-md text-sm text-pink-100/80 leading-relaxed">Here's to another beautiful year of laughter, growth, and creating sweet memories together. Happy Birthday, Cutiee!</p>
                        <div class="mt-4 pt-4 border-t border-white/5 text-[10px] text-white/40 tracking-wider">Your biggest fan</div>
                    </div>
                    
                    <!-- Dynamic Wish Card 3 -->
                    <div class="glass-card p-8 rounded-3xl relative hover:translate-y-[-8px] transition-all duration-300">
                        <span class="material-symbols-outlined text-purple-300 text-3xl mb-4" style="font-variation-settings: 'FILL' 1;">card_giftcard</span>
                        <p class="font-body-md text-sm text-pink-100/80 leading-relaxed">Wishing you the absolute sweetest day, the biggest slice of strawberry cake, and all the love in the universe!</p>
                        <div class="mt-4 pt-4 border-t border-white/5 text-[10px] text-white/40 tracking-wider">From me with love</div>
                    </div>
                </div>

                <!-- Input to add wishes dynamically -->
                <div class="mt-20 reveal max-w-lg mx-auto">
                    <p class="font-semibold text-xs tracking-wider uppercase text-pink-200/70 mb-4">Leave a birthday wish for Ankita</p>
                    <div class="flex bg-white/5 border border-white/10 rounded-full p-2 focus-within:ring-2 ring-accent/30 transition-all">
                        <input id="wish-input" class="flex-1 bg-transparent border-none focus:ring-0 px-6 font-body-md text-white placeholder-white/20 text-sm" placeholder="Type your message..." type="text"/>
                        <button onclick="submitWish()" class="bg-primary hover:bg-primary-container text-white p-3 rounded-full hover:scale-105 active:scale-95 transition-transform flex items-center justify-center shadow-lg">
                            <span class="material-symbols-outlined text-sm">send</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="w-full py-20 px-6 bg-white/5 border-t border-white/5 mt-12">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-6 text-center md:text-left">
            <div class="flex flex-col gap-2">
                <span class="font-headline-sm text-2xl text-accent italic font-semibold">With Love</span>
                <p class="text-xs text-pink-200/50">Forever Yours • Birthday Surprise 29/05/26</p>
            </div>
            <div class="flex gap-8">
                <a class="text-xs font-semibold uppercase tracking-wider text-pink-200/50 hover:text-accent transition-colors duration-300" href="#story">Our Story</a>
                <a class="text-xs font-semibold uppercase tracking-wider text-pink-200/50 hover:text-accent transition-colors duration-300" href="#gallery">Gallery</a>
                <a class="text-xs font-semibold uppercase tracking-wider text-pink-200/50 hover:text-accent transition-colors duration-300" href="#quiz">Quiz</a>
            </div>
            <div class="flex gap-4">
                <span class="material-symbols-outlined text-pink-300/60 hover:text-accent cursor-pointer transition-colors">share</span>
                <span class="material-symbols-outlined text-pink-300/60 hover:text-accent cursor-pointer transition-colors" style="font-variation-settings: 'FILL' 1;">favorite</span>
            </div>
        </div>
    </footer>

    <!-- Global Javascript -->
    <script src="js/main.js"></script>

    <!-- Interactive script components -->
    <script>
        // Compliments List
        const compliments = [
            "Your smile is brighter than a thousand stars, Ankita.",
            "You are my absolute favorite person in the entire world, Cutiee!",
            "I fall in love with you more and more every single day.",
            "Your laugh is my absolute favorite sound in the universe.",
            "Thank you for being the most caring, loving, and beautiful soul in my life.",
            "You deserve all the happiness, love, and cake in the world today!",
            "Every second spent with you feels like a beautiful dream come true.",
            "You make my world a million times better just by being yourself."
        ];

        function generateCompliment() {
            const display = document.getElementById('compliment-display');
            const textEl = display.querySelector('p');
            
            // Pick a random compliment
            const randomIndex = Math.floor(Math.random() * compliments.length);
            const compliment = compliments[randomIndex];
            
            // Fade out, change, fade in
            display.style.opacity = 0;
            
            setTimeout(() => {
                textEl.innerText = `"${compliment}"`;
                display.style.opacity = 1;
                
                // Explode tiny hearts confetti on pulling a compliment
                confetti({
                    particleCount: 40,
                    angle: 60,
                    spread: 55,
                    origin: { x: 0 },
                    colors: ['#ff0055', '#ffb3b3', '#ba002c']
                });
                confetti({
                    particleCount: 40,
                    angle: 120,
                    spread: 55,
                    origin: { x: 1 },
                    colors: ['#ff0055', '#ffb3b3', '#ba002c']
                });
            }, 300);
        }

        // Quiz Questions List
        const quizQuestions = [
            {
                question: "What is Ankita's official nickname?",
                options: ["Angel", "Sweetie", "Cutiee"],
                answer: 2 // 'Cutiee'
            },
            {
                question: "When is Ankita's special birthday?",
                options: ["May 29, 2026", "June 29, 2026", "May 28, 2026"],
                answer: 0 // 'May 29, 2026'
            },
            {
                question: "What is our favorite vibe illustration?",
                options: ["Sad Anime", "Let's Go Adventure", "City Walk"],
                answer: 1 // 'Let's Go Adventure'
            }
        ];

        let currentQuestionIndex = 0;

        function loadQuestion() {
            if (currentQuestionIndex >= quizQuestions.length) {
                // Show Quiz Result
                document.getElementById('quiz-question-container').classList.add('hidden');
                document.getElementById('quiz-result-container').classList.remove('hidden');
                
                // Trigger major celebration confetti
                const duration = 3 * 1000;
                const end = Date.now() + duration;

                (function frame() {
                    confetti({
                        particleCount: 5,
                        angle: 60,
                        spread: 55,
                        origin: { x: 0, y: 0.8 },
                        colors: ['#ff0055', '#ffb3b3', '#ba002c']
                    });
                    confetti({
                        particleCount: 5,
                        angle: 120,
                        spread: 55,
                        origin: { x: 1, y: 0.8 },
                        colors: ['#ff0055', '#ffb3b3', '#ba002c']
                    });

                    if (Date.now() < end) {
                        requestAnimationFrame(frame);
                    }
                }());
                return;
            }

            const qData = quizQuestions[currentQuestionIndex];
            document.getElementById('quiz-progress').innerText = `Question ${currentQuestionIndex + 1} of ${quizQuestions.length}`;
            document.getElementById('quiz-question').innerText = qData.question;
            
            const optionsBox = document.getElementById('quiz-options');
            optionsBox.innerHTML = '';
            
            qData.options.forEach((opt, idx) => {
                const btn = document.createElement('button');
                btn.className = "w-full text-left bg-white/5 hover:bg-white/10 border border-white/10 rounded-full py-4 px-6 text-sm font-medium transition-all hover:scale-[1.01] active:scale-[0.99] flex items-center justify-between";
                btn.innerHTML = `<span>${opt}</span><span class="material-symbols-outlined text-white/20 select-none">radio_button_unchecked</span>`;
                btn.onclick = () => selectAnswer(idx, btn);
                optionsBox.appendChild(btn);
            });
        }

        function selectAnswer(index, btnEl) {
            const qData = quizQuestions[currentQuestionIndex];
            
            // Mark correct / incorrect
            const icon = btnEl.querySelector('.material-symbols-outlined');
            if (index === qData.answer) {
                btnEl.classList.remove('border-white/10', 'bg-white/5');
                btnEl.classList.add('border-green-500/50', 'bg-green-950/20');
                icon.innerText = 'check_circle';
                icon.className = 'material-symbols-outlined text-green-400';
                
                // Explode correct answer confetti
                confetti({
                    particleCount: 20,
                    spread: 30,
                    origin: { y: 0.8 }
                });
                
                setTimeout(() => {
                    currentQuestionIndex++;
                    loadQuestion();
                }, 1000);
            } else {
                btnEl.classList.remove('border-white/10', 'bg-white/5');
                btnEl.classList.add('border-red-500/50', 'bg-red-950/20');
                icon.innerText = 'cancel';
                icon.className = 'material-symbols-outlined text-red-400';
                
                // Vibrate or tilt card slightly for feedback
                const card = document.querySelector('#quiz .tilt-card');
                card.style.transform = 'perspective(1000px) rotateY(-5deg)';
                setTimeout(() => {
                    card.style.transform = 'perspective(1000px) rotateY(5deg)';
                    setTimeout(() => {
                        card.style.transform = 'perspective(1000px) rotateY(0deg)';
                    }, 100);
                }, 100);
            }
        }

        function resetQuiz() {
            currentQuestionIndex = 0;
            document.getElementById('quiz-question-container').classList.remove('hidden');
            document.getElementById('quiz-result-container').classList.add('hidden');
            loadQuestion();
        }

        // Initialize quiz
        loadQuestion();

        // Wishing Wall Submit
        function submitWish() {
            const input = document.getElementById('wish-input');
            const message = input.value.trim();
            if (!message) return;
            
            const grid = document.getElementById('wishes-display-grid');
            
            // Create a new wish card
            const card = document.createElement('div');
            card.className = "glass-card p-8 rounded-3xl relative hover:translate-y-[-8px] transition-all duration-300 border border-accent/20 bg-accent/5";
            card.innerHTML = `
                <span class="material-symbols-outlined text-accent text-3xl mb-4" style="font-variation-settings: 'FILL' 1;">favorite</span>
                <p class="font-body-md text-sm text-pink-100/90 leading-relaxed">${escapeHtml(message)}</p>
                <div class="mt-4 pt-4 border-t border-white/5 text-[10px] text-accent/50 tracking-wider">Just added with love</div>
            `;
            
            // Prepend new card
            grid.insertBefore(card, grid.firstChild);
            
            // Explode wish confetti
            confetti({
                particleCount: 50,
                spread: 60,
                origin: { y: 0.8 }
            });
            
            // Reset input
            input.value = '';
        }

        function escapeHtml(text) {
            return text
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        }

        // Scratch-to-Reveal Canvas Logic
        function initScratchCard(canvasId, hintId) {
            const canvas = document.getElementById(canvasId);
            const hint = document.getElementById(hintId);
            if (!canvas) return;
            const ctx = canvas.getContext('2d');
            let isScratching = false;
            let hintHidden = false;
            function resize() {
                const wrapper = canvas.parentElement;
                canvas.width = wrapper.offsetWidth;
                canvas.height = wrapper.offsetHeight;
                drawOverlay();
            }
            function drawOverlay() {
                const grad = ctx.createLinearGradient(0, 0, canvas.width, canvas.height);
                grad.addColorStop(0, '#8b0000');
                grad.addColorStop(0.3, '#c0003a');
                grad.addColorStop(0.6, '#a00020');
                grad.addColorStop(1, '#600015');
                ctx.fillStyle = grad;
                ctx.fillRect(0, 0, canvas.width, canvas.height);
                ctx.font = '20px serif';
                ctx.fillStyle = 'rgba(255,255,255,0.08)';
                for (let i = 0; i < 60; i++) {
                    const x = Math.random() * canvas.width;
                    const y = Math.random() * canvas.height;
                    ctx.save();
                    ctx.translate(x, y);
                    ctx.rotate(Math.random() * Math.PI * 2);
                    ctx.fillText('♥', 0, 0);
                    ctx.restore();
                }
                ctx.strokeStyle = 'rgba(255,255,255,0.05)';
                ctx.lineWidth = 1;
                for (let i = 0; i < canvas.width + canvas.height; i += 40) {
                    ctx.beginPath(); ctx.moveTo(i, 0); ctx.lineTo(0, i); ctx.stroke();
                    ctx.beginPath(); ctx.moveTo(canvas.width - i, 0); ctx.lineTo(canvas.width, i); ctx.stroke();
                }
            }
            function scratch(x, y) {
                ctx.globalCompositeOperation = 'destination-out';
                ctx.beginPath(); ctx.arc(x, y, 28, 0, Math.PI * 2); ctx.fill();
                ctx.globalCompositeOperation = 'source-over';
                if (!hintHidden) { hintHidden = true; hint.style.opacity = '0'; }
                checkScratchProgress();
            }
            function checkScratchProgress() {
                const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
                const pixels = imageData.data;
                let transparent = 0;
                for (let i = 3; i < pixels.length; i += 16) { if (pixels[i] === 0) transparent++; }
                const total = pixels.length / 16;
                if ((transparent / total) * 100 > 55) {
                    canvas.style.transition = 'opacity 0.8s';
                    canvas.style.opacity = '0';
                    setTimeout(() => { canvas.style.display = 'none'; }, 800);
                    confetti({ particleCount: 80, spread: 70, origin: { y: 0.6 }, colors: ['#ff0055', '#ffb3b3', '#ba002c', '#ffd9e2'] });
                }
            }
            function getPos(e) {
                const rect = canvas.getBoundingClientRect();
                const touch = e.touches ? e.touches[0] : e;
                return { x: touch.clientX - rect.left, y: touch.clientY - rect.top };
            }
            canvas.addEventListener('mousedown', (e) => { isScratching = true; const p = getPos(e); scratch(p.x, p.y); });
            canvas.addEventListener('mousemove', (e) => { if (isScratching) { const p = getPos(e); scratch(p.x, p.y); } });
            canvas.addEventListener('mouseup', () => { isScratching = false; });
            canvas.addEventListener('mouseleave', () => { isScratching = false; });
            canvas.addEventListener('touchstart', (e) => { e.preventDefault(); isScratching = true; const p = getPos(e); scratch(p.x, p.y); });
            canvas.addEventListener('touchmove', (e) => { e.preventDefault(); if (isScratching) { const p = getPos(e); scratch(p.x, p.y); } });
            canvas.addEventListener('touchend', () => { isScratching = false; });
            resize();
            window.addEventListener('resize', resize);
        }
        initScratchCard('scratch-canvas-1', 'scratch-hint-1');
        initScratchCard('scratch-canvas-2', 'scratch-hint-2');
    </script>

    <!-- Doom Scroll GSAP Logic -->
    <script>
    (function() {
        gsap.registerPlugin(ScrollTrigger);
        const progressBar = document.createElement('div');
        progressBar.className = 'doom-progress';
        progressBar.innerHTML = '<div class="doom-progress-fill"></div>';
        document.body.appendChild(progressBar);
        const progressFill = progressBar.querySelector('.doom-progress-fill');
        const panels = document.querySelectorAll('.doom-panel');
        panels.forEach((panel, i) => {
            const caption = panel.dataset.caption || '';
            const sub = panel.dataset.sub || '';
            const num = String(i + 1).padStart(2, '0');
            const captionEl = document.createElement('div');
            captionEl.className = 'doom-caption';
            captionEl.innerHTML = `<div class="doom-caption-text"><h3>${caption}</h3><p>${sub}</p></div><div class="doom-caption-counter">${num}</div>`;
            panel.appendChild(captionEl);
            const line = document.createElement('div');
            line.className = 'doom-panel-line';
            line.innerHTML = `<span></span><em>memory ${num}</em><span></span>`;
            panel.appendChild(line);
            ScrollTrigger.create({
                trigger: panel, start: 'top 80%', end: 'bottom 20%',
                onEnter: () => panel.classList.add('is-visible'),
                onLeave: () => panel.classList.remove('is-visible'),
                onEnterBack: () => panel.classList.add('is-visible'),
                onLeaveBack: () => panel.classList.remove('is-visible'),
            });
        });
        const doomSection = document.getElementById('doom-scroll');
        if (doomSection) {
            ScrollTrigger.create({
                trigger: doomSection, start: 'top top', end: 'bottom bottom',
                onEnter: () => progressBar.classList.add('active'),
                onLeave: () => progressBar.classList.remove('active'),
                onEnterBack: () => progressBar.classList.add('active'),
                onLeaveBack: () => progressBar.classList.remove('active'),
                onUpdate: (self) => { progressFill.style.height = (self.progress * 100) + '%'; }
            });
        }
        panels.forEach(panel => {
            const img = panel.querySelector('.doom-panel-img img');
            if (img) {
                gsap.fromTo(img, { scale: 1.2 }, {
                    scale: 1, ease: 'none',
                    scrollTrigger: { trigger: panel, start: 'top bottom', end: 'bottom top', scrub: 1 }
                });
            }
        });
        const introEl = document.querySelector('.doom-scroll-intro');
        if (introEl) {
            gsap.to(introEl, {
                opacity: 0, scale: 0.95,
                scrollTrigger: { trigger: introEl, start: 'top top', end: 'bottom top', scrub: true }
            });
        }
    })();
    </script>
</body>
</html>
