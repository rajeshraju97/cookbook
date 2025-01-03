const cacheName = "cookbook-pwa-v2";
const resourcesToCache = [
    "/",
    "/css/main.css",
    "/js/main.js",
    "/favicon.png",
    "/img/img1.png",
];

// Install service worker and cache resources
self.addEventListener("install", (event) => {
    event.waitUntil(
        caches.open(cacheName).then((cache) => {
            return cache.addAll(resourcesToCache);
        })
    );
});

// Activate service worker and delete old caches
self.addEventListener("activate", (event) => {
    const cacheWhitelist = [cacheName];
    event.waitUntil(
        caches.keys().then((cacheNames) => {
            return Promise.all(
                cacheNames.map((cache) => {
                    if (!cacheWhitelist.includes(cache)) {
                        return caches.delete(cache);
                    }
                })
            );
        })
    );
});

// Fetch from cache or network
self.addEventListener("fetch", (event) => {
    // Exclude dynamic pages from cache
    if (
        event.request.url.includes("/login") ||
        event.request.url.includes("/logout") ||
        event.request.url.includes("/user/dashboard") ||
        event.request.url.includes("/user/cart") ||
        event.request.url === "/" // Exclude homepage
    ) {
        event.respondWith(fetch(event.request));
    } else {
        event.respondWith(
            caches.match(event.request).then((cachedResponse) => {
                return cachedResponse || fetch(event.request);
            })
        );
    }
});
