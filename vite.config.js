import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from 'fs'
import path from 'path';

const themeConfigPath = path.resolve(__dirname, 'bootstrap/cache/theme.json')
let themeInputs = []

if (fs.existsSync(themeConfigPath)) {
    const theme = JSON.parse(fs.readFileSync(themeConfigPath, 'utf8'))
    themeInputs = [...(theme.css || []), ...(theme.js || [])]
}

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',

                'resources/sass/admin.scss',
                'resources/js/admin.js',

                ...themeInputs,
            ],
            refresh: true,
        }),
    ],
    css: {
        preprocessorOptions: {
            scss: {
                silenceDeprecations: [
                    'import',
                    'mixed-decls',
                    'color-functions',
                    'global-builtin',
                ],
            },
        },
    },
});
