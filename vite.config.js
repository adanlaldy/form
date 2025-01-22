import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/display_question_forms.js', 'resources/js/add_answer.js', 'resources/js/animations.js'],
            refresh: true,
        }),
    ],
});
