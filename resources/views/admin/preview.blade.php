<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website Management System | Flxwaretech</title>
    
    <!-- GrapesJS Core -->
    <link rel="stylesheet" href="https://unpkg.com/grapesjs/dist/css/grapes.min.css">
    <script src="https://unpkg.com/grapesjs"></script>
    
    <!-- GrapesJS Plugins -->
    <script src="https://unpkg.com/grapesjs-tailwind"></script>
    <script src="https://unpkg.com/grapesjs-blocks-basic"></script>
    <script src="https://unpkg.com/grapesjs-plugin-forms"></script>
    <script src="https://unpkg.com/grapesjs-plugin-export"></script>
    
    <style>
        :root {
            --ui-bg: #0f172a;
            --ui-border: #1e293b;
            --ui-text: #cbd5e1;
            --ui-accent: #3b82f6;
            --ui-accent-hover: #2563eb;
        }

        body, html {
            height: 100%;
            margin: 0;
            overflow: hidden;
            background-color: var(--ui-bg);
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            color: var(--ui-text);
        }
        
        #editor-container {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }
        
        /* Topbar */
        #topbar {
            height: 50px;
            background: #0b1120;
            border-bottom: 1px solid var(--ui-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            z-index: 10;
        }

        /* Page Manager UI */
        .page-manager {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #1e293b;
            padding: 4px 10px;
            border-radius: 6px;
        }
        .page-manager select {
            background: #0f172a;
            color: white;
            border: 1px solid #334155;
            padding: 4px 8px;
            border-radius: 4px;
            outline: none;
            font-size: 13px;
            min-width: 140px; /* Force minimum width to prevent text cutting */
            max-width: 200px;
        }
        .add-page-btn {
            background: transparent;
            color: var(--ui-accent);
            border: none;
            cursor: pointer;
            font-size: 13px;
            font-weight: 500;
        }
        .add-page-btn:hover { color: white; }

        /* Workspace */
        #workspace {
            display: flex;
            flex: 1;
            overflow: hidden;
        }

        #left-sidebar {
            width: 280px;
            background: var(--ui-bg);
            border-right: 1px solid var(--ui-border);
            display: flex;
            flex-direction: column;
            z-index: 5;
        }
        
        .sidebar-header {
            padding: 12px 15px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #94a3b8;
            border-bottom: 1px solid var(--ui-border);
            background: #0b1120;
        }

        #blocks-container {
            flex: 1;
            overflow-y: auto;
            padding: 10px;
        }

        #gjs-wrapper {
            flex: 1;
            position: relative;
            background: #000;
            overflow: hidden;
        }
        #gjs { height: 100%; }

        #right-sidebar {
            width: 320px;
            background: var(--ui-bg);
            border-left: 1px solid var(--ui-border);
            display: flex;
            flex-direction: column;
            z-index: 5;
        }

        .editor-btn {
            background: var(--ui-accent);
            color: white;
            border: none;
            padding: 6px 16px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: background 0.2s;
        }
        .editor-btn:hover { background: var(--ui-accent-hover); }
        .editor-btn:disabled { opacity: 0.5; cursor: not-allowed; }
        
        .back-link {
            color: #94a3b8;
            text-decoration: none;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: color 0.2s;
        }
        .back-link:hover { color: white; }

        .gjs-cv-canvas { width: 100%; top: 0; background-color: #05070F; }
        
        /* Modern Editor UI with Premium Dark Mode */
        .gjs-one-bg { background-color: #0b0f19 !important; }
        .gjs-two-color { color: #94a3b8 !important; }
        .gjs-three-bg { background-color: var(--ui-accent) !important; color: white !important; }
        .gjs-four-color, .gjs-four-color-h:hover { color: var(--ui-accent) !important; }
        
        /* Custom Scrollbars */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #0b0f19;
        }
        ::-webkit-scrollbar-thumb {
            background: #1e293b;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #334155;
        }

        /* Sidebar Tabs (Styles, Settings, Layers) */
        .gjs-pn-views-container {
            width: 100% !important;
            box-shadow: none !important;
            border-left: none !important;
            background-color: #0b0f19 !important;
        }
        .gjs-pn-views, .gjs-pn-options {
            border-bottom: 1px solid #1e293b !important;
            background-color: #0b0f19 !important;
            padding: 8px !important;
            display: flex !important;
            gap: 6px !important;
        }
        .gjs-pn-views .gjs-pn-btn {
            flex: 1 !important;
            text-align: center !important;
            background-color: #1e293b !important;
            color: #94a3b8 !important;
            border: 1px solid #334155 !important;
            padding: 8px 12px !important;
            font-size: 12px !important;
            font-weight: 600 !important;
            border-radius: 6px !important;
            transition: all 0.2s ease !important;
            margin: 0 !important;
        }
        .gjs-pn-views .gjs-pn-btn.gjs-pn-active {
            background-color: var(--ui-accent) !important;
            color: white !important;
            border-color: var(--ui-accent) !important;
        }

        /* Block Categories (Collapsible in Left Sidebar) */
        .gjs-block-category {
            background-color: #0f172a !important;
            border-bottom: 1px solid #1e293b !important;
        }
        .gjs-block-category .gjs-title {
            padding: 12px 16px !important;
            font-size: 13px !important;
            font-weight: 600 !important;
            color: #f1f5f9 !important;
            text-transform: capitalize !important;
            letter-spacing: 0.025em !important;
        }
        .gjs-block-category .gjs-caret-icon {
            fill: #94a3b8 !important;
        }
        
        /* Single Column Layout for Blocks to make images naturally large */
        .gjs-blocks-c {
            display: grid !important;
            grid-template-columns: 1fr !important;
            gap: 16px !important;
            padding: 12px !important;
        }
        .gjs-block {
            background-color: transparent !important;
            border: none !important;
            box-shadow: none !important;
            padding: 0 !important;
            min-height: auto !important;
            cursor: grab !important;
            transition: transform 0.2s ease !important;
        }
        .gjs-block:hover {
            transform: translateY(-2px) !important;
            background-color: transparent !important;
            border: none !important;
            box-shadow: none !important;
        }
        .gjs-block svg {
            width: 32px !important;
            height: 32px !important;
            fill: currentColor !important;
        }
        
        /* Render block images full width directly in the sidebar list */
        .gjs-block img {
            width: 100% !important;
            height: auto !important;
            border-radius: 6px !important;
            border: 2px solid #1e293b !important;
            transition: all 0.2s ease !important;
        }
        .gjs-block:hover img {
            border-color: var(--ui-accent) !important;
            box-shadow: 0 8px 16px -4px rgb(37 99 235 / 0.4) !important;
        }
        
        /* Hide block text labels so only clean, large visual layouts are shown */
        .gjs-block-label {
            display: none !important;
        }
        
        /* Sectors Styling (Style Manager Accordions) */
        .gjs-sm-sector {
            border-bottom: 1px solid #1e293b !important;
        }
        .gjs-sm-sector .gjs-sm-title {
            background-color: #0b0f19 !important;
            border-bottom: 1px solid #1e293b !important;
            padding: 12px 16px !important;
            font-weight: 600 !important;
            font-size: 11px !important;
            letter-spacing: 0.05em !important;
            text-transform: uppercase !important;
            color: #94a3b8 !important;
        }
        .gjs-sm-properties {
            padding: 16px !important;
            background-color: #0b0f19 !important;
        }
        .gjs-sm-property {
            margin-bottom: 12px !important;
        }
        .gjs-sm-label {
            color: #cbd5e1 !important;
            font-size: 11px !important;
            font-weight: 500 !important;
            margin-bottom: 6px !important;
            text-transform: uppercase !important;
            letter-spacing: 0.025em !important;
        }

        /* Input Elements inside Property Manager */
        .gjs-field {
            background-color: #1e293b !important;
            border: 1px solid #334155 !important;
            border-radius: 6px !important;
            padding: 4px 8px !important;
        }
        .gjs-field input, .gjs-field select, .gjs-field textarea {
            color: #f1f5f9 !important;
            font-size: 12px !important;
            background: transparent !important;
            border: none !important;
        }
        .gjs-field input:focus, .gjs-field select:focus {
            outline: none !important;
        }

        /* Topbar Devices Selector Group */
        #devices-container {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        #devices-container .gjs-pn-btn {
            background-color: #1e293b !important;
            color: #94a3b8 !important;
            border: 1px solid #334155 !important;
            padding: 6px 16px !important;
            font-size: 13px !important;
            font-weight: 500 !important;
            cursor: pointer !important;
            transition: all 0.2s ease !important;
            margin: 0 !important;
            border-radius: 0 !important;
            box-shadow: none !important;
        }
        #devices-container .gjs-pn-btn:first-child {
            border-top-left-radius: 6px !important;
            border-bottom-left-radius: 6px !important;
        }
        #devices-container .gjs-pn-btn:last-child {
            border-top-right-radius: 6px !important;
            border-bottom-right-radius: 6px !important;
        }
        #devices-container .gjs-pn-btn:not(:last-child) {
            border-right: none !important;
        }
        #devices-container .gjs-pn-btn:hover {
            color: #ffffff !important;
            background-color: #334155 !important;
        }
        #devices-container .gjs-pn-btn.gjs-pn-active {
            background-color: var(--ui-accent) !important;
            color: #ffffff !important;
            border-color: var(--ui-accent) !important;
        }

        .gjs-pn-panel.gjs-pn-devices-c {
            position: relative;
            background: transparent;
            box-shadow: none;
        }

        /* Mobile Responsiveness */
        .mobile-toggle {
            display: none;
            background: transparent;
            color: var(--ui-text);
            border: none;
            font-size: 20px;
            cursor: pointer;
            padding: 5px 10px;
        }
        .mobile-toggle:hover { color: white; }

        @media (max-width: 992px) {
            #left-sidebar, #right-sidebar {
                position: absolute;
                height: calc(100vh - 50px);
                top: 50px;
                transition: transform 0.3s ease;
                box-shadow: 0 4px 20px rgba(0,0,0,0.5);
            }
            #left-sidebar {
                left: 0;
                transform: translateX(-100%);
            }
            #left-sidebar.active {
                transform: translateX(0);
            }
            #right-sidebar {
                right: 0;
                transform: translateX(100%);
            }
            #right-sidebar.active {
                transform: translateX(0);
            }
            .mobile-toggle {
                display: block;
            }
            .hide-mobile {
                display: none;
            }
            /* Hide device switcher on very small screens to save space */
            @media (max-width: 600px) {
                #devices-container { display: none !important; }
                .page-manager span { display: none; }
            }
        }
    </style>
</head>
<body>
    
    <div id="editor-container">
        <!-- Topbar -->
        <div id="topbar">
            <div style="display: flex; align-items: center; gap: 15px;">
                <button class="mobile-toggle" onclick="toggleSidebar('left')" title="Components">&#9776;</button>
                <a href="{{ route('admin.dashboard') }}" class="back-link">
                    &larr; <span class="hide-mobile">Dashboard</span>
                </a>
                <div style="width: 1px; height: 20px; background: #1e293b;"></div>
                <div id="devices-container"></div>
            </div>
            
            <div class="page-manager" style="position: absolute; left: 50%; transform: translateX(-50%); display: flex; align-items: center; gap: 10px;">
                <span style="font-size: 12px; color: #94a3b8;">Page:</span>
                <select id="page-switcher" onchange="switchPage(this.value)"></select>
                <button class="add-page-btn" onclick="createNewPage()">+ New</button>
            </div>
            
            <div style="display: flex; gap: 10px; align-items: center;">
                <span id="save-status" style="font-size: 12px; color: #10b981; display: none;">Published!</span>
                <button class="editor-btn" onclick="saveProject()" id="save-btn">
                    Publish
                </button>
                <button class="mobile-toggle" onclick="toggleSidebar('right')" title="Properties">&#9881;</button>
            </div>
        </div>

        <!-- Workspace -->
        <div id="workspace">
            <!-- Left Sidebar (Component Library) -->
            <div id="left-sidebar">
                <div class="sidebar-header" style="display: flex; justify-content: space-between;">
                    <span>Components</span>
                    <div>
                        <button onclick="saveGlobalComponent()" style="background: none; border: none; color: #3b82f6; cursor: pointer; margin-right:10px;" title="Save selected as global component">+</button>
                        <button class="mobile-toggle" onclick="toggleSidebar('left')" style="display:inline; font-size:14px; padding:0;">&times;</button>
                    </div>
                </div>
                <div id="blocks-container"></div>
            </div>

            <!-- Canvas -->
            <div id="gjs-wrapper">
                <div id="gjs"></div>
            </div>

            <!-- Right Sidebar (Properties) -->
            <div id="right-sidebar">
                <div class="sidebar-header" style="display:flex; justify-content:space-between;">
                    Properties Panel
                    <button class="mobile-toggle" onclick="toggleSidebar('right')" style="display:inline; font-size:14px; padding:0;">&times;</button>
                </div>
                <div id="properties-container" style="flex: 1; position: relative; overflow-y: auto;">
                    <div id="style-manager-container"></div>
                    <div id="trait-manager-container" style="display: none;"></div>
                    <div id="layers-container" style="display: none;"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fetch real web assets in parallel as early as possible
        const assetsPromise = fetch('/?grapesjs=1')
            .then(res => res.text())
            .then(htmlStr => {
                const parser = new DOMParser();
                const parsedDoc = parser.parseFromString(htmlStr, 'text/html');
                
                const bodyScripts = [];
                parsedDoc.body.querySelectorAll('script').forEach(el => {
                    bodyScripts.push(el);
                    el.remove();
                });
                
                let headStyles = '';
                parsedDoc.head.querySelectorAll('style, link[rel="stylesheet"]').forEach(el => {
                    headStyles += el.outerHTML;
                });

                return {
                    bodyContent: parsedDoc.body.innerHTML,
                    bodyClass: parsedDoc.body.className,
                    headStyles: headStyles,
                    headScripts: Array.from(parsedDoc.head.querySelectorAll('script')),
                    bodyScripts: bodyScripts
                };
            })
            .catch(err => {
                console.error('Failed to fetch real web assets:', err);
                return { bodyContent: '', bodyClass: '', headStyles: '', headScripts: [], bodyScripts: [] };
            });

        // Mobile Sidebar Toggle Logic
        function toggleSidebar(side) {
            const el = document.getElementById(side + '-sidebar');
            el.classList.toggle('active');
            
            // Close the other sidebar if opening on mobile
            if (el.classList.contains('active')) {
                const otherSide = side === 'left' ? 'right' : 'left';
                document.getElementById(otherSide + '-sidebar').classList.remove('active');
            }
        }

        const editor = grapesjs.init({
            container: '#gjs',
            height: '100%',
            fromElement: false,
            dragMode: 'absolute',
            
            blockManager: { appendTo: '#blocks-container' },
            selectorManager: { appendTo: '#style-manager-container' },
            traitManager: { appendTo: '#trait-manager-container' },
            layerManager: { appendTo: '#layers-container' },
            
            // Advanced Elementor-style Style Manager
            styleManager: { 
                appendTo: '#properties-container',
                sectors: [
                    {
                        name: 'Layout',
                        open: true,
                        buildProps: ['display', 'position', 'top', 'right', 'bottom', 'left', 'flex-direction', 'justify-content', 'align-items'],
                        properties: [
                            { name: 'Display', property: 'display', type: 'select', list: [
                                { value: 'block', name: 'Block' },
                                { value: 'inline-block', name: 'Inline Block' },
                                { value: 'flex', name: 'Flexbox' },
                                { value: 'grid', name: 'Grid' },
                                { value: 'none', name: 'None' }
                            ]}
                        ]
                    },
                    {
                        name: 'Spacing',
                        open: false,
                        buildProps: ['margin', 'padding']
                    },
                    {
                        name: 'Dimensions',
                        open: false,
                        buildProps: ['width', 'height', 'max-width', 'min-height']
                    },
                    {
                        name: 'Typography',
                        open: false,
                        buildProps: ['font-family', 'font-size', 'font-weight', 'letter-spacing', 'color', 'line-height', 'text-align', 'text-shadow']
                    },
                    {
                        name: 'Decorations',
                        open: false,
                        buildProps: ['background-color', 'border-radius', 'border', 'box-shadow', 'opacity']
                    },
                    {
                        name: 'Extra',
                        open: false,
                        buildProps: ['transition', 'transform', 'cursor']
                    }
                ]
            },
            
            panels: {
                defaults: [
                    {
                        id: 'panel-switcher',
                        el: '#properties-container',
                        buttons: [
                            { id: 'show-style', active: true, label: 'Styles', command: 'show-styles', togglable: false }, 
                            { id: 'show-traits', label: 'Settings', command: 'show-traits', togglable: false }, 
                            { id: 'show-layers', label: 'Layers', command: 'show-layers', togglable: false }
                        ],
                    },
                    {
                        id: 'panel-devices',
                        el: '#devices-container',
                        buttons: [
                            { id: 'device-desktop', command: 'set-device-desktop', label: 'Desktop', active: true },
                            { id: 'device-tablet', command: 'set-device-tablet', label: 'Tablet' },
                            { id: 'device-mobile', command: 'set-device-mobile', label: 'Mobile' },
                        ]
                    }
                ]
            },
            
            storageManager: {
                type: 'remote',
                stepsBeforeSave: 10,
                options: {
                    remote: {
                        urlLoad: '{{ route("admin.project.load") }}',
                        urlStore: '{{ route("admin.project.save") }}',
                        onStore: (data, editor) => {
                            const html_pages = {};
                            const pages = editor.Pages.getAll();
                            pages.forEach(page => {
                                const component = page.getMainComponent();
                                html_pages[page.id] = {
                                    html: editor.getHtml({ component }),
                                    css: editor.getCss({ component })
                                };
                            });
                            return { project_data: data, html_pages: html_pages };
                        },
                        fetchOptions: opts => (opts.method === 'POST' ? { headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' } } : {})
                    }
                }
            },
            
            assetManager: {
                upload: '{{ route("admin.upload.media") }}',
                uploadName: 'files[]',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                autoAdd: 1,
            },
            
            plugins: ['grapesjs-tailwind', 'gjs-blocks-basic', 'grapesjs-plugin-forms', 'gjs-plugin-export'],
            pluginsOpts: {
                'grapesjs-tailwind': {
                    tailwindConfig: {
                        theme: {
                            extend: {
                                colors: {
                                    'navy-deep': '#05070F',
                                    'navy-dark': '#0A0F1E',
                                    'navy-mid': '#111827',
                                    'accent': '#2563EB',
                                    'accent-light': '#3B82F6',
                                    'accent-glow': '#60A5FA',
                                }
                            }
                        }
                    }
                }
            },
            
            canvas: {
                styles: ['https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap', 'https://unpkg.com/aos@2.3.1/dist/aos.css'],
                scripts: ['https://unpkg.com/aos@2.3.1/dist/aos.js']
            }
        });

        // Add custom professional blocks
        editor.BlockManager.add('basic-heading', {
            label: 'Heading Text',
            category: '1. Basic Elements',
            content: '<h2 class="text-3xl font-bold text-gray-900 mb-4 p-2">Edit this heading</h2>'
        });

        editor.BlockManager.add('basic-text', {
            label: 'Paragraph Text',
            category: '1. Basic Elements',
            content: '<p class="text-gray-600 leading-relaxed mb-4 p-2">Double click to edit this text. You can drag this text anywhere inside a container or column.</p>'
        });

        editor.BlockManager.add('basic-button', {
            label: 'Primary Button',
            category: '1. Basic Elements',
            content: '<a href="#" class="inline-block bg-accent text-white font-medium py-3 px-6 rounded-lg hover:bg-accent-light transition-colors duration-200">Click Here</a>'
        });

        editor.BlockManager.add('basic-image', {
            label: 'Image',
            category: '1. Basic Elements',
            content: { type: 'image', style: { width: '100%', 'max-width': '400px', 'border-radius': '8px' }, activeOnRender: 1 }
        });

        editor.BlockManager.add('marketing-hero', {
            label: 'Hero Section',
            category: 'Marketing',
            content: `
                <section class="py-20 bg-gray-900 text-white text-center">
                    <div class="container mx-auto px-4">
                        <h1 class="text-5xl font-bold mb-6">Build Your Digital Future</h1>
                        <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">We create premium software solutions that elevate your business to the next level.</p>
                        <a href="#" class="inline-block bg-blue-600 text-white font-semibold py-3 px-8 rounded-lg hover:bg-blue-700 transition">Get Started</a>
                    </div>
                </section>
            `
        });

        editor.BlockManager.add('feature-grid', {
            label: 'Feature Grid',
            category: 'Marketing',
            content: `
                <section class="py-16 bg-white text-gray-800">
                    <div class="container mx-auto px-4">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <div class="p-6 border rounded-lg shadow-sm">
                                <h3 class="text-xl font-bold mb-3">Fast Performance</h3>
                                <p class="text-gray-600">Our solutions are built for speed, ensuring a blazing fast experience for your users.</p>
                            </div>
                            <div class="p-6 border rounded-lg shadow-sm">
                                <h3 class="text-xl font-bold mb-3">Secure Architecture</h3>
                                <p class="text-gray-600">Enterprise-grade security built directly into the core of your application.</p>
                            </div>
                            <div class="p-6 border rounded-lg shadow-sm">
                                <h3 class="text-xl font-bold mb-3">Scalable Design</h3>
                                <p class="text-gray-600">Ready to grow with your business, handling millions of requests flawlessly.</p>
                            </div>
                        </div>
                    </div>
                </section>
            `
        });

        editor.BlockManager.add('ecommerce-pricing', {
            label: 'Pricing Table',
            category: 'eCommerce',
            content: `
                <section class="py-16 bg-gray-50">
                    <div class="container mx-auto px-4 flex flex-col md:flex-row gap-8 justify-center">
                        <div class="bg-white p-8 rounded-xl shadow border border-gray-100 flex-1 max-w-sm">
                            <h3 class="text-2xl font-bold mb-4">Basic Plan</h3>
                            <p class="text-4xl font-extrabold mb-6">$29<span class="text-lg text-gray-500 font-normal">/mo</span></p>
                            <ul class="mb-8 space-y-3 text-gray-600">
                                <li>✓ 5 Projects</li>
                                <li>✓ 10GB Storage</li>
                                <li>✓ Basic Support</li>
                            </ul>
                            <a href="#" class="block text-center bg-gray-900 text-white py-3 rounded-lg hover:bg-gray-800">Choose Plan</a>
                        </div>
                        <div class="bg-blue-600 text-white p-8 rounded-xl shadow-lg flex-1 max-w-sm transform md:-translate-y-4">
                            <h3 class="text-2xl font-bold mb-4">Pro Plan</h3>
                            <p class="text-4xl font-extrabold mb-6">$99<span class="text-lg text-blue-200 font-normal">/mo</span></p>
                            <ul class="mb-8 space-y-3 text-blue-100">
                                <li>✓ Unlimited Projects</li>
                                <li>✓ 500GB Storage</li>
                                <li>✓ Priority 24/7 Support</li>
                            </ul>
                            <a href="#" class="block text-center bg-white text-blue-600 font-bold py-3 rounded-lg hover:bg-gray-100">Choose Plan</a>
                        </div>
                    </div>
                </section>
            `
        });

        // Page Manager logic
        editor.on('page', () => updatePageDropdown());

        // Grant absolute editing freedom (drag, drop, style, copy, delete, resize) to every element on the canvas
        editor.on('component:add', (component) => {
            component.set({
                draggable: true,
                droppable: true,
                stylable: true,
                removable: true,
                copyable: true,
                resizable: true
            });
        });

        function showQuickActionMenu(e, component, frameWindow) {
            // Remove existing menu if any
            const existing = document.getElementById('quick-action-menu');
            if (existing) existing.remove();

            const menu = document.createElement('div');
            menu.id = 'quick-action-menu';
            menu.style.cssText = `
                position: absolute;
                background: #0b0f19;
                border: 1px solid #334155;
                box-shadow: 0 10px 25px rgba(0,0,0,0.6);
                border-radius: 8px;
                padding: 6px;
                z-index: 999999;
                width: 220px;
                display: flex;
                flex-direction: column;
                gap: 2px;
                font-family: ui-sans-serif, system-ui, sans-serif;
            `;

            const canvasOffset = editor.Canvas.getOffset();
            const posX = e.clientX + canvasOffset.left;
            const posY = e.clientY + canvasOffset.top;
            menu.style.left = posX + 'px';
            menu.style.top = posY + 'px';

            const style = component.getStyle() || {};

            const actions = [
                { label: '🚀 Free Move (Absolute)', action: () => {
                    const current = style.position || 'static';
                    component.addStyle({ 
                        position: current === 'absolute' ? 'static' : 'absolute',
                        top: current === 'absolute' ? 'auto' : '20px',
                        left: current === 'absolute' ? 'auto' : '20px',
                        'z-index': current === 'absolute' ? 'auto' : '9999'
                    });
                }},
                { label: '⬆️ Move Element Up', action: () => {
                    const collection = component.collection;
                    if (!collection) return;
                    const index = collection.indexOf(component);
                    if (index > 0) collection.add(component, { at: index - 1 });
                }},
                { label: '⬇️ Move Element Down', action: () => {
                    const collection = component.collection;
                    if (!collection) return;
                    const index = collection.indexOf(component);
                    if (index < collection.length - 1) collection.add(component, { at: index + 2 });
                }},
                { label: '📄 Duplicate Element', action: () => {
                    const clone = component.clone();
                    const parent = component.parent();
                    if (parent) parent.append(clone);
                }},
                { label: '🗑️ Delete Element', action: () => component.remove() },
                { label: '⬅️ Align Text Left', action: () => component.addStyle({ 'text-align': 'left' }) },
                { label: '↔️ Align Text Center', action: () => component.addStyle({ 'text-align': 'center' }) },
                { label: '➡️ Align Text Right', action: () => component.addStyle({ 'text-align': 'right' }) },
                { label: '🔤 Font Size +', action: () => {
                    let size = parseInt(style['font-size']) || 16;
                    component.addStyle({ 'font-size': (size + 2) + 'px' });
                }},
                { label: '🔤 Font Size -', action: () => {
                    let size = parseInt(style['font-size']) || 16;
                    component.addStyle({ 'font-size': Math.max(10, size - 2) + 'px' });
                }},
                { label: '🔵 Color: Accent Blue', action: () => component.addStyle({ color: '#2563EB' }) },
                { label: '⚪ Color: White', action: () => component.addStyle({ color: '#FFFFFF' }) },
                { label: '⚫ Color: Dark Slate', action: () => component.addStyle({ color: '#0F172A' }) },
                { label: '➕ Spacing Outside (Margin+)', action: () => {
                    let margin = parseInt(style['margin']) || 0;
                    component.addStyle({ margin: (margin + 8) + 'px' });
                }},
                { label: '➖ Spacing Outside (Margin-)', action: () => {
                    let margin = parseInt(style['margin']) || 0;
                    component.addStyle({ margin: Math.max(0, margin - 8) + 'px' });
                }},
                { label: '📦 Spacing Inside (Padding+)', action: () => {
                    let padding = parseInt(style['padding']) || 0;
                    component.addStyle({ padding: (padding + 8) + 'px' });
                }},
                { label: '⭕ Round Corners (Rounded)', action: () => {
                    const current = style['border-radius'];
                    component.addStyle({ 'border-radius': current ? '0px' : '12px' });
                }},
                { label: '✨ Add Glow Shadow', action: () => {
                    const current = style['box-shadow'];
                    component.addStyle({ 'box-shadow': current ? 'none' : '0 10px 25px rgba(37, 99, 235, 0.3)' });
                }},
                { label: '🔝 Bring to Front', action: () => component.addStyle({ 'z-index': '9999' }) },
                { label: '🧹 Reset All Styles', action: () => component.setStyle({}) }
            ];

            actions.forEach(act => {
                const btn = document.createElement('button');
                btn.innerText = act.label;
                btn.style.cssText = `
                    background: transparent;
                    border: none;
                    color: #cbd5e1;
                    text-align: left;
                    padding: 5px 8px;
                    font-size: 12px;
                    cursor: pointer;
                    border-radius: 4px;
                    transition: all 0.1s ease;
                `;
                btn.onmouseover = () => {
                    btn.style.background = '#2563eb';
                    btn.style.color = '#ffffff';
                };
                btn.onmouseout = () => {
                    btn.style.background = 'transparent';
                    btn.style.color = '#cbd5e1';
                };
                btn.onclick = () => {
                    act.action();
                    menu.remove();
                };
                menu.appendChild(btn);
            });

            document.body.appendChild(menu);

            // Click outside to close
            const closeMenu = (event) => {
                if (!menu.contains(event.target)) {
                    menu.remove();
                    document.removeEventListener('mousedown', closeMenu);
                }
            };
            setTimeout(() => document.addEventListener('mousedown', closeMenu), 10);
        }

        // Event to automatically re-inject styles and scripts when the frame loads/reloads
        editor.on('canvas:frame:load:head', ({ window }) => {
            const doc = window.document;

            // Double click on canvas elements to trigger quick actions menu
            doc.addEventListener('dblclick', (e) => {
                const target = e.target;
                if (!target || target === doc.body || target === doc.documentElement) return;
                
                const selected = editor.getSelected();
                if (selected) {
                    e.preventDefault();
                    e.stopPropagation();
                    showQuickActionMenu(e, selected, window);
                }
            });

            // Photoshop-style drag and move anywhere
            let isDragging = false;
            let startX, startY, startLeft, startTop;
            let activeComponent = null;

            doc.addEventListener('mousedown', (e) => {
                const selected = editor.getSelected();
                if (!selected) return;

                const view = selected.getView();
                if (!view || !view.el) return;

                // Only drag if mouse down is inside the selected element
                if (!view.el.contains(e.target)) return;

                // Stop dragging if clicking on an input, button, select dropdown, or active text cursor
                if (e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA' || e.target.tagName === 'BUTTON' || e.target.tagName === 'SELECT' || e.target.closest('[contenteditable="true"]')) {
                    return;
                }

                const style = selected.getStyle() || {};
                const currentPos = style.position || 'static';
                
                // Force to absolute position to allow free dragging
                if (currentPos !== 'absolute') {
                    selected.addStyle({
                        position: 'absolute',
                        top: view.el.offsetTop + 'px',
                        left: view.el.offsetLeft + 'px',
                        margin: '0px'
                    });
                }

                isDragging = true;
                activeComponent = selected;
                startX = e.clientX;
                startY = e.clientY;
                
                const updatedStyle = selected.getStyle();
                startLeft = parseInt(updatedStyle.left) || view.el.offsetLeft || 0;
                startTop = parseInt(updatedStyle.top) || view.el.offsetTop || 0;
            });

            doc.addEventListener('mousemove', (e) => {
                if (!isDragging || !activeComponent) return;

                const dx = e.clientX - startX;
                const dy = e.clientY - startY;

                activeComponent.addStyle({
                    left: (startLeft + dx) + 'px',
                    top: (startTop + dy) + 'px'
                });
            });

            const stopDrag = () => {
                isDragging = false;
                activeComponent = null;
            };

            doc.addEventListener('mouseup', stopDrag);
            doc.addEventListener('mouseleave', stopDrag);

            assetsPromise.then(assets => {
                // 1. Inject compiled custom stylesheets and Google Fonts
                if (assets.headStyles && !doc.getElementById('real-web-styles')) {
                    const styleWrap = doc.createElement('div');
                    styleWrap.id = 'real-web-styles';
                    styleWrap.innerHTML = assets.headStyles;
                    doc.head.appendChild(styleWrap);

                    // Add visibility override for scroll animation classes so they are visible inside editor
                    const visibilityOverride = doc.createElement('style');
                    visibilityOverride.innerHTML = `
                        .scroll-animate, [data-aos] {
                            opacity: 1 !important;
                            transform: none !important;
                            transition: none !important;
                        }
                    `;
                    doc.head.appendChild(visibilityOverride);
                }

                // 2. Sync body class names so layouts inherit tailwind wrapper classes
                if (assets.bodyClass) {
                    doc.body.className = assets.bodyClass;
                }

                // 3. Inject javascript (Vite modules, Alpine.js, AOS)
                const injectScripts = (scriptsArray, targetNode) => {
                    scriptsArray.forEach(el => {
                        // Avoid duplicates
                        if (el.src && targetNode.querySelector(`script[src="${el.src}"]`)) return;
                        
                        const s = doc.createElement('script');
                        if (el.src) s.src = el.src;
                        if (el.type) s.type = el.type;
                        if (el.defer) s.defer = true;
                        if (el.async) s.async = true;
                        if (el.innerHTML) s.innerHTML = el.innerHTML;
                        targetNode.appendChild(s);
                    });
                };

                // Inject scripts to head and body
                injectScripts(assets.headScripts, doc.head);
                injectScripts(assets.bodyScripts, doc.body);
            });
        });

        function initHomeAndCleanup() {
            const pages = editor.Pages.getAll();
            if (pages.length === 0) return;

            let homePage = pages.find(p => p.get('name') === 'Home' || p.id === 'home');
            
            // Check if the home page actually has compiled content
            const wrapper = homePage ? homePage.getMainComponent() : null;
            const hasContent = wrapper && wrapper.components().length > 0;

            if (!homePage || !hasContent) {
                assetsPromise.then(assets => {
                    if (homePage) {
                        homePage.setComponents(assets.bodyContent);
                    } else {
                        homePage = editor.Pages.add({
                            id: 'home',
                            name: 'Home',
                            component: assets.bodyContent
                        });
                    }
                    editor.Pages.select(homePage);
                    editor.setDragMode('absolute');
                    
                    // Cleanup ONLY blank, unnamed dummy pages to protect real pages
                    editor.Pages.getAll().forEach(p => {
                        if (p.id !== homePage.id && (!p.get('name') || p.get('name') === '')) {
                            const w = p.getMainComponent();
                            const c = w && w.components().length > 0;
                            if (!c) {
                                editor.Pages.remove(p.id);
                            }
                        }
                    });
                    updatePageDropdown();
                });
            } else {
                // FORCE select the Home page if the current active selected page is empty/unnamed
                const currentSelected = editor.Pages.getSelected();
                const currentWrapper = currentSelected ? currentSelected.getMainComponent() : null;
                const currentHasContent = currentWrapper && currentWrapper.components().length > 0;
                
                if (!currentSelected || !currentHasContent || (!currentSelected.get('name') && currentSelected.id !== 'home')) {
                    editor.Pages.select(homePage);
                }
                
                editor.setDragMode('absolute');
                
                // Cleanup ONLY blank, unnamed dummy pages safely AFTER selecting the correct active page
                pages.forEach(p => {
                    if (p.id !== 'home' && p.get('name') !== 'Home' && (!p.get('name') || p.get('name') === '')) {
                        const w = p.getMainComponent();
                        const c = w && w.components().length > 0;
                        if (!c) {
                            editor.Pages.remove(p.id);
                        }
                    }
                });
                updatePageDropdown();
            }
        }

        editor.on('load', () => {
            initHomeAndCleanup();
            editor.setDragMode('absolute');
        });
        editor.on('storage:load', initHomeAndCleanup);
        editor.on('storage:end:load', initHomeAndCleanup);
        editor.on('page page:add page:remove', updatePageDropdown);

        function updatePageDropdown() {
            const select = document.getElementById('page-switcher');
            select.innerHTML = '';
            editor.Pages.getAll().forEach(page => {
                const opt = document.createElement('option');
                opt.value = page.id;
                opt.innerText = page.get('name') || page.id;
                if (page.id === editor.Pages.getSelected().id) {
                    opt.selected = true;
                }
                select.appendChild(opt);
            });
        }
        function switchPage(id) { editor.Pages.select(id); }

        function createNewPage() {
            const name = prompt("Enter new page name (e.g. 'About Us'):");
            if (!name) return;
            const slug = name.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)+/g, '');
            if (editor.Pages.get(slug)) return alert("Page already exists!");
            
            editor.Pages.add({
                id: slug,
                name: name,
                component: '<div style="padding:50px; text-align:center;"><h1>' + name + '</h1><p>Start building!</p></div><script src="https://cdn.tailwindcss.com"><\/script>'
            });
            editor.Pages.select(slug);
        }

        function saveGlobalComponent() {
            const selected = editor.getSelected();
            if (!selected) return alert("Please select an element first.");
            const name = prompt("Enter Component Name:");
            if (!name) return;
            
            editor.BlockManager.add(name.toLowerCase().replace(/\s+/g, '-'), {
                label: name,
                content: selected.toHTML(),
                category: 'Global Components',
            });
            alert(name + " saved!");
        }

        // Commands for Right Panel tabs
        editor.Commands.add('show-styles', {
            run(editor) {
                document.getElementById('style-manager-container').style.display = 'block';
                document.getElementById('trait-manager-container').style.display = 'none';
                document.getElementById('layers-container').style.display = 'none';
            }
        });
        
        editor.Commands.add('show-traits', {
            run(editor) {
                document.getElementById('style-manager-container').style.display = 'none';
                document.getElementById('trait-manager-container').style.display = 'block';
                document.getElementById('layers-container').style.display = 'none';
            }
        });
        
        editor.Commands.add('show-layers', {
            run(editor) {
                document.getElementById('style-manager-container').style.display = 'none';
                document.getElementById('trait-manager-container').style.display = 'none';
                
                let layers = document.getElementById('layers-container');
                if (layers && !layers.querySelector('.gjs-pn-layers')) {
                    const el = editor.LayerManager.render();
                    el.className = 'gjs-pn-layers';
                    layers.appendChild(el);
                }
                layers.style.display = 'block';
            }
        });

        // Add Device Commands
        editor.Commands.add('set-device-desktop', { run: ed => ed.setDevice('Desktop') });
        editor.Commands.add('set-device-tablet', { run: ed => ed.setDevice('Tablet') });
        editor.Commands.add('set-device-mobile', { run: ed => ed.setDevice('Mobile portrait') });

        // Add AOS traits
        editor.DomComponents.addType('default', {
            model: {
                init() {
                    const traits = this.get('traits');
                    if (!traits.filter(t => t.get('name') === 'data-aos').length) {
                        traits.push({
                            type: 'select',
                            label: 'Animation (AOS)',
                            name: 'data-aos',
                            options: [
                                { value: '', name: 'None' },
                                { value: 'fade-up', name: 'Fade Up' },
                                { value: 'zoom-in', name: 'Zoom In' },
                                { value: 'flip-left', name: 'Flip Left' }
                            ]
                        });
                        this.set('traits', traits);
                    }
                }
            }
        });

        function saveProject() {
            const btn = document.getElementById('save-btn');
            const status = document.getElementById('save-status');
            const originalText = btn.innerHTML;
            btn.innerText = 'Publishing...';
            btn.disabled = true;
            
            // Strip tailwind CDN and config from export
            editor.Pages.getAll().forEach(page => {
                page.getMainComponent().find('script').forEach(comp => {
                    const content = comp.get('content') || '';
                    if (comp.get('src') === 'https://cdn.tailwindcss.com' || content.includes('tailwind.config =')) {
                        comp.remove();
                    }
                });
            });
            
            editor.store(res => {
                status.style.display = 'inline';
                setTimeout(() => status.style.display = 'none', 3000);
                btn.innerHTML = originalText;
                btn.disabled = false;
            }, err => {
                alert('Error saving project');
                btn.innerHTML = originalText;
                btn.disabled = false;
            });
        }
    </script>
</body>
</html>
