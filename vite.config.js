import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default {
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
    build: {
        outDir: "public/build", // Thư mục chứa file manifest.json
    },
};
