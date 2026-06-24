const fs = require('fs');
const path = require('path');

function walkDir(dir, callback) {
    fs.readdirSync(dir).forEach(f => {
        let dirPath = path.join(dir, f);
        let isDirectory = fs.statSync(dirPath).isDirectory();
        isDirectory ? walkDir(dirPath, callback) : callback(path.join(dir, f));
    });
}

walkDir('./resources/views', function(filePath) {
    if (!filePath.endsWith('.blade.php')) return;
    let content = fs.readFileSync(filePath, 'utf8');
    
    let original = content;

    // 1. Optimize vertical padding for sections
    content = content.replace(/\bpy-24\b/g, 'py-16 lg:py-24');
    content = content.replace(/\bpt-32\b/g, 'pt-24 lg:pt-32');
    content = content.replace(/\bpb-24\b/g, 'pb-16 lg:pb-24');

    // 2. Optimize Typography
    // Section headers
    content = content.replace(/\btext-4xl\b/g, 'text-3xl lg:text-4xl');
    
    // Hero Header
    content = content.replace(/\btext-5xl md:text-7xl\b/g, 'text-4xl md:text-5xl lg:text-7xl');
    // Career Details header
    content = content.replace(/\btext-3xl md:text-5xl\b/g, 'text-3xl md:text-4xl lg:text-5xl');

    // Container Padding (ensure it's not too wide on small screens)
    // Most use px-6, we can leave px-6, it's 1.5rem which is fine on mobile.
    
    if (content !== original) {
        fs.writeFileSync(filePath, content, 'utf8');
        console.log('Optimized:', filePath);
    }
});
