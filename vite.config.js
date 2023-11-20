// -- vite.config.js

import path from 'path';
import { existsSync, readFileSync } from 'fs';
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import manifestSRI from 'vite-plugin-manifest-sri';
import del from 'del';

const inProduction = process.env.NODE_ENV === 'production';

// -- Custom inline plugin definitions

const assetCleanup = function (dirs = []) {
    return {
        name: "vite-plugin-ielectro-asset-cleanup",
        apply: "build",
        enforce: "post",
        async writeBundle() {
            if (!inProduction) {
                return;
            }

            const manifestPath = path.resolve(__dirname, 'public/assets/manifest.json');
            if (!existsSync(manifestPath)) {
                return;
            }

            const manifest = JSON.parse(readFileSync(manifestPath));

            const exceptions = [
                '!public/assets/fonts/.gitignore',
                '!public/assets/images/.gitignore',
                '!public/assets/javascripts/.gitignore',
                '!public/assets/stylesheets/.gitignore',
                '!public/assets/manifest.json',
                ...Object.values(manifest).map(chunk => `!public/assets/${chunk.file}`)
            ];

            const deletes = [
                'public/assets/fonts/*',
                'public/assets/images/*',
                'public/assets/javascripts/*',
                'public/assets/stylesheets/*',
                ...dirs,
            ];

            // Prune all supplied files/folders except those present in the manifest
            del.sync([...deletes, ...exceptions]);
        }
    }
}

// -- Vite.js configuration

export default defineConfig({
    plugins: [
        // Laravel Vite.js plugin config
        laravel({
            hotFile: 'storage/app/vite.hot',
            buildDirectory: 'assets',
            input: [
                'resources/assets/stylesheets/application.scss',
                'resources/assets/css/bootstrap.min.css',
                'resources/assets/css/default.css',
                'resources/assets/css/materialdesignicons.min.css',
                'resources/assets/css/style.min.css',
                'resources/assets/css/tobii.min.css',
                'resources/assets/fonts/ajax-loader.gif',
                'resources/assets/fonts/materialdesignicons-webfont.eot',
                'resources/assets/fonts/materialdesignicons-webfont.svg',
                'resources/assets/fonts/materialdesignicons-webfont.ttf',
                'resources/assets/fonts/materialdesignicons-webfont.woff',
                'resources/assets/fonts/materialdesignicons-webfont.woff2',
                'resources/assets/javascripts/application.js',
                'resources/assets/javascripts/home.js',
            ],
            refresh: true,
        }),
        // Build-up source files resource integrity computations on the manifest...
        manifestSRI(),
        // Perform old hashed asset cleanup...
        assetCleanup(),
    ],
    resolve: {
        alias: {
            '~@tabler': path.resolve(__dirname, 'node_modules/@tabler'),
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap')
        }
    },
    build: {
        sourcemap: !inProduction,
        manifest: true,
        reportCompressedSize: true,
        emptyOutDir: false,
        rollupOptions: {
            output: {
                chunkFileNames: 'javascripts/[name].[hash].js',
                entryFileNames: 'javascripts/[name].[hash].js',
                // Add some folder structure to bundled assets.
                // TODO: Try to respect original folder structure...
                assetFileNames: ({ name }) => {
                    if (name.includes('materialdesignicons') || name.includes('ajax-loader')) {
                        console.log(name);
                        return 'fonts/[name].[hash][extname]'
                    }

                    if (/\.(gif|jpe?g|png|svg)$/.test(name ?? '')) {
                        return 'images/[name].[hash][extname]'
                    }

                    if (/\.css$/.test(name ?? '')) {
                        return 'stylesheets/[name].[hash][extname]'
                    }
                    return '[name].[hash][extname]'
                },
            }
        }
    },
    // FIXME: It seems there's some issue w/high resource utilization via chokidar
    // and/or some of its dependencies which interact w/node open file
    // descriptors badly.
    // See: https://github.com/vitejs/vite/issues/10835
    server: {
        hmr: {
            host: 'localhost',
        },
        watch: {
            usePolling: true
        }
    }
})
