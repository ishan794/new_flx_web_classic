<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Flxwaretech | Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css'])
</head>
<body class="font-sans text-gray-300 antialiased bg-navy-dark h-screen overflow-hidden flex" x-data="cms()">
    
    <!-- Sidebar -->
    <aside class="w-64 bg-navy-deep border-r border-white/5 flex flex-col h-full">
        <div class="p-6 border-b border-white/5 flex justify-between items-center">
            <h1 class="text-xl font-bold text-white">Flxware<span class="text-accent">tech</span></h1>
            <a href="{{ route('home') }}" target="_blank" title="View Live Site" class="text-gray-500 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
            </a>
        </div>
        
        <nav class="flex-1 overflow-y-auto py-4">
            <div class="px-4 mb-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Content</div>
            <a href="#" @click.prevent="activeTab = 'pages'" :class="{'bg-accent/10 text-accent border-r-2 border-accent': activeTab === 'pages', 'hover:bg-white/5': activeTab !== 'pages'}" class="block px-6 py-2.5 text-sm transition-colors">Pages</a>
            <a href="#" @click.prevent="activeTab = 'projects'" :class="{'bg-accent/10 text-accent border-r-2 border-accent': activeTab === 'projects', 'hover:bg-white/5': activeTab !== 'projects'}" class="block px-6 py-2.5 text-sm transition-colors">Projects</a>
            <a href="#" @click.prevent="activeTab = 'jobs'" :class="{'bg-accent/10 text-accent border-r-2 border-accent': activeTab === 'jobs', 'hover:bg-white/5': activeTab !== 'jobs'}" class="block px-6 py-2.5 text-sm transition-colors">Careers</a>
            
            <div class="px-4 mt-6 mb-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">System</div>
            <a href="#" @click.prevent="activeTab = 'settings'" :class="{'bg-accent/10 text-accent border-r-2 border-accent': activeTab === 'settings', 'hover:bg-white/5': activeTab !== 'settings'}" class="block px-6 py-2.5 text-sm transition-colors">Settings</a>
            <a href="{{ route('admin.preview') }}" class="block px-6 py-2.5 text-sm hover:bg-white/5 transition-colors flex items-center justify-between">
                Live Editor
                <span class="bg-accent text-white text-[10px] px-2 py-0.5 rounded">NEW</span>
            </a>
        </nav>
        
        <div class="p-4 border-t border-white/5">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full text-left px-2 py-2 text-sm text-gray-400 hover:text-white flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col h-full overflow-hidden bg-navy-mid relative">
        <!-- Topbar -->
        <header class="h-16 border-b border-white/5 flex items-center justify-between px-8 bg-navy-deep/50 backdrop-blur-sm z-10">
            <h2 class="text-lg font-medium text-white capitalize" x-text="activeTab"></h2>
            
            <div class="flex items-center gap-4">
                <span x-show="isSaving" class="text-sm text-gray-400 animate-pulse">Saving & Deploying...</span>
                <span x-show="saveSuccess" x-transition class="text-sm text-green-400">Deployed Successfully!</span>
                <span x-show="saveError" x-transition class="text-sm text-red-400">Error saving data</span>
                
                <button @click="saveContent" :disabled="isSaving" class="bg-accent hover:bg-blue-600 disabled:opacity-50 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors flex items-center gap-2 shadow-lg shadow-blue-500/20">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                    Save & Publish
                </button>
            </div>
        </header>
        
        <!-- Scrollable Pane -->
        <div class="flex-1 overflow-y-auto p-8">
            
            <!-- SETTINGS TAB -->
            <div x-show="activeTab === 'settings'" style="display: none;">
                <div class="max-w-3xl bg-navy-deep border border-white/5 rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-white mb-6 border-b border-white/5 pb-4">Global Site Settings</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-2">Site Title</label>
                            <input type="text" x-model="data.settings.site_title" class="w-full bg-navy-mid border border-white/10 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-accent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-2">Contact Email</label>
                            <input type="email" x-model="data.settings.contact_email" class="w-full bg-navy-mid border border-white/10 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-accent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-2">Address</label>
                            <input type="text" x-model="data.settings.address" class="w-full bg-navy-mid border border-white/10 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-accent">
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- PAGES TAB -->
            <div x-show="activeTab === 'pages'" style="display: none;">
                <div class="max-w-4xl space-y-6">
                    <template x-for="(page, pageKey) in data.pages" :key="pageKey">
                        <div class="bg-navy-deep border border-white/5 rounded-xl overflow-hidden">
                            <div class="bg-white/5 px-6 py-4 flex justify-between items-center cursor-pointer" @click="expandedPage = expandedPage === pageKey ? null : pageKey">
                                <h3 class="text-lg font-semibold text-white capitalize" x-text="pageKey + ' Page'"></h3>
                                <svg :class="{'rotate-180': expandedPage === pageKey}" class="transition-transform w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
                            </div>
                            
                            <div x-show="expandedPage === pageKey" class="p-6 border-t border-white/5">
                                <!-- Home Hero Section specific fields for now -->
                                <template x-if="page.hero">
                                    <div class="space-y-4">
                                        <h4 class="text-accent text-sm font-medium uppercase tracking-wider mb-4">Hero Section</h4>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-400 mb-2">Tagline</label>
                                            <input type="text" x-model="page.hero.tagline" class="w-full bg-navy-mid border border-white/10 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-accent">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-400 mb-2">Title Line 1</label>
                                            <input type="text" x-model="page.hero.title_line_1" class="w-full bg-navy-mid border border-white/10 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-accent">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-400 mb-2">Title Line 2</label>
                                            <input type="text" x-model="page.hero.title_line_2" class="w-full bg-navy-mid border border-white/10 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-accent">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-400 mb-2">Description</label>
                                            <textarea x-model="page.hero.description" rows="3" class="w-full bg-navy-mid border border-white/10 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-accent"></textarea>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
            
            <!-- RAW JSON EDITOR (For power users) -->
            <div x-show="activeTab === 'projects' || activeTab === 'jobs'" style="display: none;" class="h-full flex flex-col">
                <div class="mb-4 text-sm text-gray-400">
                    Advanced Editor: You can directly edit the content tree here. Visual editor is available in the <a href="{{ route('admin.preview') }}" class="text-accent hover:underline">Live Editor tab</a>.
                </div>
                <textarea x-model="rawJson" @input="tryParseJson" class="w-full flex-1 bg-navy-deep border border-white/5 rounded-xl p-6 text-gray-300 font-mono text-sm focus:outline-none focus:border-accent shadow-inner resize-none"></textarea>
                <div x-show="jsonError" class="mt-2 text-red-400 text-sm flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    Invalid JSON format. Please fix the syntax errors.
                </div>
            </div>
            
        </div>
    </main>

    <script>
        // Init Alpine component
        document.addEventListener('alpine:init', () => {
            Alpine.data('cms', () => ({
                activeTab: 'pages',
                expandedPage: 'home',
                isSaving: false,
                saveSuccess: false,
                saveError: false,
                jsonError: false,
                data: {!! json_encode($cmsData) !!},
                rawJson: '',
                
                init() {
                    this.rawJson = JSON.stringify(this.data, null, 4);
                    // Watch for data changes to update raw JSON
                    this.$watch('data', (value) => {
                        if (!this.jsonError) {
                            this.rawJson = JSON.stringify(value, null, 4);
                        }
                    });
                },
                
                tryParseJson() {
                    try {
                        this.data = JSON.parse(this.rawJson);
                        this.jsonError = false;
                    } catch (e) {
                        this.jsonError = true;
                    }
                },
                
                async saveContent() {
                    if (this.jsonError) return;
                    
                    this.isSaving = true;
                    this.saveSuccess = false;
                    this.saveError = false;
                    
                    try {
                        const response = await fetch('{{ route('admin.update') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            },
                            body: JSON.stringify({ cms_data: this.data })
                        });
                        
                        const result = await response.json();
                        if (result.success) {
                            this.saveSuccess = true;
                            setTimeout(() => this.saveSuccess = false, 3000);
                        } else {
                            this.saveError = true;
                        }
                    } catch (e) {
                        console.error(e);
                        this.saveError = true;
                    } finally {
                        this.isSaving = false;
                    }
                }
            }));
        });
    </script>
</body>
</html>
