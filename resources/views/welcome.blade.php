<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>DevScribe</title>
</head>

<body class="bg-slate-900">
    <nav class="bg-slate-800 w-full sticky top-0 z-50">
        <div class="container mx-auto">
            <div class="flex items-center justify-between py-4">
                <a href="/" class="text-white text-2xl font-mono">&lt;DevScribe /&gt;</a>
                <div>
                    <a href="#Home"
                        class="text-white hover:text-blue-400 transform hover:scale-110 transition-all inline-block">Home</a>
                    <a href="#Features"
                        class="text-white ml-4 hover:text-blue-400 transform hover:scale-110 transition-all inline-block">Features</a>
                    <a href="#Team"
                        class="text-white ml-4 hover:text-blue-400 transform hover:scale-110 transition-all inline-block">Team</a>
                    <a href="#Contact"
                        class="text-white ml-4 hover:text-blue-400 transform hover:scale-110 transition-all inline-block">Contact</a>
                </div>
                <div>
                    <a href="/login"
                        class="text-white hover:bg-blue-400 border-2 border-blue-400 px-4 py-2 rounded-lg inline-block">Login</a>
                    <a href="{{ Route('show.register') }}"
                        class="text-white ml-4 border-2 border-blue-400 px-2 py-2 rounded-lg bg-blue-400 inline-block">Get
                        Started For Free</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="flex h-screen container mx-auto items-center justify-center" id="Home">
        <div class="text-white text-center max-w-3xl mx-auto">
            <p class="text-5xl"> Welcome to <span class="font-mono text-blue-400">&lt;DevScribe /&gt;</span> </p>
            <p class="text-lg mt-4">Code. Write. Innovate.</p>
            <p class="text-md mt-4">Welcome to DevScribe, the ultimate space for developers, tech enthusiasts, and
                innovators. Whether you're exploring the latest frameworks, debugging complex code, or sharing insights
                from your journey, DevScribe is your go-to hub for knowledge and inspiration.</p>
        </div>
    </div>
    <div class="flex h-screen container mx-auto items-center justify-center" id="Features">
        <div class="text-white max-w-3xl mx-auto">
            <div class="flex items-center my-5">
                <div class="bg-blue-400 w-0.5 h-6"></div>
                <p class="ml-3">Features</p>
            </div>
            <p class="text-5xl"> 🚀 What We Offer </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                <div class="bg-slate-800 p-6 rounded-lg hover:shadow-lg transition-all">
                    <div class="text-blue-400 text-xl mb-3">✅ In-depth tutorials & coding guides</div>
                    <p class="text-gray-300">Comprehensive step-by-step tutorials and coding guides to help you master
                        new technologies and programming concepts.</p>
                </div>
                <div class="bg-slate-800 p-6 rounded-lg hover:shadow-lg transition-all">
                    <div class="text-blue-400 text-xl mb-3">✅ Best practices & industry trends</div>
                    <p class="text-gray-300">Stay updated with the latest industry standards, best practices, and
                        emerging trends in the world of development.</p>
                </div>
                <div class="bg-slate-800 p-6 rounded-lg hover:shadow-lg transition-all">
                    <div class="text-blue-400 text-xl mb-3">✅ Developer stories & experiences</div>
                    <p class="text-gray-300">Real-world stories and experiences shared by developers to inspire and
                        guide your own programming journey.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="flex h-screen container mx-auto items-center justify-center" id="Team">
        <div class="text-white max-w-3xl mx-auto">
            <div class="flex items-center my-5">
                <div class="bg-blue-400 w-0.5 h-6"></div>
                <p class="ml-3">Team</p>
            </div>
            <p class="text-5xl">👥 Meet Our Team</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                <div class="bg-slate-800 p-6 rounded-lg hover:shadow-lg transition-all text-center">
                    <img src="https://via.placeholder.com/150" alt="Team Member" class="rounded-full mx-auto mb-4"
                        width="100" height="100">
                    <div class="text-blue-400 text-xl mb-2">Hans Ian Bondoc</div>
                    <div class="text-gray-400 mb-3">Lead Developer</div>
                    <p class="text-gray-300">Passionate about clean code and innovative solutions with over 2 Months of
                        experience.</p>
                </div>
                <div class="bg-slate-800 p-6 rounded-lg hover:shadow-lg transition-all text-center">
                    <img src="https://via.placeholder.com/150" alt="Team Member" class="rounded-full mx-auto mb-4"
                        width="100" height="100">
                    <div class="text-blue-400 text-xl mb-2">Demetrie Mang-oy</div>
                    <div class="text-gray-400 mb-3">UI/UX Designer</div>
                    <p class="text-gray-300">Creates beautiful, intuitive interfaces with a focus on exceptional user
                        experience.</p>
                </div>
                <div class="bg-slate-800 p-6 rounded-lg hover:shadow-lg transition-all text-center">
                    <img src="https://via.placeholder.com/150" alt="Team Member" class="rounded-full mx-auto mb-4"
                        width="100" height="100">
                    <div class="text-blue-400 text-xl mb-2">Alain Cortez</div>
                    <div class="text-gray-400 mb-3">Content Strategist</div>
                    <p class="text-gray-300">Expert in technical writing with a knack for explaining complex concepts
                        simply.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="flex h-screen container mx-auto items-center justify-center" id="Contact">
        <div class="text-white max-w-3xl mx-auto">
            <div class="flex items-center my-5">
                <div class="bg-blue-400 w-0.5 h-6"></div>
                <p class="ml-3">Contact</p>
            </div>
            <p class="text-5xl">📞 Get In Touch</p>
            <div class="mt-8 bg-slate-800 p-8 rounded-lg">
                <p class="text-xl mb-6">We'd love to hear from you!</p>
                <div class="flex items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400 mr-3" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <a href="mailto:support@devscribe.io" class="text-blue-400 hover:underline">support@devscribe.io</a>
                </div>
                <form class="mt-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <input type="text" placeholder="Name" class="bg-slate-700 p-3 rounded-lg text-white w-full">
                        <input type="email" placeholder="Email" class="bg-slate-700 p-3 rounded-lg text-white w-full">
                    </div>
                    <textarea placeholder="Your Message" rows="4"
                        class="bg-slate-700 p-3 rounded-lg text-white w-full mb-4"></textarea>
                    <button type="submit"
                        class="bg-blue-400 text-white py-3 px-6 rounded-lg hover:bg-blue-500 transition-all">Send
                        Message</button>
                </form>
            </div>
        </div>
    </div>
    <footer class="bg-slate-800 text-white text-center py-8">
        <p>&copy; 2021 DevScribe. All rights reserved.</p>
    </footer>
</body>

</html>